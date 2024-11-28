-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2018 at 12:41 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emp`
--
CREATE DATABASE IF NOT EXISTS `emp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `emp`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projid` int(11) NOT NULL,
  `bugdesc` varchar(500) NOT NULL,
  `sshot` varchar(500) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `projid`, `bugdesc`, `sshot`, `dt`, `status`) VALUES
(2, 1, 'Upload Problem exists...', 'uploads/14407673191.jpg', '2018-01-28', 'pending'),
(3, 5, 'Session Tracking Error...', 'uploads/1440856968queryconsole.jpg', '2018-01-29', 'completed'),
(4, 5, 'User Interface alignment adjustment', 'uploads/1524217421diet-dreamweaver-template.jpg', '2018-04-20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cattendance`
--

CREATE TABLE IF NOT EXISTS `cattendance` (
  `empid` varchar(20) DEFAULT NULL,
  `attenddate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cattendance`
--

INSERT INTO `cattendance` (`empid`, `attenddate`) VALUES
('1001', '2013-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `bugid` int(11) NOT NULL,
  `replymsg` varchar(100) NOT NULL,
  PRIMARY KEY (`fromid`,`toid`,`bugid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `fromid`, `toid`, `bugid`, `replymsg`) VALUES
(1, 1002, 1001, 3, 'Session starting function misplaced...'),
(3, 1002, 1003, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `empdetails`
--

CREATE TABLE IF NOT EXISTS `empdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empname` varchar(50) DEFAULT NULL,
  `empid` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `usertype` varchar(30) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `ph` varchar(20) DEFAULT NULL,
  `contactaddr` varchar(100) DEFAULT NULL,
  `permaddr` varchar(100) DEFAULT NULL,
  `compemailid` varchar(30) DEFAULT NULL,
  `persemailid` varchar(30) DEFAULT NULL,
  `sal` int(11) DEFAULT NULL,
  `tl` varchar(50) DEFAULT NULL,
  `pl` varchar(50) DEFAULT NULL,
  `domain` varchar(100) NOT NULL DEFAULT 'PHP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `empid` (`empid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `empdetails`
--

INSERT INTO `empdetails` (`id`, `empname`, `empid`, `sex`, `dob`, `usertype`, `dept`, `ph`, `contactaddr`, `permaddr`, `compemailid`, `persemailid`, `sal`, `tl`, `pl`, `domain`) VALUES
(13, 'Balaji', 3001, 'male', '1-Jan-1970', 'projectmanager', 'development', '9877788778', '112,North Street,', '112,North Street,', 'balaji@intranet.com', 'balaji', 55000, NULL, NULL, 'PHP'),
(14, 'Ganesh', 2001, 'male', '4-May-1977', 'teamleader', 'development', '5587854547', '87,North Arcade', '87,North Arcade', 'ganesh@intranet.com', 'ganesh', 35600, NULL, '3001', 'PHP'),
(15, 'Murugan', 1001, 'male', '4-Apr-1975', 'programmer', 'development', '6656545454', '88,North Masi St,', '88,North Arcade,', 'murugan@intranet.com', 'murugan', 30000, '2001', NULL, 'PHP'),
(16, 'Anand', 3002, 'male', '4-May-1979', 'projectmanager', 'design', '6545654454', '88,North Arcade,', '88,North Arcade,', 'anand@zenith.com', 'anand', 25000, NULL, NULL, 'PHP'),
(17, 'James', 3003, 'male', '9-May-1980', 'projectmanager', 'design', '5874548785', '77,Park Avenue,', '77,Parm Avenue,', 'james@zenith.com', 'james', 28500, NULL, NULL, 'PHP'),
(18, 'Zahir', 1002, 'male', '1-Jan-1970', 'programmer', 'development', '9800055666', '21,South street,', '21,South street,', 'zahir@gmail.com', 'zahir', 25000, NULL, NULL, 'Java'),
(19, 'Samuel', 1003, 'male', '1-Jan-1970', 'programmer', 'development', '8958755855', '343,Main street,', '343,Main street,', 'sam@gmail.com', 'sam', 25000, NULL, NULL, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `proj`
--

CREATE TABLE IF NOT EXISTS `proj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(500) NOT NULL,
  `cdate` varchar(20) NOT NULL,
  `cyears` varchar(10) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `empid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pname` (`pname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `proj`
--

INSERT INTO `proj` (`id`, `pname`, `cdate`, `cyears`, `domain`, `empid`) VALUES
(1, 'CMS', '2018-01-26', '1', 'Java', 1001),
(2, 'Shopping Cart', '2018-01-01', '1', 'PHP', 2001),
(5, 'Telecom Project', '2018-01-01', '2', 'Java', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bugid` int(11) NOT NULL,
  `projid` int(11) NOT NULL,
  `solution` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`id`, `bugid`, `projid`, `solution`) VALUES
(2, 3, 5, 'Browser Problem Fixed...');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `taskid` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(100) DEFAULT NULL,
  `plno` varchar(20) DEFAULT NULL,
  `plname` varchar(50) DEFAULT NULL,
  `tlno` varchar(20) DEFAULT 'N.A',
  `tlname` varchar(50) DEFAULT 'N.A',
  `empid` varchar(20) DEFAULT 'N.A',
  `empname` varchar(50) DEFAULT 'N.A',
  `status` varchar(20) DEFAULT 'Pending',
  `allotdate` date DEFAULT NULL,
  `finished` date DEFAULT NULL,
  PRIMARY KEY (`taskid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskid`, `task`, `plno`, `plname`, `tlno`, `tlname`, `empid`, `empname`, `status`, `allotdate`, `finished`) VALUES
(5, 'BSNL Payroll Module', '3001', 'Balaji', '2001', 'Ganesh', '1001', 'Murugan', 'Pending', '2013-04-05', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
