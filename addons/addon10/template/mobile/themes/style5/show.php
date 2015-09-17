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
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/app/offline.js" ></script>
<!--移动端版本兼容 -->
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

	
	var comment_url="<?php echo mobile_url('formsubmit',array('id'=>$_GP['id'],'iscomment'=>1)); ?>";
	</script>
	<?php  include addons_page('share');?> 
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/assets/styles/app.min.css?ver=3.0">
<head>
<body class="app" data-app-id="5262">
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
<section class="page page-words" data-plugin-type="info_wall" data-layout-id="64105">
	<section class="page-content" style="backgroun:red">
		<section class="m-words" style="background:url(<?php  echo $this->toimage($list['cover2']) ?>);">
			<div class="m-words-txt">
			<img src="<?php  echo $this->toimage($list['cover1']) ?>" />
			</div>
		</section>
	</section>
</section>

<?php  if(is_array($items)) { foreach($items as $item) { ?>
		<!-- 内页 -->
		<?php  $data=$this->iunserializer($item['param']); ?>
		<?php  if($item['m_type']==1) { ?>
			<section class="page page-index" data-plugin-type="index">
				<section class="page-content">
				<img class="m-bg-zoom" src="<?php  echo $this->toimage($item['thumb']) ?>">
					<div class="m-title-bouceoutT">
						<h1 style="font-size: 51px;"></h1>
						<h2></h2>
					</div>
				</section>
			</section>
		<?php  } else if($item['m_type']==10) { ?>	
			<section class="page page-link" data-plugin-type="info_link" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>)">
				<section class="page-content">
				</section>
			</section>
		<?php  } else if($item['m_type']==4) { ?>	
		  <section class="page page-link" data-plugin-type="info_link" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
				<div class="m-link">
					<a href="tel:<?php  echo $data['tel'];?>" class="imgLink">
					<img src="<?php  echo $this->toimage($data['btnimg']) ?>"/>
					</a>
				</div>
			</section>
		  </section>		

			
		<?php  } else if($item['m_type']==4) { ?>			
			<section class="page page-map" data-plugin-type="map" style="background:url(<?php  echo $this->toimage($item['thumb']) ?>);">
				<section class="page-content">
				<div class="m-distributedPoints">
					<div class="mapEnter" data-map-markers="[{'lng':'<?php  echo $data['lng'];?>','lat':'<?php  echo $data['lat'];?>', 'addr':'<?php  echo $data['sname'];?>'}]">
						<div class="mapEnter-bg">
							<img src="<?php  echo $this->toimage($data['btnimg']) ?>" />
						</div>
					</div>
				</div>
				<div class="u-yunlaiMap z-hide"></div>
				</section>
			</section>
		<?php  } else if($item['m_type']==2) { ?>
		<section class="page page-link" data-plugin-type="info_link" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
				<div class="m-link">
					<a href="<?php  echo $data['url'];?>" class="imgLink">
					<img src="<?php  echo $this->toimage($data['btnimg']) ?>"/>
					</a>
				</div>
			</section>
		</section>		
		 	
		<?php  } else if($item['m_type']==3) { ?>			
		<section class="page page-link" data-plugin-type="info_link" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
				<div class="m-link">
				<a href="weixin:share" class="imgLink">
				<img src="<?php  echo $this->toimage($data['btnimg']) ?>"/>
				</a>
				<div class="u-maskLayer m-weixinShareLayer z-hide">
					<?php  if(empty($data['share_thumb'])) { ?>
					<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/22/data/images/link/weixin-share-guide.png">
					<?php  } else { ?>
					<img src="<?php  echo $this->toimage($data['share_thumb']) ?>">
					<?php  } ?>
				</div>
				</div>
			</section>
		</section>			
		<?php  } else if($item['m_type']==6) { ?>
		<section class="page page-video" data-plugin-type="video_school" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
				<a href="javascript:void(0);" class="m-btnPlay a-bouncein">
					<i></i>
					<div></div>
				</a>
				<div class="u-maskLayer m-youkuVideoLayer z-hide">
					<div class="m-youkuVideo" data-devid="XNzYzMzYwNDc2" data-src="<?php  echo $data['url'];?>"></div>
				</div>
			</section>
		</section>
		<?php  } else if($item['m_type']==5) { ?>		
		<section class="page page-map" data-plugin-type="map" style="background:url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
			<div class="m-distributedPoints">
				<?php  if(!empty($data['txtbg'])) { ?>
				<div class="mapIntro">
					<img src="<?php  echo $this->toimage($data['txtbg']) ?>" />
				</div>
				<?php  } ?>
				<div class="mapEnter" data-map-markers="[{'lng':'<?php  echo $data['lng'];?>','lat':'<?php  echo $data['lat'];?>', 'addr':'<?php  echo $data['place'];?>','name':'<?php  echo $data['sname'];?>'}]">
					<div class="mapEnter-bg">
						<img src="<?php  echo $this->toimage($data['btnimg']) ?>" />
					</div>
				</div>
			</div>
			<div class="u-yunlaiMap z-hide"></div>
			</section>
		</section>
		<?php  } else if($item['m_type']==7) { ?>
		<section class="page page-mask" data-plugin-type="mask">
			<section class="page-content">
				<section class="m-mask">
				<div class="mask-circle mask-circle-1"></div>
				<div class="mask-circle mask-circle-2"></div>
				<div class="mask-circle mask-circle-3"></div>
				<div class="mask-img">
					<div class="mask-img-front" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
						<div class="mask-handIcon">
						<p>不二 · 点三下</p>
						</div>
					</div>
					<div class="mask-img-back touch-4" style="background-image: url(<?php  echo $this->toimage($data['bg2']) ?>);"></div>
					<div class="mask-img-touch touch-1" style="background-image: url(<?php  echo $this->toimage($data['bg2']) ?>);"></div>
					<div class="mask-img-touch touch-2" style="background-image: url(<?php  echo $this->toimage($data['bg2']) ?>);"></div>
					<div class="mask-img-touch touch-3" style="background-image: url(<?php  echo $this->toimage($data['bg2']) ?>);"></div>
				</div>
				</section>
			</section>
		</section>
		<?php  } else if($item['m_type']==8) { ?>
		<section class="page page-words" data-plugin-type="info_wall" data-layout-id="64114">
			<section class="page-content" style="backgroun:red">
			<section class="m-words" style="background:url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<div class="m-words-txt">
				<img src="<?php  echo $this->toimage($data['txtbg']) ?>" />
			</div>
			<div class="m-words-btn">
				<span class="j-wall-open">
					<img src="<?php  echo $this->toimage($data['btnimg']) ?>" />
				</span>
				<strong></strong>
			</div>
			<div class="m-words-wall">
				<div class="wrap">
				<div class="title" style="background-color: #5FB336">
				<h3>留言墙</h3>
				<span class="close j-wall-close"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/data/images/words/words_btn_03.png" /></span>
				<span class="edit j-wall-edit"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/data/images/words/words_btn_02.png" /></span>
				</div>
				<div class="content">
				<div class="content-wrap">
				<div class="m-words-form">
				<p class="con"><textarea class="j-wall-txt" name="content" placeHolder="我想对说.."></textarea><span>限140字</span></p>
				<p class="name"><input class="j-wall-input" name="name" type="text" value="" placeHolder="阁下是..." /></p>
				<p class="btn j-wall-submit" style="background-color:#5FB336"><span>发送</span><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/data/images/words/words_icon_01.png" /></p>
				</div>
				<div class="m-words-detail">
				<h3><span>最新留言</span> <em>(共<strong id="comment-count">0</strong>条）</em></h3>
				<ul>
				</ul>
				</div>
				<div class="m-words-warn">
				<p class="warn-txt"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/data/images/words/words_icon_arrow.png" /><span class="before">往上拉加载更多</span><span class="after">松手开始加载</span></p>
				<p class="warn-loading"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/data/images/words/words_icon_loading.png" /><span>加载中...</span></p>
				</div>
				</div>
				</div>
				</div>
			</div>
			</section>
			</section>
		</section>

		<?php  } else if($item['m_type']==11) { ?>
		<section class="page page-teletext" data-plugin-type="info_list" style="background:url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
			<ul class="m-cascadingTeletext">
				
				<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $row) { ?>
				<li>
					<img src="<?php  echo $this->toimage($row) ?>"/>
					<div class="imgText"></div>
				</li>
				<?php  } } ?>
			</ul>
			<a href="javascript:void(0);" class="u-guidePrev z-move">prev</a>
			<a href="javascript:void(0);" class="u-guideNext z-move">next</a>
			</section>
		</section>
		<?php  } else if($item['m_type']==9) { ?>
			<section class="page page-form" data-plugin-type="store_contact" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
			<div class="m-contactInfo">
			<?php  if(!empty($data['weixin'])) { ?>
			<dl>
			<dt class="icon-tel">电话</dt>
			<dd> <a href="tel:<?php  echo $data['tel'];?>"><?php  echo $data['tel'];?></a> </dd>
			</dl>
			<?php  } ?>
			<?php  if(!empty($data['weixin'])) { ?>
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
			<div class="m-contactUs m-link">
			</div>
			</section>
			</section>
		<?php  } ?>
 	<?php  } } ?>
 
</section>
<section class="u-note"></section>
<section class="u-pageLoading">
<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/data/images/global/load.gif" alt="loading" />
</section>
<footer class="app-footer">
</footer>
<script type="text/javascript" src="addons/addon10/resource/26/assets/scripts/init.min.js?ver=3.0"></script>
</body>
</html>