-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2025 at 02:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healarnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com|127.0.0.1', 'i:1;', 1758777619),
('admin@gmail.com|127.0.0.1:timer', 'i:1758777619;', 1758777619),
('asmat6894@gamil.com|127.0.0.1', 'i:1;', 1758770583),
('asmat6894@gamil.com|127.0.0.1:timer', 'i:1758770583;', 1758770583);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_25_064102_create_personal_access_tokens_table', 2),
(6, '2025_09_25_064234_add_is_admin_to_users_table', 3),
(7, '2025_09_26_123442_create_practitioners_table', 4),
(8, '2025_09_27_064849_create_appointments_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '3e000482da84ee2544cddd18b6fc9cb82bbd720f19208cf46153898917721a44', '[\"*\"]', NULL, NULL, '2025-09-25 02:50:00', '2025-09-25 02:50:00'),
(2, 'App\\Models\\User', 1, 'auth_token', 'f24bf7d64f4969d5caa0616d58a9d3a2f21fd17082d7c26d250f53a85b823ce7', '[\"*\"]', NULL, NULL, '2025-09-25 02:50:58', '2025-09-25 02:50:58'),
(9, 'App\\Models\\User', 4, 'auth_token', '4a0d8d8018d2fe8896d27d4a0d86135352c71c3bf52c435c170669ae7816ac01', '[\"*\"]', NULL, NULL, '2025-09-26 05:16:43', '2025-09-26 05:16:43'),
(10, 'App\\Models\\User', 5, 'auth_token', '018bd0a7fd815efd1df12f11c8213ce370b6c4646db7be4051803133517b7e4f', '[\"*\"]', NULL, NULL, '2025-09-26 06:36:03', '2025-09-26 06:36:03'),
(11, 'App\\Models\\User', 5, 'auth_token', '714bf256522f9a73d578ca5a593069d53b426ef5f7ee95f91d43ea7758d88693', '[\"*\"]', '2025-09-26 07:06:43', NULL, '2025-09-26 07:05:37', '2025-09-26 07:06:43'),
(12, 'App\\Models\\User', 5, 'auth_token', '304f450dd130ac03c4dd1309458a283935fc774e18476094d61a203e0cb8e291', '[\"*\"]', '2025-09-26 07:07:45', NULL, '2025-09-26 07:07:44', '2025-09-26 07:07:45'),
(13, 'App\\Models\\User', 5, 'auth_token', 'f1a5fd8a154da054d8e81c84fa3f7796c5c6ff4bc5bba67533fed785e1d5c9e6', '[\"*\"]', '2025-09-26 07:08:36', NULL, '2025-09-26 07:08:35', '2025-09-26 07:08:36'),
(14, 'App\\Models\\User', 5, 'auth_token', 'a95712178c93ffc6a1010a878757ca7f9db7f90c093a6fcb047e390770f6dce5', '[\"*\"]', '2025-09-26 07:11:03', NULL, '2025-09-26 07:09:23', '2025-09-26 07:11:03'),
(15, 'App\\Models\\User', 5, 'auth_token', '503df2965814c4038cf9c2ad4e579162edfd198d750f574e2b8236b0171ae85d', '[\"*\"]', '2025-09-26 07:11:57', NULL, '2025-09-26 07:11:56', '2025-09-26 07:11:57'),
(16, 'App\\Models\\User', 5, 'auth_token', 'ed572ecb63e1d8755aa0b066737905d68eeafe1f155245117af63f3c5cb0032e', '[\"*\"]', '2025-09-26 07:13:33', NULL, '2025-09-26 07:12:38', '2025-09-26 07:13:33'),
(17, 'App\\Models\\User', 5, 'auth_token', '7e398100331b7d5abd0aeb40f13c5ebcb5b1ed01a9c3e9a5897cfc2099150d52', '[\"*\"]', '2025-09-26 07:13:46', NULL, '2025-09-26 07:13:46', '2025-09-26 07:13:46'),
(18, 'App\\Models\\User', 5, 'auth_token', 'a9ec3175c4bec5f01a4c3c0b6fcd486d2334e0b6a9ef5f1d787d2c21749ffe54', '[\"*\"]', '2025-09-26 07:14:42', NULL, '2025-09-26 07:14:42', '2025-09-26 07:14:42'),
(20, 'App\\Models\\User', 5, 'auth_token', '10b899a2da727c2530253ca72863856ced33e5227cd122e84f570b592e448433', '[\"*\"]', '2025-09-26 07:15:26', NULL, '2025-09-26 07:15:26', '2025-09-26 07:15:26'),
(21, 'App\\Models\\User', 6, 'auth_token', '0f8be5bfbee706f63db99a590d288eca92695d5d0bfa868d33fc4851dc83adba', '[\"*\"]', '2025-09-26 07:16:48', NULL, '2025-09-26 07:16:48', '2025-09-26 07:16:48'),
(22, 'App\\Models\\User', 6, 'auth_token', '1cf1ca47258c7708b4642feca97d1c96d1f57d5cdf5ee4a92c2908d4bf58b22b', '[\"*\"]', '2025-09-26 07:17:30', NULL, '2025-09-26 07:17:30', '2025-09-26 07:17:30'),
(23, 'App\\Models\\User', 6, 'auth_token', 'cbdbcbc8e31eacd8ad28676c20744ca958ee277e1e500e8c2dcd20c9fd62da9b', '[\"*\"]', '2025-09-26 07:19:07', NULL, '2025-09-26 07:19:07', '2025-09-26 07:19:07'),
(24, 'App\\Models\\User', 6, 'auth_token', 'e91643cabbe8afc280397181bf466b0e61bc2dee59580640e25f9be2699f8dbc', '[\"*\"]', '2025-09-26 07:22:24', NULL, '2025-09-26 07:22:24', '2025-09-26 07:22:24'),
(25, 'App\\Models\\User', 6, 'auth_token', 'acd02c0a60706baf467dcaef991425f70c97396459584fcf8819ba70bf151190', '[\"*\"]', '2025-09-26 07:23:36', NULL, '2025-09-26 07:23:35', '2025-09-26 07:23:36'),
(26, 'App\\Models\\User', 5, 'auth_token', 'bb51d85df0e4e4b19a75b52791784b8f38917dba9a2b493ec00f1e5b57dfef7e', '[\"*\"]', '2025-09-26 07:26:39', NULL, '2025-09-26 07:26:32', '2025-09-26 07:26:39'),
(27, 'App\\Models\\User', 5, 'auth_token', 'bb804bcc12ea0b5276d0f897cc6c76a0f8b00b0af21b451829d8da3bfa268d30', '[\"*\"]', '2025-09-26 07:27:03', NULL, '2025-09-26 07:26:57', '2025-09-26 07:27:03'),
(29, 'App\\Models\\User', 5, 'auth_token', '6fe13d14c73e5c57532804c57b0e2437594d589bcc8989e002c0887595b45131', '[\"*\"]', '2025-09-26 07:31:01', NULL, '2025-09-26 07:30:56', '2025-09-26 07:31:01'),
(30, 'App\\Models\\User', 5, 'auth_token', 'd80dc0addc49c933d86ef3fe21ad5c7530db1a179f3857269ed54e7344b8d6e3', '[\"*\"]', '2025-09-26 07:31:29', NULL, '2025-09-26 07:31:29', '2025-09-26 07:31:29'),
(33, 'App\\Models\\User', 10, 'auth_token', '816753a08142f8f90158aebc9cd899d024489055e675fd4390acefdd9785c25e', '[\"*\"]', NULL, NULL, '2025-09-26 08:28:56', '2025-09-26 08:28:56'),
(34, 'App\\Models\\User', 10, 'auth_token', '8b5a63de66af5fd810beb95e1f0d35a75089fcfc31c005ec12b0b62f106900a8', '[\"*\"]', '2025-09-26 08:35:50', NULL, '2025-09-26 08:35:43', '2025-09-26 08:35:50'),
(35, 'App\\Models\\User', 10, 'auth_token', '81aa58a1a2f689105880824da7c7ba21c4e6d80a569739ee359ad1a9c89f5460', '[\"*\"]', '2025-09-26 08:42:08', NULL, '2025-09-26 08:36:42', '2025-09-26 08:42:08'),
(36, 'App\\Models\\User', 10, 'auth_token', '9ee32b3bb0f8e269110ea97707646fb2d6ed59ac8262c70bfcbd7ac5aeb93aea', '[\"*\"]', '2025-09-26 08:42:29', NULL, '2025-09-26 08:42:28', '2025-09-26 08:42:29'),
(37, 'App\\Models\\User', 10, 'auth_token', 'c5f4b6da0cb2607f5b738f0fca2b1413f15d66f4f4099ea93a7ac77e6d7b9d57', '[\"*\"]', '2025-09-26 12:26:48', NULL, '2025-09-26 12:26:46', '2025-09-26 12:26:48'),
(38, 'App\\Models\\User', 10, 'auth_token', 'ad5c9a61be9523e959ed24e22b741d8b416755202a4fc353872d8f30351994d1', '[\"*\"]', '2025-09-26 12:33:37', NULL, '2025-09-26 12:28:53', '2025-09-26 12:33:37'),
(39, 'App\\Models\\User', 10, 'auth_token', 'b8d4acd87211900e780e4ac414e5ab2d169f889bf8bf29842fdbcc32405d2354', '[\"*\"]', '2025-09-26 12:39:55', NULL, '2025-09-26 12:33:52', '2025-09-26 12:39:55'),
(42, 'App\\Models\\User', 10, 'auth_token', '8714eadb3b145a793287d3527592c06273c3812f8c8300cc9d9bcedc074fa8aa', '[\"*\"]', '2025-09-27 08:21:49', NULL, '2025-09-27 07:13:32', '2025-09-27 08:21:49'),
(43, 'App\\Models\\User', 12, 'auth_token', '23c6b1714524448f441733f362a963f44f58ef1cfaf58df35f54a34cf6428982', '[\"*\"]', NULL, NULL, '2025-09-27 08:26:11', '2025-09-27 08:26:11'),
(45, 'App\\Models\\User', 12, 'auth_token', '1847fdae6cc3598f42535be857c0c69223c9c2c031b713ffcda8c240160cd826', '[\"*\"]', '2025-09-27 08:29:17', NULL, '2025-09-27 08:28:39', '2025-09-27 08:29:17'),
(47, 'App\\Models\\User', 12, 'auth_token', '4962386e0c49e6c9dc921bc3a9997ae96d722e2a8094082700e35bfba1781e1b', '[\"*\"]', '2025-09-27 08:31:13', NULL, '2025-09-27 08:30:45', '2025-09-27 08:31:13'),
(48, 'App\\Models\\User', 12, 'auth_token', '82b5fd0ece2dc7326a9cf397f13c3b8369fd3e7a2cecd2f56c0abef7fda2d2c9', '[\"*\"]', '2025-09-27 08:31:48', NULL, '2025-09-27 08:31:27', '2025-09-27 08:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `practitioners`
--

CREATE TABLE `practitioners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `primary_contact_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `social_media_handle` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `modalities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`modalities`)),
  `practice_location` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `practicing_since` varchar(255) DEFAULT NULL,
  `clients_per_month` int(11) NOT NULL DEFAULT 0,
  `free_trial_sessions` int(11) NOT NULL DEFAULT 0,
  `happy_to_provide_free_session` tinyint(1) NOT NULL DEFAULT 0,
  `referred_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `practitioners`
--

INSERT INTO `practitioners` (`id`, `user_id`, `primary_contact_number`, `mobile_number`, `address`, `social_media_handle`, `website`, `modalities`, `practice_location`, `about`, `practicing_since`, `clients_per_month`, `free_trial_sessions`, `happy_to_provide_free_session`, `referred_by`, `created_at`, `updated_at`) VALUES
(3, '12', '229282828822', '229282828822', 'Barama', 'test', NULL, '[\"Akashic Therapy\",\"Access Bars\"]', 'Mingora', 'Testing', '1-5', 2, 0, 0, NULL, '2025-09-27 08:24:32', '2025-09-27 08:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CTsQ7TSCP33LiltXNyowfSe6xYP0MEO8do7RTAJp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3c1SWtiOExEYk1ocjZrTU5NUVhpQXZ5U0d1VjZMdG5EenFveGhWSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758980915),
('TWJwCxA8bvRLcjm4GE3ZjoP7881jDuE7B3yHLiH0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUMyS1NPQ3JDVHQ3bVFqdjNIVUpGZFJUT1hZMTVBOVZhWmZLOWhBeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758981558),
('US5NApdEQT6qTNDUEaUz6i85zOkoGMAuoj4dT7K4', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzg4YzZKcll4YUxzc1pSVXczeFZwVzUwNnQ0WnF3WEZ5aTRhSWJRMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hc3NldC9mYXZpY29uLnBuZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO30=', 1758982287);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT '2',
  `last_name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `last_name`, `number`, `image`) VALUES
(11, 'Super', 'superadmin@gmail.com', NULL, '$2y$12$Sx0qBWDuhHwo8yHEzmEN/urJusfhdqTjf1Xt6UFC5qKBZxJTIAU3a', NULL, '2025-09-27 01:57:04', '2025-09-27 01:57:14', '1', 'admin', '229282828822', 'profiles/zpHJNeWXEzLwQImxCnSX2zkTMHldr0ZAfzhmcZau.png'),
(12, 'Asmat', 'doctor@gmail.com', NULL, '$2y$12$IeP.pOYDpVJ7blw7xtQfG.SRC/UOk/JgjkbpdcQbjRCgBcXU4r1bm', NULL, '2025-09-27 08:24:32', '2025-09-27 08:24:32', '3', 'Ali', '229282828822', NULL),
(13, 'user', 'user@gmail.com', NULL, '$2y$12$B4g9jtcjAndTUiFhkTRU6ONtS7A.M3qvXeciFmofWrP6h4q5VXRSe', NULL, '2025-09-27 08:27:59', '2025-09-27 08:28:14', '2', 'Test', '229282828822', 'profiles/OCMsuu0LHPmWmDarhmumdNOnhT4iKvgonrNknvWV.png'),
(14, 'User', 'user1@gmail.com', NULL, '$2y$12$lyQjyvugRjS6V/lQA3EBh.GWqZLJefbflKinFYkAZJ0Gw9pI1sCt2', NULL, '2025-09-27 08:42:44', '2025-09-27 08:51:38', '2', 'First', '229282828822', 'profiles/0kywI1yqH7TvI8kbozF0kuViSpf4XMKI8cGYxUGZ.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `practitioners`
--
ALTER TABLE `practitioners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `practitioners`
--
ALTER TABLE `practitioners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
