<?php
 $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
	 $list = mysqld_selectall("SELECT * FROM " . table('xc_zjp_award') );
      	 if( $operation =='post')
      	 {
      	      $id = intval($_GP['id']);
            if (checksubmit('submit')) {
                $data = array(
                    'title' => $_GP['title'],
                    'probalilty' => intval($_GP['probalilty']),
                    'total' => intval($_GP['total'])
                );
 			  			if (!empty($_FILES['description']['tmp_name'])) {
                    $upload = file_upload($_FILES['description']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $data['description'] = $upload['path'];
                }
                if (!empty($id)) {
                    mysqld_update('xc_zjp_award', $data, array('id' => $id));
                } else {
                    mysqld_insert('xc_zjp_award', $data);
                }
                message('操作成功！', web_url('prizelist'), 'success');
            }
            $item = mysqld_select("select * from " . table('xc_zjp_award') . " where id=:id  limit 1", array(":id" => $id));
      	 	 include addons_page('prize');
      	 	 exit;
      	 }
      	 
      	 if ($operation == 'delete') {
            $id = intval($_GP['id']);
            mysqld_delete('xc_zjp_award', array('id' => $id));
            message('奖品删除成功！', web_url('prizelist'), 'success');
        }
 include addons_page('prizelist');