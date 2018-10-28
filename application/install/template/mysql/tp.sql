

DROP TABLE IF EXISTS `{~dbprefix~}plug_login`;

CREATE TABLE `{~dbprefix~}plug_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '登录ID',
  `login_uid` int(11) NOT NULL COMMENT '返回UID',
  `login_icon` varchar(220) NOT NULL COMMENT '用户图像',
  `login_name` varchar(64) NOT NULL COMMENT '用户昵称、姓名',
  `login_from` varchar(10) NOT NULL COMMENT '用户来源',
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件列表';
