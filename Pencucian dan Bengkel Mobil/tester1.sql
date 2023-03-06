-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2019 pada 04.38
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tester1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` char(5) NOT NULL,
  `tipe` varchar(9) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `tipe`, `jumlah`, `harga`) VALUES
('J0001', 'MPV', 2, 250000),
('J0002', 'SUV', 0, 400000),
('J0003', 'HATCHBACK', 2, 250000),
('J0004', 'ELF', 2, 300000),
('J0005', 'SEDAN', 0, 450000),
('J0006', 'PICK UP', 2, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE `kembali` (
  `id_kembali` int(5) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_harus_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kembali`
--

INSERT INTO `kembali` (`id_kembali`, `id_transaksi`, `tgl_kembali`, `tgl_harus_kembali`) VALUES
(9, 133, NULL, '2019-11-08'),
(10, 135, NULL, '2019-11-09'),
(11, 139, NULL, '2019-11-15'),
(12, 140, NULL, '2019-11-15'),
(13, 141, NULL, '2019-11-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` char(5) NOT NULL,
  `no_sim` char(12) DEFAULT NULL,
  `tgl_bergabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `no_sim`, `tgl_bergabung`) VALUES
('11111', '888', '2019-11-08'),
('3', '333', '2019-11-08'),
('99', '999', '2019-11-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `plat` varchar(9) NOT NULL,
  `id_jenis` char(5) DEFAULT NULL,
  `seri_mobil` varchar(50) DEFAULT NULL,
  `transmisi` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`plat`, `id_jenis`, `seri_mobil`, `transmisi`) VALUES
('A7899QR', 'J0004', 'Isuzu ELF', 'manual'),
('AA7865ER', 'J0002', 'Toyota Fortuner', 'matic'),
('AB12345CD', 'J0001', 'Toyota Avanza', 'manual'),
('AB1802KA', 'J0006', 'Daihatsu Gran-max', 'manual'),
('AB2390HG', 'J0001', 'Daihatsu Xenia', 'manual'),
('AB8403DE', 'J0006', 'Suzuki Carry ', 'manual'),
('AD7982IH', 'J0003', 'Toyota Yaris', 'matic'),
('B34ST', 'J0005', 'Honda Civic Type R', 'matic'),
('B8021KG', 'J0004', 'Toyota Hiace', 'manual'),
('BG7254AH', 'J0003', 'Honda Jazz', 'manual'),
('D45SS', 'J0005', 'Toyota Altis', 'matic'),
('D9999AD', 'J0002', 'Mitsubishi Pajero', 'matic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` char(5) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `password` char(8) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `Nama`, `password`, `no_telp`) VALUES
('P0001', 'Hilmy Haidar', '12345678', '081344634263'),
('P0005', 'Febi Dwi Andriansyah', '12345678', '081323336067'),
('P0007', 'Alex', '1', '081344634263'),
('P0009', 'Tampan', '12345678', '99383030'),
('P0010', 'Ganteng', '12345678', '081344634263');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_sopir`
--

CREATE TABLE `peminjaman_sopir` (
  `id_sopir` char(5) NOT NULL,
  `Nama` varchar(20) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman_sopir`
--

INSERT INTO `peminjaman_sopir` (`id_sopir`, `Nama`, `no_telp`) VALUES
('00000', 'None', '-'),
('S0001', 'Febi Dwi Andriansyah', '081344634263'),
('S0002', 'Joko Anwar', '081355674265'),
('S0003', 'Theofilus Abner', '085344724372');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `no_sim` char(12) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `password` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`no_sim`, `Nama`, `alamat`, `no_telp`, `password`) VALUES
('19', 'febi', 'buayan', '0895377963665', '1'),
('333', 'agung', 'babarsari', '99383030', '3'),
('8', 'Joko Anwar', 'manokwari', '081344634263', '8'),
('888', 'wawe', 'manokwari', '085344724372', '8'),
('999', 'rahul', 'jogja', '0895377963664', '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_pegawai` char(5) DEFAULT NULL,
  `no_sim` char(12) DEFAULT NULL,
  `plat` varchar(9) DEFAULT NULL,
  `id_sopir` char(5) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pegawai`, `no_sim`, `plat`, `id_sopir`, `tgl_transaksi`, `harga`, `status`) VALUES
(133, 'P0001', '333', 'B34ST', 'S0001', '2019-11-07', 495000, 'dipinjam'),
(135, 'P0007', '333', 'AB1802KA', 'S0001', '2019-11-08', 270000, 'dipinjam'),
(139, 'P0001', '333', 'D45SS', '00000', '2019-11-14', 495000, 'dipinjam'),
(140, 'P0001', '19', 'AA7865ER', '00000', '2019-11-14', 500000, 'dipinjam'),
(141, 'P0005', '19', 'AA7865ER', '00000', '2019-11-18', 400000, 'dipinjam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `fkid_transaksii` (`id_transaksi`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `cno_sim` (`no_sim`),
  ADD KEY `fkno_sim` (`no_sim`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`plat`),
  ADD KEY `fkid_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `peminjaman_sopir`
--
ALTER TABLE `peminjaman_sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`no_sim`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fkiplat` (`plat`),
  ADD KEY `fkid_pegawai` (`id_pegawai`),
  ADD KEY `fkid_sopir` (`id_sopir`),
  ADD KEY `fkno_simm` (`no_sim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kembali`
--
ALTER TABLE `kembali`
  MODIFY `id_kembali` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD CONSTRAINT `fkid_transaksii` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fkno_sim` FOREIGN KEY (`no_sim`) REFERENCES `penyewa` (`no_sim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `fkid_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fkfhg` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkid_sopir` FOREIGN KEY (`id_sopir`) REFERENCES `peminjaman_sopir` (`id_sopir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkiplat` FOREIGN KEY (`plat`) REFERENCES `mobil` (`plat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkno_simm` FOREIGN KEY (`no_sim`) REFERENCES `penyewa` (`no_sim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
