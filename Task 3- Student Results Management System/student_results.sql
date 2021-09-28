-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2021 at 10:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_results`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`userid`, `password`) VALUES
('admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `name` varchar(30) NOT NULL,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`name`, `id`) VALUES
('Maths', 1),
('Physics', 2),
('Chemistry', 3),
('Biology', 4),
('Computer Science', 5),
('English', 6);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class` varchar(30) NOT NULL,
  `p1` int(3) NOT NULL,
  `p2` int(3) NOT NULL,
  `p3` int(3) NOT NULL,
  `p4` int(3) NOT NULL,
  `p5` int(3) NOT NULL,
  `p6` int(3) NOT NULL,
  `marks` int(3) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `marks`, `percentage`) VALUES
('Sujana Ray', 101, 'Maths', 45, 46, 10, 9, 9, 95, 214, 93.0435),
('Ana Verma', 102, 'Maths', 47, 46, 7, 10, 10, 98, 218, 94.7826),
('Harini Prasad', 103, 'Maths', 49, 50, 8, 8, 10, 91, 216, 93.913),
('Nina Patel', 201, 'Physics', 45, 40, 8, 8, 9, 79, 189, 82.1739),
('Amit Das', 401, 'Biology', 47, 48, 9, 8, 9, 90, 211, 91.7391),
('Arnab Shah', 402, 'Biology', 45, 42, 8, 9, 6, 92, 202, 87.8261);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES
('Amit Das', 401, 'Biology'),
('Arnab Shah', 402, 'Biology'),
('Han Mang', 301, 'Chemistry'),
('Harry Singh', 501, 'Computer Science'),
('Jung Son', 601, 'English'),
('Ana Verma', 102, 'Maths'),
('Harini Prasad', 103, 'Maths'),
('Olivia R', 104, 'Maths'),
('Sujana Ray', 101, 'Maths'),
('Nina Patel', 201, 'Physics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`name`,`rno`),
  ADD KEY `class_name` (`class_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `class` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
