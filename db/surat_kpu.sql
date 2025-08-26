-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2025 at 05:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_kpu`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tujuan` varchar(150) DEFAULT NULL,
  `tanggal_keluar` datetime DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_surat`, `keterangan`, `tujuan`, `tanggal_keluar`, `kategori`, `file_surat`) VALUES
(3, '003/KPU/VII/2025', 'WKWKWKWK', 'HIHIHIHHIIHI', '2025-08-23 00:00:00', 'Buku SPPD', '1755952416_4be8aa7932c1e6b8e8a7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `pengirim` varchar(150) DEFAULT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor_surat`, `keterangan`, `pengirim`, `tanggal_masuk`, `kategori`, `file_surat`) VALUES
(6, '003/KPU/VII/2025', 'HAHAHAHA', 'KPRI', '2025-08-23 00:00:00', 'Buku Agenda Distribusi Surat Masuk Bagian Keuangan, Umum, dan Logistik ke Subbag Keuangan dan BMN da', '1755952163_745fb7b8e3933d736140.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
