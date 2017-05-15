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
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `customer` varchar(10) NOT NULL,
  `kode_order` varchar(11) NOT NULL,
  `metode` varchar(30) NOT NULL,
  `biaya` varchar(11) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `read` int(11) NOT NULL DEFAULT '1',
  `status_bayar` varchar(40) NOT NULL DEFAULT 'Belum dibayar',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_order` (`kode_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date`, `customer`, `kode_order`, `metode`, `biaya`, `alamat`, `read`, `status_bayar`) VALUES
(1, '2017-05-15', 'user1', '04393148130', 'COD', '0', '', 1, 'Belum dibayar'),
(2, '2017-05-15', 'user1', '99775710667', 'COD', '0', '', 1, 'Belum dibayar'),
(3, '15-05-2017', 'user1', '35962504709', 'COD', '0', 'balung bendo', 1, 'Belum dibayar'),
(4, '15-05-2017 21:00 pm', 'user1', '00580879516', 'POS Indonesia', '0', 'aaaaaaaaaaaaaaaaaaaaa', 1, 'Belum dibayar');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
