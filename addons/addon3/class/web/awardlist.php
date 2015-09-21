<?php
 $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
	 $list = mysqld_selectall("SELECT * FROM " . table('bigwheel_award')."  ORDER BY createtime DESC" );
	  	 foreach ( $list as $id => $item) {
			             	 	$list[$id]['user']=mysqld_select("select * from" . table('member') . "  where  openid=:openid ",array(':openid' => $item['from_user']));;
                }
                
                
 if ($operation == 'post') {
            $id = intval($_GP['id']);
            mysqld_update('bigwheel_award',array('status'=>2), array('id' => $id));
            message('兑现成功！', web_url('awardlist'), 'success');
        }
      	 
      	 if ($operation == 'delete') {
            $id = intval($_GP['id']);
            mysqld_delete('bigwheel_award', array('id' => $id));
            message('删除成功！', web_url('awardlist'), 'success');
        }
 include addons_page('awardlist');