<?php
defined('SYSTEM_IN') or exit('Access Denied');
class addon10Addons  extends BjModule {
	 public function do_map()
    {
        global $_GP;
        include addons_page('map');
    }
      public function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }
    public function getSignPackage($listid) {
		$configs=globaSetting(array("weixin_appId","shop_logo"));
  	$appid = $configs['weixin_appId'];
		$scene_list = mysqld_select('SELECT * FROM' . table('addon10_scene_list') . ' WHERE `id`=:id  ', array( ':id' => $listid));
      
				
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $jsapiTicket = $this->addon_get_js_ticket();
		
		
    $timestamp = time();
    $nonceStr = $this->createNonceStr();
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
 
    $signature = sha1($string);
    $title=$scene_list['share_title'];
    $imgUrl=WEBSITE_ROOT."attachment/".$scene_list['share_thumb'];
		$description=$scene_list['share_content'];
		if(empty($imgUrl))
		{
			$imgUrl=WEBSITE_ROOT."attachment/".$configs['shop_logo'];
		}
		if(empty($description))
		{
			$description=$configs['shop_title'];
		}
		if(empty($title))
		{
			$title=$configs['shop_title'];
		}
				
	 $signPackage = array(
      "appId"     => $appid,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "title"       => $title,
      "imgUrl"       => $imgUrl,
      "link"      => WEBSITE_ROOT.mobile_url('show', array('id' => $listid)),
      "signature" => $signature,
      "description" => $description,
      "rawString" => $string
    );
    return $signPackage; 
  }
    
   public function addon_get_js_ticket() {
 	$configs=globaSetting(array("jsapi_ticket","jsapi_ticket_exptime"));

		$jsapi_ticket=$configs['jsapi_ticket'];
		$jsapi_ticket_exptime = intval($configs['jsapi_ticket_exptime']);
		if(empty($jsapi_ticket)||empty($jsapi_ticket_exptime)||$jsapi_ticket_exptime< time()) {
			
			$accessToken = get_weixin_token();
    	 $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
     		$content = http_get($url);
      $res = @json_decode($content,true);
      $ticket = $res['ticket'];
      
      if (!empty($ticket)) {
      	$cfg = array(
						'jsapi_ticket' => $ticket,
						'jsapi_ticket_exptime' => time() + intval($res['expires_in'])
					);
					refreshSetting($cfg);
      	return $ticket;
      }
      return '';
			
			} else {
			return $jsapi_ticket;
			}
	}
	public function do_formsubmit()
	{global $_GP;
		$id=intval($_GP['id']);
		$insert=array(
    'list_id'=>$id,
    'str1'=>$_GP['str1'],
    'str2'=>$_GP['str2'],
    'str3'=>$_GP['str3'],
    'create_time'=>time()
);
if(!empty($_GP['iscomment']))
{
	$insert['str1']=$_GP['from'];
	$insert['str2']=$_GP['content'];
}
  
    $temp=mysqld_insert('addon10_scene_subscribe',$insert);
  
if($temp==false){
    $return=array(
        'data'=>200,
        'success'=>false,
        'message'=> iconv('gb2312','utf-8',iconv('gb2312','utf-8','提交失败'))
    );
    die(json_encode($return));

}else{
    $return=array(
        'data'=>200,
        'success'=>true,
        'message'=>iconv('gb2312','utf-8','提交成功')
    );
 
    if(!empty($_GP['iscomment']))
{
      $return = array('data' => array('id' => $id, 'date' => date('Y-m-d H:i:s')), 'success' => 1, 'message' => iconv('gb2312','utf-8','提交成功'));
    }
        
    die(json_encode($return));
}

			
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
		public function toimage($image) {
				
				return WEBSITE_ROOT.'attachment/'.$image;
			}
			public function do_show() {
					$this->__mobile(__FUNCTION__);
			}



}


