<div class="control-group js_scene_style js_pics35 hide">
	<label class="control-label">多图展示：</label>
	<div class="controls">
		<div class="span12"><a href="javascript:void(0)" class="btn" id="add_menu"><i class="icon-plus"></i>添加图片</a></div>
		<table class="table table-bordered table-hover dataTable">
			<thead>
				<tr>
					<th>图片地址</th>
					<th>操作</th>
				</tr>
			</thead>
			 
			<tbody id="listTable">
				<?php  if(empty($data['thumbs'])) { ?>
					<tr class="copy_rows">
						<td>
						<div id="map_image_uploads" class="">
						<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($pics35['mthumb']) ?>" />
						<input type="hidden" value="<?php  echo $data['mthumb'];?>" name="pics35[thumbs][]" id="mapimage" />
						<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽560像素,高250像素或等比图片）</span></span></div>
							</td>
						<td><a href="javascript:;" class="del">删除</a></td>
					</tr>
				<?php  } else { ?>	
					<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $row) { ?> 
					<tr class="copy_rows">
					<td>
						<div id="map_image_uploads" class="">
						<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($row) ?>" />
						<input type="hidden" value="<?php  echo $row;?>" name="pics35[thumbs][]" id="mapimage" />
						<span class="help-inline"><button name="button" class="btn select_img" type="button">传背景图</button><span class="help-inline">（建议尺寸:宽560像素,高250像素或等比图片）</span></span></div>
					</td>
					<td><a href="javascript:;" class="del">删除</a></td>
					</tr>
					<?php  } } ?>
				<?php  } ?>
			</tbody>
		</table>
	</div>
</div>
<script>
//页面事件监听
$(document).ready(function(){
	//新增门店实景
	$("#add_menu").click(function(){
		$('.copy_rows:first').clone(true).appendTo('#listTable').find('input[type=text]').val('');
		$('.copy_rows:last').find('img').attr({src:'',alt:'',title:''});
		//$('.copy_rows:last').find('script').remove();
	});
	
	//删除门店实景
	$("#listTable .del").click(function () {
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