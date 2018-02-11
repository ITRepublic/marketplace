-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 05:27 PM
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
(1, 'vincent123', 'e10adc3949ba59abbe56e057f20f883e', '123@gmail.com', 'bojong indah', '123213123123', 'JF', '2017-12-02 01:36:12', '2017-12-02 01:36:12'),
(2, 'vincent1', 'e10adc3949ba59abbe56e057f20f883e', 'vincent123@gmail.com', 'bojong indah', '123213123', 'JF', '2017-12-02 14:05:14', '2017-12-02 14:05:14'),
(3, 'Jorjonna', 'e10adc3949ba59abbe56e057f20f883e', 'jorjonna@gmail.com', 'citra 2', '0000', 'JF', '2018-01-21 16:53:28', '2018-01-09 11:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobmaster`
--

CREATE TABLE `jobmaster` (
  `IndexNo` int(11) NOT NULL,
  `JobID` varchar(50) NOT NULL,
  `JobTitle` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `JCEmailAddress` varchar(50) NOT NULL,
  `Difficulty` varchar(10) NOT NULL,
  `HasSeenID` varchar(10) NOT NULL,
  `PriceList` varchar(20) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobmaster`
--

INSERT INTO `jobmaster` (`IndexNo`, `JobID`, `JobTitle`, `Description`, `JCEmailAddress`, `Difficulty`, `HasSeenID`, `PriceList`, `created_at`, `updated_at`) VALUES
(17, 'JBR-2018-02-065a79cb3e5b094', 'Talkie', 'Lelah', '123@gmail.com', '', '', '', '2018-02-06 22:35:26', '2018-02-06 22:35:26'),
(18, 'JBR-2018-02-065a79cbca1d156', 'rayon123', 'telak', '123@gmail.com', '', '', '', '2018-02-06 22:37:46', '2018-02-06 22:37:46'),
(19, 'JBR-2018-02-065a79cbeddfa73', 'Rayon', '213', '123@gmail.com', '', '', '', '2018-02-06 22:38:21', '2018-02-06 22:38:21'),
(20, 'JBR-2018-02-065a79cc3a642a5', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 22:39:38', '2018-02-06 22:39:38'),
(21, 'JBR-2018-02-065a79cc69c7c53', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 22:40:25', '2018-02-06 22:40:25'),
(22, 'JBR-2018-02-065a79cc8039913', 'Rayon', '213', '123@gmail.com', '', '', '', '2018-02-06 22:40:48', '2018-02-06 22:40:48'),
(23, 'JBR-2018-02-065a79ccc2be996', 'Rayon', '12345', '123@gmail.com', '', '', '', '2018-02-06 22:41:54', '2018-02-06 22:41:54'),
(24, 'JBR-2018-02-065a79cd4b4c8f9', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:44:11', '2018-02-06 22:44:11'),
(25, 'JBR-2018-02-065a79cd69b14cb', 'Rayon', '12345', '123@gmail.com', '', '', '', '2018-02-06 22:44:41', '2018-02-06 22:44:41'),
(26, 'JBR-2018-02-065a79cd971dd47', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:45:27', '2018-02-06 22:45:27'),
(27, 'JBR-2018-02-065a79cde31f7e0', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:46:43', '2018-02-06 22:46:43'),
(28, 'JBR-2018-02-065a79ce0e50ba0', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:47:26', '2018-02-06 22:47:26'),
(29, 'JBR-2018-02-065a79ce424bdcc', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:48:18', '2018-02-06 22:48:18'),
(30, 'JBR-2018-02-065a79ce65d0a75', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:48:53', '2018-02-06 22:48:53'),
(31, 'JBR-2018-02-065a79ce6fb1b24', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:49:03', '2018-02-06 22:49:03'),
(32, 'JBR-2018-02-065a79ce7ff2eb3', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:49:19', '2018-02-06 22:49:19'),
(33, 'JBR-2018-02-065a79cf23dffb8', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:52:03', '2018-02-06 22:52:03'),
(34, 'JBR-2018-02-065a79cf7b6e965', '123', '123', '123@gmail.com', '', '', '', '2018-02-06 22:53:31', '2018-02-06 22:53:31'),
(35, 'JBR-2018-02-065a79cfe315a5a', '123', '123', '123@gmail.com', '', '', '', '2018-02-06 22:55:15', '2018-02-06 22:55:15'),
(36, 'JBR-2018-02-065a79d02585b1b', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:56:21', '2018-02-06 22:56:21'),
(37, 'JBR-2018-02-065a79d058ced97', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 22:57:12', '2018-02-06 22:57:12'),
(38, 'JBR-2018-02-065a79d07c3de34', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:57:48', '2018-02-06 22:57:48'),
(39, 'JBR-2018-02-065a79d09fea51e', 'rayon123', '123', '123@gmail.com', '', '', '', '2018-02-06 22:58:23', '2018-02-06 22:58:23'),
(40, 'JBR-2018-02-065a79d0d04bcd9', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 22:59:12', '2018-02-06 22:59:12'),
(41, 'JBR-2018-02-065a79d0f32853f', 'rayon123', '123', '123@gmail.com', '', '', '', '2018-02-06 22:59:47', '2018-02-06 22:59:47'),
(42, 'JBR-2018-02-065a79d0f3815ea', 'rayon123', '123', '123@gmail.com', '', '', '', '2018-02-06 22:59:47', '2018-02-06 22:59:47'),
(43, 'JBR-2018-02-065a79d0fe0c5a1', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 22:59:58', '2018-02-06 22:59:58'),
(44, 'JBR-2018-02-065a79d116ae225', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 23:00:22', '2018-02-06 23:00:22'),
(45, 'JBR-2018-02-065a79d12777bf9', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 23:00:39', '2018-02-06 23:00:39'),
(46, 'JBR-2018-02-065a79d207ac31c', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 23:04:23', '2018-02-06 23:04:23'),
(47, 'JBR-2018-02-065a79d218e1578', '123', '123', '123@gmail.com', '', '', '', '2018-02-06 23:04:40', '2018-02-06 23:04:40'),
(48, 'JBR-2018-02-065a79d22d25e91', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 23:05:01', '2018-02-06 23:05:01'),
(49, 'JBR-2018-02-065a79d24fb614a', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 23:05:35', '2018-02-06 23:05:35'),
(50, 'JBR-2018-02-065a79d24fe2fb4', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 23:05:36', '2018-02-06 23:05:36'),
(51, 'JBR-2018-02-065a79d2be55262', 'susah susah', '123', '123@gmail.com', '', '', '', '2018-02-06 23:07:26', '2018-02-06 23:07:26'),
(52, 'JBR-2018-02-065a79d2d4ce0b1', 'Rayon', '123', '123@gmail.com', '', '', '', '2018-02-06 23:07:48', '2018-02-06 23:07:48'),
(53, 'JBR-2018-02-065a79dd7c17f9a', '1231231', '123123', '123@gmail.com', '', '', '', '2018-02-06 23:53:16', '2018-02-06 23:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `jobmatchsearch`
--

CREATE TABLE `jobmatchsearch` (
  `IndexNo` int(11) NOT NULL,
  `JobMatchID` varchar(25) NOT NULL,
  `JobID` varchar(25) NOT NULL,
  `JFEmailAddress` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobmatchskill`
--

CREATE TABLE `jobmatchskill` (
  `IndexNo` int(11) NOT NULL,
  `JobID` varchar(50) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobmatchtype`
--

CREATE TABLE `jobmatchtype` (
  `IndexNo` int(11) NOT NULL,
  `JobID` varchar(255) NOT NULL,
  `JobTypeID` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `IndexNo` int(11) NOT NULL,
  `JobTypeID` varchar(25) NOT NULL,
  `JobTypeDesc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`IndexNo`, `JobTypeID`, `JobTypeDesc`, `created_at`, `updated_at`) VALUES
(1, 'Backend', 'Backend Programming (API, PHP)', NULL, NULL),
(2, 'Front End', 'Front End Programming (HTML, CSS)', NULL, NULL);

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
-- Table structure for table `ratingprice`
--

CREATE TABLE `ratingprice` (
  `IndexNo` int(11) NOT NULL,
  `RatingID` varchar(10) NOT NULL,
  `Difficulty` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skilllist`
--

CREATE TABLE `skilllist` (
  `IndexNo` int(11) NOT NULL,
  `SkillListID` varchar(25) NOT NULL,
  `JFEmailAddress` varchar(255) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilllist`
--

INSERT INTO `skilllist` (`IndexNo`, `SkillListID`, `JFEmailAddress`, `SkillID`, `created_at`, `updated_at`) VALUES
(1, '1', 'jorjonna@gmail.com', '1', '2018-01-09 04:47:44', '2018-01-09 04:47:44'),
(2, '2', 'jorjonna@gmail.com', '2', '2018-01-09 04:51:03', '2018-01-09 04:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `skilltype`
--

CREATE TABLE `skilltype` (
  `IndexNo` int(11) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `SkillType` varchar(255) NOT NULL,
  `SkillDescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilltype`
--

INSERT INTO `skilltype` (`IndexNo`, `SkillID`, `SkillType`, `SkillDescription`, `created_at`, `updated_at`) VALUES
(1, 'Cobol', 'Programming Language', '', NULL, NULL),
(2, 'PHP', 'Programming Language', '', NULL, NULL);

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
-- Indexes for table `jobmaster`
--
ALTER TABLE `jobmaster`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `jobmatchsearch`
--
ALTER TABLE `jobmatchsearch`
  ADD PRIMARY KEY (`JobMatchID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `jobmatchskill`
--
ALTER TABLE `jobmatchskill`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `IndexNo` (`IndexNo`);

--
-- Indexes for table `jobmatchtype`
--
ALTER TABLE `jobmatchtype`
  ADD PRIMARY KEY (`JobID`),
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
-- Indexes for table `ratingprice`
--
ALTER TABLE `ratingprice`
  ADD PRIMARY KEY (`RatingID`),
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
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `jobmatchsearch`
--
ALTER TABLE `jobmatchsearch`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobmatchskill`
--
ALTER TABLE `jobmatchskill`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobmatchtype`
--
ALTER TABLE `jobmatchtype`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skilllist`
--
ALTER TABLE `skilllist`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skilltype`
--
ALTER TABLE `skilltype`
  MODIFY `IndexNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
