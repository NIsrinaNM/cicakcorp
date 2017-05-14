-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2017 at 09:58 PM
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
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `judul`, `caption`, `gambar`, `jenis`) VALUES
(16, NULL, '', 'assets/slider/slider_672380.jpg', 'slider'),
(17, NULL, '', 'assets/slider/slider_180114.jpg', 'slider'),
(19, NULL, 'Menerima pesanan vedel', 'assets/galeri/GALERI_2619652.jpg', 'galeri'),
(20, NULL, 'Seminar kita (blocknote) untuk keperluan acara-acara', 'assets/galeri/GALERI_6193798.jpeg', 'galeri'),
(21, NULL, 'Pin untuk keperluan acara-acara', 'assets/galeri/GALERI_3544423.jpg', 'galeri');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
