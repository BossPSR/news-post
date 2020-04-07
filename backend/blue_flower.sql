/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : blue_flower

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-04 15:07:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_session`
-- ----------------------------
DROP TABLE IF EXISTS `tb_session`;
CREATE TABLE `tb_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `note` varchar(100) DEFAULT 'เข้าสู่ระบบ',
  `createdDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_session
-- ----------------------------
INSERT INTO `tb_session` VALUES ('1', '1', 'เข้าสู่ระบบ', '2019-12-04 05:50:15');
INSERT INTO `tb_session` VALUES ('2', '1', 'เข้าสู่ระบบ', '2019-12-04 05:59:18');
INSERT INTO `tb_session` VALUES ('3', '1', 'เข้าสู่ระบบ', '2019-12-04 08:08:09');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `frist_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `createdDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'yupared15', 'e10adc3949ba59abbe56e057f20f883e', 'ยุพเรส', 'วงค์ตา', '2019-11-28 09:26:09');
