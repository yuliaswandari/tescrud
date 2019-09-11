-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 11, 2019 at 03:38 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes_erporate`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `No` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jenis_Kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `Jabatan` varchar(50) DEFAULT NULL,
  `No_HP` varchar(50) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`No`, `Nama`, `Jenis_Kelamin`, `Jabatan`, `No_HP`, `alamat`) VALUES
(1, 'Ahmad', 'Pria', 'Programmer', '085xxx', 'Jalan 1'),
(2, 'Lutfi', 'Pria', 'Analisis', '0878xxx', 'Jalan 2'),
(3, 'Nadia', 'Wanita', 'Bisnis Develop', '0857xxx', 'Jalan 4'),
(4, 'Sidiq', 'Pria', 'Android Dev', '0823xxx', 'Jalan 3');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `No` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Hari_tanggal` date DEFAULT NULL,
  `Jam_datang` time DEFAULT NULL,
  `Jam_pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`No`, `Nama`, `Hari_tanggal`, `Jam_datang`, `Jam_pulang`) VALUES
(1, 'Ahmad', '2018-02-19', '07:30:00', '16:00:00'),
(2, 'Ahmad', '2018-02-20', '08:00:00', '16:30:00'),
(3, 'Nadia', '2018-02-19', '07:50:00', '17:00:00'),
(4, 'Lutfi', '2018-02-19', '08:10:00', '17:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `Nama` (`Nama`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`No`),
  ADD KEY `Nama` (`Nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`Nama`) REFERENCES `karyawan` (`Nama`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
