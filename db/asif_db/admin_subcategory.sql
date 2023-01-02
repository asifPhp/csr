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
-- Table structure for table `admin_subcategory`
--

DROP TABLE IF EXISTS `admin_subcategory`;
CREATE TABLE IF NOT EXISTS `admin_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `admin_subcategory`
--

INSERT INTO `admin_subcategory` (`id`, `category_id`, `name`) VALUES
(1, 1, '(a) Eradicating hunger, poverty and malnutrition'),
(2, 1, '(b) Promoting healthcare including preventive health care'),
(3, 1, '(c) Sanitation including contribution to the Swach Bharat Kosh'),
(4, 1, '(d) Making available safe drinking water'),
(5, 2, '(a) Promoting education'),
(6, 2, '(b) Special education'),
(7, 2, '(c) Employment enhancing vocation skills among children'),
(8, 2, '(d) Employment enhancing vocation skills women'),
(9, 2, '(e) Employment enhancing vocation skills elderly'),
(10, 2, '(f) Employment enhancing vocation skills differently abled'),
(11, 2, '(g) Livelihood enhancement projects'),
(12, 3, '(a) Promoting gender equality'),
(13, 3, '(b) Empowering women'),
(14, 3, '(c) Setting up homes and hostels for women and orphans'),
(15, 3, '(d) Setting up old age homes'),
(16, 3, '(e) Day care centres and other facilities for senior citizens'),
(17, 3, '(f) Reducing inequalities faced by socially and economically backward groups'),
(18, 4, '(a) Ensuring environmental sustainability, ecological balance'),
(19, 4, '(b) Protection of flora and fauna'),
(20, 4, '(c) Animal welfare'),
(21, 4, '(d) Agroforestry'),
(22, 4, '(e) Conservation of natural resources'),
(23, 4, '(f) Maintaining quality of soil, air and water'),
(24, 4, '(g) Contribution to the Clean Ganga Fund'),
(25, 5, '(a) Protection of national heritage, art and culture'),
(26, 5, '(b) Restoration of buildings and sites of historical importance and works of art'),
(27, 5, '(c) Setting up public libraries'),
(28, 5, '(d) Promotion and development of traditional arts and handicrafts'),
(29, 6, 'Default'),
(30, 7, 'Default'),
(31, 8, 'Default'),
(32, 9, 'Default'),
(33, 10, 'Default'),
(34, 11, 'Default');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
