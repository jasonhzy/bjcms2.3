<?php
			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
			
					if($operation=='delete')
			{
							mysqld_delete('addon10_scene_page',array("id"=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
			}
			

			
			$scene_page_list = mysqld_selectall("SELECT * FROM " . table('addon10_scene_page')." where list_id=:list_id",array("list_id"=>intval($_GP['listid'])) );
  		$scene = mysqld_select("SELECT * FROM " . table('addon10_scene_list')." where id='".intval($_GP['listid'])."' " );
  	 if(!empty($scene['id']))
  	 {
  	 				$theme=$scene['theme'];
  		}
  				$list_id=intval($_GP['listid']);
        	include addons_page('themes/'.$theme.'/scene_page_list');