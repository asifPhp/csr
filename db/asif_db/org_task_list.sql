-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 09, 2021 at 12:54 PM
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
  `is_cycle_start` varchar(50) NOT NULL DEFAULT 'no',
  `due_date_count` int(11) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_task_list`
--

INSERT INTO `org_task_list` (`task_id`, `org_id`, `task_type`, `task_position`, `task_label`, `view_file_name`, `is_cycle_start`, `due_date_count`) VALUES
(1, 1, 'prp', 3, 'Proposal Initial Review', 'organisation/pages/task/proposal_review', 'no', 0),
(2, 1, 'prp', 4, 'Proposal Final Review', 'organisation/pages/task/proposal_final_review', 'no', 0),
(3, 1, 'pmp', 5, 'Project Cycle Creation', 'organisation/pages/task/project_cycle_creation', 'no', 0),
(4, 1, 'pmp', 6, 'Cycle Assessment', 'organisation/pages/task/project_cycle_assessment', 'yes', 0),
(5, 1, 'pmp', 7, 'Cycle Completion', 'organisation/pages/task/project_cycle_completion', 'no', 0),
(6, 1, 'nrp', 1, 'NGO Review', 'organisation/pages/task/task_ngo_review', 'no', 0),
(7, 1, 'nrp', 2, 'NGO Decision', 'organisation/pages/task/task_ngo_decission', 'no', 0),
(8, 4, 'nrp', 1, 'NGO Desk Review', 'organisation/pages/task/1/task_ngo_desk_review', 'no', 14),
(9, 4, 'nrp', 2, 'NGO Desk Approval', 'organisation/pages/task/1/desk_review_approval', 'no', 3),
(10, 4, 'prp', 3, 'Proposal Desk Review', 'organisation/pages/task/1/proposal_desk_review', 'no', 14),
(11, 4, 'prp', 4, 'Begin Proposal Processing', 'organisation/pages/task/1/begin_proposal', 'no', 3),
(12, 4, 'prp', 5, 'Field Visit Report', 'organisation/pages/task/1/file_visit', 'no', 21),
(13, 4, 'prp', 6, 'Field Visit Approval', 'organisation/pages/task/1/file_visit_approval', 'no', 3),
(14, 4, 'prp', 7, 'Leadership Engagement', 'organisation/pages/task/1/leadership', 'no', 14),
(15, 4, 'prp', 8, 'SC Review', 'organisation/pages/task/1/sc_review', 'no', 90),
(16, 4, 'prp', 9, 'Board Review & Final Approval', 'organisation/pages/task/1/board_review', 'bord review', 90),
(17, 4, 'pmp', 10, 'Project Documents', 'organisation/pages/task/1/project_documents', 'no', 0),
(18, 4, 'pmp', 11, 'Create Reporting Schedule', 'organisation/pages/task/1/create_report', 'no', 0),
(19, 4, 'pmp', 12, 'Focal Point Review', 'organisation/pages/task/1/focal_point_review', 'no', 0),
(22, 4, 'pmp', 13, 'Payment Confirmation', 'organisation/pages/task/1/payment_confirmation', 'no', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
