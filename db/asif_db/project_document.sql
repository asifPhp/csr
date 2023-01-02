-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 31, 2020 at 01:57 PM
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
-- Table structure for table `project_document`
--

DROP TABLE IF EXISTS `project_document`;
CREATE TABLE IF NOT EXISTS `project_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `document_value` varchar(500) NOT NULL,
  `document_value_actual` varchar(100) NOT NULL,
  `document_updated_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_document`
--

INSERT INTO `project_document` (`id`, `project_id`, `document_type`, `document_name`, `document_value`, `document_value_actual`, `document_updated_date`) VALUES
(1, 11, 'ngo_document_list', 'ngo doc 1', '1606459110.png', '', '2020-12-30'),
(2, 11, 'csr_document_list', 'csr doc 2', 'entity_5fedabcfce14e.png', 'card-icon-2.png', '2020-12-30'),
(3, 11, 'payment_processing_doc', 'document', 'entity_5fb5eb4a1ac4c.PNG', '', '2020-12-30'),
(4, 11, 'ngo_document_list', 'ngo doc 1', '1606459110.png', '', '2020-12-30'),
(5, 11, 'ngo_document_list', ' ngo doc 2', '1606459110.png', '', '2020-12-30'),
(6, 11, 'csr_document_list', 'csr doc 1', 'entity_5fedabd700207.png', 'footer-icon.png', '2020-12-30'),
(7, 11, 'csr_document_list', ' csr doc 2', 'entity_5fedaa6f40444.png', 'card-icon-2.png', '2020-12-30'),
(8, 11, 'payment_processing_doc', '', 'entity_5fb5eb4a1ac4c.PNG', '', '2020-12-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
