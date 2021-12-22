-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 06:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

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

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE `movietable` (
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
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `ticketPrice`) VALUES
(23, 'img/movie-poster-1.jpg', 'Hawkeye', 'Action, Scienfic', 180, '2021-03-23', 'Marvel', 'Jeremy Renner, Troy Baker, Tody Diniel', 30000),
(24, 'img/movie-poster-2.jpg', 'Ant Man', 'Action, Comedy', 200, '2021-03-02', 'Marvel', 'Paul Rudd, Stan Lee, T.I', 20000),
(25, 'img/movie-poster-3.jpg', 'Shang-Chi', 'Superhero', 250, '2021-03-09', 'Marvel', 'Simu Liu, Awkquafina, Fala Chen', 25000),
(26, 'img/movie-poster-4.jpg', 'Black Panther', 'Action, Adventure', 190, '2021-03-14', 'Marvel', 'Chadwick BoseMan, Michael Jordan B', 35000),
(27, 'img/movie-poster-5.jpg', 'Guardians of Galaxy', 'Action, Crime', 200, '2021-03-11', 'Marvel', 'Josh Brolyn, Diane Lane', 40000),
(28, 'img/movie-poster-6.jpg', 'Captain Marvel', 'Action, Adventure', 250, '2021-03-20', 'Marvel', 'Brie Larson, Samuel L Jackson', 35000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
