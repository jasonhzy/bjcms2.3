<?php
function xCopy($source, $destination, $child){
	if(!is_dir($source)){
		echo("Error:the $source is not a direction!"); 
		return 0;
		}
		mkdirs($destination);
		$handle=dir($source);
		while($entry=$handle->read()) {
			if(($entry!=".")&&($entry!="..")){
				if(is_dir($source."/".$entry)){
						if($child)
						xCopy($source."/".$entry,$destination."/".$entry,$child);
						}
						else{
							copy($source."/".$entry,$destination."/".$entry);
							}
							}
							}
							return 1;
}
$tmpfoldername=random(15);
$tmpfolder='addon10/'.$tmpfoldername.'/style7/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style7\/';
xCopy(ADDONS_ROOT.'addon10/demo/style7/',WEB_ROOT.'/attachment/'.$tmpfolder,1);


			$list_data=array(
			'title' => 'iPhone6，再一次创造',
			'theme' => 'style7',
			'iden' => 'style7',
			'cover' => $tmpfolder.'1.png',
			'share_title' => 'iPhone6，再一次创造',
			'share_thumb' => $tmpfolder.'share.jpg',
			'share_content' => 'iPhone6，再一次创造',
			'reply_title' => 'iPhone6，再一次创造',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => 'iPhone6，再一次创造',
			'isadvanced' => 0,
			'first_type' => 1,
			'bg_music_switch' => 1,
			'bg_music_icon' => 1,
			'bg_music_url' => $tmpfolder.'bg.mp3',
			'hits' => 0,
			'isyuyue' => 0,
			'iscomment' => 0
			);
			

		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
	
 
	
		 $pagestr='[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'2.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'3.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'5.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'7.jpg","param":"a:1:{s:6:\"thumbs\";a:7:{i:0;s:69:\"'.$page_tmpfolder.'7-1.jpg\";i:1;s:69:\"'.$page_tmpfolder.'7-2.jpg\";i:2;s:69:\"'.$page_tmpfolder.'7-3.jpg\";i:3;s:69:\"'.$page_tmpfolder.'7-4.jpg\";i:4;s:69:\"'.$page_tmpfolder.'7-5.jpg\";i:5;s:69:\"'.$page_tmpfolder.'7-6.jpg\";i:6;s:69:\"'.$page_tmpfolder.'7-7.jpg\";}}","create_time":"0"},{"listorder":"0","m_type":"4","thumb":"'.$page_tmpfolder.'8.jpg","param":"a:1:{s:3:\"url\";s:47:\"http:\/\/v.youku.com\/v_show\/id_XNzAyNDcyMzAw.html\";}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'9.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'10.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"3","thumb":"'.$page_tmpfolder.'11.jpg","param":"a:2:{s:6:\"btnimg\";s:72:\"'.$page_tmpfolder.'11_btn.png\";s:11:\"share_thumb\";s:0:\"\";}","create_time":"0"}]';
    
		 $pageArr=json_decode($pagestr,true);
		
		 foreach($pageArr as $v){
			$page_data=array(
				'list_id'=>$list_id,
				'listorder'=>$v['listorder'],
				'm_type'=>$v['m_type'],
				'thumb'=>$v['thumb'],
				'param'=>$v['param'],
				'create_time'=>time(),
			);
			mysqld_insert('addon10_scene_page',$page_data);
		 }
	message("范例创建成功",create_url('site', array('name' => 'addon10','do' => 'scene','op'=>'display')),"success");
							