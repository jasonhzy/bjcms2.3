<div class="control-group js_scene_style js_youku hide">
 	<div class="control-group">    
		<label for="" class="control-label">视频背景：</label>
		<div class="margin-top10 controls">
			<div id="video_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['vthumb']) ?>" />
			<input type="hidden" value="<?php  echo $data['vthumb'];?>" name="youku[vthumb]"/>
			<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽640像素,高300像素或等比图片）</span></span></div> 
		</div>
	</div>
 	<div class="control-group">    
		<label for="" class="control-label">优酷链接：</label>
		<div class="controls">
			<input type="text" class="input-xlarge" name="youku[url]" value="<?php  echo $data['url'];?>" placeholder="请输入链接地址" data-rule-required="true" data-rule-url="true"/>
			<span class="help-block">形如：http://v.youku.com/v_show/id_XNzgzMTgyMzIw.html)</span>
		</div>
	</div>
</div>