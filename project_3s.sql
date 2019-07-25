-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2019 at 01:11 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_3s`
--

-- --------------------------------------------------------

--
-- Table structure for table `COMPLAINTS`
--

CREATE TABLE `COMPLAINTS` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `geo_tag` text NOT NULL,
  `discription` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `REVIEWS`
--

CREATE TABLE `REVIEWS` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `q&a` text NOT NULL,
  `geo_tag` text NOT NULL,
  `device_signature` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `id` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `nickname` varchar(300) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `phoneNo` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COMPLAINTS`
--
ALTER TABLE `COMPLAINTS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_1` (`user_id`);

--
-- Indexes for table `REVIEWS`
--
ALTER TABLE `REVIEWS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_1` (`user_id`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COMPLAINTS`
--
ALTER TABLE `COMPLAINTS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `REVIEWS`
--
ALTER TABLE `REVIEWS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `COMPLAINTS`
--
ALTER TABLE `COMPLAINTS`
  ADD CONSTRAINT `complaints_1` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `REVIEWS`
--
ALTER TABLE `REVIEWS`
  ADD CONSTRAINT `reviews_1` FOREIGN KEY (`user_id`) REFERENCES `USER` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
