<!DOCTYPE html>
<html lang="ch">
<head>
<title><?php  echo $list['title'];?></title>
<meta charset="utf-8" />
<meta HTTP-EQUIV="pragma" CONTENT="no-cache">
<meta HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
<meta HTTP-EQUIV="expires" CONTENT="0">
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="pragram" content="no-cache" /> 
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/app/offline.js?1397525361"></script>  
<script type="text/javascript">
	if(/Android (\d+\.\d+)/.test(navigator.userAgent)){
		var version = parseFloat(RegExp.$1);
		if(version>2.3){
			var phoneScale = parseInt(window.screen.width)/640;
			document.write('<meta name="viewport" content="width=640, minimum-scale = '+ phoneScale +', maximum-scale = '+ phoneScale +', target-densitydpi=device-dpi">');
		}else{
			document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
		}
	}else{
		document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
	}

	</script>
	<?php  include addons_page('share');?> 
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/24/assets/styles/app.min.css?ver=3.6"/>	
 </head>
<body class="app" data-app-id="5477" data-ad="true">
<div id="app-loading" class="app-loading">
<div class="cycleWrap">
<span class="cycle cycle-1"></span>
<span class="cycle cycle-2"></span>
<span class="cycle cycle-3"></span>
<span class="cycle cycle-4"></span>
</div>
<div class="lineWrap">
<span class="line line-1"></span>
<span class="line line-2"></span>
<span class="line line-3"></span>
</div>
</div>
<?php  if($list['bg_music_switch']==1) { ?>	
	<header class="app-header">
		<a href="javascript:void(0);" class="u-globalAudio">
		<i class="icon-music"></i>
		<audio src="<?php echo WEBSITE_ROOT;?>attachment/<?php  echo $list['bg_music_url'];?>" autoplay="autoplay" loop="loop"></audio>
		</a>
	</header>
<?php  } ?>

<section class="app-content">
	<section class="page page-index z-current" data-plugin-type="info_front">
	<section class="page-content">
	<div class="m-animationBox m-animationCloudBg"></div>
	<img class="m-foregroundImg" src="<?php  echo $this->toimage($list['cover']) ?>">
	</section>
</section>
<?php  if(is_array($items)) { foreach($items as $item) { ?>
	<!-- 内页 -->
	<?php  $data=$this->iunserializer($item['param']); ?>
	<?php  if($item['m_type']==1) { ?>
	<section class="page page-panorama" data-plugin-type="info_profile" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
			<div class="m-panorama z-center">
				<img class="teletextImg" src="<?php  echo $this->toimage($data['pic1']) ?>" />
				<div class="panoramaImg z-horizontal">
					<img src="<?php  echo $this->toimage($data['pic2']) ?>" />
				</div>
			</div>
		</section>
	</section>
	<?php  } else if($item['m_type']==2) { ?>
	<section class="page page-panorama" data-plugin-type="info_profile" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<div class="m-panorama z-center">
			<img class="teletextImg" src="<?php  echo $this->toimage($data['pic1']) ?>" />
			<div class="panoramaImg z-retractable">
				<img src="<?php  echo $this->toimage($data['pic2']) ?>" />
			</div>
		</div>
		</section>
	</section>
	<?php  } else if($item['m_type']==3) { ?>
	<section class="page page-link" data-plugin-type="info_visit" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<div class="m-link">
		<a href="weixin:share" class="imgLink">
			<img src="<?php  echo $this->toimage($data['pic1']) ?>"/>
		</a>
		</div>
		<div class="u-maskLayer m-weixinShareLayer z-hide">>
			<img src="<?php  echo $this->toimage($data['pic2']) ?>">
		</div>
		</section>
	</section>
	<?php  } else if($item['m_type']==4) { ?>
	<section class="page page-panorama" data-plugin-type="info_profile" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<div class="m-panorama z-right">
			<img class="teletextImg" src="<?php  echo $this->toimage($data['pic1']) ?>" />
			<div class="panoramaImg z-horizontal">
				<img src="<?php  echo $this->toimage($data['pic2']) ?>" />
			</div>
		</div>
		</section>
	</section>
	<?php  } else if($item['m_type']==5) { ?>
	<section class="page page-video" data-plugin-type="video_house" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<a href="javascript:void(0);" class="m-btnPlay a-bouncein">
			<i style="background:url(<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/24/data/images/icon/video.png)"></i>
			<div></div>
		</a>
		<div class="u-maskLayer m-youkuVideoLayer z-hide">
			<div class="m-youkuVideo" data-devid="" data-src="<?php  echo $data['url'];?>"></div>
		</div>
		</section>
	</section>
	<?php  } else if($item['m_type']==6) { ?>
	<section class="page page-link" data-plugin-type="info_visit" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<div class="m-link">
		<a href="weixin:share" class="imgLink">
			<img src="<?php  echo $this->toimage($data['pic1']) ?>"/>
		</a>
		</div>
		<div class="u-maskLayer m-weixinShareLayer z-hide">>
			<img src="<?php  echo $this->toimage($data['pic2']) ?>">
		</div>
		</section>
	</section>
	<?php  } else if($item['m_type']==7) { ?>
	<section class="page page-link" data-plugin-type="info_visit" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<div class="m-link">
		<a href="<?php  echo $data['url'];?>" class="imgLink">
			<img src="<?php  echo $this->toimage($data['pic1']) ?>"/>
		</a>
		</div>
		 
		</section>
	</section>
	<?php  } else if($item['m_type']==8) { ?>
	<section class="page page-link" data-plugin-type="info_visit" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<div class="m-link">
		<a href="tel:<?php  echo $data['tel'];?>" class="imgLink">
			<img src="<?php  echo $this->toimage($data['pic1']) ?>"/>
		</a>
		</div>
		</section>
	</section>
	<?php  } else if($item['m_type']==9) { ?>
	<section class="page page-form" data-plugin-type="store_contact" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
		<section class="page-content">
		<div class="m-contactInfo">
		<?php  if(!empty($data['tel'])) { ?>
		<dl>
			<dt class="icon-tel">电话</dt>
			<dd> <a href="tel:<?php  echo $data['tel'];?>"><?php  echo $data['tel'];?></a> </dd>
		</dl>
		<?php  } ?>
		<?php  if(!empty($data['email'])) { ?>
		<dl>
			<dt class="icon-email">邮箱</dt>
			<dd> <a href="mailto:<?php  echo $data['email'];?>"><?php  echo $data['email'];?></a> </dd>
		</dl>
		<?php  } ?>
		<?php  if(!empty($data['weixin'])) { ?>
		<dl>
			<dt class="icon-weixin">微信</dt>
			<dd> <a href="<?php  echo $data['wxurl'];?>"><?php  echo $data['weixin'];?></a> </dd>
		</dl>
		<?php  } ?>
		</div>
		<div class="m-contactUs m-link"></div>
		</section>
	</section>
	<?php  } ?>
<?php  } } ?>
  
 
<div class="u-maskLayer m-articlePop z-hide">
<div class="m-articleWrapper"><article></article></div>
</div>
</section>
<script type="text/javascript" src="addons/addon10/resource/24/assets/scripts/init.min.js?ver=3.8"></script>
</html>
