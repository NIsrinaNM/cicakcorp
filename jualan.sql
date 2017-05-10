-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2017 at 03:01 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cicak`
--

-- --------------------------------------------------------

--
-- Table structure for table `jualan`
--

CREATE TABLE IF NOT EXISTS `jualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `status_barang` varchar(10) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `kode` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jualan`
--

INSERT INTO `jualan` (`id`, `judul`, `kategori`, `harga`, `berat`, `deskripsi`, `status_barang`, `stok`, `thumbnail`, `kode`) VALUES
(3, 'Baju Polo ITS', 'PAKAIAN', '120,000', '121', 'Ukuran yang tersedia\r\n-L\r\n-XL\r\n-S', 'Tesedia', '100', 'uploads/JUALAN_3ASE1.jpg', '3ASE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
