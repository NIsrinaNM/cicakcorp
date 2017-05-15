-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2017 at 10:38 PM
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
-- Table structure for table `detil_order`
--

CREATE TABLE IF NOT EXISTS `detil_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `deskripsi` varchar(144) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `detil_order`
--

INSERT INTO `detil_order` (`id`, `orderid`, `kode`, `kuantitas`, `harga`, `deskripsi`) VALUES
(1, 1, '23WER', 1, '540100', 'warna biru'),
(2, 2, '23WER', 1, '540100', 'warna biru'),
(3, 3, '23WER', 1, '540100', 'warna biru'),
(4, 3, 'MWA123', 2, '123000', ''),
(5, 4, '23WER', 1, '540100', 'warna biru'),
(6, 4, 'MWA123', 3, '123000', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
