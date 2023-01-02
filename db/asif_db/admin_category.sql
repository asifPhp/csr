-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 17, 2021 at 11:49 AM
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
-- Table structure for table `admin_category`
--

DROP TABLE IF EXISTS `admin_category`;
CREATE TABLE IF NOT EXISTS `admin_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `admin_category`
--

INSERT INTO `admin_category` (`id`, `name`) VALUES
(1, '(i) Healthcare'),
(2, '(ii) Education'),
(3, '(iii) Gender'),
(4, '(iv) Environment'),
(5, '(v) National Heritage'),
(6, '(vi) Measures for the benefit of armed forces veterans, war widows and their dependents'),
(7, '(vii) Training to promote rural sports, nationally recognized sports, paralympic sports and Olympic sports'),
(8, '(viii) Contribution to the Prime Minister’s National Relief Fund or any other fund set up by the Central Government for socio-economic development and relief and welfare of the Scheduled Castes, the S'),
(9, '(ix) Contributions or funds provided to technology incubators located within academic institutions which are approved by the Central Government'),
(10, '(x) Rural development projects'),
(11, '(xi) Slum area development');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
