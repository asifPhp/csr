-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2020 at 01:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

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

CREATE TABLE `admin_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_category`
--

INSERT INTO `admin_category` (`id`, `name`) VALUES
(1, 'Health'),
(2, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `admin_district`
--

CREATE TABLE `admin_district` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_district`
--

INSERT INTO `admin_district` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Vidarbha'),
(2, 2, 'Jaipur'),
(3, 2, 'Jodhpur');

-- --------------------------------------------------------

--
-- Table structure for table `admin_emp_access`
--

CREATE TABLE `admin_emp_access` (
  `index_id` int(10) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `module_id` int(10) NOT NULL,
  `submodule_id` int(10) NOT NULL,
  `add_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `edit_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `list_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `remove_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_1` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_2` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_3` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_emp_access`
--

INSERT INTO `admin_emp_access` (`index_id`, `emp_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(41, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-06', '12:09:38'),
(40, 1, 2, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', '2020-09-06', '12:09:38'),
(33, 3, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', '2020-09-05', '10:09:41'),
(32, 2, 2, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', '2020-09-05', '09:09:37'),
(31, 2, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', '2020-09-05', '09:09:37'),
(34, 3, 2, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', '2020-09-05', '10:09:41'),
(39, 1, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-06', '12:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_module`
--

CREATE TABLE `admin_module` (
  `module_id` int(10) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_module`
--

INSERT INTO `admin_module` (`module_id`, `module_name`, `date`, `time`, `status`) VALUES
(1, 'Staff', '2020-08-17', '10:11:28', 'active'),
(2, 'Organisation', '2020-08-17', '10:11:28', 'active'),
(3, 'Settings', '2020-09-04', '12:57:47', 'active'),
(4, 'ngo', '2020-06-19', '12:57:47', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'Manager', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles_access`
--

CREATE TABLE `admin_roles_access` (
  `index_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `submodule_id` int(11) NOT NULL,
  `add_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `edit_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `list_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `remove_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_1` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_2` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_3` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_roles_access`
--

INSERT INTO `admin_roles_access` (`index_id`, `role_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(7, 1, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', '2020-09-05', '09:09:18'),
(8, 1, 2, 2, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', '2020-09-05', '09:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_states`
--

CREATE TABLE `admin_states` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_states`
--

INSERT INTO `admin_states` (`id`, `name`) VALUES
(1, 'Maharashtra'),
(2, 'Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `admin_subcategory`
--

CREATE TABLE `admin_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_subcategory`
--

INSERT INTO `admin_subcategory` (`id`, `category_id`, `name`) VALUES
(1, 1, 'Primary Healthcare(Rural)'),
(2, 1, 'Tertiary Healthcare(Urban)'),
(3, 1, 'Eye Care'),
(4, 2, 'Primary Education (Rural)'),
(5, 2, 'Secondary Education (Urban)');

-- --------------------------------------------------------

--
-- Table structure for table `admin_submodule`
--

CREATE TABLE `admin_submodule` (
  `submodule_id` int(10) NOT NULL,
  `FK_module_id` int(10) NOT NULL,
  `submodule_name` varchar(200) NOT NULL,
  `link` varchar(5000) DEFAULT NULL,
  `show_link` enum('yes','no') DEFAULT 'no',
  `list_link` varchar(1000) DEFAULT NULL,
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
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_submodule`
--

INSERT INTO `admin_submodule` (`submodule_id`, `FK_module_id`, `submodule_name`, `link`, `show_link`, `list_link`, `show_list`, `show_edit`, `show_remove`, `other_name1`, `other_link1`, `show_link1`, `other_name2`, `other_link2`, `show_link2`, `other_name3`, `other_link3`, `show_link3`, `date`, `time`, `status`) VALUES
(1, 1, 'Staff', 'admin/staff/index', 'yes', 'admin/staff/staff_list', 'yes', 'yes', 'yes', 'Edit Password', NULL, 'yes', 'Define Access', NULL, 'yes', NULL, NULL, 'no', '2020-08-17', '10:12:20', 'active'),
(2, 2, 'Organisation', 'admin/organisation/index', 'yes', 'admin/organisation/organisation_list', 'yes', 'yes', 'yes', 'Edit Password', NULL, 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(3, 3, 'role', 'admin/role/index', 'yes', 'admin/role/list', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(4, 4, 'ngo', NULL, 'no', 'admin/ngo/list', 'yes', 'no', 'yes', 'Change Status', NULL, 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `legal_name` varchar(200) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `pan_number` varchar(50) NOT NULL,
  `redistered_address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `pan_image` varchar(500) NOT NULL,
  `auth_sign` varchar(500) NOT NULL,
  `logo_image` varchar(500) NOT NULL,
  `donor_image` varchar(500) NOT NULL,
  `art_image` varchar(500) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `org_id`, `legal_name`, `brand_name`, `code`, `pan_number`, `redistered_address`, `city`, `state`, `pincode`, `pan_image`, `auth_sign`, `logo_image`, `donor_image`, `art_image`, `facebook`, `instagram`, `twitter`, `linkedin`, `created_date`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 2, 'donor', 'donor', '123456', 'BNZAA2318J', 'surya nagar', 'Jodhopur', 'Rajasthan', 34201, '1602583780.png', 'user', '1602583799.png', '1602583812.png', '1602583821.png', '', '', '', '', '2020-09-15', '11:09:25', '2020-09-15 15:29:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `legal_name` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `code` varchar(100) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `superngo_id`, `legal_name`, `website`, `code`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 1, 'Lennox', 'https://getbootstrap.com/docs/4.5/components/progress/', '123', '2020-09-22 11:09:54', '2020-09-22 15:25:54', 0),
(2, 2, 'Lennox', '', '', '2020-09-24 13:09:04', '2020-09-24 16:56:04', 0),
(3, 2, 'Lennox2', 'https://getbootstrap.com/docs/4.5/components/progress/', 'vbc', '2020-09-26 14:09:59', '2020-09-26 18:02:59', 0),
(11, 1, 'Lennox2', 'https://getbootstrap.com/docs/4.5/components/progress/', '1234', '2020-09-27 07:09:05', '2020-09-27 11:03:05', 0),
(12, 3, 'Lennox2', 'https://getbootstrap.com/docs/4.5/components/progress/', '1235', '2020-09-27 08:09:27', '2020-09-27 11:50:27', 1),
(13, 3, 'Lennox2', 'https://getbootstrap.com/docs/4.5/components/progress/', '1236', '2020-09-27 08:09:35', '2020-09-27 11:51:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_module`
--

CREATE TABLE `ngo_module` (
  `module_id` int(10) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_module`
--

INSERT INTO `ngo_module` (`module_id`, `module_name`, `date`, `time`, `status`) VALUES
(1, 'Manage Users', '2020-06-19', '12:57:47', 'active'),
(2, 'Settings', '2020-06-19', '12:57:47', 'old'),
(3, 'Manage Organisation', '2020-06-19', '12:57:47', 'active'),
(4, 'Proposal', '2020-06-19', '12:57:47', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_roles`
--

CREATE TABLE `ngo_roles` (
  `role_id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_roles`
--

INSERT INTO `ngo_roles` (`role_id`, `superngo_id`, `role_name`, `is_deleted`) VALUES
(1, 1, 'Owner', 0),
(2, 1, 'Regular', 0),
(3, 2, 'Owner', 0),
(4, 2, 'Regular', 0),
(5, 3, 'Owner', 0),
(6, 3, 'Regular', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_roles_access`
--

CREATE TABLE `ngo_roles_access` (
  `index_id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `submodule_id` int(11) NOT NULL,
  `add_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `edit_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `list_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `remove_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_1` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_2` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_3` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_roles_access`
--

INSERT INTO `ngo_roles_access` (`index_id`, `superngo_id`, `role_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(1, 1, 1, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-22', '11:09:55'),
(2, 1, 1, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-22', '11:09:55'),
(3, 1, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-22', '11:09:55'),
(7, 1, 2, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-09-24', '13:09:45'),
(8, 2, 3, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-24', '13:09:05'),
(9, 2, 3, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-24', '13:09:05'),
(10, 2, 4, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-09-24', '13:09:05'),
(11, 3, 5, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-27', '08:09:16'),
(12, 3, 5, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '08:09:16'),
(13, 3, 6, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '08:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_staff_access`
--

CREATE TABLE `ngo_staff_access` (
  `index_id` int(10) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `staff_id` int(10) DEFAULT NULL,
  `module_id` int(10) NOT NULL,
  `submodule_id` int(10) NOT NULL,
  `add_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `edit_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `list_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `remove_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_1` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_2` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_3` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_staff_access`
--

INSERT INTO `ngo_staff_access` (`index_id`, `superngo_id`, `staff_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(1, 1, 1, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-22', '11:09:55'),
(2, 1, 1, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-22', '11:09:55'),
(3, 1, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-22', '11:09:55'),
(14, 2, 3, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-24', '13:09:05'),
(21, 1, 2, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-24', '14:09:07'),
(20, 1, 2, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-24', '14:09:07'),
(15, 2, 3, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-24', '13:09:05'),
(19, 1, 2, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-24', '14:09:07'),
(22, 3, 4, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-27', '08:09:16'),
(23, 3, 4, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '08:09:16'),
(24, 1, 1, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-06-19', '22:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_staff_account`
--

CREATE TABLE `ngo_staff_account` (
  `ngo_staff_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `staff_profile_image` varchar(1000) NOT NULL,
  `staff_mobile` varchar(15) DEFAULT NULL,
  `staff_status` varchar(50) NOT NULL,
  `staff_role_id` int(11) NOT NULL,
  `staff_role` varchar(200) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `first_login` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `password_creation_time` datetime DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `verify_code` varchar(200) DEFAULT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_staff_account`
--

INSERT INTO `ngo_staff_account` (`ngo_staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_mobile`, `staff_status`, `staff_role_id`, `staff_role`, `superngo_id`, `ngo_id`, `parent_id`, `first_login`, `last_login`, `password_creation_time`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'Dileep', 'singh', 'user@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 1, 'Owner', 1, 1, 0, '2020-09-22 11:09:21', '2020-10-13 10:10:39', '2020-09-22 11:09:55', '2020-09-22 11:09:55', '2020-09-22 15:25:55', '324d8bb1e04c4f56de2295104a780a796c4a0729', 0),
(2, 'staff', 'member', 'staff@gmail.com', '65dbeff300422f5b1e87e112a9fc3e351a23273b', 'default_profile.jpg', NULL, 'Active', 1, 'Owner', 1, 0, 1, NULL, NULL, NULL, '2020-09-22 12:09:37', '2020-09-22 15:37:37', NULL, 0),
(3, 'user', 'singh', 'test@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 3, 'Owner', 2, 2, 0, '2020-09-24 13:09:16', '2020-09-26 11:09:32', '2020-09-24 13:09:04', '2020-09-24 13:09:04', '2020-09-24 16:56:04', '080df7c5a70591065420adcb4a3397a0293114ec', 0),
(4, 'user', 'singh', 'test2@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 5, 'Owner', 3, 0, 0, NULL, NULL, '2020-09-27 08:09:15', '2020-09-27 08:09:15', '2020-09-27 11:46:15', 'acd757e1bd9ccba6d404cd5a2dd8cef0be472d7c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_submodule`
--

CREATE TABLE `ngo_submodule` (
  `submodule_id` int(10) NOT NULL,
  `FK_module_id` int(10) NOT NULL,
  `submodule_name` varchar(200) NOT NULL,
  `link` varchar(5000) DEFAULT NULL,
  `menu_link_show` enum('yes','no') NOT NULL DEFAULT 'yes',
  `show_link` enum('yes','no') DEFAULT 'no',
  `list_link` varchar(1000) DEFAULT NULL,
  `menu_list_link_show` enum('yes','no') NOT NULL DEFAULT 'yes',
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
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_submodule`
--

INSERT INTO `ngo_submodule` (`submodule_id`, `FK_module_id`, `submodule_name`, `link`, `menu_link_show`, `show_link`, `list_link`, `menu_list_link_show`, `show_list`, `show_edit`, `show_remove`, `other_name1`, `other_link1`, `show_link1`, `other_name2`, `other_link2`, `show_link2`, `other_name3`, `other_link3`, `show_link3`, `date`, `time`, `status`) VALUES
(1, 1, 'Users', 'ngo/staff/index', 'no', 'yes', 'ngo/staff/staff_list', 'yes', 'yes', 'yes', 'yes', 'Edit Password', NULL, 'yes', 'Define Access', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(2, 2, 'Roles', 'ngo/role/index', 'no', 'yes', 'ngo/role/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'old'),
(3, 3, 'Entity', 'ngo/entity/index', 'no', 'yes', 'ngo/entity/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(4, 4, 'Proposal', 'ngo/proposals/index', 'no', 'yes', 'ngo/proposals/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '13:26:27', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_logo` varchar(1000) NOT NULL,
  `org_status` varchar(50) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`org_id`, `org_name`, `org_logo`, `org_status`, `added_by`, `created_date`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(2, 'Organisation', '1598446701.png', 'Active', 1, '2020-08-26', '14:08:32', '2020-08-26 18:28:32', 0),
(3, 'Organisation', '1599034838.png', 'Active', 1, '2020-09-02', '10:09:10', '2020-09-02 13:51:10', 0),
(4, 'Dileep singh', '1599377445.png', 'Active', 1, '2020-09-06', '09:09:48', '2020-09-06 13:00:48', 0),
(5, 'Dileep singh', '1599377445.png', 'Active', 1, '2020-09-06', '09:09:44', '2020-09-06 13:01:44', 1),
(6, 'rekha org', '', 'Active', 1, '2020-09-27', '11:09:46', '2020-09-27 14:42:46', 0),
(7, 'rekha org', '', 'Active', 1, '2020-09-27', '11:09:44', '2020-09-27 14:43:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_module`
--

CREATE TABLE `organisation_module` (
  `module_id` int(10) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_module`
--

INSERT INTO `organisation_module` (`module_id`, `module_name`, `date`, `time`, `status`) VALUES
(1, 'Manage Users', '2020-09-05', '14:31:30', 'active'),
(2, 'Settings', '2020-06-19', '12:57:47', 'active'),
(3, 'Account', '2020-06-19', '12:57:47', 'active'),
(4, 'Proposals', '2020-06-19', '12:57:47', 'active'),
(5, 'Green Channel Requests', '2020-06-19', '13:26:27', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `organisation_roles`
--

CREATE TABLE `organisation_roles` (
  `role_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation_roles`
--

INSERT INTO `organisation_roles` (`role_id`, `org_id`, `role_name`, `is_deleted`) VALUES
(1, 2, 'Manager', 0),
(2, 5, 'Admin', 0),
(3, 6, 'Admin', 0),
(4, 7, 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_roles_access`
--

CREATE TABLE `organisation_roles_access` (
  `index_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `submodule_id` int(11) NOT NULL,
  `add_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `edit_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `list_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `remove_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_1` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_2` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_3` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation_roles_access`
--

INSERT INTO `organisation_roles_access` (`index_id`, `org_id`, `role_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(2, 2, 1, 1, 1, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-05', '12:09:08'),
(3, 2, 1, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-05', '12:09:08'),
(4, 5, 2, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-06', '09:09:44'),
(5, 5, 2, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-06', '09:09:44'),
(6, 6, 3, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-27', '11:09:47'),
(7, 6, 3, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '11:09:48'),
(8, 6, 3, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '11:09:48'),
(9, 7, 4, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-27', '11:09:44'),
(10, 7, 4, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '11:09:44'),
(11, 7, 4, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '11:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `organisation_staff_access`
--

CREATE TABLE `organisation_staff_access` (
  `index_id` int(10) NOT NULL,
  `org_id` int(11) NOT NULL,
  `staff_id` int(10) DEFAULT NULL,
  `module_id` int(10) NOT NULL,
  `submodule_id` int(10) NOT NULL,
  `add_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `edit_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `list_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `remove_access` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_1` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_2` enum('yes','no') NOT NULL DEFAULT 'no',
  `other_access_3` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_staff_access`
--

INSERT INTO `organisation_staff_access` (`index_id`, `org_id`, `staff_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(38, 2, 1, 4, 4, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-10-12', '14:10:10'),
(26, 2, 3, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '12:09:19'),
(37, 2, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-10-12', '14:10:10'),
(25, 2, 3, 1, 1, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '12:09:19'),
(7, 5, 5, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-06', '09:09:44'),
(8, 5, 5, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-06', '09:09:44'),
(9, 5, 5, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-06-19', '22:32:14'),
(36, 2, 1, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-10-12', '14:10:10'),
(11, 6, 6, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-27', '11:09:48'),
(12, 6, 6, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '11:09:48'),
(13, 6, 6, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '11:09:48'),
(14, 7, 7, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-27', '11:09:45'),
(15, 7, 7, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '11:09:45'),
(16, 7, 7, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '11:09:45'),
(35, 2, 1, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-10-12', '14:10:10'),
(39, 2, 1, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-10-12', '14:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `organisation_submodule`
--

CREATE TABLE `organisation_submodule` (
  `submodule_id` int(10) NOT NULL,
  `FK_module_id` int(10) NOT NULL,
  `submodule_name` varchar(200) NOT NULL,
  `link` varchar(5000) DEFAULT NULL,
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
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_submodule`
--

INSERT INTO `organisation_submodule` (`submodule_id`, `FK_module_id`, `submodule_name`, `link`, `menu_link_show`, `show_link`, `list_link`, `menu_list_link_show`, `show_list`, `show_edit`, `show_remove`, `other_name1`, `other_link1`, `show_link1`, `other_name2`, `other_link2`, `show_link2`, `other_name3`, `other_link3`, `show_link3`, `date`, `time`, `status`) VALUES
(1, 1, 'Users', 'organisation/staff/index', 'no', 'yes', 'organisation/staff/staff_list', 'yes', 'yes', 'no', 'no', 'Edit Password', NULL, 'yes', 'Define Access', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(2, 2, 'Roles', 'organisation/role/index', 'no', 'yes', 'organisation/role/list', 'yes', 'yes', 'no', 'no', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(3, 3, 'Manage Organisation', 'organisation/donor/index', 'no', 'yes', 'organisation/donor/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(4, 4, 'Proposals', NULL, 'no', 'no', 'organisation/proposals/index', 'yes', 'yes', 'no', 'no', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '13:27:34', 'active'),
(5, 5, 'Green Channel Requests', NULL, 'no', 'no', 'organisation/gc_requests/index', 'yes', 'yes', 'no', 'no', 'Grant', NULL, 'yes', 'Reject', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `org_category`
--

CREATE TABLE `org_category` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_category`
--

INSERT INTO `org_category` (`id`, `org_id`, `category_id`, `subcategory_id`) VALUES
(10, 2, 2, 4),
(11, 2, 1, 1),
(12, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `org_district`
--

CREATE TABLE `org_district` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_district`
--

INSERT INTO `org_district` (`id`, `org_id`, `state_id`, `district_id`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `org_staff_account`
--

CREATE TABLE `org_staff_account` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) DEFAULT NULL,
  `staff_profile_image` varchar(1000) DEFAULT NULL,
  `staff_phone_no` varchar(15) DEFAULT NULL,
  `staff_status` varchar(50) DEFAULT NULL,
  `staff_role_id` int(11) NOT NULL,
  `staff_role` varchar(200) NOT NULL,
  `org_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `first_login` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `verify_code` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_staff_account`
--

INSERT INTO `org_staff_account` (`staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_phone_no`, `staff_status`, `staff_role_id`, `staff_role`, `org_id`, `donor_id`, `parent_id`, `first_login`, `last_login`, `last_password_change`, `created_date`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'test', 'test', 'test@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', '07856958475', 'Active', 0, '', 2, 0, 0, '2020-09-06 13:09:28', '2020-10-13 10:10:49', '2020-09-15 12:09:32', '2020-08-26', '14:08:32', '2020-08-26 18:28:32', '', 0),
(2, 'admin', 'admin', 'org_admin@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', NULL, 'Active', 0, '', 3, 0, 0, NULL, NULL, NULL, '2020-09-02', '10:09:10', '2020-09-02 13:51:10', '', 0),
(3, 'Dileep', 'singh', 'dileep@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', NULL, 'Active', 1, 'Manager', 2, 1, 1, NULL, NULL, NULL, '2020-09-05', '11:09:32', '2020-09-05 14:52:32', '', 0),
(4, 'Dileep', 'singh', 'xyz@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 0, '', 4, 0, 0, NULL, NULL, NULL, '2020-09-06', '09:09:49', '2020-09-06 13:00:49', '', 0),
(5, 'Dileep', 'singh', 'xyz@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 2, 'Admin', 5, 0, 0, NULL, NULL, NULL, '2020-09-06', '09:09:44', '2020-09-06 13:01:44', '', 1),
(6, 'rekha', 'p', 'rekha@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 3, 'Admin', 6, 0, 0, NULL, NULL, NULL, '2020-09-27', '11:09:47', '2020-09-27 14:42:47', '', 0),
(7, 'rekha', 'p', 'rekha@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 4, 'Admin', 7, 0, 0, NULL, NULL, NULL, '2020-09-27', '11:09:44', '2020-09-27 14:43:44', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `prop_id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL,
  `ngo_staff_id` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `gc_requested` enum('yes','no') DEFAULT 'no',
  `gc_requested_date` datetime DEFAULT NULL,
  `gc_responded` enum('yes','no') DEFAULT 'no',
  `gc_responded_date` datetime DEFAULT NULL,
  `gc_granted` enum('yes','no') DEFAULT 'no',
  `gc_granted_date` datetime DEFAULT NULL,
  `gc_responded_by` int(11) NOT NULL,
  `submission_time` datetime DEFAULT NULL,
  `proposal_status` varchar(50) DEFAULT NULL,
  `is_submit` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`prop_id`, `superngo_id`, `ngo_id`, `ngo_staff_id`, `organisation_id`, `title`, `code`, `created_time`, `update_datetime`, `gc_requested`, `gc_requested_date`, `gc_responded`, `gc_responded_date`, `gc_granted`, `gc_granted_date`, `gc_responded_by`, `submission_time`, `proposal_status`, `is_submit`, `is_deleted`) VALUES
(1, 1, 1, 1, 2, 'test', '123', '2020-10-06 13:10:23', '2020-10-28 17:26:35', 'yes', NULL, 'yes', '2020-10-12 15:10:40', 'yes', '2020-10-12 15:10:40', 1, '2020-10-12 12:10:30', 'submitted', 1, 0),
(2, 1, 0, 1, 2, '', '', '2020-10-07 14:10:57', '2020-10-07 18:19:57', 'yes', '2020-10-12 11:10:20', 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0),
(3, 1, 11, 1, 2, '', '', '2020-10-07 15:10:11', '2020-10-07 18:34:11', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0),
(4, 1, 11, 1, 2, 'test Proposel', '1234', '2020-10-07 15:10:48', '2020-10-07 18:38:48', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0),
(5, 1, 1, 1, 2, 'project_test', '602536', '2020-10-07 15:10:54', '2020-10-07 18:40:54', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0),
(6, 1, 0, 1, 2, 'test2', '1235', '2020-10-12 07:10:28', '2020-10-12 11:07:28', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0),
(7, 1, 0, 1, 0, '', '', '2020-10-12 09:10:38', '2020-10-12 13:03:38', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0),
(8, 1, 0, 1, 0, '', '', '2020-10-12 09:10:27', '2020-10-12 13:05:27', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0),
(9, 1, 0, 1, 0, '', '', '2020-10-12 09:10:40', '2020-10-12 13:06:40', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `superngo`
--

CREATE TABLE `superngo` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superngo`
--

INSERT INTO `superngo` (`id`, `brand_name`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 'Lennox', '2020-09-22 11:09:54', '2020-09-22 15:25:54', 0),
(2, 'lennox Soft', '2020-09-24 13:09:04', '2020-09-24 16:56:04', 0),
(3, 'user', '2020-09-27 08:09:14', '2020-09-27 11:46:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_admin_login`
--

CREATE TABLE `web_admin_login` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `verify_code` varchar(200) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `phone_no` double NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `user_role_id` varchar(11) NOT NULL,
  `user_role` varchar(200) DEFAULT NULL,
  `default` tinyint(4) DEFAULT 0,
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_admin_login`
--

INSERT INTO `web_admin_login` (`user_id`, `user_name`, `user_email`, `passwd`, `date`, `time`, `verify_code`, `status`, `phone_no`, `profile_picture`, `user_role_id`, `user_role`, `default`, `is_deleted`) VALUES
(1, 'Admin', 'admin@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2018-06-28', '06:06:58', '', 'Active', 0, 'default_profile.jpg', '', 'admin', 1, 0),
(2, 'staff', 'staff@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '0000-00-00', '00:00:00', '', 'Active', 7856958475, '1599287768.png', '1', 'Manager', 0, 0),
(3, 'sa', 'as', '', '0000-00-00', '00:00:00', '', 'Active', 32, 'default_profile.jpg', '1', 'Manager', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_category`
--
ALTER TABLE `admin_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_district`
--
ALTER TABLE `admin_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_emp_access`
--
ALTER TABLE `admin_emp_access`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `admin_module`
--
ALTER TABLE `admin_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `admin_roles_access`
--
ALTER TABLE `admin_roles_access`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `admin_states`
--
ALTER TABLE `admin_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_subcategory`
--
ALTER TABLE `admin_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_submodule`
--
ALTER TABLE `admin_submodule`
  ADD PRIMARY KEY (`submodule_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `ngo_module`
--
ALTER TABLE `ngo_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `ngo_roles`
--
ALTER TABLE `ngo_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `ngo_roles_access`
--
ALTER TABLE `ngo_roles_access`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `ngo_staff_access`
--
ALTER TABLE `ngo_staff_access`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `ngo_staff_account`
--
ALTER TABLE `ngo_staff_account`
  ADD PRIMARY KEY (`ngo_staff_id`);

--
-- Indexes for table `ngo_submodule`
--
ALTER TABLE `ngo_submodule`
  ADD PRIMARY KEY (`submodule_id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `organisation_module`
--
ALTER TABLE `organisation_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `organisation_roles`
--
ALTER TABLE `organisation_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `organisation_roles_access`
--
ALTER TABLE `organisation_roles_access`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `organisation_staff_access`
--
ALTER TABLE `organisation_staff_access`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `organisation_submodule`
--
ALTER TABLE `organisation_submodule`
  ADD PRIMARY KEY (`submodule_id`);

--
-- Indexes for table `org_category`
--
ALTER TABLE `org_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_district`
--
ALTER TABLE `org_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_staff_account`
--
ALTER TABLE `org_staff_account`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `superngo`
--
ALTER TABLE `superngo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_admin_login`
--
ALTER TABLE `web_admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_category`
--
ALTER TABLE `admin_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_district`
--
ALTER TABLE `admin_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_emp_access`
--
ALTER TABLE `admin_emp_access`
  MODIFY `index_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `admin_module`
--
ALTER TABLE `admin_module`
  MODIFY `module_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_roles_access`
--
ALTER TABLE `admin_roles_access`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_states`
--
ALTER TABLE `admin_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_subcategory`
--
ALTER TABLE `admin_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_submodule`
--
ALTER TABLE `admin_submodule`
  MODIFY `submodule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ngo_module`
--
ALTER TABLE `ngo_module`
  MODIFY `module_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ngo_roles`
--
ALTER TABLE `ngo_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ngo_roles_access`
--
ALTER TABLE `ngo_roles_access`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ngo_staff_access`
--
ALTER TABLE `ngo_staff_access`
  MODIFY `index_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ngo_staff_account`
--
ALTER TABLE `ngo_staff_account`
  MODIFY `ngo_staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ngo_submodule`
--
ALTER TABLE `ngo_submodule`
  MODIFY `submodule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `organisation_module`
--
ALTER TABLE `organisation_module`
  MODIFY `module_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organisation_roles`
--
ALTER TABLE `organisation_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organisation_roles_access`
--
ALTER TABLE `organisation_roles_access`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `organisation_staff_access`
--
ALTER TABLE `organisation_staff_access`
  MODIFY `index_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `organisation_submodule`
--
ALTER TABLE `organisation_submodule`
  MODIFY `submodule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `org_category`
--
ALTER TABLE `org_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `org_district`
--
ALTER TABLE `org_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `org_staff_account`
--
ALTER TABLE `org_staff_account`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `superngo`
--
ALTER TABLE `superngo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_admin_login`
--
ALTER TABLE `web_admin_login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
