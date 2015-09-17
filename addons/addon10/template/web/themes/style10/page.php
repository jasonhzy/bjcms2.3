 <?php  include addons_page('page_header');?>
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
                                                <option value="1" data-type="first" <?php  if($item['m_type']==1) { ?>selected<?php  } ?>>场景1(双图片)</option>
                                                <option value="2" data-type="second" <?php  if($item['m_type']==2) { ?>selected<?php  } ?>>场景2(双图片)</option>
                                                <option value="3" data-type="third" <?php  if($item['m_type']==3) { ?>selected<?php  } ?>>场景3(双图片)</option>
												<option value="4" data-type="fourth" <?php  if($item['m_type']==4) { ?>selected<?php  } ?>>场景4(上下图)</option>
												<option value="5" data-type="fifth" <?php  if($item['m_type']==5) { ?>selected<?php  } ?>>场景5(优酷视频)</option>
                                                <option value="6" data-type="sixth" <?php  if($item['m_type']==6) { ?>selected<?php  } ?>>场景6(分享)</option>
                                                <option value="7" data-type="seventh" <?php  if($item['m_type']==7) { ?>selected<?php  } ?>>场景7(链接)</option>
                                                <option value="8" data-type="eighth" <?php  if($item['m_type']==8) { ?>selected<?php  } ?>>场景8(电话)</option>
                                                <option value="9" data-type="ninth" <?php  if($item['m_type']==9) { ?>selected<?php  } ?>>场景9(信息)</option>
                                                <!--option value="10" data-type="tenth" <?php  if($item['m_type']==10) { ?>selected<?php  } ?>>带拨号图片式</option-->
                                                
											</select>
                                        </div>
                                    </div>
									<div class="control-group alert js_scene_style js_first hide">
										场景1：图片1从顶部掉下（PNG格式)，图片2左右晃动。(具体参考实例)
									</div>
									
									<div class="control-group alert alert-success js_scene_style js_second hide">
										场景2：图片1从顶部掉下（640*1008)，图片2（650*194)点击出现一个大图3。(具体参考实例)
									</div>
									
									<div class="control-group alert alert-info js_scene_style js_third hide">
										场景3：小图展示在下方，点击出现一个全屏大图，可以关闭。(具体参考实例)
									</div>
									<div class="control-group alert alert-error js_scene_style js_fourth hide">
										场景4：小图展示在下方，图片在右上展示，如果超宽图片，会左右晃动。(具体参考实例)
									</div>
									<div class="control-group alert js_scene_style js_fifth hide">
										场景5：(具体参考实例)
									</div>
									<div class="control-group alert alert-success js_scene_style js_sixth hide">
										场景6：(具体参考实例)
									</div>
									<div class="control-group alert alert-info js_scene_style js_seventh hide">
										场景7：(具体参考实例)
									</div>
									<div class="control-group alert alert-error js_scene_style js_eighth hide">
										场景8：(具体参考实例)
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
									
									<div class="control-group js_scene_style js_first hide">
										<div class="control-group">
											<label for="" class="control-label">浮层图片：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic1'];?>" name="first[pic1]" data-rule-required="true" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以顶部对齐,建议尺寸:宽640像素,高300像素或等比图片，PNG格式,）</span></span>
												</div> 
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">浮层图片2：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic2']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic2'];?>" name="first[pic2]"  />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（图片左右晃动）</span></span></div> 
											</div>
										</div>
									</div>
									<div class="control-group js_scene_style js_second hide">									
										<div class="control-group">
											<label for="" class="control-label">浮层图片：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic1'];?>" name="second[pic1]" data-rule-required="true" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以顶部对齐,建议尺寸:宽640像素,高300像素或等比图片，PNG格式,）</span></span>
												</div> 
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">浮层图片2：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic2']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic2'];?>" name="second[pic2]"  />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（图片慢慢放大）</span></span></div> 
											</div>
										</div>
									</div>
									<div class="control-group js_scene_style js_third hide">
										<div class="control-group">
											<label for="" class="control-label">图标小图：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic1'];?>" name="third[pic1]" data-rule-required="true" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以顶部对齐,建议尺寸:宽640像素,高300像素或等比图片，PNG格式,）</span></span>
												</div> 
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">全屏大图：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic2']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic2'];?>" name="third[pic2]"  />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以右下为对齐，PNG格式,可为空）</span></span></div> 
											</div>
										</div>
									</div>
									<div class="control-group js_scene_style js_fourth hide">									
										<div class="control-group">
											<label for="" class="control-label">下方文字：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic1'];?>" name="fourth[pic1]" data-rule-required="true" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以底部对齐,PNG格式,）</span></span>
												</div> 
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">上方图片：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic2']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic2'];?>" name="fourth[pic2]"  />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（如果超宽图片，会左右晃动,建议尺寸:宽640像素,高1008像素或等比图片）</span></span></div> 
											</div>
										</div>
									</div>									
									<div class="control-group js_scene_style js_fifth hide">
										<div class="control-group">
											<label class="control-label" for="wxurl">优酷视频</label>
											<div class="controls">
												<input type="text" id="wxurl" class="input-xxlarge" name="fifth[url]" value="<?php  echo $data['wxurl'];?>"/>
												<span class="maroon">*</span><span class="help-block">(优酷播放地址,例如：http://v.youku.com/v_show/id_XNzg0Njk0MDUy.html)</span>
											</div>
										</div>
									</div>
									<div class="control-group js_scene_style js_sixth hide">
										<div class="control-group">
											<label for="" class="control-label">按钮小图：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic1'];?>" name="sixth[pic1]" data-rule-required="true" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button></span>
												</div> 
												<span class="help-block">（以顶部对齐,建议尺寸:宽580像素,高80像素或等比图片，PNG格式,）</span>
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">分享大图：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic2']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic2'];?>" name="sixth[pic2]"  />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以右下为对齐，PNG格式,可为空）</span></span></div> 
											</div>
										</div>
									</div>							
									<div class="control-group js_scene_style js_seventh hide">
										<div class="control-group">
											<label for="" class="control-label">按钮小图：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic1'];?>" name="seventh[pic1]" data-rule-required="true" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button></span>
												</div> 
												<span class="help-block">（以顶部对齐,建议尺寸:宽580像素,高80像素或等比图片，PNG格式,）</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="url7">外部链接</label>
											<div class="controls">
												<input type="text" id="url7" class="input-xxlarge" name="seventh[url]" value="<?php  echo $data['url'];?>" data-rule-required="true"  data-rule-url="true"/>
												<span class="maroon">*</span><span class="help-block">(外部链接地址)</span>
											</div>
										</div>
									</div>							
									<div class="control-group js_scene_style js_eighth hide">
										<div class="control-group">
											<label for="" class="control-label">按钮小图：</label>
											<div class="margin-top10 controls">
												<div id="video_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
												<input type="hidden" value="<?php  echo $data['pic1'];?>" name="eighth[pic1]" data-rule-required="true" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button></span>
												</div> 
												<span class="help-block">（以顶部对齐,建议尺寸:宽580像素,高80像素或等比图片，PNG格式,）</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="url8">电话号码</label>
											<div class="controls">
												<input type="text" id="url8" class="input-large" name="eighth[tel]" value="<?php  echo $data['tel'];?>" data-rule-required="true"  data-rule-phone="true"/>
												<span class="maroon">*</span><span class="help-inline">(电话号码)</span>
											</div>
										</div>
									</div>		
									<div class="control-group js_scene_style js_ninth hide">
										<div class="control-group">
											<label for="" class="control-label">电话：</label>
											<div class="controls">
												<input type="text" class="input-xlarge" name="ninth[tel]" value="<?php  echo $data['tel'];?>" placeholder="请输入电话号码"  data-rule-phone="true"/>
												<span class="help-block">请填写真实的电话号码</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="mail">邮件</label>
											<div class="controls">
												<input type="text" id="mail" class="input-large" name="ninth[email]" data-rule-email="true" value="<?php  echo $data['email'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="wxurl">微信链接</label>
											<div class="controls">
												<input type="text" id="wxurl" class="input-xxlarge" name="ninth[wxurl]" value="<?php  echo $data['wxurl'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(微信链接地址)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="weixin">微信</label>
											<div class="controls">
												<input type="text" id="weixin" class="input-large" name="ninth[weixin]" value="<?php  echo $data['weixin'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
                                    </div>
                                </div>
							 
									<!--分享开始-->
									
									
									
									 
 									<div class="control-group js_scene_style js_map hide">
										<div class="control-group">
											<label class="control-label" for="tel">电话号码</label>
											<div class="controls">
												<input type="text" id="tel" class="input-large" name="map[tel]" data-rule-phone="true" value="<?php  echo $data['tel'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="mail">邮件</label>
											<div class="controls">
												<input type="text" id="mail" class="input-large" name="map[email]" data-rule-email="true" value="<?php  echo $data['email'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="str1">预约字段重定义1</label>
											<div class="controls">
												<input type="text" id="str1" class="input-large" name="map[str1]" data-rule-email="true" value="<?php  echo $data['str1'];?>"  placeholder="姓名" />
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="str2">预约字段重定义2</label>
											<div class="controls">
												<input type="text" id="str2" class="input-large" name="map[str2]" data-rule-email="true" value="<?php  echo $data['str2'];?>"  placeholder="电话" />
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="str3">预约字段重定义3</label>
											<div class="controls">
												<input type="text" id="str3" class="input-large" name="map[email]" data-rule-email="true" value="<?php  echo $data['str3'];?>"  placeholder="地址" />
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="wxurl">微信链接</label>
											<div class="controls">
												<input type="text" id="wxurl" class="input-xxlarge" name="map[wxurl]" value="<?php  echo $data['wxurl'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(微信链接地址)</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="weixin">微信</label>
											<div class="controls">
												<input type="text" id="weixin" class="input-large" name="map[weixin]" value="<?php  echo $data['weixin'];?>"/>
												<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
											</div>
										</div>
										<div class="control-group">
											<label for="" class="control-label">视频背景：</label>
											<div class="margin-top10 controls">
												<div id="map_image_uploads" class="">
												<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['mthumb']) ?>" />
												<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="map[mthumb]" id="mapimage" />
												<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:）</span></span></div> 
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
                            <div class="control-group js_scene_style js_pics hide">
								<label class="control-label">多图展示：</label>
								<div class="controls">
									<div class="span12"><a href="javascript:void(0)" class="btn" id="add_menu"><i class="icon-plus"></i>添加图片</a></div>
									<table class="table table-bordered table-hover dataTable">

										<thead>
											<tr>
												<th>缩略图</th>
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
													<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="pics[nails][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传小图</button><span class="help-inline">（建议尺寸:宽250像素,高350像素或等比图片）</span></span></div>
														</td>												
													<td>
													<div id="map_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($pics['mthumb']) ?>" />
													<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="pics[thumbs][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传大图</button><span class="help-inline">（建议尺寸:宽400像素,高700像素或等比图片）</span></span></div>
														</td>
													<td><a href="javascript:;" class="del">删除</a></td>
												</tr>
											<?php  } else { ?>	
												<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $key => $row) { ?> 
												<tr class="copy_rows">
												<td>
													<?php  if(isset($data['nails'][$key])) { ?>
													<div id="map_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['nails'][$key]) ?>" />
													<input type="hidden" value="<?php  echo $data['nails'][$key];?>" name="pics[nails][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传小图</button><span class="help-inline">（建议尺寸:宽400像素,高700像素或等比图片）</span></span></div>
													<?php  } else { ?>
													<div id="map_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="" />
													<input type="hidden" value="<?php  echo $data['nails'][$key];?>" name="pics[nails][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽250像素,高350像素或等比图片）</span></span></div>
												
													<?php  } ?>
												</td>
												<td>
													<div id="map_image_uploads" class="">
 													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($row) ?>" />
													<input type="hidden" value="<?php  echo $row;?>" name="pics[thumbs][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传大图</button><span class="help-inline">（建议尺寸:）</span></span></div>
												</td>
												<td><a href="javascript:;" class="del">删除</a></td>
												</tr>
												<?php  } } ?>
											<?php  } ?>
										</tbody>
									</table>
									<span class="help-block">大图小图必须配对上传，否则会出错</span>
								</div>
							</div>
							<div class="control-group js_scene_style js_intro hide">
								<label class="control-label">多图展示：</label>
								<div class="controls">
									<div class="span12"><a href="javascript:void(0)" class="btn" id="add_menu2"><i class="icon-plus"></i>添加图片</a></div>
									<table class="table table-bordered table-hover dataTable">

										<thead>
											<tr>
												<th>标题</th>
												<th>图片地址</th>
 												<th>文字介绍</th>
 												<th>操作</th>
											</tr>
										</thead>
										<tbody id="listTable2">
											<?php  if(empty($data['thumbs'])) { ?>
												<tr class="copy_rows2">
													<td>
														<input type="text" name="intro[title][]"  value="" class="input-small">
													</td>												
													<td>
													<div id="map_image_uploads" class="">
													<img upload="image-single" style="max-height:50px;" src="" />
													<input type="hidden" value="" name="intro[thumbs][]" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传图</button><span class="help-inline">（建议尺寸:宽400像素,高700像素或等比图片）</span></span></div>
														</td>
													<td>
													<textarea class="input-xlarge ui-wizard-content ui-helper-reset ui-state-default" name="intro[content][]" data-rule-required="true"></textarea>
													</td>
													<td><a href="javascript:;" class="del">删除</a></td>
												</tr>
											<?php  } else { ?>	
												<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $key => $row) { ?> 
												<tr class="copy_rows2">
												<td>
													<input type="text" name="intro[title][]"  value="<?php  echo $data['title'][$key];?>" class="input-small">
												</td>
												<td>
													<div id="map_image_uploads" class="">
 													<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($row) ?>" />
													<input type="hidden" value="<?php  echo $row;?>" name="intro[thumbs][]" id="mapimage" />
													<span class="help-inline"><button name="button" class="btn select_img" type="button">传图</button><span class="help-inline">（建议尺寸:）</span></span></div>
												</td>
												<td>
													<textarea class="input-xlarge ui-wizard-content ui-helper-reset ui-state-default"  name="intro[content][]" data-rule-required="true"><?php  echo $data['content'][$key];?></textarea>
												</td>
												<td><a href="javascript:;" class="del">删除</a></td>
												</tr>
												<?php  } } ?>
											<?php  } ?>
										</tbody>
									</table>
									<span class="help-block">大图小图必须配对上传，否则会出错</span>
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
			//新增门店实景
			$("#add_menu2").click(function(){
				$('.copy_rows2:first').clone(true).appendTo('#listTable2').find('input[type=text]').val('');
				$('.copy_rows2:last').find('img').attr({src:'',alt:'',title:''});
				//$('.copy_rows:last').find('script').remove();
			});
			
			//删除门店实景
			$("#listTable2 .del").click(function () {
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