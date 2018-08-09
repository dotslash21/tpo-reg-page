-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 03:28 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`) VALUES
('admin', '$2y$10$0mR4A7jiP1efMDTDMmN.Ju5Wty0R6jJf0wrozVuhtE4');

-- --------------------------------------------------------

--
-- Table structure for table `college_crs`
--

CREATE TABLE `college_crs` (
  `college_id` int(3) NOT NULL,
  `deg_optd` varchar(50) NOT NULL,
  `intake` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_crs`
--

INSERT INTO `college_crs` (`college_id`, `deg_optd`, `intake`) VALUES
(111, 'M.Tech - EE', 0),
(111, 'B.Tech - TT', 0),
(111, 'B.Sc - CS', 0),
(442, 'B.Tech - CSE', 884),
(442, 'B.Tech - TT', 554),
(442, 'B.Tech - EE', 111),
(1999, 'M.Tech - EE', 78),
(1999, 'B.Tech - TT', 55),
(1999, 'B.Tech - EE', 55),
(1999, 'B.Tech - EE', 22),
(123459, 'M.Tech - EE', 99),
(123459, 'B.Tech - CSE', 65),
(123459, 'B.Tech - EE', 22),
(9876, 'M.Tech - EE', 556),
(9876, 'B.Tech - TT', 66),
(9876, 'B.Tech - EE', 77),
(12377, 'B.Tech - CSE', 12),
(12377, 'B.Tech - TT', 13),
(112233, 'M.Tech - EE', 99),
(112233, 'B.Tech - CSE', 88),
(112233, 'B.Tech - TT', 55),
(12121, 'M.Tech - EE', 13),
(12121, 'B.Tech - TT', 14),
(12121, 'B.Tech - EE', 15),
(12312, 'B.Tech - CSE', 99),
(12312, 'B.Tech - TT', 55),
(98789, 'M.Tech - EE', 12),
(98789, 'B.Tech - CSE', 13),
(98789, 'B.Tech - EE', 14),
(98789, 'B.Tech - EE', 15),
(111222, 'M.Tech - EE', 12),
(111222, 'B.Tech - CSE', 13),
(111222, 'B.Tech - EE', 14),
(111222, 'B.Tech - EE', 15),
(21231, 'M.Tech - EE', 23),
(21231, 'B.Tech - TT', 11),
(1235465, 'M.Tech - EE', 77),
(1111111111, 'M.Tech - EE', 87),
(1324567896, 'M.Tech - EE', 99),
(2147483647, 'M.Tech - EE', 55),
(1238, 'M.Tech - EE', 56),
(1238, 'M.Tech - CSE', 67),
(1234567, 'M.Tech - EE', 88),
(1234567, 'B.Tech - EE', 55),
(123456, 'M.Tech - EE', 888),
(12314, 'M.Tech - EE', 7),
(152353, 'M.Tech - EE', 9),
(35535, 'B.Tech - CSE', 2147483647);

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
(2, 'M.Tech', 'EE'),
(3, 'B.Tech', 'CSE'),
(5, 'B.Tech', 'TT'),
(6, 'M.Tech', 'EE'),
(7, 'B.Sc', 'CS'),
(9, 'B.Tech', 'EE'),
(10, 'B.Tech', 'EE'),
(11, 'M.Tech', 'CSE'),
(12, 'BCA', 'bachelor in Computer Application');

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
(37, 'Arkadip Bhattacharywett', 1234567, '32638538', '$2y$10$S9kgTrJ0ElnePgKM1km3Ue2FitXBKdizSxu9puQp5tX', 1800, 'NAAC-A+', 'Government', 'JU', '1', 'Arunachal Pradesh (A', 'llhkghjfgdh', 713144, '7/c\nLaxmi Prasad Singh Road,Gorabazar', 2147483647, 'in2arkadipb13@gmail.com', 'http://timeclock.jk', 'Arkadip Bhattacharya', 'qwerty', 1234567788, 2147483647, 'in2arkadipb13@gmail.com', 'Laxmi Prasad Singh Road,Gorabazar', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 88, 8875, 224, 955, 896, '0', 888, '', '2018-08-08 16:41:40', '', '', '', ''),
(38, 'Arkadip Bhattacharya', 123456, '123', '$2y$10$JO0dAUvzHb2oNAK9GonDn.5533GFcCPRTm3eVj3lcSK', 1800, 'NAAC-A+', 'Government', 'JU', '2', 'Andhra Pradesh (AP)', 'llhkghjfgdh', 713144, '7/c\nLaxmi Prasad Singh Road,Gorabazar', 2147483647, 'in2arkadipb13@gmail.com', 'http://timeclock.pl', 'Arkadip Bhattacharya', 'nxdn', 1234567890, 2147483647, 'in2arkadipb13@gmail.com', 'Laxmi Prasad Singh Road,Gorabazar', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 6, 5, 997, 444, 555, 'yes', 444, '', '2018-08-08 16:41:40', '', '', '', ''),
(42, 'Arkadip Bhattacharyaaar', 12314, '114', '$2y$10$V4m8BBHfxiP5FyQGHHeHvO7Gu99JfzdYm7V.spm97Hj', 1800, 'NAAC-A+', 'Government-Aided', 'Maulana Kalam Azad University of Technology', 'UGc', 'Andhra Pradesh (AP)', 'llhkghjfgdh', 713144, '7/c\nLaxmi Prasad Singh Road,Gorabazar', 2147483647, 'in2arkadipb13@gmail.com', 'http://timeclock.jk', 'Arkadip Bhattacharya', 'nxdn', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 'Laxmi Prasad Singh Road,Gorabazar', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 1123, 241, 2332, 235235, 2342, 'yes', 1242, '', '2018-08-08 16:54:07', '', '', '', ''),
(43, '1ahgshf', 152353, '2525325', '$2y$10$q2ArRxgwoqlYMAu7bGJBEuOWW3oHT1B.LyPgDlrpDwB', 1800, 'NAAC-A+', 'Government', 'Maulana Kalam Azad University of Technology', 'UGc', 'Andhra Pradesh (AP)', 'asasasasa', 742101, '7/c\nLaxmi Prasad Singh Road,Gorabazar', 2147483647, 'in2arkadipb13@gmail.com', 'http://timeclock.pl', 'Arkadip Bhattacharya', 'nxdn', 1233456678, 2147483647, 'in2arkadipb13@gmail.com', 'Laxmi Prasad Singh Road,Gorabazar', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 98, 44, 22, 55, 54, 'yes', 5, '152353.jpg', '2018-08-08 17:01:27', '', '', '', ''),
(44, 'Arkadip Bhattacharya131', 35535, '12345678', '$2y$10$eKMimiwhnuztWXBee0GCZe5gpaiJrDFuTf.avwqEtDr', 1800, 'NAAC-A+', 'Government', 'Jadavpur University', 'AICTE', 'Andhra Pradesh (AP)', 'llhkghjfgdh', 742101, '7/c\nLaxmi Prasad Singh Road,Gorabazar', 2147483647, 'in2arkadipb13@gmail.com', 'http://timeclock.jk', 'Arkadip Bhattacharya', 'nxdn', 1234569987, 2147483647, 'in2arkadipb13@gmail.com', 'Laxmi Prasad Singh Road,Gorabazar', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 787, 98, 546, 544, 554, 'yes', 797, '', '2018-08-09 09:07:55', '::1', '', '', '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cred`
--
ALTER TABLE `cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User resigtration id', AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
