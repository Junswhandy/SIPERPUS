-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 02:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `tgl_input`) VALUES
(212001, 'AWALUDIN SEPTIADI', 'MAKASSAR', '2022-06-03', 'Laki-Laki', '2022-05-28 15:17:04'),
(212002, 'ANDI HASRIANTO', 'MAKASSAR', '2002-05-24', 'Laki-Laki', '2022-06-03 12:51:53'),
(212004, 'ALJIWANI', 'MAKASSAR', '2000-05-25', 'Laki-Laki', '2022-06-03 12:57:40'),
(212005, 'SERIN', 'MAKASSAR', '2000-06-22', 'PEREMPUAN', '2022-06-03 12:57:59'),
(212033, 'JUNSWHANDY', 'MAKASSAR', '2002-08-15', 'Laki-Laki', '2022-05-01 15:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(35) NOT NULL,
  `pengarang` varchar(25) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi` varchar(8) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(5, 'BAHASA PEMROGRAMAN C++', 'Raharjo', 'Gramedia', '2021', '12323453211', 0, 'Rak 3', '2022-06-03 05:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Rak 1'),
(2, 'Rak 2'),
(3, 'Rak 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_pinjam` varchar(30) NOT NULL,
  `tgl_kembali` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id pinjam`, `id_buku`, `judul`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`, `tgl_input`) VALUES
(1, 5, 'BAHASA PEMROGRAMAN C++', 212033, 'JUNSWHANDY', '03-06-2022', '10-06-2022', 'PINJAM', '2022-06-03 05:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, '212001', '2120333', 'AWALUDIN SEPTIADI', 'user'),
(3, '212033', '212033', 'JUNSWHANDY', 'user'),
(4, '212002', '212002', 'HASRIANTO', 'user'),
(5, '212004', '212004', 'ALJIWANI', 'user'),
(6, '212005', '212005', 'SERIN MAMBAYA', 'user'),
(7, '212007', '212007', 'FARID', 'user'),
(8, '212007', '212007', 'FARID', 'user'),
(9, '212009', '212009', 'ALDY', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id pinjam`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
