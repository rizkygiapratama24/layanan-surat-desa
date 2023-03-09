-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 05:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan-surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenis_surat` int(11) NOT NULL,
  `nama_jenis_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenis_surat`, `nama_jenis_surat`) VALUES
(1, 'Biodata'),
(2, 'Biodata Penduduk'),
(3, 'Domisli Usaha Non-Warga'),
(4, 'Keterangan Domisli'),
(5, 'Keterangan Domisli Usaha'),
(6, 'Keterangan Kelahiran'),
(7, 'Keterangan KTP Dalam Proses'),
(8, 'Keterangan Miskin'),
(9, 'Keterangan Penduduk'),
(10, 'Keterangan Pengantar'),
(11, 'Keterangan Pindah Penduduk'),
(12, 'Keterangan Untuk Nikah (N-1 s/d N-7)'),
(13, 'Keterangan Usaha'),
(14, 'Kuasa'),
(15, 'Pengantar Izin Keramaian '),
(16, 'Pengantar Surat Keterangan Catatan Kepolisian'),
(17, 'Permohonan Akta Lahir'),
(18, 'Permohonan Kartu Keluarga'),
(19, 'Permohonan Perubahan Kartu Keluarga'),
(20, 'Raw TinyMCE');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `sedia_mandiri` enum('Ya','Tidak') NOT NULL,
  `status_surat` enum('Aktif','Nonaktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_jenis_surat`, `nama_surat`, `file_surat`, `sedia_mandiri`, `status_surat`, `created_at`, `updated_at`) VALUES
(10, 10, 'Surat Pengantar SKCK', 'Formulir-SKCK.docx', 'Ya', 'Aktif', '2023-03-08 14:01:46', '2023-03-09 20:38:50'),
(13, 4, 'Surat Keterangan Domisli', '', 'Ya', 'Nonaktif', '2023-03-09 14:45:07', '2023-03-09 22:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `surat_layanan`
--

CREATE TABLE `surat_layanan` (
  `id_surat_layanan` int(11) NOT NULL,
  `id_syarat_surat` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_layanan`
--

INSERT INTO `surat_layanan` (`id_surat_layanan`, `id_syarat_surat`, `id_surat`) VALUES
(16, 18, 10),
(21, 18, 13),
(17, 19, 10),
(26, 19, 13),
(18, 20, 10),
(22, 20, 13),
(27, 21, 10);

-- --------------------------------------------------------

--
-- Table structure for table `syarat_surat`
--

CREATE TABLE `syarat_surat` (
  `id_syarat_surat` int(11) NOT NULL,
  `nama_syarat_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syarat_surat`
--

INSERT INTO `syarat_surat` (`id_syarat_surat`, `nama_syarat_surat`) VALUES
(18, 'KTP/SIM'),
(19, 'Surat Keterangan RT & RW'),
(20, 'Fotocopy Akta Kelahiran'),
(21, 'Fotocopy Kartu Keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `password_updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `email`, `role`, `avatar`, `created_at`, `last_login`, `password_updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$XG7ickJghZ3jFvp1oDALne7YpNzaXqlL4Sa0oU/bXbM6MNLdxdCDW', 'desamargajaya@gmail.com', 'Admin', '1.png', '2022-12-22 11:57:05', '2022-12-23 03:19:19', '2022-12-23 03:19:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indexes for table `surat_layanan`
--
ALTER TABLE `surat_layanan`
  ADD PRIMARY KEY (`id_surat_layanan`),
  ADD KEY `id_syarat_surat` (`id_syarat_surat`,`id_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `syarat_surat`
--
ALTER TABLE `syarat_surat`
  ADD PRIMARY KEY (`id_syarat_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_layanan`
--
ALTER TABLE `surat_layanan`
  MODIFY `id_surat_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `syarat_surat`
--
ALTER TABLE `syarat_surat`
  MODIFY `id_syarat_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id_jenis_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_layanan`
--
ALTER TABLE `surat_layanan`
  ADD CONSTRAINT `surat_layanan_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_layanan_ibfk_2` FOREIGN KEY (`id_syarat_surat`) REFERENCES `syarat_surat` (`id_syarat_surat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
