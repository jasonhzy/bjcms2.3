<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">预约管理</h3>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
		 <th class="text-center" >画报名称</th>
    <th class="text-center" >字段1</th>
    <th class="text-center">字段2</th>
    <th class="text-center">字段3</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($subscribe_list)) { foreach($subscribe_list as $item) { ?>
				<tr>
					<td class="text-center"><?php echo $item['title']; ?></td>
					<td class="text-center"><?php echo $item['str1']; ?>
						</td>
						<td class="text-center"><?php echo $item['str2']; ?>
						</td>
						<td class="text-center"><?php echo $item['str3']; ?>
						</td>
					
         <td class="text-center">
                                  <a class="btn btn-xs btn-info" onclick="return confirm('此操作不可恢复，确认删除？');return false;"  href="<?php  echo web_url('subscribe', array('op' => 'delete', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a> </td>
                                </td>
				</tr>
				<?php  } } ?>
		</table>

<?php  include page('footer');?>
