<div class="control-group js_scene_style js_maplink hide">
	<div class="control-group">
		<label for="" class="control-label">按钮图片：</label>
		<div id="btn_img_image_uploads" class="">
			<img upload="image-single" style="max-height:50px" src="<?php  echo $this->toimage($data['btnimg']) ?>" />
			<input type="hidden" value="<?php  echo $data['btnimg'];?>" name="maplink[btnimg]" />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">传按钮图</button>
			</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="tel">电话号码</label>
		<div class="controls">
			<input type="text" id="tel" class="input-large" name="maplink[tel]" data-rule-phone="true" value="<?php  echo $data['tel'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="sname">名称</label>
		<div class="controls">
			<input type="text" id="sname" class="input-large" name="maplink[sname]" value="<?php  echo $data['sname'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(导航显示名称)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="suggestId">经纬度</label>
		<div class="controls">
			<div class="input-append">
				<input type="text" id="suggestId" class="input-xlarge" name="maplink[place]" data-rule-required="true"  value="<?php  echo $data['place'];?>"/>
				<button class="btn" type="button" id="positioning">搜索</button>
			</div>

			<span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注!</span>
			<div id="l-map">
				<i class="icon-spinner icon-spin icon-large"></i>地图加载中...
			</div>
			<div id="r-result">
				<input type="hidden" id="lng" name="maplink[lng]" value="<?php  echo $data['lng'];?>" /><input type="hidden" id="lat" name="maplink[lat]" value="<?php  echo $data['lat'];?>"  />
			</div>
		</div>
	</div>
	 
</div>

 