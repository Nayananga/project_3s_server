-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2019 at 11:34 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback5`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permissions`
--

CREATE TABLE `auth_group_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `codename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `name`, `content_type_id`, `codename`) VALUES
(1, 'Can add mobileuser', 1, 'add_mobileuser'),
(2, 'Can change mobileuser', 1, 'change_mobileuser'),
(3, 'Can delete mobileuser', 1, 'delete_mobileuser'),
(4, 'Can view mobileuser', 1, 'view_mobileuser'),
(5, 'Can add review', 2, 'add_review'),
(6, 'Can change review', 2, 'change_review'),
(7, 'Can delete review', 2, 'delete_review'),
(8, 'Can view review', 2, 'view_review'),
(9, 'Can add complaint', 3, 'add_complaint'),
(10, 'Can change complaint', 3, 'change_complaint'),
(11, 'Can delete complaint', 3, 'delete_complaint'),
(12, 'Can view complaint', 3, 'view_complaint'),
(13, 'Can add question', 4, 'add_question'),
(14, 'Can change question', 4, 'change_question'),
(15, 'Can delete question', 4, 'delete_question'),
(16, 'Can view question', 4, 'view_question'),
(17, 'Can add hotel', 5, 'add_hotel'),
(18, 'Can change hotel', 5, 'change_hotel'),
(19, 'Can delete hotel', 5, 'delete_hotel'),
(20, 'Can view hotel', 5, 'view_hotel'),
(21, 'Can add log entry', 6, 'add_logentry'),
(22, 'Can change log entry', 6, 'change_logentry'),
(23, 'Can delete log entry', 6, 'delete_logentry'),
(24, 'Can view log entry', 6, 'view_logentry'),
(25, 'Can add permission', 7, 'add_permission'),
(26, 'Can change permission', 7, 'change_permission'),
(27, 'Can delete permission', 7, 'delete_permission'),
(28, 'Can view permission', 7, 'view_permission'),
(29, 'Can add group', 8, 'add_group'),
(30, 'Can change group', 8, 'change_group'),
(31, 'Can delete group', 8, 'delete_group'),
(32, 'Can view group', 8, 'view_group'),
(33, 'Can add user', 9, 'add_user'),
(34, 'Can change user', 9, 'change_user'),
(35, 'Can delete user', 9, 'delete_user'),
(36, 'Can view user', 9, 'view_user'),
(37, 'Can add content type', 10, 'add_contenttype'),
(38, 'Can change content type', 10, 'change_contenttype'),
(39, 'Can delete content type', 10, 'delete_contenttype'),
(40, 'Can view content type', 10, 'view_contenttype'),
(41, 'Can add session', 11, 'add_session'),
(42, 'Can change session', 11, 'change_session'),
(43, 'Can delete session', 11, 'delete_session'),
(44, 'Can view session', 11, 'view_session');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` datetime(6) DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `username` varchar(150) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_joined` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `password`, `last_login`, `is_superuser`, `username`, `first_name`, `last_name`, `email`, `is_staff`, `is_active`, `date_joined`) VALUES
(1, 'pbkdf2_sha256$150000$hij3zxyhssRY$+WnLzVc5InadQNuHkN8Sd2dyexjXz9YIH0O9jdgQK1w=', '2019-10-28 06:24:00.863668', 1, 'Ajanthy', '', '', 'ajanthy@gmail.com', 1, 1, '2019-09-30 13:52:08.669726');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_groups`
--

CREATE TABLE `auth_user_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_user_permissions`
--

CREATE TABLE `auth_user_user_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `django_admin_log`
--

CREATE TABLE `django_admin_log` (
  `id` int(11) NOT NULL,
  `action_time` datetime(6) NOT NULL,
  `object_id` longtext,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) UNSIGNED NOT NULL,
  `change_message` longtext NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `django_content_type`
--

CREATE TABLE `django_content_type` (
  `id` int(11) NOT NULL,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_content_type`
--

INSERT INTO `django_content_type` (`id`, `app_label`, `model`) VALUES
(6, 'admin', 'logentry'),
(8, 'auth', 'group'),
(7, 'auth', 'permission'),
(9, 'auth', 'user'),
(3, 'complaint', 'complaint'),
(10, 'contenttypes', 'contenttype'),
(5, 'hotel', 'hotel'),
(1, 'mobileusers', 'mobileuser'),
(4, 'question', 'question'),
(2, 'reviews', 'review'),
(11, 'sessions', 'session');

-- --------------------------------------------------------

--
-- Table structure for table `django_migrations`
--

CREATE TABLE `django_migrations` (
  `id` int(11) NOT NULL,
  `app` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `applied` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_migrations`
--

INSERT INTO `django_migrations` (`id`, `app`, `name`, `applied`) VALUES
(1, 'contenttypes', '0001_initial', '2019-09-30 13:09:15.166601'),
(2, 'auth', '0001_initial', '2019-09-30 13:09:17.065517'),
(3, 'admin', '0001_initial', '2019-09-30 13:09:24.503271'),
(4, 'admin', '0002_logentry_remove_auto_add', '2019-09-30 13:09:25.955541'),
(5, 'admin', '0003_logentry_add_action_flag_choices', '2019-09-30 13:09:26.020136'),
(6, 'contenttypes', '0002_remove_content_type_name', '2019-09-30 13:09:27.077262'),
(7, 'auth', '0002_alter_permission_name_max_length', '2019-09-30 13:09:27.190582'),
(8, 'auth', '0003_alter_user_email_max_length', '2019-09-30 13:09:27.324459'),
(9, 'auth', '0004_alter_user_username_opts', '2019-09-30 13:09:27.383012'),
(10, 'auth', '0005_alter_user_last_login_null', '2019-09-30 13:09:28.045460'),
(11, 'auth', '0006_require_contenttypes_0002', '2019-09-30 13:09:28.090386'),
(12, 'auth', '0007_alter_validators_add_error_messages', '2019-09-30 13:09:28.156448'),
(13, 'auth', '0008_alter_user_username_max_length', '2019-09-30 13:09:28.303134'),
(14, 'auth', '0009_alter_user_last_name_max_length', '2019-09-30 13:09:28.459257'),
(15, 'auth', '0010_alter_group_name_max_length', '2019-09-30 13:09:28.614671'),
(16, 'auth', '0011_update_proxy_permissions', '2019-09-30 13:09:28.696361'),
(17, 'mobileusers', '0001_initial', '2019-09-30 13:09:29.079811'),
(18, 'sessions', '0001_initial', '2019-09-30 13:09:29.364071'),
(19, 'hotel', '0001_initial', '2019-09-30 13:11:00.180269'),
(20, 'reviews', '0001_initial', '2019-09-30 13:12:58.812437'),
(21, 'reviews', '0002_auto_20190930_1313', '2019-09-30 13:13:59.220727'),
(22, 'complaint', '0001_initial', '2019-09-30 13:16:45.863148'),
(23, 'question', '0001_initial', '2019-09-30 13:18:31.162738'),
(24, 'hotel', '0002_hotel_slug', '2019-10-10 04:57:51.399954'),
(25, 'hotel', '0003_remove_hotel_slug', '2019-10-10 04:57:52.545466'),
(26, 'reviews', '0003_auto_20191028_0504', '2019-10-28 05:04:41.147980'),
(27, 'hotel', '0004_auto_20191028_0507', '2019-10-28 05:07:19.054750'),
(28, 'complaint', '0002_auto_20191101_1804', '2019-11-01 18:04:33.934421');

-- --------------------------------------------------------

--
-- Table structure for table `django_session`
--

CREATE TABLE `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_session`
--

INSERT INTO `django_session` (`session_key`, `session_data`, `expire_date`) VALUES
('15d5a6sq5bdhxhpz1fqy4pstcsqzcg29', 'YjQyMmY3OWQ1NTQ2ZWMwOGEwNGViMDI5MDE3MTQ2MzdkNDM4NDcxYTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJjNThkOTk5MGY1NDdiZTRhYWU0NjVkOTg5ZWVjNDMzYWRlNWZkMWEzIn0=', '2019-10-14 14:12:17.275880'),
('g329avrsa4deay1dop4kmklaudupohq6', 'YjQyMmY3OWQ1NTQ2ZWMwOGEwNGViMDI5MDE3MTQ2MzdkNDM4NDcxYTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJjNThkOTk5MGY1NDdiZTRhYWU0NjVkOTg5ZWVjNDMzYWRlNWZkMWEzIn0=', '2019-11-11 06:24:00.957719'),
('haj5x5mz5mh3mkvw305zjt4n6sx91jot', 'YjQyMmY3OWQ1NTQ2ZWMwOGEwNGViMDI5MDE3MTQ2MzdkNDM4NDcxYTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJjNThkOTk5MGY1NDdiZTRhYWU0NjVkOTg5ZWVjNDMzYWRlNWZkMWEzIn0=', '2019-10-24 04:44:51.429171'),
('iec61qskzqzt988nmarhy7jq94rrmnpt', 'YjQyMmY3OWQ1NTQ2ZWMwOGEwNGViMDI5MDE3MTQ2MzdkNDM4NDcxYTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJjNThkOTk5MGY1NDdiZTRhYWU0NjVkOTg5ZWVjNDMzYWRlNWZkMWEzIn0=', '2019-11-11 05:05:38.656359'),
('l55lfa5rj8awv6vg95orkq2tu7e6zbbp', 'YjQyMmY3OWQ1NTQ2ZWMwOGEwNGViMDI5MDE3MTQ2MzdkNDM4NDcxYTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJjNThkOTk5MGY1NDdiZTRhYWU0NjVkOTg5ZWVjNDMzYWRlNWZkMWEzIn0=', '2019-10-24 20:05:01.781190'),
('n4l4wp6tuozv6g3dx8qr5vsdjv6b18pq', 'YjQyMmY3OWQ1NTQ2ZWMwOGEwNGViMDI5MDE3MTQ2MzdkNDM4NDcxYTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJjNThkOTk5MGY1NDdiZTRhYWU0NjVkOTg5ZWVjNDMzYWRlNWZkMWEzIn0=', '2019-10-15 10:26:31.823775'),
('obge280l7ypwpvoenpq9sgnl0kjk4ym1', 'YjQyMmY3OWQ1NTQ2ZWMwOGEwNGViMDI5MDE3MTQ2MzdkNDM4NDcxYTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJjNThkOTk5MGY1NDdiZTRhYWU0NjVkOTg5ZWVjNDMzYWRlNWZkMWEzIn0=', '2019-10-24 16:15:27.504833');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(1000) NOT NULL,
  `geo_tag` longtext NOT NULL,
  `address` varchar(3000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_name`, `geo_tag`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Akshathai', '{\"longitude\":9.6677671,\"latitude\":80.0177813}', '60, Stanley Rd, Jaffna 40000', '2019-09-30 13:12:01', '2019-10-10 04:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(4000) NOT NULL,
  `expected_answer` json NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `qa` text NOT NULL,
  `geo_tag` varchar(300) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `device_signature` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `qa`, `geo_tag`, `hotel_id` , `device_signature`, `created_at`, `updated_at`) VALUES
(39, '102184603142251166236', '[{\"question\":\"Does the Restaurant Have a Sufficient Selection of Healthy Choices?\",\"answer\":\"Agree\"},{\"question\":\"How Quick or Adequate Was the Speed of Service?\",\"answer\":\"Bad\"},{\"question\":\"How good was the outside environment of the restaurant?\",\"answer\":\"Pleasant\"},{\"question\":\"What Did You Like Best About Our Food and Services?\",\"answer\":\"Food\"}]', '{\"longitude\":79.9814909,\"latitude\":6.9418863}', 1, 'TRT-LX2', '2019-10-06 10:19:44', '2019-10-06 10:19:44');

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
-- Indexes for table `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_group_permissions_group_id_permission_id_0cd325b0_uniq` (`group_id`,`permission_id`),
  ADD KEY `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_permission_content_type_id_codename_01ab375a_uniq` (`content_type_id`,`codename`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_groups_user_id_group_id_94350c0c_uniq` (`user_id`,`group_id`),
  ADD KEY `auth_user_groups_group_id_97559544_fk_auth_group_id` (`group_id`);

--
-- Indexes for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_user_permissions_user_id_permission_id_14a6b632_uniq` (`user_id`,`permission_id`),
  ADD KEY `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_user_id_2979efd5_fk_user_google_id` (`user_id`);

--
-- Indexes for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `django_admin_log_content_type_id_c4bce8eb_fk_django_co` (`content_type_id`),
  ADD KEY `django_admin_log_user_id_c564eba6_fk_auth_user_id` (`user_id`);

--
-- Indexes for table `django_content_type`
--
ALTER TABLE `django_content_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `django_content_type_app_label_model_76bd3d3b_uniq` (`app_label`,`model`);

--
-- Indexes for table `django_migrations`
--
ALTER TABLE `django_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `django_session`
--
ALTER TABLE `django_session`
  ADD PRIMARY KEY (`session_key`),
  ADD KEY `django_session_expire_date_a5c62663` (`expire_date`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_hotel_id_1e562fe7_fk_hotel_id` (`hotel_id`),
  ADD KEY `review_user_id_1520d914_fk_user_google_id` (`user_id`);

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
-- AUTO_INCREMENT for table `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `django_content_type`
--
ALTER TABLE `django_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `django_migrations`
--
ALTER TABLE `django_migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD CONSTRAINT `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `auth_group_permissions_group_id_b120cbf9_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Constraints for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD CONSTRAINT `auth_permission_content_type_id_2f476e4b_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD CONSTRAINT `auth_user_groups_group_id_97559544_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_user_groups_user_id_6a12ed8b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD CONSTRAINT `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaint_user_id_2979efd5_fk_user_google_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`google_id`);

--
-- Constraints for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD CONSTRAINT `django_admin_log_content_type_id_c4bce8eb_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `django_admin_log_user_id_c564eba6_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review_hotel_id_1e562fe7_fk_hotel_id` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `review_user_id_1520d914_fk_user_google_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`google_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;