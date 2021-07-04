-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2019 at 05:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newci_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

DROP TABLE IF EXISTS `admin_details`;
CREATE TABLE IF NOT EXISTS `admin_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass_view` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `admin_image` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `username`, `password`, `pass_view`, `admin_email`, `name`, `company`, `admin_image`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'wtm.golam@gmail.com', 'ambia', 'wtm1', '1572608305Penguins.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

DROP TABLE IF EXISTS `event_master`;
CREATE TABLE IF NOT EXISTS `event_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `start_time` varchar(12) NOT NULL,
  `end_time` varchar(12) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`id`, `name`, `event_start_date`, `event_end_date`, `start_time`, `end_time`, `location`, `description`, `img`, `entry_date`) VALUES
(1, 'SHISH KEBAB', '2019-11-14', '2019-11-22', '13:00', '11:00', 'fghgfh', 'hfghfgh', '1573483490Chrysanthemum.jpg', '2019-11-13'),
(2, 'test', '2019-11-11', '2019-11-23', '00:00:00', '00:00:00', 'kolkata', 'jtyjtyjtyjk', '1573483749Penguins.jpg', '2019-11-11'),
(3, 'SHISH KEBAB', '2019-11-11', '2019-11-12', '00:00:00', '00:00:00', 'kolkata', '', '1573482440Penguins.jpg', '2019-11-11'),
(4, 'golam ambia', '2019-11-11', '2019-11-20', '00:00:00', '00:00:00', 'dhfhfhftgh', 'dfhfdhfh', '1573482587Hydrangeas.jpg', '2019-11-11'),
(5, 'SHISH KEBAB', '2019-11-12', '2019-11-13', '00:00:00', '00:00:00', 'kol', 'test', '1573556295Lighthouse.jpg', '2019-11-12'),
(6, 'demo', '2019-11-12', '2019-11-14', '00:00:00', '00:00:00', 'kolkata', 'gbhbg hrthrt', '1573566969Lighthouse.jpg', '2019-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `event_master_images`
--

DROP TABLE IF EXISTS `event_master_images`;
CREATE TABLE IF NOT EXISTS `event_master_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_master_images`
--

INSERT INTO `event_master_images` (`id`, `image`, `event_id`) VALUES
(1, '1573556295_Koala.jpg', 5),
(2, '1573556295_Penguins.jpg', 5),
(3, '1573556295_Tulips.jpg', 5),
(6, '1573561669_Penguins.jpg', 5),
(7, '1573561669_Tulips.jpg', 5),
(28, '1573566899_Desert.jpg', 1),
(41, '1573654596_Tulips.jpg', 1),
(39, '1573654596_Lighthouse.jpg', 1),
(40, '1573654596_Penguins.jpg', 1),
(31, '1573566899_Koala.jpg', 1),
(38, '1573654595_Koala.jpg', 1),
(34, '1573566969_Koala.jpg', 6),
(35, '1573566969_Lighthouse.jpg', 6),
(36, '1573566969_Penguins.jpg', 6),
(37, '1573566969_Tulips.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

DROP TABLE IF EXISTS `general_setting`;
CREATE TABLE IF NOT EXISTS `general_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `logo`, `contact`, `email`, `facebook`, `address`, `twitter`, `linkedin`, `entry_date`) VALUES
(1, '1572608305Penguins.jpg', '7003832809', 'wtm.golam@gmail.com', 'https://www.facebook.com/', 'abc, ab lane,kol-50', 'tw', 'ln', '2019-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `phone`, `status`, `entry_date`) VALUES
(1, 'amb1', 'wtm.golam@gmail.com', '7003832809', 'Active', '2019-11-07'),
(5, 'golam ambia', 'wtm.golam1@gmail.com', '07003832809', 'Inactive', '2019-11-11'),
(3, 'golam ambia', 'wtm.golam@gmail.com', '07003832809', 'Active', '2019-11-08'),
(7, 'golam ambia', 'wtm.golamhth@gmail.com', '07003832809', 'Inactive', '2019-11-13'),
(8, 'Demo test', 'wtm.golam444@gmail.com', '07003832809', 'Inactive', '2019-11-13'),
(9, 'golam ambia', 'wtm.golamfd@gmail.com', '07003832809', 'Active', '2019-11-13'),
(10, 'What is Lorem Ipsum?', 'wtm.golamdsdsd@gmail.com', '07003832809', 'Active', '2019-11-13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
