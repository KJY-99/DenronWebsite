-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 12:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denron`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkintbl`
--

CREATE TABLE `checkintbl` (
  `Id` int(11) NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Name` varchar(50) NOT NULL,
  `Checkin` varchar(255) DEFAULT NULL,
  `Checkout` varchar(255) DEFAULT NULL,
  `Location` varchar(255) NOT NULL,
  `Reason` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkintbl`
--

INSERT INTO `checkintbl` (`Id`, `Date`, `Name`, `Checkin`, `Checkout`, `Location`, `Reason`) VALUES
(29, '2020-07-24 08:08:21', 'Henry', '04:08 PM', '04:08 PM', 'sindo', NULL),
(31, '2020-07-24 08:18:28', 'Henry', '04:18 PM', '04:39 PM', 'sindo', NULL),
(37, '2020-07-24 08:55:09', 'Henry', NULL, NULL, '', 'MC');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accesslevel` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `username`, `password`, `accesslevel`) VALUES
(1, 'admin', 'password', 1),
(2, 'Henry', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkintbl`
--
ALTER TABLE `checkintbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkintbl`
--
ALTER TABLE `checkintbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
