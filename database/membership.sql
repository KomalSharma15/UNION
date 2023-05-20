-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `union`
--

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `linkedin_id` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `course` varchar(50) NOT NULL,
  `enrollment_no` varchar(50) NOT NULL,
  `photo` blob NOT NULL,
  `marksheet` longblob NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `employment_id` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `currentdatetime` datetime NOT NULL,
  `verified` int(1) DEFAULT 0,
  `verification_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `dob`, `gender`, `email`, `phone`, `linkedin_id`, `batch`, `course`, `enrollment_no`, `photo`, `marksheet`, `occupation`, `organization`, `designation`, `employment_id`, `country`, `city`, `currentdatetime`, `verified`, `verification_code`) VALUES
(1, 'rekha', '2023-05-30', 'Female', 'rekhapannu671@gmail.com', '2147483647', 'rekha_671', '2023', 'M.A./M.Sc.(Mathematics) (Self-financed, Evening)', '21MCS1031', 0x75706c6f6164732f72656b68615f70686f746f2e6a7067, 0x75706c6f6164732f72656b68615f6d61726b73686565742e706466, 'software engineer', 'tcs', 'Software engineer associate', 'CT202101317', 'India', 'hisar', '0000-00-00 00:00:00', 1, 123),
(2, 'rekha', '2023-05-18', 'Female', 'rekhapannu671@gmail.com', '2147483647', '', '2023', 'B.Sc.(Hons.) (Applied Mathematics)', '21BCS1031', 0x75706c6f6164732f72656b68615f70686f746f2e6a7067, 0x75706c6f6164732f72656b68615f6d61726b73686565742e706466, 'MARKETING', 'tcs', 'MARKETING ENGINEER', 'CT202103171', 'India', 'hisar', '0000-00-00 00:00:00', 0, 0),
(3, 'rohan', '2023-05-06', 'Male', 'rekha.msc2021@gmail.com', '2147483647', '', '2021', 'M.A./M.Sc.(Mathematics) (Self-financed, Evening)', '21ECS1013', 0x75706c6f6164732f72656b68615f6d61726b73686565742e706466, 0x75706c6f6164732f52454b48412e706466, 'software engineer', 'tcs', 'MARKETING ENGINEER', 'CT202101317', 'India', 'hisar', '0000-00-00 00:00:00', 0, 0),
(4, 'RISHI', '2023-05-03', 'Male', 'rekhapannu671@gmail.com', '09783749585', 'rekha_671', '2020', 'B.Sc.(Hons.) (Mathematics)', '17BCS20201', 0x75706c6f6164732f707974686f6e5f7070742e70707478, 0x75706c6f6164732f52454b48412e706466, 'software engineer', 'tcs', 'MARKETING ENGINEER', 'CT202101317', 'India', 'hisar', '0000-00-00 00:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`,`enrollment_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
