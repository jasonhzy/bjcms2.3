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
$tmpfolder='addon10/'.$tmpfoldername.'/style3/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style3\/';
xCopy(ADDONS_ROOT.'addon10/demo/style3/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

		$list_data=array(
			'title' => '变形金刚4•绝迹重生',
			'theme' => 'style3',
			'iden' => 'style3',
			'cover1' => $tmpfolder.'0.jpg',
			'cover2' => $tmpfolder.'0-1.jpg',
			'share_title' => '变形金刚4•绝迹重生',
			'share_thumb' => $tmpfolder.'share.jpg',
			'share_content' => '变形金刚4•绝迹重生',
			'reply_title' => '变形金刚4•绝迹重生',
			'reply_thumb' => $tmpfolder.'default_cover.jpg',
			'reply_description' => '变形金刚4•绝迹重生',
			'isadvanced' => 0,
			'first_type' => 2,
			'bg_music_switch' => 1,
			'bg_music_icon' => 1,
			'bg_music_url' => $tmpfolder.'bg.mp3',
			'hits' => 0,
			'tongji' => 0,
			'isyuyue' => 0,
			'iscomment' => 0,
		);
		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
	
 	
		
		  $pagestr='[{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'1.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'2.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'3.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'4.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'5.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'6.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'7.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'8.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"5","thumb":"'.$page_tmpfolder.'9.jpg","param":"a:2:{s:6:\"vthumb\";s:69:\"'.$page_tmpfolder.'9-1.jpg\";s:3:\"url\";s:69:\"'.$page_tmpfolder.'9-2.mp4\";}","create_time":"0"},{"listorder":"0","m_type":"5","thumb":"'.$page_tmpfolder.'10.jpg","param":"a:2:{s:6:\"vthumb\";s:70:\"'.$page_tmpfolder.'10-1.jpg\";s:3:\"url\";s:70:\"'.$page_tmpfolder.'10-2.mp4\";}","create_time":"0"},{"listorder":"0","m_type":"5","thumb":"'.$page_tmpfolder.'11.jpg","param":"a:2:{s:6:\"vthumb\";s:70:\"'.$page_tmpfolder.'11-1.jpg\";s:3:\"url\";s:70:\"'.$page_tmpfolder.'10-2.mp4\";}","create_time":"0"},{"listorder":"0","m_type":"1","thumb":"'.$page_tmpfolder.'12.jpg","param":"","create_time":"0"},{"listorder":"0","m_type":"8","thumb":"'.$page_tmpfolder.'13.jpg","param":"a:9:{s:3:\"tel\";s:13:\"13800138000\";s:5:\"email\";s:18:\"12345@qq.com\";s:5:\"wxurl\";s:0:\"\";s:6:\"weixin\";s:0:\"\";s:6:\"mthumb\";s:70:\"'.$page_tmpfolder.'13-1.jpg\";s:5:\"sname\";s:19:\"\u676d\u5dde\u8f7b\u4e91-\u6d4b\u8bd5\";s:5:\"place\";s:39:\"\u6d59\u6c5f\u7701\u676d\u5dde\u5e02\u4e0b\u57ce\u533a\u4e2d\u5c71\u5317\u8def\";s:3:\"lng\";s:10:\"120.169756\";s:3:\"lat\";s:8:\"30.28386\";}","create_time":"0"},{"listorder":"0","m_type":"8","thumb":"'.$page_tmpfolder.'14.jpg","param":"a:9:{s:3:\"tel\";s:13:\"13800138000\";s:5:\"email\";s:15:\"12345@qq.com\";s:5:\"wxurl\";s:0:\"\";s:6:\"weixin\";s:0:\"\";s:6:\"mthumb\";s:70:\"'.$page_tmpfolder.'14-1.jpg\";s:5:\"sname\";s:12:\"\u5357\u4eac\u667a\u7b56\";s:5:\"place\";s:35:\"\u4e0a\u6d77\u5e02\u6768\u6d66\u533a\u653f\u901a\u8def260-8\u53f7\";s:3:\"lng\";s:10:\"121.515854\";s:3:\"lat\";s:9:\"31.307636\";}","create_time":"0"},{"listorder":"0","m_type":"8","thumb":"'.$page_tmpfolder.'15.jpg","param":"a:9:{s:3:\"tel\";s:13:\"13800138000\";s:5:\"email\";s:18:\"12345@qq.com\";s:5:\"wxurl\";s:0:\"\";s:6:\"weixin\";s:0:\"\";s:6:\"mthumb\";s:70:\"'.$page_tmpfolder.'15-1.jpg\";s:5:\"sname\";s:12:\"\u5357\u4eac\u667a\u7b56\";s:5:\"place\";s:39:\"\u6d59\u6c5f\u7701\u676d\u5dde\u5e02\u4e0b\u57ce\u533a\u4e2d\u5c71\u5317\u8def\";s:3:\"lng\";s:10:\"120.169756\";s:3:\"lat\";s:8:\"30.28386\";}","create_time":"0"}]';
  
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
							