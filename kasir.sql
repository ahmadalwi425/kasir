-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 08:16 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_masakan` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'administrator', NULL, NULL),
(2, 'waiter', NULL, NULL),
(3, 'kasir', NULL, NULL),
(4, 'owner', NULL, NULL),
(5, 'pelanggan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_masakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `status_masakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id`, `nama_masakan`, `harga`, `status_masakan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Nasi Bakul', 15000, 'Tersedia', 'upload/RzSKFwvmTWbeOBIRYGqtgJM5a14IP6GJbYdjPYmp.jpeg', '2019-04-09 23:51:48', '2019-04-09 23:58:27'),
(3, 'Nasi Goreng sosis', 15000, 'Tidak Tersedia', 'upload/hag8ZIY7zsHFpyz7ASo6J0q2fuFYu6rcLSoZ6JdQ.jpeg', '2019-04-10 21:29:30', '2019-04-11 23:05:58'),
(4, 'Ayam Bakar Kremes', 12000, 'Tidak Tersedia', 'upload/sZDBVxqjy7o6goaPVIAg1t8hNOhX0BXu1xnQgUnI.jpeg', '2019-04-10 21:34:49', '2019-04-10 21:34:49'),
(5, 'Tempe', 1000, 'Tersedia', 'upload/0UAgDqC6lK2dNeNA0qU0fr7NzzyjpoIk8Od8G4Rd.jpeg', '2019-04-10 21:36:09', '2019-04-10 21:36:09'),
(6, 'Nasi Bakar Ampela', 8000, 'Tidak Tersedia', 'upload/kcrB3qRCHldCw03Wmpa6yZhpVpaCeW4KTZokQxz0.jpeg', '2019-04-10 21:38:53', '2019-04-10 21:38:53'),
(7, 'Nasi Bakar Teri', 8000, 'Tersedia', 'upload/aLNlNkSvkNQOAXepVYOAbbELzcqKUWVnRtWe5yqI.jpeg', '2019-04-10 21:39:29', '2019-04-10 21:39:29'),
(8, 'Cumi Saus Padang', 4000, 'Tersedia', 'upload/rb6C1eSXsNSIo8A0NJDHCy1vaxgoSmrIFAfVbjPr.jpeg', '2019-04-11 16:38:18', '2019-04-11 16:38:18'),
(9, 'Ikan Mas Bakar', 17000, 'Tidak Tersedia', 'upload/hiYQ8DJJcZk56JPiKC2iLo3MwWDPTbT6Xr1OM7CL.jpeg', '2019-04-11 16:39:06', '2019-04-11 16:39:06'),
(10, 'Pepes Jamur', 6000, 'Tersedia', 'upload/9IK4RivvASeGB3EM4MhfAjxehggY68e21in0NLFp.jpeg', '2019-04-11 16:40:22', '2019-04-11 16:40:22'),
(11, 'Tahu', 1000, 'Tersedia', 'upload/butxlT1Ql9WqKCzHaiMlqIDLWsZXAV2VAZ71qnJI.jpeg', '2019-04-11 16:41:05', '2019-04-11 16:41:05'),
(12, 'Nila Bakar', 16000, 'Tidak Tersedia', 'upload/sUVM7NRGxW5HbAD1GhL6FGtnpW3HhWHtwvAcESn7.jpeg', '2019-04-11 16:42:10', '2019-04-11 16:42:10'),
(13, 'Nasi Goreng Petai', 15000, 'Tidak Tersedia', 'upload/ExK2sB6bK3UtcDe6HAzPwHOJuIOrFYhCUno66Cep.jpeg', '2019-04-11 16:48:24', '2019-04-11 16:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_meja` int(11) NOT NULL,
  `status_meja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `no_meja`, `status_meja`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tersedia', NULL, '2019-04-15 21:52:13'),
(2, 2, 'Tersedia', NULL, '2019-04-12 18:53:14'),
(3, 3, 'Tersedia', NULL, '2019-04-12 16:29:48'),
(4, 4, 'Tersedia', NULL, '2019-04-10 22:58:13'),
(5, 5, 'Tersedia', NULL, NULL),
(6, 6, 'Tersedia', NULL, NULL),
(7, 7, 'Tersedia', NULL, NULL),
(8, 8, 'Tersedia', NULL, NULL),
(9, 9, 'Tersedia', NULL, NULL);

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
(2, '2019_04_10_050723_level', 2),
(3, '2019_04_10_050851_order', 2),
(4, '2019_04_10_051140_meja', 2),
(5, '2019_04_10_051239_detail', 2),
(6, '2019_04_10_051443_masakan', 2),
(7, '2019_04_10_051626_transaksi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_meja` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_order` int(11) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_user`, `id_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$Mf1ogPaUEonMmCBd9USgr.peL7JlHd5vNXXxTHgWdLIuzNvRjqZ4m', 'admin', 1, 'qtEzggLJqvQL9RORRQaE8bTzlQ0URgYv9utswJbEPR3NxrXy3ibmKGDgg1OT', NULL, NULL),
(2, 'waiter', '$2y$10$bUlkihjoZX1Te5PCCGcmluxtuA9cD01By6C49GY7k3Vu.I2Yoj0te', 'waiter', 2, 'xV2ioiPekaUrWudndEj8Rppyz8WTNoj4VWYy7tokwG8VBf19gmvQjII2yUU9', '2019-04-09 22:56:03', '2019-04-09 22:56:03'),
(3, 'kasir', '$2y$10$5CFBJNDWGB3lqDfO5RyqHelQJ59Fq9OT/QjpWO8fY1ZyXtlYKLlFC', 'kasir', 3, 'wDd8CEgSLDqBzi2ZJXQKhzrO8PUTdvUws0KUfWLOTaKBenKzdC4m8IchJS07', '2019-04-09 22:57:14', '2019-04-09 22:57:14'),
(4, 'owner', '$2y$10$p5ZtZm7NwciHacUWGEV2oeFPC1GYFiMXsRMlowAkm7Kap5xe8OBAq', 'owner', 4, '3xHDQ6WLYRMbdrCmoKx7ZVhQRNjDwGMcImJjUmdOOunVNanBkn9UjOAocS1A', '2019-04-09 22:57:40', '2019-04-09 22:57:40'),
(5, 'pelanggan', '$2y$10$l31NhtZSJdTxyb7jpv79POvebNdElDmpMHZtjwIjU/xmPjssRM8p.', 'pelanggan', 5, '2qxXKv8tonDMf9gqwiWPOuXAmA9SNZIFiiHvKefIUwlx5XcuLBzIKldRPu34', '2019-04-09 22:59:13', '2019-04-09 22:59:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_meja` (`id_meja`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
