<?php
defined('SYSTEM_IN') or exit('Access Denied');
defined('LOCK_TO_ADDONS_INSTALL') or exit('Access Denied');
$sql = "
	CREATE TABLE `baijiacms_xc_zjp_award` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(50) NOT NULL COMMENT '奖品名称',
  `total` int(11) NOT NULL COMMENT '数量',
  `probalilty` varchar(5) NOT NULL COMMENT '概率单位%',
  `description` varchar(1000) NOT NULL default '' COMMENT '奖品图片',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `baijiacms_xc_zjp_reply` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `picture` varchar(1000) NOT NULL COMMENT '活动图片',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `rule` varchar(1000) NOT NULL COMMENT '规则',
  `periodlottery` smallint(10) unsigned NOT NULL default '1' COMMENT '0为无周期',
  `maxlottery` tinyint(3) unsigned NOT NULL COMMENT '最大抽奖数',
  `basenum` int(11) NOT NULL COMMENT '抓奖品消耗积分',
   `needreg` int(5) NOT NULL COMMENT '是否需要注册才能抓奖',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `baijiacms_xc_zjp_user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `open_id` varchar(50) NOT NULL COMMENT '用户唯一身份ID',
  `count` int(10) NOT NULL default '0',
  `points` int(10) NOT NULL default '0',
  `friendcount` int(10) NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL COMMENT '日期',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `baijiacms_xc_zjp_winner` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `award` varchar(100) NOT NULL default '' COMMENT '奖品名称',
  `gifturl` varchar(1000) NOT NULL default '' COMMENT '奖品图片',
  `description` varchar(1000) NOT NULL default '' COMMENT '奖品描述',
  `open_id` varchar(50) NOT NULL COMMENT '用户唯一身份ID',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0未领奖，1已领奖',
  `createtime` int(10) unsigned NOT NULL COMMENT '获奖日期',
  PRIMARY KEY  (`id`),
  KEY `idx_createtime_fromuser` (`createtime`,`open_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

delete from `baijiacms_modules` where `name`='addon2';
delete from `baijiacms_modules_menu` where `module`='addon2';
INSERT INTO `baijiacms_modules` (`icon`,`group`,`title`,`version`,`name`) VALUES ('icon-flag', 'addons', '抓奖品', '1.0', 'addon2');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon2&do=index', '活动设置', 'addon2');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon2&do=prizelist', '奖品列表', 'addon2');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon2&do=awardlist', '中奖名单', 'addon2');
";

mysqld_batch($sql);