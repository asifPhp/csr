-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 18, 2021 at 01:03 PM
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
-- Table structure for table `financial_years`
--

DROP TABLE IF EXISTS `financial_years`;
CREATE TABLE IF NOT EXISTS `financial_years` (
  `financial_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_year` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `end_year` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`financial_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2039 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`financial_id`, `start_year`, `name`, `end_year`, `start_date`, `end_date`) VALUES
(1, 2010, '2010-11', 2011, '2011-04-01', '2012-03-31'),
(2, 2011, '2011-12', 2012, '2012-04-01', '2013-03-31'),
(3, 2012, '2012-13', 2013, '2013-04-01', '2014-03-31'),
(4, 2013, '2013-14', 2014, '2014-04-01', '2015-03-31'),
(5, 2014, '2014-15', 2015, '2015-04-01', '2016-03-31'),
(6, 2015, '2015-16', 2016, '2016-04-01', '2017-03-31'),
(7, 2016, '2016-17', 2017, '2017-04-01', '2018-03-31'),
(8, 2017, '2017-18', 2018, '2018-04-01', '2019-03-31'),
(9, 2018, '2018-19', 2019, '2019-04-01', '2020-03-31'),
(10, 2019, '2019-20', 2020, '2020-04-01', '2021-03-31'),
(11, 2020, '2020-21', 2021, '2021-04-01', '2022-03-31'),
(12, 2021, '2021-22', 2022, '2022-04-01', '2023-03-31'),
(13, 2022, '2022-23', 2023, '2023-04-01', '2024-03-31'),
(14, 2023, '2023-24', 2024, '2024-04-01', '2025-03-31'),
(15, 2024, '2024-25', 2025, '2025-04-01', '2026-03-31'),
(16, 2025, '2025-26', 2026, '2026-04-01', '2027-03-31'),
(17, 2026, '2026-27', 2027, '2027-04-01', '2028-03-31'),
(18, 2027, '2027-28', 2028, '2028-04-01', '2029-03-31'),
(19, 2028, '2028-29', 2029, '2029-04-01', '2030-03-31'),
(20, 2029, '2029-30', 2030, '2030-04-01', '2031-03-31'),
(21, 2030, '2030-31', 2031, '2031-04-01', '2032-03-31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
