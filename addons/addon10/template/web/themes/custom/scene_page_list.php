<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">画报画面管理&nbsp;&nbsp;&nbsp; <a class="btn btn-primary" href="<?php echo web_url('page',array('list_id'=>$list_id,'op'=>'setting','theme'=>'custom'));?>"><i class="icon-plus"></i>新增画面</a></h3>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
		 <th class="text-center" >ID</th>
    <th class="text-center" >排序id</th>
    <th class="text-center">画面内容</th>
    <th class="text-center">画面样式</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($scene_page_list)) { foreach($scene_page_list as $item) { ?>
				<tr>
					<td class="text-center"><?php echo $item['id']; ?></td>
						<td class="text-center"><?php echo $item['listorder']; ?></td>
						<td class="text-center">
							<?php if(!empty($item['thumb'])){ ?>
							<img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $item['thumb']; ?>" style="max-height:80px;max-width:100px;">
									<?php } ?>
							</td>
					<td class="text-center">
					
									<?php if($row['m_type']==1) {?>场景1(纯背景)<?php }elseif($row['m_type']==2) {?>
								场景2(自定义)<?php }elseif($row['m_type']==3) {?>
									场景3(云标签)<?php }elseif($row['m_type']==4) {?>
									场景4(地理位置)<?php }elseif($row['m_type']==5) {?>
									场景4(表单提交)<?php }elseif($row['m_type']==8) {?>
									多图多文字<?php }else{ ?>纯图片式
								<?php }?>
			</td>
					
         <td class="text-center">
                                               	<a class="btn btn-xs btn-info"  href="<?php  echo web_url('page', array('op' => 'setting', 'id' => $item['id'], 'list_id' => $list_id))?>"><i class="icon-edit"></i>&nbsp;修&nbsp;改&nbsp;</a> 
                    	&nbsp;&nbsp;	<a class="btn btn-xs btn-info" onclick="return confirm('此操作不可恢复，确认删除？');return false;"  href="<?php  echo web_url('scene_page', array('op' => 'delete', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a> </td>
                                </td>
				</tr>
				<?php  } } ?>
		</table>

<?php  include page('footer');?>
