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
<link type="text/css" href="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk.css?v=2014121113" rel="stylesheet" />
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/jquery.min.js"></script>
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/idangerous.swiper.min.js"></script>
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk.js?v=2014121113"></script>
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk-index.js?v=2014121113a12"></script>

</head>
<body>
	
			
			<div class="swiper-slide" style="width:100%;min-height:100%">
				<div class="five-box">
					<div class="five-con" >
						<h3 style="">活动规则</h3>
						<div class="five-word"  style="mingth-width:90%;min-height:300px">
							<p >		<?php  echo $xc_zjp['rule'];?></p>
						
							<p>
								<a style="float:right;color:red;" href="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'index'))?>"><b>返回游戏</b></a>
							</p>
						</div>
					</div>
				</div>

			</div>
			

</body>
</html>
