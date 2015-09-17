<link type="text/css" rel="stylesheet" href="<?php  echo WEBSITE_ROOT;?>addons/addon10/style/css/wanimation.css" />
<script type="text/javascript">
  function testAnim(x) {
    $('#drag').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass();
    });
  };
        $(document).ready(function () {
            $('#animations').change(function(){
            var anim = $(this).val();
            testAnim(anim);
            });
            var _move = false; 
            var _x, _y;
            var index_x, index_y;
            $("#drag").css({ top: <?php  if(($item['y'])) { ?><?php  echo $item['y']/2 ?><?php  } else { ?>0<?php  } ?>, left: <?php  if(($item['x'])) { ?><?php  echo $item['x']/2 ?><?php  } else { ?>0<?php  } ?> });
            $("#drag").bind("mousedown", downIndex); 
            $(document).bind("mousemove", mmove);
            $(document).bind("mouseup", mup);
            function mmove(e) {
                if (_move) {
                    var x = e.pageX - _x; 
                    var y = e.pageY - _y;
                    $("#drag").css({ top: y, left: x }); 
                    show(x, y);
                }
            }
            function mup() {
                _move = false;
            }
            function downIndex(e) {
                _move = true;
                _x = e.pageX - parseInt($("#drag").css("left"));
                _y = e.pageY - parseInt($("#drag").css("top"));
 
            }
            function show(x, y) {
                $("#x").val(2*x);
                $("#y").val(2*y);
            }
        });
</script>
<form action="" method="post" enctype="multipart/form-data">
			<div id="image-container" style="overflow:hidden;">
				<div style="width:250px;float:left;">
				<span class="help-block">请上传图片，一般为背景透明的图片</span>
				<div style="display:block; margin-top:5px;" class="input-append">
				<input type="text" value="<?php  echo $item['item'];?>" name="item" id="upload-image-url-item" class="span2">
				<input type="hidden" value="" name="item_old" id="upload-image-url-item-old">
				<button class="btn" type="button" id="upload-image-item">选择图片</button>
				</div>
				<input id="url" type="text" value="<?php  echo $item['url'];?>" name="url" style="width:210px">				
				<input id="itype" type="hidden" value="<?php  echo $item['itype'];?>" name="itype">				
				<span class="help-block">请填写元素链接的网址，可以不填</span>
				
				<input type="hidden" value="" name="x" id="x">
				<input type="hidden" value="" name="y" id="y">
				<span class="help-block">请选择元素的动画特效</span>
				<select name="animation" id="animations" class="input span2">
        					<optgroup label="基本特效">
          					<option value="flash" <?php  if(($item['animation']=='flash')) { ?>selected="selected"<?php  } ?>>闪光</option>
          					<option value="bounce" <?php  if(($item['animation']=='bounce')) { ?>selected="selected"<?php  } ?>>弹起</option>
          					<option value="shake" <?php  if(($item['animation']=='shake')) { ?>selected="selected"<?php  } ?>>摇摆</option>
          					<option value="tada" <?php  if(($item['animation']=='tada')) { ?>selected="selected"<?php  } ?>>秋千</option>
          					<option value="swing" <?php  if(($item['animation']=='swing')) { ?>selected="selected"<?php  } ?>>悬挂</option>
          					<option value="wobble" <?php  if(($item['animation']=='wobble')) { ?>selected="selected"<?php  } ?>>摆动</option>
          					<option value="pulse" <?php  if(($item['animation']=='pulse')) { ?>selected="selected"<?php  } ?>>脉冲</option>
					</optgroup>
        					<optgroup label="翻转特效">
          					<option value="flipx" <?php  if(($item['animation']=='flipx')) { ?>selected="selected"<?php  } ?>>垂直翻转</option>
          					<option value="flipy" <?php  if(($item['animation']=='flipy')) { ?>selected="selected"<?php  } ?>>水平翻转</option>
					</optgroup>
        					<optgroup label="淡入特效">
          					<option value="fadedown" <?php  if(($item['animation']=='fadedown')) { ?>selected="selected"<?php  } ?>>上方淡入</option>
          					<option value="fadeup" <?php  if(($item['animation']=='fadeup')) { ?>selected="selected"<?php  } ?>>下方淡入</option>
          					<option value="fadeleft" <?php  if(($item['animation']=='fadeleft')) { ?>selected="selected"<?php  } ?>>左方淡入</option>
          					<option value="faderight" <?php  if(($item['animation']=='faderight')) { ?>selected="selected"<?php  } ?>>右方淡入</option>
          					<option value="fadedownbig" <?php  if(($item['animation']=='fadedownbig')) { ?>selected="selected"<?php  } ?>>顶部淡入</option>
          					<option value="fadeupbig" <?php  if(($item['animation']=='fadeupbig')) { ?>selected="selected"<?php  } ?>>底部淡入</option>
          					<option value="fadeleftbig" <?php  if(($item['animation']=='fadeleftbig')) { ?>selected="selected"<?php  } ?>>左侧淡入</option>
          					<option value="faderightbig" <?php  if(($item['animation']=='faderightbig')) { ?>selected="selected"<?php  } ?>>右侧淡入</option>
					</optgroup>
        					<optgroup label="跳弹特效">
          					<option value="bouncein" <?php  if(($item['animation']=='bouncein')) { ?>selected="selected"<?php  } ?>>跳弹放大</option>
          					<option value="bouncedown" <?php  if(($item['animation']=='bouncedown')) { ?>selected="selected"<?php  } ?>>跳弹降落</option>
          					<option value="bounceup" <?php  if(($item['animation']=='bounceup')) { ?>selected="selected"<?php  } ?>>跳弹升起</option>
          					<option value="bounceleft" <?php  if(($item['animation']=='bounceleft')) { ?>selected="selected"<?php  } ?>>左侧跳弹</option>
          					<option value="bounceright" <?php  if(($item['animation']=='bounceright')) { ?>selected="selected"<?php  } ?>>右侧跳弹</option>
					</optgroup>
        					<optgroup label="旋转特效">
          					<option value="rotatein" <?php  if(($item['animation']=='rotatein')) { ?>selected="selected"<?php  } ?>>旋转淡入</option>
          					<option value="rotateindownleft" <?php  if(($item['animation']=='rotateindownleft')) { ?>selected="selected"<?php  } ?>>左下旋转</option>
          					<option value="rotateindownright" <?php  if(($item['animation']=='rotateindownright')) { ?>selected="selected"<?php  } ?>>右下旋转</option>
          					<option value="rotateinupleft" <?php  if(($item['animation']=='rotateinupleft')) { ?>selected="selected"<?php  } ?>>左上旋转</option>
          					<option value="rotateinupright" <?php  if(($item['animation']=='rotateinupright')) { ?>selected="selected"<?php  } ?>>左下旋转</option>
					</optgroup>
        					<optgroup label="其他特效">
          					<option value="rollin" <?php  if(($item['animation']=='rollin')) { ?>selected="selected"<?php  } ?>>翻滚进入</option>
          					<option value="zoomindown" <?php  if(($item['animation']=='zoomindown')) { ?>selected="selected"<?php  } ?>>顶部砸入</option>
          					<option value="lightspeedin" <?php  if(($item['animation']=='lightspeedin')) { ?>selected="selected"<?php  } ?>>摇摆进入</option>
					</optgroup>
				</select>
				</div>
				<div id="upload-image-preview-piece" style="width:320px;height:504px;background:url(<?php  echo WEBSITE_ROOT.'attachment/';?><?php  echo $photo['attachment'];?>) no-repeat;background-size:320px 504px;float:left;">
				<?php  if($item['item']) { ?>
					<?php  $size = GetImageSize(WEBSITE_ROOT.'attachment/'.$item['item']); ?>
					<img class="upload-image-preview-item" id="drag" style="width:<?php  echo $size['0']/2 ?>px;height:<?php  echo $size['1']/2 ?>px;cursor: move;position: relative;left:0;top: 0;" src="<?php  echo WEBSITE_ROOT.'attachment/';?><?php  echo $item['item'];?>" />
				<?php  } else { ?>
					<img class="upload-image-preview-item" id="drag" style="cursor: move;position: relative;left:0;top: 0;" src="<?php  echo WEBSITE_ROOT;?>addons/addon10/style/img/module-nopic-small.jpg" />
				<?php  } ?>
				</div>
				<div style="text-align:center;margin-top:20px">
					<button type="button" class="btn btn-primary span3" name="submit" value="确定" id="ok" data-dismiss="modal">确定</button>
				</div>
				</form>
				<script type="text/javascript">
				var editor = KindEditor.editor({
						themeType: 'simple',
					allowFileManager : false,
				allowImageUpload:false,
				formatUploadUrl:false,
					uploadJson : "<?php  echo create_url('site',array('name' => 'index','do' => 'keupload'))?>"
				});
				$("#upload-image-item").click(function() {
					editor.loadPlugin("image", function() {
						editor.plugin.imageDialog({
							imageUrl : $("#upload-image-url-item").val(),
							clickFn : function(url) {
								editor.hideDialog();
								var val = url;
								if(false&&url.toLowerCase().indexOf("http://") == -1 && url.toLowerCase().indexOf("https://") == -1) {
									var filename = /images(.*)/.exec(url);
									if(filename && filename[0]) {
										val = filename[0];
									}
								}
								$("#upload-image-url-item-old").val($("#upload-image-url-item").val());
								$("#upload-image-url-item").val(val);
								$(".upload-image-preview-item").css("width","");
								$(".upload-image-preview-item").css("height","");
								$(".upload-image-preview-item").attr("src",'<?php echo WEBSITE_ROOT.'attachment/'; ?>'+url);
								$(".upload-image-preview-item").css("-webkit-transform-origin","0 0");
								$(".upload-image-preview-item").css("-webkit-transform","scale(0.5,0.5)");
							}
						});
					});
				});
				$("#ok").click(function(){
					thumb=$("#upload-image-url-item").val();
					if(thumb==''){
						alert('图片不能为空');
						return'';
					}else{
						str='<tr class="copy_rows"><td><div id="map_image_uploads" class=""><img upload="image-single" style="max-height:50px;" src="'+$("#drag").attr('src')+'" /><input type="hidden" value="'+$("#upload-image-url-item").val()+'" name="second[thumbs][]" id="mapimage" /></div></td><td><input type="hidden" value="'+$("#animations").val()+'" name="second[animations][]">'+$("#animations").val()+'</td><td><input type="hidden" value="'+$("#x").val()+'" name="second[x][]">'+$("#x").val()+'</td><td><input type="hidden" value="'+$("#y").val()+'" name="second[y][]">'+$("#y").val()+'</td><td><input type="hidden" value="'+$("#itype").val()+'" name="second[itype][]"><input type="hidden" value="'+$("#url").val()+'" name="second[url][]"><a href="javascript:;" class="del">删除</a></td></tr>';
						$("#listTable").append(str);
					}
				});
				$(function () {
					//
					$("#upload-image-preview-piece").attr("style","width:320px;height:504px;background:url("+$("#firstimg_image_uploads img").attr('src')+") no-repeat;background-size:320px 504px;float:left;");
					 
				});
				</script>
			</div>