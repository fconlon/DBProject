-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 02:24 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `crn` int(5) NOT NULL DEFAULT '0',
  `room` varchar(15) DEFAULT NULL,
  `course` varchar(10) NOT NULL,
  `tid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`crn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`crn`, `room`, `course`, `tid`) VALUES
(12345, 'ENGCTR 201', 'CS1411', '0225145');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_code` varchar(10) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT 'TBD',
  `req` varchar(1) NOT NULL,
  `catalog` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `title`, `req`, `catalog`) VALUES
('CS1411', 'Programming Principles 1', 'Y', '2015'),
('CS3368', 'Artificial Intelligence', 'N', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
  `current` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `crn` int(11) NOT NULL,
  PRIMARY KEY (`crn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`current`, `max`, `crn`) VALUES
(30, 50, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `name` varchar(100) NOT NULL,
  `ten_status` varchar(9) DEFAULT NULL,
  `type` varchar(4) NOT NULL,
  `id` varchar(10) NOT NULL,
  `join_date` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`name`, `ten_status`, `type`, `id`, `join_date`) VALUES
('Francis James', 'Tenured', 'FTI', 'R00534133', 'April 25th 2015'),
('Heidi HoNeighbor', '', 'PROF', 'R00534134', 'April 25th 2015'),
('Tally Wanker', '', 'PROF', 'R00534135', 'April 25th 2015'),
('Albus  Dumbledore', 'GOD', 'PROF', 'R00534136', 'April 25th 2015'),
('Minerva McGonagall', 'Tenured', 'FTI', 'R00534137', 'April 25th 2015'),
('Frank Conlon', '', 'GPTI', 'R0225145', 'April 25th 2015');

-- --------------------------------------------------------

--
-- Table structure for table `instr_assign`
--

CREATE TABLE IF NOT EXISTS `instr_assign` (
  `crn` int(5) NOT NULL,
  `iid` varchar(10) NOT NULL,
  `new` varchar(1) NOT NULL,
  PRIMARY KEY (`crn`,`iid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instr_assign`
--

INSERT INTO `instr_assign` (`crn`, `iid`, `new`) VALUES
(12345, 'R00534134', 'N'),
(12345, 'R0225145', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `instr_pref`
--

CREATE TABLE IF NOT EXISTS `instr_pref` (
  `id` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `pref1` varchar(10) NOT NULL,
  `pref2` varchar(10) NOT NULL,
  `pref3` varchar(10) NOT NULL,
  `fall_load_pref` int(1) DEFAULT NULL,
  `spring_load_pref` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instr_req`
--

CREATE TABLE IF NOT EXISTS `instr_req` (
  `course_code` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `justification` varchar(200) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`course_code`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section_info`
--

CREATE TABLE IF NOT EXISTS `section_info` (
  `time` varchar(11) NOT NULL DEFAULT '00:00-00:00',
  `days` varchar(5) NOT NULL,
  `crn` int(5) NOT NULL DEFAULT '0',
  `section_num` varchar(3) NOT NULL,
  `text_isbn` varchar(50) DEFAULT NULL,
  `semester` varchar(4) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`crn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_info`
--

INSERT INTO `section_info` (`time`, `days`, `crn`, `section_num`, `text_isbn`, `semester`, `year`) VALUES
('11:00-11:50', 'MWF', 12345, '001', NULL, 'Fall', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE IF NOT EXISTS `ta` (
  `name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL COMMENT 'UNIQUE',
  `hours` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`name`, `id`, `hours`) VALUES
('Francis James', 225145, 8);

-- --------------------------------------------------------

--
-- Table structure for table `textbook`
--

CREATE TABLE IF NOT EXISTS `textbook` (
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `edition` int(2) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
