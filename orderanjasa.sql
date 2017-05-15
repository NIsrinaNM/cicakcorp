-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Mei 2017 pada 17.47
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
-- Struktur dari tabel `orderanjasa`
--

CREATE TABLE `orderanjasa` (
  `kodebooking` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `namabarang` varchar(100) NOT NULL,
  `jenisbarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `desain` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `jenisorder` varchar(15) NOT NULL,
  `harga` varchar(100) NOT NULL DEFAULT 'NEGO / TUNGGU KAMI MENGHUBUNGI ANDA',
  `statusorder` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderanjasa`
--

INSERT INTO `orderanjasa` (`kodebooking`, `username`, `tanggal`, `namabarang`, `jenisbarang`, `jumlah`, `deskripsi`, `desain`, `nama`, `alamat`, `notelp`, `jenisorder`, `harga`, `statusorder`) VALUES
('lzPZ79t', 'user1', '2017-05-15 22:06:01', 'BLOCKNOTE', 'A6', 100, 'hjvjhvjhvjhvj', 'assets/orderan/mbak susi.cdr', 'Ahsanul Marom', 'Jalan XXX No YZ, Kelurahan ASDFGH RT 00 RW 99, PATI, KABUPATEN PATI, JAWA TENGAH - 11223', '081342424521', 'JASA', 'NEGO / TUNGGU KAMI MENGHUBUNGI ANDA', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderanjasa`
--
ALTER TABLE `orderanjasa`
  ADD PRIMARY KEY (`kodebooking`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
