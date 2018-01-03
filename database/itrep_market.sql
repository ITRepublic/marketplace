-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 05:21 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itrep_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobagreement`
--

CREATE TABLE `jobagreement` (
  `IndexNo` int(11) NOT NULL,
  `AgreementID` varchar(25) NOT NULL,
  `JobMatchID` varchar(25) NOT NULL,
  `AgreementDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobcreator`
--

CREATE TABLE `jobcreator` (
  `CompanyID` int(11) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAddress` varchar(255) NOT NULL,
  `CreditCard` varchar(50) NOT NULL,
  `CompanyProfile` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `groupid` varchar(5) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcreator`
--

INSERT INTO `jobcreator` (`CompanyID`, `EmailAddress`, `Password`, `CompanyName`, `CompanyAddress`, `CreditCard`, `CompanyProfile`, `Phone`, `groupid`, `updated_at`, `created_at`) VALUES
(1, 'vincent@gmail.com', '123456', 'Jayabaya', 'Jakarta', '12313123', 'Jakarta', '12312312', 'JC', '2017-11-11 14:43:43', '2017-11-11 14:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `jobfinder`
--

CREATE TABLE `jobfinder` (
  `finderid` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `groupid` varchar(5) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobfinder`
--

INSERT INTO `jobfinder` (`finderid`, `UserName`, `Password`, `EmailAddress`, `Address`, `Phone`, `groupid`, `updated_at`, `created_at`) VALUES
(1, 'vincent123', 'e10adc3949ba59abbe56e057f20f883e', '123@gmail.com', 'bojong indah', '123213123123', 'JF', '2017-12-02 01:36:12', '2017-12-02 01:36:12'),
(2, 'vincent1', 'e10adc3949ba59abbe56e057f20f883e', 'vincent123@gmail.com', 'bojong indah', '123213123', 'JF', '2017-12-02 14:05:14', '2017-12-02 14:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobmatchsearch`
--

CREATE TABLE `jobmatchsearch` (
  `IndexNo` int(11) NOT NULL,
  `JobMatchID` varchar(25) NOT NULL,
  `JobID` varchar(25) NOT NULL,
  `SkillListID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `IndexNo` int(11) NOT NULL,
  `JobTypeID` varchar(25) NOT NULL,
  `JobTypeDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mastermenu`
--

CREATE TABLE `mastermenu` (
  `menuid` varchar(25) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `urlroutemenu` varchar(255) NOT NULL,
  `routemenu` varchar(50) NOT NULL,
  `seq` int(11) NOT NULL,
  `menudescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mastermenu`
--

INSERT INTO `mastermenu` (`menuid`, `menuname`, `urlroutemenu`, `routemenu`, `seq`, `menudescription`) VALUES
('TS001', 'Profile Registration', '/profile', 'ProfileController@create', 1, 'Register Profile with CV'),
('TS002', 'Job Marketplace', '/profile', 'ProfileController@create', 2, 'Job Browsing'),
('TS003', 'Job Market Place Registration', '/profile', 'ProfileController@create', 3, 'Form to register Job Market Place'),
('TS004', 'Resume', '/profile', 'ProfileController@create', 4, 'Job Finder Resume');

-- --------------------------------------------------------

--
-- Table structure for table `projectjobrequirement`
--

CREATE TABLE `projectjobrequirement` (
  `IndexNo` int(11) NOT NULL,
  `JobID` varchar(25) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `JCEmailAddress` varchar(255) NOT NULL,
  `JobType` varchar(25) NOT NULL,
  `JobTypeDesc` varchar(255) NOT NULL,
  `JobName` varchar(255) NOT NULL,
  `JobDescription` varchar(255) NOT NULL,
  `PriceList` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skilllist`
--

CREATE TABLE `skilllist` (
  `IndexNo` int(11) NOT NULL,
  `SkillListID` varchar(25) NOT NULL,
  `JFEmailAddress` varchar(255) NOT NULL,
  `SkillID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skilltype`
--

CREATE TABLE `skilltype` (
  `IndexNo` int(11) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `SkillType` varchar(255) NOT NULL,
  `SkillDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilltype`
--

INSERT INTO `skilltype` (`IndexNo`, `SkillID`, `SkillType`, `SkillDescription`) VALUES
(1, 'Cobol', 'Programming Language', ''),
(2, 'PHP', 'Programming Language', '');

-- --------------------------------------------------------

--
-- Table structure for table `usermenu`
--

CREATE TABLE `usermenu` (
  `usermenuid` varchar(255) NOT NULL,
  `groupid` varchar(255) NOT NULL,
  `menuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermenu`
--

INSERT INTO `usermenu` (`usermenuid`, `groupid`, `menuid`) VALUES
('UM001', 'JF', 'TS001'),
('UM002', 'JF', 'TS002'),
('UM003', 'JC', 'TS003'),
('UM004', 'JC', 'TS004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobagreement`
--
ALTER TABLE `jobagreement`
  ADD PRIMARY KEY (`AgreementID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `jobcreator`
--
ALTER TABLE `jobcreator`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `jobfinder`
--
ALTER TABLE `jobfinder`
  ADD PRIMARY KEY (`finderid`);

--
-- Indexes for table `jobmatchsearch`
--
ALTER TABLE `jobmatchsearch`
  ADD PRIMARY KEY (`JobMatchID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`JobTypeID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `mastermenu`
--
ALTER TABLE `mastermenu`
  ADD PRIMARY KEY (`menuid`),
  ADD KEY `seq` (`seq`);

--
-- Indexes for table `projectjobrequirement`
--
ALTER TABLE `projectjobrequirement`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `skilllist`
--
ALTER TABLE `skilllist`
  ADD PRIMARY KEY (`SkillListID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `skilltype`
--
ALTER TABLE `skilltype`
  ADD PRIMARY KEY (`SkillID`),
  ADD UNIQUE KEY `SkillID` (`SkillID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `usermenu`
--
ALTER TABLE `usermenu`
  ADD PRIMARY KEY (`usermenuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobagreement`
--
ALTER TABLE `jobagreement`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobcreator`
--
ALTER TABLE `jobcreator`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobfinder`
--
ALTER TABLE `jobfinder`
  MODIFY `finderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobmatchsearch`
--
ALTER TABLE `jobmatchsearch`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projectjobrequirement`
--
ALTER TABLE `projectjobrequirement`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skilllist`
--
ALTER TABLE `skilllist`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skilltype`
--
ALTER TABLE `skilltype`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
