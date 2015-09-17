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
$tmpfolder='addon10/'.$tmpfoldername.'/employ/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/employ\/';
xCopy(ADDONS_ROOT.'addon10/demo/employ/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

$list_data=array(
			'title' => '改变世界非你莫属',
			'theme' => 'employ',
			'iden' => 'employ',
			'cover' => $tmpfolder.'1.jpg',
			'share_title' => '改变世界非你莫属',
			'share_thumb' =>  $tmpfolder.'share.jpg',
			'share_content' => '改变世界非你莫属',
			'reply_title' => '改变世界非你莫属',
			'reply_thumb' =>  $tmpfolder.'default_cover.jpg',
			'reply_description' => '改变世界非你莫属',
			'isadvanced' => 0,
			'first_type' => 1,
			'bg_music_switch' => 1,
			'bg_music_icon' => 1,
			'bg_music_url' =>  $tmpfolder.'bg.mp3',
			'hits' => 0,
			'isyuyue' => 0,
			'iscomment' => 0
			);
			 
		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
		
		$pagestr='
[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'2.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'3.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'5.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'7.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:18:\"\u9ad8\u7ea7\u4ea7\u54c1\u7ecf\u7406\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'8.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:15:\"\u65b0\u5a92\u4f53\u4f20\u64ad\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'9.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:21:\"\u524d\u7aef\u5f00\u53d1\u5de5\u7a0b\u5e08\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'10.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:18:\"PHP\u5f00\u53d1\u5de5\u7a0b\u5e08\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'11.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:11:\"UI\u8bbe\u8ba1\u5e08\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'12.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:15:\"\u6d4b\u8bd5\u5de5\u7a0b\u5e08\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'13.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:15:\"\u5927\u5ba2\u6237\u7ecf\u7406\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'14.jpg","param":"a:3:{s:4:\"str1\";s:0:\"\";s:4:\"str2\";s:0:\"\";s:4:\"str3\";s:8:\"BD\u7ecf\u7406\";}","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'15.jpg","param":"a:2:{s:4:\"pic1\";s:68:\"'.$page_tmpfolder.'15.png\";s:4:\"pic2\";s:68:\"'.$page_tmpfolder.'18.png\";}","create_time":"0"}]';
   
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
							