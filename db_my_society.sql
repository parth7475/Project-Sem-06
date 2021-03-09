-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 01:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_my_society`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `aid` int(6) NOT NULL,
  `aname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `cid` int(6) NOT NULL,
  `stid` int(6) NOT NULL,
  `cname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`cid`, `stid`, `cname`) VALUES
(30, 12, 'Ahmedabad'),
(31, 12, 'Amreli'),
(32, 12, 'Anand'),
(33, 12, 'Banaskantha'),
(34, 12, 'Baroda'),
(35, 12, 'Bharuch'),
(36, 12, 'Bhavnagar'),
(37, 12, 'Dahod'),
(38, 12, 'Dang'),
(39, 12, 'Dwarka'),
(40, 12, 'Gandhinagar'),
(41, 12, 'Jamnagar'),
(42, 12, 'Junagadh'),
(43, 12, 'Kheda'),
(44, 12, 'Kutch'),
(45, 12, 'Mehsana'),
(46, 12, 'Nadiad'),
(47, 12, 'Narmada'),
(48, 12, 'Navsari'),
(49, 12, 'Panchmahals'),
(50, 12, 'Patan'),
(51, 12, 'Porbandar'),
(52, 12, 'Rajkot'),
(53, 12, 'Sabarkantha'),
(54, 12, 'Surat'),
(55, 12, 'Surendranagar'),
(56, 12, 'Vadodara'),
(57, 12, 'Valsad'),
(58, 12, 'Vapi'),
(59, 9, 'Central Delhi'),
(60, 9, 'East Delhi'),
(61, 9, 'New Delhi'),
(62, 9, 'North Delhi'),
(63, 9, 'North East Delhi'),
(64, 9, 'North West Delhi'),
(65, 9, 'Old Delhi'),
(66, 9, 'South Delhi'),
(67, 9, 'South West Delhi'),
(68, 9, 'West Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mid` int(6) NOT NULL,
  `sid` int(6) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `wing` varchar(10) NOT NULL,
  `flate` int(6) NOT NULL,
  `image` blob NOT NULL,
  `password` varchar(32) NOT NULL,
  `member_type` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_my_society`
--

CREATE TABLE `tbl_my_society` (
  `sid` int(6) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `landmark` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `cid` int(6) NOT NULL,
  `stid` int(6) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `stid` int(6) NOT NULL,
  `sname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`stid`, `sname`) VALUES
(1, 'ANDAMAN AND NICOBAR '),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVE'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `tbl_my_society`
--
ALTER TABLE `tbl_my_society`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`stid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `aid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `cid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_my_society`
--
ALTER TABLE `tbl_my_society`
  MODIFY `sid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `stid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `tbl_state` (`stid`);

--
-- Constraints for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `tbl_my_society` (`sid`);

--
-- Constraints for table `tbl_my_society`
--
ALTER TABLE `tbl_my_society`
  ADD CONSTRAINT `tbl_my_society_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `tbl_city` (`cid`),
  ADD CONSTRAINT `tbl_my_society_ibfk_2` FOREIGN KEY (`stid`) REFERENCES `tbl_state` (`stid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
