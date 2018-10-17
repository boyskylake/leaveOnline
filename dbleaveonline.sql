-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2018 at 08:23 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbleaveonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_leavepreview`
--

CREATE TABLE `leave_leavepreview` (
  `leave_id` int(10) NOT NULL,
  `personnel_id` text NOT NULL,
  `personnel_name` varchar(50) NOT NULL,
  `personnel_position` varchar(20) NOT NULL,
  `personnel_degree` varchar(20) NOT NULL,
  `personnel_Affiliation` text NOT NULL,
  `personnel_leavecollect` int(10) NOT NULL,
  `personnel_leaveleft` int(10) NOT NULL,
  `personnel_leaveall` int(10) NOT NULL,
  `personnel_leavesince` varchar(20) NOT NULL,
  `personnel_leaveat` varchar(20) NOT NULL,
  `personnel_commune` text NOT NULL,
  `personnel_phone` varchar(15) NOT NULL,
  `leave_status` text NOT NULL,
  `personnel_signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_personnel`
--

CREATE TABLE `leave_personnel` (
  `personnel_id` int(10) NOT NULL,
  `personnel_name` varchar(50) NOT NULL,
  `personnel_position` varchar(20) NOT NULL,
  `personnel_degree` varchar(20) NOT NULL,
  `personnel_Affiliation` text NOT NULL,
  `personnel_leavecollect` int(10) NOT NULL,
  `personnel_leaveleft` int(10) NOT NULL,
  `personnel_leaveall` int(10) NOT NULL,
  `personnel_password` varchar(16) NOT NULL,
  `personnel_status` varchar(10) NOT NULL,
  `personnel_signature` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_personnel`
--

INSERT INTO `leave_personnel` (`personnel_id`, `personnel_name`, `personnel_position`, `personnel_degree`, `personnel_Affiliation`, `personnel_leavecollect`, `personnel_leaveleft`, `personnel_leaveall`, `personnel_password`, `personnel_status`, `personnel_signature`) VALUES
(1, 'อานนท์  บุพศิริ', 'โปรแกรมเมอร์', 'หัวหน้า', 'IT', 0, 10, 10, '12345678', 'ADMIN', ''),
(2, 'arnon', 'boss', '3', 'IT', 6, 6, 12, '12345678', 'USER', ''),
(3, 'อานนท์', 'boss', '3', 'programmer', 6, 6, 12, '12345678', 'USER', ''),
(5, 'อานนท์', 'boss', '3', 'programmer', 6, 6, 12, '12345678', 'USER', ''),
(6, 'arnon', 'boss', '3', 'programmer', 6, 5, 11, '12345678', 'PRINTER', ''),
(121, 'อรรถพงษ์ นิทิ', 'ผู้ช่วยโปรแกรมเมอร์', '3', 'IT', 5, 5, 10, '12345678', 'USER', '');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_affiliation`
--

CREATE TABLE `personnel_affiliation` (
  `num` int(10) NOT NULL,
  `personnel_affiliation` text NOT NULL,
  `idline` text NOT NULL,
  `idline2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnel_affiliation`
--

INSERT INTO `personnel_affiliation` (`num`, `personnel_affiliation`, `idline`, `idline2`) VALUES
(1, 'IT', 'U8d0bb3fbef3f6db99902c50b3952857f', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_leavepreview`
--
ALTER TABLE `leave_leavepreview`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `leave_personnel`
--
ALTER TABLE `leave_personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- Indexes for table `personnel_affiliation`
--
ALTER TABLE `personnel_affiliation`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_leavepreview`
--
ALTER TABLE `leave_leavepreview`
  MODIFY `leave_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_affiliation`
--
ALTER TABLE `personnel_affiliation`
  MODIFY `num` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
