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
$tmpfolder='addon10/'.$tmpfoldername.'/style8/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style8\/';
xCopy(ADDONS_ROOT.'addon10/demo/style8/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

		$list_data=array(
			'title' => '2014 NEW FUN 泳池趴',
				'theme' => 'style8',
			'iden' => 'style8',
			'cover' => $tmpfolder.'0.jpg',
 			'share_title' => '2014 NEW FUN 泳池趴',
			'share_thumb' => $tmpfolder.'share.jpg',			
			'share_content' => '2014 NEW FUN 泳池趴',
			'reply_title' => '2014 NEW FUN 泳池趴',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '2014 NEW FUN 泳池趴',
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
	
 
	
		

		  $pagestr='[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'1.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'2.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'3.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"6","thumb":"'.$page_tmpfolder.'5.jpg","param":"a:2:{s:5:\"nails\";a:7:{i:0;s:69:\"'.$page_tmpfolder.'5-1.png\";i:1;s:69:\"'.$page_tmpfolder.'5-2.png\";i:2;s:69:\"'.$page_tmpfolder.'5-3.png\";i:3;s:69:\"'.$page_tmpfolder.'5-4.png\";i:4;s:69:\"'.$page_tmpfolder.'5-5.png\";i:5;s:69:\"'.$page_tmpfolder.'5-6.png\";i:6;s:69:\"'.$page_tmpfolder.'5-7.png\";}s:6:\"thumbs\";a:7:{i:0;s:71:\"'.$page_tmpfolder.'5-1-1.jpg\";i:1;s:71:\"'.$page_tmpfolder.'5-2-1.jpg\";i:2;s:71:\"'.$page_tmpfolder.'5-3-1.jpg\";i:3;s:71:\"'.$page_tmpfolder.'5-4-1.jpg\";i:4;s:71:\"'.$page_tmpfolder.'5-5-1.jpg\";i:5;s:71:\"'.$page_tmpfolder.'5-6-1.jpg\";i:6;s:71:\"'.$page_tmpfolder.'5-7-1.jpg\";}}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'7.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'8.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'9.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'10.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'11.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'12.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"7","thumb":"'.$page_tmpfolder.'13.jpg","param":"a:2:{s:3:\"str\";s:11:\"13800138000\";s:3:\"url\";s:11:\"13800138000\";}","create_time":"0"},{"listorder":"0","m_type":"31","thumb":"'.$page_tmpfolder.'14.jpg","param":"a:6:{s:3:\"str\";s:12:\"\u516c\u53f8\u5730\u5740\";s:3:\"tel\";s:11:\"13813813813\";s:5:\"sname\";s:12:\"\u5357\u4eac\u667a\u7b56\";s:5:\"place\";s:36:\"\u4e0a\u6d77\u5e02\u6768\u6d66\u533a\u56fd\u548c\u8def36\u53f7-a12\";s:3:\"lng\";s:10:\"121.525772\";s:3:\"lat\";s:9:\"31.308563\";}","create_time":"0"}]';
   
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
							