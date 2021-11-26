-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2021 at 09:08 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customername` varchar(100) NOT NULL,
  `business` varchar(100) NOT NULL,
  `fieldofficer` varchar(100) NOT NULL,
  `BusinessCertificateNumber` varchar(300) DEFAULT NULL,
  `TradingName` varchar(300) DEFAULT NULL,
  `BusinessRegistrationDate` date DEFAULT NULL,
  `MobileNumber` varchar(11) DEFAULT NULL,
  `PhysicalLocation` varchar(300) DEFAULT NULL,
  `Username` varchar(300) DEFAULT NULL,
  `TPIN` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customername`, `business`, `fieldofficer`, `BusinessCertificateNumber`, `TradingName`, `BusinessRegistrationDate`, `MobileNumber`, `PhysicalLocation`, `Username`, `TPIN`) VALUES
(6, 'Chaulele', 'Chau\'s Kitchen', 'Khili', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Joe Pain', 'Pains', 'Khili', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Food Lovers', 'Food Lovers', 'Khili', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

DROP TABLE IF EXISTS `selection`;
CREATE TABLE IF NOT EXISTS `selection` (
  `user` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selection`
--

INSERT INTO `selection` (`user`, `id`) VALUES
('Khili', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(4, 'Khili', 'khili@gmail.com', '123'),
(5, 'Peter Phiri', 'pphiri@gmail.com', '123'),
(6, 'InnoDB', 'inno@gmail.com', '25d55ad283aa400af464c76d713c07ad');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
