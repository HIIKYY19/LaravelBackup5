-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 06:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `idarmada` int(11) NOT NULL,
  `jenis_armada` varchar(45) DEFAULT NULL,
  `nama_armada` varchar(45) DEFAULT NULL,
  `kapasitas` varchar(45) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`idarmada`, `jenis_armada`, `nama_armada`, `kapasitas`, `member_id`) VALUES
(1, 'Bus', 'Bus Koridor 1', '100', 6),
(2, 'Bus', 'Bus Koridor 2', '100', 6);

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
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(11) NOT NULL,
  `jam_sampai` time DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `jam_sampai`, `jam_berangkat`) VALUES
(7, '15:00:00', '12:00:00'),
(8, '10:00:00', '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('staff','admin','manager','supir','penumpang') DEFAULT 'penumpang',
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'ersa', 'ersa@gmail.com', NULL, '$2y$10$fHm1VZIEu1S/dH1OpsQKBO/a.rnV4i01/ywaz7CMqdkumnYFLgShC', 'staff', NULL, 'kkCdob2YOTi3WanTSVan2kF0bir5cNDvNqVocAje1Yih1KIeoQXMaHzZ5Mdk', '2023-11-29 00:37:10', '2023-11-29 00:37:10'),
(6, 'supir', 'supir@gmail.com', NULL, '$2y$10$cPrIbxcY6Mn8L/v/Tnyfz.NqanmEbFBTVyzn9Y2mOdY2biM.OSrj6', 'supir', '', NULL, '2023-11-29 20:02:07', '2023-11-29 20:07:52'),
(7, 'budi', 'budi@gmail.com', NULL, '$2y$10$htI47Ck7W0GIQorjhEgQ7.bFxzEtBQ4085SitD/PotX.O0DPsWwES', 'staff', NULL, NULL, '2023-11-30 00:32:09', '2023-11-30 00:32:09'),
(8, 'user', 'user@gmail.com', NULL, '$2y$10$ZtO9cUgrA4BwSkvk4PtjOezJ0TPKLlNvAReLBzAeVTnGYIy8dKZyG', 'penumpang', NULL, 'QGSmxjhOoeAgyRn0j5cHz3J8Qm8BII4OfDBD3SHjEqskl7JG7rtzBDZDG3sA', '2023-11-30 05:13:17', '2023-11-30 05:13:17'),
(9, 'admin', 'admin123@gmail.com', NULL, 'admin123', 'admin', '1701399905_Vieri.jpg', 'QHLZWy095uoelo6yL5tF2q1bbePlIepCBXkRDLux7pFFJiWFwv4q7IpDU1Gc', '2023-11-30 19:09:11', '2023-11-30 20:05:05'),
(10, 'andi', 'andi@gmail.com', NULL, '$2y$10$xYJNgB39aqq72PvlrtQUkumIN/S5.rcshJUByta6pfG.ITJfjhyh6', 'penumpang', '1701403718_12 MIPA7, VIERI ARIEF M _compress40.jpg', 'zZ1O8NNMCvz5hlJCptCOjctcaP29a0eyTYv2Yol5hYXdKXRuVVDUnWxOGupU', '2023-11-30 21:07:09', '2023-12-03 05:10:45'),
(11, 'vieri arief maulana', 'vierigata27@gmail.com', NULL, '$2y$10$jYrnPHBKMb7EHWzezxtc6Ol8JaVNDnZW447T2pmmSygH7bi7Yrrd.', 'penumpang', '1701737851_Vieri.jpg', '0lYnNstDvYCXTIjReuYeSj7w3MKBet0SW5jhmEwcIkOLaZEOtTPvnnxK5rOd', '2023-12-04 04:28:56', '2023-12-04 17:57:48'),
(12, 'staf1', 'staf1@gmail.com', NULL, '$2y$10$X9j37BsKvVNzE/06piH6f.d8C6sPTY2yHOZsUopfCjJ1uB573K0Je', 'staff', '1701746520_filosofi.jpeg', NULL, '2023-12-04 20:00:38', '2023-12-04 20:22:00'),
(13, 'Muhammad Rizky Fauzi', 'Rizky@gmail.com', NULL, 'iky', 'penumpang', '1708989090_9892.png', NULL, '2024-02-27 11:10:46', '2024-02-27 11:11:30'),
(14, 'Suci Mulyasukmawati', 'suci@gmail.com', NULL, '$2y$10$5eu07./Ot5.JNITYO8XOOOOyEex96.d7jqSXN7VhlAtFgIBbfMSe2', 'penumpang', NULL, NULL, '2024-02-29 10:07:52', '2024-02-29 10:07:52'),
(15, 'cihuy', 'cihuy@gmail.com', NULL, '$2y$10$cg4YgobbIlW8oTLEKxELeuCgQ6hfcIJPoSmgktRLy/VAda.mwpr3i', 'admin', NULL, NULL, '2024-07-16 09:35:44', '2024-07-16 09:35:44'),
(16, 'acu', 'acu@gmail.com', NULL, 'acu', 'staff', 'foto-16.png', NULL, NULL, '2024-07-16 09:44:56');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2023_11_29_050015_create_members_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(255) NOT NULL,
  `transaksi_id` int(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `bayar` int(255) NOT NULL,
  `kembalian` int(255) DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `transaksi_id`, `tanggal`, `bayar`, `kembalian`, `status_pembayaran`) VALUES
(6, 28, '2023-12-05 10:43:30', 20000, 10000, 'LUNAS'),
(7, 29, '2023-12-05 11:10:05', 12000, 2000, 'LUNAS'),
(8, 30, '2023-12-06 09:13:22', 0, NULL, 'belum dibayar'),
(9, 31, '2023-12-06 09:13:50', 0, NULL, 'belum dibayar'),
(10, 32, '2023-12-06 10:34:47', 0, NULL, 'belum dibayar'),
(11, 33, '2023-12-06 10:59:40', 0, NULL, 'belum dibayar'),
(12, 34, '2023-12-06 11:03:31', 0, NULL, 'belum dibayar'),
(13, 35, '2023-12-06 11:04:45', 0, NULL, 'belum dibayar'),
(14, 36, '2023-12-06 11:05:17', 0, NULL, 'belum dibayar'),
(15, 37, '2023-12-06 11:05:45', 0, NULL, 'belum dibayar'),
(16, 38, '2023-12-06 11:46:56', 0, NULL, 'belum dibayar'),
(17, 39, '2023-12-06 12:09:22', 0, NULL, 'belum dibayar'),
(18, 40, '2023-12-06 12:28:33', 0, NULL, 'belum dibayar'),
(19, 41, '2023-12-06 12:29:09', 0, NULL, 'belum dibayar'),
(20, 42, '2023-12-06 12:42:59', 0, NULL, 'belum dibayar'),
(21, 43, '2023-12-06 12:45:32', 50000, 8000, 'LUNAS'),
(22, 44, '2024-02-28 10:09:13', 0, NULL, 'belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(32) DEFAULT NULL,
  `berat_bawaan` varchar(45) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id`, `nama`, `gender`, `no_telepon`, `berat_bawaan`, `password`, `foto`) VALUES
(1, 'vieri arief m', 'laki-laki', '08123456789', '10', 'vieri', 'foto-1.jpg'),
(2, 'Jane Smith', 'Perem', '08567891234', '12', '', ''),
(3, 'Michael Johnson', 'Laki-', '08123456700', '11', '', ''),
(4, 'Emily Davis', 'Perem', '08765432100', '20', '', ''),
(5, 'David Brown', 'Laki-', '08987654321', '25', '', ''),
(10, 'Budi', 'Laki-laki', '082331646363', '5', '123', 'foto-655b5f6153a4a.jpg');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `idrute` int(11) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `kota_asal` varchar(45) DEFAULT NULL,
  `kota_tujuan` varchar(45) DEFAULT NULL,
  `jarak` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`idrute`, `kode`, `kota_asal`, `kota_tujuan`, `jarak`) VALUES
(1, 'R001', 'Terminal Porong', 'Terminal Bunder', '100'),
(9, 'R002', 'Terminal Kertajaya', 'Teminal Purabaya', '120'),
(10, 'R003', 'Terminal Bunder', 'Terminal Porong', '100'),
(11, 'R004', 'Teminal Purabaya', 'Terminal Kertajaya', '120');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `armada_id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `harga`, `jadwal_id`, `rute_id`, `armada_id`, `foto`, `detail`) VALUES
(24, 5000, 8, 1, 1, 'foto-656e9ad93525c.png', 'Bus Koridor 1 berangkat dari Terminal Porong pukul 07.00 dan di estimasikan sampai ke Terminal Bunder pukul 10.00'),
(25, 6000, 8, 9, 2, 'foto-656e9b2391560.png', 'Bus Koridor 2 berangkat dari Terminal Kertajaya pukul 07.00 dan di estimasikan sampai ke Terminal Purabaya pukul 10.00'),
(26, 5000, 7, 10, 1, 'foto-656e9b61bce96.png', 'Bus Koridor 1 berangkat dari Terminal Bunder pukul 12.00 dan di estimasikan sampai ke  Terminal Porong pukul 15.00'),
(27, 6000, 7, 11, 2, 'foto-656e9bc8e47e8.png', 'Bus Koridor 2 berangkat dari  Terminal Purabaya pukul 12.00 dan di estimasikan sampai ke Terminal Kertajaya pukul 15.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `total_tiket` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `member_id` int(15) NOT NULL,
  `tiket_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_tiket`, `totalharga`, `member_id`, `tiket_id`, `tanggal`) VALUES
(28, 2, 10000, 11, 24, '2023-12-05 10:43:30'),
(29, 2, 10000, 11, 24, '2023-12-05 11:10:05'),
(30, 13, 78000, 11, 25, '2023-12-06 09:13:22'),
(31, 13, 78000, 11, 25, '2023-12-06 09:13:50'),
(32, 2, 10000, 11, 26, '2023-12-06 10:34:47'),
(33, 1, 5000, 11, 24, '2023-12-06 10:59:40'),
(34, 1, 5000, 11, 24, '2023-12-06 11:03:31'),
(35, 1, 5000, 11, 24, '2023-12-06 11:04:45'),
(36, 1, 5000, 11, 24, '2023-12-06 11:05:17'),
(37, 1, 6000, 11, 25, '2023-12-06 11:05:45'),
(38, 5, 25000, 11, 26, '2023-12-06 11:46:56'),
(39, 50, 250000, 11, 24, '2023-12-06 12:09:22'),
(40, 1, 6000, 11, 25, '2023-12-06 12:28:33'),
(41, 1, 6000, 11, 27, '2023-12-06 12:29:09'),
(42, 2, 10000, 11, 24, '2023-12-06 12:42:59'),
(43, 7, 42000, 11, 25, '2023-12-06 12:45:32'),
(44, 1, 5000, 14, 24, '2024-02-28 10:09:13');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `set_pembayaran_default` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
    INSERT INTO pembayaran (transaksi_id, bayar, status_pembayaran)
    VALUES (NEW.id_transaksi, 0, 'belum dibayar');
END
$$
DELIMITER ;

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`idarmada`),
  ADD KEY `fk_member_id` (`member_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_email_unique` (`email`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`idrute`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `rute_id` (`rute_id`),
  ADD KEY `armada_id` (`armada_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `tiket_id` (`tiket_id`),
  ADD KEY `member_id` (`member_id`);

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
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `idarmada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `idrute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `armada`
--
ALTER TABLE `armada`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`idjadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`idrute`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`armada_id`) REFERENCES `armada` (`idarmada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`id_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
