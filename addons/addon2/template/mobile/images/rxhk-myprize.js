initWeixin();
/**
 * 初始化微信分享
 */
function initWeixin() {
	if (typeof WeixinJSBridge == "undefined") {
		if (document.addEventListener) {
			document.addEventListener('WeixinJSBridgeReady', onBridgeReady,false);
		} else if (document.attachEvent) {
			document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
			document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
		}
	} else {
		onBridgeReady();
	}
}
function onBridgeReady() {
	// 显示右上角按钮
	WeixinJSBridge.call('showOptionMenu');
	// 分享到朋友圈
	WeixinJSBridge.on('menu:share:timeline', function(argv) {
		shareTimeline();
	});
	// 发送给好友
	WeixinJSBridge.on('menu:share:appmessage', function(argv) {
		shareFriend();
	});
	// 分享到微博
	WeixinJSBridge.on('menu:share:weibo', function(argv) {
		shareWeibo();
	});
}
/**
 * 分享到朋友圈
 */
function shareTimeline() {
	WeixinJSBridge.invoke('shareTimeline', {
		"img_url" : imgUrl,
		"link" : lineLink,
		"desc" : descContent,
		"title" : descContent
	}, function(res) {
		if (res.err_msg == "share_timeline:ok") {
			//如果是分享首页解锁，与后台通信
			if(shareType==1){
				$.post(_webApp + '/activity/rxhk/shareRecord', {
				}, function(data) {
					if (data.result == 'success') {
						window.location.reload();
					} else {
						alert(data.message);
					}
				}, 'json');
			}
			closeShareMask();
		}
	});
}

function shareFriend() {
	WeixinJSBridge.invoke('sendAppMessage', {
		"img_url" : imgUrl,
		"link" : lineLink,
		"desc" : descContent,
		"title" : descContent
	}, function(res) {

	});
}

function shareWeibo() {
	WeixinJSBridge.invoke('shareWeibo', {
		"img_url" : imgUrl,
		"url" : lineLink,
		"content" : descContent,
		"title" : descContent
	}, function(res) {

	});
}
/**
 * 打开分享遮罩层1:分享首页
 */
function openShareMask1() {
	shareType=1;
	$('#maskEdit').text('就可以分享到朋友圈，成功后立即多5次抽奖呢。不勇敢点，永远不知道好运什么时候临幸自己。');
	imgUrl = imgUrl1;
	lineLink = lineLink1;
	descContent = descContent1;
	document.getElementById('shareMask').style.display = "block";
}
/**
 * 打开分享遮罩层2：分享战绩
 */
function openShareMask2() {
	shareType=2;
	$('#maskEdit').text('就可以分享到朋友圈，告诉大家您今天的手气吧！');
	imgUrl = imgUrl2;
	lineLink = lineLink2;
	descContent = descContent2;
	document.getElementById('shareMask').style.display = "block";
}
/**
 * 关闭分享遮罩层
 */
function closeShareMask() {
	document.getElementById('shareMask').style.display = "none";
}