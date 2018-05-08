# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.38)
# Database: itrep_market
# Generation Time: 2018-05-08 05:46:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table chat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;

INSERT INTO `chat` (`id`, `job_id`, `sender_id`, `receiver_id`, `message`, `created_at`, `updated_at`)
VALUES
	(1,13,2,3,'Hi','2018-05-08 11:56:16','0000-00-00 00:00:00'),
	(2,13,3,2,'Hi juga','2018-05-08 12:09:23','0000-00-00 00:00:00'),
	(3,13,3,2,'mau tanya dong','2018-05-08 12:32:33','2018-05-08 12:32:33'),
	(4,13,3,2,'test','2018-05-08 12:32:48','2018-05-08 12:32:48'),
	(5,13,2,3,'ya ada yang bisa di bantu?','2018-05-08 12:33:23','2018-05-08 12:33:23');

/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table currency
# ------------------------------------------------------------

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;

INSERT INTO `currency` (`currency_id`, `currency_name`)
VALUES
	(1,'USD'),
	(2,'IDR');

/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_agreement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_agreement`;

CREATE TABLE `job_agreement` (
  `agreement_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_match_id` varchar(25) NOT NULL,
  `agreement_desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`agreement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table job_creator
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_creator`;

CREATE TABLE `job_creator` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_profile` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `group_id` varchar(5) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `job_creator` WRITE;
/*!40000 ALTER TABLE `job_creator` DISABLE KEYS */;

INSERT INTO `job_creator` (`company_id`, `email_address`, `password`, `company_name`, `company_address`, `company_profile`, `phone`, `group_id`, `status`, `updated_at`, `created_at`)
VALUES
	(2,'123@gmail.com','e10adc3949ba59abbe56e057f20f883e','suka suka','Bojong Indah','Jakarta','12313123','jc','active','2018-01-08 23:45:37','2018-01-08 23:45:37'),
	(3,'vincent@gmail.com','e10adc3949ba59abbe56e057f20f883e','Gregory','Jakarta','Jakarta','123456','jc','active','2018-04-11 06:33:48','2018-04-11 06:33:48'),
	(5,'jorjonna@gmail.com','e10adc3949ba59abbe56e057f20f883e','Emetra','Emetra','Emetra','081289256242','jc','active','2018-04-23 23:42:00','2018-04-23 23:10:42');

/*!40000 ALTER TABLE `job_creator` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_finder
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_finder`;

CREATE TABLE `job_finder` (
  `finder_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `group_id` varchar(5) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  PRIMARY KEY (`finder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

LOCK TABLES `job_finder` WRITE;
/*!40000 ALTER TABLE `job_finder` DISABLE KEYS */;

INSERT INTO `job_finder` (`finder_id`, `username`, `password`, `email_address`, `address`, `phone`, `group_id`, `status`, `updated_at`, `created_at`)
VALUES
	(1,'vincent1234','e10adc3949ba59abbe56e057f20f883e','123@gmail.com','bojong indahs','23','jf','active','2018-04-05 00:54:53','2017-12-02 01:36:12'),
	(2,'vincent12','e10adc3949ba59abbe56e057f20f883e','vincent123@gmail.com','bojong indahs','1232131234','jf','active','2018-04-21 16:02:11','2017-12-02 14:05:14'),
	(3,'Jorjonna','e10adc3949ba59abbe56e057f20f883e','jorjonna@gmail.com','citra 2','0000','jf','active','2018-04-23 23:07:55','2018-01-09 11:06:26');

/*!40000 ALTER TABLE `job_finder` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_master
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_master`;

CREATE TABLE `job_master` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` varchar(50) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

LOCK TABLES `job_master` WRITE;
/*!40000 ALTER TABLE `job_master` DISABLE KEYS */;

INSERT INTO `job_master` (`job_id`, `job_title`, `description`, `jc_email_address`, `expired_date`, `has_seen_id`, `currency_id`, `price_list`, `job_status`, `payment_type_id`, `created_at`, `updated_at`)
VALUES
	(8,'Rayon','test job 1','123@gmail.com','03/27/2018',3,2,'1235600',2,1,'2018-03-15 20:15:40','2018-04-22 20:28:15'),
	(9,'susah susah','test susah','123@gmail.com','03/01/2018',1,2,'123500',2,2,'2018-03-15 20:31:42','2018-04-24 19:56:05'),
	(10,'tralala','Test tralala','123@gmail.com','04/03/2018',4,2,'125000',2,2,'2018-04-21 00:27:17','2018-04-24 19:53:04'),
	(11,'test job 3','damns','123@gmail.com','04/03/2018',1,2,'150000',6,1,'2018-04-21 20:12:17','2018-04-21 20:17:56'),
	(12,'Test Job','this is for testing purpose only','123@gmail.com','05/31/2018',0,2,'1500000',1,1,'2018-04-22 16:01:20','2018-05-08 11:03:41'),
	(13,'Test Job 2','testing purpose','123@gmail.com','04/30/2018',3,2,'5000000',1,1,'2018-04-22 19:56:03','2018-05-08 11:04:01'),
	(14,'test job full payment','test full','123@gmail.com','04/25/2018',1,1,'50',2,1,'2018-04-24 20:02:42','2018-04-24 20:40:13'),
	(15,'test job milestone','test milestone','123@gmail.com','04/25/2018',1,1,'1800',2,2,'2018-04-24 20:40:31','2018-04-24 20:50:46');

/*!40000 ALTER TABLE `job_master` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_master_detail_milestone
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_master_detail_milestone`;

CREATE TABLE `job_master_detail_milestone` (
  `job_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `milestone_detail` text NOT NULL,
  `milestone_price` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  PRIMARY KEY (`job_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

LOCK TABLES `job_master_detail_milestone` WRITE;
/*!40000 ALTER TABLE `job_master_detail_milestone` DISABLE KEYS */;

INSERT INTO `job_master_detail_milestone` (`job_detail_id`, `job_id`, `milestone_detail`, `milestone_price`, `status_id`, `created_at`, `updated_at`)
VALUES
	(1,8,'test1',55,6,'2018-04-18 21:06:30','2018-04-22 20:28:15'),
	(2,8,'test2',5660,6,'2018-04-18 21:06:30','2018-04-22 20:28:15'),
	(3,8,'test3',234,6,'2018-04-18 21:06:30','2018-04-22 20:28:15'),
	(4,10,'test1',50,6,'2018-04-21 16:04:40','2018-04-24 19:53:04'),
	(5,10,'test2',123,6,'2018-04-21 16:04:40','2018-04-24 19:53:04'),
	(6,10,'test3',150,6,'2018-04-21 16:04:40','2018-04-24 19:53:04'),
	(7,15,'test 1',500,6,'2018-04-24 20:42:01','2018-04-24 20:50:46'),
	(8,15,'trest2',600,6,'2018-04-24 20:42:01','2018-04-24 20:50:46'),
	(9,15,'test 3',700,6,'2018-04-24 20:42:01','2018-04-24 20:50:46');

/*!40000 ALTER TABLE `job_master_detail_milestone` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_match_search
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_match_search`;

CREATE TABLE `job_match_search` (
  `job_match_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `jf_email_address` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`job_match_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

LOCK TABLES `job_match_search` WRITE;
/*!40000 ALTER TABLE `job_match_search` DISABLE KEYS */;

INSERT INTO `job_match_search` (`job_match_id`, `job_id`, `jf_email_address`, `status_id`, `created_at`, `updated_at`)
VALUES
	(3,8,'123@gmail.com',7,'2018-03-15 20:17:41','2018-04-18 21:06:29'),
	(4,9,'123@gmail.com',6,'2018-03-15 20:32:23','2018-04-15 22:26:39'),
	(5,10,'vincent123@gmail.com',6,'2018-04-21 00:47:19','2018-04-21 16:04:40'),
	(6,11,'vincent123@gmail.com',6,'2018-04-21 20:12:52','2018-04-21 20:17:56'),
	(7,14,'vincent123@gmail.com',6,'2018-04-24 20:03:32','2018-04-24 20:03:55'),
	(8,15,'vincent123@gmail.com',6,'2018-04-24 20:41:10','2018-04-24 20:42:01'),
	(9,13,'jorjonna@gmail.com',1,'2018-05-08 10:59:40','2018-05-08 10:59:40');

/*!40000 ALTER TABLE `job_match_search` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_match_skill
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_match_skill`;

CREATE TABLE `job_match_skill` (
  `skill_job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL,
  PRIMARY KEY (`skill_job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

LOCK TABLES `job_match_skill` WRITE;
/*!40000 ALTER TABLE `job_match_skill` DISABLE KEYS */;

INSERT INTO `job_match_skill` (`skill_job_id`, `job_id`, `skill_id`, `created_at`, `updated_at`)
VALUES
	(2,8,1,'2018-03-15 20:15:55','2018-03-15 20:15:55'),
	(3,9,1,'2018-03-15 20:31:50','2018-03-15 20:31:50'),
	(4,10,1,'2018-04-21 00:29:41','2018-04-21 00:29:41'),
	(5,11,1,'2018-04-21 20:12:30','2018-04-21 20:12:30'),
	(6,12,2,'2018-04-22 16:14:46','2018-04-22 16:14:46'),
	(7,13,2,'2018-04-22 19:56:22','2018-04-22 19:56:22'),
	(8,13,1,'2018-04-22 19:56:27','2018-04-22 19:56:27'),
	(9,14,1,'2018-04-24 20:02:56','2018-04-24 20:02:56'),
	(10,15,1,'2018-04-24 20:40:39','2018-04-24 20:40:39');

/*!40000 ALTER TABLE `job_match_skill` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_match_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_match_type`;

CREATE TABLE `job_match_type` (
  `type_job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`type_job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

LOCK TABLES `job_match_type` WRITE;
/*!40000 ALTER TABLE `job_match_type` DISABLE KEYS */;

INSERT INTO `job_match_type` (`type_job_id`, `job_id`, `job_type_id`, `created_at`, `updated_at`)
VALUES
	(8,8,1,'2018-03-15 20:15:43','2018-03-15 20:15:43'),
	(9,9,1,'2018-03-15 20:31:45','2018-03-15 20:31:45'),
	(10,10,2,'2018-04-21 00:28:12','2018-04-21 00:28:12'),
	(11,10,1,'2018-04-21 00:28:19','2018-04-21 00:28:19'),
	(12,11,1,'2018-04-21 20:12:20','2018-04-21 20:12:20'),
	(13,12,1,'2018-04-22 16:10:10','2018-04-22 16:10:10'),
	(14,13,1,'2018-04-22 19:56:06','2018-04-22 19:56:06'),
	(15,14,1,'2018-04-24 20:02:44','2018-04-24 20:02:44'),
	(16,15,1,'2018-04-24 20:40:33','2018-04-24 20:40:33');

/*!40000 ALTER TABLE `job_match_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table job_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_type`;

CREATE TABLE `job_type` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `job_type` WRITE;
/*!40000 ALTER TABLE `job_type` DISABLE KEYS */;

INSERT INTO `job_type` (`job_type_id`, `job_type_desc`, `created_at`, `updated_at`)
VALUES
	(1,'Backend Programming (API, PHP)',NULL,NULL),
	(2,'Front End Programming (HTML, CSS)',NULL,NULL);

/*!40000 ALTER TABLE `job_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_admin`;

CREATE TABLE `master_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `master_admin` WRITE;
/*!40000 ALTER TABLE `master_admin` DISABLE KEYS */;

INSERT INTO `master_admin` (`admin_id`, `username`, `password`, `email_address`, `updated_at`, `created_at`)
VALUES
	(1,'vincent123','e10adc3949ba59abbe56e057f20f883e','123@gmail.com','2018-04-03 22:23:29','2018-04-03 22:23:29'),
	(2,'vincenttest','e10adc3949ba59abbe56e057f20f883e','123@gmail.com','2018-04-03 22:24:26','2018-04-03 22:24:26');

/*!40000 ALTER TABLE `master_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_difficulty
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_difficulty`;

CREATE TABLE `master_difficulty` (
  `diff_id` int(11) NOT NULL AUTO_INCREMENT,
  `diff_name` varchar(50) NOT NULL,
  PRIMARY KEY (`diff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `master_difficulty` WRITE;
/*!40000 ALTER TABLE `master_difficulty` DISABLE KEYS */;

INSERT INTO `master_difficulty` (`diff_id`, `diff_name`)
VALUES
	(1,'Easy'),
	(2,'Moderate');

/*!40000 ALTER TABLE `master_difficulty` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_menu`;

CREATE TABLE `master_menu` (
  `menu_id` varchar(25) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `url_route_menu` varchar(255) NOT NULL,
  `route_menu` varchar(50) NOT NULL,
  `seq` int(11) NOT NULL,
  `menu_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `seq` (`seq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `master_menu` WRITE;
/*!40000 ALTER TABLE `master_menu` DISABLE KEYS */;

INSERT INTO `master_menu` (`menu_id`, `menu_name`, `url_route_menu`, `route_menu`, `seq`, `menu_description`, `created_at`, `updated_at`)
VALUES
	('TS001','Profile','/profile','ProfileController@create',1,'Register Profile with CV',NULL,NULL),
	('TS002','Search Job','/marketplace','JobMarketController@create',2,'Job Browsing',NULL,NULL),
	('TS003','Register Job','/jobregistration','JobRegistrationController@create',3,'Form to register Job Market Place',NULL,NULL),
	('TS004','Resume','/resume','ResumeController@create',4,'Job Finder Resume',NULL,NULL),
	('TS005','Company Profile','/companyprofile','CompanyProfileController@create',5,'Company Profile',NULL,NULL),
	('TS006','History','/history','JobHistoryController@create',6,'History bidding',NULL,NULL),
	('TS007','Job Agreement','/jobagreement','JobAgreementController@create',7,'Job Agreement show deal and undeal projects',NULL,NULL);

/*!40000 ALTER TABLE `master_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_payment_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_payment_type`;

CREATE TABLE `master_payment_type` (
  `payment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`payment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `master_payment_type` WRITE;
/*!40000 ALTER TABLE `master_payment_type` DISABLE KEYS */;

INSERT INTO `master_payment_type` (`payment_type_id`, `payment_type_name`)
VALUES
	(1,'Full'),
	(2,'Per milestone');

/*!40000 ALTER TABLE `master_payment_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_status`;

CREATE TABLE `master_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

LOCK TABLES `master_status` WRITE;
/*!40000 ALTER TABLE `master_status` DISABLE KEYS */;

INSERT INTO `master_status` (`status_id`, `status_name`)
VALUES
	(1,'Open'),
	(2,'Closed'),
	(3,'Filled'),
	(4,'Reviewed'),
	(5,'Review done'),
	(6,'Accepted'),
	(7,'Rejected'),
	(8,'Removed');

/*!40000 ALTER TABLE `master_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table skill_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skill_list`;

CREATE TABLE `skill_list` (
  `skill_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `jf_email_address` varchar(255) NOT NULL,
  `skill_id` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`skill_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `skill_list` WRITE;
/*!40000 ALTER TABLE `skill_list` DISABLE KEYS */;

INSERT INTO `skill_list` (`skill_list_id`, `jf_email_address`, `skill_id`, `created_at`, `updated_at`)
VALUES
	(3,'123@gmail.com','1','2018-02-28 23:37:17','2018-02-28 23:37:17'),
	(4,'123@gmail.com','2','2018-02-28 23:42:16','2018-02-28 23:42:16'),
	(5,'vincent123@gmail.com','1','2018-04-21 16:02:07','2018-04-21 16:02:07'),
	(6,'jorjonna@gmail.com','2','2018-04-22 20:39:51','2018-04-22 20:39:51');

/*!40000 ALTER TABLE `skill_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table skill_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skill_type`;

CREATE TABLE `skill_type` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_type` varchar(255) NOT NULL,
  `skill_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `SkillID` (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `skill_type` WRITE;
/*!40000 ALTER TABLE `skill_type` DISABLE KEYS */;

INSERT INTO `skill_type` (`skill_id`, `skill_type`, `skill_description`, `created_at`, `updated_at`)
VALUES
	(1,'Cobol','Programming Language',NULL,NULL),
	(2,'PHP','Programming Language',NULL,NULL);

/*!40000 ALTER TABLE `skill_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `user_menu_id` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;

INSERT INTO `user_menu` (`user_menu_id`, `group_id`, `menu_id`, `created_at`, `updated_at`)
VALUES
	('UM001','JF','TS001',NULL,NULL),
	('UM002','JF','TS002',NULL,NULL),
	('UM003','JC','TS003',NULL,NULL),
	('UM004','JC','TS004',NULL,NULL),
	('UM005','JC','TS005',NULL,NULL),
	('UM006','JF','TS006',NULL,NULL),
	('UM007','JC','TS007',NULL,NULL);

/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
