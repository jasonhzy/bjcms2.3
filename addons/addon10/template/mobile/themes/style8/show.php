
<!DOCTYPE html>
<html lang="ch" >
<head>
<meta charset="utf-8" />

<meta name="apple-touch-fullscreen" content="yes" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="pragram" content="no-cache" />
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/app/offline.js?1397525361"></script> 
<title><?php  echo $list['title'];?></title>
<script type="text/javascript">
	//移动端版本兼容
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
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/assets/styles/app.min.css?ver=3.6"/>
</head>
<body class="app" data-app-id="5261" data-ad="1">
<span style="display:none;" id="activity_id">5261</span>
<img style='display:none;' src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/20/res/img/loading_large.gif" />

<?php  if($list['bg_music_switch']==1) { ?>	
	<header class="app-header">
		<a href="javascript:void(0);" class="u-globalAudio">
		<i class="icon-music"></i>
		<audio src="<?php echo WEBSITE_ROOT;?>attachment/<?php  echo $list['bg_music_url'];?>" autoplay="autoplay" loop="loop"></audio>
		</a>
	</header>
<?php  } ?>

<section class="app-content">
<div class="app-pages">
<section class="page m-index" data-plugin-type="info_word">
	<section class="page-content">
		<img src="<?php  echo $this->toimage($list['cover']) ?>" class="m-bg">
		<div class="m-title">
			<h1></h1>
			<h2></h2>
		</div>
	</section>
	<a href="javascript:void(0);" class="u-guideTop f-hide"></a>
</section>
	<?php  if(is_array($items)) { foreach($items as $item) { ?>
		<!-- 内页 -->
	<?php  $data=$this->iunserializer($item['param']); ?>
		<?php  if($item['m_type']==1) { ?>
		<section class="page m-introduce" data-plugin-type="info_word">
			<section class="page-content">
			<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
				<div class="m-introduce-text">
				<a href="javascript:void(0);" class="icon icon-add"></a>
				</div>
				<div class="u-maskLayer m-weixinShareLayer f-hide">
				<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/data/weixin-share-guide.png"/>
				</div>
				<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
		</section>	
		<?php  } else if($item['m_type']==5) { ?>
		<section class="page m-introduce" data-plugin-type="info_word">
			<section class="page-content">
			<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
				<div class="m-introduce-text">
				<a href="javascript:void(0);" class="icon icon-add"></a>
				</div>
				<div class="u-maskLayer m-weixinShareLayer f-hide">
				<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/data/weixin-share-guide.png"/>
				</div>
				<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
		</section>			
		<?php  } else if($item['m_type']==6) { ?>			
		<section class="page m-detail" style="background-image:url(<?php  echo $this->toimage($item['thumb']) ?>);" data-plugin-type="info_time">
			<section class="page-content">
				<div id="cardListScroll" class="m-detail-cardListBox">
					<ul class="m-detail-cardList">
						<?php  if(is_array($data['nails'])) { foreach($data['nails'] as $row) { ?>
						<li> <img src="<?php  echo $this->toimage($row) ?>"/> </li>
						<?php  } } ?>
					</ul>
				</div>
				<div class="u-maskLayer f-hide">
					<div class="m-detail-detailListBox">
						<ul class="m-detail-detailList">
							<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $row) { ?>
							<li> <img src="<?php  echo $this->toimage($row) ?>"/> </li>
							<?php  } } ?>
						</ul>
					</div>
					<a href="javascript:void(0);" class="prev"></a>
					<a href="javascript:void(0);" class="next"></a>
				</div>
				<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
		</section>
		<?php  } else if($item['m_type']==2) { ?>	
			<section class="page m-introduce" data-plugin-type="info_word">
			<section class="page-content">
			<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
			<div class="m-introduce-linkBox">
			<a href="<?php  echo $data['url'];?>" class="m-introduce-link"><?php  echo $data['str'];?></a>
			</div>
			<div class="u-maskLayer m-weixinShareLayer f-hide">
			<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/data/weixin-share-guide.png"/>
			</div>
			<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
			</section>	
		<?php  } else if($item['m_type']==3) { ?>	
			<section class="page m-introduce" data-plugin-type="info_word">
			<section class="page-content">
			<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
				<div class="m-introduce-linkBox">
					<a href="weixin:share" class="m-introduce-link"><?php  echo $data['str'];?></a>
				</div>
			<div class="u-maskLayer m-weixinShareLayer f-hide">
				<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/data/weixin-share-guide.png"/>
			</div>
			<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
			</section>				
		<?php  } else if($item['m_type']==7) { ?>	
			<section class="page m-introduce" data-plugin-type="info_word">
			<section class="page-content">
			<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
			<div class="m-introduce-linkBox">
			<a href="tel:<?php  echo $data['url'];?>" class="m-introduce-link"><?php  echo $data['str'];?></a>
			</div>
			<div class="u-maskLayer m-weixinShareLayer f-hide">
			<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/data/weixin-share-guide.png"/>
			</div>
			<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
			</section>	
		<?php  } else if($item['m_type']==31) { ?>	
			<section class="page m-introduce" data-plugin-type="info_word">
			<section class="page-content">
			<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
			<div class="m-introduce-linkBox">
			<a href="<?php  echo mobile_url('map',array('title'=>$data['sname'],'lng'=>$data['lng'],'lat'=>$data['lat'],'tel'=>$data['tel'],'addr'=>$data['place'])) ?>" class="m-introduce-link"><?php  echo $data['str'];?></a>
			</div>
			<div class="u-maskLayer m-weixinShareLayer f-hide">
			<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/data/weixin-share-guide.png"/>
			</div>
			<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
			</section>				
		
		<?php  } ?>
	<?php  } } ?>

</div>
</section>
<footer class="app-footer">
</footer>
<script type="text/javascript" src="addons/addon10/resource/21/assets/scripts/init.min.js?ver=3.8"></script>
</body>
</html>
