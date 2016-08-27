-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2016 at 12:38 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HospitalManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE IF NOT EXISTS `Doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `hospital_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`),
  KEY `hospital_Id` (`hospital_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`doctor_id`, `name`, `hospital_Id`) VALUES
(1, 'Kumar', 1),
(2, 'Vasant', 3),
(3, 'Krishna', 3),
(4, 'Naveen', 6),
(5, 'Nizam', 4),
(6, 'Sundar', 4),
(7, 'Shyam', 7),
(8, 'Gautam', 7),
(9, 'Peter', 7),
(10, 'Gauri', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Hospitals`
--

CREATE TABLE IF NOT EXISTS `Hospitals` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hospitals`
--

INSERT INTO `Hospitals` (`ID`, `NAME`, `CITY`) VALUES
(1, 'Apollo', 'Bengaluru'),
(2, 'Baptist', 'Bengaluru'),
(3, 'Apollo', 'Delhi'),
(4, 'Government Hospital', 'Hyderabad'),
(5, 'Fortis', 'Delhi'),
(6, 'Jayadeva', 'Bengaluru'),
(7, 'Apollo', 'Mumbai'),
(8, 'Fortis', 'Delhi'),
(9, 'Victoria', 'Delhi'),
(11, 'Apex', 'Bengaluru'),
(12, 'Anand', 'Bengaluru');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD CONSTRAINT `Doctors_ibfk_1` FOREIGN KEY (`hospital_Id`) REFERENCES `Hospitals` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
