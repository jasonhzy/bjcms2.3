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
$tmpfolder='addon10/'.$tmpfoldername.'/onefound/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/onefound\/';
xCopy(ADDONS_ROOT.'addon10/demo/onefound/',WEB_ROOT.'/attachment/'.$tmpfolder,1);




		$list_data=array(
			'title' => '壹基金邀您壹生益起走',
		'theme' => 'onefound',
			'iden' => 'onefound',
			'cover' => $tmpfolder.'default_bg.jpg',
			'cover1' => $tmpfolder.'2.png',
			'cover2' => $tmpfolder.'1.jpg',
  			'share_title' => '壹基金邀您壹生益起走',
			'share_thumb' => $tmpfolder.'share.jpg',
			'share_content' => '壹基金邀您壹生益起走',
			'reply_title' => '壹基金邀您壹生益起走',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '壹基金邀您壹生益起走',
			'isadvanced' => '0',
			'first_type' => 2,
			'bg_music_switch' => '1',
			'bg_music_icon' => 0,
			'bg_music_url' => $tmpfolder.'bg.mp3',
			'hits' => 0,
			'isyuyue' => 0,
			'iscomment' => 0
		);
			 
		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
	

	
	    $pagestr='
[{"listorder":"0","m_type":"34","thumb":"'.$page_tmpfolder.'3.jpg","param":"a:1:{s:4:\"pic1\";s:71:\"'.$page_tmpfolder.'3-1.png\";}","create_time":"0"},{"listorder":"0","m_type":"35","thumb":"'.$page_tmpfolder.'4.jpg","param":"a:1:{s:6:\"thumbs\";a:7:{i:0;s:71:\"'.$page_tmpfolder.'4-1.png\";i:1;s:71:\"'.$page_tmpfolder.'4-2.png\";i:2;s:71:\"'.$page_tmpfolder.'4-3.png\";i:3;s:71:\"'.$page_tmpfolder.'4-4.png\";i:4;s:71:\"'.$page_tmpfolder.'4-5.png\";i:5;s:71:\"'.$page_tmpfolder.'4-6.png\";i:6;s:71:\"'.$page_tmpfolder.'4-7.png\";}}","create_time":"0"},{"listorder":"0","m_type":"34","thumb":"'.$page_tmpfolder.'5.jpg","param":"a:1:{s:4:\"pic1\";s:71:\"'.$page_tmpfolder.'5-1.png\";}","create_time":"0"},{"listorder":"0","m_type":"35","thumb":"'.$page_tmpfolder.'6.jpg","param":"a:1:{s:6:\"thumbs\";a:6:{i:0;s:71:\"'.$page_tmpfolder.'6-1.png\";i:1;s:71:\"'.$page_tmpfolder.'6-2.png\";i:2;s:71:\"'.$page_tmpfolder.'6-3.png\";i:3;s:71:\"'.$page_tmpfolder.'6-4.png\";i:4;s:71:\"'.$page_tmpfolder.'6-5.png\";i:5;s:71:\"'.$page_tmpfolder.'6-6.png\";}}","create_time":"0"},{"listorder":"0","m_type":"34","thumb":"'.$page_tmpfolder.'7.jpg","param":"a:1:{s:4:\"pic1\";s:71:\"'.$page_tmpfolder.'7-1.png\";}","create_time":"0"},{"listorder":"0","m_type":"3","thumb":"'.$page_tmpfolder.'8.jpg","param":"a:2:{s:6:\"btnimg\";s:73:\"'.$page_tmpfolder.'8-btn.png\";s:11:\"share_thumb\";s:71:\"'.$page_tmpfolder.'8-3.jpg\";}","create_time":"0"},{"listorder":"0","m_type":"34","thumb":"'.$page_tmpfolder.'9.jpg","param":"a:1:{s:4:\"pic1\";s:71:\"'.$page_tmpfolder.'9-1.png\";}","create_time":"0"},{"listorder":"0","m_type":"35","thumb":"'.$page_tmpfolder.'10.jpg","param":"a:1:{s:6:\"thumbs\";a:5:{i:0;s:72:\"'.$page_tmpfolder.'10-1.png\";i:1;s:72:\"'.$page_tmpfolder.'10-2.png\";i:2;s:72:\"'.$page_tmpfolder.'10-3.png\";i:3;s:72:\"'.$page_tmpfolder.'10-4.png\";i:4;s:72:\"'.$page_tmpfolder.'10-5.png\";}}","create_time":"0"},{"listorder":"0","m_type":"34","thumb":"'.$page_tmpfolder.'11.jpg","param":"a:1:{s:4:\"pic1\";s:72:\"'.$page_tmpfolder.'11-1.png\";}","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'12.jpg","param":"a:2:{s:6:\"btnimg\";s:72:\"'.$page_tmpfolder.'12-1.png\";s:3:\"url\";s:83:\"https:\/\/mp.weixin.qq.com\/m\/\";}","create_time":"0"}]';

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
							