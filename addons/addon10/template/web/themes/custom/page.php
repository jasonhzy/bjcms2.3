&nbsp;<?php  include addons_page('page_header');?>
	<script type="text/javascript" src="<?php  echo WEBSITE_ROOT;?>addons/addon10/src/spuotlet_map.js?v=2014-05-21"></script>
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
                                    <div class="control-group">
                                        <label for="m_type" class="control-label">画面样式：</label>
                                        <div class="controls">
										
                                            <select class="inpit-medium js_scene_style_select" name="m_type" data-rule-required="true">
                                                <option value="1" data-type="first" <?php  if($item['m_type']==1) { ?>selected<?php  } ?>>场景1(单图片)</option>
                                                <option value="2" data-type="second" <?php  if($item['m_type']==2) { ?>selected<?php  } ?>>场景2(自定义)</option>
											</select>
                                        </div>
                                    </div>
									<div class="control-group alert js_scene_style js_first hide">
										场景1：图片1从顶部掉下（PNG格式)，图片2左右晃动。(具体参考实例)
									</div>
									
									<div class="control-group alert alert-success js_scene_style js_second hide">
										场景2：自定义效果(具体参考实例)
									</div>
									 
                                    <div class="control-group">
                                        <label for="" class="control-label">画面内容：</label>
                                        <div class="controls">
                                            <!--纯图开始-->
                                            <div>
                                                <div id="firstimg_image_uploads" class="">
													<img upload="image-single" style="max-width:100px;" src="<?php  echo $this->toimage($item['thumb']) ?>" />
													<input type="hidden" value="<?php  echo $item['thumb'];?>" name="thumb"/>
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传图</button><span class="help-inline">（建议尺寸:宽640像素,高960像素或等比图片）</span></span>
												</div>
                                            </div>
                                            <!--纯图结束-->
                                        </div>
                                    </div>
									<div class="control-group js_scene_style js_second hide">
											<label class="control-label">多图展示：</label>
											<div class="controls">
												<div class="span12"><a data-toggle="modal"  data-target="#modal" class="btn addsucai" ><i class="icon-plus"></i>添加素材</a></div>
												<table class="table table-bordered table-hover dataTable">
													<thead>
														<tr>
															<th>图片</th>
															<th>效果</th>
															<th>x</th>
															<th>y</th>
															<th>操作</th>
														</tr>
													</thead>
													<tbody id="listTable">
														<?php  if(!empty($data['thumbs'])) { ?>
															<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $key => $row) { ?> 
															<tr class="copy_rows"><td><div id="map_image_uploads" class=""><img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($row) ?>" /><input type="hidden" value="<?php  echo $row;?>" name="second[thumbs][]" id="mapimage" /></div></td><td><input type="hidden" value="<?php  echo $data['animations'][$key];?>" name="second[animations][]"><?php  echo $data['animations'][$key];?></td><td><input type="hidden" value="<?php  echo $data['x'][$key];?>" name="second[x][]"><?php  echo $data['x'][$key];?></td><td><input type="hidden" value="<?php  echo $data['y'][$key];?>" name="second[y][]"><?php  echo $data['y'][$key];?></td><td><input type="hidden" value="<?php  echo $data['itype'][$key];?>" name="second[itype][]"><input type="hidden" value="<?php  echo $data['url'][$key];?>" name="second[url][]"><a href="javascript:;" class="del">删除</a></td></tr>
															<?php  } } ?>
														<?php  } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
							 
									<!--分享开始-->
									
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
<div id="modal" class="modal hide fade" style="width:600px;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">设置动画元素</h3>
	</div>
	<div class="modal-body" style="max-height: 800px;">
	</div>
</div>
    <script type="text/javascript">      
	
        $(function () {
			$(".addsucai").click(function(){
				$.get("<?php echo web_url('page',array('id'=>$scene_page['id'],'list_id'=>$list_id,'op'=>'sucai'));?>", function(data){
					$(".modal-body").html(data);
				});			 
			});
            $(".js_scene_picture").each(function(){
                var type=$(this).find(".js_scene_style_select option:selected").data("type");
                $(this).find(".js_scene_style").addClass('hide');
                $(this).find(".js_"+type).removeClass('hide');
				if(type=='map'){
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
			//删除门店实景
			$("#listTable .del").click(function () {
					var removeObj = $(this).parent('td').parent('tr');
					var className = removeObj.attr('class');
					 
					return removeObj.remove();
				
			});
            $(document).on("change",".js_scene_style_select",function(){
                var $p=$(this).parents(".js_scene_picture"),type=$(this).find("option:selected").data("type");
                $p.find(".js_scene_style").addClass('hide');
                $p.find(".js_"+type).removeClass('hide');
				if(type=='map'){
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
				uploadJson : "<?php  echo web_url('newkeupload');?>",
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
		//页面事件监听
		$(document).ready(function(){
			//新增门店实景
			$("#add_menu").click(function(){
				$('.copy_rows:first').clone(true).appendTo('#listTable').find('input[type=text]').val('');
				$('.copy_rows:last').find('img').attr({src:'',alt:'',title:''});
				//$('.copy_rows:last').find('script').remove();
			});
			
			//删除门店实景
			$("#listTable .del").click(function () {
					var removeObj = $(this).parent('td').parent('tr');
					var className = removeObj.attr('class');
					if($("." + className).length <= 1){
						removeObj.find('img').remove();
						return removeObj.find('input[type=text],input[type=hidden]').val('');
						
					}
					return removeObj.remove();
				
			});
			 
		});
	

	</script> 
</html>