-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 08:27 AM
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
(84, 12345, 'Eksekutif1', '2023-08-22 02:14:10'),
(90, 54321, 'Eksekutif1', '2023-08-11 03:46:55'),
(97, 9876, 'Luxury', '2023-08-09 09:36:24'),
(98, 23456, 'Eksekutif1', '2023-08-09 10:10:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pilih_jadwal`
--
ALTER TABLE `pilih_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pilih_jadwal`
--
ALTER TABLE `pilih_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
