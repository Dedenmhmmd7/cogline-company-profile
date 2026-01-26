-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2026 at 02:38 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cogline-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` enum('new','contacted','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `contacted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `name`, `phone`, `address`, `email`, `room_count`, `message`, `status`, `admin_notes`, `contacted_at`, `created_at`, `updated_at`) VALUES
(1, 'Figarland Garling', '089670307602', 'Marijoa', 'kinkgarling@gmail.com', '200+', 'Siapkan pelayanan yang mewah', 'closed', NULL, '2026-01-08 02:28:19', '2026-01-08 02:25:40', '2026-01-08 06:41:21');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_06_014025_create_pricing_packages', 1),
(5, '2026_01_06_014050_create_pricing_features', 1),
(6, '2026_01_06_014106_create_testimonials', 1),
(7, '2026_01_06_014300_create_pricingpackages_table', 1),
(8, '2026_01_06_014424_create_pricingfeatures_table', 1),
(9, '2026_01_07_033731_create_contact_submissions', 1);

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
-- Table structure for table `pricing_features`
--

CREATE TABLE `pricing_features` (
  `id` bigint UNSIGNED NOT NULL,
  `pricing_package_id` bigint UNSIGNED NOT NULL,
  `feature_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_included` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_features`
--

INSERT INTO `pricing_features` (`id`, `pricing_package_id`, `feature_text`, `is_included`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '50+ TV Channels', 1, 1, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(2, 1, 'Basic VOD (500+ titles)', 1, 2, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(3, 1, 'Hotel Information', 1, 3, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(4, 1, 'HD Streaming', 1, 4, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(5, 1, 'Email Support', 1, 5, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(6, 1, 'Interactive Services', 1, 6, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(7, 1, 'Mobile Casting', 1, 7, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(8, 2, '150+ TV Channels', 1, 1, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(9, 2, 'Premium VOD (2000+ titles)', 1, 2, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(10, 2, 'Hotel Information', 1, 3, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(11, 2, '4K Streaming', 1, 4, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(12, 2, 'Interactive Services', 1, 5, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(13, 2, 'Mobile Casting', 1, 6, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(14, 2, 'Priority Support', 1, 7, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(15, 2, 'Analytics Dashboard', 1, 8, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(16, 3, 'Unlimited Channels', 1, 1, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(17, 3, 'Custom Content Library', 1, 2, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(18, 3, 'Full Customization', 1, 3, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(19, 3, '4K/8K Streaming', 1, 4, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(20, 3, 'All Interactive Features', 1, 5, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(21, 3, 'Multi-Property Support', 1, 6, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(22, 3, 'Dedicated Account Manager', 1, 7, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(23, 3, '24/7 Support', 1, 8, '2026-01-08 02:07:37', '2026-01-08 02:07:37'),
(24, 3, 'White-Label Option', 1, 9, '2026-01-08 02:07:37', '2026-01-08 02:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_packages`
--

CREATE TABLE `pricing_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_packages`
--

INSERT INTO `pricing_packages` (`id`, `name`, `price`, `period`, `is_featured`, `badge`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Starter', '150k', '/kamar/bulan', 0, NULL, 1, 1, '2026-01-08 02:06:04', '2026-01-08 02:06:04'),
(2, 'Professional', '250k', '/kamar/bulan', 1, 'Terpopuler', 1, 1, '2026-01-08 02:06:53', '2026-01-08 02:06:53'),
(3, 'Enterprise', '500k', '/kamar/bulan', 0, NULL, 1, 1, '2026-01-08 02:07:37', '2026-01-08 02:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('D3xNTfmELSG9p6vsNsmnSYt8ljenSccA6wMC85i5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiejNqNXM2WUY2TGV1RnFnUHlKeXZTRzlCdnJSUlNGU1k4OFZKWXpxNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb250YWN0cy8xIjtzOjU6InJvdXRlIjtzOjE5OiJhZG1pbi5jb250YWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767854484),
('T2Hg8ckaM0Of7AlQy9UJlpCan3uCnxoEYRxjzs0o', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRDV1eUp2c01xRWVFeXBQOFpVM0xKcEJXcExlTzdqWTZIZnlaVjBhUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcmljaW5nLzEvZWRpdCI7czo1OiJyb3V0ZSI7czoxODoiYWRtaW4ucHJpY2luZy5lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767929077),
('uHwjVUW2vBw6p5ViaKqlrnc3p5qhO2mOHNwuA0H4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjhkejYwcnVUWERuYURsODUyUFNmV0tRWlFZbUtTUWFnbFRSc3NJSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768271863);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `company`, `content`, `rating`, `avatar`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Figarland Shanks', 'General Yonko', 'Akagami Pirates', 'Sistem IPTV dari COGLINE sangat meningkatkan kepuasan tamu kami. Interface yang mudah dan konten yang lengkap membuat tamu betah di kamar.', 5, NULL, 1, 1, '2026-01-08 02:08:07', '2026-01-08 02:08:07'),
(2, 'Edward Newgate', 'General Yonko', 'Whitebeard Pirates', 'Instalasi cepat, support responsif, dan fitur analytics membantu kami memahami kebutuhan tamu. ROI tercapai dalam 6 bulan!', 5, NULL, 1, 1, '2026-01-08 02:08:26', '2026-01-08 02:08:26'),
(3, 'Vinsmoke Vajar', 'IT Manager', 'Boutique Hotel Bandung', 'Solusi terbaik untuk hotel butik kami. Harga terjangkau dengan fitur lengkap. Tamu international sangat appreciate multi-language support.', 5, NULL, 1, 1, '2026-01-08 02:09:47', '2026-01-08 02:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Deden', 'deden@gmail.com', NULL, '$2y$12$CilW4VMI8efcMVgeasKW7.x49O5nWnjTfOq385G3ltTojWDTCHHZK', NULL, '2026-01-08 02:04:46', '2026-01-08 02:04:46');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pricing_features`
--
ALTER TABLE `pricing_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pricing_features_pricing_package_id_foreign` (`pricing_package_id`);

--
-- Indexes for table `pricing_packages`
--
ALTER TABLE `pricing_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pricing_features`
--
ALTER TABLE `pricing_features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pricing_packages`
--
ALTER TABLE `pricing_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pricing_features`
--
ALTER TABLE `pricing_features`
  ADD CONSTRAINT `pricing_features_pricing_package_id_foreign` FOREIGN KEY (`pricing_package_id`) REFERENCES `pricing_packages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
