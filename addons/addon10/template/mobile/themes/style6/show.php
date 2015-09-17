<!doctype html>
<html lang="ch" >
<head>
<title><?php  echo $list['title'];?></title>
<meta charset="utf-8" />
<meta name="apple-touch-fullscreen" content="YES" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="pragram" content="no-cache" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/com/css/copyright.css?1376447814" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/19/css/main.css?1410785672" />
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/app/offline.js?1397525361"></script> 
<script type="text/javascript">
		var jsVer = 28;
		var phoneWidth = parseInt(window.screen.width);
		var phoneScale = phoneWidth/640;

		var ua = navigator.userAgent;
		if (/Android (\d+\.\d+)/.test(ua)){
			var version = parseFloat(RegExp.$1);
			// andriod 2.3
			if(version>2.3){
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			// andriod 2.3以上
			}else{
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
			}
			// 其他系统
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
	</script>
	<?php  include addons_page('share');?> 
</head>
<body>
<section class="u-alert">
<img style='display:none;' src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/20/res/img/loading_large.gif" />
<div class='alert-loading z-move'>
<div class='cycleWrap'>
<span class='cycle cycle-1'></span>
<span class='cycle cycle-2'></span>
<span class='cycle cycle-3'></span>
<span class='cycle cycle-4'></span>
</div>
<div class="lineWrap">
<span class='line line-1'></span>
<span class='line line-2'></span>
<span class='line line-3'></span>
</div>
</div>
</section>
<?php  if($list['bg_music_switch']==1) { ?>	
	<!-- 声音控件 -->
	<section class='u-audio f-hide' data-src="<?php echo WEBSITE_ROOT;?>attachment/<?php  echo $list['bg_music_url'];?>">
		<p id='coffee_flow' class="btn_audio">
			<strong class='txt_audio z-hide'>关闭</strong>
			<span class='css_sprite01 audio_open'></span>
		</p>
	</section>
	<?php  } ?>
	
	<section class='u-arrow f-hide'><p class="css_sprite01"></p></section>
	<section class='p-ct'>
		<div id="j-mengban" class='translate-front' data-open="1">
			<div class='mengban-warn'></div>
		</div>
<div class='translate-back f-hide'>
	<?php  if($list['first_type']==1) { ?>
		<!-- 无涂层-->
		<div class='m-page m-fengye f-hide' data-page-type='info_pic3' data-statics='info_pic3'>
			<div class="page-con lazy-img" data-src="<?php  echo $this->toimage($list['cover']) ?>"></div>
		</div>
	<?php  } else { ?>
		<!-- 擦一擦 -->
		<input id="ca-tips"   type="hidden" value="<?php  echo $list['cover_title'];?>" />
		<!-- 蒙板背景图 -->
		<input id="r-cover"   type="hidden" value="<?php  echo $this->toimage($list['cover1']) ?>"/>
		<div class='m-page m-fengye f-hide' data-page-type='info_pic3' data-statics='info_pic3'>
			<div class="page-con lazy-img" data-src="<?php  echo $this->toimage($list['cover2']) ?>"></div>
		</div>
	<?php  } ?>
	<?php  if(is_array($items)) { foreach($items as $item) { ?>
		<!-- 内页 -->
		<?php  $data=$this->iunserializer($item['param']); ?>
		<?php  if($item['m_type']==1) { ?>
		<div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
			<div class="page-con j-txtWrap lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
			</div>
		</div> 
		<?php  } else if($item['m_type']==2) { ?>
		<div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
			<div class="page-con j-txtWrap lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
			</div>
			<div class="bigTxt-btn lazy-img"  data-src="<?php  echo $this->toimage($data['btnimg']) ?>">
				<a href="<?php  echo $data['url'];?>"></a>
			</div>
		</div>				
		<?php  } else if($item['m_type']==3) { ?>
		<div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
			<div class="page-con j-txtWrap lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
			</div>
			<div class="bigTxt-btn bigTxt-btn-wx lazy-img" data-src="<?php  echo $this->toimage($data['btnimg']) ?>">
				<a href="javascript:void(0)"></a>
			</div>
			<div class="bigTxt-weixin">
				<?php  if(empty($data['share_thumb'])) { ?>
				<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/22/data/images/link/weixin-share-guide.png">
				<?php  } else { ?>
				<img src="<?php  echo $this->toimage($data['share_thumb']) ?>">
				<?php  } ?>
			</div>
		</div>
		<?php  } else if($item['m_type']==4) { ?>
		<div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
			<div class="page-con j-txtWrap lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
			</div>
			<div class="bigTxt-btn bigTxt-btn-wx lazy-img" data-src="<?php  echo $this->toimage($data['btnimg']) ?>">
				<a href="tel:<?php  echo $data['tel'];?>"></a>
			</div>
		</div>
		<?php  } else if($item['m_type']==5) { ?>
			<div class='m-page m-video f-hide' data-page-type='video' data-statics='video_list'>
				<div class="page-con lazy-img" data-src='<?php  echo $this->toimage($item['thumb']) ?>'>
					<div class="video-title" style='color:#FFFFFF;'>
						<h3 class='f-tc'></h3>
					</div>
					<div class="video-con j-video" data-video-type="bendi" data-video-src="<?php  echo $this->toimage($data['url']) ?>">
						<div class="img lazy-img" <?php  if(!empty($data['vthumb'])) { ?>data-src="<?php  echo $this->toimage($data['vthumb']) ?>"<?php  } ?>>
							<span class="css_sprite01"></span>
						</div>
						<div class="video f-hide">
							<div class="videoClose"></div>
							<div class="videoWrap"></div>
						</div>
					</div>
				</div>
			</div>	
		<?php  } else if($item['m_type']==31) { ?>
		<div class='m-page m-bigTxt f-hide' data-page-type='bigTxt' data-statics='info_list'>
			<div class="page-con j-txtWrap lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
			</div>
			<div class="bigTxt-btn bigTxt-btn-wx lazy-img" data-src="<?php  echo $this->toimage($data['btnimg']) ?>">
				<a href="<?php  echo mobile_url('map',array('title'=>$data['sname'],'lng'=>$data['lng'],'lat'=>$data['lat'],'tel'=>$data['tel'],'addr'=>$data['place'])) ?>"></a>
			</div>
		</div>			
		<?php  } ?>
		<!-- 内页 end-->
	<?php  } } ?>	
	</div>
</section>
<div class="ylmap bigOpen">
<div class='bk'><span class='css_sprite01'></span></div>
</div>
<section class="u-pageLoading">
<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/14/img/load.gif" alt="loading" />
</section>
<input id="activity_id" type="hidden" value='4327' />
<script src="addons/addon10/resource/19/mod/init_mobile.js?t=1413192194" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="addons/addon10/resource//js/bi.js?v=1410867611"></script>
<script type="text/javascript" src="addons/addon10/resource//js/bi_new.js?v=1413179173"></script>
</body>
</html>