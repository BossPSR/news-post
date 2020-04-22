/*
Navicat MySQL Data Transfer

Source Server         : cp486987_thesis
Source Server Version : 50643
Source Host           : 163.44.198.63:3306
Source Database       : cp486987_news

Target Server Type    : MYSQL
Target Server Version : 50643
File Encoding         : 65001

Date: 2020-04-21 16:56:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `Id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `create_times` datetime NOT NULL,
  `update_times` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES ('1', 'test', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'test@test.com', null, null, '1', '2020-04-07 14:20:56', '2020-04-07 14:20:59', null, null);

-- ----------------------------
-- Table structure for `tbl_advertise`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_advertise`;
CREATE TABLE `tbl_advertise` (
  `advertise_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) DEFAULT NULL COMMENT 'เลือกหัวข้อ / เรื่อง',
  `agenda` text COMMENT 'วาระการประชุม ',
  `company_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อบริษัท / ชื่อหน่วยงาน',
  `tax` varchar(100) DEFAULT NULL COMMENT 'เลขประจำตัวผู้เสียภาษี',
  `meeting` varchar(255) DEFAULT NULL COMMENT 'ครั้งที่ประชุม',
  `announcement_to` varchar(255) DEFAULT NULL COMMENT 'ประกาศถึง',
  `out_date` date DEFAULT NULL COMMENT 'วันที่ประกาศเลิกบริษัท',
  `meeting_date` date DEFAULT NULL COMMENT 'วันที่จัดประชุม',
  `meeting_time` varchar(100) DEFAULT NULL COMMENT 'เวลาจัดประชุม',
  `meeting_place` text COMMENT 'สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)',
  `stock_appove` varchar(100) DEFAULT NULL COMMENT 'อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)',
  `name_surname` varchar(255) DEFAULT NULL COMMENT 'ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)',
  `position` varchar(255) DEFAULT NULL COMMENT 'ตำแหน่งผู้ลงนาม',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(20) DEFAULT '0',
  `all_shares` varchar(100) DEFAULT NULL COMMENT 'หุ้นทั้งหมด',
  `dividend` varchar(100) DEFAULT NULL COMMENT 'เงินปันผลทั้งหมดคิดเป็นเงิน (ตัวเลข)',
  `reserve` varchar(100) DEFAULT NULL COMMENT 'ทุนสำรอง (ตัวเลข)',
  `dividend_payment` varchar(100) DEFAULT NULL COMMENT 'จ่ายเงินปันผลภายในวันที่',
  `post_date` date DEFAULT NULL COMMENT 'วันที่ลงโฆษณา',
  `id_user` varchar(50) DEFAULT NULL,
  `id_order` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  PRIMARY KEY (`advertise_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_advertise
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_contact`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE `tbl_contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `create_times` datetime NOT NULL,
  `update_times` datetime DEFAULT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_contact
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_contact_us`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_contact_us`;
CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `create_times` datetime NOT NULL,
  `update_times` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_contact_us
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_omise`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_omise`;
CREATE TABLE `tbl_omise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `id_taxs` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_omise
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_pdf`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pdf`;
CREATE TABLE `tbl_pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_order` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_pdf
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_post`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) DEFAULT NULL,
  `details` text,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_post
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_session`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_session`;
CREATE TABLE `tbl_session` (
  `Id_session` int(11) NOT NULL AUTO_INCREMENT,
  `Ip_address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `create_times` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_session
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_taxs` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT '0',
  `create_times` datetime NOT NULL,
  `update_times` datetime DEFAULT NULL,
  `time_forgot_password` varchar(255) DEFAULT NULL,
  `forgot_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('1', 'jame0925623256@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0503561005794', 'Infinity Phenomenal Software', '247/5 M.4\r\nNong Han, San Sai, Chiang Mai, 50290.', '10', '2020-04-07 15:14:52', '2020-04-20 14:31:57', null, null);
