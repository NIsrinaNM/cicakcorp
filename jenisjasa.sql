-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Mei 2017 pada 11.47
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
-- Struktur dari tabel `jenisjasa`
--

CREATE TABLE `jenisjasa` (
  `id` char(3) NOT NULL,
  `idjasa` char(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisjasa`
--

INSERT INTO `jenisjasa` (`id`, `idjasa`, `name`) VALUES
('911', '91', '58mm glossy'),
('912', '91', '58mm kanvas'),
('913', '91', '58mm doff'),
('921', '92', 'A6'),
('922', '92', 'A5'),
('931', '93', 'Marmer'),
('932', '93', 'Akrilik'),
('941', '94', 'Printing'),
('942', '94', 'Cutting');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenisjasa`
--
ALTER TABLE `jenisjasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idjasa` (`idjasa`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jenisjasa`
--
ALTER TABLE `jenisjasa`
  ADD CONSTRAINT `jenisjasa_ibfk_1` FOREIGN KEY (`idjasa`) REFERENCES `jasa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
