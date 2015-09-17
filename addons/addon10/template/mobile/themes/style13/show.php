
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no" />
<title><?php  echo $list['title'];?></title>
<link rel="stylesheet" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/css/index.css" type="text/css" />
<link rel="stylesheet" href="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/css/animations.css" type="text/css" />
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/js/Fx.js"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/js/hammer.js"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/js/TweenMax.min.js"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/js/slide_plug.js"></script>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/js/PxLoader.js"></script>
<?php  include addons_page('share');?> 
</head>
<body>
<div id="loading-black">
  <p>
  	<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/images/logo.png" width="200" /><br />
  	<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/images/load.gif" width="200" />
  </p>
</div>

<span class="sound-on" style="display:block"></span>
<img src="<?php echo WEBSITE_ROOT;?>/addons/addon10/resource/013/images/ico.png" class="ico startico" />
<div id="main">

	<?php  if(is_array($items)) { foreach($items as $item) { ?>
		<!-- 内页 -->
		<?php  $data=$this->iunserializer($item['param']); ?>
		<?php  if($item['m_type']==11) { ?>
 			<div class="liuliang_pages pages_current ">
				<p class="pstyle center" style=" text-align:center; background:none;"><?php  echo $data['str1'];?><br />
				  <?php  echo $data['str2'];?></p>
				<ul>
				<?php  $i=0; ?>
				<?php  $order=array(1,2,3,4,16,17,18,5,15,24,19,6,14,23,20,7,13,22,21,8,12,11,10,9); ?>
				<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $row) { ?>
				  <?php $j=isset($order[$i])?$order[$i]:$i; ?>
				  <li id="sml<?php  echo $j;?>"><img src="<?php  echo $this->toimage($row) ?>" width="160" /></li>
				  <?php  $i++ ?>
 				<?php  } } ?>
				</ul>
		  </div>
		<?php  } else if($item['m_type']==12) { ?>
			<?php  $pics[]=$item['thumb'] ?>
			<div class="liuliang_pages" style="background:url(<?php  echo $this->toimage($item['thumb']) ?>) no-repeat center center;">
				<p class="pstyle" style="top:<?php  echo $data['top'];?>%;"><?php  echo $data['str1'];?><br />
			<?php  echo $data['str2'];?></p>
			</div>
		<?php  } else if($item['m_type']==13) { ?>
		  <div class="liuliang_pages" >
			<p class="pstyle " style=" top:50px;color: #fff;left: 0;margin: auto;right: 0; text-align:center;;padding: 0 8%;">	<img src="<?php  echo $this->toimage($data['logo']) ?>" width="280" /><br /><br /><?php  echo $data['str1'];?><br />
			  <?php  echo $data['str2'];?><br />
			  <?php  echo $data['str3'];?><br /><br />
			  <?php  if(!empty($data['logo'])) { ?><img src="<?php  echo $this->toimage($data['qrcode']) ?>" /><?php  } ?>
			</p>
		  </div>
		 <?php  } ?>
	<?php  } } ?>
</div>
<?php  if($list['bg_music_switch']==1) { ?>
<div style="position:absolute; left:-9999px; overflow:hidden; width:0; height:0;">
     <audio id="sound" preload="preload" loop src="<?php echo WEBSITE_ROOT;?>attachment/<?php  echo $list['bg_music_url'];?>"></audio>
</div>
<?php  } ?>
<script>


		var loader = new PxLoader();
		
		$('img').each( function (){
			loader.addImage($(this).attr('src'));
		})
		<?php  if(is_array($pics)) { foreach($pics as $row) { ?>
		loader.addImage("<?php  echo $this->toimage($item['thumb']) ?>");
		<?php  } } ?>
		loader.addProgressListener(function(e) {
			
			var percent = Math.round( e.completedCount / e.totalCount * 100 );
			//$('#loading-black p').text(percent);
			
		});
		loader.addCompletionListener( function (){
				$('#loading-black').fadeOut();
				Animate();
		});
		loader.start();	

function Animate (){
	for( var i = 1 ; i < 25 ; i++)
	{
		TweenMax.from($('#sml' + i) , 1 , { opacity : 0 , delay : i * .1})	
	};
	
	
	setTimeout( function (){
			$('.pages_current .pstyle').fadeIn();
		} , 2500)	
}


( function (L) {
	var pages = document.getElementsByClassName('liuliang_pages');
	//horizontal  水平
	//vertical   垂直
	//direction  方向
	
	var slider = new L.fx.slide ( L );
	slider.setShowClass ( 'pages_current' );   //当前显示元素的class
	slider.extend ( slider.animationClass ,L.fx.animationClass );  //扩展动画效果默认只有2个 1 - 2  （可以不设置）
	slider.setAnimation ( 9 );	 //动画id  默认1    1 - 17 (扩展动画效果后)                         （可以不设置）
	slider.setDirection ('v'); // 值  v ：垂直方向  h ：水平方向 。默认 v                            （可以不设置）
	slider.animationCallback = function ( index ) { console.log ( index );} ; // 回调             （可以不设置）
	slider.init ( document.getElementById('main') ,pages );
	
	//alert(slider.outClass + '---'+ slider.inClass)

} ) ( _liuLiang );

<?php  if($list['bg_music_switch']==1) { ?>
	$('#sound')[0].play();
	$('.sound-on').bind('touchend' , function (){
			if($(this).hasClass('sound-off')){
				$(this).removeClass('sound-off');
				$('#sound')[0].play();
				return;
			}
			jQuery(this).addClass('sound-off');
			$('#sound')[0].pause();
		})
	$('body').one('touchend' , function (){
		$('#sound')[0].play();	
	})
<?php  } ?>
 </script>

</body>
</html>
 