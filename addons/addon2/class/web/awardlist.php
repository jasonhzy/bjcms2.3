<?php
 $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
	 $list = mysqld_selectall("SELECT * FROM " . table('xc_zjp_winner')." where award <> '' ORDER BY createtime DESC" );
	  	 foreach ( $list as $id => $item) {
			             	 	$list[$id]['mobile']=mysqld_selectcolumn("select mobile	from" . table('member') . "  where istemplate=0 and openid=:openid ",array(':openid' => $item['open_id']));;
                }
                
                
 if ($operation == 'post') {
            $id = intval($_GP['id']);
            mysqld_update('xc_zjp_winner',array('status'=>2), array('id' => $id));
            message('兑现成功！', web_url('awardlist'), 'success');
        }
      	 
      	 if ($operation == 'delete') {
            $id = intval($_GP['id']);
            mysqld_delete('xc_zjp_winner', array('id' => $id));
            message('删除成功！', web_url('awardlist'), 'success');
        }
 include addons_page('awardlist');