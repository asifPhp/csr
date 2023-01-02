-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 28, 2019 at 11:22 AM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_blogs`
--

DROP TABLE IF EXISTS `admin_blogs`;
CREATE TABLE IF NOT EXISTS `admin_blogs` (
  `blog_id` int(20) NOT NULL AUTO_INCREMENT,
  `FK_user_id` int(10) DEFAULT NULL,
  `blog_cat_id` int(10) DEFAULT NULL,
  `blog_title` varchar(5000) DEFAULT NULL,
  `content` longtext,
  `meta_title` varchar(5000) DEFAULT NULL,
  `meta_descp` longtext,
  `meta_tag` longtext,
  `other_tag` longtext,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `blog_img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blogs`
--

INSERT INTO `admin_blogs` (`blog_id`, `FK_user_id`, `blog_cat_id`, `blog_title`, `content`, `meta_title`, `meta_descp`, `meta_tag`, `other_tag`, `date`, `status`, `blog_img`) VALUES
(1, 1, 2, 'anshu', '<p>gff</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-26', 'active', 'blog_5c7531bc2a7eb.png'),
(2, 1, 1, 'fvf', '<p>cvcxcxvcxvfv vc&nbsp;</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'inactive', 'blog_5c73cc3bd8f8c.jpg'),
(3, 1, 1, 'dfsfd', '<p>dsfdsf</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'active', 'blog_5c73ccf348202.jpg'),
(4, 1, 1, 'ded', '<p>dfdf</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'inactive', 'blog_5c73cd2e42a58.jpg'),
(10, 1, 2, 'rrrrr', '<option value=\"ffffff\">ffffff</option><option valu', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'inactive', 'blog_5c73db7850768.jpg'),
(6, 1, 2, 'dvfcv', '<p>xzxxxxxxx</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'active', 'blog_5c73d47cd746b.jpg'),
(11, 1, 2, 'kokoko', '<p>dgdxhbfxch</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'remove', 'blog_5c73e475ccfab.jpg'),
(12, 1, 2, 'ansh', '<p>zcdsc</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-26', 'active', 'blog_5c752c1491ac7.jpg'),
(13, 1, 5, 'sv', '<p>bhgjmb</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-26', 'active', 'blog_5c752f7848a08.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin_blog_category`
--

DROP TABLE IF EXISTS `admin_blog_category`;
CREATE TABLE IF NOT EXISTS `admin_blog_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(500) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blog_category`
--

INSERT INTO `admin_blog_category` (`category_id`, `category_name`, `status`, `date`) VALUES
(1, 'ffffffhhhkh', 'remove', '2019-02-26'),
(2, 'anshh', 'active', '2019-02-26'),
(3, '234234wrwrf', NULL, '2019-02-25'),
(4, 'dasdas', NULL, '2019-02-25'),
(5, 'uim', 'active', '2019-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `admin_blog_comment`
--

DROP TABLE IF EXISTS `admin_blog_comment`;
CREATE TABLE IF NOT EXISTS `admin_blog_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_comment` text NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `usercommimage` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `blog_id` int(11) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blog_comment`
--

INSERT INTO `admin_blog_comment` (`comment_id`, `user_id`, `user_comment`, `user_name`, `usercommimage`, `date`, `time`, `status`, `blog_id`, `comment_email`) VALUES
(1, 0, 'hello', 'sv', 'blog_comment_5c752b03d21bf.jpg', '2019-02-26', '18:02:55', 'active', 1, 'hjghjg'),
(3, 0, 'gfhfghf', 'sv', 'blog_comment_5c74db09072a0.png', '2019-02-26', '11:02:03', 'active', 0, ''),
(5, 0, 'gf', 'fdgdfg', 'blog_comment_5c74edbabc189.png', '2019-02-26', '13:02:48', 'active', 0, ''),
(6, 0, 'gf', 'fdgdfg', 'blog_comment_5c74edbabc189.png', '2019-02-26', '13:02:51', 'active', 0, ''),
(7, 0, 'gf', 'fdgdfg', 'blog_comment_5c74edbabc189.png', '2019-02-26', '13:02:52', 'active', 0, ''),
(8, 0, 'gf', 'fdgdfg', 'blog_comment_5c74edbabc189.png', '2019-02-26', '13:02:53', 'active', 0, ''),
(9, 0, 'gf', 'fdgdfg', 'blog_comment_5c74edbabc189.png', '2019-02-26', '13:02:53', 'active', 0, ''),
(10, 0, 'sdfdf', 'sdfsdf', 'blog_comment_5c74ee287628b.png', '2019-02-26', '13:02:38', 'active', 0, ''),
(11, 0, 'sdfdf', 'sdfsdf', 'blog_comment_5c74ee287628b.png', '2019-02-26', '13:02:40', 'active', 0, ''),
(12, 0, 'sdfdf', 'sdfsdf', 'blog_comment_5c74ee287628b.png', '2019-02-26', '13:02:40', 'active', 0, ''),
(13, 0, 'sdfdf', 'sdfsdf', 'blog_comment_5c74ee287628b.png', '2019-02-26', '13:02:40', 'active', 0, ''),
(14, 0, 'sdfdf', 'sdfsdf', 'blog_comment_5c74ee287628b.png', '2019-02-26', '13:02:40', 'active', 0, ''),
(15, 0, 'fgfdg', 'dfgdfg', 'blog_comment_5c74ee9195c44.png', '2019-02-26', '13:02:22', 'active', 0, ''),
(16, 0, 'fgfdg', 'dfgdfg', 'blog_comment_5c74ee9195c44.png', '2019-02-26', '13:02:18', 'active', 0, ''),
(17, 0, 'fgbf', 'fgf', 'blog_comment_5c74ef24ab9d2.png', '2019-02-26', '13:02:50', 'active', 0, ''),
(22, 0, 'sdsafs', 'dfsdfd', 'blog_comment_5c75388861f4d.png', '2019-02-26', '18:02:57', 'active', 1, ''),
(19, 0, 'fgd', 'fgdg', 'blog_comment_5c74f3683b326.png', '2019-02-26', '13:02:02', 'active', 0, ''),
(20, 0, 'hgfghf', 'gfdgf', 'blog_comment_5c74f513127f6.png', '2019-02-26', '13:02:09', 'active', 0, ''),
(21, 0, 'helllo someone', 'vk', 'blog_comment_5c7532a762377.png', '2019-02-26', '18:02:53', 'active', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_emp_access`
--

DROP TABLE IF EXISTS `admin_emp_access`;
CREATE TABLE IF NOT EXISTS `admin_emp_access` (
  `index_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) DEFAULT NULL,
  `org_id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `submodule_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_emp_access`
--

INSERT INTO `admin_emp_access` (`index_id`, `emp_id`, `org_id`, `module_id`, `submodule_id`, `date`, `time`) VALUES
(199, 1, 0, 3, 9, '2019-02-26', '09:59:59'),
(198, 1, 0, 3, 8, '2019-02-26', '09:59:59'),
(197, 1, 0, 2, 7, '2019-02-26', '09:59:59'),
(196, 1, 0, 2, 6, '2019-02-26', '09:59:59'),
(195, 1, 0, 2, 5, '2019-02-26', '09:59:59'),
(194, 1, 0, 1, 4, '2019-02-26', '09:59:59'),
(193, 1, 0, 1, 3, '2019-02-26', '09:59:59'),
(192, 1, 0, 1, 2, '2019-02-26', '09:59:59'),
(191, 1, 0, 1, 1, '2019-02-26', '09:59:59'),
(200, 1, 0, 4, 10, '2019-12-23', '34:20:22'),
(201, 1, 0, 5, 11, '2019-12-23', '11:11:11'),
(202, 1, 0, 5, 12, '2019-12-23', '11:11:11');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_module`
--

INSERT INTO `admin_module` (`module_id`, `module_name`, `date`, `time`, `status`) VALUES
(1, 'Blog', '2019-02-24', '25:20:00', 'active'),
(2, 'Public Content', '2019-02-21', '43:00:00', 'active'),
(3, 'Staff', '2019-02-22', '22:00:00', 'active'),
(4, 'Settings', '2019-12-23', '20:19:21', 'active'),
(5, 'Coupon', '2019-12-23', '12:08:09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_submodule`
--

DROP TABLE IF EXISTS `admin_submodule`;
CREATE TABLE IF NOT EXISTS `admin_submodule` (
  `submodule_id` int(10) NOT NULL AUTO_INCREMENT,
  `FK_module_id` int(10) NOT NULL,
  `submodule_name` varchar(200) NOT NULL,
  `link` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`submodule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_submodule`
--

INSERT INTO `admin_submodule` (`submodule_id`, `FK_module_id`, `submodule_name`, `link`, `date`, `time`, `status`) VALUES
(1, 1, 'Blog', 'admin/blog/index', '2019-02-23', '15:08:00', 'active'),
(2, 1, 'Category', 'admin/blog/category', '2019-02-13', '29:00:00', 'active'),
(3, 1, 'Blog View', 'admin/blog/blog_view', '2018-04-20', '04:00:00', 'active'),
(4, 1, 'Blog Comment View', 'admin/blog/blog_comment_view', '2018-04-20', '25:20:00', 'active'),
(5, 2, 'Public Content', 'admin/configure_access/public_content', '2019-02-12', '13:00:00', 'active'),
(6, 2, 'Public Gallery', 'admin/configure_access/add_gallery_with_link', '2019-02-22', '23:00:00', 'active'),
(7, 2, 'Gallery', 'admin/configure_access/add_gallery', '2019-02-22', '11:00:00', 'active'),
(8, 3, 'Add Staff', 'admin/profile/index', '2019-02-20', '08:00:00', 'active'),
(9, 3, 'Staff List', 'admin/profile/user_profile_list', '2019-02-20', '08:00:00', 'active'),
(10, 4, 'Setting', 'admin/settings', '2019-12-23', '28:18:17', 'active'),
(11, 5, 'Coupon', 'admin/coupon/', '2019-12-23', '16:08:09', 'active'),
(12, 5, 'Coupon View', 'admin/coupon/coupon_view', '2019-12-23', '14:10:09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tags`
--

DROP TABLE IF EXISTS `admin_tags`;
CREATE TABLE IF NOT EXISTS `admin_tags` (
  `tag_id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

DROP TABLE IF EXISTS `coupon_code`;
CREATE TABLE IF NOT EXISTS `coupon_code` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(1000) DEFAULT NULL,
  `coupon_discount` varchar(200) DEFAULT NULL,
  `coupon_validity_start` date DEFAULT NULL,
  `coupon_validity_end` date DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_time` time DEFAULT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`coupon_id`, `coupon_code`, `coupon_discount`, `coupon_validity_start`, `coupon_validity_end`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'test', '10', '2019-12-28', '2019-11-24', '2019-12-28', '15:37:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_press`
--

DROP TABLE IF EXISTS `gallery_press`;
CREATE TABLE IF NOT EXISTS `gallery_press` (
  `gallery_id` int(10) NOT NULL AUTO_INCREMENT,
  `gallery_img` varchar(100) NOT NULL,
  `gallery_des` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_press`
--

INSERT INTO `gallery_press` (`gallery_id`, `gallery_img`, `gallery_des`, `created_date`, `created_time`) VALUES
(3, 'img_5c7539335eab3.png', 'pirl', '2019-02-26', '18:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `public_gallery`
--

DROP TABLE IF EXISTS `public_gallery`;
CREATE TABLE IF NOT EXISTS `public_gallery` (
  `gallery_id` int(10) NOT NULL AUTO_INCREMENT,
  `gallery_img` varchar(100) NOT NULL,
  `gallery_des` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_gallery`
--

INSERT INTO `public_gallery` (`gallery_id`, `gallery_img`, `gallery_des`, `created_date`, `created_time`) VALUES
(3, 'img_5c767bc95fea1.png', 'ASDASD', '2019-02-27', '17:02:16'),
(4, 'img_5d9c8dc58a9c3.png', 'fghbfh', '2019-10-08', '18:10:22');

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
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  `phone_no` double NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `default` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_admin_login`
--

INSERT INTO `web_admin_login` (`user_id`, `user_name`, `user_email`, `passwd`, `date`, `time`, `verify_code`, `status`, `phone_no`, `profile_picture`, `default`) VALUES
(1, 'Admin', 'admin@gmail.com', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2018-06-28', '06:06:58', '', 'active', 0, 'default_profile.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_contact_us`
--

DROP TABLE IF EXISTS `web_contact_us`;
CREATE TABLE IF NOT EXISTS `web_contact_us` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(20) DEFAULT NULL,
  `contact_email` varchar(30) DEFAULT NULL,
  `contact_subject` varchar(30) DEFAULT NULL,
  `contact_message` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `contact_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_contact_us`
--

INSERT INTO `web_contact_us` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `date`, `contact_status`) VALUES
(1, 'sfsfdsf', 'fdfdfdgdf', 'fgdfg', 'hgh', '2019-02-05', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `web_public_content`
--

DROP TABLE IF EXISTS `web_public_content`;
CREATE TABLE IF NOT EXISTS `web_public_content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `FK_added_by` int(10) NOT NULL,
  `content_cat_id` varchar(100) DEFAULT NULL,
  `content_head` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_public_content`
--

INSERT INTO `web_public_content` (`content_id`, `FK_added_by`, `content_cat_id`, `content_head`, `content`, `date`, `time`, `status`) VALUES
(1, 1, '1', 'About Us', '<p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Quas, veniam nobis minima. Delectus, dolorem rerum, eos nemo dolore amet quis, eum debiti modi voluptatibus ducimus molestiae laborum itaque quam maxime dolor amit laboriosam aperiam exercitationem.Cos nemo dolore amet quis, eum debiti modi voluptatibus ducimus molestiae laborum itaque quam maxime dolor amit laboriosam aperiam exercitationem. Amit dolor sit.</p>\n\n<div class=\"mb-30 ml-20 mt-30 row\">\n<div class=\"col-xs-6\">\n<ul>\n	<li>Education</li>\n	<li>CommunityzEducation</li>\n</ul>\n</div>\n\n<div class=\"col-xs-6\">\n<ul>\n	<li>Education</li>\n	<li>Teamwork</li>\n	<li>Creativity</li>\n</ul>\n</div>\n</div>\n\n<p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Quas, veniam nobis minima. Delectus, dolorem rerum, eos nemo dolore amet quis, eum debiti modi voluptatibus ducimus molestiae laborum itaque quam maxime dolor amit laboriosam aperiam exercitationem.</p>\n', '2019-02-26', '18:02:42', 'active'),
(2, 1, '2', 'Terms and Services', '<p>gf78khkmgh</p>\n', '2019-02-26', '18:02:47', 'active'),
(3, 1, 'privacy-policy', 'Privacy Policy', '<p>gf</p>\r\n', '2019-01-28', '16:01:18', 'active'),
(4, 1, 'contact-us', 'Contact US', '<p>gf</p>\r\n', '2019-01-28', '16:01:18', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE IF NOT EXISTS `web_settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(500) DEFAULT NULL,
  `website_url` varchar(500) DEFAULT NULL,
  `website_email` varchar(500) DEFAULT NULL,
  `website_phone_no` varchar(50) DEFAULT NULL,
  `website_logo` varchar(5000) DEFAULT NULL,
  `website_icon` varchar(5000) DEFAULT NULL,
  `sender_email_address` varchar(500) DEFAULT NULL,
  `sender_name` varchar(500) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`setting_id`, `website_name`, `website_url`, `website_email`, `website_phone_no`, `website_logo`, `website_icon`, `sender_email_address`, `sender_name`, `update_date`) VALUES
(1, 'Admin', 'https://admin.com', 'info@admin.com', '8695754856', 'logo_5e0727546af56.png', 'icon_5e07275ae51ea.png', 'info@admin.com', 'Admin', '2019-12-28 15:28:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
