<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title><?php  echo $list['title'];?></title>
    <script type="text/javascript">
        document.write('<div id="load-layer"><div id="loading"></div></div>');
        window.onload=function(){
            var load = document.getElementById("load-layer");
            load.parentNode.removeChild(load);
        }
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/css/swiper.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/css/index.css?v=1">
    <link type="text/css" rel="stylesheet" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/css/manimation.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/fancybox/fancybox.css" />
    <style type="text/css">
		body {
			overflow: hidden;
		}
        .type-3{left:0;width:100%;text-align:center}
        .type-3>div{position:static}
        .type-3>div img{display:inline!important}
		.start {
			height: 40px;
			left: 50%;
			margin-left: -20px;
			margin-top: -40px;
			position: absolute;
			bottom: 1%;
			width: 40px;
			z-index: 99;
			overflow: hidden;
		}
		.start strong {
			display: block;
			width: 22px;
			height: 14px;
			position: absolute;
			top: 50%;
			left: 50%;
			margin: -14px 0 0 -11px;
			background-position: 0 -37px;
			background-size: 60px;
			animation: start 1.5s ease-in-out 0s infinite normal;
			-webkit-animation: start 1.5s ease-in-out 0s infinite normal;
		}
		.tagcloud ul li a img {
			width: 102px;
			margin-left:-25%;
		}
		.tagcloud ul li a .tips img {
			width: 120px;
			margin-left: 0;
		}
    </style>
    <?php  include addons_page('share');?> 
</head>
<body>
<?php  if((!empty($list['cover1'])&&($list['first_type']==2))) { ?>
<div id="mas">
    <canvas id="cas" ></canvas>
</div>
<?php  } ?>
<div class="swiper-container">
    <!--音乐控制-->
    <div class="audio-controls on"></div>
    <!-- 滑动操作指示 -->
    <div class="start"><strong></strong></div>
    <!-- 主体 -->
    <div class="swiper-wrapper">
        <?php  if((!empty($list['cover1'])&&($list['first_type']==2))) { ?>
        <div class="swiper-slide slide1" style="background: url('<?php  echo $this->toimage($list['cover2']) ?>') no-repeat center center; background-size: 100% 100%;">
        </div>
        <?php  } else { ?>
        <div class="swiper-slide slide1" style="background: url('<?php  echo $this->toimage($list['cover']) ?>') no-repeat center center; background-size: 100% 100%;">
        </div>
        <?php  } ?>
        <?php  $i = 1; ?>
        <?php  if(is_array($items)) { foreach($items as $item) { ?>
        <!-- 内页 -->
        <?php  $data=$this->iunserializer($item['param']);$i++ ?>
        <?php  if($item['m_type']==1) { ?>
        <div class="swiper-slide slide<?php  echo $i;?>" data-type="<?php  echo $item['m_type'];?>"
             style="background: url('<?php  echo $this->toimage($item['thumb']) ?>') no-repeat center center; background-size: 100% 100%;">
        </div>
        <?php  } else if($item['m_type']==2) { ?>
        <div class="swiper-slide slide<?php  echo $i;?>" data-type="<?php  echo $item['m_type'];?>"
             style="background: url('<?php  echo $this->toimage($item['thumb']) ?>') no-repeat center center; background-size: 100% 100%;">
            <?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $k => $row) { ?>
            <?php  if(($item['type']==0)) { ?>
            <?php  $size = GetImageSize($this->toimage($row)); ?>
            <div class="<?php  echo $data['animations'][$k];?>" style="height:<?php  echo $size['1']/10.08 ?>%;width:<?php  echo $size['0']/6.4 ?>%;top:<?php  echo $data['y'][$k]/10.08 ?>%;left:<?php  echo $data['x'][$k]/6.40 ?>%;"><?php  if(!empty($data['url'][$k])) { ?><?php  if(($data['url'][$k]=='#share')) { ?><a href="javascript:$('#mcover').show()"><?php  } else { ?><a class="_fancy _iframe" href="<?php  echo $data['url'][$k] ?>"><?php  } ?><img src="<?php  echo $this->toimage($row) ?>" style="width:100%;height:100%;"/></a><?php  } else { ?><img src="<?php  echo $this->toimage($row) ?>" style="width:100%;height:100%;"/><?php  } ?></div>
            <?php  } ?>
            <?php  } } ?>
        </div>
        <?php  } else if($item['m_type']==3) { ?>
        <div class="swiper-slide slide<?php  echo $i;?>" data-type="<?php  echo $item['m_type'];?>"
             style="background: url('<?php  echo $this->toimage($item['thumb']) ?>') no-repeat center center; background-size: 100% 100%;">
            <div class="type-3">
                <?php  if($data['pic1']) { ?>
                <div class="bouncedown"><img src="<?php  echo $this->toimage($data['pic1']) ?>"></div>
                <?php  } ?>
                <?php  if($data['pic2']) { ?>
                <div class="bouncedown"><img src="<?php  echo $this->toimage($data['pic2']) ?>"></div>
                <?php  } ?>
                <?php  if($data['pic3']) { ?>
                <div class="bouncedown"><img src="<?php  echo $this->toimage($data['pic3']) ?>"></div>
                <?php  } ?>
            </div>
            <div id="tagcloud_<?php  echo $item['id'];?>" class="tagcloud" style="width:100%;height:60%;margin-top:40%;">
                <ul>
                    <?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $k => $row) { ?>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?php  echo $this->toimage($row) ?>"/>
                            <div class="tips">
                                <div class="name"><?php  echo $data['title'][$k];?></div>
                                <div class="duty"><?php  echo $data['brief'][$k];?></div>
                                <div class="triangle" style="left: 15px;"></div>
                                <img src="<?php  echo $this->toimage($row) ?>" class="avatar">
                            </div>
                        </a>
                    </li>
                    <?php  } } ?>
                </ul>
            </div>
        </div>
        <?php  } else if($item['m_type']==4) { ?>
        <div class="swiper-slide slide<?php  echo $i;?>" data-type="<?php  echo $item['m_type'];?>"
             style="background: url('<?php  echo $this->toimage($item['thumb']) ?>') no-repeat center center; background-size: 100% 100%;">
            <div id="amap" style="width:100%;height:100%"
                 data-sname="<?php  echo $data["sname"];?>" data-address="<?php  echo $data["place"];?>" data-location="<?php  echo $data['lat'];?>,<?php  echo $data['lng'];?>">
            <?php  if($data['mthumb']) { ?><img src="<?php  echo $this->toimage($data['mthumb']) ?>" style="width:100%;height:100%"/><?php  } ?>
        </div>
    </div>
    <?php  } else if($item['m_type']==5) { ?>
    <div class="swiper-slide slide<?php  echo $i;?>" data-type="<?php  echo $item['m_type'];?>"
         style="background: url('<?php  echo $this->toimage($item['thumb']) ?>') no-repeat center center; background-size: 100% 100%;">
        <div id="apost" style="width:100%;height:100%">
            <?php  if($data['mthumb']) { ?><img src="<?php  echo $this->toimage($data['mthumb']) ?>" style="width:100%;height:100%"/><?php  } ?>
            <div id="postlist" style="display:none;">
                <?php  if(is_array($data['title'])) { foreach($data['title'] as $k => $row) { ?>
                <input class="apost-input" type="text" id="k_<?php  echo md5($row) ?>" placeholder="<?php  echo $row;?>">
                <?php  } } ?>
                <input class="apost-input butt" type="button" value="提交">
            </div>
        </div>
    </div>
    <?php  } ?>
    <?php  } } ?>
</div>
</div>
<?php  if($list['bg_music_switch']==1) { ?>
<!-- 背景音乐 -->
<audio id="audio" <?php  if($huabao['mauto']) { ?>autoplay="autoplay"<?php  } ?> <?php  if($huabao['mloop']) { ?>loop="loop"<?php  } ?>>
<source src="<?php echo WEBSITE_ROOT;?>attachment/<?php  echo $list['bg_music_url'] ?>" type="audio/mpeg" />
</audio>
<?php  } ?>

<div class="ylmap bigOpen">
    <div class='bk'></div>
    <p class="map_close_btn" onclick="onmap(this);">退出</p>
</div>
<div class="ylpost bigOpen">
    <div class='bk'></div>
    <div class='bk2'></div>
    <a href="javascript:void(0);" class="u-maskLayer-close"></a>
    <p class="map_close_btn" onclick="onmap(this);">退出</p>
</div>

<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/jquery.min.js"></script>
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/swiper.min.js"></script>
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/wechat.min.js"></script>
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/fancybox/fancybox.js"></script>
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/jquery.mousewheel.min.js"></script>
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/jquery.tagsphere.min.js"></script>
<?php  if((!empty($list['cover1'])&&($list['first_type']==2))) { ?>
<!-- 手指擦除效果 -->
<script src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/custom/js/tapclip.min.js"></script>
<script type="text/javascript">
    var canvas = document.getElementById("cas"),ctx = canvas.getContext("2d");
    var x1,y1,a=20,timeout,totimes = 100,jiange = 20;
    canvas.width = document.getElementById("mas").clientWidth;
    canvas.height = document.getElementById("mas").clientHeight;
    var img = new Image();
    img.src = "<?php  echo $this->toimage($list['cover1']) ?>";
    img.onload = function(){
        ctx.drawImage(img,0,0,canvas.width,canvas.height)
        tapClip()
    }
</script>
<?php  } ?>
<script type="text/javascript">
    function onmap(obj) {
        $(obj).parents(".bigOpen").find(".bk").html();
        $(obj).parents(".bigOpen").removeClass("show").removeClass("mapOpen");
    }
    <!-- 滑动 -->
    var mySwiper = new Swiper('.swiper-container',{
        loop:1,
        mode:'vertical',
        tdFlow: {
            rotate :60,
            depth: 150
        },
        onTouchEnd: function(swiper){
            //云标签
            $intemp = $(swiper.activeSlide());
            if ($intemp.attr("data-type") == "3") {
                var _t = $intemp.find(".tagcloud");
                var _w = $(window).height();
                _t.tagcloud({zoom:100,fps:20,centrex:_t.outerWidth() / 2, centrey:_t.outerHeight() / 2});
                _t.css({"height":parseInt(_w*0.40),"margin-top":0,"top":parseInt(_w*0.18),"left":"-5%","padding-right":"2%","position":"absolute"});
                $("body").append(_t);
                $(".tagcloud").show();
            }else{
                $(".tagcloud").hide();
            }
        },
        onSlideClick:function(swiper){
            var obj;
            $intemp = $(swiper.activeSlide());
            if ($intemp.attr("data-type") == "4") {
                //地图
                obj = $intemp.find("#amap");
                if (obj) {
                    var lmap = $(".ylmap");
                    if (!lmap.hasClass("show")) {
                        lmap.find(".bk").html('<iframe src="http://api.map.baidu.com/marker?location='+obj.attr("data-location")+'&title='+encodeURIComponent(obj.attr("data-sname"))+'&content='+encodeURIComponent(obj.attr("data-address"))+'&output=html&src=ddb|ddb" width="100%" height="100%" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>');
                    }
                    lmap.toggleClass("show");
                    setTimeout(function(){
                        lmap.toggleClass("mapOpen");
                    },1);
                }
            }else if ($intemp.attr("data-type") == "5") {
                //表单
                obj = $intemp.find("#apost");
                if (obj) {
                    var lpost = $(".ylpost");
                    if (!lpost.hasClass("show")) {
                        lpost.find(".bk").html(obj.find("#postlist").html());
                        lpost.find(".bk2,.u-maskLayer-close").click(function(){
                            $(this).parents(".bigOpen").removeClass("show").removeClass("mapOpen");
                        });
                        setTimeout(function(){
                            lpost.find(".bk").css({"margin-top":parseInt(($(window).height()-lpost.find(".bk").height())/2)-20});
                            lpost.find(".butt").click(function(){
                                var s = '';
                                lpost.find(".bk").find("input").each(function(){
                                    s+= $(this).attr("id") + '=' + $(this).val() + "&";
                                    s+= 'k' + $(this).attr("id") + '=' + $(this).attr("placeholder") + "&";
                                });
                                $.ajax({
                                    url: "<?php  echo mobile_url('formsubmit',array('id'=>$id,'isyuyue'=>$list['isyuyue'])) ?>",
                                    type: "POST",
                                    data: s,
                                    dataType: "json",
                                    success: function (data) {
                                        if (data != null && data.data != null && data.data == 200) {
                                            alert("提交成功");
                                            lpost.find(".bk2").click();
                                        } else {
                                            alert("提交失败");
                                        }
                                    }
                                });
                            });
                        },10);
                    }
                    lpost.toggleClass("show");
                    setTimeout(function(){
                        lpost.toggleClass("postOpen");
                    },1);
                }
            }
        }
    });
    <?php  if($list['isshake']) { ?>
        //摇一摇翻页
        var color = new Array('#fff', '#ff0', '#f00', '#000', '#00f', '#0ff');
        if (window.DeviceMotionEvent) {
            $(".start").hide();
            $iiiin = $("<div class='shakefloor'><span></span></div>");
            $iiiin.css({
                'position': 'fixed',
                'top': '0',
                'left': '0',
                'height': '100%',
                'width': '100%',
                'background': 'rgba(255, 255, 255, 0)',
                'z-index':9998
            });
            $iiiin.find("span").css({
                    'cursor': 'pointer',
                    'width': '44px',
                    'height': '44px',
                    'position': 'absolute',
                    'top': '3%',
                    'right': '3%',
                    'z-index': '9999'
            }).click(function(){
                $(".audio-controls").click();
            });
            $("body").append($iiiin);
            var speed = 25;
            var x = y = z = lastX = lastY = lastZ = 0;
            window.addEventListener('devicemotion', function(){
                var acceleration =event.accelerationIncludingGravity;
                x = acceleration.x;
                y = acceleration.y;
                if(Math.abs(x-lastX) > speed || Math.abs(y-lastY) > speed) {
                    if (mySwiper.activeIndex == 1) {
                        $iiiin.hide();
                        $(".start").show();
                        mySwiper.swipeNext();
                    }
                }
                lastX = x;
                lastY = y;
            }, false);
        }
        <?php  } ?>
            <!-- 音频暂停播放 -->
            var audioAuto = document.getElementById('audio');
            audioAuto.play();


            $(".audio-controls").click(function (){
                if (audioAuto.paused) {
                    audioAuto.play();
                    $(".audio-controls").addClass("on");
                } else {
                    audioAuto.pause();
                    $(".audio-controls").removeClass("on");
                }
            })
</script>
<!-- 弹出层设置 -->
<script type="text/javascript">
    $(document).ready(function() {
        function stopScrolling( touchEvent ) {
            if (mySwiper.activeIndex == 1) {
                touchEvent.preventDefault();
            }
        }
        //document.addEventListener( 'touchstart' , stopScrolling , false );
        document.addEventListener( 'touchmove' , stopScrolling , false );
        $(".fancy").fancybox({
            'width':'100%',
            'height'	:'100%',
            'margin':'0',
            'padding':'0',
            'scrolling':'no',
            'autoScale':'false',
            'type':'iframe'
        });
    });
</script>
<div id="mcover" onclick="$(this).hide()"><img src="addons/addon10/style/img/guide2.png"></div>
</body>
</html>
