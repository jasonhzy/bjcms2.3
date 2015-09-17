<!doctype html>
<html lang="ch">
<head>
	<title><?php  echo $list['title'];?></title>
<meta charset="utf-8" />
<meta name="apple-touch-fullscreen" content="YES" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="pragram" content="no-cache" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/19/css/main.css?1410785672" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/addtohome/add2home.css?1397525361" />
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/app/offline.js?1397525361"></script> 
<script type="text/javascript">
		var jsVer = 31;
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
	<!-- 声音控件 end-->
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
			<input id="ca-tips"   type="hidden" value="<?php  echo $list['cover_title'];?>" />
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
				<?php  } else if($item['m_type']==5) { ?>
				<!-- 视频 start-->
				<div class='m-page m-video f-hide' data-page-type='video' data-statics='video_list'>
					<div class="page-con lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
						<div class="video-title" style='color:#FFFFFF;'>
							<h3 class='f-tc'></h3>
						</div>
						<div class="video-con j-video" data-video-type="bendi" data-video-src="<?php  echo $this->toimage($data['url']) ?>">
							<div class="img lazy-img" data-src="<?php  echo $this->toimage($data['vthumb']) ?>">
								<span class="css_sprite01"></span>
							</div>
							<div class="video f-hide">
								<div class="videoWrap">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php  } else if($item['m_type']==8) { ?>
				<!--地图-->
				<div class='m-page m-book f-hide' data-page-type='book' data-statics='multi_contact'>
					<div class="page-con lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
						<div class="book-bd f-tc">
							<div class="bd-map j-map" data-mapIndex='42627' data-detal='{"sign_name":"<?php  echo $data['sname'];?>","contact_tel":"<?php  echo $data["tel"];?>","address":"<?php  echo $data["place"];?>"}' data-longitude="<?php  echo $data['lng'];?>" data-latitude="<?php  echo $data['lat'];?>">
								<img class='lazy-img' data-src="<?php  echo $this->toimage($data['mthumb']) ?>"/>
								<span class='css_sprite01'></span>
								<p class='map-animate'><strong></strong><strong></strong></p>
							</div>
							<div class='bd-tit'>
								<h3 class='f-tc'></h3>
							</div>
							<div class='bd-form'>
								<?php  if(!empty($data['tel'])) { ?>
								<p class="tel"><span class='css_sprite01'></span><a href="tel:<?php  echo $data['tel'];?>"><?php  echo $data['tel'];?></a></p>
								<?php  } ?>
								<?php  if(!empty($data['email'])) { ?>
								<p class="email"><span class='css_sprite01'></span><a href="mailto:<?php  echo $data['email'];?>"><?php  echo $data['email'];?></a></p>
								<?php  } ?>
								<?php  if(!empty($data['weixin'])) { ?>
								<p class="wx"><span class="css_sprite01"></span>
									<?php  if(!empty($data['wxurl'])) { ?>
									<a href="<?php  echo $data['wxurl'];?>"><?php  echo $data['weixin'];?></a>
									<?php  } else { ?>
									<?php  echo $data['weixin'];?>
									<?php  } ?>
									</p>
								<?php  } ?>
							</div>	
						</div>
					</div>
				</div>
				<?php  } else if($item['']=9) { ?>
				<div class='m-page m-book f-hide' data-page-type='book' data-statics='multi_contact'>
						<div class="page-con lazy-img" data-src="<?php  echo $this->toimage($item['thumb']) ?>">
					<div class="book-bd f-tc">
					<div class="bd-map j-map" data-mapIndex='127566' data-detal='{"sign_name":"","contact_tel":"0755-111","address":"深圳市南山区文心五路保利文化广场A区3楼"}' data-longitude='113.943614' data-latitude='22.522767'>
				<img class='lazy-img' data-src="<?php  echo $this->toimage($data['mthumb']) ?>"/>
					<span class='css_sprite01'></span>
					<p class='map-animate'><strong></strong><strong></strong></p>
					</div>
					<div class='bd-tit'>
					<h3 class='f-tc'></h3>
					</div>
					<div class='bd-form'>
					<p class="tel"><span class='css_sprite01'></span><a href="tel:0755-86287088">0755-86287088</a></p> <p class="wx"><span class='css_sprite01'></span><a href="http://mp.weixin.qq.com/s?__biz=MjM5OTA0MjA2MA==&amp;mid=201994027&amp;idx=1&amp;sn=1d3311c7c08bedc6f01710c1db67fa92#rd">szpolycinema</a></p> <div class="btn" data-submit='false'>报名</div>
					</div>
					</div>
					<div class="book-bg f-hide">
					<div class="book-form f-hide">
					<h3>填写表单</h3>
					<div class="table">
					<form id='j-signUp'>
					<table>
					<colgroup>
						<col width='20%' />
						<col width='80%' />
					</colgroup>
					<tbody>
						<tr>
							<th>姓名:</th>
							<td><input type="text" placeHolder='填写姓名' name='username' /></td>
						</tr>
						<tr>
							<th>性别:</th>
							<td>
							<div class="sex">
								<p data-sex='1'><span class="value">男</span><span class="select"><strong></strong></span></p>
								<p data-sex='0'><span class="value">女</span><span class="select"><strong></strong></span></p>
								<input type="hidden" value='' name='sex'>
							</div>
							</td>
						</tr>
						<tr>
							<th>手机:</th>
							<td><input type="text" placeHolder='手机' name='tel' /></td>
						</tr>
						<tr>
							<td class='btn' colspan='2'>
								<p id='j-signUp-submit'>提交</p>
							</td>
						</tr>
					</tbody>
					</table>
					</form>
					</div>
						<div class="j-close"><img class="lazy-img j-close-img" data-src="/template/19/img/form_close_img01.png" /></div>
						<p class="u-note u-note-error" data-type="失败"></p>
						<p class="u-note u-note-sucess" data-type="成功"></p>
					</div>
					</div>
					</div>
				</div>
				<?php  } ?>
				<!-- 内页 end-->
			<?php  } } ?>	 
<div class="ylmap bigOpen">
	<div class='bk'><span class='css_sprite01'></span></div>
</div>			
<section class="u-pageLoading">
	<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/14/img/load.gif" alt="loading" />
</section>
<input id="activity_id" type="hidden" value='4085' />
<script src="addons/addon10/resource/19/mod/init_mobile.js?t=1413186713" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="addons/addon10/resource/js/bi.js?v=1410867611"></script>
<script type="text/javascript" src="addons/addon10/resource/js/bi_new.js?v=1413179173"></script>
</body>
</html>
