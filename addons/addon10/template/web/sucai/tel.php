<div class="js_scene_style js_tel hide">
 	<div class="control-group">    
		<label for="" class="control-label">按钮图片：</label>
		<div class="margin-top10">
			<div id="btn_img_image_uploads" class="">
				<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['btnimg']) ?>" />
				<input type="hidden" value="<?php  echo $data['btnimg'];?>" name="tel[btnimg]"  />
				<span class="help-inline"><button name="button" class="btn select_img" type="button">传按钮图</button>
				</span>
			</div>
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">电话：</label>
		<div class="controls">
			<input type="text" class="input-xlarge" name="tel[tel]" value="<?php  echo $data['tel'];?>" placeholder="请输入电话号码" data-rule-required="true" data-rule-phone="true"/>
			<span class="help-block">请填写真实的电话号码</span>
		</div>
	</div>
</div>