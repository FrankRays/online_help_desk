-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 10:21 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ohd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
  `complain_id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(50) NOT NULL,
  `auth_name` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `problem` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `issue`, `auth_name`, `department`, `problem`, `date`) VALUES
(1, 'Datesheet', '', '', 'nshikw', '2015-10-05 00:36:34'),
(2, 'ihwjjwnj', 'vashudha', 'IT', 'dksknm', '2015-10-05 00:40:07'),
(3, 'n sn  ', 'memdnnj', ' nsn dej', 'sjdj', '2015-10-05 00:44:06'),
(4, 'b d ', 'wn ns', 'dndn', 'dh', '2015-10-05 00:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `faculty_department` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `first_name`, `last_name`, `faculty_department`, `address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(1, 'Bhoomi', 'Gupta', 'IT', 'bla bla,27,skkk,new delhi', 1234567890, 'mcijfijf@mait.com', 'bhoomi1', 'bhoomi1', '0000-00-00 00:00:00'),
(2, 'vinay', 'saini', 'IT', 'behk,new delhi', 2134567890, 'mudhi@mait.com', 'vinay', 'vinay', '2015-10-04 19:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `lab_assistent`
--

CREATE TABLE IF NOT EXISTS `lab_assistent` (
  `lab_ass_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`lab_ass_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lab_assistent`
--

INSERT INTO `lab_assistent` (`lab_ass_id`, `first_name`, `last_name`, `department`, `address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(1, 'rohit', 'nkxkn', '', 'zbabjs,new delhi', 1234556677, 'modi#@sbdskd.o', 'asdcd', 'asdsdd', '2015-10-04 20:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_name` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `d_o_u` date NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `asset_name`, `position`, `department`, `reason`, `d_o_u`, `full_name`, `details`, `date`) VALUES
(1, 'Audi', 'Student', 'it', 'gfjvkkjkvk', '0000-00-00', 'm njnjc', '', '2015-10-05 01:42:52'),
(2, 'hvm,b', 'Faculty', 'it', 'gvnbhvgfhvn', '0000-00-00', 'jbjn', 'jefvmn rv jf ', '2015-10-05 01:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `department`, `address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(2, 'qswd', 'sdwd', '', '', 0, '', 'asdmda', 'nsdc', '2015-10-04 21:33:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
