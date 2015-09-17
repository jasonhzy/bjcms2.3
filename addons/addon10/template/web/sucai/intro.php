<div class="control-group js_scene_style js_intro hide">
	<label class="control-label">多图展示：</label>
	<div class="controls">
		<div class="span12"><a href="javascript:void(0)" class="btn" id="add_menu3"><i class="icon-plus"></i>添加图片</a></div>
		<table class="table table-bordered table-hover dataTable">

			<thead>
				<tr>
					<th>标题</th>
					<th>图片地址</th>
					<th>文字介绍</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody id="listTable3">
				<?php  if(empty($data['thumbs'])) { ?>
					<tr class="copy_rows3">
						<td>
							<input type="text" name="intro[title][]"  value="" class="input-small">
						</td>												
						<td>
						<div id="map_image_uploads" class="">
						<img upload="image-single" style="max-height:50px;" src="" />
						<input type="hidden" value="" name="intro[thumbs][]" />
						<span class="help-inline"><button name="button" class="btn select_img" type="button">传图</button><span class="help-inline">（建议尺寸:宽400像素,高700像素或等比图片）</span></span></div>
							</td>
						<td>
						<textarea class="input-xlarge ui-wizard-content ui-helper-reset ui-state-default" name="intro[content][]" data-rule-required="true"></textarea>
						</td>
						<td><a href="javascript:;" class="del">删除</a></td>
					</tr>
				<?php  } else { ?>	
					<?php  if(is_array($data['thumbs'])) { foreach($data['thumbs'] as $key => $row) { ?> 
					<tr class="copy_rows3">
					<td>
						<input type="text" name="intro[title][]"  value="<?php  echo $data['title'][$key];?>" class="input-small">
					</td>
					<td>
						<div id="map_image_uploads" class="">
						<img upload="image-single" style="max-height:50px;" src="<?php  echo $this->toimage($row) ?>" />
						<input type="hidden" value="<?php  echo $row;?>" name="intro[thumbs][]" id="mapimage" />
						<span class="help-inline"><button name="button" class="btn select_img" type="button">传图</button><span class="help-inline">（建议尺寸:）</span></span></div>
					</td>
					<td>
						<textarea class="input-xlarge ui-wizard-content ui-helper-reset ui-state-default"  name="intro[content][]" data-rule-required="true"><?php  echo $data['content'][$key];?></textarea>
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
<script>
//页面事件监听
		$(document).ready(function(){
			 
			//新增门店实景
			$("#add_menu3").click(function(){
				$('.copy_rows3:first').clone(true).appendTo('#listTable3').find('input[type=text]').val('');
				$('.copy_rows3:last').find('img').attr({src:'',alt:'',title:''});
 			});
			
			//删除门店实景
			$("#listTable3 .del").click(function () {
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