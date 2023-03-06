-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 08:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminar_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `type` enum('benefit','cost') NOT NULL,
  `bobot` float NOT NULL,
  `ada_pilihan` tinyint(1) DEFAULT NULL,
  `urutan_order` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `type`, `bobot`, `ada_pilihan`, `urutan_order`) VALUES
(21, 'Suhu', 'cost', 0.3, 0, 0),
(22, 'Curah Hujan', 'benefit', 0.3, 0, 0),
(23, 'Kelembaban Udara', 'benefit', 0.2, 0, 0),
(24, 'Ketinggian Lahan', 'benefit', 0.2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tanaman`
--

CREATE TABLE `nilai_tanaman` (
  `id_nilai_tanaman` int(11) NOT NULL,
  `id_tanaman` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_tanaman`
--

INSERT INTO `nilai_tanaman` (`id_nilai_tanaman`, `id_tanaman`, `id_kriteria`, `nilai`) VALUES
(119, 18, 21, 3),
(120, 18, 22, 4),
(121, 18, 23, 5),
(122, 18, 24, 3),
(123, 19, 21, 4),
(124, 19, 22, 3),
(125, 19, 23, 5),
(126, 19, 24, 3),
(127, 20, 21, 5),
(128, 20, 22, 3),
(129, 20, 23, 5),
(130, 20, 24, 5),
(131, 21, 21, 5),
(132, 21, 22, 4),
(133, 21, 23, 2),
(134, 21, 24, 2),
(135, 22, 21, 4),
(136, 22, 22, 2),
(137, 22, 23, 1),
(138, 22, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_kriteria`
--

CREATE TABLE `pilihan_kriteria` (
  `id_pil_kriteria` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nilai_min` float NOT NULL,
  `nilai_max` float NOT NULL,
  `nilai` float NOT NULL,
  `urutan_order` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanaman`
--

CREATE TABLE `tanaman` (
  `id_tanaman` int(10) NOT NULL,
  `inisial_tanaman` varchar(6) NOT NULL,
  `nama_tanaman` text NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanaman`
--

INSERT INTO `tanaman` (`id_tanaman`, `inisial_tanaman`, `nama_tanaman`, `tanggal_input`) VALUES
(18, 'A1', 'Padi', '2022-08-29'),
(19, 'A2', 'Jagung', '2022-08-29'),
(20, 'A3', 'Kedelai', '2022-08-29'),
(21, 'A4', 'Cabai Rawit', '2022-08-29'),
(22, 'A5', 'Tomat', '2022-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `alamat`, `role`) VALUES
(7, 'petugas', '12345678', 'Febi Dwi', 'test@thesamplemail.com', 'test', '2'),
(8, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'Hilmy Haidar', 'haidarhilmy2000@gmail.com', 'Jalan Kaliurang', '1'),
(9, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Hilmy Haidar', 'haidarhilmy2000@gmail.com', 'Jalan Kaliurang', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_tanaman`
--
ALTER TABLE `nilai_tanaman`
  ADD PRIMARY KEY (`id_nilai_tanaman`),
  ADD UNIQUE KEY `id_kambing_2` (`id_tanaman`,`id_kriteria`),
  ADD KEY `id_kambing` (`id_tanaman`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `pilihan_kriteria`
--
ALTER TABLE `pilihan_kriteria`
  ADD PRIMARY KEY (`id_pil_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id_tanaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `nilai_tanaman`
--
ALTER TABLE `nilai_tanaman`
  MODIFY `id_nilai_tanaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `pilihan_kriteria`
--
ALTER TABLE `pilihan_kriteria`
  MODIFY `id_pil_kriteria` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `id_tanaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_tanaman`
--
ALTER TABLE `nilai_tanaman`
  ADD CONSTRAINT `nilai_tanaman_ibfk_1` FOREIGN KEY (`id_tanaman`) REFERENCES `tanaman` (`id_tanaman`),
  ADD CONSTRAINT `nilai_tanaman_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Constraints for table `pilihan_kriteria`
--
ALTER TABLE `pilihan_kriteria`
  ADD CONSTRAINT `pilihan_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
