-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 02:24 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpc_tpo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Last_login_time` varchar(40) NOT NULL,
  `Last_login_ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `Last_login_time`, `Last_login_ip`) VALUES
('admin', '$2y$10$0mR4A7jiP1efMDTDMmN.Ju5Wty0R6jJf0wrozVuhtE4', '2018/Sep/07 4:37:54 PM IST +05:30', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `college_crs`
--

CREATE TABLE `college_crs` (
  `college_id` int(3) NOT NULL,
  `deg_optd` varchar(50) NOT NULL,
  `course_optd` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intake` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_crs`
--

INSERT INTO `college_crs` (`college_id`, `deg_optd`, `course_optd`, `intake`) VALUES
(1211, 'B.Tech', 'Computer Science and Engineering', 60);

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(3) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `degree`, `course_name`) VALUES
(1, 'B.Tech', 'Computer Science and Engineering'),
(2, 'B.Tech', 'Mechanical Engineering'),
(3, 'B.Tech', 'Electrical Engineering'),
(4, 'B.Tech', 'Civil Engineering'),
(5, 'M.Tech', 'Civil Engineering'),
(6, 'M.Tech', 'Computer Science and Engineering'),
(7, 'M.Tech', 'Mechanical Engineering'),
(8, 'M.Tech', 'Electrical Engineering'),
(9, 'MCA', 'MASTER IN COMPUTER APPLICATION'),
(10, 'BCA', 'BACHELOR IN COMPUTER APPLICATION');

-- --------------------------------------------------------

--
-- Table structure for table `cred`
--

CREATE TABLE `cred` (
  `id` int(11) NOT NULL COMMENT 'User resigtration id',
  `inst_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Name',
  `inst_code` int(11) NOT NULL COMMENT 'institute Code',
  `uid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute User Id',
  `pwd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Password',
  `estd` int(8) NOT NULL COMMENT 'Institute ESTD',
  `inst_accrd` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Accriditation',
  `inst_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Type',
  `inst_affl` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Affliation',
  `inst_aprv` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Approval',
  `state` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute State',
  `district` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute District',
  `pin` int(8) NOT NULL COMMENT 'institute PIN',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Address',
  `phone` int(11) NOT NULL COMMENT 'institute Phone No',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Email',
  `website` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Website',
  `head_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'institute Head Name',
  `inst_headdesg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Head Designation',
  `head_contact` int(11) NOT NULL COMMENT 'institute Head Phone',
  `head_mob` int(11) NOT NULL COMMENT 'Institute Head Mobile',
  `head_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Head Email',
  `tpo_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute TPO name',
  `tpo_ph` int(11) NOT NULL COMMENT 'institute TPO Phone',
  `tpo_ph2` int(11) NOT NULL COMMENT 'institute TPO Phone 2',
  `tpo_email` varchar(50) NOT NULL COMMENT 'institute TPO Email',
  `no_of_comp` int(11) NOT NULL,
  `num_cmplab` int(10) NOT NULL,
  `min_num_cmp` int(10) NOT NULL,
  `int_speed` int(11) NOT NULL,
  `hall_cap` int(11) NOT NULL,
  `fibop_lan` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Instititute fiberlab',
  `cctv_no` int(11) NOT NULL,
  `upload` varchar(40) NOT NULL COMMENT 'institute Uploadfile name',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Registration Time',
  `browser` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute registered browser',
  `inst_ip` varchar(64) NOT NULL COMMENT 'Institute registered Ip',
  `inst_approve` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Approval',
  `inst_delete` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cred`
--

INSERT INTO `cred` (`id`, `inst_name`, `inst_code`, `uid`, `pwd`, `estd`, `inst_accrd`, `inst_type`, `inst_affl`, `inst_aprv`, `state`, `district`, `pin`, `address`, `phone`, `email`, `website`, `head_name`, `inst_headdesg`, `head_contact`, `head_mob`, `head_email`, `tpo_name`, `tpo_ph`, `tpo_ph2`, `tpo_email`, `no_of_comp`, `num_cmplab`, `min_num_cmp`, `int_speed`, `hall_cap`, `fibop_lan`, `cctv_no`, `upload`, `reg_time`, `browser`, `inst_ip`, `inst_approve`, `inst_delete`) VALUES
(1, 'XYZ Institute of Technology', 1211, 'xyz1211', '$2y$10$B1COeW8RUi4iujYj6IuTJOtiwdtdrWxnbyxctrPVEfY', 1957, 'NAAC-A', 'Government', 'Maulana Kalam Azad University of Technology', 'UGC', 'West Bengal (WB)', 'Kolkata', 700001, '123, Example Street', 1234567890, 'k2803552@nwytg.com', 'https://tnp.iitd.ac.in/', 'Mr. Arunangshu Biswas', 'Director', 1234567, 1234567890, 'absws@xyzit.ac.in', 'Arkadip Bhattacharya', 1234567890, 0, 'abhatt@xyzit.ac.in', 759, 10, 10, 1000000000, 250, 'yes', 20, '1211.jpg', '2018-08-17 13:50:52', '192.100.100.101', '192.100.100.101', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `sl_no` int(5) NOT NULL COMMENT 'serial no of notices',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Title of notices',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Content of notices',
  `publish_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Publishing date',
  `expiry_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'expiry date',
  `file_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'file_name of notice',
  `added_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'added by admin name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`sl_no`, `title`, `content`, `publish_date`, `expiry_date`, `file_name`, `added_by`) VALUES
(1, '112325', 'qeqwrwtwer', '2018/Sep/07', '30 October, 2018', '.jpg', 'admin'),
(2, '11232', 'egshshshd', '2018/Sep/07', '25 December, 2018', '', 'admin'),
(3, '112325', 'gshdshshsrhwsrgt', '2018/Sep/07', '22 November, 2018', '.jpg', 'admin'),
(4, '112142132', 'waerstdfghjkjlkhjghf', '2018/Sep/07', '29 November, 2018', '1536322467.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cred`
--
ALTER TABLE `cred`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inst_code` (`inst_code`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `inst_name` (`inst_name`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cred`
--
ALTER TABLE `cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User resigtration id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `sl_no` int(5) NOT NULL AUTO_INCREMENT COMMENT 'serial no of notices', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
