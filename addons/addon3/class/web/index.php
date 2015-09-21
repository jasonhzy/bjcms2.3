<?php
	 $config = mysqld_select("SELECT * FROM " . table('bigwheel_reply') );
      	 
  if (checksubmit("submit")) {
       $insert = array(
			'title' => $_GP['title'],
			'content' => $_GP['content'],
			'ticket_information' => $_GP['ticket_information'],
			'description' => $_GP['description'],
			'repeat_lottery_reply' => $_GP['repeat_lottery_reply'],
			//'start_picurl' => $_GP['start_picurl'],
			'end_theme' => $_GP['end_theme'],
			'end_instruction' => $_GP['end_instruction'],
			'probability' => $_GP['probability'],
			'c_type_one' => $_GP['c_type_one'],
			'c_name_one' => $_GP['c_name_one'],
			'c_num_one' => $_GP['c_num_one'],
		  
			'c_type_two' => $_GP['c_type_two'],
			'c_name_two' => $_GP['c_name_two'],
			'c_num_two' => $_GP['c_num_two'],
			'c_type_three' => $_GP['c_type_three'],
			'c_name_three' => $_GP['c_name_three'],
			'c_num_three' => $_GP['c_num_three'],
			'c_type_four' => $_GP['c_type_four'],
			'c_name_four' => $_GP['c_name_four'],
			'c_num_four' => $_GP['c_num_four'],
			'c_type_five' => $_GP['c_type_five'],
			'c_name_five' => $_GP['c_name_five'],
			'c_num_five' => $_GP['c_num_five'],
			'c_type_six' => $_GP['c_type_six'],
			'c_name_six' => $_GP['c_name_six'],
			'c_num_six' => $_GP['c_num_six'],
			'award_times' => $_GP['award_times'],
			'number_times' => $_GP['number_times'],
			'most_num_times' => $_GP['most_num_times'],
			'sn_code' => $_GP['sn_code'],
			'sn_rename' => $_GP['sn_rename'],
			'tel_rename' => $_GP['tel_rename'],
			'show_num' => $_GP['show_num'],
			'createtime' => time(),
			'copyright' => $_GP['copyright'],
			'share_title' => $_GP['share_title'],
			'share_desc' => $_GP['share_desc'],
			'share_url' => $_GP['share_url'],
			'share_txt' => $_GP['share_txt'],
			'starttime' => strtotime($_GP['datelimit-start']),
			'endtime' => strtotime($_GP['datelimit-end']),
			  'c_rate_one' => $_GP['c_rate_one'],
			  'c_rate_two' => $_GP['c_rate_two'],
			  'c_rate_three' => $_GP['c_rate_three'],
			  'c_rate_four' => $_GP['c_rate_four'],
			  'c_rate_five' => $_GP['c_rate_five'],
			  'c_rate_six' => $_GP['c_rate_six'],
			  'needreg' =>  intval($_GP['needreg']),
		);
		
		
         /* 	if (!empty($_FILES['start_picurl']['tmp_name'])) {
                    $upload = file_upload($_FILES['start_picurl']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $picture = $upload['path'];
                }
                if(!empty($picture))
                {
                	$insert['start_picurl']=$picture;
                }
                
              if (!empty($_FILES['end_picurl']['tmp_name'])) {
                    $upload = file_upload($_FILES['end_picurl']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $picture = $upload['path'];
                }
                if(!empty($picture))
                {
                	$insert['end_picurl']=$picture;
                }*/
                
          
          	   
          	   
     $insert['total_num'] = intval($_GP['c_num_one']) + intval($_GP['c_num_two']) + intval($_GP['c_num_three']) + intval($_GP['c_num_four']) + intval($_GP['c_num_five']) + intval($_GP['c_num_six']);

	
			if ($insert['starttime'] <= time()) {
				$insert['isshow'] = 1;
			} else {
				$insert['isshow'] = 0;
			}
			if(empty($config['id']))
			{
		   mysqld_insert('bigwheel_reply', $insert);
			}else
			{
			  mysqld_update('bigwheel_reply', $insert,array("id"=>$config['id']));	
			}
             
            message('保存成功', 'refresh', 'success');
        }
		   include addons_page('index');