<?php
namespace frontend\controllers;

use bc\controller\FrontController;
use bc\wx\Weixin;
use bc\mongo\WeixinUser;
use bc\mongo\WeixinPushLog;
use bc\mongo\WeixinAccessToken;
use bc\mongo\WeixinReplyLog;
use bc\util\Util;
use bc\util\AppConst;

/**
 * 微信测试
 */
class WeixinController extends FrontController
{
	
	/**
	 * 微信公众号入口
	 */
	public function actionPortal()
	{
		$weixin = new Weixin();
		//签名验证逻辑
// 		if($weixin->checkSignature()){
// 			echo $_GET['echostr'];
// 		}
// 		exit;
		//读取原始请求数据
		$msg = $weixin->getRawMsg();
		
		//推送日志
		$pushlog = new WeixinPushLog();
		$pushlog->logWeixinPush($msg);
		
		$msgObj = $weixin->parseMsg($msg);
		if ($msgObj === false || !is_object($msgObj)) {
			exit;
		}
		switch ($msgObj->MsgType) {
			case 'event' : //接收事件消息
				$this->handleEventMsg($msgObj);
				break;
			default :
				//todo
				break;
		}
	}
	
	/**
	 * 处理事件推送消息
	 * @param $msgObj 接收到的消息体
	 */
	private function handleEventMsg($msgObj)
	{
		//$this->load->model('scenemodel', 'scModel');
		$weixin = new Weixin();
		$openId = $msgObj->FromUserName;
		$fromUserName = $msgObj->ToUserName;
		//未关注，关注后推送
		if ($msgObj->Event == 'subscribe') {
			if (isset($msgObj->EventKey) && preg_match('/qrscene_(.*)/', $msgObj->EventKey, $scene)) {
				//酒精检测扫码关注
				switch ($scene[1]) {
					case AppConst::SCENE_ALCOHOL:
						$pushData['Title'] = '标题';
						break;
				}
				$pushData['PicUrl'] = 'http://mmbiz.qpic.cn/';
				$pushData['Description'] = '简介！';
				$pushData['Url'] = 'http://mp.weixin.qq.com/s';
				$msg = $weixin->createRawTuWenMsg($fromUserName, $openId, array($pushData));
				$replyLogMongo = new WeixinReplyLog();
				$replyLogMongo->logWeixinReply($msg, 'tuwen');
			} else {
				//普通关注，接收场景值id
				$pushData['PicUrl'] = 'http://mmbiz.qpic.cn';
				$pushData['Title'] = '基因检测，带你一起探索生命的奥妙 ';
				$pushData['Description'] = '为什么不同人在身高、体重、肤色和形状上长得不一样？但是往往又和自己的父母相似？';
 				$pushData['Url'] = 'http://mp.weixin.qq.com/s';
				$msg = $weixin->createRawTuWenMsg($fromUserName, $openId, array($pushData));
				$replyLogMongo = new WeixinReplyLog();
				$replyLogMongo->logWeixinReply($msg, 'tuwen');
			}
			die($msg);
		} elseif($msgObj->Event == 'CLICK'){
// 			die($msg);
		}
	}

	
	/**
	 * 创建自定义菜单
	 * token = md5('menu'+inner_weixin_key+'menu')
	 *
	 * @param $token
	 */
	public function actionCreatemenu()
	{
		$token = $this->get('token');
		$innerWeixinKey = WEIXIN_INNER_KEY;
		$trueToken = md5('menu' . $innerWeixinKey . 'menu');
		if ($token != $trueToken) {
			$this->innerOutput(1, '无法通过请求认证');
		}
		$weixin = new Weixin();
		//请注意菜单中的中文一定要采用某种方编码
		$menu = array(
            'button' => array(
                    array(
                        'name' => $this->encodeZH('菜单一'),
                        'sub_button' => array(
                            array(
                                'type' => 'view',
                                'name' => $this->encodeZH('子菜单一'),
                                'key' => 'MENU_GENE_INDEX',
                                'url' => 'http://mp.weixin.qq.com/'
                            ),
                            array(
                                'type' => 'view',
                                'name' => $this->encodeZH('趣味文章'),
                                'key' => 'MENU_ARTICLE',
                                'url' => 'http://mp.weixin.qq.com'
                            ),
                            array(
                                'type' => 'view',
                                'name' => $this->encodeZH('产品预告'),
                                'key' => 'MENU_PRODUCT',
                                'url' => 'http://mp.weixin.qq.com/'
                            )
                        )
                    ),
                    array(
                        'name' => $this->encodeZH('产品流程'),
                        'sub_button' => array(
                            array(
                                'type' => 'view',
                                'name' => $this->encodeZH('武松打虎'),
                                'key' => 'MENU_GAME',
                                'url' => 'xxxx'
                            ),
                            array(
                                'type' => 'view',
                                'name' => $this->encodeZH('产品详情'),
                                'key' => 'MENU_PRODUCT_DETAIL',
                                'url' => 'http://mp.weixin.qq.com/'
                            )
                        )
                    )
                )
        );
	
		$menuMsg = $this->decodeZHMsg(json_encode($menu));
		
		$accessMongo = new WeixinAccessToken();
		$access_token = $accessMongo->getAccessToken();
		if (!$access_token) {
			$this->innerOutput(2, '无法获取access_token');
		}
		$weixin = new Weixin();
		$res = $weixin->customMenu($menuMsg, $access_token);
		if (!$res) {
			$this->innerOutput(3, '菜单创建失败');
		}
		$this->innerOutput(0, '菜单创建成功');
	}
	
	/**
	 * 针对中文字符串编码
	 * @param $name
	 * @return string
	 */
	private function encodeZH($name)
	{
		return '[@' . base64_encode($name) . '@]';
	}
	
	/**
	 * 内部服务器请求时输出
	 *
	 * @param int $code 返回状态码
	 * @param string $msg 返回消息
	 * @param array $data 返回数据
	 */
	private function innerOutput($code, $msg = '', $data = array())
	{
		echo json_encode(array('code' => $code, 'msg' => $msg, 'data' => $data));
		exit;
	}
	
	/**
	 * 针对消息中存在中文编码过的串进行解码
	 * @param $msg
	 * @return mixed
	 */
	private function decodeZHMsg($msg)
	{
		return preg_replace_callback('/\[\@(.+?)\@\]/', function ($match) {
			return base64_decode($match[1]);
		}, $msg);
	}
	
	/**
	 * 获取二维码原始信息
	 * token = md5(id+inner_weixin_key+id)
	 * @param $scene
	 * @param $token
	 */
	public function actionGetqrcode()
	{
		$params = $this->getParams();
		//解析字符串
		$scene = $params['scene'];
		$token = $params['token'];
	
		$innerWeixinKey = WEIXIN_INNER_KEY;
		$trueToken = md5($scene . $innerWeixinKey . $scene);
		if ($token != $trueToken) {
			$this->innerOutput(1, '无法通过请求认证');
		}
		$accessMongo = new WeixinAccessToken();
		$access_token = $accessMongo->getAccessToken();
		if (!$access_token) {
			$this->innerOutput(2, '无法获取access_token');
		}
		
		$weixin = new Weixin();
		$qrdata = $weixin->getQrticket($access_token, $scene);
		
		if (!$qrdata || !is_array($qrdata)) {
			$this->innerOutput(3, '无法获取二维码信息');
		}
		$this->innerOutput(0, '成功获取二维码信息', $qrdata);
	}
}