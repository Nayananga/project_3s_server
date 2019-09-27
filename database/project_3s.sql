-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2019 at 09:29 PM
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
  `user_id` int(11) NOT NULL,
  `geo_tag` text NOT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `geo_tag`, `description`, `created_at`, `updated_at`, `image`) VALUES
(1, 3, '<meta name=\"geo.region\" content=\"TW\" />\r\n<meta name=\"geo.placename\" content=\"Xinyi Township\" />\r\n<meta name=\"geo.position\" content=\"23.598298;120.835363\" />\r\n<meta name=\"ICBM\" content=\"23.598298, 120.835363\" />\r\n', 'Hotel\'s staffs are not in good mood.', '2019-07-29 20:14:00', '2019-07-28 11:18:38', NULL),
(2, 1, '<meta name=\"geo.region\" content=\"SG\" />\r\n<meta name=\"geo.placename\" content=\"Singapore\" />\r\n<meta name=\"geo.position\" content=\"1.340853;103.878447\" />\r\n<meta name=\"ICBM\" content=\"1.340853, 103.878447\" />\r\n', 'Foods are not testy and their services very bad.', '2019-07-29 20:14:00', '2019-07-28 11:18:38', NULL),
(3, 2, '<meta name=\"geo.region\" content=\"RU\" />\r\n<meta name=\"geo.position\" content=\"64.686314;97.745306\" />\r\n<meta name=\"ICBM\" content=\"64.686314, 97.745306\" />\r\n', 'Tables are arranged in bad way.', '2019-07-29 20:14:00', '2019-07-28 11:24:50', NULL),
(4, 5, '<meta name=\"geo.region\" content=\"PH\" />\r\n<meta name=\"geo.position\" content=\"12.750349;122.73121\" />\r\n<meta name=\"ICBM\" content=\"12.750349, 122.73121\" />\r\n', 'Toilets are dirty.', '2019-07-29 20:14:00', '2019-07-28 11:24:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` varchar(300) NOT NULL,
  `qa` text NOT NULL,
  `geo_tag` text NOT NULL,
  `device_signature` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `qa`, `geo_tag`, `device_signature`, `created_at`, `updated_at`) VALUES
('102184603142251166236', '[{\"question\":\"Does the Restaurant Have a Sufficient Selection of Healthy Choices?\",\"answer\":\"Very much Agree\"},{\"question\":\"How Often Do You Dine with Us?\",\"answer\":\"Very Often\"},{\"question\":\"What Did You Like Best About Our Food and Services?\",\"answer\":\"Food\"},{\"question\":\"How Quick or Adequate Was the Speed of Service?\",\"answer\":\"Very Quick\"}]', 'test_geo_Tag', 'TRT-LX2', '2019-09-27 00:33:56', '2019-09-27 00:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `google_id` varchar(300) NOT NULL,
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
('118044157704803116440', 'nayanangamuhandiram@gmail.com', 'Nayananga Muhandiram', NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mBpeSpCp8amkvOusoZrf0J9tfK398CMJcnHB1ua=s96-c', NULL, '2019-09-08 21:58:50', '2019-09-08 21:58:50');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_1` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`google_id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
