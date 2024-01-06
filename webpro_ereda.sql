-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2024 pada 05.28
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpro_ereda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(3) UNSIGNED NOT NULL,
  `nama_adm` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `nama_adm`, `username`, `passwd`) VALUES
(1, 'Administrator', 'admin', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` int(3) UNSIGNED NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`idjenis`, `jenis`) VALUES
(1, 'Berpedal'),
(2, 'Tanpa Pedal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `idmember` int(10) UNSIGNED NOT NULL,
  `namamember` varchar(30) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idmember`, `namamember`, `telepon`, `email`, `passwd`) VALUES
(1, 'Sahidah', '082828282828', 'sahi@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` int(10) UNSIGNED NOT NULL,
  `tglpesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idmember` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `idsepeda` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `idjenis` int(3) UNSIGNED NOT NULL DEFAULT '1',
  `harga` int(10) NOT NULL DEFAULT '0',
  `lama` decimal(6,2) NOT NULL DEFAULT '0.00',
  `jmlharga` int(10) NOT NULL DEFAULT '0',
  `mulaijam` varchar(5) NOT NULL,
  `selesaijam` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`idpesanan`, `tglpesanan`, `idmember`, `idsepeda`, `idjenis`, `harga`, `lama`, `jmlharga`, `mulaijam`, `selesaijam`) VALUES
(3, '2024-01-06 02:53:35', 1, 1, 1, 10000, '2.00', 20000, '09:30', '11:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepeda`
--

CREATE TABLE `sepeda` (
  `idsepeda` int(10) UNSIGNED NOT NULL,
  `idjenis` int(3) UNSIGNED NOT NULL DEFAULT '1',
  `noseri` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sepeda`
--

INSERT INTO `sepeda` (`idsepeda`, `idjenis`, `noseri`, `harga`, `status`) VALUES
(1, 1, 'A001', 10000, 0),
(2, 1, 'A002', 10000, 0),
(3, 2, 'B001', 15000, 0),
(4, 2, 'B002', 15000, 0),
(5, 1, 'A003', 10000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `web`
--

CREATE TABLE `web` (
  `id` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `namaweb` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web`
--

INSERT INTO `web` (`id`, `namaweb`, `email`, `telepon`) VALUES
(1, 'Ereda', 'admin@ereda.com', '081919191919');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`);

--
-- Indeks untuk tabel `sepeda`
--
ALTER TABLE `sepeda`
  ADD PRIMARY KEY (`idsepeda`);

--
-- Indeks untuk tabel `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idjenis` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sepeda`
--
ALTER TABLE `sepeda`
  MODIFY `idsepeda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
