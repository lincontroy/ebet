-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2023 at 03:45 PM
-- Server version: 8.0.32
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vutia_pceakasarani`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elder_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elder_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `elder_name`, `elder_phone`, `elder_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Neema', 'Erastus Tatua Gicheha', '0700101724', 'etatua@gmail.com', '2023-05-06 06:04:26', '2023-05-06 06:04:26', NULL),
(2, 'Sports View', 'Joshua Kibui Gichimu', '0727757981', 'gachumuj@gmail.com', '2023-05-06 06:08:08', '2023-05-06 06:08:08', NULL),
(3, 'Judea', 'Damaris Muthoni Njeru', '0729479695', 'damarisnjoka909@gmail.com', '2023-05-06 07:21:32', '2023-05-06 07:21:32', NULL),
(4, 'Clay City', 'Dr. Ann Njoki Kamau', '0721406122', 'annnjokiwamathai@yahoo.com', '2023-05-06 07:23:02', '2023-05-06 07:23:02', NULL),
(5, 'Sinai', 'Julius Theuri Karegi', '0722746160', 'julius.karegi@yahoo.com', '2023-05-06 07:25:07', '2023-05-06 07:25:07', NULL),
(6, 'Super Highway', 'Rose Anne Muthoni Maina', '0720504149', 'mainaroseann@yahoo.com', '2023-05-06 07:26:18', '2023-05-06 07:26:18', NULL),
(7, 'Jericho', 'Rebecca Wahu Maina', '0725827699', 'wahurebecca@gmail.com', '2023-05-06 07:27:20', '2023-05-06 07:27:20', NULL),
(8, 'Bethsaida', 'Robert Maina Mbuthia', '0722824019', 'mbuthia2002@gmail.com', '2023-05-06 07:28:32', '2023-05-06 07:28:32', NULL),
(9, 'Galilee', 'Catherine Wairimu Mwangi', '0723757819', 'catherinemwangi920@gmail.com', '2023-05-06 07:29:48', '2023-05-06 07:29:48', NULL),
(10, 'Warren', 'Millicent Wanjiru Chege', '0722859671', 'millicentchege@gmail.com', '2023-05-06 07:31:11', '2023-05-06 07:31:11', NULL),
(11, 'Jordan', 'David Mugendi Nthuni', '0724987558', 'dthuni@yahoo.com', '2023-05-06 07:32:25', '2023-05-06 07:32:25', NULL),
(12, 'Imani', 'Jesse Kariuki Macharia', '0722883481', 'machariajesse@gmail.com', '2023-05-06 07:33:43', '2023-05-06 07:33:43', NULL),
(13, 'Samaria', 'Aphidah Thogori Matara', '0721455552', 'athigori@gmail.com', '2023-05-06 07:35:02', '2023-05-06 07:35:02', NULL),
(14, 'Tumaini', 'Elizabeth Wanjuhi Karanja', '0722429177', 'cuhimyco@gmail.com', '2023-05-06 07:36:53', '2023-05-06 07:36:53', NULL),
(15, 'Joy Valley', 'Moses Muriithi Njuguna', '0722851432', 'njuguna@zenithvaluers.com', '2023-05-06 07:49:42', '2023-05-06 07:49:42', NULL),
(16, 'Kise', 'Ann Wangeci Kamau', '0724889555', 'wangecianne72@gmail.com', '2023-05-06 07:51:00', '2023-05-06 07:51:00', NULL),
(17, 'Muirigo', 'George Ndugu Mbugua', '0735830256', 'ndugugm@gmail.com', '2023-05-06 07:53:45', '2023-05-06 07:53:45', NULL),
(18, 'Sunday', 'Samuel Muhani Ndamburi', '0722670949', 'smuhami2014@gmail.com', '2023-05-06 07:55:02', '2023-05-06 07:55:02', NULL),
(19, 'Roysambu', 'Joseph Maina Thairu', '0733889904', 'thairu.joseph@yahoo.com', '2023-05-06 07:57:24', '2023-05-06 07:57:24', NULL),
(20, 'Baraka', 'Washington Muthomi Kithinji', '0720306520', 'wmajuri@gmail.com', '2023-05-06 07:59:27', '2023-05-06 07:59:27', NULL),
(21, 'Icipe', 'Esther Njambi', '0722849535', 'njambingugi@gmail.com', '2023-05-06 08:00:53', '2023-05-06 08:00:53', NULL),
(22, 'Bethlehem', 'Leonard Muturi', '0722319859', 'muturi02@gmail.com', '2023-05-06 08:03:47', '2023-05-06 08:03:47', NULL),
(23, 'Jerusalem', 'Ezekiel Nduhiu Kaguamba', '0721875178', 'ezekag@gmail.com', '2023-05-06 08:05:30', '2023-05-06 08:05:30', NULL);

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2023_05_04_103751_create_districts_table', 2),
(22, '2023_05_05_182920_create_members_table', 3);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manager',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Samuel Kimani', 'kkamau.samuel@gmail.com', 'Manager', NULL, '$2y$10$KFEdwDJH89.7MS64aE2qD.qLnZzUyedMzMbXElUKAVpf.61CUEebW', NULL, '2023-05-02 15:40:43', '2023-05-02 15:40:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_district_id_foreign` (`district_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
