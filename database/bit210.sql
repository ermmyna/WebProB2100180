-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 10:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit210`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educontent`
--

CREATE TABLE `educontent` (
  `contentID` int(11) NOT NULL,
  `typeOfContent` varchar(50) NOT NULL,
  `categoryOfContent` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_login` int(11) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `commutingMethod` varchar(255) DEFAULT NULL,
  `energySource` varchar(255) DEFAULT NULL,
  `dietPreferences` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `first_login`, `profilePicture`, `email`, `contactNumber`, `firstName`, `lastName`, `commutingMethod`, `energySource`, `dietPreferences`) VALUES
(12, 'ermmyna', '$2y$10$/zMlXAXavKAtsO69PfXGmeoVy2ODH.2lWSPFKLsVKTnqqeXRiYwWe', 0, '', 'ermmyna@gmail.com', '0192644588', 'Ermmyna', 'Roselee Shah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weeklylog`
--

CREATE TABLE `weeklylog` (
  `LogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `weekNo` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `carbonFootprintTransport` float NOT NULL,
  `carbonFootprintFood` float NOT NULL,
  `carbonFootprintEnergy` float NOT NULL,
  `totalCarbonFootprint` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educontent`
--
ALTER TABLE `educontent`
  ADD PRIMARY KEY (`contentID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `weeklylog`
--
ALTER TABLE `weeklylog`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `user_fk` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educontent`
--
ALTER TABLE `educontent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weeklylog`
--
ALTER TABLE `weeklylog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
