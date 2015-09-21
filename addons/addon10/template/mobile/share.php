<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js?v=20150120"></script>
<script type="text/javascript">
var wxData = {
            "imgUrl" : "<?php echo $signPackage['imgUrl'];?>",
            "link" : "<?php echo $signPackage['link'];?>",
            "desc" : "<?php echo $signPackage['description'];?>",
            "title" : "<?php echo $signPackage['title'];?>"
};
wx.config({
    debug: false,
    appId: "<?php echo $signPackage['appId'];?>",
    timestamp: "<?php echo $signPackage['timestamp'];?>", 
    nonceStr: "<?php echo $signPackage['nonceStr'];?>", 
    signature: "<?php echo $signPackage['signature'];?>",
     jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
      ]
});
wx.error(function(res){
	if('<?php echo $signPackage['signature'];?>'!='')
	{
		if(res.errMsg='config:invalid signature')
		{
			//alert("转发接口失效，请联系管理员");
		}
	}
});	
var shareData = {
      title: wxData.title,
      link: wxData.link,
    	desc: wxData.desc,
      imgUrl:  wxData.imgUrl
    };

wx.ready(function () {
    wx.onMenuShareAppMessage(shareData);
    wx.onMenuShareTimeline(shareData);
    wx.onMenuShareQQ(shareData);
    wx.onMenuShareWeibo(shareData);
		wx.onMenuShareQZone(shareData);
});
</script>