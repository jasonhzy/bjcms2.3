<?php
			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
				if($operation=='delete')
			{
										mysqld_delete('addon10_scene_subscribe',array("id"=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
			}
					$subscribe_list = mysqld_selectall("SELECT subscribe.*,sl.title FROM " . table('addon10_scene_subscribe')." subscribe left join " . table('addon10_scene_list')."  sl on sl.id=subscribe.list_id " );
  	  
        	include addons_page('subscribe');