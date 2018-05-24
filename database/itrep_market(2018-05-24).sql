-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 06:41 PM
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `job_id`, `sender_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 13, 2, 3, 'Hi', '2018-05-08 04:56:16', '0000-00-00 00:00:00'),
(2, 13, 3, 2, 'Hi juga', '2018-05-08 05:09:23', '0000-00-00 00:00:00'),
(3, 13, 3, 2, 'mau tanya dong', '2018-05-08 05:32:33', '2018-05-08 05:32:33'),
(4, 13, 3, 2, 'test', '2018-05-08 05:32:48', '2018-05-08 05:32:48'),
(5, 13, 2, 3, 'ya ada yang bisa di bantu?', '2018-05-08 05:33:23', '2018-05-08 05:33:23'),
(6, 13, 2, 3, 'ya??', '2018-05-08 13:07:31', '2018-05-08 13:07:31'),
(7, 13, 2, 3, 'asasa', '2018-05-08 13:10:24', '2018-05-08 13:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_name`) VALUES
(1, 'USD'),
(2, 'IDR');

-- --------------------------------------------------------

--
-- Table structure for table `job_agreement`
--

CREATE TABLE `job_agreement` (
  `agreement_id` int(11) NOT NULL,
  `job_match_id` varchar(25) NOT NULL,
  `agreement_desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_creator`
--

CREATE TABLE `job_creator` (
  `company_id` int(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_profile` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `group_id` varchar(5) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_creator`
--

INSERT INTO `job_creator` (`company_id`, `email_address`, `password`, `company_name`, `company_address`, `company_profile`, `phone`, `group_id`, `status`, `updated_at`, `created_at`) VALUES
(2, '123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'suka suka', 'Bojong Indah', 'Jakarta', '12313123', 'jc', 'active', '2018-01-08 23:45:37', '2018-01-08 23:45:37'),
(3, 'vincent@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gregory', 'Jakarta', 'Jakarta', '123456', 'jc', 'active', '2018-04-11 06:33:48', '2018-04-11 06:33:48'),
(5, 'jorjonna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Emetra', 'Emetra', 'Emetra', '081289256242', 'jc', 'active', '2018-04-23 23:42:00', '2018-04-23 23:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_finder`
--

CREATE TABLE `job_finder` (
  `finder_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `group_id` varchar(5) NOT NULL,
  `total_rating` varchar(50) NOT NULL DEFAULT '',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `profile_pict` varchar(255) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_finder`
--

INSERT INTO `job_finder` (`finder_id`, `username`, `password`, `email_address`, `address`, `phone`, `group_id`, `total_rating`, `status`, `profile_pict`, `updated_at`, `created_at`) VALUES
(1, 'vincent1234', 'e10adc3949ba59abbe56e057f20f883e', '123@gmail.com', 'bojong indahs', '23', 'jf', '0', 'active', '2018-05-24 22:52:26-IMG_8378.JPG', '2018-05-24 23:33:24', '2017-12-02 01:36:12'),
(2, 'vincent12', 'e10adc3949ba59abbe56e057f20f883e', 'vincent123@gmail.com', 'bojong indahs', '1232131234', 'jf', '4.333333333333333', 'active', '', '2018-05-17 18:41:55', '2017-12-02 14:05:14'),
(3, 'Jorjonna', 'e10adc3949ba59abbe56e057f20f883e', 'jorjonna@gmail.com', 'citra 2', '0000', 'jf', '0', 'active', '', '2018-04-23 23:07:55', '2018-01-09 11:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `job_master`
--

CREATE TABLE `job_master` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `jc_email_address` varchar(50) NOT NULL,
  `expired_date` varchar(30) NOT NULL,
  `has_seen_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `price_list` varchar(20) NOT NULL,
  `job_status` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_master`
--

INSERT INTO `job_master` (`job_id`, `job_title`, `description`, `jc_email_address`, `expired_date`, `has_seen_id`, `currency_id`, `price_list`, `job_status`, `payment_type_id`, `created_at`, `updated_at`) VALUES
(8, 'Rayon', 'test job 1', '123@gmail.com', '03/27/2018', 3, 2, '1235600', 2, 1, '2018-03-15 20:15:40', '2018-04-22 20:28:15'),
(9, 'susah susah', 'test susah', '123@gmail.com', '03/01/2018', 1, 2, '123500', 2, 2, '2018-03-15 20:31:42', '2018-04-24 19:56:05'),
(10, 'tralala', 'Test tralala', '123@gmail.com', '04/03/2018', 4, 2, '125000', 2, 2, '2018-04-21 00:27:17', '2018-04-24 19:53:04'),
(11, 'test job 3', 'damns', '123@gmail.com', '04/03/2018', 1, 2, '150000', 6, 1, '2018-04-21 20:12:17', '2018-04-21 20:17:56'),
(12, 'Test Job', 'this is for testing purpose only', '123@gmail.com', '05/31/2018', 0, 2, '1500000', 1, 1, '2018-04-22 16:01:20', '2018-05-08 11:03:41'),
(13, 'Test Job 2', 'testing purpose', '123@gmail.com', '04/30/2018', 3, 2, '5000000', 1, 1, '2018-04-22 19:56:03', '2018-05-08 11:04:01'),
(14, 'test job full payment', 'test full', '123@gmail.com', '04/25/2018', 1, 1, '50', 2, 1, '2018-04-24 20:02:42', '2018-05-17 18:41:55'),
(15, 'test job milestone', 'test milestone', '123@gmail.com', '04/25/2018', 1, 1, '1800', 2, 2, '2018-04-24 20:40:31', '2018-04-24 20:50:46'),
(16, 'test job 30', 'test job 3', '123@gmail.com', '06/01/2018', 2, 1, '150', 6, 1, '2018-05-17 18:46:32', '2018-05-17 18:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `job_master_detail_milestone`
--

CREATE TABLE `job_master_detail_milestone` (
  `job_detail_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `milestone_detail` text NOT NULL,
  `milestone_price` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_master_detail_milestone`
--

INSERT INTO `job_master_detail_milestone` (`job_detail_id`, `job_id`, `milestone_detail`, `milestone_price`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 8, 'test1', 55, 6, '2018-04-18 21:06:30', '2018-04-22 20:28:15'),
(2, 8, 'test2', 5660, 6, '2018-04-18 21:06:30', '2018-04-22 20:28:15'),
(3, 8, 'test3', 234, 6, '2018-04-18 21:06:30', '2018-04-22 20:28:15'),
(4, 10, 'test1', 50, 6, '2018-04-21 16:04:40', '2018-04-24 19:53:04'),
(5, 10, 'test2', 123, 6, '2018-04-21 16:04:40', '2018-04-24 19:53:04'),
(6, 10, 'test3', 150, 6, '2018-04-21 16:04:40', '2018-04-24 19:53:04'),
(7, 15, 'test 1', 500, 6, '2018-04-24 20:42:01', '2018-04-24 20:50:46'),
(8, 15, 'trest2', 600, 6, '2018-04-24 20:42:01', '2018-04-24 20:50:46'),
(9, 15, 'test 3', 700, 6, '2018-04-24 20:42:01', '2018-04-24 20:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `job_match_search`
--

CREATE TABLE `job_match_search` (
  `job_match_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `jf_email_address` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_match_search`
--

INSERT INTO `job_match_search` (`job_match_id`, `job_id`, `jf_email_address`, `status_id`, `created_at`, `updated_at`) VALUES
(3, 8, '123@gmail.com', 7, '2018-03-15 13:17:41', '2018-04-18 14:06:29'),
(4, 9, '123@gmail.com', 6, '2018-03-15 13:32:23', '2018-04-15 15:26:39'),
(5, 10, 'vincent123@gmail.com', 6, '2018-04-20 17:47:19', '2018-04-21 09:04:40'),
(6, 11, 'vincent123@gmail.com', 6, '2018-04-21 13:12:52', '2018-04-21 13:17:56'),
(7, 14, 'vincent123@gmail.com', 6, '2018-04-24 13:03:32', '2018-04-24 13:03:55'),
(8, 15, 'vincent123@gmail.com', 6, '2018-04-24 13:41:10', '2018-04-24 13:42:01'),
(9, 13, 'jorjonna@gmail.com', 1, '2018-05-08 03:59:40', '2018-05-08 03:59:40'),
(10, 16, 'vincent123@gmail.com', 6, '2018-05-17 11:51:18', '2018-05-17 11:52:28'),
(11, 16, '123@gmail.com', 1, '2018-05-17 11:51:45', '2018-05-17 11:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `job_match_skill`
--

CREATE TABLE `job_match_skill` (
  `skill_job_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_match_skill`
--

INSERT INTO `job_match_skill` (`skill_job_id`, `job_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(2, 8, 1, '2018-03-15 20:15:55', '2018-03-15 20:15:55'),
(3, 9, 1, '2018-03-15 20:31:50', '2018-03-15 20:31:50'),
(4, 10, 1, '2018-04-21 00:29:41', '2018-04-21 00:29:41'),
(5, 11, 1, '2018-04-21 20:12:30', '2018-04-21 20:12:30'),
(6, 12, 2, '2018-04-22 16:14:46', '2018-04-22 16:14:46'),
(7, 13, 2, '2018-04-22 19:56:22', '2018-04-22 19:56:22'),
(8, 13, 1, '2018-04-22 19:56:27', '2018-04-22 19:56:27'),
(9, 14, 1, '2018-04-24 20:02:56', '2018-04-24 20:02:56'),
(10, 15, 1, '2018-04-24 20:40:39', '2018-04-24 20:40:39'),
(11, 16, 1, '2018-05-17 18:50:48', '2018-05-17 18:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `job_match_type`
--

CREATE TABLE `job_match_type` (
  `type_job_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_match_type`
--

INSERT INTO `job_match_type` (`type_job_id`, `job_id`, `job_type_id`, `created_at`, `updated_at`) VALUES
(8, 8, 1, '2018-03-15 20:15:43', '2018-03-15 20:15:43'),
(9, 9, 1, '2018-03-15 20:31:45', '2018-03-15 20:31:45'),
(10, 10, 2, '2018-04-21 00:28:12', '2018-04-21 00:28:12'),
(11, 10, 1, '2018-04-21 00:28:19', '2018-04-21 00:28:19'),
(12, 11, 1, '2018-04-21 20:12:20', '2018-04-21 20:12:20'),
(13, 12, 1, '2018-04-22 16:10:10', '2018-04-22 16:10:10'),
(14, 13, 1, '2018-04-22 19:56:06', '2018-04-22 19:56:06'),
(15, 14, 1, '2018-04-24 20:02:44', '2018-04-24 20:02:44'),
(16, 15, 1, '2018-04-24 20:40:33', '2018-04-24 20:40:33'),
(17, 16, 1, '2018-05-17 18:50:42', '2018-05-17 18:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `job_type_id` int(11) NOT NULL,
  `job_type_desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`job_type_id`, `job_type_desc`, `created_at`, `updated_at`) VALUES
(1, 'Backend Programming (API, PHP)', NULL, NULL),
(2, 'Front End Programming (HTML, CSS)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_user_rating`
--

CREATE TABLE `job_user_rating` (
  `rating_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` varchar(5) NOT NULL,
  `rating_score` int(11) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_user_rating`
--

INSERT INTO `job_user_rating` (`rating_id`, `job_id`, `user_id`, `group_id`, `rating_score`, `updated_at`, `created_at`) VALUES
(2, 14, 1, 'jf', 2, '2018-05-15 11:44:39', '2018-05-15 11:44:39'),
(3, 14, 1, 'jf', 3, '2018-05-15 11:44:39', '2018-05-15 11:44:39'),
(7, 14, 2, 'jf', 5, '2018-05-17 18:36:57', '2018-05-17 18:36:57'),
(8, 14, 2, 'jf', 4, '2018-05-17 18:40:02', '2018-05-17 18:40:02'),
(9, 14, 2, 'jf', 4, '2018-05-17 18:41:55', '2018-05-17 18:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`admin_id`, `username`, `password`, `email_address`, `updated_at`, `created_at`) VALUES
(1, 'vincent123', 'e10adc3949ba59abbe56e057f20f883e', '123@gmail.com', '2018-04-03 22:23:29', '2018-04-03 22:23:29'),
(2, 'vincenttest', 'e10adc3949ba59abbe56e057f20f883e', '123@gmail.com', '2018-04-03 22:24:26', '2018-04-03 22:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `master_difficulty`
--

CREATE TABLE `master_difficulty` (
  `diff_id` int(11) NOT NULL,
  `diff_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_difficulty`
--

INSERT INTO `master_difficulty` (`diff_id`, `diff_name`) VALUES
(1, 'Easy'),
(2, 'Moderate');

-- --------------------------------------------------------

--
-- Table structure for table `master_menu`
--

CREATE TABLE `master_menu` (
  `menu_id` varchar(25) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `url_route_menu` varchar(255) NOT NULL,
  `route_menu` varchar(50) NOT NULL,
  `seq` int(11) NOT NULL,
  `menu_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menu`
--

INSERT INTO `master_menu` (`menu_id`, `menu_name`, `url_route_menu`, `route_menu`, `seq`, `menu_description`, `created_at`, `updated_at`) VALUES
('TS001', 'Profile', '/profile', 'ProfileController@create', 1, 'Register Profile with CV', NULL, NULL),
('TS002', 'Search Job', '/marketplace', 'JobMarketController@create', 2, 'Job Browsing', NULL, NULL),
('TS003', 'Register Job', '/jobregistration', 'JobRegistrationController@create', 3, 'Form to register Job Market Place', NULL, NULL),
('TS004', 'Resume', '/resume', 'ResumeController@create', 4, 'Job Finder Resume', NULL, NULL),
('TS005', 'Company Profile', '/companyprofile', 'CompanyProfileController@create', 5, 'Company Profile', NULL, NULL),
('TS006', 'History', '/history', 'JobHistoryController@create', 6, 'History bidding', NULL, NULL),
('TS007', 'Job Agreement', '/jobagreement', 'JobAgreementController@create', 7, 'Job Agreement show deal and undeal projects', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_payment_type`
--

CREATE TABLE `master_payment_type` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_payment_type`
--

INSERT INTO `master_payment_type` (`payment_type_id`, `payment_type_name`) VALUES
(1, 'Full'),
(2, 'Per milestone');

-- --------------------------------------------------------

--
-- Table structure for table `master_status`
--

CREATE TABLE `master_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_status`
--

INSERT INTO `master_status` (`status_id`, `status_name`) VALUES
(1, 'Open'),
(2, 'Closed'),
(3, 'Filled'),
(4, 'Reviewed'),
(5, 'Review done'),
(6, 'Accepted'),
(7, 'Rejected'),
(8, 'Removed');

-- --------------------------------------------------------

--
-- Table structure for table `skill_list`
--

CREATE TABLE `skill_list` (
  `skill_list_id` int(11) NOT NULL,
  `jf_email_address` varchar(255) NOT NULL,
  `skill_id` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_list`
--

INSERT INTO `skill_list` (`skill_list_id`, `jf_email_address`, `skill_id`, `created_at`, `updated_at`) VALUES
(3, '123@gmail.com', '1', '2018-02-28 16:37:17', '2018-02-28 16:37:17'),
(4, '123@gmail.com', '2', '2018-02-28 16:42:16', '2018-02-28 16:42:16'),
(5, 'vincent123@gmail.com', '1', '2018-04-21 09:02:07', '2018-04-21 09:02:07'),
(6, 'jorjonna@gmail.com', '2', '2018-04-22 13:39:51', '2018-04-22 13:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `skill_type`
--

CREATE TABLE `skill_type` (
  `skill_id` int(11) NOT NULL,
  `skill_type` varchar(255) NOT NULL,
  `skill_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_type`
--

INSERT INTO `skill_type` (`skill_id`, `skill_type`, `skill_description`, `created_at`, `updated_at`) VALUES
(1, 'Cobol', 'Programming Language', NULL, NULL),
(2, 'PHP', 'Programming Language', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `user_menu_id` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`user_menu_id`, `group_id`, `menu_id`, `created_at`, `updated_at`) VALUES
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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `job_agreement`
--
ALTER TABLE `job_agreement`
  ADD PRIMARY KEY (`agreement_id`);

--
-- Indexes for table `job_creator`
--
ALTER TABLE `job_creator`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `job_finder`
--
ALTER TABLE `job_finder`
  ADD PRIMARY KEY (`finder_id`);

--
-- Indexes for table `job_master`
--
ALTER TABLE `job_master`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_master_detail_milestone`
--
ALTER TABLE `job_master_detail_milestone`
  ADD PRIMARY KEY (`job_detail_id`);

--
-- Indexes for table `job_match_search`
--
ALTER TABLE `job_match_search`
  ADD PRIMARY KEY (`job_match_id`);

--
-- Indexes for table `job_match_skill`
--
ALTER TABLE `job_match_skill`
  ADD PRIMARY KEY (`skill_job_id`);

--
-- Indexes for table `job_match_type`
--
ALTER TABLE `job_match_type`
  ADD PRIMARY KEY (`type_job_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `job_user_rating`
--
ALTER TABLE `job_user_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `master_difficulty`
--
ALTER TABLE `master_difficulty`
  ADD PRIMARY KEY (`diff_id`);

--
-- Indexes for table `master_menu`
--
ALTER TABLE `master_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `seq` (`seq`);

--
-- Indexes for table `master_payment_type`
--
ALTER TABLE `master_payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `master_status`
--
ALTER TABLE `master_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `skill_list`
--
ALTER TABLE `skill_list`
  ADD PRIMARY KEY (`skill_list_id`);

--
-- Indexes for table `skill_type`
--
ALTER TABLE `skill_type`
  ADD PRIMARY KEY (`skill_id`),
  ADD UNIQUE KEY `SkillID` (`skill_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`user_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_agreement`
--
ALTER TABLE `job_agreement`
  MODIFY `agreement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_creator`
--
ALTER TABLE `job_creator`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `job_finder`
--
ALTER TABLE `job_finder`
  MODIFY `finder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job_master`
--
ALTER TABLE `job_master`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `job_master_detail_milestone`
--
ALTER TABLE `job_master_detail_milestone`
  MODIFY `job_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `job_match_search`
--
ALTER TABLE `job_match_search`
  MODIFY `job_match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_match_skill`
--
ALTER TABLE `job_match_skill`
  MODIFY `skill_job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_match_type`
--
ALTER TABLE `job_match_type`
  MODIFY `type_job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `job_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_user_rating`
--
ALTER TABLE `job_user_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_difficulty`
--
ALTER TABLE `master_difficulty`
  MODIFY `diff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_payment_type`
--
ALTER TABLE `master_payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_status`
--
ALTER TABLE `master_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `skill_list`
--
ALTER TABLE `skill_list`
  MODIFY `skill_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `skill_type`
--
ALTER TABLE `skill_type`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
