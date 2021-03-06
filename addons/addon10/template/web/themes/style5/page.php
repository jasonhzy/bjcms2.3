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
                                    <div class="control-group">
                                        <label for="m_type" class="control-label">画面样式：</label>
                                        <div class="controls">
                                            <select class="inpit-medium js_scene_style_select" name="m_type" data-rule-required="true">
												<option value="10" data-type="pic" <?php  if($item['m_type']==10) { ?>selected<?php  } ?>>单图片</option>
                                                <option value="1" data-type="pure" <?php  if($item['m_type']==1) { ?>selected<?php  } ?>>单图片放大</option>
                                                <option value="2" data-type="btn" <?php  if($item['m_type']==2) { ?>selected<?php  } ?>>链接图片式</option>
                                                <option value="3" data-type="share" <?php  if($item['m_type']==3) { ?>selected<?php  } ?>>分享图片式</option>
												<option value="4" data-type="tel" <?php  if($item['m_type']==4) { ?>selected<?php  } ?>>电话图片式</option>
												<option value="5" data-type="map" <?php  if($item['m_type']==5) { ?>selected<?php  } ?>>地图图片式</option>
 												<option value="6" data-type="video" <?php  if($item['m_type']==6) { ?>selected<?php  } ?>>优酷视频式</option>
												<option value="7" data-type="three" <?php  if($item['m_type']==7) { ?>selected<?php  } ?>>三点点击式</option>
												<option value="8" data-type="message" <?php  if($item['m_type']==8) { ?>selected<?php  } ?>>留言墙式</option>
												<option value="9" data-type="info" <?php  if($item['m_type']==9) { ?>selected<?php  } ?>>详情展示</option>
 											</select>
                                        </div>
                                    </div>
									<div class="control-group alert js_scene_style js_pure hide">
									场景1：单一图片显示,逐渐放大。建议大小640*1008,或者相同比例。(具体参考实例)
									</div>
									<div class="control-group alert alert-success js_scene_style js_btn hide">
									场景2：图片全屏显示,建议大小640*1008,或者相同比例。中下部有按钮图片实现连接(具体参考实例)
									</div>
									<div class="control-group alert alert-info js_scene_style js_share hide">
									场景3：图片全屏显示,建议大小640*1008,或者相同比例。中下部有按钮图片点击出现分享图片(具体参考实例)
									</div>
									<div class="control-group alert alert-error js_scene_style js_tel hide">
									场景4：图片全屏显示,建议大小640*1008,或者相同比例。中下部有按钮图片实现一键拨号(具体参考实例)
									</div>
									<div class="control-group alert js_scene_style js_map hide">
									场景5：图片全屏显示,建议大小640*1008,或者相同比例。中下部有按钮图片实现百度导航(具体参考实例)
									</div> 
									<div class="control-group alert  alert-success js_scene_style js_video hide">
									场景6：图片全屏显示,建议大小640*1008,或者相同比例。优酷视频(具体参考实例)
									</div> 
									<div class="control-group alert  alert-info js_scene_style js_three hide">
									场景7：图片全屏显示,建议大小640*1008,双图片三点点击进入(具体参考实例)
									</div> 
									<div class="control-group alert  alert-error js_scene_style js_message hide">
									场景8：图片全屏显示,建议大小640*1008,留言(具体参考实例)
									</div> 
									<div class="control-group alert   js_scene_style js_info hide">
									场景9：图片全屏显示,建议大小640*1008,电话，邮件，微信(具体参考实例)
									</div> 
									<div class="control-group alert  alert-success js_scene_style js_pic hide">
									场景10：单一图片显示。建议大小640*1008,或者相同比例。(具体参考实例)
									</div> 
									 
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
									<div class="js_scene_style js_info hide">
										<div class="control-group">
											<label class="control-label" for="tel">电话号码</label>
											<div class="controls">
												<input type="text" id="tel" class="input-large" name="info[tel]" data-rule-phone="true" value="<?php  echo $data['tel'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="mail">邮件</label>
											<div class="controls">
												<input type="text" id="mail" class="input-large" name="info[email]" data-rule-email="true" value="<?php  echo $data['email'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="wxurl">微信链接</label>
											<div class="controls">
												<input type="text" id="wxurl" class="input-xxlarge" name="info[wxurl]" value="<?php  echo $data['wxurl'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(微信链接地址)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="weixin">微信</label>
											<div class="controls">
												<input type="text" id="weixin" class="input-large" name="info[weixin]" value="<?php  echo $data['weixin'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
									</div>
									<div class="js_scene_style js_message hide">
										<!--按钮结束-->
										<div class="control-group">
											<label for="" class="control-label">文字背景图片：</label>
											<div class="margin-top10">
												<div id="btn_img_image_uploads" class="">
													<img upload="image-single" style="max-width:100px;" src="<?php  echo $this->toimage($data['txtbg']) ?>" />
													<input type="hidden" value="<?php  echo $data['txtbg'];?>" name="message[txtbg]" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button>
													</span>
												</div>
											</div>
										</div>
										<div class="control-group">    
											<label for="" class="control-label">按钮图片：</label>
											<div class="margin-top10">
												<div id="btn_img_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['btnimg']) ?>" />
													<input type="hidden" value="<?php  echo $data['btnimg'];?>" name="message[btnimg]" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传按钮图</button>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="js_scene_style js_video hide">
										<!--按钮结束-->
										<div class="control-group">
											<label for="" class="control-label">视频链接：</label>
											<div class="controls">
												<input type="text" class="input-xlarge" name="video[url]" value="<?php  echo $data['url'];?>" placeholder="请输入链接地址" data-rule-required="true" data-rule-url="true"/>
												<span class="help-block">优酷视频链接地址：http://v.youku.com/v_show/id_XNzYzMzYwNDc2.html</span>
											</div>
										</div>
									</div>
									<div class="js_scene_style js_three hide">
										<!--按钮结束-->
										<div class="control-group">
											<label for="" class="control-label">后背景图片：</label>
											<div class="margin-top10">
												<div id="btn_img_image_uploads" class="">
													<img upload="image-single" style="max-width:100px;" src="<?php  echo $this->toimage($data['bg2']) ?>" />
													<input type="hidden" value="<?php  echo $data['bg2'];?>" name="three[bg2]" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button>
													</span>
													<span class="help-inline">（全屏png格式）</span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="js_scene_style js_btn hide">
										<!--按钮结束-->
										<div class="control-group">    
											<label for="" class="control-label">按钮图片：</label>
											<div class="margin-top10">
												<div id="btn_img_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['btnimg']) ?>" />
													<input type="hidden" value="<?php  echo $data['btnimg'];?>" name="btn[btnimg]" id="btnimg" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传按钮图</button>
													</span>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">链接：</label>
											<div class="controls">
												<input type="text" class="input-xlarge" name="btn[url]" value="<?php  echo $data['url'];?>" placeholder="请输入链接地址" data-rule-required="true" data-rule-url="true"/>
												<span class="help-block">链接地址：http://</span>
											</div>
										</div>
									</div>
									<div class="control-group js_scene_style js_share hide">
										<div class="control-group">
											<label for="" class="control-label">按钮图片：</label>
											<div id="btn_img_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['btnimg']) ?>" />
												<input type="hidden" value="<?php  echo $data['btnimg'];?>" name="share[btnimg]" id="btnimg" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">传按钮图</button>
												</span>
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">分享图片：</label>
											<div class="controls">
												<div id="share_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['share_thumb']) ?>" />
												<input type="hidden" value="<?php  echo $data['share_thumb'];?>" name="share[share_thumb]" id="videobgimg" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">分享图片</button><span class="help-inline">（建议尺寸:宽640像素,高960像素或等比图片）</span></span></div> 
											</div>
										</div>										
									</div>
									<div class="control-group js_scene_style js_tel hide">
										<div class="control-group margin-top10">
											<label for="" class="control-label">按钮图片：</label>
											<div id="btn_img_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['btnimg']) ?>" />
												<input type="hidden" value="<?php  echo $data['btnimg'];?>" name="tel[btnimg]" id="btnimg" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">传按钮图</button>
												</span>
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">电话：</label>
											<div class="controls">
												<input type="text" class="input-xlarge" name="tel[tel]" value="<?php  echo $data['tel'];?>" placeholder="输入有效的电话号码" data-rule-required="true" data-rule-phone="true"/>
												<span class="help-block">输入有效的电话号码</span>
											</div>
										</div>
									</div>
									<div class="control-group js_scene_style js_map hide">
										<div class="control-group">
											<label class="control-label" for="sname">按钮图片</label>
											<div class="controls">
												<div id="btn_img_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['btnimg']) ?>" />
													<input type="hidden" value="<?php  echo $data['btnimg'];?>" name="map[btnimg]" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传按钮图</button>
													</span>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">文字背景图片：</label>
											<div class="margin-top10">
												<div id="btn_img_image_uploads" class="">
													<img upload="image-single" style="max-width:100px;" src="<?php  echo $this->toimage($data['txtbg']) ?>" />
													<input type="hidden" value="<?php  echo $data['txtbg'];?>" name="map[txtbg]" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button>
													</span>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="sname">名称</label>
											<div class="controls">
												<input type="text" id="sname" class="input-large" name="map[sname]" value="<?php  echo $data['sname'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(导航显示名称)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="suggestId">经纬度</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" id="suggestId" class="input-xlarge" name="map[place]" data-rule-required="true"  value="<?php  echo $data['place'];?>"/>
													<button class="btn" type="button" id="positioning">搜索</button>
												</div>

												<span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注!</span>
												<div id="l-map">
													<i class="icon-spinner icon-spin icon-large"></i>地图加载中...
												</div>
												<div id="r-result">
													<input type="hidden" id="lng" name="map[lng]" value="<?php  echo $data['lng'];?>" /><input type="hidden" id="lat" name="map[lat]" value="<?php  echo $data['lat'];?>"  />
												</div>
											</div>
										</div>
									</div>
                                  
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
	</script> 
</html>