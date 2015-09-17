<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<?php  include page('header');?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'display') { ?> class="active" <?php  } ?>><a href="<?php  echo web_url('prizelist',array())?>">奖品列表</a></li>
    <li<?php  if($operation == 'post') { ?> class="active" <?php  } ?>><a href="<?php  echo web_url('prizelist',array('op'=>'post'))?>">添加奖品</a></li>
 </ul>
<div class="main">
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:30px;">ID</th>
                    <th>奖品名称</th>					
                    <th>数量</th>
                    <th>概率单位%</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $index=1; if(is_array($list)) { foreach($list as $adv) { ?>
                <tr>
                    <td><?php  echo $index++;?></td>
                    <td><?php  echo $adv['title'];?></td>
                    <td> <?php  echo $adv['total'];?></td>
                    <td><?php  echo $adv['probalilty'];?></td>
                    <td style="text-align:left;"><a href="<?php  echo web_url('prizelist', array('op'=>'post', 'id' => $adv['id']))?>">修改</a> <a href="<?php  echo web_url('prizelist', array('op' => 'delete', 'id' => $adv['id']))?>" onclick="return confirm('确定删除此奖品吗？'); return false;" >删除</a> </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<?php  include page('footer');?>