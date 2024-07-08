-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 11:33 AM
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
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `NIPP` int(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `namaka` varchar(50) DEFAULT NULL,
  `tanggal_ka` date DEFAULT NULL,
  `ulasan` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `NIPP`, `nama`, `namaka`, `tanggal_ka`, `ulasan`, `waktu`) VALUES
(1, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'kok gini y', '2023-08-23 03:28:11'),
(2, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'yyyyyyyyyyyyyyyyyyyy', '2023-08-23 03:29:36'),
(3, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'oooooooo', '2023-08-23 04:22:39'),
(4, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'hkdjaahkaf fjddg', '2023-08-23 04:23:26'),
(5, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'dkfnkdjsnflsmldk;awjfods', '2023-08-23 04:33:37'),
(6, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'yayayayayayayayyayayayayayayayay', '2023-08-23 04:36:18'),
(7, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '2023-08-23 04:44:33'),
(8, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'hehe', '2023-08-23 08:41:50'),
(9, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'hehe', '2023-08-23 08:43:40'),
(10, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'haha', '2023-08-23 08:44:19'),
(11, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'yayayaya', '2023-08-23 08:45:11'),
(12, 54321, 'Raden Endra Wijaya', 'Taksaka(67)', '2023-08-23', 'yayayaya', '2023-08-23 08:45:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
