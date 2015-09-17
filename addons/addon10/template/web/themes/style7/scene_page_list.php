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
									<?php if($row['m_type']==1) {?>纯图片式<?php }elseif($row['m_type']==2) {?>
								带按钮链接<?php }elseif($row['m_type']==3) {?>
								带按钮分享<?php }elseif($row['m_type']==4) {?>
									带电话图片<?php }elseif($row['m_type']==5) {?>
									带导航图片<?php }else{ ?>其他模式
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
