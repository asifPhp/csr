-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2021 at 04:29 AM
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
-- Table structure for table `admin_states`
--

DROP TABLE IF EXISTS `admin_states`;
CREATE TABLE IF NOT EXISTS `admin_states` (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` mediumint UNSIGNED NOT NULL,
  `country_code` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitute` int NOT NULL,
  `latitute` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_region` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4881 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin_states`
--

INSERT INTO `admin_states` (`id`, `name`, `country_id`, `country_code`, `code`, `longitute`, `latitute`) VALUES
(4006, 'Meghalaya', 101, 'IN', 'ML', 0, 0),
(4007, 'Haryana', 101, 'IN', 'HR', 0, 0),
(4008, 'Maharashtra', 101, 'IN', 'MH', 0, 0),
(4009, 'Goa', 101, 'IN', 'GA', 0, 0),
(4010, 'Manipur', 101, 'IN', 'MN', 0, 0),
(4011, 'Puducherry', 101, 'IN', 'PY', 0, 0),
(4012, 'Telangana', 101, 'IN', 'TG', 0, 0),
(4013, 'Odisha', 101, 'IN', 'OR', 0, 0),
(4014, 'Rajasthan', 101, 'IN', 'RJ', 0, 0),
(4015, 'Punjab', 101, 'IN', 'PB', 0, 0),
(4016, 'Uttarakhand', 101, 'IN', 'UT', 0, 0),
(4017, 'Andhra Pradesh', 101, 'IN', 'AP', 0, 0),
(4018, 'Nagaland', 101, 'IN', 'NL', 0, 0),
(4019, 'Lakshadweep', 101, 'IN', 'LD', 0, 0),
(4020, 'Himachal Pradesh', 101, 'IN', 'HP', 0, 0),
(4021, 'Delhi', 101, 'IN', 'DL', 0, 0),
(4022, 'Uttar Pradesh', 101, 'IN', 'UP', 0, 0),
(4023, 'Andaman and Nicobar Islands', 101, 'IN', 'AN', 0, 0),
(4024, 'Arunachal Pradesh', 101, 'IN', 'AR', 0, 0),
(4025, 'Jharkhand', 101, 'IN', 'JH', 0, 0),
(4026, 'Karnataka', 101, 'IN', 'KA', 0, 0),
(4027, 'Assam', 101, 'IN', 'AS', 0, 0),
(4028, 'Kerala', 101, 'IN', 'KL', 0, 0),
(4029, 'Jammu and Kashmir', 101, 'IN', 'JK', 0, 0),
(4030, 'Gujarat', 101, 'IN', 'GJ', 0, 0),
(4031, 'Chandigarh', 101, 'IN', 'CH', 0, 0),
(4032, 'Dadra and Nagar Haveli', 101, 'IN', 'DN', 0, 0),
(4033, 'Daman and Diu', 101, 'IN', 'DD', 0, 0),
(4034, 'Sikkim', 101, 'IN', 'SK', 0, 0),
(4035, 'Tamil Nadu', 101, 'IN', 'TN', 0, 0),
(4036, 'Mizoram', 101, 'IN', 'MZ', 0, 0),
(4037, 'Bihar', 101, 'IN', 'BR', 0, 0),
(4038, 'Tripura', 101, 'IN', 'TR', 0, 0),
(4039, 'Madhya Pradesh', 101, 'IN', 'MP', 0, 0),
(4040, 'Chhattisgarh', 101, 'IN', 'CT', 0, 0),
(4852, 'Ladakh', 101, 'IN', 'LA', 0, 0),
(4853, 'West Bengal', 101, 'IN', 'WB', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
