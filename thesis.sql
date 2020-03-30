/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : thesis

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-02-15 19:02:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_board`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_board`;
CREATE TABLE `tbl_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_board
-- ----------------------------
INSERT INTO `tbl_board` VALUES ('2', 'คณะศิลปะ', '2020-02-15', null);

-- ----------------------------
-- Table structure for `tbl_branch`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `subject_id` int(11) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_branch
-- ----------------------------
INSERT INTO `tbl_branch` VALUES ('2', 'ศิลปะการอาชีพ1', '2', '2', '2020-02-15', null);

-- ----------------------------
-- Table structure for `tbl_subject`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `board_id` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_subject
-- ----------------------------
INSERT INTO `tbl_subject` VALUES ('2', 'ศิลปะ1', '2', '2020-02-15', null);

-- ----------------------------
-- Table structure for `tbl_thesis`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_thesis`;
CREATE TABLE `tbl_thesis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 DEFAULT NULL,
  `composer` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `board` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `subject` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `branch` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `year` varchar(255) DEFAULT '',
  `keyword` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `file_name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_thesis
-- ----------------------------
INSERT INTO `tbl_thesis` VALUES ('2', 'ผบช.สตม.แถลงจับ ', 'ไม่รู้', '2', '2', '2', '2561', 'ผบตร111', 'thesis-1581768043.pdf', '2020-02-15', null);

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_admin` varchar(255) DEFAULT '' COMMENT '1// admin 2// superadmin 3//administrator',
  `code_student` varchar(255) DEFAULT NULL,
  `board` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT '',
  `branch` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('2', 'jame0925623256@gmail.com', '0925623256', 'Nattaphon Kiattikul', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-13 21:23:14', '4', '001', '', '', '');
INSERT INTO `tbl_user` VALUES ('3', 'infinityp.soft@gmail.com', '0618096661', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-13 21:13:38', '3', '5706105384', 'บริหาร', 'bis', 'ระบบ');
INSERT INTO `tbl_user` VALUES ('4', 'test@gmail.com', '0877777887', 'เทสอย่าง มีระบบ', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-13 21:23:19', '2', '002', null, null, null);
INSERT INTO `tbl_user` VALUES ('9', 'mikiboy004@gmail.com', '0618096661', 'มิกิ  อาษาวงค์', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-14 15:10:46', '3', '570610336', '1', '1', '1');
