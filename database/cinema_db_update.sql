-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2021 at 04:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--
CREATE DATABASE IF NOT EXISTS `cinema_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cinema_db`;
-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` bit(1) DEFAULT b'0',
  `activate_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `firstname`, `lastname`, `email`, `sdt`, `password`, `activated`, `activate_token`) VALUES
('haidang', 'Nguyen', 'Dang', 'nchdang16012001@gmail.com', '0395675163', '$2y$10$uyeioFcmRWB2t9ss41t9R.k4/CiEBHpaQTkgMzRpPfrOVHHCHbOjq', b'1', ''),
('tronghien', 'Nguyen', 'Hien', 'tronghien123654@gmail.com', '0949993438', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', b'1', '123456'),
('tronghien0403', 'Trong', 'Hien', 'incognito.designoop@gmail.com', '0913546545', '$2y$10$GnjHVHKq8o6IvvZHb7zUU.3/rd4xITyk3xz78PdXnyjbeiC2qR87y', b'1', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookingTable`
--

CREATE TABLE `bookingTable` (
  `bookingID` int(11) NOT NULL,
  `movieName` varchar(100) DEFAULT NULL,
  `bookingTheatre` varchar(100) NOT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `bookingTime` varchar(50) NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingLName` varchar(100) DEFAULT NULL,
  `bookingPNumber` varchar(12) NOT NULL,
  `paymentStatus` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingTable`
--

INSERT INTO `bookingTable` (`bookingID`, `movieName`, `bookingTheatre`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`, `paymentStatus`) VALUES
(29, 'Spider Man Far From Home', 'main-hall', '14-3', '15-00', 'Trong', 'Hien', '0913546545', 1),
(30, 'The Vanishing', 'main-hall', '14-3', '24-00', 'Trong', 'Hien', '0913546545', 1),
(32, 'Endgame', 'vip-hall', '12-3', '24-00', 'Nguyen', 'Hien', '0949993438', 0),
(33, 'Qarmat Bitamrmat  ', 'main-hall', '15-3', '15-00', 'Nguyen', 'Hien', '0949993438', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `job` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `job`, `gender`) VALUES
(1, 'Nguyen Cao Hai Dang', '908665356', 'receptionist', 'Male'),
(2, 'Nguyen Le Thu', '394564152', 'sell food', 'Female'),
(4, 'Nguyen Bi', '397891425', 'receptionist', 'Male'),
(5, 'Nguyen Kien', '1234567890', 'sell food drinks', 'Male'),
(6, 'Bibipiqwe', '0908577787', 'seller pop', 'male'),
(7, 'Nguyen bo', '09084571452', 'sell', 'male'),
(8, 'Hien Nguyen', '0949993438', 'CEO ', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chairs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `name`, `chairs`) VALUES
(0, 'Main Hall', 100),
(1, 'VIP Halll', 200),
(2, 'Hall Premium', 10);

-- --------------------------------------------------------

--
-- Table structure for table `movieTable`
--

CREATE TABLE `movieTable` (
  `movieID` int(11) NOT NULL,
  `movieImg` varchar(150) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `ticketPrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movieTable`
--

INSERT INTO `movieTable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `ticketPrice`) VALUES
(1, 'img/movie-poster-1.jpg', 'Captain Marvel', ' Action, Adventure, Sci-Fi ', 220, '2018-10-18', 'Anna Boden, Ryan Fleck', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn', 90000),
(2, 'img/movie-poster-2.jpg', 'Qarmat Bitamrmat  ', 'Comedy', 110, '2018-10-18', 'Assad Fouladkar', 'Ahmed Adam, Bayyumy Fouad, Salah Abdullah , Entsar, Dina Fouad ', 85000),
(3, 'img/movie-poster-3.jpg', 'The Lego Movie', 'Animation, Action, Adventure', 110, '2014-02-07', 'Phil Lord, Christopher Miller', 'Chris Pratt, Will Ferrell, Elizabeth Banks', 95000),
(4, 'img/movie-poster-4.jpg', 'Nadi Elregal Elserri ', 'Comedy', 105, '2019-01-23', ' Ayman Uttar', 'Karim Abdul Aziz, Ghada Adel, Maged El Kedwany, Nesreen Tafesh, Bayyumy Fouad, Moataz El Tony ', 86000),
(5, 'img/movie-poster-5.jpg', 'VICE', 'Biography, Comedy, Drama', 132, '2018-12-25', 'Adam McKay', 'Christian Bale, Amy Adams, Steve Carell', 45000),
(6, 'img/movie-poster-6.jpg', 'The Vanishing', 'Crime, Mystery, Thriller', 107, '2019-01-04', 'Kristoffer Nyholm', 'Gerard Butler, Peter Mullan, Connor Swindells', 50000),
(18, 'img/movie-poster-7.png', 'Endgame', 'Action', 200, '2021-12-22', 'Marvel', 'Iron Man', 75000),
(19, 'img/images.png', 'Spider Man Far From Home', 'superhero', 180, '2021-12-13', 'Marvel', 'tom holland', 120000),
(20, 'img/movie-poster-8.png', 'Hawkeyeee', 'Actioneee', 220, '2021-12-14', 'Marveleee', 'Hawkeyeee', 60000),
(22, 'img/movie-poster-9.jpg', 'The Conjuring: The Devil Made Me Do It', 'Horror/Thriller', 250, '2021-12-22', 'Michael Chaves', 'Dang gay', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reset_token`
--

CREATE TABLE `reset_token` (
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingTable`
--
ALTER TABLE `bookingTable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `bookingID_2` (`bookingID`),
  ADD KEY `bookingID_3` (`bookingID`),
  ADD KEY `bookingID_4` (`bookingID`);

--
-- Indexes for table `movieTable`
--
ALTER TABLE `movieTable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Indexes for table `reset_token`
--
ALTER TABLE `reset_token`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingTable`
--
ALTER TABLE `bookingTable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `movieTable`
--
ALTER TABLE `movieTable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
