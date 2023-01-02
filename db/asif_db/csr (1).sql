-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 07, 2021 at 01:15 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_category`
--

INSERT INTO `admin_category` (`id`, `name`) VALUES
(1, 'Health'),
(2, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `admin_city`
--

DROP TABLE IF EXISTS `admin_city`;
CREATE TABLE IF NOT EXISTS `admin_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_city`
--

INSERT INTO `admin_city` (`id`, `name`) VALUES
(1, 'Vidarbha'),
(2, 'jaipur'),
(3, 'Navi Mumbai'),
(4, 'Mumbai'),
(5, 'Solapur'),
(6, 'Amravati');

-- --------------------------------------------------------

--
-- Table structure for table `admin_district`
--

DROP TABLE IF EXISTS `admin_district`;
CREATE TABLE IF NOT EXISTS `admin_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `admin_emp_access`;
CREATE TABLE IF NOT EXISTS `admin_emp_access` (
  `index_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `time` time NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `admin_module`;
CREATE TABLE IF NOT EXISTS `admin_module` (
  `module_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'Manager', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles_access`
--

DROP TABLE IF EXISTS `admin_roles_access`;
CREATE TABLE IF NOT EXISTS `admin_roles_access` (
  `index_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `time` time NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `admin_states`;
CREATE TABLE IF NOT EXISTS `admin_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `admin_subcategory`;
CREATE TABLE IF NOT EXISTS `admin_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `admin_submodule`;
CREATE TABLE IF NOT EXISTS `admin_submodule` (
  `submodule_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`submodule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `donor`;
CREATE TABLE IF NOT EXISTS `donor` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `org_id`, `legal_name`, `brand_name`, `code`, `pan_number`, `redistered_address`, `city`, `state`, `pincode`, `pan_image`, `auth_sign`, `logo_image`, `donor_image`, `art_image`, `facebook`, `instagram`, `twitter`, `linkedin`, `created_date`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 1, 'cp', '', 'cp1', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-10-25', '08:10:54', '2020-10-25 08:55:54', 0),
(2, 1, 'Testing', '', 'test1', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-11-19', '11:11:09', '2020-11-19 11:28:09', 0),
(3, 2, 'Kriti Donor 1', '', 'KBD1', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-12-15', '06:12:45', '2020-12-15 06:47:45', 0),
(4, 1, 'New Donor Dec', '', 'DDec20', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-12-22', '11:21:59', '2020-12-22 11:21:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

DROP TABLE IF EXISTS `financial_years`;
CREATE TABLE IF NOT EXISTS `financial_years` (
  `start_year` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `end_year` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`start_year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`start_year`, `name`, `end_year`, `start_date`, `end_date`) VALUES
(2018, '2018-19', 2019, '2018-04-01', '2019-03-31'),
(2019, '2019-20', 2020, '2019-04-01', '2020-03-31'),
(2020, '2020-21', 2021, '2020-04-01', '2021-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

DROP TABLE IF EXISTS `ngo`;
CREATE TABLE IF NOT EXISTS `ngo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ngo_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `legal_name` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) DEFAULT NULL,
  `brand_name` varchar(30) DEFAULT NULL,
  `geo_location` varchar(200) DEFAULT NULL,
  `geo_location_id` varchar(100) DEFAULT NULL,
  `city_id` varchar(100) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `operation_nature` varchar(100) DEFAULT NULL,
  `category_array` longtext NOT NULL,
  `resource_managment` varchar(200) DEFAULT NULL,
  `geographical_reach` varchar(50) DEFAULT NULL,
  `beneficiary_reach` varchar(50) DEFAULT NULL,
  `registration_detail` longtext,
  `registration_number_12a` varchar(200) DEFAULT NULL,
  `from_date_12a_valid` date DEFAULT NULL,
  `expire_date_12a_valid` date DEFAULT NULL,
  `tax_exemption_percentage` int(11) DEFAULT NULL,
  `registration_number_80g` varchar(200) DEFAULT NULL,
  `certificate_date_80G` date DEFAULT NULL,
  `registration_80g_valid` varchar(100) DEFAULT NULL,
  `tax_exemption_type` varchar(20) DEFAULT NULL,
  `pan_number` varchar(200) DEFAULT NULL,
  `epf_number` varchar(200) DEFAULT NULL,
  `professional_tax_number` varchar(200) DEFAULT NULL,
  `tan_number` varchar(200) DEFAULT NULL,
  `other_appropriate_certification_input` varchar(20) DEFAULT NULL,
  `is_12a_certificate` varchar(20) DEFAULT NULL,
  `is_12a_certificate_cancle` varchar(20) DEFAULT NULL,
  `is_tax_exemption_80g` varchar(20) DEFAULT NULL,
  `is_perpetuity_valid` varchar(20) DEFAULT NULL,
  `is_valid_tax_exemption` varchar(20) DEFAULT NULL,
  `is_certificate_exist` varchar(20) DEFAULT NULL,
  `appropriate_certification` varchar(250) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `upload_proof_tax_exemption` varchar(100) DEFAULT NULL,
  `upload_proof_tax_exemption_actual` varchar(200) NOT NULL,
  `upload_proof_12A_reg` varchar(100) DEFAULT NULL,
  `upload_proof_12A_reg_actual` varchar(200) NOT NULL,
  `upload_80G_reg` varchar(100) DEFAULT NULL,
  `upload_80G_reg_actual` varchar(200) NOT NULL,
  `upload_proof_80G_incometax` varchar(100) DEFAULT NULL,
  `upload_proof_80G_incometax_actual` varchar(200) NOT NULL,
  `soft_copy_pancard` varchar(100) DEFAULT NULL,
  `soft_copy_pancard_actual` varchar(200) NOT NULL,
  `proof_of_TAN` varchar(100) DEFAULT NULL,
  `proof_of_TAN_actual` varchar(200) NOT NULL,
  `epf_for_last_year` varchar(100) DEFAULT NULL,
  `epf_for_last_year_actual` varchar(200) NOT NULL,
  `tax_for_last_year` varchar(100) DEFAULT NULL,
  `tax_for_last_year_actual` varchar(200) NOT NULL,
  `credibility_alliance_report` varchar(100) DEFAULT NULL,
  `credibility_alliance_report_actual` varchar(200) NOT NULL,
  `non_financial_partnerships` varchar(50) DEFAULT NULL,
  `leadership_network` varchar(50) DEFAULT NULL,
  `blacklist` varchar(50) DEFAULT NULL,
  `guilty` varchar(50) DEFAULT NULL,
  `religious_affiliation_on_radio` varchar(50) DEFAULT NULL,
  `bajaj_group_involved` varchar(50) DEFAULT NULL,
  `senior_member_involved` varchar(50) DEFAULT NULL,
  `previously_recieve_funding` varchar(30) DEFAULT NULL,
  `received_award` varchar(30) DEFAULT NULL,
  `received_national_award` varchar(50) DEFAULT NULL,
  `upload_annual_report_1` varchar(50) DEFAULT NULL,
  `upload_annual_report_2` varchar(50) DEFAULT NULL,
  `upload_annual_report_3` varchar(50) DEFAULT NULL,
  `upload_annual_report_1_actual` varchar(200) NOT NULL,
  `upload_annual_report_2_actual` varchar(200) NOT NULL,
  `upload_annual_report_3_actual` varchar(200) NOT NULL,
  `governing_council` varchar(250) DEFAULT NULL,
  `is_non_financial_partnerships` varchar(50) DEFAULT NULL,
  `is_leadership_network` varchar(50) DEFAULT NULL,
  `is_guilty` varchar(50) DEFAULT NULL,
  `is_blacklist` varchar(10) NOT NULL,
  `is_political_affiliation` varchar(50) DEFAULT NULL,
  `optradio2` varchar(50) DEFAULT NULL,
  `optradio3` varchar(50) DEFAULT NULL,
  `optradio4` varchar(50) DEFAULT NULL,
  `optradio5` varchar(50) DEFAULT NULL,
  `optradio6` varchar(50) DEFAULT NULL,
  `optradio7` varchar(50) DEFAULT NULL,
  `upload_organogram` varchar(50) DEFAULT NULL,
  `upload_organogram_actual` varchar(100) NOT NULL,
  `entity_have_governing_board` varchar(10) DEFAULT NULL,
  `defined_structure_decission_making` varchar(10) DEFAULT NULL,
  `number_of_employee` int(11) DEFAULT NULL,
  `detail_body_member` varchar(20) DEFAULT NULL,
  `number_of_employee_through_contractor` int(11) DEFAULT NULL,
  `number_parttime_employees` int(11) DEFAULT NULL,
  `renumeration_leadership` varchar(50) DEFAULT NULL,
  `governing_body_member_det` longtext,
  `vehicles_details` longtext,
  `major_donors` longtext,
  `budget_details` longtext,
  `foreign_travel_taken_by_staff` longtext,
  `renumeration_of_senior_leadership` longtext,
  `full_time_staff_numbers` longtext,
  `part_time_staff_numbers` longtext,
  `gst_number` varchar(50) DEFAULT NULL,
  `entity_have_gst_num` varchar(50) DEFAULT NULL,
  `upload_financial_statement1` varchar(50) DEFAULT NULL,
  `upload_financial_statement2` varchar(50) DEFAULT NULL,
  `upload_financial_statement3` varchar(50) DEFAULT NULL,
  `upload_financial_statement1_actual` varchar(100) NOT NULL,
  `upload_financial_statement2_actual` varchar(100) NOT NULL,
  `upload_financial_statement3_actual` varchar(100) NOT NULL,
  `uplpad_ITR_1` varchar(50) DEFAULT NULL,
  `uplpad_ITR_2` varchar(50) DEFAULT NULL,
  `uplpad_ITR_3` varchar(50) DEFAULT NULL,
  `uplpad_ITR_1_actual` varchar(100) NOT NULL,
  `uplpad_ITR_2_actual` varchar(100) NOT NULL,
  `uplpad_ITR_3_actual` varchar(100) NOT NULL,
  `gst_certificate` varchar(50) DEFAULT NULL,
  `gst_certificate_actual` varchar(100) NOT NULL,
  `upload_cancelled_cheque` varchar(50) DEFAULT NULL,
  `upload_cancelled_cheque_actual` varchar(100) NOT NULL,
  `name_of_organization` varchar(50) DEFAULT NULL,
  `gst_exemption_letter` varchar(50) DEFAULT NULL,
  `gst_exemption_letter_actual` varchar(100) NOT NULL,
  `other_policies` longtext,
  `optradio_policy` varchar(50) DEFAULT NULL,
  `optradio_whistleblower_policy` varchar(50) DEFAULT NULL,
  `optradio_child_protection_policy` varchar(50) DEFAULT NULL,
  `multiple_img_upload` longtext,
  `multiple_img_upload2` longtext,
  `other_policies_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `ngo_id`, `staff_id`, `superngo_id`, `legal_name`, `website`, `created_time`, `update_datetime`, `is_deleted`, `brand_name`, `geo_location`, `geo_location_id`, `city_id`, `city`, `operation_nature`, `category_array`, `resource_managment`, `geographical_reach`, `beneficiary_reach`, `registration_detail`, `registration_number_12a`, `from_date_12a_valid`, `expire_date_12a_valid`, `tax_exemption_percentage`, `registration_number_80g`, `certificate_date_80G`, `registration_80g_valid`, `tax_exemption_type`, `pan_number`, `epf_number`, `professional_tax_number`, `tan_number`, `other_appropriate_certification_input`, `is_12a_certificate`, `is_12a_certificate_cancle`, `is_tax_exemption_80g`, `is_perpetuity_valid`, `is_valid_tax_exemption`, `is_certificate_exist`, `appropriate_certification`, `code`, `upload_proof_tax_exemption`, `upload_proof_tax_exemption_actual`, `upload_proof_12A_reg`, `upload_proof_12A_reg_actual`, `upload_80G_reg`, `upload_80G_reg_actual`, `upload_proof_80G_incometax`, `upload_proof_80G_incometax_actual`, `soft_copy_pancard`, `soft_copy_pancard_actual`, `proof_of_TAN`, `proof_of_TAN_actual`, `epf_for_last_year`, `epf_for_last_year_actual`, `tax_for_last_year`, `tax_for_last_year_actual`, `credibility_alliance_report`, `credibility_alliance_report_actual`, `non_financial_partnerships`, `leadership_network`, `blacklist`, `guilty`, `religious_affiliation_on_radio`, `bajaj_group_involved`, `senior_member_involved`, `previously_recieve_funding`, `received_award`, `received_national_award`, `upload_annual_report_1`, `upload_annual_report_2`, `upload_annual_report_3`, `upload_annual_report_1_actual`, `upload_annual_report_2_actual`, `upload_annual_report_3_actual`, `governing_council`, `is_non_financial_partnerships`, `is_leadership_network`, `is_guilty`, `is_blacklist`, `is_political_affiliation`, `optradio2`, `optradio3`, `optradio4`, `optradio5`, `optradio6`, `optradio7`, `upload_organogram`, `upload_organogram_actual`, `entity_have_governing_board`, `defined_structure_decission_making`, `number_of_employee`, `detail_body_member`, `number_of_employee_through_contractor`, `number_parttime_employees`, `renumeration_leadership`, `governing_body_member_det`, `vehicles_details`, `major_donors`, `budget_details`, `foreign_travel_taken_by_staff`, `renumeration_of_senior_leadership`, `full_time_staff_numbers`, `part_time_staff_numbers`, `gst_number`, `entity_have_gst_num`, `upload_financial_statement1`, `upload_financial_statement2`, `upload_financial_statement3`, `upload_financial_statement1_actual`, `upload_financial_statement2_actual`, `upload_financial_statement3_actual`, `uplpad_ITR_1`, `uplpad_ITR_2`, `uplpad_ITR_3`, `uplpad_ITR_1_actual`, `uplpad_ITR_2_actual`, `uplpad_ITR_3_actual`, `gst_certificate`, `gst_certificate_actual`, `upload_cancelled_cheque`, `upload_cancelled_cheque_actual`, `name_of_organization`, `gst_exemption_letter`, `gst_exemption_letter_actual`, `other_policies`, `optradio_policy`, `optradio_whistleblower_policy`, `optradio_child_protection_policy`, `multiple_img_upload`, `multiple_img_upload2`, `other_policies_name`) VALUES
(1, 0, 1, 1, 'Entity 26 Dec', '', '2020-12-27 08:41:30', '2020-12-26 03:24:22', 0, 'Brand 26 Dec', '', '', '', '', 'Direct Implementing Agency', '', '', '', '', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '123123234f', '', '123123234f', '', 'No', '', 'No', '', 'No', '', '', 'E26De', '', '', '', '', '', '', '', '', '', '', 'entity_5fe6b470c03f7.png', 'judge-gavel.png', '', '', '', '', '', '', 'details here', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[\"none of the above\"]', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"2344\",\"input2\":\"123\",\"input3\":\"2321\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"123\",\"input2\":\"123\",\"input3\":\"2321\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[\"Travel Policy (including details of incidentals)\"]', '', 'No', '', '', '', ''),
(2, 0, 3, 2, 'test 1', '', '2020-12-27 20:24:39', '2020-12-27 14:54:39', 0, 'test', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '43', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 3, 2, 'test 04', '', '2021-01-04 18:56:59', '2021-01-04 18:56:59', 0, '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'okokok', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 3, 2, 'New Entity', 'https://beautifier.io/', '2021-01-06 13:06:59', '2021-01-06 13:06:59', 0, 'lennox Soft2', '', '', '', '', 'Direct Implementing Agency', '', '', '', '', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dsfsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 0, 3, 2, 'LENOVO NGO', '', '2021-01-06 14:20:44', '2021-01-06 14:20:44', 0, '', '', '', '', '', '', '', '', '', '', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 0, 3, 2, 'HP NGO', '', '2021-01-06 14:21:43', '2021-01-06 14:21:43', 0, '', '', '', '', '', '', '', '', '', '', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 0, 3, 2, 'DELL NGO', '', '2021-01-06 14:22:32', '2021-01-06 14:22:32', 0, '', '', '', '', '', '', '', '', '', '', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 0, 3, 2, 'ACER NGO', '', '2021-01-06 14:23:42', '2021-01-06 14:23:42', 0, '', '', '', '', '', '', '', '', '', '', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_module`
--

DROP TABLE IF EXISTS `ngo_module`;
CREATE TABLE IF NOT EXISTS `ngo_module` (
  `module_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  `direct_indirect` varchar(100) NOT NULL DEFAULT 'indirect',
  `position` int(10) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_module`
--

INSERT INTO `ngo_module` (`module_id`, `module_name`, `date`, `time`, `status`, `direct_indirect`, `position`) VALUES
(1, 'Manage Users', '2020-06-19', '12:57:47', 'active', 'direct', 7),
(2, 'Settings', '2020-06-19', '12:57:47', 'old', 'indirect', 10),
(3, 'Manage Organisation', '2020-06-19', '12:57:47', 'active', 'direct', 5),
(4, 'Proposals', '2020-06-19', '12:57:47', 'active', 'direct', 2),
(5, 'Projects', '2020-06-19', '12:57:47', 'active', 'direct', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_roles`
--

DROP TABLE IF EXISTS `ngo_roles`;
CREATE TABLE IF NOT EXISTS `ngo_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `superngo_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngo_roles`
--

INSERT INTO `ngo_roles` (`role_id`, `superngo_id`, `role_name`, `is_deleted`) VALUES
(1, 1, 'Owner', 0),
(2, 1, 'Regular', 0),
(3, 2, 'Owner', 0),
(4, 2, 'Regular', 0),
(5, 3, 'Owner', 0),
(6, 3, 'Regular', 0),
(7, 4, 'Owner', 0),
(8, 4, 'Regular', 0),
(9, 5, 'Owner', 0),
(10, 5, 'Regular', 0),
(11, 6, 'Owner', 0),
(12, 6, 'Regular', 0),
(13, 7, 'Owner', 0),
(14, 7, 'Regular', 0),
(15, 8, 'Owner', 0),
(16, 8, 'Regular', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_roles_access`
--

DROP TABLE IF EXISTS `ngo_roles_access`;
CREATE TABLE IF NOT EXISTS `ngo_roles_access` (
  `index_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `time` time NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngo_roles_access`
--

INSERT INTO `ngo_roles_access` (`index_id`, `superngo_id`, `role_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(1, 1, 1, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-28', '04:09:54'),
(2, 1, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-28', '04:09:54'),
(3, 1, 2, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-09-28', '04:09:54'),
(4, 2, 3, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-30', '10:09:14'),
(5, 2, 3, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-30', '10:09:14'),
(6, 2, 4, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-09-30', '10:09:14'),
(7, 3, 5, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-16', '08:11:58'),
(8, 3, 5, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '08:11:58'),
(9, 3, 5, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '08:11:58'),
(10, 3, 6, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-16', '08:11:58'),
(11, 4, 7, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-16', '11:11:40'),
(12, 4, 7, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:40'),
(13, 4, 7, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:40'),
(14, 4, 8, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-16', '11:11:40'),
(15, 5, 9, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '09:11:50'),
(16, 5, 9, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:50'),
(17, 5, 9, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:50'),
(18, 5, 10, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '09:11:50'),
(19, 6, 11, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '09:11:25'),
(20, 6, 11, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:25'),
(21, 6, 11, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:25'),
(22, 6, 12, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '09:11:25'),
(23, 7, 13, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '05:11:59'),
(24, 7, 13, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '05:11:59'),
(25, 7, 13, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '05:11:59'),
(26, 7, 14, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-30', '05:11:59'),
(27, 8, 15, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-15', '17:12:36'),
(28, 8, 15, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-15', '17:12:36'),
(29, 8, 15, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-15', '17:12:36'),
(30, 8, 15, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-15', '17:12:36'),
(31, 8, 16, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-15', '17:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_staff_access`
--

DROP TABLE IF EXISTS `ngo_staff_access`;
CREATE TABLE IF NOT EXISTS `ngo_staff_access` (
  `index_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `time` time NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_staff_access`
--

INSERT INTO `ngo_staff_access` (`index_id`, `superngo_id`, `staff_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(51, 1, 1, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-22', '10:12:14'),
(50, 1, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-22', '10:12:14'),
(56, 1, 2, 3, 3, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-22', '10:12:41'),
(55, 1, 2, 4, 4, 'yes', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-22', '10:12:41'),
(53, 1, 11, 4, 4, 'yes', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-22', '10:12:15'),
(47, 2, 3, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:13'),
(49, 1, 1, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-22', '10:12:14'),
(46, 2, 3, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-19', '17:12:13'),
(10, 3, 4, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-16', '08:11:58'),
(11, 3, 4, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '08:11:58'),
(12, 3, 4, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '08:11:58'),
(13, 4, 5, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-16', '11:11:40'),
(14, 4, 5, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:40'),
(15, 4, 5, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:40'),
(16, 5, 6, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '09:11:50'),
(17, 5, 6, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:50'),
(18, 5, 6, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:50'),
(19, 6, 7, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '09:11:25'),
(20, 6, 7, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:25'),
(21, 6, 7, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:25'),
(22, 7, 8, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '05:11:59'),
(23, 7, 8, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '05:11:59'),
(24, 7, 8, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '05:11:59'),
(28, 2, 9, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-13', '06:12:40'),
(27, 2, 9, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-13', '06:12:40'),
(29, 2, 9, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-13', '06:12:40'),
(45, 2, 3, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:13'),
(44, 2, 3, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:13'),
(40, 8, 10, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-15', '17:12:36'),
(41, 8, 10, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-15', '17:12:36'),
(42, 8, 10, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-15', '17:12:36'),
(43, 8, 10, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-15', '17:12:36'),
(52, 1, 1, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-22', '10:12:14'),
(54, 1, 11, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-22', '10:12:15'),
(57, 1, 2, 1, 1, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-22', '10:12:41'),
(58, 1, 2, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-22', '10:12:41'),
(62, 1, 12, 4, 4, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-27', '04:12:08'),
(63, 1, 12, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-27', '04:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_staff_account`
--

DROP TABLE IF EXISTS `ngo_staff_account`;
CREATE TABLE IF NOT EXISTS `ngo_staff_account` (
  `ngo_staff_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify_code` varchar(200) DEFAULT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ngo_staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngo_staff_account`
--

INSERT INTO `ngo_staff_account` (`ngo_staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_mobile`, `staff_status`, `staff_role_id`, `staff_role`, `superngo_id`, `ngo_id`, `parent_id`, `first_login`, `last_login`, `password_creation_time`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'Kriti', 'Bajaj', 'kritib@gmail.com', '0529ec905cd3cb483011185277659c862ce5ba14', 'default_profile.jpg', NULL, 'Active', 1, 'Owner', 1, 0, 0, '2020-09-28 04:09:20', '2020-12-29 04:12:00', '2020-12-22 09:12:20', '2020-09-28 04:09:54', '2020-09-28 04:07:54', 'f8bcbdf259e02f126c934ce9d474c0195f39e1ff', 0),
(2, 'Kriti2', 'Bajaj2', 'kriti.b@gmail.com', 'a10d8b0443f44bf76b4a97a7d12f4525e5173762', 'default_profile.jpg', NULL, 'Active', 2, 'Regular', 1, 0, 1, '2020-09-28 04:09:01', '2020-09-28 04:09:01', '2020-09-28 04:09:20', '2020-09-28 04:09:42', '2020-09-28 04:12:42', NULL, 1),
(3, 'c', 'p', 'user@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 3, 'Owner', 2, 0, 0, '2020-09-30 10:09:06', '2021-01-07 16:01:29', '2020-09-30 10:09:14', '2020-09-30 10:09:14', '2020-09-30 10:54:14', '446f9031fdd70a7bb62e447f7a252b8589a6bd16', 0),
(4, 'Kriti', 'Bajaj', 'k.ritib@gmail.com', '2e2eb5f4e91b552c79dbf6f607a7c9cb5f4e80db', 'default_profile.jpg', NULL, 'Active', 5, 'Owner', 3, 0, 0, NULL, NULL, '2020-11-16 08:11:58', '2020-11-16 08:11:58', '2020-11-16 08:32:58', '34bd83e18e7448568e815ff209860bdcf59ccc11', 0),
(5, 'testing2', 'testing2', 'testing2@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 7, 'Owner', 4, 0, 0, NULL, NULL, '2020-11-16 11:11:40', '2020-11-16 11:11:40', '2020-11-16 11:11:40', 'b14056021ee50868f1355a1aed193dc539676cae', 0),
(6, 'testngo', 'testngo', 'testngo@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 9, 'Owner', 5, 0, 0, '2020-11-28 09:11:47', '2020-11-28 09:11:47', '2020-11-28 09:11:50', '2020-11-28 09:11:50', '2020-11-28 09:01:50', 'ab7c8b744eabf4358fd21670fc7340c15ccad100', 0),
(7, 'testngo1', 'testngo1', 'testngo1@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 11, 'Owner', 6, 0, 0, NULL, NULL, '2020-11-28 09:11:25', '2020-11-28 09:11:25', '2020-11-28 09:41:25', '6f77dc29ec94578ec0740325bcd01cdc6fd04b9a', 0),
(8, 'newngo', 'newngo', 'newngo@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 13, 'Owner', 7, 0, 0, NULL, NULL, '2020-11-30 05:11:59', '2020-11-30 05:11:59', '2020-11-30 05:45:59', 'ffbdeee54634d540b6ea403eba4e682aadc09ea1', 0),
(9, 'Chatur', 'prajapat', 'chatur@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 3, 'Owner', 2, 2, 3, '2020-12-13 06:12:01', '2020-12-13 06:12:01', '2020-12-13 06:12:24', '2020-12-13 06:12:23', '2020-12-13 06:11:23', NULL, 0),
(10, 'Kriti', 'Bajaj', 'krit.ib@gmail.com', '32d9c445122ceca82fcb1aaacac4cf572d3046cc', 'default_profile.jpg', NULL, 'Active', 15, 'Owner', 8, 0, 0, NULL, NULL, '2020-12-15 17:12:36', '2020-12-15 17:12:36', '2020-12-15 17:42:36', '7fd2acdc78b9bc33ba4febda95557581534607eb', 0),
(11, 'Bajaj', 'Office', 'bajajbhavanoffice@gmail.com', '0529ec905cd3cb483011185277659c862ce5ba14', 'default_profile.jpg', NULL, 'Active', 2, 'Regular', 1, 0, 1, '2020-12-22 10:12:25', '2020-12-22 10:12:25', '2020-12-22 10:12:44', '2020-12-22 10:12:22', '2020-12-22 10:11:22', NULL, 1),
(12, 'Bajaj', 'Bhavan', 'bajajbhavanoffice@gmail.com', '6fb18dcfd2a78ff67ae2e201390ade1ca84fbf1f', 'default_profile.jpg', NULL, 'Active', 2, 'Regular', 1, 1, 1, NULL, NULL, NULL, '2020-12-27 04:12:38', '2020-12-27 04:10:38', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_submodule`
--

DROP TABLE IF EXISTS `ngo_submodule`;
CREATE TABLE IF NOT EXISTS `ngo_submodule` (
  `submodule_id` int(10) NOT NULL AUTO_INCREMENT,
  `FK_module_id` int(10) NOT NULL,
  `submodule_name` varchar(200) NOT NULL,
  `link` varchar(5000) DEFAULT NULL,
  `icon_class` varchar(100) NOT NULL,
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
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`submodule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_submodule`
--

INSERT INTO `ngo_submodule` (`submodule_id`, `FK_module_id`, `submodule_name`, `link`, `icon_class`, `menu_link_show`, `show_link`, `list_link`, `menu_list_link_show`, `show_list`, `show_edit`, `show_remove`, `other_name1`, `other_link1`, `show_link1`, `other_name2`, `other_link2`, `show_link2`, `other_name3`, `other_link3`, `show_link3`, `date`, `time`, `status`) VALUES
(1, 1, 'Manage Users', 'ngo/staff/index', 'fa-group', 'no', 'yes', 'ngo/staff/staff_list', 'yes', 'yes', 'yes', 'yes', 'Edit Password', NULL, 'yes', 'Define Access', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(2, 2, 'Roles', 'ngo/role/index', '', 'no', 'yes', 'ngo/role/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'old'),
(3, 3, 'Manage Organisation', 'ngo/entity/index', 'fa-gears', 'no', 'yes', 'ngo/entity/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(4, 4, 'Proposals', 'ngo/proposals/index', 'fa-newspaper-o', 'no', 'yes', 'ngo/proposals/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '13:26:27', 'active'),
(5, 5, 'Projects', 'ngo/proposals/index', 'fa-play', 'no', 'no', 'ngo/project/listing', 'yes', 'yes', 'no', 'no', 'Details', 'ngo/project/detail', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '13:26:27', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
CREATE TABLE IF NOT EXISTS `organisation` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(200) NOT NULL,
  `org_logo` varchar(1000) NOT NULL,
  `org_status` varchar(50) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`org_id`, `org_name`, `org_logo`, `org_status`, `added_by`, `created_date`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 'Lennox 3', '1601300297.png', 'Active', 1, '2020-09-28', '13:09:13', '2020-09-28 13:27:13', 0),
(2, 'KB1', '', 'Active', 1, '2020-09-30', '11:09:44', '2020-09-30 11:01:44', 0),
(3, 'CSR@Bajaj', '', 'Active', 1, '2020-12-28', '02:12:11', '2020-12-28 02:48:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_module`
--

DROP TABLE IF EXISTS `organisation_module`;
CREATE TABLE IF NOT EXISTS `organisation_module` (
  `module_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  `direct_indirect` varchar(100) NOT NULL DEFAULT 'indirect',
  `position` int(10) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_module`
--

INSERT INTO `organisation_module` (`module_id`, `module_name`, `date`, `time`, `status`, `direct_indirect`, `position`) VALUES
(3, 'Account Manager', '2020-06-19', '12:57:47', 'active', 'indirect', 7),
(4, 'Proposals', '2020-06-19', '12:57:47', 'active', 'direct', 4),
(5, 'Green Channel Requests', '2020-06-19', '13:26:27', 'active', 'direct', 6),
(6, 'Tasks', '2020-06-19', '13:26:27', 'active', 'direct', 2),
(7, 'NGOs', '2020-11-27', '00:00:00', 'active', 'direct', 5),
(8, 'Project', '2020-11-27', '00:00:00', 'active', 'direct', 3);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_roles`
--

DROP TABLE IF EXISTS `organisation_roles`;
CREATE TABLE IF NOT EXISTS `organisation_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `organisation_roles`
--

INSERT INTO `organisation_roles` (`role_id`, `org_id`, `role_name`, `is_deleted`) VALUES
(1, 1, 'Admin', 0),
(2, 2, 'Admin', 0),
(3, 1, 'Regular', 0),
(4, 3, 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organisation_roles_access`
--

DROP TABLE IF EXISTS `organisation_roles_access`;
CREATE TABLE IF NOT EXISTS `organisation_roles_access` (
  `index_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `time` time NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `organisation_roles_access`
--

INSERT INTO `organisation_roles_access` (`index_id`, `org_id`, `role_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(1, 1, 1, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-28', '13:09:13'),
(2, 1, 1, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-28', '13:09:13'),
(3, 1, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-28', '13:09:13'),
(4, 2, 2, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-30', '11:09:44'),
(5, 2, 2, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-30', '11:09:44'),
(6, 2, 2, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-30', '11:09:44'),
(7, 1, 3, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-19', '11:11:11'),
(8, 3, 4, 3, 6, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-28', '02:12:11'),
(9, 3, 4, 3, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(10, 3, 4, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(11, 3, 4, 4, 4, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11'),
(12, 3, 4, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-12-28', '02:12:11'),
(13, 3, 4, 6, 8, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(14, 3, 4, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(15, 3, 4, 7, 10, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11'),
(16, 3, 4, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `organisation_staff_access`
--

DROP TABLE IF EXISTS `organisation_staff_access`;
CREATE TABLE IF NOT EXISTS `organisation_staff_access` (
  `index_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `time` time NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_staff_access`
--

INSERT INTO `organisation_staff_access` (`index_id`, `org_id`, `staff_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(44, 1, 1, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:59'),
(43, 1, 1, 7, 10, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:59'),
(42, 1, 1, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-19', '17:12:59'),
(4, 2, 2, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-30', '11:09:44'),
(5, 2, 2, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-30', '11:09:44'),
(6, 2, 2, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-30', '11:09:44'),
(41, 1, 1, 6, 8, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-19', '17:12:59'),
(40, 1, 1, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-12-19', '17:12:59'),
(9, 2, 2, 4, 4, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-06-19', '22:32:14'),
(10, 2, 2, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-06-19', '22:32:14'),
(39, 1, 1, 4, 4, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:59'),
(38, 1, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:59'),
(47, 1, 3, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:39'),
(46, 1, 3, 3, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:39'),
(45, 1, 3, 3, 6, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-19', '17:12:39'),
(37, 1, 1, 3, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:59'),
(36, 1, 1, 3, 6, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-19', '17:12:59'),
(56, 1, 4, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:58'),
(55, 1, 4, 3, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-19', '17:12:58'),
(54, 1, 4, 3, 6, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-19', '17:12:58'),
(48, 1, 3, 4, 4, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:39'),
(49, 1, 3, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-12-19', '17:12:39'),
(50, 1, 3, 6, 8, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-19', '17:12:39'),
(51, 1, 3, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-19', '17:12:39'),
(52, 1, 3, 7, 10, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:39'),
(53, 1, 3, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:39'),
(57, 1, 4, 4, 4, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:58'),
(58, 1, 4, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-12-19', '17:12:58'),
(59, 1, 4, 6, 8, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-19', '17:12:58'),
(60, 1, 4, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-19', '17:12:58'),
(61, 1, 4, 7, 10, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:58'),
(62, 1, 4, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-19', '17:12:58'),
(63, 1, 5, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-12-23', '10:12:31'),
(64, 1, 5, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-23', '10:12:31'),
(65, 1, 5, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-23', '10:12:31'),
(66, 1, 6, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-23', '10:12:31'),
(67, 1, 7, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-23', '11:12:37'),
(68, 1, 8, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-12-23', '11:12:10'),
(69, 1, 8, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-23', '11:12:10'),
(70, 1, 8, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-23', '11:12:10'),
(71, 3, 9, 3, 6, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-28', '02:12:11'),
(72, 3, 9, 3, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(73, 3, 9, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(74, 3, 9, 4, 4, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11'),
(75, 3, 9, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-12-28', '02:12:11'),
(76, 3, 9, 6, 8, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(77, 3, 9, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-12-28', '02:12:11'),
(78, 3, 9, 7, 10, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11'),
(79, 3, 9, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11');

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
(8, 6, 'Task Manager', NULL, 'fa-tasks', 'no', 'no', 'organisation/tasks/manage', 'yes', 'yes', 'no', 'no', 'Details', NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(7, 6, 'My Tasks', NULL, 'fa-pencil-square-o', 'no', 'no', 'organisation/tasks/mytasks', 'yes', 'yes', 'no', 'no', 'Detail', NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(10, 7, 'NGOs', NULL, 'fa-heartbeat', 'no', 'no', 'organisation/ngo/listing', 'yes', 'yes', 'no', 'no', 'Detail', 'organisation/ngo/detail', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(11, 8, 'Projects', NULL, 'fa-play', 'no', 'no', 'organisation/project/listing', 'yes', 'yes', 'no', 'no', 'Detail', 'organisation/project/detail', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `org_category`
--

DROP TABLE IF EXISTS `org_category`;
CREATE TABLE IF NOT EXISTS `org_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `org_category`
--

INSERT INTO `org_category` (`id`, `org_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 2, 4),
(2, 1, 2, 5),
(3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `org_district`
--

DROP TABLE IF EXISTS `org_district`;
CREATE TABLE IF NOT EXISTS `org_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `org_district`
--

INSERT INTO `org_district` (`id`, `org_id`, `state_id`, `district_id`) VALUES
(11, 1, 1, 1),
(12, 2, 1, 1),
(13, 2, 2, 2),
(14, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `org_documents_req_list`
--

DROP TABLE IF EXISTS `org_documents_req_list`;
CREATE TABLE IF NOT EXISTS `org_documents_req_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `org_id` int(10) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_type` varchar(100) NOT NULL COMMENT 'payment_processing_doc , ngo_document_list, csr_document_list',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_documents_req_list`
--

INSERT INTO `org_documents_req_list` (`id`, `org_id`, `doc_name`, `doc_type`) VALUES
(1, 2, 'document', 'payment_processing_doc'),
(2, 2, 'document2', 'payment_processing_doc'),
(3, 2, 'ngo doc 1', 'ngo_document_list'),
(4, 2, 'ngo doc 2', 'ngo_document_list'),
(5, 2, 'csr doc 2', 'csr_document_list'),
(6, 2, 'csr doc 1', 'csr_document_list');

-- --------------------------------------------------------

--
-- Table structure for table `org_ngo_review_status`
--

DROP TABLE IF EXISTS `org_ngo_review_status`;
CREATE TABLE IF NOT EXISTS `org_ngo_review_status` (
  `review_status_id` int(10) NOT NULL AUTO_INCREMENT,
  `org_id` int(10) NOT NULL,
  `ngo_id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`review_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_ngo_review_status`
--

INSERT INTO `org_ngo_review_status` (`review_status_id`, `org_id`, `ngo_id`, `status`) VALUES
(92, 1, 3, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `org_staff_account`
--

DROP TABLE IF EXISTS `org_staff_account`;
CREATE TABLE IF NOT EXISTS `org_staff_account` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify_code` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `org_staff_account`
--

INSERT INTO `org_staff_account` (`staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_phone_no`, `staff_status`, `staff_role_id`, `staff_role`, `org_id`, `donor_id`, `parent_id`, `first_login`, `last_login`, `last_password_change`, `created_date`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'ch', 'p', 'test@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 0, 0, '2020-09-28 13:09:40', '2021-01-07 09:24:41', '2020-09-28 13:09:55', '2020-09-28', '13:09:13', '2020-09-28 13:27:13', '', 0),
(2, 'Kriti', 'Bajaj', 'kritib@gmail.com', 'bbeda973649b9b6e0aa40895102c0d89d530270c', 'default_profile.jpg', NULL, 'Active', 2, 'Admin', 2, 0, 0, '2020-09-30 11:09:27', '2020-12-15 06:12:05', '2020-09-30 11:09:44', '2020-09-30', '11:09:44', '2020-09-30 11:01:44', '', 0),
(3, 'K', 'B', 'kri.tib@gmail.com', 'd2f406f10f3254e229e34ff95b398c2873d59839', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 0, 1, '2020-11-19 11:11:40', '2020-11-19 11:11:40', '2020-11-19 11:11:13', '2020-11-19', '11:11:13', '2020-11-19 11:12:13', '', 0),
(4, 'kriti 4', 'blah', 'krit.ib@gmail.com', 'bcb362837489ba83166ee461080e031e3ae8bf44', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 0, 1, '2020-12-15 17:12:04', '2020-12-15 17:12:04', '2020-12-15 17:12:31', '2020-12-15', '17:12:01', '2020-12-15 17:07:01', '', 0),
(5, 'ok', 'ok', 'ok@gmail.com', '6b4c76c90a36e6f78903bbb6317deb232dcbba72', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '10:12:31', '2020-12-23 04:39:31', '', 0),
(6, 'erchatur', 'erchatur', 'testngo1@gmail.com', 'd46374de85f1759a6c7c634b0701155efa99fbfc', 'default_profile.jpg', NULL, 'Active', 3, 'Regular', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '10:12:31', '2020-12-23 05:25:31', '', 0),
(7, 'erchatur', 'erchatur', 'testngo12@gmail.com', 'f00964e4aab2041e8683a39c7c472a3f0c564c36', 'default_profile.jpg', NULL, 'Active', 3, 'Regular', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '11:12:37', '2020-12-23 05:30:37', '', 0),
(8, 'erchatur', 'erchatur', 'erchatur.prajapat@gmail.com', '0eb2f606fbb7d461f78547d1e2d233a27364031b', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '11:12:10', '2020-12-23 05:34:10', '', 0),
(9, 'Kriti', 'Bajaj', 'k.ritib@gmail.com', 'bbeda973649b9b6e0aa40895102c0d89d530270c', 'default_profile.jpg', NULL, 'Active', 4, 'Admin', 3, 0, 0, '2020-12-28 08:12:27', '2020-12-28 08:12:27', '2020-12-28 08:12:40', '2020-12-28', '02:12:11', '2020-12-28 02:48:11', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_tasks`
--

DROP TABLE IF EXISTS `org_tasks`;
CREATE TABLE IF NOT EXISTS `org_tasks` (
  `org_task_id` int(10) NOT NULL AUTO_INCREMENT,
  `org_task_list_id` int(10) NOT NULL,
  `task_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `org_task_label` varchar(100) NOT NULL,
  `view_file_name` varchar(200) NOT NULL,
  `org_id` int(10) NOT NULL,
  `org_staff_id` int(10) NOT NULL,
  `superngo_id` int(10) DEFAULT NULL,
  `prop_id` int(10) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'new',
  `due_date` date DEFAULT NULL,
  `comments` longtext,
  `additional_json` longtext,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`org_task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=377 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_tasks`
--

INSERT INTO `org_tasks` (`org_task_id`, `org_task_list_id`, `task_type`, `org_task_label`, `view_file_name`, `org_id`, `org_staff_id`, `superngo_id`, `prop_id`, `created_date`, `created_time`, `status`, `due_date`, `comments`, `additional_json`, `project_id`) VALUES
(1, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 6, '2020-12-28', '03:31:48', 'Complete', NULL, '', '', 0),
(2, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 10, '2020-12-28', '06:13:13', 'Complete', NULL, 'test 11111111', '', 0),
(3, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 12, '2020-12-28', '06:33:57', 'Complete', NULL, 'test22222', '', 0),
(4, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 14, '2020-12-28', '06:48:28', 'Complete', NULL, 'qwert', '', 0),
(5, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 1, 5, '2020-12-28', '18:06:20', 'Complete', NULL, '', '', NULL),
(6, 2, '', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 1, 5, '2020-12-28', '23:55:33', 'Complete', NULL, '', '', 0),
(7, 3, '', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 1, 5, '2020-12-29', '00:06:57', 'Complete', NULL, 'Test data', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(8, 4, '', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 1, 5, '2020-12-29', '00:14:19', 'new', NULL, NULL, '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(9, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 4, '2020-12-29', '10:51:22', 'Complete', NULL, 'pk', '', NULL),
(10, 2, '', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 4, '2020-12-29', '10:51:33', 'Complete', NULL, '', '', 0),
(11, 3, '', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 4, '2020-12-29', '10:51:45', 'Complete', NULL, '', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(12, 4, '', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 4, '2020-12-29', '10:51:54', 'Complete', NULL, 'ok', '', 11),
(13, 5, '', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 4, '2020-12-29', '10:52:07', 'Complete', NULL, 'test ok  data', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-31\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 1, csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"3223\"}],\"cycle_file_upload\":\"entity_5fec555ca1f4f.png\",\"project_start_date\":\"2020-12-23\",\"project_end_date\":\"2020-12-31\",\"comments\":\"test ok  data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(15, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:13:32', 'new', NULL, NULL, '', 0),
(23, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '14:15:21', 'new', NULL, NULL, '', 0),
(24, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '14:17:09', 'new', NULL, NULL, '', 0),
(26, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:08:03', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5feaf8e41b490.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(14, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:07:46', 'new', NULL, NULL, '', 0),
(16, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:29:22', 'new', NULL, NULL, '', 0),
(25, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '14:18:06', 'new', NULL, NULL, '', 0),
(17, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:32:52', 'new', NULL, NULL, '', 0),
(18, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:33:23', 'new', NULL, NULL, '', 0),
(19, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:36:39', 'new', NULL, NULL, '', 0),
(20, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:36:55', 'new', NULL, NULL, '', 0),
(21, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:39:22', 'new', NULL, NULL, '', 0),
(22, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '12:39:54', 'new', NULL, NULL, '', 0),
(47, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:55:14', 'new', NULL, NULL, '', 0),
(48, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:58:26', 'new', NULL, NULL, '', 0),
(49, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:58:55', 'new', NULL, NULL, '', 0),
(52, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:05:20', 'new', NULL, NULL, '', 0),
(27, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:08:21', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5feaf8e41b490.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(28, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:15:45', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5feaf8e41b490.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(29, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:16:14', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5feaf8e41b490.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(30, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:16:39', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5feaf8e41b490.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(31, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:18:16', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5feaf8e41b490.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(32, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:18:18', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5feaf8e41b490.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(33, 1, '', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, NULL, '2020-12-29', '15:18:24', 'Complete', NULL, 'test', '', 11),
(39, 2, '', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 0, '2020-12-29', '15:28:43', 'Complete', NULL, 'new test', '', 0),
(40, 3, '', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 0, '2020-12-29', '15:29:14', 'Complete', NULL, 'new test', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(41, 4, '', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 0, '2020-12-29', '15:29:26', 'Complete', NULL, 'test', '', 12),
(42, 5, '', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 0, '2020-12-29', '15:29:38', 'Complete', NULL, 'new test  test', '[{\"cycle_list\":[{\"cycle_name\":\"54\",\"cycle_start_date1\":\"2020-12-31\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"454\"}],\"cycle_file_upload\":\"entity_5feb1b15a26e3.png\",\"project_start_date\":\"2020-12-08\",\"project_end_date\":\"2021-01-21\",\"comments\":\"new test  test\",\"project_id\":\"0\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(34, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:23:09', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2039-12-13\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"1223\"}],\"cycle_file_upload\":\"entity_5feafc2a3d965.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(35, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:24:33', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"123456\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1, csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"123456\"}],\"cycle_file_upload\":\"entity_5feafcb9dc398.png\",\"project_start_date\":\"2020-12-09\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(36, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:24:47', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"123456\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1, csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"123456\"}],\"cycle_file_upload\":\"entity_5feafcb9dc398.png\",\"project_start_date\":\"2020-12-09\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(37, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:25:51', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"123456\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1, csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"123456\"}],\"cycle_file_upload\":\"entity_5feafcb9dc398.png\",\"project_start_date\":\"2020-12-09\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data 1\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(45, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:54:29', 'new', NULL, NULL, '', 0),
(46, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:54:45', 'new', NULL, NULL, '', 0),
(38, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '15:26:28', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"123456\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1, csr doc 2\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"123456\"}],\"cycle_file_upload\":\"entity_5feafcb9dc398.png\",\"project_start_date\":\"2020-12-09\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data 1\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 11),
(83, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 0, '2020-12-31', '16:45:00', 'new', NULL, NULL, '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"11\"}]', 0),
(43, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 0, '2020-12-29', '15:32:55', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"21\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"new test\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2, csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"21\"}],\"cycle_file_upload\":\"entity_5feafe2349ecc.png\",\"project_start_date\":\"2020-12-29\",\"project_end_date\":\"2020-12-23\",\"comments\":\"new test\",\"project_id\":\"12\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 12),
(44, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 0, '2020-12-29', '15:40:28', 'new', NULL, NULL, '', 12),
(50, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:00:52', 'new', NULL, NULL, '', 0),
(51, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:01:17', 'new', NULL, NULL, '', 0),
(53, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:05:28', 'new', NULL, NULL, '', 0),
(54, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:32:05', 'new', NULL, NULL, '', 0),
(55, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:32:35', 'new', NULL, NULL, '', 0),
(56, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:33:02', 'new', NULL, NULL, '', 0),
(57, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:33:10', 'new', NULL, NULL, '', 0),
(58, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:33:33', 'new', NULL, NULL, '', 0),
(59, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:34:13', 'new', NULL, NULL, '', 0),
(60, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:34:32', 'new', NULL, NULL, '', 0),
(61, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:34:41', 'new', NULL, NULL, '', 0),
(62, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:35:18', 'new', NULL, NULL, '', 0),
(63, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:56:58', 'new', NULL, NULL, '[{\"cycle_file_upload\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(64, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '16:57:30', 'new', NULL, NULL, '[{\"cycle_file_upload\":\"\",\"project_start_date\":\"\",\"project_end_date\":\"\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(65, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:00:12', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abcfdfdf\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"342\"}],\"cycle_file_upload\":\"entity_5feb1308e091d.png\",\"project_start_date\":\"2020-12-09\",\"project_end_date\":\"2020-12-18\",\"comments\":\"test data 222\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(66, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:02:10', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abcfdfdf\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"342\"}],\"cycle_file_upload\":\"entity_5feb1308e091d.png\",\"project_start_date\":\"2020-12-09\",\"project_end_date\":\"2020-12-18\",\"comments\":\"test data 222\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(67, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:06:11', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"34355\"}],\"cycle_file_upload\":\"entity_5feb14755e6c0.png\",\"project_start_date\":\"2020-12-22\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data 222\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(68, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:09:59', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"34355\"}],\"cycle_file_upload\":\"entity_5feb14755e6c0.png\",\"project_start_date\":\"2020-12-22\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(69, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:10:27', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"34355\"}],\"cycle_file_upload\":\"entity_5feb14755e6c0.png\",\"project_start_date\":\"2020-12-22\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(70, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:10:32', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"34355\"}],\"cycle_file_upload\":\"entity_5feb14755e6c0.png\",\"project_start_date\":\"2020-12-22\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(75, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-30', '15:32:34', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-30\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"3234\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"32123\"}],\"cycle_file_upload\":\"entity_5fec4f8d9d9bf.png\",\"project_start_date\":\"2020-12-01\",\"project_end_date\":\"2020-12-30\",\"comments\":\"test ok \",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(71, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:13:59', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-23\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"3432\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 1\"},{\"cycle_name\":\"abc test1\",\"cycle_start_date1\":\"2020-12-30\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"4\",\"donor_dropdown\":\"New Donor Dec\",\"cycle_donor_amount\":\"4343\",\"ngo_payment\":\"document, document2\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"3423\"}],\"cycle_file_upload\":\"entity_5feb1619ef9fa.png\",\"project_start_date\":\"2020-12-29\",\"project_end_date\":\"2020-12-23\",\"comments\":\"test data test\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(72, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:18:24', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"342\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2, csr doc 1\"},{\"cycle_name\":\"asd\",\"cycle_start_date1\":\"2020-12-17\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"4\",\"donor_dropdown\":\"New Donor Dec\",\"cycle_donor_amount\":\"2343\",\"ngo_payment\":\"document, document2\",\"ngo_doc\":\"ngo doc 2, ngo doc 1\",\"csr_doc\":\"csr doc 1, csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"232\"}],\"cycle_file_upload\":\"entity_5feb1710c933c.png\",\"project_start_date\":\"2020-12-26\",\"project_end_date\":\"2020-12-31\",\"comments\":\"test ok \",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(74, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-29', '17:34:11', 'Complete', NULL, 'test ttt', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test ttt\",\"project_id\":\"11\"}]', 11),
(73, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 0, '2020-12-29', '17:31:02', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"asd\",\"cycle_start_date1\":\"2020-12-29\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"121\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2020-12-29\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2, csr doc 1\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-29\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"121\",\"ngo_payment\":\"document, document2\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1, csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"121\"}],\"cycle_file_upload\":\"entity_5feb1a1dce81b.png\",\"project_start_date\":\"2020-12-29\",\"project_end_date\":\"2020-12-29\",\"comments\":\"new test  test\",\"project_id\":\"0\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(80, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 0, '2020-12-30', '18:16:37', 'new', NULL, NULL, '', 0),
(79, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 0, '2020-12-30', '17:45:12', 'new', NULL, NULL, '', 0),
(76, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-30', '15:39:52', 'new', NULL, NULL, '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2020-12-31\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"Select donor\",\"cycle_donor_amount\":\"231\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5fec51c5c05c0.png\",\"project_start_date\":\"2020-12-16\",\"project_end_date\":\"2020-12-31\",\"comments\":\"test ok  data\",\"project_id\":\"11\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(77, 6, '', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2020-12-30', '15:54:56', 'Complete', NULL, NULL, '', 0),
(78, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 4, '2020-12-30', '16:39:11', 'new', NULL, NULL, '', 0),
(81, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 0, '2020-12-31', '16:29:20', 'new', NULL, NULL, '', 0),
(82, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 0, '2020-12-31', '16:40:24', 'new', NULL, NULL, '', 0),
(84, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 4, '2020-12-31', '16:49:04', 'new', NULL, NULL, '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 0),
(85, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 0, '2020-12-31', '16:51:11', 'new', NULL, NULL, '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"11\"}]', 11),
(86, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 0, '2020-12-31', '16:54:23', 'new', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"11\"}]', 11),
(87, 7, '', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 2, '2020-12-31', '16:54:36', 'Complete', NULL, 'testtest test  ok ', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"testtest test  ok \",\"project_id\":\"\"}]', 11),
(88, 3, '', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 17, '2021-01-01', '09:39:34', 'Complete', NULL, 'test', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(89, 2, '', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 6, '2021-01-01', '10:36:58', 'Complete', NULL, 'test', '', 0),
(90, 2, '', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 6, '2021-01-01', '10:37:08', 'new', NULL, '', '', 0),
(91, 4, '', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 17, '2021-01-01', '10:41:02', 'Complete', NULL, 'test21', '', 14),
(92, 4, '', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 17, '2021-01-01', '10:41:47', 'Complete', NULL, 'test test 34ds', '', 13),
(93, 4, '', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 17, '2021-01-01', '10:43:37', 'Complete', NULL, 'Proposal Final Review', '', 0),
(94, 5, '', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 17, '2021-01-01', '10:49:49', 'new', NULL, 'Proposal Final Review', '', 11),
(95, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 6, '2021-01-01', '13:16:53', 'Complete', NULL, 'test  44444', '', 0),
(96, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 21, '2021-01-01', '14:22:28', 'Complete', NULL, 'proposal creation review', '', 0),
(97, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 21, '2021-01-01', '14:27:09', 'Complete', NULL, 'proposal creation review', '', 0),
(98, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 4, '2021-01-01', '18:07:24', 'new', NULL, 'test ttt', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test ttt\",\"project_id\":\"11\"}]', 11),
(99, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:21:12', 'Complete', NULL, 'test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 11),
(100, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:21:30', 'Complete', NULL, 'test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 11),
(101, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:26:30', 'Complete', NULL, 'test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 11),
(102, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:26:43', 'Complete', NULL, 'tst', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"tst\",\"project_id\":\"11\"}]', 11),
(103, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:27:00', 'Complete', NULL, 'test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 11),
(104, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:27:16', 'Complete', NULL, 'test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 11),
(105, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:29:15', 'Complete', NULL, 'test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 11),
(106, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:29:42', 'Complete', NULL, 'test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"11\"}]', 11),
(107, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 4, '2021-01-02', '10:30:29', 'Complete', NULL, 'test test', '[{\"csr_list\":[{\"csr_id\":\"2\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabcfce14e.png\",\"csr_file_value_actual\":\"card-icon-2.png\"},{\"csr_id\":\"6\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedabd700207.png\",\"csr_file_value_actual\":\"footer-icon.png\"},{\"csr_id\":\"7\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5fedaa6f40444.png\",\"csr_file_value_actual\":\"card-icon-2.png\"}],\"payment\":\"\",\"comments\":\"test test\",\"project_id\":\"11\"}]', 11),
(108, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 21, '2021-01-02', '10:31:30', 'Complete', NULL, 'proposal creation review', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-04\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"3234\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"212\"}],\"cycle_file_upload\":\"entity_5feffe373e09a.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-26\",\"comments\":\"proposal creation review\",\"project_id\":\"0\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(109, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 21, '2021-01-02', '10:32:28', 'Complete', NULL, 'teste', '[{\"csr_list\":[{\"csr_id\":\"10\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"teste\",\"project_id\":\"0\"}]', 0),
(110, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 21, '2021-01-02', '10:32:38', 'new', NULL, 'teste', '[{\"csr_list\":[{\"csr_id\":\"10\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"teste\",\"project_id\":\"0\"}]', 0),
(111, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 10, '2021-01-02', '10:52:42', 'Complete', NULL, 'test 11111111', '', NULL),
(112, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 12, '2021-01-02', '11:12:58', 'Complete', NULL, 'test22222', '', 0),
(113, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 6, '2021-01-02', '11:17:10', 'Complete', NULL, 'test  44444', '', 15),
(114, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 17, '2021-01-02', '11:20:53', 'Complete', NULL, ' test 34ds', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-13\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"Select donor\",\"cycle_donor_amount\":\"32\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-12\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"23\"}],\"cycle_file_upload\":\"entity_5ff009fc5cf83.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-05\",\"comments\":\" test 34ds\",\"project_id\":\"13\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(115, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 17, '2021-01-02', '11:22:55', 'Complete', NULL, 'test34ds', '[{\"csr_list\":[{\"csr_id\":\"10\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test34ds\",\"project_id\":\"0\"}]', 0),
(116, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 17, '2021-01-02', '11:23:18', 'new', NULL, 'test34ds', '[{\"csr_list\":[{\"csr_id\":\"10\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test34ds\",\"project_id\":\"0\"}]', 0),
(117, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 17, '2021-01-02', '11:24:58', 'Complete', NULL, 'test21 ', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"23\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff00c0988343.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-06\",\"comments\":\"test21 \",\"project_id\":\"14\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 0),
(118, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 17, '2021-01-02', '11:31:16', 'Complete', NULL, 'test123', '[{\"csr_list\":[{\"csr_id\":\"10\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test123\",\"project_id\":\"0\"}]', 0),
(119, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 17, '2021-01-02', '11:31:51', 'new', NULL, 'test123', '[{\"csr_list\":[{\"csr_id\":\"10\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test123\",\"project_id\":\"0\"}]', 0),
(120, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 6, '2021-01-02', '11:33:41', 'Complete', NULL, 'test  44444', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-13\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"121\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"321\"}],\"cycle_file_upload\":\"entity_5ff00d48063d2.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-02\",\"comments\":\"test  44444\",\"project_id\":\"15\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 15);
INSERT INTO `org_tasks` (`org_task_id`, `org_task_list_id`, `task_type`, `org_task_label`, `view_file_name`, `org_id`, `org_staff_id`, `superngo_id`, `prop_id`, `created_date`, `created_time`, `status`, `due_date`, `comments`, `additional_json`, `project_id`) VALUES
(121, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 6, '2021-01-02', '11:36:34', 'Complete', NULL, 'test123', '[{\"csr_list\":[{\"csr_id\":\"22\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test123\",\"project_id\":\"15\"}]', 15),
(122, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 6, '2021-01-02', '11:43:14', 'new', NULL, 'test123', '[{\"csr_list\":[{\"csr_id\":\"22\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test123\",\"project_id\":\"15\"}]', 15),
(123, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 10, '2021-01-02', '11:58:57', 'new', NULL, 'test 11111111', '', 11),
(124, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 10, '2021-01-02', '11:58:59', 'new', NULL, 'test 11111111', '', NULL),
(125, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 10, '2021-01-02', '11:59:05', 'new', NULL, 'test 11111111', '', NULL),
(126, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 12, '2021-01-02', '12:01:51', 'Complete', NULL, 'test22222', '', 0),
(127, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 12, '2021-01-02', '12:01:56', 'Complete', NULL, 'test3333', '', 0),
(128, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 12, '2021-01-02', '12:05:17', 'Complete', NULL, 'test3333', '', 16),
(129, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 12, '2021-01-02', '12:05:28', 'Complete', NULL, 'test3333', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"12\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"2123\"}],\"cycle_file_upload\":\"entity_5ff0145d0713a.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-02\",\"comments\":\"test3333\",\"project_id\":\"16\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 16),
(130, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 12, '2021-01-02', '12:06:21', 'Complete', NULL, 'test333', '[{\"csr_list\":[{\"csr_id\":\"25\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test333\",\"project_id\":\"16\"}]', 16),
(131, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 12, '2021-01-02', '12:06:40', 'new', NULL, 'test333', '[{\"csr_list\":[{\"csr_id\":\"25\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test333\",\"project_id\":\"16\"}]', 16),
(132, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 9, '2021-01-02', '12:29:11', 'Complete', NULL, 'warrwa', '', 0),
(133, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 14, '2021-01-02', '12:30:24', 'Complete', NULL, 'qwert', '', 0),
(134, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 14, '2021-01-02', '12:30:53', 'Complete', NULL, 'qwert', '', 0),
(135, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 14, '2021-01-02', '12:31:08', 'Complete', NULL, 'qwert', '', 17),
(136, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 14, '2021-01-02', '12:31:18', 'Complete', NULL, 'qwert', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"234\",\"ngo_payment\":\"document2\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff01a516a8db.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-13\",\"comments\":\"qwert\",\"project_id\":\"17\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 17),
(137, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 14, '2021-01-02', '12:32:05', 'Complete', NULL, 'test ', '[{\"csr_list\":[{\"csr_id\":\"28\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test \",\"project_id\":\"17\"}]', 17),
(138, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 14, '2021-01-02', '12:33:50', 'new', NULL, 'test ', '[{\"csr_list\":[{\"csr_id\":\"28\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test \",\"project_id\":\"17\"}]', 17),
(139, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 15, '2021-01-02', '12:40:44', 'Complete', NULL, 'kkk', '', 0),
(140, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 15, '2021-01-02', '12:41:20', 'Complete', NULL, 'kkk', '', 18),
(141, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 15, '2021-01-02', '12:42:45', 'Complete', NULL, 'kkk', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"1245\"}],\"cycle_file_upload\":\"entity_5ff01d01066f9.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-02\",\"comments\":\"kkk\",\"project_id\":\"18\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 18),
(142, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 15, '2021-01-02', '12:43:29', 'Complete', NULL, 'kkk', '[{\"csr_list\":[{\"csr_id\":\"31\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"kkk\",\"project_id\":\"18\"}]', 18),
(143, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 15, '2021-01-02', '12:45:53', 'new', NULL, 'kkk', '[{\"csr_list\":[{\"csr_id\":\"31\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"kkk\",\"project_id\":\"18\"}]', 18),
(144, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 9, '2021-01-02', '13:14:47', 'Complete', NULL, 'warrwa', '', 19),
(145, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 9, '2021-01-02', '13:14:58', 'Complete', NULL, 'warrwa', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff02484c5536.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-02\",\"comments\":\"warrwa\",\"project_id\":\"19\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 19),
(146, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 9, '2021-01-02', '13:15:32', 'Complete', NULL, 'ssssss', '[{\"csr_list\":[{\"csr_id\":\"34\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"ssssss\",\"project_id\":\"19\"}]', 19),
(147, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 9, '2021-01-02', '13:15:46', 'new', NULL, 'ssssss', '[{\"csr_list\":[{\"csr_id\":\"34\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"ssssss\",\"project_id\":\"19\"}]', 19),
(148, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 23, '2021-01-02', '13:49:22', 'Complete', NULL, 'today test', '', 0),
(149, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 23, '2021-01-02', '13:50:24', 'Complete', NULL, 'today test', '', 20),
(150, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 23, '2021-01-02', '13:50:45', 'Complete', NULL, 'today test234323', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"23\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2, csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"23\"}],\"cycle_file_upload\":\"entity_5ff04efa60c16.png\",\"project_start_date\":\"2021-01-01\",\"project_end_date\":\"2021-01-02\",\"comments\":\"today test234323\",\"project_id\":\"20\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 20),
(173, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 23, '2021-01-02', '16:17:49', 'new', NULL, '', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"23\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2, csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"23\"}],\"cycle_file_upload\":\"entity_5ff04efa60c16.png\",\"project_start_date\":\"2021-01-01\",\"project_end_date\":\"2021-01-02\",\"comments\":\"today test234323\",\"project_id\":\"20\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 20),
(151, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 23, '2021-01-02', '13:52:31', 'Complete', NULL, 'today test', '[{\"csr_list\":[{\"csr_id\":\"37\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"40\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"44\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"45\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"today test\",\"project_id\":\"20\"}]', 20),
(152, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 23, '2021-01-02', '13:52:52', 'new', NULL, 'today test', '[{\"csr_list\":[{\"csr_id\":\"37\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"40\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"44\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"45\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"today test\",\"project_id\":\"20\"}]', 20),
(153, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 23, '2021-01-02', '13:53:09', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"37\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"40\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"44\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"45\",\"csr_name\":\" csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"20\"}]', 20),
(154, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 24, '2021-01-02', '13:54:25', 'Complete', NULL, 'dads', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(155, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 24, '2021-01-02', '13:54:47', 'Complete', NULL, 'dadsasdas', '', 21),
(156, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 24, '2021-01-02', '13:55:46', 'Complete', NULL, '', '[{\"cycle_list\":[{\"cycle_name\":\"c1 \",\"cycle_start_date1\":\"2021-01-12\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"45\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"c2\",\"cycle_start_date1\":\"2021-01-19\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"423\"}],\"cycle_file_upload\":\"entity_5ff02e14cae09.png\",\"project_start_date\":\"2021-01-01\",\"project_end_date\":\"2021-01-22\",\"comments\":\"\",\"project_id\":\"21\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 21),
(157, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 24, '2021-01-02', '13:56:33', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"49\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5ff02e63ece6b.png\",\"csr_file_value_actual\":\"buying-together-icon.png\"},{\"csr_id\":\"52\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"21\"}]', 21),
(158, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 24, '2021-01-02', '13:57:18', 'new', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"49\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5ff02e63ece6b.png\",\"csr_file_value_actual\":\"buying-together-icon.png\"},{\"csr_id\":\"52\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"21\"}]', 21),
(159, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 24, '2021-01-02', '13:57:35', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"49\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"52\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"21\"}]', 21),
(160, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 25, '2021-01-02', '14:15:54', 'Complete', NULL, 'test', '', 0),
(161, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 25, '2021-01-02', '14:16:31', 'Complete', NULL, 'test 321', '', 22),
(162, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 25, '2021-01-02', '14:16:52', 'Complete', NULL, 'test', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"21\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-02\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff0331b98469.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-02\",\"comments\":\"test\",\"project_id\":\"22\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 22),
(163, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 25, '2021-01-02', '14:18:22', 'Complete', NULL, 'test ', '[{\"csr_list\":[{\"csr_id\":\"55\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"58\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"yes\",\"comments\":\"test \",\"project_id\":\"22\"}]', 22),
(164, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 25, '2021-01-02', '14:18:50', 'Complete', NULL, 'test', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"test\",\"project_id\":\"22\"}]', 22),
(166, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 26, '2021-01-02', '14:52:31', 'Complete', NULL, 'okok', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(165, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 25, '2021-01-02', '14:23:47', 'new', NULL, '', NULL, 22),
(167, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 26, '2021-01-02', '15:15:12', 'Complete', NULL, 'okok1', '', 24),
(168, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 26, '2021-01-02', '15:15:50', 'Complete', NULL, 'ok2', '[{\"cycle_list\":[{\"cycle_name\":\"c1\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1\"},{\"cycle_name\":\"c2\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"989\"}],\"cycle_file_upload\":\"entity_5ff040e3a875b.png\",\"project_start_date\":\"2020-12-02\",\"project_end_date\":\"2021-01-21\",\"comments\":\"ok2\",\"project_id\":\"24\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 24),
(169, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 26, '2021-01-02', '15:17:10', 'new', NULL, '', '[{\"cycle_list\":[{\"cycle_name\":\"c1\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1\"},{\"cycle_name\":\"c2\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"989\"}],\"cycle_file_upload\":\"entity_5ff040e3a875b.png\",\"project_start_date\":\"2020-12-02\",\"project_end_date\":\"2021-01-21\",\"comments\":\"ok2\",\"project_id\":\"24\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 24),
(170, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 12, '2021-01-02', '16:03:01', 'Complete', NULL, 'test', '', 25),
(171, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 12, '2021-01-02', '16:03:16', 'Complete', NULL, 'tet', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"Select donor\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff04bf9402da.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-27\",\"comments\":\"tet\",\"project_id\":\"25\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 25),
(172, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 12, '2021-01-02', '16:08:54', 'new', NULL, '', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"Select donor\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff04bf9402da.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-27\",\"comments\":\"tet\",\"project_id\":\"25\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 25),
(174, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 27, '2021-01-02', '16:51:52', 'Complete', NULL, 'test 44', '', 0),
(175, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 27, '2021-01-02', '16:52:54', 'Complete', NULL, 'test 55', '', 26),
(176, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 27, '2021-01-02', '16:53:10', 'Complete', NULL, 'test 666', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-06\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"11\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2021-01-28\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"111\"}],\"cycle_file_upload\":\"entity_5ff057abb8dca.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-27\",\"comments\":\"test 666\",\"project_id\":\"26\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 26),
(177, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 27, '2021-01-02', '16:57:44', 'Complete', NULL, 'test 66', '[{\"csr_list\":[{\"csr_id\":\"77\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"test 66\",\"project_id\":\"26\"}]', 26),
(178, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 27, '2021-01-02', '17:44:16', 'Complete', NULL, 'tesr 444', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"tesr 444\",\"project_id\":\"26\"}]', 26),
(179, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 27, '2021-01-02', '17:48:23', 'new', NULL, '', NULL, 26),
(180, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 28, '2021-01-02', '17:56:33', 'Complete', NULL, 'new test ', '', 0),
(181, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 28, '2021-01-02', '17:56:59', 'Complete', NULL, 'new test', '', 27),
(182, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 28, '2021-01-02', '17:59:18', 'Complete', NULL, 'tesrt', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"11\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"qqq\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2, csr doc 1\"},{\"cycle_name\":\"43233\",\"cycle_start_date1\":\"2021-01-07\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"333\",\"ngo_payment\":\"document2\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2, csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"3234\"}],\"cycle_file_upload\":\"entity_5ff0674e6bb9e.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-09\",\"comments\":\"tesrt\",\"project_id\":\"27\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 27),
(183, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 28, '2021-01-02', '18:04:23', 'Complete', NULL, 'tesrt', '[{\"csr_list\":[{\"csr_id\":\"82\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5ff0687077a24.png\",\"csr_file_value_actual\":\"card-icon-3.png\"}],\"payment\":\"\",\"comments\":\"tesrt\",\"project_id\":\"27\"}]', 27),
(184, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 28, '2021-01-02', '18:05:07', 'Complete', NULL, 'tert', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"yes\",\"comments\":\"tert\",\"project_id\":\"27\"}]', 27),
(185, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 28, '2021-01-02', '18:05:45', 'Complete', NULL, 'tesr', '[{\"csr_list\":[{\"csr_id\":\"85\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"},{\"csr_id\":\"86\",\"csr_name\":\" csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"tesr\",\"project_id\":\"27\"}]', 27),
(186, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 29, '2021-01-02', '18:09:24', 'Complete', NULL, 'oko', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(187, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 29, '2021-01-02', '18:10:03', 'Complete', NULL, 'ok', '', 28),
(188, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 29, '2021-01-02', '18:10:20', 'Complete', NULL, 'cycle creation', '[{\"cycle_list\":[{\"cycle_name\":\"cycle 101\",\"cycle_start_date1\":\"2021-01-20\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"100\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"cycle 102\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"},{\"cycle_name\":\"cycle103\",\"cycle_start_date1\":\"2021-01-27\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"222\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff06a4885aef.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-20\",\"comments\":\"cycle creation\",\"project_id\":\"28\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 28),
(189, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 29, '2021-01-02', '18:14:09', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"93\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"28\"}]', 28),
(190, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 29, '2021-01-02', '18:15:51', 'Complete', NULL, '', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"\",\"project_id\":\"28\"}]', 28),
(191, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 29, '2021-01-02', '18:16:01', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"96\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"28\"}]', 28),
(192, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 30, '2021-01-02', '19:02:09', 'Complete', NULL, 'test', '', 0),
(193, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 30, '2021-01-02', '19:03:32', 'Complete', NULL, 'test', '', 29),
(194, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 30, '2021-01-02', '19:03:54', 'Complete', NULL, 'test', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"222\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"qwer\",\"cycle_start_date1\":\"2021-01-07\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"11\"}],\"cycle_file_upload\":\"entity_5ff0768e6b16b.png\",\"project_start_date\":\"2021-01-02\",\"project_end_date\":\"2021-01-20\",\"comments\":\"test\",\"project_id\":\"29\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 29),
(195, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 30, '2021-01-02', '19:05:13', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"101\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"29\"}]', 29),
(196, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 30, '2021-01-02', '19:06:41', 'Complete', NULL, '', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"\",\"project_id\":\"29\"}]', 29),
(197, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 30, '2021-01-02', '19:06:49', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"104\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"29\"}]', 29),
(198, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 31, '2021-01-04', '09:18:24', 'Complete', NULL, 'monday 4', '', 0),
(199, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 31, '2021-01-04', '09:18:48', 'Complete', NULL, 'monday', '', 30),
(200, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 31, '2021-01-04', '09:21:48', 'Complete', NULL, 'monday 4', '[{\"cycle_list\":[{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2021-01-12\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"32\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"66\"}],\"cycle_file_upload\":\"entity_5ff290e257027.png\",\"project_start_date\":\"2021-01-04\",\"project_end_date\":\"2021-01-05\",\"comments\":\"monday 4\",\"project_id\":\"30\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 30),
(201, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 31, '2021-01-04', '09:23:03', 'Complete', NULL, 'monay 4', '[{\"csr_list\":[{\"csr_id\":\"106\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"monay 4\",\"project_id\":\"30\"}]', 30),
(202, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 31, '2021-01-04', '09:24:29', 'Complete', NULL, 'test 4', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"test 4\",\"project_id\":\"30\"}]', 30),
(203, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 31, '2021-01-04', '09:25:02', 'Complete', NULL, 'tesr', '[{\"csr_list\":[{\"csr_id\":\"109\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"tesr\",\"project_id\":\"30\"}]', 30),
(204, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 34, '2021-01-04', '09:39:42', 'Complete', NULL, 'check', '', 0),
(205, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 34, '2021-01-04', '09:40:01', 'Complete', NULL, 'check', '', 31),
(206, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 34, '2021-01-04', '09:40:19', 'Complete', NULL, 'check', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-18\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"pqr\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"23\"}],\"cycle_file_upload\":\"entity_5ff2953711bc5.png\",\"project_start_date\":\"2021-01-04\",\"project_end_date\":\"2021-01-05\",\"comments\":\"check\",\"project_id\":\"31\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 31),
(207, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 34, '2021-01-04', '09:42:01', 'Complete', NULL, 'check', '[{\"csr_list\":[{\"csr_id\":\"111\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"check\",\"project_id\":\"31\"}]', 31),
(208, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 34, '2021-01-04', '09:42:27', 'Complete', NULL, 'check', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"check\",\"project_id\":\"31\"}]', 31),
(209, 7, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 34, '2021-01-04', '09:42:44', 'Complete', NULL, 'tes', '[{\"payment\":\"\",\"comments\":\"tes\",\"project_id\":\"31\"}]', 31),
(211, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 35, '2021-01-04', '10:04:40', 'new', NULL, '', '', 0),
(210, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 35, '2021-01-04', '10:02:25', 'Complete', NULL, 'testing ', '', 0),
(212, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 36, '2021-01-04', '10:06:15', 'Complete', NULL, 'new proposal', '', 0),
(213, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 36, '2021-01-04', '10:06:35', 'new', NULL, '', '', 0),
(214, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 36, '2021-01-04', '10:06:39', 'new', NULL, '', '', 0),
(215, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 36, '2021-01-04', '10:07:03', 'new', NULL, '', '', 0),
(216, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 37, '2021-01-04', '10:08:51', 'Complete', NULL, 'new', '', 0),
(217, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 37, '2021-01-04', '10:09:08', 'Complete', NULL, 'new', '', 32),
(218, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 37, '2021-01-04', '10:09:51', 'Complete', NULL, 'new', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"2\"}],\"cycle_file_upload\":\"entity_5ff29c2f53b60.png\",\"project_start_date\":\"2021-01-04\",\"project_end_date\":\"2021-01-05\",\"comments\":\"new\",\"project_id\":\"32\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 32),
(219, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 37, '2021-01-04', '10:10:53', 'Complete', NULL, 'new1', '[{\"csr_list\":[{\"csr_id\":\"116\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"new1\",\"project_id\":\"32\"}]', 32),
(220, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 37, '2021-01-04', '10:11:30', 'Complete', NULL, 'new1', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"new1\",\"project_id\":\"32\"}]', 32),
(221, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 37, '2021-01-04', '10:11:58', 'Complete', NULL, 'ter', '[{\"payment\":\"\",\"comments\":\"ter\",\"project_id\":\"32\"}]', 32),
(223, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 37, '2021-01-04', '10:13:57', 'new', NULL, '', '[{\"payment\":\"\",\"comments\":\"new2\",\"project_id\":\"32\"}]', 32),
(222, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 37, '2021-01-04', '10:12:34', 'new', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"119\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"new12\",\"project_id\":\"32\"}]', 32),
(224, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 37, '2021-01-04', '10:15:01', 'new', NULL, '', '[{\"payment\":\"\",\"comments\":\"ter\",\"project_id\":\"32\"}]', 32),
(225, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 38, '2021-01-04', '10:18:55', 'Complete', NULL, 'proposal new testing ', '', 0),
(226, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 38, '2021-01-04', '10:19:24', 'Complete', NULL, 'proposal new testing ', '', 33),
(227, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 38, '2021-01-04', '10:20:14', 'Complete', NULL, 'proposal new testing ', '[{\"cycle_list\":[{\"cycle_name\":\"new proposal 1\",\"cycle_start_date1\":\"2021-01-04\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"proposal new 2\",\"cycle_start_date1\":\"2021-01-05\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-04\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document2\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"22\"}],\"cycle_file_upload\":\"entity_5ff29ea1da19b.png\",\"project_start_date\":\"2021-01-04\",\"project_end_date\":\"2021-01-04\",\"comments\":\"proposal new testing \",\"project_id\":\"33\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 33),
(228, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 38, '2021-01-04', '10:22:56', 'Complete', NULL, 'proposal new testing ', '[{\"csr_list\":[{\"csr_id\":\"121\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"proposal new testing \",\"project_id\":\"33\"}]', 33),
(229, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 38, '2021-01-04', '10:23:24', 'Complete', NULL, 'proposal new testing ', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"proposal new testing \",\"project_id\":\"33\"}]', 33),
(230, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 38, '2021-01-04', '10:23:38', 'Complete', NULL, 'proposal new testing ', '[{\"csr_list\":[{\"csr_id\":\"124\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"proposal new testing \",\"project_id\":\"33\"}]', 33),
(231, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 38, '2021-01-04', '10:23:53', 'Complete', NULL, 'proposal new testing ', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"proposal new testing \",\"project_id\":\"33\"}]', 33),
(232, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 38, '2021-01-04', '10:24:11', 'Complete', NULL, 'proposal new testing ', '[{\"csr_list\":[{\"csr_id\":\"126\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"proposal new testing \",\"project_id\":\"33\"}]', 33),
(233, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 38, '2021-01-04', '10:24:26', 'Complete', NULL, '', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"\",\"project_id\":\"33\"}]', 33),
(234, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 39, '2021-01-04', '10:29:59', 'Complete', NULL, 'Renew Test', '', 0),
(235, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 39, '2021-01-04', '10:30:23', 'Complete', NULL, 'Renew Test', '', 34),
(236, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 39, '2021-01-04', '10:31:40', 'Complete', NULL, 'Renew Test', '[{\"cycle_list\":[{\"cycle_name\":\"Renew Test 1\",\"cycle_start_date1\":\"2021-01-04\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"121\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"Renew Test 2\",\"cycle_start_date1\":\"2021-01-25\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff2a146434d8.png\",\"project_start_date\":\"2021-01-04\",\"project_end_date\":\"2021-01-11\",\"comments\":\"Renew Test\",\"project_id\":\"34\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 34),
(237, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 39, '2021-01-04', '10:34:04', 'Complete', NULL, 'Renew Test', '[{\"csr_list\":[{\"csr_id\":\"129\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"Renew Test\",\"project_id\":\"34\"}]', 34),
(238, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 39, '2021-01-04', '10:34:24', 'Complete', NULL, 'Renew Test', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"Renew Test\",\"project_id\":\"34\"}]', 34),
(239, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 39, '2021-01-04', '10:34:37', 'Complete', NULL, 'Renew Test', '[{\"csr_list\":[{\"csr_id\":\"132\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"Renew Test\",\"project_id\":\"34\"}]', 34),
(240, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 39, '2021-01-04', '10:34:52', 'Complete', NULL, 'Renew Test', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"Renew Test\",\"project_id\":\"34\"}]', 34),
(241, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 40, '2021-01-04', '10:37:40', 'Complete', NULL, 'test', '', 0),
(242, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 40, '2021-01-04', '11:31:25', 'Complete', NULL, 'tesr', '', 0),
(243, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 40, '2021-01-04', '11:32:50', 'Complete', NULL, 'tesr', '', 0),
(244, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 40, '2021-01-04', '11:37:17', 'Complete', NULL, 'tesr', '', 35),
(245, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 41, '2021-01-04', '11:44:10', 'Complete', NULL, 'ok', '', 0),
(246, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 40, '2021-01-04', '11:57:20', 'new', NULL, '', '', 35),
(247, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 42, '2021-01-04', '12:15:41', 'Complete', NULL, 'test', '', 0),
(248, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 42, '2021-01-04', '12:19:59', 'Complete', NULL, '', '[{\"rejection_records\":\"tetd\",\"rejection_ngo\":\"sdfsdfs\",\"proposal_is_recommended\":\"\"}]', 0),
(249, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 44, '2021-01-04', '12:24:55', 'Complete', NULL, 'ok', '', 0),
(250, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 44, '2021-01-04', '12:36:53', 'new', NULL, 'fdffd', '[{\"rejection_records\":\"qqq\",\"rejection_ngo\":\"wwww\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(251, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 45, '2021-01-04', '12:42:14', 'Complete', NULL, 'test', '', 0);
INSERT INTO `org_tasks` (`org_task_id`, `org_task_list_id`, `task_type`, `org_task_label`, `view_file_name`, `org_id`, `org_staff_id`, `superngo_id`, `prop_id`, `created_date`, `created_time`, `status`, `due_date`, `comments`, `additional_json`, `project_id`) VALUES
(252, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 46, '2021-01-04', '14:46:49', 'Complete', NULL, 'teest', '', 0),
(253, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 46, '2021-01-04', '15:30:44', 'Complete', NULL, 'test', '', 0),
(254, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 46, '2021-01-04', '15:33:28', 'In progress', NULL, 'testr', '', 0),
(256, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 45, '2021-01-04', '16:00:36', 'Complete', NULL, '', '[{\"rejection_records\":\"sdfsd\",\"rejection_ngo\":\"sdfsd\"}]', 0),
(255, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 45, '2021-01-04', '15:35:15', 'Complete', NULL, 'test', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\"}]', 0),
(257, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 45, '2021-01-04', '17:53:45', 'new', NULL, '', '[{\"rejection_records\":\"tetd\",\"rejection_ngo\":\"sdfsdfs\",\"proposal_is_recommended\":\"\"}]', 0),
(258, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 42, '2021-01-04', '18:09:22', 'Complete', NULL, 'sdfd', '', 0),
(290, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 42, '2021-01-05', '16:19:21', 'Complete', NULL, '', '[{\"rejection_records\":\"fsadf\",\"rejection_ngo\":\"dsfsdf\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 39),
(259, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 41, '2021-01-04', '18:26:01', 'Complete', NULL, 'fsdfddf', '[{\"rejection_records\":\"dsdsf\",\"rejection_ngo\":\"dsfsdsdf\",\"proposal_is_recommended\":\"\"}]', 0),
(260, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 41, '2021-01-04', '18:26:16', 'Complete', NULL, 'sdfsdfd', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(261, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 47, '2021-01-04', '18:28:14', 'Complete', NULL, 'test', '', 0),
(262, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 47, '2021-01-04', '18:29:12', 'Complete', NULL, 'test', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"proposal_is_recommended\":\"\"}]', 0),
(263, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 47, '2021-01-04', '18:30:10', 'Complete', NULL, 'tseddsdsdf', '', 0),
(264, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 48, '2021-01-04', '18:35:02', 'Complete', NULL, 'check data', '', 0),
(265, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 48, '2021-01-04', '18:35:59', 'Complete', NULL, 'test', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"proposal_is_recommended\":\"\"}]', 0),
(266, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 48, '2021-01-04', '18:36:27', 'Complete', NULL, 'tesr', '', 0),
(267, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 48, '2021-01-04', '18:36:39', 'Complete', NULL, '', '[{\"rejection_records\":\"sfsd\",\"rejection_ngo\":\"dsfds\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 37),
(268, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 48, '2021-01-04', '18:36:56', 'Complete', NULL, '', '[{\"rejection_records\":\"87\",\"rejection_ngo\":\"testsdfsdfsdfsd\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 36),
(269, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 49, '2021-01-04', '18:44:58', 'Complete', NULL, 'tesrt', '', 0),
(270, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 49, '2021-01-04', '18:45:00', 'Complete', NULL, 'tesrt', '', 0),
(271, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 49, '2021-01-04', '18:45:15', 'Complete', NULL, '', '[{\"rejection_records\":\"Enter Details for rejection for internal records\",\"rejection_ngo\":\"Enter details to submit to NGO\",\"proposal_is_recommended\":\"\"}]', 0),
(272, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 49, '2021-01-04', '18:45:50', 'Complete', NULL, 'Enter details to submit to NGO', '', 0),
(273, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 49, '2021-01-04', '18:50:28', 'Complete', NULL, '', '[{\"rejection_records\":\"tesrt\",\"rejection_ngo\":\"tesr\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(274, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 50, '2021-01-04', '18:58:04', 'Complete', NULL, 'ok', '', 0),
(275, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 50, '2021-01-04', '18:59:17', 'Complete', NULL, 'ok', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"proposal_is_recommended\":\"\"}]', 0),
(276, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 50, '2021-01-04', '19:00:07', 'new', NULL, 'tesr', '', 0),
(277, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 51, '2021-01-04', '19:04:25', 'Complete', NULL, 'ok', '', 0),
(278, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 51, '2021-01-04', '19:05:36', 'Complete', NULL, '', '[{\"rejection_records\":\"sdasds\",\"rejection_ngo\":\"sad\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(279, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 51, '2021-01-05', '09:24:26', 'Complete', NULL, 'ttt', '', 0),
(280, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 49, '2021-01-05', '09:54:09', 'new', NULL, '', '[{\"rejection_records\":\"tesrt\",\"rejection_ngo\":\"tesr\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(281, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 49, '2021-01-05', '10:24:48', 'Complete', NULL, '', '[{\"rejection_records\":\" rrr \",\"rejection_ngo\":\"eee\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(282, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 48, '2021-01-05', '15:35:10', 'new', NULL, '', '[{\"rejection_records\":\"87\",\"rejection_ngo\":\"testsdfsdfsdfsd\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 36),
(283, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 48, '2021-01-05', '15:50:54', 'new', NULL, '', '[{\"rejection_records\":\"sfsd\",\"rejection_ngo\":\"dsfds\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 37),
(284, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 51, '2021-01-05', '15:52:07', 'Complete', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 38),
(285, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 51, '2021-01-05', '15:54:53', 'new', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 38),
(286, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 49, '2021-01-05', '16:07:46', 'Complete', NULL, 'dsfsd', '', 0),
(287, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 49, '2021-01-05', '16:07:57', 'Complete', NULL, '', '[{\"rejection_records\":\"sdfdf\",\"rejection_ngo\":\"dsfsd\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(288, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 49, '2021-01-05', '16:08:06', 'new', NULL, '', '[{\"rejection_records\":\"sdfdf\",\"rejection_ngo\":\"dsfsd\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(289, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 50, '2021-01-05', '16:18:19', 'Complete', NULL, '', '[{\"rejection_records\":\"fsdf\",\"rejection_ngo\":\"dsfdsf\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(291, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 42, '2021-01-05', '16:23:06', 'new', NULL, '', '[{\"rejection_records\":\"fsadf\",\"rejection_ngo\":\"dsfsdf\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 39),
(292, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 52, '2021-01-06', '13:09:08', 'Complete', NULL, 'ttt', '', 0),
(293, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 52, '2021-01-06', '13:09:51', 'Complete', NULL, '', '[{\"rejection_records\":\" fsdf\",\"rejection_ngo\":\"sdsfdf\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(294, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 52, '2021-01-06', '13:11:12', 'new', NULL, '', '[{\"rejection_records\":\" fsdf\",\"rejection_ngo\":\"sdsfdf\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(295, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 53, '2021-01-06', '13:13:09', 'Complete', NULL, 'sdfsf', '', 0),
(296, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 53, '2021-01-06', '13:13:23', 'Complete', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(297, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 53, '2021-01-06', '13:13:30', 'Complete', NULL, 'fsdf', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(298, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 54, '2021-01-06', '14:18:48', 'Complete', NULL, 'LENOVO', '', 0),
(299, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 54, '2021-01-06', '14:19:18', 'Complete', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(300, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 55, '2021-01-06', '14:27:46', 'Complete', NULL, 'LENOVO NGO', '', 0),
(301, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 55, '2021-01-06', '14:28:06', 'Complete', NULL, '', '[{\"rejection_records\":\"  sdfsd \",\"rejection_ngo\":\"sdfsd\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(302, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 54, '2021-01-06', '14:29:47', 'Complete', NULL, 'SDFSD', '', 0),
(303, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 54, '2021-01-06', '14:30:28', 'new', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(304, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 56, '2021-01-06', '14:32:00', 'Complete', NULL, 'HP NGO', '', 0),
(305, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 57, '2021-01-06', '14:35:21', 'Complete', NULL, 'DELL NGO', '', 0),
(306, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 57, '2021-01-06', '16:40:45', 'Complete', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(307, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 53, '2021-01-06', '16:41:43', 'new', NULL, '', '[{\"proposal_is_recommended\":\"Yes\"}]', 0),
(308, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 57, '2021-01-06', '16:48:43', 'new', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(309, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 55, '2021-01-06', '17:12:32', 'Complete', NULL, 'fdsfsd', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"\",\"proposal_is_recommended\":\"Yes\"}]', 0),
(310, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 55, '2021-01-06', '17:27:29', 'new', NULL, '', '[{\"rejection_records\":\"sf\",\"rejection_ngo\":\"sf\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(311, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 56, '2021-01-06', '17:28:08', 'Complete', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(312, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 56, '2021-01-06', '17:28:37', 'Complete', NULL, 'tesrt', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"\",\"proposal_is_recommended\":\"Yes\"}]', 0),
(313, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 56, '2021-01-06', '17:29:15', 'Complete', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 41),
(314, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 56, '2021-01-06', '17:49:24', 'new', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 40),
(315, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 56, '2021-01-06', '18:02:38', 'Complete', NULL, 'df', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-26\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"22\"}],\"cycle_file_upload\":\"entity_5ff5ba6304ef2.png\",\"project_start_date\":\"2021-01-06\",\"project_end_date\":\"2021-01-06\",\"comments\":\"df\",\"project_id\":\"41\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 41),
(316, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 58, '2021-01-06', '18:04:45', 'Complete', NULL, 'TESR', '', 0),
(317, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 58, '2021-01-06', '18:05:10', 'Complete', NULL, '', '[{\"rejection_records\":\" DSFSF\",\"rejection_ngo\":\"DSDF\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(318, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 58, '2021-01-06', '18:05:47', 'Complete', NULL, 'TE', '', 0),
(319, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 58, '2021-01-06', '18:06:23', 'Complete', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 44),
(320, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 59, '2021-01-06', '18:08:55', 'Complete', NULL, 'FF', '', 0),
(321, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 59, '2021-01-06', '18:09:04', 'Complete', NULL, '', '[{\"rejection_records\":\" DDD\",\"rejection_ngo\":\"DDD\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(322, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 59, '2021-01-06', '18:09:17', 'Complete', NULL, 'TTTTTT', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"\",\"proposal_is_recommended\":\"Yes\"}]', 0),
(323, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 59, '2021-01-06', '18:10:11', 'new', NULL, '', '[{\"rejection_records\":\"FFFF\",\"rejection_ngo\":\"EEEE\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(324, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 56, '2021-01-06', '19:10:04', 'Complete', NULL, 'sdfdfsfdf', '[{\"csr_list\":[{\"csr_id\":\"134\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"sdfdfsfdf\",\"project_id\":\"41\"}]', 41),
(325, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 56, '2021-01-06', '19:14:37', 'new', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"134\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"sdfdfsfdf\",\"project_id\":\"41\"}]', 41),
(326, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 60, '2021-01-06', '19:19:58', 'Complete', NULL, 'SDFDS', '', 0),
(327, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 60, '2021-01-06', '19:20:11', 'Complete', NULL, '', '[{\"rejection_records\":\" SF\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(328, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 60, '2021-01-06', '19:20:25', 'Complete', NULL, 'SDFSDF', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"\",\"proposal_is_recommended\":\"Yes\"}]', 0),
(329, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 60, '2021-01-06', '19:20:35', 'Complete', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 42),
(330, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 60, '2021-01-06', '19:20:46', 'Complete', NULL, 'SFSDFDF', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-19\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"22\"}],\"cycle_file_upload\":\"entity_5ff5c04325751.png\",\"project_start_date\":\"2021-01-06\",\"project_end_date\":\"2021-01-19\",\"comments\":\"SFSDFDF\",\"project_id\":\"42\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 42),
(331, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 60, '2021-01-06', '19:21:50', 'Complete', NULL, 'SDFDF', '[{\"csr_list\":[{\"csr_id\":\"148\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"SDFDF\",\"project_id\":\"42\"}]', 42),
(332, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 60, '2021-01-06', '19:22:15', 'Complete', NULL, 'SDFSD', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"SDFSD\",\"project_id\":\"42\"}]', 42),
(333, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 60, '2021-01-06', '19:22:24', 'new', NULL, '', NULL, 42),
(334, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 61, '2021-01-07', '14:10:00', 'Complete', NULL, 'TER', '', 0),
(335, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 61, '2021-01-07', '14:27:28', 'Complete', NULL, '', '[{\"rejection_records\":\" FFF\",\"rejection_ngo\":\"FFF\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(336, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 61, '2021-01-07', '14:42:17', 'Complete', NULL, 'SFDFFDF', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"\",\"proposal_is_recommended\":\"Yes\"}]', 0),
(337, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 61, '2021-01-07', '14:52:48', 'Complete', NULL, '', '[{\"rejection_records\":\"DFSDF\",\"rejection_ngo\":\"SDFSDF\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 43),
(338, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 61, '2021-01-07', '15:04:05', 'Complete', NULL, 'DFSD', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-20\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"32\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-07\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 2\",\"csr_doc\":\"csr doc 1\"}],\"donor_list\":[{\"select_donor\":\"2\",\"donor_amount\":\"22\"}],\"cycle_file_upload\":\"entity_5ff6d6c6a5a42.png\",\"project_start_date\":\"2021-01-07\",\"project_end_date\":\"2021-01-07\",\"comments\":\"DFSD\",\"project_id\":\"43\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 43),
(339, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 61, '2021-01-07', '15:26:44', 'Complete', NULL, 'SDFSD', '[{\"csr_list\":[{\"csr_id\":\"154\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5ff6e17187288.png\",\"csr_file_value_actual\":\"product-1.png\"}],\"payment\":\"yes\",\"comments\":\"SDFSD\",\"project_id\":\"43\"}]', 43),
(341, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 61, '2021-01-07', '15:58:43', 'Complete', NULL, 'FSDF', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"FSDF\",\"project_id\":\"43\"}]', 43),
(342, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 61, '2021-01-07', '16:06:12', 'Complete', NULL, 'SDFD', '[{\"csr_list\":[{\"csr_id\":\"157\",\"csr_name\":\"csr doc 1\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"SDFD\",\"project_id\":\"43\"}]', 43),
(340, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 58, '2021-01-07', '15:46:15', 'new', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 44),
(344, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 61, '2021-01-07', '16:08:23', 'Complete', NULL, 'SDFD', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"SDFD\",\"project_id\":\"43\"}]', 43),
(343, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 61, '2021-01-07', '16:08:11', 'Complete', NULL, 'SDFSDF', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"SDFSDF\",\"project_id\":\"43\"}]', 43),
(345, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 62, '2021-01-07', '16:38:22', 'Complete', NULL, 'ads', '', 0),
(346, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 62, '2021-01-07', '16:40:31', 'Complete', NULL, '', '[{\"rejection_records\":\" as\",\"rejection_ngo\":\"as\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(347, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 62, '2021-01-07', '16:40:46', 'new', NULL, '', '[{\"rejection_records\":\" as\",\"rejection_ngo\":\"as\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(348, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 63, '2021-01-07', '16:42:48', 'Complete', NULL, 'we', '', 0),
(349, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 63, '2021-01-07', '16:43:23', 'Complete', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(350, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 63, '2021-01-07', '16:43:43', 'Complete', NULL, 'sadas', '', 0),
(351, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 63, '2021-01-07', '16:46:03', 'new', NULL, '', '[{\"rejection_records\":\"ds\",\"rejection_ngo\":\"sd\",\"ngo_status\":\"Rejected\",\"proposal_is_recommended\":\"\"}]', 0),
(352, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 64, '2021-01-07', '16:49:17', 'Complete', NULL, 'asd', '', 0),
(353, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 64, '2021-01-07', '16:49:37', 'Complete', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(354, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 64, '2021-01-07', '16:49:51', 'Complete', NULL, 'we', '', 0),
(355, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 64, '2021-01-07', '16:50:08', 'Complete', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 45),
(356, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 64, '2021-01-07', '16:53:33', 'Complete', NULL, '', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-13\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"32\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"},{\"cycle_name\":\"c2\",\"cycle_start_date1\":\"2021-01-20\",\"is_payment\":\"no\",\"donor_dropdown_id\":\"0\",\"donor_dropdown\":\"\",\"cycle_donor_amount\":\"\",\"ngo_payment\":\"\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff6efbf35ae0.jpg\",\"project_start_date\":\"2021-01-06\",\"project_end_date\":\"2021-01-15\",\"comments\":\"\",\"project_id\":\"45\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 45),
(357, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 64, '2021-01-07', '16:58:07', 'Complete', NULL, 'adsad', '[{\"csr_list\":[{\"csr_id\":\"159\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"entity_5ff6f2b02d01d.png\",\"csr_file_value_actual\":\"product-1.png\"}],\"payment\":\"yes\",\"comments\":\"adsad\",\"project_id\":\"45\"}]', 45),
(358, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 64, '2021-01-07', '17:09:22', 'Complete', NULL, '', '[{\"payment_file_value\":\"entity_5ff6f3b458fe4.png\",\"payment_value_actual\":\"product-1.png\",\"payment\":\"yes\",\"comments\":\"\",\"project_id\":\"45\"}]', 45),
(359, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 64, '2021-01-07', '17:13:55', 'Complete', NULL, '', '[{\"csr_list\":[{\"csr_id\":\"162\",\"csr_name\":\"csr doc 2\",\"csr_type\":\"csr_document_list\",\"csr_file_value\":\"\",\"csr_file_value_actual\":\"\"}],\"payment\":\"\",\"comments\":\"\",\"project_id\":\"45\"}]', 45),
(360, 7, 'pmp', 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 1, 1, 2, 64, '2021-01-07', '17:14:49', 'Complete', NULL, '', '[{\"payment_file_value\":\"\",\"payment_value_actual\":\"\",\"payment\":\"\",\"comments\":\"\",\"project_id\":\"45\"}]', 45),
(361, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 65, '2021-01-07', '17:19:21', 'Complete', NULL, 'fgfggdgdfg', '', 0),
(362, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 65, '2021-01-07', '17:22:08', 'Complete', NULL, '', '[{\"rejection_records\":\"  \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(363, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 66, '2021-01-07', '17:27:09', 'Complete', NULL, 'sdfsdfsf', '', 0),
(364, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 65, '2021-01-07', '17:27:29', 'new', NULL, '', '[{\"rejection_records\":\"  \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(365, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 66, '2021-01-07', '17:33:41', 'Complete', NULL, '', '[{\"rejection_records\":\"  dfs \",\"rejection_ngo\":\"sdfsdf\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(366, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 66, '2021-01-07', '17:45:50', 'new', NULL, '', '[{\"rejection_records\":\"  dfs \",\"rejection_ngo\":\"sdfsdf\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(367, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 66, '2021-01-07', '17:46:55', 'new', NULL, '', '[{\"rejection_records\":\"  dfs \",\"rejection_ngo\":\"sdfsdf\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(368, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 67, '2021-01-07', '17:57:20', 'new', NULL, NULL, NULL, NULL),
(369, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 68, '2021-01-07', '17:59:36', 'new', NULL, NULL, NULL, NULL),
(370, 3, 'nrp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 43, '2021-01-07', '18:02:51', 'new', NULL, NULL, NULL, NULL),
(371, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 69, '2021-01-07', '18:05:43', 'Complete', NULL, 'fsdfsdf', '', 0),
(372, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 69, '2021-01-07', '18:06:04', 'Complete', NULL, '', '[{\"rejection_records\":\" sdfdsfsdf  \",\"rejection_ngo\":\"sdfsdfsdfsdfdfdf\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0),
(373, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 69, '2021-01-07', '18:08:17', 'Complete', NULL, 'sdfsdfsdfsd', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"\",\"proposal_is_recommended\":\"Yes\"}]', 0),
(374, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 2, 69, '2021-01-07', '18:17:21', 'Complete', NULL, '', '[{\"rejection_records\":\"asdas\",\"rejection_ngo\":\"sadasd\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"Yes\"}]', 46),
(375, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 2, 69, '2021-01-07', '18:38:48', 'Complete', NULL, 'ttttttt', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-19\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff708ee1f80b.png\",\"project_start_date\":\"2021-01-07\",\"project_end_date\":\"2021-01-19\",\"comments\":\"ttttttt\",\"project_id\":\"46\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 46),
(376, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 2, 69, '2021-01-07', '18:43:58', 'new', NULL, '', '[{\"cycle_list\":[{\"cycle_name\":\"abc\",\"cycle_start_date1\":\"2021-01-19\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"1\",\"donor_dropdown\":\"cp\",\"cycle_donor_amount\":\"22\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"32\"}],\"cycle_file_upload\":\"entity_5ff708ee1f80b.png\",\"project_start_date\":\"2021-01-07\",\"project_end_date\":\"2021-01-19\",\"comments\":\"ttttttt\",\"project_id\":\"46\",\"org_id\":\"1\",\"superngo_id\":\"2\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 46);

-- --------------------------------------------------------

--
-- Table structure for table `org_task_list`
--

DROP TABLE IF EXISTS `org_task_list`;
CREATE TABLE IF NOT EXISTS `org_task_list` (
  `task_id` int(10) NOT NULL AUTO_INCREMENT,
  `org_id` int(10) NOT NULL,
  `task_type` varchar(200) NOT NULL,
  `task_position` int(10) NOT NULL,
  `task_label` varchar(300) NOT NULL,
  `is_cycle_start` varchar(50) NOT NULL DEFAULT 'no',
  `view_file_name` varchar(200) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_task_list`
--

INSERT INTO `org_task_list` (`task_id`, `org_id`, `task_type`, `task_position`, `task_label`, `is_cycle_start`, `view_file_name`) VALUES
(1, 1, 'prp', 3, 'Proposal Initial Review', 'no', 'organisation/pages/task/proposal_review'),
(2, 1, 'prp', 4, 'Proposal Final Review', 'no', 'organisation/pages/task/proposal_final_review'),
(3, 1, 'pmp', 5, 'Project Cycle Creation', 'no', 'organisation/pages/task/project_cycle_creation'),
(4, 1, 'pmp', 6, 'Cycle Assessment', 'yes', 'organisation/pages/task/project_cycle_assessment'),
(5, 1, 'pmp', 7, 'Cycle Completion', 'no', 'organisation/pages/task/project_cycle_completion'),
(6, 1, 'nrp', 1, 'NGO Review', 'no', 'organisation/pages/task/task_ngo_review'),
(7, 1, 'nrp', 2, 'NGO Decision', 'no', 'organisation/pages/task/task_ngo_decission');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `prop_id` int(30) NOT NULL,
  `superngo_id` int(30) NOT NULL,
  `ngo_id` int(50) NOT NULL,
  `organisation_id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_time` datetime(6) NOT NULL,
  `updated_datetime` datetime(6) DEFAULT NULL,
  `project_status` varchar(30) DEFAULT NULL,
  `is_deleted` int(30) NOT NULL,
  `generated_by` varchar(50) NOT NULL,
  `project_start_date` date DEFAULT NULL,
  `project_end_date` date DEFAULT NULL,
  `cycle_file_upload` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `prop_id`, `superngo_id`, `ngo_id`, `organisation_id`, `title`, `code`, `created_time`, `updated_datetime`, `project_status`, `is_deleted`, `generated_by`, `project_start_date`, `project_end_date`, `cycle_file_upload`) VALUES
(8, 34, 1, 1, 2, 'test project', '', '2020-12-12 16:25:01.000000', '2020-12-12 16:25:01.000000', 'Approved', 0, '1', NULL, NULL, NULL),
(9, 34, 1, 1, 2, 'test project', '', '2020-12-12 16:25:13.000000', '2020-12-12 16:25:13.000000', 'new', 0, '1', NULL, NULL, NULL),
(10, 17, 2, 0, 1, 'new proposal', '', '2020-12-13 10:44:49.000000', '2020-12-13 10:44:49.000000', 'new', 0, '1', '2020-12-01', '2020-12-24', 'entity_5fd5f1142024e.jpg'),
(11, 4, 2, 1, 1, '43', '', '2020-12-29 10:52:06.000000', '2020-12-29 10:52:06.000000', 'Rejected', 0, '1', '2020-12-23', '2020-12-31', 'entity_5fec555ca1f4f.png'),
(12, 0, 2, 1, 1, '', '', '2020-12-29 15:29:36.000000', '2020-12-29 15:29:36.000000', 'New', 0, '1', '2020-12-29', '2020-12-23', 'entity_5feafe2349ecc.png'),
(13, 17, 2, 1, 1, 'kjolj', '', '2021-01-02 11:20:26.000000', '2021-01-02 11:20:26.000000', 'New', 0, '1', '2021-01-02', '2021-01-05', 'entity_5ff009fc5cf83.png'),
(14, 17, 2, 1, 1, 'kjolj', '', '2021-01-02 11:24:56.000000', '2021-01-02 11:24:56.000000', 'New', 0, '1', '2021-01-02', '2021-01-06', 'entity_5ff00c0988343.png'),
(15, 6, 2, 1, 1, 'testing 28', '', '2021-01-02 11:33:40.000000', '2021-01-02 11:33:40.000000', 'New', 0, '1', '2021-01-02', '2021-01-02', 'entity_5ff00d48063d2.png'),
(16, 12, 2, 1, 1, 'Lennox 4455', '', '2021-01-02 12:05:25.000000', '2021-01-02 12:05:25.000000', 'New', 0, '1', '2021-01-02', '2021-01-02', 'entity_5ff0145d0713a.png'),
(17, 14, 2, 1, 1, '28 -01', '', '2021-01-02 12:31:15.000000', '2021-01-02 12:31:15.000000', 'New', 0, '1', '2021-01-02', '2021-01-13', 'entity_5ff01a516a8db.png'),
(18, 15, 2, 1, 1, '28 02', '', '2021-01-02 12:42:36.000000', '2021-01-02 12:42:36.000000', 'New', 0, '1', '2021-01-02', '2021-01-02', 'entity_5ff01d01066f9.png'),
(19, 9, 2, 1, 1, 'erer', '', '2021-01-02 13:14:56.000000', '2021-01-02 13:14:56.000000', 'New', 0, '1', '2021-01-02', '2021-01-02', 'entity_5ff02484c5536.png'),
(20, 23, 2, 1, 1, 'today test', '', '2021-01-02 13:50:43.000000', '2021-01-02 13:50:43.000000', 'New', 0, '1', '2021-01-01', '2021-01-02', 'entity_5ff04efa60c16.png'),
(21, 24, 2, 1, 1, 'test 2 1', '', '2021-01-02 13:55:45.000000', '2021-01-02 13:55:45.000000', 'New', 0, '1', '2021-01-01', '2021-01-22', 'entity_5ff02e14cae09.png'),
(22, 25, 2, 1, 1, 'test 321', '', '2021-01-02 14:16:51.000000', '2021-01-02 14:16:51.000000', 'New', 0, '1', '2021-01-02', '2021-01-02', 'entity_5ff0331b98469.png'),
(23, 26, 2, 1, 1, 'project 02 1 1', '', '2021-01-02 15:15:39.000000', '2021-01-02 15:15:39.000000', 'New', 0, '1', NULL, NULL, NULL),
(24, 26, 2, 1, 1, 'project 02 1 1', '', '2021-01-02 15:15:49.000000', '2021-01-02 15:15:49.000000', 'New', 0, '1', '2020-12-02', '2021-01-21', 'entity_5ff040e3a875b.png'),
(25, 12, 2, 1, 1, 'Lennox 4455', '', '2021-01-02 16:03:15.000000', '2021-01-02 16:03:15.000000', 'New', 0, '1', '2021-01-02', '2021-01-27', 'entity_5ff04bf9402da.png'),
(26, 27, 2, 1, 1, 'n proposal 1', '', '2021-01-02 16:53:09.000000', '2021-01-02 16:53:09.000000', 'New', 0, '1', '2021-01-02', '2021-01-27', 'entity_5ff057abb8dca.png'),
(27, 28, 2, 1, 1, 'new test', '', '2021-01-02 17:59:17.000000', '2021-01-02 17:59:17.000000', 'New', 0, '1', '2021-01-02', '2021-01-09', 'entity_5ff0674e6bb9e.png'),
(28, 29, 2, 1, 1, 'task 101', '', '2021-01-02 18:10:14.000000', '2021-01-02 18:10:14.000000', 'New', 0, '1', '2021-01-02', '2021-01-20', 'entity_5ff06a4885aef.png'),
(29, 30, 2, 1, 1, 'new proposal 1', '', '2021-01-02 19:03:53.000000', '2021-01-02 19:03:53.000000', 'New', 0, '1', '2021-01-02', '2021-01-20', 'entity_5ff0768e6b16b.png'),
(30, 31, 2, 1, 1, 'monday 4', '', '2021-01-04 09:21:47.000000', '2021-01-04 09:21:47.000000', 'New', 0, '1', '2021-01-04', '2021-01-05', 'entity_5ff290e257027.png'),
(31, 34, 2, 1, 1, 'check data', '', '2021-01-04 09:40:16.000000', '2021-01-04 09:40:16.000000', 'New', 0, '1', '2021-01-04', '2021-01-05', 'entity_5ff2953711bc5.png'),
(32, 37, 2, 1, 1, 'New proposal 1', '', '2021-01-04 10:09:49.000000', '2021-01-04 10:09:49.000000', 'New', 0, '1', '2021-01-04', '2021-01-05', 'entity_5ff29c2f53b60.png'),
(33, 38, 2, 1, 1, 'proposal new creation testing', '', '2021-01-04 10:20:11.000000', '2021-01-04 10:20:11.000000', 'Approved', 0, '1', '2021-01-04', '2021-01-04', 'entity_5ff29ea1da19b.png'),
(34, 39, 2, 1, 1, 'Renew Test', '', '2021-01-04 10:31:39.000000', '2021-01-04 10:31:39.000000', 'Approved', 0, '1', '2021-01-04', '2021-01-11', 'entity_5ff2a146434d8.png'),
(35, 40, 2, 1, 1, 'Renew Test 1', '', '2021-01-04 11:57:17.000000', '2021-01-04 11:57:17.000000', 'New', 0, '1', NULL, NULL, NULL),
(36, 48, 2, 1, 1, 'CHECK DATA', '', '2021-01-05 15:35:10.000000', '2021-01-05 15:35:10.000000', 'New', 0, '1', NULL, NULL, NULL),
(37, 48, 2, 1, 1, 'CHECK DATA', '', '2021-01-05 15:50:54.000000', '2021-01-05 15:50:54.000000', 'New', 0, '1', NULL, NULL, NULL),
(38, 51, 2, 1, 1, 'project 04 01', '', '2021-01-05 15:54:53.000000', '2021-01-05 15:54:53.000000', 'New', 0, '1', NULL, NULL, NULL),
(39, 42, 2, 1, 1, 'new proposal', '', '2021-01-05 16:23:06.000000', '2021-01-05 16:23:06.000000', 'New', 0, '1', NULL, NULL, NULL),
(40, 56, 2, 1, 1, '', '', '2021-01-06 17:49:24.000000', '2021-01-06 17:49:24.000000', 'New', 0, '1', NULL, NULL, NULL),
(41, 56, 2, 1, 1, 'HP NGO', '', '2021-01-06 18:02:38.000000', '2021-01-06 18:02:38.000000', 'New', 0, '1', '2021-01-06', '2021-01-06', 'entity_5ff5ba6304ef2.png'),
(42, 60, 2, 1, 1, 'ACER NGO 1', '', '2021-01-06 19:20:46.000000', '2021-01-06 19:20:46.000000', 'New', 0, '1', '2021-01-06', '2021-01-19', 'entity_5ff5c04325751.png'),
(43, 61, 2, 1, 1, 'UNREGISTRED', '', '2021-01-07 15:04:05.000000', '2021-01-07 15:04:05.000000', 'New', 0, '1', '2021-01-07', '2021-01-07', 'entity_5ff6d6c6a5a42.png'),
(44, 58, 2, 8, 1, 'ACER NGO', '', '2021-01-07 15:46:15.000000', '2021-01-07 15:46:15.000000', 'New', 0, '1', NULL, NULL, NULL),
(45, 64, 2, 5, 1, 'ewe', '', '2021-01-07 16:53:33.000000', '2021-01-07 16:53:33.000000', 'New', 0, '1', '2021-01-06', '2021-01-15', 'entity_5ff6efbf35ae0.jpg'),
(46, 69, 2, 3, 1, 'PSD', '', '2021-01-07 18:38:48.000000', '2021-01-07 18:38:48.000000', 'New', 0, '1', '2021-01-07', '2021-01-19', 'entity_5ff708ee1f80b.png');

-- --------------------------------------------------------

--
-- Table structure for table `project_cycle_details`
--

DROP TABLE IF EXISTS `project_cycle_details`;
CREATE TABLE IF NOT EXISTS `project_cycle_details` (
  `project_cycle_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `superngo_id` int(10) NOT NULL,
  `org_staff_id` int(10) NOT NULL,
  `cycle_name` varchar(200) NOT NULL,
  `cycle_start_date1` date NOT NULL,
  `cycle_end_date2` date NOT NULL,
  `is_payment` varchar(50) NOT NULL,
  `donor_dropdown` varchar(500) NOT NULL,
  `donor_dropdown_id` int(10) NOT NULL,
  `cycle_donor_amount` double NOT NULL,
  `ngo_payment` varchar(1000) NOT NULL,
  `ngo_doc` varchar(1000) NOT NULL,
  `csr_doc` varchar(1000) NOT NULL,
  `created_time` datetime NOT NULL,
  `cycle_status` varchar(50) NOT NULL,
  `is_deleted` int(10) NOT NULL DEFAULT '0',
  `is_completed` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`project_cycle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=314 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_cycle_details`
--

INSERT INTO `project_cycle_details` (`project_cycle_id`, `project_id`, `org_id`, `superngo_id`, `org_staff_id`, `cycle_name`, `cycle_start_date1`, `cycle_end_date2`, `is_payment`, `donor_dropdown`, `donor_dropdown_id`, `cycle_donor_amount`, `ngo_payment`, `ngo_doc`, `csr_doc`, `created_time`, `cycle_status`, `is_deleted`, `is_completed`) VALUES
(12, 11, 1, 2, 1, 'test', '2020-12-16', '2020-12-13', 'yes', 'cp', 1, 1000, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-13 10:47:04', 'active', 0, 'no'),
(13, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 1', '2020-12-29 10:57:33', 'New', 0, 'yes'),
(14, 11, 1, 2, 1, 'abcd', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 1, csr doc 2', '2020-12-29 10:57:33', 'New', 0, 'yes'),
(15, 11, 1, 2, 1, 'abcde', '2020-12-17', '2020-12-29', 'yes', 'New Donor Dec', 4, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 10:57:33', 'New', 0, 'no'),
(16, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 11:43:51', 'New', 0, 'no'),
(17, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 11:43:51', 'New', 0, 'no'),
(18, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 212, 'document', 'ngo doc 2, ngo doc 1', 'csr doc 2', '2020-12-29 11:43:51', 'New', 0, ''),
(19, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 11:45:04', 'New', 0, ''),
(20, 0, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 11:45:04', 'New', 0, ''),
(21, 0, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 212, 'document', 'ngo doc 2, ngo doc 1', 'csr doc 2', '2020-12-29 11:45:04', 'New', 0, ''),
(22, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 11:54:12', 'New', 0, ''),
(23, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 11:54:12', 'New', 0, ''),
(24, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'New Donor Dec', 4, 2345, 'document, document2', 'ngo doc 2, ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 11:54:12', 'New', 0, ''),
(25, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 11:54:44', 'New', 0, ''),
(26, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 11:54:44', 'New', 0, ''),
(27, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'New Donor Dec', 4, 2345, 'document, document2', 'ngo doc 2, ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 11:54:44', 'New', 0, ''),
(28, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:07:08', 'New', 0, ''),
(29, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 12:07:08', 'New', 0, ''),
(30, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'New Donor Dec', 4, 2345, 'document, document2', 'ngo doc 2, ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 12:07:08', 'New', 0, ''),
(31, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:07:46', 'New', 0, ''),
(32, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 12:07:46', 'New', 0, ''),
(33, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'New Donor Dec', 4, 2345, 'document, document2', 'ngo doc 2, ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 12:07:46', 'New', 0, ''),
(34, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:13:32', 'New', 0, ''),
(35, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 43, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:21', 'New', 0, ''),
(36, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:21', 'New', 0, ''),
(37, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3344, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:21', 'New', 0, ''),
(38, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 43, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:51', 'New', 0, ''),
(39, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:51', 'New', 0, ''),
(40, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3344, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:51', 'New', 0, ''),
(41, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 43, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:56', 'New', 0, ''),
(42, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:56', 'New', 0, ''),
(43, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3344, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:23:56', 'New', 0, ''),
(44, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 43, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:24:01', 'New', 0, ''),
(45, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:24:01', 'New', 0, ''),
(46, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3344, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:24:01', 'New', 0, ''),
(47, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 43, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:25:14', 'New', 0, ''),
(48, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:25:14', 'New', 0, ''),
(49, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3344, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:25:14', 'New', 0, ''),
(50, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 43, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:26:16', 'New', 0, ''),
(51, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:26:16', 'New', 0, ''),
(52, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3344, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:26:16', 'New', 0, ''),
(53, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'Testing', 2, 43, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:27:09', 'New', 0, ''),
(54, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:27:09', 'New', 0, ''),
(55, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3344, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:27:09', 'New', 0, ''),
(56, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 32, 'document', 'ngo doc 2, ngo doc 1', 'csr doc 2', '2020-12-29 12:29:22', 'New', 0, ''),
(57, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 2, ngo doc 1', 'csr doc 2', '2020-12-29 12:29:22', 'New', 0, ''),
(58, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 2, ngo doc 1', 'csr doc 2', '2020-12-29 12:29:22', 'New', 0, ''),
(59, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:32:52', 'New', 0, ''),
(60, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 12:32:52', 'New', 0, ''),
(61, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 12, 'document', 'ngo doc 1', 'csr doc 1', '2020-12-29 12:32:52', 'New', 0, ''),
(62, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:33:23', 'New', 0, ''),
(63, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 12:33:23', 'New', 0, ''),
(64, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 12, 'document', 'ngo doc 1', 'csr doc 1', '2020-12-29 12:33:23', 'New', 0, ''),
(65, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:36:39', 'New', 0, ''),
(66, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 12:36:39', 'New', 0, ''),
(67, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 12, 'document', 'ngo doc 1', 'csr doc 1', '2020-12-29 12:36:39', 'New', 0, ''),
(68, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:36:55', 'New', 0, ''),
(69, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 12:36:55', 'New', 0, ''),
(70, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 12, 'document', 'ngo doc 1', 'csr doc 1', '2020-12-29 12:36:55', 'New', 0, ''),
(71, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:39:22', 'New', 0, ''),
(72, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 12:39:22', 'New', 0, ''),
(73, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 12, 'document', 'ngo doc 1', 'csr doc 1', '2020-12-29 12:39:22', 'New', 0, ''),
(74, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:39:53', 'New', 0, ''),
(75, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 12:39:53', 'New', 0, ''),
(76, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 12, 'document', 'ngo doc 1', 'csr doc 1', '2020-12-29 12:39:53', 'New', 0, ''),
(77, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:43:35', 'New', 0, ''),
(78, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:43:35', 'New', 0, ''),
(79, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:45:44', 'New', 0, ''),
(80, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:45:44', 'New', 0, ''),
(81, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:46:09', 'New', 0, ''),
(82, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:46:09', 'New', 0, ''),
(83, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 12:49:08', 'New', 0, ''),
(84, 11, 1, 2, 1, 'abcd', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 12:49:08', 'New', 0, ''),
(85, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:04:20', 'New', 0, ''),
(86, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:04:30', 'New', 0, ''),
(87, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:05:37', 'New', 0, ''),
(88, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:05:50', 'New', 0, ''),
(89, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:05:54', 'New', 0, ''),
(90, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:06:24', 'New', 0, ''),
(91, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:07:37', 'New', 0, ''),
(92, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:09:19', 'New', 0, ''),
(93, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:09:21', 'New', 0, ''),
(94, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 2222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:16:45', 'New', 0, ''),
(95, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 2222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:16:49', 'New', 0, ''),
(96, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 2222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:19:01', 'New', 0, ''),
(97, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 2222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:19:04', 'New', 0, ''),
(98, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 2222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:46:07', 'New', 0, ''),
(99, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:57:33', 'New', 0, ''),
(100, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 13:58:02', 'New', 0, ''),
(101, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:01:54', 'New', 0, ''),
(102, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:01:58', 'New', 0, ''),
(103, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:02:34', 'New', 0, ''),
(104, 11, 1, 2, 1, 'abc', '2020-12-30', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 14:02:34', 'New', 0, ''),
(105, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:03:49', 'New', 0, ''),
(106, 11, 1, 2, 1, 'abc', '2020-12-30', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 14:03:49', 'New', 0, ''),
(107, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:03:52', 'New', 0, ''),
(108, 11, 1, 2, 1, 'abc', '2020-12-30', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 14:03:52', 'New', 0, ''),
(109, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:04:38', 'New', 0, ''),
(110, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:05:28', 'New', 0, ''),
(111, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:06:05', 'New', 0, ''),
(112, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:06:18', 'New', 0, ''),
(113, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:14:23', 'New', 0, ''),
(114, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:14:27', 'New', 0, ''),
(115, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:14:34', 'New', 0, ''),
(116, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:14:46', 'New', 0, ''),
(117, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:15:21', 'New', 0, ''),
(118, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:16:49', 'New', 0, ''),
(119, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:17:09', 'New', 0, ''),
(120, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:18:06', 'New', 0, ''),
(121, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:20:58', 'New', 0, ''),
(122, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:22:28', 'New', 0, ''),
(123, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:23:13', 'New', 0, ''),
(124, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:25:32', 'New', 0, ''),
(125, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 34, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:26:46', 'New', 0, ''),
(126, 11, 1, 2, 1, 'sdfsfsfsfsfsfsfsdf', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 14:35:51', 'New', 0, ''),
(127, 11, 1, 2, 1, 'sdfsfsfsfsfsfsfsdf', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 14:36:38', 'New', 0, ''),
(128, 11, 1, 2, 1, 'sdfsfsfsfsfsfsfsdf', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 14:36:44', 'New', 0, ''),
(129, 11, 1, 2, 1, 'sdfsfsfsfsfsfsfsdf', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2, csr doc 1', '2020-12-29 14:39:44', 'New', 0, ''),
(130, 11, 1, 2, 1, 'asif', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:45:35', 'New', 0, ''),
(131, 11, 1, 2, 1, 'asif', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:49:49', 'New', 0, ''),
(132, 11, 1, 2, 1, 'asif', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:50:03', 'New', 0, ''),
(133, 11, 1, 2, 1, 'asif', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:50:07', 'New', 0, ''),
(134, 11, 1, 2, 1, 'asif', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:52:15', 'New', 0, ''),
(135, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:53:04', 'New', 0, ''),
(136, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:53:54', 'New', 0, ''),
(137, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:54:08', 'New', 0, ''),
(138, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:54:42', 'New', 0, ''),
(139, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 23, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:55:49', 'New', 0, ''),
(140, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12345, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:56:53', 'New', 0, ''),
(141, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12345, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:59:14', 'New', 0, ''),
(142, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12345, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:59:15', 'New', 0, ''),
(143, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12345, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 14:59:17', 'New', 0, ''),
(144, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 12345, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:00:13', 'New', 0, ''),
(145, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:01:07', 'New', 0, ''),
(146, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:02:33', 'New', 0, ''),
(147, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:07:26', 'New', 0, ''),
(148, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:08:03', 'New', 0, ''),
(149, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:08:21', 'New', 0, ''),
(150, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:15:45', 'New', 0, ''),
(151, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:16:14', 'New', 0, ''),
(152, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:16:39', 'New', 0, ''),
(153, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:18:16', 'New', 0, ''),
(154, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:18:18', 'New', 0, ''),
(155, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:18:24', 'New', 0, ''),
(156, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:19:12', 'New', 0, ''),
(157, 11, 1, 2, 1, 'pqr', '2039-12-13', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:22:45', 'New', 0, ''),
(158, 11, 1, 2, 1, 'pqr', '2039-12-13', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:23:09', 'New', 0, ''),
(159, 11, 1, 2, 1, 'pqr', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 15:24:33', 'New', 0, ''),
(160, 11, 1, 2, 1, 'pqr', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 15:24:47', 'New', 0, ''),
(161, 11, 1, 2, 1, 'pqr', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 15:25:51', 'New', 0, ''),
(162, 11, 1, 2, 1, 'pqr', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 15:26:28', 'New', 0, ''),
(163, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 2', '2020-12-29 15:26:28', 'New', 0, ''),
(164, 12, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:32:54', 'New', 0, ''),
(165, 12, 1, 2, 1, 'new test', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 15:32:54', 'New', 0, ''),
(166, 12, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:40:28', 'New', 0, ''),
(167, 12, 1, 2, 1, 'new test', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 15:40:28', 'New', 0, ''),
(168, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:50:43', 'New', 0, ''),
(169, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:51:13', 'New', 0, ''),
(170, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:53:31', 'New', 0, ''),
(171, 11, 1, 2, 1, 'test test tets', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:54:29', 'New', 0, ''),
(172, 11, 1, 2, 1, 'test test tets', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:54:45', 'New', 0, ''),
(173, 11, 1, 2, 1, 'test test tets', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:55:14', 'New', 0, ''),
(174, 11, 1, 2, 1, 'test test tets', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:58:25', 'New', 0, ''),
(175, 11, 1, 2, 1, 'test test tets', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 123456, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 15:58:55', 'New', 0, ''),
(176, 11, 1, 2, 1, 'test data', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:00:52', 'New', 0, ''),
(177, 11, 1, 2, 1, 'test data', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:01:17', 'New', 0, ''),
(178, 11, 1, 2, 1, 'test data', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:05:20', 'New', 0, ''),
(179, 11, 1, 2, 1, 'test data', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:05:28', 'New', 0, ''),
(180, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:06:30', 'New', 0, ''),
(181, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:06:39', 'New', 0, ''),
(182, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:06:47', 'New', 0, ''),
(183, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:06:55', 'New', 0, ''),
(184, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:09:23', 'New', 0, ''),
(185, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:09:31', 'New', 0, ''),
(186, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:11:25', 'New', 0, ''),
(187, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:13:00', 'New', 0, ''),
(188, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:14:37', 'New', 0, ''),
(189, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:14:50', 'New', 0, ''),
(190, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:15:20', 'New', 0, ''),
(191, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:15:43', 'New', 0, ''),
(192, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:16:32', 'New', 0, ''),
(193, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:16:54', 'New', 0, ''),
(194, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:19:21', 'New', 0, ''),
(195, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:19:23', 'New', 0, ''),
(196, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:19:30', 'New', 0, ''),
(197, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:19:35', 'New', 0, ''),
(198, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:19:45', 'New', 0, ''),
(199, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:20:57', 'New', 0, ''),
(200, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2123, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:25:15', 'New', 0, ''),
(201, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2123, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:25:38', 'New', 0, ''),
(202, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2123, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:25:48', 'New', 0, ''),
(203, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2123, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:27:28', 'New', 0, ''),
(204, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2123, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:27:33', 'New', 0, ''),
(205, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2123, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:28:23', 'New', 0, ''),
(206, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2123, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:28:42', 'New', 0, ''),
(207, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2343, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:30:30', 'New', 0, ''),
(208, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2343, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:30:47', 'New', 0, ''),
(209, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2343, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:30:55', 'New', 0, ''),
(210, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2343, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:31:00', 'New', 0, ''),
(211, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2343, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:31:15', 'New', 0, ''),
(212, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 2343, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:31:22', 'New', 0, ''),
(213, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:32:04', 'New', 0, ''),
(214, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:32:35', 'New', 0, ''),
(215, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:33:02', 'New', 0, ''),
(216, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:33:10', 'New', 0, ''),
(217, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:33:33', 'New', 0, ''),
(218, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:34:13', 'New', 0, ''),
(219, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:34:32', 'New', 0, ''),
(220, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:34:41', 'New', 0, ''),
(221, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:35:18', 'New', 0, ''),
(222, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:35:53', 'New', 0, ''),
(223, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:37:38', 'New', 0, ''),
(224, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:37:48', 'New', 0, ''),
(225, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:37:51', 'New', 0, ''),
(226, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:38:18', 'New', 0, ''),
(227, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'cp', 1, 321, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:38:27', 'New', 0, ''),
(228, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:39:28', 'New', 0, ''),
(229, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:40:04', 'New', 0, ''),
(230, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:40:07', 'New', 0, ''),
(231, 11, 1, 2, 1, 'test', '2020-12-23', '2020-12-29', 'yes', 'cp', 1, 4534, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:40:49', 'New', 0, ''),
(232, 11, 1, 2, 1, 'test', '2020-12-23', '2020-12-29', 'yes', 'cp', 1, 4534, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 16:43:16', 'New', 0, ''),
(233, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 17:10:27', 'New', 0, ''),
(234, 11, 1, 2, 1, 'abc', '2020-12-23', '2020-12-29', 'yes', 'cp', 1, 3432, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 17:13:58', 'New', 0, ''),
(235, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 1', '2020-12-29 17:13:58', 'New', 0, ''),
(236, 11, 1, 2, 1, 'abc test1', '2020-12-30', '2020-12-29', 'yes', 'New Donor Dec', 4, 4343, 'document, document2', 'ngo doc 1', 'csr doc 2', '2020-12-29 17:13:58', 'New', 0, ''),
(237, 11, 1, 2, 1, 'abc', '2020-12-17', '2020-12-29', 'yes', 'Testing', 2, 342, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 17:18:24', 'New', 0, ''),
(238, 11, 1, 2, 1, 'pqr', '2020-12-17', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 17:18:24', 'New', 0, ''),
(239, 11, 1, 2, 1, 'asd', '2020-12-17', '2020-12-29', 'yes', 'New Donor Dec', 4, 2343, 'document, document2', 'ngo doc 2, ngo doc 1', 'csr doc 1, csr doc 2', '2020-12-29 17:18:24', 'New', 0, ''),
(240, 0, 1, 2, 1, 'asd', '2020-12-29', '2020-12-29', 'yes', 'cp', 1, 121, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-29 17:31:02', 'New', 0, ''),
(241, 0, 1, 2, 1, 'pqr', '2020-12-29', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2020-12-29 17:31:02', 'New', 0, ''),
(242, 0, 1, 2, 1, 'abc', '2020-12-29', '2020-12-29', 'yes', 'Testing', 2, 121, 'document, document2', 'ngo doc 2', 'csr doc 1, csr doc 2', '2020-12-29 17:31:02', 'New', 0, ''),
(243, 0, 1, 2, 1, '54', '2020-12-31', '2020-12-29', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2020-12-29 17:34:11', 'New', 0, ''),
(244, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Testing', 2, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 14:55:02', 'New', 0, ''),
(245, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Testing', 2, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:06:10', 'New', 0, ''),
(246, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Testing', 2, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:06:45', 'New', 0, ''),
(247, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Testing', 2, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:07:18', 'New', 0, ''),
(248, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Testing', 2, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:28:41', 'New', 0, ''),
(249, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Testing', 2, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:28:46', 'New', 0, ''),
(250, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Testing', 2, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:28:59', 'New', 0, ''),
(251, 11, 1, 2, 1, 'abc', '2020-12-30', '2020-12-30', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:30:08', 'New', 0, ''),
(252, 11, 1, 2, 1, 'abc', '2020-12-30', '2020-12-30', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:30:57', 'New', 0, ''),
(253, 11, 1, 2, 1, 'abc', '2020-12-30', '2020-12-30', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:32:34', 'New', 0, ''),
(254, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'yes', 'Select donor', 0, 231, 'document', 'ngo doc 1', 'csr doc 2', '2020-12-30 15:39:52', 'New', 0, ''),
(255, 11, 1, 2, 1, 'abc', '2020-12-31', '2020-12-30', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 1, csr doc 2', '2020-12-30 15:54:56', 'New', 0, ''),
(256, 0, 1, 2, 1, 'abc', '2021-01-04', '2021-01-02', 'yes', 'cp', 1, 3234, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 10:32:28', 'New', 0, ''),
(257, 13, 1, 2, 1, 'abc', '2021-01-13', '2021-01-02', 'yes', 'Select donor', 0, 32, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 11:22:55', 'New', 0, ''),
(258, 13, 1, 2, 1, 'abc', '2021-01-12', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 2', '2021-01-02 11:22:55', 'New', 0, ''),
(259, 14, 1, 2, 1, 'abc', '2021-01-25', '2021-01-02', 'yes', 'Testing', 2, 23, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 11:31:16', 'New', 0, ''),
(260, 15, 1, 2, 1, 'abc', '2021-01-13', '2021-01-02', 'yes', 'cp', 1, 121, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 11:36:34', 'New', 0, 'no'),
(261, 16, 1, 2, 1, 'abc', '2021-01-25', '2021-01-02', 'yes', 'cp', 1, 12, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 12:06:21', 'New', 0, 'yes'),
(262, 17, 1, 2, 1, 'abc', '2021-01-26', '2021-01-02', 'yes', 'cp', 1, 234, 'document2', 'ngo doc 1', 'csr doc 2', '2021-01-02 12:32:05', 'New', 0, 'yes'),
(263, 18, 1, 2, 1, 'abc', '2021-01-05', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-02 12:43:29', 'New', 0, 'yes'),
(264, 19, 1, 2, 1, 'abc', '2021-01-26', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-02 13:15:32', 'New', 0, 'yes'),
(265, 20, 1, 2, 1, 'abc', '2021-01-07', '2021-01-02', 'yes', 'cp', 1, 11, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 13:52:31', 'New', 0, 'yes'),
(266, 20, 1, 2, 1, 'abc', '2021-01-02', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-02 13:52:31', 'New', 0, 'no'),
(267, 20, 1, 2, 1, 'abc', '2021-01-06', '2021-01-02', 'yes', 'Testing', 2, 21, 'document, document2', 'ngo doc 2, ngo doc 1', 'csr doc 1, csr doc 2', '2021-01-02 13:52:31', 'New', 0, 'no'),
(268, 21, 1, 2, 1, 'c1 ', '2021-01-12', '2021-01-02', 'yes', 'cp', 1, 45, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 13:56:33', 'New', 0, 'yes'),
(269, 21, 1, 2, 1, 'c2', '2021-01-19', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 1', '2021-01-02 13:56:33', 'New', 0, 'yes'),
(270, 22, 1, 2, 1, 'abc', '2021-01-26', '2021-01-02', 'yes', 'cp', 1, 21, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 14:18:22', 'New', 0, 'yes'),
(271, 22, 1, 2, 1, 'abc', '2021-01-02', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-02 14:18:22', 'New', 0, 'no'),
(272, 24, 1, 2, 1, 'c1', '2021-01-05', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 1', '2021-01-02 15:17:10', 'New', 0, 'no'),
(273, 24, 1, 2, 1, 'c2', '2021-01-26', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 1', '2021-01-02 15:17:10', 'New', 0, 'no'),
(274, 25, 1, 2, 1, 'abc', '2021-01-25', '2021-01-02', 'yes', 'Select donor', 0, 22, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 16:04:16', 'New', 0, 'no'),
(275, 25, 1, 2, 1, 'abc', '2021-01-25', '2021-01-02', 'yes', 'Select donor', 0, 22, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 16:04:55', 'New', 0, 'no'),
(276, 25, 1, 2, 1, 'abc', '2021-01-25', '2021-01-02', 'yes', 'Select donor', 0, 22, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 16:08:54', 'New', 0, 'no'),
(277, 20, 1, 2, 1, 'abc', '2021-01-25', '2021-01-02', 'yes', 'Testing', 2, 23, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 16:17:49', 'New', 0, 'no'),
(278, 20, 1, 2, 1, 'pqr', '2021-01-26', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2021-01-02 16:17:49', 'New', 0, 'no'),
(279, 26, 1, 2, 1, 'abc', '2021-01-06', '2021-01-02', 'yes', 'Testing', 2, 11, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 16:57:44', 'New', 0, 'yes'),
(280, 26, 1, 2, 1, 'pqr', '2021-01-28', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-02 16:57:44', 'New', 0, 'yes'),
(281, 27, 1, 2, 1, 'abc', '2021-01-26', '2021-01-02', 'yes', 'Testing', 2, 11, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 18:04:23', 'New', 0, 'yes'),
(282, 27, 1, 2, 1, 'qqq', '2021-01-05', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2, csr doc 1', '2021-01-02 18:04:23', 'New', 0, 'no'),
(283, 27, 1, 2, 1, '43233', '2021-01-07', '2021-01-02', 'yes', 'Testing', 2, 333, 'document2', 'ngo doc 1, ngo doc 2', 'csr doc 2, csr doc 1', '2021-01-02 18:04:23', 'New', 0, 'no'),
(284, 28, 1, 2, 1, 'cycle 101', '2021-01-20', '2021-01-02', 'yes', 'Testing', 2, 100, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 18:14:09', 'New', 0, 'yes'),
(285, 28, 1, 2, 1, 'cycle 102', '2021-01-26', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-02 18:14:09', 'New', 0, 'no'),
(286, 28, 1, 2, 1, 'cycle103', '2021-01-27', '2021-01-02', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 18:14:09', 'New', 0, 'no'),
(287, 29, 1, 2, 1, 'abc', '2021-01-25', '2021-01-02', 'yes', 'cp', 1, 222, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-02 19:05:13', 'New', 0, 'yes'),
(288, 29, 1, 2, 1, 'qwer', '2021-01-07', '2021-01-02', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-02 19:05:13', 'New', 0, 'no'),
(289, 30, 1, 2, 1, 'pqr', '2021-01-12', '2021-01-04', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-04 09:23:03', 'New', 0, 'yes'),
(290, 30, 1, 2, 1, 'abc', '2021-01-05', '2021-01-04', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-04 09:23:03', 'New', 0, 'no'),
(291, 31, 1, 2, 1, 'abc', '2021-01-18', '2021-01-04', 'yes', 'Testing', 2, 22, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-04 09:42:01', 'New', 0, 'yes'),
(292, 31, 1, 2, 1, 'pqr', '2021-01-05', '2021-01-04', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-04 09:42:01', 'New', 0, 'yes'),
(293, 32, 1, 2, 1, 'abc', '2021-01-25', '2021-01-04', 'yes', 'cp', 1, 22, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-04 10:10:53', 'New', 0, 'yes'),
(294, 32, 1, 2, 1, 'abc', '2021-01-05', '2021-01-04', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-04 10:10:53', 'New', 0, 'yes'),
(295, 33, 1, 2, 1, 'new proposal 1', '2021-01-04', '2021-01-04', 'yes', 'cp', 1, 22, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-04 10:22:55', 'New', 0, 'yes'),
(296, 33, 1, 2, 1, 'proposal new 2', '2021-01-05', '2021-01-04', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-04 10:22:55', 'New', 0, 'yes'),
(297, 33, 1, 2, 1, 'abc', '2021-01-04', '2021-01-04', 'yes', 'cp', 1, 22, 'document2', 'ngo doc 1', 'csr doc 2', '2021-01-04 10:22:55', 'New', 0, 'yes'),
(298, 34, 1, 2, 1, 'Renew Test 1', '2021-01-04', '2021-01-04', 'yes', 'cp', 1, 121, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-04 10:34:04', 'New', 0, 'yes'),
(299, 34, 1, 2, 1, 'Renew Test 2', '2021-01-25', '2021-01-04', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-04 10:34:04', 'New', 0, 'yes'),
(300, 41, 1, 2, 1, 'abc', '2021-01-26', '2021-01-06', 'yes', 'cp', 1, 33, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-06 18:38:17', 'New', 0, 'no'),
(301, 41, 1, 2, 1, 'abc', '2021-01-26', '2021-01-06', 'yes', 'cp', 1, 33, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-06 18:40:50', 'New', 0, 'no'),
(302, 41, 1, 2, 1, 'abc', '2021-01-19', '2021-01-06', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-06 18:41:35', 'New', 0, 'no'),
(303, 41, 1, 2, 1, 'abc', '2021-01-26', '2021-01-06', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-06 18:56:19', 'New', 0, 'no'),
(304, 41, 1, 2, 1, 'abc', '2021-01-26', '2021-01-06', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-06 19:09:41', 'New', 0, 'no'),
(305, 41, 1, 2, 1, 'abc', '2021-01-26', '2021-01-06', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-06 19:10:04', 'New', 0, 'no'),
(306, 42, 1, 2, 1, 'abc', '2021-01-19', '2021-01-06', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-06 19:21:21', 'New', 0, 'yes'),
(307, 42, 1, 2, 1, 'abc', '2021-01-19', '2021-01-06', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-06 19:21:23', 'New', 0, 'no'),
(308, 42, 1, 2, 1, 'abc', '2021-01-19', '2021-01-06', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-06 19:21:50', 'New', 0, 'no'),
(309, 43, 1, 2, 1, 'abc', '2021-01-20', '2021-01-07', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-07 15:26:44', 'New', 0, 'yes'),
(310, 43, 1, 2, 1, 'abc', '2021-01-07', '2021-01-07', 'no', '', 0, 0, '', 'ngo doc 2', 'csr doc 1', '2021-01-07 15:26:44', 'New', 0, 'yes'),
(311, 45, 1, 2, 1, 'abc', '2021-01-13', '2021-01-07', 'yes', 'cp', 1, 32, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-07 16:58:07', 'New', 0, 'yes'),
(312, 45, 1, 2, 1, 'c2', '2021-01-20', '2021-01-07', 'no', '', 0, 0, '', 'ngo doc 1', 'csr doc 2', '2021-01-07 16:58:07', 'New', 0, 'yes'),
(313, 46, 1, 2, 1, 'abc', '2021-01-19', '2021-01-07', 'yes', 'cp', 1, 22, 'document', 'ngo doc 1', 'csr doc 2', '2021-01-07 18:43:58', 'New', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `project_document`
--

DROP TABLE IF EXISTS `project_document`;
CREATE TABLE IF NOT EXISTS `project_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_cycle_id` int(20) NOT NULL,
  `project_id` int(11) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `document_value` varchar(500) NOT NULL,
  `document_value_actual` varchar(100) NOT NULL,
  `document_updated_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project_document`
--

INSERT INTO `project_document` (`id`, `project_cycle_id`, `project_id`, `document_type`, `document_name`, `document_value`, `document_value_actual`, `document_updated_date`) VALUES
(1, 0, 11, 'ngo_document_list', 'ngo doc 1', '1606459110.png', '', '2020-12-30'),
(2, 0, 11, 'csr_document_list', 'csr doc 2', 'entity_5fedabcfce14e.png', 'card-icon-2.png', '2021-01-02'),
(3, 0, 11, 'payment_processing_doc', 'document', 'entity_5fb5eb4a1ac4c.PNG', '', '2020-12-30'),
(4, 0, 11, 'ngo_document_list', 'ngo doc 1', '1606459110.png', '', '2020-12-30'),
(5, 0, 11, 'ngo_document_list', ' ngo doc 2', '1606459110.png', '', '2020-12-30'),
(6, 0, 11, 'csr_document_list', 'csr doc 1', 'entity_5fedabd700207.png', 'footer-icon.png', '2021-01-02'),
(7, 0, 11, 'csr_document_list', ' csr doc 2', 'entity_5fedaa6f40444.png', 'card-icon-2.png', '2021-01-02'),
(8, 0, 11, 'payment_processing_doc', '', 'entity_5fb5eb4a1ac4c.PNG', '', '2020-12-30'),
(9, 0, 0, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(10, 0, 0, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(11, 0, 0, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(12, 0, 13, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(13, 0, 13, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(14, 0, 13, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(15, 0, 13, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-02'),
(16, 0, 13, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(17, 0, 13, 'payment_processing_doc', '', '', '', '2021-01-02'),
(18, 0, 14, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(19, 0, 14, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(20, 0, 14, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(21, 0, 15, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(22, 0, 15, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(23, 0, 15, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(24, 0, 16, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(25, 0, 16, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(26, 0, 16, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(27, 0, 17, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(28, 0, 17, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(29, 0, 17, 'payment_processing_doc', 'document2', '', '', '2021-01-02'),
(30, 0, 18, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(31, 0, 18, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(32, 0, 18, 'payment_processing_doc', '', '', '', '2021-01-02'),
(33, 0, 19, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(34, 0, 19, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(35, 0, 19, 'payment_processing_doc', '', '', '', '2021-01-02'),
(36, 0, 20, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(37, 0, 20, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(38, 0, 20, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(39, 0, 20, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-02'),
(40, 0, 20, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(41, 0, 20, 'payment_processing_doc', '', '', '', '2021-01-02'),
(42, 0, 20, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-02'),
(43, 0, 20, 'ngo_document_list', ' ngo doc 1', '', '', '2021-01-02'),
(44, 0, 20, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(45, 0, 20, 'csr_document_list', ' csr doc 2', '', '', '2021-01-02'),
(46, 0, 20, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(47, 0, 20, 'payment_processing_doc', ' document2', '', '', '2021-01-02'),
(48, 0, 21, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(49, 0, 21, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(50, 0, 21, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(51, 0, 21, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(52, 0, 21, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(53, 0, 21, 'payment_processing_doc', '', '', '', '2021-01-02'),
(54, 0, 22, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(55, 0, 22, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(56, 0, 22, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(57, 0, 22, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(58, 0, 22, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(59, 0, 22, 'payment_processing_doc', '', '', '', '2021-01-02'),
(60, 0, 24, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(61, 0, 24, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(62, 0, 24, 'payment_processing_doc', '', '', '', '2021-01-02'),
(63, 0, 24, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(64, 0, 24, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(65, 0, 24, 'payment_processing_doc', '', '', '', '2021-01-02'),
(66, 276, 25, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(67, 276, 25, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(68, 276, 25, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(69, 277, 20, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(70, 277, 20, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(71, 277, 20, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(72, 278, 20, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(73, 278, 20, 'ngo_document_list', ' ngo doc 2', '', '', '2021-01-02'),
(74, 278, 20, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(75, 278, 20, 'csr_document_list', ' csr doc 1', '', '', '2021-01-02'),
(76, 279, 26, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(77, 279, 26, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(78, 279, 26, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(79, 280, 26, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-02'),
(80, 280, 26, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(81, 281, 27, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(82, 281, 27, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(83, 281, 27, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(84, 282, 27, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(85, 282, 27, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(86, 282, 27, 'csr_document_list', ' csr doc 1', '', '', '2021-01-02'),
(87, 283, 27, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(88, 283, 27, 'ngo_document_list', ' ngo doc 2', '', '', '2021-01-02'),
(89, 283, 27, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(90, 283, 27, 'csr_document_list', ' csr doc 1', '', '', '2021-01-02'),
(91, 283, 27, 'payment_processing_doc', 'document2', '', '', '2021-01-02'),
(92, 284, 28, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(93, 284, 28, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(94, 284, 28, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(95, 285, 28, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-02'),
(96, 285, 28, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(97, 286, 28, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(98, 286, 28, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(99, 286, 28, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(100, 287, 29, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-02'),
(101, 287, 29, 'csr_document_list', 'csr doc 2', '', '', '2021-01-02'),
(102, 287, 29, 'payment_processing_doc', 'document', '', '', '2021-01-02'),
(103, 288, 29, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-02'),
(104, 288, 29, 'csr_document_list', 'csr doc 1', '', '', '2021-01-02'),
(105, 289, 30, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-04'),
(106, 289, 30, 'csr_document_list', 'csr doc 2', '', '', '2021-01-04'),
(107, 289, 30, 'payment_processing_doc', 'document', '', '', '2021-01-04'),
(108, 290, 30, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-04'),
(109, 290, 30, 'csr_document_list', 'csr doc 1', '', '', '2021-01-04'),
(110, 291, 31, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-04'),
(111, 291, 31, 'csr_document_list', 'csr doc 2', '', '', '2021-01-04'),
(112, 291, 31, 'payment_processing_doc', 'document', '', '', '2021-01-04'),
(113, 292, 31, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-04'),
(114, 292, 31, 'csr_document_list', 'csr doc 1', '', '', '2021-01-04'),
(115, 293, 32, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-04'),
(116, 293, 32, 'csr_document_list', 'csr doc 2', '', '', '2021-01-04'),
(117, 293, 32, 'payment_processing_doc', 'document', '', '', '2021-01-04'),
(118, 294, 32, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-04'),
(119, 294, 32, 'csr_document_list', 'csr doc 1', '', '', '2021-01-04'),
(120, 295, 33, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-04'),
(121, 295, 33, 'csr_document_list', 'csr doc 2', '', '', '2021-01-04'),
(122, 295, 33, 'payment_processing_doc', 'document', '', '', '2021-01-04'),
(123, 296, 33, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-04'),
(124, 296, 33, 'csr_document_list', 'csr doc 1', '', '', '2021-01-04'),
(125, 297, 33, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-04'),
(126, 297, 33, 'csr_document_list', 'csr doc 2', '', '', '2021-01-04'),
(127, 297, 33, 'payment_processing_doc', 'document2', '', '', '2021-01-04'),
(128, 298, 34, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-04'),
(129, 298, 34, 'csr_document_list', 'csr doc 2', '', '', '2021-01-04'),
(130, 298, 34, 'payment_processing_doc', 'document', '', '', '2021-01-04'),
(131, 299, 34, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-04'),
(132, 299, 34, 'csr_document_list', 'csr doc 1', '', '', '2021-01-04'),
(133, 300, 41, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(134, 300, 41, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(135, 300, 41, 'payment_processing_doc', 'document', '', '', '2021-01-06'),
(136, 301, 41, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(137, 301, 41, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(138, 301, 41, 'payment_processing_doc', 'document', '', '', '2021-01-06'),
(139, 302, 41, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(140, 302, 41, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(141, 303, 41, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(142, 303, 41, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(143, 304, 41, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(144, 304, 41, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(145, 305, 41, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(146, 305, 41, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(147, 306, 42, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(148, 306, 42, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(149, 307, 42, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(150, 307, 42, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(151, 308, 42, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-06'),
(152, 308, 42, 'csr_document_list', 'csr doc 2', '', '', '2021-01-06'),
(153, 309, 43, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-07'),
(154, 309, 43, 'csr_document_list', 'csr doc 2', 'entity_5ff6e17187288.png', 'product-1.png', '2021-01-07'),
(155, 309, 43, 'payment_processing_doc', 'document', '', '', '2021-01-07'),
(156, 310, 43, 'ngo_document_list', 'ngo doc 2', '', '', '2021-01-07'),
(157, 310, 43, 'csr_document_list', 'csr doc 1', '', '', '2021-01-07'),
(158, 311, 45, 'ngo_document_list', 'ngo doc 1', 'entity_5ff6e17187288.png', 'product-311.png', '2021-01-07'),
(159, 311, 45, 'csr_document_list', 'csr doc 2', 'entity_5ff6f2b02d01d.png', 'product-1234sadasd.png', '2021-01-07'),
(160, 311, 45, 'payment_processing_doc', 'document', '', '', '2021-01-07'),
(161, 312, 45, 'ngo_document_list', 'ngo doc 1', 'entity_5ff6e17187288.png', 'product-312.png', '2021-01-07'),
(162, 312, 45, 'csr_document_list', 'csr doc 2', '', '', '2021-01-07'),
(163, 313, 46, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-07'),
(164, 313, 46, 'csr_document_list', 'csr doc 2', '', '', '2021-01-07'),
(165, 313, 46, 'payment_processing_doc', 'document', '', '', '2021-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `project_donors`
--

DROP TABLE IF EXISTS `project_donors`;
CREATE TABLE IF NOT EXISTS `project_donors` (
  `project_donor_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `ngo_id` int(20) NOT NULL,
  `org_id` int(20) NOT NULL,
  `select_donor` int(10) NOT NULL,
  `donor_amount` double NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`project_donor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=272 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_donors`
--

INSERT INTO `project_donors` (`project_donor_id`, `project_id`, `ngo_id`, `org_id`, `select_donor`, `donor_amount`, `status`, `created_date`) VALUES
(18, 10, 0, 0, 1, 1000, 'active', '2020-12-13 10:47:04'),
(19, 11, 0, 0, 1, 11, 'New', '2020-12-29 10:57:33'),
(20, 0, 0, 0, 1, 21, 'New', '2020-12-29 11:43:51'),
(21, 0, 0, 0, 1, 21, 'New', '2020-12-29 11:45:04'),
(22, 11, 0, 0, 1, 3234, 'New', '2020-12-29 11:54:12'),
(23, 11, 0, 0, 1, 3234, 'New', '2020-12-29 11:54:44'),
(24, 11, 0, 0, 1, 3234, 'New', '2020-12-29 12:07:08'),
(25, 11, 0, 0, 1, 3234, 'New', '2020-12-29 12:07:46'),
(26, 11, 0, 0, 2, 2344, 'New', '2020-12-29 12:13:32'),
(27, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:23:21'),
(28, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:23:51'),
(29, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:23:56'),
(30, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:24:01'),
(31, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:25:14'),
(32, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:26:16'),
(33, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:27:09'),
(34, 11, 0, 0, 1, 32, 'New', '2020-12-29 12:29:22'),
(35, 11, 0, 0, 1, 23, 'New', '2020-12-29 12:32:52'),
(36, 11, 0, 0, 1, 23, 'New', '2020-12-29 12:33:23'),
(37, 11, 0, 0, 1, 23, 'New', '2020-12-29 12:36:39'),
(38, 11, 0, 0, 1, 23, 'New', '2020-12-29 12:36:55'),
(39, 11, 0, 0, 1, 23, 'New', '2020-12-29 12:39:22'),
(40, 11, 0, 0, 1, 23, 'New', '2020-12-29 12:39:53'),
(41, 11, 0, 0, 1, 12, 'New', '2020-12-29 12:43:35'),
(42, 11, 0, 0, 1, 12, 'New', '2020-12-29 12:45:44'),
(43, 11, 0, 0, 1, 12, 'New', '2020-12-29 12:46:09'),
(44, 11, 0, 0, 4, 21, 'New', '2020-12-29 12:49:08'),
(45, 11, 0, 0, 1, 21, 'New', '2020-12-29 13:04:20'),
(46, 11, 0, 0, 1, 21, 'New', '2020-12-29 13:04:30'),
(47, 11, 0, 0, 2, 32, 'New', '2020-12-29 13:05:37'),
(48, 11, 0, 0, 2, 32, 'New', '2020-12-29 13:05:50'),
(49, 11, 0, 0, 2, 32, 'New', '2020-12-29 13:05:54'),
(50, 11, 0, 0, 2, 32, 'New', '2020-12-29 13:06:24'),
(51, 11, 0, 0, 2, 32, 'New', '2020-12-29 13:07:37'),
(52, 11, 0, 0, 2, 32, 'New', '2020-12-29 13:09:19'),
(53, 11, 0, 0, 2, 32, 'New', '2020-12-29 13:09:21'),
(54, 11, 0, 0, 1, 22, 'New', '2020-12-29 13:16:45'),
(55, 11, 0, 0, 1, 22, 'New', '2020-12-29 13:16:49'),
(56, 11, 0, 0, 1, 22, 'New', '2020-12-29 13:19:01'),
(57, 11, 0, 0, 1, 22, 'New', '2020-12-29 13:19:04'),
(58, 11, 0, 0, 1, 22, 'New', '2020-12-29 13:46:07'),
(59, 11, 0, 0, 2, 222, 'New', '2020-12-29 13:57:33'),
(60, 11, 0, 0, 2, 222, 'New', '2020-12-29 13:58:02'),
(61, 11, 0, 0, 2, 222, 'New', '2020-12-29 14:01:54'),
(62, 11, 0, 0, 2, 222, 'New', '2020-12-29 14:01:58'),
(63, 11, 0, 0, 2, 222, 'New', '2020-12-29 14:02:34'),
(64, 11, 0, 0, 2, 222, 'New', '2020-12-29 14:03:49'),
(65, 11, 0, 0, 2, 222, 'New', '2020-12-29 14:03:52'),
(66, 11, 0, 0, 2, 32, 'New', '2020-12-29 14:04:38'),
(67, 11, 0, 0, 2, 32, 'New', '2020-12-29 14:05:28'),
(68, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:06:05'),
(69, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:06:18'),
(70, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:14:23'),
(71, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:14:27'),
(72, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:14:34'),
(73, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:14:46'),
(74, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:15:21'),
(75, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:16:49'),
(76, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:17:09'),
(77, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:18:06'),
(78, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:20:58'),
(79, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:22:28'),
(80, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:23:13'),
(81, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:25:32'),
(82, 11, 0, 0, 1, 222, 'New', '2020-12-29 14:26:46'),
(83, 11, 0, 0, 1, 123456, 'New', '2020-12-29 14:35:51'),
(84, 11, 0, 0, 1, 123456, 'New', '2020-12-29 14:36:38'),
(85, 11, 0, 0, 1, 123456, 'New', '2020-12-29 14:36:44'),
(86, 11, 0, 0, 1, 123456, 'New', '2020-12-29 14:39:44'),
(87, 11, 0, 0, 1, 786, 'New', '2020-12-29 14:45:35'),
(88, 11, 0, 0, 1, 786, 'New', '2020-12-29 14:49:49'),
(89, 11, 0, 0, 1, 786, 'New', '2020-12-29 14:50:03'),
(90, 11, 0, 0, 1, 786, 'New', '2020-12-29 14:50:07'),
(91, 11, 0, 0, 1, 786, 'New', '2020-12-29 14:52:15'),
(92, 11, 0, 0, 1, 123, 'New', '2020-12-29 14:53:04'),
(93, 11, 0, 0, 1, 123, 'New', '2020-12-29 14:53:54'),
(94, 11, 0, 0, 1, 123, 'New', '2020-12-29 14:54:08'),
(95, 11, 0, 0, 1, 123, 'New', '2020-12-29 14:54:42'),
(96, 11, 0, 0, 1, 123, 'New', '2020-12-29 14:55:49'),
(97, 11, 0, 0, 2, 32, 'New', '2020-12-29 14:56:53'),
(98, 11, 0, 0, 2, 32, 'New', '2020-12-29 14:59:14'),
(99, 11, 0, 0, 2, 32, 'New', '2020-12-29 14:59:15'),
(100, 11, 0, 0, 2, 32, 'New', '2020-12-29 14:59:17'),
(101, 11, 0, 0, 2, 32, 'New', '2020-12-29 15:00:13'),
(102, 11, 0, 0, 1, 231, 'New', '2020-12-29 15:01:07'),
(103, 11, 0, 0, 1, 231, 'New', '2020-12-29 15:02:33'),
(104, 11, 0, 0, 1, 231, 'New', '2020-12-29 15:07:26'),
(105, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:08:03'),
(106, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:08:21'),
(107, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:15:45'),
(108, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:16:14'),
(109, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:16:39'),
(110, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:18:16'),
(111, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:18:18'),
(112, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:18:24'),
(113, 11, 0, 0, 2, 321, 'New', '2020-12-29 15:19:12'),
(114, 11, 0, 0, 2, 1223, 'New', '2020-12-29 15:22:45'),
(115, 11, 0, 0, 2, 1223, 'New', '2020-12-29 15:23:09'),
(116, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:24:33'),
(117, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:24:47'),
(118, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:25:51'),
(119, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:26:28'),
(120, 12, 0, 0, 2, 21, 'New', '2020-12-29 15:32:54'),
(121, 12, 0, 0, 4, 32, 'New', '2020-12-29 15:40:28'),
(122, 11, 0, 0, 1, 123345, 'New', '2020-12-29 15:50:43'),
(123, 11, 0, 0, 1, 123345, 'New', '2020-12-29 15:51:13'),
(124, 11, 0, 0, 1, 123345, 'New', '2020-12-29 15:53:31'),
(125, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:54:29'),
(126, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:54:45'),
(127, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:55:14'),
(128, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:58:25'),
(129, 11, 0, 0, 2, 123456, 'New', '2020-12-29 15:58:55'),
(130, 11, 0, 0, 2, 123456, 'New', '2020-12-29 16:00:52'),
(131, 11, 0, 0, 2, 123456, 'New', '2020-12-29 16:01:17'),
(132, 11, 0, 0, 2, 123456, 'New', '2020-12-29 16:05:20'),
(133, 11, 0, 0, 2, 123456, 'New', '2020-12-29 16:05:28'),
(134, 11, 0, 0, 1, 1321, 'New', '2020-12-29 16:06:30'),
(135, 11, 0, 0, 1, 1321, 'New', '2020-12-29 16:06:39'),
(136, 11, 0, 0, 1, 1321, 'New', '2020-12-29 16:06:47'),
(137, 11, 0, 0, 1, 1321, 'New', '2020-12-29 16:06:55'),
(138, 11, 0, 0, 1, 1321, 'New', '2020-12-29 16:09:23'),
(139, 11, 0, 0, 1, 1321, 'New', '2020-12-29 16:09:31'),
(140, 11, 0, 0, 4, 3234, 'New', '2020-12-29 16:11:25'),
(141, 11, 0, 0, 4, 3234, 'New', '2020-12-29 16:13:00'),
(142, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:14:37'),
(143, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:14:50'),
(144, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:15:20'),
(145, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:15:43'),
(146, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:16:32'),
(147, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:16:54'),
(148, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:19:21'),
(149, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:19:23'),
(150, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:19:30'),
(151, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:19:35'),
(152, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:19:45'),
(153, 11, 0, 0, 1, 1234, 'New', '2020-12-29 16:20:57'),
(154, 11, 0, 0, 2, 3212, 'New', '2020-12-29 16:25:15'),
(155, 11, 0, 0, 2, 3212, 'New', '2020-12-29 16:25:38'),
(156, 11, 0, 0, 2, 3212, 'New', '2020-12-29 16:25:48'),
(157, 11, 0, 0, 2, 3212, 'New', '2020-12-29 16:27:28'),
(158, 11, 0, 0, 2, 3212, 'New', '2020-12-29 16:27:33'),
(159, 11, 0, 0, 2, 3212, 'New', '2020-12-29 16:28:23'),
(160, 11, 0, 0, 2, 3212, 'New', '2020-12-29 16:28:42'),
(161, 11, 0, 0, 2, 321, 'New', '2020-12-29 16:30:30'),
(162, 11, 0, 0, 2, 321, 'New', '2020-12-29 16:30:47'),
(163, 11, 0, 0, 2, 321, 'New', '2020-12-29 16:30:55'),
(164, 11, 0, 0, 2, 321, 'New', '2020-12-29 16:31:00'),
(165, 11, 0, 0, 2, 321, 'New', '2020-12-29 16:31:15'),
(166, 11, 0, 0, 2, 321, 'New', '2020-12-29 16:31:22'),
(167, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:32:04'),
(168, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:32:35'),
(169, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:33:02'),
(170, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:33:10'),
(171, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:33:33'),
(172, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:34:13'),
(173, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:34:32'),
(174, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:34:41'),
(175, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:35:18'),
(176, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:35:53'),
(177, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:37:38'),
(178, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:37:48'),
(179, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:37:51'),
(180, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:38:18'),
(181, 11, 0, 0, 1, 322, 'New', '2020-12-29 16:38:27'),
(182, 11, 0, 0, 1, 2312, 'New', '2020-12-29 16:39:28'),
(183, 11, 0, 0, 1, 2312, 'New', '2020-12-29 16:40:04'),
(184, 11, 0, 0, 1, 2312, 'New', '2020-12-29 16:40:07'),
(185, 11, 0, 0, 2, 324, 'New', '2020-12-29 16:40:49'),
(186, 11, 0, 0, 2, 324, 'New', '2020-12-29 16:43:16'),
(187, 11, 0, 0, 2, 34355, 'New', '2020-12-29 17:10:27'),
(188, 11, 0, 0, 2, 3423, 'New', '2020-12-29 17:13:58'),
(189, 11, 0, 0, 1, 232, 'New', '2020-12-29 17:18:24'),
(190, 0, 0, 0, 2, 121, 'New', '2020-12-29 17:31:02'),
(191, 0, 0, 0, 1, 454, 'New', '2020-12-29 17:34:11'),
(192, 0, 0, 0, 2, 21, 'New', '2020-12-30 11:48:40'),
(193, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:11:04'),
(194, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:13:14'),
(195, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:13:41'),
(196, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:31:27'),
(197, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:31:53'),
(198, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:32:18'),
(199, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:37:11'),
(200, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:42:47'),
(201, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:43:14'),
(202, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:45:02'),
(203, 0, 0, 0, 2, 21, 'New', '2020-12-30 12:45:28'),
(204, 0, 0, 0, 2, 3212, 'New', '2020-12-30 14:22:07'),
(205, 0, 0, 0, 2, 3212, 'New', '2020-12-30 14:30:08'),
(206, 0, 0, 0, 2, 3212, 'New', '2020-12-30 14:30:56'),
(207, 0, 0, 0, 2, 3212, 'New', '2020-12-30 14:31:13'),
(208, 0, 0, 0, 2, 3212, 'New', '2020-12-30 14:31:27'),
(209, 0, 0, 0, 2, 3212, 'New', '2020-12-30 14:32:34'),
(210, 11, 0, 0, 1, 2123, 'New', '2020-12-30 14:45:36'),
(211, 11, 0, 0, 1, 2123, 'New', '2020-12-30 14:45:38'),
(212, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:47:09'),
(213, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:47:23'),
(214, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:48:28'),
(215, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:50:49'),
(216, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:50:58'),
(217, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:51:50'),
(218, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:53:49'),
(219, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:54:30'),
(220, 11, 0, 0, 2, 231, 'New', '2020-12-30 14:55:02'),
(221, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:05:32'),
(222, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:05:43'),
(223, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:06:10'),
(224, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:06:27'),
(225, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:06:45'),
(226, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:07:18'),
(227, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:28:41'),
(228, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:28:46'),
(229, 11, 0, 0, 2, 231, 'New', '2020-12-30 15:28:59'),
(230, 11, 0, 0, 2, 32123, 'New', '2020-12-30 15:30:08'),
(231, 11, 0, 0, 2, 32123, 'New', '2020-12-30 15:30:57'),
(232, 11, 0, 0, 2, 32123, 'New', '2020-12-30 15:32:34'),
(233, 11, 0, 0, 2, 321, 'New', '2020-12-30 15:39:52'),
(234, 11, 0, 0, 2, 3223, 'New', '2020-12-30 15:54:56'),
(235, 0, 0, 0, 2, 212, 'New', '2021-01-02 10:32:28'),
(236, 13, 0, 0, 1, 23, 'New', '2021-01-02 11:22:55'),
(237, 14, 0, 0, 1, 32, 'New', '2021-01-02 11:31:16'),
(238, 15, 0, 0, 2, 321, 'New', '2021-01-02 11:36:34'),
(239, 16, 0, 0, 2, 2123, 'New', '2021-01-02 12:06:21'),
(240, 17, 0, 0, 2, 32, 'New', '2021-01-02 12:32:05'),
(241, 18, 0, 0, 1, 1245, 'New', '2021-01-02 12:43:29'),
(242, 19, 0, 0, 2, 32, 'New', '2021-01-02 13:15:32'),
(243, 20, 0, 0, 1, 16, 'New', '2021-01-02 13:52:31'),
(244, 21, 0, 0, 1, 423, 'New', '2021-01-02 13:56:33'),
(245, 22, 0, 0, 1, 32, 'New', '2021-01-02 14:18:22'),
(246, 24, 0, 0, 1, 989, 'New', '2021-01-02 15:17:10'),
(247, 25, 0, 0, 1, 32, 'New', '2021-01-02 16:04:16'),
(248, 25, 0, 0, 1, 32, 'New', '2021-01-02 16:04:55'),
(249, 25, 0, 0, 1, 32, 'New', '2021-01-02 16:08:54'),
(250, 20, 0, 0, 1, 23, 'New', '2021-01-02 16:17:49'),
(251, 26, 0, 0, 2, 111, 'New', '2021-01-02 16:57:44'),
(252, 27, 0, 0, 2, 3234, 'New', '2021-01-02 18:04:23'),
(253, 28, 0, 0, 1, 32, 'New', '2021-01-02 18:14:09'),
(254, 29, 0, 0, 2, 11, 'New', '2021-01-02 19:05:13'),
(255, 30, 0, 0, 2, 66, 'New', '2021-01-04 09:23:03'),
(256, 31, 0, 0, 2, 23, 'New', '2021-01-04 09:42:01'),
(257, 32, 0, 0, 2, 2, 'New', '2021-01-04 10:10:53'),
(258, 33, 0, 0, 2, 22, 'New', '2021-01-04 10:22:55'),
(259, 34, 0, 0, 2, 32, 'New', '2021-01-04 10:34:04'),
(260, 41, 6, 1, 1, 34, 'New', '2021-01-06 18:38:17'),
(261, 41, 6, 1, 1, 34, 'New', '2021-01-06 18:40:50'),
(262, 41, 6, 1, 1, 11, 'New', '2021-01-06 18:41:35'),
(263, 41, 6, 1, 1, 22, 'New', '2021-01-06 18:56:19'),
(264, 41, 6, 1, 1, 22, 'New', '2021-01-06 19:09:41'),
(265, 41, 6, 1, 1, 22, 'New', '2021-01-06 19:10:04'),
(266, 42, 8, 1, 1, 22, 'New', '2021-01-06 19:21:21'),
(267, 42, 8, 1, 1, 22, 'New', '2021-01-06 19:21:23'),
(268, 42, 8, 1, 1, 22, 'New', '2021-01-06 19:21:50'),
(269, 43, 5, 1, 2, 22, 'New', '2021-01-07 15:26:44'),
(270, 45, 5, 1, 1, 32, 'New', '2021-01-07 16:58:07'),
(271, 46, 3, 1, 1, 32, 'New', '2021-01-07 18:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
CREATE TABLE IF NOT EXISTS `proposal` (
  `prop_id` int(11) NOT NULL AUTO_INCREMENT,
  `superngo_id` int(11) NOT NULL,
  `ngo_id` int(11) DEFAULT NULL,
  `ngo_staff_id` int(11) NOT NULL,
  `organisation_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gc_requested` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gc_requested_date` datetime DEFAULT NULL,
  `gc_responded` enum('yes','no') DEFAULT 'no',
  `gc_responded_date` datetime DEFAULT NULL,
  `gc_granted` enum('yes','no') DEFAULT NULL,
  `gc_granted_date` datetime DEFAULT NULL,
  `gc_responded_by` int(11) NOT NULL,
  `submission_time` datetime DEFAULT NULL,
  `proposal_status` varchar(50) DEFAULT 'Created',
  `is_submit` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_proposal_recommended` varchar(50) DEFAULT NULL,
  `is_proposal_recommended_bu_org_staff_id` int(11) DEFAULT NULL,
  `focus_category` int(11) NOT NULL,
  `focus_subcategory` int(11) NOT NULL,
  `category_input` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `benficial_cat` varchar(100) NOT NULL,
  `age_group` varchar(100) NOT NULL,
  `target_group` varchar(100) NOT NULL,
  `slums_villages` varchar(100) NOT NULL,
  `women_adult` varchar(100) NOT NULL,
  `men_adult` varchar(100) NOT NULL,
  `children` varchar(100) NOT NULL,
  `geo_location` varchar(100) NOT NULL,
  `geo_location_values` varchar(500) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `local_address` varchar(225) NOT NULL,
  `street_address` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `pincode` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `organization_background_brief` varchar(1000) NOT NULL,
  `project_summary_proposal` varchar(1000) NOT NULL,
  `benificiary_profile_brief` varchar(1000) NOT NULL,
  `benificiary_profile_statement` varchar(1000) NOT NULL,
  `benificiary_profile_solution` varchar(1000) NOT NULL,
  `specific_outcomes` varchar(1000) NOT NULL,
  `project_sustainability` varchar(1000) NOT NULL,
  `original_file_path` varchar(500) NOT NULL,
  `generated_file_path` varchar(500) NOT NULL,
  `total_funds` double DEFAULT NULL,
  `total_funds_org` double DEFAULT NULL,
  `balance_funds` varchar(100) DEFAULT NULL,
  `multiple_img_upload2` varchar(500) NOT NULL,
  PRIMARY KEY (`prop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`prop_id`, `superngo_id`, `ngo_id`, `ngo_staff_id`, `organisation_id`, `title`, `code`, `created_time`, `update_datetime`, `gc_requested`, `gc_requested_date`, `gc_responded`, `gc_responded_date`, `gc_granted`, `gc_granted_date`, `gc_responded_by`, `submission_time`, `proposal_status`, `is_submit`, `is_deleted`, `is_proposal_recommended`, `is_proposal_recommended_bu_org_staff_id`, `focus_category`, `focus_subcategory`, `category_input`, `region`, `benficial_cat`, `age_group`, `target_group`, `slums_villages`, `women_adult`, `men_adult`, `children`, `geo_location`, `geo_location_values`, `start_date`, `end_date`, `local_address`, `street_address`, `state`, `city`, `pincode`, `full_name`, `designation`, `email_address`, `contact_no`, `organization_background_brief`, `project_summary_proposal`, `benificiary_profile_brief`, `benificiary_profile_statement`, `benificiary_profile_solution`, `specific_outcomes`, `project_sustainability`, `original_file_path`, `generated_file_path`, `total_funds`, `total_funds_org`, `balance_funds`, `multiple_img_upload2`) VALUES
(1, 1, 1, 1, 1, 'w', '', '2020-12-27 02:12:35', '2020-12-27 02:57:35', 'yes', '2020-12-27 03:12:06', 'yes', '2020-12-27 09:12:56', 'yes', '2020-12-27 09:12:56', 1, NULL, 'Created', 0, 0, NULL, NULL, 1, 1, '', 'Urban/Slums', 'General', '', '', '20', '', '', '', '1-1', 'Vidarbha', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(2, 1, 1, 1, 1, 'Proposal 2 27 Dec', '', '2020-12-27 03:12:18', '2020-12-27 03:22:18', 'no', NULL, 'yes', '2021-01-01 12:01:06', 'yes', '2021-01-01 12:01:06', 1, NULL, 'Created', 0, 0, NULL, NULL, 2, 4, 'Test specifics', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, 'Kriti', 'Project Supervisor', 'kritib@gmail.com', '', '', '', '', '', '', '', 'It is going to be very sustainable', '', '', 0, 0, '', ''),
(3, 1, 1, 1, 1, 'Proposal 3 27 Dec', '', '2020-12-27 03:12:05', '2020-12-27 03:50:05', 'yes', '2020-12-28 18:12:36', 'yes', '2021-01-01 13:01:55', 'yes', '2021-01-01 13:01:55', 1, NULL, 'Created', 0, 0, NULL, NULL, 1, 1, 'Test specifics', 'Urban/Slums', 'SC/ST', 'Children', 'Male', '20', '100', '100', '0', '1-1,2-2', 'Vidarbha, Jaipur', '2020-12-23', '2020-12-30', '', 'test', 'test', 'test', 123456, 'Kriti', 'test', 'kritib@gmail.com', '1234567890', '', '', '', '', '', '', '', '', '', 20, 10, 'Test source', '[{\"file_dives_actual\":\"iq-instruction-1-1.jpg\",\"file_name\":\"entity_5fe80609f21e0.jpg\"}]'),
(4, 2, 2, 3, 1, '43', '', '2020-12-27 14:12:50', '2020-12-27 14:54:50', 'yes', '2020-12-28 06:12:49', 'yes', '2020-12-29 10:12:14', 'yes', '2020-12-29 10:12:14', 1, '2020-12-29 10:12:22', 'Rejected', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(5, 1, 1, 1, 1, 'Prop 28 Dec', '', '2020-12-28 02:12:11', '2020-12-28 02:42:11', 'yes', '2020-12-28 02:12:02', 'yes', '2020-12-28 08:12:20', 'yes', '2020-12-28 08:12:20', 1, '2020-12-28 18:12:20', 'Submitted', 1, 0, NULL, NULL, 1, 1, 'Test specifics', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', 'Test data', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(6, 2, 2, 3, 1, 'testing 28', '', '2020-12-28 03:12:31', '2020-12-28 03:29:31', 'no', NULL, 'yes', '2021-01-01 13:01:46', 'yes', '2021-01-01 13:01:46', 1, '2020-12-28 03:12:48', 'Approved', 1, 0, NULL, NULL, 1, 1, '23', 'Urban/Slums', 'SC/ST', 'Adults', 'Female', '34', '34', '34', '34', '1,1-1', 'Maharashtra, Vidarbha', '2020-12-01', '2020-12-29', '1', '34', 'Maharashtra', 'Helsinki', 510, 'Rohan', '34', '34@ads.dsf', '35345345345', '45', '45', '45', '45', '45', '45', '45', 'abt_1.png', 'entity_5fe951531329c.png', 4545, 4545, '45', '[{\"file_dives_actual\":\"abt_1.png\",\"file_name\":\"entity_5fe9515d54a9d.png\"}]'),
(7, 2, 2, 3, 1, 'test123', '', '2020-12-28 03:12:49', '2020-12-28 03:34:49', 'yes', '2021-01-01 13:01:32', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 1, 1, 'test', 'Urban/Slums', 'SC/ST', 'Children', 'Male', '1', '1', '1', '1', '1,1-1', 'Maharashtra, Vidarbha', '2021-01-04', '2021-01-13', '', 'hydrabad', 'Telangana', 'hyderabad', 500013, 'Asif Alam', 'tihs is the dege', 'raj@gmail.com', '1234567890', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(8, 2, 2, 3, 1, '', '', '2020-12-28 04:12:57', '2020-12-28 04:46:57', 'yes', '2020-12-28 04:12:18', 'yes', '2020-12-28 10:12:15', 'yes', '2020-12-28 10:12:15', 1, NULL, 'Created', 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(9, 2, 2, 3, 1, 'erer', '', '2020-12-28 06:12:36', '2020-12-28 06:04:36', 'no', NULL, 'yes', '2021-01-02 12:01:56', 'yes', '2021-01-02 12:01:56', 1, '2021-01-02 12:01:11', 'Approved', 1, 0, NULL, NULL, 1, 1, 'tyuyiuiui', 'Urban/Slums', 'General', 'Adults', 'Male', '12', '125', '86', '898', '1,1-1,2,2-2,3-2', 'Maharashtra, Vidarbha, Rajasthan, Jaipur, Jodhpur', '2020-12-20', '2020-12-31', '', 'rereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeerererer', 'Rajasthan', 'jodhpur', 342005, 'thththth', 'dfdfdf', 'dfdfdf@fgfg', '34343434', 'ererer', 'trtrtrtrt', 'trtrtrthgh', 'nmnnnbd', 'uiukmjmnmbn', 'bvbddsfdfsgh', 'wewjnmmbnb', 'light-bulb-1640438_960_720.jpg', 'entity_5fe975cf72b6b.jpg', 4554, 56456, '5ghghgh', '[{\"file_dives_actual\":\"grassland-1425427_1920.jpg\",\"file_name\":\"entity_5fe975ec16fbc.jpg\"}]'),
(10, 2, 2, 3, 1, 'erer', '', '2020-12-28 06:12:45', '2020-12-28 06:11:45', 'no', NULL, 'yes', '2021-01-02 13:01:49', 'yes', '2021-01-02 13:01:49', 1, '2020-12-28 06:12:13', 'Submitted', 1, 0, NULL, NULL, 1, 3, 'tyuyiuiui', 'Urban/Slums', 'General', 'Adults', 'Male', '12', '125', '86', '898', '1,1-1,2,2-2,3-2', 'Maharashtra, Vidarbha, Rajasthan, Jaipur, Jodhpur', '2020-12-01', '2020-12-31', '', 'rereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeerererer', 'Rajasthan', 'jodhpur', 342005, 'thththth', 'dfdfdf', 'dfdfdf@fgfg', '34343434', 'ererer', 'trtrtrtrt', 'trtrtrthgh', 'nmnnnbd', 'uiukmjmnmbn', 'bvbddsfdfsgh', 'wewjnmmbnb', 'milky-way-1063305_960_720.jpg', 'entity_5fe97757b3ec8.jpg', 4554, 56456, '5ghghgh', '[{\"file_dives_actual\":\"cashbox-1642989_1920.jpg\",\"file_name\":\"entity_5fe9777221964.jpg\"}]'),
(11, 2, 2, 3, 3, 'Lennox 4444', '', '2020-12-28 06:12:04', '2020-12-28 06:15:04', 'yes', '2020-12-28 06:12:07', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 1, 1, 'tyuyiuiui', 'Urban/Slums', 'General', 'Children', 'Male', '1', '2', '3', '4', '1,1-1,2,2-2,3-2', 'Maharashtra, Vidarbha, Rajasthan, Jaipur, Jodhpur', '2020-12-01', '2020-12-31', '', 'rereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeerererer', 'Rajasthan', 'jodhpur', 342005, 'thththth', 'nmnmnyty', 'dfdfdf@fgfg', '34343434', '', 'q', 'q', 'q', 'q', 'q', 'q', '', '', 0, 0, '', ''),
(12, 2, 2, 3, 1, 'Lennox 4455', '', '2020-12-28 06:12:45', '2020-12-28 06:31:45', 'yes', '2020-12-28 06:12:14', 'yes', '2020-12-28 12:12:41', 'yes', '2020-12-28 12:12:41', 1, '2020-12-28 06:12:57', 'Approved', 1, 0, NULL, NULL, 1, 2, 'tyuyiuiui', 'Rural/Villages', 'SC/ST', 'Children', 'Male', '1', '2', '21', '12', '1,1-1,2,2-2,3-2', 'Maharashtra, Vidarbha, Rajasthan, Jaipur, Jodhpur', '2020-12-01', '2020-12-31', '', 'rereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeerererer', 'Rajasthan', 'jodhpur', 342005, 'vbvbvbvb', 'dfdfdf', 'dfdfdf@fgfg', '34343434', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(13, 2, 2, 3, 1, '', '', '2020-12-28 06:12:42', '2020-12-28 06:41:42', 'no', NULL, 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(14, 2, 2, 3, 1, '28 -01', '', '2020-12-28 06:12:39', '2020-12-28 06:47:39', 'yes', '2020-12-28 06:12:07', 'yes', '2020-12-28 12:12:25', 'yes', '2020-12-28 12:12:25', 1, '2020-12-28 06:12:28', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(15, 2, 2, 3, 1, '28 02', '', '2020-12-28 07:12:29', '2020-12-28 07:02:29', 'yes', '2020-12-28 07:12:58', 'yes', '2021-01-02 12:01:33', 'yes', '2021-01-02 12:01:33', 1, '2021-01-02 12:01:44', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(16, 2, 2, 3, 2, 'ngo task create', '', '2021-01-01 09:01:00', '2021-01-01 09:28:00', 'yes', '2021-01-01 09:01:27', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 1, 3, 'test', 'Urban/Slums', 'SC/ST', 'Children', 'Male', '1', '1', '1', '1', '1,1-1', 'Maharashtra, Vidarbha', '2021-01-02', '2021-01-08', '', 'hydrabad', 'Telangana', 'hyderabad', 500013, 'Asif Alam', 'tet', 'raj@gmail.com', '1234567890', 'Organization Background', 'Project Summary', 'Benificiary Profile', 'Problem statement: what is the specific problem being addressed*', 'Solution: Specify the solution being proposed and how will it address the problem*', 'Outcomes of the project', 'Project Sustainability', '', '', 121, 121, 'Source of balance funds*', '[{\"file_dives_actual\":\"card-icon-2.png\",\"file_name\":\"entity_5fee9eb93070d.png\"}]'),
(17, 2, 2, 3, 1, 'kjolj', '', '2021-01-01 09:01:42', '2021-01-01 09:38:42', 'yes', '2021-01-01 09:01:07', 'yes', '2021-01-01 09:01:28', 'yes', '2021-01-01 09:01:28', 1, '2021-01-01 09:01:33', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(18, 2, 2, 3, 1, '', '', '2021-01-01 12:01:22', '2021-01-01 12:27:22', 'yes', '2021-01-02 13:01:25', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(19, 2, 2, 3, 2, '2021', '', '2021-01-01 13:01:21', '2021-01-01 13:04:21', 'yes', '2021-01-01 13:01:32', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(20, 2, 2, 3, 2, 'today 2021', '', '2021-01-01 13:01:11', '2021-01-01 13:10:11', 'yes', '2021-01-01 13:01:01', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 1, 1, 'test', 'Urban/Slums', 'SC/ST', 'Adults', 'Male', '1', '1', '1', '1', '1,1-1,2,2-2,3-2', 'Maharashtra, Vidarbha, Rajasthan, Jaipur, Jodhpur', '2021-01-01', '2021-01-14', '', 'hydrabad', 'Telangana', 'hyderabad', 500013, 'Asif Alam', 'tet', 'raj@gmail.com', '1234567890', 'test', 'tst', 'test', 'test', 'tes', 'tst', 'tst', 'card-icon-2.png', 'entity_5feed2c43b6c3.png', 11, 11, 'test', ''),
(21, 2, 2, 3, 1, 'proposal creation', '', '2021-01-01 14:01:35', '2021-01-01 14:15:35', 'yes', '2021-01-01 14:01:07', 'yes', '2021-01-01 14:01:03', 'yes', '2021-01-01 14:01:03', 1, '2021-01-01 14:01:28', 'Submitted', 1, 0, NULL, NULL, 1, 1, 'test', 'Urban/Slums', 'SC/ST', 'Adults', 'Male', '1', '1', '1', '1', '1,1-1', 'Maharashtra, Vidarbha', '2021-01-01', '2021-01-02', '', 'hydrabad', 'Telangana', 'hyderabad', 500013, 'Asif Alam', 'tet', 'raj@gmail.com', '1234567890', 'step 4', 'step 4', 'step 4', 'step 4', 'step 4', 'step 4', 'step 4', 'card-icon-3.png', 'entity_5feee26590484.png', 101, 101, '101', '[{\"file_dives_actual\":\"card-icon-3.png\",\"file_name\":\"entity_5feee1dfba1d6.png\"}]'),
(22, 2, 2, 3, 2, 'monday', '', '2021-01-02 13:01:38', '2021-01-02 13:06:38', 'yes', '2021-01-02 13:01:07', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 1, 1, 'test', 'Urban/Slums', 'SC/ST', 'Children', 'Female', '1', '1', '1', '1', '1,1-1', 'Maharashtra, Vidarbha', '2021-01-02', '2021-01-09', '', 'hydrabad', 'BIHAR', 'hydrabad', 55888, 'saraok baker', 'sadsa', 'john@gmail.com', '1234567890', 'monday', 'monday', 'monday', 'monday', 'monday', 'monday', 'monday', 'card-icon-3.png', 'entity_5ff023a970d82.png', 11, 11, '11', ''),
(23, 2, 2, 3, 1, 'today test', '', '2021-01-02 13:01:47', '2021-01-02 13:47:47', 'yes', '2021-01-02 13:01:40', 'yes', '2021-01-02 13:01:15', 'yes', '2021-01-02 13:01:15', 1, '2021-01-02 13:01:22', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', 'today test', 'today test', 'today test', 'today test', 'today test', 'today test', 'today test', '', '', 11, 11, '11', ''),
(24, 2, 2, 3, 1, 'test 2 1', '', '2021-01-02 13:01:50', '2021-01-02 13:53:50', 'yes', '2021-01-02 13:01:14', 'yes', '2021-01-02 13:01:22', 'yes', '2021-01-02 13:01:22', 1, '2021-01-02 13:01:25', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(25, 2, 2, 3, 1, 'test 321', '', '2021-01-02 14:01:31', '2021-01-02 14:14:31', 'yes', '2021-01-02 14:01:37', 'yes', '2021-01-02 14:01:45', 'yes', '2021-01-02 14:01:45', 1, '2021-01-02 14:01:54', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(26, 2, 2, 3, 1, 'project 02 1 1', '', '2021-01-02 14:01:08', '2021-01-02 14:51:08', 'yes', '2021-01-02 14:01:08', 'yes', '2021-01-02 14:01:20', 'yes', '2021-01-02 14:01:20', 1, '2021-01-02 14:01:31', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(27, 2, 2, 3, 1, 'n proposal 1', '', '2021-01-02 16:01:14', '2021-01-02 16:50:14', 'yes', '2021-01-02 16:01:36', 'yes', '2021-01-02 16:01:45', 'yes', '2021-01-02 16:01:45', 1, '2021-01-02 16:01:51', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(28, 2, 2, 3, 1, 'new test', '', '2021-01-02 17:01:18', '2021-01-02 17:55:18', 'yes', '2021-01-02 17:01:10', 'yes', '2021-01-02 17:01:23', 'yes', '2021-01-02 17:01:23', 1, '2021-01-02 17:01:33', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(29, 2, 2, 3, 1, 'task 101', '', '2021-01-02 18:01:01', '2021-01-02 18:08:01', 'yes', '2021-01-02 18:01:47', 'yes', '2021-01-02 18:01:12', 'yes', '2021-01-02 18:01:12', 1, '2021-01-02 18:01:24', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(30, 2, 2, 3, 1, 'new proposal 1', '', '2021-01-02 19:01:12', '2021-01-02 19:01:12', 'yes', '2021-01-02 19:01:54', 'yes', '2021-01-02 19:01:04', 'yes', '2021-01-02 19:01:04', 1, '2021-01-02 19:01:09', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(31, 2, 2, 3, 1, 'monday 4', '', '2021-01-04 09:01:26', '2021-01-04 09:17:26', 'yes', '2021-01-04 09:01:05', 'yes', '2021-01-04 09:01:16', 'yes', '2021-01-04 09:01:16', 1, '2021-01-04 09:01:24', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(32, 2, 2, 3, 1, 'today 4', '', '2021-01-04 09:01:20', '2021-01-04 09:34:20', 'no', NULL, 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(33, 2, 2, 3, 1, 'test1234', '', '2021-01-04 09:01:04', '2021-01-04 09:36:04', 'no', NULL, 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(34, 2, 2, 3, 1, 'check data', '', '2021-01-04 09:01:13', '2021-01-04 09:38:13', 'yes', '2021-01-04 09:01:03', 'yes', '2021-01-04 09:01:30', 'yes', '2021-01-04 09:01:30', 1, '2021-01-04 09:01:42', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 'tt', ''),
(35, 2, 2, 3, 1, 'testing the proposal ', '', '2021-01-04 10:01:07', '2021-01-04 10:01:07', 'no', NULL, 'yes', '2021-01-04 10:01:16', 'yes', '2021-01-04 10:01:16', 1, '2021-01-04 10:01:25', 'Submitted', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(36, 2, 2, 3, 1, 'new proposal', '', '2021-01-04 10:01:30', '2021-01-04 10:05:30', 'no', NULL, 'yes', '2021-01-04 10:01:10', 'yes', '2021-01-04 10:01:10', 1, '2021-01-04 10:01:15', 'Submitted', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(37, 2, 2, 3, 1, 'New proposal 1', '', '2021-01-04 10:01:46', '2021-01-04 10:07:46', 'no', NULL, 'yes', '2021-01-04 10:01:43', 'yes', '2021-01-04 10:01:43', 1, '2021-01-04 10:01:51', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(38, 2, 2, 3, 1, 'proposal new creation testing', '', '2021-01-04 10:01:08', '2021-01-04 10:17:08', 'no', NULL, 'yes', '2021-01-04 10:01:49', 'yes', '2021-01-04 10:01:49', 1, '2021-01-04 10:01:55', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(39, 2, 2, 3, 1, 'Renew Test', '', '2021-01-04 10:01:48', '2021-01-04 10:28:48', 'no', NULL, 'yes', '2021-01-04 10:01:50', 'yes', '2021-01-04 10:01:50', 1, '2021-01-04 10:01:59', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(40, 2, 2, 3, 1, 'Renew Test 1', '', '2021-01-04 10:01:21', '2021-01-04 10:36:21', 'no', NULL, 'yes', '2021-01-04 10:01:30', 'yes', '2021-01-04 10:01:30', 1, '2021-01-04 10:01:40', 'NGO Decision Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(41, 2, 2, 3, 1, 'Monday Review Test', '', '2021-01-04 11:01:36', '2021-01-04 11:42:36', 'no', NULL, 'yes', '2021-01-04 11:01:00', 'yes', '2021-01-04 11:01:00', 1, '2021-01-04 11:01:10', 'NGO Decision Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(42, 2, 2, 3, 1, 'new proposal', '', '2021-01-04 12:01:45', '2021-01-04 12:13:45', 'no', NULL, 'yes', '2021-01-04 12:01:33', 'yes', '2021-01-04 12:01:33', 1, '2021-01-04 12:01:41', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(43, 2, 2, 3, 1, 'Proposal create at Monday', '', '2021-01-04 12:01:23', '2021-01-04 12:20:23', 'no', NULL, 'yes', '2021-01-07 18:01:38', 'yes', '2021-01-07 18:01:38', 1, '2021-01-07 18:01:51', 'Submitted', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(44, 2, 2, 3, 1, 'new proposal 2', '', '2021-01-04 12:01:19', '2021-01-04 12:23:19', 'yes', '2021-01-04 12:01:32', 'yes', '2021-01-04 12:01:45', 'yes', '2021-01-04 12:01:45', 1, '2021-01-04 12:01:55', 'NGO Decision Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(45, 2, 2, 3, 1, 'pqr', '', '2021-01-04 12:01:37', '2021-01-04 12:40:37', 'yes', '2021-01-04 12:01:57', 'yes', '2021-01-04 12:01:07', 'yes', '2021-01-04 12:01:07', 1, '2021-01-04 12:01:14', 'NGO Decision Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(46, 2, 2, 3, 1, 'ENGINEERING', '', '2021-01-04 14:01:40', '2021-01-04 14:44:40', 'yes', '2021-01-04 14:01:41', 'yes', '2021-01-04 14:01:44', 'yes', '2021-01-04 14:01:44', 1, '2021-01-04 14:01:49', 'NGO Decision Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(47, 2, 2, 3, 1, 'DATA TESTING', '', '2021-01-04 18:01:22', '2021-01-04 18:27:22', 'yes', '2021-01-04 18:01:00', 'yes', '2021-01-04 18:01:06', 'yes', '2021-01-04 18:01:06', 1, '2021-01-04 18:01:14', 'NGO Decision Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(48, 2, 2, 3, 1, 'CHECK DATA', '', '2021-01-04 18:01:16', '2021-01-04 18:34:16', 'yes', '2021-01-04 18:01:49', 'yes', '2021-01-04 18:01:55', 'yes', '2021-01-04 18:01:55', 1, '2021-01-04 18:01:02', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(49, 2, 2, 3, 1, 'DATA CHECK', '', '2021-01-04 18:01:12', '2021-01-04 18:44:12', 'yes', '2021-01-04 18:01:45', 'yes', '2021-01-04 18:01:51', 'yes', '2021-01-04 18:01:51', 1, '2021-01-04 18:01:00', 'Proposal Final Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(50, 2, 3, 3, 1, 'prposal 04', '', '2021-01-04 18:01:12', '2021-01-04 18:57:12', 'yes', '2021-01-04 18:01:39', 'yes', '2021-01-04 18:01:56', 'yes', '2021-01-04 18:01:56', 1, '2021-01-04 18:01:04', 'Proposal Final Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(51, 2, 3, 3, 1, 'project 04 01', '', '2021-01-04 19:01:44', '2021-01-04 19:01:44', 'yes', '2021-01-04 19:01:07', 'yes', '2021-01-04 19:01:19', 'yes', '2021-01-04 19:01:19', 1, '2021-01-04 19:01:25', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(52, 2, 4, 3, 1, 'Incognito', '', '2021-01-06 13:01:01', '2021-01-06 13:08:01', 'yes', '2021-01-06 13:01:53', 'yes', '2021-01-06 13:01:01', 'yes', '2021-01-06 13:01:01', 1, '2021-01-06 13:01:08', 'Proposal Initial Review Pending', 1, 0, NULL, NULL, 1, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(53, 2, 4, 3, 1, 'PROPOSAL', '', '2021-01-06 13:01:23', '2021-01-06 13:12:23', 'yes', '2021-01-06 13:01:57', 'yes', '2021-01-06 13:01:04', 'yes', '2021-01-06 13:01:04', 1, '2021-01-06 13:01:09', 'Proposal Final Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(54, 2, 4, 3, 1, 'LENOVO', '', '2021-01-06 14:01:00', '2021-01-06 14:17:00', 'yes', '2021-01-06 14:01:33', 'yes', '2021-01-06 14:01:43', 'yes', '2021-01-06 14:01:43', 1, '2021-01-06 14:01:48', 'Proposal Final Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(55, 2, 5, 3, 1, 'LENOVO NGO', '', '2021-01-06 14:01:43', '2021-01-06 14:24:43', 'yes', '2021-01-06 14:01:28', 'yes', '2021-01-06 14:01:41', 'yes', '2021-01-06 14:01:41', 1, '2021-01-06 14:01:46', 'Proposal Final Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(56, 2, 6, 3, 1, 'HP NGO', '', '2021-01-06 14:01:09', '2021-01-06 14:31:09', 'yes', '2021-01-06 14:01:48', 'yes', '2021-01-06 14:01:55', 'yes', '2021-01-06 14:01:55', 1, '2021-01-06 14:01:00', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(57, 2, 7, 3, 1, 'DELL NGO', '', '2021-01-06 14:01:29', '2021-01-06 14:34:29', 'yes', '2021-01-06 14:01:09', 'yes', '2021-01-06 14:01:16', 'yes', '2021-01-06 14:01:16', 1, '2021-01-06 14:01:21', 'Proposal Initial Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(58, 2, 8, 3, 1, 'ACER NGO', '', '2021-01-06 18:01:01', '2021-01-06 18:04:01', 'yes', '2021-01-06 18:01:35', 'yes', '2021-01-06 18:01:41', 'yes', '2021-01-06 18:01:41', 1, '2021-01-06 18:01:45', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(59, 2, 4, 3, 1, 'NEW ENTITY', '', '2021-01-06 18:01:12', '2021-01-06 18:08:12', 'yes', '2021-01-06 18:01:43', 'yes', '2021-01-06 18:01:49', 'yes', '2021-01-06 18:01:49', 1, '2021-01-06 18:01:55', 'Proposal Final Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(60, 2, 8, 3, 1, 'ACER NGO 1', '', '2021-01-06 19:01:13', '2021-01-06 19:19:13', 'yes', '2021-01-06 19:01:45', 'yes', '2021-01-06 19:01:52', 'yes', '2021-01-06 19:01:52', 1, '2021-01-06 19:01:58', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(61, 2, 5, 3, 1, 'UNREGISTRED', '', '2021-01-07 14:01:35', '2021-01-07 14:08:35', 'yes', '2021-01-07 14:01:50', 'yes', '2021-01-07 14:01:55', 'yes', '2021-01-07 14:01:55', 1, '2021-01-07 14:01:00', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(62, 2, 3, 3, 1, 'ads', '', '2021-01-07 16:01:41', '2021-01-07 16:36:41', 'yes', '2021-01-07 16:01:14', 'yes', '2021-01-07 16:01:14', 'yes', '2021-01-07 16:01:14', 1, '2021-01-07 16:01:22', 'Proposal Initial Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(63, 2, 4, 3, 1, 'we', '', '2021-01-07 16:01:03', '2021-01-07 16:42:03', 'yes', '2021-01-07 16:01:19', 'yes', '2021-01-07 16:01:40', 'yes', '2021-01-07 16:01:40', 1, '2021-01-07 16:01:48', 'Proposal Final Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(64, 2, 5, 3, 1, 'ewe', '', '2021-01-07 16:01:46', '2021-01-07 16:48:46', 'yes', '2021-01-07 16:01:02', 'yes', '2021-01-07 16:01:10', 'yes', '2021-01-07 16:01:10', 1, '2021-01-07 16:01:17', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, ''),
(65, 2, 2, 3, 1, 'PQR', '', '2021-01-07 17:01:20', '2021-01-07 17:18:20', 'yes', '2021-01-07 17:01:08', 'yes', '2021-01-07 17:01:16', 'yes', '2021-01-07 17:01:16', 1, '2021-01-07 17:01:21', 'Proposal Initial Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(66, 2, 2, 3, 1, 'ppp', '', '2021-01-07 17:01:27', '2021-01-07 17:26:27', 'yes', '2021-01-07 17:01:53', 'yes', '2021-01-07 17:01:02', 'yes', '2021-01-07 17:01:02', 1, '2021-01-07 17:01:09', 'Proposal Initial Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(67, 2, 2, 3, 1, 'Ps', '', '2021-01-07 17:01:40', '2021-01-07 17:56:40', 'yes', '2021-01-07 17:01:08', 'yes', '2021-01-07 17:01:14', 'yes', '2021-01-07 17:01:14', 1, '2021-01-07 17:01:20', 'Submitted', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(68, 2, 2, 3, 1, 'PQR', '', '2021-01-07 17:01:47', '2021-01-07 17:58:47', 'yes', '2021-01-07 17:01:17', 'yes', '2021-01-07 17:01:30', 'yes', '2021-01-07 17:01:30', 1, '2021-01-07 17:01:36', 'Submitted', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', ''),
(69, 2, 3, 3, 1, 'PSD', '', '2021-01-07 18:01:05', '2021-01-07 18:05:05', 'yes', '2021-01-07 18:01:33', 'yes', '2021-01-07 18:01:38', 'yes', '2021-01-07 18:01:38', 1, '2021-01-07 18:01:42', 'Approved', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `colour`) VALUES
(1, 'Submitted', 'blue'),
(2, 'New', 'green'),
(3, 'Incomplete', 'Yellow'),
(4, 'Recommended for Rejection', 'Red'),
(5, 'Rejected', 'Red'),
(6, 'Complete', 'green'),
(7, 'Revision Request', 'Yellow'),
(8, 'Processing', 'Grey'),
(9, 'Pending Revision by NGO', 'Red'),
(10, 'Approved', 'Green'),
(11, 'In progress', 'Yellow'),
(12, 'NGO Revision', 'grey'),
(13, 'NGO Revised', 'Green'),
(14, 'Needs Review', 'Red'),
(15, 'Accepted', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `superngo`
--

DROP TABLE IF EXISTS `superngo`;
CREATE TABLE IF NOT EXISTS `superngo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(200) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `superngo`
--

INSERT INTO `superngo` (`id`, `brand_name`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 'Kriti', '2020-09-28 04:09:54', '2020-09-28 04:07:54', 0),
(2, 'Lennox', '2020-09-30 10:09:14', '2020-09-30 10:54:14', 0),
(3, 'KBNGO2', '2020-11-16 08:11:58', '2020-11-16 08:32:58', 0),
(4, 'testing2', '2020-11-16 11:11:40', '2020-11-16 11:11:40', 0),
(5, 'testngo', '2020-11-28 09:11:50', '2020-11-28 09:01:50', 0),
(6, 'testngo1', '2020-11-28 09:11:25', '2020-11-28 09:41:25', 0),
(7, 'newngo', '2020-11-30 05:11:59', '2020-11-30 05:45:59', 0),
(8, 'Kriti\'s Org', '2020-12-15 17:12:36', '2020-12-15 17:42:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_admin_login`
--

DROP TABLE IF EXISTS `web_admin_login`;
CREATE TABLE IF NOT EXISTS `web_admin_login` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `default` tinyint(4) DEFAULT '0',
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_admin_login`
--

INSERT INTO `web_admin_login` (`user_id`, `user_name`, `user_email`, `passwd`, `date`, `time`, `verify_code`, `status`, `phone_no`, `profile_picture`, `user_role_id`, `user_role`, `default`, `is_deleted`) VALUES
(1, 'Admin', 'admin@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2018-06-28', '06:06:58', '', 'Active', 0, 'default_profile.jpg', '', 'admin', 1, 0),
(2, 'staff', 'staff@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '0000-00-00', '00:00:00', '', 'Active', 7856958475, '1599287768.png', '1', 'Manager', 0, 0),
(3, 'sa', 'as', '', '0000-00-00', '00:00:00', '', 'Active', 32, 'default_profile.jpg', '1', 'Manager', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
