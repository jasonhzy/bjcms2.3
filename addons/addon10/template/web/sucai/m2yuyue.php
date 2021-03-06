<div class="control-group js_scene_style js_m2yuyue hide">
	<div class="control-group">
		<label class="control-label" for="tel">电话号码</label>
		<div class="controls">
			<input type="text" id="tel" class="input-large" name="m2yuyue[tel]" data-rule-phone="true" value="<?php  echo $data['tel'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="mail">邮件</label>
		<div class="controls">
			<input type="text" id="mail" class="input-large" name="m2yuyue[email]" data-rule-email="true" value="<?php  echo $data['email'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="wxurl">微信链接</label>
		<div class="controls">
			<input type="text" id="wxurl" class="input-xxlarge" name="m2yuyue[wxurl]" value="<?php  echo $data['wxurl'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(微信链接地址)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="weixin">微信</label>
		<div class="controls">
			<input type="text" id="weixin" class="input-large" name="m2yuyue[weixin]" value="<?php  echo $data['weixin'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>										
	<div class="control-group">
		<label class="control-label" for="str1">预约字段重定义1</label>
		<div class="controls">
			<input type="text" id="str1" class="input-large" name="m2yuyue[str1]" value="<?php  echo $data['str1'];?>"  placeholder="姓名" />
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="str2">预约字段重定义2</label>
		<div class="controls">
			<input type="text" id="str2" class="input-large" name="m2yuyue[str2]"   value="<?php  echo $data['str2'];?>"  placeholder="电话" />
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="str3">预约字段重定义3</label>
		<div class="controls">
			<input type="text" id="str3" class="input-large" name="m2yuyue[str3]"  value="<?php  echo $data['str3'];?>"  placeholder="地址" />
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	
	<div class="control-group">
		<label for="" class="control-label">顶部展示图片：</label>
		<div class="margin-top10 controls">
			<div id="map_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['mthumb']) ?>" />
			<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="m2yuyue[mthumb]" id="mapimage" />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">上传图片</button>
			<span class="help-inline">（建议尺寸:）</span></span></div> 
		</div>
	</div>
</div>