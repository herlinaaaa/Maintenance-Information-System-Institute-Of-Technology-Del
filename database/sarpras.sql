-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 07:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarpras`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(3, 'Admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dok` int(11) NOT NULL,
  `nama_dok` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dok`, `nama_dok`, `file`, `id`) VALUES
(4, 'SOP', 'SOP-Maintenance.pdf', 3),
(5, 'Jadwal Pemeliharaan Pertanggal 11 Juni 2022', 'Jadwal-pemeliharaan-prasarana.pdf', 3),
(6, 'Jadwal Pemeliharaan tentang Auditorium', 'Jadwal-pemeliharaan-prasarana.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kerja`
--

CREATE TABLE `jadwal_kerja` (
  `id_jadwal` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `tugas` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kerja`
--

INSERT INTO `jadwal_kerja` (`id_jadwal`, `nama`, `date`, `time_start`, `time_end`, `lokasi`, `tugas`, `id`) VALUES
(4, 'Hartono', '2022-06-11', '07:00:00', '17:35:00', 'Entrance Hall', 'Memperbaiki CCTV', 3),
(5, 'Hartanta', '2022-06-12', '07:00:00', '17:00:00', 'Auditorium', 'Memperbaiki CCTV dan Memeriksa Infocus', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lapor`
--

CREATE TABLE `lapor` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date` text NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `detail` longtext NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `damage` varchar(250) NOT NULL,
  `aksi` varchar(250) NOT NULL,
  `petugas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapor`
--

INSERT INTO `lapor` (`id`, `id_user`, `nama`, `email`, `date`, `lokasi`, `detail`, `gambar`, `damage`, `aksi`, `petugas`) VALUES
(41, 9, 'Herlina Purba', 'xevanapaul@gmail.com', '2022-06-18', 'Gedung 7 lantai 2 Ruang nomor 2', 'tes', '62ad5b3de0c83.jpg', 'Warning', 'In Progress', 'Bapak Hartono');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `pass`) VALUES
(9, 'Herlina Purba', 'xevanapaul@gmail.com', '$2y$10$ojKdKYVp64E28NmlB1rpqOwRvv4g9p5aF1sZ62IopzFanlIwtwtRS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dok`),
  ADD KEY `dokumen_foreign` (`id`);

--
-- Indexes for table `jadwal_kerja`
--
ALTER TABLE `jadwal_kerja`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_foreign` (`id`);

--
-- Indexes for table `lapor`
--
ALTER TABLE `lapor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_kerja`
--
ALTER TABLE `jadwal_kerja`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lapor`
--
ALTER TABLE `lapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_foreign` FOREIGN KEY (`id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `jadwal_kerja`
--
ALTER TABLE `jadwal_kerja`
  ADD CONSTRAINT `jadwal_foreign` FOREIGN KEY (`id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `lapor`
--
ALTER TABLE `lapor`
  ADD CONSTRAINT `lapor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
