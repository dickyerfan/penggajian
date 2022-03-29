-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 04:23 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(1, 'Staf Marketing', '4000000', '800000', '500000'),
(2, 'Staf Administrasi', '3000000', '500000', '250000'),
(4, 'Staf Keuangan', '3500000', '500000', '350000'),
(8, 'Admin', '4500000', '750000', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpa` int(11) NOT NULL,
  `ijin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpa`, `ijin`) VALUES
(15, '032022', '12345678', 'Imam Kusaeri', 'Laki-laki', 'Staf Marketing', 20, 0, 1, 0),
(18, '032022', '11223344', 'Sahilla', 'Perempuan', 'Staf Marketing', 22, 0, 0, 0),
(20, '032022', '11223456', 'Dilla', 'Perempuan', 'Staf Marketing', 19, 3, 0, 0),
(21, '032022', '11223345', 'Testing', 'Laki-laki', 'Staf Marketing', 18, 4, 0, 0),
(22, '032022', '11224567', 'Coba', 'Laki-laki', 'Staf Administrasi', 20, 0, 0, 5),
(23, '032022', '12349876', 'Alias seperti itu', 'Perempuan', 'Staf Marketing', 20, 2, 2, 1),
(24, '032022', '32198765', 'Semoga Sukses', 'Laki-laki', 'Staf Marketing', 21, 2, 0, 0),
(25, '032022', '32145699', 'Hello', 'Perempuan', 'Staf Keuangan', 22, 1, 3, 0),
(26, '032022', '12345321', 'Dicky Erfan', 'Laki-laki', 'Admin', 20, 0, 0, 2),
(27, '032022', '11112222', 'Imam Badri', 'Laki-laki', 'Staf Marketing', 18, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `usernames` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `usernames`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(13, '12345678', 'Imam Kusaeri', '', '', 'Laki-laki', 'Staf Marketing', '2022-02-25', 'Pegawai Tetap', 'taufik3.png', 2),
(16, '11223344', 'Sahilla', '', '', 'Perempuan', 'Staf Marketing', '2022-03-01', 'Pegawai Tetap', 'women.png', 2),
(17, '11112222', 'Imam Badri', 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'Laki-laki', 'Staf Marketing', '2022-03-02', 'Pegawai Tetap', 'taufik.png', 2),
(18, '11223456', 'Dilla', '', '', 'Perempuan', 'Staf Marketing', '2022-03-02', 'Pegawai Tetap', '', 2),
(19, '11223345', 'Testing', '', '', 'Laki-laki', 'Staf Marketing', '2022-03-02', 'Pegawai Tidak Tetap', '', 2),
(20, '11224567', 'Siti Badriyah', 'siti', 'db04eb4b07e0aaf8d1d477ae342bdff9', 'Perempuan', 'Staf Administrasi', '2022-03-02', 'Pegawai Tetap', 'women.png', 2),
(21, '12349876', 'Alias seperti itu', '', '', 'Perempuan', 'Staf Marketing', '2022-03-02', 'Pegawai Tetap', '', 2),
(23, '32198765', 'Semoga Sukses', 'sukses', 'f936e6010fec57ff2f73e9e97cf98b55', 'Laki-laki', 'Staf Marketing', '2022-03-02', 'Pegawai Tetap', '', 1),
(24, '32145699', 'Hello', '', '', 'Perempuan', 'Staf Keuangan', '2022-03-02', 'Pegawai Tidak Tetap', '', 2),
(25, '12345321', 'Dicky Erfan', 'dicky', 'ee0b6db238b075d0da86340048fb147a', 'Laki-laki', 'Admin', '2022-03-24', 'Pegawai Tetap', 'dicky.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(2, 'Alpa', 40000),
(7, 'Sakit', 10000),
(8, 'Ijin', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
