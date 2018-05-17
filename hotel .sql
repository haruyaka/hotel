-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 01:18 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `kode_kamar` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_kamar` int(11) NOT NULL,
  `tarif` decimal(10,2) NOT NULL,
  PRIMARY KEY (`kode_kamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kode_kamar`, `jenis_kamar`, `tarif`) VALUES
(1, 1, 100000.00),
(2, 1, 150000.00),
(3, 1, 200000.00),
(4, 1, 250000.00),
(5, 1, 300000.00),
(6, 2, 350000.00),
(7, 2, 400000.00),
(8, 2, 450000.00),
(9, 2, 500000.00),
(10, 2, 550000.00);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE IF NOT EXISTS `registrasi` (
  `no_registrasi` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal_daftar` date NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `tarif` decimal(10,2) NOT NULL,
  `total_tarif` decimal(10,2) NOT NULL,
  `kode_kamar` varchar(10) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  PRIMARY KEY (`no_registrasi`),
  KEY `kode_kamar` (`kode_kamar`,`id_penghuni`),
  KEY `id_penghuni` (`id_penghuni`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`no_registrasi`, `tanggal_daftar`, `lama_menginap`, `tarif`, `total_tarif`, `kode_kamar`, `id_penghuni`) VALUES
(1, '2012-02-01', 2, 300000.00, 300000.00, '2', 3),
(2, '2016-02-01', 2, 200000.00, 200000.00, '2', 3),
(3, '2014-05-01', 2, 300000.00, 300000.00, '2', 9),
(4, '2018-05-08', 2, 320000.00, 320000.00, '2', 2),
(5, '2018-04-04', 2, 350000.00, 350000.00, '2', 3),
(6, '2018-05-04', 1, 150000.00, 150000.00, '2', 4),
(7, '2018-05-05', 1, 150000.00, 150000.00, '2', 5),
(8, '2018-05-06', 1, 100000.00, 100000.00, '2', 6),
(9, '2018-05-06', 1, 350000.00, 350000.00, '2', 7),
(10, '2018-05-07', 1, 100000.00, 100000.00, '2', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tamu_hotel`
--

CREATE TABLE IF NOT EXISTS `tamu_hotel` (
  `id_penghuni` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penghuni` varchar(100) NOT NULL,
  PRIMARY KEY (`id_penghuni`),
  UNIQUE KEY `id_penghuni` (`id_penghuni`),
  KEY `id_penghuni_2` (`id_penghuni`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tamu_hotel`
--

INSERT INTO `tamu_hotel` (`id_penghuni`, `nama_penghuni`) VALUES
(1, 'Raka Fahrani'),
(2, 'Ade Saepul'),
(3, 'Bayu Pradana'),
(4, 'Caca Anggraeni'),
(5, 'Joko Widada'),
(6, 'Jaki Nugroho'),
(7, 'Rina Yulia Intan'),
(8, 'Dini Yuliani'),
(9, 'Dika Hamdika'),
(10, 'Tgk Moch Cadafi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
