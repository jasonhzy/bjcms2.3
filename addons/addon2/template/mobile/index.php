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
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk.js?v=20141213"></script>
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk-index.js?v=20141211112"></script>

</head>
<body>
		
						<a href="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'lottery'))?>">
							<?php  if(!empty($xc_zjp['bgurl'])) { ?>
								<img align="center" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $xc_zjp['bgurl'];?>"  width="100%"  >
								<?php  } else { ?>
							<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/index.jpg"  width="100%" >
								<?php  } ?></a>
				
</body>
</html>
