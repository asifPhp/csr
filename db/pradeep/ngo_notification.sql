-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2021 at 01:55 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `ngo_notification`
--

DROP TABLE IF EXISTS `ngo_notification`;
CREATE TABLE IF NOT EXISTS `ngo_notification` (
  `notification_id` int NOT NULL AUTO_INCREMENT,
  `superngo_id` int NOT NULL,
  `ngo_id` int NOT NULL,
  `org_id` int NOT NULL,
  `proposal_id` int NOT NULL,
  `project_id` int NOT NULL,
  `cycle_id` int NOT NULL,
  `status` varchar(50) NOT NULL,
  `url` varchar(500) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngo_notification`
--

INSERT INTO `ngo_notification` (`notification_id`, `superngo_id`, `ngo_id`, `org_id`, `proposal_id`, `project_id`, `cycle_id`, `status`, `url`, `description`, `created_date`, `created_time`) VALUES
(1, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfd\'dfdfdf\'', '2021-01-04', '18:16:45'),
(2, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfd\'dfdfdf\'', '2021-01-04', '18:17:22'),
(3, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfd\'dfdfdf\'', '2021-01-04', '18:19:42'),
(4, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', '\"dfdfdf\",\"dfdfdf\"', '2021-01-04', '18:28:41'),
(5, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfdfd', '2021-01-04', '18:33:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
