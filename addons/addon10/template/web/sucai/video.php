<div class="control-group js_scene_style js_video hide">
	<div class="control-group">
		<label for="" class="control-label">视频背景：</label>
		<div class="margin-top10 controls">
			<div id="video_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['vthumb']) ?>" />
			<input type="hidden" value="<?php  echo $data['vthumb'];?>" name="video[vthumb]" id="videobgimg" />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽640像素,高300像素或等比图片）</span></span></div> 
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">视频链接：</label>
		<div class="controls">
			<div upload="file-single"><?php  echo $this->toimage($data['url']);?></div>
			<input type="hidden"  name="video[url]" value="<?php  echo $data['url'];?>" />
			<span class="help-inline"><button name="button" class="btn select_file" type="button">传文件</button>
			<span class="help-block">暂时只支持mp4格式的视频,视频链接格式为http://您的域名/视频文件名.mp4</span></span>
			
			
		</div>
	</div>
</div>