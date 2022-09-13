-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 09:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabarang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idsatuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(10) UNSIGNED NOT NULL,
  `lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `kode`, `namabarang`, `idsatuan`, `stok`, `lokasi`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'INV00', 'kertas ukuran A4', '6', 11, 'gudang Gd A', 'baik', '2022-04-26 21:44:29', '2022-04-26 23:09:13'),
(2, 'INV01', 'stapler', '5', 15, 'leci D', 'baik', '2022-04-26 21:47:37', '2022-04-26 23:09:31'),
(3, 'INV02', 'tinta printer HP', '2', 12, 'lemari a', 'baik', '2022-04-27 00:26:36', '2022-04-27 00:26:36'),
(4, 'INV03', 'pulpen', '1', 30, 'lemari C', 'baik', '2022-04-27 00:27:28', '2022-04-27 00:27:28'),
(5, 'INV04', 'catridge', '7', 11, 'gudang', 'baik', '2022-04-27 00:28:04', '2022-04-27 00:28:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
