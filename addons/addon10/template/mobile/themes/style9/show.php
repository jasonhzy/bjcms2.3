<!DOCTYPE html>
<html lang="ch">
<head>
<title><?php  echo $list['title'];?></title>
<meta charset="utf-8" />
  <meta name="apple-touch-fullscreen" content="yes" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="pragram" content="no-cache" />
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/app/offline.js?1397525361"></script> 
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
<body class="app" data-app-id="5259" data-ad="1">
<span style="display:none;" id="activity_id">5259</span>
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
			<h1><?php  echo $list['cover_title'];?></h1>
			<h2><?php  echo $list['cover_subtitle'];?></h2>
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
				<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
		</section>
		<?php  } else if($item['m_type']==10) { ?>
		<section class="page m-introduce" data-plugin-type="info_word">
			<section class="page-content">
			<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
				<div class="m-introduce-text">
				<a href="javascript:void(0);" class="icon icon-add"></a>
				</div>
				<a href="javascript:void(0);" class="u-guideTop"></a>
			</section>
		</section>	
		<?php  } else if($item['m_type']==11) { ?>
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
		<?php  } else if($item['m_type']==14) { ?>		
			<section class="page m-guests" style="background-image:url(<?php  echo $this->toimage($item['thumb']) ?>);" data-plugin-type="info_people">
				<section class="page-content">
				<ul class="m-guests-list">
					<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $key => $row) { ?>
					<li style="background-image: url(<?php  echo $this->toimage($row) ?>)" data-id="<?php  echo $key;?>">
						<h3><?php  echo $data['title'][$key];?></h3> <i></i>
					</li>
					<?php  } } ?>
				 
				</ul>
				<div class="u-maskLayer f-hide">
				<div class="m-guests-detailListBox">
				<ul class="m-guests-detailList">
					<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $key => $row) { ?>
					<li id="<?php  echo $key;?>">
						<img src="<?php  echo $this->toimage($row) ?>"/>
						<h2><?php  echo $data['title'][$key];?></h2>
						<div class="m-guests-detailList-scroll">
							<p><?php  echo $data['content'][$key];?></p>
						</div>
					</li>
					<?php  } } ?>
				</ul>
				</div>
				<a href="javascript:void(0);" class="prev"></a>
				<a href="javascript:void(0);" class="next"></a>
				</div>
				<a href="javascript:void(0);" class="u-guideTop"></a>
				</section>
			</section>
		<?php  } else if($item['m_type']==15) { ?>	
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
		<?php  } else if($item['m_type']==16) { ?>	
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
		<?php  } else if($item['m_type']==17) { ?>	
			<section class="page m-introduce" data-plugin-type="info_word">
				<section class="page-content">
				<img class="m-bg" src="<?php  echo $this->toimage($item['thumb']) ?>">
				<div class="m-introduce-linkBox">
				<a href="tel:<?php  echo $data['tel'];?>" class="m-introduce-link"><?php  echo $data['str'];?></a>
				</div>
				<div class="u-maskLayer m-weixinShareLayer f-hide">
				<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/21/data/weixin-share-guide.png"/>
				</div>
				<a href="javascript:void(0);" class="u-guideTop"></a>
				</section>
			</section>
		<?php  } else if($item['m_type']==33) { ?>	
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
		<?php  } else if($item['m_type']==13) { ?>	
			<section class="page m-contact" style="background-image:url(<?php  echo $this->toimage($item['thumb']) ?>);" data-plugin-type="store_contact">
				<section class="page-content">
					<div class="m-contact-addedImg">
						<img src="<?php  echo $this->toimage($data['mthumb']) ?>"/>
					</div>
					<div class="u-contact-box m-contact-contact">
						<div>
						<?php  if(!empty($data['tel'])) { ?>
							<a href="tel:<?php  echo $data['tel'];?>">
								<i class="icon-tel"></i>
								<span><?php  echo $data['tel'];?></span>
							</a>
						</div>
						<?php  } ?>
						<?php  if(!empty($data['weixin'])) { ?>
						<div>
							<?php  if(!empty($data['weixin'])) { ?>
								<a href="<?php  echo $data['wxurl'];?>">
								<i class="icon-chat"></i>
								<span><?php  echo $data['weixin'];?></span>
								</a>
							<?php  } else { ?>
								<i class="icon-chat"></i>
								<span><?php  echo $data['weixin'];?></span>
							<?php  } ?>
						</div>
						<?php  } ?>
						<?php  if(!empty($data['str1'])||!empty($data['str2'])||!empty($data['str3'])) { ?>
						<center>
							<input type="button" id="btnOpenSignUp" class="u-contact-btn" value="我要预约服务" style='background:#71b643'>
						</center>
						<?php  } ?>
					</div>
				<?php  if(!empty($data['str1'])||!empty($data['str2'])||!empty($data['str3'])) { ?>
					<div class="u-maskLayer f-hide">
						<div class="u-contact-box m-contact-signUp">
						<h2>请填写完成预约</h2>
						<form action="<?php  echo mobile_url('sumbit',array('id'=>$id,'isyuyue'=>$list['isyuyue'])) ?>" method="post">
							<table>
							<?php  if(!empty($data['str1'])) { ?>
							<tr>
								<th><?php  echo $data['str1'];?>:</th><td><input type="text" name="str1" required="required" class="u-textbox"/></td>
							</tr>
							<?php  } ?>
							<?php  if(!empty($data['str2'])) { ?>
							<tr>
								<th><?php  echo $data['str2'];?>:</th><td><input type="text" name="str2" required="required" class="u-textbox"/></td>
							</tr>
							<?php  } ?>
							<?php  if(!empty($data['str3'])) { ?>						
							<tr>
								<th><?php  echo $data['str3'];?>:</th><td><input type="text" name="str3" required="required" class="u-textbox"/></td>
							</tr>  
							<?php  } ?>
							</table>
							<center>
								<input type="submit" class="u-contact-btn" value="提交预约" style='background:#71b643'>
								<input type="hidden" id="has-submit" has-submit="0">
							</center>
							<input type="hidden" value="提交成功" data-on="1" success=1>
							<input type="hidden" value="提交失败" data-on="1" fail=1>
						</form>
					</div>
				<?php  } ?>
			</div>
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
