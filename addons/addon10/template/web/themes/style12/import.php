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
$tmpfolder='addon10/'.$tmpfoldername.'/style12/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style12\/';
xCopy(ADDONS_ROOT.'addon10/demo/style12/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

	$list_data=array(
			'title' => '九章别墅',
			 'theme' => 'style12',
			'iden' => 'style12',
			'cover' =>  $tmpfolder.'1.png',
			'share_title' => '九章别墅',
			'share_thumb' =>  $tmpfolder.'share.jpg',
			'share_content' => '九章别墅',
			'reply_title' => '九章别墅',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '九章别墅',
			'isadvanced' => 0,
			'first_type' => 0,
			'bg_music_switch' => 1,
			'bg_music_icon' => 1,
			'bg_music_url' => '',
			'hits' => 0,
			'isyuyue' => 0,
			'iscomment' => 0
			);
			
			
		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
	
 
	
		
		 $pagestr='
[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'1.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'2.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"21","thumb":"'.$page_tmpfolder.'default_bg.jpg","param":"a:6:{s:3:\"tel\";s:0:\"\";s:5:\"sname\";s:12:\"\u4e5d\u7ae0\u522b\u5885\";s:5:\"place\";s:27:\"\u5317\u4eac\u5e02\u671d\u9633\u533a\u91d1\u76cf\u8def\";s:3:\"lng\";s:10:\"116.576191\";s:3:\"lat\";s:9:\"40.009917\";s:5:\"thumb\";a:2:{i:0;s:68:\"'.$page_tmpfolder.'3.jpg\";i:1;s:68:\"'.$page_tmpfolder.'4.jpg\";}}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'12.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'5.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'7.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'8.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'9.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'10.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'11.jpg","param":"","create_time":"0"}]';
   
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
							