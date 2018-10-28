/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.5.19 : Database - cms_oscms
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cms_oscms` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cms_oscms`;

/*Table structure for table `os_plug_login` */

DROP TABLE IF EXISTS `os_plug_login`;

CREATE TABLE `os_plug_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '登录ID',
  `login_mid` int(11) DEFAULT NULL COMMENT '系统用户ID',
  `login_uid` text NOT NULL COMMENT '返回UID',
  `login_icon` varchar(220) NOT NULL COMMENT '用户图像',
  `login_name` varchar(64) NOT NULL COMMENT '用户昵称、姓名',
  `login_from` varchar(10) NOT NULL COMMENT '用户来源',
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='插件列表';

/*Data for the table `os_plug_login` */

insert  into `os_plug_login`(`login_id`,`login_mid`,`login_uid`,`login_icon`,`login_name`,`login_from`) values (26,2,'839089251065090053','http://pbs.twimg.com/profile_images/847006207319584768/C3JH-PpG_normal.jpg','肖品','Twitter'),(27,2,'117749748751823','https://fb-s-d-a.akamaihd.net/h-ak-fbx/v/t1.0-1/p50x50/17361591_139563493237115_5583610607730786909_n.jpg?oh=fbf330c7334b47dae1f64f01706de42d&oe=5A06A7DE&__gda__=1509057513_a6d0d3ff3bafb2af7b3a5e0ea1fa978c','肖品','Facebook');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
