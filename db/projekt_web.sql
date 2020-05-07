-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 02:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE `opinion` (
  `idOpinion` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idShfaqje` int(11) NOT NULL,
  `review` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orar`
--

CREATE TABLE `orar` (
  `idOrar` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `idShfaq` int(11) NOT NULL,
  `ora_fillimi` time NOT NULL,
  `date_shfaqje` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pswreset`
--

CREATE TABLE `pswreset` (
  `pswresetId` int(11) NOT NULL,
  `pswemail` text NOT NULL,
  `pswtoken` longtext NOT NULL,
  `expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rezervim`
--

CREATE TABLE `rezervim` (
  `rezervim_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orarId` int(11) NOT NULL,
  `no_seats` int(11) NOT NULL COMMENT 'numer vendesh',
  `total_pagese` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `salle_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `emer_salle` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'numer vendesh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shfaqje`
--

CREATE TABLE `shfaqje` (
  `shfaqje_id` int(11) NOT NULL,
  `salleId` int(11) NOT NULL,
  `shfaqje_emer` varchar(100) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `pershkrim` varchar(1000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `zhaner` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teater`
--

CREATE TABLE `teater` (
  `teater_id` int(11) NOT NULL,
  `teater_emer` varchar(45) DEFAULT NULL,
  `adrese` varchar(45) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userPass` varchar(10) NOT NULL,
  `emer` varchar(20) NOT NULL,
  `mbiemer` varchar(20) NOT NULL,
  `moshe` int(11) NOT NULL,
  `gjini` varchar(10) NOT NULL,
  `telefon` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userType` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`idOpinion`),
  ADD KEY `opinion_ibfk_1` (`idUser`),
  ADD KEY `opinion_ibfk_2` (`idShfaqje`);

--
-- Indexes for table `orar`
--
ALTER TABLE `orar`
  ADD PRIMARY KEY (`idOrar`),
  ADD KEY `idSalle` (`idSalle`),
  ADD KEY `idShfaq` (`idShfaq`);

--
-- Indexes for table `pswreset`
--
ALTER TABLE `pswreset`
  ADD PRIMARY KEY (`pswresetId`);

--
-- Indexes for table `rezervim`
--
ALTER TABLE `rezervim`
  ADD PRIMARY KEY (`rezervim_id`),
  ADD KEY `rezervim_ibfk_2` (`user_id`),
  ADD KEY `rezervim_ibfk_3` (`orarId`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`salle_id`),
  ADD KEY `salle_ibfk_1` (`t_id`);

--
-- Indexes for table `shfaqje`
--
ALTER TABLE `shfaqje`
  ADD PRIMARY KEY (`shfaqje_id`),
  ADD KEY `salleId` (`salleId`);

--
-- Indexes for table `teater`
--
ALTER TABLE `teater`
  ADD PRIMARY KEY (`teater_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `idOpinion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orar`
--
ALTER TABLE `orar`
  MODIFY `idOrar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pswreset`
--
ALTER TABLE `pswreset`
  MODIFY `pswresetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervim`
--
ALTER TABLE `rezervim`
  MODIFY `rezervim_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `salle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shfaqje`
--
ALTER TABLE `shfaqje`
  MODIFY `shfaqje_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teater`
--
ALTER TABLE `teater`
  MODIFY `teater_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `opinion_ibfk_2` FOREIGN KEY (`idShfaqje`) REFERENCES `shfaqje` (`shfaqje_id`);

--
-- Constraints for table `orar`
--
ALTER TABLE `orar`
  ADD CONSTRAINT `orar_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`salle_id`),
  ADD CONSTRAINT `orar_ibfk_2` FOREIGN KEY (`idShfaq`) REFERENCES `shfaqje` (`shfaqje_id`);

--
-- Constraints for table `rezervim`
--
ALTER TABLE `rezervim`
  ADD CONSTRAINT `rezervim_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `rezervim_ibfk_3` FOREIGN KEY (`orarId`) REFERENCES `orar` (`idOrar`);

--
-- Constraints for table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teater` (`teater_id`);

--
-- Constraints for table `shfaqje`
--
ALTER TABLE `shfaqje`
  ADD CONSTRAINT `shfaqje_ibfk_1` FOREIGN KEY (`salleId`) REFERENCES `salle` (`salle_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
