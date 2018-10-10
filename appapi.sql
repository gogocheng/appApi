/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : appapi

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-10 11:25:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ag_app_user
-- ----------------------------
DROP TABLE IF EXISTS `ag_app_user`;
CREATE TABLE `ag_app_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `token` varchar(100) NOT NULL DEFAULT '' COMMENT 'token',
  `time_out` int(11) NOT NULL DEFAULT '0' COMMENT 'token过期时间',
  `role` enum('USER','SUPER_MANAGER','MANAGER') NOT NULL DEFAULT 'USER',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：无效      1：有效',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `roole` enum('USER','SUPER_MANAGER','MANAGER') NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`id`),
  KEY `phone` (`phone`),
  KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='app_user表';

-- ----------------------------
-- Records of ag_app_user
-- ----------------------------
INSERT INTO `ag_app_user` VALUES ('18', '张玉哼', '', '15613171561', '81f187bca11c65554e1c10dc20efd09e0b7e853f', '1535450417', 'USER', '1', '0000-00-00 00:00:00', '2018-08-08 17:41:45', 'USER');
INSERT INTO `ag_app_user` VALUES ('19', '用户16675386796', '', '16675386796', 'd6340c0944aa3521d50c148f1915e1352cfd4d38', '1531706228', 'USER', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'USER');
INSERT INTO `ag_app_user` VALUES ('20', '李四', '21adfb8ef5f5c278ec57352674bad2a2', '18316858996', 'a688b159155ecf728f96458da55dd8d98b34246d', '1535449182', 'USER', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'USER');
INSERT INTO `ag_app_user` VALUES ('21', '张三坊', '21adfb8ef5f5c278ec57352674bad2a2', '18676789462', '6e2825b0da55859fba3c15cb770adc4c34c53b7c', '1535941748', 'USER', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'USER');
INSERT INTO `ag_app_user` VALUES ('23', '用户13006678467', '', '13006678467', 'b0d652cfb52e5421768403f64876171dcc482cc7', '1535335886', 'USER', '1', '2018-07-19 20:03:32', '0000-00-00 00:00:00', 'USER');
INSERT INTO `ag_app_user` VALUES ('24', '用户18081099989', '', '18081099989', '5493ae284181c6347ba40cf2e405a4f3aa0bf666', '1534217070', 'USER', '1', '2018-08-07 11:24:30', '0000-00-00 00:00:00', 'USER');
INSERT INTO `ag_app_user` VALUES ('25', '李白清', '21adfb8ef5f5c278ec57352674bad2a2', '15673260241', 'a0257c5d3659b99e5bdad3f9acf63e124a9140d6', '1535940679', 'USER', '1', '2018-08-07 16:53:32', '2018-08-08 10:50:52', 'USER');
INSERT INTO `ag_app_user` VALUES ('26', '用户15879242027', '', '15879242027', '752e5bc0e4cc01a57ad84fa16faaf74d4ea1c8e7', '1534300617', 'USER', '1', '2018-08-08 10:36:57', '0000-00-00 00:00:00', 'USER');
INSERT INTO `ag_app_user` VALUES ('27', '用户13858742888', '', '13858742888', '07a1454e61c2c7d26f964ad7e92286d720cfe3a5', '1535426646', 'USER', '1', '2018-08-21 11:24:06', '0000-00-00 00:00:00', 'USER');
INSERT INTO `ag_app_user` VALUES ('28', '用户15267017109', '', '15267017109', 'd2b5e39440e6d5e611b3ab68dea2fa517c0de16e', '1535593287', 'USER', '1', '2018-08-23 09:41:27', '0000-00-00 00:00:00', 'USER');
