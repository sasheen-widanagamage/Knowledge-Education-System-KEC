-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 05:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kec`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aId` int(10) NOT NULL,
  `aName` varchar(20) NOT NULL COMMENT 'none_3',
  `aEmail` varchar(20) NOT NULL,
  `aContactNo` int(10) NOT NULL,
  `a Password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grader`
--

CREATE TABLE `grader` (
  `gId` int(10) NOT NULL,
  `gName` varchar(20) NOT NULL,
  `gEmail` varchar(20) NOT NULL,
  `gContactNo` varchar(10) NOT NULL,
  `gSubject` varchar(20) NOT NULL,
  `gPassword` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grader`
--

INSERT INTO `grader` (`gId`, `gName`, `gEmail`, `gContactNo`, `gSubject`, `gPassword`) VALUES
(1, 'Amal Rupasinghe', 'amal12@gmail.com', '0761234567', 'Information Technolo', 1234),
(2, 'Nimal Ananda', 'nimal23@gmail.com', '0762345678', 'Physics', 2345),
(3, 'Kamal Gunaratne', 'kamal34@gmail.com', '0763456789', 'Chemistry', 5678),
(4, 'Ruwan Darshana', 'ruwan25@gmail.com', '0775534567', 'Combine Mathematics', 2331),
(5, 'Amith Nuwan', 'amith67@gmail.com', '0788545692', 'Engineering Technolo', 4565);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sId` int(10) NOT NULL,
  `sName` varchar(20) NOT NULL,
  `sEmail` varchar(20) NOT NULL,
  `sContactNo` varchar(10) NOT NULL,
  `sPassword` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sId`, `sName`, `sEmail`, `sContactNo`, `sPassword`) VALUES
(1, 'Harsha Heshan', 'harsha34@gmail.com', '0773456789', '3456'),
(2, 'Lasith Daluwatta', 'lasith23@gmail.com', '0772345678', '2345'),
(3, 'Maneesha Vishmi', 'maneesha45@gmail.com', '0774567891', '4567'),
(4, 'Sasheen Sri', 'sasheen12@gmail.com', '0771234567', '1234'),
(5, 'Chamodi Dinusha', 'chamodi03@gmail.com', '0778945156', '3366'),
(6, 'Amila Perera', 'amila33@gmail.com', '0778855445', '2241');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `grader`
--
ALTER TABLE `grader`
  ADD PRIMARY KEY (`gId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grader`
--
ALTER TABLE `grader`
  MODIFY `gId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
