-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2017 at 08:48 AM
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
  `updated_at` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcreator`
--

INSERT INTO `jobcreator` (`CompanyID`, `EmailAddress`, `Password`, `CompanyName`, `CompanyAddress`, `CreditCard`, `CompanyProfile`, `Phone`, `updated_at`, `created_at`) VALUES
(1, 'vincent@gmail.com', '123456', 'Jayabaya', 'Jakarta', '12313123', 'Jakarta', '12312312', '2017-11-11 14:43:43', '2017-11-11 14:43:43'),
(2, 'vincent@gmail.com', '123456', 'Jorge', 'Jakarta', '12312312321', 'Jakarta Barat', '123131231', '2017-11-11 14:44:47', '2017-11-11 14:44:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobcreator`
--
ALTER TABLE `jobcreator`
  ADD PRIMARY KEY (`CompanyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobcreator`
--
ALTER TABLE `jobcreator`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
