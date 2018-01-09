# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: itrep_market
# Generation Time: 2018-01-09 05:01:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table jobagreement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobagreement`;

CREATE TABLE `jobagreement` (
  `IndexNo` int(11) NOT NULL AUTO_INCREMENT,
  `AgreementID` varchar(25) NOT NULL,
  `JobMatchID` varchar(25) NOT NULL,
  `AgreementDesc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`AgreementID`),
  KEY `IndexNo` (`IndexNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table jobcreator
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobcreator`;

CREATE TABLE `jobcreator` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAddress` varchar(255) NOT NULL,
  `CreditCard` varchar(50) NOT NULL,
  `CompanyProfile` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `groupid` varchar(5) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `jobcreator` WRITE;
/*!40000 ALTER TABLE `jobcreator` DISABLE KEYS */;

INSERT INTO `jobcreator` (`CompanyID`, `EmailAddress`, `Password`, `CompanyName`, `CompanyAddress`, `CreditCard`, `CompanyProfile`, `Phone`, `groupid`, `updated_at`, `created_at`)
VALUES
	(1,'vincent@gmail.com','123456','Jayabaya','Jakarta','12313123','Jakarta','12312312','JC','2017-11-11 14:43:43','2017-11-11 14:43:43'),
	(2,'123@gmail.com','e10adc3949ba59abbe56e057f20f883e','suka suka','Bojong Indah','12313123123','Jakarta','12313123','JC','2018-01-08 23:45:37','2018-01-08 23:45:37');

/*!40000 ALTER TABLE `jobcreator` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jobfinder
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobfinder`;

CREATE TABLE `jobfinder` (
  `finderid` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `groupid` varchar(5) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  PRIMARY KEY (`finderid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

LOCK TABLES `jobfinder` WRITE;
/*!40000 ALTER TABLE `jobfinder` DISABLE KEYS */;

INSERT INTO `jobfinder` (`finderid`, `UserName`, `Password`, `EmailAddress`, `Address`, `Phone`, `groupid`, `updated_at`, `created_at`)
VALUES
	(1,'vincent123','e10adc3949ba59abbe56e057f20f883e','123@gmail.com','bojong indah','123213123123','JF','2017-12-02 01:36:12','2017-12-02 01:36:12'),
	(2,'vincent1','e10adc3949ba59abbe56e057f20f883e','vincent123@gmail.com','bojong indah','123213123','JF','2017-12-02 14:05:14','2017-12-02 14:05:14'),
	(3,'Jorjonna','e10adc3949ba59abbe56e057f20f883e','jorjonna@gmail.com','citra 2','0000','JF','2018-01-09 11:15:40','2018-01-09 11:06:26');

/*!40000 ALTER TABLE `jobfinder` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jobmatchsearch
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobmatchsearch`;

CREATE TABLE `jobmatchsearch` (
  `IndexNo` int(11) NOT NULL AUTO_INCREMENT,
  `JobMatchID` varchar(25) NOT NULL,
  `JobID` varchar(25) NOT NULL,
  `SkillListID` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`JobMatchID`),
  KEY `IndexNo` (`IndexNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table jobtype
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobtype`;

CREATE TABLE `jobtype` (
  `IndexNo` int(11) NOT NULL AUTO_INCREMENT,
  `JobTypeID` varchar(25) NOT NULL,
  `JobTypeDesc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`JobTypeID`),
  KEY `IndexNo` (`IndexNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `jobtype` WRITE;
/*!40000 ALTER TABLE `jobtype` DISABLE KEYS */;

INSERT INTO `jobtype` (`IndexNo`, `JobTypeID`, `JobTypeDesc`, `created_at`, `updated_at`)
VALUES
	(1,'Backend','Backend Programming (API, PHP)',NULL,NULL),
	(2,'Front End','Front End Programming (HTML, CSS)',NULL,NULL);

/*!40000 ALTER TABLE `jobtype` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mastermenu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mastermenu`;

CREATE TABLE `mastermenu` (
  `menuid` varchar(25) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `urlroutemenu` varchar(255) NOT NULL,
  `routemenu` varchar(50) NOT NULL,
  `seq` int(11) NOT NULL,
  `menudescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menuid`),
  KEY `seq` (`seq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `mastermenu` WRITE;
/*!40000 ALTER TABLE `mastermenu` DISABLE KEYS */;

INSERT INTO `mastermenu` (`menuid`, `menuname`, `urlroutemenu`, `routemenu`, `seq`, `menudescription`, `created_at`, `updated_at`)
VALUES
	('TS001','Profile Registration','/profile','ProfileController@create',1,'Register Profile with CV',NULL,NULL),
	('TS002','Job Marketplace','/marketplace','JobMarketController@create',2,'Job Browsing',NULL,NULL),
	('TS003','Job Market Place Registration','/jobregistration','JobRegistrationController@create',3,'Form to register Job Market Place',NULL,NULL),
	('TS004','Resume','/resume','ResumeController@create',4,'Job Finder Resume',NULL,NULL);

/*!40000 ALTER TABLE `mastermenu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projectjobrequirement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projectjobrequirement`;

CREATE TABLE `projectjobrequirement` (
  `IndexNo` int(11) NOT NULL AUTO_INCREMENT,
  `JobID` varchar(25) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `JCEmailAddress` varchar(255) NOT NULL,
  `JobType` varchar(25) NOT NULL,
  `JobTypeDesc` varchar(255) NOT NULL,
  `JobName` varchar(255) NOT NULL,
  `JobDescription` varchar(255) NOT NULL,
  `PriceList` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`JobID`),
  KEY `IndexNo` (`IndexNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table skilllist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skilllist`;

CREATE TABLE `skilllist` (
  `IndexNo` int(11) NOT NULL AUTO_INCREMENT,
  `SkillListID` varchar(25) NOT NULL,
  `JFEmailAddress` varchar(255) NOT NULL,
  `SkillID` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SkillListID`),
  KEY `IndexNo` (`IndexNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `skilllist` WRITE;
/*!40000 ALTER TABLE `skilllist` DISABLE KEYS */;

INSERT INTO `skilllist` (`IndexNo`, `SkillListID`, `JFEmailAddress`, `SkillID`, `created_at`, `updated_at`)
VALUES
	(1,'1','jorjonna@gmail.com','1','2018-01-09 11:47:44','2018-01-09 11:47:44'),
	(2,'2','jorjonna@gmail.com','2','2018-01-09 11:51:03','2018-01-09 11:51:03');

/*!40000 ALTER TABLE `skilllist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table skilltype
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skilltype`;

CREATE TABLE `skilltype` (
  `IndexNo` int(11) NOT NULL AUTO_INCREMENT,
  `SkillID` varchar(25) NOT NULL,
  `SkillType` varchar(255) NOT NULL,
  `SkillDescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SkillID`),
  UNIQUE KEY `SkillID` (`SkillID`),
  KEY `IndexNo` (`IndexNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `skilltype` WRITE;
/*!40000 ALTER TABLE `skilltype` DISABLE KEYS */;

INSERT INTO `skilltype` (`IndexNo`, `SkillID`, `SkillType`, `SkillDescription`, `created_at`, `updated_at`)
VALUES
	(1,'Cobol','Programming Language','',NULL,NULL),
	(2,'PHP','Programming Language','',NULL,NULL);

/*!40000 ALTER TABLE `skilltype` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usermenu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usermenu`;

CREATE TABLE `usermenu` (
  `usermenuid` varchar(255) NOT NULL,
  `groupid` varchar(255) NOT NULL,
  `menuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usermenuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `usermenu` WRITE;
/*!40000 ALTER TABLE `usermenu` DISABLE KEYS */;

INSERT INTO `usermenu` (`usermenuid`, `groupid`, `menuid`, `created_at`, `updated_at`)
VALUES
	('UM001','JF','TS001',NULL,NULL),
	('UM002','JF','TS002',NULL,NULL),
	('UM003','JC','TS003',NULL,NULL),
	('UM004','JC','TS004',NULL,NULL);

/*!40000 ALTER TABLE `usermenu` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
