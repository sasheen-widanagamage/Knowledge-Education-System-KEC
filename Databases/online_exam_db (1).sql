-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 05:31 PM
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
-- Database: `online_exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_id`, `feedback_text`, `date`) VALUES
(6, 122890, 'good', '2024-10-07 09:05:52'),
(10, 122890, 'nice', '2024-10-07 09:07:41'),
(17, 122890, 'hi', '2024-10-07 15:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `registration_id` varchar(50) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `study_year` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `registration_id`, `faculty`, `study_year`) VALUES
(122890, 'Nimal jayakodi', 'RB001', 'Computer Science', '1st Year'),
(213202, 'shani pathirana', 'RB002', 'Information Technology', '1st Year'),
(213654, 'rajaman modin ', 'RB003', 'Software Engineering', '2nd Year'),
(346578, 'Diana anthony', 'RB004', 'Information Systems', '2nd Year'),
(675234, 'gagana abiman', 'RB005', 'Computer Science', '3rd Year'),
(897231, 'rosahna dilmanka', 'RB006', 'Web Development', '3rd Year');

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` int(6) NOT NULL,
  `course_code` varchar(7) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `grade` varchar(4) NOT NULL,
  `marks` int(5) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `course_code`, `course_name`, `grade`, `marks`, `status`) VALUES
(122890, 'IN1310 ', 'JAVA', 'A', 80, 'PASS'),
(122890, 'IN1620', 'Web Technologies', 'B', 68, 'PASS'),
(122890, 'IN1900', 'ICT project', 'C-', 43, 'FAIL'),
(122890, 'IN2200', 'Software Engineering', 'A', 79, 'PASS'),
(122890, 'IN2320', 'Architecture', 'B', 68, 'PASS'),
(122890, 'IS3440', 'QA', 'A', 89, 'PASS'),
(213202, 'IN1310', 'JAVA', 'B', 68, 'PASS'),
(213202, 'IN1620', 'Web Technologies', 'C+', 60, 'PASS'),
(213202, 'IN1900', 'ICT Project', 'A', 80, 'PASS'),
(213202, 'IN2200', 'Software Engineering', 'C', 55, 'FAIL'),
(213202, 'IS3440', 'QA', 'A', 89, 'PASS'),
(213654, 'IN1311', 'JAVA', 'A+', 92, 'PASS'),
(213654, 'IN1620 ', 'Web Technologies ', 'B', 68, 'PASS'),
(213654, 'IN1621', 'Web Technologies', 'B+', 77, 'PASS'),
(213654, 'IN1901', 'ICT Project', 'C-', 49, 'FAIL'),
(346578, 'IN1900 ', 'ICT project', 'C-', 43, 'FAIL'),
(346578, 'IN2202', 'Software Engineering', 'B', 70, 'PASS'),
(675234, 'IN2200 ', 'Software Engineering', 'A', 79, 'PASS'),
(675234, 'IN2321', 'Architecture', 'A-', 82, 'PASS'),
(897231, 'IN1622', 'Web Technologies', 'C+', 62, 'PASS'),
(897231, 'IN1902', 'ICT Project', 'B', 65, 'PASS'),
(897231, 'IN2320 ', 'Architecture', 'B', 68, 'PASS'),
(897231, 'IS3440', 'QA', 'A', 90, 'PASS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`,`course_code`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
