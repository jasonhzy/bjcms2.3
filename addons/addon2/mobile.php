<?php
defined('SYSTEM_IN') or exit('Access Denied');
class addon2Addons  extends BjModule {
	public function do_index() {
	

		$xc_zjp = mysqld_select("SELECT * FROM ".table('xc_zjp_reply'));
			
			
			

		$title = $xc_zjp['title'];
		$xc_zjp['description']=str_replace("\r\n"," ",$xc_zjp['description']);
		


		include addons_page('index');
	}

	public function do_lottery() {
		$xc_zjp = mysqld_select("SELECT * FROM ".table('xc_zjp_reply'));
	
		$member=get_member_account(true,intval($xc_zjp['needreg'])==1);
			$openid = $member['openid'];
	$member=member_get($openid);
		
		$useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
		
		if (empty($xc_zjp)) {
			message('非法访问，请重新发送消息进入抽奖页面！');
		}
	
		$xc_zjp['description']=str_replace("\r\n"," ",$xc_zjp['description']);
		
		$title = $xc_zjp['title'];
		if($xc_zjp["periodlottery"]>0)
		{
		$total = mysqld_selectcolumn("SELECT COUNT(*) FROM ".table('xc_zjp_winner')." WHERE  open_id = '{$openid}' and TO_DAYS(NOW())-TO_DAYS(FROM_UNIXTIME(createtime))<= ".$xc_zjp["periodlottery"]);
		}else
		{
			$total = mysqld_selectcolumn("SELECT COUNT(*) FROM ".table('xc_zjp_winner')." WHERE  open_id = '{$openid}' ");
	
		}
		$isuser = mysqld_selectcolumn("SELECT COUNT(*) FROM ".table('xc_zjp_user')." WHERE  open_id = '{$openid}'  LIMIT 1 ");
		if (!$isuser){
			$xc_zjp_user=array(
				'count'=>0,
				'points'=>0,
				'open_id'=>$openid,
				'createtime'=>TIMESTAMP,
			);
			mysqld_insert('xc_zjp_user', $xc_zjp_user);
		}

	
		
		$myaward = mysqld_selectcolumn("SELECT * FROM ".table('xc_zjp_winner')." WHERE open_id = '{$openid}'  AND award <> ''  ORDER BY createtime DESC");
		$mycredit = mysqld_selectcolumn("SELECT SUM(description) FROM ".table('xc_zjp_winner')." WHERE open_id = '{$openid}'  AND award <> '' ");
		$mycredit = (!empty($mycredit)) ? $mycredit : '0';
		$allaward = mysqld_selectall("SELECT * FROM ".table('xc_zjp_award')."    ");

	
		
		
		$myuser=mysqld_select("SELECT id,points,count,friendcount FROM ".table('xc_zjp_user')." WHERE  open_id = '{$openid}' ");
		
		
	
			$friendcount=0;
				$arr_times=$this->get_today_times($total,$xc_zjp['maxlottery'],$friendcount);
		
			if(($arr_times['today_has']<=0)){
			if(empty($xc_zjp['basenum'])||(!empty($xc_zjp['basenum'])&&$xc_zjp['basenum']>$member['credit']))
			{
					$message = '抓奖机会已经用完,抽奖所需'.$xc_zjp['basenum'].'积分,您可用积分：'.$member['credit'];
			$nogg=1;
		}
			if((!empty($xc_zjp['basenum'])&&$xc_zjp['basenum']<$member['credit']))
			{
				if(empty($xc_zjp['maxlottery']))
				{
				
					$message = '抽奖每次将消耗'.$xc_zjp['basenum'].'积分,您可用积分：'.$member['credit'];
				}
				if(!empty($xc_zjp['maxlottery']))
				{
				
					$message = '今日免费抽奖次数已用完，继续抽奖每次将消耗'.$xc_zjp['basenum'].'积分,您还有可用积分：'.$member['credit'];
				}
			$nogg=1;
		}
	}
	
		include addons_page('lottery');
	}
	
		public function get_today_times($userhad,$maxlottery,$friedsend){
		$arr=array(
			'today_has'=>0
		);
		if($userhad>=($maxlottery+$friedsend)){
			$arr['today_has']=0;
			return $arr;
		}else
		{
			
			$arr['today_has']=($maxlottery+$friedsend)-$userhad;
		
					return $arr;
		}
	}
	public function do_setPhone() {
			
			return json_encode(array("result"=>'success'));
	
	}
			public function do_gifts(){
			 	$xc_zjp = mysqld_select("SELECT * FROM ".table('xc_zjp_reply'));
	
							$member=get_member_account(true,intval($xc_zjp['needreg'])==1);
			$openid = $member['openid'];
		$gifts = mysqld_selectall("SELECT * FROM ".table('xc_zjp_winner')."  WHERE  open_id='{$openid}'   and award <> '' ");
		
	
		$myuser=mysqld_select("SELECT * FROM ".table('xc_zjp_user')." WHERE  open_id = '{$openid}' ");
	
				include addons_page('gifts');
		}
	
	
	 
	public function do_getaward() {
			$xc_zjp = mysqld_select("SELECT * FROM ".table('xc_zjp_reply'));
	
			$member=get_member_account(true,intval($xc_zjp['needreg'])==1);
			$openid = $member['openid'];
		if (empty($openid)) {
			message('非法访问，请重新发送消息进入抽奖页面！');
		}
			$member=member_get($openid);
		
		if (empty($xc_zjp)) {
			message('非法访问，请重新发送消息进入抽奖页面！');
		}
		
		$result = array('status' => -1, 'message' => '');
		$total = mysqld_selectcolumn("SELECT COUNT(*) FROM ".table('xc_zjp_winner')." WHERE  open_id = '{$openid}' and TO_DAYS(NOW())-TO_DAYS(FROM_UNIXTIME(createtime))<= ".$xc_zjp["periodlottery"]);
		
		$myuser=mysqld_select("SELECT * FROM ".table('xc_zjp_user')." WHERE  open_id = '{$openid}' ");
	
			$friendcount=0;
	
		$arr_times=$this->get_today_times($total,$xc_zjp['maxlottery'],$friendcount);
		
	
					$result['useCount']=false;
					$useCredit=false;
					
					if($arr_times['today_has']<=0)
					{
						if(!empty($xc_zjp['basenum'])&&($xc_zjp['basenum']<$member['credit']))
						{
							$useCredit=true;
						}
					}
		if(($arr_times['today_has']<=0)){
			if(empty($xc_zjp['basenum'])||(!empty($xc_zjp['basenum'])&&$xc_zjp['basenum']>$member['credit']))
			{
			$result['nochance']=$arr_times['today_has'];
			$result['message'] = '抽奖机会已用完！';
			
			
						$vars = array();
		$vars['message'] = $result;
		$vars['redirect'] = refresh();
		$vars['type'] = 'ajax';
		
		exit(json_encode($vars));
			}
		}
	$result['surplusCount']=(($arr_times['today_has']-1)<0)?-1:$arr_times['today_has']-1;
	if(!empty($xc_zjp['basenum']))
	{
				$result['useCredit1']=$xc_zjp['basenum'];
			$result['surplusCredit1']=(($member['credit']-$xc_zjp['basenum'])<0)?0:($member['credit']-$xc_zjp['basenum']);
		}else
		{
				$result['useCredit1']=0;
			$result['surplusCredit1']=0;
			}
			$result['useCount']=true;
		$gifts = mysqld_selectall("SELECT * FROM ".table('xc_zjp_award')." WHERE  total>0 ORDER BY probalilty ASC");
		//计算每个礼物的概率
		$probability = 0;
		$rate = 1;
		$award = array();
		foreach ($gifts as $name => $gift){
			if (empty($gift['probalilty'])) {
				continue;
			}
			if ($gift['probalilty'] < 1) {
				$temp = explode('.', $gift['probalilty']);
				$temp = pow(10, strlen($temp[1]));
				$rate = $temp < $rate ? $rate : $temp;
			}
			$probability = $probability + $gift['probalilty'] * $rate;
			$award[] = array('id' => $gift['id'], 'probalilty' => $probability);
		}
		$all = 100 * $rate;
		if($probability < $all){
			$award[] = array('title' => '','probalilty' => $all);
		}
		mt_srand((double) microtime()*1000000);
		$rand = mt_rand(1, $all);
		foreach ($award as $key => $gift){
			if(isset($award[$key - 1])){
				if($rand > $award[$key -1]['probalilty'] && $rand <= $gift['probalilty']){
					$awardid = $gift['id'];
					break;
				}
			}else{
				if($rand > 0 && $rand <= $gift['probalilty']){
					$awardid = $gift['id'];
					break;
				}
			}
		}
		$title = '';
		$result['hasPrize']=false;
		$result['message'] = '很遗憾，您没能中奖！';
		$data = array(
			'open_id' => $openid,
			'status' =>0,
			'createtime' => TIMESTAMP,
		);
		$credit = array(
			'award' =>  (empty($awardid) ? '未' : ''). '中奖',
			'open_id' => $openid,
			'status' => 3,
			'description' => (empty($awardid) ? $xc_zjp['misscredit'] : $xc_zjp['hitcredit']),
			'createtime' => TIMESTAMP,
		);
		if (!empty($awardid)) {
			$gift = mysqld_select("SELECT * FROM ".table('xc_zjp_award')." WHERE id = '$awardid'");
			if ($gift['total'] > 0) {
				$data['award'] = $gift['title'];
					$result['gift']=$gift['title'];
					$result['giftimg']=$gift['description'];
					$result['hasPrize']=true;
					
			
					mysqld_query("UPDATE ".table('xc_zjp_award')." SET total = total - 1 WHERE  id = '$awardid'");
					$data['description'] = '' ;
							
				$result['message'] = '恭喜您，得到“'.$data['award'].'”！'.$desss ;
				$result['status'] = 0;
			} else {
				$credit['description'] = $xc_zjp['misscredit'];
				
			}
						$data['gifturl'] =$gift['description'];
						$data['description'] =$gift['title'];
		}
		
		if($useCredit)
		{
			member_credit($openid,intval($xc_zjp['basenum']),'usecredit','抓奖品消费积分');
				
		}


		if(empty(	$_SESSION['cachetime'])||$_SESSION['cachetime']<time())
		{
			$_SESSION['cachetime']=time()+3;	
		mysqld_insert('xc_zjp_winner', $data);
	}
		$result['myaward'] = mysqld_selectall("SELECT * FROM ".table('xc_zjp_winner')." WHERE open_id = '{$openid}'   AND award <> '' ORDER BY createtime DESC");
		$mycredit = mysqld_selectcolumn("SELECT SUM(description) FROM ".table('xc_zjp_winner')." WHERE open_id = '{$openid}'   AND award <> '' ");
		$result['credit'] = $mycredit;
		$result['credit'] = (!empty($result['credit'])) ? $result['credit'] : '0';
		
				$vars = array();
		$vars['message'] = $result;
		$vars['redirect'] = refresh();
		$vars['type'] = 'ajax';
		
		exit(json_encode($vars));
	}
	public function do_setStatus() {
		global $_GP;
	
		$data = array(
			'status' => 2,
		);
		mysqld_update('xc_zjp_winner', $data, array('id' => $_GP['awardid']));

		
						$vars = array();
		$vars['message'] = $data;
		$vars['redirect'] = refresh();
		$vars['type'] = 'ajax';
		
		exit(json_encode($vars));
	}
// 点击量统计
	public function do_ucount(){
		global $_GP;

		$effective= true ;
		$useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
	//	if(strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false ){
	//		$effective = false ;
	//	}
		

		$uid = intval($_GP['uid']);
		if (!$uid) {
			$effective = false ;
		}
		$url=create_url('mobile',array('name' => 'addon2','do' => 'index'));
		$replay = mysqld_select("SELECT * FROM ".table('xc_zjp_reply')." LIMIT 1");
		$user = mysqld_select("SELECT * FROM ".table('xc_zjp_user')." WHERE id = '{$uid}'   LIMIT 1");
		
		if($uid && $effective){
			//cookies不存在
			if(!isset($_COOKIE["hlxc_zjpvx".$id])){ 
				$data = array(
					'count' => $user['count'] +1,
					'friendcount'=> $user['friendcount'] +1,
				);
			$res=	mysqld_update('xc_zjp_user', $data,array('id' => $uid));	
			if($res==1)
			{
					setcookie('hlxc_zjpvx'.$id,1,time()+86400*20);
				}
			}
			
		} 
		
		
		die('<script>location.href = "'.$url.'";</script>');
		
	}	
	

	public function do_rule(){
				global $_GP;
						$xc_zjp = mysqld_select("SELECT * FROM ".table('xc_zjp_reply')."  LIMIT 1");
	
				$member=get_member_account(true,intval($xc_zjp['needreg'])==1);
			$openid = $member['openid'];
	
		
				$myuser=mysqld_select("SELECT id,points,count FROM ".table('xc_zjp_user')." WHERE  open_id = '{$openid}' ");
			include addons_page('rule');
		}
	
	
	


}


