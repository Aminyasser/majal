-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 10:21 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larav`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recever` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` tinyint(4) NOT NULL DEFAULT '1',
  `is_user_seen` tinyint(4) NOT NULL DEFAULT '1',
  `typing` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message`, `sender`, `recever`, `is_seen`, `is_user_seen`, `typing`, `created_at`, `updated_at`) VALUES
(1, 'Sucker for pain', '66', '1', 0, 0, NULL, '2020-04-10 12:17:40', '2020-04-10 12:17:52'),
(2, 'http://192.168.1.6:8000/music/2/Sucker%20for%20Pain%20-%20Lil%20Wayne,%20Wiz%20Khalifa%20&%20Imagine%20Dragons?_token=1mPz9LtXHU6AIobxM4QgqZDaZTFkoKE5SrjspOKU&music_id=2', '1', '66', 0, 0, NULL, '2020-04-10 12:18:17', '2020-04-10 12:45:41'),
(3, '??', '64', '1', 0, 0, NULL, '2020-04-10 12:30:05', '2020-04-10 12:36:10'),
(4, '??', '1', '66', 0, 0, NULL, '2020-04-10 12:35:35', '2020-04-10 12:45:41'),
(5, 'ايه يا عم', '1', '64', 1, 1, NULL, '2020-04-10 12:36:53', '2020-04-10 12:36:53'),
(6, 'اش فيك ياعم', '66', '64', 1, 1, NULL, '2020-04-10 12:44:09', '2020-04-10 12:44:09'),
(7, 'hiiiiiiiii', '66', '1', 0, 0, NULL, '2020-04-10 12:46:01', '2020-05-30 12:50:07'),
(8, '??', '1', '64', 1, 1, NULL, '2020-05-30 12:12:41', '2020-05-30 12:12:41'),
(9, 'jj', '1', '64', 1, 1, NULL, '2020-05-30 12:12:51', '2020-05-30 12:12:51'),
(10, '?/', '1', '64', 1, 1, NULL, '2020-05-30 12:48:41', '2020-05-30 12:48:41'),
(11, '??', '1', '64', 1, 1, NULL, '2020-05-30 12:48:47', '2020-05-30 12:48:47'),
(12, 'dhdhd', '1', '64', 1, 1, NULL, '2020-05-30 12:49:44', '2020-05-30 12:49:44'),
(13, '??', '1', '66', 1, 1, NULL, '2020-05-30 12:51:37', '2020-05-30 12:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `created_at`, `updated_at`) VALUES
(3, 'Qalyubia', '2020-03-17 19:24:25', '2020-03-17 19:24:25'),
(11, 'cairo', '2019-11-15 17:53:15', '2019-11-15 17:53:15'),
(13, 'giza', '2019-11-26 22:37:04', '2019-11-26 22:37:04'),
(16, 'egypt', '2019-12-12 11:16:24', '2019-12-12 11:16:24'),
(17, '6 october', '2020-01-28 00:16:16', '2020-01-28 00:16:16'),
(24, 'Alexandria', '2020-03-17 19:21:58', '2020-03-17 19:21:58'),
(25, 'Aswan', '2020-03-17 19:22:07', '2020-03-17 19:22:07'),
(26, 'Asyut', '2020-03-17 19:22:13', '2020-03-17 19:22:13'),
(27, 'Beheira', '2020-03-17 19:22:21', '2020-03-17 19:22:21'),
(28, 'Beni Suef', '2020-03-17 19:22:28', '2020-03-17 19:22:28'),
(29, 'Dakahlia', '2020-03-17 19:22:39', '2020-03-17 19:22:39'),
(30, 'Damietta', '2020-03-17 19:22:45', '2020-03-17 19:22:45'),
(31, 'Faiyum', '2020-03-17 19:22:58', '2020-03-17 19:22:58'),
(32, 'Gharbia', '2020-03-17 19:23:06', '2020-03-17 19:23:06'),
(33, 'Ismailia', '2020-03-17 19:23:14', '2020-03-17 19:23:14'),
(34, 'Kafr El Sheikh', '2020-03-17 19:23:21', '2020-03-17 19:23:21'),
(35, 'Luxor', '2020-03-17 19:23:27', '2020-03-17 19:23:27'),
(36, 'Matruh', '2020-03-17 19:23:34', '2020-03-17 19:23:34'),
(37, 'Minya', '2020-03-17 19:23:50', '2020-03-17 19:23:50'),
(38, 'Monufia', '2020-03-17 19:23:59', '2020-03-17 19:23:59'),
(39, 'New Valley', '2020-03-17 19:24:06', '2020-03-17 19:24:06'),
(40, 'North Sinai', '2020-03-17 19:24:12', '2020-03-17 19:24:12'),
(41, 'Port Said', '2020-03-17 19:24:18', '2020-03-17 19:24:18'),
(43, 'Qena', '2020-03-17 19:24:31', '2020-03-17 19:24:31'),
(44, 'Red Sea', '2020-03-17 19:24:38', '2020-03-17 19:24:38'),
(45, 'Sharqia', '2020-03-17 19:24:46', '2020-03-17 19:24:46'),
(46, 'Sohag', '2020-03-17 19:24:53', '2020-03-17 19:24:53'),
(47, 'South Sinai', '2020-03-17 19:25:05', '2020-03-17 19:25:05'),
(48, 'Suez', '2020-03-17 19:25:12', '2020-03-17 19:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comImg` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friend` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user`, `friend`, `created_at`, `updated_at`) VALUES
(1, '64', '1', '2020-04-10 12:53:26', '2020-04-10 12:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_name`, `created_at`, `updated_at`) VALUES
(1, 'Not Yet', '2020-03-17 22:00:00', '2020-03-17 22:00:00'),
(2, 'engneer', '2019-12-03 18:12:22', '2019-12-03 18:12:22'),
(3, 'accountant', '2019-12-03 19:36:33', '2019-12-03 19:36:33'),
(4, 'salesman', '2019-12-03 19:37:04', '2019-12-03 19:37:04'),
(5, 'photography', '2019-12-03 21:00:38', '2019-12-03 21:00:38'),
(6, 'web developer', '2019-12-03 21:05:22', '2019-12-03 21:05:22'),
(8, 'doctor', '2019-12-12 10:26:05', '2019-12-12 10:26:05'),
(9, 'officer', '2019-12-12 10:27:04', '2019-12-12 10:27:04'),
(10, 'nurse', '2019-12-12 11:19:29', '2019-12-12 11:19:29'),
(11, 'fashion design', '2020-01-20 19:22:53', '2020-01-20 19:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `like` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `page_id`, `like`, `created_at`, `updated_at`) VALUES
(4, 2, 1, NULL, 1, '2020-04-09 11:11:23', '2020-04-09 11:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_25_223510_create_posts_table', 1),
(5, '2019_09_27_015839_add_user_id_to_posts', 2),
(6, '2019_09_27_020523_add_user_id_to_posts', 3),
(7, '2019_10_06_015909_add_user_name_to_posts', 4),
(8, '2019_10_06_034827_add_image_to_posts_table', 5),
(10, '2019_10_09_114258_add_image_to_users_table', 6),
(11, '2019_10_13_102250_create_comments_table', 7),
(12, '2019_10_13_150944_add_user_name_to_comments_table', 8),
(13, '2019_10_13_151201_add_user_id_to_comments_table', 9),
(14, '2019_10_20_111149_create_likes_table', 10),
(15, '2019_11_14_233411_add_gender_to_users_table', 11),
(16, '2019_11_15_004042_add_birth_day_to_users_table', 12),
(17, '2019_11_15_115650_add_city_to_users_table', 13),
(18, '2019_11_15_115946_create_city_table', 14),
(19, '2019_11_22_191610_add_paid_to_users_table', 15),
(20, '2019_11_22_205446_create_moves_table', 16),
(21, '2019_12_03_181827_create_jobs_table', 17),
(22, '2019_12_03_203655_add_job_to_users_table', 18),
(23, '2019_12_05_190459_add_about_to_users_table', 19),
(24, '2019_12_05_191211_create_links_table', 20),
(25, '2019_12_05_191755_create_links_table', 21),
(26, '2019_12_08_113438_add_com_img_to_comments_table', 22),
(27, '2020_01_02_223504_create_roles_table', 23),
(28, '2020_01_02_224309_add_per_to_roles_table', 24),
(29, '2020_01_02_224505_add_per_to_users_table', 25),
(30, '2020_01_05_083752_create_friends_table', 26),
(31, '2020_01_07_232314_create_chat_table', 27),
(32, '2018_04_01_072923_create_chats_table', 28),
(33, '2018_04_11_202133_create_typings_table', 28),
(34, '2020_01_27_223552_create_musics_table', 29),
(35, '2020_02_02_234034_create_reports_table', 30),
(36, '2020_02_03_163726_add_account_to_reports_table', 31),
(37, '2020_02_03_170051_add_answer_to_users_table', 32),
(38, '2020_02_10_224907_create_pages_table', 33),
(39, '2020_02_22_224629_create_saved_table', 34),
(40, '2020_02_22_224939_create_playlist_table', 35),
(41, '2020_02_22_225231_create_saved_table', 36),
(42, '2020_02_22_225625_create_postpage_table', 37),
(43, '2020_02_22_230216_create_postpage_table', 38),
(44, '2020_03_27_000429_create_storys_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE `musics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `music` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `name`, `music`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Sucker for Pain - Lil Wayne, Wiz Khalifa & Imagine Dragons', 'music_1584276418.mp3', '1', '2020-03-15 10:46:58', '2020-03-15 10:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namepage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `admin`, `namepage`, `pic`, `cover`, `about`, `phone`, `place`, `servis`, `created_at`, `updated_at`) VALUES
(1, '1', 'amin', 'pic_1586433086.png', 'cover_1586433086.png', 'sdkljsdhsdhs', '01063657561', '3', 'hsdd', '2020-04-09 09:51:26', '2020-04-09 09:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('amin.yasser00@gmail.com', '$2y$10$.QrdFo1N4GSLpQxdOIvM4e97BLfhOCw7dHS1GTgUPVEUyg8znrRxa', '2020-03-28 21:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `music_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `music_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2', '1', '2020-04-10 12:14:29', '2020-04-10 12:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `postpage`
--

CREATE TABLE `postpage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postpage`
--

INSERT INTO `postpage` (`id`, `page_id`, `title`, `dis`, `video`, `pic`, `pic2`, `pic3`, `pic4`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, 'kk', NULL, 'pic_1586433186.png', NULL, NULL, NULL, '2020-04-09 09:53:06', '2020-04-09 09:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `comentMode` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `video`, `body`, `created_at`, `updated_at`, `user_id`, `user_name`, `image`, `comentMode`) VALUES
(1, 'video_1586447709.mp4', NULL, '2020-04-09 13:55:09', '2020-04-09 13:55:09', 1, 'Campo', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reportowner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reportuser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutreport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emailuser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newpassword` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` tinyint(1) NOT NULL DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-09-26 23:28:02', '2019-09-26 23:28:02'),
(2, 'midAdmin', '2019-10-15 02:04:06', '2019-10-15 02:04:06'),
(3, 'smAdmin', '2019-09-26 23:28:02', '2019-09-26 23:28:02'),
(4, 'user', '2019-09-26 23:28:02', '2019-09-26 23:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `saveds`
--

CREATE TABLE `saveds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_services` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` text COLLATE utf8mb4_unicode_ci,
  `pic1` text COLLATE utf8mb4_unicode_ci,
  `pic2` text COLLATE utf8mb4_unicode_ci,
  `pic3` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dis_services` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(191) DEFAULT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'p',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storys`
--

CREATE TABLE `storys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storys`
--

INSERT INTO `storys` (`id`, `user_id`, `story`, `pic`, `created_at`, `updated_at`) VALUES
(1, '1', 'sdf', 'Campo1586438328.png', '2020-04-09 11:18:48', '2020-04-09 11:18:48'),
(2, '1', 'hiiiiiiii', 'Campo1586438364.jpg', '2020-04-09 11:19:24', '2020-04-09 11:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `typings`
--

CREATE TABLE `typings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` tinyint(4) NOT NULL,
  `recever` tinyint(4) NOT NULL,
  `check_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT 'pro.svg',
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '3',
  `cover` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT 'cover.jpg',
  `job` int(11) DEFAULT '1',
  `about` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inst` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT ' https://www.instagram.com/',
  `per` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'answer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `token`, `remember_token`, `created_at`, `updated_at`, `image`, `gender`, `date`, `city`, `cover`, `job`, `about`, `inst`, `per`, `answer`) VALUES
(1, 'Campo', 'users.sup.pro00@gmail.com', NULL, '$2y$10$Nzq/7aEm/PG3LV7miuDD0ec4KgdRkA8SPtg/H.lG9zXhD0IpcV1gm', '', 'uUXrLjYD8lb7h6zuo06tLA4iTLVZ8L6Ttcib3kzjTLBWfUPI5BiL4tYQXzBl', '2020-03-13 10:57:32', '2020-03-30 12:31:08', 'image_1584105337.png', 'male', '2020-02-02', '3', 'cover_1585578668.jpg', 3, 'Campo Admin', 'https://www.instagram.com/', '1', 'answer'),
(64, 'mohamed ibrahem', 'farg42911@gmail.com', NULL, '$2y$10$L8KXe/p.7QQzKmJ4TIh4BeAczytCQSS/bG/02XZcOD.o4fjX0NX9m', NULL, 'pVEh0Msq2HD2fkryFvbE7rzU9mDstCs8MisDxnhAPl1AAxL32SSykYiVgPEw', '2020-04-05 09:50:25', '2020-04-05 12:36:20', 'pro.svg', NULL, '2017-12-31', '3', 'cover.jpg', 1, NULL, 'https://www.instagram.com/', '1', 'answer'),
(66, 'amin yasser', 'amin.yasser00@gmail.com', NULL, '$2y$10$NDtqdR3ijnpJZsEIseMJReTykVLpjHacMLwKOhoh/cwM61z1dfCqS', NULL, NULL, '2020-04-10 12:16:50', '2020-04-10 12:16:50', 'pro.svg', NULL, '2020-04-10', '3', 'cover.jpg', 1, NULL, ' https://www.instagram.com/', 'user', 'answer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postpage`
--
ALTER TABLE `postpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saveds`
--
ALTER TABLE `saveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storys`
--
ALTER TABLE `storys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typings`
--
ALTER TABLE `typings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `postpage`
--
ALTER TABLE `postpage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saveds`
--
ALTER TABLE `saveds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storys`
--
ALTER TABLE `storys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typings`
--
ALTER TABLE `typings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
