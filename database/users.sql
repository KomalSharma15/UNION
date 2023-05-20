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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT current_timestamp(),
  `usertype` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `createdate`, `usertype`) VALUES
(2, 'rekha.msc2021@gmail.com', '$2y$10$Ah07JzN4ommi4KzipDR5z.ID1WODp3Su2U0VC/JyvsNmbIELTCTP.', '2023-05-06 23:17:57', 0),
(3, 'haryana@gmail.com', '$2y$10$7q6sJtPXvzAF/.v9xUre9eFEye3tpVSVM.PDUW8pd2iOv93zsL1wu', '2023-05-06 23:19:40', 0),
(4, 'rekhapannu671@gmail.com', '$2y$10$1MQSGxvXJ2hnAs60f7jrw.Dbm4/4JJL8NZPfnXdnRzI1YG933Yz2q', '2023-05-07 04:30:24', 0),
(5, 'rekha.msc2000@gmail.com', '$2y$10$BHxjhKwC/LP6Eg7CZsLpQuNJLZ3J/BGA.D63RduSvEb/fJdaDLmx2', '2023-05-15 03:29:14', 0),
(6, 'myusername', '*53730466DABDFBCD5253554D3CF469016074701E', '2023-05-16 02:09:51', 0),
(7, 'myusername', '*53730466DABDFBCD5253554D3CF469016074701E', '2023-05-16 02:10:50', 0),
(8, 'jmi@gmail.com', '$2y$10$tDWuZKX513mZUhhTbTPg..ACOIJ9fbWLrrgjS16QoFVVbr29i.9w6', '2023-05-16 03:18:25', 1),
(9, 'rekha200@gmail.com', '$2y$10$AiYyVa9S2wzyr6rY8treeOmmGI3Ov53I7gu2lgyMFw.PR8dM.SVuW', '2023-05-17 01:11:53', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
