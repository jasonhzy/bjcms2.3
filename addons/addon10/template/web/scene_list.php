<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">画报管理&nbsp;&nbsp;&nbsp;<a href="<?php  echo web_url('scene', array('op'=>'post'));?>" class="btn btn-primary">新建画报</a></h3>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
		 <th class="text-center" >微场景名称</th>
    <th class="text-center" >类型</th>
    <th class="text-center">浏览量</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($scene_list)) { foreach($scene_list as $item) { ?>
				<tr>
					<td class="text-center"><?php echo $item['title']; ?></td>
					<td class="text-center">
						<?php echo ($item['theme']=='custom')?'自定义模板':''; ?>
						<?php echo ($item['theme']=='style9')?'办公家具 就选优的':''; ?>
						<?php echo ($item['theme']=='style8')?'2014 NEW':''; ?>
						<?php echo ($item['theme']=='style7')?'iPhone6 再一次创造':''; ?>
						<?php echo ($item['theme']=='style3')?'变形金刚4•绝迹重生':''; ?>
						<?php echo ($item['theme']=='style6')?'一场冰冷世界的革命':''; ?>
						<?php echo ($item['theme']=='style4')?'我与自己久别重逢':''; ?>
						<?php echo ($item['theme']=='style2')?'极致诱':''; ?>
						<?php echo ($item['theme']=='style5')?'周年邀请函':''; ?>
						<?php echo ($item['theme']=='style10')?'飞跃彩虹':''; ?>
						<?php echo ($item['theme']=='style12')?'九章别墅':''; ?>
						<?php echo ($item['theme']=='onefound')?'壹基金':''; ?>
						<?php echo ($item['theme']=='employ')?'改变世界非你莫属':''; ?>
						<?php echo ($item['theme']=='style13')?'3D相册':''; ?>
						<?php echo ($item['theme']=='hammer')?'锤子手机':''; ?></td>
					<td class="text-center"><?php echo $item['hits']; ?></td>
					
         <td class="text-center">
                                               <a class="btn btn-xs btn-info" target="_blank" href="<?php  echo mobile_url('show', array('id' => $item['id']))?>"><i class="icon-eye-open"></i>预览</a> 
                         	&nbsp;&nbsp;      <a class="btn btn-xs btn-info"  href="<?php  echo web_url('scene_page', array('op' => 'display', 'listid' => $item['id']))?>"><i class="icon-edit"></i>画面管理</a> 
                    	&nbsp;&nbsp;                       	<a class="btn btn-xs btn-info"  href="<?php  echo web_url('scene', array('op' => 'setting', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;修&nbsp;改&nbsp;</a> 
                    	&nbsp;&nbsp;	<a class="btn btn-xs btn-info" onclick="return confirm('此操作不可恢复，确认删除？');return false;"  href="<?php  echo web_url('scene', array('op' => 'delete', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a> </td>
                                </td>
				</tr>
				<?php  } } ?>
		</table>

<?php  include page('footer');?>
