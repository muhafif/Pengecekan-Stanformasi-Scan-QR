-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 11:37 AM
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
(99, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(68)', '2023-08-09', 'Eksekutif1', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 02:54:01'),
(100, 12345, 'Eric Tohir', 'TKA', 'Taksaka(68)', '2023-08-09', 'Eksekutif1', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 02:55:46'),
(101, 12345, 'Eric Tohir', 'TKA', 'Taksaka(67)', '2023-08-09', 'Luxury', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 07:49:33'),
(102, 12345, 'Eric Tohir', 'TKA', 'Taksaka(68)', '2023-08-09', 'Eksekutif1', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 07:50:12'),
(104, 12345, 'Eric Tohir', 'TKA', 'Taksaka(67)', '2023-08-09', 'Eksekutif1', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 09:35:59'),
(105, 9876, 'Yaya Nursidi', 'Kondektur', 'Taksaka(67)', '2023-08-09', 'Luxury', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 09:36:27'),
(106, 9876, 'Yaya Nursidi', 'Kondektur', 'Taksaka(67)', '2023-08-09', 'Luxury', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 09:36:55'),
(107, 12345, 'Eric Tohir', 'TKA', 'Taksaka(67)', '2023-08-09', 'Eksekutif1', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 09:43:49'),
(108, 12345, 'Eric Tohir', 'TKA', 'Taksaka(67)', '2023-08-09', 'Eksekutif1', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 09:45:47'),
(109, 23456, 'Donna Done', 'Polsuska', 'Taksaka(67)', '2023-08-09', 'Luxury', 'https://forms.gle/poi6cJZhVG5XXM8e8', '2023-08-09 10:10:11'),
(111, 12345, 'Eric Tohir', 'TKA', 'Taksaka(68)', '2023-08-11', 'Luxury', 'K101859', '2023-08-11 03:39:21'),
(112, 12345, 'Eric Tohir', 'TKA', 'Taksaka(68)', '2023-08-11', 'Eksekutif1', 'K101859', '2023-08-11 03:39:30'),
(113, 12345, 'Eric Tohir', 'TKA', 'Taksaka(68)', '2023-08-11', 'Luxury', 'K101859', '2023-08-11 03:39:36'),
(114, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Luxury', 'K101925', '2023-08-11 03:40:06'),
(115, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Eksekutif1', 'K101925', '2023-08-11 03:40:12'),
(116, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Luxury', 'K101925', '2023-08-11 03:44:00'),
(117, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Luxury', 'K101925', '2023-08-11 03:44:22'),
(118, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Luxury', 'K101925', '2023-08-11 03:46:11'),
(119, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Eksekutif1', 'K101925', '2023-08-11 03:46:16'),
(120, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Luxury', 'K101925', '2023-08-11 03:46:29'),
(121, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Luxury', 'K101925', '2023-08-11 03:46:44'),
(122, 54321, 'Raden Endra Wijaya', 'Kondektur', 'Taksaka(67)', '2023-08-11', 'Eksekutif1', 'K101925', '2023-08-11 03:46:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_pengecekan`
--
ALTER TABLE `table_pengecekan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_pengecekan`
--
ALTER TABLE `table_pengecekan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
