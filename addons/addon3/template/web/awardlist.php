<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<?php  include page('header');?>
<div class="main">
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:50px;">序号</th>
                       <th>SN码</th>
                       <th>奖品类别</th>
                      <th>状态</th>
                       <th >会员账户</th>
                         <th >账户类型</th>
                        <th>中奖时间</th>
                        <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $index=1; if(is_array($list)) { foreach($list as $adv) { 
                	if(!empty($adv['user']['openid'])){
                	?>
                
                <tr>
                    <td><?php  echo $index++;?></td>
                    <td><?php  echo $adv['award_sn'];?></td>
                    <td><?php  echo $adv['name'];?></td>
                   <td><?php  echo $adv['status']==0?'未领取':'';?><?php  echo $adv['status']==0?'未领取':'';?><?php  echo $adv['status']==1?'已中奖':'';?><?php  echo $adv['status']==2?'已兑奖':'';?></td>
                    <td><?php  echo $adv['user']['mobile'];?></td>
                     <td><?php  echo $adv['user']['istemplate']==0?'会员':'临时账户';?></td>
                    <td><?php  echo date('Y-m-d H:i:s', $adv['createtime'])?></td>
                    <td style="text-align:left;"><a href="<?php  echo web_url('awardlist', array('op'=>'post', 'id' => $adv['id']))?>">兑奖</a> <a href="<?php  echo web_url('awardlist', array('op' => 'delete', 'id' => $adv['id']))?>" onclick="return confirm('确定删除此此中奖信息吗？'); return false;" >删除</a> </td>
                </tr>
                <?php } } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<?php  include page('footer');?>