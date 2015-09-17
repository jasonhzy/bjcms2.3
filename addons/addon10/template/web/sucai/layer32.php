<div class="control-group js_scene_style js_layer32 hide">
	<div class="control-group">
		<label for="" class="control-label">浮层图片：</label>
		<div class="margin-top10 controls">
			<div id="video_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
			<input type="hidden" value="<?php  echo $data['pic1'];?>" name="layer32[pic1]" data-rule-required="true" />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以顶部对齐,建议尺寸:宽640像素,高300像素或等比图片，PNG格式,）</span></span>
			</div> 
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">展现方式：</label>
		<div class="margin-top10 controls">
			<select  class="input-medium js_type" name="layer32[show1]">
				<option value="z-center" <?php  if($data['show1']=='z-center') { ?>selected<?php  } ?>>从上往下</option>
				<option value="z-left" <?php  if($data['show1']=='z-left') { ?>selected<?php  } ?>>从左往右</option>
			 </select><span class="help-inline"></span>
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">浮层图片2：</label>
		<div class="margin-top10 controls">
			<div id="video_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['pic2']) ?>" />
			<input type="hidden" value="<?php  echo $data['pic2'];?>" name="layer32[pic2]"  />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以右下为对齐，PNG格式,可为空）</span></span></div> 
		</div>
	</div>
	<div class="control-group hide">
		<label for="" class="control-label">浮层图片3：</label>
		<div class="margin-top10 controls">
			<div id="video_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['vthumb']) ?>" />
			<input type="hidden" value="<?php  echo $data['pic3'];?>" name="layer32[pic3]"  />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（PNG格式,可为空）</span></span></div> 
		</div>
	</div>
	<div class="control-group hide">
		<label for="" class="control-label">浮层图片4：</label>
		<div class="margin-top10 controls">
			<div id="video_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['vthumb']) ?>" />
			<input type="hidden" value="<?php  echo $data['pic4'];?>" name="layer32[pic4]"  />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（ PNG格式,可为空）</span></span></div> 
		</div>
	</div>
</div>
 