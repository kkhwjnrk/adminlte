-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2023 pada 15.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminlte`
--
CREATE DATABASE IF NOT EXISTS `adminlte` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `adminlte`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--
-- Pembuatan: 06 Des 2023 pada 16.37
-- Pembaruan terakhir: 08 Des 2023 pada 14.24
--

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `satuan` varchar(2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `updater` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama`, `jenis`, `satuan`, `stok`, `harga`, `create_date`, `updater`) VALUES
('B0001', 'Pulpen', 1, '07', 70, 5000, '2023-12-06 23:46:13', NULL),
('B0002', 'Kacang', 2, '06', 75, 2000, '2023-12-06 23:47:04', NULL),
('B0003', 'Aqua', 3, '03', 41, 22000, '2023-12-06 23:47:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--
-- Pembuatan: 22 Nov 2023 pada 13.39
--

DROP TABLE IF EXISTS `tb_jenis`;
CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` enum('ATK','Makanan','Minuman') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'ATK'),
(2, 'Makanan'),
(3, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluar`
--
-- Pembuatan: 06 Des 2023 pada 13.15
--

DROP TABLE IF EXISTS `tb_keluar`;
CREATE TABLE `tb_keluar` (
  `id_keluar` varchar(50) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `updater` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masuk`
--
-- Pembuatan: 06 Des 2023 pada 13.15
-- Pembaruan terakhir: 08 Des 2023 pada 14.24
--

DROP TABLE IF EXISTS `tb_masuk`;
CREATE TABLE `tb_masuk` (
  `id_masuk` varchar(50) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `updater` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_masuk`
--

INSERT INTO `tb_masuk` (`id_masuk`, `tgl_masuk`, `id_barang`, `jumlah`, `create_date`, `updater`) VALUES
('BM-081223-0001', '2023-12-08', 'B0001', 5, NULL, NULL),
('BM-081223-0002', '2023-12-08', 'B0001', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--
-- Pembuatan: 06 Des 2023 pada 16.42
-- Pembaruan terakhir: 06 Des 2023 pada 16.45
--

DROP TABLE IF EXISTS `tb_satuan`;
CREATE TABLE `tb_satuan` (
  `id_satuan` varchar(2) NOT NULL,
  `satuan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`) VALUES
('01', 'Unit'),
('02', 'Butir'),
('03', 'Dus'),
('04', 'Kg'),
('05', 'Liter'),
('06', 'Bungkus'),
('07', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--
-- Pembuatan: 01 Des 2023 pada 15.53
-- Pembaruan terakhir: 06 Des 2023 pada 13.02
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `status`, `create_date`) VALUES
(123455, 'admin', 'admin', 'Aktif', NULL),
(812394, 'Kukuh', 'kukuh', 'Tidak Aktif', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `jenis_id` (`jenis`),
  ADD KEY `updater_id` (`updater`),
  ADD KEY `satuan` (`satuan`) USING BTREE;

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`jenis`) REFERENCES `tb_jenis` (`id_jenis`),
  ADD CONSTRAINT `tb_barang_ibfk_3` FOREIGN KEY (`updater`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_barang_ibfk_4` FOREIGN KEY (`satuan`) REFERENCES `tb_satuan` (`id_satuan`);

--
-- Ketidakleluasaan untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD CONSTRAINT `tb_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD CONSTRAINT `tb_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
