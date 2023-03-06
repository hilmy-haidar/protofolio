-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 09:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` char(5) NOT NULL,
  `tipe` varchar(9) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `tipe`, `jumlah`, `harga`) VALUES
('J0001', 'MPV', 2, 350000),
('J0002', 'SUV', 2, 400000),
('J0003', 'HATCHBACK', 2, 250000),
('J0004', 'ELF', 2, 300000),
('J0005', 'SEDAN', 1, 450000),
('J0006', 'PICK UP', 3, 200000),
('J0007', 'COUPE', 1, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `id_kembali` char(5) NOT NULL,
  `id_transaksi` char(5) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_hrs_kembali` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` char(5) NOT NULL,
  `no_sim` char(12) DEFAULT NULL,
  `tgl_bergabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `plat` varchar(9) NOT NULL,
  `id_jenis` char(5) DEFAULT NULL,
  `seri_mobil` varchar(9) DEFAULT NULL,
  `transmisi` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` char(5) NOT NULL,
  `Nama` varchar(20) DEFAULT NULL,
  `password` char(8) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_sopir`
--

CREATE TABLE `peminjaman_sopir` (
  `id_sopir` char(5) NOT NULL,
  `Nama` varchar(20) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `no_sim` char(12) NOT NULL,
  `Nama` varchar(13) DEFAULT NULL,
  `alamat` varchar(13) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(5) NOT NULL,
  `id_pegawai` char(5) DEFAULT NULL,
  `no_sim` char(12) DEFAULT NULL,
  `plat` varchar(9) DEFAULT NULL,
  `id_sopir` char(5) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `fkid_transaksi` (`id_transaksi`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `fkno_sim` (`no_sim`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`plat`),
  ADD KEY `fkid_jenis` (`id_jenis`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman_sopir`
--
ALTER TABLE `peminjaman_sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`no_sim`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fkiplat` (`plat`),
  ADD KEY `fkid_pegawai` (`id_pegawai`),
  ADD KEY `fkid_sopir` (`id_sopir`),
  ADD KEY `fkno_simm` (`no_sim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kembali`
--
ALTER TABLE `kembali`
  ADD CONSTRAINT `fkid_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fkno_sim` FOREIGN KEY (`no_sim`) REFERENCES `penyewa` (`no_sim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `fkid_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fkid_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkid_sopir` FOREIGN KEY (`id_sopir`) REFERENCES `peminjaman_sopir` (`id_sopir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkiplat` FOREIGN KEY (`plat`) REFERENCES `mobil` (`plat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkno_simm` FOREIGN KEY (`no_sim`) REFERENCES `penyewa` (`no_sim`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
