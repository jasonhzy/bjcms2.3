<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

	<h3 class="header smaller lighter blue">大转盘</h3>
	<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/datetimepicker.css" />
		<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/datetimepicker.js"></script>

 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
       <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 抽奖界面：</label>

										<div class="col-sm-9">
													  <a href="<?php  echo create_url('mobile',array('name' => 'addon3','do' => 'index'))?>" target="_blank"><?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon3','do' => 'index'))?></a>
										</div>
		</div>
      
      
           <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 重置活动：</label>

										<div class="col-sm-9">
													   <a class="btn btn-danger" href="<?php  echo create_url('site',array('name' => 'addon3','do' => 'clear'))?>" onclick="return confirm('确定清空所有记录重新开始活动？')">重置活动</a>
										</div>
		</div>
		      <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 是否需要登录才能抽奖：</label>

										<div class="col-sm-9">
													   <input type="radio" name="needreg" value="0" id="needreg" <?php  if($config['needreg'] == 0) { ?>checked="true"<?php  } ?> /> 关闭  &nbsp;&nbsp;
             
                <input type="radio" name="needreg" value="1" id="needreg"  <?php  if($config['needreg'] == 1) { ?>checked="true"<?php  } ?> /> 开启
													  </div>
		</div>
		
		     <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 标题：</label>

										<div class="col-sm-9">
													  
                    <input type="text" name="title" value="<?php  echo $config['title'];?>" />  </div>
		</div>
		  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 活动时间：</label>

										<div class="col-sm-9">
													  
                   <input name="datelimit-start" id="datelimit-start" type="text" value="<?php echo empty($config['starttime'])?date('Y-m-d H:i',time()):date('Y-m-d H:i',$config['starttime'])?>" readonly="readonly"  /> - 
<input id="datelimit-end" name="datelimit-end" type="text" value="<?php echo empty($config['endtime'])?date('Y-m-d H:i',time()):date('Y-m-d H:i',$config['endtime'])?>" readonly="readonly"  /> 
			<script type="text/javascript">
		$("#datelimit-start").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			//pickerPosition: "top-right",
			autoclose: true
		});
	</script> 
	<script type="text/javascript">
		$("#datelimit-end").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			autoclose: true
		});
	</script>
                    </div>
		</div>
            
    

              	     <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 活动说明：</label>

										<div class="col-sm-9">
													  
                 
                	<textarea name="description" id="description" cols="60" rows="8"><?php  echo $config['description'];?></textarea>
                	
                	</div>
		</div>
		
		    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 兑奖信息：</label>

										<div class="col-sm-9">
													  
                  <input type="text" name="ticket_information" value="<?php  echo $config['ticket_information'];?>" />
                	
                	</div>
		</div>
                  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 重复抽奖信息：</label>

										<div class="col-sm-9">
													  
             <input type="text" name="repeat_lottery_reply" value="<?php  echo $config['repeat_lottery_reply'];?>" />
                	
                	</div>
		</div>
               
               
                 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 版权信息：</label>

										<div class="col-sm-9">
													  
                    <input type="text" name="copyright" value="<?php  echo $config['copyright'];?>" />
                	
                	</div>
		</div>
               
               
            <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 奖品设置：</label>

										<div class="col-sm-9">
													  
                   <table class="table table-hover">
							<thead>
								<tr>
									<th>奖品类别(10字以内)</th>
									<th>奖品名称(50字以内)</th>
									<th>奖品数量</th>
									<th>中奖概率</th>
								</tr>
							</thead>
							<tbody id="re-items">
								<tr id='c_one'>
									<td><input id="c_type_one" name="c_type_one" type="text" class="span2" value="<?php  echo $config['c_type_one']?>" maxlength="10" placeholder='例如:一等奖' style="width:100px;"/></td>
									<td><input id="c_name_one" name="c_name_one" type="text" class="span3" value="<?php  echo $config['c_name_one']?>"  maxlength="50"/></td>
									<td><input id="c_num_one"  name="c_num_one" type="text" class="span1" value="<?php  echo $config['c_num_one']?>" /></td>
									<td><input id="c_rate_one"  name="c_rate_one" type="text" class="span1" value="<?php  echo $config['c_rate_one']?>" />%</td>
								</tr>
								<tr id='c_two'>
									<td><input id="c_type_two" name="c_type_two" type="text" class="span2" value="<?php  echo $config['c_type_two']?>" placeholder='例如:二等奖' maxlength="10" style="width:100px;"/></td>
									<td><input id="c_name_two" name="c_name_two" type="text" class="span3" value="<?php  echo $config['c_name_two']?>"  maxlength="50"/></td>
									<td><input id="c_num_two"  name="c_num_two" type="text" class="span1" value="<?php  echo $config['c_num_two']?>"/></td>
									<td><input id="c_rate_two"  name="c_rate_two" type="text" class="span1" value="<?php  echo $config['c_rate_two']?>" />%</td>
								</tr>
								<tr id='c_three'>
									<td><input id="c_type_three" name="c_type_three" type="text" class="span2" value="<?php  echo $config['c_type_three']?>" maxlength="10" placeholder='例如:三等奖' style="width:100px;"/></td>
									<td><input id="c_name_three" name="c_name_three" type="text" class="span3" value="<?php  echo $config['c_name_three']?>"  maxlength="50"/></td>
									<td><input id="c_num_three"  name="c_num_three" type="text" class="span1" value="<?php  echo $config['c_num_three']?>"/></td>
									<td><input id="c_rate_three"  name="c_rate_three" type="text" class="span1" value="<?php  echo $config['c_rate_three']?>" />%</td>
								</tr>

								<tr id='c_four'>
									<td><input id="c_type_four" name="c_type_four" type="text" class="span2" value="<?php  echo $config['c_type_four']?>" maxlength="10" placeholder='例如:四等奖' style="width:100px;"/></td>
									<td><input id="c_name_four" name="c_name_four" type="text" class="span3" value="<?php  echo $config['c_name_four']?>" maxlength="50"/></td>
									<td><input id="c_num_four"  name="c_num_four" type="text" class="span1" value="<?php  echo $config['c_num_four']?>"/></td>
									<td><input id="c_rate_four"  name="c_rate_four" type="text" class="span1" value="<?php  echo $config['c_rate_four']?>" />%</td>
								</tr>
								<tr id='c_five'>
									<td><input id="c_type_five" name="c_type_five" type="text" class="span2" value="<?php  echo $config['c_type_five']?>" placeholder='例如:纪念奖' maxlength="10" style="width:100px;"/></td>
									<td><input id="c_name_five" name="c_name_five" type="text" class="span3" value="<?php  echo $config['c_name_five']?>"  maxlength="50"/></td>
									<td><input id="c_num_five"  name="c_num_five" type="text" class="span1" value="<?php  echo $config['c_num_five']?>"/></td>
									<td><input id="c_rate_five" name="c_rate_five" type="text" class="span1" value="<?php  echo $config['c_rate_five']?>" />%</td>
								</tr>
								<tr id='c_six'>
									<td><input id="c_type_six" name="c_type_six" type="text" class="span2" value="<?php  echo $config['c_type_six']?>" placeholder='例如:参与奖' maxlength="10" style="width:100px;"/></td>
									<td><input id="c_name_six" name="c_name_six" type="text" class="span3" value="<?php  echo $config['c_name_six']?>" maxlength="50"/></td>
									<td><input id="c_num_six"  name="c_num_six" type="text" class="span1" value="<?php  echo $config['c_num_six']?>"/></td>
									<td><input id="c_rate_six"  name="c_rate_six" type="text" class="span1" value="<?php  echo $config['c_rate_six']?>" />%</td>
								</tr>
							</tbody>
						</table>
               
                	
                	</div>
		</div>
            
             
                 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" >每人最多获奖次数：</label>

										<div class="col-sm-9">
													  
				<input type="text" name="award_times" value="<?php  echo $config['award_times']?>" />
				<span class="add-on">次</span>
                	<div class="help-block">单个用户最多共享几个奖项，0为不限制，推荐设置!</div>
		</div>
              
            
               <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" >每人每天最多抽奖次数：</label>

										<div class="col-sm-9">
													  
				<input type="text" name="most_num_times" value="<?php  echo $config['most_num_times']?>" />
				<span class="add-on">次</span>
					<div class="help-block">必须小于最多获奖次数！ 可以抽奖天数 = 总数/每天抽奖次数! </div>
				
                	
                	</div>
		</div>
            
            
               <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 显示奖品数量：</label>

										<div class="col-sm-9">
											
							<input type="radio" name="show_num" value="1" <?php if($config['show_num'] == 1){?> checked="checked"<?php }?>/>
							显示，
							<input type="radio" name="show_num" value="2" <?php if($config['show_num'] == 2){?> checked="checked"<?php }?>/>
							不显示
												</div>
		</div>
        
        
          	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" ></label>

										<div class="col-sm-9">
				
              <input type="submit" name="submit" value=" 确 定 " class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp; 
										</div>
		</div>
        
            
				       
			
		</form>

<?php  include page('footer');?>