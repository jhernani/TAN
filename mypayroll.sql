-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 01:02 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mypayroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `employee_id` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `hire` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `gender` varchar(1000) NOT NULL,
  `birthdate` varchar(1000) NOT NULL,
  `salary` int(255) NOT NULL,
  `designation` varchar(1000) NOT NULL,
  `tax` int(255) NOT NULL,
  `sss` int(255) NOT NULL,
  `pag_ibig` int(255) NOT NULL,
  `philhealth` int(255) NOT NULL,
  `sss_loan` int(255) NOT NULL,
  `pag_ibig_loan` int(255) NOT NULL,
  `company_loan` int(255) NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_added` datetime NOT NULL,
  `user_id` int(255) NOT NULL,
  `active` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `employee_id`, `type`, `hire`, `address`, `gender`, `birthdate`, `salary`, `designation`, `tax`, `sss`, `pag_ibig`, `philhealth`, `sss_loan`, `pag_ibig_loan`, `company_loan`, `date_modified`, `date_added`, `user_id`, `active`) VALUES
(8, 'JULIETO HERMOSO DIACAMOS', '100', 'casual', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 370, 'TD', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-25 22:12:52', 1, 0),
(9, 'JULIETO LASTIMOSO LAWANAN', '101', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 330, 'TD', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-25 22:13:09', 1, 0),
(10, 'ALBERTO CAWILAN PATINDOL JR.', '103', 'casual', '1555-01-15', 'cebu city', 'male', '1992-09-03', 340, 'TD', 0, 0, 0, 0, 0, 0, 0, '2015-09-04 01:08:28', '2015-08-25 22:13:21', 1, 0),
(11, 'GENNO RABANES DIACAMOS', '104', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 330, 'TD', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:52:06', 1, 0),
(12, 'RAMIL NICOR OFLAS', '105', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 355, 'TD', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:52:32', 1, 0),
(13, 'ARTURO TARITAS MUNCADA', '106', 'regular', '', 'cebu city', 'male', '', 355, 'TD', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:52:44', 1, 0),
(14, 'PERFECTO CABALLERO LASTIMOSO JR.', '107', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 325, 'TH', 0, 0, 0, 0, 0, 0, 0, '2015-08-26 23:54:11', '2015-08-26 23:53:21', 1, 0),
(15, 'MANNY JORQUIA RIVERA', '108', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 330, 'TH', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:54:36', 1, 0),
(16, 'MARJON JORQUIA RIVERA', '109', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 295, 'TH', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:55:11', 1, 0),
(17, 'MICHAEL JORQUIA RIVERA', '110', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 285, 'TH', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:56:08', 1, 0),
(18, 'ROLANDO CANUTO CORAZA JR.', '111', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 275, 'TH', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:57:28', 1, 0),
(19, 'JASON NEPUMOCENO VELARDE', '112', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 275, 'TH', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:57:36', 1, 0),
(20, 'JEFFERSON NEPOMUCENO VELARDE', '113', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 265, 'TH', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:57:45', 1, 0),
(21, 'HANNAH LUZA JUNTONG', '114', '', '0000-00-00 00:00:00', 'CEBU CITY', 'female', '0000-00-00', 345, 'FDS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:57:54', 1, 1),
(22, 'RODRIGO LABISTE', '115', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 350, 'SM', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:58:03', 1, 0),
(23, 'JESUS FERNANDEZ GEROMO', '116', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 345, 'SM', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:58:14', 1, 0),
(24, 'DEXTER RABE TY', '117', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 12000, 'SS', 100, 100, 100, 100, 100, 100, 100, '0000-00-00 00:00:00', '2015-08-26 23:58:23', 1, 1),
(25, 'CANDIDO DELA TORRE PADIN JR.', '118', '', '0000-00-00 00:00:00', 'cebu city', 'male', '0000-00-00', 21000, 'WS', 0, 0, 0, 0, 0, 0, 0, '2015-09-04 00:42:37', '2015-08-26 23:58:31', 1, 1),
(26, 'LAURO SILOS VILLANUEVA', '119', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 13500, 'AWS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:58:45', 1, 1),
(27, 'CASSIUS DIANA NUDALO', '120', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 12000, 'MC', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:59:00', 1, 0),
(28, 'DESERIE RABE TY', '121', '', '0000-00-00 00:00:00', 'CEBU CITY', 'female', '0000-00-00', 18000, 'FS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:59:15', 1, 1),
(29, 'CECILLE BEJOC CORTES', '122', '', '0000-00-00 00:00:00', 'CEBU CITY', 'female', '0000-00-00', 18000, 'LS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:59:43', 1, 1),
(30, 'RHIZA CASINILLO DEIPARINE', '123', '', '0000-00-00 00:00:00', 'CEBU CITY', 'female', '0000-00-00', 18000, 'LS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-26 23:59:55', 1, 1),
(31, 'STEVEN SORIA FERRAREN', '124', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 10000, 'SAM', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-27 00:00:18', 1, 1),
(32, 'RODERICK HERMIS MEDIDA GETUBIG', '125', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 10000, 'SAM', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-27 00:00:31', 1, 1),
(33, 'JOSEPH RICO YOUNG', '126', '', '0000-00-00 00:00:00', 'CEBU CITY', 'male', '0000-00-00', 10000, 'SR', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-27 00:00:41', 1, 1),
(34, 'PERLIE VERN PANAL PABRIGA', '127', '', '0000-00-00 00:00:00', 'CEBU CITY', 'female', '0000-00-00', 10000, 'SR', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-08-27 00:00:51', 1, 1),
(35, 'MARK DEVIN DENOSTA', '133', 'regular', 'July 14,2014', 'CEBU CITY', 'male', 'September 03,1992', 5550, 'SAM', 0, 0, 100, 125, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(36, '11', '12311', 'regular', 'September 02,2015', 'a', 'male', 'January 01,1995', 0, 'FS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(37, 'Deserie Ty', '12111144', '', '21121-12-21', 'Cadahuan, Talamban Cebu City ', 'male', '2121-10-21', 0, 'FDS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(38, 'Deserie Ty', '1211114433', '', '21121-12-21', 'Cadahuan, Talamban Cebu City ', 'male', '2121-10-21', 0, 'FDS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(39, 'hennie tan', '13233', '', '2015-10-07', 'asadas', 'female', '2016-05-05', 0, 'AWS', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

CREATE TABLE IF NOT EXISTS `tbl_payroll` (
  `id` int(255) NOT NULL,
  `salary` varchar(1000) NOT NULL,
  `tax` varchar(1000) NOT NULL,
  `sss` varchar(1000) NOT NULL,
  `pag_ibig` varchar(1000) NOT NULL,
  `philhealth` varchar(1000) NOT NULL,
  `sss_loan` varchar(1000) NOT NULL,
  `pag_ibig_loan` varchar(1000) NOT NULL,
  `designation` varchar(1000) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `period_covered` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time`
--

CREATE TABLE IF NOT EXISTS `tbl_time` (
  `id` int(255) NOT NULL,
  `employee_id` varchar(1000) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `datetime` datetime NOT NULL,
  `time_rendered` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_time`
--

INSERT INTO `tbl_time` (`id`, `employee_id`, `time_in`, `time_out`, `datetime`, `time_rendered`, `date`) VALUES
(1, '29', '15:14:46', '15:14:51', '2015-10-05 15:14:51', '00:00:00', '2015-10-05'),
(4, '32', '15:25:56', '15:26:07', '2015-10-05 15:26:07', '00:00:00', '2015-10-05'),
(5, '33', '15:26:26', '00:00:00', '2015-10-05 15:26:26', '00:00:00', '2015-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` varchar(1000) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `type`, `username`, `password`, `email`, `date_added`, `date_modified`, `status`, `user_id`) VALUES
(1, 'ADMINISTRATOR', 'superadmin', 'admin', 'password', 'hennietan12@gmail.com', '2015-08-24 08:01:48', '2015-08-29 11:34:33', '', 1),
(25, 'Hennie C. Tan', 'hr', 'hr', 'admin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(27, 'john cahil', 'hr', 'cahil', 'cahil1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(28, 'Diane Ty', 'hr', 'diane_hr', 'admin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_time`
--
ALTER TABLE `tbl_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_time`
--
ALTER TABLE `tbl_time`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
