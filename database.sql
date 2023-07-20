-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2023 at 07:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_manajemen_unit`
--

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
-- Table structure for table `gudang_sparepart`
--

CREATE TABLE `gudang_sparepart` (
  `id` bigint NOT NULL,
  `nama_gudang` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gudang_sparepart`
--

INSERT INTO `gudang_sparepart` (`id`, `nama_gudang`, `longitude`, `latitude`, `penanggung_jawab`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'GUDANG A', '114.8943328857422', '-3.759430279719816', 'Yudisthira', 'Gudang Sparepart Ban', '2023-06-09 10:42:05', '2023-06-09 03:18:24'),
(2, 'GUDANG B', '114.91149902343751', '-3.7957434222874658', 'Muhammad Syihab', 'Gudang Sparepart Alat Berat', '2023-06-09 02:56:45', '2023-06-09 03:15:57'),
(3, 'GUDANG C', '114.93553161621095', '-3.7525785733538837', 'Ikhwan', 'Gudang Sparepart Dozer', '2023-06-09 03:17:23', '2023-06-09 03:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `radius` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pemilik` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `longitude`, `latitude`, `radius`, `pemilik`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'OFFICE', '1', '1', '1', 'Perusahaan', 'Milik Perusahaan', '2023-06-09 07:36:12', '2023-06-09 07:36:12'),
(2, 'PIT B', '114.92263254477952', '-3.749152700011882', '10000', 'Perusahaan', 'Milik Perusahaan', '2023-06-08 21:44:47', '2023-06-08 23:29:08'),
(4, 'PIT D', '114.75483643638978', '-3.654593340629959', '10000', 'Perusahaan', 'Milik Perusahaan', '2023-06-08 21:57:51', '2023-06-08 23:23:20'),
(6, 'PIT A', '114.7905618937713', '-4.025918919436791', '10000', 'Perusahaan', 'Milik Perusahaan', '2023-06-08 23:29:35', '2023-06-08 23:29:35'),
(7, 'PIT C', '114.79614854541761', '-3.9108390726964832', '10000', 'Ahmad Murteza Akbari', '80% modal dari Ahmad Murteza Akbari', '2023-06-08 23:29:57', '2023-06-08 23:29:57'),
(8, 'PIT K', '115.31250000000001', '-3.762856112719357', '10000', 'Perusahaan', '10000', '2023-07-09 21:38:37', '2023-07-09 21:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `master_unit`
--

CREATE TABLE `master_unit` (
  `id` bigint NOT NULL,
  `jenis_unit` varchar(255) NOT NULL,
  `aset` varchar(255) NOT NULL,
  `nomer_serial` varchar(255) NOT NULL,
  `nomer_lambung` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `lokasi_id` bigint NOT NULL,
  `hm` bigint NOT NULL,
  `hm_service_id` bigint NOT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_unit`
--

INSERT INTO `master_unit` (`id`, `jenis_unit`, `aset`, `nomer_serial`, `nomer_lambung`, `status`, `keterangan`, `lokasi_id`, `hm`, `hm_service_id`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(3, 'dozer', 'Perusahaan', '#UNIT9891', 'CN-02', 'ready', 'Standby', 2, 500, 1, '113.934336', '-2.2085632', NULL, '2023-07-04 02:14:57'),
(4, 'dozer', 'Perusahaan', '#UNIT9891', 'CN-01', 'ready', 'Standby', 2, 500, 1, '114.5925663', '-3.2963132', NULL, '2023-07-09 21:28:46'),
(5, 'dozer', 'Perusahaan', '#UNIT9891', 'CN-03', 'ready', 'Standby', 2, 500, 1, '114.8365543', '-3.4392123', NULL, '2023-07-09 21:43:18');

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
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int NOT NULL,
  `master_unit_id` bigint NOT NULL,
  `lokasi_id` bigint NOT NULL,
  `pengadu` varchar(255) NOT NULL,
  `kerusakan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `prioritas` varchar(255) NOT NULL,
  `foto_insiden` varchar(255) NOT NULL,
  `waktu_insiden` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `master_unit_id`, `lokasi_id`, `pengadu`, `kerusakan`, `status`, `prioritas`, `foto_insiden`, `waktu_insiden`, `created_at`, `updated_at`) VALUES
(4, 1, 4, 'Cheryl Boyle', 'Hiroko Chase', 'menunggu', 'tinggi', 'public/posts_image/SELAMAT_1687619702.jpg', '1996-06-07 10:01:00', '2023-06-24 07:09:01', '2023-06-24 07:15:02'),
(5, 1, 2, 'Jayme Perry', 'Clinton Green', 'proses', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688458260.jpg', '1986-07-25 13:46:00', '2023-07-04 00:11:00', '2023-07-04 00:11:00'),
(6, 1, 7, 'Francesca Bradshaw', 'Kenyon Holder', 'menunggu', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688461771.jpg', '2023-07-04 01:09:31', '2023-07-04 01:09:31', '2023-07-04 01:09:31'),
(7, 1, 1, 'Jackson Puckett', 'Ariana Richmond', 'menunggu', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688461854.jpg', '2023-07-04 01:10:54', '2023-07-04 01:10:54', '2023-07-04 01:10:54'),
(8, 1, 6, 'Vaughan Skinner', 'Ora Maynard', 'menunggu', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688462736.jpg', '2023-07-04 01:25:36', '2023-07-04 01:25:36', '2023-07-04 01:25:36'),
(9, 3, 1, 'Portia Jones', 'Indigo Chandler', 'menunggu', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688462981.jpg', '2023-07-04 01:29:41', '2023-07-04 01:29:41', '2023-07-04 01:29:41'),
(10, 5, 2, 'Lareina Castaneda', 'Aphrodite Underwood', 'menunggu', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688465583.jpg', '2023-07-04 02:13:03', '2023-07-04 02:13:03', '2023-07-04 02:13:03'),
(11, 3, 7, 'Nyssa Fowler', 'MacKensie Santos', 'menunggu', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688465697.jpg', '2023-07-04 02:14:57', '2023-07-04 02:14:57', '2023-07-04 02:14:57'),
(12, 4, 7, 'Francesca Miller', 'Astra Dillard', 'menunggu', 'rendah', 'public/posts_image/HERO-DAIHATSU-1536x800_1688481465.jpg', '2023-07-04 06:37:45', '2023-07-04 06:37:45', '2023-07-04 06:37:45'),
(13, 4, 4, 'Cassady Puckett', 'Ina Whitney', 'menunggu', 'rendah', 'public/posts_image/images_1688966925.png', '2023-07-09 21:28:45', '2023-07-09 21:28:45', '2023-07-09 21:28:45'),
(14, 5, 1, 'Jonas Hill', 'Elton Mcclain', 'menunggu', 'rendah', 'public/posts_image/images_1688967798.png', '2023-07-09 21:43:18', '2023-07-09 21:43:18', '2023-07-09 21:43:18'),
(15, 4, 6, 'Imani Salinas', 'Aristotle Bruce', 'menunggu', 'rendah', 'public/posts_image/images_1688967877.png', '2023-07-09 21:44:37', '2023-07-09 21:44:37', '2023-07-09 21:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `sparepart` text NOT NULL,
  `hm` bigint NOT NULL,
  `jenis_unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `penanggung_jawab`, `deskripsi`, `sparepart`, `hm`, `jenis_unit`, `created_at`, `updated_at`) VALUES
(1, 'Perusahaan', 'Jadwal Service Berkala Unit Pribadi Perusahaan', 'Filter, Oli, Cek tabung minyak', 1000, 'dozer', '2023-06-10 12:20:47', '2023-06-10 12:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_beli`
--

CREATE TABLE `sparepart_beli` (
  `id` bigint NOT NULL,
  `gudang_sparepart_id` bigint NOT NULL,
  `tanggal_diterima` datetime NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nomor_part` varchar(255) NOT NULL,
  `jumlah` bigint NOT NULL,
  `harga_satuan` bigint NOT NULL,
  `total` bigint NOT NULL,
  `suplier` varchar(255) NOT NULL,
  `nomor_po` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sparepart_beli`
--

INSERT INTO `sparepart_beli` (`id`, `gudang_sparepart_id`, `tanggal_diterima`, `deskripsi`, `nomor_part`, `jumlah`, `harga_satuan`, `total`, `suplier`, `nomor_po`, `penerima`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-10 00:00:00', 'Filter', 'FLT0023', 13, 100000, 1300000, 'Yamaha', 'PO#0001', 'Ahmad Murteza Akbari', 'diterima', '2023-06-09 11:57:19', '2023-06-10 04:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_pakai`
--

CREATE TABLE `sparepart_pakai` (
  `id` int NOT NULL,
  `sparepart_beli_id` bigint NOT NULL,
  `tanggal_dipakai` datetime NOT NULL,
  `jumlah` int NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sparepart_pakai`
--

INSERT INTO `sparepart_pakai` (`id`, `sparepart_beli_id`, `tanggal_dipakai`, `jumlah`, `penerima`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-10 11:08:14', 1, 'Jailani', 'dipasang', '2023-06-10 11:08:14', '2023-06-10 11:08:14'),
(5, 1, '1980-07-09 00:00:00', 1, 'Charity Foster', 'proses', '2023-06-10 03:41:54', '2023-06-10 03:41:54'),
(6, 1, '2023-06-10 00:00:00', 8, 'Dexter Huber', 'proses', '2023-06-10 04:00:53', '2023-06-10 04:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lokasi_id`, `name`, `email`, `jabatan`, `role`, `no_wa`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 1, 'Denni', 'denni@gmail.com', 'Planner PIT A', 'planner', '6281999524453', NULL, '$2y$10$Yr21wyKgqdISJGim0kv38OVjY183ga1Sqsz5F45ogwJRzurMiKQi2', NULL, '2023-06-08 22:51:26', '2023-06-08 23:36:55'),
(6, 1, 'ahmad murteza akbari', 'ahmadmurtezaakbari@gmail.com', 'HO', 'planner', '6285947567015', NULL, '$2y$10$7R2uRmEn/nrnNs.Bu3T.4.etQuEzYpQMxO5EbhJ/Z0KPqMJwpMbd2', NULL, '2023-06-08 23:03:07', '2023-06-08 23:37:07'),
(7, 1, 'Jameson Mccray', 'bygemohe@mailinator.com', 'Joseph Mayo', 'planner', '6282314599994', NULL, '$2y$10$QWVctdwiGTkGQfqdh/spjuT8qWLiDdYHuhtiZk4ibXWFQ3q2HNL7S', NULL, '2023-07-09 21:42:00', '2023-07-09 21:42:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gudang_sparepart`
--
ALTER TABLE `gudang_sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_unit`
--
ALTER TABLE `master_unit`
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
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart_beli`
--
ALTER TABLE `sparepart_beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart_pakai`
--
ALTER TABLE `sparepart_pakai`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang_sparepart`
--
ALTER TABLE `gudang_sparepart`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sparepart_beli`
--
ALTER TABLE `sparepart_beli`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sparepart_pakai`
--
ALTER TABLE `sparepart_pakai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
