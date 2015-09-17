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
									<?php  $mtypelist=$this->_mtype(array(1,11)) ?>
                                    <div class="control-group">
                                        <label for="m_type" class="control-label">画面样式：</label>
                                        <div class="controls">
											<select class="inpit-medium js_scene_style_select" name="m_type" data-rule-required="true">
											<option value="11" data-type="pics" <?php  if($item['m_type']==11) { ?>selected<?php  } ?>>多图展示</option>
										    <option value="12" data-type="txtpic" <?php  if($item['m_type']==12) { ?>selected<?php  } ?>>文字多图</option>
											 <option value="13" data-type="last" <?php  if($item['m_type']==13) { ?>selected<?php  } ?>>最后展示</option>
											</select>
                                        </div>
                                    </div>
									<div class="control-group alert js_scene_style js_pics hide">
									场景1：只能放在第一页，放入其他页无效。(具体参考实例)
									</div>
									<div class="control-group alert alert-success js_scene_style js_txtpic hide">
									场景2：文字介绍+背景图片(具体参考实例)
									</div>
									<div class="control-group alert alert-info js_scene_style js_last hide">
									场景3：最后展示的一个场景图片(具体参考实例)
									</div>
									
                                    <div class="control-group js_scene_style js_txtpic hide">
										<label class="control-label">文字多图</label>
										<div class="controls">
 											<div id="firstimg_image_uploads" class="">
												<img upload="image-single" style="max-width:100px;" src="<?php  echo $this->toimage($item['thumb']) ?>" />
												<input type="hidden" value="<?php  echo $item['thumb'];?>" name="thumb"/>
												<span class="help-inline"><button name="button" class="btn select_img" type="button">传图</button><span class="help-inline">（建议尺寸:宽640像素,高960像素或等比图片）</span></span>
											</div>
 										</div>
									</div>
                                    <div class="control-group js_scene_style js_txtpic hide">
										<label class="control-label" >文字框位置</label>
										<div class="controls">
											<input type="number" class="input input-mini " name="txtpic[top]" value="<?php  echo intval($data['top']) ?>"/>
											<span class="maroon">*</span><span class="help-inline">0-100之间，纵向百分百，不能超过100</span>
										</div>
									</div>
                                    <div class="control-group js_scene_style js_txtpic hide">
										<label class="control-label">第一行文字</label>
										<div class="controls">
											<input type="text"  class="input-large" name="txtpic[str1]" value="<?php  echo $data['str1'];?>"/>
											<span class="maroon">*</span><span class="help-inline">(第一行文字)</span>
										</div>
									</div>
                                    <div class="control-group js_scene_style js_txtpic hide">
										<label class="control-label">第二行文字</label>
										<div class="controls">
											<input type="text"  class="input-large" name="txtpic[str2]" value="<?php  echo $data['str2'];?>"/>
											<span class="maroon">*</span><span class="help-inline">(第二行文字)</span>
										</div>
									</div>
									<div class="control-group js_scene_style js_last hide">
										<label for="" class="control-label">logo图片：</label>
                                        <div class="controls">
											<div id="share_image_uploads" class="">
											<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['logo']) ?>" />
											<input type="hidden" value="<?php  echo $data['logo'];?>" name="last[logo]" />
											<span class="help-inline"><button name="button" class="btn select_img" type="button">选择图片</button><span class="help-inline">（建议尺寸:展示图片，大小看案例）</span></span></div> 
										</div>
                                    </div>
									 
                                    <div class="control-group js_scene_style js_last hide">
										<label class="control-label">第一行文字</label>
										<div class="controls">
											<input type="text"  class="input-large" name="last[str1]" value="<?php  echo $data['str1'];?>"/>
											<span class="maroon">*</span><span class="help-inline">(第一行文字)</span>
										</div>
									</div>
                                    <div class="control-group js_scene_style js_last hide">
										<label class="control-label">第二行文字</label>
										<div class="controls">
											<input type="text"  class="input-large" name="last[str2]" value="<?php  echo $data['str2'];?>"/>
											<span class="maroon">*</span><span class="help-inline">(第二行文字)</span>
										</div>
									</div>
									<div class="control-group js_scene_style js_last hide">
										<label class="control-label">第三行文字</label>
										<div class="controls">
											<input type="text"  class="input-large" name="last[str3]" value="<?php  echo $data['str3'];?>"/>
											<span class="maroon">*</span><span class="help-inline">(第三行文字)</span>
										</div>
									</div>
									<div class="control-group js_scene_style js_last hide">
										<label for="" class="control-label">二维码：</label>
                                        <div class="controls">
											<div id="share_image_uploads" class="">
											<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['qrcode']) ?>" />
											<input type="hidden" value="<?php  echo $data['qrcode'];?>" name="last[qrcode]" />
											<span class="help-inline"><button name="button" class="btn select_img" type="button">选择图片</button><span class="help-inline">（建议尺寸:二维码示图片，大小看案例）</span></span></div> 
										</div>
                                    </div>
								<div class="control-group js_scene_style js_pics hide">
									<label class="control-label">第一行文字</label>
									<div class="controls">
										<input type="text"  class="input-large" name="pics[str1]" value="<?php  echo $data['str1'];?>"/>
										<span class="maroon">*</span><span class="help-inline">(第一行文字)</span>
									</div>
								</div>
								<div class="control-group js_scene_style js_pics hide">
									<label class="control-label">第二行文字</label>
									<div class="controls">
										<input type="text"  class="input-large" name="pics[str2]" value="<?php  echo $data['str2'];?>"/>
										<span class="maroon">*</span><span class="help-inline">(第二行文字)</span>
									</div>
								</div>									
 								<div class="control-group js_scene_style js_pics hide">
								<label class="control-label">多图展示：</label>
								<div class="controls">
									<div class="span12"><a href="javascript:void(0)" class="btn" id="add_menu"><i class="icon-plus"></i>添加图片</a></div>
									<table class="table table-bordered table-hover dataTable">
										<thead>
											<tr>
												<th>图片地址</th>
 												<th>操作</th>
											</tr>
										</thead>
										 
										<tbody id="listTable">
											<?php  if(empty($data['thumbs'])) { ?>
												<tr class="copy_rows">
													<td>
													<div id="map_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($pics['mthumb']) ?>" />
													<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="pics[thumbs][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽560像素,高250像素或等比图片）</span></span></div>
														</td>
													<td><a href="javascript:;" class="del">删除</a></td>
												</tr>
											<?php  } else { ?>	
												<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $row) { ?> 
												<tr class="copy_rows">
												<td>
													<div id="map_image_uploads" class="">
 													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($row) ?>" />
													<input type="hidden" value="<?php  echo $row;?>" name="pics[thumbs][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽560像素,高250像素或等比图片）</span></span></div>
												</td>
												<td><a href="javascript:;" class="del">删除</a></td>
												</tr>
												<?php  } } ?>
											<?php  } ?>
										</tbody>
									</table>
								</div>
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
				if(type=='map'||type=='map21'){
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
				if(type=='map'||type=='map21'||type=='yuyue22'){
					$(".sigle").hide();
				}else{
					$(".sigle").show();
				}
            });
            $(document).on("change",".js_scene_style_select",function(){
                var $p=$(this).parents(".js_scene_picture"),type=$(this).find("option:selected").data("type");
                $p.find(".js_scene_style").addClass('hide');
                $p.find(".js_"+type).removeClass('hide');
				if(type=='map'||type=='map21'){
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
				if(type=='map'||type=='map21'||type=='yuyue22'){
					$(".sigle").hide();
				}else{
					$(".sigle").show();
				}
            });
			
        });

		 KindEditor.ready(function(K){
			var editor = KindEditor.editorObj || K.editor({
				themeType: 'simple',
				allowImageUpload:false,
				formatUploadUrl:false,
				allowFileManager: false,
				uploadJson : "<?php  echo web_url('newkeupload')?>"
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