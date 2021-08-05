-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2016 at 05:40 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_username` varchar(255) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `ad_password` varchar(255) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_username`, `ad_password`) VALUES
(1, 'ejaz', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(3, 'Concerts'),
(4, 'Islamic Events'),
(5, 'Night Show'),
(6, 'Party');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_title` varchar(30) NOT NULL,
  `e_category` varchar(255) NOT NULL,
  `e_date` text NOT NULL,
  `e_location` varchar(255) NOT NULL,
  `e_description` varchar(200) NOT NULL,
  `e_organizer` varchar(500) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `e_title`, `e_category`, `e_date`, `e_location`, `e_description`, `e_organizer`) VALUES
(25, 'marriage', 'Islamic Events', '04/22/2016', 'Ramada', 'ramzan  ki shadi ha', 'ali'),
(24, 'marriage', 'Concerts', '04/21/2016', 'Multan Sports Ground', 'hah', 'ali');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(255) NOT NULL,
  `loc_status` varchar(255) NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `loc_name`, `loc_status`) VALUES
(3, 'Multan Sports Ground', 'Available'),
(2, 'Fort Qasim', 'Available'),
(4, 'Art councal', 'Available'),
(5, 'Ramada', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `p_event` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`p_id`, `p_name`, `p_event`) VALUES
(1, 'farhanrashi', 'marriage'),
(2, 'ramzan', 'milad un nabi'),
(3, 'ali', 'milad un nabi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_address` varchar(334) NOT NULL,
  `u_name` varchar(255) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `u_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_phoneno` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_address`, `u_name`, `u_password`, `u_email`, `u_phoneno`, `Status`) VALUES
(15, 'multan', 'ali', '1234567', 'mejazawan89@gmail.com', '03146263836', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
