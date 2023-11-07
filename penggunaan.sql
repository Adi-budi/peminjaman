-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 09:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggunaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-11-05 09:54:29', '2023-11-05 09:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `alats`
--

CREATE TABLE `alats` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `status_alat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alats`
--

INSERT INTO `alats` (`id`, `nama`, `id_ruang`, `status_alat`, `created_at`, `updated_at`) VALUES
(1, 'Proyektor 1', 1, 0, '2023-11-05 10:12:48', '2023-11-06 08:38:48'),
(2, 'Proyektor 2', 1, 0, '2023-11-05 10:13:03', '2023-11-06 07:18:26'),
(3, 'Proyektor 3', 1, 0, '2023-11-05 10:13:17', '2023-11-06 07:18:23'),
(4, 'Proyektor 4', 1, 0, '2023-11-05 10:13:30', '2023-11-06 07:18:21'),
(5, 'Proyektor 5', 1, 0, '2023-11-05 10:13:43', '2023-11-06 07:18:19'),
(6, 'Proyektor 6', 1, 0, '2023-11-05 10:13:56', '2023-11-06 07:18:18'),
(7, 'Proyektor 7', 1, 0, '2023-11-05 10:14:13', '2023-11-06 07:18:15');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_15_090748_create_tabel_users', 1),
(3, '2023_07_15_180624_create_tabel_accounts', 1),
(4, '2023_07_15_231005_foreign_key_constrain_accounts', 1),
(5, '2023_07_21_191746_insert_to_users_and_accounts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_telp` varchar(50) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `alat` int(11) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `nim`, `nama`, `nomor_telp`, `keperluan`, `alat`, `ruangan`, `status`, `created_at`, `updated_at`) VALUES
(1, '121711011', 'Ahmadi Mahrus Ali', '087623726', 'Pembelajaran', 1, 13, 1, '2023-11-06 13:43:05', '2023-11-06 13:53:00'),
(2, '121212', 'amin', '0128128', 'pembelajaran', 2, 15, 1, '2023-11-06 13:51:51', '2023-11-06 13:55:24'),
(3, '12121212', 'dgjfgdh', '257536345', 'dfgdf', 1, 11, 1, '2023-11-06 13:55:41', '2023-11-06 14:03:03'),
(4, '1212121212112121212121', 'wqqweqweqwerqwerqwerwq', '14578976', 'fsdsdfsdf', 1, 13, 1, '2023-11-06 14:03:33', '2023-11-06 14:18:28'),
(5, '1212123333', 'qwqwqweweqwe', '2323232323', '2asdasd', 2, 19, 1, '2023-11-06 14:05:24', '2023-11-06 14:18:26'),
(6, '1212121222222222', 'qqwqwqwqw', '1212121212', 'wererereree', 3, 19, 1, '2023-11-06 14:08:10', '2023-11-06 14:18:23'),
(7, '1123457567567856', 'werulghcffsdfg', '346845623421', 'rserwer', 4, 18, 1, '2023-11-06 14:08:29', '2023-11-06 14:18:21'),
(8, '12121212333334454554', 'dfgdfgdffg', '23324234234', 'rwerwerer', 5, 14, 1, '2023-11-06 14:08:51', '2023-11-06 14:18:19'),
(9, '333333333', 'rwerwerwer', '2323123123', 'erwrwrwer', 6, 13, 1, '2023-11-06 14:09:09', '2023-11-06 14:18:18'),
(10, '5454545454545', 'swrwerrwerwer', '12312312312312', 'sdfdsddg', 7, 13, 1, '2023-11-06 14:09:24', '2023-11-06 14:18:15'),
(11, '121711098', 'aslong oye', '1423523523532', 'qwqwqwqwqw', 1, 4, 1, '2023-11-06 14:58:57', '2023-11-06 14:59:47'),
(12, '11111111111', 'qwqwqwqwqwqwqwq', '121212121212', '35234346yeryeryery', 1, 18, 1, '2023-11-06 15:04:16', '2023-11-06 15:26:15'),
(13, '13', 'amin', '9182192', 'ppasas', 1, 18, 1, '2023-11-06 15:26:50', '2023-11-06 15:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `nama_ruang`, `created_at`, `updated_at`) VALUES
(1, 'UPT Laboratorium Terpadu', '2023-11-05 10:05:28', '2023-11-05 17:05:28'),
(2, 'Lab. Jaringan', '2023-11-05 10:05:42', '2023-11-05 17:05:42'),
(3, 'Lab. Pembelajaran Matematika', '2023-11-05 10:06:02', '2023-11-05 17:06:02'),
(4, 'Lab. Workshop Komputer', '2023-11-05 10:06:21', '2023-11-05 17:06:21'),
(5, 'Lab. Telekomunikasi', '2023-11-05 10:06:35', '2023-11-05 17:06:35'),
(6, 'Lab. Perbankan', '2023-11-05 10:06:50', '2023-11-05 17:06:50'),
(7, 'Lab. Bahasa', '2023-11-05 10:07:02', '2023-11-05 17:07:02'),
(8, 'Lab. Microteaching', '2023-11-05 10:07:17', '2023-11-05 17:07:17'),
(9, 'Lab. Elektronika', '2023-11-05 10:07:38', '2023-11-05 17:07:38'),
(10, 'Lab. Pengolahan Citra', '2023-11-05 10:07:53', '2023-11-05 17:07:53'),
(11, 'Lab. Sistem Cerdas', '2023-11-05 10:08:06', '2023-11-05 17:08:06'),
(12, 'Lab. Rekayasa Perangkat Lunak ( RPL )', '2023-11-05 10:08:36', '2023-11-05 17:08:36'),
(13, 'Lab. Basis Data', '2023-11-05 10:08:58', '2023-11-05 17:08:58'),
(14, 'Lab. Argonomi ( industri )', '2023-11-05 10:09:32', '2023-11-05 17:09:32'),
(15, 'Lab. Manufaktur ( industri )', '2023-11-05 10:09:52', '2023-11-05 17:09:52'),
(16, 'Lab. Fluida dan Konversi Energi ( Mesin )', '2023-11-05 10:10:54', '2023-11-05 17:10:54'),
(17, 'Lab. Rekayasa Material dan Proses Manufaktur ( Mesin )', '2023-11-05 10:11:24', '2023-11-05 17:11:24'),
(18, 'Lab. Desain dan Otomasi Industri ( Mesin )', '2023-11-05 10:11:55', '2023-11-05 17:11:55'),
(19, 'Auditorium', '2023-11-05 10:12:18', '2023-11-05 17:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_account` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `id_account`) VALUES
(1, 'admin', '$2y$10$hqTpLerI5BFjBWQAD3JW5ebVLBWQqij3ymwQgTfRi0tcz/kkwnvU2', '2023-11-05 09:54:29', '2023-11-05 09:54:29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alats`
--
ALTER TABLE `alats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id_account_foreign` (`id_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alats`
--
ALTER TABLE `alats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
