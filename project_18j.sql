-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 12:40 PM
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
(1, 4, '2021-11-03', '2021-11-03', '2021-12-03', 'Single Room', 5000, 30, '2021-11-03 04:30:56');

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
(11, 'A', 'A11', 2, 'M10H', 69, 0, 0, 0),
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
(57, 'C', 'C49', 1, 'M25H', 69, 0, 0, 0),
(58, 'D', 'D1', 4, 'M30H', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `surename` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `roomID` int(10) DEFAULT NULL,
  `bedID` int(10) DEFAULT NULL,
  `IDnum` varchar(200) DEFAULT NULL,
  `linkToLease` varchar(1000) DEFAULT NULL,
  `uniName` varchar(500) DEFAULT NULL,
  `UniRegNum` varchar(300) DEFAULT NULL,
  `privateSponsored` varchar(200) DEFAULT NULL,
  `sponsorName` varchar(500) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `guardian1` varchar(300) DEFAULT NULL,
  `guardian2` varchar(300) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surename`, `email`, `mobile`, `roomID`, `bedID`, `IDnum`, `linkToLease`, `uniName`, `UniRegNum`, `privateSponsored`, `sponsorName`, `address`, `guardian1`, `guardian2`, `date_time`) VALUES
(1, 'test', 'test', 'sdfasdf@fsdgdf', '323424', 1, 1, '232434', '855827img4.jpg', 'adfasdf', '2342434234', 'Private', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 11:58:49'),
(2, 'cfvdfgdfg', 'ueryte', 'admi12@a34in.com', '3563534', 20, 4, '232434', '633485img5.jpg', 'adfasdf', '2342434234', 'Sponsored', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:32:47'),
(3, 'asdf', 'asdf', 'asdf@yhjgf', '323424', 58, 1, '1234234', '18743img4.jpg', 'adfasdf', '2342434234', 'Private', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:33:51'),
(4, 'test', 'test', 'sdfasdf@fsdgdf2435', '323424', 8, 1, '232434', 'img4.jpg302120', 'adfasdf', '2342434234', 'Sponsored', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 06:36:06'),
(5, 'final', 'BOy', 'kad@LASDFJ', '90u0', NULL, NULL, '232434', '978141img4.jpg', 'adfasdf', '2342434234', 'Sponsored', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-11-17 12:05:41'),
(6, 'Fawad', 'Khan', 'fawad@khan', '03428484848', 1, 1, '232434', '964331img4.jpg', 'adfasdf', '2342434234', 'Private', 'asdfsadf', 'xafgsdfsdf', '232355e', '67678', '2021-10-30 12:13:28'),
(176, 'Amanda', 'Xaba', 'NomkosiAxaba01@gmail.com', '07855252265', 12, 2, '303170543084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:27:34'),
(177, 'Zuziwe Mbalenhle', 'Thwala', 'thwala.zuzi@gmail.com', '0832559135', NULL, NULL, '9908080400083', NULL, 'Wits', '2342434234', 'Private', 'Solomon Thwala', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(178, 'Katlego', 'Mfekane', 'msmfekane@gmail.com', '0714321620', NULL, NULL, '11040197086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(179, 'Jorenthia', 'De Bruin', '2307263@students.wits.ac.za', '0648851674', 57, 1, '107020489087', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-17 11:40:12'),
(180, 'Keamogetse Malebogo', 'Selabe', 'keamogetsemonchusi@gmail.com', '07668750651', NULL, NULL, '110090580082', NULL, 'Wits', '2342434234', 'Private', 'Nthabiseng Selabe', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(181, 'Shamira Rose', 'Mudenda', '2279182@students.wits.ac.za', '0834410495', NULL, NULL, '4090214083', NULL, 'Wits', '2342434234', 'Private', 'Ethel Alimwi Mudenda', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(182, 'Nompumelelo Mbali', 'Tshabalala', 'mpumimbali59@gmail.com', '0815225906', NULL, NULL, '6080462085', NULL, 'Wits', '2342434234', 'Private', 'Christina Deele Tshabalala', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(183, 'Prudence Katlego', 'Molefe', '2323447@students.wits.ac.za', '0647879497', NULL, NULL, '111050103089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(184, 'Ntebogeng Dennis', 'Mashishi', 'ntebogengmashishi@gmail.com', '0680535787', NULL, NULL, '209050455085', NULL, 'Wits', '2342434234', 'Sponsored', 'Sibanye Sillwaters', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(185, 'Lebogang', 'Dube', 'princessdube400@gmail.com', '0768608496', NULL, NULL, '9806280421083', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(186, 'Nomthandazo Karabo', 'Ratsoma', 'sylvia.mahlangu77@gmail.com', '0725181907', NULL, NULL, '9703280420084', NULL, 'Wits', '2342434234', 'Sponsored', 'CSIR', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(187, 'Mashudu Prudence', 'Rambau', 'mashuduprudence@gmail.com', '0828149314', NULL, NULL, '210020867086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(188, 'Thato', 'Mokaleng', 'thatomokaleng00@gmail.com', '0656120850', NULL, NULL, '108030662085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(189, 'Mosa Fortunate', 'Rammutla', '1846691@students.wits.ac.za', '0646169556', NULL, NULL, '6010763081', NULL, 'Wits', '2342434234', 'Private', 'Constance Thaloko Rammtla', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(190, 'Thamsanqa', 'Sereo', 'sereothuleka@gmail.com', '0723862145', NULL, NULL, '204300937081', NULL, 'Wits', '2342434234', 'Sponsored', 'Impala Platinum', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(191, 'Kgomotso', 'Masemola', '1686628@students.wits.ac.za', '0659673517', NULL, NULL, '9902161009287', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(192, 'Thandokazi', 'Nibe', 'thandokazinibe@gmail.com', '0631077910', NULL, NULL, '1251287080', NULL, 'Damelin', NULL, 'Private', 'Nokuzola Nibe', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(193, 'Naledi', 'Nkonyane', '1912042@students.wits.ac.za', '0680816603', NULL, NULL, '9910020297082', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(194, 'Tendai', 'Mabunda', 'tendaimabunda09@gmail.com', '0796822689', NULL, NULL, '1120311091088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(195, 'Neo', 'Koitheng', 'neocherrolpule@gmail.com', '0835013739', NULL, NULL, '8300406082', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(196, 'Ntando Virginia', 'Masango', '2457324@students.wits.ac.za', '0652757570', NULL, NULL, '208160313085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(197, 'Lebu', 'Qina', 'qinalebu20@gmail.com', '0818969540', NULL, NULL, '108081000086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(198, 'Oratile', 'Gaobodiwe', 'oratilegao22@gmail.com', '0714938372', NULL, NULL, '102220390086', NULL, 'Wits', '2342434234', 'Private', 'Mpho Gaobodiwe', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(199, 'Kealeboga', 'Molete', 'keamolete65@gmail.com', '0662931368', NULL, NULL, '206180185087', NULL, 'Wits', '2342434234', 'Private', 'Kaibe Molete', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(200, 'Siwaphiwe', 'Julumeje', '2454634@studentw.wits.ac.za', '0639427721', NULL, NULL, '307300936084', NULL, 'Wits', '2342434234', 'Private', 'Ncediwe Julumeje', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(201, 'Serati', 'Sekuba', 'seratilove52@gmail.com', '0636509749', NULL, NULL, '3042800490847', NULL, 'Wits', '2342434234', 'Sponsored', 'KSB SA', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(202, 'Tauheeda', 'Jhatam', 'tjhatam27@gmail.com', '0670807326', NULL, NULL, '11270524082', NULL, 'Wits', '2342434234', 'Private', 'Muhammed Uslum Jhatam', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(203, 'Hitekani', 'Mzimba', '2134902@students.wits.ac.za', '0780722520', NULL, NULL, '101090924081', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(204, 'Yolanda', 'Ndlovu', 'yolandaangel61@gmail.com', '0826715423', NULL, NULL, '7280516084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(205, 'Anathi', 'Manxiwa', 'anniemanxiwa061@gmail.com', '0621539321', NULL, NULL, '7010149081', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(206, 'Londiwe', 'Ntombela', '2305442@students.wits.ac.za', '0672522770', NULL, NULL, '111270579084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(207, 'Lutho Mihlali', 'Surayi', '2438566@students.wits.ac.za', '0680380520/ 0762424724', NULL, NULL, '211091067085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(208, 'Loveness Nohle', 'Gumede', 'gumedeloveness1@gmail.com', '0652196606', NULL, NULL, '205280528089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(209, 'Naledi Nicole', 'Chikane', 'nicolened239@gmail.com', '0744808781', NULL, NULL, '111031129088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(210, 'Phumla Hope Eve', 'Lukhele', 'hopemasina9@gmail.com', '0762116472', NULL, NULL, '26200537085', NULL, 'Wits', '2342434234', 'Private', 'Khethabahle Hilda Nthenjane', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(211, 'Kamohelo', 'Mogoloa', 'mogoloamk@gmail.com', '0782982047', NULL, NULL, '5220150089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(212, 'Khanyo', 'Ndlwana', 'khanyomuntuza@gmail.com', '0787243702', NULL, NULL, '20901419080', NULL, 'Wits', '2342434234', 'Private', 'Nomathemba Ndlwana', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(213, 'Lethabo Charlotte', 'Rantho', 'rantholethabo@gmail.com', '0782275733', NULL, NULL, '311100737080', NULL, 'Wits', '2342434234', 'Private', 'Nkopodi Johnny Rantho', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(214, 'Request', 'Shivambu', 'shivamburequest@gmail.com', '0766122428', NULL, NULL, '303210862080', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(215, 'Takalani', 'Mukwevho', 'mukwevhotaki03@gmail.com', '0608416257', NULL, NULL, '303201187083', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(216, 'Nonhlanhla', 'Wotshe', 'philippa@xis.co.za', '0655271879', NULL, NULL, '303311106080', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(217, 'Boikokobetso', 'Motloli', 'boikokobetso111@gmail.com', '0671837107', NULL, NULL, '9809211185082', NULL, 'Wits', '2342434234', 'Private', 'Nophuthi Motloli', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(218, 'Tsaku', 'Nkosi', 'tsakuannah22@gmail.com', '0767423446', NULL, NULL, '9801291254086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(219, 'Ayanda', 'Moeketsi', 'moketsiayanda26@gmail.com', '0629509831', NULL, NULL, '9912260151086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(220, 'Phetheo', 'Rammbuda', '1611650@students.wits.ac.za', '0608312132', NULL, NULL, '9905250856086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(221, 'Zanobuhle', 'Nkosi', 'nkosizanobuhle@gmail.com', '0662276814', NULL, NULL, '306040740087', NULL, 'Wits', '2342434234', 'Sponsored', 'Duduzile Makhathini', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(222, 'Nondumiso', 'Mudanalwo', '2156035@students.wits.ac.za', '0815357242', NULL, NULL, '102020213083', NULL, 'Wits', '2342434234', 'Private', 'Nondumiso Mudanalwo', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(223, 'Minenhle', 'Ngcobo', 'nkulengcobosi@gmail.com', '0849786577', NULL, NULL, '303290459088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:20:29'),
(224, 'Amanda', 'Xaba', 'NomkosiAxaba01@gmail.com', '07855252265', NULL, NULL, '0303170543084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(225, 'Zuziwe Mbalenhle', 'Thwala', 'thwala.zuzi@gmail.com', '0832559135', NULL, NULL, '9908080400083', NULL, 'Wits', '2342434234', 'Private', 'Solomon Thwala', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(226, 'Katlego', 'Mfekane', 'msmfekane@gmail.com', '0714321620', NULL, NULL, '011040197086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(227, 'Jorenthia', 'De Bruin', '2307263@students.wits.ac.za', '0648851674', NULL, NULL, '0107020489087', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(228, 'Keamogetse Malebogo', 'Selabe', 'keamogetsemonchusi@gmail.com', '07668750651', NULL, NULL, '0110090580082', NULL, 'Wits', '2342434234', 'Private', 'Nthabiseng Selabe', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(229, 'Shamira Rose', 'Mudenda', '2279182@students.wits.ac.za', '0834410495', NULL, NULL, '0004090214083', NULL, 'Wits', '2342434234', 'Private', 'Ethel Alimwi Mudenda', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(230, 'Babette', 'Ntuli', 'babettentuli@gmail.com', '0676825339', NULL, NULL, '08-2072402G-03', NULL, 'Wits', '2342434234', 'Private', 'Nitiel Ntuli', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(231, 'Nompumelelo Mbali', 'Tshabalala', 'mpumimbali59@gmail.com', '0815225906', NULL, NULL, '0006080462085', NULL, 'Wits', '2342434234', 'Private', 'Christina Deele Tshabalala', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(232, 'Triphin', 'Mudzvengi', '2327022@students.wits.ac.za', '0726563206', NULL, NULL, 'MUSZWE39220110', NULL, 'Wits', '2342434234', 'Private', 'Polate Mudzvengi', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(233, 'Prudence Katlego', 'Molefe', '2323447@students.wits.ac.za', '0647879497', NULL, NULL, '0111050103089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(234, 'Ntebogeng Dennis', 'Mashishi', 'ntebogengmashishi@gmail.com', '0680535787', NULL, NULL, '0209050455085', NULL, 'Wits', '2342434234', 'Sponsored', 'Sibanye Sillwaters', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(235, 'Lebogang', 'Dube', 'princessdube400@gmail.com', '0768608496', NULL, NULL, '9806280421083', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(236, 'Nomthandazo Karabo', 'Ratsoma', 'sylvia.mahlangu77@gmail.com', '0725181907', NULL, NULL, '9703280420084', NULL, 'Wits', '2342434234', 'Sponsored', 'CSIR', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(237, 'Mashudu Prudence', 'Rambau', 'mashuduprudence@gmail.com', '0828149314', NULL, NULL, '0210020867086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(238, 'Thato', 'Mokaleng', 'thatomokaleng00@gmail.com', '0656120850', NULL, NULL, '0108030662085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(239, 'Mosa Fortunate', 'Rammutla', '1846691@students.wits.ac.za', '0646169556', NULL, NULL, '0006010763081', NULL, 'Wits', '2342434234', 'Private', 'Constance Thaloko Rammtla', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(240, 'Thamsanqa', 'Sereo', 'sereothuleka@gmail.com', '0723862145', NULL, NULL, '0204300937081', NULL, 'Wits', '2342434234', 'Sponsored', 'Impala Platinum', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(241, 'Onkabetse', 'Motlhaping', 'onkabetsebmotlhaping@gmail.com', '0765540364', NULL, NULL, '\'0208070682082', NULL, 'Wits', '2342434234', 'Private', 'Patrick Motlhaping', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(242, 'Kgomotso', 'Masemola', '1686628@students.wits.ac.za', '0659673517', NULL, NULL, '9902161009287', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(243, 'Thandokazi', 'Nibe', 'thandokazinibe@gmail.com', '0631077910', NULL, NULL, '0001251287080', NULL, 'Damelin', NULL, 'Private', 'Nokuzola Nibe', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(244, 'Naledi', 'Nkonyane', '1912042@students.wits.ac.za', '0680816603', NULL, NULL, '9910020297082', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(245, 'Tendai', 'Mabunda', 'tendaimabunda09@gmail.com', '0796822689', NULL, NULL, '01120311091088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(246, 'Neo', 'Koitheng', 'neocherrolpule@gmail.com', '0835013739', NULL, NULL, '0008300406082', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(247, 'Ntando Virginia', 'Masango', '2457324@students.wits.ac.za', '0652757570', NULL, NULL, '0208160313085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(248, 'Lebu', 'Qina', 'qinalebu20@gmail.com', '0818969540', NULL, NULL, '0108081000086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(249, 'Oratile', 'Gaobodiwe', 'oratilegao22@gmail.com', '0714938372', NULL, NULL, '0102220390086', NULL, 'Wits', '2342434234', 'Private', 'Mpho Gaobodiwe', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(250, 'Kealeboga', 'Molete', 'keamolete65@gmail.com', '0662931368', NULL, NULL, '0206180185087', NULL, 'Wits', '2342434234', 'Private', 'Kaibe Molete', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(251, 'Siwaphiwe', 'Julumeje', '2454634@studentw.wits.ac.za', '0639427721', NULL, NULL, '0307300936084', NULL, 'Wits', '2342434234', 'Private', 'Ncediwe Julumeje', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(252, 'Serati', 'Sekuba', 'seratilove52@gmail.com', '0636509749', NULL, NULL, '03042800490847', NULL, 'Wits', '2342434234', 'Sponsored', 'KSB SA', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(253, 'Tauheeda', 'Jhatam', 'tjhatam27@gmail.com', '0670807326', NULL, NULL, '00011270524082', NULL, 'Wits', '2342434234', 'Private', 'Muhammed Uslum Jhatam', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(254, 'Hitekani', 'Mzimba', '2134902@students.wits.ac.za', '0780722520', NULL, NULL, '0101090924081', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(255, 'Yolanda', 'Ndlovu', 'yolandaangel61@gmail.com', '0826715423', NULL, NULL, '0007280516084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(256, 'Anathi', 'Manxiwa', 'anniemanxiwa061@gmail.com', '0621539321', NULL, NULL, '0007010149081', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(257, 'Londiwe', 'Ntombela', '2305442@students.wits.ac.za', '0672522770', NULL, NULL, '0111270579084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(258, 'Lutho Mihlali', 'Surayi', '2438566@students.wits.ac.za', '0680380520/ 0762424724', NULL, NULL, '0211091067085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(259, 'Loveness Nohle', 'Gumede', 'gumedeloveness1@gmail.com', '0652196606', NULL, NULL, '0205280528089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(260, 'Naledi Nicole', 'Chikane', 'nicolened239@gmail.com', '0744808781', NULL, NULL, '0111031129088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(261, 'Phumla Hope Eve', 'Lukhele', 'hopemasina9@gmail.com', '0762116472', NULL, NULL, '00026200537085', NULL, 'Wits', '2342434234', 'Private', 'Khethabahle Hilda Nthenjane', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(262, 'Kamohelo', 'Mogoloa', 'mogoloamk@gmail.com', '0782982047', NULL, NULL, '0005220150089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(263, 'Khanyo', 'Ndlwana', 'khanyomuntuza@gmail.com', '0787243702', NULL, NULL, '020901419080', NULL, 'Wits', '2342434234', 'Private', 'Nomathemba Ndlwana', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(264, 'Lethabo Charlotte', 'Rantho', 'rantholethabo@gmail.com', '0782275733', NULL, NULL, '0311100737080', NULL, 'Wits', '2342434234', 'Private', 'Nkopodi Johnny Rantho', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(265, 'Request', 'Shivambu', 'shivamburequest@gmail.com', '0766122428', NULL, NULL, '0303210862080', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(266, 'Takalani', 'Mukwevho', 'mukwevhotaki03@gmail.com', '0608416257', NULL, NULL, '0303201187083', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(267, 'Nonhlanhla', 'Wotshe', 'philippa@xis.co.za', '0655271879', NULL, NULL, '0303311106080', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(268, 'Boikokobetso', 'Motloli', 'boikokobetso111@gmail.com', '0671837107', NULL, NULL, '9809211185082', NULL, 'Wits', '2342434234', 'Private', 'Nophuthi Motloli', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(269, 'Tsaku', 'Nkosi', 'tsakuannah22@gmail.com', '0767423446', NULL, NULL, '9801291254086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(270, 'Ayanda', 'Moeketsi', 'moketsiayanda26@gmail.com', '0629509831', NULL, NULL, '9912260151086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(271, 'Phetheo', 'Rammbuda', '1611650@students.wits.ac.za', '0608312132', NULL, NULL, '9905250856086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(272, 'Zanobuhle', 'Nkosi', 'nkosizanobuhle@gmail.com', '0662276814', NULL, NULL, '0306040740087', NULL, 'Wits', '2342434234', 'Sponsored', 'Duduzile Makhathini', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(273, 'Nondumiso', 'Mudanalwo', '2156035@students.wits.ac.za', '0815357242', NULL, NULL, '0102020213083', NULL, 'Wits', '2342434234', 'Private', 'Nondumiso Mudanalwo', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(274, 'Minenhle', 'Ngcobo', 'nkulengcobosi@gmail.com', '0849786577', NULL, NULL, '0303290459088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(275, 'Palesa', 'Mahlambi', 'pmahlambi24@gmail.com', '0646873263', NULL, NULL, '0101240493086', NULL, 'Wits', '2342434234', 'Private', 'Kedibone Merriam Mahlambi', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(276, 'Siduduziwe Mpho', 'Motaung', 'mphom31.sm@gmail.com', '0725601248', NULL, NULL, '0007310093088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(277, 'Basetsana', 'Ntshalintshali', '2426662@students.wits.ac.za', '0678917137', NULL, NULL, NULL, NULL, 'Wits', '2342434234', 'Sponsored', 'Gauteng Province', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(278, 'Nomthandazo', 'Mdakane', 'jennifermdakane@gmail.com', '0780868605', NULL, NULL, NULL, NULL, 'Wits', '2342434234', 'Spomsored', 'Gauteng Province', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(279, 'Fumani Sarah', 'Mashingo', 'mfumanisarah@gmail.com', '071 073 2430', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Lebogang Mashingo', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(280, 'Cindi', 'Nolanthando', 'cindinolithando@gmail.com', '068 075 5883', NULL, NULL, NULL, NULL, 'Wits', '2342434234', 'Sponsored', 'Gauteng Province', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(281, 'Kannelo', 'Ltlhakanyane', 'kanilit3@gmail.com', '065 880 8954', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Mpho Seatle', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(282, 'Vhutsila Lusa', 'Tshianane', 'vhutsila.l@gmail.com', '082 866 6726', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Mr Tshianane', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(283, 'Nokubonga', 'Majozi', 'nokomajozi@gmail.com', '081 399 0119', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(284, 'Mpho', 'Mauteng', 'mphom31@gmail.com', '072 560 1248', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(285, 'KJ', 'Mokwatlo', NULL, '076 428 0516', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Mr Mokwatlo', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(286, 'Zizo', 'Maqekeni', 'lebohang@tomorrow.org.za', '082 739 8040', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'Tomorrow Trust', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(287, 'Nolisindiso', 'Matroshe', 'nm.matroshe@gmail.com', '073 990 0447', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'Tomorrow Trust', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(288, 'Basetsana', 'Rabodila', 'basetsana.rabodile@gmail.com', '072 183 1996', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Basetsana Rabodila', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(289, 'Onacchau', 'Makgato', 'onnicahmakgato@gmail.com', '078 643 1026', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Onnicah Makgato', NULL, NULL, NULL, '2021-11-03 06:21:03'),
(290, 'Amanda', 'Xaba', 'NomkosiAxaba01@gmail.com', '07855252265', NULL, NULL, '0303170543084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(291, 'Zuziwe Mbalenhle', 'Thwala', 'thwala.zuzi@gmail.com', '0832559135', NULL, NULL, '9908080400083', NULL, 'Wits', '2342434234', 'Private', 'Solomon Thwala', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(292, 'Katlego', 'Mfekane', 'msmfekane@gmail.com', '0714321620', NULL, NULL, '011040197086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(293, 'Jorenthia', 'De Bruin', '2307263@students.wits.ac.za', '0648851674', NULL, NULL, '0107020489087', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(294, 'Keamogetse Malebogo', 'Selabe', 'keamogetsemonchusi@gmail.com', '07668750651', NULL, NULL, '0110090580082', NULL, 'Wits', '2342434234', 'Private', 'Nthabiseng Selabe', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(295, 'Shamira Rose', 'Mudenda', '2279182@students.wits.ac.za', '0834410495', NULL, NULL, '0004090214083', NULL, 'Wits', '2342434234', 'Private', 'Ethel Alimwi Mudenda', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(296, 'Babette', 'Ntuli', 'babettentuli@gmail.com', '0676825339', NULL, NULL, '08-2072402G-03', NULL, 'Wits', '2342434234', 'Private', 'Nitiel Ntuli', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(297, 'Nompumelelo Mbali', 'Tshabalala', 'mpumimbali59@gmail.com', '0815225906', NULL, NULL, '0006080462085', NULL, 'Wits', '2342434234', 'Private', 'Christina Deele Tshabalala', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(298, 'Triphin', 'Mudzvengi', '2327022@students.wits.ac.za', '0726563206', NULL, NULL, 'MUSZWE39220110', NULL, 'Wits', '2342434234', 'Private', 'Polate Mudzvengi', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(299, 'Prudence Katlego', 'Molefe', '2323447@students.wits.ac.za', '0647879497', NULL, NULL, '0111050103089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(300, 'Ntebogeng Dennis', 'Mashishi', 'ntebogengmashishi@gmail.com', '0680535787', NULL, NULL, '0209050455085', NULL, 'Wits', '2342434234', 'Sponsored', 'Sibanye Sillwaters', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(301, 'Lebogang', 'Dube', 'princessdube400@gmail.com', '0768608496', NULL, NULL, '9806280421083', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(302, 'Nomthandazo Karabo', 'Ratsoma', 'sylvia.mahlangu77@gmail.com', '0725181907', NULL, NULL, '9703280420084', NULL, 'Wits', '2342434234', 'Sponsored', 'CSIR', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(303, 'Mashudu Prudence', 'Rambau', 'mashuduprudence@gmail.com', '0828149314', NULL, NULL, '0210020867086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(304, 'Thato', 'Mokaleng', 'thatomokaleng00@gmail.com', '0656120850', NULL, NULL, '0108030662085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(305, 'Mosa Fortunate', 'Rammutla', '1846691@students.wits.ac.za', '0646169556', NULL, NULL, '0006010763081', NULL, 'Wits', '2342434234', 'Private', 'Constance Thaloko Rammtla', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(306, 'Thamsanqa', 'Sereo', 'sereothuleka@gmail.com', '0723862145', NULL, NULL, '0204300937081', NULL, 'Wits', '2342434234', 'Sponsored', 'Impala Platinum', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(307, 'Onkabetse', 'Motlhaping', 'onkabetsebmotlhaping@gmail.com', '0765540364', NULL, NULL, '\'0208070682082', NULL, 'Wits', '2342434234', 'Private', 'Patrick Motlhaping', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(308, 'Kgomotso', 'Masemola', '1686628@students.wits.ac.za', '0659673517', NULL, NULL, '9902161009287', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(309, 'Thandokazi', 'Nibe', 'thandokazinibe@gmail.com', '0631077910', NULL, NULL, '0001251287080', NULL, 'Damelin', NULL, 'Private', 'Nokuzola Nibe', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(310, 'Naledi', 'Nkonyane', '1912042@students.wits.ac.za', '0680816603', NULL, NULL, '9910020297082', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(311, 'Tendai', 'Mabunda', 'tendaimabunda09@gmail.com', '0796822689', NULL, NULL, '01120311091088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(312, 'Neo', 'Koitheng', 'neocherrolpule@gmail.com', '0835013739', NULL, NULL, '0008300406082', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(313, 'Ntando Virginia', 'Masango', '2457324@students.wits.ac.za', '0652757570', NULL, NULL, '0208160313085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(314, 'Lebu', 'Qina', 'qinalebu20@gmail.com', '0818969540', NULL, NULL, '0108081000086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(315, 'Oratile', 'Gaobodiwe', 'oratilegao22@gmail.com', '0714938372', NULL, NULL, '0102220390086', NULL, 'Wits', '2342434234', 'Private', 'Mpho Gaobodiwe', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(316, 'Kealeboga', 'Molete', 'keamolete65@gmail.com', '0662931368', NULL, NULL, '0206180185087', NULL, 'Wits', '2342434234', 'Private', 'Kaibe Molete', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(317, 'Siwaphiwe', 'Julumeje', '2454634@studentw.wits.ac.za', '0639427721', NULL, NULL, '0307300936084', NULL, 'Wits', '2342434234', 'Private', 'Ncediwe Julumeje', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(318, 'Serati', 'Sekuba', 'seratilove52@gmail.com', '0636509749', NULL, NULL, '03042800490847', NULL, 'Wits', '2342434234', 'Sponsored', 'KSB SA', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(319, 'Tauheeda', 'Jhatam', 'tjhatam27@gmail.com', '0670807326', NULL, NULL, '00011270524082', NULL, 'Wits', '2342434234', 'Private', 'Muhammed Uslum Jhatam', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(320, 'Hitekani', 'Mzimba', '2134902@students.wits.ac.za', '0780722520', NULL, NULL, '0101090924081', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(321, 'Yolanda', 'Ndlovu', 'yolandaangel61@gmail.com', '0826715423', NULL, NULL, '0007280516084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(322, 'Anathi', 'Manxiwa', 'anniemanxiwa061@gmail.com', '0621539321', NULL, NULL, '0007010149081', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(323, 'Londiwe', 'Ntombela', '2305442@students.wits.ac.za', '0672522770', NULL, NULL, '0111270579084', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(324, 'Lutho Mihlali', 'Surayi', '2438566@students.wits.ac.za', '0680380520/ 0762424724', NULL, NULL, '0211091067085', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(325, 'Loveness Nohle', 'Gumede', 'gumedeloveness1@gmail.com', '0652196606', NULL, NULL, '0205280528089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(326, 'Naledi Nicole', 'Chikane', 'nicolened239@gmail.com', '0744808781', NULL, NULL, '0111031129088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(327, 'Phumla Hope Eve', 'Lukhele', 'hopemasina9@gmail.com', '0762116472', NULL, NULL, '00026200537085', NULL, 'Wits', '2342434234', 'Private', 'Khethabahle Hilda Nthenjane', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(328, 'Kamohelo', 'Mogoloa', 'mogoloamk@gmail.com', '0782982047', NULL, NULL, '0005220150089', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(329, 'Khanyo', 'Ndlwana', 'khanyomuntuza@gmail.com', '0787243702', NULL, NULL, '020901419080', NULL, 'Wits', '2342434234', 'Private', 'Nomathemba Ndlwana', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(330, 'Lethabo Charlotte', 'Rantho', 'rantholethabo@gmail.com', '0782275733', NULL, NULL, '0311100737080', NULL, 'Wits', '2342434234', 'Private', 'Nkopodi Johnny Rantho', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(331, 'Request', 'Shivambu', 'shivamburequest@gmail.com', '0766122428', NULL, NULL, '0303210862080', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:23'),
(332, 'Takalani', 'Mukwevho', 'mukwevhotaki03@gmail.com', '0608416257', NULL, NULL, '0303201187083', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(333, 'Nonhlanhla', 'Wotshe', 'philippa@xis.co.za', '0655271879', NULL, NULL, '0303311106080', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(334, 'Boikokobetso', 'Motloli', 'boikokobetso111@gmail.com', '0671837107', NULL, NULL, '9809211185082', NULL, 'Wits', '2342434234', 'Private', 'Nophuthi Motloli', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(335, 'Tsaku', 'Nkosi', 'tsakuannah22@gmail.com', '0767423446', NULL, NULL, '9801291254086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(336, 'Ayanda', 'Moeketsi', 'moketsiayanda26@gmail.com', '0629509831', NULL, NULL, '9912260151086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(337, 'Phetheo', 'Rammbuda', '1611650@students.wits.ac.za', '0608312132', NULL, NULL, '9905250856086', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(338, 'Zanobuhle', 'Nkosi', 'nkosizanobuhle@gmail.com', '0662276814', NULL, NULL, '0306040740087', NULL, 'Wits', '2342434234', 'Sponsored', 'Duduzile Makhathini', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(339, 'Nondumiso', 'Mudanalwo', '2156035@students.wits.ac.za', '0815357242', NULL, NULL, '0102020213083', NULL, 'Wits', '2342434234', 'Private', 'Nondumiso Mudanalwo', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(340, 'Minenhle', 'Ngcobo', 'nkulengcobosi@gmail.com', '0849786577', NULL, NULL, '0303290459088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(341, 'Palesa', 'Mahlambi', 'pmahlambi24@gmail.com', '0646873263', NULL, NULL, '0101240493086', NULL, 'Wits', '2342434234', 'Private', 'Kedibone Merriam Mahlambi', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(342, 'Siduduziwe Mpho', 'Motaung', 'mphom31.sm@gmail.com', '0725601248', NULL, NULL, '0007310093088', NULL, 'Wits', '2342434234', 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(343, 'Basetsana', 'Ntshalintshali', '2426662@students.wits.ac.za', '0678917137', NULL, NULL, NULL, NULL, 'Wits', '2342434234', 'Sponsored', 'Gauteng Province', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(344, 'Nomthandazo', 'Mdakane', 'jennifermdakane@gmail.com', '0780868605', NULL, NULL, NULL, NULL, 'Wits', '2342434234', 'Spomsored', 'Gauteng Province', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(345, 'Fumani Sarah', 'Mashingo', 'mfumanisarah@gmail.com', '071 073 2430', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Lebogang Mashingo', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(346, 'Cindi', 'Nolanthando', 'cindinolithando@gmail.com', '068 075 5883', NULL, NULL, NULL, NULL, 'Wits', '2342434234', 'Sponsored', 'Gauteng Province', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(347, 'Kannelo', 'Ltlhakanyane', 'kanilit3@gmail.com', '065 880 8954', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Mpho Seatle', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(348, 'Vhutsila Lusa', 'Tshianane', 'vhutsila.l@gmail.com', '082 866 6726', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Mr Tshianane', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(349, 'Nokubonga', 'Majozi', 'nokomajozi@gmail.com', '081 399 0119', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(350, 'Mpho', 'Mauteng', 'mphom31@gmail.com', '072 560 1248', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'NSFAS', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(351, 'KJ', 'Mokwatlo', NULL, '076 428 0516', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Mr Mokwatlo', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(352, 'Zizo', 'Maqekeni', 'lebohang@tomorrow.org.za', '082 739 8040', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'Tomorrow Trust', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(353, 'Nolisindiso', 'Matroshe', 'nm.matroshe@gmail.com', '073 990 0447', NULL, NULL, NULL, NULL, NULL, NULL, 'Sponsored', 'Tomorrow Trust', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(354, 'Basetsana', 'Rabodila', 'basetsana.rabodile@gmail.com', '072 183 1996', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Basetsana Rabodila', NULL, NULL, NULL, '2021-11-03 06:21:24'),
(355, 'Onacchau', 'Makgato', 'onnicahmakgato@gmail.com', '078 643 1026', NULL, NULL, NULL, NULL, NULL, NULL, 'Private', 'Onnicah Makgato', NULL, NULL, NULL, '2021-11-03 06:21:24');

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
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
