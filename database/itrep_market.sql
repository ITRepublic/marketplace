-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 01:33 PM
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
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `CurrencyID` int(11) NOT NULL,
  `CurrencyName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`CurrencyID`, `CurrencyName`) VALUES
(1, 'USD'),
(2, 'IDR');

-- --------------------------------------------------------

--
-- Table structure for table `jobagreement`
--

CREATE TABLE `jobagreement` (
  `AgreementID` int(11) NOT NULL,
  `JobMatchID` varchar(25) NOT NULL,
  `AgreementDesc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'vincent@gmail.com', '123456', 'Jayabaya', 'Jakarta', '12313123', 'Jakarta', '12312312', 'JC', '2017-11-11 14:43:43', '2017-11-11 14:43:43'),
(2, '123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'suka suka', 'Bojong Indah', '12313123123', 'Jakarta', '12313123', 'JC', '2018-01-08 23:45:37', '2018-01-08 23:45:37');

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
(1, 'vincent123', 'e10adc3949ba59abbe56e057f20f883e', '123@gmail.com', 'bojong indah', '123213123123', 'JF', '2018-02-28 23:42:18', '2017-12-02 01:36:12'),
(2, 'vincent1', 'e10adc3949ba59abbe56e057f20f883e', 'vincent123@gmail.com', 'bojong indah', '123213123', 'JF', '2017-12-02 14:05:14', '2017-12-02 14:05:14'),
(3, 'Jorjonna', 'e10adc3949ba59abbe56e057f20f883e', 'jorjonna@gmail.com', 'citra 2', '0000', 'JF', '2018-01-21 16:53:28', '2018-01-09 11:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobmaster`
--

CREATE TABLE `jobmaster` (
  `JobID` int(11) NOT NULL,
  `JobTitle` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `JCEmailAddress` varchar(50) NOT NULL,
  `Difficulty` varchar(10) NOT NULL,
  `ExpiredDate` varchar(30) NOT NULL,
  `HasSeenID` varchar(10) NOT NULL,
  `CurrencyID` int(11) NOT NULL,
  `PriceList` varchar(20) NOT NULL,
  `JobStatus` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobmaster`
--

INSERT INTO `jobmaster` (`JobID`, `JobTitle`, `Description`, `JCEmailAddress`, `Difficulty`, `ExpiredDate`, `HasSeenID`, `CurrencyID`, `PriceList`, `JobStatus`, `created_at`, `updated_at`) VALUES
(7, 'Rayon', '123', '123@gmail.com', '1', '03/01/2018', '', 1, '123500', 1, '2018-03-13 17:15:18', '2018-03-13 17:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobmatchsearch`
--

CREATE TABLE `jobmatchsearch` (
  `JobMatchID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `JFEmailAddress` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobmatchskill`
--

CREATE TABLE `jobmatchskill` (
  `SkillJobID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `SkillID` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobmatchskill`
--

INSERT INTO `jobmatchskill` (`SkillJobID`, `JobID`, `SkillID`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2018-03-13 17:27:45', '2018-03-13 17:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobmatchtype`
--

CREATE TABLE `jobmatchtype` (
  `TypeJobID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `JobTypeID` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobmatchtype`
--

INSERT INTO `jobmatchtype` (`TypeJobID`, `JobID`, `JobTypeID`, `created_at`, `updated_at`) VALUES
(7, 7, 1, '2018-03-13 17:15:23', '2018-03-13 17:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `JobTypeID` int(11) NOT NULL,
  `JobTypeDesc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`JobTypeID`, `JobTypeDesc`, `created_at`, `updated_at`) VALUES
(1, 'Backend Programming (API, PHP)', NULL, NULL),
(2, 'Front End Programming (HTML, CSS)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masterdifficulty`
--

CREATE TABLE `masterdifficulty` (
  `DiffID` int(11) NOT NULL,
  `DiffName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterdifficulty`
--

INSERT INTO `masterdifficulty` (`DiffID`, `DiffName`) VALUES
(1, 'Easy'),
(2, 'Moderate');

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
  `menudescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mastermenu`
--

INSERT INTO `mastermenu` (`menuid`, `menuname`, `urlroutemenu`, `routemenu`, `seq`, `menudescription`, `created_at`, `updated_at`) VALUES
('TS001', 'Profile', '/profile', 'ProfileController@create', 1, 'Register Profile with CV', NULL, NULL),
('TS002', 'Search Job', '/marketplace', 'JobMarketController@create', 2, 'Job Browsing', NULL, NULL),
('TS003', 'Register Job', '/jobregistration', 'JobRegistrationController@create', 3, 'Form to register Job Market Place', NULL, NULL),
('TS004', 'Resume', '/resume', 'ResumeController@create', 4, 'Job Finder Resume', NULL, NULL),
('TS005', 'Company Profile', '/companyprofile', 'CompanyProfileController@create', 5, 'Company Profile', NULL, NULL),
('TS006', 'History', '/history', 'JobHistoryController@create', 6, 'History bidding', NULL, NULL),
('TS007', 'Job Agreement', '/jobagreement', 'JobAgreementController@create', 7, 'Job Agreement show deal and undeal projects', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masterstatus`
--

CREATE TABLE `masterstatus` (
  `StatusID` int(11) NOT NULL,
  `StatusName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterstatus`
--

INSERT INTO `masterstatus` (`StatusID`, `StatusName`) VALUES
(1, 'draft'),
(2, 'plan');

-- --------------------------------------------------------

--
-- Table structure for table `skilllist`
--

CREATE TABLE `skilllist` (
  `SkillListID` int(11) NOT NULL,
  `JFEmailAddress` varchar(255) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilllist`
--

INSERT INTO `skilllist` (`SkillListID`, `JFEmailAddress`, `SkillID`, `created_at`, `updated_at`) VALUES
(3, '123@gmail.com', '1', '2018-02-28 16:37:17', '2018-02-28 16:37:17'),
(4, '123@gmail.com', '2', '2018-02-28 16:42:16', '2018-02-28 16:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `skilltype`
--

CREATE TABLE `skilltype` (
  `SkillID` int(11) NOT NULL,
  `SkillType` varchar(255) NOT NULL,
  `SkillDescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilltype`
--

INSERT INTO `skilltype` (`SkillID`, `SkillType`, `SkillDescription`, `created_at`, `updated_at`) VALUES
(1, 'Cobol', 'Programming Language', NULL, NULL),
(2, 'PHP', 'Programming Language', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usermenu`
--

CREATE TABLE `usermenu` (
  `usermenuid` varchar(255) NOT NULL,
  `groupid` varchar(255) NOT NULL,
  `menuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermenu`
--

INSERT INTO `usermenu` (`usermenuid`, `groupid`, `menuid`, `created_at`, `updated_at`) VALUES
('UM001', 'JF', 'TS001', NULL, NULL),
('UM002', 'JF', 'TS002', NULL, NULL),
('UM003', 'JC', 'TS003', NULL, NULL),
('UM004', 'JC', 'TS004', NULL, NULL),
('UM005', 'JC', 'TS005', NULL, NULL),
('UM006', 'JF', 'TS006', NULL, NULL),
('UM007', 'JC', 'TS007', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`CurrencyID`);

--
-- Indexes for table `jobagreement`
--
ALTER TABLE `jobagreement`
  ADD PRIMARY KEY (`AgreementID`);

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
-- Indexes for table `jobmaster`
--
ALTER TABLE `jobmaster`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `jobmatchsearch`
--
ALTER TABLE `jobmatchsearch`
  ADD PRIMARY KEY (`JobMatchID`);

--
-- Indexes for table `jobmatchskill`
--
ALTER TABLE `jobmatchskill`
  ADD PRIMARY KEY (`SkillJobID`);

--
-- Indexes for table `jobmatchtype`
--
ALTER TABLE `jobmatchtype`
  ADD PRIMARY KEY (`TypeJobID`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`JobTypeID`);

--
-- Indexes for table `masterdifficulty`
--
ALTER TABLE `masterdifficulty`
  ADD PRIMARY KEY (`DiffID`);

--
-- Indexes for table `mastermenu`
--
ALTER TABLE `mastermenu`
  ADD PRIMARY KEY (`menuid`),
  ADD KEY `seq` (`seq`);

--
-- Indexes for table `masterstatus`
--
ALTER TABLE `masterstatus`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `skilllist`
--
ALTER TABLE `skilllist`
  ADD PRIMARY KEY (`SkillListID`);

--
-- Indexes for table `skilltype`
--
ALTER TABLE `skilltype`
  ADD PRIMARY KEY (`SkillID`),
  ADD UNIQUE KEY `SkillID` (`SkillID`);

--
-- Indexes for table `usermenu`
--
ALTER TABLE `usermenu`
  ADD PRIMARY KEY (`usermenuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `CurrencyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobagreement`
--
ALTER TABLE `jobagreement`
  MODIFY `AgreementID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobcreator`
--
ALTER TABLE `jobcreator`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobfinder`
--
ALTER TABLE `jobfinder`
  MODIFY `finderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jobmaster`
--
ALTER TABLE `jobmaster`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jobmatchsearch`
--
ALTER TABLE `jobmatchsearch`
  MODIFY `JobMatchID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobmatchskill`
--
ALTER TABLE `jobmatchskill`
  MODIFY `SkillJobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobmatchtype`
--
ALTER TABLE `jobmatchtype`
  MODIFY `TypeJobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `JobTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `masterdifficulty`
--
ALTER TABLE `masterdifficulty`
  MODIFY `DiffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `masterstatus`
--
ALTER TABLE `masterstatus`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skilllist`
--
ALTER TABLE `skilllist`
  MODIFY `SkillListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `skilltype`
--
ALTER TABLE `skilltype`
  MODIFY `SkillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
