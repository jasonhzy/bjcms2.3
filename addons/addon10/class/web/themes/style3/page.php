<?php
	$op=$_GP['op'];
	if(!empty($_FILES['video[url]']))
	{
message($_FILES['video[url]']);
}
	$id=intval($_GP['id']);
	if($id>0){
		$item=mysqld_select('select * from '.table('addon10_scene_page').' where id=:id AND list_id=:list_id ',array(':list_id'=>$list_id,':id'=>$id));
	}
	if($_GP['op']=='del'){
		if($item!=false){
			$temp=mysqld_delete('addon10_scene_page',array('id'=>$item['id']));
		}
		if($temp==false){
			$this->ajaxmessage('数据提交失败');
		}else{
			$this->ajaxmessage('数据提交成功',web_url('scene_page',array('listid'=>$list_id,'op'=>'display')),'success');
		}
	}
	//保存数据
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$insert=array(
			'list_id'=>$list_id,
			'listorder'=>intval($_GP['listorder']),
			'm_type'=>intval($_GP['m_type']),
			'thumb'=>$_GP['thumb'],
		);
		if(isset($this->typeArr[$insert['m_type']])){
			$data=$_GP[$this->typeArr[$insert['m_type']]['type']];
		} 
		
		if(!empty($data)){
			$insert['param']=serialize($data);
		}else
		{
		$insert['param']='';	
		}
		if($item==false){
			$temp=mysqld_insert('addon10_scene_page',$insert);
		}else{
			$temp=mysqld_update('addon10_scene_page',$insert,array('id'=>$item['id']));
		}
		if($temp==false){
			$this->ajaxmessage('数据提交失败');
		}else{
			$this->ajaxmessage('数据提交成功',web_url('scene_page',array('listid'=>$list_id,'op'=>'display')),'success');
		}
	}
$uploadfolder=WEB_ROOT.'/attachment/image/addon10/';
		mkdirs($uploadfolder);
		$tmpfoldername=random(15);
		copy(ADDONS_ROOT.'addon10/style/img/default_bg.jpg',$uploadfolder.$tmpfoldername.'jpg');
		
		$tmpfoldername2=random(15);
		copy(ADDONS_ROOT.'addon10/style/img/default_btn.png',$uploadfolder.$tmpfoldername2.'png');
		
		
	if($item==false){
		$item=array(
			'listorder'=>0,
			'thumb'=>'image/addon10/'.$tmpfoldername.'jpg',
		);
		$data=array(
		
		);
	}else{
		$data=$this->iunserializer($item['param']);
	}
	if(empty($data['btnimg'])){
		$data['btnimg']='image/addon10/'.$tmpfoldername2.'png';
	}
	 
	include addons_page('themes/'.$list['theme'].'/page');