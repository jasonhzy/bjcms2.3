<div class="control-group js_scene_style js_layer34 hide">
	<div class="control-group">
		<label for="" class="control-label">浮层图片：</label>
		<div class="margin-top10 controls">
			<div id="video_image_uploads" class="">
			<img upload="image-single" style="max-width:100px;" src="<?php  echo $this->toimage($data['pic1']) ?>" />
			<input type="hidden" value="<?php  echo $data['pic1'];?>" name="layer34[pic1]" data-rule-required="true" />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button><span class="help-block">（以顶部对齐,建议尺寸:宽640像素,高1080像素或等比图片，PNG格式,）</span></span>
			</div> 
		</div>
	</div>
</div>
 