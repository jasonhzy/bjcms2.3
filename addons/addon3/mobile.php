<?php
defined('SYSTEM_IN') or exit('Access Denied');
class addon3Addons  extends BjModule {

	public function do_index() {
		$reply = mysqld_select("SELECT * FROM " . table("bigwheel_reply") . "  ORDER BY `id` DESC");
       $member=get_member_account(true,intval($reply['needreg'])==1);
			$openid = $member['openid'];
       $member=member_get($openid);
        if ($reply == false) {
            message('抱歉，活动已经结束，下次再来吧！', '', 'error');
        }

        
            $fansID = 0;
            $from_user = $openid;
            $fans = mysqld_select("SELECT * FROM " . table("bigwheel_fans") . " WHERE from_user='" . $from_user . "'");
            if ($fans == false) {
                $insert = array(
                    'fansID' => $fansID,
                    'from_user' => $from_user,
                    'todaynum' => 0,
                    'totalnum' => 0,
                    'awardnum' => 0,
                    'createtime' => time(),
                );
                $temp = mysqld_insert("bigwheel_fans", $insert);
                if ($temp == false) {
                    message('抱歉，刚才操作数据失败！', '', 'error');
                }
                //增加人数，和浏览次数
                mysqld_update("bigwheel_reply", array('fansnum' => $reply['fansnum'] + 1, 'viewnum' => $reply['viewnum'] + 1), array('id' => $reply['id']));
            } else {
                //增加浏览次数
                mysqld_update("bigwheel_reply", array('viewnum' => $reply['viewnum'] + 1), array('id' => $reply['id']));
            }
            //判断是否获奖
            //$award = mysqld_selectall("SELECT * FROM " . table('bigwheel_award') . " WHERE  from_user='" . $from_user . "' order by id desc");
           // if ($award != false) {
           //     $awardone = $award[0];
           // }
            $running = true;
            //判断是否可以刮刮
          //  if ($awardone && empty($fans['tel'])) {
           //     $running = false;
           //     $msg = '请先填写用户资料';
           // }

            //判断用户抽奖次数
            $nowtime = mktime(0, 0, 0);
            if ($fans['last_time'] < $nowtime) {
                $fans['todaynum'] = 0;
            }
            //判断总次数超过限制,一般情况不会到这里的，考虑特殊情况,回复提示文字msg，便于测试
            if ($running && $reply['starttime'] > time()) {
                $running = false;
                $msg = '活动还没有开始呢！';
            }
            //判断总次数超过限制,一般情况不会到这里的，考虑特殊情况,回复提示文字msg，便于测试
            if ($running && $reply['endtime'] < time()) {
                $running = false;
                $msg = '活动已经结束了，下次再来吧！';
            }
            //判断总次数超过限制,一般情况不会到这里的，考虑特殊情况,回复提示文字msg，便于测试
            if ($running && $fans['totalnum'] >= $reply['number_times'] && $reply['number_times'] > 0) {
                $running = false;
                $msg = '您已经超过抽奖总限制次数，无法抽奖了!';
            }
            //判断当日是否超过限制,一般情况不会到这里的，考虑特殊情况,回复提示文字msg，便于测试
            if ($running && $fans['todaynum'] >= $reply['most_num_times'] && $reply['most_num_times'] > 0) {
                $running = false;
                $msg = '您已经超过今天的抽奖次数，明天再来吧!';
            }
      

        $cArr = array('one', 'two', 'three', 'four', 'five', 'six');
        foreach ($cArr as $c) {
            if (empty($reply['c_type_' . $c]))
                break;
            $awardstr.='<p>' . $reply['c_type_' . $c] . '：' . $reply['c_name_' . $c];
            if ($reply['show_num'] == 1) {
                $awardstr.='  奖品数量： ' . intval($reply['c_num_' . $c] - $reply['c_draw_' . $c]);
            }
            $awardstr.='</p>';
        }
        if ($reply['most_num_times'] > 0 && $reply['number_times'] > 0) {
            $detail = '本次活动共可以转' . $reply['number_times'] . '次，每天可以转 ' . intval($reply['most_num_times']) . ' 次! 你共已经转了 <span id="totalcount">' . intval($fans['totalnum']) . '</span> 次 ，今天转了<span id="count">' . intval($fans['todaynum']). '</span> 次.';

            $Tcount = $reply['most_num_times'];
            $Lcount = $reply['most_num_times'] - $fans['todaynum'];
        } elseif ($reply['most_num_times'] > 0) {
            $detail = '本次活动每天可以转 ' . $reply['most_num_times'] . ' 次卡!你共已经转了 <span id="totalcount">' . intval($fans['totalnum']) . '</span> 次 ，今天转了<span id="count">' . intval($fans['todaynum']) . '</span> 次.';
            $Tcount = $reply['most_num_times'];
            $Lcount = $reply['most_num_times'] - $fans['todaynum'];
        } elseif ($reply['number_times'] > 0) {
            $detail = '本次活动共可以转' . $reply['number_times'] . '次卡!你共已经转了 <span id="totalcount">' . intval($fans['totalnum']) . '</span> 次。';
            $Tcount = $reply['number_times'];
            $Lcount = $reply['number_times'] - $fans['totalnum'];
        } else {
            $detail = '您很幸运，本次活动没有任何限制，您可以随意转!你共已经转了 <span id="totalcount">' . intval($fans['totalnum']) . '</span> 次。';
            $Tcount = 10000;
            $Lcount = 10000;
        }
        $detail.='<br/>' . htmlspecialchars_decode($reply['content']);
        if (empty($reply['sn_rename'])) {
            $reply['sn_rename'] = 'SN码';
        }
        if (empty($reply['tel_rename'])) {
            $reply['tel_rename'] = '手机号';
        }
        if (empty($reply['repeat_lottery_reply'])) {
            $reply['repeat_lottery_reply'] = '亲，继续努力哦！';
        }
        if (empty($fans['todaynum'])) {
            $fans['todaynum'] = 0;
        }
        if (empty($fans['totalnum'])) {
            $fans['totalnum'] = 0;
        }
		include addons_page('index');
	}

		public function do_gifts(){
	$reply = mysqld_select("SELECT * FROM " . table("bigwheel_reply") . "  ORDER BY `id` DESC");
       $member=get_member_account(true,intval($reply['needreg'])==1);
			$openid = $member['openid'];
			$from_user=$openid ;
       $member=member_get($openid);
		$gifts = mysqld_selectall("SELECT * FROM ".table('bigwheel_award')."  WHERE  from_user='{$openid}'    ");
		
	
	
				include addons_page('gifts');
		}


 public function do_getaward() {
        global $_GP;
	$reply = mysqld_select("SELECT * FROM " . table("bigwheel_reply") . "  ORDER BY `id` DESC");
       $member=get_member_account(true,intval($reply['needreg'])==1);
			$openid = $member['openid'];
			$from_user=$openid ;
        if ($reply == false) {
             $this->message();
        }

        if($reply['isshow'] != 1){
           //活动已经暂停,请稍后...
             $this->message(array("success"=>2, "msg"=>'活动暂停，请稍后...'),"");
        }

        if ($reply['starttime'] > time()) {
            $this->message(array("success"=>2, "msg"=>'活动还没有开始呢，请等待...'),"");
        }

        $endtime = $reply['endtime'] + 68399;
        if ($endtime < time()) {
            $this->message(array("success"=>2, "msg"=>'活动已经结束了，下次再来吧！'),"");
        }


        $fansID = 0;
        //第一步，判断有没有已经领取奖品了，如果领取了，则不能再领取了
        $fans = mysqld_select("SELECT * FROM " . table("bigwheel_fans") . " WHERE  from_user='" . $openid . "'");
        if ($fans == false) {
            //不存在false的情况，如果是false，则表明是非法
            //$this->message();
             $fans = array(
                    'fansID' => $fansID,
                    'from_user' => $openid,
                    'todaynum' => 0,
                    'totalnum' => 0,
                    'awardnum' => 0,
                    'createtime' => time(),
                );
                mysqld_insert("bigwheel_fans", $fans);
                $fans['id'] = mysqld_insertid();
                
        }
    
        //更新当日次数
        $nowtime = mktime(0, 0, 0);
        if ($fans['last_time'] < $nowtime) {
            $fans['todaynum'] = 0;
        }
        //判断总次数超过限制,一般情况不会到这里的，考虑特殊情况,回复提示文字msg，便于测试
        if ($fans['totalnum'] >= $reply['number_times'] && $reply['number_times'] > 0) {
           // $this->message('', '超过抽奖总限制次数');
           $this->message(array("success"=>2, "msg"=>'您超过抽奖总次数了，不能抽奖了!'),"");
        }
        //判断当日是否超过限制,一般情况不会到这里的，考虑特殊情况,回复提示文字msg，便于测试
        if ($fans['todaynum'] >= $reply['most_num_times'] && $reply['most_num_times'] > 0) {
            //$this->message('', '超过当日限制次数');
             $this->message(array("success"=>2, "msg"=>'您超过当日抽奖次数了，不能抽奖了!'),"");
        }
        
        $last_time = strtotime( date("Y-m-d",mktime(0,0,0)));
        //当天抽奖次数
        mysqld_update('bigwheel_fans', array('todaynum' => $fans['todaynum'] + 1,'last_time'=>$last_time), array('id' => $fans['id']));
        //总抽奖次数
        mysqld_update('bigwheel_fans', array('totalnum' => $fans['totalnum'] + 1), array('id' => $fans['id']));
        
        $gifts = 
                array(
                    "one"=>array("name"=>$reply['c_name_one'], "type"=>$reply['c_type_one'], "probalilty"=>$reply['c_rate_one'],"total"=>$reply['c_num_one'],"draw"=>$reply['c_draw_one']),
                    "two"=>array("name"=>$reply['c_name_two'],"type"=>$reply['c_type_two'], "probalilty"=>$reply['c_rate_two'],"total"=>$reply['c_num_two'],"draw"=>$reply['c_draw_two']),
                    "three"=>array("name"=>$reply['c_name_three'],"type"=>$reply['c_type_three'], "probalilty"=>$reply['c_rate_three'],"total"=>$reply['c_num_three'],"draw"=>$reply['c_draw_three']),
                    "four"=>array("name"=>$reply['c_name_four'],"type"=>$reply['c_type_four'], "probalilty"=>$reply['c_rate_four'],"total"=>$reply['c_num_four'],"draw"=>$reply['c_draw_four']),
                    "five"=>array("name"=>$reply['c_name_five'],"type"=>$reply['c_type_five'], "probalilty"=>$reply['c_rate_five'],"total"=>$reply['c_num_five'],"draw"=>$reply['c_draw_five']),
                    "six"=>array("name"=>$reply['c_name_six'],"type"=>$reply['c_type_six'], "probalilty"=>$reply['c_rate_six'],"total"=>$reply['c_num_six'],"draw"=>$reply['c_draw_six']),
        ) ;
        
     
        
         //计算每个礼物的概率
        $probability = 0;
        $rate = 1;
   
        $award = array();
        $awards= array(); //奖品名字 (同时可中多个奖品，然后随机派奖)
        foreach ($gifts as $name=>$gift) {
            if( $gift['total'] - $gift['draw']<=0){
                continue;
            }
            if (empty($gift['probalilty'])) {
                continue;
            }
            $probability = $gift['probalilty'];
            if ($probability< 1) {
                $temp = explode('.', $probability);
                $temp = pow(10, strlen($temp[1]));
                $rate = $temp < $rate ? $rate : $temp;
                $probability = $probability * $rate;
            }
            $award[] = array('prizetype'=>$name, 'name' => $gift['name'], 'probalilty' => $probability, 'total'=>$gift['total']);
          
        }

        
        $all = 100 * $rate;
         
        mt_srand((double) microtime() * 1000000);
        $rand = mt_rand(1, $all);
       
        foreach ($award as $gift) {
             if ($rand > 0 && $rand <= $gift['probalilty'] && $gift['total']>0) {
                    $awards[] =$gift['prizetype'];
                }
        }
        
        $prizetype = "";
        $awardtype = "";
        $awardname = "";
        if(count($awards)>0){
           mt_srand((double) microtime() * 1000000);
           $randid = mt_rand(0, count($awards)-1);
           $prizetype = $awards[$randid];
           $awardtype = $gifts[$prizetype]['type'];
           $awardname = $gifts[$prizetype]['name'];
        }
        
        if(!empty($prizetype) && (!empty($reply['award_times'])&&$fans['awardnum']<$reply['award_times'])||empty($reply['award_times'])){
            //中奖
            
            $sn = random(16);
             mysqld_update('bigwheel_reply', array('c_draw_' . $prizetype => $reply['c_draw_' . $prizetype] + 1), array('id' => $reply['id']));
                //保存sn到award中
              $insert = array(
                    'fansID' => $fansID,
                    'from_user' => $from_user,
                    'name' => $awardtype,
                    'description' => $awardname,
                    'prizetype' => $prizetype,
                    'award_sn' => $sn,
                    'createtime' => time(),
                    'status' => 1,
                );
                $temp = mysqld_insert('bigwheel_award', $insert);
                //保存中奖人信息到fans中
                mysqld_update('bigwheel_fans', array('awardnum' => $fans['awardnum'] + 1), array('id' => $fans['id']));
                $k = 0;
                if($prizetype=='one'){
                    $k=1;
                }else if($prizetype=='two'){
                    $k=2;
                }if($prizetype=='three'){
                    $k=3;
                }if($prizetype=='four'){
                    $k=4;
                }if($prizetype=='five'){
                    $k=5;
                }if($prizetype=='six'){
                    $k=6;
                }
                
                $data = array(
                    'name' => $reply['c_type_' . $prizetype],
                    'award' => $reply['c_name_' . $prizetype],
                    'sn' => $sn,
                    'success' => 1,
                    'prizetype' =>$k,
                );
                $this->message($data);
        }
        
        
        $this->message();
    }

    //json
    public function message($_data = '', $_msg = '') {
        if (!empty($_data['succes']) && $_data['success'] != 2) {
            $this->setfans();
        }
        if (empty($_data)) {
            $_data = array(
                'name' => "谢谢参与",
                'success' => 0,
            );
        }
        if (!empty($_msg)) {
            $_data['msg'] = $_msg;
        }
        die(json_encode($_data));
    }




}


