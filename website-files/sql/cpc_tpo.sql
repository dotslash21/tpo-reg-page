-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2018 at 05:27 PM
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
(442, 'B.Tech - EE', 111);

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
(10, 'B.Tech', 'EE');

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
(2, 'GCETTB', 111, 'gcettb1', 'gcettb1', 2018, 'NAAC-A', 'Government', 'MAKAUT', '1', 'West Bengal (WB)', 'Murshidabad', 432434, 'asdfg', 2147483647, 'shaw.anshu@gmail.com', 'http://www.gcettb.ac.in', 'dsfasfasdf sdfasdfgas', 'sdfasdfsdf', 8, 7, '341GSDFGS@Wdfdsfsd.gd', 'qwertyuion asdfgh', 5, 5, 'qwertyu@asdgfh.com', 80, 5, 20, 1000, 4, 20, 0),
(3, '', 0, '', '', 0, '', '', '', '', '', '', 0, '', 0, '', '', '', '', 0, 0, '', '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0),
(4, 'Arkadip Bhattacharya', 123456, '123', '123456789', 1800, 'NAAC-A', 'Government-Aided', 'MAKAUT', '3', 'Andhra Pradesh (AP)', 'llhkghjfgdh', 713144, '7/c\nLaxmi Prasad Singh Road,Gorabazar', 2147483647, 'in2arkadipb13@gmail.com', 'http://timeclock.jk', 'Arkadip Bhattacharya', 'nxdn', 123456789, 2147483647, 'in2arkadipb13@gmail.com', 'Laxmi Prasad Singh Road,Gorabazar', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 12, 13, 14, 15, 16, 0, 17),
(13, 'qwertyuiop', 123, '1234', '1234567890', 1800, 'NAAC-A+', 'Government', 'MAKAUT', '1', 'Arunachal Pradesh (A', 'asasasasa', 713144, 'Mankar', 2147483647, 'jonney.vaai@gmail.com', 'http://timeclock.jj', 'hi haallo', 'nxdnoo', 2147483647, 2147483647, 'in2arkadipb13@gmail.com', 'Laxmi Prasad Singh Ro', 2147483647, 2147483647, 'james@gmail.com', 87, 45, 78, 45, 21, 0, 65),
(14, 'qwertyyuioasd', 442, '12432', '123456789', 1800, 'NAAC-A+', 'Government', 'MAKAUT', '1', 'Andhra Pradesh (AP)', 'llhkghjfgdh', 742101, '7/c\nLaxmi Prasad Singh Road,Gorabazar', 2147483647, 'dhrthsrt3@gmail.com', 'http://timeclock.jl', 'azsxdcfv', 'aqswdefr', 2147483647, 2147483647, 'aaaaaaaa@gmail.com', 'cdvfbgnhjm', 2147483647, 2147483647, 'sssqwer@gmail.com', 985, 442, 274, 22, 441, 0, 774);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cred`
--
ALTER TABLE `cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
