<div class="js_scene_style js_btn hide">
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