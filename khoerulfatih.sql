-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 03:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoerulfatih`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_28_134111_create_tbl_siswas_table', 1),
(5, '2021_06_28_134156_create_tbl_bukus_table', 1),
(6, '2021_06_28_134235_create_tbl_pinjams_table', 1);

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
-- Table structure for table `tbl_bukus`
--

CREATE TABLE `tbl_bukus` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_bukus`
--

INSERT INTO `tbl_bukus` (`id`, `judul`, `isbn`, `pengarang`, `created_at`, `updated_at`) VALUES
('B0001', 'IPHONE FOR DUMMIES', '1111111', 'WILLEY', NULL, NULL),
('B0002', 'PEMOGRAMAN BAHASA JAWA', '2222222', 'ROY MARTEN', NULL, NULL),
('B0003', 'PHP FOR DUMMIES', '3333333', 'WILLEY', NULL, NULL),
('B0004', 'PENGOLAHAN DATABASE DENGAN ORACLE', '4444444', 'HENDRA', NULL, NULL),
('B0005', 'INTERFACING WITH C', '5555555', 'SCADA', NULL, NULL),
('B0006', 'CLOUD COMPUTING FUNDAMENTAL', '6666666', 'WILLEY', NULL, NULL),
('B0007', 'PANDUAN FORENSIK FOTO DIGITAL', '7777777', 'ROY MARTEN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjams`
--

CREATE TABLE `tbl_pinjams` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_batas` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_buku` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pinjams`
--

INSERT INTO `tbl_pinjams` (`id`, `tgl_pinjam`, `tgl_batas`, `tgl_kembali`, `status`, `nis`, `id_buku`, `created_at`, `updated_at`) VALUES
('P0001', '2010-11-01', '2010-11-08', NULL, '0', '006', 'B0007', NULL, NULL),
('P0002', '2010-11-01', '2010-11-08', '2010-11-05', '1', '006', 'B0005', NULL, NULL),
('P0003', '2010-11-01', '2010-11-08', NULL, '0', '004', 'B0002', NULL, NULL),
('P0004', '2010-11-06', '2010-11-13', '2010-11-08', '1', '003', 'B0003', NULL, NULL),
('P0005', '2010-11-06', '2010-11-13', NULL, '0', '007', 'B0006', NULL, NULL),
('P0006', '2010-11-09', '2010-11-16', NULL, '0', '001', 'B0001', NULL, NULL),
('P0007', '2010-11-09', '2010-11-12', NULL, '0', '001', 'B0004', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswas`
--

CREATE TABLE `tbl_siswas` (
  `nis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_siswas`
--

INSERT INTO `tbl_siswas` (`nis`, `nama`, `tgl_lahir`, `kelamin`, `created_at`, `updated_at`) VALUES
('001', 'ARIF ABDULRAHMAN', '1987-03-12', 'L', NULL, NULL),
('002', 'ASRI WELAS', '1979-10-03', 'P', NULL, NULL),
('003', 'RASMI RAHMAWATI', '1985-07-05', 'P', NULL, NULL),
('004', 'UDIN R.KAMAL', '1984-05-27', 'L', NULL, NULL),
('005', 'ARDIANSYAH SAPUTRA', '1981-01-30', 'L', NULL, NULL),
('006', 'SEPTIRINA HERMAWAN', '1983-09-17', 'P', NULL, NULL),
('007', 'HERMAN BARLIN', '1980-04-09', 'L', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_bukus`
--
ALTER TABLE `tbl_bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswas`
--
ALTER TABLE `tbl_siswas`
  ADD PRIMARY KEY (`nis`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
