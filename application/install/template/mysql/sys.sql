

DROP TABLE IF EXISTS `{~dbprefix~}sys_captcha`;

CREATE TABLE `{~dbprefix~}sys_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL DEFAULT '0',
  `send_name` varchar(32) NOT NULL DEFAULT '' COMMENT '发送名称',
  `send_word` varchar(16) NOT NULL DEFAULT '' COMMENT '验证码',
  `send_num` tinyint(11) NOT NULL DEFAULT '0' COMMENT '使用次数',
  `ip_address` varchar(16) NOT NULL DEFAULT '' COMMENT 'IP地址',
  PRIMARY KEY (`captcha_id`),
  KEY `captcha_time` (`captcha_time`),
  KEY `send_word` (`send_word`),
  KEY `send_num` (`send_num`),
  KEY `ip_address` (`ip_address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='验证码';





DROP TABLE IF EXISTS `{~dbprefix~}sys_language`;

CREATE TABLE `{~dbprefix~}sys_language` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '语言列表',
  `lang_sign` varchar(8) NOT NULL DEFAULT '' COMMENT '语言标识',
  `lang_name` varchar(32) NOT NULL DEFAULT '' COMMENT '语言名称',
  `lang_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '默认 0否 1是',
  `lang_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '启用 0否 1是',
  PRIMARY KEY (`lang_id`),
  KEY `lang_sign` (`lang_sign`),
  KEY `lang_name` (`lang_name`),
  KEY `lang_default` (`lang_default`,`lang_enable`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='语言列表';

insert  into `{~dbprefix~}sys_language`(`lang_id`,`lang_sign`,`lang_name`,`lang_default`,`lang_enable`) values (1,'cn','简体',1,1),(2,'en','English',0,1);



DROP TABLE IF EXISTS `{~dbprefix~}sys_option`;

CREATE TABLE `{~dbprefix~}sys_option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限项',
  `option_pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级',
  `option_name` varchar(32) NOT NULL DEFAULT '' COMMENT '名称',
  `option_folder` varchar(32) NOT NULL DEFAULT '' COMMENT '文件夹名',
  `option_value` varchar(64) NOT NULL DEFAULT '' COMMENT '访问链接',
  `option_desc` varchar(128) NOT NULL DEFAULT '' COMMENT '描述',
  `option_sort` int(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `option_ismenu` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单 0否 1是',
  `option_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统 0否 1是',
  PRIMARY KEY (`option_id`),
  KEY `option_pid` (`option_pid`),
  KEY `option_name` (`option_name`),
  KEY `option_ismenu` (`option_ismenu`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='权限项';

insert  into `{~dbprefix~}sys_option`(`option_id`,`option_pid`,`option_name`,`option_folder`,`option_value`,`option_desc`,`option_sort`,`option_ismenu`,`option_system`) values (1,0,'系统管理','system','welcome','用户列表、用户角色、用户权限等管理！',100,1,1),(2,1,'用户设置','system','sys_nav1','',110,1,1),(4,2,'权限列表','','sys_option','',111,1,1),(5,2,'用户角色','','sys_role','',112,1,1),(6,2,'用户列表','','sys_admin','',113,1,1),(7,2,'修改资料','system','sys_profile','',114,1,1),(3,1,'系统设置','','sys_nav2','',120,1,1),(8,3,'系统配置','','sys_setting','',121,1,1),(9,3,'语言列表','','sys_language','',122,1,1),(10,3,'更新缓存','','sys_cache','',123,1,1),(11,0,'CMS管理','website','welcome','网站栏目、栏目内容、文章内容、评论管理等！',200,1,1),(13,11,'网站管理','','cms_nav1','',210,1,1),(16,13,'站点配置','','cms_setting','',211,1,1),(17,13,'菜单管理','','cms_menu','',213,1,1),(18,13,'文章管理','','cms_article','',214,1,1),(19,13,'评论管理','website','cms_comment','',215,1,1),(20,13,'更新缓存','','cms_cache','',216,1,1),(14,11,'模板管理','','cms_nav2','',220,1,1),(21,14,'模块列表','','cms_block','',221,1,1),(22,14,'标签列表','','cms_label/index/tag_list','',222,1,1),(23,14,'友情链接','','cms_label/index/friend_link','',223,1,1),(24,14,'幻灯片列表','','cms_label/index/banner_slide','',224,1,1),(25,14,'Banner图片','','cms_label/index/banner_img','',225,1,1),(15,11,'表单管理','','cms_nav3','',230,1,1),(26,15,'在线留言','','cms_message','',231,1,1),(27,15,'会员中心','website','mem_member','',232,1,1),(28,0,'插件管理','plugin','welcome','',300,1,1),(29,28,'验证配置','plugin','tp_nav1','',310,1,1),(30,29,'阿里云短信','plugin','caliyunsms','',311,1,1),(31,28,'快捷登录','plugin','tp_nav2','',320,1,1),(32,31,'facebook登录','plugin','plug_login/index/fb_login','',321,1,1),(33,31,'twitter登录','plugin','plug_login/index/tw_login','',322,1,1);



DROP TABLE IF EXISTS `{~dbprefix~}sys_role`;

CREATE TABLE `{~dbprefix~}sys_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户角色',
  `role_name` varchar(32) NOT NULL DEFAULT '' COMMENT '名称',
  `role_option` text COMMENT '权限',
  `role_remark` varchar(255) NOT NULL COMMENT '备注',
  `role_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0默认 1系统',
  PRIMARY KEY (`role_id`),
  KEY `role_system` (`role_system`),
  KEY `role_name` (`role_name`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户角色';

insert  into `{~dbprefix~}sys_role`(`role_id`,`role_name`,`role_option`,`role_remark`,`role_system`) values (1,'超级管理员','{\"4\":[\"4\",\"33\",\"16\",\"17\",\"18\",\"19\"],\"23\":[\"23\",\"1\",\"5\",\"6\",\"7\",\"8\",\"35\",\"9\",\"2\",\"10\",\"11\",\"12\",\"13\",\"14\",\"3\",\"15\",\"32\"]}','',1);



DROP TABLE IF EXISTS `{~dbprefix~}sys_setting`;

CREATE TABLE `{~dbprefix~}sys_setting` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'SYS配置列表',
  `set_sign` varchar(64) NOT NULL DEFAULT '' COMMENT '标识',
  `set_type` varchar(32) NOT NULL DEFAULT 'text' COMMENT '类型 boolean image text html',
  `set_name` varchar(32) NOT NULL DEFAULT '' COMMENT '名称',
  `set_value` text COMMENT '数据',
  `set_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统 0否 1是',
  PRIMARY KEY (`set_id`),
  KEY `set_sign` (`set_sign`),
  KEY `set_type` (`set_type`),
  KEY `set_system` (`set_system`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='sys设置';

insert  into `{~dbprefix~}sys_setting`(`set_id`,`set_sign`,`set_type`,`set_name`,`set_value`,`set_system`) values (1,'backend_theme','text','后台主题','default',1),(2,'backend_name','text','后台名称','{\"cn\":\"{$backend_name}\",\"en\":\"{$backend_name}\"}',1),(3,'backend_title','text','后台标题','{\"cn\":\"{$backend_title}\",\"en\":\"{$backend_title}\"}',1),(4,'backend_logo','image','后台LOGO','{\"cn\":\"\",\"en\":\"\"}',1);



DROP TABLE IF EXISTS `{~dbprefix~}sys_admin`;

CREATE TABLE `{~dbprefix~}sys_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户列表',
  `admin_login` varchar(32) NOT NULL COMMENT '用户名',
  `admin_password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `admin_roleid` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
  `admin_name` varchar(16) NOT NULL DEFAULT '' COMMENT '姓名',
  `admin_phone` varchar(16) NOT NULL DEFAULT '' COMMENT '手机',
  `admin_sex` varchar(16) NOT NULL DEFAULT '' COMMENT '性别',
  `admin_birth` varchar(16) NOT NULL DEFAULT '' COMMENT '生日',
  `admin_email` varchar(32) NOT NULL DEFAULT '' COMMENT '电邮',
  `admin_address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `admin_work` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0离职 1在职',
  PRIMARY KEY (`admin_id`),
  KEY `manager_phone` (`admin_phone`),
  KEY `manager_roleid` (`admin_roleid`,`admin_work`),
  KEY `manager_name` (`admin_name`),
  KEY `manager_work` (`admin_work`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户列表';

insert  into `{~dbprefix~}sys_admin`(`admin_id`,`admin_login`,`admin_password`,`admin_roleid`,`admin_name`,`admin_phone`,`admin_sex`,`admin_birth`,`admin_email`,`admin_address`,`admin_work`) values (1,'{$admin_login}','{$admin_password}',1,'{$admin_name}','','','','','',1);

