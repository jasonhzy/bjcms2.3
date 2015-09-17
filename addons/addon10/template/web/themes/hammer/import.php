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
$tmpfolder='addon10/'.$tmpfoldername.'/hammer/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/hammer\/';
xCopy(ADDONS_ROOT.'addon10/demo/hammer/',WEB_ROOT.'/attachment/'.$tmpfolder,1);



		$list_data=array(
			'title' => '锤子 · 手机',
			'theme' => 'hammer',
			'iden' => 'hammer',
			'cover' => $tmpfolder.'1.jpg',
 			'share_title' => '锤子 · 手机',
			'share_thumb' => $tmpfolder.'share.jpg',			
			'share_content' => '锤子 · 手机',
			'reply_title' => '锤子 · 手机',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '我不是为了输赢  我就是认真 by 微动力',
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
[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'2.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'3.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'5.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'7.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"7","thumb":"'.$page_tmpfolder.'8.jpg","param":"a:2:{s:6:\"vthumb\";s:0:\"\";s:3:\"url\";s:47:\"http:\/\/v.youku.com\/v_show\/id_XNzE0OTY2Njg4.html\";}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'9.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'10.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'11.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"7","thumb":"'.$page_tmpfolder.'12.jpg","param":"a:2:{s:6:\"vthumb\";s:0:\"\";s:3:\"url\";s:47:\"http:\/\/v.youku.com\/v_show\/id_XNzE0ODc0MDMy.html\";}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'13.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'14.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"2","thumb":"'.$page_tmpfolder.'15.jpg","param":"a:2:{s:6:\"btnimg\";s:67:\"'.$page_tmpfolder.'15-1.png\";s:3:\"url\";s:42:\"http:\/\/m.suning.com\/product\/121160448.html\";}","create_time":"0"}]';
   
   
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
							