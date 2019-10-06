-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2019 at 03:51 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(56) NOT NULL,
  `email` varchar(56) NOT NULL,
  `password` varchar(76) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'user1', 'user1@gmail.com', 'user147'),
(2, 'slahiru', 'slahiru147@gmail.com', 'shehanlahiru'),
(3, 'user2', 'user2@gmail.com', 'user123456'),
(4, 'user3', 'user3@gmail.com', 'user123');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `geo_tag` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `geo_tag`, `description`, `created_at`, `updated_at`, `image`) VALUES
(13, '102184603142251166236', '{\"longitude\":79.9814909,\"latitude\":6.9418863}', 'test', '2019-10-06 10:15:33', '2019-10-06 10:15:33', 'NO IMAGE'),
(14, '102184603142251166236', '{\"longitude\":79.9814909,\"latitude\":6.9418863}', 'test2', '2019-10-06 10:16:29', '2019-10-06 10:16:29', '/home/nayananga/Desktop/project_3s_server/src/Service/../../images/102184603142251166236/scaled_Screenshot_20191006-130116.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `qa` text NOT NULL,
  `geo_tag` varchar(300) NOT NULL,
  `device_signature` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `qa`, `geo_tag`, `device_signature`, `created_at`, `updated_at`) VALUES
(39, '102184603142251166236', '[{\"question\":\"Does the Restaurant Have a Sufficient Selection of Healthy Choices?\",\"answer\":\"Agree\"},{\"question\":\"How Quick or Adequate Was the Speed of Service?\",\"answer\":\"Bad\"},{\"question\":\"How good was the outside environment of the restaurant?\",\"answer\":\"Pleasant\"},{\"question\":\"What Did You Like Best About Our Food and Services?\",\"answer\":\"Food\"}]', '{\"longitude\":79.9814909,\"latitude\":6.9418863}', 'TRT-LX2', '2019-10-06 10:19:44', '2019-10-06 10:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `google_id` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `nickname` varchar(300) DEFAULT NULL,
  `phoneNo` varchar(100) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`google_id`, `email`, `nickname`, `phoneNo`, `image`, `nic`, `created_at`, `updated_at`) VALUES
('102184603142251166236', 'nicknam952@gmail.com', 'Nayananga Muhandiram', NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mDoHBcpm1TliHSrVVY7CSZWezR_-eo8UGGjOQSD=s96-c', NULL, '2019-09-25 16:35:34', '2019-09-25 16:35:34'),
('113631093528068171553', 'nicknam95@gmail.com', 'Nayananga Muhandiram', NULL, 'https://lh5.googleusercontent.com/-s3bD7CIReJQ/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfp-DUBv9SkwWHs0PKCmdRG6IVJBA/s96-c/photo.jpg', NULL, '2019-09-25 16:44:40', '2019-09-25 16:44:40'),
('118044157704803116440', 'nayanangamuhandiram@gmail.com', 'Nayananga Muhandiram', NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mBpeSpCp8amkvOusoZrf0J9tfK398CMJcnHB1ua=s96-c', NULL, '2019-09-29 00:19:13', '2019-09-29 00:19:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`google_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
