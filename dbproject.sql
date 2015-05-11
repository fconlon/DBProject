-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2015 at 04:07 AM
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
('CS3368', 'Artificial Intelligence', 'N', '2015'),
('CS4352', 'Operating Systems', 'Y', '2015'),
('CS5331', 'special course', 'N', '2013');

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
(36, 50, 12345),
(23, 65, 23456),
(3, 40, 54321);

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
('Minerva McGonagall', 'Tenured', 'PROF', 'R00534137', 'May 10th 2015'),
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
(12345, 'R00534137', 'N'),
(54321, 'R00534136', 'Y');

-- --------------------------------------------------------

--
-- Stand-in structure for view `instr_courses`
--
CREATE TABLE IF NOT EXISTS `instr_courses` (
`course_code` varchar(10)
,`days` varchar(5)
,`time` varchar(11)
,`room` varchar(15)
,`year` int(4)
,`semester` varchar(6)
,`iid` varchar(10)
);
-- --------------------------------------------------------

--
-- Table structure for table `instr_load_pref`
--

CREATE TABLE IF NOT EXISTS `instr_load_pref` (
  `id` varchar(10) NOT NULL,
  `load_pref` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instr_load_pref`
--

INSERT INTO `instr_load_pref` (`id`, `load_pref`) VALUES
('R00534133', 1),
('R00534134', 2),
('R00534137', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instr_req`
--

CREATE TABLE IF NOT EXISTS `instr_req` (
  `course_code` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `justification` varchar(200) DEFAULT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`course_code`,`id`,`year`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instr_req`
--

INSERT INTO `instr_req` (`course_code`, `id`, `title`, `justification`, `year`) VALUES
('CS4352', 'R00534133', 'Operating Systems', 'Because I like newbs!', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `r005341372015`
--

CREATE TABLE IF NOT EXISTS `r005341372015` (
  `course_code` varchar(10) NOT NULL DEFAULT '',
  `pref` int(1) DEFAULT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r005341372015`
--

INSERT INTO `r005341372015` (`course_code`, `pref`) VALUES
('CS1411', 2);

--
-- Triggers `r005341372015`
--
DROP TRIGGER IF EXISTS `R005341372015_pref`;
DELIMITER //
CREATE TRIGGER `R005341372015_pref` BEFORE INSERT ON `r005341372015`
 FOR EACH ROW BEGIN
        IF NEW.pref<0 OR NEW.pref>3 THEN
        SET NEW.pref=NULL;
        END IF;
        END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room_capacity`
--

CREATE TABLE IF NOT EXISTS `room_capacity` (
  `room` varchar(15) NOT NULL,
  `capacity` int(15) NOT NULL,
  `distance` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_capacity`
--

INSERT INTO `room_capacity` (`room`, `capacity`, `distance`) VALUES
('ENGCTR 201', 40, 'N'),
('ENGCTR 204', 36, 'N'),
('ENGCTR 205', 36, 'N'),
('ENGCTR 110', 36, 'Y'),
('Livermore 104', 58, 'Y'),
('PE 118', 40, 'N'),
('PE 117', 77, 'N'),
('Holden Hall 006', 73, 'N'),
('Holden Hall 155', 44, 'N'),
('Holden Hall 038', 65, 'N'),
('Holden Hall 126', 59, 'N'),
('Holden Hall 130', 64, 'N'),
('Holden Hall 154', 40, 'N'),
('Holden Hall 225', 42, 'N'),
('ELECE 118', 36, 'N'),
('Civil Engr 001', 61, 'N'),
('Civil Engr 211', 48, 'N'),
('Civil Engr 009', 34, 'N'),
('IE 205', 92, 'N'),
('IE 103', 44, 'N'),
('ME 146', 40, 'N'),
('Math 108', 35, 'N');

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
  `semester` varchar(6) DEFAULT NULL,
  `year` int(4) NOT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `room` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`crn`),
  KEY `course_code` (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_info`
--

INSERT INTO `section_info` (`time`, `days`, `crn`, `section_num`, `text_isbn`, `semester`, `year`, `course_code`, `room`) VALUES
('9:30-10:50', 'TR', 12345, '001', NULL, 'Fall', 2015, 'CS4352', 'ENGCTR 204'),
('8:00-8:50', 'MWF', 23456, '001', NULL, 'Fall', 2014, 'CS4352', 'Holden Hall 038'),
('12:30-2:00', 'TR', 54321, '001', NULL, 'Spring', 2013, 'CS5331', 'ENGCTR 201');

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE IF NOT EXISTS `ta` (
  `name` varchar(50) NOT NULL,
  `id` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`name`, `id`) VALUES
('Francis James', 'R0225145'),
('Krystin Steelman', 'R0225146');

-- --------------------------------------------------------

--
-- Table structure for table `ta_assign`
--

CREATE TABLE IF NOT EXISTS `ta_assign` (
  `crn` int(5) NOT NULL,
  `tid` varchar(10) NOT NULL,
  `hours` int(2) DEFAULT NULL,
  PRIMARY KEY (`crn`,`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_assign`
--

INSERT INTO `ta_assign` (`crn`, `tid`, `hours`) VALUES
(12345, 'R0225145', 5);

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

--
-- Dumping data for table `textbook`
--

INSERT INTO `textbook` (`title`, `author`, `edition`, `isbn`, `publisher`) VALUES
('Databases', 'Me', 1, '123456789', 'Eagle');

-- --------------------------------------------------------

--
-- Structure for view `instr_courses`
--
DROP TABLE IF EXISTS `instr_courses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `instr_courses` AS select `s`.`course_code` AS `course_code`,`s`.`days` AS `days`,`s`.`time` AS `time`,`s`.`room` AS `room`,`s`.`year` AS `year`,`s`.`semester` AS `semester`,`i`.`iid` AS `iid` from (`section_info` `s` join `instr_assign` `i`) where (`s`.`crn` = `i`.`crn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instr_load_pref`
--
ALTER TABLE `instr_load_pref`
  ADD CONSTRAINT `instr_load_pref_ibfk_1` FOREIGN KEY (`id`) REFERENCES `instructor` (`id`);

--
-- Constraints for table `instr_req`
--
ALTER TABLE `instr_req`
  ADD CONSTRAINT `instr_req_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
  ADD CONSTRAINT `instr_req_ibfk_2` FOREIGN KEY (`id`) REFERENCES `instructor` (`id`);

--
-- Constraints for table `r005341372015`
--
ALTER TABLE `r005341372015`
  ADD CONSTRAINT `r005341372015_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`);

--
-- Constraints for table `section_info`
--
ALTER TABLE `section_info`
  ADD CONSTRAINT `section_info_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
