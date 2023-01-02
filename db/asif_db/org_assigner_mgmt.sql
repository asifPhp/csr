-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 22, 2021 at 11:15 AM
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
-- Table structure for table `org_assigner_mgmt`
--

DROP TABLE IF EXISTS `org_assigner_mgmt`;
CREATE TABLE IF NOT EXISTS `org_assigner_mgmt` (
  `mgmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) DEFAULT NULL,
  `ngo_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `user_type` varchar(200) NOT NULL COMMENT '"normal",''approver'',''field''',
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`mgmt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_assigner_mgmt`
--

INSERT INTO `org_assigner_mgmt` (`mgmt_id`, `org_id`, `ngo_id`, `prop_id`, `user_type`, `staff_id`) VALUES
(1, 4, 137, 236, 'normal', 25),
(2, 4, 137, 236, 'approver', 26),
(3, 4, 137, 236, 'field', 26),
(4, 4, 138, 237, 'normal', 25),
(5, 4, 138, 237, 'approver', 25),
(6, 4, 138, 237, 'field', 26),
(7, 4, 139, 238, 'normal', 25),
(8, 4, 139, 238, 'approver', 25),
(9, 4, 139, 238, 'field', 26),
(10, 4, 140, 239, 'normal', 26),
(11, 4, 140, 239, 'approver', 25),
(12, 4, 140, 239, 'field', 26),
(13, 4, 142, 241, 'normal', 25),
(14, 4, 142, 241, 'approver', 25),
(15, 4, 142, 241, 'field', 25),
(16, 4, 143, 242, 'normal', 26),
(17, 4, 143, 242, 'approver', 25),
(18, 4, 143, 242, 'field', 25);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
