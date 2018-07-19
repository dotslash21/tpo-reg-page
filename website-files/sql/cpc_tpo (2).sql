-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 10:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `college_crs`
--

CREATE TABLE `college_crs` (
  `college_id` int(3) NOT NULL,
  `deg_optd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'B. Tech', 'CSE'),
(2, 'M.Tech', 'EE');

-- --------------------------------------------------------

--
-- Table structure for table `cred`
--

CREATE TABLE `cred` (
  `id` int(11) NOT NULL,
  `inst_name` varchar(100) NOT NULL,
  `inst_code` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `estd` int(11) NOT NULL,
  `inst_accrd` varchar(20) NOT NULL,
  `inst_type` varchar(20) NOT NULL,
  `inst_affl` varchar(50) NOT NULL,
  `inst_aprv` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `pin` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `head_name` varchar(50) NOT NULL,
  `inst_headdesg` varchar(50) NOT NULL,
  `head_contact` int(11) NOT NULL,
  `head_mob` int(11) NOT NULL,
  `head_email` varchar(50) NOT NULL,
  `tpo_name` varchar(50) NOT NULL,
  `tpo_ph` int(11) NOT NULL,
  `tpo_ph2` int(11) NOT NULL,
  `tpo_email` varchar(50) NOT NULL,
  `no_of_comp` int(11) NOT NULL,
  `num_cmplab` int(10) NOT NULL,
  `min_num_cmp` int(10) NOT NULL,
  `int_speed` int(11) NOT NULL,
  `hall_cap` int(11) NOT NULL,
  `fibop_lan` tinyint(1) NOT NULL,
  `cctv_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cred`
--

INSERT INTO `cred` (`id`, `inst_name`, `inst_code`, `uid`, `pwd`, `estd`, `inst_accrd`, `inst_type`, `inst_affl`, `inst_aprv`, `state`, `district`, `pin`, `address`, `phone`, `email`, `website`, `head_name`, `inst_headdesg`, `head_contact`, `head_mob`, `head_email`, `tpo_name`, `tpo_ph`, `tpo_ph2`, `tpo_email`, `no_of_comp`, `num_cmplab`, `min_num_cmp`, `int_speed`, `hall_cap`, `fibop_lan`, `cctv_no`) VALUES
(1, 'Anshumali Shaw', 231, 'qweqw213', 'e2q3eq32e3', 31412, 'NAAC-A+', 'Government', 'MAKAUT', '2', 'West Bengal (WB)', 'Birbhum', 311230, 'ewrewdfcs', 231312312, 'fewf@Wdfsd.vgdf', 'http://wwww.hdjh.dfd', 'dsfasfasdf sdfasdfgas', 'sdfasdfsdf', 2147483647, 342134132, '341GSDFGS@Wdfdsfsd.gd', 'safgargargae ds', 2132143214, 2147483647, 'weerewr@guk.fd', 9999, 999, 1, 2147483647, 999, 0, 0),
(2, 'GCETTB', 111, 'gcettb1', 'gcettb1', 2018, 'NAAC-A', 'Government', 'MAKAUT', '1', 'West Bengal (WB)', 'Murshidabad', 432434, 'asdfg', 2147483647, 'shaw.anshu@gmail.com', 'http://www.gcettb.ac.in', 'dsfasfasdf sdfasdfgas', 'sdfasdfsdf', 8, 7, '341GSDFGS@Wdfdsfsd.gd', 'qwertyuion asdfgh', 5, 5, 'qwertyu@asdgfh.com', 80, 5, 20, 1000, 4, 20, 0);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cred`
--
ALTER TABLE `cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
