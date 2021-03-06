<div class="control-group js_scene_style js_amap hide">
	<div class="control-group">
		<label class="control-label" for="tel">电话号码</label>
		<div class="controls">
			<input type="text" id="tel" class="input-large" name="amap[tel]" data-rule-phone="true" value="<?php  echo $data['tel'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="mail">邮件</label>
		<div class="controls">
			<input type="text" id="mail" class="input-large" name="amap[email]" data-rule-email="true" value="<?php  echo $data['email'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="wxurl">微信链接</label>
		<div class="controls">
			<input type="text" id="wxurl" class="input-xxlarge" name="bmap[wxurl]" value="<?php  echo $data['wxurl'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(微信链接地址)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="weixin">微信</label>
		<div class="controls">
			<input type="text" id="weixin" class="input-large" name="bmap[weixin]" value="<?php  echo $data['weixin'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">视频背景：</label>
		<div class="margin-top10 controls">
			<div id="map_image_uploads" class="">
			<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($data['mthumb']) ?>" />
			<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="bmap[mthumb]" id="mapimage" />
			<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽560像素,高250像素或等比图片）</span></span></div> 
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="sname">名称</label>
		<div class="controls">
			<input type="text" id="sname" class="input-large" name="bmap[sname]" value="<?php  echo $data['sname'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(导航显示名称)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="suggestId">经纬度</label>
		<div class="controls">
			<div class="input-append">
				<input type="text" id="suggestId" class="input-xlarge" name="bmap[place]" data-rule-required="true"  value="<?php  echo $data['place'];?>"/>
				<button class="btn" type="button" id="positioning">搜索</button>
			</div>

			<span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注!</span>
			<div id="l-map">
				<i class="icon-spinner icon-spin icon-large"></i>地图加载中...
			</div>
			<div id="r-result">
				<input type="hidden" id="lng" name="bmap[lng]" value="<?php  echo $data['lng'];?>" /><input type="hidden" id="lat" name="bmap[lat]" value="<?php  echo $data['lat'];?>"  />
			</div>
		</div>
	</div>
</div>