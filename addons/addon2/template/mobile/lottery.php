<?php defined('SYSTEM_IN') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=yes" name="format-detection">
<title><?php  echo $xc_zjp['title'];?></title>
<meta content="" name="keywords">
<meta content="" name="description">
<link type="text/css" href="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/idangerous.swiper.css?v=2014121116" charset="utf-8" rel="stylesheet" />
<link type="text/css" href="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk-luck.css?v=201412111" charset="utf-8" rel="stylesheet" />
<style>
        .wx_loading{position:fixed;top:0;left:0;bottom:0;right:0;z-index:90;background-color:rgba(0,0,0,0);font-family:Helvetica,STHeiti STXihei,Microsoft JhengHei,Microsoft YaHei,Arial;line-height:1.5}.wx_loading_inner{text-align:center;background-color:rgba(0,0,0,0.5);color:#fff;position:fixed;top:50%;left:50%;margin-left:-70px;margin-top:-48px;width:140px;border-radius:6px;font-size:14px;padding:58px 0 10px 0}.wx_loading_icon{position:absolute;top:15px;left:50%;margin-left:-16px;width:24px;height:24px;border:2px solid #fff;border-radius:24px;-webkit-animation:gif 1s infinite linear;animation:gif 1s infinite linear;clip:rect(0 auto 12px 0)}@keyframes gif{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes gif{0%{-webkit-transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg)}

</style>
<script type="text/javascript">
	function notice()
	{
		<?php  if(!empty($nogg)) { ?>
		<?php  if(($nogg==1)) { ?>
	alert("<?php  echo $message?>");
	<?php  } ?>
	<?php  } ?>
}
</script>
</head>
<body onload="$('#wxloading').hide();notice();">
<div class="wx_loading" id="wxloading">
        <div class="wx_loading_inner">
            <i class="wx_loading_icon"></i>
            请求加载中...
        </div>
   </div>   
	
	
	<div style="background-image: -moz-linear-gradient(top, #1f2b4f, #20243f); height: 100%; width: 100%;">
		<div class="luck-top-bg" id="topbg">
			
			<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/luck-bg.jpg" width="100%">
		</div>
		<div class="switch-btn">
			<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/hand-btn.png" width="70%">
		</div>
		<ul class="word">
			<li><a href="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'gifts'))?>" class="my-prize">我的奖品</a></li>
			<li><a href="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'rule'))?>">活动规则</a></li>
		</ul>
		<div class="con">
			<div class="arm-area" id="armArea">
				<div id="arm" class="arm" style="background-image:url(<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/arm-bg-0.png);">
					<div id="armImg" class="arm-img" style="background-image:url(<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/arm-0.png);"></div>
				</div>
			</div>
			<div id="luckTips" class="luck-tips"></div>
			<div id="finger" class="finger"></div>
			<div class="box">
				<div id="luckBox" class="box-front"></div>
				<div class="box-back"></div>
			</div>
		</div>
		<!--<div class="luck-bottom-bg">
			<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/luck-bg-01.jpg" width="100%">
		</div>-->
	</div>
	<!--弹出框：获得奖品-->
	<div id="luckPopup" class="popup">
		<div class="popup-bg"></div>
		<div class="popup-con-wrap">
			<div class="popup-con popup-con-bg">
				<div class="popup-con-img"  style=" padding-top:320px;">
					<img id="prizeImg">
				</div>
			
				<div class="popup-con-tips tips">
				
				<p>恭喜你获得</p>
					<p>
						<span id="prizeName"></span>
					</p>
					<p id="luckText">
						你还有<span id="surplusCount"></span>次抽奖机会，继续加油！
					</p>
				
				</div>
			</div>
			<a href="javascript:closeLuckPopup();" class="popup-btn" id="luckPopupBtn">继续抽奖</a>
		</div>
	</div>
	<!--弹出框：输入手机号码-->
	<div id="phonePopup" class="popup">
		<div class="popup-bg"></div>
		<div class="popup-con-wrap">
			<div class="popup-con">
				<div class="popup-con-head"  style=" padding-top:330px;">输入联系方式</div>
			<!--	<div class="popup-con-word">请留下您真实的联系方式，以作为领取奖品的有效凭证。</div>-->
				<div class="popup-con-input">
						<span class="popup-con-error">*请输入您的姓名！</span>	<input name="realname" type="text">
					<div class="phone-border"></div>
				</div>	
					<div class="popup-con-input">		<span class="popup-con-error">*请输入有效的手机号码！</span>
					<input name="phone" type="text">
					<div class="phone-border"></div>
				</div>
		
			</div>
			<a href="javascript:setPhone();" class="popup-btn">确认提交</a>
		</div>
	</div>
	<!--弹出框：提示-->
	<div id="promptPopup" class="popup">
		<div class="popup-bg"></div>
		<div class="popup-con-wrap">
			<div class="popup-con">
				<div class="popup-con-head" id="promptHead">提示</div>
				
				<div class="popup-con-tips tips" id="promptWord">恭喜你获得<span>5</span>次抽奖机会，继续加油！</div>
			</div>
			<a href="javascript:closePromptPopup();" class="popup-btn" id="prompBtn">继续抽奖</a>
		</div>
	</div>
	<!--分享遮罩层-->
	<div id="shareMask" class="mask" onclick="closeShareMask();">
		<div class="mask-bg"></div>
		<div class="mask-cont">
			<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/arrow.png" class="indicate">
			<div class="clear"></div>
			<div class="mask-cont-text">
				点击右上角的<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/icon.png">分享给朋友。
			</div>
			<div class="mask-close">
			
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/jquery.min.js" charset="utf-8"></script>
	
	<script type="text/javascript">
					var _webApp="<?php  echo WEBSITE_ROOT;?>";
					var dataForWeixin={
				appId:	"",
				img:	"<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/share.jpg", 
				url:	"<?php  echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon2','do' => 'ucount','uid' => $myuser['id']))?>",
				title:	"<?php  echo $title;?>",
				desc:	"<?php  echo $xc_zjp['description'];?>",
				fakeid:	"",
			};
		
			 var _Awaryurl="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'getaward'))?>&r="+new Date().getTime();
		 
		
				var _GiftsUrl= "<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'gifts'))?>&r="+new Date().getTime();
			var _SetPhoneUrl= "<?php  echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon2','do' => 'setPhone'))?>&r="+new Date().getTime();
			
	</script>
	<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk.js?v=20150626" charset="utf-8"></script>
	<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk-luck.js?v=20150626" charset="utf-8"></script>
</body>
</html>
