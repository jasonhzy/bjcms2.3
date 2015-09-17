<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
class addon10Addons  extends BjModule {
	public $typeArr = array('1' => array('type' => 'pure', 'name' => '单图片展', 'desc' => '场景：单一图片显示,建议大小640*1008,或者相同比例,具体参考实际'), '2' => array('type' => 'btn', 'name' => '按钮链接', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。中下部有按钮图片实现连接具体参考实际'), '3' => array('type' => 'share', 'name' => '按钮分享', 'desc' => '场景3：图片全屏显示建议大小640*1008,或者相同比例。中下部有按钮图片点击出现分享图燿具体参考实际'), '4' => array('type' => 'tel', 'name' => '按钮拨号', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。中下部有按钮图片实现一键拨卿具体参考实际'), '5' => array('type' => 'video', 'name' => 'Mp4视频播放', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。视频格式，需要mp4格式(具体参考实际'), '6' => array('type' => 'map', 'name' => '地图导航', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。百度地图导膿具体参考实际'), '7' => array('type' => 'youku', 'name' => '优酷视频', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。视频图燿优酷地址(具体参考实际'), '8' => array('type' => 'amap', 'name' => '地图详细信息', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。地噿电话+导航详细信息(具体参考实际'), '9' => array('type' => 'bmap', 'name' => '地图详细信息', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。地噿电话+导航+表单详细信息(具体参考实际'), '10' => array('type' => 'bigpic', 'name' => '单图片放', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。地噿电话+导航+表单详细信息(具体参考实际'), '11' => array('type' => 'b2pics', 'name' => '多图展示', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例,张小图，多图展示(具体参考实际'), '12' => array('type' => 't2pics', 'name' => '文字多图介绍', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。图燿文字介绍(具体参考实际'), '13' => array('type' => 'm2yuyue', 'name' => '预约拨号信息', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。预约拨号信忿具体参考实际'), '14' => array('type' => 'intro', 'name' => '多图文字', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。多图文嫿具体参考实际'), '15' => array('type' => 't2btn', 'name' => '按钮链接', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。中下部有文字实现连挿具体参考实际'), '16' => array('type' => 't2share', 'name' => '按钮分享', 'desc' => '场景3：图片全屏显示建议大小640*1008,或者相同比例。中下部有文字点击出现分享图燿具体参考实际'), '17' => array('type' => 't2tel', 'name' => '按钮一键拨', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。中下部有文字实现一键拨卿具体参考实际'), '21' => array('type' => 'map21', 'name' => '地图&多图展示', 'desc' => '场景：图片全屏显示建议大小640*1008,或者相同比例。地噿多图展示(具体参考实际'), '22' => array('type' => 'yuyue22', 'name' => '预约展示', 'desc' => '场景：头部小图展示或者相同比例，个自定义字段，一个时间字段开县具体参考实际'), '31' => array('type' => 'maplink', 'name' => '地图链接', 'desc' => '场景：图片全屏显示建议大小640*1008。链接到地图展示页面，一键导膿具体参考实际'), '32' => array('type' => 'layer32', 'name' => '双层图片展示', 'desc' => '场景：图片全屏显示建议大小640*1008。上下双层图片展示，(具体参考实际'), '33' => array('type' => 'map33', 'name' => '地图文字链接', 'desc' => '场景：图片全屏显示建议大小640*1008。地图文字链接展示，一键导膿具体参考实际'), '34' => array('type' => 'layer34', 'name' => '双层图片展示', 'desc' => '场景：图片全屏显示建议大小640*1008。上下双层图片展示，具体参考实际'), '35' => array('type' => 'pics35', 'name' => '多层图片展示', 'desc' => '场景：图片全屏显示建议大小640*1008。多层图片展示，具体参考实际'));
 public $class_type = array('0' => '', '1' => 'alert-success', '2' => 'alert-info', '3' => 'alert-error');
   public function do_newkeupload()
	{
		       global  $_CMS;
	$result = array(
		'url' => '',
		'message' => '',
		'error' => 0,
	);
	if (!empty($_FILES['imgFile']['name'])) {
		if ($_FILES['imgFile']['error'] != 0) {
			$result['state'] = '上传失败，请重试！';
			exit(json_encode($result));
		}
		$file = $this->new_file_upload($_FILES['imgFile'], 'other');
		if (is_error($file)) {
			$result['state'] = $file['message'];
			exit(json_encode($result));
		}
		$result['url'] = $file['path'];
		$result['filename'] =$file['path'];
		
		mysqld_insert('attachment', array(
			'uid' => $_CMS['account']['id'],
			'filename' => $_FILES['imgFile']['name'],
			'attachment' => $result['filename'],
			'type' => 1,
			'createtime' => TIMESTAMP,
		));
		exit(json_encode($result));
	} else {
		$result['message'] = '请选择要上传的图片！';
				$result['error'] = 1;
		exit(json_encode($result));
	}
	}
   public  function new_file_upload($file, $type = 'image') {
	if(empty($file)) {
		return error(-1, '没有上传内容');
	}
	$limit=5000;
	$extention = pathinfo($file['name'], PATHINFO_EXTENSION);
	if(empty($type)||$type=='image')
	{
	$extentions=array('gif', 'jpg', 'jpeg', 'png');
	}
	if($type=='music')
	{
	$extentions=array('mp3','mp4');
	}
		if($type=='other')
	{
	$extentions=array('gif', 'jpg', 'jpeg', 'png','mp3','mp4','doc');
	}
	if(!in_array(strtolower($extention), $extentions)) {
		return error(-1, '不允许上传此类文件');
	}
	if($limit * 1024 < filesize($file['tmp_name'])) {
		return error(-1, "上传的文件超过大小限制，请上传小于 ".$limit."k 的文件");
	}
	$result = array();
	$path = '/attachment/';
		$result['path'] = "$type/" . date('Y/m/');
		mkdirs(WEB_ROOT . $path . $result['path']);
		do {
			$filename = random(15) . ".{$extention}";
		} while(file_exists(SYSTEM_WEBROOT . $path . $filename));
		$result['path'] .= $filename;
	$filename = WEB_ROOT . $path . $result['path'];
	if(!file_move($file['tmp_name'], $filename)) {
		return error(-1, '保存上传文件失败');
	}
	$result['success'] = true;
	return $result; 
}


      public function _mtype($_idArr)
    {
        if (empty($_idArr)) {
            return $this->typeArr;
        } else {
            $return = array();
            foreach ($_idArr as $v) {
                $return[$v] = $this->typeArr[$v];
            }
        }
        return $return;
    }
			public function toimage($image) {
				
				return WEBSITE_ROOT.'attachment/'.$image;
			}
			
				public function iunserializer($value) {
	if (empty($value)) {
		return '';
	}

	$result = unserialize($value);
	if ($result === false) {
		$temp = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $value);
		return unserialize($temp);
	}
	return $result;
}
	public function do_page()
	{

			$this->__web(__FUNCTION__);
	}
	public function ajaxmessage($msg, $redirect = '', $type = '')
    {
            $vars = array();
            if ($type == 'success') {
                $vars['errno'] = 0;
            } else {
                $vars['errno'] = -1;
            }
            $vars['error'] = $msg;
            $vars['url'] = $redirect;
            die(json_encode($vars));
  
    }
	public function do_scene_page()
	{

			$this->__web(__FUNCTION__);
	}
	public function do_scene()
	{

			$this->__web(__FUNCTION__);
	}
		public function do_subscribe()
	{

			$this->__web(__FUNCTION__);
	}
		public function do_scenepage()
	{

			$this->__web(__FUNCTION__);
	}
}