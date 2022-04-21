-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2020 at 03:24 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `natdecode`
--
CREATE DATABASE IF NOT EXISTS `natdecode` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `natdecode`;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `time_msg` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `chatter` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `msg`, `time_msg`, `type`, `chatter`) VALUES
(1, 'capon mikako salawi', 1594649846, 'violent', 'famous'),
(2, 'Hi love how are you doing', 1594650189, 'Clean', 'famous');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encode` text NOT NULL,
  `decode` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_added` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `encode`, `decode`, `status`, `date_added`) VALUES
(1, 'mutula', 'Wrestlerss', 1, 0),
(2, 'mutubu', 'kill', 1, 0),
(3, 'mutu', 'poison', 1, 1594053622),
(4, 'labaran', 'Kill and destroy', 1, 1594053825),
(5, 'mikako', 'fight to death', 1, 1594053843),
(6, 'capon', 'hunter', 1, 1594053859);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(70) NOT NULL,
  `logged` int(11) NOT NULL,
  `last_logged` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `logged`, `last_logged`) VALUES
(1, 'famous', '12345', 1594649075, 1594649075);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
