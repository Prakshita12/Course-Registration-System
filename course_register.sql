-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2020 at 02:32 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `coll_data1`
--

CREATE TABLE `coll_data1` (
  `Coll_name` varchar(20) NOT NULL,
  `Coll_Off` varchar(20) NOT NULL,
  `DID` varchar(20) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coll_data1`
--

INSERT INTO `coll_data1` (`Coll_name`, `Coll_Off`, `DID`, `Deleted`) VALUES
('ATEC', '25', '1001', 'N'),
('ECS', '21', '1003', 'N'),
('JSOM', '24', '1006', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `coll_pno1`
--

CREATE TABLE `coll_pno1` (
  `Coll_name` varchar(20) NOT NULL DEFAULT '',
  `C_PNO` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coll_pno1`
--

INSERT INTO `coll_pno1` (`Coll_name`, `C_PNO`, `Deleted`) VALUES
('ATEC', '2234', 'N'),
('ATEC', '2234561875', 'Y'),
('ATEC', '291', 'N'),
('ATEC', '292', 'N'),
('ATEC', '4656498741', 'Y'),
('JSOM', '12345', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `data_cart`
--

CREATE TABLE `data_cart` (
  `Student_ID` varchar(11) NOT NULL,
  `SecId` varchar(11) NOT NULL,
  `Deleted` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_cart`
--

INSERT INTO `data_cart` (`Student_ID`, `SecId`, `Deleted`) VALUES
('1', '2005', 'N'),
('1', '2006', 'N'),
('1', '2015', 'N'),
('2', '2007', 'Y'),
('2', '2017', 'Y'),
('2', '2018', 'Y'),
('2', '2081', 'Y'),
('3', '2001', 'Y'),
('3', '2002', 'Y'),
('3', '2004', 'Y'),
('3', '2007', 'N'),
('3', '2015', 'Y'),
('3', '2017', 'Y'),
('3', '2020', 'Y'),
('3', '2031', 'Y'),
('3', '2081', 'Y'),
('4', '2001', 'N'),
('4', '2006', 'Y'),
('4', '2015', 'N'),
('4', '2089', 'N'),
('5', '2001', 'N'),
('5', '2013', 'Y'),
('5', '2015', 'Y'),
('5', '2017', 'N'),
('6', '2001', 'Y'),
('6', '2004', 'Y'),
('6', '2006', 'N'),
('6', '2012', 'N'),
('6', '2013', 'N'),
('6', '2022', 'Y'),
('6', '2033', 'Y'),
('7', '2012', 'Y'),
('7', '2013', 'Y'),
('7', '2020', 'Y'),
('7', '2022', 'Y'),
('7', '2029', 'N'),
('7', '2032', 'N'),
('8', '2003', 'Y'),
('8', '2006', 'Y'),
('8', '2015', 'Y'),
('8', '2020', 'Y'),
('8', '2022', 'Y'),
('8', '2031', 'Y'),
('8', '2089', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `dept1`
--

CREATE TABLE `dept1` (
  `dept_code` int(5) NOT NULL DEFAULT '0',
  `dept_name` varchar(20) DEFAULT NULL,
  `dept_Off` varchar(20) NOT NULL,
  `dept_C_ID` varchar(20) DEFAULT NULL,
  `Coll_name` varchar(20) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept1`
--

INSERT INTO `dept1` (`dept_code`, `dept_name`, `dept_Off`, `dept_C_ID`, `Coll_name`, `Deleted`) VALUES
(10, 'CS', '110', '1001', 'ECS', 'N'),
(11, 'ITM', '111', '1001', 'JSOM', 'N'),
(12, 'ARTS', '112', '1003', 'ATEC', 'Y'),
(13, 'CE', 'ECSN 2.034', '1006', 'ECS', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `d_pno1`
--

CREATE TABLE `d_pno1` (
  `dept_code` int(5) NOT NULL DEFAULT '0',
  `dept_phone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_pno1`
--

INSERT INTO `d_pno1` (`dept_code`, `dept_phone`, `Deleted`) VALUES
(10, '7803567327', 'N'),
(12, '4672901010', 'Y'),
(12, '678076543', 'N'),
(12, '6782t1616', 'N'),
(12, '78903636377', 'Y'),
(13, '2222222222', 'Y'),
(13, '78954433', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `instr1`
--

CREATE TABLE `instr1` (
  `instr_ID` varchar(20) NOT NULL DEFAULT '',
  `level` varchar(20) NOT NULL,
  `instr_name` varchar(20) DEFAULT NULL,
  `instr_off` varchar(20) NOT NULL,
  `dept_code` int(5) DEFAULT NULL,
  `Deleted` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instr1`
--

INSERT INTO `instr1` (`instr_ID`, `level`, `instr_name`, `instr_off`, `dept_code`, `Deleted`) VALUES
('1001', '0002', 'NURCAN YURUK', '200', 12, 'N'),
('1002', '0006', 'Crystal Maung', '201', 12, 'N'),
('1003', '0003', 'NEERAJ GUPTA', '202', 11, 'N'),
('1004', '0004', 'CATYLYN JOSEPH', '203', 11, 'N'),
('1005', '0005', 'JONAH', '204', 12, 'Y'),
('1006', '005', 'DENIS DEAN', 'ECS 2.305', 10, 'N'),
('1010', '3', 'JAMES GORDON', 'ECSS.23455', 10, 'N'),
('1020', '6300', 'ANDRES', 'ECSS', 11, 'N'),
('19', '0009', 'ANGER', 'ECSS1.345', 10, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `instr_pno1`
--

CREATE TABLE `instr_pno1` (
  `instr_ID` varchar(20) NOT NULL DEFAULT '',
  `instr_phone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instr_pno1`
--

INSERT INTO `instr_pno1` (`instr_ID`, `instr_phone`, `Deleted`) VALUES
('1001', '7778287272', 'N'),
('1001', '89202020', 'N'),
('1003', '682671899', 'N'),
('1004', '5555555555', 'Y'),
('1004', '8888888888', 'Y'),
('1005', '4444444444', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `lend1`
--

CREATE TABLE `lend1` (
  `Student_ID` varchar(20) NOT NULL DEFAULT '',
  `secti_ID` varchar(20) NOT NULL DEFAULT '',
  `Grade` varchar(2) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lend1`
--

INSERT INTO `lend1` (`Student_ID`, `secti_ID`, `Grade`, `Deleted`) VALUES
('2', '2007', NULL, 'N'),
('2', '2017', NULL, 'N'),
('2', '2018', NULL, 'N'),
('3', '2001', NULL, 'N'),
('3', '2004', NULL, 'N'),
('3', '2007', NULL, 'N'),
('3', '2015', NULL, 'N'),
('3', '2017', NULL, 'N'),
('3', '2020', NULL, 'N'),
('3', '2031', NULL, 'N'),
('4', '2001', NULL, 'N'),
('4', '2015', NULL, 'N'),
('5', '2001', NULL, 'N'),
('5', '2015', NULL, 'N'),
('5', '2017', NULL, 'N'),
('6', '2001', 'A', 'N'),
('6', '2004', NULL, 'N'),
('6', '2012', NULL, 'N'),
('6', '2013', NULL, 'N'),
('6', '2022', NULL, 'N'),
('6', '2033', NULL, 'N'),
('7', '2012', NULL, 'N'),
('7', '2013', NULL, 'N'),
('7', '2020', NULL, 'N'),
('7', '2022', NULL, 'N'),
('7', '2029', NULL, 'N'),
('8', '2001', 'A', 'N'),
('8', '2006', NULL, 'N'),
('8', '2020', NULL, 'N'),
('8', '2022', NULL, 'N'),
('8', '2031', NULL, 'N'),
('8', '2089', 'B', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `login1`
--

CREATE TABLE `login1` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type_u` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Student_ID` varchar(20) DEFAULT NULL,
  `imagename` varchar(100) DEFAULT 'user_profile.png',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login1`
--

INSERT INTO `login1` (`username`, `email`, `type_u`, `password`, `Student_ID`, `imagename`, `Deleted`) VALUES
('nellu', 'nellu@gmail.com', 'user', '41d62789f42d24cc268e7d18cebeb7f2', '3', 'user_profile.png', 'N'),
('prakshita123', 'prkshtng74@gmail.com', 'admin', '70bfddf5b2b29907e35f3f00e531a0c9', '1', 'user2.png', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `sec1`
--

CREATE TABLE `sec1` (
  `SecId` varchar(20) NOT NULL DEFAULT '',
  `sec_no` varchar(3) DEFAULT NULL,
  `Sem` int(2) NOT NULL,
  `ONC` char(1) DEFAULT 'N',
  `Year` year(4) NOT NULL,
  `RoomNo` varchar(10) NOT NULL,
  `Building` varchar(20) NOT NULL,
  `TD` varchar(20) NOT NULL,
  `IID` varchar(20) DEFAULT NULL,
  `subject_ID` int(5) DEFAULT NULL,
  `SectionLimit` int(3) DEFAULT NULL,
  `volume` int(3) NOT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sec1`
--

INSERT INTO `sec1` (`SecId`, `sec_no`, `Sem`, `ONC`, `Year`, `RoomNo`, `Building`, `TD`, `IID`, `subject_ID`, `SectionLimit`, `volume`, `Deleted`) VALUES
('2001', '863', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1006', 1, 45, 50, 'N'),
('2002', '889', 2, 'N', 2018, '402', 'JSOM1', '1:00-2:15', '1001', 1, 89, 89, 'N'),
('2003', '853', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2004', '872', 2, 'Y', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 57, 60, 'N'),
('2005', '865', 1, 'N', 2017, '400', 'ECSS', '1:00-2:15', '1001', 2, 50, 50, 'N'),
('2006', '878', 1, 'Y', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 99, 100, 'N'),
('2007', '854', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 20, 22, 'N'),
('2008', '881', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2009', '870', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 61, 60, 'N'),
('2010', '864', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 50, 'N'),
('2011', '874', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2012', '852', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 20, 22, 'N'),
('2013', '883', 2, 'Y', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 98, 100, 'N'),
('2014', '871', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 60, 'N'),
('2015', '861', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 47, 50, 'N'),
('2016', '876', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2017', '853', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 19, 22, 'N'),
('2018', '879', 2, 'Y', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 99, 100, 'N'),
('2019', '866', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 60, 'N'),
('2020', '859', 1, 'Y', 2017, '400', 'ECSS', '1:00-2:15', '1001', 2, 47, 50, 'N'),
('2021', '882', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2022', '856', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 19, 22, 'N'),
('2023', '880', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2024', '868', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 59, 60, 'N'),
('2025', '862', 1, 'N', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 50, 'N'),
('2026', '877', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 100, 'N'),
('2027', '857', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 22, 'N'),
('2028', '875', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 100, 'N'),
('2029', '869', 2, 'Y', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 59, 60, 'N'),
('2030', '860', 1, 'N', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 50, 'N'),
('2031', '851', 1, 'Y', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 98, 100, 'N'),
('2032', '855', 2, 'Y', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 22, 'N'),
('2033', '853', 2, 'Y', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 99, 100, 'N'),
('2034', '867', 2, 'Y', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 60, 'N'),
('2081', '889', 2, 'Y', 2018, '2.032', 'ECSS', '10:00-11:15', '1006', 2, 100, 100, 'N'),
('2089', '851', 1, 'Y', 2017, '401', 'ECSN', '11:00-12:15', '1001', 1, 1, 5, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

CREATE TABLE `student1` (
  `Student_ID` varchar(20) NOT NULL DEFAULT '',
  `DOB` date NOT NULL,
  `Student_fname` varchar(20) DEFAULT NULL,
  `Student_mname` varchar(20) NOT NULL,
  `Student_lname` varchar(20) DEFAULT NULL,
  `Address` varchar(30) NOT NULL,
  `Major` varchar(20) DEFAULT NULL,
  `dept_code` int(5) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student1`
--

INSERT INTO `student1` (`Student_ID`, `DOB`, `Student_fname`, `Student_mname`, `Student_lname`, `Address`, `Major`, `dept_code`, `Deleted`) VALUES
('1', '2017-10-01', 'WAYNE ', 'CHETAN', 'ROONEY', 'NEW ENGLAND', 'COMPUTER SCIENCE', 10, 'N'),
('2', '2017-10-02', 'ALVARO', 'SANJAY', 'MORATA', '7575 FRANKFORD', 'COMPUTER SCIENCE', 10, 'N'),
('3', '2017-10-03', 'LIONEL', 'RAKESH', 'MESSI', '7676 FRANKFORD', 'MIS', 11, 'N'),
('4', '2017-10-04', 'EDEN', 'BHAVESH', 'HAZARD', '1011 COIT ROAD', 'MIS', 11, 'N'),
('5', '2017-10-05', 'JAMIE', 'KUMAR', 'VARDY', '1011 PRESTON ROAD', 'ARTS', 12, 'N'),
('6', '1998-12-03', 'JOHN', '', 'DOE', '', 'MIS', 11, 'N'),
('7', '1961-11-05', 'JANE', '', 'DOE', '', 'GRAPHICS', 12, 'N'),
('8', '0000-00-00', 'admin', '', 'admin', '', '', 12, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `stu_pno1`
--

CREATE TABLE `stu_pno1` (
  `Student_ID` varchar(20) NOT NULL DEFAULT '',
  `student_phone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_pno1`
--

INSERT INTO `stu_pno1` (`Student_ID`, `student_phone`, `Deleted`) VALUES
('2', '1111222222', 'N'),
('4', '3333444444', 'N'),
('4', '4444555555', 'N'),
('5', '5555666666', 'N'),
('6', '67894322', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `subject1`
--

CREATE TABLE `subject1` (
  `subject_ID` int(5) NOT NULL DEFAULT '0',
  `subject_name` varchar(20) DEFAULT NULL,
  `subject_credit` int(2) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `subject_Info` varchar(30) NOT NULL,
  `subject_De_Info` int(5) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject1`
--

INSERT INTO `subject1` (`subject_ID`, `subject_name`, `subject_credit`, `Level`, `subject_Info`, `subject_De_Info`, `Deleted`) VALUES
(1, 'AI', 3, '6389', 'ARTIFICIAL INTELLIGENCE ', 10, 'N'),
(2, 'DB', 3, '6360', 'DATABASE DESIGN', 12, 'N'),
(3, 'DM', 4, '6314', 'DATA MINING', 12, 'N'),
(4, 'BI', 4, '6000', 'BUSINESS INTELLIGENCE', 12, 'N'),
(5, 'HM', 3, '6326', 'HUMANITIES', 12, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coll_data1`
--
ALTER TABLE `coll_data1`
  ADD PRIMARY KEY (`Coll_name`),
  ADD KEY `DID` (`DID`);

--
-- Indexes for table `coll_pno1`
--
ALTER TABLE `coll_pno1`
  ADD PRIMARY KEY (`Coll_name`,`C_PNO`);

--
-- Indexes for table `data_cart`
--
ALTER TABLE `data_cart`
  ADD PRIMARY KEY (`Student_ID`,`SecId`),
  ADD KEY `SID_FK` (`Student_ID`),
  ADD KEY `SecId_FK` (`SecId`);

--
-- Indexes for table `dept1`
--
ALTER TABLE `dept1`
  ADD PRIMARY KEY (`dept_code`),
  ADD UNIQUE KEY `dept_name` (`dept_name`),
  ADD KEY `dept_C_ID` (`dept_C_ID`,`Coll_name`),
  ADD KEY `FK_CName` (`Coll_name`);

--
-- Indexes for table `d_pno1`
--
ALTER TABLE `d_pno1`
  ADD PRIMARY KEY (`dept_code`,`dept_phone`);

--
-- Indexes for table `instr1`
--
ALTER TABLE `instr1`
  ADD PRIMARY KEY (`instr_ID`),
  ADD KEY `dept_code` (`dept_code`);

--
-- Indexes for table `instr_pno1`
--
ALTER TABLE `instr_pno1`
  ADD PRIMARY KEY (`instr_ID`,`instr_phone`);

--
-- Indexes for table `lend1`
--
ALTER TABLE `lend1`
  ADD PRIMARY KEY (`Student_ID`,`secti_ID`),
  ADD KEY `FK_SecID` (`secti_ID`);

--
-- Indexes for table `login1`
--
ALTER TABLE `login1`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_SID_login` (`Student_ID`);

--
-- Indexes for table `sec1`
--
ALTER TABLE `sec1`
  ADD PRIMARY KEY (`SecId`),
  ADD KEY `IID` (`IID`,`subject_ID`),
  ADD KEY `FK_CoCode` (`subject_ID`);

--
-- Indexes for table `student1`
--
ALTER TABLE `student1`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `dept_code` (`dept_code`);

--
-- Indexes for table `stu_pno1`
--
ALTER TABLE `stu_pno1`
  ADD PRIMARY KEY (`Student_ID`,`student_phone`);

--
-- Indexes for table `subject1`
--
ALTER TABLE `subject1`
  ADD PRIMARY KEY (`subject_ID`),
  ADD KEY `subject_De_Info` (`subject_De_Info`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coll_data1`
--
ALTER TABLE `coll_data1`
  ADD CONSTRAINT `FK_DeanID` FOREIGN KEY (`DID`) REFERENCES `instr1` (`instr_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `coll_pno1`
--
ALTER TABLE `coll_pno1`
  ADD CONSTRAINT `FK_CollegePhone` FOREIGN KEY (`Coll_name`) REFERENCES `coll_data1` (`Coll_name`) ON UPDATE CASCADE;

--
-- Constraints for table `data_cart`
--
ALTER TABLE `data_cart`
  ADD CONSTRAINT `SID_FK` FOREIGN KEY (`Student_ID`) REFERENCES `student1` (`Student_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `SecId_FK` FOREIGN KEY (`SecId`) REFERENCES `sec1` (`SecId`) ON UPDATE CASCADE;

--
-- Constraints for table `dept1`
--
ALTER TABLE `dept1`
  ADD CONSTRAINT `FK_CName` FOREIGN KEY (`Coll_name`) REFERENCES `coll_data1` (`Coll_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DeptChairID` FOREIGN KEY (`dept_C_ID`) REFERENCES `instr1` (`instr_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `d_pno1`
--
ALTER TABLE `d_pno1`
  ADD CONSTRAINT `FK_DeptPhone` FOREIGN KEY (`dept_code`) REFERENCES `dept1` (`dept_code`) ON UPDATE CASCADE;

--
-- Constraints for table `instr1`
--
ALTER TABLE `instr1`
  ADD CONSTRAINT `FK_IDCode` FOREIGN KEY (`dept_code`) REFERENCES `dept1` (`dept_code`) ON UPDATE CASCADE;

--
-- Constraints for table `instr_pno1`
--
ALTER TABLE `instr_pno1`
  ADD CONSTRAINT `FK_InstrPhone` FOREIGN KEY (`instr_ID`) REFERENCES `instr1` (`instr_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `lend1`
--
ALTER TABLE `lend1`
  ADD CONSTRAINT `FK_SID` FOREIGN KEY (`Student_ID`) REFERENCES `student1` (`Student_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SecID` FOREIGN KEY (`secti_ID`) REFERENCES `sec1` (`SecId`) ON UPDATE CASCADE;

--
-- Constraints for table `login1`
--
ALTER TABLE `login1`
  ADD CONSTRAINT `FK_SID_login` FOREIGN KEY (`Student_ID`) REFERENCES `student1` (`Student_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `sec1`
--
ALTER TABLE `sec1`
  ADD CONSTRAINT `FK_CoCode` FOREIGN KEY (`subject_ID`) REFERENCES `subject1` (`subject_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_InstrID` FOREIGN KEY (`IID`) REFERENCES `instr1` (`instr_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student1`
--
ALTER TABLE `student1`
  ADD CONSTRAINT `FK_DeptCode` FOREIGN KEY (`dept_code`) REFERENCES `dept1` (`dept_code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `stu_pno1`
--
ALTER TABLE `stu_pno1`
  ADD CONSTRAINT `FK_StudentPhone` FOREIGN KEY (`Student_ID`) REFERENCES `student1` (`Student_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `subject1`
--
ALTER TABLE `subject1`
  ADD CONSTRAINT `FK_CoDeptCode` FOREIGN KEY (`subject_De_Info`) REFERENCES `dept1` (`dept_code`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
