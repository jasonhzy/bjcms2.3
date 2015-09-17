<?php 
        $list_id = intval($_GP['list_id']);
        if (empty($list_id)) {
            message('参数错误', '', 'error');
        }
        $list = mysqld_select('select * from ' . table('addon10_scene_list') . ' where id=:id', array( ':id' => $list_id));
        
        require ADDONS_ROOT.'addon10/class/web/themes/'.$list['theme'].'/page.php';