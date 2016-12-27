/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 5.5.40 : Database - think-blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`think-blog` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `think-blog`;

/*Table structure for table `hsblog_article_category` */

DROP TABLE IF EXISTS `hsblog_article_category`;

CREATE TABLE `hsblog_article_category` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `ac_name` varchar(64) DEFAULT NULL COMMENT '分类名',
  `ac_sort` tinyint(6) DEFAULT NULL COMMENT '分类排序',
  `ac_state` tinyint(4) DEFAULT '1' COMMENT '分类状态1正常显示0禁用',
  `ac_description` varchar(128) DEFAULT NULL COMMENT '分类描述',
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

/*Data for the table `hsblog_article_category` */

/*Table structure for table `hsblog_article_tag` */

DROP TABLE IF EXISTS `hsblog_article_tag`;

CREATE TABLE `hsblog_article_tag` (
  `at_article_id` int(11) DEFAULT NULL COMMENT '文章id一对多',
  `at_tag_id` int(11) DEFAULT NULL COMMENT '标签id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `hsblog_article_tag` */

/*Table structure for table `hsblog_articles` */

DROP TABLE IF EXISTS `hsblog_articles`;

CREATE TABLE `hsblog_articles` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `a_title` varchar(64) DEFAULT NULL COMMENT '文章标题',
  `a_author` varchar(64) DEFAULT 'haoshuai_it' COMMENT '文章作者',
  `a_content` mediumtext COMMENT '文章内容',
  `a_keywords` varchar(64) DEFAULT NULL COMMENT '文章关键字',
  `a_description` text COMMENT '文章描述',
  `a_img_url` varchar(256) DEFAULT NULL COMMENT '文章列表图片url',
  `a_is_top` tinyint(4) DEFAULT '0' COMMENT '是否置顶 1置顶 默认0',
  `a_is_original` tinyint(4) DEFAULT '1' COMMENT '是否原创 1是 0否 默认1',
  `a_is_comment` tinyint(4) DEFAULT '1' COMMENT '是否允许评论 1是 0否 默认1',
  `a_click_view` int(11) NOT NULL DEFAULT '0' COMMENT '文章点击数',
  `a_category_id` varchar(32) DEFAULT NULL COMMENT '分类id',
  `a_state` tinyint(4) DEFAULT '1' COMMENT '状态 1正常 0禁止显示 2放置回收站',
  `a_add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '文章发表时间',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `hsblog_articles` */

/*Table structure for table `hsblog_auth_group` */

DROP TABLE IF EXISTS `hsblog_auth_group`;

CREATE TABLE `hsblog_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正常，为0禁用',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则","隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户组表';

/*Data for the table `hsblog_auth_group` */

insert  into `hsblog_auth_group`(`id`,`title`,`status`,`rules`) values (1,'作者',1,''),(2,'管理员',0,''),(3,'普通用户',1,'1,2,3');

/*Table structure for table `hsblog_auth_group_access` */

DROP TABLE IF EXISTS `hsblog_auth_group_access`;

CREATE TABLE `hsblog_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

/*Data for the table `hsblog_auth_group_access` */

insert  into `hsblog_auth_group_access`(`uid`,`group_id`) values (1,3);

/*Table structure for table `hsblog_auth_rule` */

DROP TABLE IF EXISTS `hsblog_auth_rule`;

CREATE TABLE `hsblog_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model` varchar(32) DEFAULT NULL COMMENT '规则所属模块',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'type：tinyint类型的，如果type为1， condition字段就可以定义规则表达式。 如定义{score}>5 and {score}<100 表示用户的分数在5-100之间时这条规则才会通过。（默认为1）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正常，为0禁用',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证；当type为1时，condition字段里面的内容将会用作正则表达式的规则来配合认证规则来认证用户',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='规则表';

/*Data for the table `hsblog_auth_rule` */

insert  into `hsblog_auth_rule`(`id`,`model`,`name`,`title`,`type`,`status`,`condition`) values (1,NULL,'Admin/Article/Add','增加文章',1,1,''),(2,NULL,'Admin/Article/Edit','修改文章',1,1,''),(3,NULL,'Admin/Article/Delete','删除文章',1,1,''),(4,NULL,'Admin/User/Delete','删除用户',1,1,''),(5,NULL,'Admin/User/add','增加用户',1,1,''),(6,NULL,'Admin/User/edit','修改用户',1,1,''),(7,NULL,'Admin/User/test','测试发布',1,1,''),(8,NULL,'Admin/User/test2','测试修改',1,1,''),(9,NULL,'Admin/User/test3','测试删除',1,1,'');

/*Table structure for table `hsblog_member` */

DROP TABLE IF EXISTS `hsblog_member`;

CREATE TABLE `hsblog_member` (
  `m_id` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `m_name` varchar(64) DEFAULT NULL COMMENT '昵称',
  `m_account` varchar(128) DEFAULT NULL COMMENT '登陆账户名',
  `m_password` varchar(128) DEFAULT NULL COMMENT '用户密码',
  `m_phone` varchar(32) DEFAULT NULL COMMENT '用户手机',
  `m_email` varchar(128) DEFAULT NULL COMMENT '用户邮箱',
  `m_create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
  `m_user_status` tinyint(1) DEFAULT '1' COMMENT '用户状态，1正常 0禁用拉黑',
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `hsblog_member` */

insert  into `hsblog_member`(`m_id`,`m_name`,`m_account`,`m_password`,`m_phone`,`m_email`,`m_create_time`,`m_user_status`) values (1,'红色','xiaohopo','123456789','15275166395','123456789@qq.com','2016-11-07 11:20:49',1),(2,'测试2','ceshi2','12332145465','15278956696','123456789@qq.com','2016-11-07 11:39:53',1),(3,'我不是','wobushi','454665656546','15275166998','123456789@qq.com','2016-11-07 11:40:25',0);

/*Table structure for table `hsblog_tag` */

DROP TABLE IF EXISTS `hsblog_tag`;

CREATE TABLE `hsblog_tag` (
  `ht_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签id',
  `ht_name` varchar(64) DEFAULT NULL COMMENT '标签名',
  `ht_sort` tinyint(4) DEFAULT NULL COMMENT '标签排序',
  PRIMARY KEY (`ht_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `hsblog_tag` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
