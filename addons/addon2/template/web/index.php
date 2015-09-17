<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
      
     <table class="table table-hover">
     	   <tr>
                <th style="width:150px">抽奖界面:</th>
                <td>
                    <a href="<?php  echo create_url('mobile',array('name' => 'addon2','do' => 'index'))?>" target="_blank"><?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon2','do' => 'index'))?></a>
                </td>
            </tr>
               <tr>
                <th style="width:150px">是否需要注册才能抽奖:</th>
                <td>
                     <input type="radio" name="needreg" value="0" id="needreg" <?php  if($config['needreg'] == 0) { ?>checked="true"<?php  } ?> /> 关闭  &nbsp;&nbsp;
             
                <input type="radio" name="needreg" value="1" id="needreg"  <?php  if($config['needreg'] == 1) { ?>checked="true"<?php  } ?> /> 开启
              
                </td>
            </tr>
            <tr>
                <th style="width:150px">标题:</th>
                <td>
                    <input type="text" name="title" value="<?php  echo $config['title'];?>" />
                </td>
            </tr>
                  <tr>
          <th  style="width:150px">首页图片</th>
          <td> <input type="file" name="picture" class="form-control input-sm" style="width:300px;">
                     <?php  if(!empty($config['picture'])) { ?>
                         <img style="width:100px;height:100px" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $config['picture'];?>" ></div>
                          <?php  } ?>
                 </td>
        </tr>
                  <tr>
                <th style="width:150px">活动规则:</th>
                <td>
                	<textarea name="rule" id="rule" cols="60" rows="8"><?php  echo $config['rule'];?></textarea>
                </td>
            </tr>
            
                 <tr>
                <th style="width:150px">活动规则:</th>
                <td>
                   每 <input type="text" style="width:30px" name="periodlottery" value="<?php  echo $config['periodlottery'];?>" />天，抽奖<input type="text" style="width:30px" name="maxlottery" value="<?php  echo $config['maxlottery'];?>" />次
               <div class="help-block">天数为0，永远只能砸N次（这里N为设置的次数）。</div> </td>
            </tr>
                <tr>
                <th style="width:150px">抓奖品消耗积分:</th>
                <td>
                    <input type="text" name="basenum" value="<?php  echo $config['basenum'];?>" />
                </td>
            </tr>
        
                 <tr>
          <th style="width:150px"></th>
          <td>
              <input type="submit" name="submit" value=" 确定 " class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset" value=" 重置 " class="btn btn-default" />
          </td>
        </tr>
        </table>
			
		</form>
			<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.config.js?x=1211"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.all.min.js?x=141"></script>
<script type="text/javascript">var ue = UE.getEditor('rule');</script>
<?php  include page('footer');?>