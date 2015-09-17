<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="main">
 
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
     <table class="table table-hover">
            <tr>
                <th style="width:150px">奖品名称:</th>
                <td>
                    <input type="text" name="title" value="<?php  echo $item['title'];?>" />
                </td>
            </tr>
                  <tr>
          <th  style="width:150px">奖品图片：</th>
          <td> <input type="file" name="description" class="form-control input-sm" style="width:300px;">
                     <?php  if(!empty($item['description'])) { ?>
                         <img style="width:100px;height:100px" src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $item['description'];?>" ></div>
                          <?php  } ?>   <div class="help-block">（图片尺寸：69像素 * 78像素，背景透明）</div>
                 </td>
        </tr>
                  <tr>
                <th style="width:150px">中奖率:</th>
                <td>
                	 <input type="text" style="width:30px" name="probalilty" value="<?php  echo $item['probalilty'];?>" />% (整数)
                </td>
            </tr>
            
                 <tr>
                <th style="width:150px">数量:</th>
                <td>
                 <input type="text" style="width:30px" name="total" value="<?php  echo $item['total'];?>" />
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
<?php  include page('footer');?>