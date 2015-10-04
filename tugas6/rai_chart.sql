-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 09:44 
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rai_chart`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` tinyint(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `angkatan` smallint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `jenis_kelamin`, `angkatan`) VALUES
(1, 'Satrio', 'L', 2012),
(2, 'Aulia', 'P', 2013),
(3, 'Yoshua', 'L', 2010),
(4, 'Yayat', 'L', 2010),
(5, 'Rizal', 'L', 2012),
(6, 'Caca', 'P', 2013),
(7, 'Emma', 'P', 2011),
(8, 'Wilis', 'P', 2011),
(9, 'Adityo', 'L', 2009),
(10, 'Diska', 'P', 2014),
(11, 'Tiara', 'P', 2013),
(12, 'Hafid', 'L', 2012),
(13, 'Lita', 'P', 2012),
(14, 'Nurul', 'P', 2010),
(15, 'Nia', 'P', 2009),
(16, 'Hamim', 'L', 2012),
(17, 'Rizki', 'L', 2011),
(18, 'Catur', 'L', 2011),
(19, 'Eris', 'P', 2012),
(20, 'Vera', 'P', 2014);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
