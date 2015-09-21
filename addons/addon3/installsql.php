<?php
defined('SYSTEM_IN') or exit('Access Denied');
defined('LOCK_TO_ADDONS_INSTALL') or exit('Access Denied');
$sql = "
	CREATE TABLE IF NOT EXISTS `baijiacms_bigwheel_award` (
  `id` int(11)  AUTO_INCREMENT,
  `fansID` int(11) DEFAULT 0 ,
  `from_user` varchar(50) default 0 COMMENT '用户ID',
  `name` varchar(50) DEFAULT '' COMMENT '名称',
  `description` varchar(200) DEFAULT '' COMMENT '描述',
  `prizetype` varchar(10) DEFAULT '' COMMENT '类型',
  `award_sn` varchar(50) DEFAULT '' COMMENT 'SN',
  `createtime` int(10) DEFAULT 0 ,
  `consumetime` int(10) DEFAULT 0 ,
  `status` tinyint(4) DEFAULT 0 ,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `baijiacms_bigwheel_fans` (
  `id` int(11)  AUTO_INCREMENT,
  `fansID` int(11) DEFAULT 0 ,
  `from_user` varchar(50) DEFAULT '' COMMENT '用户ID',
  `tel` varchar(20) DEFAULT '' COMMENT '登记信息(手机等)',
  `todaynum` int(11) DEFAULT '0',
  `totalnum` int(11)DEFAULT '0' ,
  `awardnum` int(11) DEFAULT '0',
  `last_time` int(10) DEFAULT '0',
  `createtime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `baijiacms_bigwheel_reply` (
  `id` int(10) unsigned  AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `content` varchar(200) DEFAULT '',
  `start_picurl` varchar(200)  DEFAULT '',
  `isshow` tinyint(1) DEFAULT 0,
  `ticket_information` varchar(200) DEFAULT '',
  `starttime` int(10) DEFAULT 0,
  `endtime` int(10) DEFAULT 0,
  `repeat_lottery_reply` varchar(50) DEFAULT '',
  `end_theme` varchar(50) DEFAULT '',
  `end_instruction` varchar(200) DEFAULT '',
  `end_picurl` varchar(200) DEFAULT '',
  `c_type_one` varchar(20) DEFAULT '',
  `c_name_one` varchar(50) DEFAULT '',
  `c_num_one` int(11) DEFAULT 0,
  `c_draw_one` int(11) DEFAULT 0,
  `c_rate_one` double DEFAULT 0,
  `c_type_two` varchar(20) DEFAULT '',
  `c_name_two` varchar(50) DEFAULT '',
  `c_num_two` int(11) DEFAULT 0,
  `c_draw_two` int(11) DEFAULT '0',
  `c_rate_two` double DEFAULT 0,
  `c_type_three` varchar(20) DEFAULT '',
  `c_name_three` varchar(50) DEFAULT '',
  `c_num_three` int(11) DEFAULT '0',
  `c_draw_three` int(11) DEFAULT '0',
  `c_rate_three` double DEFAULT '0',
  `c_type_four` varchar(20) DEFAULT '',
  `c_name_four` varchar(50) DEFAULT '',
  `c_num_four` int(11) DEFAULT '0',
  `c_draw_four` int(11) DEFAULT '0',
  `c_rate_four` double DEFAULT '0',
  `c_type_five` varchar(20) DEFAULT '',
  `c_name_five` varchar(50) DEFAULT '',
  `c_num_five` int(11) DEFAULT '0',
  `c_draw_five` int(11) DEFAULT '0',
  `c_rate_five` double DEFAULT '0',
  `c_type_six` varchar(20) DEFAULT '',
  `c_name_six` varchar(50) DEFAULT '',
  `c_num_six` int(11) DEFAULT '0',
  `c_draw_six` int(10) DEFAULT '0',
  `c_rate_six` double DEFAULT '0',
  `total_num` int(11) DEFAULT 0 COMMENT '总获奖人数(自动加)',
  `probability` double DEFAULT 0,
  `award_times` int(11) DEFAULT '0',
  `number_times` int(11) DEFAULT '0',
  `most_num_times` int(11) DEFAULT '0',
  `sn_code` tinyint(4) DEFAULT '0',
  `sn_rename` varchar(20) DEFAULT '',
  `tel_rename` varchar(20) DEFAULT '',
  `copyright` varchar(20) DEFAULT '',
  `show_num` tinyint(2) DEFAULT 0,
  `viewnum` int(11) DEFAULT '0',
  `fansnum` int(11) DEFAULT '0',
  `createtime` int(10) DEFAULT 0,
  `share_title` varchar(200) DEFAULT '',
  `share_desc` varchar(300) DEFAULT '',
  `share_url` varchar(100) DEFAULT '',
  `share_txt` text NOT NULL,
  `needreg` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

delete from `baijiacms_modules` where `name`='addon3';
delete from `baijiacms_modules_menu` where `module`='addon3';
INSERT INTO `baijiacms_modules` (`icon`,`group`,`title`,`version`,`name`) VALUES ('icon-flag', 'addons', '大转盘', '1.0', 'addon3');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon3&do=index', '活动设置', 'addon3');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon3&do=awardlist', '中奖名单', 'addon3');
";

mysqld_batch($sql);