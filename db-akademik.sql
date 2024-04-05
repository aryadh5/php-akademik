-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 01:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapribadi`
--

CREATE TABLE `datapribadi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `noHp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapribadi`
--

INSERT INTO `datapribadi` (`id`, `user_id`, `nama`, `jk`, `alamat`, `noHp`, `email`, `gambar`) VALUES
(1, 4, 'tatang', 'Laki-Laki', 'jl. ahmad yani                                                                         ', '085825832325', 'admin@admin', '63baea6453dbb.png'),
(7, 14, 'Bruce', 'Laki-laki', 'jl. merak', '08888888888', 'arya@email.com', '63c00f2145da4.jpg'),
(8, 15, 'John', 'Laki-laki', 'jl. bulevar utara                                                                      ', '0888483734343', 'johnjohn@mail.com', '63c01089b7cf8.png'),
(9, 16, 'Lily', 'Perempuan', 'jl. bulvera selatan', '0843843898393', 'liluly@mail.com', '63c011932c251.jpg'),
(10, 17, 'tina', 'Perempuan', 'jl. tina', '08828483834343', 'tiniantina@mail.com', '63c011db8b4f4.png'),
(11, 18, 'abdul', 'Laki-laki', 'jl. sukamaju', '08884824882', 'assoomad@mail.com', '63c01278bc8f2.jpg'),
(12, 19, 'admin dua', 'Perempuan', 'jl. bulevar barat', '085827772325', 'admin22222@mail.com', '63c013750a369.jpg'),
(13, 20, 'jim', 'Laki-laki', 'jl. merak', '08888884882', 'thekopites9@gmail.com', '63c1001eb642c.jpg'),
(14, NULL, 'Guruh', 'Laki-laki', 'jl. veteran', '085855832325', 'guru1@mail.com', '63c3a77edaf4f.png'),
(15, 23, 'Widodo', 'Laki-laki', 'jl. veteran                                                                      ', '084322222393', 'guru1@mail.com', '63c3a900ee618.png');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int(11) NOT NULL,
  `kelas` enum('VII','VIII','IX') DEFAULT NULL,
  `nama_mapel` varchar(255) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `kelas`, `nama_mapel`, `hari`, `waktu`) VALUES
(3, 'VII', 'B. Indonesia', 'Senin', '08.00 - 10.00'),
(4, 'VII', 'Matematika', 'Senin', '10.00 - 11.30'),
(5, 'VII', 'IPA', 'Senin', '12.45 - 14.00'),
(6, 'VIII', 'B. Inggris', 'Rabu', '10.00 - 11.30'),
(7, 'IX', 'IPA', 'Selasa', '12.45 - 14.00'),
(8, 'IX', 'IPS', 'Selasa', '10.00 - 11.30'),
(9, 'VIII', 'IPS', 'Kamis', '12.45 - 14.00'),
(10, 'IX', 'PPKn', 'Selasa', '08.00 - 10.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','siswa','guru') NOT NULL,
  `status` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `status`) VALUES
(4, 'admin', '$2y$10$jVPNImzOLvKjZr.oyhzjFuQJJOkmSIwdDx7du9gj2AASEUn/aNSfe', 'admin', '1'),
(14, 'user1', '$2y$10$ry3Cke7BsQ5kQFVTD6zln.3vWl/VplF3YFNQqApo0MPcDpGrjfCca', 'siswa', '1'),
(15, 'user2', '$2y$10$Sk5wST2gO5bzZsM31qvYz.vPEj8TKQc6Wob79mq1GWYZVzBBEtRiy', 'siswa', '1'),
(16, 'user3', '$2y$10$zuGhDWoO42bO.ufyRpwere278x8wqMZJ456jxQo6g5TCjNNRgwWqy', 'siswa', '1'),
(17, 'user4', '$2y$10$1WQI5SdhIZC.ISiQlXhjDe8W/OvHJA46EZsFVglJWMQf7Id0U31xy', 'siswa', '1'),
(18, 'user5', '$2y$10$0qleElMtoFNCcR3nhvyxuuOpn6PLDbn3MSbzfq8Ry8m6eCorV5zai', 'siswa', '0'),
(19, 'admin2', '$2y$10$X3o4IlQOCKDNMU4KEA//zOdAuTMD6CgVEs3pOhe42RlYLTld/wlh6', 'admin', '0'),
(20, 'user10', '$2y$10$ASTWpSzu2hAflwXx2v47FOK3mM6YnVfuVHFTSLzL9LM/wdrAqQc0G', 'siswa', '1'),
(23, 'guru1', '$2y$10$FPV2uIihCodFt36FPSw5F.NZK2EaJUfHhG6G2iEK6jQOkGzvqmDtG', 'guru', '1'),
(24, 'johnnadmn', '$2y$10$6DLKe1VIOP9YtGPdVE5uJeRuTa0XUky8yuqnD90m/kbj65SGULjTy', 'admin', '1'),
(25, 'guru2', '$2y$10$DgpD2oTe1mePZTYs.9m5gOueUY7gTzaZoD3C/qUDiTVoS8ZK6lQFS', 'guru', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapribadi`
--
ALTER TABLE `datapribadi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapribadi`
--
ALTER TABLE `datapribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datapribadi`
--
ALTER TABLE `datapribadi`
  ADD CONSTRAINT `datapribadi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
