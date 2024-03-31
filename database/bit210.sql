-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 06:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `adminID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `email`) VALUES
('AD01', 'admin210', 'admin210', 'admin210@ecoTrace.com');

-- --------------------------------------------------------

--
-- Table structure for table `carboncalculator`
--

CREATE TABLE `carboncalculator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `transportation` decimal(10,2) NOT NULL,
  `energy` decimal(10,2) NOT NULL,
  `diet` decimal(10,2) NOT NULL,
  `total_carbon_footprint` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educontent`
--

INSERT INTO `educontent` (`contentID`, `typeOfContent`, `categoryOfContent`, `title`, `description`, `content`) VALUES
(19, 'Infographic', 'Transportation', 'The Carbon Cost Of Transportation', 'Embark on a journey through our comprehensive infographic as we unveil the carbon cost of various modes of transportation. Delve into the environmental impact of your travel choices, from everyday commuting to long-distance trips, and gain insights into the carbon footprints associated with different vehicles. This visually engaging infographic breaks down the carbon emissions of automobiles, buses, trains, flights, and more, measuring their environmental impact in grams of carbon dioxide. Discover how each mode of transportation contributes to the global carbon footprint, empowering you with knowledge to make informed and sustainable travel decisions.', '23658carbon-cost-of-transportation-ds.jpg'),
(20, 'Video', 'Environmental Issue', 'What is Carbon Footprint', 'Reducing your carbon footprint is about minimizing the environmental impact of your actions, much like leaving a mark on the environment with every activity that releases carbon emissions, such as CO2 from burning fossil fuels. It\'s not just about the emissions from your car\'s engine; consider the entire lifecycle, from extracting and transporting fuel to manufacturing the vehicle. Even seemingly simple activities like reading a book or eating an apple contribute to your carbon footprint due to energy consumption and transportation. While it\'s challenging to have zero impact, being mindful of your choices can help shrink your carbon footprint and contribute to combating climate change.', '96699simpleshow explains the Carbon Footprint.mp4'),
(21, 'Image', 'Dietary Choice', 'A Guide to Climate-friendly food choices', 'To minimize your carbon footprint through dietary choices, adopt a plant-based or flexitarian diet, prioritize locally sourced and seasonal produce, reduce dairy consumption, choose organic options with minimal packaging, explore insect-based proteins, engage in meatless days, calculate and offset your emissions, support sustainable agriculture initiatives, educate others on eco-friendly choices, practice water-efficient cooking, opt for low-impact snacks, plan sustainable celebrations, and consistently make mindful, informed decisions about the foods you consume.', '37306Screenshot 2024-02-29 at 5.40.10 PM.png'),
(22, 'Image', 'Energy Consumption', '5 Simple Tips to Save Energy', 'Unlock the power of energy efficiency with our visually compelling infographic that shares five practical tips to lighten your environmental impact. Dive into a world of sustainable living as we guide you through easy-to-implement strategies that not only conserve energy but also contribute to a greener tomorrow. Join the movement towards a more sustainable lifestyle – it\'s time to energize your life while preserving our planet! #EnergyEfficiency #EcoTrace', '64683energy tips for college students.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `organizers` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `organizers`, `date`, `time`) VALUES
(1, 'Awareness Campaign to Save Forest', 'Universiti Malaya (Institute of Biological Sciences)', '2024-04-02', '9:00 am - 12:30 pm'),
(2, 'Every Action Counts: Join for Our Future', 'Universiti Putra Malaysia (Faculty of Agriculture)', '2024-04-30', '9:00 am - 1:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `feedbackMessage` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_login` int(11) NOT NULL,
  `profilePicture` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `commutingMethod` varchar(255) DEFAULT NULL,
  `energySource` varchar(255) DEFAULT NULL,
  `dietPreferences` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `first_login`, `profilePicture`, `email`, `contactNumber`, `firstName`, `lastName`, `commutingMethod`, `energySource`, `dietPreferences`) VALUES
(1, 'zoyak', '$2y$10$5nipLUb/BIo2w/qx/imOWeDKcGga39PC4Qql/uFhKKsz8AyIcTUbS', 1, '', 'zoya@gmail.com', '12345', 'Zoya', 'Khan', '', '', ''),
(6, 'emr', '$2y$10$2GbQnyV5Z/VN5CU6yXgCUuZPJBUGk55/PiH97CNBFTv7mCMRhKJkm', 0, '', 'erm@gmail.com', '1234567', 'erm', 'erm', NULL, NULL, NULL),
(7, 'zoyaaa', '$2y$10$.koVpy2MSHEk1p3KoJ4lp.ZRhAbuj3TJRIVwN8FQwGG.xwCJitcvS', 0, '', 'zoyak1220@gmail.com', '12345678', 'zoya ', 'zoya', 'car_owner', 'electricity_grid', 'meat_lover'),
(8, 'zoya1', '$2y$10$PfuxtJAbtTFcNI.pEJKKSuDfTDR0DAWreIIkMjkRkkN9wNELHnrta', 0, '', 'zoyak1220@gmail.com', '12345678', 'zoya', 'khan', NULL, NULL, NULL),
(20, 'joe', '$2y$10$6x/fYuaVU7RO02gqTZ0d0.gTjemMkdIVVILd.G2tpwtjMCQpJsj02', 1, NULL, 'ermmyna@gmail.com', '123413241', 'Joe', 'Goh', NULL, NULL, NULL),
(21, 'ermmyna', '$2y$10$tf9nj7.oK1Tv45aW3YFYTeFyNkXXj4GYYbnrww/TnvE0APoy3dPFa', 1, NULL, 'ermmyna@gmail.com', '0192644588', 'Ermmyna', 'Roselee Shah', NULL, NULL, NULL),
(23, 'lionel', '$2y$10$en8lDOotgRijZET2.pjExuZ/fmqnUT1ySuJrljS96oIF4gKO63W3e', 0, NULL, 'lioneeeelkoh@gmail.com', '23455235234', 'Lionelllll', 'Koh', 'public_transportation', 'electricity_grid', 'meat_lover');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weeklylog`
--

INSERT INTO `weeklylog` (`LogID`, `userID`, `date`, `weekNo`, `month`, `carbonFootprintTransport`, `carbonFootprintFood`, `carbonFootprintEnergy`, `totalCarbonFootprint`) VALUES
(5, 1, '2024-03-01 22:59:51', 3, 'March', 12.3, 46.5, 2.85, 61.65),
(6, 1, '2024-03-02 23:38:47', 2, 'March', 12.3, 77.5, 5.9, 95.7),
(7, 1, '2024-03-03 00:11:26', 1, 'March', 18.5, 77.5, 2.85, 98.85),
(8, 1, '2024-03-04 20:53:26', 4, 'March', 10.1, 82, 4.5, 96.6),
(13, 7, '2024-02-29 19:43:15', 4, 'Feburary', 19.6, 73.5, 2.95, 96.05),
(14, 7, '2024-03-09 13:37:55', 2, 'March', 16.8, 54, 4.2, 75),
(15, 7, '2024-03-21 13:48:39', 3, 'March', 138.5, 49.5, 16.9, 204.9),
(16, 7, '2024-03-28 21:54:58', 4, 'March', 12, 41, 11.7, 64.7),
(17, 23, '2024-03-31 14:58:17', 5, 'March', 16.1, 69.5, 11.65, 97.25),
(18, 7, '2024-03-31 14:59:08', 5, 'March', 11.6, 41.5, 9.65, 62.75),
(19, 7, '2024-03-31 15:00:30', 5, 'March', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `carboncalculator`
--
ALTER TABLE `carboncalculator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educontent`
--
ALTER TABLE `educontent`
  ADD PRIMARY KEY (`contentID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `fk_feedback_user` (`userID`);

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
-- AUTO_INCREMENT for table `carboncalculator`
--
ALTER TABLE `carboncalculator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educontent`
--
ALTER TABLE `educontent`
  MODIFY `contentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `weeklylog`
--
ALTER TABLE `weeklylog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weeklylog`
--
ALTER TABLE `weeklylog`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
