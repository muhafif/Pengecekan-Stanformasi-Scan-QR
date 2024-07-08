-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 08:26 AM
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
(3, '09876', '09876', 'Yaya Nursidi', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta', 'Taksaka(67)', '2023-08-09'),
(1, '12345', '12345', 'Eric Tohir', 'TKA', 'Angkutan Penumpang', 'Bandung', 'Taksaka(67)', '2023-08-22'),
(4, '23456', '23456', 'Donna Done', 'Polsuska', 'Polsuska', 'Bandung', 'Taksaka(67)', '2023-08-09'),
(2, '54321', '54321', 'Raden Endra Wijaya', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta', 'Taksaka(67)', '2023-08-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIPP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
