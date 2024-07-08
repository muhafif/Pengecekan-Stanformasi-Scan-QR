-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2023 at 03:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummyaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `pilih_jadwal`
--

CREATE TABLE `pilih_jadwal` (
  `NIPP` varchar(12) NOT NULL,
  `time in` time(6) NOT NULL,
  `time out` time(6) NOT NULL,
  `tanggal` date NOT NULL,
  `nama ka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_pengecekan`
--

CREATE TABLE `table_pengecekan` (
  `id` int(11) NOT NULL,
  `namaka` varchar(50) DEFAULT NULL,
  `stanformasi` varchar(11) DEFAULT NULL,
  `nosarana` varchar(50) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIPP` varchar(12) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `dinasan` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `kedudukan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIPP`, `password`, `nama`, `dinasan`, `unit`, `kedudukan`) VALUES
('12345', '12345', 'Eric Tohir', 'TKA', 'Angkutan Penumpang', 'Bandung'),
('54321', '54321', 'Raden Endra Wijaya', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pilih_jadwal`
--
ALTER TABLE `pilih_jadwal`
  ADD KEY `FK_NIPP` (`NIPP`);

--
-- Indexes for table `table_pengecekan`
--
ALTER TABLE `table_pengecekan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIPP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_pengecekan`
--
ALTER TABLE `table_pengecekan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pilih_jadwal`
--
ALTER TABLE `pilih_jadwal`
  ADD CONSTRAINT `FK_NIPP` FOREIGN KEY (`NIPP`) REFERENCES `user` (`NIPP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
