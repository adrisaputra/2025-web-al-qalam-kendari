-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_2025_web_al_qalam.academics
CREATE TABLE IF NOT EXISTS `academics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('Curriculum','Academic Calendar') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int DEFAULT NULL,
  `work_unit_id` int unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `academics_work_unit_id_foreign` (`work_unit_id`),
  KEY `academics_user_id_foreign` (`user_id`),
  CONSTRAINT `academics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `academics_work_unit_id_foreign` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.academics: ~2 rows (lebih kurang)
INSERT INTO `academics` (`id`, `title`, `cover`, `slug`, `text`, `file`, `category`, `count_view`, `work_unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(3, 'ss', '1765858793.png', 'ss', '<p>sadsdsdsds</p>', NULL, 'Curriculum', NULL, 3, 138, '2025-12-15 20:19:54', '2025-12-15 20:19:54'),
	(4, 'Kalender Akademik', '1765859148.jpg', 'kalender-akademik', '<h2>Kalender Akademik&nbsp;Kalender AkademikKalender AkademikKalender AkademikKalender Akademik</h2>', NULL, 'Academic Calendar', NULL, 3, 138, '2025-12-15 20:25:50', '2025-12-15 20:25:50');

-- membuang struktur untuk table db_2025_web_al_qalam.academic_viewers
CREATE TABLE IF NOT EXISTS `academic_viewers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `academic_id` int unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `academic_viewers_academic_id_foreign` (`academic_id`),
  CONSTRAINT `academic_viewers_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.academic_viewers: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.achievements
CREATE TABLE IF NOT EXISTS `achievements` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('Academic','Non Academic') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int DEFAULT NULL,
  `work_unit_id` int unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achievements_work_unit_id_foreign` (`work_unit_id`),
  KEY `achievements_user_id_foreign` (`user_id`),
  CONSTRAINT `achievements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `achievements_work_unit_id_foreign` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.achievements: ~2 rows (lebih kurang)
INSERT INTO `achievements` (`id`, `title`, `cover`, `slug`, `text`, `file`, `category`, `count_view`, `work_unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(4, 'xx', '1765109870.jpg', 'xx', '<p>xxx</p>', NULL, 'Academic', NULL, 3, 138, '2025-12-07 04:17:51', '2025-12-07 04:17:51'),
	(5, 'xxx', '1765109906.jpg', 'xxx', '<p>xx</p>', NULL, 'Academic', NULL, 3, 138, '2025-12-07 04:18:06', '2025-12-07 04:18:28');

-- membuang struktur untuk table db_2025_web_al_qalam.achievement_viewers
CREATE TABLE IF NOT EXISTS `achievement_viewers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `achievement_id` int unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achievement_viewers_achievement_id_foreign` (`achievement_id`),
  CONSTRAINT `achievement_viewers_achievement_id_foreign` FOREIGN KEY (`achievement_id`) REFERENCES `achievements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.achievement_viewers: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.activity_log
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.activity_log: ~168 rows (lebih kurang)
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
	(1, 'default', 'Edit Data Setting With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-29 06:53:25', '2025-11-29 06:53:25'),
	(2, 'default', 'Edit Data Setting With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-29 06:54:10', '2025-11-29 06:54:10'),
	(3, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-29 06:54:14', '2025-11-29 06:54:14'),
	(4, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-29 06:55:55', '2025-11-29 06:55:55'),
	(5, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-29 06:59:51', '2025-11-29 06:59:51'),
	(6, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-29 23:56:45', '2025-11-29 23:56:45'),
	(7, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 00:40:53', '2025-11-30 00:40:53'),
	(8, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 00:59:20', '2025-11-30 00:59:20'),
	(9, 'default', 'Edit Data Work Unit With ID = 4', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 02:37:16', '2025-11-30 02:37:16'),
	(10, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 02:56:45', '2025-11-30 02:56:45'),
	(11, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 02:57:46', '2025-11-30 02:57:46'),
	(12, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:16:16', '2025-11-30 04:16:16'),
	(13, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:16:38', '2025-11-30 04:16:38'),
	(14, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:20:09', '2025-11-30 04:20:09'),
	(15, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:20:19', '2025-11-30 04:20:19'),
	(16, 'default', 'Create Data Work Unit', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:20:29', '2025-11-30 04:20:29'),
	(17, 'default', 'Edit Data Work Unit With ID = 112', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:20:41', '2025-11-30 04:20:41'),
	(18, 'default', 'Edit Data Work Unit With ID = 112', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:20:51', '2025-11-30 04:20:51'),
	(19, 'default', 'Delete Data Work Unit With ID = 112', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 04:20:57', '2025-11-30 04:20:57'),
	(20, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 17:53:56', '2025-11-30 17:53:56'),
	(21, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 18:25:00', '2025-11-30 18:25:00'),
	(22, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 20:36:25', '2025-11-30 20:36:25'),
	(23, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 20:50:40', '2025-11-30 20:50:40'),
	(24, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 20:55:43', '2025-11-30 20:55:43'),
	(25, 'default', 'Edit Data Work Unit With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 20:59:24', '2025-11-30 20:59:24'),
	(26, 'default', 'Edit Data Work Unit With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 20:59:33', '2025-11-30 20:59:33'),
	(27, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 21:00:45', '2025-11-30 21:00:45'),
	(28, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 21:00:54', '2025-11-30 21:00:54'),
	(29, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 21:01:07', '2025-11-30 21:01:07'),
	(30, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 23:51:03', '2025-11-30 23:51:03'),
	(31, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 23:51:51', '2025-11-30 23:51:51'),
	(32, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-11-30 23:53:12', '2025-11-30 23:53:12'),
	(33, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-01 00:08:12', '2025-12-01 00:08:12'),
	(34, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-02 03:02:52', '2025-12-02 03:02:52'),
	(35, 'default', 'Edit Data Slider With ID = 4', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-02 03:20:07', '2025-12-02 03:20:07'),
	(36, 'default', 'Create Data News', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-02 03:47:06', '2025-12-02 03:47:06'),
	(37, 'default', 'Edit Data News With ID = 4', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-02 03:47:39', '2025-12-02 03:47:39'),
	(38, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 16:18:02', '2025-12-06 16:18:02'),
	(39, 'default', 'Create Data Social', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 18:39:45', '2025-12-06 18:39:45'),
	(40, 'default', 'Edit Data Social With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 18:41:00', '2025-12-06 18:41:00'),
	(41, 'default', 'Create Data Article', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 18:50:59', '2025-12-06 18:50:59'),
	(42, 'default', 'Edit Data Article With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 18:51:31', '2025-12-06 18:51:31'),
	(43, 'default', 'Edit Data Article With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 18:51:51', '2025-12-06 18:51:51'),
	(44, 'default', 'Edit Data Article With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 18:52:05', '2025-12-06 18:52:05'),
	(45, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:28:20', '2025-12-06 19:28:20'),
	(46, 'default', 'Delete Data Slider With ID = 5', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:28:58', '2025-12-06 19:28:58'),
	(47, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:29:08', '2025-12-06 19:29:08'),
	(48, 'default', 'Delete Data Slider With ID = 6', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:29:24', '2025-12-06 19:29:24'),
	(49, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:36:56', '2025-12-06 19:36:56'),
	(50, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:49:04', '2025-12-06 19:49:04'),
	(51, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:52:37', '2025-12-06 19:52:37'),
	(52, 'default', 'Delete Data Slider With ID = 9', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:52:54', '2025-12-06 19:52:54'),
	(53, 'default', 'Edit Data Slider With ID = 8', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:53:51', '2025-12-06 19:53:51'),
	(54, 'default', 'Delete Data Slider With ID = 8', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:54:12', '2025-12-06 19:54:12'),
	(55, 'default', 'Edit Data Slider With ID = 7', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:54:55', '2025-12-06 19:54:55'),
	(56, 'default', 'Delete Data Slider With ID = 7', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 19:55:03', '2025-12-06 19:55:03'),
	(57, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:09:29', '2025-12-06 20:09:29'),
	(58, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:09:35', '2025-12-06 20:09:35'),
	(59, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:13:34', '2025-12-06 20:13:34'),
	(60, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:13:52', '2025-12-06 20:13:52'),
	(61, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:13:59', '2025-12-06 20:13:59'),
	(62, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:15:02', '2025-12-06 20:15:02'),
	(63, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:15:51', '2025-12-06 20:15:51'),
	(64, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:16:20', '2025-12-06 20:16:20'),
	(65, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-06 20:16:29', '2025-12-06 20:16:29'),
	(66, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 01:55:56', '2025-12-07 01:55:56'),
	(67, 'default', 'Create Data Achievement', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 02:14:00', '2025-12-07 02:14:00'),
	(68, 'default', 'Create Data Achievement', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 02:16:07', '2025-12-07 02:16:07'),
	(69, 'default', 'Create Data Achievement', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:16:57', '2025-12-07 04:16:57'),
	(70, 'default', 'Delete Data Achievement With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:17:07', '2025-12-07 04:17:07'),
	(71, 'default', 'Delete Data Achievement With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:17:10', '2025-12-07 04:17:10'),
	(72, 'default', 'Delete Data Achievement With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:17:14', '2025-12-07 04:17:14'),
	(73, 'default', 'Create Data Achievement', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:17:51', '2025-12-07 04:17:51'),
	(74, 'default', 'Create Data Achievement', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:18:06', '2025-12-07 04:18:06'),
	(75, 'default', 'Edit Data Achievement With ID = 5', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:18:28', '2025-12-07 04:18:28'),
	(76, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:18:49', '2025-12-07 04:18:49'),
	(77, 'default', 'Create Data Program', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:47:05', '2025-12-07 04:47:05'),
	(78, 'default', 'Edit Data Program With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:47:36', '2025-12-07 04:47:36'),
	(79, 'default', 'Delete Data Program With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:47:47', '2025-12-07 04:47:47'),
	(80, 'default', 'Create Data Program', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:48:00', '2025-12-07 04:48:00'),
	(81, 'default', 'Delete Data Program With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 04:48:09', '2025-12-07 04:48:09'),
	(82, 'default', 'Create Data Academic', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:02:50', '2025-12-07 05:02:50'),
	(83, 'default', 'Create Data Academic', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:03:05', '2025-12-07 05:03:05'),
	(84, 'default', 'Edit Data Academic With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:03:12', '2025-12-07 05:03:12'),
	(85, 'default', 'Edit Data Academic With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:03:20', '2025-12-07 05:03:20'),
	(86, 'default', 'Delete Data Academic With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:03:37', '2025-12-07 05:03:37'),
	(87, 'default', 'Delete Data Academic With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:03:41', '2025-12-07 05:03:41'),
	(88, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:06:29', '2025-12-07 05:06:29'),
	(89, 'default', 'Delete Data Slider With ID = 10', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:07:07', '2025-12-07 05:07:07'),
	(90, 'default', 'Tambah Data User', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:47:01', '2025-12-07 05:47:01'),
	(91, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 05:57:30', '2025-12-07 05:57:30'),
	(92, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-07 05:59:03', '2025-12-07 05:59:03'),
	(93, 'default', 'Edit Data Setting With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-07 06:02:27', '2025-12-07 06:02:27'),
	(94, 'default', 'Edit Data Setting With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-07 06:02:40', '2025-12-07 06:02:40'),
	(95, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-07 06:03:48', '2025-12-07 06:03:48'),
	(96, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-07 06:06:34', '2025-12-07 06:06:34'),
	(97, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-07 06:18:22', '2025-12-07 06:18:22'),
	(98, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-07 06:21:20', '2025-12-07 06:21:20'),
	(99, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 17:48:04', '2025-12-09 17:48:04'),
	(100, 'default', 'Delete Data Slider With ID = 11', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 18:32:42', '2025-12-09 18:32:42'),
	(101, 'default', 'Edit Data Profile With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 18:39:21', '2025-12-09 18:39:21'),
	(102, 'default', 'Edit Data Profile With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 18:39:26', '2025-12-09 18:39:26'),
	(103, 'default', 'Edit Data Profile With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 18:39:57', '2025-12-09 18:39:57'),
	(104, 'default', 'Edit Data Profile With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 18:45:38', '2025-12-09 18:45:38'),
	(105, 'default', 'Edit Data Profile With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 18:45:44', '2025-12-09 18:45:44'),
	(106, 'default', 'Delete Data Slider With ID = 4', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-09 18:51:54', '2025-12-09 18:51:54'),
	(107, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 03:03:01', '2025-12-10 03:03:01'),
	(108, 'default', 'Create Data Video', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 03:03:13', '2025-12-10 03:03:13'),
	(109, 'default', 'Edit Data Article With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 03:04:47', '2025-12-10 03:04:47'),
	(110, 'default', 'Create Data Album', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 03:10:05', '2025-12-10 03:10:05'),
	(111, 'default', 'Edit Data Setting With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 03:32:34', '2025-12-10 03:32:34'),
	(112, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 16:57:58', '2025-12-10 16:57:58'),
	(113, 'default', 'Edit Data Work Unit With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:03:34', '2025-12-10 17:03:34'),
	(114, 'default', 'Edit Data Work Unit With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:03:40', '2025-12-10 17:03:40'),
	(115, 'default', 'Edit Data Work Unit With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:03:45', '2025-12-10 17:03:45'),
	(116, 'default', 'Edit Data Work Unit With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:32:45', '2025-12-10 17:32:45'),
	(117, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:33:12', '2025-12-10 17:33:12'),
	(118, 'default', 'Edit Data Work Unit With ID = 4', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:33:27', '2025-12-10 17:33:27'),
	(119, 'default', 'Edit Data Work Unit With ID = 5', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:33:46', '2025-12-10 17:33:46'),
	(120, 'default', 'Edit Data Work Unit With ID = 6', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:34:04', '2025-12-10 17:34:04'),
	(121, 'default', 'Edit Data Work Unit With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:46:12', '2025-12-10 17:46:12'),
	(122, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:46:51', '2025-12-10 17:46:51'),
	(123, 'default', 'Edit Data Work Unit With ID = 2', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:47:05', '2025-12-10 17:47:05'),
	(124, 'default', 'Edit Data Work Unit With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:47:20', '2025-12-10 17:47:20'),
	(125, 'default', 'Edit Data Work Unit With ID = 4', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:47:36', '2025-12-10 17:47:36'),
	(126, 'default', 'Edit Data Work Unit With ID = 5', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:47:44', '2025-12-10 17:47:44'),
	(127, 'default', 'Edit Data Work Unit With ID = 6', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 17:47:53', '2025-12-10 17:47:53'),
	(128, 'default', 'Edit Data News With ID = 4', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 19:52:12', '2025-12-10 19:52:12'),
	(129, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-10 23:26:19', '2025-12-10 23:26:19'),
	(130, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 15:05:03', '2025-12-11 15:05:03'),
	(131, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 16:30:36', '2025-12-11 16:30:36'),
	(132, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 16:42:03', '2025-12-11 16:42:03'),
	(133, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:24:34', '2025-12-11 17:24:34'),
	(134, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:25:49', '2025-12-11 17:25:49'),
	(135, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:26:31', '2025-12-11 17:26:31'),
	(136, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:26:41', '2025-12-11 17:26:41'),
	(137, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:27:50', '2025-12-11 17:27:50'),
	(138, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:31:32', '2025-12-11 17:31:32'),
	(139, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:31:43', '2025-12-11 17:31:43'),
	(140, 'default', 'Edit Data Slider With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-11 17:31:48', '2025-12-11 17:31:48'),
	(141, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 14:45:50', '2025-12-12 14:45:50'),
	(142, 'default', 'Create Data Structure', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:38:30', '2025-12-12 15:38:30'),
	(143, 'default', 'Edit Data Structure With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:44:17', '2025-12-12 15:44:17'),
	(144, 'default', 'Edit Data Structure With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:45:24', '2025-12-12 15:45:24'),
	(145, 'default', 'Edit Data Structure With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:45:44', '2025-12-12 15:45:44'),
	(146, 'default', 'Edit Data Structure With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:46:08', '2025-12-12 15:46:08'),
	(147, 'default', 'Edit Data Structure With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:47:47', '2025-12-12 15:47:47'),
	(148, 'default', 'Create Data Structure', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:48:06', '2025-12-12 15:48:06'),
	(149, 'default', 'Create Data Structure', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 15:48:27', '2025-12-12 15:48:27'),
	(150, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 16:17:25', '2025-12-12 16:17:25'),
	(151, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 16:22:00', '2025-12-12 16:22:00'),
	(152, 'default', 'Edit Data Structure With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 17:06:05', '2025-12-12 17:06:05'),
	(153, 'default', 'Edit Data Structure With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-12 17:07:46', '2025-12-12 17:07:46'),
	(154, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 18:23:31', '2025-12-15 18:23:31'),
	(155, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 18:34:01', '2025-12-15 18:34:01'),
	(156, 'default', 'Delete Data Slider With ID = 12', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:21:55', '2025-12-15 19:21:55'),
	(157, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:22:05', '2025-12-15 19:22:05'),
	(158, 'default', 'Delete Data Slider With ID = 13', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:27:50', '2025-12-15 19:27:50'),
	(159, 'default', 'Create Data Slider', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:28:01', '2025-12-15 19:28:01'),
	(160, 'default', 'Edit Data Slider With ID = 14', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:29:43', '2025-12-15 19:29:43'),
	(161, 'default', 'Edit Data Profile With ID = 9', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:37:13', '2025-12-15 19:37:13'),
	(162, 'default', 'Edit Data Profile With ID = 10', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:37:21', '2025-12-15 19:37:21'),
	(163, 'default', 'Edit Data Profile With ID = 11', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:37:39', '2025-12-15 19:37:39'),
	(164, 'default', 'Create Data Facility', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:40:28', '2025-12-15 19:40:28'),
	(165, 'default', 'Delete Data Facility With ID = 1', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:41:23', '2025-12-15 19:41:23'),
	(166, 'default', 'Create Data Facility', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 19:42:51', '2025-12-15 19:42:51'),
	(167, 'default', 'Create Data Academic', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 20:19:54', '2025-12-15 20:19:54'),
	(168, 'default', 'Create Data Program', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 20:24:49', '2025-12-15 20:24:49'),
	(169, 'default', 'Create Data Program', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 20:25:09', '2025-12-15 20:25:09'),
	(170, 'default', 'Create Data Academic', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 20:25:50', '2025-12-15 20:25:50'),
	(171, 'default', 'Create Data Video', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-15 20:30:59', '2025-12-15 20:30:59'),
	(172, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 00:00:30', '2025-12-16 00:00:30'),
	(173, 'default', 'Create Data News', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 00:05:02', '2025-12-16 00:05:02'),
	(174, 'default', 'Edit Data News With ID = 5', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 00:05:43', '2025-12-16 00:05:43'),
	(175, 'default', 'Edit Data Setting With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 02:28:08', '2025-12-16 02:28:08'),
	(176, 'default', 'Edit Data Setting With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 02:29:18', '2025-12-16 02:29:18'),
	(177, 'default', 'Edit Data Setting With ID = 3', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 02:33:46', '2025-12-16 02:33:46'),
	(178, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 02:33:50', '2025-12-16 02:33:50'),
	(179, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 18:01:06', '2025-12-16 18:01:06'),
	(180, 'default', 'Create Data Album', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 18:12:47', '2025-12-16 18:12:47'),
	(181, 'default', 'Create Data Video', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 18:21:47', '2025-12-16 18:21:47'),
	(182, 'default', 'Create Data News', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 18:33:49', '2025-12-16 18:33:49'),
	(183, 'default', 'Edit Data Slider With ID = 14', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 18:43:38', '2025-12-16 18:43:38'),
	(184, 'default', 'Edit Data Slider With ID = 14', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-16 18:45:06', '2025-12-16 18:45:06'),
	(185, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-17 18:36:51', '2025-12-17 18:36:51'),
	(186, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-18 16:39:00', '2025-12-18 16:39:00'),
	(187, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-19 02:56:06', '2025-12-19 02:56:06'),
	(188, 'default', 'Log Out', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-12-19 02:56:35', '2025-12-19 02:56:35'),
	(189, 'default', 'Login', NULL, NULL, NULL, 'App\\Models\\User', 138, '[]', NULL, '2025-12-19 02:56:47', '2025-12-19 02:56:47');

-- membuang struktur untuk table db_2025_web_al_qalam.agendas
CREATE TABLE IF NOT EXISTS `agendas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `work_unit_id` int unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsible_person` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendas_user_id_foreign` (`user_id`),
  KEY `FK_agendas_work_units` (`work_unit_id`),
  CONSTRAINT `agendas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_agendas_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.agendas: ~0 rows (lebih kurang)
INSERT INTO `agendas` (`id`, `work_unit_id`, `title`, `start`, `end`, `desc`, `place`, `responsible_person`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, 3, 'Kegiatan A', '2025-12-16 08:00:00', '2025-12-18 16:00:00', 'xxxxx', 'kendari', 'bapak thalib', 138, '2025-12-16 08:29:41', '2025-12-16 08:29:42'),
	(3, 3, 'kegiatan B', '2025-12-16 08:00:00', '2025-12-18 08:00:00', 'xccc', 'ddddd', 'musly', 138, NULL, NULL);

-- membuang struktur untuk table db_2025_web_al_qalam.albums
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `work_unit_id` int unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_albums_work_units` (`work_unit_id`),
  CONSTRAINT `FK_albums_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.albums: ~0 rows (lebih kurang)
INSERT INTO `albums` (`id`, `work_unit_id`, `title`, `text`, `cover`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Penerimaan Murid baru', 'xxx', '1765365003.png', '2025-12-10 03:10:05', '2025-12-10 03:10:05'),
	(2, 3, 'xsaxsa', 'xxsaxasxsa', '1765937566.jpg', '2025-12-16 18:12:47', '2025-12-16 18:12:47');

-- membuang struktur untuk table db_2025_web_al_qalam.announcements
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcements_user_id_foreign` (`user_id`),
  CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.announcements: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int NOT NULL DEFAULT '0',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.articles: ~1 rows (lebih kurang)
INSERT INTO `articles` (`id`, `title`, `cover`, `slug`, `text`, `file`, `count_view`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Gambar Kosong Terbitkan Karya Ilmiah, 16 Guru Dapat Apresiasi di Pembinaan Guru SIT Nur Hidayah', '1765075923.jpg', 'gambar-kosong-terbitkan-karya-ilmiah-16-guru-dapat-apresiasi-di-pembinaan-guru-sit-nur-hidayah', '<p style="text-align:justify">Memperingati Hari Guru Nasional, Direktorat SIT (Sekolah Islam Terpadu) Yayasan Nur Hidayah Surakarta menggelar Pembinaan Guru SIT Nur Hidayah dengan tema, &quot;Urgensi Inovasi Pendidikan Melalui Riset&quot; pada Sabtu (6/12/2025).&nbsp;<em>Alhamdulillah</em>, sekitar 239 guru dari PAUD IT, SD IT, SMP IT, dan SMA IT hadir dalam acara yang dilaksanakan di Nur Hidayah Convention Center (NHCC) tersebut.<br />\r\n<br />\r\nSekretaris Yayasan Nur Hidayah Surakarta, Ustadz Fathkuroji, S.T., menyampaikan dalam sambutannya bahwa budaya riset merupakan bagian dari nilai-nilai Islam dalam menjaga ilmu pengetahuan.&nbsp;<br />\r\n<br />\r\nSedangkan Direktur Sekolah Islam Terpadu Yayasan Nur Hidayah Surakarta, Ustadzah Dr. Ari Puspitowati, M.Pd., mengajak para guru untuk semangat dalam berkarya, khususnya dalam bentuk riset, untuk menghadapi tantangan pendidikan di zaman ini.</p>', NULL, 1, 1, '2025-12-06 18:50:59', '2025-12-10 23:45:14');

-- membuang struktur untuk table db_2025_web_al_qalam.article_viewers
CREATE TABLE IF NOT EXISTS `article_viewers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_viewers_article_id_foreign` (`article_id`),
  CONSTRAINT `article_viewers_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.article_viewers: ~0 rows (lebih kurang)
INSERT INTO `article_viewers` (`id`, `article_id`, `ip_address`, `created_at`, `updated_at`) VALUES
	(1, 1, '::1', '2025-12-10 23:45:14', '2025-12-10 23:45:14');

-- membuang struktur untuk table db_2025_web_al_qalam.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.cache: ~7 rows (lebih kurang)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-captcha_1ddcaa2228da41c49bdbcdfdfecaaf2c', 's:9:"11 + 1 = ";', 1765936890),
	('laravel-cache-captcha_38d07986bf16150e2efb46e7f9d1528b', 's:9:"13 + 6 = ";', 1765871880),
	('laravel-cache-captcha_3bce8f40688d164cf0d131cfb8e4af1d', 's:9:"19 + 1 = ";', 1765871875),
	('laravel-cache-captcha_3e9c0f98f69086dae269934f73ee16e8', 's:9:"28 + 2 = ";', 1766025297),
	('laravel-cache-captcha_55a2a25fbb08425fc744115471c2c713', 's:9:"18 + 2 = ";', 1765881292),
	('laravel-cache-captcha_a781c3cd22d431cb21f310e196e51a44', 's:9:"20 + 9 = ";', 1766104701),
	('laravel-cache-captcha_e5b4e6ee217844184653f3502c403545', 's:9:"20 + 2 = ";', 1766057130);

-- membuang struktur untuk table db_2025_web_al_qalam.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.cache_locks: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.facilities
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `work_unit_id` int unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_facilities_work_units` (`work_unit_id`),
  CONSTRAINT `FK_facilities_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.facilities: ~1 rows (lebih kurang)
INSERT INTO `facilities` (`id`, `work_unit_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
	(2, 3, 'Kursi', '1765856570.jpg', '2025-12-15 19:42:51', '2025-12-15 19:42:51');

-- membuang struktur untuk table db_2025_web_al_qalam.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.failed_jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.groups: ~2 rows (lebih kurang)
INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', '2025-11-17 10:23:00', '2025-11-17 10:23:01'),
	(2, 'Operator', '2025-11-17 10:23:00', '2025-11-17 10:23:02');

-- membuang struktur untuk table db_2025_web_al_qalam.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.job_batches: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.migrations: ~24 rows (lebih kurang)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_11_17_092346_create_groups', 2),
	(5, '2025_11_17_092352_create_settings', 2),
	(6, '2025_11_17_093056_create_activity_log_table', 2),
	(7, '2025_11_17_093057_add_event_column_to_activity_log_table', 2),
	(8, '2025_11_17_093058_add_batch_uuid_column_to_activity_log_table', 2),
	(9, '2025_11_17_113931_create_sliders', 3),
	(10, '2025_11_17_121925_create_profiles', 4),
	(13, '2025_11_22_014612_create_news', 6),
	(15, '2025_11_22_014700_create_agendas', 6),
	(16, '2025_11_23_032245_create_albums', 7),
	(17, '2025_11_23_032253_create_photos', 7),
	(18, '2025_11_23_033908_create_videos', 8),
	(25, '2025_11_29_121047_create_work_units', 9),
	(26, '2025_12_02_115658_create_facilities', 10),
	(27, '2025_12_07_014453_create_socials', 11),
	(28, '2025_12_07_021720_create_social_viewers', 12),
	(29, '2025_12_07_024318_create_articles', 13),
	(30, '2025_12_07_024347_create_article_viewers', 13),
	(31, '2025_12_07_052903_create_achievements', 14),
	(32, '2025_12_07_053128_create_programs', 14),
	(33, '2025_12_07_053156_create_academics', 14),
	(34, '2025_12_07_053338_create_achievement_viewers', 14),
	(35, '2025_12_07_053348_create_program_viewers', 14),
	(36, '2025_12_07_053355_create_academic_viewers', 14),
	(37, '2025_12_11_020819_create_news_viewers', 15),
	(38, '2025_12_12_053528_create_structures', 16);

-- membuang struktur untuk table db_2025_web_al_qalam.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int NOT NULL DEFAULT '0',
  `work_unit_id` int unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_user_id_foreign` (`user_id`),
  KEY `FK_news_work_units` (`work_unit_id`),
  CONSTRAINT `FK_news_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`) ON DELETE CASCADE,
  CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.news: ~1 rows (lebih kurang)
INSERT INTO `news` (`id`, `title`, `cover`, `slug`, `text`, `file`, `count_view`, `work_unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(4, 'PendikarQu Gelar Kajian BPI Akbar', '1764676025.jpg', 'pendikarqu-gelar-kajian-bpi-akbar', '<p style="text-align:start"><span style="font-size:16px"><span style="color:#212529"><span style="font-family:Montserrat"><span style="background-color:#ffffff">Direktorat Pendidikan Karakter dan Al-Qur&rsquo;an (PendikarQu) Yayasan Nur Hidayah Surakarta selenggarakan Kajian Bina Pribadi Islami (BPI) Akbar pada Sabtu (29/11/2026). Bertempat di Nur Hidayah Convention Center (NHCC), kegiatan ini diikuti oleh anggota BPI orang tua PAUD IT dan SD IT Nur Hidayah Surakarta dengan tema &ldquo;Yuk, Raih Surga dengan Tarbiyah&rdquo;.</span></span></span></span></p>\r\n\r\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#212529"><span style="font-family:Montserrat"><span style="background-color:#ffffff">Ustadz Choirul Fata, S.Ag., Direktur PendikarQu Yayasan Nur Hidayah Surakarta, dalam sambutannya menjelaskan bahwa BPI bukan hanya sekedar kegiatan rutin tapi juga pembentukan proses pembinaan.</span></span></span></span></p>\r\n\r\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#212529"><span style="font-family:Montserrat"><span style="background-color:#ffffff">&ldquo;Dengan mengikuti BPI membuat kita senantiasa memperbaiki hubungan kita dengan Allah, dengan sesama manusia dan diri sendiri. Selain itu juga menjaga kita tetap berada di lingkungan yang baik, saling menasihati dan menguatkan dalam kebaikan,&rdquo; ujar Ustadz Fata.</span></span></span></span></p>\r\n\r\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#212529"><span style="font-family:Montserrat"><span style="background-color:#ffffff">Ustadz Dr. Wiranto, M.Kom., M.CS., Ketua Dewan Pembina Yayasan Nur Hidayah Surakarta hadir memberikan materi kepada para peserta.</span></span></span></span></p>\r\n\r\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#212529"><span style="font-family:Montserrat"><span style="background-color:#ffffff">Beliau membuka dengan nasihat orang baik akan bertemu orang baik bukan kebetulan tapi karena niatnya, tentang keshalihan anak, orang tua dan guru. Beliau juga berpesan jangan sampai terlalu lama &lsquo;disconnect&rsquo; dengan Allah dan mengajak peserta untuk bersama merawat serta menjaga keluarganya.</span></span></span></span></p>\r\n\r\n<p style="text-align:start"><span style="font-size:16px"><span style="color:#212529"><span style="font-family:Montserrat"><span style="background-color:#ffffff">Tidak hanya itu, beliau juga sharing berbagai cerita dari para alumni Yayasan Nur Hidayah Surakarta dengan kisah-kisah mereka yang menginspirasi. Kajian ditutup dengan ramah tamah makan siang bersama peserta dan panitia. [Humas]<img alt="" src="http://localhost/2025-web-al-qalam/storage/news_image/1764493160_1764675818.jpg" /></span></span></span></span></p>', NULL, 1, 1, 1, '2025-12-02 03:47:06', '2025-12-10 19:52:12'),
	(5, 'We Master English, We Hold the World | English Reinforcement Day (ERD)', '1765872300.jpg', 'we-master-english-we-hold-the-world-english-reinforcement-day-erd', '<p>We Master English, We Hold the World | English Reinforcement Day (ERD)&nbsp;&nbsp;We Master English, We Hold the World | English Reinforcement Day (ERD)</p>', NULL, 1, 3, 138, '2025-12-16 00:05:02', '2025-12-21 20:36:18'),
	(6, 'We Master English, We Hold the World | English Reinforcement Day (ERD)', '1765938827.jpg', 'we-master-english-we-hold-the-world-english-reinforcement-day-erd', '<p>We Master English, We Hold the World | English Reinforcement Day (ERD)&nbsp;We Master English, We Hold the World | English Reinforcement Day (ERD)</p>', NULL, 0, 3, 138, '2025-12-16 18:33:48', '2025-12-16 18:33:48');

-- membuang struktur untuk table db_2025_web_al_qalam.news_viewers
CREATE TABLE IF NOT EXISTS `news_viewers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_viewers_news_id_foreign` (`news_id`),
  CONSTRAINT `news_viewers_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.news_viewers: ~0 rows (lebih kurang)
INSERT INTO `news_viewers` (`id`, `news_id`, `ip_address`, `created_at`, `updated_at`) VALUES
	(1, 4, '::1', '2025-12-10 19:51:09', '2025-12-10 19:51:09'),
	(2, 5, '::1', '2025-12-21 20:36:18', '2025-12-21 20:36:18');

-- membuang struktur untuk table db_2025_web_al_qalam.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.password_reset_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int unsigned NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_album_id_foreign` (`album_id`),
  CONSTRAINT `photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.photos: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `work_unit_id` int unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.profiles: ~9 rows (lebih kurang)
INSERT INTO `profiles` (`id`, `work_unit_id`, `title`, `text`, `image`, `url`, `menu`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Profil', '<div style="text-align:justify">Yayasan Nur Hidayah Surakarta lahir dari semangat kepedulian dan berbagi kebaikan dengan tulus. Sudah menjadi&nbsp;<em>sunnatullah</em>&nbsp;bahwa merosotnya kondisi Umat Islam lebih dikarenakan kurang gigihnya perjuangan menegakkan kebaikan. Kebaikan dan kebatilan tidak mungkin bersatu dalam satu tempat, keduanya akan terus berlomba mendapatkan pendukung. Demikian kurang lebih kondisi yang melatar belakangi berdirinya Yayasan Nur Hidayah Surakarta. Kala itu, Bapak H. Siswo Oetomo pun menyampaikan kalau beliau memiliki mimpi untuk bisa dekat dengan anak yatim dan masjid selepas pensiun.&nbsp;<em>Alhamdulillah</em>, pada tanggal 7 Februari tahun 1992, Bapak H. Siswo Oetomo bersama dua rekannya, Bapak Al Hisyam dan Bapak H. Pudjo Seputro, membidani lahirnya lembaga sosial yang kelak pada saatnya berhasil mencetak generasi penerus yang unggul.</div>', NULL, NULL, 'profile', '2025-11-17 12:26:02', '2025-12-09 18:45:38'),
	(2, 1, 'Visi', '<p>xsx</p>', NULL, NULL, 'vision', '2025-11-17 12:31:01', '2025-11-21 15:35:26'),
	(3, 1, 'Misi', NULL, NULL, NULL, 'mission', NULL, NULL),
	(4, 1, 'Struktur Organisasi', NULL, NULL, NULL, 'structure', '2025-11-21 23:51:40', '2025-11-21 23:51:40'),
	(6, 2, 'Visi', NULL, NULL, NULL, 'vision', NULL, NULL),
	(7, 2, 'Misi', NULL, NULL, NULL, 'mission', NULL, NULL),
	(8, 2, 'Struktur Organisasi', NULL, NULL, NULL, 'structure', NULL, NULL),
	(9, 3, 'Visi', '<p>hhhhh</p>', NULL, NULL, 'vision', NULL, '2025-12-15 19:37:13'),
	(10, 3, 'Misi', '<p>kkkk</p>', NULL, NULL, 'mission', NULL, '2025-12-15 19:37:21'),
	(11, 3, 'Struktur Organisasi', NULL, '1765856259.png', NULL, 'structure', NULL, '2025-12-15 19:37:39');

-- membuang struktur untuk table db_2025_web_al_qalam.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('Featured Program','Extracurricular') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int DEFAULT NULL,
  `work_unit_id` int unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs_work_unit_id_foreign` (`work_unit_id`),
  KEY `programs_user_id_foreign` (`user_id`),
  CONSTRAINT `programs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `programs_work_unit_id_foreign` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.programs: ~2 rows (lebih kurang)
INSERT INTO `programs` (`id`, `title`, `cover`, `slug`, `text`, `file`, `category`, `count_view`, `work_unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(3, 'Program Unggulan', '1765859088.jpg', 'program-unggulan', '<p>Program Unggulan tes</p>', NULL, 'Featured Program', NULL, 3, 138, '2025-12-15 20:24:49', '2025-12-15 20:24:49'),
	(4, 'Ekstrakulikuler', '1765859108.jpg', 'ekstrakulikuler', '<p>data&nbsp;Ekstrakulikuler</p>', NULL, 'Featured Program', NULL, 3, 138, '2025-12-15 20:25:09', '2025-12-15 20:25:09');

-- membuang struktur untuk table db_2025_web_al_qalam.program_viewers
CREATE TABLE IF NOT EXISTS `program_viewers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `program_id` int unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `program_viewers_program_id_foreign` (`program_id`),
  CONSTRAINT `program_viewers_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.program_viewers: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.sessions: ~5 rows (lebih kurang)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('2PH98GjVutqdBBwCVE0OGcuXpas3QcRBfkUq92R9', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0M0ZTVHQ2RLZ3lLZTJ2SU1Yajk1bDBQUDBqd2RnN1M2SnVBVFhRRyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvMjAyNS13ZWItYWwtcWFsYW0tMi9wYWdlLW5ld3MiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766976564),
	('ITHBEEEHg6QiLdKSHEzhhtCef4XaRaafImqmfJVj', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXJXR1o2YVlKMmxkd1hMSEZnTjVYRWl2WjlVR0VoejJDcmVWcHA4SCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3QvMjAyNS13ZWItYWwtcWFsYW0tMi9wYWdlLWN1cnJpY3VsdW0iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766378861),
	('mVklZkPPBKU1G2UXNTriJLfH1i8VIrdqJ21txwSW', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjRoTjZISHpkc2pVdXpIWGhsaDRJcXdJa2NPUkNQNWk0dVNhcGJmcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9sb2NhbGhvc3QvMjAyNS13ZWItYWwtcWFsYW0tMi9wYWdlLWZlYXR1cmVkLXByb2dyYW0iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766450071),
	('nQiKlGxyfnomwYDNSvR8TuQwqMTvklgSlxNgblX9', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWGxnRmJSZzJTZlBIcGQ1Vkt3NkE2QWxwaUh1Y2laVXJWWFhzbjFHNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766499646),
	('vkoWCXNcendVrjtN2GCQ1QpsugaVPmo6Owb9vVOd', 138, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoidG43N251SHViNmVaNWVTY05nTVhQSzZ4bnVrYXpTUU9WRzlPeWx4NCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjU0OiJodHRwOi8vbG9jYWxob3N0LzIwMjUtd2ViLWFsLXFhbGFtLTIvcGFnZS1zcG1iLWRldGFpbC9leUpwZGlJNklrMDRSMWRPYm1SekwybENXRE5zZFcxUlFWTlNVMmM5UFNJc0luWmhiSFZsSWpvaWNIZGhkR0pNWkRoU2J6WjFXRFJsVDNob1kwaERaejA5SWl3aWJXRmpJam9pT1RnMFkyVmpaVGRpTkRGalltTmtZbVJtWXpBek9URTFNamcyWkROaU9USTRaalpqWTJOaE9UUXlaVGN3WkRSbVlUSm1ZbUk0WVRJME16UXdPV0k1TnlJc0luUmhaeUk2SWlKOSI7czo1OiJyb3V0ZSI7Tjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM4O30=', 1766145002);

-- membuang struktur untuk table db_2025_web_al_qalam.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `work_unit_id` int unsigned DEFAULT NULL,
  `application_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_application_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_sidebar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_settings_work_units` (`work_unit_id`),
  CONSTRAINT `FK_settings_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.settings: ~6 rows (lebih kurang)
INSERT INTO `settings` (`id`, `work_unit_id`, `application_name`, `short_application_name`, `small_icon`, `large_icon`, `background_login`, `background_sidebar`, `office_name`, `email`, `phone`, `address`, `youtube`, `instagram`, `facebook`, `whatsapp`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Website Yayasan Pendidikan Al-Qalam Kendari', 'Website Yayasan Pendidikan Al-Qalam Kendari', '11764417194.png', '21764428004.png', '31764428049.jpg', NULL, NULL, 'yayasanpendidikanalqalam@gmail.com', '085183377531', 'Kompleks Sekolah Islam Terpadu Al Qalam Kendari, Jl. Asrama H. No.8 A, Wundudopi, Kec. Baruga, Kota Kendari, Sulawesi Tenggara', 'https://www.instagram.com/alqalamkendari?igsh=MWt0YWduampkenQ5ag==', 'https://www.instagram.com/alqalamkendari?igsh=MWt0YWduampkenQ5ag==', 'https://www.facebook.com/share/17nTz2RSEc/', 'https://wa.me/6281245845123', NULL, '2025-12-10 03:32:34'),
	(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kompleks Sekolah Islam Terpadu Al Qalam Kendari, Jl. Asrama H. No.8 A, Wundudopi, Kec. Baruga, Kota Kendari, Sulawesi Tenggara', NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, 'Website TKIT Al-Qalam Kendari', 'Website TKIT Al-Qalam Kendari', '11765116160.png', '21765880958.png', '31765881225.jpg', NULL, NULL, 'yayasanpendidikanalqalam@gmail.com', '085183377531', 'Kompleks Sekolah Islam Terpadu Al Qalam Kendari, Jl. Asrama H. No.8 A, Wundudopi, Kec. Baruga, Kota Kendari, Sulawesi Tenggara', NULL, NULL, NULL, NULL, NULL, '2025-12-16 02:33:45'),
	(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kompleks Sekolah Islam Terpadu Al Qalam Kendari, Jl. Asrama H. No.8 A, Wundudopi, Kec. Baruga, Kota Kendari, Sulawesi Tenggara', NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kompleks Sekolah Islam Terpadu Al Qalam Kendari, Jl. Asrama H. No.8 A, Wundudopi, Kec. Baruga, Kota Kendari, Sulawesi Tenggara', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kompleks Sekolah Islam Terpadu Al Qalam Kendari, Jl. Asrama H. No.8 A, Wundudopi, Kec. Baruga, Kota Kendari, Sulawesi Tenggara', NULL, NULL, NULL, NULL, NULL, NULL);

-- membuang struktur untuk table db_2025_web_al_qalam.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `work_unit_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('Web','SPMB') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sliders_work_units` (`work_unit_id`),
  CONSTRAINT `FK_sliders_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.sliders: ~1 rows (lebih kurang)
INSERT INTO `sliders` (`id`, `work_unit_id`, `title`, `image`, `url`, `url_name`, `category`, `created_at`, `updated_at`) VALUES
	(3, 1, NULL, '1764493160.jpg', NULL, NULL, 'Web', '2025-11-17 03:58:01', '2025-12-11 17:31:48'),
	(14, 3, NULL, '1765939417.jpg', 'asassa', 'Daftar Disini !!!', 'Web', '2025-12-15 19:28:01', '2025-12-16 18:45:06');

-- membuang struktur untuk table db_2025_web_al_qalam.socials
CREATE TABLE IF NOT EXISTS `socials` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `socials_user_id_foreign` (`user_id`),
  CONSTRAINT `socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.socials: ~0 rows (lebih kurang)
INSERT INTO `socials` (`id`, `title`, `cover`, `slug`, `text`, `file`, `count_view`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'xxxx hghg', '1765075183.jpg', 'xxxx-hghg', '<p>xsaxsaxsax</p>\r\n\r\n<p><img alt="" src="http://localhost/2025-web-al-qalam/storage/social_image/9d2a8c2bb47556d300abd8047b0b3b81_1765075168.jpg" /></p>', NULL, NULL, 1, '2025-12-06 18:39:45', '2025-12-06 18:41:00');

-- membuang struktur untuk table db_2025_web_al_qalam.social_viewers
CREATE TABLE IF NOT EXISTS `social_viewers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `social_id` int unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_viewers_social_id_foreign` (`social_id`),
  CONSTRAINT `social_viewers_social_id_foreign` FOREIGN KEY (`social_id`) REFERENCES `socials` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.social_viewers: ~0 rows (lebih kurang)

-- membuang struktur untuk table db_2025_web_al_qalam.structures
CREATE TABLE IF NOT EXISTS `structures` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` enum('Dewan Pembina','Dewan Pengawas','Pengurus Yayasan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.structures: ~2 rows (lebih kurang)
INSERT INTO `structures` (`id`, `category`, `name`, `position`, `desc`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'Dewan Pembina', 'Dr. H. Wiranto, M.Kom., M.Cs.', 'Ketua Dewan', '<p>Lahir di kendari</p>', '1765588065.jpeg', '2025-12-12 15:38:30', '2025-12-12 17:07:46'),
	(2, 'Dewan Pengawas', 'Prof. H. Sukarmin, S.Pd., M.Si., Ph.D.', 'Ketua Dewan', '<p>sasasa</p>', NULL, '2025-12-12 15:48:06', '2025-12-12 15:48:06'),
	(3, 'Pengurus Yayasan', 'H. Heri Sucitro, S.Pd.', 'Ketua', '<p>Ketua&nbsp;KetuaKetuaKetuaKetua</p>', NULL, '2025-12-12 15:48:27', '2025-12-12 15:48:27');

-- membuang struktur untuk table db_2025_web_al_qalam.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int unsigned DEFAULT NULL,
  `work_unit_id` int unsigned DEFAULT NULL,
  `status` enum('Active','Non Active') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_groups` (`group_id`),
  KEY `FK_users_work_units` (`work_unit_id`),
  CONSTRAINT `FK_users_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_users_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.users: ~1 rows (lebih kurang)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `photo`, `group_id`, `work_unit_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'administrator@gmail.com', NULL, '$2y$12$T2z.FxC2OepdmLn8ZYRW7ehhVmufBC.I07zogqgXnqujpk9KcU1o2', NULL, NULL, 1, 1, 'Active', '2025-10-30 18:37:58', '2025-10-30 18:37:58'),
	(138, 'admin_tkit', 'admin_tkit@gmail.com', NULL, '$2y$12$SpTN8xjKpkRs0qWhj28AnOq4HlRs3F4FdPp0I5.2Wi8IWbir5j.3K', NULL, NULL, 1, 3, 'Active', '2025-12-07 05:47:01', '2025-12-07 05:47:01');

-- membuang struktur untuk table db_2025_web_al_qalam.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `work_unit_id` int unsigned DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_videos_work_units` (`work_unit_id`),
  CONSTRAINT `FK_videos_work_units` FOREIGN KEY (`work_unit_id`) REFERENCES `work_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.videos: ~0 rows (lebih kurang)
INSERT INTO `videos` (`id`, `work_unit_id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 1, 'https://www.youtube.com/watch?v=-333hbxHu5Q', '2025-12-10 03:03:13', '2025-12-10 03:03:13'),
	(2, 3, 'https://www.youtube.com/watch?v=EOCv3V3S_Fk', '2025-12-15 20:30:59', '2025-12-15 20:30:59'),
	(3, 3, 'https://www.youtube.com/watch?v=cghK9lqjlfo', '2025-12-16 18:21:47', '2025-12-16 18:21:47');

-- membuang struktur untuk table db_2025_web_al_qalam.work_units
CREATE TABLE IF NOT EXISTS `work_units` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spmb_status` enum('C','O','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `spmb_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spmb_requirement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_2025_web_al_qalam.work_units: ~6 rows (lebih kurang)
INSERT INTO `work_units` (`id`, `name`, `web_url`, `theme_color`, `spmb_status`, `spmb_url`, `spmb_requirement`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'YAYASAN AL QALAM KENDARI', 'https://yayasanpendidikanalqalamkendari.com/', '#ffae00', 'N', NULL, NULL, '1764421468.png', '2025-11-29 05:04:21', '2025-12-10 17:46:12'),
	(2, 'USQ AL QALAM KENDARI', 'https://usq.yayasanpendidikanalqalamkendari.com/', '#b562c6', 'N', '#b562c6', NULL, NULL, '2025-11-29 05:11:05', '2025-12-10 17:47:05'),
	(3, 'TKSIT AL QALAM KENDARI', 'https://tksit.yayasanpendidikanalqalamkendari.com/', '#6071a4', 'O', '#3cc700', '<p><strong>Persyaratan Pendaftaran SPMB</strong><br />\r\n1. asasas<br />\r\n2. hsahsahjsa dsdsds</p>', '1764420917.png', '2025-11-29 04:41:07', '2025-12-10 17:47:20'),
	(4, 'SDSIT AL QALAM KENDARI', 'https://sdsit.yayasanpendidikanalqalamkendari.com/', '#e70404', 'C', '#e70404', NULL, '1764421045.png', '2025-11-29 04:41:27', '2025-12-10 17:47:36'),
	(5, 'SMPIT AL QALAM KENDARI', 'https://smpit.yayasanpendidikanalqalamkendari.com/', '#1f2cdb', 'C', '#1f2cdb', NULL, '1764421053.png', '2025-11-29 04:42:02', '2025-12-10 17:47:44'),
	(6, 'SMAIT AL QALAM KENDARI', 'https://smait.yayasanpendidikanalqalamkendari.com/', '#6071a4', 'C', '#6071a4', NULL, '1764421061.png', '2025-11-29 04:55:08', '2025-12-10 17:47:53');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
