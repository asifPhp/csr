-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 18, 2021 at 11:04 AM
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
-- Table structure for table `org_status_list`
--

DROP TABLE IF EXISTS `org_status_list`;
CREATE TABLE IF NOT EXISTS `org_status_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `status_lable` varchar(200) CHARACTER SET utf8mb4  NOT NULL DEFAULT 'New',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `org_status_list`
--

INSERT INTO `org_status_list` (`id`, `org_id`, `page_name`, `status_lable`) VALUES
(1, 4, 'My Task', 'New'),
(2, 4, 'My Task', 'In progress'),
(3, 4, 'My Task', 'Needs Review'),
(7, 4, 'My Task', 'NGO Revised'),
(4, 4, 'My Task', 'Task Revision'),
(5, 4, 'My Task', 'Revision Ready'),
(6, 4, 'My Task', 'NGO Revision'),
(17, 1, 'My Task', 'New'),
(18, 1, 'My Task', 'In progress'),
(19, 1, 'My Task', 'Ngo Document Request'),
(20, 1, 'My Task', 'Ngo Document Request Resolved'),
(21, 1, 'My Task', 'Ngo Payemnt Document Request'),
(22, 1, 'My Task', 'Ngo Payemnt Document Request Resolved'),
(36, 4, 'My Task', 'Ngo Payemnt Document Request Resolved'),
(35, 4, 'My Task', 'Ngo Payemnt Document Request'),
(34, 4, 'My Task', 'Ngo Document Request Resolved'),
(33, 4, 'My Task', 'Ngo Document Request');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
