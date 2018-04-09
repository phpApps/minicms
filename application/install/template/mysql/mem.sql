
DROP TABLE IF EXISTS `{~dbprefix~}mem_member`;

CREATE TABLE IF NOT EXISTS `{~dbprefix~}mem_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员列表',
  `member_login` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `member_icon` varchar(220) DEFAULT NULL COMMENT '会员图像',
  `member_password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `member_name` varchar(32) NOT NULL DEFAULT '' COMMENT '姓名',
  `member_type` varchar(16) NOT NULL DEFAULT '' COMMENT '类型',
  `member_phone` varchar(16) NOT NULL DEFAULT '' COMMENT '手机',
  `member_email` varchar(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `member_qqnum` varchar(16) NOT NULL DEFAULT '' COMMENT 'QQ',
  `member_area` varchar(32) NOT NULL DEFAULT '' COMMENT '地区/国家',
  `member_city` varchar(64) NOT NULL DEFAULT '' COMMENT '城市',
  `member_remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `member_regtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `member_edittime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_login` (`member_login`),
  KEY `member_name` (`member_name`),
  KEY `member_phone` (`member_phone`),
  KEY `member_email` (`member_email`),
  KEY `member_regtime` (`member_regtime`,`member_edittime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='会员列表' AUTO_INCREMENT=2 ;

INSERT INTO `{~dbprefix~}mem_member` (`member_id`, `member_login`, `member_password`,`member_icon`,`member_name`, `member_type`, `member_phone`, `member_email`, `member_qqnum`, `member_area`, `member_city`, `member_remark`, `member_regtime`, `member_edittime`) VALUES
(1, '{$member_login}', '{$member_password}',NULL,'{$member_name}', '', '13266507567', '', '', '', '', '', '2016-10-25 19:07:30', '0000-00-00 00:00:00');
