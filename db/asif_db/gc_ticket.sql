-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 08, 2021 at 02:08 PM
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
-- Table structure for table `gc_ticket`
--

DROP TABLE IF EXISTS `gc_ticket`;
CREATE TABLE IF NOT EXISTS `gc_ticket` (
  `gc_id` int(11) NOT NULL AUTO_INCREMENT,
  `ngo_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `grant_time` datetime DEFAULT NULL,
  `used_time` datetime DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `upload_grand_ticket_value` varchar(200) NOT NULL,
  `upload_grand_ticket_actual` varchar(200) NOT NULL,
  PRIMARY KEY (`gc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gc_ticket`
--

INSERT INTO `gc_ticket` (`gc_id`, `ngo_id`, `org_id`, `prop_id`, `grant_time`, `used_time`, `used`, `upload_grand_ticket_value`, `upload_grand_ticket_actual`) VALUES
(1, 15, 5, 0, '2021-03-08 12:35:33', NULL, 0, 'entity_6045ccb5ee26c.jpg', 'Koala.jpg'),
(2, 57, 5, 0, '2021-03-08 13:06:17', NULL, 0, 'entity_6045d3eebc8de.jpg', 'Koala.jpg'),
(3, 15, 5, 0, '2021-03-08 14:08:27', NULL, 0, 'entity_6045e2822a201.jpg', 'Koala.jpg'),
(4, 15, 5, 0, '2021-03-08 14:14:46', NULL, 0, 'entity_6045e3fbe22f6.jpg', 'Lighthouse.jpg'),
(5, 15, 5, 0, '2021-03-08 14:15:09', NULL, 0, 'entity_6045e413aa35a.jpg', 'Lighthouse.jpg'),
(6, 156, 5, 0, '2021-03-08 15:18:21', NULL, 1, 'entity_6045f2e261dd2.jpg', 'Koala.jpg'),
(8, 157, 5, 0, '2021-03-08 16:50:48', '2021-03-08 16:52:07', 1, 'entity_604608880553c.jpg', 'Koala.jpg'),
(9, 15, 5, 0, '2021-03-08 17:07:10', NULL, 0, 'entity_60460c6591036.jpg', 'Lighthouse.jpg'),
(10, 157, 5, 0, '2021-03-08 17:21:58', NULL, 0, 'entity_60460fdc96b6b.jpg', 'Koala.jpg'),
(11, 158, 5, 14, '2021-03-08 17:57:09', '2021-03-08 17:57:21', 1, 'entity_6046181c450cc.jpg', 'Koala.jpg'),
(12, 91, 5, 0, '2021-03-08 18:34:37', NULL, 0, 'entity_604620e478386.jpg', 'Koala.jpg'),
(13, 16, 5, 0, '2021-03-08 18:35:51', NULL, 0, 'entity_6046212ec86b9.jpg', 'Koala.jpg'),
(14, 160, 5, 0, '2021-03-08 19:32:38', NULL, 0, 'entity_60462acb278a9.jpg', 'Koala.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
