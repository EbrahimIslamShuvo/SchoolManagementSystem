-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 09:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `studentId` text DEFAULT NULL,
  `teacehrId` text DEFAULT NULL,
  `courseId` text DEFAULT NULL,
  `year` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `shift` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`studentId`, `teacehrId`, `courseId`, `year`, `class`, `shift`, `status`, `day`) VALUES
('01', 'T1', 'CSC455', '2025', '10', 'Morning', 'Absent', '2025-01-16'),
('01', 'T1', 'CSC455', '2025', '10', 'Morning', 'Present', '2025-01-17'),
('02', 'T1', 'CSC387', '2025', '08', 'Day', 'Absent', '2025-01-16'),
('01', 'T1', 'CSC455', '2025', '10', 'Morning', 'Absent', '2025-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `name` text DEFAULT NULL,
  `id` text DEFAULT NULL,
  `teacherId` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `shift` text DEFAULT NULL,
  `year` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `id`, `teacherId`, `class`, `shift`, `year`) VALUES
('DBMS', 'CSC455', 'T1', '10', 'Morning', '2025'),
('SAD', 'CSC387', 'T1', '08', 'Day', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `studentId` text DEFAULT NULL,
  `teacherId` text DEFAULT NULL,
  `courseId` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `year` text DEFAULT NULL,
  `getMark` text DEFAULT NULL,
  `totalMark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`studentId`, `teacherId`, `courseId`, `class`, `year`, `getMark`, `totalMark`) VALUES
('01', 'T1', 'CSC455', '10', '2025', '75', '80'),
('02', 'T1', 'CSC387', '08', '2025', '40', '50');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` text DEFAULT NULL,
  `roll` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `shift` text DEFAULT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `roll`, `phone`, `class`, `shift`, `year`) VALUES
('Sawel', '01', '0145654334', '10', 'Morning', '2025'),
('Mida', '02', '01641651', '08', 'Day', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` text DEFAULT NULL,
  `id` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `id`, `phone`, `email`, `password`, `type`) VALUES
('Ebrahim', 'A1', '01623794244', 'ebrahim@gmail.com', '123', 'admin'),
('Akash', 'T1', '015465454', 'akash@gmail.com', '147', 'teacher'),
('Allen', 'T2', '01541651', 'allen@gmail.com', '159', 'teacher');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
