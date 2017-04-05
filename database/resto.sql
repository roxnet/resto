-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Des 2015 pada 01.50
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('roxor', 'roxor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deliver`
--

CREATE TABLE IF NOT EXISTS `deliver` (
  `id_user` char(6) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_menu`
--

CREATE TABLE IF NOT EXISTS `jenis_menu` (
  `j_menu` char(5) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_menu`
--

INSERT INTO `jenis_menu` (`j_menu`, `nama_jenis`) VALUES
('ce001', 'cemilan'),
('ma001', 'makanan'),
('mi001', 'minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
  `no` char(3) NOT NULL,
  `kapasitas` int(3) DEFAULT NULL,
  `pakai` enum('t','y') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`no`, `kapasitas`, `pakai`) VALUES
('1', 2, 't'),
('10', 15, 't'),
('2', 2, 't'),
('3', 4, 't'),
('4', 4, 't'),
('5', 4, 't'),
('6', 8, 't'),
('7', 8, 't'),
('8', 8, 't'),
('9', 15, 't');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` char(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `harga` int(6) DEFAULT NULL,
  `id_jenis` char(5) DEFAULT NULL,
  `foto` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `harga`, `id_jenis`, `foto`) VALUES
('', NULL, NULL, NULL, NULL),
('C001', 'Dorayaki Coklat', 4000, 'ce001', 'dorayaki.jpg'),
('C002', 'sOSIS indo asli', 5000, 'ce001', 'download (3).jpg'),
('C003', 'Tempe Goreng Emas', 4000, 'ce001', 'images (45).jpg'),
('C004', 'Kentang Goreng Alami', 3000, 'ce001', 'kentang.jpg'),
('ma001', 'Udang Saus Merah', 19000, 'ma001', 'images.jpg'),
('ma002', 'Sate Ayam Dewa', 20000, 'ma001', 'images (5).jpg'),
('ma003', 'Sate Sapi Besi', 25000, 'ma001', 'images (20).jpg'),
('ma004', 'Bakso Sapi Sakti', 10000, 'ma001', 'bakso.jpg'),
('ma005', 'Kepiting Saus Pedas', 21000, 'ma001', 'udang.jpg'),
('ma006', 'Burger Downer', 10000, 'ma001', 'burger.jpg'),
('mi001', 'Ice Thea ', 2000, 'mi001', 'esteh.jpg'),
('mi002', 'Ice Jeruk Hijau', 4000, 'mi001', 'esjeruk.jpg'),
('mi003', 'Ice Dawet Asli', 3000, 'mi001', 'images (29).jpg'),
('mi004', 'Ice Susu Stauberi Asli', 8000, 'mi001', 'images (35).jpg'),
('NULL', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_paket`
--

CREATE TABLE IF NOT EXISTS `menu_paket` (
  `id_menu` char(5) DEFAULT NULL,
  `id_paket` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_paket`
--

INSERT INTO `menu_paket` (`id_menu`, `id_paket`) VALUES
('ma002', 'p001'),
('mi001', 'p001'),
('C003', 'p001'),
('ma001', 'p002'),
('mi004', 'p002'),
('C002', 'p002'),
('ma006', 'p003'),
('mi003', 'p003'),
('C004', 'p003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_deliver`
--

CREATE TABLE IF NOT EXISTS `order_deliver` (
  `id_user` char(6) DEFAULT NULL,
  `id_paket` char(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `harga` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id_paket` char(5) NOT NULL,
  `nama_paket` varchar(30) DEFAULT NULL,
  `harga` int(6) DEFAULT NULL,
  `foto` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `foto`) VALUES
('p001', 'Paket Lapar', 30000, ''),
('p002', 'Paket Elit ', 48000, ''),
('p003', 'Makan Sambil Jalan', 25000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `no` char(3) DEFAULT NULL,
  `id_menu` char(5) DEFAULT NULL,
  `id_paket` char(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `harga` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`no`, `id_menu`, `id_paket`, `date`, `waktu`, `harga`) VALUES
('1', 'ma001', NULL, '2015-12-17', '10:12:24', 19000),
('1', 'ma002', NULL, '2015-12-17', '10:12:24', 20000),
('1', 'ma003', NULL, '2015-12-17', '10:12:24', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementara`
--

CREATE TABLE IF NOT EXISTS `sementara` (
  `no` char(3) DEFAULT NULL,
  `id_menu` char(5) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `harga` int(6) DEFAULT NULL,
  `id_paket` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementara_deliver`
--

CREATE TABLE IF NOT EXISTS `sementara_deliver` (
  `no` char(3) DEFAULT NULL,
  `id_paket` char(5) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `harga` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver`
--
ALTER TABLE `deliver`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
 ADD PRIMARY KEY (`j_menu`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`), ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `menu_paket`
--
ALTER TABLE `menu_paket`
 ADD KEY `id_menu` (`id_menu`), ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `order_deliver`
--
ALTER TABLE `order_deliver`
 ADD KEY `id_user` (`id_user`), ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
 ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD KEY `no` (`no`), ADD KEY `id_menu` (`id_menu`), ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `sementara`
--
ALTER TABLE `sementara`
 ADD KEY `no` (`no`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`j_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu_paket`
--
ALTER TABLE `menu_paket`
ADD CONSTRAINT `menu_paket_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `menu_paket_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_deliver`
--
ALTER TABLE `order_deliver`
ADD CONSTRAINT `order_deliver_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `deliver` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_deliver_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`no`) REFERENCES `meja` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pesan_ibfk_3` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sementara`
--
ALTER TABLE `sementara`
ADD CONSTRAINT `sementara_ibfk_1` FOREIGN KEY (`no`) REFERENCES `meja` (`no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
