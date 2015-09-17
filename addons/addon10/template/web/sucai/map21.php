<div class="control-group js_scene_style js_map21 hide">
	<div class="control-group">
		<label class="control-label" for="tel">电话号码</label>
		<div class="controls">
			<input type="text" id="tel" class="input-large" name="map21[tel]" data-rule-phone="true" value="<?php  echo $data['tel'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(为空,不显示)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="sname">名称</label>
		<div class="controls">
			<input type="text" id="sname" class="input-large" name="map21[sname]" value="<?php  echo $data['sname'];?>"/>
			<span class="maroon">*</span><span class="help-inline">(导航显示名称)</span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="suggestId">经纬度</label>
		<div class="controls">
			<div class="input-append">
				<input type="text" id="suggestId" class="input-xlarge" name="map21[place]" data-rule-required="true"  value="<?php  echo $data['place'];?>"/>
				<button class="btn" type="button" id="positioning">搜索</button>
			</div>

			<span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注!</span>
			<div id="l-map">
				<i class="icon-spinner icon-spin icon-large"></i>地图加载中...
			</div>
			<div id="r-result">
				<input type="hidden" id="lng" name="map21[lng]" value="<?php  echo $data['lng'];?>" /><input type="hidden" id="lat" name="map21[lat]" value="<?php  echo $data['lat'];?>"  />
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">多图展示：</label>
		<div class="controls">
			<div class="span12">
				<a href="javascript:void(0)" class="btn" id="add_menu4"><i class="icon-plus"></i>添加图片</a>
			</div>
			<table class="table table-bordered table-hover dataTable">
				<thead>
					<tr>
						<th>图片展示</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody id="listTable4">
					<?php  if(empty($data['thumb'])) { ?>
						<tr class="copy_rows4">
							<td>
							<div id="map_image_uploads" class="">
							<img upload="image-single" style="max-height:50px;" src="" />
							<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="map21[thumb][]" />
							<span class="help-inline"><button name="button" class="btn select_img" type="button">传小图</button><span class="help-inline">（建议尺寸:宽200像素,高200像素或等比图片）</span></span></div>
								</td>												
							 
							<td><a href="javascript:;" class="del">删除</a></td>
						</tr>
					<?php  } else { ?>	
						<?php  if(is_array($data['thumb'])) { foreach($data['thumb'] as $key => $row) { ?> 
						<tr class="copy_rows4">
						<td>
 							<div id="map_image_uploads" class="">
							<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($row) ?>" />
							<input type="hidden" value="<?php  echo $row;?>" name="map21[thumb][]"  />
							<span class="help-inline"><button name="button" class="btn select_img" type="button">传图片</button><span class="help-inline">（建议尺寸:宽200像素,高200像素或等比图片）</span></span></div>
						</td>
						<td><a href="javascript:;" class="del">删除</a></td>
						</tr>
						<?php  } } ?>
					<?php  } ?>
				</tbody>
			</table>
			<span class="help-block">大图小图必须配对上传，否则会出错</span>
		</div>
	</div>
</div>

<script>
//页面事件监听
		$(document).ready(function(){
			//新增门店实景
			$("#add_menu4").click(function(){
				$('.copy_rows4:first').clone(true).appendTo('#listTable4').find('input[type=text]').val('');
				$('.copy_rows4:last').find('img').attr({src:'',alt:'',title:''});
				//$('.copy_rows:last').find('script').remove();
			});
			
			//删除门店实景
			$("#listTable4 .del").click(function () {
					var removeObj = $(this).parent('td').parent('tr');
					var className = removeObj.attr('class');
					if($("." + className).length <= 1){
						removeObj.find('img').remove();
						return removeObj.find('input[type=text],input[type=hidden]').val('');
						
					}
					return removeObj.remove();
				
			});
		});
</script>