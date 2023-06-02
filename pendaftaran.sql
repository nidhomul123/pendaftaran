-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pendaftaran
CREATE DATABASE IF NOT EXISTS `pendaftaran` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `pendaftaran`;

-- Dumping structure for table pendaftaran.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pendaftaran.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.migrations: ~5 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_05_30_094125_create_permission_tables', 1);

-- Dumping structure for table pendaftaran.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table pendaftaran.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.model_has_roles: ~0 rows (approximately)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);

-- Dumping structure for table pendaftaran.mstr_krida_saka_milenial
CREATE TABLE IF NOT EXISTS `mstr_krida_saka_milenial` (
  `id` int(11) NOT NULL,
  `krida_saka_milenial` varchar(255) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pendaftaran.mstr_krida_saka_milenial: ~5 rows (approximately)
REPLACE INTO `mstr_krida_saka_milenial` (`id`, `krida_saka_milenial`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	(1, 'Krida Literasi Digital dan Internet', b'0', 'system', '2023-05-31 15:23:34', NULL, NULL),
	(2, 'Krida Animasi dan Multimedia', b'0', 'system', '2023-05-31 15:23:34', NULL, NULL),
	(3, 'Krida Inovasi Perangkat Lunak', b'0', 'system', '2023-05-31 15:23:34', NULL, NULL),
	(4, 'Krida Telemetri dan Robotika', b'0', 'system', '2023-05-31 15:23:34', NULL, NULL),
	(5, 'Krida Teknologi Jaringan dan Big Data', b'0', 'system', '2023-05-31 15:23:34', NULL, NULL);

-- Dumping structure for table pendaftaran.mstr_kwarran
CREATE TABLE IF NOT EXISTS `mstr_kwarran` (
  `id` int(11) NOT NULL,
  `kwarran` varchar(255) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pendaftaran.mstr_kwarran: ~4 rows (approximately)
REPLACE INTO `mstr_kwarran` (`id`, `kwarran`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	(1, 'PEKALONGAN BARAT', b'0', 'system', '2023-05-31 15:17:14', NULL, NULL),
	(2, 'PEKALONGAN TIMUR', b'0', 'system', '2023-05-31 15:17:14', NULL, NULL),
	(3, 'PEKALONGAN SELATAN', b'0', 'system', '2023-05-31 15:17:14', NULL, NULL),
	(4, 'PEKALONGAN UTARA', b'0', 'system', '2023-05-31 15:17:14', NULL, NULL);

-- Dumping structure for table pendaftaran.mstr_scout_level
CREATE TABLE IF NOT EXISTS `mstr_scout_level` (
  `id` int(11) NOT NULL,
  `scout_level` varchar(255) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pendaftaran.mstr_scout_level: ~7 rows (approximately)
REPLACE INTO `mstr_scout_level` (`id`, `scout_level`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	(1, 'Penegak', b'0', 'system', '2023-05-31 15:19:55', NULL, NULL),
	(2, 'Penegak Bantara', b'0', 'system', '2023-05-31 15:19:55', NULL, NULL),
	(3, 'Penegak Laksana', b'0', 'system', '2023-05-31 15:19:55', NULL, NULL),
	(4, 'Penegak Garuda', b'0', 'system', '2023-05-31 15:19:55', NULL, NULL),
	(5, 'Pandega', b'0', 'system', '2023-05-31 15:19:55', NULL, NULL),
	(6, 'Pandega Garuda', b'0', 'system', '2023-05-31 15:19:55', NULL, NULL),
	(7, 'Partisipan', b'0', 'system', '2023-05-31 15:19:55', NULL, NULL);

-- Dumping structure for table pendaftaran.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pendaftaran.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.permissions: ~0 rows (approximately)

-- Dumping structure for table pendaftaran.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table pendaftaran.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.roles: ~0 rows (approximately)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2023-05-30 12:32:10', NULL);

-- Dumping structure for table pendaftaran.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.role_has_permissions: ~0 rows (approximately)

-- Dumping structure for table pendaftaran.tr_participants
CREATE TABLE IF NOT EXISTS `tr_participants` (
  `id` char(36) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` bit(1) NOT NULL COMMENT '1=Laki-laki, 0=Perempuan',
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `pangkalan_gudep` varchar(255) NOT NULL,
  `kwarran_id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nta_pramuka_nis_nim` varchar(255) NOT NULL,
  `scout_level_id` int(11) NOT NULL,
  `krida_saka_milenial_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `kk_original_filename` varchar(255) NOT NULL,
  `kk_filename` varchar(255) NOT NULL,
  `ktp_original_filename` varchar(255) NOT NULL,
  `ktp_filename` varchar(255) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `kwarran_id` (`kwarran_id`),
  KEY `scout_level_id` (`scout_level_id`),
  KEY `krida_saka_milenial_id` (`krida_saka_milenial_id`),
  CONSTRAINT `FK_tr_participants_mstr_krida_saka_milenial` FOREIGN KEY (`krida_saka_milenial_id`) REFERENCES `mstr_krida_saka_milenial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tr_participants_mstr_kwarran` FOREIGN KEY (`kwarran_id`) REFERENCES `mstr_kwarran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tr_participants_mstr_scout_level` FOREIGN KEY (`scout_level_id`) REFERENCES `mstr_scout_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pendaftaran.tr_participants: ~3 rows (approximately)
REPLACE INTO `tr_participants` (`id`, `full_name`, `email`, `gender`, `birth_place`, `birth_date`, `pangkalan_gudep`, `kwarran_id`, `nik`, `nta_pramuka_nis_nim`, `scout_level_id`, `krida_saka_milenial_id`, `address`, `phone_number`, `twitter`, `instagram`, `facebook`, `tiktok`, `kk_original_filename`, `kk_filename`, `ktp_original_filename`, `ktp_filename`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	('0e1868e0-04e5-49d9-8a0e-80140ee7ea59', 'Andri 1', 'andri1@gmail.com', b'1', 'Roma', '2023-06-02', 'Test 2', 3, '12345678', 'test', 6, 4, 'Yogyakarta', '081246872133', NULL, NULL, NULL, NULL, 'cover 3.png', '20230602065005_kk_cover 3.png', 'ktp 1.jpg', '20230602065005_ktp_ktp 1.jpg', 'registration_form', '2023-06-02 06:50:05', NULL, NULL),
	('59a03987-fa0d-425b-a449-3a7dfd21aa25', 'Andri 2', 'andri2@gmail.com', b'1', 'Yogyakarta', '2023-05-30', 'Test 3', 4, NULL, 'test', 4, 5, 'Yogyakarta', '081246872133', NULL, NULL, NULL, NULL, 'cover 3.png', '20230602065804_kk_cover 3.png', 'ktp 1.jpg', '20230602065804_ktp_ktp 1.jpg', 'registration_form', '2023-06-02 06:58:04', NULL, NULL),
	('81972fee-e106-49ea-bef6-445851473b1c', 'Andri Fanky Kurniawan', 'andrifanky@gmail.com', b'1', 'Milan', '2023-06-02', 'Test', 1, NULL, 'test', 1, 1, 'Yogyakarta', '081246872133', NULL, NULL, NULL, NULL, 'cover 3.png', '20230601200602_kk_cover 3.png', 'ktp 1.jpg', '20230601200603_ktp_ktp 1.jpg', 'registration_form', '2023-06-01 20:06:03', 'andrifanky@gmail.com', '2023-06-02 16:15:48');

-- Dumping structure for table pendaftaran.tr_participants_registration_status
CREATE TABLE IF NOT EXISTS `tr_participants_registration_status` (
  `id` char(36) NOT NULL,
  `participant_id` char(36) NOT NULL,
  `status` bit(1) NOT NULL COMMENT '1=Diterima, 0=Ditolak',
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `participant_id` (`participant_id`),
  CONSTRAINT `FK_tr_participants_registration_status_tr_participants` FOREIGN KEY (`participant_id`) REFERENCES `tr_participants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pendaftaran.tr_participants_registration_status: ~2 rows (approximately)
REPLACE INTO `tr_participants_registration_status` (`id`, `participant_id`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	('7e4dfd06-25ce-43be-98f9-cde9392d2c72', '0e1868e0-04e5-49d9-8a0e-80140ee7ea59', b'0', 'admin@gmail.com', '2023-06-02 06:50:25', NULL, NULL),
	('e5d3ceaf-d900-43f5-b72a-17568887d11e', '81972fee-e106-49ea-bef6-445851473b1c', b'1', 'admin@gmail.com', '2023-06-02 06:33:42', NULL, NULL);

-- Dumping structure for table pendaftaran.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `participant_id` (`participant_id`),
  CONSTRAINT `FK_users_tr_participants` FOREIGN KEY (`participant_id`) REFERENCES `tr_participants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran.users: ~4 rows (approximately)
REPLACE INTO `users` (`id`, `participant_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Admin 1', 'admin@gmail.com', NULL, '$2y$10$pkzs3n53TT5vgGLeltfOl.lyO/Qf2VuNc9ApywxWDuM0wCuAUfLTa', NULL, '2023-05-30 12:33:42', '2023-06-02 09:06:45'),
	(3, '81972fee-e106-49ea-bef6-445851473b1c', 'Andri Fanky Kurniawan', 'andrifanky@gmail.com', NULL, '$2y$10$/9srqNbXSF0yg3BAlswZgucjQP7vGFdUevFtt629JhBQEBH8HFIEK', NULL, '2023-06-01 13:06:03', '2023-06-02 09:15:48'),
	(4, '0e1868e0-04e5-49d9-8a0e-80140ee7ea59', 'Andri 1', 'andri1@gmail.com', NULL, '$2y$10$3HwbONzmejugKAxzza2rq.ZrjRWo7ToRV08RyP9TyE/LT1UJQVQIq', NULL, '2023-06-01 23:50:05', '2023-06-01 23:50:05'),
	(5, '59a03987-fa0d-425b-a449-3a7dfd21aa25', 'Andri 2', 'andri2@gmail.com', NULL, '$2y$10$qNvhPaDikE.0DQ9f1rfoju.I/6jQ.8PMjvv6sWDppZGBFi6rxTF32', NULL, '2023-06-01 23:58:04', '2023-06-01 23:58:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
