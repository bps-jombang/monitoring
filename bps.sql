-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 08:36 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'bps', '$2y$10$QACnVGt1PBlWlEHqM1w8WeTTZDb5WnuASWQyxmiuFSxlWBbH.zHci'),
(2, 'nania', '$2y$10$EHEao/B62NdUSYRDFe11wuAKnyrOjjYwyEIaUGu2c4yP4LZAfOxcm'),
(3, 'alfaza', '$2y$10$/TotjWlJGd4DbH9n1bViuOlWI8JtzfxmiF7XrxkaZuAdX4Bs.f.aa'),
(4, 'dzikri', '$2y$10$MX1CdhGvLxKQvezXh7BDFOWXKTna4XjeMF8D/QPsOF1zVXh/aMRfe');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kasi'),
(2, 'Staff');

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
(1, '010', 'Bandar Kedung M'),
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
(21, '200', 'Plandaan'),
(22, '123', 'sayang'),
(23, '099', 'hahahahaha'),
(24, '123', 'sasasa'),
(25, '194', 'indonesia'),
(26, '194', 'indonesia');

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
  `target_penyelesaian` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_seksi`, `uraian_kegiatan`, `vol`, `satuan`, `target_penyelesaian`) VALUES
(1, 3, 'pengawasan update SAK sm I', 21, 'BS', 'Januari'),
(2, 3, 'pengawasan pencacahan SAK sm I', 210, 'Dokumen', 'Februari'),
(3, 3, 'pelatihan sakernas Sm 1', 3, 'Hari', 'Januari'),
(4, 5, 'Sampel Ubinan', 0, '', ''),
(10, 3, 'Sampel Ubinan (PMS)', 0, '0', ''),
(11, 3, 'Surve KSA (Pengawas)', NULL, NULL, NULL),
(12, 3, 'Surve KSA (Pencacahan)', NULL, NULL, NULL),
(13, 3, 'Srv. Perkebunan Triwulanan (PCL)', NULL, NULL, NULL),
(14, 4, 'SURVEI HARGA PERDESAAN; HD', NULL, NULL, NULL),
(15, 4, 'SURVEI HARGA PERDESAAN; HKD', NULL, NULL, NULL),
(16, 4, 'SURVEI BIDANG JASA PARIWISATA ; VHT-S (5 HOTEL)', NULL, NULL, NULL),
(17, 4, 'INDEKS KEMAHALAN KONSTRUKSI (IKK) bulan Jan, ApriL, Juli dan Okt', NULL, NULL, NULL),
(18, 4, 'SURVEI HARGA PRODUSEN ; HP-G (Gabah) \"Bulanan\"', NULL, NULL, NULL),
(19, 4, 'SURVEI HARGA PRODUSEN ; HP-BG (Beras di Penggilingan)', NULL, NULL, NULL),
(20, 4, 'SURVEI HARGA PRODUSEN ; HP (HPS dan HPK), HP-JP (JASA PENDIDIKAN) ', NULL, NULL, NULL),
(21, 4, 'SURVEI HARGA PERDAGANGAN BESAR (HPB-S) ; 18 RESPONDEN', NULL, NULL, NULL),
(22, 4, 'Survei SAPB', NULL, NULL, NULL),
(23, 5, 'STK triw I', NULL, NULL, NULL),
(24, 5, 'STK triw II', NULL, NULL, NULL),
(25, 5, 'STK triw III', NULL, NULL, NULL),
(26, 5, 'STK triw IV', NULL, NULL, NULL),
(27, 5, 'SKKRT triw I', NULL, NULL, NULL),
(28, 5, 'SKKRT triw II', NULL, NULL, NULL),
(29, 5, 'SKKRT triw III', NULL, NULL, NULL),
(30, 5, 'SKKRT triw IV', NULL, NULL, NULL),
(31, 5, 'SKLNP triw I', NULL, NULL, NULL),
(32, 5, 'SKLNP triw II', NULL, NULL, NULL),
(33, 5, 'SKLNP triw III', NULL, NULL, NULL),
(34, 5, 'SKLNP triw IV', NULL, NULL, NULL),
(35, 5, 'Disagregasi  PMTB', NULL, NULL, NULL),
(36, 5, 'SMAK-D', NULL, NULL, NULL),
(37, 5, 'SKSPPI', NULL, NULL, NULL),
(38, 5, 'Updating LNPRT', NULL, NULL, NULL),
(39, 5, 'SKPS', NULL, NULL, NULL),
(40, 5, 'SKSJ', NULL, NULL, NULL),
(41, 5, 'SKNP', NULL, NULL, NULL),
(42, 5, 'SKLNP Tahunan', NULL, NULL, NULL),
(43, 5, 'SKTIR', NULL, NULL, NULL),
(44, 5, 'Pengawasan PMTB', NULL, NULL, NULL),
(45, 5, 'Publikasi PDRB Lapus', NULL, NULL, NULL),
(46, 5, 'Publikasi PDRB Pengeluaran', NULL, NULL, NULL),
(47, 5, 'Publikasi Inkesra', NULL, NULL, NULL),
(48, 5, 'Publikasi Statda', NULL, NULL, NULL),
(49, 6, 'Pemutakhiran Sistem Dan Program MFD Dan MBS Berbasis Web sm1', NULL, NULL, NULL),
(50, 6, 'Pemutakhiran Sistem Dan Program MFD Dan MBS Berbasis Web sm1', NULL, NULL, NULL),
(51, 6, 'Peningkatan Kualitas Dan Layanan Publikasi (DDA)', NULL, NULL, NULL),
(52, 6, 'Peningkatan Kualitas Dan Layanan Publikasi (KCA)', NULL, NULL, NULL),
(53, 6, 'Peningkatan Pelayanan Metadata Kegiatan Statistik Dasar, Sektoral Dan Khusus', NULL, NULL, NULL),
(54, 6, 'Survei Kebutuhan Data', NULL, NULL, NULL),
(55, 6, 'Pemutakhiran Peta Clustering SLS', NULL, NULL, NULL),
(56, 4, 'STKU TW I', NULL, NULL, NULL),
(57, 4, 'K3 (Statistik Keuangan Desa)', NULL, NULL, NULL),
(58, 4, 'BUMD', NULL, NULL, NULL),
(59, 4, 'K2 (Statistik Keuangan PEMKAB)', NULL, NULL, NULL),
(60, 4, 'APBD 2', NULL, NULL, NULL),
(61, 4, 'SLK(Survei Lembaga Keuangan)', NULL, NULL, NULL),
(62, 2, 'Pelatihan SUSENAS Maret', NULL, NULL, NULL),
(63, 2, 'Pengawasan Updating Susenas', NULL, NULL, NULL),
(64, 2, 'Pencacahan RH', NULL, NULL, NULL),
(65, 2, 'Pengawasan dan Pemeriksaan SUSENAS Maret', NULL, NULL, NULL),
(66, 2, 'Pelatihan SPAK', NULL, NULL, NULL),
(67, 2, 'Pencacahan SPAK', NULL, NULL, NULL),
(68, 2, 'Pengawasan SPAK', NULL, NULL, NULL),
(69, 2, 'Pengawasan Updating Podes', NULL, NULL, NULL),
(70, 2, 'Pelatihan Sakernas Agustus', NULL, NULL, NULL),
(71, 2, 'Pengawasan Updating Sakernas', NULL, NULL, NULL),
(72, 2, 'Pengawasan dan Pemeriksaan SAKERNAS Agustus', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_detail`
--

CREATE TABLE `kegiatan_detail` (
  `id_kegiatan_detail` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `target` int(11) DEFAULT NULL,
  `realisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_detail`
--

INSERT INTO `kegiatan_detail` (`id_kegiatan_detail`, `id_kegiatan`, `id_user`, `target`, `realisasi`) VALUES
(1, 1, 4, 7, 1),
(2, 2, 4, 70, NULL),
(3, 3, 4, 3, NULL),
(4, 4, 9, 5, NULL),
(6, 1, 9, 2, NULL),
(7, 1, 1, 5, NULL),
(8, 1, 2, NULL, NULL),
(9, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`) VALUES
(1, 'Harapan Jaya'),
(8, 'Bunda Minang');

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
  `nama_seksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seksi`
--

INSERT INTO `seksi` (`id_seksi`, `nama_seksi`) VALUES
(1, 'Tata usaha'),
(2, 'Sosial'),
(3, 'Produksi'),
(4, 'Distribusi'),
(5, 'Nerwilis'),
(6, 'IPDS');

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
(8, 0, NULL, 8, NULL),
(9, 0, NULL, 9, 'Abdul Sigit WH'),
(10, 0, NULL, 10, 'Nanang Khisbullah'),
(11, 0, NULL, 11, NULL),
(12, 0, NULL, 12, 'Ari S'),
(13, 0, NULL, 13, NULL),
(14, 0, NULL, 14, 'M Mujib'),
(15, 0, NULL, 15, 'Adi C'),
(16, 0, NULL, 16, 'Bambang S'),
(17, 0, NULL, 17, NULL),
(18, 0, NULL, 18, 'Abdurahman'),
(19, 0, NULL, 19, 'M Hanafi'),
(20, 0, NULL, 20, 'Nanang Hp'),
(21, 0, NULL, 21, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

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
  ADD PRIMARY KEY (`id_kegiatan_detail`),
  ADD KEY `FK_KEGDET_KEG` (`id_kegiatan`),
  ADD KEY `FK_KEGDET_USER` (`id_user`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `kegiatan_detail`
--
ALTER TABLE `kegiatan_detail`
  MODIFY `id_kegiatan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id_seksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `kegiatan_detail`
--
ALTER TABLE `kegiatan_detail`
  ADD CONSTRAINT `FK_KEGDET_KEG` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KEGDET_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_USER_KEC` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
