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
$tmpfolder='addon10/'.$tmpfoldername.'/style6/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style6\/';
xCopy(ADDONS_ROOT.'addon10/demo/style6/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

	$list_data=array(
			'title' => '一场冰冷世界的革命',
				'theme' => 'style6',
			'iden' => 'style6',
			'cover1' => $tmpfolder.'1.jpg',
			'cover2' => $tmpfolder.'2.jpg',
			'share_title' => '朗度L&#039;art des',
			'share_thumb' => $tmpfolder.'share.jpg',			
			'share_content' => '一场冰冷世界的革命',
			'reply_title' => '一场冰冷世界的革命',
			'reply_thumb' =>$tmpfolder.'default_cover.jpg',
			'reply_description' => '一场冰冷世界的革命',
			'isadvanced' => 0,
			'first_type' => 2,
			'bg_music_switch' => 1,
			'bg_music_icon' => 1,
			'bg_music_url' => $tmpfolder.'bg.mp3',
			'hits' => 0,
			'isyuyue' => 0,
			'iscomment' => 0,
			);
			
			

		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
	
 

	   $pagestr='
[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'3.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'5.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'7.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'8.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'9.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'10.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'11.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'12.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'13.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"5","thumb":"'.$page_tmpfolder.'14.jpg","param":"a:2:{s:6:\"vthumb\";s:70:\"'.$page_tmpfolder.'14-1.jpg\";s:3:\"url\";s:84:\"'.$page_tmpfolder.'53c6646d9299446948.mp4\";}","create_time":"0"},{"listorder":"0","m_type":"3","thumb":"'.$page_tmpfolder.'15.jpg","param":"a:2:{s:6:\"btnimg\";s:72:\"'.$page_tmpfolder.'15_btn.png\";s:11:\"share_thumb\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'16.jpg","param":"a:2:{s:6:\"btnimg\";s:72:\"'.$page_tmpfolder.'16_btn.png\";s:3:\"url\";s:100:\"http:\/\/www.baidu.com\";}","create_time":"0"}]';
 
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
							