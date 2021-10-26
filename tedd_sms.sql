-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 10:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tedd_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `audiences`
--

CREATE TABLE `audiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audiences`
--

INSERT INTO `audiences` (`id`, `client`, `tag_id`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Teddy', 'Bryce', 'teddymartial65@gmail.com', '0789897897', '2021-05-15 10:24:12', '2021-05-15 10:55:13'),
(2, 2, 1, 'Martha', 'Ndeto', 'marthandeto@gmail.com', '0717010609', '2021-05-15 10:26:55', '2021-05-15 10:26:55'),
(3, 2, 1, 'Kevin', 'Otieno', 'kevin@peakanddale.com', '0704773769', '2021-05-15 10:44:41', '2021-05-15 10:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clientid` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `clientid`, `first_name`, `last_name`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(25, 2, 'Thadeus', 'Odenyo', 'Thadeus Odenyo', 'odenyothadeus@gmail.com', '254743160199', '2021-05-31 07:42:02', '2021-05-31 07:42:02'),
(26, 2, 'Gad', 'Omuse', 'Gad Omuse', 'gadomuse@gmail.com', '254789800100', '2021-05-31 07:55:34', '2021-05-31 07:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tag`
--

CREATE TABLE `contact_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_tag`
--

INSERT INTO `contact_tag` (`id`, `contact_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(10, 25, 1, NULL, NULL),
(11, 26, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messageid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdOn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `company_id`, `to`, `from`, `message`, `cost`, `sold_at`, `messageid`, `status`, `statusCode`, `createdOn`, `created_at`, `updated_at`) VALUES
(1, 2, '0743160199', '', 'Hey Teddy', NULL, '1', NULL, NULL, NULL, '2021-05-15 14:35:06', NULL, NULL),
(2, 2, '+254464365646', '', 'rtt', NULL, '1', NULL, NULL, NULL, '2021-05-15 14:47:07', NULL, NULL),
(3, 2, '+254743160199', '', 'dasved', NULL, '1', NULL, NULL, NULL, '2021-05-15 15:15:23', NULL, NULL),
(4, 3, '+254743160199', '', 'Hi Teddy', NULL, '1', NULL, NULL, NULL, '2021-05-16 15:06:34', NULL, NULL),
(5, 3, '+254743160199', '', 'Hi again Teddy', NULL, '1', NULL, NULL, NULL, '2021-05-16 15:07:54', NULL, NULL),
(6, 2, '+254748012934', '', 'Hi Joshua', NULL, '1', NULL, NULL, NULL, '2021-05-16 15:38:51', NULL, NULL),
(7, 3, '+254758912845', '', 'Hi Pesh', NULL, '1', NULL, NULL, NULL, '2021-05-24 15:55:23', NULL, NULL),
(8, 3, '+254765456721', '', 'jjrtjrjr', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:31:54', NULL, NULL),
(9, 3, 'x+25476787867', '', 'jjrtjrjr', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:31:54', NULL, NULL),
(10, 3, '8z+2547654898', '', 'jjrtjrjr', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:31:54', NULL, NULL),
(11, 3, '23y', '', 'jjrtjrjr', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:31:54', NULL, NULL),
(12, 3, '+254765456721', '', 'hreh', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:35:26', NULL, NULL),
(13, 3, 'x+25476787867', '', 'hreh', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:35:26', NULL, NULL),
(14, 3, '8z', '', 'hreh', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:35:26', NULL, NULL),
(15, 3, '+254767878678', '', 'fjrj', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:40:41', NULL, NULL),
(16, 3, 'z+25476548982', '', 'fjrj', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:40:41', NULL, NULL),
(17, 3, '3y', '', 'fjrj', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:40:41', NULL, NULL),
(18, 3, '+254767878678', '', 'fsgrsy', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:41:35', NULL, NULL),
(19, 3, 'z+25476548982', '', 'fsgrsy', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:41:35', NULL, NULL),
(20, 3, '3y', '', 'fsgrsy', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:41:35', NULL, NULL),
(21, 3, '+254767878678', '', 'rgrg', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:42:35', NULL, NULL),
(22, 3, 'z+25476548982', '', 'rgrg', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:42:35', NULL, NULL),
(23, 3, '3y', '', 'rgrg', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:42:35', NULL, NULL),
(24, 3, '+254767878678', '', 'egegw', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:49:42', NULL, NULL),
(25, 3, 'z+25476548982', '', 'egegw', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:49:42', NULL, NULL),
(26, 3, '3y', '', 'egegw', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:49:42', NULL, NULL),
(27, 3, '+254767878678', '', 'egegw', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:50:11', NULL, NULL),
(28, 3, 'z+25476548982', '', 'egegw', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:50:11', NULL, NULL),
(29, 3, '3y', '', 'egegw', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:50:11', NULL, NULL),
(30, 3, '+254767878678', '', 'fdhh', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:50:59', NULL, NULL),
(31, 3, 'z+25476548982', '', 'fdhh', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:50:59', NULL, NULL),
(32, 3, '3y', '', 'fdhh', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:50:59', NULL, NULL),
(33, 3, '+254767878678', '', 'tutru', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:51:24', NULL, NULL),
(34, 3, 'z+25476548982', '', 'tutru', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:51:24', NULL, NULL),
(35, 3, '3y', '', 'tutru', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:51:24', NULL, NULL),
(36, 3, '+254767878678', '', 'ghfjjj', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:55:34', NULL, NULL),
(37, 3, 'z+25476548982', '', 'ghfjjj', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:55:34', NULL, NULL),
(38, 3, '3y', '', 'ghfjjj', NULL, '1', NULL, NULL, NULL, '2021-05-24 16:55:34', NULL, NULL),
(39, 22, '+254743160199', '', 'Hi Teddy', NULL, '1', NULL, NULL, NULL, '2021-05-31 09:41:24', NULL, NULL),
(40, 2, '+254743160199', '', 'Hello Teddy. From Mobitech', NULL, '1', NULL, NULL, NULL, '2021-05-31 09:43:24', NULL, NULL),
(41, 2, '+254743160199', '', 'Hello from mobitech', NULL, '1', NULL, NULL, NULL, '2021-05-31 09:49:20', NULL, NULL),
(42, 2, '254743160199', '', 'Hello from mobiteck', NULL, '1', NULL, NULL, NULL, '2021-05-31 09:51:48', NULL, NULL),
(43, 2, '2547431601992', '', 'Hi from mobitech technologies. You have been promoted at Peak and Dale and now you will earn over 100k', NULL, '1', NULL, NULL, NULL, '2021-05-31 10:56:36', NULL, NULL),
(44, 2, '54789800100', '', 'Hi from mobitech technologies. You have been promoted at Peak and Dale and now you will earn over 100k', NULL, '1', NULL, NULL, NULL, '2021-05-31 10:56:36', NULL, NULL),
(45, 2, '254743160199', '', 'Hi from mobitech technologies. You have been promoted at Peak and Dale and now you will earn over 100k', NULL, '1', NULL, NULL, NULL, '2021-05-31 11:00:14', NULL, NULL),
(46, 2, '254789800100', '', 'Hi from mobitech technologies. You have been promoted at Peak and Dale and now you will earn over 100k', NULL, '1', NULL, NULL, NULL, '2021-05-31 11:00:14', NULL, NULL),
(47, 2, '254713027450', '', 'Hi Sandra, Can we shortly meet ata Java joint, westlands at 3. Kindly', NULL, '1', NULL, NULL, NULL, '2021-05-31 11:02:49', NULL, NULL),
(48, 2, '254743160199', '', 'Hello bigman', NULL, '1', NULL, NULL, NULL, '2021-05-31 11:07:04', NULL, NULL),
(49, 2, '254743160199', '', 'Hi Gad Omuse...We give free chicken to those traveling to western. Kindly line up at Muthurwa market', NULL, '1', NULL, NULL, NULL, '2021-05-31 11:10:10', NULL, NULL),
(50, 2, '254789800100', '', 'Hi Gad Omuse...We give free chicken to those traveling to western. Kindly line up at Muthurwa market', NULL, '1', NULL, NULL, NULL, '2021-05-31 11:10:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_05_15_121311_create_contacts_table', 2),
(10, '2021_05_15_124942_create_tags_table', 3),
(11, '2021_05_15_130632_create_audiences_table', 4),
(12, '2021_05_15_142103_create_messages_table', 5),
(13, '2021_05_15_161641_create_payments_table', 6),
(14, '2021_05_16_051540_create_templates_table', 7),
(15, '2021_05_16_132034_add_profile_to_users_table', 8),
(16, '2021_05_24_130503_create_tag_contact_table', 9),
(17, '2021_05_24_132232_create_contact_tag_table', 10),
(18, '2021_05_25_034545_add_verification_code_to_users_table', 11),
(20, '2021_05_28_075833_create_providers_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2b16bb6ba6505e921980e53cc8d1466cdac801ae945ab5a0fe513aea635afb817fa4939da9fd4cb4', 2, 1, 'api-application', '[]', 0, '2021-05-15 07:10:55', '2021-05-15 07:10:55', '2022-05-15 10:10:55'),
('2bc2ac3ce3625cd86bcd16d5f85f6fda12473c5c0b11d93db178d0dfe4897296cda2dae0c31976b6', 21, 1, 'api-application', '[]', 0, '2021-05-25 15:34:06', '2021-05-25 15:34:06', '2022-05-25 08:34:06'),
('367e8d43eca1b0153f9c4cf3b032f3a314e9e69bd29940976db7257c0fedf4021adc2e3250a92344', 5, 1, 'api-application', '[]', 0, '2021-05-15 07:18:38', '2021-05-15 07:18:38', '2022-05-15 10:18:38'),
('3958c07ae6bdf90605afc08e347968fc881d8808ef89ed18f544da778af5c5dc99cac3bc5bd7c990', 8, 1, 'api-application', '[]', 0, '2021-05-25 01:41:34', '2021-05-25 01:41:34', '2022-05-25 04:41:34'),
('3c2798731af11c4241dcbb70f1c751d84c442e0e9c7e5bb3f9fce5259f0f5bf5ce4da85ea7138f2e', 19, 1, 'api-application', '[]', 0, '2021-05-25 15:26:28', '2021-05-25 15:26:28', '2022-05-25 08:26:28'),
('48b075092aca0621b66453a554d413d30c397eacba42758b020169726edc9bb63d9b79973ea07eac', 15, 1, 'api-application', '[]', 0, '2021-05-25 02:43:30', '2021-05-25 02:43:30', '2022-05-25 05:43:30'),
('4e3f57e4b03fc33747dbf87f9b989e7e2cd9a1c57667cf6308d2cf2ffa9cdc97abfce8eb659af267', 7, 1, 'api-application', '[]', 0, '2021-05-25 01:38:07', '2021-05-25 01:38:07', '2022-05-25 04:38:07'),
('53af5f1ffe1f98f5c995982b38c3b086fd515e6dd16fea1f6fe7780eb676fac969f9ab3a617f953e', 3, 1, 'api-application', '[]', 0, '2021-05-15 07:11:31', '2021-05-15 07:11:31', '2022-05-15 10:11:31'),
('59683fcd8f341e7ea9fda98e714d532faeae32e86892c886db62113c815c3f0dade89b70763ce1c9', 14, 1, 'api-application', '[]', 0, '2021-05-25 02:04:53', '2021-05-25 02:04:53', '2022-05-25 05:04:53'),
('613fee3962c3a5d4f134e933b12a26106da4223ca2f52d5b8552a077686c366d1c52f83d18703fe2', 9, 1, 'api-application', '[]', 0, '2021-05-25 01:52:59', '2021-05-25 01:52:59', '2022-05-25 04:52:59'),
('656ebfc45db62911516e744b9fb656d50ceaa6dc79387bc3b8744c29f59e4e2f512b13626abc611b', 22, 1, 'api-application', '[]', 0, '2021-05-25 15:36:29', '2021-05-25 15:36:29', '2022-05-25 08:36:29'),
('831410ebf96f2ae4e8fcbe88e40543f1a0250343aff9819ad52bbea23630a43c1927bf62508befb1', 18, 1, 'api-application', '[]', 0, '2021-05-25 15:24:15', '2021-05-25 15:24:15', '2022-05-25 08:24:15'),
('847fa55a7bcb9080b6712b8f5a6e167e221945c7b6dfc94d0525b3f7a27f0a953cd281d5cf68c760', 23, 1, 'api-application', '[]', 0, '2021-05-25 17:20:19', '2021-05-25 17:20:19', '2022-05-25 10:20:19'),
('9971b21211a4aa4540500eca226b917ee0617c767d1c11657d83eec3c1407a6d25c4612ad3479331', 25, 1, 'api-application', '[]', 0, '2021-05-25 17:28:37', '2021-05-25 17:28:37', '2022-05-25 10:28:37'),
('a1b4b846a7c005e81538cef71052b0349545678623bbb89099d9c7028b8f210c0997ee01d5338dda', 1, 1, 'api-application', '[]', 0, '2021-05-15 07:05:32', '2021-05-15 07:05:32', '2022-05-15 10:05:32'),
('bad31605ef4a6293786d6ee6cf03b26308550051887cfef36b398860f5242c4700b0d599d18d3acf', 17, 1, 'api-application', '[]', 0, '2021-05-25 15:22:37', '2021-05-25 15:22:37', '2022-05-25 08:22:37'),
('c2c39e568d61784b499da2ad3d2dec1c7145d48e2e6d1426a92521b11ce2fd58294839be891e1c3d', 6, 1, 'api-application', '[]', 0, '2021-05-25 01:36:11', '2021-05-25 01:36:11', '2022-05-25 04:36:11'),
('c86be500e9bb87cc399c349dde1c07fc713149aa99855908c3a0eec15bdf4b43a15ababa114e5308', 26, 1, 'api-application', '[]', 0, '2021-05-25 23:37:50', '2021-05-25 23:37:50', '2022-05-25 16:37:50'),
('cd2ba0938789d98d5601a788d68f654ac0e448c622fd54d0f3fc9d20b729ea84a9e5517bfa1a71ea', 16, 1, 'api-application', '[]', 0, '2021-05-25 15:21:22', '2021-05-25 15:21:22', '2022-05-25 08:21:22'),
('d19d0a15b93427b1e3f80024fbc6d63b43924027cb54a68711a713bff64da4e5e7f97f4d0ab4917e', 24, 1, 'api-application', '[]', 0, '2021-05-25 17:23:29', '2021-05-25 17:23:29', '2022-05-25 10:23:29'),
('d8ed1b56c3eaa134ba73f9196be894114afda1957b54816f519f8d349dbe787b1c09ccb91356550d', 20, 1, 'api-application', '[]', 0, '2021-05-25 15:31:17', '2021-05-25 15:31:17', '2022-05-25 08:31:17'),
('e568e8aa224076ad643167e03dc026dc10d770f87f48a5b19ea80643350aaa6a09ece7735224e2f2', 4, 1, 'api-application', '[]', 0, '2021-05-15 07:12:54', '2021-05-15 07:12:54', '2022-05-15 10:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'N1uB84dxegvFEi8fC3T5YrYZlkJofXJ3NwUiGJ6L', NULL, 'http://localhost', 1, 0, 0, '2021-05-15 06:42:50', '2021-05-15 06:42:50'),
(2, NULL, 'Laravel Password Grant Client', 'lnTcnSgYxWEuYMGECKPhB7ALNyPyVlXnSpRpSLFB', 'users', 'http://localhost', 0, 1, 0, '2021-05-15 06:42:50', '2021-05-15 06:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-15 06:42:50', '2021-05-15 06:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paid_by` bigint(20) UNSIGNED NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpesa_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `paid_by`, `response`, `amount`, `mpesa_receipt`, `transaction_date`, `phone`, `created_at`, `updated_at`) VALUES
(1, 2, '{\"Body\":{\"stkCallback\":{\"MerchantRequestID\":\"12410-1055826-1\",\"CheckoutRequestID\":\"ws_CO_16052021205419799249\",\"ResultCode\":0,\"ResultDesc\":\"The service request is processed successfully.\",\"CallbackMetadata\":{\"Item\":[{\"Name\":\"Amount\",\"Value\":4.00},{\"Name\":\"MpesaReceiptNumber\",\"Value\":\"PEG61SFCK0\"},{\"Name\":\"TransactionDate\",\"Value\":20210516205438},{\"Name\":\"PhoneNumber\",\"Value\":254743160199}]}}}}', '4', 'PEG61SFCK0', '20210516205438', '254743160199', '2021-05-16 14:55:10', '2021-05-16 14:55:10'),
(3, 3, '{\"Body\":{\"stkCallback\":{\"MerchantRequestID\":\"19419-1102169-1\",\"CheckoutRequestID\":\"ws_CO_16052021210013960028\",\"ResultCode\":0,\"ResultDesc\":\"The service request is processed successfully.\",\"CallbackMetadata\":{\"Item\":[{\"Name\":\"Amount\",\"Value\":5.00},{\"Name\":\"MpesaReceiptNumber\",\"Value\":\"PEG21SOGYE\"},{\"Name\":\"TransactionDate\",\"Value\":20210516210027},{\"Name\":\"PhoneNumber\",\"Value\":254743160199}]}}}}', '5', 'PEG21SOGYE', '20210516210027', '254743160199', '2021-05-16 15:01:00', '2021-05-16 15:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `provider_name`, `provider_username`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'Africa\'s Talking', 'at', '0.8', '2021-05-28 06:49:51', '2021-05-28 08:20:45'),
(2, 'Mobi technolgies', 'mobi', '0.35', '2021-05-31 04:32:30', '2021-05-31 04:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `client_id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test Tag', '2021-05-15 09:54:26', '2021-05-15 10:01:27'),
(2, 3, 'Test Tag', '2021-05-24 00:08:21', '2021-05-24 00:08:21'),
(3, 3, 'Another Tag', '2021-05-24 02:36:45', '2021-05-24 02:36:45'),
(4, 3, 'Tag Two', '2021-05-24 02:36:55', '2021-05-24 02:36:55'),
(6, 22, 'My tag', '2021-05-25 15:38:13', '2021-05-25 15:38:13'),
(7, 22, 'Empl Tag', '2021-05-25 15:38:23', '2021-05-25 15:38:23'),
(8, 22, 'HRM tag', '2021-05-25 15:38:34', '2021-05-25 15:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `tag_contact`
--

CREATE TABLE `tag_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `company_id`, `template_name`, `icon`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test template name', 'background_cli.bmp', 'Test template Body', '2021-05-16 02:22:15', '2021-05-16 03:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','client') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `provider` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `primary_contact`, `alt_contact`, `location`, `address`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `profile`, `verification_code`, `is_verified`, `provider`, `api_key`, `sender_id`) VALUES
(1, 'Admin Associates', 'Admin', 'admin@gmail.com', '+254743160199', NULL, 'Nairobi', 'Tom Mboy\r\nSmeer Apartment', NULL, '$2y$10$CY.PxsY4AClweTWRkwni4.JSQqtwzPRUJd7AYqQ9CUiv.A/TmVVwm', 'admin', NULL, '2021-05-15 07:05:31', '2021-05-25 03:05:55', NULL, NULL, 1, '0', NULL, NULL),
(2, 'Peak And Dale', 'peakanddale', 'peakanddale@gmail.com', '0734900455', '0789067854', 'Nairobi', 'Nakuru', NULL, '$2y$10$r9Em4afWndkZhYeiFHUMSuIWYfH2QcqeyUAUBwmY6pybLO2Gnrk0m', 'client', NULL, '2021-05-15 07:10:54', '2021-05-31 04:32:48', 'logo.png', NULL, 1, 'mobi', '60ab4a7759bf9', '22136'),
(3, 'Tata Company', 'Tata', 'tata@gmail.com', '0789876676', '0745453454', 'Nairobi', 'Tom Mboy', NULL, '$2y$10$8qrYByTwq7Y//Mk.UfFnOOs3wChjvZTOhmE3GNU1AVeYRbx2m6euy', 'client', NULL, '2021-05-15 07:11:31', '2021-05-16 12:05:57', 'tata.png', NULL, 0, '0', NULL, NULL),
(4, 'Nandi Aic', 'Nandiaic', 'nandi@gmail.com', '0768978624', '0745656789', 'Kapsabet', 'P.o Box Private Bag, Kapsabet', NULL, '$2y$10$.Sc79j0cvsZOQP2XkNqslO67yCQYIbijbU/OpMTR6WFogO/jSbqqq', 'client', NULL, '2021-05-15 07:12:54', '2021-05-15 07:12:54', NULL, NULL, 0, '0', NULL, NULL),
(5, 'Unga Group and CO', 'ungagroup', 'unga@gmail.com', '0790321456', '0724097867', 'Nairobi', 'Ronald Ngala Drive', NULL, '$2y$10$eQ5Lascs2OjEHllrD6cjt.NOiF.Pw5qXimBK3v.ZWRhiP.b/Y./Fm', 'client', NULL, '2021-05-15 07:18:38', '2021-05-15 07:18:38', NULL, NULL, 0, '0', NULL, NULL),
(22, 'Teddy & Co', 'Thadeus', 'odenyothadeus@gmail.com', '0743160199', '0789067876', 'Nairobi', 'Tom Mboya Street\r\nRonald Ngala Avenue', NULL, '$2y$10$NSgImn86U1I3J24VwXg0GepKPhPbXACo7fdpIC7SZ9zevuU9sNpj2', 'client', NULL, '2021-05-25 15:36:29', '2021-05-31 04:01:26', NULL, 'b47f44568939c822bee298d39c2828e0b3f38165', 1, 'at', '5e0a291b75721efcd3d97e70de1c31242bbf7964cc968d47e20ff0eab311c532', 'Africa\'s Talking'),
(26, 'safaricom', 'safaricom', 'safaricom@gmail.clom', '07458956526', '0548952225', 'Nairobi', 'kenya', NULL, '$2y$10$p/qRmHUDY.r5o2ItCFTjCueKhmxpvcUldFa19vpWOOqpYgvrbQexC', 'client', NULL, '2021-05-25 23:37:49', '2021-05-25 23:37:49', NULL, 'bde4996a9ebb2d8e5baa2df86ac539489f36e5b6', 0, '0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audiences`
--
ALTER TABLE `audiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audiences_client_foreign` (`client`),
  ADD KEY `audiences_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_clientid_foreign` (`clientid`);

--
-- Indexes for table `contact_tag`
--
ALTER TABLE `contact_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_tag_contact_id_foreign` (`contact_id`),
  ADD KEY `contact_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_company_id_foreign` (`company_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_paid_by_foreign` (`paid_by`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `providers_provider_username_unique` (`provider_username`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_client_id_foreign` (`client_id`);

--
-- Indexes for table `tag_contact`
--
ALTER TABLE `tag_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_contact_contact_id_foreign` (`contact_id`),
  ADD KEY `tag_contact_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `templates_company_id_foreign` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audiences`
--
ALTER TABLE `audiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact_tag`
--
ALTER TABLE `contact_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tag_contact`
--
ALTER TABLE `tag_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audiences`
--
ALTER TABLE `audiences`
  ADD CONSTRAINT `audiences_client_foreign` FOREIGN KEY (`client`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `audiences_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_clientid_foreign` FOREIGN KEY (`clientid`) REFERENCES `users` (`id`);

--
-- Constraints for table `contact_tag`
--
ALTER TABLE `contact_tag`
  ADD CONSTRAINT `contact_tag_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contact_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_paid_by_foreign` FOREIGN KEY (`paid_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tag_contact`
--
ALTER TABLE `tag_contact`
  ADD CONSTRAINT `tag_contact_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_contact_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
