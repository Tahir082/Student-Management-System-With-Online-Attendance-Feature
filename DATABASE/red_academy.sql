-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 06:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `red_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `name`, `password`) VALUES
('101systemerror@gmail.com', 'Abdullah Muhammad Tahir', '562425268634940');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `coursename` varchar(50) NOT NULL,
  `teacher_name` text NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `stdname` text NOT NULL,
  `stdemail` varchar(50) NOT NULL,
  `att_time` time NOT NULL,
  `att_date` date NOT NULL,
  `attendance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`coursename`, `teacher_name`, `teacher_email`, `stdname`, `stdemail`, `att_time`, `att_date`, `attendance`) VALUES
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-09-21', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Shoaib Shoumik', 'shoumik@gmail.com', '10:46:00', '2020-09-21', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Azrin Karim Lamisa', 'azrin@gmail.com', '10:50:00', '2020-09-21', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Ashikur Rahman', 'ashikur@gmail.com', '10:45:00', '2020-09-21', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-09-14', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-09-09', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-09-07', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-09-02', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-08-26', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-08-24', 1),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:54:00', '2020-08-19', 1),
('HTML', 'Injamam-Ul Islam', 'injam@gmail.com', 'Abdullah Muhammad Tahir', 'amtahir74@gmail.com', '15:43:16', '2020-09-21', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:12:00', '2020-09-19', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-09-18', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-09-12', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-09-11', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-09-05', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-09-04', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-29', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-28', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-22', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-21', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-15', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-14', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-08', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:04:18', '2020-08-07', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Abdullah Muhammad Tahir', 'amtahir74@gmail.com', '09:02:18', '2020-09-25', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Rifah Tatrapi', '2017-2-60-137@std.ewubd.edu', '09:02:18', '2020-09-25', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Azrin Karim Lamisa', 'azrin@gmail.com', '09:02:18', '2020-09-25', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Mehfuz Ahmed Anik', 'mehfuz@gmail.com', '09:02:18', '2020-09-25', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Nahidul Islam', 'nahid@gmail.com', '09:02:18', '2020-09-25', 1),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '10:02:46', '2020-09-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

CREATE TABLE `courseinfo` (
  `coursename` varchar(50) NOT NULL,
  `routine` text NOT NULL,
  `teacher` text NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `stdname` text NOT NULL,
  `stdemail` varchar(50) NOT NULL,
  `enroll_date` date NOT NULL,
  `drop_req` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`coursename`, `routine`, `teacher`, `teacher_email`, `stdname`, `stdemail`, `enroll_date`, `drop_req`) VALUES
('Object Oriented PHP', 'MW', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Salman Sourav', '2017-1-60-077@gmail.com', '2020-07-01', 'null'),
('Bootstrap', 'TR', 'Injamam-Ul Islam', 'injam@gmail.com', 'Salman Sourav', '2017-1-60-077@gmail.com', '2020-07-01', 'null'),
('Laravel', 'MW', 'Abdullah-Al Imran', 'imran@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '2020-07-01', 'PENDING'),
('HTML', 'MW', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '2020-07-01', 'PENDING'),
('Node.js', 'FA', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '2020-07-01', 'null'),
('Object Oriented PHP', 'MW', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Rayhan-E- Zannat', 'zannat@gmail.com', '2020-07-01', 'null'),
('Bootstrap', 'TR', 'Injamam-Ul Islam', 'injam@gmail.com', 'Rayhan-E- Zannat', 'zannat@gmail.com', '2020-07-01', 'null'),
('Object Oriented PHP', 'MW', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Sadia  Tasnim Tuba', 'sadia107@gmail.com', '2020-07-01', 'null'),
('Bootstrap', 'TR', 'Injamam-Ul Islam', 'injam@gmail.com', 'Sadia  Tasnim Tuba', 'sadia107@gmail.com', '2020-07-01', 'null'),
('Laravel', 'MW', 'Abdullah-Al Imran', 'imran@gmail.com', 'Shoaib Shoumik', 'shoumik@gmail.com', '2020-07-01', 'null'),
('Object Oriented PHP', 'MW', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Shoaib Shoumik', 'shoumik@gmail.com', '2020-07-01', 'null'),
('HTML', 'MW', 'Injamam-Ul Islam', 'injam@gmail.com', 'Shoaib Shoumik', 'shoumik@gmail.com', '2020-07-01', 'null'),
('Node.js', 'FA', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Al-Mujahid Turas', 'turasalmujahid@gmail.com', '2020-07-01', 'null'),
('Bootstrap', 'TR', 'Injamam-Ul Islam', 'injam@gmail.com', 'Al-Mujahid Turas', 'turasalmujahid@gmail.com', '2020-07-01', 'null'),
('Laravel', 'MW', 'Abdullah-Al Imran', 'imran@gmail.com', 'Azrin Karim Lamisa', 'azrin@gmail.com', '2020-07-01', 'null'),
('HTML', 'MW', 'Injamam-Ul Islam', 'injam@gmail.com', 'Azrin Karim Lamisa', 'azrin@gmail.com', '2020-07-01', 'null'),
('Laravel', 'MW', 'Abdullah-Al Imran', 'imran@gmail.com', 'Ashikur Rahman', 'ashik@gmail.com', '2020-07-01', 'null'),
('Object Oriented PHP', 'MW', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Ashikur Rahman', 'ashik@gmail.com', '2020-07-01', 'null'),
('HTML', 'MW', 'Injamam-Ul Islam', 'injam@gmail.com', 'Ashikur Rahman', 'ashik@gmail.com', '2020-07-01', 'null'),
('HTML', 'MW', 'Injamam-Ul Islam', 'injam@gmail.com', 'Raqibul  Hasan', 'raqib@gmail.com', '2020-07-01', 'null'),
('Node.js', 'FA', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Raqibul  Hasan', 'raqib@gmail.com', '2020-07-01', 'null'),
('Object Oriented PHP', 'MW', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Mehfuz Ahmed Anik', 'mehfuz@gmail.com', '2020-07-01', 'null'),
('Bootstrap', 'TR', 'Injamam-Ul Islam', 'injam@gmail.com', 'Mehfuz Ahmed Anik', 'mehfuz@gmail.com', '2020-07-01', 'null'),
('Node.js', 'FA', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Mehfuz Ahmed Anik', 'mehfuz@gmail.com', '2020-07-01', 'null'),
('Laravel', 'MW', 'Abdullah-Al Imran', 'imran@gmail.com', 'Abdullah Muhammad Tahir', 'amtahir74@gmail.com', '2020-07-01', 'null'),
('Laravel', 'MW', 'Abdullah-Al Imran', 'imran@gmail.com', 'Monir Hossain', 'monir@gmail.com', '2020-07-01', 'null'),
('Bootstrap', 'TR', 'Injamam-Ul Islam', 'injam@gmail.com', 'Monir Hossain', 'monir@gmail.com', '2020-07-01', 'null'),
('Object Oriented PHP', 'MW', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Sadiqul Islam', 'sadiqul@gmail.com', '2020-07-01', 'null'),
('Node.js', 'FA', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'Sadiqul Islam', 'sadiqul@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Ashikur Rahman', 'ashik@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Abdullah Muhammad Tahir', 'amtahir74@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Mohammed Faim Uddin Bhuiyan', '2017-1-60-080@std.ewubd.edu', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Rifah Tatrapi', '2017-2-60-137@std.ewubd.edu', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Azrin Karim Lamisa', 'azrin@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Mehfuz Ahmed Anik', 'mehfuz@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Monir Hossain', 'monir@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Nahidul Islam Rafee', 'nahid@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Raqibul  Hasan', 'raqib@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Sadia  Tasnim Tuba', 'sadia107@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Sadiqul Islam', 'sadiqul@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Al-Mujahid Turas', 'turasalmujahid@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Salman Sourav', 'salman@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Shoaib Shoumik', 'shoumik@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Taiyeba Tabita', 'tabita@gmail.com', '2020-07-01', 'null'),
('CSE480', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Rayhan-E- Zannat', 'zannat@gmail.com', '2020-07-01', 'null'),
('Test', 'FA', 'Injamam-Ul Islam', 'injam@gmail.com', 'Tawhidul Islam', 'tawhidul@gmail.com', '2020-09-25', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `coursename` varchar(50) NOT NULL,
  `teacher` text NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `routine` text NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`coursename`, `teacher`, `teacher_email`, `routine`, `start`, `end`) VALUES
('Bootstrap', 'Injamam-Ul Islam', 'injam@gmail.com', 'TR', '11:50:00', '13:30:00'),
('Compiler', 'null', 'null', 'ST', '11:50:00', '13:20:00'),
('CSE480', 'Injamam-Ul Islam', 'injam@gmail.com', 'FA', '09:00:00', '12:00:00'),
('HTML', 'Injamam-Ul Islam', 'injam@gmail.com', 'MW', '15:10:00', '16:40:00'),
('Laravel', 'Abdullah-Al Imran', 'imran@gmail.com', 'MW', '10:10:00', '11:50:00'),
('Node.js', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'FA', '09:00:00', '11:50:00'),
('Object Oriented PHP', 'Mohammad Hedayetullah', 'hedayet@gmail.com', 'MW', '13:30:00', '15:00:00'),
('Test', 'Injamam-Ul Islam', 'injam@gmail.com', 'FA', '08:30:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` text NOT NULL,
  `password` text NOT NULL,
  `speciality` text NOT NULL,
  `dob` date NOT NULL,
  `education` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`fname`, `lname`, `email`, `contact`, `password`, `speciality`, `dob`, `education`) VALUES
('Mohammad', 'Hedayetullah', 'hedayet@gmail.com', '01755222545', '123456', 'Data Mining', '1975-05-08', 'Phd. Quantum Computing'),
('Abdullah-Al', 'Imran', 'imran@gmail.com', '015661242525', '123456', 'php', '1987-06-21', 'M.Sc. in CSE'),
('Injamam-Ul', 'Islam', 'injam@gmail.com', '01700114526', '123456', 'javascript', '1991-06-07', 'M.Sc. in CSE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `dob` date NOT NULL,
  `interest` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `dob`, `interest`, `contact`) VALUES
('Mohammed Faim', 'Uddin Bhuiyan', '2017-1-60-080@std.ewubd.edu', '123456', '1996-08-16', 'Bootstrap and Javascript', '01533426352'),
('Rifah', 'Tatrapi', '2017-2-60-137@std.ewubd.edu', '123456', '1997-08-16', 'Web Designing', '01866554526'),
('Abdullah', 'Muhammad Tahir', 'amtahir74@gmail.com', '123456', '1996-11-02', 'Node.js', '01760086485'),
('Ashikur', 'Rahman', 'ashik@gmail.com', '123456', '1995-03-11', 'Laravel Framwork', '01716002545'),
('Azrin', 'Karim Lamisa', 'azrin@gmail.com', '123456', '2004-04-14', 'HTML', '01875663254'),
('Mehfuz', 'Ahmed Anik', 'mehfuz@gmail.com', '123456', '1996-10-14', 'Web Designing', '01952245265'),
('Monir', 'Hossain', 'monir@gmail.com', '123456', '1995-12-05', 'Bootstrap and Javascript', '016785545569'),
('Nahidul', 'Islam Rafee', 'nahid@gmail.com', '123456', '1997-07-07', 'Node.js', '01556325425'),
('Raqibul ', 'Hasan', 'raqib@gmail.com', '123456', '1995-10-31', 'Laravel Framwork', '01322566545'),
('Sadia ', 'Tasnim Tuba', 'sadia107@gmail.com', '123456', '1992-07-10', 'Bootstrap and Javascript', '01774542526'),
('Sadiqul', 'Islam', 'sadiqul@gmail.com', '123456', '1995-11-12', 'Node.js', '017255425631'),
('Salman', 'Sourav', 'salman@gmail.com', '123456', '1996-01-01', 'Web Designing', '01322566545'),
('Shoaib', 'Shoumik', 'shoumik@gmail.com', '123456', '1999-11-11', 'Bootstrap and Javascript', '01798352245'),
('Taiyeba', 'Tabita', 'tabita@gmail.com', '123456', '2005-03-19', 'Node.js', '01545263325'),
('Tawhidul', 'Islam', 'tawhidul@gmail.com', '123456', '1986-12-07', 'Laravel Framwork', '01924527627'),
('Al-Mujahid', 'Turas', 'turasalmujahid@gmail.com', '123456', '2004-07-06', 'HTML', '01322566545'),
('Rayhan-E-', 'Zannat', 'zannat@gmail.com', '123456', '1996-11-17', 'Laravel Framwork', '01533426352');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`coursename`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
