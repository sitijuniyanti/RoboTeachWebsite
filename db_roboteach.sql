-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2020 at 01:18 PM
-- Server version: 10.4.13-MariaDB-log
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_roboteach`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(30) NOT NULL,
  `nama_alat` varchar(45) NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cuaca`
--

CREATE TABLE `cuaca` (
  `id_cuaca` int(30) NOT NULL,
  `id_sekolah` varchar(5) NOT NULL,
  `rain` text DEFAULT NULL,
  `humadity` text DEFAULT NULL,
  `temperature` text DEFAULT NULL,
  `wind` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(30) NOT NULL,
  `id_sekolah` varchar(5) NOT NULL,
  `hari` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_sekolah`, `hari`, `tanggal`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 'S001', 'Senin', '2020-06-23', '2020-06-23 10:00:00', '2020-06-23 13:00:00'),
(5, 'S002', 'dsd', '2019-09-04', '2020-06-15 21:44:22', '2020-06-23 21:44:22'),
(6, 'S002', 'rabu', '1970-01-01', '2020-06-30 12:00:00', '2020-06-30 11:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pengajar`
--

CREATE TABLE `jadwal_pengajar` (
  `id_jadwal_pengajar` int(30) NOT NULL,
  `id_pengajar` varchar(6) NOT NULL,
  `id_jadwal` int(30) NOT NULL,
  `jarak` double DEFAULT NULL,
  `biaya_km` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_alat`
--

CREATE TABLE `peminjaman_alat` (
  `id_peminjaman_alat` int(30) NOT NULL,
  `id_jadwal` int(30) NOT NULL,
  `id_alat` int(30) NOT NULL,
  `jumlah` int(30) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('DIPINJAM','DIKEMBALIKAN') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` varchar(6) NOT NULL,
  `id_user` int(30) DEFAULT NULL,
  `nama_lengkap` varchar(60) DEFAULT NULL,
  `nama_panggilan` varchar(30) DEFAULT NULL,
  `status` enum('Tetap','Freelance') DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `tahun_join` varchar(4) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `token` varchar(35) DEFAULT NULL,
  `lat_pengajar` varchar(45) DEFAULT NULL,
  `long_pengajar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `id_user`, `nama_lengkap`, `nama_panggilan`, `status`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `email`, `tahun_join`, `foto`, `token`, `lat_pengajar`, `long_pengajar`) VALUES
('P001', 2, NULL, NULL, 'Tetap', NULL, NULL, NULL, NULL, NULL, 'sitijuniyanti@gmail.com', NULL, NULL, NULL, NULL, NULL),
('P002', 4, NULL, NULL, 'Tetap', NULL, NULL, NULL, NULL, NULL, 'sitijuniyanti@gmail.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id_reminder` int(30) NOT NULL,
  `id_jadwal_pengajar` int(30) DEFAULT NULL,
  `id_cuaca` int(30) DEFAULT NULL,
  `waktu_sampai` text DEFAULT NULL,
  `waktu_persiapan` text DEFAULT NULL,
  `waktu_pengecekan` text DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` varchar(5) NOT NULL,
  `id_user` int(30) NOT NULL,
  `nama_sekolah` varchar(45) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `lat_sekolah` varchar(45) DEFAULT NULL,
  `long_sekolah` varchar(45) DEFAULT NULL,
  `nama_penanggungjawab` varchar(45) NOT NULL,
  `no_hp_pj` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `id_user`, `nama_sekolah`, `alamat_sekolah`, `lat_sekolah`, `long_sekolah`, `nama_penanggungjawab`, `no_hp_pj`) VALUES
('S001', 1, 'sd01', ' jalan sd01', '1232', '2222', 'aa', '123'),
('S002', 2, 'FA', 'Fa', '1', '1', 'uhuj', '987777');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(30) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` enum('ADMIN','PENGAJAR','SEKOLAH') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'sd01', '998ad643b1a9e5314ebd6cbd879211a3', 'SEKOLAH'),
(2, NULL, NULL, 'PENGAJAR'),
(3, NULL, NULL, 'PENGAJAR'),
(4, NULL, NULL, 'PENGAJAR'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `cuaca`
--
ALTER TABLE `cuaca`
  ADD PRIMARY KEY (`id_cuaca`),
  ADD KEY `cuaca_ibfk_1` (`id_sekolah`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_sekolah_idx` (`id_sekolah`) USING BTREE;

--
-- Indexes for table `jadwal_pengajar`
--
ALTER TABLE `jadwal_pengajar`
  ADD PRIMARY KEY (`id_jadwal_pengajar`),
  ADD UNIQUE KEY `id_pengajar_unique` (`id_pengajar`),
  ADD UNIQUE KEY `id_jadwal_unique` (`id_jadwal`);

--
-- Indexes for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD PRIMARY KEY (`id_peminjaman_alat`),
  ADD UNIQUE KEY `id_jadwal_unique` (`id_jadwal`),
  ADD UNIQUE KEY `id_alat_unique` (`id_alat`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD UNIQUE KEY `fk_id_user_idx` (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id_reminder`),
  ADD UNIQUE KEY `id_jadwal_pengajar_unique` (`id_jadwal_pengajar`),
  ADD UNIQUE KEY `id_cuaca_idx` (`id_cuaca`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD UNIQUE KEY `id_user_unique` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuaca`
--
ALTER TABLE `cuaca`
  MODIFY `id_cuaca` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_pengajar`
--
ALTER TABLE `jadwal_pengajar`
  MODIFY `id_jadwal_pengajar` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  MODIFY `id_peminjaman_alat` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id_reminder` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuaca`
--
ALTER TABLE `cuaca`
  ADD CONSTRAINT `cuaca_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Constraints for table `jadwal_pengajar`
--
ALTER TABLE `jadwal_pengajar`
  ADD CONSTRAINT `jadwal_pengajar_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`),
  ADD CONSTRAINT `jadwal_pengajar_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD CONSTRAINT `peminjaman_alat_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `peminjaman_alat_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`);

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_2` FOREIGN KEY (`id_jadwal_pengajar`) REFERENCES `jadwal_pengajar` (`id_jadwal_pengajar`),
  ADD CONSTRAINT `reminder_ibfk_3` FOREIGN KEY (`id_cuaca`) REFERENCES `cuaca` (`id_cuaca`);

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
