-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 08, 2024 at 06:47 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team18`
--

-- --------------------------------------------------------

--
-- Table structure for table `muZhao_feedback`
--

CREATE TABLE `muZhao_feedback` (
  `ID` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `topic` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `muZhao_feedback`
--

INSERT INTO `muZhao_feedback` (`ID`, `name`, `email`, `topic`, `message`) VALUES
(1, 'Mia', 'mia@gmail.com', 'food', 'The dishes are delicious, with a delightful flavor, and the ingredients are very fresh.'),
(2, 'Elsa', 'elsa@gmail.com', 'service', 'The service is excellent, and the waitstaff is very welcoming.'),
(3, 'Ada', 'ada@gmail.com', 'environment', 'The ambiance is great, very elegant. I will definitely come back');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `muZhao_feedback`
--
ALTER TABLE `muZhao_feedback`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `muZhao_feedback`
--
ALTER TABLE `muZhao_feedback`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
