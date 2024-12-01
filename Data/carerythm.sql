-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 06:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carerythm`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `kataSandi` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `kataSandi`, `email`, `role`) VALUES
(1, 'asdf', '912ec803b2ce49e4a541068d495ab570', 'a@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertemanan`
--

CREATE TABLE `pertemanan` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `tanggal_pertemanan` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `username` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tentang` text DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `bergabung` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`username`, `email`, `tentang`, `foto_profil`, `asal`, `bergabung`) VALUES
('asdf', 'a@gmail.com', 'mahasiswa', '1733054068_1199466.jpg', 'qwerty', '2024-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_rencana` varchar(100) NOT NULL,
  `catatan` text DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `tempat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_teman`
--

CREATE TABLE `rencana_teman` (
  `id` int(11) NOT NULL,
  `rencana_id` int(11) NOT NULL,
  `teman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori` enum('mingguan','bulanan') NOT NULL,
  `nama_target` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT 1,
  `tanggal_mulai` date DEFAULT curdate(),
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pertemanan`
--
ALTER TABLE `pertemanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rencana_teman`
--
ALTER TABLE `rencana_teman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rencana_id` (`rencana_id`),
  ADD KEY `teman_id` (`teman_id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertemanan`
--
ALTER TABLE `pertemanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rencana_teman`
--
ALTER TABLE `rencana_teman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `akun` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertemanan`
--
ALTER TABLE `pertemanan`
  ADD CONSTRAINT `pertemanan_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `akun` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pertemanan_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `akun` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `rencana`
--
ALTER TABLE `rencana`
  ADD CONSTRAINT `rencana_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `akun` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rencana_teman`
--
ALTER TABLE `rencana_teman`
  ADD CONSTRAINT `rencana_teman_ibfk_1` FOREIGN KEY (`rencana_id`) REFERENCES `rencana` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rencana_teman_ibfk_2` FOREIGN KEY (`teman_id`) REFERENCES `akun` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `target_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `akun` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
