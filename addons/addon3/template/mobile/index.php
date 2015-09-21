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
       
        <div id="outercont">
            <div id="outer-cont">
                <div id="outer"><img src="<?php  echo WEBSITE_ROOT;?>addons/addon3/template/mobile/style/activity-lottery-3.png"></div>
            </div>
            <div id="inner-cont">
                <div id="inner">
                    <img src="<?php  echo WEBSITE_ROOT;?>addons/addon3/template/mobile/style/activity-lottery-2.png">
                </div>
            </div>
        </div>
        <div class="content">
            <div class="boxcontent boxyellow" id="result" <?php  if(!(!empty($awardone)&&empty($fans['tel']))) { ?>style="display:none"<?php  } ?>>
                <div class="box">
                    <div class="title-orange"><span>恭喜你中奖了</span></div>
                    <div class="Detail">
                        <p>你中了：<span class="red" id="prizetype"><?php  if(empty($awardone['name'])) { ?>感谢参与<?php  } else { ?><?php  echo $awardone['name'];?> -  <?php  echo $awardone['description'];?><?php  } ?></span></p>
                        <p style="display:none">兑奖<?php  echo $reply['sn_rename'];?>：<span class="red" id="sncode"><?php  echo $awardone['award_sn'];?></span></p>
					              <p><input class="pxbtn" name="再来一次" id="save-btn" type="button" value="再来一次" onclick="location.href='<?php  echo create_url('mobile',array('name' => 'addon3','do' => 'index'))?>';"></p>
                    </div>
                </div>
            </div>
			<?php  if($isshare==1) { ?>
            <div class="boxcontent boxyellow">
				<div class="box">
					<div class="title-orange">参与方法:</div>
					<div class="Detail"><?php  echo htmlspecialchars_decode($reply['share_txt'])?></div>
					</div>
				</div>
			</div>	
			<?php  } ?>			
            <div class="boxcontent boxyellow">
                <div class="box">
                    <div class="title-green"><span>奖项设置：</span></div>
                    <div class="Detail">
                        <?php  echo $awardstr;?>                                                                                                                                        </div>
					</div>
				</div>
            </div>
            <div class="boxcontent boxyellow">
                <div class="box">
                    <div class="title-green">活动说明：</div>
                    <div class="Detail">
						<p class="red" ><?php  echo $detail;?></p>
						<p class="green" >活动时间: <br><?php  echo date('Y-m-d H:i',$reply['starttime']);?> 至 <?php  echo date('Y-m-d H:i',($reply['endtime']+86399));?></p>
						<p><?php  echo $reply['description'];?></p>
							<p>
								 <p class="green">&nbsp;&nbsp;&nbsp;<input  name="已获得奖品"  style="width:100px"  type="button" value="已获得奖品" onclick="location.href='<?php  echo create_url('mobile',array('name' => 'addon3','do' => 'gifts'))?>';"></p>
                   </p>
						
                    </div>
                </div>
            </div>
			<?php  if(!empty($award)) { ?>
			<div class="boxcontent boxwhite">
				<div class="box">
					<div class="title-red"><span>恭喜你中奖了</span></div>
					<div class="Detail">
						<?php  if(is_array($award)) { foreach($award as $row) { ?>
						<p>你中了：<span class="red" id="name"><?php  if(empty($row['name'])) { ?>感谢参与<?php  } else { ?><?php  echo $row['name'];?>  -  <?php  echo $row['description'];?> <?php  } ?></span></p>
						<p>兑奖<?php  echo $reply['sn_rename'];?>：<span class="red" id="sncode" ><?php  echo $row['award_sn'];?></span></p>
						<p><input class="pxbtn" name="再来一次" id="save-btn" type="button" value="再来一次" onclick="location.href='<?php  echo create_url('mobile',array('name' => 'addon3','do' => 'index'))?>';"></p>
						<?php  } } ?>
						<?php  echo $reply['ticket_information'];?></p>
					</div>
				</div>
			</div>	
			<?php  } ?>			
        </div>
	</div>

    <script type="text/javascript">
        $(function () {
            window.requestAnimFrame = (function () {
                return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
                function (callback) {
                    window.setTimeout(callback, 1000 / 60)
                }
            })();
            var totalDeg = 360 * 3 + 0;
            var steps = [];
            var lostDeg = [30, 90, 150, 210, 270, 330];
            var prizeDeg = [6, 66, 126, 186, 246, 306];
            var prize, sncode,prizename,prizedes;
            var count = 0;
            var now = 0;
            var a = 0.01;
            var outter, inner, timer, running = false;
            function countSteps() {
                var t = Math.sqrt(2 * totalDeg / a);
                var v = a * t;
                for (var i = 0; i < t; i++) {
                    steps.push((2 * v * i - a * i * i) / 2)
                }
                steps.push(totalDeg)
            }
            function step() {
                outter.style.webkitTransform = 'rotate(' + steps[now++] + 'deg)';
                outter.style.MozTransform = 'rotate(' + steps[now++] + 'deg)';
                if (now < steps.length) {
                    running = true;
                    requestAnimFrame(step)
                } else {
                    running = false;
                    setTimeout(function () {
                        if (prize != null) {
                            $("#sncode").text(sncode);
                            $("#prizetype").text(prizename + " - " + prizedes);
                            $("#result").slideToggle(500);
                            //$("#outercont").slideUp(500)
                        } else {
                            alert("<?php  echo $reply['repeat_lottery_reply'];?>")
                        }
                    },
                    200)
                }
            }
function run(){
     running = true;
                        timer = setInterval(function () {
                            i += 5;
                            outter.style.webkitTransform = 'rotate(' + i + 'deg)';
                            outter.style.MozTransform = 'rotate(' + i + 'deg)'
                        },
                        1)
}
            function start(deg) {
                deg = deg || lostDeg[parseInt(lostDeg.length * Math.random())];
                running = true;
                clearInterval(timer);
                totalDeg = 360 * 2 + deg;
                steps = [];
                now = 0;
                countSteps();
                requestAnimFrame(step)
            }
            window.start = start;
            outter = document.getElementById('outer');
            inner = document.getElementById('inner');
            i = 10;
            $("#inner").click(function () {
	  if (running) return;
                /*if (prize != null) {
                    alert("亲，你不能再参加本次活动了喔！下次再来吧~");
                    return
                }*/
 
                $.ajax({
                    url: "<?php  echo create_url('mobile',array('name' => 'addon3','do' => 'getaward'))?>",
                    dataType: "json",
                    data: {
                        t: Math.random()
                    },
                    beforeSend: function () {
                       
                    },
                    success: function (data) {
                        if (data.success) {
                            
                            if(data.success==1) {
                                run();
                                prize = data.prizetype;
                                prizename = data.name;
                                prizedes = data.award;
                                sncode = data.sn;							
                                start(prizeDeg[data.prizetype - 1]);
                                
                                if($("#count").length>0){
							$("#count").text(parseInt($("#count").text())+1);
						}
						if($("#totalcount").length>0){
							$("#totalcount").text(parseInt($("#totalcount").text())+1)
						}
                                                
                            }
                            else{
                                  prize = null;  clearInterval(timer);
                                  alert( data.msg );
                            }
                        } else {
                            prize = null;run();
                            start();
                            
                            if($("#count").length>0){
							$("#count").text(parseInt($("#count").text())+1);
						}
						if($("#totalcount").length>0){
							$("#totalcount").text(parseInt($("#totalcount").text())+1)
						}
                                                
                        }
                        running = false;
                        count++;
						
                    },
                    error: function () {
                        prize = null;
                        start();
                        running = false;
                        count++;
                    },
                    timeout: 15000
                })
				 
            })
        });

    </script>
<footer style="text-align:center; color:#ffd800;margin:20px"><a>&copy;<?php  echo $reply['copyright'];?></a></footer>
</body>
</html>
</body>
</html>
