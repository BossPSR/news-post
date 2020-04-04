/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : eproject

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-10 19:01:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `account`
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `Account_id` int(11) NOT NULL AUTO_INCREMENT,
  `Department_id` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fname` varchar(128) DEFAULT NULL,
  `Lname` varchar(128) DEFAULT NULL,
  `Tel` decimal(10,0) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Director` char(1) NOT NULL,
  `Manager` char(1) NOT NULL,
  `Supervisor` char(1) NOT NULL,
  `Supplies` char(1) NOT NULL,
  `Responsible` char(1) NOT NULL,
  `Admin` char(1) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('4', '3,2', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'ผู้ดูแลระบบ', 'แอดมิน', null, 'admin@example.com', '0', '0', '0', '0', '1', '1', '2020-03-10 14:27:49');

-- ----------------------------
-- Table structure for `benefit`
-- ----------------------------
DROP TABLE IF EXISTS `benefit`;
CREATE TABLE `benefit` (
  `Benefit_id` int(11) NOT NULL AUTO_INCREMENT,
  `Project_id` int(11) NOT NULL,
  `Benefit_name` varchar(128) NOT NULL,
  PRIMARY KEY (`Benefit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of benefit
-- ----------------------------

-- ----------------------------
-- Table structure for `charges_main`
-- ----------------------------
DROP TABLE IF EXISTS `charges_main`;
CREATE TABLE `charges_main` (
  `Charges_Main_id` int(11) NOT NULL AUTO_INCREMENT,
  `Charges_Main` varchar(128) NOT NULL,
  `Project_id` int(11) NOT NULL,
  PRIMARY KEY (`Charges_Main_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of charges_main
-- ----------------------------

-- ----------------------------
-- Table structure for `charges_sub`
-- ----------------------------
DROP TABLE IF EXISTS `charges_sub`;
CREATE TABLE `charges_sub` (
  `Charges_Sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `Charges_Sub` decimal(10,2) NOT NULL,
  `Quarter_one` varchar(128) NOT NULL,
  `Quarter_two` varchar(128) NOT NULL,
  `Quarter_three` varchar(128) NOT NULL,
  `Quarter_four` varchar(128) NOT NULL,
  `Charges_Main_id` int(11) NOT NULL,
  PRIMARY KEY (`Charges_Sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of charges_sub
-- ----------------------------

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `Comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `Project_id` int(11) NOT NULL,
  `Account_id` int(11) NOT NULL,
  `Comment` blob NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `Department_id` int(11) NOT NULL AUTO_INCREMENT,
  `Department` varchar(100) NOT NULL,
  PRIMARY KEY (`Department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'สำนักงานผู้อำนวยการ');
INSERT INTO `department` VALUES ('2', 'ฝ่ายพัฒนาระบบสารสนเทศ');
INSERT INTO `department` VALUES ('3', 'ฝ่ายวิศวกรรมระบบเครือข่าย');
INSERT INTO `department` VALUES ('4', 'ฝ่ายบริการวิชาการและส่งเสริมการวิจัย');
INSERT INTO `department` VALUES ('5', 'ฝ่ายเทคโนโลยีสารสนเทศ วิทยาเขตปราจีนบุรี');
INSERT INTO `department` VALUES ('6', 'ฝ่ายเทคโนโลยีสารสนเทศ วิทยาเขตระยอง');

-- ----------------------------
-- Table structure for `detail`
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail` (
  `Detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `Report_id` int(11) NOT NULL,
  `Detail` blob NOT NULL,
  PRIMARY KEY (`Detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detail
-- ----------------------------

-- ----------------------------
-- Table structure for `estimate`
-- ----------------------------
DROP TABLE IF EXISTS `estimate`;
CREATE TABLE `estimate` (
  `Estimate_id` int(11) NOT NULL AUTO_INCREMENT,
  `Project_id` int(11) NOT NULL,
  `Explanation` blob NOT NULL,
  `Result` varchar(128) NOT NULL,
  `Motive` blob NOT NULL,
  `Conducting` blob NOT NULL,
  `Real_used` varchar(128) NOT NULL,
  `Benefits` blob NOT NULL,
  `Problem` blob NOT NULL,
  `Improvement` blob NOT NULL,
  `Flag_close` char(1) NOT NULL,
  PRIMARY KEY (`Estimate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estimate
-- ----------------------------

-- ----------------------------
-- Table structure for `file`
-- ----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `File_id` int(11) NOT NULL AUTO_INCREMENT,
  `Project_id` int(11) NOT NULL,
  `Full_path` varchar(128) NOT NULL,
  `File_name` varchar(128) NOT NULL,
  `Check_type_tor` char(1) NOT NULL,
  PRIMARY KEY (`File_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file
-- ----------------------------

-- ----------------------------
-- Table structure for `goal`
-- ----------------------------
DROP TABLE IF EXISTS `goal`;
CREATE TABLE `goal` (
  `Goal_id` int(11) NOT NULL AUTO_INCREMENT,
  `Strategic_id` varchar(128) NOT NULL,
  `Goal_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Goal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goal
-- ----------------------------

-- ----------------------------
-- Table structure for `indic_project`
-- ----------------------------
DROP TABLE IF EXISTS `indic_project`;
CREATE TABLE `indic_project` (
  `Indic_project_id` int(11) NOT NULL AUTO_INCREMENT,
  `Project_id` int(11) NOT NULL,
  `Goal_id` int(11) NOT NULL,
  `Indic_project` varchar(128) NOT NULL,
  `Unit` varchar(128) NOT NULL,
  `Cost` varchar(128) NOT NULL,
  PRIMARY KEY (`Indic_project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of indic_project
-- ----------------------------

-- ----------------------------
-- Table structure for `indic_project_report`
-- ----------------------------
DROP TABLE IF EXISTS `indic_project_report`;
CREATE TABLE `indic_project_report` (
  `Indic_project_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `Indic_project_id` int(11) NOT NULL,
  `Result` varchar(128) NOT NULL,
  `Achieve` varchar(128) NOT NULL,
  `Report_id` int(11) NOT NULL,
  PRIMARY KEY (`Indic_project_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of indic_project_report
-- ----------------------------

-- ----------------------------
-- Table structure for `objective`
-- ----------------------------
DROP TABLE IF EXISTS `objective`;
CREATE TABLE `objective` (
  `Objective_id` int(11) NOT NULL AUTO_INCREMENT,
  `Project_id` varchar(8) NOT NULL,
  `Objective_name` varchar(128) NOT NULL,
  PRIMARY KEY (`Objective_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of objective
-- ----------------------------

-- ----------------------------
-- Table structure for `problem`
-- ----------------------------
DROP TABLE IF EXISTS `problem`;
CREATE TABLE `problem` (
  `Problem_id` int(11) NOT NULL AUTO_INCREMENT,
  `Report_id` int(11) NOT NULL,
  `Problem` blob NOT NULL,
  PRIMARY KEY (`Problem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of problem
-- ----------------------------

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `Project_id` int(11) NOT NULL AUTO_INCREMENT,
  `Strategic_Plan_id` int(11) NOT NULL,
  `Project_name` varchar(200) NOT NULL,
  `Type` varchar(128) NOT NULL,
  `Integra_name` varchar(128) NOT NULL,
  `Rationale` text NOT NULL,
  `Target_group` varchar(128) NOT NULL,
  `Source` varchar(128) NOT NULL,
  `Butget` decimal(10,0) NOT NULL,
  `Butget_char` varchar(128) NOT NULL,
  `Tor` char(1) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Workplan_id` int(11) NOT NULL,
  `Account_id` varchar(11) NOT NULL,
  PRIMARY KEY (`Project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------

-- ----------------------------
-- Table structure for `project_report`
-- ----------------------------
DROP TABLE IF EXISTS `project_report`;
CREATE TABLE `project_report` (
  `Report_id` int(11) NOT NULL AUTO_INCREMENT,
  `Used` decimal(10,2) NOT NULL,
  `Quarter` varchar(128) NOT NULL,
  `Period_check` char(1) NOT NULL,
  `Project_id` int(11) NOT NULL,
  PRIMARY KEY (`Report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_report
-- ----------------------------

-- ----------------------------
-- Table structure for `strategic`
-- ----------------------------
DROP TABLE IF EXISTS `strategic`;
CREATE TABLE `strategic` (
  `Strategic_id` int(11) NOT NULL AUTO_INCREMENT,
  `Strategic_Plan_id` varchar(128) NOT NULL,
  `Strategic_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Strategic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of strategic
-- ----------------------------

-- ----------------------------
-- Table structure for `strategics_project`
-- ----------------------------
DROP TABLE IF EXISTS `strategics_project`;
CREATE TABLE `strategics_project` (
  `Strategic_Project_id` int(11) NOT NULL AUTO_INCREMENT,
  `Tactic_id` varchar(128) NOT NULL,
  `Project_id` varchar(8) NOT NULL,
  PRIMARY KEY (`Strategic_Project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of strategics_project
-- ----------------------------

-- ----------------------------
-- Table structure for `strategic_plane`
-- ----------------------------
DROP TABLE IF EXISTS `strategic_plane`;
CREATE TABLE `strategic_plane` (
  `Strategic_Plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `Strategic_Plan` varchar(255) NOT NULL,
  `Fiscalyear` varchar(4) NOT NULL,
  `Director_of_time` varchar(255) NOT NULL,
  `Director_of_date` date NOT NULL,
  `Ref_of_time` varchar(255) NOT NULL,
  `Ref_of_date` date NOT NULL,
  `Status` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Strategic_Plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of strategic_plane
-- ----------------------------

-- ----------------------------
-- Table structure for `tactic`
-- ----------------------------
DROP TABLE IF EXISTS `tactic`;
CREATE TABLE `tactic` (
  `Tactic_id` int(11) NOT NULL AUTO_INCREMENT,
  `Goal_id` varchar(128) NOT NULL,
  `Tactic_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Tactic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tactic
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_workplan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_workplan`;
CREATE TABLE `tbl_workplan` (
  `Workplan_id` int(11) NOT NULL AUTO_INCREMENT,
  `Workplan_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Workplan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_workplan
-- ----------------------------
INSERT INTO `tbl_workplan` VALUES ('1', 'แผนงานบริหารการศึกษา');
INSERT INTO `tbl_workplan` VALUES ('2', 'แผนงานจัดการศึกษาระดับอุดมศึกษา');
INSERT INTO `tbl_workplan` VALUES ('3', 'แผนงานวิจัย');
INSERT INTO `tbl_workplan` VALUES ('4', 'แผนงานบริการวิชาการ');
INSERT INTO `tbl_workplan` VALUES ('5', 'แผนงานทำนุบำรุงศิลปวัฒนธรรม');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `User_id` int(11) NOT NULL AUTO_INCREMENT,
  `Account_id` varchar(255) NOT NULL,
  `Project_id` varchar(8) NOT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for `work_step`
-- ----------------------------
DROP TABLE IF EXISTS `work_step`;
CREATE TABLE `work_step` (
  `Step_id` int(11) NOT NULL AUTO_INCREMENT,
  `Step_name` varchar(128) DEFAULT NULL,
  `Start` date NOT NULL,
  `Stop` date NOT NULL,
  `Project_id` varchar(8) NOT NULL,
  PRIMARY KEY (`Step_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of work_step
-- ----------------------------

-- ----------------------------
-- Table structure for `work_step_project_report`
-- ----------------------------
DROP TABLE IF EXISTS `work_step_project_report`;
CREATE TABLE `work_step_project_report` (
  `Step_id` int(11) NOT NULL AUTO_INCREMENT,
  `Step_name` varchar(128) NOT NULL,
  `Start_` date NOT NULL,
  `Stop_` date NOT NULL,
  `Report_id` int(11) NOT NULL,
  PRIMARY KEY (`Step_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of work_step_project_report
-- ----------------------------
