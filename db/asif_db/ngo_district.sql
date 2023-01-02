-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 18, 2021 at 05:46 AM
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
-- Table structure for table `ngo_district`
--

DROP TABLE IF EXISTS `ngo_district`;
CREATE TABLE IF NOT EXISTS `ngo_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ngo_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_district`
--

INSERT INTO `ngo_district` (`id`, `ngo_id`, `state_id`, `district_id`) VALUES
(275, 228, 6, 72),
(274, 228, 6, 71),
(273, 228, 6, 70),
(272, 228, 6, 68),
(271, 228, 6, 69),
(270, 228, 6, 67),
(269, 228, 6, 66),
(268, 228, 6, 65),
(267, 228, 6, 64),
(266, 228, 6, 63),
(265, 228, 6, 62),
(264, 228, 6, 61),
(263, 228, 6, 60),
(262, 228, 6, 59),
(261, 228, 6, 58),
(260, 228, 6, 57),
(259, 228, 6, 56),
(258, 228, 6, 55),
(257, 228, 6, 54),
(256, 228, 6, 53),
(255, 228, 6, 52),
(254, 228, 6, 51),
(253, 228, 6, 50),
(252, 228, 6, 49),
(251, 228, 6, 48),
(250, 228, 6, 47),
(249, 228, 6, 46),
(248, 228, 6, 45),
(247, 228, 6, 44),
(246, 228, 6, 43),
(245, 228, 6, 42),
(244, 228, 6, 41),
(243, 228, 6, 39),
(242, 228, 6, 40);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
