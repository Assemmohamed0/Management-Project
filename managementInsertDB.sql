-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for usermanagement
CREATE DATABASE IF NOT EXISTS `usermanagement` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `usermanagement`;

-- Dumping structure for table usermanagement.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table usermanagement.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table usermanagement.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table usermanagement.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2014_10_12_100000_create_password_resets_table', 1),
	(7, '2019_08_19_000000_create_failed_jobs_table', 1),
	(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(9, '2022_08_15_183358_create_roles_table', 1),
	(10, '2014_10_12_000000_create_users_table', 2),
	(11, '2022_08_16_062305_add_permissions_to_roles_table', 3),
	(12, '2022_08_16_062838_add_timestamps_to_roles_table', 4),
	(13, '2022_08_16_065710_create_movies_table', 5);

-- Dumping structure for table usermanagement.movies
CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table usermanagement.movies: ~4 rows (approximately)
INSERT INTO `movies` (`id`, `name`, `type`, `rating`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Venom', 'Action', 6.60, 'Investigative journalist Eddie Brock attempts a comeback following a scandal, but accidentally becomes the host of Venom, a violent, super powerful alien symbiote. Soon, he must rely on his newfound powers to protect the world from a shadowy organization looking for a symbiote of their own.', '2022-08-16 05:46:10', '2022-08-16 22:01:02'),
	(4, 'Thor: Love and Thunder', 'Action', 6.77, 'After his retirement is interrupted by Gorr the God Butcher, a galactic killer who seeks the extinction of the gods, Thor enlists the help of King Valkyrie, Korg, and ex-girlfriend Jane Foster, who now inexplicably wields Mjolnir as the Mighty Thor. Together they embark upon a harrowing cosmic adventure to uncover the mystery of the God Butcher’s vengeance and stop him before it’s too late.', '2022-08-16 21:56:58', '2022-08-16 21:56:58'),
	(5, 'Avengers Endgame', 'Action', 8.40, 'After the devastating events of Avengers: Infinity War, the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos\' actions and restore order to the universe once and for all, no matter what consequences may be in store.', '2022-08-16 21:59:18', '2022-08-16 21:59:18'),
	(6, 'John Wick 4', 'Action', 7.40, 'John Wick (Keanu Reeves) takes on his most lethal adversaries yet in the upcoming fourth installment of the series. With the price on his head ever increasing, Wick takes his fight against the High Table global as he seeks out the most powerful players in the underworld.', '2022-08-16 22:02:16', '2022-08-16 22:02:16');

-- Dumping structure for table usermanagement.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table usermanagement.password_resets: ~0 rows (approximately)
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('ahmedabosalah380@gmail.com', '$2y$10$QiPD.RVA/jPWTVRan4lZB.ChdVww7Go93RXdV2sD0je7qQzXvU/3m', '2022-08-16 17:27:32');

-- Dumping structure for table usermanagement.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table usermanagement.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table usermanagement.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table usermanagement.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
	(1, 'User', 'movie-list', '2022-08-16 06:34:04', '2022-08-16 21:40:17'),
	(2, 'Admin', 'user-list,user-create,user-edit,user-delete,movie-list,movie-create,movie-edit,movie-delete', '2022-08-16 06:34:05', '2022-08-16 04:34:26'),
	(3, 'Super Admin', 'user-list,user-create,user-edit,user-delete,role-list,role-create,role-edit,role-delete,movie-list,movie-create,movie-edit,movie-delete', '2022-08-16 04:39:50', '2022-08-16 04:39:50');

-- Dumping structure for table usermanagement.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `roles_id` bigint(20) unsigned DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_roles_id_foreign` (`roles_id`),
  CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table usermanagement.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles_id`) VALUES
	(1, 'Assem Mohamed Ahmed Samy', 'aseemmohamed045@gmail.com', NULL, '$2y$10$48NtshiaopJ1RwafqpSeu.PEZVLWwC4IzSz5g2.EqBMQpJt0vNn7K', NULL, '2022-08-16 19:21:11', '2022-08-16 17:29:25', 3),
	(2, 'Ahmed Salah Mohammed Mohammed', 'ahmedabosalah380@gmail.com', NULL, '$2y$10$NzH3jG1xCKuQzp2LYQk1Gu6kqIMuJ6Tg2G5n2fpyQ3KqQkz2uLaDq', NULL, '2022-08-16 19:24:10', '2022-08-16 17:29:49', 3),
	(18, 'Admin', 'admin@admin.com', NULL, '$2y$10$kMnCRlcaIuPsTfemy6PZ5e3BX0LyLOOJlfwaCbBWmA7vlqLwjrCTO', NULL, '2022-08-16 16:45:21', '2022-08-16 22:18:49', 2),
	(25, 'User', 'user@user.com', NULL, '$2y$10$C36qn9HeFDYSnree3kX7AufgZoWT8w9VuBunEd/Q7F/YfESWH6rDy', NULL, '2022-08-16 17:48:24', '2022-08-16 22:03:43', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
