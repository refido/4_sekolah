-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 02:34 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Sofia Jeni Agustina', 'sofia@gmail.com', 'sofia');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(50) NOT NULL,
  `nama_gr` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` enum('l','p') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_gr`, `alamat`, `jk`) VALUES
('1234567890', 'rika retnaning S.pd', 'malang', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jrsn` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jrsn`, `id_tahun`, `jurusan`) VALUES
(1, 19, 'Rekayasa Perangkat Lunak 6'),
(5, 25, 'Animasi'),
(6, 19, 'Teknik Kendaraan Ringan'),
(7, 25, 'Management Niaga'),
(15, 19, 'Pembangkit Listrik'),
(20, 25, 'Rekayasa Perangkat Lunak'),
(21, 19, 'Rekayasa Perangkat Lunak'),
(22, 19, ''),
(23, 19, ''),
(24, 19, 'pembangkit');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jrsn` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `nip_genap` varchar(50) NOT NULL,
  `nip_ganjil` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jrsn`, `id_tingkat`, `nip_genap`, `nip_ganjil`, `kelas`) VALUES
(1, 5, 1, '056789987654876567', '', 'X-RPC'),
(4, 1, 1, '076509876545678', '', 'X-RPAl'),
(5, 15, 3, '12345567', '12345567', 'X-RPL A'),
(6, 15, 1, '1234567890', '-', 'wd');

-- --------------------------------------------------------

--
-- Table structure for table `kel_sis`
--

CREATE TABLE `kel_sis` (
  `nis` varchar(50) NOT NULL,
  `id_kelas` int(50) NOT NULL,
  `id_tahun` int(50) NOT NULL,
  `id_jrsn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kel_sis`
--

INSERT INTO `kel_sis` (`nis`, `id_kelas`, `id_tahun`, `id_jrsn`) VALUES
('12345', 4, 6, 1),
('2017', 4, 25, 1),
('30789', 5, 25, 15),
('1', 5, 25, 15);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `semester` enum('1','2','3','4','5','6') NOT NULL,
  `kode` varchar(20) NOT NULL,
  `urutan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_tipe`, `id_tahun`, `mapel`, `semester`, `kode`, `urutan`) VALUES
(1, 26, 19, '.l,kmjn', '5', '', '3'),
(22, 26, 19, 'Bahasa Inggris', '3', 'K-5', '-'),
(23, 25, 25, 'Bahasa Daerah', '3', 'K3', '-'),
(28, 26, 19, 'n', '2', 'k8', '-'),
(29, 27, 25, 'matematika 2', '3', '', '-'),
(30, 26, 19, 'matemtika 23', '3', '', '-'),
(31, 2, 1, '2', '3', '87', '8'),
(32, 2, 1, '2', '3', '87', '8'),
(33, 26, 19, 'w', '2', '', '-'),
(34, 26, 19, ',mnb', '2', '', '0'),
(35, 26, 19, ',mnb', '2', '', '0'),
(36, 26, 19, 'kjh', '2', '', '90'),
(37, 26, 19, 'l,k', '2', '', '8'),
(38, 26, 0, '.kjh', '4', '', '-'),
(39, 26, 0, ',lknj', '3', '', '-'),
(40, 26, 27, ',mjnhg', '3', '9876', '-'),
(78, 6, 8, '7', '', '8', '-'),
(79, 6, 8, '7', '', 'j8', '-'),
(82, 26, 27, 'kjafah', '3', 'K-5', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pel_sis`
--

CREATE TABLE `pel_sis` (
  `nis` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pel_sis`
--

INSERT INTO `pel_sis` (`nis`, `id_mapel`, `id_tahun`, `semester`) VALUES
('12345', 28, 19, '4'),
('12345', 23, 19, '4'),
('12345', 22, 19, '4'),
('12345', 29, 19, '4'),
('12345', 28, 19, '4'),
('2017', 23, 19, '4'),
('2017', 22, 19, '4'),
('2017', 29, 19, '4'),
('2017', 28, 19, '4'),
('12345', 23, 19, '2'),
('2017', 23, 19, '6'),
('12345', 23, 19, '4'),
('12345', 22, 19, '4'),
('12345', 29, 19, '4'),
('12345', 28, 19, '4'),
('12345', 23, 19, '2'),
('2017', 23, 19, '2'),
('12345', 22, 19, '4');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(50) NOT NULL,
  `siswa` varchar(50) NOT NULL,
  `jk` enum('l','p') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `siswa`, `jk`) VALUES
('', '', 'l'),
('1', 'amanda ', 'l'),
('12345', 'sofia jeni agustina', 'p'),
('2017', 'virgo indro', 'l'),
('30789', 'duwi maria', 'l');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `status_smt` enum('semester ganjil','semester genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun`, `status`, `status_smt`) VALUES
(25, '2017/20190', 'non-aktif', 'semester ganjil'),
(26, '098765', 'non-aktif', 'semester ganjil'),
(27, '8009', 'aktif', 'semester ganjil'),
(28, '9876', 'non-aktif', 'semester ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`) VALUES
(1, 'XI'),
(3, 'X'),
(4, 'jb');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `tipe` enum('Kelompok A','Kelompok B','Kelompok C') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `urutan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `tipe`, `nama`, `urutan`) VALUES
(25, 'Kelompok C', 'Muatan Wilayah', '8'),
(26, 'Kelompok B', 'Muatan Nasional A', '-'),
(27, 'Kelompok A', 'Normatif 2', '-'),
(28, 'Kelompok A', 'aws', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jrsn`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
