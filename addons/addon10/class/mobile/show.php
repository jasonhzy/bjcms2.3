<?php
				$id=intval($_GP['id']);
				$list = mysqld_select('SELECT * FROM' . table('addon10_scene_list') . ' WHERE `id`=:id  ', array( ':id' => $id));
       	 $theme="";
       	 if(!empty($list['id']))
  	 {
  	 				$theme=$list['theme'];
  	 				
  	 		if(empty($_SESSION['addon10_'.$list['id']]))
	  		{
	        mysqld_update('addon10_scene_list', array('hits' => $list['hits'] + 1), array('id' => $list['id']));
	        $_SESSION['addon10_'.$list['id']]=1;
	      }
	      
	      	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
		
					$signPackage=$this->getSignPackage($list['id']);
				}
	      
  		}
  
        $items = mysqld_selectall('SELECT * FROM' . table('addon10_scene_page') . ' WHERE `list_id`=:list_id ORDER BY `listorder` desc,id asc', array(':list_id' => $list['id']));
   
   		
   
   
   
   
     	if(!empty( $theme))
     	{
  	 		include addons_page('themes/'.$theme.'/show');
  	 	}
   
  	 		exit;