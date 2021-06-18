-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2021 pada 13.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `progress_id` int(11) NOT NULL,
  `progress_bulan_id` int(11) NOT NULL,
  `progress_nama` varchar(125) DEFAULT NULL,
  `progress_tanggal_mulai` date DEFAULT NULL,
  `progress_tanggal_akhir` date DEFAULT NULL,
  `progress_plan` double DEFAULT 0,
  `progress_actual` double DEFAULT 0,
  `progress_status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`progress_id`, `progress_bulan_id`, `progress_nama`, `progress_tanggal_mulai`, `progress_tanggal_akhir`, `progress_plan`, `progress_actual`, `progress_status`) VALUES
(4, 3, 'Minggu 1', '2019-01-01', '2019-01-07', 2.73, 2.53, 1),
(5, 3, 'Minggu 2', '2019-01-08', '2019-01-14', 3.09, 0.05, 2),
(6, 3, 'Minggu 3', '2019-01-15', '2019-01-21', 3.09, 1.21, 1),
(7, 3, 'Minggu 4', '2019-01-22', '2019-01-28', 3.09, 0.02, 1),
(8, 3, 'Minggu 5', '2019-01-29', '2019-02-04', 3.78, 4.21, 1),
(9, 4, 'Minggu 6', '2019-02-05', '2019-02-11', 5.5, 1.61, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_bulan`
--

CREATE TABLE `progress_bulan` (
  `progress_bulan_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `progress_bulan_bulan` date DEFAULT NULL,
  `progress_bulan_plan` double DEFAULT NULL,
  `progress_bulan_actual` double DEFAULT NULL,
  `progress_bulan_pembayaran` bigint(20) DEFAULT NULL,
  `progress_bulan_status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progress_bulan`
--

INSERT INTO `progress_bulan` (`progress_bulan_id`, `project_id`, `progress_bulan_bulan`, `progress_bulan_plan`, `progress_bulan_actual`, `progress_bulan_pembayaran`, `progress_bulan_status`) VALUES
(3, 1, '2019-01-01', 15.78, 8.02, 299892588, 1),
(4, 1, '2019-02-05', 5.5, 1.61, 415706620, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_nama` varchar(255) DEFAULT NULL,
  `project_nilai` bigint(20) DEFAULT 0,
  `project_dp` int(11) DEFAULT 0,
  `project_status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`project_id`, `project_nama`, `project_nilai`, `project_dp`, `project_status`) VALUES
(1, 'Instalasi Pipa Cleaning Di Jalur Belerang', 2375575000, 20, 1),
(2, 'Penggantian Digester R-2302-C', 18860000000, 15, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT current_timestamp(),
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `username`, `password`, `tgl_daftar`, `level`) VALUES
(1, 'Admin', 'ppbj@petrokimia-gresik.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-26 00:00:00', 'admin'),
(17, 'Anisah', 'anisahwidya99@gmail.com', 'anisah', '827ccb0eea8a706c4c34a16891f84e7b', '2017-08-17 00:08:46', 'user'),
(16, 'Indah', 'nurindah@gmail.com', 'indah', 'f3385c508ce54d577fd205a1b2ecdfb7', '2017-06-13 08:06:33', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `fk_progress_progress_bulan1` (`progress_bulan_id`);

--
-- Indeks untuk tabel `progress_bulan`
--
ALTER TABLE `progress_bulan`
  ADD PRIMARY KEY (`progress_bulan_id`),
  ADD KEY `fk_progress_bulan_project` (`project_id`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `progress_bulan`
--
ALTER TABLE `progress_bulan`
  MODIFY `progress_bulan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `fk_progress_progress_bulan1` FOREIGN KEY (`progress_bulan_id`) REFERENCES `progress_bulan` (`progress_bulan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `progress_bulan`
--
ALTER TABLE `progress_bulan`
  ADD CONSTRAINT `fk_progress_bulan_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
