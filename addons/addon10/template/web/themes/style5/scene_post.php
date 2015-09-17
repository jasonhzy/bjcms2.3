<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">制作画报&nbsp;&nbsp;&nbsp;</h3>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="id" class="col-xs-10 col-sm-2" value="<?php echo $scene['id'];?>" />
			<input type="hidden" name="theme" class="col-xs-10 col-sm-2" value="<?php echo $theme;?>" />
							 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 前台链接</label>

										<div class="col-sm-9">
											<?php if(!empty($scene['id'])){?>
													<input readonly="readlony" type="text"  name="mobile_url" class="col-xs-10 col-sm-6" value="<?php echo WEBSITE_ROOT;?><?php  echo mobile_url('show', array('id' => $scene['id']))?>" /> &nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo WEBSITE_ROOT;?><?php  echo mobile_url('show', array('id' => $scene['id']))?>">预览</a>
													<?php }else{?>
													提交后生成链接
														<?php }?>
										</div>
									</div>
		 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 画报名称</label>

										<div class="col-sm-9">
										<input type="text" name="title" class="col-xs-10 col-sm-3" value="<?php echo $scene['title'];?>" />
										<div class="help-block">不能超过25个字符</div>
										</div>
									</div>
									
  
		 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 图文标题：</label>

										<div class="col-sm-9">
													<input type="text" name="reply_title" class="col-xs-10 col-sm-3" value="<?php echo $scene['reply_title'];?>" />
													<div class="help-block">不能超过25个字符</div>
										</div>
									</div>
									
									
											 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" >图文封面：</label>

										<div class="col-sm-9">
										
														 <div class="fileupload fileupload-new" data-provides="fileupload">
			                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
			                        	 <?php  if(!empty($scene['reply_thumb'])) { ?>
			                            <img style="width:100%" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $scene['reply_thumb'];?>" alt="" onerror="$(this).remove();">
			                              <?php  } ?>
			                            </div>
			                        <div>
			                         <input name="reply_thumb" id="reply_thumb" type="file"  />
			                            <a href="#" class="fileupload-exists" data-dismiss="fileupload">移除图片</a>
			                            	 <?php  if(!empty($scene['reply_thumb'])) { ?>
			                              <input name="reply_thumb_del" id="reply_thumb_del" type="checkbox" value="1" />删除已上传图片
			                                 <?php  } ?>
			                        </div>
			                    </div>
			                    <div class="help-block">建议尺寸:宽540像素,高300像素或等比图片</div>
										
										</div>
									</div>	
									
									
											 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 图文简介：</label>

										<div class="col-sm-9">
													<textarea class="input-xxlarge" rows="4" name="reply_description"><?php  echo $scene['reply_description'];?></textarea>
										</div>
									</div>
									
																								
								 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 分享标题设置：</label>

										<div class="col-sm-9">
													<input type="text" name="share_title" id="share_title" value="<?php  echo $scene['share_title'];?>" class="input-medium" data-rule-required="true" data-rule-maxlength="25">
													 <div class="help-block">不能超过25个字符</div>
										</div>
									</div>


	 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 分享图标：</label>

										<div class="col-sm-9">
											
														 <div class="fileupload fileupload-new" data-provides="fileupload">
			                        <div class="fileupload-preview thumbnail" style="width: 100px; height: 100px;">
			                        	 <?php  if(!empty($scene['share_thumb'])) { ?>
			                            <img style="width:100%" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $scene['share_thumb'];?>" alt="" onerror="$(this).remove();">
			                              <?php  } ?>
			                            </div>
			                        <div>
			                         <input name="share_thumb" id="share_thumb" type="file"  />
			                            <a href="#" class="fileupload-exists" data-dismiss="fileupload">移除图片</a>
			                            	 <?php  if(!empty($scene['share_thumb'])) { ?>
			                              <input name="share_thumb_del" id="share_thumb_del" type="checkbox" value="1" />删除已上传图片
			                                 <?php  } ?>
			                        </div>
			                    </div>
											  <div class="help-block">建议尺寸:宽100像素,高100像素或等比图片</div>
											
										</div>
									</div>		
									
									
									
									
									
									
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 分享内容设置：</label>

										<div class="col-sm-9">
											
													<input type="text" name="share_content" class="col-xs-10 col-sm-3" value="<?php echo $scene['share_content'];?>" />
										</div>
									</div>
									
											<div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" >微场景开场画面：</label>

										<div class="col-sm-9">
													<select name="first_type"  id="first_type" onchange="change_first_type(this.value)">
                                                <option value="2" <?php echo $scene['first_type']==2?'selected':'selected';?> >刮卡图片式</option>
                                             </select>
										</div>
									</div>
									

									
									
													<div class="form-group" >
										<label class="col-sm-2 control-label no-padding-left" >刮刮图片：</label>

										<div class="col-sm-9">
												
														 <div class="fileupload fileupload-new" data-provides="fileupload">
			                        <div class="fileupload-preview thumbnail" style="width: 100px; height: 100px;">
			                        	 <?php  if(!empty($scene['cover1'])) { ?>
			                            <img style="width:100%" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $scene['cover1'];?>" alt="" onerror="$(this).remove();">
			                              <?php  } ?>
			                            </div>
			                        <div>
			                         <input name="cover1" id="cover1" type="file"  />
			                            <a href="#" class="fileupload-exists" data-dismiss="fileupload">移除图片</a>
			                            	 <?php  if(!empty($scene['cover1'])) { ?>
			                              <input name="cover1_del" id="cover1_del" type="checkbox" value="1" />删除已上传图片
			                                 <?php  } ?>
			                        </div>
			                    </div>
											    <div class="help-block">建议尺寸:宽640像素,高960像素或等比图片</div>
										</div>
									</div>
									
									
														<div class="form-group" >
										<label class="col-sm-2 control-label no-padding-left" >背景图片：</label>

										<div class="col-sm-9">
											
														 <div class="fileupload fileupload-new" data-provides="fileupload">
			                        <div class="fileupload-preview thumbnail" style="width: 100px; height: 100px;">
			                        	 <?php  if(!empty($scene['cover2'])) { ?>
			                            <img style="width:100%" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $scene['cover2'];?>" alt="" onerror="$(this).remove();">
			                              <?php  } ?>
			                            </div>
			                        <div>
			                         <input name="cover2" id="cover2" type="file"  />
			                            <a href="#" class="fileupload-exists" data-dismiss="fileupload">移除图片</a>
			                            	 <?php  if(!empty($scene['cover2'])) { ?>
			                              <input name="cover2_del" id="cover2_del" type="checkbox" value="1" />删除已上传图片
			                                 <?php  } ?>
			                        </div>
			                    </div>
											    <div class="help-block">建议尺寸:宽640像素,高960像素或等比图片</div>
										</div>
									</div>
									
									
									
									
									
										<div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 背景音乐：</label>

										<div class="col-sm-9">
											<input type="radio" name="bg_music_switch" value="1"  <?php  echo (empty($scene['bg_music_switch'])||$scene['bg_music_switch']==1)?"checked=\"\"":"";?>/>开启，
											<input type="radio" name="bg_music_switch" value="2" <?php  echo ($scene['bg_music_switch']==2)?"checked=\"\"":"";?>/>关闭
											
												 <input name="bg_music_url" id="bg_music_url" type="file"  />
			                         	 <?php  if(!empty($scene['bg_music_url'])) { ?>
			                         	 <a href="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $scene['bg_music_url'];?>" target="_blank">音乐文件</a>
			                              <input name="bg_music_url_del" id="bg_music_url_del" type="checkbox" value="1" />删除已上传图片
			                                 <?php  } ?>
			                                 <div class="help-block">保证浏览网页的加载速度,请尽量减小上传音乐大小</div>
										</div>
									</div>
									
								
									 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 第三方统计代码：</label>

										<div class="col-sm-9">
														<textarea class="input-xxlarge" rows="4" name="tongji" data-rule-maxlength="900"><?php  echo $scene['tongji'];?></textarea>
														
										</div>
									</div>
		
									
									
								
									
												  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> </label>

										<div class="col-sm-9">
										<input name="submit" type="submit" value=" 提 交 " class="btn btn-info"/>
										
										</div>
									</div>
		</form>

<?php  include page('footer');?>
