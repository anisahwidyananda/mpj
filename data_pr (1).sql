-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2020 pada 15.47
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
  `tgl_daftar` datetime DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `status` enum('belum','proses','terdaftar','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `username`, `password`, `tgl_daftar`, `level`, `status`) VALUES
(1, 'Admin', 'ppbj@petrokimia-gresik.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-26 00:00:00', 'admin', 'terdaftar'),
(17, 'aa', 'anisahwidya99@gmail.com', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '2017-08-17 00:08:46', 'user', 'terdaftar'),
(16, 'Iqbal', 'muhdiqbalfarabi@gmail.com', 'faarabi', 'f2d55fc5ea1b07df80239a2ac96b8579', '2017-06-13 08:06:33', 'user', 'terdaftar'),
(14, 'Ayyasy', 'ayyas@winteq.component.astra.co.id', 'ayyasyazzurqi', 'f2d55fc5ea1b07df80239a2ac96b8579', '2017-05-03 10:05:16', 'user', 'terdaftar'),
(19, 'sfdjg', 'anwarsptr@gmail.com', 'anwar-kun', 'c4ca4238a0b923820dcc509a6f75849b', '2017-09-07 10:09:18', 'user', 'terdaftar'),
(20, 'sdfg', NULL, 'anwar', 'c4ca4238a0b923820dcc509a6f75849b', '2017-09-07 10:09:31', 'user', 'belum'),
(21, 'aaaaaaa', '', 'anwarsptr', 'c4ca4238a0b923820dcc509a6f75849b', '2017-09-07 10:09:30', 'user', 'proses'),
(22, 'Bachrul Arief F', 'ariefbachrul@yahoo.co.id', '', NULL, NULL, 'user', 'proses'),
(23, 'M. Herdiansyah', NULL, NULL, NULL, NULL, 'user', 'belum'),
(24, 'Bachrul Arief Firmansyah', 'bachrularief@bacillabs.id', 'ariefbachrul', '383d2e939b1926fbdcb6f8e4e5e66fd0', '2017-09-27 09:09:05', 'user', 'terdaftar'),
(38, 'Bachrul Arief Firmansyah', NULL, 'bachrul', 'cd0e6dc3b61d5c47add61a8e56191e01', NULL, 'user', 'terdaftar'),
(39, 'Erwin', NULL, 'erwin', '785f0b13d4daf8eee0d11195f58302a4', NULL, 'user', 'belum');

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
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `progress_bulan`
--
ALTER TABLE `progress_bulan`
  MODIFY `progress_bulan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
