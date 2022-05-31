-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 05:18 AM
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
  `parent_mobile` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text NOT NULL,
  `aadhar_number` text DEFAULT NULL,
  `school_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_age`, `class`, `parent_mobile`, `email`, `password`, `aadhar_number`, `school_name`, `address`, `profile`, `status`, `description`) VALUES
(1, 'Divakar S', '20', 'HSC', '7358832695', 'divakarvan03@gmail.com', '123456', '765498764323', 'GHSS', '2/42, Azhagapuri,East street', '', 1, NULL),
(2, 'Prasad', '20', '10th', '9878787667', 'jp@gmail.com', '1234567890', '1234567890', 'KVMS', 'strerett line', 'upload/profile/1036-2022-05-28.jpg', NULL, 'YOur Not Pay Amount'),
(3, 'Divakar', '24', '10th', '9887675656', 'diva@gmail.com', '1234567890', '23243434', 'kvms', 'sdfd bggg', '', 1, 'wwdwdw');

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
