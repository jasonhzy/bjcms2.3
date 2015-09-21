<?php defined('SYSTEM_IN') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css" href="<?php  echo WEBSITE_ROOT;?>addons/addon3/template/mobile/style/style.css" media="all" />
	<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon3/template/mobile/style/zepto.js"></script>
	<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon3/template/mobile/style/alert.js"></script>	
    <title><?php  echo $reply['title'];?></title>
</head>
<body class="activity-lottery-winning">
    <div class="main">
       
    	
            <div class="boxcontent boxyellow">
                <div class="box">
                    <div class="title-green"><span>奖项设置：</span></div>
                    <p class="green" style="margin-top:5px">&nbsp;&nbsp;&nbsp;<input  name="返回游戏" style="width:100px"  type="button" value="返回游戏" onclick="location.href='<?php  echo create_url('mobile',array('name' => 'addon3','do' => 'index'))?>';"></p>
                    <div class="Detail">
                         <table class="table " style="width:100%">
            <thead class="navbar-inner">
                <tr style="text-align:center">
                    <th style="width:50px;text-align:center" >序号</th>
                       <th style="width:20%;">SN码</th>
                       <th style="width:20%;">奖品类别</th>
                      <th style="width:20%;">状态</th>
                        <th style="width:20%;">中奖时间</th>
                </tr>
            </thead>
            <tbody>
                <?php $index=1; if(is_array($gifts)) { foreach($gifts as $adv) { ?>
                <tr style="text-align:center">
                    <td style="text-align:center"><?php  echo $index++;?></td>
                    <td><?php  echo $adv['award_sn'];?></td>
                    <td><?php  echo $adv['name'];?></td>
                    <td><?php  echo $adv['status']==0?'未领取':'';?><?php  echo $adv['status']==0?'未领取':'';?><?php  echo $adv['status']==1?'已中奖':'';?><?php  echo $adv['status']==2?'已兑奖':'';?></td>
                    <td><?php  echo date('Y-m-d H:i:s', $adv['createtime'])?></td>
                 </tr>
                <?php  } } ?>
            </tbody>
        </table>                                                                                                                                       </div>
							</div>
			</div>
			</div>
<footer style="text-align:center; color:#ffd800;margin:20px"><a>&copy;<?php  echo $reply['copyright'];?></a></footer>
</body>
</html>
</body>
</html>
