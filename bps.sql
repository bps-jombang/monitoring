-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 07:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bps`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nomor_kecamatan` varchar(3) NOT NULL,
  `nama_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nomor_kecamatan`, `nama_kecamatan`) VALUES
(1, '010', 'Bandar Kedung'),
(2, '020', 'Perak'),
(3, '030', 'Gudo'),
(4, '040', 'Diwek'),
(5, '050', 'Ngoro'),
(6, '060', 'Mojowarno'),
(7, '070', 'Bareng'),
(8, '080', 'Wonosalam'),
(9, '090', 'Mojoagung'),
(10, '100', 'Sumobito'),
(11, '110', 'Jogoroto'),
(12, '120', 'Peterongan'),
(13, '130', 'Jombang'),
(14, '140', 'Megaluh'),
(15, '150', 'Tembelang'),
(16, '160', 'Kesamben'),
(17, '170', 'Kudu'),
(18, '171', 'Ngusikan'),
(19, '180', 'Ploso'),
(20, '190', 'Kabuh'),
(21, '200', 'Plandaan');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_seksi` int(11) NOT NULL,
  `uraian_kegiatan` text NOT NULL,
  `vol` int(11) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `target_penyelesaian` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_seksi`, `uraian_kegiatan`, `vol`, `satuan`, `target_penyelesaian`) VALUES
(1, 3, 'pengawasan update SAK sm I', 21, 'BS', 'Januari'),
(2, 3, 'pengawasan pencacahan SAK sm I', 210, 'Dokumen', 'Februari'),
(3, 3, 'pelatihan sakernas Sm 1', 3, 'Hari', 'Januari'),
(4, 5, 'Sampel Ubinan', 0, '', ''),
(5, 5, 'Survei KSA (Pengawas)', 0, '', ''),
(6, 5, 'Survei KSA (Pencacahan)', 0, '', ''),
(7, 5, 'Surv. Perkebunan Triwulanan (PCL)', 0, '', ''),
(8, 7, 'Survei Harga Perdesaan; HD', 27, 'Dokumen', 'Januari'),
(9, 7, 'Survei Harga Perdesaan; HKD', 21, 'Dokumen', 'Januari');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_detail`
--

CREATE TABLE `kegiatan_detail` (
  `id_kegiatan_detail` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `realisasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seksi`
--

CREATE TABLE `seksi` (
  `id_seksi` int(11) NOT NULL,
  `nama_seksi` varchar(50) NOT NULL,
  `jabatan` enum('Kasi','Staff','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seksi`
--

INSERT INTO `seksi` (`id_seksi`, `nama_seksi`, `jabatan`) VALUES
(1, 'Tata usaha', 'Kasi'),
(2, 'Tata usaha', 'Staff'),
(3, 'Sosial', 'Kasi'),
(4, 'Sosial', 'Staff'),
(5, 'Produksi', 'Kasi'),
(6, 'Produksi', 'Staff'),
(7, 'Distribusi', 'Kasi'),
(8, 'Distribusi', 'Staff'),
(9, 'Nerwilis', 'Kasi'),
(10, 'Nerwilis', 'Staff'),
(11, 'IPDS', 'Kasi'),
(12, 'IPDS', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_seksi` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_user` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `id_seksi`, `id_kecamatan`, `nama_user`) VALUES
(1, 0, NULL, 1, 'Elfian Yulianto'),
(2, 0, NULL, 2, 'Hadi Purwanto'),
(3, 0, NULL, 3, 'Eko S'),
(4, 0, NULL, 4, 'M. Syoleh'),
(5, 0, NULL, 5, 'Yoyok'),
(6, 0, NULL, 6, 'Nursidi'),
(7, 0, NULL, 7, 'Mustakim'),
(8, 0, NULL, 8, ''),
(9, 0, NULL, 9, 'Abdul Sigit WH'),
(10, 0, NULL, 10, 'Nanang Khisbullah'),
(11, 0, NULL, 11, ''),
(12, 0, NULL, 12, 'Ari S'),
(13, 0, NULL, 13, ''),
(14, 0, NULL, 14, 'M Mujib'),
(15, 0, NULL, 15, 'Adi C'),
(16, 0, NULL, 16, 'Bambang S'),
(17, 0, NULL, 17, ''),
(18, 0, NULL, 18, 'Abdurahman'),
(19, 0, NULL, 19, 'M Hanafi'),
(20, 0, NULL, 20, 'Nanang Hp'),
(21, 0, NULL, 21, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `FK_KEGIATAN_SEKSI` (`id_seksi`);

--
-- Indexes for table `kegiatan_detail`
--
ALTER TABLE `kegiatan_detail`
  ADD PRIMARY KEY (`id_kegiatan_detail`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id_seksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_USER_KEC` (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kegiatan_detail`
--
ALTER TABLE `kegiatan_detail`
  MODIFY `id_kegiatan_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id_seksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `FK_KEGIATAN_SEKSI` FOREIGN KEY (`id_seksi`) REFERENCES `seksi` (`id_seksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_USER_KEC` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
