<div class="js_scene_style js_t2btn hide">
 	<div class="control-group">    
		<label for="" class="control-label">提示文字：</label>
		<div class="controls">
 			<input type="text" class="input-large" name="t2btn[str]"  value="<?php  echo $data['str'];?>"  placeholder="提示文字" />
 		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">链接：</label>
		<div class="controls">
			<input type="text" class="input-xlarge" name="t2btn[url]" value="<?php  echo $data['url'];?>" placeholder="请输入链接地址" data-rule-required="true" data-rule-url="true"/>
			<span class="help-block">链接地址：http://</span>
		</div>
	</div>
</div>