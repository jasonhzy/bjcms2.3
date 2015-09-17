<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<!DOCTYPE html>
<html lang="ch" manifest="/appcache/act/5478?_t=1411703626">
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
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/assets/styles/app.min.css?ver=3.0">
<head>
<body class="app" data-app-id="5478">
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
		<audio src="<?php echo WEBSITE_ROOT.'attachment/';?><?php  echo $list['bg_music_url'];?>" autoplay="autoplay" loop="loop"></audio>
		</a>
	</header>
<?php  } ?>
<section class="app-content">
	<section class="page page-index" data-plugin-type="index">
		<section class="page-content">
			<img class="m-bg-zoom" src="<?php  echo $this->toimage($list['cover']) ?>">
			<div class="m-title-bouceoutT">
				<h1 style="font-size: 51px;"><?php  echo $list['cover_title'];?></h1>
				<h2><?php  echo $list['cover_subtitle'];?></h2>
			</div>
		</section>
	</section>
	
	<?php  if(is_array($items)) { foreach($items as $item) { ?>
		<!-- 内页 -->
	<?php  $data=$this->iunserializer($item['param']); ?>
		<?php  if($item['m_type']==1) { ?>
		<section class="page page-link" data-plugin-type="info_link" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
				<div class="f-hide">
				 
				</div>
			</section>
		</section>
		<?php  } else if($item['m_type']==2) { ?>
		<?php  
			if(empty($data['str1'])){
				$data['str1']='姓名';
			}
			if(empty($data['str2'])){
				$data['str2']='电话';
			}
			if(empty($data['btxt'])){
				$data['btxt']='应聘该职位';
			}
			
		?>
		<section class="page page-form" data-plugin-type="store_contact" style="background-image: url(<?php  echo $this->toimage($item['thumb']) ?>);">
			<section class="page-content">
				<div class="m-contactUs m-link">
				<a href="javascript:void(0);" class="textLink" style='background-color:#FFCC00'><?php  echo $data['btxt'];?></a>
				</div>
				<div class="u-maskLayer m-contactFormLayer z-hide">
					<div>
						<div class="m-contactForm">
							<h2><span><?php  echo $data['btxt'];?></span></h2>
							<form action="<?php  echo mobile_url('formsubmit',array('id'=>$id,'isyuyue'=>$list['isyuyue'])) ?>" method="post" id="formContact">
								<input type="hidden" name="layout_id" value="0">
								<dl>
									<dt class="icon-name"><?php  echo $data['str1'];?>:</dt>
									<dd>
										<input type="text" name="str1" required="required" placeholder="<?php  echo $data['str1'];?>">
									</dd>
								</dl>
								<dl>
									<dt class="icon-tel"><?php  echo $data['str2'];?>:</dt>
									<dd>
										<input type="text" name="str2" required="required" placeholder="<?php  echo $data['str2'];?>">
									</dd>
								</dl>
							<dl>
								<dt class="icon-job"><?php  echo $data['str3'];?>:</dt>
								<dd>
									<label>
										<select name="str3" style="border:none;background:transparent;width:100%;outline:none;margin-left:-23px">
											<option value="<?php  echo $data['str3'];?>"><?php  echo $data['str3'];?></option>
										</select>
									</label>
								</dd>
							</dl>
							<input type="button" class="btn-submit" value="提交" style='background-color:#71B643'>
							<input type="hidden" value="提交失败" data-fail-msg>
							</form>
							
							<div class="u-maskLayer successTipLayer z-hide">
								<p>提交成功</p>
							</div>
						</div>
					</div>
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
		<?php  } ?>
	<?php  } } ?>
   
</section>
<section class="u-note"></section>
<section class="u-pageLoading">
	<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/26/data/images/global/load.gif" alt="loading" />
</section>
<footer class="app-footer">
</footer>

<script type="text/javascript" src="addons/addon10/resource/26/assets/scripts/init.min.js?ver=30"></script> 

<div style="display:none"></div> 
</body>
</html>

