-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2020 pada 13.28
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pegawai`
--
CREATE DATABASE IF NOT EXISTS `data_pegawai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `data_pegawai`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(3) NOT NULL,
  `pegawai_nama` varchar(35) NOT NULL,
  `pegawai_jk` char(2) NOT NULL,
  `pegawai_keahlian` varchar(150) NOT NULL,
  `pegawai_agama` varchar(15) NOT NULL,
  `pegawai_kontak` char(13) NOT NULL,
  `pegawai_email` varchar(35) NOT NULL,
  `pegawai_password` varchar(35) NOT NULL,
  `pegawai_foto` varchar(50) NOT NULL,
  `pegawai_level` varchar(8) NOT NULL,
  `pegawai_aktivasi` char(2) NOT NULL,
  `pegawai_token` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_jk`, `pegawai_keahlian`, `pegawai_agama`, `pegawai_kontak`, `pegawai_email`, `pegawai_password`, `pegawai_foto`, `pegawai_level`, `pegawai_aktivasi`, `pegawai_token`) VALUES
(1, 'Admin', 'L', 'Web Programmer, Mobile Programmer, Desktop Peogrammer', 'Islam', '08123456789', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin.jpg', 'Admin', 'Y', '2321f10249349401aaf95fd57c1e92ec'),
(2, 'Eko Budi Setiawan', 'L', 'Web Programmer, Mobile Programmer, Desktop Peogrammer', 'Islam', '08211252525', 'ekobudisetiawan@ymail.com', '21232f297a57a5a743894a0e4a801fc3', 'Good Couple.jpg', 'Admin', 'T', '62cae298d202fcb5d0f90866472f4960');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
