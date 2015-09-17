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
$tmpfolder='addon10/'.$tmpfoldername.'/style13/';
$page_tmpfolder='addon10\/'.$tmpfoldername.'\/style13\/';
xCopy(ADDONS_ROOT.'addon10/demo/style13/',WEB_ROOT.'/attachment/'.$tmpfolder,1);

		$list_data=array(
			'title' => '您的家庭摄影师',
			'theme' => 'style13',
			'iden' => 'style13',
			'cover' => '',
			'share_title' => '您的家庭摄影师',
			'share_thumb' =>  $tmpfolder.'share.jpg',
			'share_content' => '您的家庭摄影师',
			'reply_title' => '您的家庭摄影师',
			'reply_thumb' =>  $tmpfolder.'default_cover.jpg',
			'reply_description' => '您的家庭摄影师',
			'isadvanced' => 0,
			'first_type' => 0,
			'bg_music_switch' => 1,
			'bg_music_icon' => 1,
			'bg_music_url' =>  $tmpfolder.'sound.mp3',
			'hits' => 0,
			'isyuyue' => 0,
			'iscomment' => 0
			);
			
			
		mysqld_insert('addon10_scene_list',$list_data);
		$list_id=mysqld_insertid();
	

	  $pagestr='
[{"listorder":"0","m_type":"11","thumb":"'.$page_tmpfolder.'default_bg.jpg","param":"a:3:{s:4:\"str1\";s:19:\"Gift for the Future\";s:4:\"str2\";s:24:\"\u56de\u5fc6\uff0c\u5b58\u4e88\u672a\u6765...\";s:6:\"thumbs\";a:28:{i:0;s:74:\"'.$page_tmpfolder.'page1\/1.jpg\";i:1;s:74:\"'.$page_tmpfolder.'page1\/2.jpg\";i:2;s:74:\"'.$page_tmpfolder.'page1\/3.jpg\";i:3;s:74:\"'.$page_tmpfolder.'page1\/4.jpg\";i:4;s:74:\"'.$page_tmpfolder.'page1\/5.jpg\";i:5;s:74:\"'.$page_tmpfolder.'page1\/6.jpg\";i:6;s:74:\"'.$page_tmpfolder.'page1\/7.jpg\";i:7;s:74:\"'.$page_tmpfolder.'page1\/8.jpg\";i:8;s:74:\"'.$page_tmpfolder.'page1\/9.jpg\";i:9;s:75:\"'.$page_tmpfolder.'page1\/10.jpg\";i:10;s:75:\"'.$page_tmpfolder.'page1\/11.jpg\";i:11;s:75:\"'.$page_tmpfolder.'page1\/12.jpg\";i:12;s:75:\"'.$page_tmpfolder.'page1\/13.jpg\";i:13;s:75:\"'.$page_tmpfolder.'page1\/14.jpg\";i:14;s:75:\"'.$page_tmpfolder.'page1\/15.jpg\";i:15;s:75:\"'.$page_tmpfolder.'page1\/16.jpg\";i:16;s:75:\"'.$page_tmpfolder.'page1\/17.jpg\";i:17;s:75:\"'.$page_tmpfolder.'page1\/18.jpg\";i:18;s:75:\"'.$page_tmpfolder.'page1\/19.jpg\";i:19;s:75:\"'.$page_tmpfolder.'page1\/20.jpg\";i:20;s:75:\"'.$page_tmpfolder.'page1\/21.jpg\";i:21;s:75:\"'.$page_tmpfolder.'page1\/22.jpg\";i:22;s:75:\"'.$page_tmpfolder.'page1\/23.jpg\";i:23;s:75:\"'.$page_tmpfolder.'page1\/24.jpg\";i:24;s:75:\"'.$page_tmpfolder.'page1\/25.jpg\";i:25;s:75:\"'.$page_tmpfolder.'page1\/26.jpg\";i:26;s:75:\"'.$page_tmpfolder.'page1\/27.jpg\";i:27;s:75:\"'.$page_tmpfolder.'page1\/28.jpg\";}}","create_time":"0"},{"listorder":"0","m_type":"12","thumb":"'.$page_tmpfolder.'1.jpg","param":"a:3:{s:3:\"top\";s:2:\"20\";s:4:\"str1\";s:26:\"Tick tock, time passing\u2026\";s:4:\"str2\";s:38:\"\u4f60\u7684\u5230\u6765, \u8ba9\u65f6\u5149\u66f4\u663e\u5306\u5306\u2026\";}","create_time":"0"},{"listorder":"0","m_type":"12","thumb":"'.$page_tmpfolder.'2.jpg","param":"a:3:{s:3:\"top\";s:2:\"20\";s:4:\"str1\";s:34:\"You are just like the little me\u2026\";s:4:\"str2\";s:51:\"\u671b\u7740\u5c0f\u5c0f\u7684\u4f60\uff0c\u4eff\u4f5b\u770b\u5230\u81ea\u5df1\u5c0f\u65f6\u5019\u2026\";}","create_time":"0"},{"listorder":"0","m_type":"12","thumb":"'.$page_tmpfolder.'3.jpg","param":"a:3:{s:3:\"top\";s:1:\"5\";s:4:\"str1\";s:41:\"In my eyes, you are the one so special\u2026\";s:4:\"str2\";s:34:\" \u5728\u6211\u773c\u4e2d\uff0c\u4f60\u5982\u6b64\u72ec\u7279\u2026\";}","create_time":"0"},{"listorder":"0","m_type":"12","thumb":"'.$page_tmpfolder.'4.jpg","param":"a:3:{s:3:\"top\";s:2:\"75\";s:4:\"str1\";s:23:\"Let me accompany you\u2026\";s:4:\"str2\";s:40:\" \u53ea\u60f3\u966a\u4f60\uff0c\u518d\u4e00\u6b21\u4eb2\u5386\u7ae5\u5e74\u2026\";}","create_time":"0"},{"listorder":"0","m_type":"12","thumb":"'.$page_tmpfolder.'5.jpg","param":"a:3:{s:3:\"top\";s:2:\"75\";s:4:\"str1\";s:42:\"We play, we laugh, we explore the world\u2026\";s:4:\"str2\";s:45:\"\u6211\u4eec\u73a9\u800d\uff0c\u6211\u4eec\u6b22\u7b11\uff0c\u6211\u4eec\u63a2\u7d22\u2026\";}","create_time":"0"},{"listorder":"0","m_type":"12","thumb":"'.$page_tmpfolder.'6.jpg","param":"a:3:{s:3:\"top\";s:2:\"15\";s:4:\"str1\";s:22:\"One day, in the future\";s:4:\"str2\";s:23:\" \u672a\u6765\u7684\u67d0\u4e00\u5929\uff0c \";}","create_time":"0"},{"listorder":"0","m_type":"12","thumb":"'.$page_tmpfolder.'7.jpg","param":"a:3:{s:3:\"top\";s:2:\"16\";s:4:\"str1\";s:27:\"We will review the moments.\";s:4:\"str2\";s:34:\"\u6211\u4eec\u5c06\u91cd\u6e29 \u201c\u6b64\u65f6\u5f7c\u523b\u201d\";}","create_time":"0"},{"listorder":"0","m_type":"13","thumb":"'.$page_tmpfolder.'default_bg.jpg","param":"a:5:{s:4:\"logo\";s:71:\"'.$page_tmpfolder.'logo.png\";s:4:\"str1\";s:16:\"NOT JUST A PHOTO\";s:4:\"str2\";s:24:\"\u60a8\u7684\u573a\u666f\u5236\u4f5c\u4e13\u5bb6\";s:4:\"str3\";s:15:\"40039885@qq.com\";s:6:\"qrcode\";s:53:\"'.$page_tmpfolder.'qrcode.jpg\";}","create_time":"0"}]';
  
	
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
							