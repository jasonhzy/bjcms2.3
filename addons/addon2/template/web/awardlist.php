<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<?php  include page('header');?>
<div class="main">
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:50px;">序号</th>
                    <th>奖品名称</th>			
                    <th>用户手机号</th>			
                    <th>中奖时间</th>			
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $index=1; if(is_array($list)) { foreach($list as $adv) { ?>
                <tr>
                    <td><?php  echo $index++;?></td>
                    <td><?php  echo $adv['award'];?></td>
                      <td><?php  echo $adv['mobile'];?></td>
                    <td><?php  echo date('Y-m-d H:i:s', $adv['createtime'])?></td>
                    <td><?php  echo $adv['status']==0?'未领奖':'';echo $adv['status']==2?'已领奖':'';?></td>
                    <td style="text-align:left;"><a href="<?php  echo web_url('awardlist', array('op'=>'post', 'id' => $adv['id']))?>">兑奖</a> <a href="<?php  echo web_url('awardlist', array('op' => 'delete', 'id' => $adv['id']))?>" onclick="return confirm('确定删除此此中奖信息吗？'); return false;" >删除</a> </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<?php  include page('footer');?>