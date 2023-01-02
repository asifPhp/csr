-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 31, 2021 at 10:28 AM
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
-- Table structure for table `organisation_submodule`
--

DROP TABLE IF EXISTS `organisation_submodule`;
CREATE TABLE IF NOT EXISTS `organisation_submodule` (
  `submodule_id` int(10) NOT NULL AUTO_INCREMENT,
  `FK_module_id` int(10) NOT NULL,
  `submodule_name` varchar(200) NOT NULL,
  `link` varchar(5000) DEFAULT NULL,
  `icon_class` varchar(50) NOT NULL DEFAULT 'fa-group',
  `menu_link_show` enum('yes','no') NOT NULL,
  `show_link` enum('yes','no') DEFAULT 'no',
  `list_link` varchar(1000) DEFAULT NULL,
  `menu_list_link_show` enum('yes','no') NOT NULL,
  `show_list` enum('yes','no') DEFAULT 'no',
  `show_edit` enum('yes','no') NOT NULL DEFAULT 'no',
  `show_remove` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_name1` varchar(200) DEFAULT NULL,
  `other_link1` varchar(1000) DEFAULT NULL,
  `show_link1` enum('yes','no') DEFAULT 'no',
  `other_name2` varchar(200) DEFAULT NULL,
  `other_link2` varchar(200) DEFAULT NULL,
  `show_link2` enum('yes','no') DEFAULT 'no',
  `other_name3` varchar(200) DEFAULT NULL,
  `other_link3` varchar(200) DEFAULT NULL,
  `show_link3` enum('yes','no') DEFAULT 'no',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`submodule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_submodule`
--

INSERT INTO `organisation_submodule` (`submodule_id`, `FK_module_id`, `submodule_name`, `link`, `icon_class`, `menu_link_show`, `show_link`, `list_link`, `menu_list_link_show`, `show_list`, `show_edit`, `show_remove`, `other_name1`, `other_link1`, `show_link1`, `other_name2`, `other_link2`, `show_link2`, `other_name3`, `other_link3`, `show_link3`, `date`, `time`, `status`) VALUES
(6, 3, 'Manage Users', 'organisation/staff/index', 'fa-group', 'no', 'yes', 'organisation/staff/staff_list', 'yes', 'yes', 'yes', 'yes', 'Edit Password', NULL, 'yes', 'Define Access', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(2, 3, 'Roles', 'organisation/role/index', 'fa-group', 'no', 'yes', 'organisation/role/list', 'no', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(3, 3, 'Manage Organisation', 'organisation/donor/index', 'fa-gears', 'no', 'yes', 'organisation/donor/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(4, 4, 'Proposals', NULL, 'fa-newspaper-o', 'no', 'no', 'organisation/proposals/index', 'yes', 'yes', 'no', 'no', 'Detail', 'organisation/proposals/detail', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '13:27:34', 'active'),
(5, 5, 'Green Channel Requests', NULL, 'fa-flash', 'no', 'no', 'organisation/gc_requests/index', 'yes', 'yes', 'no', 'no', 'Grant', NULL, 'yes', 'Reject', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(8, 6, 'Task Manager', NULL, 'fa-tasks', 'no', 'no', 'organisation/tasks/manage', 'yes', 'yes', 'no', 'no', 'Detail', 'Detail', 'yes', 'Change Assingnee', NULL, 'yes', 'Change Due Date', NULL, 'yes', '2020-06-19', '22:32:14', 'active'),
(7, 6, 'My Tasks', NULL, 'fa-pencil-square-o', 'no', 'no', 'organisation/tasks/mytasks', 'yes', 'yes', 'no', 'no', 'Detail', NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(10, 7, 'NGOs', NULL, 'fa-heartbeat', 'no', 'no', 'organisation/ngo/listing', 'yes', 'yes', 'no', 'no', 'Detail', 'organisation/ngo/detail', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(11, 8, 'Projects', NULL, 'fa-play', 'no', 'no', 'organisation/project/listing', 'yes', 'yes', 'no', 'no', 'Detail', 'organisation/project/detail', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
