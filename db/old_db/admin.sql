-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2019 at 02:09 PM
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
  `blog_title` varchar(20) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  `meta_title` varchar(20) DEFAULT NULL,
  `meta_descp` varchar(50) DEFAULT NULL,
  `meta_tag` varchar(30) DEFAULT NULL,
  `other_tag` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `blog_img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blogs`
--

INSERT INTO `admin_blogs` (`blog_id`, `FK_user_id`, `blog_cat_id`, `blog_title`, `content`, `meta_title`, `meta_descp`, `meta_tag`, `other_tag`, `date`, `status`, `blog_img`) VALUES
(1, 1, 1, 'lllllll', '<p>gff</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'active', 'blog_5c73ce17b4a16.jpg'),
(2, 1, 1, 'fvf', '<p>cvcxcxvcxvfv vc&nbsp;</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'inactive', 'blog_5c73cc3bd8f8c.jpg'),
(3, 1, 1, 'dfsfd', '<p>dsfdsf</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'active', 'blog_5c73ccf348202.jpg'),
(4, 1, 1, 'ded', '<p>dfdf</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'active', 'blog_5c73cd2e42a58.jpg'),
(10, 1, 2, 'rrrrr', '<option value=\"ffffff\">ffffff</option><option valu', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', '2019-02-25', 'blog_5c73db7850768.jpg'),
(6, 1, 2, 'dvfcv', '<p>xzxxxxxxx</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'active', 'blog_5c73d47cd746b.jpg'),
(11, 1, 2, 'kokoko', '<p>dgdxhbfxch</p>\n', 'sdgddfrg', 'sdgd', 'dfdd', 'dfddsa', '2019-02-25', 'remove', 'blog_5c73e475ccfab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_blog_category`
--

DROP TABLE IF EXISTS `admin_blog_category`;
CREATE TABLE IF NOT EXISTS `admin_blog_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blog_category`
--

INSERT INTO `admin_blog_category` (`category_id`, `category_name`, `status`, `date`) VALUES
(1, 'ffffff', 'inactive', '2019-02-25'),
(2, 'ansh', 'active', '2019-02-25'),
(3, '234234wrwrf', NULL, '2019-02-25'),
(4, 'dasdas', NULL, '2019-02-25');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blog_comment`
--

INSERT INTO `admin_blog_comment` (`comment_id`, `user_id`, `user_comment`, `user_name`, `usercommimage`, `date`, `time`, `status`, `blog_id`, `comment_email`) VALUES
(1, 0, 'ghgfhf', 'hhhhh', 'blog_comment_5c73f59ed92a8.png', '2019-02-25', '19:02:38', 'active', 1, 'hjghjg'),
(2, 0, 'hyfgh', 'fghfgh', 'blog_comment_5c73f57a34bd2.png', '2019-02-25', '19:02:35', 'old', 1, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_emp_access`
--

INSERT INTO `admin_emp_access` (`index_id`, `emp_id`, `org_id`, `module_id`, `submodule_id`, `date`, `time`) VALUES
(1, 1, 0, 1, 1, '2019-02-25', '14:02:05'),
(2, 1, 0, 1, 2, '2019-02-25', '14:02:05'),
(3, 1, 0, 1, 3, '2019-02-25', '14:02:05'),
(4, 1, 0, 1, 4, '2019-02-25', '14:02:05'),
(5, 1, 0, 2, 5, '2019-02-25', '14:02:05'),
(6, 1, 0, 2, 6, '2019-02-25', '14:02:05'),
(7, 1, 0, 2, 7, '2019-02-25', '14:02:05'),
(8, 1, 0, 3, 8, '2019-02-25', '14:02:05'),
(9, 1, 0, 3, 9, '2019-02-25', '14:02:05');

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
(1, 'Blog', '2019-02-24', '25:20:00', 'active'),
(2, 'Public Content', '2019-02-21', '43:00:00', 'active'),
(3, 'User', '2019-02-22', '22:00:00', 'active');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(8, 3, 'Add User', 'admin/profile/index', '2019-02-20', '08:00:00', 'active'),
(9, 3, 'User Profile', 'admin/Profile/user_profile_list', '2019-02-20', '08:00:00', 'active');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_press`
--

INSERT INTO `gallery_press` (`gallery_id`, `gallery_img`, `gallery_des`, `created_date`, `created_time`) VALUES
(3, 'img_5c73c6b1d3d9a.jpg', 'asAS', '2019-02-25', '16:02:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_gallery`
--

INSERT INTO `public_gallery` (`gallery_id`, `gallery_img`, `gallery_des`, `created_date`, `created_time`) VALUES
(3, 'img_5c73e974af5fe.png', 'asAS', '2019-02-25', '18:02:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_public_content`
--

INSERT INTO `web_public_content` (`content_id`, `FK_added_by`, `content_cat_id`, `content_head`, `content`, `date`, `time`, `status`) VALUES
(1, 1, 'aboutus', 'About Us', '<p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Quas, veniam nobis minima. Delectus, dolorem rerum, eos nemo dolore amet quis, eum debiti modi voluptatibus ducimus molestiae laborum itaque quam maxime dolor amit laboriosam aperiam exercitationem.Cos nemo dolore amet quis, eum debiti modi voluptatibus ducimus molestiae laborum itaque quam maxime dolor amit laboriosam aperiam exercitationem. Amit dolor sit.</p>\n\n<div class=\"mb-30 ml-20 mt-30 row\">\n<div class=\"col-xs-6\">\n<ul>\n	<li>Education</li>\n	<li>Community</li>\n	<li>Education</li>\n</ul>\n</div>\n\n<div class=\"col-xs-6\">\n<ul>\n	<li>Education</li>\n	<li>Teamwork</li>\n	<li>Creativity</li>\n</ul>\n</div>\n</div>\n\n<p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Quas, veniam nobis minima. Delectus, dolorem rerum, eos nemo dolore amet quis, eum debiti modi voluptatibus ducimus molestiae laborum itaque quam maxime dolor amit laboriosam aperiam exercitationem.</p>\n', '2019-02-11', '16:00:18', 'active'),
(2, 1, 'terms-services', 'Terms and Services', '<p>gf</p>\r\n', '2019-01-28', '16:01:18', 'active'),
(3, 1, 'privacy-policy', 'Privacy Policy', '<p>gf</p>\r\n', '2019-01-28', '16:01:18', 'active'),
(4, 1, 'contact-us', 'Contact US', '<p>gf</p>\r\n', '2019-01-28', '16:01:18', 'active'),
(5, 1, 'Who-we-are', 'Who we are', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas doloribus facere perferendis eveniet ipsam reiciendis cumque aspernatur natus! Voluptatem laudantium totam, quia reiciendis quibusdam voluptate architecto impedit id iste rem mollitia enim reprehenderit fugit exercitationem ab placeat debitis vel excepturi molestiae laboriosam aut. Possimus expedita sint neque voluptatibus, odio, architecto, excepturi corrupti magnam sunt ipsa voluptatem consequuntur iusto quo, molestiae dolorem repudiandae. Consectetur dolorem placeat ratione eum quasi delectus, corrupti.</p>', '2019-02-11', '12:08:00', 'active'),
(6, 1, 'What-we-do', 'What we do', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas doloribus facere perferendis eveniet ipsam reiciendis cumque aspernatur natus! Voluptatem laudantium totam, quia reiciendis quibusdam voluptate architecto impedit id iste rem mollitia enim reprehenderit fugit exercitationem ab placeat debitis vel excepturi molestiae laboriosam aut. Possimus expedita sint neque voluptatibus, odio, architecto, excepturi corrupti magnam sunt ipsa voluptatem consequuntur iusto quo, molestiae dolorem repudiandae. Consectetur dolorem placeat ratione eum quasi delectus, corrupti.</p>', '2019-02-11', '12:08:00', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
