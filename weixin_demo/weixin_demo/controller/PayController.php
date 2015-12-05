<?php
namespace frontend\controllers;

use bc\controller\FrontController;
use bc\wx\WeixinPay;
use frontend\models\UserAddress;
use frontend\models\DetectionProduct;
use frontend\models\UserOrder;
use bc\util\AppConst;
use bc\mongo\WeixinAccessToken;
use bc\wx\Weixin;
use bc\mongo\WeixinNotifyResponse;
use bc\mongo\WeixinPayNotify;
use bc\service\DetectionProductService;
/**
 * 微信支付
 */
class PayController extends FrontController {
	/**
	 * 微信支付异步回调API
	 * 微信支付成功，会收到异步回调
	 */
	public function actionWxpay()
	{	
		$weixinPay = new WeixinPay();
		$weixin = new Weixin();
		
		$xml = file_get_contents('php://input');
		$msg = $weixin->parseMsg($xml);
	
		//记录微信推送日志
		$notifyMongo = new WeixinPayNotify();
		$notifyMongo->logPayNotify($xml);

		if(!$msg || !is_object($msg)){
			$weixinPay->notifyXml('FAIL', '通知不合法');
		}
	
		if(!isset($msg->return_code) || $msg->return_code != 'SUCCESS'){
			$weixinPay->notifyXml('FAIL', '通信失败');
		}
	
		if(!isset($msg->result_code) || $msg->result_code != "SUCCESS"){
			$weixinPay->notifyXml('FAIL', '交易失败');
		}
	
		//签名验证失败
		if(!$weixinPay->checkSign($msg)){
			$weixinPay->notifyXml('FAIL', '签名验证失败');
		}
		//$notifyMongo->add($msg);
		//流程走到这里说明已经支付成功了，这里无需更新订单逻辑
		$userOrder = new UserOrder();
		//记录微信订单号
		$userOrder->pay($msg->out_trade_no, $msg->transaction_id);
	}
	
	function api_json($result = true, $msg = '', $data = null) {
		echo json_encode(array('result' =>(bool)$result, 'msg'=>$msg, 'data'=>$data));
	}
	
	/**
	 * 微信支付页面
	 * @author pwstrick
	 */
	public function actionWeixin() {
		$this->layout = 'default';
		$this->getView()->title = '支付确认';

		$uid = $this->uid();//获取session中的值
		$openid = $this->openid();
		
		//获取到地址信息
		$addressId = $this->getParam('address_id');
		$addressModel = new UserAddress();
		$address = $addressModel->getRowById($addressId);
		$this->getView()->params['address'] = $address;
		
		//产品信息
		$product_id = (int)$this->getParam('product_id');
		$productModel = new DetectionProductService();
		$product = $productModel->getRowById($product_id);
		$this->getView()->params['product'] = $product;
		
		//数量
		$num = 1;
		
		//总数
		$total = $num * $product['product_price'];
		
		$this->getView()->params['jsconfig'] = $this->getJsapiConfig();//微信支付配置信息
		
		//查询订单是否存在
		$orderModel = new UserOrder();
		$pay_type = AppConst::PAY_TYPE_WEIXIN; //微信支付
		$pay_status = AppConst::PAY_STATUS_UNPAY; //未支付
		$order = $orderModel->exist($uid, $pay_type, $product_id, $pay_status);
		
		$row = array(
			'uid' => $uid,
			'type' => $pay_type,
			'product_id' => $product_id,
			'num' => $num,
			'total' => $total,
			'status' => $pay_status,
			'address_id' => $addressId,
			'order_number' => $this->_ordernumber(),
			'status' => 1
		);
		//print_r($order);
		//var_dump($result);
		if(empty($order['id'])) {
			//如果为空就重新添加一张订单
			$row['order_id'] = $this->_orderno($product_id);
			$row['create_time'] = time();
			$order = $row;
			//添加订单
			$orderModel->add($row);
		}else {
			//更新订单信息
			$row['update_time'] = time();
			$order['order_number'] = $row['order_number'];
			$orderModel->modify($row, $order['id']);
		}
		
		$this->getView()->params['order'] = $order;
		$this->getView()->params['tester'] = $tester;
		$this->getView()->params['payparam'] = $this->getJspayParam($order, $openid);
		
		return $this->render('weixin');
	}
	
	/**
	 * 订单编号生成
	 */
	private function _orderno($product_id) {

	}
	
	/**
	* 订单编号生成
	*/
	private function _ordernumber() {
		return time() . rand(0, 10);
	}
	
	public function getJspayParam($order=array(), $openid){
		$weixinPay = new WeixinPay();
		$weixinPay->setParam('openid', $openid);
		$weixinPay->setParam('body', '检测');//商品描述
		$orderId = $order['order_number'];//支付流水号 实时改变
		$weixinPay->setParam('out_trade_no',"{$orderId}");//商户订单号
		if($order['total'] < 1) {
			$totalFee = floatval($order['total']) * 100;
		}else {
			$totalFee = floatval($order['total']);
		}
		
		$weixinPay->setParam('total_fee', "{$totalFee}");//总金额，单位为分
		$weixinPay->getPrepayId();
		$param =  $weixinPay->getJsapiParam();
		return $param;
	}
}