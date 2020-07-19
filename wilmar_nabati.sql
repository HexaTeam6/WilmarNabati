-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2020 pada 16.14
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilmar_nabati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `keterangan`, `updated_at`) VALUES
(2, 'Minyak Goreng', 'Minyaka', '2020-07-18 21:18:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `kode_akses` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `kode_akses`, `nama`, `password`, `updated_at`) VALUES
(1, 'admin', 0, 'Administrator', '44f876b4845b0dc297160ebb4691ae8f', '2020-07-18 06:19:14'),
(3, 'plan1', 1, 'PLAN', 'b883d068ea38e503730295c6546d59d7', '2020-07-18 20:33:14'),
(4, 'qc1', 3, 'QC', 'b883d068ea38e503730295c6546d59d7', '2020-07-19 04:29:37'),
(5, 'wh1', 2, 'WH', 'b883d068ea38e503730295c6546d59d7', '2020-07-19 04:42:28'),
(6, 'ppic', 4, 'PPIC', 'b883d068ea38e503730295c6546d59d7', '2020-07-19 04:42:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `plan`
--

CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `id_login` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `line` int(11) DEFAULT NULL,
  `target_produksi` int(11) DEFAULT NULL,
  `t_shift1` int(11) DEFAULT NULL,
  `t_shift2` int(11) DEFAULT NULL,
  `t_shift3` int(11) DEFAULT NULL,
  `total_produksi` int(11) DEFAULT NULL,
  `total_reject` int(11) DEFAULT NULL,
  `r_shift1` int(11) DEFAULT NULL,
  `r_shift2` int(11) DEFAULT NULL,
  `r_shift3` int(11) DEFAULT NULL,
  `received` int(11) DEFAULT NULL,
  `outgoing` int(11) DEFAULT NULL,
  `end_stock` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `plan`
--

INSERT INTO `plan` (`id_plan`, `id_produk`, `id_satuan`, `id_login`, `tanggal`, `stock`, `line`, `target_produksi`, `t_shift1`, `t_shift2`, `t_shift3`, `total_produksi`, `total_reject`, `r_shift1`, `r_shift2`, `r_shift3`, `received`, `outgoing`, `end_stock`, `updated_at`) VALUES
(1, 2, 4, 1, '2020-07-19', 1, 2, 3, 4, 5, 6, 15, 24, 7, 8, 9, 10, 11, -19, '2020-07-19 03:35:37'),
(4, 2, 4, 3, '2020-07-05', 10, 9, 9, 9, 9, 9, 27, 45, 15, 15, 15, 100, 11, -19, '2020-07-19 05:24:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_jenis`, `nama_produk`, `keterangan`, `updated_at`) VALUES
(2, 2, 'Sania 1PL', '', '2020-07-19 03:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `keterangan`, `updated_at`) VALUES
(4, 'L', 'Liter', '2020-07-19 03:10:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
