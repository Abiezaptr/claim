-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 12:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `klaim_per_lob`
--

CREATE TABLE `klaim_per_lob` (
  `id` int(11) NOT NULL,
  `lob` varchar(50) DEFAULT NULL,
  `penyebab_klaim` varchar(100) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `nilai_beban_klaim` decimal(15,2) DEFAULT NULL,
  `periode` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klaim_per_lob`
--

INSERT INTO `klaim_per_lob` (`id`, `lob`, `penyebab_klaim`, `jumlah_peserta`, `nilai_beban_klaim`, `periode`) VALUES
(1, 'Konsumtif', 'Kebakaran', 20, '6500000.00', '2024-09-30'),
(2, 'PEN', 'Macet', 10, '3500000.00', '2024-09-30'),
(3, 'PEN', 'Meninggal', 8, '950000.00', '2024-09-30'),
(4, 'Produktif', 'Macet', 1062, '939988427.00', '2023-09-30'),
(5, 'Produktif', 'Meninggal', 16, '462238213.00', '2024-09-30'),
(6, 'KUR', 'Macet', 85331, '521675063110.00', '2024-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `log_pengiriman`
--

CREATE TABLE `log_pengiriman` (
  `id` int(11) NOT NULL,
  `tanggal_proses` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlah_data` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_pengiriman`
--

INSERT INTO `log_pengiriman` (`id`, `tanggal_proses`, `jumlah_data`, `status`, `keterangan`) VALUES
(1, '2024-09-24 05:28:13', 5, 'Sukses', 'Data berhasil dikirim'),
(2, '2024-09-24 05:28:16', 5, 'Sukses', 'Data berhasil dikirim'),
(3, '2024-09-24 06:24:54', 5, 'Sukses', 'Data berhasil dikirim'),
(4, '2024-09-24 06:32:34', 5, 'Sukses', 'Data berhasil dikirim'),
(5, '2024-09-24 06:38:32', 2, 'Sukses', 'Data berhasil dikirim'),
(6, '2024-09-24 08:37:50', 2, 'Sukses', 'Data berhasil dikirim'),
(7, '2024-09-24 09:54:33', 2, 'Sukses', 'Data berhasil dikirim'),
(8, '2024-09-24 09:54:35', 2, 'Sukses', 'Data berhasil dikirim'),
(9, '2024-09-24 09:59:41', 2, 'Sukses', 'Data berhasil dikirim'),
(10, '2024-09-24 10:00:58', 3, 'Sukses', 'Data berhasil dikirim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klaim_per_lob`
--
ALTER TABLE `klaim_per_lob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_pengiriman`
--
ALTER TABLE `log_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klaim_per_lob`
--
ALTER TABLE `klaim_per_lob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_pengiriman`
--
ALTER TABLE `log_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
