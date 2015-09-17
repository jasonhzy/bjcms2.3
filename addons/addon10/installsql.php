<?php
defined('SYSTEM_IN') or exit('Access Denied');
defined('LOCK_TO_ADDONS_INSTALL') or exit('Access Denied');
$sql = "
CREATE TABLE IF NOT EXISTS  `baijiacms_addon10_scene_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `theme` varchar(50) NOT NULL,
  `iden` varchar(50) NOT NULL,
  `cover` varchar(300) NOT NULL,
  `cover_title` varchar(50) NOT NULL,
  `cover_subtitle` varchar(50) DEFAULT NULL,
  `cover1` varchar(300) NOT NULL,
  `cover2` varchar(300) NOT NULL,
  `thumb` varchar(300) NOT NULL,
  `share_title` varchar(200) NOT NULL DEFAULT '',
  `share_thumb` varchar(300) NOT NULL DEFAULT '',
  `share_content` varchar(1000) NOT NULL,
  `share_cb_url` varchar(500) NOT NULL,
  `share_cb_tel` varchar(20) NOT NULL,
  `diyurl` varchar(100) NOT NULL DEFAULT '',
  `share_cover` varchar(300) NOT NULL DEFAULT '',
  `share_url` varchar(300) NOT NULL DEFAULT '',
  `share_txt` varchar(500) NOT NULL DEFAULT '',
  `share_button` varchar(300) NOT NULL,
  `share_tips` varchar(300) NOT NULL,
  `reply_title` varchar(50) NOT NULL,
  `reply_thumb` varchar(300) NOT NULL,
  `reply_description` varchar(1000) NOT NULL,
  `isadvanced` int(3) NOT NULL DEFAULT '0',
  `advanced_thumb` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL DEFAULT '',
  `emailtitle` varchar(100) NOT NULL,
  `first_type` tinyint(2) NOT NULL,
  `first_btn_select` varchar(10) NOT NULL,
  `first_btn_value` varchar(500) NOT NULL,
  `bg_music_switch` tinyint(4) NOT NULL,
  `bg_music_icon` tinyint(4) NOT NULL,
  `bg_music_url` varchar(300) NOT NULL,
  `hits` int(10) NOT NULL,
  `tongji` varchar(1000) NOT NULL,
  `isyuyue` tinyint(1) NOT NULL DEFAULT '0',
  `iscomment` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  `baijiacms_addon10_scene_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL DEFAULT '0',
  `listorder` int(11) NOT NULL,
  `m_type` tinyint(4) NOT NULL,
  `thumb` varchar(300) NOT NULL,
  `param` text NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=359 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_addon10_scene_subscribe` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `str1` varchar(200) NOT NULL DEFAULT '',
  `str2` varchar(200) NOT NULL DEFAULT '',
  `str3` varchar(200) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

delete from `baijiacms_modules` where `name`='addon10';
delete from `baijiacms_modules_menu` where `module`='addon10';
INSERT INTO `baijiacms_modules` (`icon`,`group`,`title`,`version`,`name`) VALUES ('icon-columns', 'addons', '微画报', '1.0', 'addon10');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon10&do=scene', '画报管理', 'addon10');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon10&do=subscribe', '预约管理', 'addon10');
";

mysqld_batch($sql);