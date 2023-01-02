-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 12, 2021 at 01:39 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csr`
--

-- --------------------------------------------------------

--
-- Table structure for table `financial_budget`
--

DROP TABLE IF EXISTS `financial_budget`;
CREATE TABLE IF NOT EXISTS `financial_budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `financial_id` int(11) DEFAULT NULL,
  `donor_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_budget`
--

INSERT INTO `financial_budget` (`id`, `financial_id`, `donor_id`, `org_id`, `amount`, `created_date`) VALUES
(1, 2019, 1, 1, '3434', '2021-01-12 16:10:55'),
(2, 2019, 1, 1, '434343434343434', '2021-01-12 16:13:33'),
(3, 2019, 1, 1, '4343', '2021-01-12 16:34:16'),
(4, 2019, 2, 1, '2323', '2021-01-12 16:35:23'),
(5, 2021, 1, 1, '3232323', '2021-01-12 19:04:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
