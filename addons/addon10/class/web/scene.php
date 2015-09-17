<?php
			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
			
								if($operation=='import')
			{

        require ADDONS_ROOT.'addon10/template/web/themes/'.$_GP['theme'].'/import.php';
        	exit;
			}
						if($operation=='preview')
			{

        	include addons_page('themes/'.$_GP['theme'].'/preview');
        	exit;
			}
		if($operation=='setting')
			{
			$theme=$_GP['theme'];
				
						$scene = mysqld_select("SELECT * FROM " . table('addon10_scene_list')." where id='".intval($_GP['id'])."' " );
  	 if(!empty($scene['id']))
  	 {
  	 				$theme=$scene['theme'];
  		}
  			if (checksubmit('submit')) {
        
				  	 if(empty($scene['id']))
				  	 {
				     	
				  								 $fields = array( 'title',  'reply_title',  'reply_description', 'share_title', 'share_content', 'share_cb_url', 'share_cb_tel', 'first_type', 'first_btn_select', 'first_btn_url', 'first_btn_tel', 'bg_music_switch', 'bg_music_icon', 'cover_title', 'cover_subtitle', 'tongji');
  foreach ($_GP as $k => $v) {
                if (in_array($k, $fields)) {
                    $data[$k] = $_GP[$k];
                }
            }
									    if (!empty($theme)) {
								$data['theme']=$theme;
							}
										    if (!empty($_GP['reply_thumb_del'])) {
				                	$data['reply_thumb'] = '';
				                }
						   if (!empty($_FILES['reply_thumb']['tmp_name'])) {
				                    $upload = file_upload($_FILES['reply_thumb']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['reply_thumb'] = $upload['path'];
				                }
				                
				        if (!empty($_GP['share_thumb_del'])) {
				                	$data['share_thumb'] = '';
				                }
						   if (!empty($_FILES['share_thumb']['tmp_name'])) {
				                    $upload = file_upload($_FILES['share_thumb']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['share_thumb'] = $upload['path'];
				                }
				                
				                if (!empty($_GP['cover_del'])) {
				                	$data['cover'] = '';
				                }
						   if (!empty($_FILES['cover']['tmp_name'])) {
				                    $upload = file_upload($_FILES['cover']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['cover'] = $upload['path'];
				                }
				                
				                
				                      if (!empty($_GP['cover1_del'])) {
				                	$data['cover1'] = '';
				                }
						   if (!empty($_FILES['cover1']['tmp_name'])) {
				                    $upload = file_upload($_FILES['cover1']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['cover1'] = $upload['path'];
				                }
				                
				                
				                          if (!empty($_GP['cover2_del'])) {
				                	$data['cover2'] = '';
				                }
						   if (!empty($_FILES['cover2']['tmp_name'])) {
				                    $upload = file_upload($_FILES['cover2']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['cover2'] = $upload['path'];
				                }
				                
				                             if (!empty($_GP['bg_music_url_del'])) {
				                	$data['bg_music_url'] = '';
				                }
						   if (!empty($_FILES['bg_music_url']['tmp_name'])) {
				                    $upload = file_upload($_FILES['bg_music_url'],'music');
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['bg_music_url'] = $upload['path'];
				                }
				                
								
								mysqld_insert('addon10_scene_list',$data);
								message("添加成功",create_url('site', array('name' => 'addon10','do' => 'scene','op'=>'setting','id'=>mysqld_insertid())),"success");
								
							}else
							{
								
							 $fields = array( 'title',  'reply_title',  'reply_description', 'share_title', 'share_content', 'share_cb_url', 'share_cb_tel', 'first_type', 'first_btn_select', 'first_btn_url', 'first_btn_tel', 'bg_music_switch', 'bg_music_icon', 'cover_title', 'cover_subtitle', 'tongji');
 $data=array();
        foreach ($_GP as $k => $v) {
                if (in_array($k, $fields)) {
                    $data[$k] = $_GP[$k];
                }
            }
            
										    if (!empty($theme)) {
								$data['theme']=$theme;
							}
										    if (!empty($_GP['reply_thumb_del'])) {
				                	$data['reply_thumb'] = '';
				                }
						   if (!empty($_FILES['reply_thumb']['tmp_name'])) {
				                    $upload = file_upload($_FILES['reply_thumb']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['reply_thumb'] = $upload['path'];
				                }
				                
				        if (!empty($_GP['share_thumb_del'])) {
				                	$data['share_thumb'] = '';
				                }
						   if (!empty($_FILES['share_thumb']['tmp_name'])) {
				                    $upload = file_upload($_FILES['share_thumb']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['share_thumb'] = $upload['path'];
				                }
				                
				                if (!empty($_GP['cover_del'])) {
				                	$data['cover'] = '';
				                }
						   if (!empty($_FILES['cover']['tmp_name'])) {
				                    $upload = file_upload($_FILES['cover']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['cover'] = $upload['path'];
				                }
				                
				                
				                      if (!empty($_GP['cover1_del'])) {
				                	$data['cover1'] = '';
				                }
						   if (!empty($_FILES['cover1']['tmp_name'])) {
				                    $upload = file_upload($_FILES['cover1']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['cover1'] = $upload['path'];
				                }
				                
				                
				                          if (!empty($_GP['cover2_del'])) {
				                	$data['cover2'] = '';
				                }
						   if (!empty($_FILES['cover2']['tmp_name'])) {
				                    $upload = file_upload($_FILES['cover2']);
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['cover2'] = $upload['path'];
				                }
				                
				                             if (!empty($_GP['bg_music_url_del'])) {
				                	$data['bg_music_url'] = '';
				                }
						   if (!empty($_FILES['bg_music_url']['tmp_name'])) {
				                    $upload = file_upload($_FILES['bg_music_url'],'music');
				                    if (is_error($upload)) {
				                        message($upload['message'], '', 'error');
				                    }
				                    $data['bg_music_url'] = $upload['path'];
				                }
				                
								mysqld_update('addon10_scene_list',$data,array('id'=>$_GP['id']));
								
								message("修改成功","refresh","success");
							}
				}
				include addons_page('themes/'.$theme.'/scene_post');
        exit;
  		
			}
			if($operation=='delete')
			{
							mysqld_delete('addon10_scene_page',array("list_id"=>intval($_GP['id'])));
										mysqld_delete('addon10_scene_subscribe',array("list_id"=>intval($_GP['id'])));
					mysqld_delete('addon10_scene_list',array("id"=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
			}
			if($operation=='post')
			{

        	include addons_page('scene');
        	exit;
			}
		$scene_list = mysqld_selectall("SELECT * FROM " . table('addon10_scene_list') );
  	  
        	include addons_page('scene_list');