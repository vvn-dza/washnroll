-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 12:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70', '2023-02-07 11:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(8) NOT NULL,
  `bodywash` int(10) NOT NULL,
  `fullwash` int(10) NOT NULL,
  `premiumwash` int(10) NOT NULL,
  `scooterwash` int(10) NOT NULL,
  `bikewash` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `bodywash`, `fullwash`, `premiumwash`, `scooterwash`, `bikewash`) VALUES
(1, 400, 500, 600, 150, 250);

-- --------------------------------------------------------

--
-- Table structure for table `tblcarwashbooking`
--

CREATE TABLE `tblcarwashbooking` (
  `id` int(11) NOT NULL,
  `bookingId` bigint(10) DEFAULT NULL,
  `packageType` varchar(120) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `carWashPoint` int(11) DEFAULT NULL,
  `fullName` varchar(150) DEFAULT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `regno` varchar(10) NOT NULL,
  `washDate` date DEFAULT NULL,
  `washTime` varchar(50) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(120) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `paymentMode` varchar(120) DEFAULT NULL,
  `txnNumber` varchar(120) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcarwashbooking`
--

INSERT INTO `tblcarwashbooking` (`id`, `bookingId`, `packageType`, `price`, `carWashPoint`, `fullName`, `mobileNumber`, `regno`, `washDate`, `washTime`, `message`, `address`, `status`, `adminRemark`, `paymentMode`, `txnNumber`, `postingDate`, `lastUpdationDate`) VALUES
(180, 763532556, 'bodywash', 400, 1, 'joel', 9108770492, 'KA19MJ1487', '2023-05-15', '10-11am', 'Wash nicely', 'Morgansgate', 'Completed', 'Done', 'Cash', '123', '2023-05-15 03:32:27', '2023-05-15 03:33:23'),
(181, 456389723, 'fullwash', 500, 1, 'Joel', 9108770492, 'KA19MJ1487', '2023-05-13', '09-10am', 'wash the seat', 'Morgan\'sgate ', 'Completed', 'Done', 'Debit/Credit Card', '1234', '2023-05-15 03:34:46', '2023-05-15 03:35:19'),
(182, 575809418, 'premiumwash', 600, 1, 'Joel', 9108770492, 'KA19MJ1487', '2023-04-01', '12-01pm', '', 'Morgan\'sgate ', 'Cancelled', 'cancelled', 'Cash Refund', '123456', '2023-05-15 03:40:01', '2023-05-15 03:41:00'),
(183, 683352313, 'premiumwash', 600, 1, 'Joel', 9108770492, 'KA19MJ1487', '2023-05-04', '02-03pm', 'Wash the dicki', 'Morgan\'sgate', 'Completed', 'Completed', 'Debit/Credit Card', '12345678', '2023-05-15 03:44:40', '2023-05-15 03:45:37'),
(185, 338445497, 'scooterwash', 150, 1, 'joel', 9108770492, 'KA19et8821', '2023-05-13', '01-02pm', 'wash the boot', 'Morgan\'sgate ', 'Completed', 'done', 'Cash', '431231', '2023-05-15 04:01:21', '2023-05-15 04:02:49'),
(186, 984707903, 'scooterwash', 150, 1, 'jestus', 6361358203, 'KA19MJ1488', '2023-05-15', '11-12pm', 'wash properly', 'jeppu', 'New', NULL, 'Debit/Credit Card', NULL, '2023-05-15 04:53:04', NULL),
(187, 489452508, 'fullwash', 500, 1, 'joel', 9108770492, 'KA19MJ1487', '2023-05-16', '11', '', 'Morgansgate', 'New', NULL, 'e-Wallet', NULL, '2023-05-15 18:10:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(9, 'Joel James', 'jestinejames4@gmail.com', 'Washing Time query', 'What time are you open?', '2023-04-24 09:19:59', 1),
(10, 'john', 'jestinejames4@gmail.com', 'dsa', 'yello', '2023-05-01 09:41:01', 1),
(11, 'robin', 'robin@gmail.com', 'timing', 'why are u gay?', '2023-05-01 13:44:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL,
  `openignHrs` varchar(255) DEFAULT NULL,
  `phoneNumber` bigint(20) DEFAULT NULL,
  `emailId` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`, `openignHrs`, `phoneNumber`, `emailId`) VALUES
(11, 'contact', 'Wash n Roll Services \r\nMallikatte Circle Mangalore', 'Mon-Sun, 8:00 AM-7:00PM', 8951048399, 'autocleanseroll@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubbooking`
--

CREATE TABLE `tblsubbooking` (
  `id` int(11) NOT NULL,
  `bookingId` bigint(10) DEFAULT NULL,
  `packageType` varchar(120) DEFAULT NULL,
  `carWashPoint` int(11) DEFAULT NULL,
  `fullName` varchar(150) DEFAULT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `washDate` date DEFAULT NULL,
  `washTime` time DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `paymentMode` varchar(120) DEFAULT NULL,
  `txnNumber` varchar(120) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubbooking`
--

INSERT INTO `tblsubbooking` (`id`, `bookingId`, `packageType`, `carWashPoint`, `fullName`, `mobileNumber`, `washDate`, `washTime`, `message`, `status`, `adminRemark`, `paymentMode`, `txnNumber`, `postingDate`, `lastUpdationDate`) VALUES
(9, 845439891, '1', 8, 'jestine', 9449283940, '2023-05-04', '14:42:00', 'asd', 'New', NULL, NULL, NULL, '2023-05-01 09:12:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblwashingpoints`
--

CREATE TABLE `tblwashingpoints` (
  `id` int(11) NOT NULL,
  `washingPointName` varchar(255) DEFAULT NULL,
  `washingPointAddress` varchar(255) DEFAULT NULL,
  `contactNumber` bigint(20) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblwashingpoints`
--

INSERT INTO `tblwashingpoints` (`id`, `washingPointName`, `washingPointAddress`, `contactNumber`, `creationDate`) VALUES
(1, 'DoorStep', 'Sherwin', 7362134132, '2023-04-13 12:42:24'),
(2, 'Wash n Roll Morgansgate', 'Riyaz', 959231222, '2023-04-14 11:40:57'),
(24, 'Wash n Roll Kadri', 'John', 9123123222, '2023-05-13 08:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `testsign`
--

CREATE TABLE `testsign` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `vehicleno` varchar(50) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testsign`
--

INSERT INTO `testsign` (`uid`, `username`, `email`, `phoneno`, `vehicleno`, `addr`, `password`) VALUES
(42, 'joel', 'joel@gmail.com', '9108770492', 'KA19MJ1487', 'Morgansgate', '202cb962ac59075b964b07152d234b70'),
(44, 'jestus', 'jestus@gmail.com', '6361358203', 'KA19MJ1488', 'jeppu', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carWashPoint` (`carWashPoint`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubbooking`
--
ALTER TABLE `tblsubbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblwashingpoints`
--
ALTER TABLE `tblwashingpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testsign`
--
ALTER TABLE `testsign`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`,`username`,`email`,`phoneno`,`vehicleno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubbooking`
--
ALTER TABLE `tblsubbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblwashingpoints`
--
ALTER TABLE `tblwashingpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testsign`
--
ALTER TABLE `testsign`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  ADD CONSTRAINT `washingpointid` FOREIGN KEY (`carWashPoint`) REFERENCES `tblwashingpoints` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
