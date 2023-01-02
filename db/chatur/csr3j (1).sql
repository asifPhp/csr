-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2021 at 04:14 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csr3j`
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
-- Table structure for table `admin_city`
--

CREATE TABLE `admin_city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `is_deleted` int(5) NOT NULL DEFAULT '0'
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
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `org_id`, `legal_name`, `brand_name`, `code`, `pan_number`, `redistered_address`, `city`, `state`, `pincode`, `pan_image`, `auth_sign`, `logo_image`, `donor_image`, `art_image`, `facebook`, `instagram`, `twitter`, `linkedin`, `created_date`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 1, 'cp', '', 'cp1', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-10-25', '08:10:54', '2020-10-25 08:55:54', 0),
(2, 1, 'Testing', '', 'test1', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-11-19', '11:11:09', '2020-11-19 11:28:09', 0),
(3, 2, 'Kriti Donor 1', '', 'KBD1', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-12-15', '06:12:45', '2020-12-15 06:47:45', 0),
(4, 1, 'New Donor Dec', '', 'DDec20', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2020-12-22', '11:21:59', '2020-12-22 11:21:59', 0),
(5, 1, 'Donor 1 Legal Name', '', 'DJan11', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2021-01-11', '22:26:15', '2021-01-11 16:56:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `financial_budget`
--

CREATE TABLE `financial_budget` (
  `id` int(11) NOT NULL,
  `financial_id` int(11) DEFAULT NULL,
  `donor_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_budget`
--

INSERT INTO `financial_budget` (`id`, `financial_id`, `donor_id`, `org_id`, `amount`, `created_date`) VALUES
(1, 2, 1, 1, '3434', '2021-01-12 16:10:55'),
(2, 2, 1, 1, '434343434343434', '2021-01-12 16:13:33'),
(3, 2, 1, 1, '4343', '2021-01-12 16:34:16'),
(4, 2, 2, 1, '2323', '2021-01-12 16:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

CREATE TABLE `financial_years` (
  `financial_id` int(11) NOT NULL,
  `start_year` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `end_year` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`financial_id`, `start_year`, `name`, `end_year`, `start_date`, `end_date`) VALUES
(1, '2018', '2018-19', 2019, '2018-04-01', '2019-03-31'),
(2, '2019', '2019-20', 2020, '2019-04-01', '2020-03-31'),
(3, '2020', '2020-21', 2021, '2020-04-01', '2021-03-31');

-- --------------------------------------------------------


-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(11) NOT NULL,
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
  `other_policies_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `ngo_id`, `staff_id`, `superngo_id`, `legal_name`, `website`, `created_time`, `update_datetime`, `is_deleted`, `brand_name`, `geo_location`, `geo_location_id`, `city_id`, `city`, `operation_nature`, `category_array`, `resource_managment`, `geographical_reach`, `beneficiary_reach`, `registration_detail`, `registration_number_12a`, `from_date_12a_valid`, `expire_date_12a_valid`, `tax_exemption_percentage`, `registration_number_80g`, `certificate_date_80G`, `registration_80g_valid`, `tax_exemption_type`, `pan_number`, `epf_number`, `professional_tax_number`, `tan_number`, `other_appropriate_certification_input`, `is_12a_certificate`, `is_12a_certificate_cancle`, `is_tax_exemption_80g`, `is_perpetuity_valid`, `is_valid_tax_exemption`, `is_certificate_exist`, `appropriate_certification`, `code`, `upload_proof_tax_exemption`, `upload_proof_tax_exemption_actual`, `upload_proof_12A_reg`, `upload_proof_12A_reg_actual`, `upload_80G_reg`, `upload_80G_reg_actual`, `upload_proof_80G_incometax`, `upload_proof_80G_incometax_actual`, `soft_copy_pancard`, `soft_copy_pancard_actual`, `proof_of_TAN`, `proof_of_TAN_actual`, `epf_for_last_year`, `epf_for_last_year_actual`, `tax_for_last_year`, `tax_for_last_year_actual`, `credibility_alliance_report`, `credibility_alliance_report_actual`, `non_financial_partnerships`, `leadership_network`, `blacklist`, `guilty`, `religious_affiliation_on_radio`, `bajaj_group_involved`, `senior_member_involved`, `previously_recieve_funding`, `received_award`, `received_national_award`, `upload_annual_report_1`, `upload_annual_report_2`, `upload_annual_report_3`, `upload_annual_report_1_actual`, `upload_annual_report_2_actual`, `upload_annual_report_3_actual`, `governing_council`, `is_non_financial_partnerships`, `is_leadership_network`, `is_guilty`, `is_blacklist`, `is_political_affiliation`, `optradio2`, `optradio3`, `optradio4`, `optradio5`, `optradio6`, `optradio7`, `upload_organogram`, `upload_organogram_actual`, `entity_have_governing_board`, `defined_structure_decission_making`, `number_of_employee`, `detail_body_member`, `number_of_employee_through_contractor`, `number_parttime_employees`, `renumeration_leadership`, `governing_body_member_det`, `vehicles_details`, `major_donors`, `budget_details`, `foreign_travel_taken_by_staff`, `renumeration_of_senior_leadership`, `full_time_staff_numbers`, `part_time_staff_numbers`, `gst_number`, `entity_have_gst_num`, `upload_financial_statement1`, `upload_financial_statement2`, `upload_financial_statement3`, `upload_financial_statement1_actual`, `upload_financial_statement2_actual`, `upload_financial_statement3_actual`, `uplpad_ITR_1`, `uplpad_ITR_2`, `uplpad_ITR_3`, `uplpad_ITR_1_actual`, `uplpad_ITR_2_actual`, `uplpad_ITR_3_actual`, `gst_certificate`, `gst_certificate_actual`, `upload_cancelled_cheque`, `upload_cancelled_cheque_actual`, `name_of_organization`, `gst_exemption_letter`, `gst_exemption_letter_actual`, `other_policies`, `optradio_policy`, `optradio_whistleblower_policy`, `optradio_child_protection_policy`, `multiple_img_upload`, `multiple_img_upload2`, `other_policies_name`) VALUES
(6, 0, 3, 2, 'test by cp', '', '2021-01-16 18:12:59', '2021-01-11 16:11:31', 0, '', '', '', '', '', '', '[{\"category_id\":\"1\",\"category_name\":\"Health\",\"value\":\" sfdsfsdfs sfsd\"}]', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, 1, 1, 'Legal Name of Test Entity', 'https://www.cry.org/', '2021-01-11 21:42:17', '2021-01-11 16:12:17', 0, 'Brand Name of Test Entity', 'Maharashtra, Vidarbha', '1,1-1', '1', 'Vidarbha', 'Direct Implementing Agency', '[{\"category_id\":\"1\",\"category_name\":\"Health\",\"value\":\"Some health activity\"}]', 'At least 25% of the organisation has professional qualification AND work experience greater than 10 years', 'Reaches more than 500 villages', 'Reaches more than 1 lakh beneficiaries', '[{\"registration_type\":\"\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', '', 'No', '', 'No', '', '', 'NGO111', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'tete', '', '', '', '', '', '', '', '', '', '', 'No', '', '', '', '', '', 'Yes', '', '', '', '', '', 89, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Test name', '', '', '[\"Travel Policy (including details of incidentals)\"]', '', '', '', '', '', ''),
(8, 0, 1, 1, 'Legal Entity Jan 12', 'https://www.cry.org/', '2021-01-12 10:11:38', '2021-01-12 04:41:38', 0, 'Brand Name Jan 12', '', '', '', '', 'Direct Implementing Agency', '', '', '', '', '[{\"registration_type\":\"Registered Society\",\"registration_date\":\"\",\"registration_street_address\":\"\",\"registration_state\":\"\",\"registration_city\":\"\",\"registration_pin_code\":\"\",\"Registration_Number\":\"\",\"registration_certificate\":\"\",\"registration_certificate_actual\":\"\"}]', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', '', '', '', '', 'No', '', 'No', '', '', '', '', 'NGO121', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[\"been found guilty of diversion or misutilisation of funds\"]', '', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0, '', '[{\"name_of_member\":\"\",\"member_age\":\"\",\"member_gender\":\"\",\"member_designation\":\"\",\"member_join_at\":\"\",\"member_related_to_other\":\"\",\"member_occupation\":\"\"}]', '[{\"name_of_asset\":\"\",\"location\":\"\",\"value\":\"\"}]', '[{\"name_of_donor\":\"\",\"title_of_project\":\"\",\"project_period_from\":\"\",\"project_period_to\":\"\",\"project_amount\":\"\"}]', '[{\"label1\":\"Organisational income(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"},{\"label1\":\"Organisational expenditure(in INR lakhs)\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\"}]', '[{\"title_of_traveller\":\"\",\"location_and_purpose\":\"\",\"cost_incurred\":\"\"}]', '[{\"label1\":\"Head of Organisation\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Operations\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"},{\"label1\":\"Chief of Finance\\/Accounts\",\"input1\":\"\",\"input2\":\"\",\"input3\":\"\",\"input4\":\"\",\"input5\":\"\",\"input6\":\"\",\"input7\":\"\",\"input8\":\"\",\"input9\":\"\"}]', '[{\"label1\":\"Upto INR 2 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2.01-4 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 4.01-8 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 8.01-13 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 18.01-30 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 30.01-60 Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 60Lakhs\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 13.01-18 Lakhs\",\"input1\":\"\",\"input2\":\"\"}]', '[{\"label1\":\"Upto INR 2,500\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"INR 2,501-5000\",\"input1\":\"\",\"input2\":\"\"},{\"label1\":\"Greater than INR 5,001\",\"input1\":\"\",\"input2\":\"\"}]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 0, 3, 2, 'test03', '', '2021-01-17 08:34:40', '2021-01-17 03:04:40', 0, '', '', '', '', '', '', '[{\"category_id\":\"\",\"category_name\":\"Select Category\",\"value\":\"\"}]', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', '', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_module`
--

CREATE TABLE `ngo_module` (
  `module_id` int(10) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  `direct_indirect` varchar(100) NOT NULL DEFAULT 'indirect',
  `position` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `ngo_notification`
--

CREATE TABLE `ngo_notification` (
  `notification_id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `url` varchar(500) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_notification`
--

INSERT INTO `ngo_notification` (`notification_id`, `superngo_id`, `ngo_id`, `org_id`, `proposal_id`, `project_id`, `cycle_id`, `status`, `url`, `description`, `created_date`, `created_time`) VALUES
(1, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfd\'dfdfdf\'', '2021-01-04', '18:16:45'),
(2, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfd\'dfdfdf\'', '2021-01-04', '18:17:22'),
(3, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfd\'dfdfdf\'', '2021-01-04', '18:19:42'),
(4, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', '\"dfdfdf\",\"dfdfdf\"', '2021-01-04', '18:28:41'),
(5, 2, 2, 1, 48, 0, 0, 'Pending', 'http://localhost/csr/ngo/entity/edit?id=2', 'dfdfdfdfd', '2021-01-04', '18:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_roles`
--

CREATE TABLE `ngo_roles` (
  `role_id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0'
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
(63, 1, 12, 3, 3, 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', '2020-12-27', '04:12:08'),
(67, 2, 13, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2021-01-04', '13:01:49'),
(66, 2, 13, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', '2021-01-04', '13:01:49');

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
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify_code` varchar(200) DEFAULT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo_staff_account`
--

INSERT INTO `ngo_staff_account` (`ngo_staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_mobile`, `staff_status`, `staff_role_id`, `staff_role`, `superngo_id`, `ngo_id`, `parent_id`, `first_login`, `last_login`, `password_creation_time`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'Kriti', 'Bajaj', 'kritib@gmail.com', '0529ec905cd3cb483011185277659c862ce5ba14', '1610077496.png', '', 'Active', 1, 'Owner', 1, 0, 0, '2020-09-28 04:09:20', '2021-01-12 04:01:24', '2020-12-22 09:12:20', '2020-09-28 04:09:54', '2020-09-28 04:07:54', 'f8bcbdf259e02f126c934ce9d474c0195f39e1ff', 0),
(2, 'Kriti2', 'Bajaj2', 'kriti.b@gmail.com', 'a10d8b0443f44bf76b4a97a7d12f4525e5173762', 'default_profile.jpg', NULL, 'Active', 2, 'Regular', 1, 0, 1, '2020-09-28 04:09:01', '2020-09-28 04:09:01', '2020-09-28 04:09:20', '2020-09-28 04:09:42', '2020-09-28 04:12:42', NULL, 1),
(3, 'c', 'p', 'user@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', '1609259369.png', NULL, 'Active', 3, 'Owner', 2, 0, 0, '2020-09-30 10:09:06', '2021-01-17 03:01:49', '2020-09-30 10:09:14', '2020-09-30 10:09:14', '2020-09-30 10:54:14', '446f9031fdd70a7bb62e447f7a252b8589a6bd16', 0),
(4, 'Kriti', 'Bajaj', 'k.ritib@gmail.com', '2e2eb5f4e91b552c79dbf6f607a7c9cb5f4e80db', 'default_profile.jpg', NULL, 'Active', 5, 'Owner', 3, 0, 0, NULL, NULL, '2020-11-16 08:11:58', '2020-11-16 08:11:58', '2020-11-16 08:32:58', '34bd83e18e7448568e815ff209860bdcf59ccc11', 0),
(5, 'testing2', 'testing2', 'testing2@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 7, 'Owner', 4, 0, 0, NULL, NULL, '2020-11-16 11:11:40', '2020-11-16 11:11:40', '2020-11-16 11:11:40', 'b14056021ee50868f1355a1aed193dc539676cae', 0),
(6, 'testngo', 'testngo', 'testngo@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 9, 'Owner', 5, 0, 0, '2020-11-28 09:11:47', '2020-11-28 09:11:47', '2020-11-28 09:11:50', '2020-11-28 09:11:50', '2020-11-28 09:01:50', 'ab7c8b744eabf4358fd21670fc7340c15ccad100', 0),
(7, 'testngo1', 'testngo1', 'testngo1@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 11, 'Owner', 6, 0, 0, NULL, NULL, '2020-11-28 09:11:25', '2020-11-28 09:11:25', '2020-11-28 09:41:25', '6f77dc29ec94578ec0740325bcd01cdc6fd04b9a', 0),
(8, 'newngo', 'newngo', 'newngo@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 13, 'Owner', 7, 0, 0, NULL, NULL, '2020-11-30 05:11:59', '2020-11-30 05:11:59', '2020-11-30 05:45:59', 'ffbdeee54634d540b6ea403eba4e682aadc09ea1', 0),
(9, 'Chatur', 'prajapat', 'chatur@gmail.com', 'a3a88f2939b69e7606701bc9c8d9171c050dac8d', 'default_profile.jpg', NULL, 'Active', 3, 'Owner', 2, 2, 3, '2020-12-13 06:12:01', '2020-12-13 06:12:01', '2020-12-13 06:12:24', '2020-12-13 06:12:23', '2020-12-13 06:11:23', NULL, 0),
(10, 'Kriti', 'Bajaj', 'krit.ib@gmail.com', '32d9c445122ceca82fcb1aaacac4cf572d3046cc', 'default_profile.jpg', NULL, 'Active', 15, 'Owner', 8, 0, 0, NULL, NULL, '2020-12-15 17:12:36', '2020-12-15 17:12:36', '2020-12-15 17:42:36', '7fd2acdc78b9bc33ba4febda95557581534607eb', 0),
(11, 'Bajaj', 'Office', 'bajajbhavanoffice@gmail.com', '0529ec905cd3cb483011185277659c862ce5ba14', 'default_profile.jpg', NULL, 'Active', 2, 'Regular', 1, 0, 1, '2020-12-22 10:12:25', '2020-12-22 10:12:25', '2020-12-22 10:12:44', '2020-12-22 10:12:22', '2020-12-22 10:11:22', NULL, 1),
(12, 'Bajaj', 'Bhavan', 'bajajbhavanoffice@gmail.com', '6fb18dcfd2a78ff67ae2e201390ade1ca84fbf1f', 'default_profile.jpg', NULL, 'Active', 2, 'Regular', 1, 1, 1, NULL, NULL, NULL, '2020-12-27 04:12:38', '2020-12-27 04:10:38', NULL, 0),
(13, 'tews', 'test', 'temp005@gmail.com', '87d0a7dd4a4252d931b5faa836e571e40c75bf7d', 'default_profile.jpg', NULL, 'Active', 3, 'Owner', 2, 2, 3, NULL, NULL, NULL, '2021-01-04 13:01:10', '2021-01-04 13:45:10', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_submodule`
--

CREATE TABLE `ngo_submodule` (
  `submodule_id` int(10) NOT NULL,
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
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `organisation` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_logo` varchar(1000) NOT NULL,
  `org_status` varchar(50) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `organisation_module` (
  `module_id` int(10) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  `direct_indirect` varchar(100) NOT NULL DEFAULT 'indirect',
  `position` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `organisation_roles` (
  `role_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation_roles`
--

INSERT INTO `organisation_roles` (`role_id`, `org_id`, `role_name`, `is_deleted`) VALUES
(1, 1, 'Admin', 0),
(2, 2, 'Admin', 0),
(3, 1, 'Regular', 0),
(4, 3, 'Admin', 0),
(5, 1, 'Auditor', 0);

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
(16, 3, 4, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11'),
(17, 1, 5, 3, 3, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2021-01-12', '10:01:43'),
(18, 1, 5, 4, 4, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2021-01-12', '10:01:43'),
(19, 1, 5, 7, 10, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2021-01-12', '10:01:43'),
(20, 1, 5, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2021-01-12', '10:01:43');

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
(79, 3, 9, 8, 11, 'no', 'no', 'yes', 'no', 'yes', 'no', 'no', '2020-12-28', '02:12:11'),
(80, 1, 10, 1, 1, 'yes', 'no', 'yes', 'no', 'yes', 'yes', 'no', '2021-01-05', '23:01:44'),
(81, 1, 10, 2, 2, 'yes', 'no', 'yes', 'no', 'no', 'no', 'no', '2021-01-05', '23:01:44'),
(82, 1, 10, 3, 3, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', '2021-01-05', '23:01:44'),
(83, 1, 11, 6, 7, 'no', 'no', 'yes', 'no', 'no', 'no', 'no', '2021-01-16', '23:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `organisation_submodule`
--

CREATE TABLE `organisation_submodule` (
  `submodule_id` int(10) NOT NULL,
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
  `status` enum('active','inactive','old') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 1, 2, 4),
(2, 1, 2, 5),
(3, 1, 1, 2);

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
(11, 1, 1, 1),
(12, 2, 1, 1),
(13, 2, 2, 2),
(14, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `org_documents_req_list`
--

CREATE TABLE `org_documents_req_list` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_type` varchar(100) NOT NULL COMMENT 'payment_processing_doc , ngo_document_list, csr_document_list'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `org_ngo_review_status` (
  `review_status_id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `ngo_id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `org_last_updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_ngo_review_status`
--

INSERT INTO `org_ngo_review_status` (`review_status_id`, `org_id`, `ngo_id`, `status`, `org_last_updated_date`) VALUES
(13, 1, 9, 'Pending', NULL);

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
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify_code` varchar(200) NOT NULL,
  `is_deleted` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_staff_account`
--

INSERT INTO `org_staff_account` (`staff_id`, `first_name`, `last_name`, `staff_email`, `staff_password`, `staff_profile_image`, `staff_phone_no`, `staff_status`, `staff_role_id`, `staff_role`, `org_id`, `donor_id`, `parent_id`, `first_login`, `last_login`, `last_password_change`, `created_date`, `created_time`, `update_datetime`, `verify_code`, `is_deleted`) VALUES
(1, 'ch', 'p', 'test@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 0, 0, '2020-09-28 13:09:40', '2021-01-17 09:29:44', '2020-09-28 13:09:55', '2020-09-28', '13:09:13', '2020-09-28 13:27:13', '', 0),
(2, 'Kriti', 'Bajaj', 'kritib@gmail.com', 'bbeda973649b9b6e0aa40895102c0d89d530270c', 'default_profile.jpg', NULL, 'Active', 2, 'Admin', 2, 0, 0, '2020-09-30 11:09:27', '2020-12-15 06:12:05', '2020-09-30 11:09:44', '2020-09-30', '11:09:44', '2020-09-30 11:01:44', '', 0),
(3, 'K', 'B', 'kri.tib@gmail.com', 'd2f406f10f3254e229e34ff95b398c2873d59839', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 0, 1, '2020-11-19 11:11:40', '2020-11-19 11:11:40', '2020-11-19 11:11:13', '2020-11-19', '11:11:13', '2020-11-19 11:12:13', '', 1),
(4, 'kriti 4', 'blah', 'krit.ib@gmail.com', 'bbeda973649b9b6e0aa40895102c0d89d530270c', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 0, 1, '2020-12-15 17:12:04', '2020-12-15 17:12:04', '2020-12-15 17:12:31', '2020-12-15', '17:12:01', '2020-12-15 17:07:01', '', 0),
(5, 'ok', 'ok', 'ok@gmail.com', '6b4c76c90a36e6f78903bbb6317deb232dcbba72', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '10:12:31', '2020-12-23 04:39:31', '', 0),
(6, 'erchatur', 'erchatur', 'testngo1@gmail.com', 'd46374de85f1759a6c7c634b0701155efa99fbfc', 'default_profile.jpg', NULL, 'Active', 3, 'Regular', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '10:12:31', '2020-12-23 05:25:31', '', 0),
(7, 'erchatur', 'erchatur', 'testngo12@gmail.com', 'f00964e4aab2041e8683a39c7c472a3f0c564c36', 'default_profile.jpg', NULL, 'Active', 3, 'Regular', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '11:12:37', '2020-12-23 05:30:37', '', 0),
(8, 'erchatur', 'erchatur', 'erchatur.prajapat@gmail.com', '0eb2f606fbb7d461f78547d1e2d233a27364031b', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 1, 1, NULL, NULL, NULL, '2020-12-23', '11:12:10', '2020-12-23 05:34:10', '', 0),
(9, 'Kriti', 'Bajaj', 'k.ritib@gmail.com', 'bbeda973649b9b6e0aa40895102c0d89d530270c', 'default_profile.jpg', NULL, 'Active', 4, 'Admin', 3, 0, 0, '2020-12-28 08:12:27', '2020-12-28 08:12:27', '2020-12-28 08:12:40', '2020-12-28', '02:12:11', '2020-12-28 02:48:11', '', 0),
(10, 'Kriti', 'twi', 'kr.itib@gmail.com', '75fc5e4bf7a8516ab599bb17cb639746d4836688', 'default_profile.jpg', NULL, 'Active', 1, 'Admin', 1, 0, 1, NULL, NULL, NULL, '2021-01-05', '23:01:44', '2021-01-05 18:19:44', '', 0),
(11, '34', '43', 'ok23@gmail.com', '92dc9ad8dc6508ce1c85f927dda99a9160598f05', 'default_profile.jpg', NULL, 'Active', 3, 'Regular', 1, 1, 1, NULL, NULL, NULL, '2021-01-16', '23:01:52', '2021-01-16 17:31:52', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_tasks`
--

CREATE TABLE `org_tasks` (
  `org_task_id` int(10) NOT NULL,
  `org_task_list_id` int(10) NOT NULL,
  `task_type` varchar(50) NOT NULL,
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
  `last_updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_tasks`
--

INSERT INTO `org_tasks` (`org_task_id`, `org_task_list_id`, `task_type`, `org_task_label`, `view_file_name`, `org_id`, `org_staff_id`, `superngo_id`, `prop_id`, `created_date`, `created_time`, `status`, `due_date`, `comments`, `additional_json`, `project_id`, `last_updated_date`) VALUES
(32, 6, 'pmp', 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 1, 1, 1, 24, '2021-01-12', '10:48:33', 'new', NULL, '', '[{\"cycle_list\":[{\"cycle_name\":\"1\",\"cycle_start_date1\":\"2021-01-14\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"12\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"123\"}],\"cycle_file_upload\":\"entity_5ffd311d5cb50.jpg\",\"cycle_file_upload_actual\":\"mindful 2.jpg\",\"project_start_date\":\"2021-01-07\",\"project_end_date\":\"2021-01-20\",\"comments\":\"test\",\"project_id\":\"13\",\"org_id\":\"1\",\"superngo_id\":\"1\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 13, NULL),
(31, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 1, 24, '2021-01-12', '10:45:02', 'Complete', NULL, 'test', '[{\"cycle_list\":[{\"cycle_name\":\"1\",\"cycle_start_date1\":\"2021-01-14\",\"is_payment\":\"yes\",\"donor_dropdown_id\":\"2\",\"donor_dropdown\":\"Testing\",\"cycle_donor_amount\":\"12\",\"ngo_payment\":\"document\",\"ngo_doc\":\"ngo doc 1, ngo doc 2\",\"csr_doc\":\"csr doc 2\"}],\"donor_list\":[{\"select_donor\":\"1\",\"donor_amount\":\"123\"}],\"cycle_file_upload\":\"entity_5ffd311d5cb50.jpg\",\"cycle_file_upload_actual\":\"mindful 2.jpg\",\"project_start_date\":\"2021-01-07\",\"project_end_date\":\"2021-01-20\",\"comments\":\"test\",\"project_id\":\"13\",\"org_id\":\"1\",\"superngo_id\":\"1\",\"org_staff_id\":\"1\",\"is_saved_once\":\"yes\"}]', 13, NULL),
(30, 4, 'prp', 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 1, 1, 1, 24, '2021-01-12', '10:41:40', 'Completed', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"Yes\"}]', 14, '2021-01-16 23:00:09'),
(29, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 1, 24, '2021-01-12', '10:33:58', 'Complete', NULL, 'proposal seems ok', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"\",\"proposal_is_recommended\":\"Yes\"}]', 0, NULL),
(27, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 1, 24, '2021-01-11', '16:40:42', 'Complete', NULL, 'I love this NGO', '', 0, NULL),
(28, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 1, 24, '2021-01-12', '10:32:30', 'Complete', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0, NULL),
(33, 5, 'pmp', 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 1, 1, 1, 24, '2021-01-16', '23:00:09', 'new', NULL, '', '[{\"rejection_records\":\"\",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"Yes\"}]', 14, '2021-01-16 23:00:09'),
(34, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 26, '2021-01-17', '04:03:20', 'Completed', NULL, 'test', '', 0, '2021-01-17 09:37:55'),
(35, 2, 'nrp', 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 1, 1, 2, 26, '2021-01-17', '09:37:55', 'Completed', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0, '2021-01-17 09:39:23'),
(36, 3, 'prp', 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 1, 1, 2, 26, '2021-01-17', '09:39:23', 'new', NULL, '', '[{\"rejection_records\":\" \",\"rejection_ngo\":\"\",\"ngo_status\":\"Approved\",\"proposal_is_recommended\":\"\"}]', 0, '2021-01-17 09:39:23'),
(37, 1, 'nrp', 'NGO Review', 'organisation/pages/task/task_ngo_review', 1, 1, 2, 27, '2021-01-17', '04:10:49', 'new', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_task_list`
--

CREATE TABLE `org_task_list` (
  `task_id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `task_type` varchar(200) NOT NULL,
  `task_position` int(10) NOT NULL,
  `task_label` varchar(300) NOT NULL,
  `view_file_name` varchar(200) NOT NULL,
  `is_cycle_start` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_task_list`
--

INSERT INTO `org_task_list` (`task_id`, `org_id`, `task_type`, `task_position`, `task_label`, `view_file_name`, `is_cycle_start`) VALUES
(1, 1, 'prp', 3, 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 'no'),
(2, 1, 'prp', 4, 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 'no'),
(3, 1, 'pmp', 5, 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 'no'),
(4, 1, 'pmp', 6, 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 'yes'),
(5, 1, 'pmp', 7, 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 'no'),
(6, 1, 'nrp', 1, 'NGO Review', 'organisation/pages/task/task_ngo_review', 'no'),
(7, 1, 'nrp', 2, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) NOT NULL,
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
  `cycle_file_upload_actual` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `prop_id`, `superngo_id`, `ngo_id`, `organisation_id`, `title`, `code`, `created_time`, `updated_datetime`, `project_status`, `is_deleted`, `generated_by`, `project_start_date`, `project_end_date`, `cycle_file_upload`, `cycle_file_upload_actual`) VALUES
(14, 24, 1, 7, 1, 'Test Proposal 11 Jan', '', '2021-01-16 23:00:09.000000', '2021-01-16 23:00:09.000000', 'New', 0, '1', NULL, NULL, NULL, ''),
(13, 24, 1, 7, 1, 'Test Proposal 11 Jan', '', '2021-01-12 10:45:02.000000', '2021-01-12 10:45:02.000000', 'New', 0, '1', '2021-01-07', '2021-01-20', 'entity_5ffd311d5cb50.jpg', 'mindful 2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project_cycle_details`
--

CREATE TABLE `project_cycle_details` (
  `project_cycle_id` int(10) NOT NULL,
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
  `is_completed` varchar(50) NOT NULL DEFAULT 'no',
  `payment_date_time` datetime DEFAULT NULL,
  `is_payment_made` varchar(5) DEFAULT 'no',
  `payment_proof` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_cycle_details`
--

INSERT INTO `project_cycle_details` (`project_cycle_id`, `project_id`, `org_id`, `superngo_id`, `org_staff_id`, `cycle_name`, `cycle_start_date1`, `cycle_end_date2`, `is_payment`, `donor_dropdown`, `donor_dropdown_id`, `cycle_donor_amount`, `ngo_payment`, `ngo_doc`, `csr_doc`, `created_time`, `cycle_status`, `is_deleted`, `is_completed`, `payment_date_time`, `is_payment_made`, `payment_proof`) VALUES
(16, 13, 1, 1, 1, '1', '2021-01-14', '2021-01-12', 'yes', 'Testing', 2, 12, 'document', 'ngo doc 1, ngo doc 2', 'csr doc 2', '2021-01-12 10:48:33', 'New', 0, 'no', NULL, 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_document`
--

CREATE TABLE `project_document` (
  `id` int(11) NOT NULL,
  `project_cycle_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `document_value` varchar(500) NOT NULL,
  `document_value_actual` varchar(100) NOT NULL,
  `document_updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_document`
--

INSERT INTO `project_document` (`id`, `project_cycle_id`, `project_id`, `document_type`, `document_name`, `document_value`, `document_value_actual`, `document_updated_date`) VALUES
(21, 16, 13, 'payment_processing_doc', 'document', '', '', '2021-01-12'),
(20, 16, 13, 'csr_document_list', 'csr doc 2', '', '', '2021-01-12'),
(18, 16, 13, 'ngo_document_list', 'ngo doc 1', '', '', '2021-01-12'),
(19, 16, 13, 'ngo_document_list', ' ngo doc 2', '', '', '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `project_donors`
--

CREATE TABLE `project_donors` (
  `project_donor_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `ngo_id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `select_donor` int(10) NOT NULL,
  `donor_amount` double NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_donors`
--

INSERT INTO `project_donors` (`project_donor_id`, `project_id`, `ngo_id`, `org_id`, `select_donor`, `donor_amount`, `status`, `created_date`) VALUES
(18, 10, 0, 0, 1, 1000, 'active', '2020-12-13 10:47:04'),
(19, 11, 2, 1, 1, 23, 'New', '2021-01-07 22:21:32'),
(20, 12, 5, 1, 2, 12, 'New', '2021-01-08 10:22:54'),
(21, 13, 7, 1, 1, 123, 'New', '2021-01-12 10:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `prop_id` int(11) NOT NULL,
  `superngo_id` int(11) NOT NULL,
  `ngo_id` int(11) DEFAULT NULL,
  `ngo_staff_id` int(11) NOT NULL,
  `organisation_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gc_requested` enum('yes','no') DEFAULT NULL,
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
  `org_last_updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`prop_id`, `superngo_id`, `ngo_id`, `ngo_staff_id`, `organisation_id`, `title`, `code`, `created_time`, `update_datetime`, `gc_requested`, `gc_requested_date`, `gc_responded`, `gc_responded_date`, `gc_granted`, `gc_granted_date`, `gc_responded_by`, `submission_time`, `proposal_status`, `is_submit`, `is_deleted`, `is_proposal_recommended`, `is_proposal_recommended_bu_org_staff_id`, `focus_category`, `focus_subcategory`, `category_input`, `region`, `benficial_cat`, `age_group`, `target_group`, `slums_villages`, `women_adult`, `men_adult`, `children`, `geo_location`, `geo_location_values`, `start_date`, `end_date`, `local_address`, `street_address`, `state`, `city`, `pincode`, `full_name`, `designation`, `email_address`, `contact_no`, `organization_background_brief`, `project_summary_proposal`, `benificiary_profile_brief`, `benificiary_profile_statement`, `benificiary_profile_solution`, `specific_outcomes`, `project_sustainability`, `original_file_path`, `generated_file_path`, `total_funds`, `total_funds_org`, `balance_funds`, `multiple_img_upload2`, `org_last_updated_date`) VALUES
(24, 1, 7, 1, 1, 'Test Proposal 11 Jan', '', '2021-01-11 16:01:08', '2021-01-11 16:39:08', 'yes', '2021-01-11 16:01:20', 'yes', '2021-01-11 22:01:31', 'yes', '2021-01-11 22:01:31', 1, '2021-01-11 16:01:42', 'Approved', 1, 0, NULL, NULL, 1, 0, 'Test specifics', '', '', '', '', '', '', '', '', '', '', '2021-01-12', '2021-01-20', '', '', '', '', 0, '', '', '', '', 'Test data', '', '', '', '', '', '', '', '', 12345, 0, '', '', '2021-01-16 23:00:09'),
(25, 1, 8, 1, 1, '', '', '2021-01-12 04:01:24', '2021-01-12 04:46:24', 'yes', '2021-01-12 04:01:27', 'no', NULL, NULL, NULL, 0, NULL, 'Created', 0, 0, NULL, NULL, 2, 4, 'Test Focus Area', '', '', '', '', '', '', '', '', '', '', '2021-01-21', '2021-01-31', '', '', '', '', 0, '', '', '', '', 'Test content', '', '', '', '', '', '', '', '', 0, 0, '', '', NULL),
(26, 2, 9, 3, 1, 'p test 03', '', '2021-01-17 03:01:34', '2021-01-17 03:58:34', 'yes', '2021-01-17 03:01:12', 'yes', '2021-01-17 09:01:03', 'yes', '2021-01-17 09:01:03', 1, '2021-01-17 04:01:20', 'Proposal Initial Review Pending', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '2021-01-17 09:39:23'),
(27, 2, 9, 3, 1, 'p test 04', '', '2021-01-17 04:01:39', '2021-01-17 04:04:39', 'yes', '2021-01-17 04:01:06', 'yes', '2021-01-17 09:01:16', 'yes', '2021-01-17 09:01:16', 1, '2021-01-17 04:01:49', 'Submitted', 1, 0, NULL, NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `superngo` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superngo`
--

INSERT INTO `superngo` (`id`, `brand_name`, `created_time`, `update_datetime`, `is_deleted`) VALUES
(1, 'KSuperNGO', '2020-09-28 04:09:54', '2020-09-28 04:07:54', 0),
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
  `default` tinyint(4) DEFAULT '0',
  `is_deleted` int(5) NOT NULL DEFAULT '0'
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
-- Indexes for table `admin_city`
--
ALTER TABLE `admin_city`
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
-- Indexes for table `financial_budget`
--
ALTER TABLE `financial_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_years`
--
ALTER TABLE `financial_years`
  ADD PRIMARY KEY (`financial_id`);


--
-- Indexes for table `ngo_module`
--
ALTER TABLE `ngo_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `ngo_notification`
--
ALTER TABLE `ngo_notification`
  ADD PRIMARY KEY (`notification_id`);

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
-- Indexes for table `org_documents_req_list`
--
ALTER TABLE `org_documents_req_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_ngo_review_status`
--
ALTER TABLE `org_ngo_review_status`
  ADD PRIMARY KEY (`review_status_id`);

--
-- Indexes for table `org_staff_account`
--
ALTER TABLE `org_staff_account`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `org_tasks`
--
ALTER TABLE `org_tasks`
  ADD PRIMARY KEY (`org_task_id`);

--
-- Indexes for table `org_task_list`
--
ALTER TABLE `org_task_list`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_cycle_details`
--
ALTER TABLE `project_cycle_details`
  ADD PRIMARY KEY (`project_cycle_id`);

--
-- Indexes for table `project_document`
--
ALTER TABLE `project_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_donors`
--
ALTER TABLE `project_donors`
  ADD PRIMARY KEY (`project_donor_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin_city`
--
ALTER TABLE `admin_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `financial_budget`
--
ALTER TABLE `financial_budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ngo`
--

--
ALTER TABLE `ngo_module`
  MODIFY `module_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ngo_notification`
--
ALTER TABLE `ngo_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ngo_roles`
--
ALTER TABLE `ngo_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ngo_roles_access`
--
ALTER TABLE `ngo_roles_access`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `ngo_staff_access`
--
ALTER TABLE `ngo_staff_access`
  MODIFY `index_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `ngo_staff_account`
--
ALTER TABLE `ngo_staff_account`
  MODIFY `ngo_staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ngo_submodule`
--
ALTER TABLE `ngo_submodule`
  MODIFY `submodule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organisation_module`
--
ALTER TABLE `organisation_module`
  MODIFY `module_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `organisation_roles`
--
ALTER TABLE `organisation_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `organisation_roles_access`
--
ALTER TABLE `organisation_roles_access`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `organisation_staff_access`
--
ALTER TABLE `organisation_staff_access`
  MODIFY `index_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `organisation_submodule`
--
ALTER TABLE `organisation_submodule`
  MODIFY `submodule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `org_category`
--
ALTER TABLE `org_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `org_district`
--
ALTER TABLE `org_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `org_documents_req_list`
--
ALTER TABLE `org_documents_req_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `org_ngo_review_status`
--
ALTER TABLE `org_ngo_review_status`
  MODIFY `review_status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `org_staff_account`
--
ALTER TABLE `org_staff_account`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `org_tasks`
--
ALTER TABLE `org_tasks`
  MODIFY `org_task_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `org_task_list`
--
ALTER TABLE `org_task_list`
  MODIFY `task_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `project_cycle_details`
--
ALTER TABLE `project_cycle_details`
  MODIFY `project_cycle_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `project_document`
--
ALTER TABLE `project_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `project_donors`
--
ALTER TABLE `project_donors`
  MODIFY `project_donor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `superngo`
--
ALTER TABLE `superngo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `web_admin_login`
--
ALTER TABLE `web_admin_login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
