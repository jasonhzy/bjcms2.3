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
$tmpfolder='addon10/'.$tmpfoldername.'/style5/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style5\/';
xCopy(ADDONS_ROOT.'addon10/demo/style5/',WEB_ROOT.'/attachment/'.$tmpfolder,1);


		$list_data=array(
			'title' => '云来三周年',
			'theme' => 'style5',
			'iden' => 'style5',
			'cover1'=> $tmpfolder.'1.png',
			'cover2' => $tmpfolder.'1.jpg',
			'share_title' => '云来三周年',
			'share_thumb' => $tmpfolder.'share.jpg',
			'share_content' => '云来三周年',
			'reply_title' => '云来三周年',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '云来三周年',
			'isadvanced' => 0,
			'first_type' => 2,
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
[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'2.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'3.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'5.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"10","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"10","thumb":"'.$page_tmpfolder.'7.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'8.jpg","param":"a:1:{s:3:\"url\";s:47:\"http:\/\/v.youku.com\/v_show\/id_XNzYzMzYwNDc2.html\";}","create_time":"0"},{"listorder":"0","m_type":"7","thumb":"'.$page_tmpfolder.'9.jpg","param":"a:1:{s:3:\"bg2\";s:68:\"'.$page_tmpfolder.'10.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"8","thumb":"'.$page_tmpfolder.'11.jpg","param":"a:2:{s:5:\"txtbg\";s:68:\"'.$page_tmpfolder.'11.png\";s:6:\"btnimg\";s:68:\"'.$page_tmpfolder.'12.png\";}","create_time":"0"},{"listorder":"0","m_type":"5","thumb":"'.$page_tmpfolder.'13.jpg","param":"a:6:{s:6:\"btnimg\";s:68:\"'.$page_tmpfolder.'14.png\";s:5:\"txtbg\";s:68:\"'.$page_tmpfolder.'13.png\";s:5:\"sname\";s:9:\"\u6df1\u5733\u6e7e\";s:5:\"place\";s:6:\"\u6df1\u5733\";s:3:\"lng\";s:0:\"\";s:3:\"lat\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"9","thumb":"'.$page_tmpfolder.'15.jpg","param":"a:4:{s:3:\"tel\";s:11:\"13914494002\";s:5:\"email\";s:16:\"123@qq.com\";s:5:\"wxurl\";s:107:\"\";s:6:\"weixin\";s:7:\"\";}","create_time":"0"}]';
  
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
							