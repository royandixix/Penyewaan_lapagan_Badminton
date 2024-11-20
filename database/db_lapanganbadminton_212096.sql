-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 10:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lapanganbadminton_212096`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_212096`
--

CREATE TABLE `jadwal_212096` (
  `idjadwal_212096` int(11) NOT NULL,
  `tanggal_212096` date NOT NULL,
  `status_212096` enum('tersedia','tidaktersedia') NOT NULL,
  `idlapangan_212096` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan_212096`
--

CREATE TABLE `lapangan_212096` (
  `idlapangan_212096` int(11) NOT NULL,
  `namalapangan_212096` varchar(100) NOT NULL,
  `harga_212096` varchar(100) NOT NULL,
  `gambar_212096` varchar(255) NOT NULL,
  `tanggal_waktu_212096` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lapangan_212096`
--

INSERT INTO `lapangan_212096` (`idlapangan_212096`, `namalapangan_212096`, `harga_212096`, `gambar_212096`, `tanggal_waktu_212096`) VALUES
(1, 'lapagan 1', '100', 'img/inputan/istockphoto-1390191053-2048x2048.jpg', '2024-10-28 04:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_212096`
--

CREATE TABLE `pembayaran_212096` (
  `idpembayaran_212096` int(11) NOT NULL,
  `idpemesanan_212096` int(11) NOT NULL,
  `metodepembayaran_212096` varchar(100) NOT NULL,
  `jumlahbayar_212096` varchar(100) NOT NULL,
  `tanggalbayar_212096` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_212096`
--

CREATE TABLE `pemesanan_212096` (
  `idpemesanan_212096` int(11) NOT NULL,
  `idpengguna_212096` int(11) NOT NULL,
  `idlapangan_212096` int(11) NOT NULL,
  `tanggalpemesanan_212096` datetime NOT NULL,
  `jammulai_212096` time NOT NULL,
  `jamselesai_212096` time NOT NULL,
  `konfirmasi_212096` tinyint(1) NOT NULL DEFAULT 0,
  `nama_212096` varchar(255) NOT NULL,
  `alamat_212096` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_212096`
--

INSERT INTO `pemesanan_212096` (`idpemesanan_212096`, `idpengguna_212096`, `idlapangan_212096`, `tanggalpemesanan_212096`, `jammulai_212096`, `jamselesai_212096`, `konfirmasi_212096`, `nama_212096`, `alamat_212096`) VALUES
(1, 1, 1, '2024-11-21 10:00:00', '10:00:00', '11:00:00', 0, '', ''),
(2, 1, 1, '2024-11-21 04:23:42', '10:10:00', '11:11:00', 1, '', ''),
(3, 1, 1, '2024-11-21 05:20:49', '11:10:00', '01:10:00', 0, 'royandi', 'mamuju');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_212096`
--

CREATE TABLE `pengguna_212096` (
  `idpengguna_212096` int(11) NOT NULL,
  `nama_212096` varchar(100) NOT NULL,
  `email_212096` varchar(100) NOT NULL,
  `password_212096` varchar(100) NOT NULL,
  `no_telp_212096` varchar(100) NOT NULL,
  `role_212096` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna_212096`
--

INSERT INTO `pengguna_212096` (`idpengguna_212096`, `nama_212096`, `email_212096`, `password_212096`, `no_telp_212096`, `role_212096`) VALUES
(1, 'gas', 'gas@gmail.com', '$2y$10$OyO1DYu1udJeN.DwFP44tOMP0oblnrsUoRxaSSkry4ry2ok.He5mO', '', 'admin'),
(2, 'admin', 'admin@gmail.com', '$2y$10$02y975Fx8J39jtBwIWLOv.UqDaBcVL2N9x3Oowa94xPI.AH2A/hGC', '081347018612', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_212096`
--
ALTER TABLE `jadwal_212096`
  ADD PRIMARY KEY (`idjadwal_212096`),
  ADD KEY `idlapangan_212096` (`idlapangan_212096`);

--
-- Indexes for table `lapangan_212096`
--
ALTER TABLE `lapangan_212096`
  ADD PRIMARY KEY (`idlapangan_212096`);

--
-- Indexes for table `pembayaran_212096`
--
ALTER TABLE `pembayaran_212096`
  ADD PRIMARY KEY (`idpembayaran_212096`),
  ADD KEY `idpemesanan_212096` (`idpemesanan_212096`);

--
-- Indexes for table `pemesanan_212096`
--
ALTER TABLE `pemesanan_212096`
  ADD PRIMARY KEY (`idpemesanan_212096`),
  ADD KEY `idpengguna_212096` (`idpengguna_212096`),
  ADD KEY `idlapangan_212096` (`idlapangan_212096`);

--
-- Indexes for table `pengguna_212096`
--
ALTER TABLE `pengguna_212096`
  ADD PRIMARY KEY (`idpengguna_212096`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_212096`
--
ALTER TABLE `jadwal_212096`
  MODIFY `idjadwal_212096` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapangan_212096`
--
ALTER TABLE `lapangan_212096`
  MODIFY `idlapangan_212096` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran_212096`
--
ALTER TABLE `pembayaran_212096`
  MODIFY `idpembayaran_212096` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan_212096`
--
ALTER TABLE `pemesanan_212096`
  MODIFY `idpemesanan_212096` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna_212096`
--
ALTER TABLE `pengguna_212096`
  MODIFY `idpengguna_212096` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_212096`
--
ALTER TABLE `jadwal_212096`
  ADD CONSTRAINT `jadwal_212096_ibfk_1` FOREIGN KEY (`idlapangan_212096`) REFERENCES `lapangan_212096` (`idlapangan_212096`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran_212096`
--
ALTER TABLE `pembayaran_212096`
  ADD CONSTRAINT `pembayaran_212096_ibfk_1` FOREIGN KEY (`idpemesanan_212096`) REFERENCES `pemesanan_212096` (`idpemesanan_212096`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_212096`
--
ALTER TABLE `pemesanan_212096`
  ADD CONSTRAINT `pemesanan_212096_ibfk_1` FOREIGN KEY (`idpengguna_212096`) REFERENCES `pengguna_212096` (`idpengguna_212096`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_212096_ibfk_2` FOREIGN KEY (`idlapangan_212096`) REFERENCES `lapangan_212096` (`idlapangan_212096`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
