-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Mei 2017 pada 07.00
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cicak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `jenisbarang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text,
  `desain` varchar(255) DEFAULT NULL,
  `harga` varchar(100) NOT NULL DEFAULT 'Hubungi Kami',
  `jenisorder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `username`, `namabarang`, `jenisbarang`, `jumlah`, `deskripsi`, `desain`, `harga`, `jenisorder`) VALUES
(1, 'user1', 'VENDEL', 'Marmer', 5, 'Setiap desain dibuat satu saja ukuran A4, ini ada 5 desain, jadi total ada 5 ya', 'assets/orderan/mas faiz.cdr', 'Hubungi Kami', 'JASA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
