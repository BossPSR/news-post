-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2020 at 10:24 AM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp486987_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id_admin` int(11) NOT NULL,
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
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id_admin`, `name`, `username`, `password`, `email`, `file_name`, `path`, `status`, `create_times`, `update_times`, `create_by`, `update_by`) VALUES
(1, 'test', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'test@test.com', NULL, NULL, 1, '2020-04-07 14:20:56', '2020-04-07 14:20:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertise`
--

CREATE TABLE `tbl_advertise` (
  `advertise_id` int(11) NOT NULL,
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
  `credit` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `create_times` datetime NOT NULL,
  `update_times` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `create_times` datetime NOT NULL,
  `update_times` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_omise`
--

CREATE TABLE `tbl_omise` (
  `id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `id_taxs` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdf`
--

CREATE TABLE `tbl_pdf` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_order` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `details` text,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `Id_session` int(11) NOT NULL,
  `Ip_address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `create_times` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_taxs` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT '0',
  `create_times` datetime NOT NULL,
  `update_times` datetime DEFAULT NULL,
  `time_forgot_password` varchar(255) DEFAULT NULL,
  `forgot_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `password`, `id_taxs`, `company`, `address`, `point`, `create_times`, `update_times`, `time_forgot_password`, `forgot_password`) VALUES
(1, 'jame0925623256@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0503561005794', 'Infinity Phenomenal Software', '247/5 M.4\r\nNong Han, San Sai, Chiang Mai, 50290.', '10', '2020-04-07 15:14:52', '2020-04-20 14:31:57', NULL, NULL),
(2, 'jame@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0801234567', 'infinity phenomenal software LTD.,PART', '121/1 หมู่ 4 ต.หนองจ๋อม อ.หนองหาร จ.เชียงใหม่ 50210', '0', '2020-04-21 18:37:25', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
  ADD PRIMARY KEY (`advertise_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_omise`
--
ALTER TABLE `tbl_omise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`Id_session`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
  MODIFY `advertise_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_omise`
--
ALTER TABLE `tbl_omise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `Id_session` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
