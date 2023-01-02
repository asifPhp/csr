-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2020 at 02:04 PM
-- Server version: 5.7.31
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
-- Table structure for table `admin_category`
--

DROP TABLE IF EXISTS `admin_category`;
CREATE TABLE IF NOT EXISTS `admin_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `org_id`, `legal_name`, `brand_name`, `code`, `pan_number`, `redistered_address`, `city`, `state`, `pincode`, `pan_image`, `auth_sign`, `logo_image`, `donor_image`, `art_image`, `facebook`, `instagram`, `twitter`, `linkedin`, `created_date`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 2, 'donor', 'donor', '123456', 'BNZAA2318J', 'surya nagar', 'Jodhopur', 'Rajasthan', 34201, '1602583780.png', 'user', '1602583799.png', '1602583812.png', '1602583821.png', '', '', '', '', '2020-09-15', '11:09:25', '2020-09-15 15:29:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

DROP TABLE IF EXISTS `financial_years`;
CREATE TABLE IF NOT EXISTS `financial_years` (
  `start_year` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `end_year` int(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`start_year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`start_year`, `name`, `end_year`, `start_date`, `end_date`) VALUES
(2019, '2019-20', 2020, '2019-04-01', '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

DROP TABLE IF EXISTS `ngo`;
CREATE TABLE IF NOT EXISTS `ngo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ngo_id` int(11) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `legal_name` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) DEFAULT NULL,
  `brand_name` varchar(30) DEFAULT NULL,
  `geo_location` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `operation_nature` varchar(50) DEFAULT NULL,
  `category_array` longtext NOT NULL,
  `resource_managment` varchar(50) DEFAULT NULL,
  `geographical_reach` varchar(50) DEFAULT NULL,
  `beneficiary_reach` varchar(50) DEFAULT NULL,
  `registration_detail` longtext,
  `registration_type` varchar(10) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `registration_street_address` varchar(20) DEFAULT NULL,
  `registration_city` varchar(20) DEFAULT NULL,
  `registration_pin_code` int(20) DEFAULT NULL,
  `Registration_Number` int(20) DEFAULT NULL,
  `registration_number_12a` int(20) DEFAULT NULL,
  `from_date_12a_valid` date DEFAULT NULL,
  `expire_date_12a_valid` date DEFAULT NULL,
  `tax_exemption_percentage` int(20) DEFAULT NULL,
  `registration_number_80g` int(20) DEFAULT NULL,
  `certificate_date_80G` date DEFAULT NULL,
  `registration_80g_valid` varchar(20) DEFAULT NULL,
  `tax_exemption_type` varchar(20) DEFAULT NULL,
  `pan_number` int(20) DEFAULT NULL,
  `epf_number` int(20) DEFAULT NULL,
  `professional_tax_number` int(20) DEFAULT NULL,
  `tan_number` int(20) DEFAULT NULL,
  `other_appropriate_certification_input` varchar(20) DEFAULT NULL,
  `is_12a_certificate` varchar(20) DEFAULT NULL,
  `is_12a_certificate_cancle` varchar(20) DEFAULT NULL,
  `is_tax_exemption_80g` varchar(20) DEFAULT NULL,
  `is_perpetuity_valid` varchar(20) DEFAULT NULL,
  `is_valid_tax_exemption` varchar(20) DEFAULT NULL,
  `is_certificate_exist` varchar(20) DEFAULT NULL,
  `appropriate_certification` varchar(20) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `upload_proof_tax_exemption` varchar(100) DEFAULT NULL,
  `upload_registration_certificate` varchar(100) DEFAULT NULL,
  `upload_proof_12A_reg` varchar(100) DEFAULT NULL,
  `upload_80G_reg` varchar(100) DEFAULT NULL,
  `upload_proof_80G_incometax` varchar(100) DEFAULT NULL,
  `soft_copy_pancard` varchar(100) DEFAULT NULL,
  `proof_of_TAN` varchar(100) DEFAULT NULL,
  `epf_for_last_year` varchar(100) DEFAULT NULL,
  `tax_for_last_year` varchar(100) DEFAULT NULL,
  `credibility_alliance_report` varchar(100) DEFAULT NULL,
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
  `governing_council` varchar(50) DEFAULT NULL,
  `is_non_financial_partnerships` varchar(50) DEFAULT NULL,
  `is_leadership_network` varchar(50) DEFAULT NULL,
  `is_guilty` varchar(50) DEFAULT NULL,
  `is_political_affiliation` varchar(50) DEFAULT NULL,
  `optradio2` varchar(50) DEFAULT NULL,
  `optradio3` varchar(50) DEFAULT NULL,
  `optradio4` varchar(50) DEFAULT NULL,
  `optradio5` varchar(50) DEFAULT NULL,
  `optradio6` varchar(50) DEFAULT NULL,
  `optradio7` varchar(50) DEFAULT NULL,
  `upload_organogram` varchar(50) DEFAULT NULL,
  `defined_structure_decission_making` varchar(30) DEFAULT NULL,
  `number_of_employee` int(20) DEFAULT NULL,
  `detail_body_member` varchar(11) DEFAULT NULL,
  `number_of_employee_through_contractor` int(20) DEFAULT NULL,
  `number_parttime_employees` int(20) DEFAULT NULL,
  `renumeration_leadership` varchar(30) DEFAULT NULL,
  `governing_body_member_det` longtext,
  `vehicles_details` longtext NOT NULL,
  `major_donors` longtext NOT NULL,
  `budget_details` longtext NOT NULL,
  `foreign_travel_taken_by_staff` longtext NOT NULL,
  `renumeration_of_senior_leadership` longtext NOT NULL,
  `full_time_staff_numbers` longtext NOT NULL,
  `part_time_staff_numbers` longtext NOT NULL,
  `gst_number` int(50) DEFAULT NULL,
  `entity_have_gst_num` varchar(50) DEFAULT NULL,
  `upload_financial_statement1` varchar(50) DEFAULT NULL,
  `upload_financial_statement2` varchar(50) DEFAULT NULL,
  `upload_financial_statement3` varchar(50) DEFAULT NULL,
  `uplpad_ITR_1` varchar(50) DEFAULT NULL,
  `uplpad_ITR_2` varchar(50) DEFAULT NULL,
  `uplpad_ITR_3` varchar(50) DEFAULT NULL,
  `gst_certificate` varchar(50) DEFAULT NULL,
  `upload_cancelled_cheque` varchar(50) DEFAULT NULL,
  `name_of_organization` varchar(50) DEFAULT NULL,
  `gst_exemption_letter` varchar(10) DEFAULT NULL,
  `other_policies` varchar(50) DEFAULT NULL,
  `optradio_policy` varchar(50) DEFAULT NULL,
  `optradio_whistleblower_policy` varchar(50) DEFAULT NULL,
  `optradio_child_protection_policy` varchar(50) DEFAULT NULL,
  `multiple_img_upload` varchar(20) DEFAULT NULL,
  `multiple_img_upload2` varchar(20) DEFAULT NULL,
  `other_policies_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `ngo_id`, `staff_id`, `superngo_id`, `legal_name`, `website`, `created_time`, `update_datetime`, `is_deleted`, `brand_name`, `geo_location`, `city`, `operation_nature`, `category_array`, `resource_managment`, `geographical_reach`, `beneficiary_reach`, `registration_detail`, `registration_type`, `registration_date`, `registration_street_address`, `registration_city`, `registration_pin_code`, `Registration_Number`, `registration_number_12a`, `from_date_12a_valid`, `expire_date_12a_valid`, `tax_exemption_percentage`, `registration_number_80g`, `certificate_date_80G`, `registration_80g_valid`, `tax_exemption_type`, `pan_number`, `epf_number`, `professional_tax_number`, `tan_number`, `other_appropriate_certification_input`, `is_12a_certificate`, `is_12a_certificate_cancle`, `is_tax_exemption_80g`, `is_perpetuity_valid`, `is_valid_tax_exemption`, `is_certificate_exist`, `appropriate_certification`, `code`, `upload_proof_tax_exemption`, `upload_registration_certificate`, `upload_proof_12A_reg`, `upload_80G_reg`, `upload_proof_80G_incometax`, `soft_copy_pancard`, `proof_of_TAN`, `epf_for_last_year`, `tax_for_last_year`, `credibility_alliance_report`, `non_financial_partnerships`, `leadership_network`, `blacklist`, `guilty`, `religious_affiliation_on_radio`, `bajaj_group_involved`, `senior_member_involved`, `previously_recieve_funding`, `received_award`, `received_national_award`, `upload_annual_report_1`, `upload_annual_report_2`, `upload_annual_report_3`, `governing_council`, `is_non_financial_partnerships`, `is_leadership_network`, `is_guilty`, `is_political_affiliation`, `optradio2`, `optradio3`, `optradio4`, `optradio5`, `optradio6`, `optradio7`, `upload_organogram`, `defined_structure_decission_making`, `number_of_employee`, `detail_body_member`, `number_of_employee_through_contractor`, `number_parttime_employees`, `renumeration_leadership`, `governing_body_member_det`, `vehicles_details`, `major_donors`, `budget_details`, `foreign_travel_taken_by_staff`, `renumeration_of_senior_leadership`, `full_time_staff_numbers`, `part_time_staff_numbers`, `gst_number`, `entity_have_gst_num`, `upload_financial_statement1`, `upload_financial_statement2`, `upload_financial_statement3`, `uplpad_ITR_1`, `uplpad_ITR_2`, `uplpad_ITR_3`, `gst_certificate`, `upload_cancelled_cheque`, `name_of_organization`, `gst_exemption_letter`, `other_policies`, `optradio_policy`, `optradio_whistleblower_policy`, `optradio_child_protection_policy`, `multiple_img_upload`, `multiple_img_upload2`, `other_policies_name`) VALUES
(1, 0, 0, 1, 'srabani nayak', 'https://mail.google.com/', '2020-09-22 11:09:54', '2020-09-22 15:25:54', 0, 'srabani satadala nayak', 'Vidarbha', 'Maharashtra', 'Funding Agency', '', 'At least 25% of the organisation has professional ', 'Reaches more than 100 villages/slums/vastis', 'Reaches between 50,000 - 1 Lakh beneficiaries', '', 'Maharashtr', '2020-11-28', 'idea office lane har', 'Hyderabad', 500081, 54564313, 2165840, '2020-11-10', '2020-11-28', 45, 7896523, '2020-11-28', '', 'ssn', 2147483647, 321654, 7864356, 5678788, 'gh', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '[\"Give_india\",\"Credi', '321654', 'bg1.jpg', 'photo1.png', 'photo1.png', 'photo1.png', 'bg1.jpg', 'photo2.png', 'photo1.png', 'photo2.png', 'photo1.png', 'photo1.png', 'mjnjjjm', 'nbh  m', '', 'hvfvgbh', 'hvghb', 'm m c', 'b cbb', 'gcbb ', 'ng cc', 'nccn', 'photo1.png', 'photo1.png', 'photo1.png', '[\"been_convicted_by_any_court_of_law\",\"been_found_', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'photo1.png', 'Yes', 8, '2', 11, 13, 'http://localhost/csr/uploads/1', '[{\"name_of_member\":\"gbhfg\",\"member_age\":\"32\",\"member_gender\":\"Male\",\"member_designation\":\"gtbt\",\"member_join_at\":\"2020-11-28\",\"member_related_to_other\":\"hynh\",\"member_occupation\":\"eFgg\"}]', '', '', '', '', '', '', '', 2147483647, 'Yes', 'photo2.png', 'bg1.jpg', 'loading.gif', 'photo1.png', 'photo2.png', 'bg1.jpg', 'entity_5fc1f6bff2e13.png', 'photo1.png', 'srabani', NULL, '[\"Travel_Policy(including_details_of_incidentals)\"', 'yes', 'yes', 'yes', '[{\"file_dives\":\"enti', '[{\"file_dives\":\"enti', NULL),
(2, 0, 34, 33, 'srabani nayak', '', '2020-12-03 13:12:07', '2020-09-24 16:56:04', 0, '', '', '', '', '', '', '', '', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\"}]', 'Rajasthan', '2020-11-28', 'idea office lane har', 'Hyderabad', 500081, 54564313, 0, '0000-00-00', '0000-00-00', 0, 0, '0000-00-00', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'photo1.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yes', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_designation\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', 0, '', '', '', '', '', '', '', '', '', '', '', '[\"Other(s)\"]', 'No', 'No', 'No', '', '', 'ssn'),
(3, 0, 0, 2, 'Lennox2', 'https://getbootstrap.com/docs/4.5/components/progress/', '2020-09-26 14:09:59', '2020-09-26 18:02:59', 0, '', '0', '', '', '', '', '', '', '', '', NULL, '', '', 0, 0, 0, NULL, NULL, 0, 0, NULL, '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 0, 0, NULL, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL),
(8, 0, 0, 0, 'srabani', 'https://mail.google.com/', NULL, '2020-11-26 17:07:38', 0, 'Chatur Prajapat', 'Maharashtra', 'Maharashtra, Rajasthan', 'Direct Implementing Agency', '', 'At least 25% of the organisation has professional ', 'Reaches more than 500 villages', 'Reaches more than 1 lakh beneficiaries', '', '', NULL, '', '', 0, 0, 0, NULL, NULL, 0, 0, NULL, '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '123456', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 0, 0, NULL, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL),
(9, 0, 0, 1, 'srabani nayak', 'https://mail.google.com/', '2020-09-27 07:09:05', '2020-09-27 11:03:05', 0, 'srabani satadala nayak', 'Maharashtra', 'Maharashtra', 'Funding Agency', '', 'At least 25% of the organisation has professional ', 'Reaches more than 100 villages/slums/vastis', 'Reaches between 50,000 - 1 Lakh beneficiaries', '', '', NULL, '', '', 0, 0, 0, NULL, NULL, 0, 0, NULL, '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '123450', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 0, 0, NULL, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL),
(10, 0, 0, 3, 'srabani nayak', 'https://mail.google.com/', '2020-09-27 08:09:27', '2020-09-27 11:50:27', 1, 'srabani satadala nayak', 'Maharashtra', 'Maharashtra', 'Funding Agency', '', 'At least 25% of the organisation has professional ', 'Reaches more than 100 villages/slums/vastis', 'Reaches between 50,000 - 1 Lakh beneficiaries', '', 'Maharashtr', '2020-11-28', 'idea office lane har', 'Hyderabad', 500081, 54564313, 45, '2020-11-18', '2020-11-27', 45, 789456, '2020-11-28', '', 'ssn', 2147483647, 321654, 7864356, 5678788, '', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '[\"Give_india\"]', '131313', 'Untitledbell.png', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'Untitled1.png', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'download-free-images-website-1280x720.jpg', '', 'association', 'network', '', 'penalised ', 'affiliation', 'bajaj group', 'bajaj group organisation', 'bajaj company trust', 'received award', 'national award', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'Untitled2.png', '[\"been_convicted_by_any_court_of_law\",\"been_found_', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'download-free-images-website-1280x720.jpg', 'Yes', 4, '3', 5, 5, 'http://localhost/csr/uploads/1', '[{\"name_of_member\":\"smruti\",\"member_age\":\"26\",\"member_gender\":\"Female\",\"member_designation\":\"sw\",\"member_join_at\":\"2020-11-28\",\"member_related_to_other\":\"dfg\",\"member_occupation\":\"eFgg\"}]', '', '', '', '', '', '', '', 123, 'Yes', 'download-free-images-website-1280x720.jpg', 'Untitled1.png', 'Untitled.png', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'Untitledbell.png', 'entity_5fc1e58c368d6.png', 'download-free-images-website-1280x720.jpg', 'lennox', NULL, '[\"Travel_Policy(including_details_of_incidentals)\"', 'yes', 'yes', 'yes', '[{\"file_dives\":\"enti', '[{\"file_dives\":\"enti', NULL),
(11, 0, 0, 3, 'srabani nayak', 'https://mail.google.com/', '2020-09-27 08:09:35', '2020-09-27 11:51:35', 0, 'smrutismita', 'Vidarbha', 'Maharashtra', 'Funding Agency', '', 'At least 25% of the organisation has professional ', 'Reaches more than 100 villages/slums/vastis', 'Reaches between 50,000 - 1 Lakh beneficiaries', '', 'Telengana', '2020-11-28', 'idea office lane har', 'Hyderabad', 500081, 54564313, 2165840, '2020-11-10', '2020-11-28', 13, 7896523, '2020-11-11', '2020-11-28', 'ssn', 2147483647, 657496354, 563214896, 567878889, '', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', '[\"Give_india\",\"Credi', '123459', 'bg1.jpg', 'photo1.png', 'photo1.png', 'photo1.png', 'bg1.jpg', 'photo2.png', 'bg1.jpg', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'Untitled1.png', 'details of the association', 'network', '', 'guilty or penalised', 'political affiliation', 'senior members including relatives', 'association such as vendor', 'bajaj company or trust', 'received any award', 'national award', 'download-free-images-website-1280x720.jpg', 'Untitledbell.png', 'Untitled1.png', '[\"been_convicted_by_any_court_of_law\",\"been_found_', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'download-free-images-website-1280x720.jpg', 'Yes', 1, '2', 1, 1, 'http://localhost/csr/uploads/1', '[{\"name_of_member\":\"smruti\",\"member_age\":\"26\",\"member_gender\":\"Female\",\"member_designation\":\"gtbt\",\"member_join_at\":\"2020-11-28\",\"member_related_to_other\":\"enter details\",\"member_occupation\":\"sw\"}]', '', '', '', '', '', '', '', 2147483647, 'Yes', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'Untitledbell.png', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'Untitled2.png', 'entity_5fc1ebfa66ffa.jpg', 'Untitled.png', 'lennox', NULL, '[\"Travel_Policy(including_details_of_incidentals)\"', 'yes', 'yes', 'yes', '[{\"file_dives\":\"enti', '[{\"file_dives\":\"enti', NULL),
(12, 9, 0, 0, 'srabani nayak', 'https://mail.google.com/', NULL, '2020-11-26 09:25:45', 0, 'barsha', 'Maharashtra', 'Maharashtra', 'Advocacy', '', 'At least 25% of the organisation has professional ', 'Reaches more than 500 villages', 'Reaches between 50,000 - 1 Lakh beneficiaries', '', 'Telengana', '0000-00-00', 'idea office lane har', 'Hyderabad', 500081, 54564313, 2165840, '2020-11-11', '2020-11-28', 33, 7896523, '2020-11-28', '2020-11-26', 'barsha', 2147483647, 321654, 7864356, 5678788, 'gh', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', '[\"Give_india\",\"Credi', '222223', 'download-free-images-website-1280x720.jpg', 'download-free-images-website-1280x720.jpg', 'download-free-images-website-1280x720.jpg', 'download-free-images-website-1280x720.jpg', 'Untitledbell.png', 'download-free-images-website-1280x720.jpg', 'download-free-images-website-1280x720.jpg', 'Untitled1.png', 'Untitled1.png', 'download-free-images-website-1280x720.jpg', 'jhbjh', 'jvhvjh', '', 'hbyfhb', 'jhbhgc', 'jbycgvb', 'hbhgtcvhb', 'hvtgtvhn', 'hvtvhjn', 'hbyfvhb', 'download-free-images-website-1280x720.jpg', 'Untitled2.png', 'Untitled2.png', '[\"been_convicted_by_any_court_of_law\",\"been_found_', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'download-free-images-website-1280x720.jpg', 'Yes', 19, '1', 3, 4, 'http://localhost/csr/uploads/1', '[{\"name_of_member\":\"barsha\",\"member_age\":\"24\",\"member_gender\":\"Female\",\"member_designation\":\"ca\",\"member_join_at\":\"2020-11-28\",\"member_related_to_other\":\"enter details\",\"member_occupation\":\"ca\"}]', '', '', '', '', '', '', '', 123, 'Yes', 'download-free-images-website-1280x720.jpg', 'Untitled.png', 'Untitled2.png', 'Untitled.png', 'Untitledbell.png', 'photo1.png', 'entity_5fc1f063ef9c8.gif', 'photo1.png', 'barsha', NULL, '[\"Travel_Policy(including_details_of_incidentals)\"', 'yes', 'yes', 'yes', '[{\"file_dives\":\"enti', '[{\"file_dives\":\"enti', NULL),
(60, 0, 0, 0, 'srabani nayak', 'https://mail.google.com/', NULL, '2020-11-28 09:57:56', NULL, 'srabani satadala nayak', 'Rajasthan, ', 'Rajasthan', 'Funding Agency', '', 'At least 25% of the organisation has professional ', 'Reaches less than that 100 villages/slums/vastis', 'Reaches less than 50,000 beneficiaries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '333338', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 0, 0, 0, 'srabani nayak', 'https://mail.google.com/', NULL, '2020-11-28 09:59:53', NULL, 'srabani satadala', 'Rajasthan, ', 'Rajasthan', 'Funding Agency', '', 'At least 25% of the organisation has professional ', 'Reaches less than that 100 villages/slums/vastis', 'Reaches less than 50,000 beneficiaries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '782123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 0, 26, 25, 'temp', 'https://mail.google.com/', '2020-11-30 07:11:23', '2020-11-30 12:35:23', 0, 'srabani satadala nayak', 'Maharashtra', 'Maharashtra', 'Funding Agency', '', 'At least 25% of the organisation has professional ', 'Reaches more than 500 villages', 'Reaches more than 1 lakh beneficiaries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '782125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 0, 26, 25, 'temp', 'https://mail.google.com/', '2020-11-30 07:11:52', '2020-11-30 12:36:52', 0, 'srabani satadala nayak', 'Maharashtra', 'Maharashtra', 'Direct Implementing Agency', '[{\"category_id\":\"1\",\"category_name\":\"Health\",\"value\":\"key activities\"}]', 'At least 25% of the organisation has professional ', 'Reaches more than 500 villages', 'Reaches more than 1 lakh beneficiaries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '333335', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 0, 26, 25, 'temp', '', '2020-11-30 07:11:11', '2020-11-30 12:41:11', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 0, 26, 25, 'temp', '', '2020-11-30 07:11:28', '2020-11-30 12:43:28', 0, '', 'Maharashtra', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 0, 26, 25, 'temp', 'https://mail.google.com/', '2020-11-30 07:11:49', '2020-11-30 12:44:16', 0, 'srabani satadala nayak', 'Maharashtra', 'Maharashtra', 'Direct Implementing Agency', '[{\"category_id\":\"1\",\"category_name\":\"Health\",\"value\":\"key activities\"}]', 'At least 25% of the organisation has professional ', 'Reaches more than 500 villages', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '782120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 0, 26, 25, 'temp', 'https://mail.google.com/', '2020-11-30 07:11:32', '2020-11-30 12:50:32', 0, 'srabani satadala nayak', 'Maharashtra, Vidarbh', 'Maharashtra', 'Direct Implementing Agency', '[{\"category_id\":\"2\",\"category_name\":\"Education\",\"value\":\"key activities\"}]', 'At least 25% of the organisation has professional ', 'Reaches more than 500 villages', 'Reaches between 50,000 - 1 Lakh beneficiaries', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 0, 26, 25, 'temp', '', '2020-11-30 07:11:04', '2020-11-30 12:59:04', 0, '', '', '', '', '[{\"category_id\":\"1\",\"category_name\":\"Health\",\"value\":\"key activities\"}]', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 0, 26, 25, 'temp', '', '2020-11-30 07:11:22', '2020-11-30 13:00:22', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 0, 26, 25, 'temp', '', '2020-11-30 07:11:52', '2020-11-30 13:03:52', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 0, 26, 25, 'temp', '', '2020-11-30 07:11:09', '2020-11-30 13:07:09', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 0, 26, 25, 'temp', '', '2020-11-30 07:11:21', '2020-11-30 13:07:21', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 0, 26, 25, 'temp', '', '2020-11-30 07:11:48', '2020-11-30 13:07:48', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 0, 26, 25, 'temp', '', '2020-11-30 07:11:53', '2020-11-30 13:07:53', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 0, 26, 25, 'temp', '', '2020-11-30 07:11:42', '2020-11-30 13:08:42', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 2, 26, 25, 'temp', '', '2020-11-30 07:11:10', '2020-11-30 13:10:10', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 0, 26, 25, 'temp', '', '2020-11-30 07:11:43', '2020-11-30 13:10:43', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 0, 26, 25, 'temp', '', '2020-11-30 07:11:03', '2020-11-30 13:12:03', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 0, 26, 25, 'temp', '', '2020-11-30 07:11:14', '2020-11-30 13:13:14', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 0, 26, 25, 'temp', '', '2020-11-30 07:11:46', '2020-11-30 13:13:46', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 0, 26, 25, 'temp', '', '2020-11-30 07:11:57', '2020-11-30 13:13:57', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 0, 26, 25, 'temp', '', '2020-11-30 08:11:22', '2020-11-30 13:38:22', 0, '', '', '', '', '', 'At least 25% of the organisation has professional ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 0, 26, 25, 'temp', '', '2020-11-30 08:11:25', '2020-11-30 13:44:25', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 0, 26, 25, 'temp', '', '2020-11-30 08:11:22', '2020-11-30 13:45:22', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 0, 26, 25, 'temp', '', '2020-11-30 08:11:11', '2020-11-30 13:50:11', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 0, 26, 25, 'temp', '', '2020-11-30 09:11:31', '2020-11-30 14:34:31', 0, '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `ngo_roles`;
CREATE TABLE IF NOT EXISTS `ngo_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `superngo_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

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
(16, 8, 'Regular', 0),
(17, 9, 'Owner', 0),
(18, 9, 'Regular', 0),
(19, 10, 'Owner', 0),
(20, 10, 'Regular', 0),
(21, 11, 'Owner', 0),
(22, 11, 'Regular', 0),
(23, 12, 'Owner', 0),
(24, 12, 'Regular', 0),
(25, 13, 'Owner', 0),
(26, 13, 'Regular', 0),
(27, 14, 'Owner', 0),
(28, 14, 'Regular', 0),
(29, 15, 'Owner', 0),
(30, 15, 'Regular', 0),
(31, 16, 'Owner', 0),
(32, 16, 'Regular', 0),
(33, 17, 'Owner', 0),
(34, 17, 'Regular', 0),
(35, 18, 'Owner', 0),
(36, 18, 'Regular', 0),
(37, 19, 'Owner', 0),
(38, 19, 'Regular', 0),
(39, 20, 'Owner', 0),
(40, 20, 'Regular', 0),
(41, 21, 'Owner', 0),
(42, 21, 'Regular', 0),
(43, 22, 'Owner', 0),
(44, 22, 'Regular', 0),
(45, 23, 'Owner', 0),
(46, 23, 'Regular', 0),
(47, 24, 'Owner', 0),
(48, 24, 'Regular', 0),
(49, 25, 'Owner', 0),
(50, 25, 'Regular', 0),
(51, 26, 'Owner', 0),
(52, 26, 'Regular', 0),
(53, 27, 'Owner', 0),
(54, 27, 'Regular', 0),
(55, 28, 'Owner', 0),
(56, 28, 'Regular', 0),
(57, 29, 'Owner', 0),
(58, 29, 'Regular', 0),
(59, 30, 'Owner', 0),
(60, 30, 'Regular', 0),
(61, 31, 'Owner', 0),
(62, 31, 'Regular', 0),
(63, 32, 'Owner', 0),
(64, 32, 'Regular', 0),
(65, 33, 'Owner', 0),
(66, 33, 'Regular', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4;

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
(13, 3, 6, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '08:09:17'),
(14, 4, 7, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-11', '08:11:11'),
(15, 4, 7, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-11', '08:11:11'),
(16, 4, 7, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-11', '08:11:11'),
(17, 4, 8, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-11', '08:11:11'),
(18, 5, 9, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-16', '11:11:24'),
(19, 5, 9, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:24'),
(20, 5, 9, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:24'),
(21, 5, 10, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-16', '11:11:24'),
(22, 6, 11, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-17', '03:11:49'),
(23, 6, 11, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '03:11:49'),
(24, 6, 11, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '03:11:49'),
(25, 6, 12, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-17', '03:11:49'),
(26, 7, 13, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-17', '04:11:11'),
(27, 7, 13, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '04:11:11'),
(28, 7, 13, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '04:11:11'),
(29, 7, 14, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-17', '04:11:11'),
(30, 8, 15, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-17', '12:11:57'),
(31, 8, 15, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '12:11:57'),
(32, 8, 15, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '12:11:57'),
(33, 8, 16, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-17', '12:11:57'),
(34, 9, 17, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-18', '03:11:31'),
(35, 9, 17, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-18', '03:11:31'),
(36, 9, 17, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-18', '03:11:31'),
(37, 9, 18, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-18', '03:11:31'),
(38, 10, 19, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-19', '03:11:50'),
(39, 10, 19, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '03:11:50'),
(40, 10, 19, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '03:11:50'),
(41, 10, 20, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-19', '03:11:50'),
(42, 11, 21, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-19', '06:11:22'),
(43, 11, 21, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '06:11:22'),
(44, 11, 21, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '06:11:22'),
(45, 11, 22, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-19', '06:11:22'),
(46, 12, 23, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-19', '13:11:03'),
(47, 12, 23, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '13:11:03'),
(48, 12, 23, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '13:11:03'),
(49, 12, 24, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-19', '13:11:03'),
(50, 13, 25, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-20', '03:11:04'),
(51, 13, 25, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-20', '03:11:04'),
(52, 13, 25, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-20', '03:11:04'),
(53, 13, 26, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-20', '03:11:04'),
(54, 14, 27, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-25', '03:11:54'),
(55, 14, 27, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '03:11:54'),
(56, 14, 27, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '03:11:54'),
(57, 14, 28, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-25', '03:11:54'),
(58, 15, 29, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-25', '09:11:54'),
(59, 15, 29, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '09:11:54'),
(60, 15, 29, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '09:11:54'),
(61, 15, 30, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-25', '09:11:54'),
(62, 16, 31, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-26', '03:11:19'),
(63, 16, 31, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '03:11:19'),
(64, 16, 31, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '03:11:19'),
(65, 16, 32, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-26', '03:11:19'),
(66, 17, 33, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-26', '13:11:34'),
(67, 17, 33, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '13:11:34'),
(68, 17, 33, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '13:11:34'),
(69, 17, 34, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-26', '13:11:34'),
(70, 18, 35, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-27', '03:11:35'),
(71, 18, 35, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-27', '03:11:35'),
(72, 18, 35, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-27', '03:11:35'),
(73, 18, 36, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-27', '03:11:35'),
(74, 19, 37, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '03:11:31'),
(75, 19, 37, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '03:11:31'),
(76, 19, 37, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '03:11:31'),
(77, 19, 38, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '03:11:31'),
(78, 20, 39, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '04:11:51'),
(79, 20, 39, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '04:11:51'),
(80, 20, 39, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '04:11:51'),
(81, 20, 40, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '04:11:51'),
(82, 21, 41, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '09:11:52'),
(83, 21, 41, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:52'),
(84, 21, 41, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:52'),
(85, 21, 42, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '09:11:52'),
(86, 22, 43, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '10:11:22'),
(87, 22, 43, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:22'),
(88, 22, 43, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:22'),
(89, 22, 44, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '10:11:22'),
(90, 23, 45, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '10:11:28'),
(91, 23, 45, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:28'),
(92, 23, 45, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:28'),
(93, 23, 46, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '10:11:28'),
(94, 24, 47, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '15:11:47'),
(95, 24, 47, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '15:11:47'),
(96, 24, 47, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '15:11:47'),
(97, 24, 48, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-28', '15:11:47'),
(98, 25, 49, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '03:11:33'),
(99, 25, 49, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '03:11:33'),
(100, 25, 49, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '03:11:33'),
(101, 25, 50, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-30', '03:11:33'),
(102, 26, 51, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '11:11:59'),
(103, 26, 51, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:59'),
(104, 26, 51, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:59'),
(105, 26, 52, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-30', '11:11:59'),
(106, 27, 53, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '11:11:49'),
(107, 27, 53, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:49'),
(108, 27, 53, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:49'),
(109, 27, 54, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-11-30', '11:11:49'),
(110, 28, 55, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-01', '03:12:59'),
(111, 28, 55, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '03:12:59'),
(112, 28, 55, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '03:12:59'),
(113, 28, 56, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-01', '03:12:59'),
(114, 29, 57, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-01', '08:12:21'),
(115, 29, 57, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '08:12:21'),
(116, 29, 57, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '08:12:21'),
(117, 29, 58, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-01', '08:12:21'),
(118, 30, 59, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-02', '03:12:03'),
(119, 30, 59, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '03:12:03'),
(120, 30, 59, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '03:12:03'),
(121, 30, 60, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-02', '03:12:03'),
(122, 31, 61, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-02', '05:12:40'),
(123, 31, 61, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:40'),
(124, 31, 61, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:40'),
(125, 31, 62, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-02', '05:12:40'),
(126, 32, 63, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-02', '05:12:18'),
(127, 32, 63, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:18'),
(128, 32, 63, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:18'),
(129, 32, 64, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-02', '05:12:18'),
(130, 33, 65, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-03', '03:12:51'),
(131, 33, 65, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-03', '03:12:51'),
(132, 33, 65, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-03', '03:12:51'),
(133, 33, 66, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-03', '03:12:51');

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
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

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
(24, 1, 1, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-06-19', '22:32:14'),
(25, 4, 5, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-11', '08:11:11'),
(26, 4, 5, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-11', '08:11:11'),
(27, 4, 5, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-11', '08:11:11'),
(28, 5, 6, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-16', '11:11:24'),
(29, 5, 6, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:24'),
(30, 5, 6, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-16', '11:11:24'),
(31, 6, 7, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-17', '03:11:49'),
(32, 6, 7, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '03:11:49'),
(33, 6, 7, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '03:11:49'),
(34, 7, 8, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-17', '04:11:11'),
(35, 7, 8, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '04:11:11'),
(36, 7, 8, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '04:11:11'),
(37, 8, 9, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-17', '12:11:57'),
(38, 8, 9, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '12:11:57'),
(39, 8, 9, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-17', '12:11:57'),
(40, 9, 10, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-18', '03:11:31'),
(41, 9, 10, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-18', '03:11:31'),
(42, 9, 10, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-18', '03:11:31'),
(43, 10, 11, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-19', '03:11:50'),
(44, 10, 11, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '03:11:50'),
(45, 10, 11, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '03:11:50'),
(46, 11, 12, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-19', '06:11:22'),
(47, 11, 12, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '06:11:22'),
(48, 11, 12, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '06:11:22'),
(49, 12, 13, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-19', '13:11:03'),
(50, 12, 13, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '13:11:03'),
(51, 12, 13, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-19', '13:11:03'),
(52, 13, 14, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-20', '03:11:04'),
(53, 13, 14, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-20', '03:11:04'),
(54, 13, 14, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-20', '03:11:04'),
(55, 14, 15, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-25', '03:11:54'),
(56, 14, 15, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '03:11:54'),
(57, 14, 15, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '03:11:54'),
(58, 15, 16, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-25', '09:11:54'),
(59, 15, 16, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '09:11:54'),
(60, 15, 16, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-25', '09:11:54'),
(61, 16, 17, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-26', '03:11:19'),
(62, 16, 17, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '03:11:19'),
(63, 16, 17, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '03:11:19'),
(64, 17, 18, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-26', '13:11:34'),
(65, 17, 18, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '13:11:34'),
(66, 17, 18, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-26', '13:11:34'),
(67, 18, 19, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-27', '03:11:35'),
(68, 18, 19, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-27', '03:11:35'),
(69, 18, 19, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-27', '03:11:35'),
(70, 19, 20, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '03:11:31'),
(71, 19, 20, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '03:11:31'),
(72, 19, 20, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '03:11:31'),
(73, 20, 21, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '04:11:51'),
(74, 20, 21, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '04:11:51'),
(75, 20, 21, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '04:11:51'),
(76, 21, 22, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '09:11:52'),
(77, 21, 22, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:52'),
(78, 21, 22, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '09:11:52'),
(79, 22, 23, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '10:11:22'),
(80, 22, 23, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:22'),
(81, 22, 23, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:22'),
(82, 23, 24, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '10:11:28'),
(83, 23, 24, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:28'),
(84, 23, 24, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '10:11:28'),
(85, 24, 25, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-28', '15:11:47'),
(86, 24, 25, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '15:11:47'),
(87, 24, 25, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-28', '15:11:47'),
(88, 25, 26, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '03:11:33'),
(89, 25, 26, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '03:11:33'),
(90, 25, 26, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '03:11:33'),
(91, 26, 27, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '11:11:59'),
(92, 26, 27, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:59'),
(93, 26, 27, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:59'),
(94, 27, 28, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-11-30', '11:11:49'),
(95, 27, 28, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:49'),
(96, 27, 28, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-30', '11:11:49'),
(97, 28, 29, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-01', '03:12:59'),
(98, 28, 29, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '03:12:59'),
(99, 28, 29, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '03:12:59'),
(100, 29, 30, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-01', '08:12:21'),
(101, 29, 30, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '08:12:21'),
(102, 29, 30, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-01', '08:12:21'),
(103, 30, 31, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-02', '03:12:03'),
(104, 30, 31, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '03:12:03'),
(105, 30, 31, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '03:12:03'),
(106, 31, 32, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-02', '05:12:40'),
(107, 31, 32, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:40'),
(108, 31, 32, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:40'),
(109, 32, 33, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-02', '05:12:18'),
(110, 32, 33, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:18'),
(111, 32, 33, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-02', '05:12:18'),
(112, 33, 34, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-12-03', '03:12:51'),
(113, 33, 34, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-03', '03:12:51'),
(114, 33, 34, 4, 4, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-12-03', '03:12:51');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_staff_account`
--

INSERT INTO `ngo_staff_account` (`ngo_staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_mobile`, `staff_status`, `staff_role_id`, `staff_role`, `superngo_id`, `ngo_id`, `parent_id`, `first_login`, `last_login`, `password_creation_time`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'Dileep', 'singh', 'user@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 1, 'Owner', 1, 1, 0, '2020-09-22 11:09:21', '2020-11-11 08:11:28', '2020-09-22 11:09:55', '2020-09-22 11:09:55', '2020-09-22 15:25:55', '324d8bb1e04c4f56de2295104a780a796c4a0729', 0),
(2, 'staff', 'member', 'staff@gmail.com', '65dbeff300422f5b1e87e112a9fc3e351a23273b', 'default_profile.jpg', NULL, 'Active', 1, 'Owner', 1, 0, 1, NULL, NULL, NULL, '2020-09-22 12:09:37', '2020-09-22 15:37:37', NULL, 0),
(3, 'user', 'singh', 'test@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 3, 'Owner', 2, 2, 0, '2020-09-24 13:09:16', '2020-12-01 06:12:55', '2020-09-24 13:09:04', '2020-09-24 13:09:04', '2020-09-24 16:56:04', '080df7c5a70591065420adcb4a3397a0293114ec', 0),
(4, 'user', 'singh', 'test2@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 5, 'Owner', 3, 0, 0, NULL, NULL, '2020-09-27 08:09:15', '2020-09-27 08:09:15', '2020-09-27 11:46:15', 'acd757e1bd9ccba6d404cd5a2dd8cef0be472d7c', 0),
(5, 'test', 'test', 'test23@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 7, 'Owner', 4, 0, 0, NULL, NULL, '2020-11-11 08:11:11', '2020-11-11 08:11:11', '2020-11-11 13:54:11', '64b41761d18712aef129bafbfeb684f589927708', 0),
(6, 'ss', 'nayak', 'ngotest@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 9, 'Owner', 5, 0, 0, NULL, NULL, '2020-11-16 11:11:24', '2020-11-16 11:11:24', '2020-11-16 16:55:24', '3dbc5cdb8fa421c88fc1247996e66af89a412c3e', 0),
(7, 'srabani', 'nayak', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 11, 'Owner', 6, 0, 0, NULL, NULL, '2020-11-17 03:11:49', '2020-11-17 03:11:49', '2020-11-17 09:08:49', 'eeea565ed02a32e3400b76de960c266421bc4ea8', 0),
(8, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 13, 'Owner', 7, 0, 0, NULL, NULL, '2020-11-17 04:11:11', '2020-11-17 04:11:11', '2020-11-17 09:59:11', '2dd63670830fddcd1f24f275b374cd04d0d24718', 0),
(9, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 15, 'Owner', 8, 0, 0, NULL, NULL, '2020-11-17 12:11:57', '2020-11-17 12:11:57', '2020-11-17 18:26:57', '2756a3e2e9e3a18aeec870f413d5a2e388ec1a18', 0),
(10, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 17, 'Owner', 9, 0, 0, NULL, NULL, '2020-11-18 03:11:31', '2020-11-18 03:11:31', '2020-11-18 09:11:31', '8fc05e0fcf4816ab22743e7b67d4b47fc7280be4', 0),
(11, 'Chatur', 'Prajapat', 'abs@gmail.comretreter', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 19, 'Owner', 10, 0, 0, NULL, NULL, '2020-11-19 03:11:50', '2020-11-19 03:11:50', '2020-11-19 09:12:50', 'd3809cb9807c47a98636a0c61de773e8c237cdc2', 0),
(12, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 21, 'Owner', 11, 0, 0, NULL, NULL, '2020-11-19 06:11:22', '2020-11-19 06:11:22', '2020-11-19 11:37:22', 'ab0cea6c6ba7f029c4fd927f9a5577ea1b7f3b3c', 0),
(13, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 23, 'Owner', 12, 0, 0, NULL, NULL, '2020-11-19 13:11:03', '2020-11-19 13:11:03', '2020-11-19 18:39:03', '72283939ac8e10ff64c9f9c04b6437bcc3244bdc', 0),
(14, 'Chatur', 'Prajapat', 'abs@gmail.comretreter', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 25, 'Owner', 13, 0, 0, NULL, NULL, '2020-11-20 03:11:04', '2020-11-20 03:11:04', '2020-11-20 09:07:04', 'c4878edf3f63f0a7aea08fb341af6e9feb2a96e7', 0),
(15, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 27, 'Owner', 14, 0, 0, NULL, NULL, '2020-11-25 03:11:54', '2020-11-25 03:11:54', '2020-11-25 09:25:54', '8bf39a2cd8d3c8aa925897d68d2d6719ffbb567e', 0),
(16, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 29, 'Owner', 15, 0, 0, NULL, NULL, '2020-11-25 09:11:54', '2020-11-25 09:11:54', '2020-11-25 14:44:54', '3de406eec9920ce3e4fdcb537a3bd56e1cdcc606', 0),
(17, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 31, 'Owner', 16, 0, 0, NULL, NULL, '2020-11-26 03:11:19', '2020-11-26 03:11:19', '2020-11-26 09:10:19', '2e4b311397172b0e4f9c2fe24725b5eeddc0fe27', 0),
(18, 'ok', 'oko', 'ko@asdok.asd', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 33, 'Owner', 17, 0, 0, NULL, NULL, '2020-11-26 13:11:34', '2020-11-26 13:11:34', '2020-11-26 18:48:34', 'd50b49a7c92f49864b6ac1829a6928f696ccbb67', 0),
(19, 'srabani', 'satadala', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 35, 'Owner', 18, 0, 0, NULL, NULL, '2020-11-27 03:11:35', '2020-11-27 03:11:35', '2020-11-27 09:12:35', '461f2a379125446c68bb5e4e9645a28dc66e5f36', 0),
(20, 'srabani', 'satadala', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 37, 'Owner', 19, 0, 0, NULL, NULL, '2020-11-28 03:11:31', '2020-11-28 03:11:31', '2020-11-28 09:19:31', '167b012fe673bf7d47c96447c2490e6ece665e34', 0),
(21, 'srabani', 'satadala', 'srabanisnayak94@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 39, 'Owner', 20, 0, 0, NULL, NULL, '2020-11-28 04:11:51', '2020-11-28 04:11:51', '2020-11-28 09:55:51', 'a637f9b63759ff7cbb68a3ff016332821c3272a9', 0),
(22, 'testngo', 'testngo', 'testngo@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 41, 'Owner', 21, 0, 0, NULL, NULL, '2020-11-28 09:11:52', '2020-11-28 09:11:52', '2020-11-28 15:14:52', '8e4a4308e306b6b2ac53fae440dcfe6b42073b64', 0),
(23, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 43, 'Owner', 22, 0, 0, NULL, NULL, '2020-11-28 10:11:22', '2020-11-28 10:11:22', '2020-11-28 15:39:22', 'c6b34500e76085911c69e1b1de465cd17a45bdc4', 0),
(24, 'testngo1', 'testngo1', 'testngo1@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 45, 'Owner', 23, 0, 0, NULL, NULL, '2020-11-28 10:11:28', '2020-11-28 10:11:28', '2020-11-28 15:41:28', '6870233e2b5b662e6ae844d091bca4b3b5685c78', 0),
(25, 'srabani', 'satadala', 'ssn@gmail.com', '396ff1904056762f469e2c816359e9adfd24827f', 'default_profile.jpg', NULL, 'Active', 47, 'Owner', 24, 0, 0, NULL, NULL, '2020-11-28 15:11:47', '2020-11-28 15:11:47', '2020-11-28 20:38:47', '7241fd90db959ccc4991f4d710b6b08b0257a9e3', 0),
(26, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 49, 'Owner', 25, 0, 0, NULL, NULL, '2020-11-30 03:11:33', '2020-11-30 03:11:33', '2020-11-30 09:18:33', 'a2125b1d6433885ce3d6cbbafbb8f4fbda4d5408', 0),
(27, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 51, 'Owner', 26, 0, 0, NULL, NULL, '2020-11-30 11:11:59', '2020-11-30 11:11:59', '2020-11-30 17:06:59', '1656f5f26b7093f027715b5a8afeeae0509af886', 0),
(28, 'srabani', 'satadala', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 53, 'Owner', 27, 0, 0, NULL, NULL, '2020-11-30 11:11:49', '2020-11-30 11:11:49', '2020-11-30 17:16:49', 'e8a35e6328700de35b8e2d4172c4bfc40e26a750', 0),
(29, 'srabani', 'satadala', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 55, 'Owner', 28, 0, 0, NULL, NULL, '2020-12-01 03:12:59', '2020-12-01 03:12:59', '2020-12-01 09:06:59', '242f539f7e0007b0b20dadff117e71d90cf7e82e', 0),
(30, 'srabani', 'satadala', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 57, 'Owner', 29, 0, 0, NULL, NULL, '2020-12-01 08:12:21', '2020-12-01 08:12:21', '2020-12-01 14:06:21', '92a41b4553cf30f61cc02cf4b401ce620a226dbb', 0),
(31, 'srabani', 'satadala', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 59, 'Owner', 30, 0, 0, NULL, NULL, '2020-12-02 03:12:03', '2020-12-02 03:12:03', '2020-12-02 09:08:03', '637584ead6ff1530084c4a5d7639023f1cf4dcd4', 0),
(32, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 61, 'Owner', 31, 0, 0, NULL, NULL, '2020-12-02 05:12:40', '2020-12-02 05:12:40', '2020-12-02 11:04:40', '8dfc83304a3cc3b819767329cde4a34c2fa856e5', 0),
(33, 'Chatur', 'Prajapat', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 63, 'Owner', 32, 0, 0, NULL, NULL, '2020-12-02 05:12:18', '2020-12-02 05:12:18', '2020-12-02 11:09:18', '4d7b3c21ca8ac586921af0a216cd1ce5dc760101', 0),
(34, 'srabani', 'satadala', 'abs@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 65, 'Owner', 33, 0, 0, NULL, NULL, '2020-12-03 03:12:51', '2020-12-03 03:12:51', '2020-12-03 09:05:51', 'cfc97bb9d2883b86bfcb4aec7e6343c708c39117', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`org_id`, `org_name`, `org_logo`, `org_status`, `added_by`, `created_date`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(2, 'Organisation 2', '1598446701.png', 'Active', 1, '2020-08-26', '14:08:32', '2020-08-26 18:28:32', 0),
(3, 'Organisation', '1599034838.png', 'Active', 1, '2020-09-02', '10:09:10', '2020-09-02 13:51:10', 0),
(4, 'Dileep singh', '1599377445.png', 'Active', 1, '2020-09-06', '09:09:48', '2020-09-06 13:00:48', 0),
(5, 'Dileep singh', '1599377445.png', 'Active', 1, '2020-09-06', '09:09:44', '2020-09-06 13:01:44', 1),
(6, 'rekha org', '', 'Active', 1, '2020-09-27', '11:09:46', '2020-09-27 14:42:46', 0),
(7, 'rekha org', '', 'Active', 1, '2020-09-27', '11:09:44', '2020-09-27 14:43:44', 0);

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
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_module`
--

INSERT INTO `organisation_module` (`module_id`, `module_name`, `date`, `time`, `status`) VALUES
(1, 'Manage Users', '2020-09-05', '14:31:30', 'active'),
(2, 'Settings', '2020-06-19', '12:57:47', 'active'),
(3, 'Account', '2020-06-19', '12:57:47', 'active'),
(4, 'Proposals', '2020-06-19', '12:57:47', 'active'),
(5, 'Green Channel Requests', '2020-06-19', '13:26:27', 'active'),
(6, 'Tasks', '2020-06-19', '13:26:27', 'active'),
(7, 'NGO list', '2020-11-27', '00:00:00', 'active');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_staff_access`
--

INSERT INTO `organisation_staff_access` (`index_id`, `org_id`, `staff_id`, `module_id`, `submodule_id`, `add_access`, `edit_access`, `list_access`, `remove_access`, `other_access_1`, `other_access_2`, `other_access_3`, `date`, `time`) VALUES
(81, 2, 1, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:43'),
(66, 2, 3, 6, 6, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:23'),
(80, 2, 1, 6, 6, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:43'),
(65, 2, 3, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:23'),
(7, 5, 5, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2020-09-06', '09:09:44'),
(8, 5, 5, 2, 2, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-06', '09:09:44'),
(9, 5, 5, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-06-19', '22:32:14'),
(79, 2, 1, 5, 5, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-11-09', '11:11:43'),
(11, 6, 6, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-27', '11:09:48'),
(12, 6, 6, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '11:09:48'),
(13, 6, 6, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '11:09:48'),
(14, 7, 7, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-09-27', '11:09:45'),
(15, 7, 7, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-09-27', '11:09:45'),
(16, 7, 7, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-09-27', '11:09:45'),
(78, 2, 1, 4, 4, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:43'),
(77, 2, 1, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2020-11-09', '11:11:43'),
(64, 2, 3, 1, 1, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:23'),
(76, 2, 1, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:43'),
(67, 2, 3, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2020-11-09', '11:11:23'),
(75, 2, 1, 1, 1, 'no', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2020-11-09', '11:11:43');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation_submodule`
--

INSERT INTO `organisation_submodule` (`submodule_id`, `FK_module_id`, `submodule_name`, `link`, `menu_link_show`, `show_link`, `list_link`, `menu_list_link_show`, `show_list`, `show_edit`, `show_remove`, `other_name1`, `other_link1`, `show_link1`, `other_name2`, `other_link2`, `show_link2`, `other_name3`, `other_link3`, `show_link3`, `date`, `time`, `status`) VALUES
(1, 1, 'Users', 'organisation/staff/index', 'no', 'yes', 'organisation/staff/staff_list', 'yes', 'yes', 'no', 'no', 'Edit Password', NULL, 'yes', 'Define Access', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(2, 2, 'Roles', 'organisation/role/index', 'no', 'yes', 'organisation/role/list', 'yes', 'yes', 'no', 'no', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '12:57:47', 'active'),
(3, 3, 'Manage Organisation', 'organisation/donor/index', 'no', 'yes', 'organisation/donor/list', 'yes', 'yes', 'yes', 'yes', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(4, 4, 'Proposals', NULL, 'no', 'no', 'organisation/proposals/index', 'yes', 'yes', 'no', 'no', NULL, NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '13:27:34', 'active'),
(5, 5, 'Green Channel Requests', NULL, 'no', 'no', 'organisation/gc_requests/index', 'yes', 'yes', 'no', 'no', 'Grant', NULL, 'yes', 'Reject', NULL, 'yes', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(6, 6, 'Task Manager', NULL, 'no', 'no', 'organisation/tasks/manage', 'yes', 'yes', 'no', 'no', 'Details', NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active'),
(7, 6, 'My Tasks', NULL, 'no', 'no', 'organisation/tasks/mytasks', 'yes', 'yes', 'no', 'no', 'Detail', NULL, 'no', NULL, NULL, 'no', NULL, NULL, 'no', '2020-06-19', '22:32:14', 'active');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `org_district`;
CREATE TABLE IF NOT EXISTS `org_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_district`
--

INSERT INTO `org_district` (`id`, `org_id`, `state_id`, `district_id`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_ngo_review_status`
--

INSERT INTO `org_ngo_review_status` (`review_status_id`, `org_id`, `ngo_id`, `status`) VALUES
(1, 1, 1, 'approved'),
(44, 2, 1, 'rejected');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_staff_account`
--

INSERT INTO `org_staff_account` (`staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_phone_no`, `staff_status`, `staff_role_id`, `staff_role`, `org_id`, `donor_id`, `parent_id`, `first_login`, `last_login`, `last_password_change`, `created_date`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'test', 'test', 'test@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', '07856958475', 'Active', 0, '', 2, 0, 0, '2020-09-06 13:09:28', '2020-12-01 06:12:21', '2020-09-15 12:09:32', '2020-08-26', '14:08:32', '2020-08-26 18:28:32', '', 0),
(2, 'admin', 'admin', 'org_admin@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', NULL, 'Active', 0, '', 3, 0, 0, NULL, NULL, NULL, '2020-09-02', '10:09:10', '2020-09-02 13:51:10', '', 0),
(3, 'Dileep', 'singh', 'dileep@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', NULL, 'Active', 1, 'Manager', 2, 1, 1, NULL, NULL, NULL, '2020-09-05', '11:09:32', '2020-09-05 14:52:32', '', 0),
(4, 'Dileep', 'singh', 'xyz@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 0, '', 4, 0, 0, NULL, NULL, NULL, '2020-09-06', '09:09:49', '2020-09-06 13:00:49', '', 0),
(5, 'Dileep', 'singh', 'xyz@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 2, 'Admin', 5, 0, 0, NULL, NULL, NULL, '2020-09-06', '09:09:44', '2020-09-06 13:01:44', '', 1),
(6, 'rekha', 'p', 'rekha@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 3, 'Admin', 6, 0, 0, NULL, NULL, NULL, '2020-09-27', '11:09:47', '2020-09-27 14:42:47', '', 0),
(7, 'rekha', 'p', 'rekha@gmail.com', NULL, 'default_profile.jpg', NULL, 'Active', 4, 'Admin', 7, 0, 0, NULL, NULL, NULL, '2020-09-27', '11:09:44', '2020-09-27 14:43:44', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_tasks`
--

DROP TABLE IF EXISTS `org_tasks`;
CREATE TABLE IF NOT EXISTS `org_tasks` (
  `org_task_id` int(10) NOT NULL AUTO_INCREMENT,
  `org_task_list_id` int(10) NOT NULL,
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
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`org_task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_tasks`
--

INSERT INTO `org_tasks` (`org_task_id`, `org_task_list_id`, `org_task_label`, `view_file_name`, `org_id`, `org_staff_id`, `superngo_id`, `prop_id`, `created_date`, `created_time`, `status`, `due_date`, `comments`, `project_id`) VALUES
(14, 1, 'NGO Review', 'organisation/pages/task/task_ngo_review', 2, 3, 1, 29, '2020-11-04', '07:03:28', 'Complete', '2020-11-05', 'fss', NULL),
(13, 1, 'NGO Review', '', 2, 3, 1, 29, '2020-11-04', '07:02:57', 'New', '2020-11-05', NULL, NULL),
(12, 3, 'Initial Review Proposal', 'organisation/pages/task/task_ngo_review', 2, 1, 1, 30, '2020-11-04', '07:02:33', 'In progress', '2020-11-20', 'dwdwdwxwsxhuhubhtb', NULL),
(42, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 3, 1, 29, '2020-11-13', '11:32:19', 'New', NULL, NULL, NULL),
(27, 1, 'NGO Decision', '', 2, 0, 1, 29, '2020-11-13', '06:10:12', 'New', NULL, NULL, NULL),
(28, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 0, 1, 29, '2020-11-13', '06:20:36', 'New', NULL, NULL, NULL),
(29, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 0, 1, 29, '2020-11-13', '06:21:53', 'New', NULL, NULL, NULL),
(35, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 3, 1, 29, '2020-11-13', '06:37:24', 'New', NULL, NULL, NULL),
(33, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 3, 1, 29, '2020-11-13', '06:26:27', 'New', NULL, NULL, NULL),
(34, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 3, 1, 29, '2020-11-13', '06:26:27', 'New', NULL, NULL, NULL),
(36, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 3, 1, 29, '2020-11-13', '06:38:02', 'Complete', NULL, '', NULL),
(37, 3, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-13', '06:39:13', 'Complete', NULL, '', NULL),
(38, 3, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-13', '07:02:28', 'Complete', NULL, '', NULL),
(39, 3, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-13', '07:03:39', 'Complete', NULL, '', NULL),
(40, 3, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 0, 1, 30, '2020-11-13', '11:29:41', 'New', NULL, NULL, NULL),
(41, 3, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 0, 1, 30, '2020-11-13', '11:30:20', 'New', NULL, NULL, NULL),
(43, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 3, 1, 29, '2020-11-13', '11:33:14', 'New', NULL, NULL, NULL),
(44, 1, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 2, 3, 1, 29, '2020-11-13', '11:33:35', 'New', NULL, NULL, NULL),
(45, 3, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-13', '11:51:26', 'Complete', NULL, '', NULL),
(46, 3, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-13', '11:51:58', 'New', NULL, NULL, NULL),
(47, 4, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-13', '11:52:32', 'Complete', NULL, '', NULL),
(48, 5, 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 2, 1, 1, 30, '2020-11-13', '11:52:43', 'New', NULL, NULL, NULL),
(49, 4, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-24', '11:44:36', 'new', NULL, NULL, NULL),
(50, 4, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-24', '11:45:56', 'new', NULL, NULL, NULL),
(51, 4, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review', 2, 1, 1, 30, '2020-11-24', '11:52:55', 'new', NULL, NULL, NULL);

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
  `view_file_name` varchar(200) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_task_list`
--

INSERT INTO `org_task_list` (`task_id`, `org_id`, `task_type`, `task_position`, `task_label`, `view_file_name`) VALUES
(1, 2, 'prp', 3, 'Initial Review Proposal', 'organisation/pages/task/proposal_review'),
(2, 2, 'prp', 4, 'Final Review Proposal', 'organisation/pages/task/proposal_final_review'),
(3, 2, 'pmp', 5, 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation'),
(4, 2, 'pmp', 6, 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment'),
(5, 2, 'pmp', 7, 'Cycle Completion', 'organisation/pages/task/project_cycle_completion'),
(6, 2, 'nrp', 1, 'NGO Review', 'organisation/pages/task/task_ngo_review'),
(7, 2, 'nrp', 2, 'NGO Decision', 'organisation/pages/task/task_ngo_decission');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `prop_id` int(30) NOT NULL AUTO_INCREMENT,
  `superngo_id` int(30) NOT NULL,
  `ngo_id` int(50) NOT NULL,
  `organisation_id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created_time` datetime(6) NOT NULL,
  `updated_datetime` datetime(6) DEFAULT NULL,
  `project_status` varchar(30) DEFAULT NULL,
  `is_deleted` int(30) NOT NULL,
  `generated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`prop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
CREATE TABLE IF NOT EXISTS `proposal` (
  `prop_id` int(11) NOT NULL AUTO_INCREMENT,
  `superngo_id` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL,
  `ngo_staff_id` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gc_requested` enum('yes','no') DEFAULT 'no',
  `gc_requested_date` datetime DEFAULT NULL,
  `gc_responded` enum('yes','no') DEFAULT 'no',
  `gc_responded_date` datetime DEFAULT NULL,
  `gc_granted` enum('yes','no') DEFAULT 'no',
  `gc_granted_date` datetime DEFAULT NULL,
  `gc_responded_by` int(11) NOT NULL,
  `submission_time` datetime DEFAULT NULL,
  `proposal_status` varchar(50) DEFAULT NULL,
  `is_submit` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `is_proposal_recommended` varchar(50) DEFAULT NULL,
  `is_proposal_recommended_bu_org_staff_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`prop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`prop_id`, `superngo_id`, `ngo_id`, `ngo_staff_id`, `organisation_id`, `title`, `code`, `created_time`, `update_datetime`, `gc_requested`, `gc_requested_date`, `gc_responded`, `gc_responded_date`, `gc_granted`, `gc_granted_date`, `gc_responded_by`, `submission_time`, `proposal_status`, `is_submit`, `is_deleted`, `is_proposal_recommended`, `is_proposal_recommended_bu_org_staff_id`) VALUES
(1, 1, 1, 1, 2, 'test', '123', '2020-10-06 13:10:23', '2020-10-28 17:26:35', 'yes', NULL, 'yes', '2020-10-12 15:10:40', 'yes', '2020-10-12 15:10:40', 1, '2020-10-12 12:10:30', 'submitted', 1, 0, NULL, NULL),
(2, 1, 0, 1, 2, '', '', '2020-10-07 14:10:57', '2020-10-07 18:19:57', 'yes', '2020-10-12 11:10:20', 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(3, 1, 11, 1, 2, '', '', '2020-10-07 15:10:11', '2020-10-07 18:34:11', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 1, NULL, NULL),
(4, 1, 11, 1, 2, 'test Proposel', '1234', '2020-10-07 15:10:48', '2020-10-07 18:38:48', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(5, 1, 1, 1, 2, 'project_test', '602536', '2020-10-07 15:10:54', '2020-10-07 18:40:54', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(6, 1, 0, 1, 2, 'test2', '1235', '2020-10-12 07:10:28', '2020-10-12 11:07:28', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(7, 1, 0, 1, 0, '', '', '2020-10-12 09:10:38', '2020-10-12 13:03:38', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(8, 1, 0, 1, 0, '', '', '2020-10-12 09:10:27', '2020-10-12 13:05:27', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(9, 1, 0, 1, 0, '', '', '2020-10-12 09:10:40', '2020-10-12 13:06:40', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(10, 1, 1, 1, 2, '', '', '2020-10-14 09:10:33', '2020-10-14 13:12:33', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(11, 1, 0, 1, 2, 'test2', '6025', '2020-10-14 09:10:47', '2020-10-14 13:17:47', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(12, 1, 0, 1, 2, '', '', '2020-10-14 11:10:27', '2020-10-14 15:14:27', 'yes', '2020-10-14 12:10:22', 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(13, 1, 0, 1, 3, 'test2', '123456', '2020-10-14 12:10:41', '2020-10-14 15:52:41', 'yes', '2020-10-14 12:10:15', 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(14, 1, 1, 1, 3, 'test2', '564611', '2020-10-14 12:10:56', '2020-10-14 16:06:56', 'no', NULL, 'no', NULL, 'no', NULL, 0, '2020-10-14 12:10:29', 'submitted', 1, 0, NULL, NULL),
(15, 1, 0, 1, 2, 'test2', '56461', '2020-10-14 12:10:52', '2020-10-14 16:07:52', 'yes', '2020-10-14 12:10:07', 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(16, 1, 1, 1, 3, 'test2', '1234asda', '2020-10-14 12:10:40', '2020-10-14 16:08:40', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(17, 1, 1, 1, 2, 'test2', '', '2020-10-14 12:10:47', '2020-10-14 16:12:47', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(18, 1, 0, 1, 0, '', '', '2020-11-02 03:11:37', '2020-11-02 09:00:37', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(19, 1, 11, 1, 2, 'test', '', '2020-11-02 05:11:24', '2020-11-02 11:25:24', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(20, 1, 11, 1, 2, 'test', '', '2020-11-02 05:11:39', '2020-11-02 11:25:39', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(21, 1, 1, 1, 2, 'test', '', '2020-11-02 06:11:10', '2020-11-02 11:31:10', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(22, 1, 1, 1, 2, 'test', '', '2020-11-02 06:11:31', '2020-11-02 11:33:31', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(23, 1, 1, 1, 2, 'testwe', '', '2020-11-02 06:11:49', '2020-11-02 11:33:49', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(24, 1, 1, 1, 2, 'test', '', '2020-11-02 06:11:31', '2020-11-02 11:35:31', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(25, 1, 1, 1, 2, 'test', '', '2020-11-04 05:11:46', '2020-11-04 10:59:46', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL),
(26, 1, 1, 1, 2, 'test', '', '2020-11-04 05:11:37', '2020-11-04 11:12:37', 'no', NULL, 'no', NULL, 'no', NULL, 0, '2020-11-04 05:11:47', 'submitted', 1, 0, NULL, NULL),
(27, 1, 1, 1, 2, 'test', '', '2020-11-04 05:11:52', '2020-11-04 11:29:52', 'no', NULL, 'no', NULL, 'no', NULL, 0, '2020-11-04 06:11:02', 'submitted', 1, 0, NULL, NULL),
(28, 1, 1, 1, 2, 'test11 1', '', '2020-11-04 06:11:28', '2020-11-04 12:26:28', 'no', NULL, 'no', NULL, 'no', NULL, 0, '2020-11-04 06:11:06', 'submitted', 1, 0, NULL, NULL),
(29, 1, 1, 1, 2, 'test3', '', '2020-11-04 06:11:38', '2020-11-04 12:27:38', 'no', NULL, 'no', NULL, 'no', NULL, 0, '2020-11-04 07:11:28', 'submitted', 1, 0, NULL, NULL),
(30, 1, 11, 1, 2, 'new ', '', '2020-11-09 08:11:09', '2020-11-09 14:08:09', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, 'rejected', 0, 0, NULL, NULL),
(31, 1, 11, 1, 2, '45', '', '2020-11-09 08:11:53', '2020-11-09 14:08:53', 'no', NULL, 'no', NULL, 'no', NULL, 0, '2020-11-09 08:11:01', 'submitted', 1, 0, NULL, NULL),
(32, 1, 1, 1, 2, 'tgydrfgdf hgjghj', '', '2020-11-11 08:11:47', '2020-11-11 13:43:47', 'no', NULL, 'no', NULL, 'no', NULL, 0, NULL, NULL, 0, 0, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `colour`) VALUES
(1, 'Submitted', 'blue'),
(2, 'New', 'Blue'),
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
(14, 'Needs Review', 'Red');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superngo`
--

INSERT INTO `superngo` (`id`, `brand_name`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 'Lennox', '2020-09-22 11:09:54', '2020-09-22 15:25:54', 0),
(2, 'lennox Soft', '2020-09-24 13:09:04', '2020-09-24 16:56:04', 0),
(3, 'user', '2020-09-27 08:09:14', '2020-09-27 11:46:14', 0),
(4, 'test', '2020-11-11 08:11:11', '2020-11-11 13:54:11', 0),
(5, 'ss', '2020-11-16 11:11:24', '2020-11-16 16:55:24', 0),
(6, 'ss', '2020-11-17 03:11:49', '2020-11-17 09:08:49', 0),
(7, 'temp', '2020-11-17 04:11:11', '2020-11-17 09:59:11', 0),
(8, 'Chatur Prajapat', '2020-11-17 12:11:57', '2020-11-17 18:26:57', 0),
(9, 'Chatur Prajapat', '2020-11-18 03:11:31', '2020-11-18 09:11:31', 0),
(10, 'Chatur Prajapat', '2020-11-19 03:11:50', '2020-11-19 09:12:50', 0),
(11, 'Chatur Prajapat', '2020-11-19 06:11:22', '2020-11-19 11:37:22', 0),
(12, 'Chatur Prajapat', '2020-11-19 13:11:03', '2020-11-19 18:39:03', 0),
(13, 'Chatur Prajapat', '2020-11-20 03:11:04', '2020-11-20 09:07:04', 0),
(14, 'Chatur Prajapat', '2020-11-25 03:11:54', '2020-11-25 09:25:54', 0),
(15, 'Chatur Prajapat', '2020-11-25 09:11:54', '2020-11-25 14:44:54', 0),
(16, 'Chatur Prajapat', '2020-11-26 03:11:19', '2020-11-26 09:10:19', 0),
(17, 'ok', '2020-11-26 13:11:34', '2020-11-26 18:48:34', 0),
(18, 'srabani satadala', '2020-11-27 03:11:35', '2020-11-27 09:12:35', 0),
(19, 'srabani satadala', '2020-11-28 03:11:31', '2020-11-28 09:19:31', 0),
(20, 'ssn', '2020-11-28 04:11:51', '2020-11-28 09:55:51', 0),
(21, 'testngo', '2020-11-28 09:11:52', '2020-11-28 15:14:52', 0),
(22, 'Chatur Prajapat', '2020-11-28 10:11:22', '2020-11-28 15:39:22', 0),
(23, 'testngo1', '2020-11-28 10:11:28', '2020-11-28 15:41:28', 0),
(24, 'srabani satadala nayak', '2020-11-28 15:11:47', '2020-11-28 20:38:47', 0),
(25, 'Chatur Prajapat', '2020-11-30 03:11:33', '2020-11-30 09:18:33', 0),
(26, 'ssn', '2020-11-30 11:11:59', '2020-11-30 17:06:59', 0),
(27, 'srabani satadala nayak', '2020-11-30 11:11:49', '2020-11-30 17:16:49', 0),
(28, 'srabani satadala nayak', '2020-12-01 03:12:59', '2020-12-01 09:06:59', 0),
(29, 'srabani satadala nayak', '2020-12-01 08:12:21', '2020-12-01 14:06:21', 0),
(30, 'srabani satadala nayak', '2020-12-02 03:12:03', '2020-12-02 09:08:03', 0),
(31, 'Chatur Prajapat', '2020-12-02 05:12:40', '2020-12-02 11:04:40', 0),
(32, 'Chatur Prajapat', '2020-12-02 05:12:18', '2020-12-02 11:09:18', 0),
(33, 'srabani satadala nayak', '2020-12-03 03:12:51', '2020-12-03 09:05:51', 0);

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
