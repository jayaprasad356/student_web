-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 01:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `student_age` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `school_name` text DEFAULT NULL,
  `school_address` text DEFAULT NULL,
  `aadhar_number` text DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `parent_name` text DEFAULT NULL,
  `parent_phone_number` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text NOT NULL,
  `utr_number` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_age`, `class`, `school_name`, `school_address`, `aadhar_number`, `profile`, `parent_name`, `parent_phone_number`, `email`, `password`, `utr_number`, `status`) VALUES
(1, 'Divakar S', '20', 'HSC', 'GHSS', '2/42, Azhagapuri,East street', '765498764323', '', NULL, '7358832695', 'divakarvan03@gmail.com', '123456', NULL, NULL),
(2, 'france', '23', '12th', 'GHSS', 'R.T.mALAI', '765498764323', 'upload/profile/0379-2022-05-31.png', 'GENSY', '8428225519', 'divakarvan03@gmail.com', '1234567', '3467888', 2),
(3, 'dd', '22', 'edfe', 'ffr', 'feef', 'fd3434', '', '', '323232', 'deepa@care.ac.in', '2323232', 'edef', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
