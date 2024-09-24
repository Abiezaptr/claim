-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 12:19 PM
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
-- Database: `db_penampungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `rekap_klaim`
--

CREATE TABLE `rekap_klaim` (
  `id` int(11) NOT NULL,
  `lob` varchar(50) DEFAULT NULL,
  `penyebab_klaim` varchar(100) DEFAULT NULL,
  `periode` date DEFAULT NULL,
  `nilai_beban_klaim` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_klaim`
--

INSERT INTO `rekap_klaim` (`id`, `lob`, `penyebab_klaim`, `periode`, `nilai_beban_klaim`) VALUES
(34, 'PEN', 'Macet', '2024-09-30', '3500000.00'),
(35, 'PEN', 'Meninggal', '2024-09-30', '950000.00'),
(36, 'KUR', 'Macet', '2024-09-30', '521675063110.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rekap_klaim`
--
ALTER TABLE `rekap_klaim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekap_klaim`
--
ALTER TABLE `rekap_klaim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
