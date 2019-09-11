/*
Navicat MySQL Data Transfer

Source Server         : cs
Source Server Version : 80012
Source Host           : localhost:3306
Source Database       : 2nenle

Target Server Type    : MYSQL
Target Server Version : 80012
File Encoding         : 65001

Date: 2019-09-11 20:36:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ent_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `ent_admin_user`;
CREATE TABLE `ent_admin_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_login_ip` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_login_time` int(10) unsigned DEFAULT '0',
  `listorder` int(8) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`,`username`,`create_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ent_admin_user
-- ----------------------------
