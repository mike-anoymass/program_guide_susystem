-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2022 at 05:20 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `program_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL,
  `type` varchar(10) DEFAULT 'admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_on`, `type`) VALUES
(1, 'nancy thunga banda', 'nancy@gmail.com', '1234', '2022-07-18 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(400) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade_weights`
--

DROP TABLE IF EXISTS `grade_weights`;
CREATE TABLE IF NOT EXISTS `grade_weights` (
  `weight_number` varchar(10) NOT NULL,
  `description` varchar(30) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`weight_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(7) NOT NULL,
  `name` varchar(100) NOT NULL,
  `faculty` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `name` (`name`),
  KEY `faculty` (`faculty`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_subjects`
--

DROP TABLE IF EXISTS `program_subjects`;
CREATE TABLE IF NOT EXISTS `program_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program` (`program`),
  KEY `subject` (`subject`),
  KEY `weight` (`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `body` varchar(300) NOT NULL,
  `response` varchar(200) DEFAULT '',
  `status` tinyint(1) DEFAULT '0',
  `student` int(11) NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `replied_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student` (`student`),
  KEY `admin` (`admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) DEFAULT '',
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(70) DEFAULT '',
  `phone` varchar(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `msce_year` int(5) NOT NULL,
  `msce_school` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL,
  `type` varchar(15) DEFAULT 'student',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_subjects`
--

DROP TABLE IF EXISTS `students_subjects`;
CREATE TABLE IF NOT EXISTS `students_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student` (`student`),
  KEY `subject` (`subject`),
  KEY `weight` (`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) DEFAULT '',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`, `created_on`) VALUES
(3, 'mathematics', 'tsado', '2022-08-08 09:29:02'),
(4, 'social studies', 'for social studies', '2022-08-11 12:12:57'),
(5, 'life skills ', 'socialogy', '2022-08-12 08:50:38'),
(6, 'physics', 'physical science', '2022-08-12 08:50:57'),
(7, 'chemist', 'chemistry', '2022-08-12 08:51:12'),
(8, 'geography', 'human and physical geography', '2022-08-12 08:52:31'),
(9, 'english', 'for english', '2022-08-29 12:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `suggested_programs`
--

DROP TABLE IF EXISTS `suggested_programs`;
CREATE TABLE IF NOT EXISTS `suggested_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program` (`program`),
  KEY `student` (`student`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_subjects`
--
ALTER TABLE `program_subjects`
  ADD CONSTRAINT `program_subjects_ibfk_1` FOREIGN KEY (`program`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_subjects_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_subjects_ibfk_3` FOREIGN KEY (`weight`) REFERENCES `grade_weights` (`weight_number`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`admin`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `students_subjects`
--
ALTER TABLE `students_subjects`
  ADD CONSTRAINT `students_subjects_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_subjects_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_subjects_ibfk_3` FOREIGN KEY (`weight`) REFERENCES `grade_weights` (`weight_number`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `suggested_programs`
--
ALTER TABLE `suggested_programs`
  ADD CONSTRAINT `suggested_programs_ibfk_1` FOREIGN KEY (`program`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suggested_programs_ibfk_2` FOREIGN KEY (`student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
