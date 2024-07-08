-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Aug 21, 2023 at 05:49 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `NIPP` int(250) NOT NULL,
  `dinasan` varchar(250) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_admin`, `NIPP`, `dinasan`, `level`) VALUES
(1, 'admin', 'admin', 'Admin Gabungan', 12121, 'Pilih Dinasan', 'Admin'),
(2, 'adminIT', 'adminit', 'Admin IT', 12312, 'Pilih Dinasan', 'IT'),
(3, 'adminK', '1', 'Admin Kondektur', 11111, 'Kondektur', 'Admin'),
(4, 'daop6', '1', 'Syapa Namanya Dimana Rumahnya', 54321, 'Kondektur', 'IT'),
(5, 'jenab', 'yukmain', 'Zaenab', 17845, 'Kondektur', 'IT');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int(255) NOT NULL,
  `nosarana` varchar(255) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `gambarqr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id`, `nosarana`, `alias`, `gambarqr`) VALUES
(26, 'K101906', '388d3590522fK78ce648424040e25a502680175fb36cf57d94c41192857540182603f92', '388d3590522fK78ce648424040e25a502680175fb36cf57d94c41192857540182603f92.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIPP` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `dinasan` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `kedudukan` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIPP`, `nama`, `dinasan`, `unit`, `kedudukan`, `password`) VALUES
('08755', 'Boy Pablo', 'Kondektur', 'di sana deh', 'duduk atahiyat', 'hahaha'),
('10203', 'Pak Haji', 'TKA', 'Angkutan Penumpangg', 'duduk di pelaminan bersama mu', 'hhahahah'),
('11111', 'Mas Raden Lempuyangann', 'Kondektur', 'Angkutan Penumpangg', 'Yogyakarta', '11111'),
('12112', 'Tiwi Lagi', 'Polsuska', 'Angkutan Penumpangg', 'Yogyakarta', '1'),
('12121', 'Wiranto', 'Pilih Dinasan', 'Angkutan Penumpang', 'Yogyakarta', '12121'),
('13131', 'Tiwi', 'Kondektur', 'Angkutan Penumpangg', 'Bandung', '13131'),
('13579', 'Tiwi Rewell', 'Kondektur', 'Angkutan Penumpang', 'Bandung', '13579'),
('22222', 'Mba amir', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '22222'),
('23451', 'Well', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '23451'),
('24513', 'Oke', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '24513'),
('24680', 'Akbar SI', 'Kondektur', 'Angkutan Penumpang', 'Bandung', '24680'),
('25134', 'Mas Raden', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '25134'),
('31245', 'Aduh Lupa', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '31245'),
('32145', 'Waduh', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '32145'),
('33333', 'Tiwi Lagi', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '33333'),
('34512', 'Dilan', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '34512'),
('35124', 'Anisa Ver 2.0', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '35124'),
('44444', 'Apip', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '44444'),
('45123', 'Bang Apip', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '45123'),
('51515', '', 'Polsuska', '', '', 'ngadimin'),
('54312', 'Tatak Rohis', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta', '54312'),
('54321', 'Raden Endra Wijaya', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta', '54321'),
('55555', 'Eric Tohir', 'TKA', 'Angkutan Penumpang', 'Bandung', '55555'),
('58921', 'Bocil Funki Remake', 'Polsuska', 'Angkutan Penumpangg', 'duduk di pelaminan bersama mu', 'cubanget'),
('65432', 'Tiwir', 'Polsuska', 'Angkutan Penumpang', 'Yogyakarta', '65432'),
('66666', 'Amir Ingetin Solat', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta', '66666'),
('67890', 'Dek Tiwi', 'Polsuska', 'Angkutan Penumpang', 'Yogyakarta', '67890'),
('77777', 'Akbar Telkom', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '77777'),
('78906', 'Wirawan', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '78906'),
('88888', 'Tiwi Osis', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '88888'),
('89067', 'Amir 2', 'Kondektur', 'Angkutan Penumpang', 'Yogyakarta', '89067'),
('90678', 'Anisa Versi Lite', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '90678'),
('99999', 'Ketiwiw', 'TKA', 'Angkutan Penumpang', 'Yogyakarta', '99999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilih_jadwal`
--
ALTER TABLE `pilih_jadwal`
  ADD KEY `FK_NIPP` (`NIPP`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
