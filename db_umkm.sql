-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2022 pada 13.11
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_usaha`
--

CREATE TABLE `kelompok_usaha` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kel_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelompok_usaha`
--

INSERT INTO `kelompok_usaha` (`id`, `kel_usaha`, `created_at`, `updated_at`) VALUES
(1, 'industri kecil', '2022-09-17 22:04:28', '2022-09-17 22:04:28'),
(2, 'jasa', '2022-09-17 22:04:33', '2022-09-17 22:04:33'),
(3, 'kuliner makanan dan minuman', '2022-09-17 22:04:36', '2022-09-17 22:04:36'),
(4, 'pedagang', '2022-09-17 22:04:41', '2022-09-17 22:04:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_kel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `name_kel`, `created_at`, `updated_at`) VALUES
(1, 'belimbing', '2022-09-17 18:44:36', '2022-09-23 11:57:59'),
(2, 'kanaan', '2022-09-17 18:45:09', '2022-09-17 18:45:09'),
(3, 'telihan', '2022-09-17 18:45:20', '2022-09-17 18:45:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_18_022851_create_kelurahan_table', 2),
(8, '2022_09_18_031406_create_kelompok_usaha_table', 3),
(10, '2022_09_18_035922_create_umkm_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gis.com', '$2y$10$SRjVpFy8ZJYQAt3Uryh00.gO2SJtTpp5N9yGXfeDt0r9aiilK9P9m', '2022-09-17 10:45:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_usaha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_id` bigint(20) UNSIGNED NOT NULL,
  `kelompok_usaha_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_usaha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` enum('admin','umkm') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin@gis.com', NULL, 'admin', '$2y$10$17Ep.F27d85Jb7Yj/u1opez2vKYoGr1Rrv3ccbnHkv42OwNau1WwS', 'XT8N4OivK9XMnAEP5uq8WpW35dug5suxKv1o6SK3XWnYabQPdFd4OD3oEW5a', '2022-09-16 09:51:14', '2022-09-16 09:51:14'),
(2, 'feni', 'feni@gmail.com', NULL, 'umkm', '$2y$10$OqL12mMlD2q.gJkSRxO3gu8O4aAqlcZnlsiAVnubIkTd496vbi3xu', NULL, '2022-09-24 18:39:54', '2022-09-24 18:39:54'),
(3, 'suaidil', 'suaidil@gmail.com', NULL, 'umkm', '$2y$10$qd/.Fa5IPJkIFo7lnzFB6ufihjdYgg7hQX4ughxYHJ97I25.T3KGi', NULL, '2022-09-24 18:40:09', '2022-09-24 18:40:09'),
(4, 'sumiati', 'sumiati@gmail.com', NULL, 'umkm', '$2y$10$1CB6zMNZl0B9oMnZJFaQKO8ZRBM39pQc46ESHSXfTcj7N040aBeXO', NULL, '2022-09-24 18:40:25', '2022-09-24 18:40:25'),
(5, 'tohari', 'tohari@gmail.com', NULL, 'umkm', '$2y$10$1nc/8nLOFPDZ53LLw1XAOu.zniEWMYcpVYCj6f2M6/dwBqy6VzaPG', NULL, '2022-09-24 18:40:43', '2022-09-24 18:40:43'),
(6, 'h. firman taha', 'h.firmantaha@gmail.com', NULL, 'umkm', '$2y$10$TFuP9ji4shE6TK4JdsU4wuiNIrFyei/.EwILQcmoomPfmbktN2pU2', NULL, '2022-09-24 18:41:07', '2022-09-24 18:41:07'),
(7, 'indah putri oktaviani', 'indahputrioktaviani@gmail.com', NULL, 'umkm', '$2y$10$zUvXHbJH/W9w5YBOeMR0hO4Gr/M1m.r14FPnwgx/Gh0zYqameNVCa', NULL, '2022-09-24 18:41:31', '2022-09-24 18:41:31'),
(8, 'feni', 'feni.feni@gmail.com', NULL, 'umkm', '$2y$10$YS6CsbjC9zfNEpnDShc2cet6UjMkwEtnRV1WTodt7gYQeqIOKLf7e', NULL, '2022-09-24 18:42:02', '2022-09-24 18:42:02'),
(9, 'basri', 'basri@gmail.com', NULL, 'umkm', '$2y$10$umrYf0QrllJy3MiOMHYTDeizTK/QjrFukRznjElSdirbSMs/lJdda', NULL, '2022-09-24 18:42:37', '2022-09-24 18:42:37'),
(10, 'juwita minggu', 'juwitaminggu@gmail.com', NULL, 'umkm', '$2y$10$5OO2xafD66q4lbIbq2ReVuNln/6kHj.HjtibWMIGv2KbF7hKkvemm', NULL, '2022-09-24 18:43:04', '2022-09-24 18:43:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelompok_usaha`
--
ALTER TABLE `kelompok_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umkm_user_id_foreign` (`user_id`),
  ADD KEY `umkm_kelurahan_id_foreign` (`kelurahan_id`),
  ADD KEY `umkm_kelompok_usaha_id_foreign` (`kelompok_usaha_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelompok_usaha`
--
ALTER TABLE `kelompok_usaha`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_kelompok_usaha_id_foreign` FOREIGN KEY (`kelompok_usaha_id`) REFERENCES `kelompok_usaha` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `umkm_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `umkm_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
