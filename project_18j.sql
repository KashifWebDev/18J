-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 10:08 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_18j`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Administrator', 'admin@admin.com', 'admin@123'),
(7, 'Nono', 'nono@abcinternational.co.za', 'abcinternational'),
(8, 'Kim', 'kim@abcinternational.co.za', 'abcinternational'),
(9, 'Veronica', 'veronica@abcinternational.co.za', 'abcinternational'),
(10, 'Eldine Bosch', 'eldine.bosch@gmail.com', 'abcinternational');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `room` varchar(10) NOT NULL,
  `beds` int(10) NOT NULL,
  `keyNumber` varchar(100) NOT NULL,
  `bed1` tinyint(1) NOT NULL DEFAULT '0',
  `bed2` tinyint(1) NOT NULL DEFAULT '0',
  `bed3` tinyint(1) NOT NULL DEFAULT '0',
  `bed4` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `floor`, `room`, `beds`, `keyNumber`, `bed1`, `bed2`, `bed3`, `bed4`) VALUES
(1, 'A', 'A1', 2, 'M31H', 0, 0, 0, 0),
(2, 'A', 'A2', 2, 'M30H', 0, 0, 0, 0),
(3, 'A', 'A3', 1, 'M30H', 0, 0, 0, 0),
(4, 'A', 'A4', 1, 'M28H', 0, 0, 0, 0),
(5, 'A', 'A5', 2, 'M9HH', 0, 0, 0, 0),
(6, 'A', 'A6', 1, 'M13H', 0, 0, 0, 0),
(7, 'A', 'A7', 2, 'M32H', 0, 0, 0, 0),
(8, 'A', 'A8', 2, 'M31H', 0, 0, 0, 0),
(9, 'A', 'A9', 2, 'M30H', 0, 0, 0, 0),
(10, 'A', 'A10', 2, 'M28H', 0, 0, 0, 0),
(11, 'A', 'A11', 2, 'M10H', 0, 0, 0, 0),
(12, 'A', 'A12', 2, 'M21H', 0, 0, 0, 0),
(13, 'A', 'A13', 1, 'M28H', 0, 0, 0, 0),
(14, 'A', 'FR1', 2, 'M14H', 0, 0, 0, 0),
(15, 'A', 'FR2', 2, 'M22H', 0, 0, 0, 0),
(16, 'A', 'FR3', 2, 'M27H', 0, 0, 0, 0),
(17, 'A', 'FR4', 2, 'M18H', 0, 0, 0, 0),
(18, 'A', 'FR5', 1, 'M28H', 0, 0, 0, 0),
(19, 'A', 'FR6', 5, 'M21H', 0, 0, 0, 0),
(20, 'BA', 'BA1', 4, 'M12H', 0, 0, 0, 0),
(21, 'BA', 'BA2', 4, 'M21H', 0, 0, 0, 0),
(22, 'B', 'B14', 2, 'M27H', 0, 0, 0, 0),
(23, 'B', 'B15', 2, 'M21H', 0, 0, 0, 0),
(24, 'B', 'B16', 2, 'M13H', 0, 1, 0, 0),
(25, 'B', 'B17', 2, 'M13H', 0, 0, 0, 0),
(26, 'B', 'B18', 2, 'M14H', 0, 0, 0, 0),
(27, 'B', 'B19', 2, 'M24H', 0, 0, 0, 0),
(28, 'B', 'B20', 2, 'M22H', 0, 0, 0, 0),
(29, 'B', 'B21', 2, 'M16H', 0, 0, 0, 0),
(30, 'B', 'B22', 2, 'M32H', 0, 0, 0, 0),
(31, 'B', 'B23', 2, 'M21H', 0, 0, 0, 0),
(32, 'B', 'B24', 2, 'M32H', 0, 0, 0, 0),
(33, 'B', 'B25', 2, 'M26H', 0, 0, 0, 0),
(34, 'B', 'B26', 2, 'M30H', 0, 0, 0, 0),
(35, 'B', 'B27', 2, 'M26H', 0, 0, 0, 0),
(36, 'B', 'B28', 2, 'M25H', 0, 0, 0, 0),
(37, 'B', 'B29', 2, 'M9H', 0, 0, 0, 0),
(38, 'B', 'B30', 2, 'M32H', 0, 0, 0, 0),
(39, 'B', 'B31', 1, 'M27H', 0, 0, 0, 0),
(40, 'C', 'C32', 2, 'M21H', 0, 0, 0, 0),
(41, 'C', 'C33', 2, 'M21H', 0, 0, 0, 0),
(42, 'C', 'C34', 1, 'M12H', 1, 0, 0, 0),
(43, 'C', 'C35', 2, 'M24H', 0, 0, 0, 0),
(44, 'C', 'C36', 2, 'M9H', 0, 0, 0, 0),
(45, 'C', 'C37', 2, 'M25H', 0, 0, 0, 0),
(46, 'C', 'C38', 2, 'M22H', 0, 0, 0, 0),
(47, 'C', 'C39', 2, 'M30H', 0, 0, 0, 0),
(48, 'C', 'C40', 2, 'M21H', 0, 0, 0, 0),
(49, 'C', 'C41', 2, 'M24H', 0, 0, 0, 0),
(50, 'C', 'C42', 3, 'M21H', 0, 0, 0, 0),
(51, 'C', 'C43', 2, 'M12H', 0, 0, 0, 0),
(52, 'C', 'C44', 2, 'M31H', 0, 0, 0, 0),
(53, 'C', 'C45', 1, 'M26H', 0, 0, 0, 0),
(54, 'C', 'C46', 2, 'M10H', 0, 0, 0, 0),
(55, 'C', 'C47', 2, 'Y11', 0, 0, 0, 0),
(56, 'C', 'C48', 2, 'Y12', 0, 0, 0, 0),
(57, 'C', 'C49', 1, 'M25H', 1, 0, 0, 0),
(58, 'D', 'D1', 4, 'M30H', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surename` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `roomID` int(10) NOT NULL,
  `bedID` int(10) NOT NULL,
  `IDnum` varchar(200) NOT NULL,
  `linkToLease` varchar(1000) NOT NULL,
  `uniName` varchar(500) NOT NULL,
  `UniRegNum` varchar(300) NOT NULL,
  `privateSponsored` varchar(200) NOT NULL,
  `sponsorName` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `guardian1` varchar(300) NOT NULL,
  `guardian2` varchar(300) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surename`, `email`, `mobile`, `roomID`, `bedID`, `IDnum`, `linkToLease`, `uniName`, `UniRegNum`, `privateSponsored`, `sponsorName`, `address`, `guardian1`, `guardian2`, `date_time`) VALUES
(1, 'test', 'test', 'sdfasdf@fsdgdf', '323424', 4, 2, '232434', '855827img4.jpg', 'adfasdf', '2342434234', 'Private', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:31:15'),
(2, 'cfvdfgdfg', 'ueryte', 'admi12@a34in.com', '3563534', 20, 4, '232434', '633485img5.jpg', 'adfasdf', '2342434234', 'Sponsored', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:32:47'),
(3, 'asdf', 'asdf', 'asdf@yhjgf', '323424', 58, 1, '1234234', '18743img4.jpg', 'adfasdf', '2342434234', 'Private', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:33:51'),
(4, 'test', 'test', 'sdfasdf@fsdgdf2435', '323424', 8, 1, '232434', 'img4.jpg302120', 'adfasdf', '2342434234', 'Sponsored', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:36:06'),
(5, 'final', 'BOy', 'kad@LASDFJ', '90u0', 6, 2, '232434', '978141img4.jpg', 'adfasdf', '2342434234', 'Sponsored', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:51:45'),
(6, 'Fawad', 'Khan', 'fawad@khan', '03428484848', 57, 1, '232434', '964331img4.jpg', 'adfasdf', '2342434234', 'Private', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 08:07:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
