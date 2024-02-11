-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2024 at 01:07 PM
-- Server version: 8.0.32
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_parliament_d`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_pendings`
--

CREATE TABLE `access_pendings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_pendings`
--

INSERT INTO `access_pendings` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-11-01 06:54:59', '2023-11-01 06:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, NULL, '2023-10-09 04:43:01', '2023-10-09 04:43:01'),
(35, 'Employee information', 1, 3, '2023-12-03 05:17:42', '2023-12-03 05:19:53'),
(36, 'professional information', 35, 3, '2023-12-03 05:19:30', '2023-12-03 05:19:30'),
(37, 'Personal information', 36, 3, '2023-12-03 05:20:16', '2024-01-03 05:04:37'),
(38, 'hell0123', 46, 2, '2023-12-04 04:05:22', '2024-01-31 16:22:58'),
(39, 'ccc', 37, 3, '2023-12-04 04:13:00', '2023-12-04 04:13:00'),
(40, 'Test', 38, 3, '2023-12-04 09:55:30', '2023-12-20 11:43:01'),
(41, 'work', NULL, 2, '2023-12-20 05:01:28', '2023-12-20 05:01:28'),
(42, 'Test folder from management', 1, 2, '2023-12-20 05:08:46', '2023-12-20 05:08:46'),
(43, 'folder 1', 1, 1, '2024-01-03 04:48:15', '2024-01-03 04:48:15'),
(44, 'folder 2', 43, 1, '2024-01-03 04:48:31', '2024-01-03 04:48:31'),
(45, 'fo', 1, 1, '2024-01-03 04:52:13', '2024-01-03 04:52:13'),
(46, 'Probir', 1, 1, '2024-01-03 05:02:07', '2024-01-03 05:02:07'),
(47, 'test', 36, 1, '2024-01-03 05:04:15', '2024-01-03 05:04:15'),
(48, 'Hello', 38, 1, '2024-01-31 16:20:53', '2024-01-31 16:20:53'),
(49, 'Monish', 48, 1, '2024-01-31 16:21:05', '2024-01-31 16:21:05'),
(50, 'Hello', 49, 1, '2024-01-31 16:21:21', '2024-01-31 16:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories_accesses`
--

CREATE TABLE `categories_accesses` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `download_allowed` tinyint(1) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `document_id` bigint UNSIGNED NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `document_id`, `file_type`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 'file', 1, 'hi', '2023-10-09 06:29:36', '2023-10-09 06:29:36'),
(2, 38, 'file', 1, 'AAAA', '2023-11-01 05:07:13', '2023-11-01 05:07:13'),
(3, 38, 'file', 1, 'AAAA', '2023-11-01 05:07:14', '2023-11-01 05:07:14'),
(4, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:39', '2023-11-01 08:38:39'),
(5, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:39', '2023-11-01 08:38:39'),
(6, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:39', '2023-11-01 08:38:39'),
(7, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:39', '2023-11-01 08:38:39'),
(8, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:40', '2023-11-01 08:38:40'),
(9, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:40', '2023-11-01 08:38:40'),
(10, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:40', '2023-11-01 08:38:40'),
(11, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:41', '2023-11-01 08:38:41'),
(12, 10, 'folder', 1, 'ygj', '2023-11-01 08:38:41', '2023-11-01 08:38:41'),
(13, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:38', '2023-11-06 11:39:38'),
(14, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:42', '2023-11-06 11:39:42'),
(15, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:43', '2023-11-06 11:39:43'),
(16, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:44', '2023-11-06 11:39:44'),
(17, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:44', '2023-11-06 11:39:44'),
(18, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:45', '2023-11-06 11:39:45'),
(19, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:45', '2023-11-06 11:39:45'),
(20, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:46', '2023-11-06 11:39:46'),
(21, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:46', '2023-11-06 11:39:46'),
(22, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:46', '2023-11-06 11:39:46'),
(23, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:47', '2023-11-06 11:39:47'),
(24, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:50', '2023-11-06 11:39:50'),
(25, 39, 'file', 1, 'Urgent', '2023-11-06 11:39:50', '2023-11-06 11:39:50'),
(26, 17, 'folder', 2, 'comment', '2023-11-09 09:57:17', '2023-11-09 09:57:17'),
(27, 23, 'folder', 1, 'hello', '2023-11-28 04:27:52', '2023-11-28 04:27:52'),
(28, 27, 'folder', 1, 'I am Opi', '2023-11-28 04:28:15', '2023-11-28 04:28:15'),
(29, 10, 'folder', 1, 'very nice', '2023-11-28 06:49:52', '2023-11-28 06:49:52'),
(30, 11, 'folder', 1, 'Hello Jahid', '2023-11-28 06:51:03', '2023-11-28 06:51:03'),
(31, 85, 'file', 2, 'remark', '2023-12-03 06:59:18', '2023-12-03 06:59:18'),
(32, 106, 'file', 2, 'java code', '2023-12-20 05:22:49', '2023-12-20 05:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `is_lock` tinyint(1) NOT NULL DEFAULT '0',
  `lock_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `file_path`, `filetype`, `file_size`, `category_id`, `user_id`, `is_lock`, `lock_code`, `created_at`, `updated_at`) VALUES
(89, 'download.png', NULL, '1/1701747363_1_d0fa4194194eb8ae8e8b.png', 'png', 7350, 40, 1, 0, '', '2023-12-05 03:36:03', '2024-01-03 04:45:20'),
(90, 'SHQTC_Presentation.pptx', NULL, '1/1701747415_1_e588519cdacfcabacc0b.pptx', 'pptx', 1325348, 1, 1, 0, '', '2023-12-05 03:36:55', '2024-01-11 06:34:29'),
(91, 'Budget.xlsx', NULL, '1/1701747475_1_3995cb1742f071998503.xlsx', 'xlsx', 11032, 1, 1, 0, '', '2023-12-05 03:37:55', '2023-12-05 03:37:55'),
(93, 'Docx_DMS.zip', NULL, '1/1701747643_1_f6eaa0aeae7084660ad3.zip', 'zip', 2505032, 1, 1, 0, '', '2023-12-05 03:40:43', '2023-12-05 03:40:43'),
(94, 'file_example_MP3_1MG.mp3', NULL, '1/1701747730_1_d339df136e553ea3d862.mp3', 'mp3', 1059386, 1, 1, 0, '', '2023-12-05 03:42:10', '2023-12-05 03:42:10'),
(97, 'Demo.docx', NULL, '3/1702360128_1_2f469e720d5f2fb9f5ef.docx', 'docx', 11622, 1, 3, 0, '', '2023-12-12 05:48:48', '2023-12-12 05:49:39'),
(99, 'Budget.xlsx', NULL, '3/1702360624_1_5a2027603fb37e09f30b.xlsx', 'xlsx', 11032, 1, 3, 0, '', '2023-12-12 05:57:04', '2023-12-12 05:57:04'),
(100, 'NID (1).pdf', NULL, '2/1702440029_1_fed7a11244ba5a677b0e.pdf', 'pdf', 182689, 1, 2, 0, '', '2023-12-13 04:00:29', '2023-12-13 04:00:29'),
(101, 'file-example_PDF_1MB.pdf', NULL, '2/1703048602_41_864887fa035c83c5ab19.pdf', 'pdf', 1042157, 41, 2, 0, '', '2023-12-20 05:02:40', '2023-12-20 05:03:22'),
(102, 'Java in 100 Seconds.mp4', NULL, '2/1703048575_41_9fae50ed0244f5ef262c.mp4', 'mp4', 4440396, 41, 2, 0, '', '2023-12-20 05:02:55', '2023-12-20 05:02:55'),
(104, 'PNG_transparency_demonstration_1.png', NULL, '2/1703048784_41_01f9788824541c234372.png', 'png', 226933, 41, 2, 0, '', '2023-12-20 05:06:24', '2023-12-20 05:06:24'),
(105, 'what-is-a-jpeg-featured.webp', NULL, '2/1703048976_1_f3337d4b3d92a75a5560.webp', 'webp', 10456, 1, 2, 0, '', '2023-12-20 05:09:36', '2023-12-20 05:09:36'),
(106, 'Main.java', NULL, '2/1703048993__9c539f7e30e90a99e19b.java', 'java', 749, 42, 2, 0, '', '2023-12-20 05:09:53', '2023-12-20 05:21:56'),
(107, 'python.py', NULL, '2/1703049025_1_e069d3a883ba9e5d0a13.py', 'py', 122, 1, 2, 0, '', '2023-12-20 05:10:25', '2023-12-20 05:10:25'),
(108, 'size50.pdf', NULL, '2/1703049217_1_5d96243a13ce97d1d6f2.pdf', 'pdf', 52428235, 42, 2, 0, '', '2023-12-20 05:13:37', '2023-12-20 05:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `document_accesses`
--

CREATE TABLE `document_accesses` (
  `id` bigint UNSIGNED NOT NULL,
  `document_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `download_allowed` tinyint(1) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_versions`
--

CREATE TABLE `document_versions` (
  `id` bigint UNSIGNED NOT NULL,
  `document_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_versions`
--

INSERT INTO `document_versions` (`id`, `document_id`, `title`, `filetype`, `file_size`, `category_id`, `user_id`, `file_path`, `created_at`, `updated_at`) VALUES
(11, 101, 'New WinRAR archive.rar', 'rar', 20, 41, 2, '2/1703048560_41_525cf0c38c7aadc5fe49.rar', '2023-12-20 05:03:22', '2023-12-20 05:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_activities`
--

CREATE TABLE `file_activities` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_id` bigint UNSIGNED NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_time` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_11_051819_create_categories_table', 1),
(7, '2023_09_11_052102_create_documents_table', 1),
(8, '2023_09_11_053430_create_document_accesses_table', 1),
(9, '2023_09_11_053604_create_comments_table', 1),
(10, '2023_09_11_080418_create_categories_accesses_table', 1),
(11, '2023_09_25_051517_create_reminders_table', 1),
(12, '2023_10_08_094625_create_permission_tables', 1),
(13, '2023_10_10_195035_create_access_pendings_table', 2),
(14, '2023_10_12_115411_create_settings_table', 2),
(16, '2023_10_18_100650_create_file_activities_table', 4),
(18, '2023_10_15_102650_create_document_versions_table', 5),
(19, '2023_10_19_104541_create_share_models_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 19);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'file_upload', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(2, 'file_sharing', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(3, 'reminder_own', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(4, 'reminder_with_user', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(5, 'rename', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(6, 'comment', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(7, 'view', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(8, 'download', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(9, 'add_role', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(10, 'view_user_list', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54'),
(11, 'manage_pending_list', 'web', '2023-10-17 09:58:54', '2023-10-17 09:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint UNSIGNED NOT NULL,
  `document_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_date` date NOT NULL,
  `reminder_time` time NOT NULL,
  `if_notified` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `document_id`, `user_id`, `file_type`, `reminder_type`, `reminder_date`, `reminder_time`, `if_notified`, `created_at`, `updated_at`) VALUES
(48, 87, 3, 'file', 'rrrr', '2023-12-03', '13:40:00', 0, '2023-12-03 07:35:47', '2023-12-03 07:36:11'),
(49, 100, 2, 'file', 'test', '2023-12-20', '11:10:00', 0, '2023-12-20 05:07:53', '2023-12-20 05:10:14'),
(50, 88, 1, 'file', 'hgdhg', '2024-01-03', '10:44:00', 0, '2024-01-03 04:44:40', '2024-01-03 04:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-10-12 12:14:28', '2023-10-12 12:14:28'),
(2, 'User', 'web', '2023-10-17 10:02:26', '2023-10-17 10:02:26'),
(4, 'Visitor', 'web', '2023-11-07 06:08:24', '2023-11-07 06:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(8, 2),
(3, 4),
(11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_alert_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_alert_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_files` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remainder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo_en`, `logo_bn`, `title`, `reminder_alert_day`, `reminder_alert_time`, `upload_files`, `create_folder`, `user_login`, `remainder`, `previous_version`, `created_at`, `updated_at`) VALUES
(1, 'logo_en.png', 'logo_bn.png', 'not_yet', 'Before 1 day', '1', '1', '1', '1', '1', '1', NULL, '2023-11-12 08:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `share_models`
--

CREATE TABLE `share_models` (
  `id` bigint UNSIGNED NOT NULL,
  `document_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shared_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shared_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shared_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `share_models`
--

INSERT INTO `share_models` (`id`, `document_id`, `document_type`, `shared_id`, `permission`, `shared_by`, `shared_to`, `date`, `time`, `description`, `created_at`, `updated_at`) VALUES
(67, '100', 'file', '217024409716579300b1f822', '1', '2', '3', '2023-12-13', '10:00', 'to view only', '2023-12-13 04:16:11', '2023-12-13 04:16:11'),
(71, '38', 'folder', '117042517076594d13b9981b', '2', '1', '1', '2024-01-03', '09:14', 'tyrty', '2024-01-03 03:15:07', '2024-01-03 03:15:07'),
(72, '38', 'folder', '117042517076594d13b9981b', '2', '1', '2', '2024-01-03', '09:14', 'tyrty', '2024-01-03 03:15:07', '2024-01-03 03:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameBn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designationInfos` json NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nameEn`, `nameBn`, `username`, `email`, `phone`, `empId`, `designationInfos`, `status`, `password`, `photo`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'S M Asif Hossain', 'এস এম আসিফ হোসেন', '110100127', 'asif.hossain@parliament.gov.bd', '8801823752090', '3212129', '{\"officeId\": 65, \"officeNameBn\": \"নেটওয়ার্ক এন্ড অপারেশন শাখা\", \"officeNameEn\": \"Network and Operation\", \"designationId\": 262233, \"designationNameBn\": \"সহকারী মেইনটেন্যান্স ইঞ্জিনিয়ার\", \"designationNameEn\": \"Assistant Maintenance Engineer\"}', '1', '$2y$10$v5z7ZjEwJ4zwYI3BXhQR0emqAbG6XMTlzcV5LgOIY58hT2YThR9lK', '3212129.png', NULL, NULL, '2023-10-09 04:44:08', '2023-10-09 04:44:08'),
(2, 'Sadi Anwar Chowdhury', 'সাদি আনোয়ার চৌধুরী', '110100089', 'sadi.chowdhury@parliament.gov.bd', '8801715298417', '4310', '{\"officeId\": 65, \"officeNameBn\": \"নেটওয়ার্ক এন্ড অপারেশন শাখা\", \"officeNameEn\": \"Network and Operation\", \"designationId\": 262232, \"designationNameBn\": \"মেইনটেন্যান্স ইঞ্জিনিয়ার\", \"designationNameEn\": \"Maintenance Engineer\"}', '1', '$2y$10$OZqIIricPaekEXW3GJoszejlHMX4dnw6iDOql9vScWsKPHWyY/p/i', '4310.png', NULL, NULL, '2023-11-01 06:54:49', '2023-11-01 06:54:49'),
(3, 'Md. Rashed Mizan', 'মোঃ রাশেদ মিজান', '110100189', 'rashedmizan@parliament.gov.bd', '8801521561341', '3222607', '{\"officeId\": 38, \"officeNameBn\": \"গণ-সংযোগ-১ শাখা\", \"officeNameEn\": \"PUBLIC RELATION-1 SECTION\", \"designationId\": 310503, \"designationNameBn\": \"সহকারী পরিচালক (গণ-সংযোগ)\", \"designationNameEn\": \"Assistant Director(Public Relation)\"}', '1', '$2y$10$C5VvqYlho6OlLOkuv7ie.OWUgCSWbwKqaKaLP3OgCQx6rds7L4Pn2', '3222607.png', NULL, NULL, '2023-11-12 05:13:00', '2023-11-12 05:13:00'),
(15, 'Tester', 'Tester', '123456789', 'sabikunnaher2007@gmail.com', '01535751282', '123456789', '[\"not\"]', '1', '$2y$10$W2KCFDujGbycwq.Y2h9bGuE5ZtEsSP19mKF6byOjilr0Li69V28Yu', '123456789-1701499671.jpeg', NULL, NULL, '2023-12-02 06:47:51', '2023-12-02 06:47:51'),
(17, 'vfdv', 'test spouse 2', 'gso', 'admin@gmail.com', '01234567890', 'gso', '[\"not\"]', '1', '$2y$10$trWIcvyyohIk1jbPj3MVfut.VHAhEB4InEH7qp8b5XZuSTidsQWy2', 'df.jpg', NULL, NULL, '2023-12-05 03:50:26', '2023-12-05 03:50:26'),
(19, 'Md. Al-Amin', 'মোঃ আল-আমিন', '110100109', 'alamin.md@parliament.gov.bd', '8801726262344', '5422', '{\"officeId\": 81, \"officeNameBn\": \"রিপোর্টিং শাখা-১\", \"officeNameEn\": \"REPORTING SECTION-1\", \"designationId\": 263469, \"designationNameBn\": \"সহকারী পরিচালক (রিপোর্টিং)\", \"designationNameEn\": \"Assistant Director(Reporting)\"}', '1', '$2y$10$n349aDXdbZ8UZJFHXjQWS.NCWDdb8vYVOHi2cyG0ui.rVLWAv/WP6', '5422.png', NULL, NULL, '2024-01-04 12:02:34', '2024-01-04 12:02:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_pendings`
--
ALTER TABLE `access_pendings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `categories_accesses`
--
ALTER TABLE `categories_accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_accesses_category_id_foreign` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_category_id_foreign` (`category_id`);

--
-- Indexes for table `document_accesses`
--
ALTER TABLE `document_accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_accesses_document_id_foreign` (`document_id`),
  ADD KEY `document_accesses_user_id_foreign` (`user_id`);

--
-- Indexes for table `document_versions`
--
ALTER TABLE `document_versions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_versions_document_id_foreign` (`document_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_activities`
--
ALTER TABLE `file_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_models`
--
ALTER TABLE `share_models`
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
-- AUTO_INCREMENT for table `access_pendings`
--
ALTER TABLE `access_pendings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories_accesses`
--
ALTER TABLE `categories_accesses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `document_accesses`
--
ALTER TABLE `document_accesses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_versions`
--
ALTER TABLE `document_versions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_activities`
--
ALTER TABLE `file_activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `share_models`
--
ALTER TABLE `share_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories_accesses`
--
ALTER TABLE `categories_accesses`
  ADD CONSTRAINT `categories_accesses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `document_accesses`
--
ALTER TABLE `document_accesses`
  ADD CONSTRAINT `document_accesses_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `document_accesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `document_versions`
--
ALTER TABLE `document_versions`
  ADD CONSTRAINT `document_versions_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
