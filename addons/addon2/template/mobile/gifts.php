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
<link type="text/css" href="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk-list.css?v=2014121113" rel="stylesheet" />
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/jquery.min.js"></script>
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk.js?v=2014121113"></script>
<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/rxhk-myprize.js?v=2014121113q"></script>
<style>
.prize-num0 a {
	color: #d03c3d; padding: 0px 10px 0px 0px; font-size: 38px; line-height: 80px;
}

.prize-num1 a {
	color: green; padding: 0px 10px 0px 0px; font-size: 38px; line-height: 80px;
}
.prize-num2 a {
	color: green; padding: 0px 10px 0px 0px; font-size: 38px; line-height: 80px;
}
	</style>
</head>
<body style="background: rgb(248, 225, 177);">
	
	
	<div class="myprize" >
		<div class="myprize-top">
			<a href="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'index'))?>" class="myprize-back">返回游戏</a>
			<div class="avatar">
				我的奖品<br>
				<a href="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'rule'))?>">活动规则</a>
			</div>
		</div>
		<div class="myprize-box"  >
			<dl class="myprize-dl" style="min-height:480px" >
				
					
												<?php  if(empty($gifts)) { ?>
												<dd>
													<div style="text-align:center;color:red;font-size:23px" ><b>暂时没有奖品哦~继续努力哦~</b></div>						</dd>	
							<?php  } ?>
								
								<?php  if(is_array($gifts)) { foreach($gifts as $item) { ?>
								
									<dd>
										<div class="myprize-img fl">
											
											<img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $item['gifturl'];?>">
										</div>
										
											
												<div class="myprize-word fl">
													<p class="myprize-p1">	<?php  echo $item['award'];?></p>
													<p class="myprize-p2">
														<span><?php  echo date('Y-m-d H:i:s', $item['createtime']);?> </span>
													</p>
													
												</div>
												<div class="prize-num<?php  echo $item['status'];?> fr">
													<a href="#">
															<?php  if($item['status']==0) { ?>	未领奖<?php  } ?>
															<?php  if($item['status']==1) { ?>	不需要领奖<?php  } ?>
															<?php  if($item['status']==2) { ?>	已领奖<?php  } ?>
														</a>
												</div>
											
											
											
										
										<div class="clear"></div>
									</dd>
								
							
						
						<?php  } } ?>
						
						
					
				
			</dl>
			<!--<div class="prize-btn">
				<a href="javascript:openShareMask2();">炫耀我的战绩</a>
			</div>-->
		</div>
	</div>
	<!--分享遮罩层-->
	<div id="shareMask" class="mask" onclick="closeShareMask();">
		<div class="mask-bg"></div>
		<div class="mask-cont">
			<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/sarrow.png" class="indicate">
			<div class="clear"></div>
			<div class="mask-cont-text">
				点击右上角的<img src="<?php  echo WEBSITE_ROOT;?>addons/addon2/template/mobile/images/sicon.png"><span id="maskEdit">就可以分享到朋友圈，告诉大家您今天的手气吧！</span>
			</div>
			<div class="mask-close">
			
			</div>
		</div>
	</div>
</body>
</html>
