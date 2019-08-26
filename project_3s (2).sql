-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 08:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(56) NOT NULL,
  `email` varchar(56) DEFAULT NULL,
  `password` varchar(76) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `admin`, `active`, `last_login`) VALUES
(1, 'Shehan', 's.lahiru1995@gmail.com', 'pbkdf2_sha256$150000$5NW1n4oTCuXX$N2HyBrb3xZtNLxs9kJaq+mk7a7M+npwLIx4Ri9u6ta', 1, 1, NULL),
(2, 'user1', 'user1@gmail.com', 'user1user1', 0, 1, NULL),
(3, 'user2', 'user2@gmail.com', 'user2user2', 0, 1, NULL);

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
(1, 'Can add admin', 1, 'add_admin'),
(2, 'Can change admin', 1, 'change_admin'),
(3, 'Can delete admin', 1, 'delete_admin'),
(4, 'Can view admin', 1, 'view_admin'),
(5, 'Can add user', 2, 'add_user'),
(6, 'Can change user', 2, 'change_user'),
(7, 'Can delete user', 2, 'delete_user'),
(8, 'Can view user', 2, 'view_user'),
(9, 'Can add reviews', 3, 'add_reviews'),
(10, 'Can change reviews', 3, 'change_reviews'),
(11, 'Can delete reviews', 3, 'delete_reviews'),
(12, 'Can view reviews', 3, 'view_reviews'),
(13, 'Can add complaints', 4, 'add_complaints'),
(14, 'Can change complaints', 4, 'change_complaints'),
(15, 'Can delete complaints', 4, 'delete_complaints'),
(16, 'Can view complaints', 4, 'view_complaints'),
(17, 'Can add log entry', 5, 'add_logentry'),
(18, 'Can change log entry', 5, 'change_logentry'),
(19, 'Can delete log entry', 5, 'delete_logentry'),
(20, 'Can view log entry', 5, 'view_logentry'),
(21, 'Can add permission', 6, 'add_permission'),
(22, 'Can change permission', 6, 'change_permission'),
(23, 'Can delete permission', 6, 'delete_permission'),
(24, 'Can view permission', 6, 'view_permission'),
(25, 'Can add group', 7, 'add_group'),
(26, 'Can change group', 7, 'change_group'),
(27, 'Can delete group', 7, 'delete_group'),
(28, 'Can view group', 7, 'view_group'),
(29, 'Can add user', 8, 'add_user'),
(30, 'Can change user', 8, 'change_user'),
(31, 'Can delete user', 8, 'delete_user'),
(32, 'Can view user', 8, 'view_user'),
(33, 'Can add content type', 9, 'add_contenttype'),
(34, 'Can change content type', 9, 'change_contenttype'),
(35, 'Can delete content type', 9, 'delete_contenttype'),
(36, 'Can view content type', 9, 'view_contenttype'),
(37, 'Can add session', 10, 'add_session'),
(38, 'Can change session', 10, 'change_session'),
(39, 'Can delete session', 10, 'delete_session'),
(40, 'Can view session', 10, 'view_session'),
(41, 'Can add complaint', 11, 'add_complaint'),
(42, 'Can change complaint', 11, 'change_complaint'),
(43, 'Can delete complaint', 11, 'delete_complaint'),
(44, 'Can view complaint', 11, 'view_complaint'),
(45, 'Can add review', 12, 'add_review'),
(46, 'Can change review', 12, 'change_review'),
(47, 'Can delete review', 12, 'delete_review'),
(48, 'Can view review', 12, 'view_review'),
(49, 'Can add question', 13, 'add_question'),
(50, 'Can change question', 13, 'change_question'),
(51, 'Can delete question', 13, 'delete_question'),
(52, 'Can view question', 13, 'view_question'),
(53, 'Can add bookmark', 14, 'add_bookmark'),
(54, 'Can change bookmark', 14, 'change_bookmark'),
(55, 'Can delete bookmark', 14, 'delete_bookmark'),
(56, 'Can view bookmark', 14, 'view_bookmark'),
(57, 'Can add pinned application', 15, 'add_pinnedapplication'),
(58, 'Can change pinned application', 15, 'change_pinnedapplication'),
(59, 'Can delete pinned application', 15, 'delete_pinnedapplication'),
(60, 'Can view pinned application', 15, 'view_pinnedapplication'),
(61, 'Can add user dashboard module', 16, 'add_userdashboardmodule'),
(62, 'Can change user dashboard module', 16, 'change_userdashboardmodule'),
(63, 'Can delete user dashboard module', 16, 'delete_userdashboardmodule'),
(64, 'Can view user dashboard module', 16, 'view_userdashboardmodule');

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
(1, 'pbkdf2_sha256$150000$vpmTlCHx4SpD$eKvBPmAMwp4m0CacswiN+KnBRcG0sS3D/yD48yYdOh8=', '2019-08-16 17:44:45.086849', 1, 'Ajanthy', '', '', '2016csc031@gmail.com', 1, 1, '2019-08-16 17:44:32.735021'),
(2, 'pbkdf2_sha256$150000$Ww8icX6SGgVm$ORQ5evSPYQ/ZrtuarudXbGv8Ft7S4+vNL5GBlKjen+s=', '2019-08-26 14:58:05.102554', 1, 'shehan', '', '', 's.lahiru1995@gmail.com', 1, 1, '2019-08-17 05:52:53.056169'),
(3, 'user3user3', NULL, 0, 'user3', '', '', 'user3@gmail.com', 0, 1, '2019-08-26 06:55:35.021219'),
(4, 'user1user1', NULL, 0, 'user1', '', '', 'user1@gmail.com', 1, 1, '2019-08-26 07:03:05.831483'),
(5, 'pbkdf2_sha256$150000$bALubuAGB4hl$ZgVeDJyRWKP7IQp07DFjZG6WthzizVNnbnpUIzWZz1g=', '2019-08-26 14:59:23.806238', 0, 'user4', '', '', 'user4@gmail.com', 1, 1, '2019-08-26 10:56:35.000000'),
(6, 'user5user5', NULL, 0, 'user5', '', '', 'user5@gmail.com', 1, 1, '2019-08-26 15:00:02.469675'),
(7, 'user6user6', NULL, 0, 'user6', '', '', 'user6@gmail.com', 1, 1, '2019-08-26 15:17:03.984519'),
(8, 'pbkdf2_sha256$150000$J2zgoi8mMypE$89ju2KPgbrtS5OBeojvBWLw0WNxZ728sk6wWSKG0EXw=', '2019-08-26 17:06:57.219739', 0, 'user7', '', '', 'user7@gmail.com', 1, 1, '2019-08-26 15:47:06.686422');

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
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `geo_tag` longtext NOT NULL,
  `description` longtext NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `last_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `user_id`, `geo_tag`, `description`, `date_created`, `last_modified`) VALUES
(1, 13, '97.279655', 'Push top part seven relate. Spend foot who process describe visit. Hold source country family study.', '2019-08-16 21:01:56.744228', '2019-08-16 21:01:56.744228'),
(2, 20, '122.524557', 'Staff per truth since address chance resource power. Local respond product. Debate or stage onto course culture miss.', '2019-08-16 21:01:56.882596', '2019-08-16 21:01:56.882596'),
(3, 5, '163.121031', 'Whole key life close. Yet expect national should artist itself across. Behind future behind smile.', '2019-08-16 21:01:56.933732', '2019-08-16 21:01:56.933732'),
(4, 11, '-17.397508', 'Break way environmental. Color money small style into husband. The about upon statement whose your short position.', '2019-08-16 21:01:56.959803', '2019-08-16 21:01:56.959803'),
(5, 18, '-141.360187', 'Friend respond evidence idea able week music. Sit director represent into summer if ahead. Up both throughout civil build customer.', '2019-08-16 21:01:57.032996', '2019-08-16 21:01:57.032996'),
(6, 9, '-91.995807', 'Idea site though technology trip. Animal cold computer.', '2019-08-16 21:01:57.103183', '2019-08-16 21:01:57.103183'),
(7, 2, '107.764965', 'Weight might whole change it. Wind drug worry audience PM stand. Boy plan crime.', '2019-08-16 21:01:57.180389', '2019-08-16 21:01:57.180389'),
(8, 6, '-28.022592', 'Discover college study others fear rich. As individual though apply morning. He second per play anyone consumer street.', '2019-08-16 21:01:57.214478', '2019-08-16 21:01:57.214478'),
(9, 11, '-107.363100', 'Save development institution seat language. Executive serve various special sell fish deal.', '2019-08-16 21:01:57.243556', '2019-08-16 21:01:57.243556'),
(10, 20, '141.622594', 'Religious but impact despite. Stage ahead carry past particular I according.', '2019-08-16 21:01:57.269626', '2019-08-16 21:01:57.269626'),
(11, 17, '28.375152', 'Call head word coach. Cause a spring worry enjoy rich matter. Similar long personal finally including.', '2019-08-16 21:01:57.298704', '2019-08-16 21:01:57.298704'),
(12, 15, '-150.089743', 'Manage tree near type hit attack maintain. Staff lay commercial say bit.', '2019-08-16 21:01:57.324772', '2019-08-16 21:01:57.324772'),
(13, 16, '142.507064', 'Around right well ago change. Fast the level Republican happy almost seven Republican. Care but long result effort hope consumer.', '2019-08-16 21:01:57.354851', '2019-08-16 21:01:57.354851'),
(14, 7, '-57.169691', 'Drug serious else conference image form. Network property car indicate why middle get. Something level off time information.', '2019-08-16 21:01:57.380921', '2019-08-16 21:01:57.380921'),
(15, 9, '-64.219194', 'Seat ability player my provide environmental stuff. War general general choice cold. Short who the individual total usually well.', '2019-08-16 21:01:57.409998', '2019-08-16 21:01:57.409998'),
(16, 12, '-119.491082', 'Campaign save place bit might. Nation again fall.', '2019-08-16 21:01:57.435065', '2019-08-16 21:01:57.435065'),
(17, 11, '-1.675761', 'Space do opportunity plan ability themselves. Several compare skin rock. Still position choose indicate position staff. Dinner situation behavior method.', '2019-08-16 21:01:57.465145', '2019-08-16 21:01:57.465145'),
(18, 4, '-67.896598', 'Program describe film drive here campaign. Big game government happen.', '2019-08-16 21:01:57.491214', '2019-08-16 21:01:57.491214'),
(19, 5, '-110.243172', 'Draw though special which chair public hand. Their control too service base.', '2019-08-16 21:01:57.520292', '2019-08-16 21:01:57.520292'),
(20, 16, '-1.256950', 'Water last international nor piece central. Bank new nothing program. Activity almost seem stop agent reason space.', '2019-08-16 21:01:57.546361', '2019-08-16 21:01:57.546361');

-- --------------------------------------------------------

--
-- Table structure for table `django_admin_log`
--

CREATE TABLE `django_admin_log` (
  `id` int(11) NOT NULL,
  `action_time` datetime(6) NOT NULL,
  `object_id` longtext DEFAULT NULL,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) UNSIGNED NOT NULL,
  `change_message` longtext NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_admin_log`
--

INSERT INTO `django_admin_log` (`id`, `action_time`, `object_id`, `object_repr`, `action_flag`, `change_message`, `content_type_id`, `user_id`) VALUES
(1, '2019-08-16 19:26:00.522493', '1', 'user object (1)', 1, '[{\"added\": {}}]', 2, 1),
(2, '2019-08-16 19:26:19.982022', '1', 'user object (1)', 2, '[]', 2, 1),
(3, '2019-08-16 20:09:23.149612', '4', '1', 1, '[{\"added\": {}}]', 12, 1),
(4, '2019-08-26 10:56:36.270834', '5', 'user4', 1, '[{\"added\": {}}]', 8, 2),
(5, '2019-08-26 10:57:19.693732', '5', 'user4', 2, '[{\"changed\": {\"fields\": [\"email\"]}}]', 8, 2),
(6, '2019-08-26 10:58:18.234063', '5', 'user4', 2, '[{\"changed\": {\"fields\": [\"is_staff\"]}}]', 8, 2);

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
(5, 'admin', 'logentry'),
(7, 'auth', 'group'),
(6, 'auth', 'permission'),
(8, 'auth', 'user'),
(9, 'contenttypes', 'contenttype'),
(16, 'dashboard', 'userdashboardmodule'),
(14, 'jet', 'bookmark'),
(15, 'jet', 'pinnedapplication'),
(1, 'loginwithauth', 'admin'),
(11, 'loginwithauth', 'complaint'),
(4, 'loginwithauth', 'complaints'),
(13, 'loginwithauth', 'question'),
(12, 'loginwithauth', 'review'),
(3, 'loginwithauth', 'reviews'),
(2, 'loginwithauth', 'user'),
(10, 'sessions', 'session');

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
(1, 'contenttypes', '0001_initial', '2019-08-16 17:36:27.029169'),
(2, 'auth', '0001_initial', '2019-08-16 17:36:28.273984'),
(3, 'admin', '0001_initial', '2019-08-16 17:36:34.497213'),
(4, 'admin', '0002_logentry_remove_auto_add', '2019-08-16 17:36:35.609622'),
(5, 'admin', '0003_logentry_add_action_flag_choices', '2019-08-16 17:36:35.686837'),
(6, 'contenttypes', '0002_remove_content_type_name', '2019-08-16 17:36:36.486658'),
(7, 'auth', '0002_alter_permission_name_max_length', '2019-08-16 17:36:37.050194'),
(8, 'auth', '0003_alter_user_email_max_length', '2019-08-16 17:36:37.843392'),
(9, 'auth', '0004_alter_user_username_opts', '2019-08-16 17:36:37.943803'),
(10, 'auth', '0005_alter_user_last_login_null', '2019-08-16 17:36:38.273140'),
(11, 'auth', '0006_require_contenttypes_0002', '2019-08-16 17:36:38.343650'),
(12, 'auth', '0007_alter_validators_add_error_messages', '2019-08-16 17:36:38.419872'),
(13, 'auth', '0008_alter_user_username_max_length', '2019-08-16 17:36:38.929043'),
(14, 'auth', '0009_alter_user_last_name_max_length', '2019-08-16 17:36:39.802901'),
(15, 'auth', '0010_alter_group_name_max_length', '2019-08-16 17:36:40.498332'),
(16, 'auth', '0011_update_proxy_permissions', '2019-08-16 17:36:40.575530'),
(17, 'loginwithauth', '0001_initial', '2019-08-16 17:36:40.781724'),
(18, 'loginwithauth', '0002_user', '2019-08-16 17:36:41.030194'),
(19, 'loginwithauth', '0003_reviews', '2019-08-16 17:36:41.262070'),
(20, 'loginwithauth', '0004_auto_20190814_1624', '2019-08-16 17:36:41.947587'),
(21, 'sessions', '0001_initial', '2019-08-16 17:36:42.214863'),
(22, 'loginwithauth', '0005_auto_20190817_0049', '2019-08-16 19:20:31.786844'),
(23, 'loginwithauth', '0006_auto_20190817_0104', '2019-08-16 19:37:06.893049'),
(24, 'loginwithauth', '0007_auto_20190817_0107', '2019-08-16 19:37:07.194504'),
(25, 'loginwithauth', '0008_auto_20190817_0107', '2019-08-16 19:37:31.390191'),
(26, 'loginwithauth', '0005_auto_20190817_1112', '2019-08-17 05:42:45.539454'),
(27, 'loginwithauth', '0006_auto_20190821_1942', '2019-08-21 14:12:41.013492'),
(28, 'jet', '0001_initial', '2019-08-22 16:11:48.560383'),
(29, 'jet', '0002_delete_userdashboardmodule', '2019-08-22 16:11:49.141331'),
(30, 'dashboard', '0001_initial', '2019-08-22 16:16:36.144373'),
(31, 'loginwithauth', '0002_auto_20190826_1026', '2019-08-26 04:57:07.393182'),
(32, 'loginwithauth', '0003_auto_20190826_1033', '2019-08-26 05:04:58.271412');

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
('ftdyuovdvyey9z5y57lp6wik5lz71064', 'Y2U2NmM3Y2Q3YjEzZWUzMmI3MGI5NWU4OTM0ZWIwMzEzNjI0MmZlMjp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI2ZTM3ZGI1OGY2ZGJiYjc0NTdhMjQxNDIwODliN2EwYjgzNzhiNmNhIn0=', '2019-08-30 17:44:45.130969'),
('ugdytx6ryj0z6x90uj05yqpjcuq9x2pg', 'NDdhMGEwNzAwNDVjMGU5MzY2Mzg5YzM5Y2QxZWU0MDc3YTU4NjUzOTp7Il9hdXRoX3VzZXJfaWQiOiI4IiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI2OGI3ZGEyMzc2ZWJlMDlmNzUyODUyZTcwODJjYjI4NjY4OTJhYjUyIn0=', '2019-09-09 17:06:57.300314');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(4000) NOT NULL,
  `expected_answer` varchar(4000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `queAndAnsr` longtext NOT NULL,
  `geo_tag` longtext NOT NULL,
  `device_signature` longtext NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `last_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `queAndAnsr`, `geo_tag`, `device_signature`, `date_created`, `last_modified`) VALUES
(4, 1, 'What is your name?\r\nAjanthy', 'geo_location', 'this is a trial', '2019-08-16 20:09:23.036011', '2019-08-16 20:09:23.036011'),
(5, 11, 'Customer really wonder happen agent financial yeah. Level full affect in edge never.', '-137.566550', 'a8483ec3a4d2281eeb9e9ec01bff5b1b', '2019-08-16 20:59:36.931446', '2019-08-16 20:59:36.931446'),
(6, 6, 'Them song would lose. Their peace hour sense.', '168.125049', 'be4efe77ed136acf06db4d9ba9be7eec', '2019-08-16 20:59:37.027701', '2019-08-16 20:59:37.027701'),
(7, 18, 'Anyone special start hotel ahead activity pay agree.', '-125.606591', '83d84e72859319e9e86119c1f303daaa', '2019-08-16 20:59:37.078837', '2019-08-16 20:59:37.078837'),
(8, 6, 'Democrat agency east.', '154.543632', '171542440a1595962c1a1fbd65807538', '2019-08-16 20:59:37.125962', '2019-08-16 20:59:37.125962'),
(9, 6, 'Best best speech easy home any fast. Kitchen already seven cup sport.', '-23.993855', 'c867e72a7f12fde5d3caa0224e5342c0', '2019-08-16 20:59:37.204170', '2019-08-16 20:59:37.204170'),
(10, 8, 'Kid human training need like upon. Home customer level relationship case special popular seven.', '-125.903601', 'e5472b748a61a58e3d8cd807c5a3ea15', '2019-08-16 20:59:37.303439', '2019-08-16 20:59:37.303439'),
(11, 1, 'Smile know measure at free there will government. Official total least down. Quite property newspaper six.', '145.555097', 'c39a33298a9ebe1a0a1ae453b0fe3c47', '2019-08-16 20:59:37.339532', '2019-08-16 20:59:37.339532'),
(12, 20, 'Box sport him challenge unit.', '-20.276276', '7f1e69e387e464e4cd960673de2686ef', '2019-08-16 20:59:37.380640', '2019-08-16 20:59:37.380640'),
(13, 11, 'Add professional either reduce thank policy player. International although sort poor health note. Shoulder wide act attack much similar.', '173.117368', '01a41c8e127606d3565b4a0d1c426803', '2019-08-16 20:59:37.436791', '2019-08-16 20:59:37.437797'),
(14, 14, 'Pretty on here cost deep probably agree. Morning account young operation pretty mission seek.', '13.246476', '0b1b6295fd7482657550f86703abab88', '2019-08-16 20:59:37.466869', '2019-08-16 20:59:37.466869'),
(15, 2, 'Our let exist clear chair yourself. Or write born physical.', '-138.026356', 'b9dfd1c24bdc6833be416ac8a6f8b4b3', '2019-08-16 20:59:37.544074', '2019-08-16 20:59:37.544074'),
(16, 10, 'Lose development bring laugh. Admit officer fish senior international cell find.', '-47.573379', 'c50a6c48b06e9d3608339b4d7cb50f2c', '2019-08-16 20:59:37.592202', '2019-08-16 20:59:37.592202'),
(17, 17, 'Standard however worker answer. Style increase apply parent source.', '55.500916', '50db49d67369e51cd6c1a3e6098fdffe', '2019-08-16 20:59:37.621279', '2019-08-16 20:59:37.621279'),
(18, 20, 'Television reduce week prevent. Compare prove agreement determine for. Than even radio good.', '145.320657', 'c02f1de98e2695bcbedaf966d386bbd0', '2019-08-16 20:59:37.648353', '2019-08-16 20:59:37.648353'),
(19, 4, 'Exist care travel their low city. Support politics history beat.', '-116.293251', 'a32eb2b2966604142690353626ea0a70', '2019-08-16 20:59:37.676428', '2019-08-16 20:59:37.676428'),
(20, 17, 'Wear necessary personal lot name discussion quality say. Measure watch hospital official. Mean other project free.', '-109.081141', 'd639a805f1060454f5b67083995fa1e7', '2019-08-16 20:59:37.702497', '2019-08-16 20:59:37.702497'),
(21, 15, 'Poor nor figure cost financial seat success. Suffer find available establish. Ago open trial computer land.', '-86.019112', 'e53b4d42b661a7ae390596e39e529a71', '2019-08-16 20:59:37.732576', '2019-08-16 20:59:37.732576'),
(22, 9, 'Form responsibility somebody certainly. Himself focus perform growth whatever area.', '103.104445', 'eb359f063d86be6fc0f32d66020e8073', '2019-08-16 20:59:37.777695', '2019-08-16 20:59:37.777695'),
(23, 2, 'Within know its represent. Affect the collection partner commercial hold middle. Possible officer call carry build specific majority.', '-57.666681', 'aec5cef40faecba8775ed9edce2767e4', '2019-08-16 20:59:37.813791', '2019-08-16 20:59:37.813791'),
(24, 5, 'Those science organization responsibility increase hear side. Recent time eat agency.', '90.382775', '71490fd9c1d1cf0d6f57c83ab961bc37', '2019-08-16 20:59:37.842869', '2019-08-16 20:59:37.842869');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `nickname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phoneNo` varchar(100) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `last_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nic`, `nickname`, `email`, `phoneNo`, `date_created`, `last_modified`) VALUES
(1, '967653500v', 'Aja', '2016csc031@gmail.com', '0112729729', '2019-08-16 19:26:00.521516', '2019-08-16 19:26:19.872778'),
(2, '292631704693', 'Jamie Oconnor', 'ogreen@watkins-wilson.biz', '', '2019-08-16 20:37:05.340886', '2019-08-16 20:37:05.340886'),
(3, '66582728853', 'Amanda Gomez', 'lisa63@cabrera.biz', '', '2019-08-16 20:38:28.007711', '2019-08-16 20:38:28.007711'),
(4, '456950537744', 'Curtis Johnson', 'tarasmith@gill.biz', '', '2019-08-16 20:38:28.152102', '2019-08-16 20:38:28.152102'),
(5, '915615118029', 'Elizabeth Lambert', 'cruzdavid@washington.com', '', '2019-08-16 20:38:28.194210', '2019-08-16 20:38:28.194210'),
(6, '461204876025', 'Judith Allen', 'qwerty@gmail.com', '', '2019-08-16 20:38:28.248351', '2019-08-16 20:38:28.248351'),
(7, '362874823076', 'Stephen Sullivan', 'gabriellemorgan@walker.com', '', '2019-08-16 20:38:28.329568', '2019-08-16 20:38:28.329568'),
(8, '924143077995', 'Arthur Vazquez', 'qwerty@gmail.com', '', '2019-08-16 20:38:28.369677', '2019-08-16 20:38:28.369677'),
(9, '788608969156', 'Ronald Fox', 'browndaniel@moran-matthews.com', '', '2019-08-16 20:38:28.407776', '2019-08-16 20:38:28.407776'),
(10, '229750561211', 'Katrina Beasley', 'april71@reyes-cunningham.info', '', '2019-08-16 20:38:28.436853', '2019-08-16 20:38:28.436853'),
(11, '468603982804', 'Zachary Neal', 'michelle58@gmail.com', '', '2019-08-16 20:38:28.461920', '2019-08-16 20:38:28.461920'),
(12, '420494737646', 'Miguel Thomas', 'rcampbell@martinez.com', '', '2019-08-16 20:38:28.496010', '2019-08-16 20:38:28.496010'),
(13, '277008381153', 'Carlos Brown', 'kelly10@gmail.com', '', '2019-08-16 20:38:28.524087', '2019-08-16 20:38:28.524087'),
(14, '297139107282', 'Ellen Lee', 'nicolaswallace@howard.net', '', '2019-08-16 20:38:28.551158', '2019-08-16 20:38:28.551158'),
(15, '878967524411', 'Robert James', 'joseph65@wilson.com', '', '2019-08-16 20:38:28.580235', '2019-08-16 20:38:28.580235'),
(16, '74882922593', 'Nicholas Robles', 'felliott@wilson.org', '', '2019-08-16 20:38:28.606305', '2019-08-16 20:38:28.606305'),
(17, '778342657271', 'Donna Baldwin', 'qwerty@gmail.com', '', '2019-08-16 20:38:28.636383', '2019-08-16 20:38:28.636383'),
(18, '195743772878', 'Brandon Salazar', 'qwerty@gmail.com', '', '2019-08-16 20:38:28.661451', '2019-08-16 20:38:28.661451'),
(19, '199901935467', 'Pamela Diaz', 'hannahsweeney@gmail.com', '', '2019-08-16 20:38:28.691531', '2019-08-16 20:38:28.691531'),
(20, '70193070564', 'Kevin English', 'lawrencealexis@gmail.com', '', '2019-08-16 20:38:28.716598', '2019-08-16 20:38:28.716598'),
(21, '410228646225', 'Mr. William Quinn', 'wilsonevan@hotmail.com', '', '2019-08-16 20:38:28.745676', '2019-08-16 20:38:28.745676'),
(22, '539091181716', 'Kyle Christensen', 'sharon91@yahoo.com', '', '2019-08-16 20:38:28.772746', '2019-08-16 20:38:28.772746');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `django_content_type`
--
ALTER TABLE `django_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `django_migrations`
--
ALTER TABLE `django_migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Constraints for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD CONSTRAINT `django_admin_log_content_type_id_c4bce8eb_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `django_admin_log_user_id_c564eba6_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
