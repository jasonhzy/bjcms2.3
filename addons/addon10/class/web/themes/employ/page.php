<?php
	$op=$_GP['op'];
	

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
		if($insert['m_type']==1){
			$data=$_GP['first'];		
 		}elseif($insert['m_type']==2){
			$data=$_GP['second'];
		}elseif($insert['m_type']==3){
  			$data=$_GP['third'];
		}elseif($insert['m_type']==4){
			$data=$_GP['fourth'];
		}elseif($insert['m_type']==5){
			$data=$_GP['fifth'];
		}elseif($insert['m_type']==6){
			$data=$_GP['sixth'];
		}elseif($insert['m_type']==7){
			$data=$_GP['seventh'];
		}elseif($insert['m_type']==8){
			$data=$_GP['eighth'];
		}elseif($insert['m_type']==9){
			$data=$_GP['ninth'];
		}elseif($insert['m_type']==10){
			$data=$_GP['tenth'];
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