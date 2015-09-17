<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php  echo $list['title'];?></title>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1,user-scalable=no">
<meta name="apple-touch-fullscreen" content="YES" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/app/offline.js?1397525361"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/com/css/copyright.css?1376447814" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/css/1_bootstrap.css?1392537612" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/css/2_style.css?1392537612" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/css/3_custom.css?1392537612" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/css/4_arrow.css?1388051846" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/addtohome/add2home.css?1397525361" />
<?php  include addons_page('share');?> 
</head>
<body> 
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/modernizr.custom.79639.js"></script>
<div id="st-container" class="st-container">
<nav class="st-menu st-effect-2 catalog" style="pointer-events:none;display:none;">
<div class="navbar navbar-fixed-top navbar-inverse" style='position:static;height:7%;'>
<div class="navbar-inner">
<div style="width: auto; padding: 0 20px;" class="container">
<a class="brand">目录</a>
</div>
</div>
</div>
<div class="grid-margin-5" style="height: 93%;overflow:hidden;" id='leftScorll'>
<div>
<ul class="ui-grid-a catalog-inner img-nav-ul"></ul>
<div id="yl-copyright">
<div style="float:left;padding-top: 2px;"></div>
<div style="float:right;margin-right:5px;"><span><b> 场景应用</b> 技术提供</span></div>
</div>
</div>
</div>
</nav>
<div class="container-fluid demo-1 st-pusher">
<div id="slider" class="sl-slider-wrapper st-content">
<div data-status=0 id="st-trigger-effects" class="menu-switch"></div>
<div class="sl-slider">
	<?php  $i=1 ?>
	<?php  if(is_array($items)) { foreach($items as $item) { ?>
	<!-- 内页 -->
		<?php  $data=$this->iunserializer($item['param']); ?>
		<?php  if($item['m_type']==1) { ?>
			<?php  if($i==1) { ?>
			<div id="realty-poster" class="sl-slide" data-plugin='' data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
				<input type="hidden" class="nav-bg-thumb" value="<?php  echo $this->toimage($item['thumb']) ?>" />
				<div class="sl-slide-inner">
				<div class="bg-img" style="background-image:url(<?php  echo $this->toimage($item['thumb']) ?>)"></div>
				</div>
			</div>
			<?php  } else { ?>
			<div data-plugin="" class="sl-slide rotating" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
				<input type="hidden" class="nav-bg-thumb" value="<?php  echo $this->toimage($item['thumb']) ?>" />
				<div class="sl-slide-inner">
				<div class="bg-img" style="background-image:url(<?php  echo $this->toimage($item['thumb']) ?>)" /></div>
				<div class="blockquote">
				<p class="half"></p>
				<cite></cite>
				</div>
			</div>
			<?php  } ?>
		<?php  } else if($item['m_type']==21) { ?>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
			<div data-plugin="map" class="sl-slide slide-map" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
			<input type="hidden" class="nav-bg-thumb" value="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/images/menu-map.png" />
			<div id="map" class="noSwipe" style='width: 100%;height: 200px;margin:0 auto;'></div>
			<div class="map-dh-btn btn swipe-click" data-href="<?php  echo mobile_url('map',array('title'=>$data['sname'],'lng'=>$data['lng'],'lat'=>$data['lat'],'tel'=>$data['tel'],'addr'=>$data['place'])) ?>">
			<i class="map-dh-btn-i"></i>导航
			</div>
			<input type='hidden' value='[{"longitude":"<?php  echo $data['lng'];?>","latitude":"<?php  echo $data['lat'];?>"}]' id='marker_array'>
			<input type='hidden' value='[{"address":"<?php  echo $data['place'];?>"}]' id='address_array'>
			<div class="sl-slide-inner half store-image-box">
			<div class="grid-margin-5">
			<ul class="ui-grid-a" style="clear: none;">
			<?php  if(is_array($data['thumb'])) { foreach($data['thumb'] as $row) { ?>
				<li class="ui-block-a  " style="clear: none;" data-status=0>
					<div class="grid-margin-5">
						<img class="noSwipe view-img per-image-thumb lazy-img" data-src="<?php  echo $this->toimage($row) ?>" />
					</div>
				</li>
			<?php  } } ?>
			</ul>
			</div>
			</div>
		</div>
		<?php  } else if($item['m_type']==22) { ?>
		<div data-plugin='order' class="sl-slide common " data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
			<input type="hidden" class="nav-bg-thumb" value="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/images/menu-order.png" />
			<div class="sl-slide-inner">
			<div class=" container-fluid look-house" id="look-house-input" style="background: #FFFFFF;">
			<div class="navbar navbar-fixed-top" style="position: absolute;">
			<div class="navbar-inner">
			<div style="width: auto; padding: 0 20px;" class="container">
			<a href="#" class="brand"><?php  if(empty($data['title'])) { ?>看房指引<?php  } else { ?><?php  echo $data['title'];?><?php  } ?></a>
			</div>
			</div>
			</div>
			<div class="main-content">
			<p><p>
			<?php  if(!empty($data['mthumb'])) { ?>
			<img src="<?php  echo $this->toimage($data['mthumb']) ?>" alt="" />
			<?php  } ?>
			</p></p>
			<?php  if(!empty($data['str1'])) { ?>
			<div class="input-prepend">
				<span class="btn"><?php  echo $data['str1'];?></span>
				<input type="text" name="str1" />
			</div>
			<?php  } ?>
			<?php  if(!empty($data['str1'])) { ?>
			<div class="input-prepend">
				<span class="btn"><?php  echo $data['str2'];?></span>
				<input type="text" name="str2" />
			</div>
			<?php  } ?>
			<?php  if($data['str3']==1) { ?>
			<div class="input-prepend">
				<span class="btn">预约日期</span>
				<select name="month">
 					<option value="1">1月</option>
					<option value="2">2月</option>
					<option value="3">3月</option>
					<option value="4">4月</option>
					<option value="5">5月</option>
					<option value="6">6月</option>
					<option value="7">7月</option>
					<option value="8">8月</option>
					<option value="9">9月</option>
					<option value="10">10月</option>
					<option value="11">11月</option>
					<option value="12">12月</option>
				</select>
				<select name="day">
					<option value="1">1日</option>
					<option value="2">2日</option>
					<option value="3">3日</option>
					<option value="4">4日</option>
					<option value="5">5日</option>
					<option value="6">6日</option>
					<option value="7">7日</option>
					<option value="8">8日</option>
					<option value="9">9日</option>
					<option value="10">10日</option>
					<option value="11">11日</option>
					<option value="12">12日</option>
					<option value="13">13日</option>
					<option value="14">14日</option>
					<option value="15">15日</option>
					<option value="16">16日</option>
					<option value="17">17日</option>
					<option value="18">18日</option>
					<option value="19">19日</option>
					<option value="20">20日</option>
					<option value="21">21日</option>
					<option value="22">22日</option>
					<option value="23">23日</option>
					<option value="24">24日</option>
					<option value="25">25日</option>
					<option value="26">26日</option>
					<option value="27">27日</option>
					<option value="28">28日</option>
					<option value="29">29日</option>
					<option value="30">30日</option>
					<option value="31">31日</option>
				</select>
			</div>
			<?php  } ?>
			<a style="margin-bottom: 40px;margin-top:30px;" id="form_submit_btn" class="btn btn-success btn-large btn-block swipe-click">预约</a>
			<input type="hidden" name="success_msg" value="<?php  if(empty($data['tips'])) { ?>预约完成，稍后会有大客户经理与您联系。<?php  } else { ?><?php  echo $data['tips'];?><?php  } ?>" />
			</div>
			</div>
			</div>
		</div>
		<?php  } ?>
	<?php  } } ?>
 </div>
<nav id="nav-arrows" class="nav-arrows" style="display:none;">
<span class="nav-arrow-prev"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/images/arrow_left.png" alt="" /></span>
<span class="nav-arrow-next"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/images/arrow_right.png" alt="" /></span>
</nav>
<div id="arrow-h" class="animateYl animateYl01 hide_">
<span class="shou"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/13/images/shou.png" alt="" /></span>
<span class="cyyle"><img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/13/images/cycle02.png" alt="" /></span>
<span class="bg"></span>
</div>
</div>
</div>
</div>
<div id="bigimg-box" data-plugin="" style="display: none">
<img src="" />
</div>
<div class="dialog" id="dialog" style="display: none;pointer-events:none;">
<div class="bar"><span class="title"></span></div>
<div class="content">
<div class="modal-body" style="min-height:50px;padding:0px;width:100%"></div>
<button id="close-dialog-btn">确定</button>
</div>
</div>
<div class="dialog-overlay" id="dialog-overlay"> </div>
<div id="activity_id" style="display:none;">2662</div>
<div id="channel_id" style="display:none;">1</div>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/jquery1.8.2.min.js?1397525361"></script>
 <script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/layout/index.js?1397861861"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/js/1_jquery.ba-cond.min.js?1379903920"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/js/2_jquery.slitslider.js?1380443222"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/js/3_jquery.touchSwipe.min.js?1394088740"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/js/13_main.js?1394088740"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/js/iscroll.js?1388051846"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/js/addtohome/add2home.js?1404374396"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/plugin/info_fullview/js/1_pano2vr_player.js?1380018938"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/plugin/info_fullview/js/2_3dvr.js?1380018938"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/plugin/store/js/iscroll-zoom.js?1389440538"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/plugin/store/js/iview.js?1388208842"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/plugin/store/js/store.js?1388208842"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/6/plugin/input_withdesc/js/input_withdesc.js?1398511605"></script>

</body>
</html>