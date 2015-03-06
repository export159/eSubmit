-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2015 at 04:09 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_esubmit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_no` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_no` (`student_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `student_no`, `first_name`, `middle_name`, `last_name`) VALUES
(1, '1101768', 'Jerome', 'Patino', 'Noveda'),
(2, '1501678', 'Jude Carlo', 'ambooot', 'Abudda'),
(3, '1401556', 'Jude', 'Bangoy', 'Noveda'),
(4, '1401557', 'Jan Ulrico Manuel', 'ambooot', 'Aguilar'),
(5, '1401236', 'Ronald Jay', 'amboot', 'Macabenta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submitted_files`
--

CREATE TABLE IF NOT EXISTS `tbl_submitted_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `file_name` varchar(20) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `date_submitted` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_submitted_files`
--

INSERT INTO `tbl_submitted_files` (`id`, `student_id`, `file_name`, `destination`, `schedule`, `date_submitted`, `description`, `remarks`) VALUES
(16, '1101768', 'program2.cpp', '../files/TFri 7 30 - 9 00/Noveda, Jerome Patino/program2.cpp', 'TFri 7:30 - 9:00', '02/27/15 : 06:25:45', 'wahahaha', ''),
(17, '1401557', 'program1.cpp', '../files/Wed 1 00 - 4 00/Aguilar, Jan Ulrico Manuel ambooot/program1.cpp', 'Wed 1:00 - 4:00', '02/27/15 : 07:58:07', 'first program', ''),
(20, '1401236', 'program4.cpp', '../files/MTh 7 30 - 9 00/Macabenta, Ronald Jay amboot/program4.cpp', 'MTh 7:30 - 9:00', '02/27/15 : 13:31:46', 'wahaha try\r\n', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_submitted_files`
--
ALTER TABLE `tbl_submitted_files`
  ADD CONSTRAINT `tbl_submitted_files_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
