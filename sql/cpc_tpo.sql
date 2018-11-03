-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 03:22 PM
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
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_login_time` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_login_ip` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `Last_login_time`, `Last_login_ip`) VALUES
('cpcbengaladmin', '$2y$10$Y4GFLIn1PWs.seh0iKPK7e5/d3fzqX2yN/AJMaEv3Ej9zt7i/DQhK', '2018/Oct/09 4:41:25 PM IST +05:30', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `college_crs`
--

CREATE TABLE `college_crs` (
  `college_id` int(3) NOT NULL,
  `deg_optd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_optd` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intake` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(3) NOT NULL,
  `degree` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 'BCA', 'BACHELOR IN COMPUTER APPLICATION'),
(11, 'M.Tech', 'aetwshyersh'),
(12, 'B.Tech', 'TT'),
(13, 'B.Tech', 'CHEMICAL ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `cred`
--

CREATE TABLE `cred` (
  `inst_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Code',
  `inst_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Name',
  `estd` int(8) NOT NULL COMMENT 'Institute ESTD',
  `inst_accrd` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Accriditation',
  `inst_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Type',
  `inst_affl` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Affliation',
  `inst_aprv` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Approval',
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute State',
  `district` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute District',
  `pin` int(8) NOT NULL COMMENT 'institute PIN',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Address',
  `phone` int(11) NOT NULL COMMENT 'institute Phone No',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Email',
  `website` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Website',
  `head_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'institute Head Name',
  `inst_headdesg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Head Designation',
  `head_contact` int(11) NOT NULL COMMENT 'institute Head Phone',
  `head_mob` int(11) NOT NULL COMMENT 'Institute Head Mobile',
  `head_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute Head Email',
  `tpo_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute TPO name',
  `tpo_ph` int(11) NOT NULL COMMENT 'institute TPO Phone',
  `tpo_ph2` int(11) NOT NULL COMMENT 'institute TPO Phone 2',
  `tpo_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute TPO Email',
  `no_of_comp` int(11) NOT NULL,
  `num_cmplab` int(10) NOT NULL,
  `min_num_cmp` int(10) NOT NULL,
  `int_speed` int(11) NOT NULL,
  `hall_cap` int(11) NOT NULL,
  `fibop_lan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Instititute fiberlab',
  `cctv_no` int(11) NOT NULL,
  `upload` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'institute Uploadfile name',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Registration Time',
  `browser` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute registered browser',
  `inst_ip` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Institute registered Ip'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `sl_no` int(5) NOT NULL COMMENT 'serial no of notices',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Title of notices',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Content of notices',
  `publish_date` int(20) NOT NULL COMMENT 'Publishing date',
  `expiry_date` int(20) NOT NULL COMMENT 'expiry date',
  `active_status` int(2) NOT NULL COMMENT 'The active status of the notice',
  `file_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'file_name of notice',
  `added_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'added by admin name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`sl_no`, `title`, `content`, `publish_date`, `expiry_date`, `active_status`, `file_name`, `added_by`) VALUES
(2, '112326', 'qwerty', 1537809358, 1540940400, 0, '', '8c6976e5b5410415bde9'),
(3, '112327', 'qwerty', 1537809376, 1540854000, 0, '', '8c6976e5b5410415bde9'),
(5, 'sds', '77777777', 1537809526, 1540591200, 0, '', '8c6976e5b5410415bde9'),
(6, '1123244', '7441231', 1537809562, 1540940400, 0, '1537809563.jpg', '8c6976e5b5410415bde9'),
(7, '112325', 'qwerty', 0, 1540940400, 0, '', '8c6976e5b5410415bde9'),
(8, '112325w7n9tver9n8', '1v74n2vq35n8c2547n8v', 1538732486, 1540924200, 0, '', '8ce8bcd713249e604653');

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
  ADD PRIMARY KEY (`inst_code`),
  ADD UNIQUE KEY `inst_code` (`inst_code`),
  ADD UNIQUE KEY `inst_name` (`inst_name`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`sl_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;