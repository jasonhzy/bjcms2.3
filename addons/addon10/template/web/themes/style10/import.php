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
$tmpfolder='addon10/'.$tmpfoldername.'/style10/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style10\/';
xCopy(ADDONS_ROOT.'addon10/demo/style10/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

		$list_data=array(
			'title' => '山海和声·飞越彩虹',
			'theme' => 'style10',
			'iden' => 'style10',
			'cover' => $tmpfolder.'1.png',
			'share_title' => '山海和声·飞越彩虹',
			'share_thumb' => $tmpfolder.'share.jpg',
			'share_content' => '山海和声·飞越彩虹',
			'reply_title' => '山海和声·飞越彩虹',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '山海和声·飞越彩虹',
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
	
 
	
	
		 $pagestr='
[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'bj1.jpg","param":"a:2:{s:4:\"pic1\";s:68:\"'.$page_tmpfolder.'2.png\";s:4:\"pic2\";s:68:\"'.$page_tmpfolder.'2.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'bj1.jpg","param":"a:2:{s:4:\"pic1\";s:68:\"'.$page_tmpfolder.'3.png\";s:4:\"pic2\";s:68:\"'.$page_tmpfolder.'3.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'bj1.jpg","param":"a:2:{s:4:\"pic1\";s:68:\"'.$page_tmpfolder.'4.png\";s:4:\"pic2\";s:68:\"'.$page_tmpfolder.'4.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"3","thumb":"'.$page_tmpfolder.'7.jpg","param":"a:2:{s:4:\"pic1\";s:68:\"'.$page_tmpfolder.'5.jpg\";s:4:\"pic2\";s:68:\"'.$page_tmpfolder.'6.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'bj1.jpg","param":"a:2:{s:4:\"pic1\";s:68:\"'.$page_tmpfolder.'8.png\";s:4:\"pic2\";s:68:\"'.$page_tmpfolder.'8.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"4","thumb":"'.$page_tmpfolder.'bj2.jpg","param":"a:2:{s:4:\"pic1\";s:68:\"'.$page_tmpfolder.'9.png\";s:4:\"pic2\";s:68:\"'.$page_tmpfolder.'9.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"4","thumb":"'.$page_tmpfolder.'bj2.jpg","param":"a:2:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'10.png\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'10.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"4","thumb":"'.$page_tmpfolder.'bj2.jpg","param":"a:2:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'11.png\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'11.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"4","thumb":"'.$page_tmpfolder.'bj2.jpg","param":"a:2:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'12.png\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'12.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"4","thumb":"'.$page_tmpfolder.'bj2.jpg","param":"a:2:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'13.png\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'13.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"5","thumb":"'.$page_tmpfolder.'15.jpg","param":"a:1:{s:3:\"url\";s:47:\"http:\/\/v.youku.com\/v_show\/id_XNzg0Njk0MDUy.html\";}","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'16.jpg","param":"a:2:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'16.png\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'17.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"9","thumb":"'.$page_tmpfolder.'bj1.jpg","param":"a:4:{s:3:\"tel\";s:13:\"0755-83290513\";s:5:\"email\";s:17:\"123@qq.com\";s:5:\"wxurl\";s:107:\"http:\/\/mp.weixin.qq.com\/\";s:6:\"weixin\";s:30:\"\";}","create_time":"0"}]';
   
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
							