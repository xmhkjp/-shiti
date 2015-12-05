<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({
      debug: false,
      appId: '<?php echo $this->params['jsconfig']['appId']?>',
      timestamp: <?php echo $this->params['jsconfig']['timestamp']?>,
      nonceStr: '<?php echo $this->params['jsconfig']['noncestr']?>',
      signature: '<?php echo $this->params['jsconfig']['signature']?>'
    });
</script>
<div class="order-confirm">
      <a class="btn btn-footer" id="pay" href="javascript:void(0)">微信支付</a>
</div>
<script>
	Zepto(function($){
	    $('#pay').click(function(){
	        //一旦提交操作执行，按钮要禁用
	        var btn = $(this);
	        btn[0].disabled = true;
	        btn.html('订单处理中，请耐心等待...');
	
	        var orderId = '<?php echo $this->params['order']['order_id']?>';
	        wx.chooseWXPay({
	            timestamp: <?php echo $this->params['payparam']['timeStamp']?>,
	            nonceStr: '<?php echo $this->params['payparam']['nonceStr']?>',
	            package: '<?php echo $this->params['payparam']['package']?>',
	            signType: '<?php echo $this->params['payparam']['signType']?>',
	            paySign: '<?php echo $this->params['payparam']['paySign']?>',
	            success: function (payres) {

	            }
	        });
	    });
	});
</script>