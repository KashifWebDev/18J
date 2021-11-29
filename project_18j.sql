-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 04:45 AM
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
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `paymentDate` date NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `roomType` varchar(200) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `totalDays` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `userID`, `paymentDate`, `startDate`, `endDate`, `roomType`, `totalAmount`, `totalDays`, `date_time`) VALUES
(1, 4, '2021-11-03', '2021-11-03', '2021-12-03', 'Single Room', 5000, 30, '2021-11-03 04:30:56'),
(2, 105, '2021-11-29', '2021-11-01', '2022-07-01', 'Double Room', 40320, 0, '2021-11-28 23:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `registration` tinyint(1) NOT NULL,
  `deposit` tinyint(1) NOT NULL,
  `roomType` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `userID`, `start_date`, `end_date`, `registration`, `deposit`, `roomType`, `date_time`) VALUES
(4, 5, '2021-01-01', '2021-11-01', 0, 1, '', '2021-11-26 03:53:44'),
(5, 5, '2021-01-01', '2021-10-01', 1, 0, 'Double', '2021-11-26 07:27:51');

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
  `bed1` int(10) NOT NULL DEFAULT 0,
  `bed2` int(10) NOT NULL DEFAULT 0,
  `bed3` int(10) NOT NULL DEFAULT 0,
  `bed4` int(10) NOT NULL DEFAULT 0
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
(14, 'A', 'FR1', 2, 'M14H', 0, 1, 0, 0),
(15, 'A', 'FR2', 2, 'M22H', 0, 0, 0, 0),
(16, 'A', 'FR3', 2, 'M27H', 0, 0, 0, 0),
(17, 'A', 'FR4', 2, 'M18H', 0, 0, 0, 0),
(18, 'A', 'FR5', 1, 'M28H', 0, 0, 0, 0),
(19, 'A', 'FR6', 5, 'M21H', 0, 0, 0, 0),
(20, 'BA', 'BA1', 4, 'M12H', 0, 0, 0, 0),
(21, 'BA', 'BA2', 4, 'M21H', 0, 0, 0, 0),
(22, 'B', 'B14', 2, 'M27H', 0, 0, 0, 0),
(23, 'B', 'B15', 2, 'M21H', 0, 0, 0, 0),
(24, 'B', 'B16', 2, 'M13H', 0, 0, 0, 0),
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
(42, 'C', 'C34', 1, 'M12H', 0, 0, 0, 0),
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
(57, 'C', 'C49', 1, 'M25H', 0, 0, 0, 0),
(58, 'D', 'D1', 4, 'M30H', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surename` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `roomID` int(11) DEFAULT 6969,
  `bedID` int(11) DEFAULT 6969,
  `IDnum` varchar(100) DEFAULT NULL,
  `linkToLease` varchar(100) DEFAULT NULL,
  `uniName` varchar(100) DEFAULT NULL,
  `UniRegNum` varchar(100) DEFAULT NULL,
  `privateSponsored` varchar(100) DEFAULT NULL,
  `sponsorName` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `guardian1` varchar(100) DEFAULT NULL,
  `guardian2` varchar(100) DEFAULT NULL,
  `start_mnth` date DEFAULT NULL,
  `end_mnth` date DEFAULT NULL,
  `registrationCharges` tinyint(1) DEFAULT 0,
  `depositCharges` tinyint(1) DEFAULT 0,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surename`, `email`, `mobile`, `roomID`, `bedID`, `IDnum`, `linkToLease`, `uniName`, `UniRegNum`, `privateSponsored`, `sponsorName`, `address`, `guardian1`, `guardian2`, `start_mnth`, `end_mnth`, `registrationCharges`, `depositCharges`, `comments`) VALUES
(1, 'Bonolo', 'Magobo', 'angelbonolomagobo@gmail.com', '071 214 91 99', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'INTERESTED'),
(2, 'Boitumelo', 'Foke', 'tumib1450@gmail.com', '076 073 0834', 6969, 6969, NULL, NULL, NULL, NULL, 'BURSAR', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'INTERESTED'),
(3, 'Nomzamo', 'Matwa', 'zamomatwa95@gmail.com', '083 355 4299', 6969, 6969, NULL, NULL, NULL, NULL, 'SELF FUNDED', 'SELF FUNDED', NULL, NULL, NULL, NULL, NULL, 0, 0, 'No longer interested'),
(4, 'Mosa', 'Maluleka', 'mosalucymaluleke@gamil.com', '079 261 9852', 6969, 6969, NULL, NULL, NULL, NULL, 'BURSAR', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'No longer interested'),
(5, 'Martha Tshehla', 'Chakuchicki', NULL, 'O725336687', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'NSFAS does not approve her application'),
(6, 'Samantha', NULL, 'stchakuchichi@gmail.com', 'O782355003', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Currently not in the country'),
(7, 'Njabulo', 'Malilo', 'prettynjabulo9@gmail.com', 'O664504506', 6969, 6969, NULL, NULL, NULL, NULL, 'BURSAR', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'INTERESTED , WILL CONFIRM VIEWING'),
(8, 'Naledi', 'Palagangwe', 'palagangwenaledi04@gmail.com', 'O682088138', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp Left a sms, Call dropped ,sent whatsapp'),
(9, 'Yamborghini', NULL, 'yammiesndlovu@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'email sent out 23.11.2021'),
(10, 'Ntha', NULL, 'lorrainen084@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'incorrect email'),
(11, 'Matlou', 'Ramafemo', 'matloulee60@gmail.com', 'O725532627', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Busy with exams, will confirm viewing date, Left a whatsapp .'),
(12, 'Angel', NULL, 'nonhlanhlamdima63@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'email sent out 23.11.2021'),
(13, 'Rethabile', NULL, 'michellepeta20@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'email sent out 23.11.2021'),
(14, 'Mahlatse', 'Rathelele', 'rathelelemahlatse22@gmail.com', 'O826972566', 6969, 6969, NULL, NULL, NULL, NULL, 'BURSAR', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(15, 'Fikile', 'Khosa', 'cleanafikile@gmail.com,', 'O836116008', 6969, 6969, NULL, NULL, NULL, NULL, 'BURSAR', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'No longer interested'),
(16, 'Palesa', 'Mhlambi', '2139385@students.wits.ac.za', 'O646873263', 6969, 6969, NULL, NULL, NULL, NULL, 'PRIVATE', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Moved in,Just messaged her to confirm room number,have no record, response was received'),
(17, 'Remember', 'Gadzwana', 'godzanaremember@gmail.com', 'O769259400', 6969, 6969, NULL, NULL, NULL, NULL, 'BURSAR', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Number does not exist'),
(18, 'Tshepiso', 'Ndlovu', NULL, 'O788752789', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp , Wrong Number Please do not contact again.'),
(19, 'Fezile', 'Gasa', 'fezygasa744@gmal.com', 'O764168836', 6969, 6969, NULL, NULL, NULL, NULL, 'BURSAR', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp, Responded will let me know when she will come view .'),
(20, 'Pearl', 'Mashumu', 'bohlalepearl80@gmail.com', 'O6489702221', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(21, 'Puseletso', 'Chauke', 'ronelpuseletso255@gmail.com', 'O673337095', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'interested.'),
(22, 'Cindy', 'Mdaka', NULL, 'O719666237', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'ASKED TO BE CALLED AROUND 8 PM .'),
(23, 'Thando', 'Mutambanesango', 'rhandomurambanwsango93@gmail.com', 'O671214878', 6969, 6969, NULL, NULL, NULL, NULL, 'PRIVATE', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(24, 'Dikeledi', 'Mokgadi', 'mokgadi@gmail.com', 'O612145238', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Interested'),
(25, 'Amanda', 'Zulu', 'amandaxolilezulu@gmail.com', 'O729528745', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(26, 'Thina', 'George', 'thinageorge3@gmail.com', 'O633137121', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'End of November, still to confirm date and time for viewing'),
(27, NULL, NULL, 'andngellahmmalebala10@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(28, 'Zanokuhle', NULL, NULL, 'O635847524', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Wrong number'),
(29, 'Hephzibah', NULL, NULL, 'O712353467', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'still to confirm date and time for viewing'),
(30, 'Thembelihe', NULL, 'lihlethembelihle593@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(31, 'Michelle', 'Peta', 'michellepeta20@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(32, 'Zamantshali', 'Mtshali', 'Zamantshalimtshali17@gmail.com', 'O638811000', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(33, 'Petunia', NULL, 'petuniamphephu1@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(34, 'Ntombi', NULL, 'kayise.ntisana@gmail.com', 'O626055767', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Interested , will set up day for viewing'),
(35, 'Jaqueline', NULL, NULL, 'O799329722', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(36, 'Dineo', NULL, NULL, 'O712208411', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Was busy with her exams , will call back'),
(37, 'Theo', NULL, NULL, 'O729785189', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'left a sms'),
(38, 'Thando', NULL, NULL, 'O611708939', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(39, 'Mokete', NULL, NULL, 'O814396132', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(40, 'Ntando', NULL, NULL, 'O614608288', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(41, 'Marie Diane', NULL, 'claudebutoyi1@gmail.com', '0744419091', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent an email'),
(42, 'Alice', 'Khumalo', 'alicenonhlanhlakhumalo@gmail.com', '067 173 3732', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'reschedule'),
(43, 'Lehlohonolo', NULL, NULL, '063 630 4876', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(44, 'Precious', NULL, 'cmuzlibertyprecious@gmail.com', '0714097218', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(45, 'Dikeledi', NULL, 'bopapedikeledi6@gmail.com', '0672148988', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(46, 'Makhosazana', 'Nkosi', 'nkosimakhosazana1612@gmail.com', 'O731691305', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(47, 'Abigail', NULL, 'abigailmapula465@gmail.com', 'O722430141', 6969, 6969, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Currently in Limpopo, can only view in Jan'),
(48, 'Semoky Alton', 'Sekharume', 'semoky@gmail.com', 'O718429841', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(49, 'Esther Fulufhelani', 'Ramaite', 'estherramaite@gmail.com', 'O786908264', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Accommodation too expensive'),
(50, 'Hope', 'Bosch', 'losangelbosch10@gmail.com', 'O618450776', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(51, 'Thato', 'Sekharume', 'sekharumedieketseng34@gmail.com', 'O79 578 7787', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(52, 'Lungile', 'Zulu', 'zuluomphile17@gmail.com', '0677023819', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(53, 'Bahle', 'Madikane', '2201966@students.wits.ac.za', '078 825 2100', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(54, 'Mpilonhle', 'Shelembe', NULL, 'O740507570', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(55, 'McKay', 'Zoey', 'Salomelo21lamola@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(56, 'Nthateng', 'Lenkoane', NULL, 'O789899703', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(57, 'Basetsana', 'Muki', 'Mukibasetsana3@gmail.com', 'O635837144', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(58, 'Amanda', 'Habasisa', 'habasisa503@gmail.com', 'O787866078', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a SMS'),
(59, 'Maseroka Rocky', 'Chuene', 'Marinkierocky14@gmail.com', 'O790363068', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(60, 'Xolelwa Slindile', 'Buthelezi', 'xolelwaslindile093@gmail.com', 'O673518734', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'email sent out 23.11.2021'),
(61, 'Nondumiso', 'Mnguni', 'nokubonganmnguni@gmail.com', '0732810268', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Supposedly moving in on the 06/11/21'),
(62, 'Doris', 'Hlangwane', 'leahdulce7@gmail.com', 'O722704959', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sent a whatsapp'),
(63, 'Esihle', 'Madikane', 'emadikane23@gmail.com', 'O719090294', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(64, 'Sonto', 'Mbongww', 'sontombongwa0012@gmail.com', 'O669113852', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(65, 'Zuziwe Mboza', NULL, 'zuziwemboza@gmail.com', 'O610209347', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(66, 'Cocco', 'Pingwani', 'coccoingwani@gmail.com', 'O842921840', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'No answer sent whatsapp'),
(67, 'Asandamawelase', 'Mazibuko', 'asandasasa80@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'sent email out 23.11.2021'),
(68, 'Andiswa', 'Zungu', 'chiyndiswa@gmail.com', 'O712171040', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(69, 'Buhle', NULL, 'nobantuntshiliza@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'sent email out 23.11.2021'),
(70, 'Tshepang Faith', 'Malapela', 'minahlepota53@gmail.com', 'O663597079', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'can not come to view, requested pictures instead, Please let me know if this was done?'),
(71, 'Thandolwethu', 'Bhonda', '2398594@students.com', 'O814403979', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(72, 'Khonjuangenhlahla', 'Ndabandaba', '1437277@students.wits.ac.za', 'O739976753', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'She will set up an appointment to view.. Will follow up'),
(73, 'Kagiso', 'Mashishi', 'kagisomashishi47@gmail.com', 'O799931907', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'it\'s a GUY'),
(74, 'Mokete', 'Mangweta', 'theodeciamangweta@gmail.com', 'O814396132', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Still busy with her exams , will make a booking to view after she finish wrote her exams'),
(75, 'Mbali', 'Khumalo', 'mbalikhumalo049@gmail.com', 'O789995106', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(76, 'Lindile', NULL, 'lepaga1999@gmail.com', 'O673764665', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'send sms'),
(77, 'Nthabiseng', NULL, 'ranyanejessica6@gmail.com', 'O723247925', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Phone is off , left a sms'),
(78, 'Miranda', 'Nxele', 'nxelemiranda@gmail.com', 'O737812044', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(79, 'Mpho shylok', 'Mogudi', 'Shylokmpho@gmail.com', 'O673048651', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'sent sms , awaiting response via Whatsapp'),
(80, 'Lindiwe', 'Magdu', '218062979@student.uj.ac.za', 'O678148334', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(81, 'Lineo Vitaling', 'Lekhotse', '221035888@student.uj.ac.za', 'O710305409', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'VIEWED'),
(82, 'Gilda khuthadzo', 'Nemadzadza', 'gildakhuthadzo@gmail.com', 'O632897881', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Emailed , for her phone was off to confirm on tomorrow'),
(83, 'Asia Kgahliso', 'Tshetshengwa', 'asiakgahliso@gmail.com', 'O76 519 6898', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(84, 'Getrude', 'Siema', 'getrudesiema13@gmail.com', 'O715495081', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Cannot view for in different Province, will access website for lease .'),
(85, 'Liyema', NULL, 'ntselelidz@gmail.com', 'O734732860', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(86, 'Sange', 'Mhluzi', 'sangemhluzi2002@gmail.com', 'O664614165', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Will make make a booking to view , wits student'),
(87, 'Idah', 'Sepeng', 'idahsepeng81@gmail.com', 'O810996638/O630618203', 6969, 6969, NULL, NULL, NULL, 'South West College', 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Requested a quote, Quote sent'),
(88, 'Kuhle  Sibahle', 'Dlamini', 'kuhlesibahle89@gmail.com', 'O637626230', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'WAITING ON RESPONSE, phone is off 23.11.2021'),
(89, 'Keamogetse', 'Selabe', 'keamogetsemocuusi@gmail.com', 'O768750651', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(90, 'Shamira', 'Mudenda', '2279182@students.wits.ac.za', 'O834410495', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(91, 'Rambau', 'Mashudu', 'mashuduprudence@gmail.com', 'O828149314', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(92, 'Thamsanq', 'Sereo', NULL, 'O723862145', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'Impala Platinum', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(93, 'Tendai', 'Mabuda', 'tendaimabunda09@gmail.com', 'O796822689', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(94, 'Serati', 'Sebuka', 'seratiloves2@gmail.com', 'O636509749', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'KSB SA', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(95, 'Tauheeda', 'Jhatam', 'tjhatam27@gmail.com', 'O670807326', 6969, 6969, NULL, NULL, NULL, NULL, 'Self Funded', 'Self Funded', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(96, 'Anathi', 'Manxiwa', 'anniemanxiwa061@gmail.com', 'O621539321', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(97, 'Loveness Nohle', 'Gumede', 'gumedeloveness1@gmail.com', 'O652196606', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(98, 'Khanyo', 'Ndlwana', 'khanyomuthuza@gmail.com', 'O787243702', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(99, 'Request', 'Shivambu', 'shivamburequest2gmail.com', 'O766122428', 6969, 6969, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022 Return Student'),
(100, 'khensane Martha', 'Ringane', 'vidyanorings@gmail.com', 'O656392477', 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Phone on voicemail'),
(101, 'Ayanda', 'Ndlovu', 'yandyndlovuo00@gmail.com', 'O641542876', 6969, 6969, NULL, NULL, NULL, 'UJ', 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Walk in - Viewed and saw show room, premises and  issued lease agreement'),
(102, 'Siphokazi', 'Mtintsilana', 'siphokazi0351@gmail.com', 'O826552573', 6969, 6969, NULL, NULL, NULL, 'UJ', 'Sponsored', 'NSFAS', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Walk in - Viewed and saw show room, premises and  issued lease agreement'),
(103, 'Dimakatso', 'Kgwedi', 'cassandradimakatso3@gmail.com', NULL, 6969, 6969, NULL, NULL, NULL, NULL, 'Private', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(105, 'arshad', 'qasim', 'arshad@gmail.com', '234234234324', 14, 2, '424016854845', '', 'sadf', '1234677', 'Private', 'ABC Person', 'Main Street', '123', '456', '2021-01-01', '2021-11-01', 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
