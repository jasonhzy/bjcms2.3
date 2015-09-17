<?php  include addons_page('page_header');?>
<script type="text/javascript" src="<?php echo WEBSITE_ROOT;?>/addons/addon10/style/src/spuotlet_map.js?v=2014-05-21"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&amp;ak=359042E5AC9ced07c553ebe2042aad73"></script>
	<div id="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">

                    <div class="box">
                        <div class="box-title">
                            <div class="span12">
                                <h3><i class="icon-edit"></i>管理画面</h3>
                            </div>
                        </div>
                        <form id="page_form" action="" method="post" class="form-horizontal form-validate">
                              <div class="box-content">
                                <div class="control-group">
                                    <label for="listorder" class="control-label">排序：</label>
                                    <div class="controls">
                                        <input type="text" name="listorder" id="listorder" class="input-medium" data-rule-required="true" data-rule-maxlength="50" value="<?php  echo $item['listorder'];?>">
                                        <span class="maroon">*</span>
                                        <span class="help-inline">越大越靠前</span>
                                    </div>
                                </div>
                                <div class="js_scene_picture">
									<?php  $mtypelist=$this->_mtype(array(1,7,2,3,4,31)) ?>
                                    <div class="control-group">
                                        <label for="m_type" class="control-label">画面样式：</label>
                                        <div class="controls">
                                            <select class="inpit-medium js_scene_style_select" name="m_type" data-rule-required="true">
												<?php  if(is_array($mtypelist)) { foreach($mtypelist as $key => $row) { ?>
                                                <option value="<?php  echo $key;?>" data-type="<?php  echo $row['type'];?>" <?php  if($item['m_type']==$key) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
												<?php  } } ?>
											</select>
                                        </div>
                                    </div>
									<?php  $i=1 ?>
									<?php  if(is_array($mtypelist)) { foreach($mtypelist as $row) { ?>
 									<div class="control-group alert <?php  echo $this->class_type[$i%4] ?> js_scene_style js_<?php  echo $row['type'];?> hide">
									<?php  echo $row['desc'];?>
									</div>
									<?php  $i++ ?>
									<?php  } } ?>
                                    <div class="control-group">
                                        <label for="" class="control-label">画面内容：</label>
										<!--纯图开始-->
										<div class="controls">
											 <div id="pureimg_image_uploads" class="">
												<img upload="image-single" style="max-width:100px;" src="<?php  echo $this->toimage($item['thumb']) ?>" />
												<input type="hidden" value="<?php  echo $item['thumb'];?>" name="thumb" id="pureimg" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">传图</button><span class="help-inline">（建议尺寸:宽640像素,高960像素或等比图片）</span></span>
											</div>
										</div>											
									</div>
									<?php  if(is_array($mtypelist)) { foreach($mtypelist as $row) { ?>
										<?php  include addons_page('sucai/'.$row['type']) ?>
									<?php  } } ?>
									<span class="help-block margin-top10"></span>
                                    </div>
								</div>                            
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">保存</button>
                                    <button type="button" class="btn" onclick="window.history.go(-1)">取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">      
        $(function () {
            $(".js_scene_picture").each(function(){
                var type=$(this).find(".js_scene_style_select option:selected").data("type");
                $(this).find(".js_scene_style").addClass('hide');
                $(this).find(".js_"+type).removeClass('hide');
				if(type=='maplink'||type=='amap'){
					<?php  if(!empty($data['lat'])&&!empty($data['lng'])) { ?>
					   var op = { 
							lat: <?php  echo $data['lat'];?>,
							lng: <?php  echo $data['lng'];?>,
							adr: "<?php  echo $data['place'];?>"
						}
						baidu_map(op);
					<?php  } else { ?>
						baidu_map();
					<?php  } ?>
				}
            });
            $(document).on("change",".js_scene_style_select",function(){
                var $p=$(this).parents(".js_scene_picture"),type=$(this).find("option:selected").data("type");
                $p.find(".js_scene_style").addClass('hide');
                $p.find(".js_"+type).removeClass('hide');
				if(type=='maplink'||type=='amap'){
				   <?php  if(!empty($data['lat'])&&!empty($data['lng'])) { ?>
					   var op = { 
							lat: <?php  echo $data['lat'];?>,
							lng: <?php  echo $data['lng'];?>,
							adr: "<?php  echo $data['place'];?>"
						}
						baidu_map(op);
					<?php  } else { ?>
						baidu_map();
					<?php  } ?>
				}
            });
         });

		 KindEditor.ready(function(K){
			var editor = KindEditor.editorObj || K.editor({
				themeType: 'simple',
				allowImageUpload:false,
				formatUploadUrl:false,
				allowFileManager: false,
				uploadJson : "<?php  echo web_url('newkeupload');?>"
			});

			$('.select_img').click(function(e){
				editor.loadPlugin('image', function(){
					editor.plugin.imageDialog({
						imageUrl: $(e.target).parent().prev().val(),
						clickFn: function(url, title, width, height, border, align){
							var val = url;
							if(url.toLowerCase().indexOf("http://") == -1 && url.toLowerCase().indexOf("https://") == -1) {
								var filename = /images(.*)/.exec(url);
								if(filename && filename[0]) {
									val = filename[0];
								}
							}
							$(e.target).parent().prev().val(val);
							
							if('image-single' == $(e.target).parent().prev().prev().attr('upload')){
								$(e.target).parent().prev().prev().attr('src', '<?php echo WEBSITE_ROOT.'attachment/'; ?>'+url);
								$(e.target).parent().prev().prev().attr('alt', url)
							}

							editor.hideDialog();
						}
					});
				});
			});		
			
									$('.select_file').click(function(e){
				editor.loadPlugin('insertfile', function(){
				editor.plugin.fileDialog({
						fileUrl : $(e.target).parent().prev().val(),
						clickFn:  function(url, title) {
							var val = url;
							if(url.toLowerCase().indexOf("http://") == -1 && url.toLowerCase().indexOf("https://") == -1) {
								var filename = /images(.*)/.exec(url);
								if(filename && filename[0]) {
									val = filename[0];
								}
							}
							$(e.target).parent().prev().val(val);
							if('file-single' == $(e.target).parent().prev().prev().attr('upload')){
								$(e.target).parent().prev().prev().text('<?php echo WEBSITE_ROOT.'attachment/'; ?>'+url);
							}

							editor.hideDialog();
						}
					});
				});
			});	
			
		});
    </script>
	</body>
	<script>
		window.document.onkeydown = function(e) {
			if ('BODY' == event.target.tagName.toUpperCase()) {
				var e=e || event;
　 				var currKey=e.keyCode || e.which || e.charCode;
				if (8 == currKey) {
					return false;
				}
			}
		};
	</script> 
</html>