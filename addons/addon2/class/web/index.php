<?php
	 $config = mysqld_select("SELECT * FROM " . table('xc_zjp_reply') );
      	 
  if (checksubmit("submit")) {
            $cfg = array(
                'title' => $_GP['title'],
                 'periodlottery' => intval($_GP['periodlottery']),
                 'maxlottery' => intval($_GP['maxlottery']),
                 'basenum' => intval($_GP['basenum']),
                  'needreg' => intval($_GP['needreg']),
				   		  'rule' =>   htmlspecialchars_decode($_GP['rule'])
            );
          	if (!empty($_FILES['picture']['tmp_name'])) {
                    $upload = file_upload($_FILES['picture']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $picture = $upload['path'];
                }
                if(!empty($picture))
                {
                	$cfg['picture']=$picture;
                }
           mysqld_delete('xc_zjp_reply',array());
          	   mysqld_insert('xc_zjp_reply', $cfg);
             
            message('保存成功', 'refresh', 'success');
        }
		   include addons_page('index');