-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2023 at 02:27 PM
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
  `id_jadwal` int(11) NOT NULL,
  `NIPP` int(11) NOT NULL,
  `stanformasi` varchar(25) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pilih_jadwal`
--

INSERT INTO `pilih_jadwal` (`id_jadwal`, `NIPP`, `stanformasi`, `waktu`) VALUES
(89, 12345, 'Eksekutif 5', '2023-08-09 11:19:42'),
(94, 54321, 'Eksekutif 6', '2023-08-09 11:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `table_pengecekan`
--

CREATE TABLE `table_pengecekan` (
  `id` int(11) NOT NULL,
  `NIPP` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `dinasan` varchar(255) DEFAULT NULL,
  `namaka` varchar(50) DEFAULT NULL,
  `tanggal_ka` date DEFAULT NULL,
  `stanformasi` varchar(11) DEFAULT NULL,
  `nosarana` varchar(50) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_pengecekan`
--

INSERT INTO `table_pengecekan` (`id`, `NIPP`, `nama`, `dinasan`, `namaka`, `tanggal_ka`, `stanformasi`, `nosarana`, `waktu`) VALUES
(119, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-09', 'Luxury', 'https://forms.gle/JR71SjRRHvy8d31z6', '2023-08-09 11:06:07'),
(120, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Argo Lawu(7)', '2023-08-09', 'Eksekutif 5', 'https://forms.gle/JR71SjRRHvy8d31z6', '2023-08-09 11:07:43'),
(121, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Argo Lawu(7)', '2023-08-09', 'Eksekutif 3', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 11:08:07'),
(122, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Argo Lawu(7)', '2023-08-09', 'Eksekutif 8', 'K101928', '2023-08-09 11:08:57'),
(123, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Argo Lawu(7)', '2023-08-09', 'Eksekutif 9', 'K101859', '2023-08-09 11:09:12'),
(124, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Argo Lawu(7)', '2023-08-09', 'Eksekutif 6', 'K101928', '2023-08-09 11:12:30'),
(125, 12345, 'Eric Tohir', 'TKA', 'Taksaka(68)', '2023-08-09', 'Luxury', 'K101859', '2023-08-09 11:17:05'),
(126, 12345, 'Eric Tohir', 'TKA', 'Taksaka(68)', '2023-08-09', 'Eksekutif 6', 'K101859', '2023-08-09 11:18:20'),
(127, 12345, 'Eric Tohir', 'TKA', 'Argo Dwipangga (9)', '2023-08-08', 'Eksekutif 5', 'K101928', '2023-08-09 11:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `NIPP` varchar(12) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `dinasan` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `kedudukan` varchar(255) NOT NULL,
  `namaka` varchar(50) DEFAULT NULL,
  `tanggal_ka` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `NIPP`, `password`, `nama`, `dinasan`, `unit`, `kedudukan`, `namaka`, `tanggal_ka`) VALUES
(1, '12345', '12345', 'Eric Tohir', 'TKA', 'Angkutan Penumpang', 'Bandung', 'Argo Lawu(8)', '2023-08-09'),
(2, '54321', '54321', 'Raden Endra Wijaya', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta', 'Taksaka(67)', '2023-08-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pilih_jadwal`
--
ALTER TABLE `pilih_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

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
-- AUTO_INCREMENT for table `pilih_jadwal`
--
ALTER TABLE `pilih_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `table_pengecekan`
--
ALTER TABLE `table_pengecekan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
