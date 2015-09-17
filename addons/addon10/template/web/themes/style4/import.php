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
$tmpfolder='addon10/'.$tmpfoldername.'/style4/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style4\/';
xCopy(ADDONS_ROOT.'addon10/demo/style4/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

	$list_data=array(
			'title' => '我与自己久别重逢',
			'theme' => 'style4',
			'iden' => 'style4',
			'cover' => $tmpfolder.'1.png',
			'share_title' => '我与自己久别重逢',
			'share_thumb' =>$tmpfolder.'share.jpg',
			'share_content' => '2015 经济不景气 为自己打气',
			'reply_title' => '我与自己久别重逢',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '2015 经济不景气 为自己打气',
			'isadvanced' => 0,
			'first_type' => 0,
			'bg_music_switch' => 1,
			'bg_music_icon' => 1,
			'bg_music_url' => $tmpfolder.'bg.mp3',
			'hits' => 0,
			'isyuyue' => 0,
			'iscomment' => 0,
			);

		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
	
 		
		 $pagestr='[{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'2.jpg","param":"a:5:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'2-1.png\";s:5:\"show1\";s:8:\"z-center\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'2-2.png\";s:4:\"pic3\";s:0:\"\";s:4:\"pic4\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'3.jpg","param":"a:5:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'3-1.png\";s:5:\"show1\";s:8:\"z-center\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'3-2.png\";s:4:\"pic3\";s:0:\"\";s:4:\"pic4\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'4.jpg","param":"a:5:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'4-1.png\";s:5:\"show1\";s:8:\"z-center\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'4-2.png\";s:4:\"pic3\";s:0:\"\";s:4:\"pic4\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'5.jpg","param":"a:5:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'5-1.png\";s:5:\"show1\";s:8:\"z-center\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'5-2.png\";s:4:\"pic3\";s:0:\"\";s:4:\"pic4\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'6.jpg","param":"a:5:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'6-1.png\";s:5:\"show1\";s:8:\"z-center\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'6-2.png\";s:4:\"pic3\";s:0:\"\";s:4:\"pic4\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'7.jpg","param":"a:5:{s:4:\"pic1\";s:69:\"'.$page_tmpfolder.'7-1.png\";s:5:\"show1\";s:8:\"z-center\";s:4:\"pic2\";s:69:\"'.$page_tmpfolder.'7-2.png\";s:4:\"pic3\";s:0:\"\";s:4:\"pic4\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"3","thumb":"'.$page_tmpfolder.'9.jpg","param":"a:2:{s:6:\"btnimg\";s:71:\"'.$page_tmpfolder.'9_btn.jpg\";s:11:\"share_thumb\";s:0:\"\";}","create_time":"0"},{"listorder":"0","m_type":"31","thumb":"'.$page_tmpfolder.'10.jpg","param":"a:6:{s:6:\"btnimg\";s:72:\"'.$page_tmpfolder.'10_btn.jpg\";s:3:\"tel\";s:11:\"13813874744\";s:5:\"sname\";s:18:\"\u662f\u6253\u53d1\u65af\u8482\u82ac\";s:5:\"place\";s:36:\"\u4e0a\u6d77\u5e02\u6768\u6d66\u533a\u56fd\u548c\u8def36\u53f7-a12\";s:3:\"lng\";s:10:\"121.525772\";s:3:\"lat\";s:9:\"31.308563\";}","create_time":"0"}]';
    
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
							