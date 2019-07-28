-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2019 at 06:59 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `geo_tag` text NOT NULL,
  `discription` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `geo_tag`, `discription`, `created_at`, `updated_at`, `image`) VALUES
(1, 3, '<meta name=\"geo.region\" content=\"TW\" />\r\n<meta name=\"geo.placename\" content=\"Xinyi Township\" />\r\n<meta name=\"geo.position\" content=\"23.598298;120.835363\" />\r\n<meta name=\"ICBM\" content=\"23.598298, 120.835363\" />\r\n', 'Hotel\'s staffs are not in good mood.', '0000-00-00 00:00:00', '2019-07-28 16:48:38', NULL),
(2, 1, '<meta name=\"geo.region\" content=\"SG\" />\r\n<meta name=\"geo.placename\" content=\"Singapore\" />\r\n<meta name=\"geo.position\" content=\"1.340853;103.878447\" />\r\n<meta name=\"ICBM\" content=\"1.340853, 103.878447\" />\r\n', 'Foods are not testy and their services very bad.', '0000-00-00 00:00:00', '2019-07-28 16:48:38', NULL),
(3, 2, '<meta name=\"geo.region\" content=\"RU\" />\r\n<meta name=\"geo.position\" content=\"64.686314;97.745306\" />\r\n<meta name=\"ICBM\" content=\"64.686314, 97.745306\" />\r\n', 'Tables are arranged in bad way.', '0000-00-00 00:00:00', '2019-07-28 16:54:50', NULL),
(4, 5, '<meta name=\"geo.region\" content=\"PH\" />\r\n<meta name=\"geo.position\" content=\"12.750349;122.73121\" />\r\n<meta name=\"ICBM\" content=\"12.750349, 122.73121\" />\r\n', 'Toilets are dirty.', '0000-00-00 00:00:00', '2019-07-28 16:54:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `q&a` text NOT NULL,
  `geo_tag` text NOT NULL,
  `device_signature` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `q&a`, `geo_tag`, `device_signature`, `created_at`, `updated_at`) VALUES
(1, 1, '{\r\n    \"q1\": \"Incididunt amet pariatur occaecat deserunt laborum tempor id.\",\r\n    \"q2\": \"Consectetur mollit consequat ullamco velit ut aliquip veniam enim eu nisi.\",\r\n    \"q3\": \"Consequat amet exercitation consectetur nisi.\",\r\n    \"q4\": \"Enim culpa reprehenderit deserunt dolor ea occaecat aliqua sit.\",\r\n    \"q5\": \"Mollit et ullamco amet ad proident et deserunt est.\",\r\n    \"q6\": \"Do Lorem do nulla occaecat sint.\",\r\n    \"q7\": \"Nostrud ea ad labore ex consequat adipisicing culpa excepteur id in.\",\r\n    \"q8\": \"Quis commodo irure pariatur quis anim nisi laborum incididunt esse aute cillum ad Lorem.\",\r\n    \"q9\": \"Aliquip duis dolor voluptate et.\",\r\n    \"q10\": \"Dolor aute Lorem eu cillum culpa.\"\r\n  }', '<meta name=\"geo.region\" content=\"LK-71\" />\r\n<meta name=\"geo.position\" content=\"7.555494;80.713785\" />\r\n<meta name=\"ICBM\" content=\"7.555494, 80.713785\" />\r\n', 'Sent from my Android phone', '2019-07-28 16:38:32', '2019-07-28 16:38:32'),
(2, 3, '\r\n{\r\n    \"q1\": \"Dolore ipsum commodo nisi amet est dolore nulla laboris magna labore.\",\r\n    \"q2\": \"Ad nostrud nisi enim culpa ipsum ex Lorem.\",\r\n    \"q3\": \"Elit laborum laborum consectetur exercitation deserunt occaecat eu aliquip deserunt.\",\r\n    \"q4\": \"Ad ipsum pariatur pariatur minim.\",\r\n    \"q5\": \"Veniam deserunt velit nisi anim ex commodo nulla.\",\r\n    \"q6\": \"Consectetur duis aute Lorem aliquip dolore culpa non esse pariatur voluptate exercitation Lorem fugiat.\",\r\n    \"q7\": \"Reprehenderit labore magna do cupidatat nisi officia nisi excepteur commodo minim adipisicing pariatur incididunt.\",\r\n    \"q8\": \"Nisi aliqua eiusmod quis aliquip veniam pariatur quis officia excepteur nostrud officia dolore duis cillum.\",\r\n    \"q9\": \"Sit incididunt dolore culpa aliquip incididunt Lorem veniam velit ea pariatur fugiat sint.\",\r\n    \"q10\": \"Quis id amet fugiat duis non tempor eu cillum sit duis non ea.\"\r\n  }', '<meta name=\"geo.region\" content=\"SM\" />\r\n<meta name=\"geo.position\" content=\"43.945862;12.458306\" />\r\n<meta name=\"ICBM\" content=\"43.945862, 12.458306\" />', 'Sent from Samsung Mobile', '2019-07-28 16:38:32', '2019-07-28 16:38:32'),
(3, 5, '{\r\n    \"q1\": \"Pariatur minim consectetur voluptate in fugiat aute consectetur deserunt enim.\",\r\n    \"q2\": \"Eu Lorem aute mollit dolor culpa commodo dolor cillum velit.\",\r\n    \"q3\": \"Qui occaecat proident quis ut qui nostrud nostrud anim fugiat commodo ut nulla consequat eiusmod.\",\r\n    \"q4\": \"Fugiat labore sint incididunt in non esse ex nulla qui nostrud anim reprehenderit aute adipisicing.\",\r\n    \"q5\": \"Ex dolore do est nostrud culpa cupidatat eu in dolor nostrud et excepteur.\",\r\n    \"q6\": \"Pariatur commodo do ea minim ea ad amet ut voluptate deserunt adipisicing.\",\r\n    \"q7\": \"Et duis ullamco laboris id nostrud nisi.\",\r\n    \"q8\": \"Tempor laboris laborum sunt qui exercitation.\",\r\n    \"q9\": \"Culpa reprehenderit nulla esse do.\",\r\n    \"q10\": \"Consequat aliquip ad tempor elit irure voluptate.\"\r\n  }', '<meta name=\"geo.region\" content=\"PR\" />\r\n<meta name=\"geo.position\" content=\"18.221417;-66.413282\" />\r\n<meta name=\"ICBM\" content=\"18.221417, -66.413282\" />\r\n', 'Sent from my Windows Phone', '2019-07-28 16:42:53', '2019-07-28 16:42:53'),
(4, 2, ' {\r\n    \"q1\": \"Proident nostrud et Lorem exercitation aliqua aliquip fugiat minim adipisicing pariatur.\",\r\n    \"q2\": \"Id ad eiusmod adipisicing elit qui culpa.\",\r\n    \"q3\": \"Labore eiusmod id irure laboris adipisicing officia ad dolor in sit labore.\",\r\n    \"q4\": \"Sit et esse sint aliqua dolor id nostrud est laborum adipisicing.\",\r\n    \"q5\": \"Ullamco sit qui officia proident incididunt commodo reprehenderit id labore.\",\r\n    \"q6\": \"Proident occaecat eiusmod velit reprehenderit Lorem.\",\r\n    \"q7\": \"Non quis et deserunt sunt reprehenderit occaecat non.\",\r\n    \"q8\": \"Ipsum qui ex nisi excepteur eiusmod nisi anim velit proident mollit cupidatat qui.\",\r\n    \"q9\": \"Aliqua id Lorem pariatur velit occaecat veniam eu enim proident nisi aute aliquip culpa.\",\r\n    \"q10\": \"Veniam esse deserunt deserunt nostrud eiusmod dolor exercitation ex.\"\r\n  }', '<meta name=\"geo.region\" content=\"GB\" />\r\n<meta name=\"geo.position\" content=\"54.702355;-3.276575\" />\r\n<meta name=\"ICBM\" content=\"54.702355, -3.276575\" />\r\n', 'Sent from my Samsung Galaxy smartphone', '2019-07-28 16:42:53', '2019-07-28 16:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nic`, `nickname`, `email`, `phoneNo`, `admin`, `created_at`, `updated_at`, `image`) VALUES
(1, '953464110v', 'Slahiru', 's.lahiru1995@gmail.com', '0766352082', 1, '2019-07-28 14:23:59', '2019-07-28 14:23:59', NULL),
(2, '951413135v', 'aththa', 'lahirupre21@gmmail.com', '0776512789', 1, '2019-07-28 14:36:17', '2019-07-28 14:37:49', NULL),
(3, '354858109v', 'ashan', 'agfdnine@gmail.com', '0715898741', 1, '2019-07-28 15:40:44', '2019-07-28 15:40:44', NULL),
(4, '874578963v', 'west', 'west1234@gmail.com', '0784546987', 1, '2019-07-28 15:42:45', '2019-07-28 15:42:45', NULL),
(5, '971258796v', 'dinesh', 'dineshlakshitha@gmail.com', '0714578964', 1, '2019-07-28 15:45:10', '2019-07-28 15:45:10', NULL);

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
