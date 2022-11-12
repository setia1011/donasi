-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 01:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anak`
--

CREATE TABLE `tbl_anak` (
  `id_anak` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anak`
--

INSERT INTO `tbl_anak` (`id_anak`, `nama`, `jk`, `tgl_lahir`, `umur`, `alamat`, `kategori`, `created_date`) VALUES
(2, 'Ucok Cimahi', 'Laki-Laki', '2016-09-11', '5', 'Jalan Kedoya Raya, Gang Bidan Erna Rt 04 Rw 06 No 31 , Jakarta Barat', 'Anak didik', '2021-06-03'),
(7, 'Marisa Rahmawati', 'Perempuan', '2011-07-06', '10', 'Jalan Kedoya Raya, Gang Bidan Erna Rt 04 Rw 06 , Jakarta Barat', 'Yatim', '2021-06-03'),
(9, 'Wiwi Putrikasari', 'Perempuan', '1959-02-07', '62', 'Jalan Kedoya Raya. Gang Kipali, Rt 008 Rw 06 Jakarta barat', 'Duafa', '2021-06-03'),
(10, 'Farhan Kusuma', 'Laki-Laki', '1961-06-12', '60', 'Jalan Kedoya Raya. Gang Sd. Rt 002 Rw 006 No. 68 Jakarta barat', 'Duafa', '2021-06-03'),
(11, 'Akbar Ramadhan', 'Laki-Laki', '2010-02-21', '11', 'Jalan Kedoya Raya, Gang Bidan Erna Rt 04 Rw 06 No71 , Jakarta Barat', 'Yatim', '2021-06-03'),
(12, 'Zanna Kirania', 'Perempuan', '2009-07-17', '12', 'Jalan Kedoya Raya, Gang Hj Billy Rt 003 Rw 09, No 35 , Jakarta Barat', 'Yatim', '2021-06-03'),
(13, 'Azka Aqilla Putri', 'Perempuan', '2015-04-26', '6', 'Jalan Kedoya Raya, Gang Haji Billi Rt 05 Rw 09 No 74 , Jakarta Barat', 'Yatim', '2021-06-03'),
(14, 'Putra Barato', 'Laki-Laki', '2013-11-28', '8', 'Jalan Kedoya Raya, Gang Bidan Erna Rt 04 Rw 06, No 41, Jakarta Barat', 'Yatim', '2021-06-03'),
(15, 'Husen Rahmat', 'Laki-Laki', '1956-12-03', '65', 'Jalan Kedoya Raya, Gang asem Rt 01 Rw 06 No 1 , Jakarta Barat', 'Duafa', '2021-06-03'),
(16, 'Edi Sukma', 'Laki-Laki', '1952-07-12', '69', 'Jalan Kedoya Raya, Gang Bidan Erna Rt 005 Rw 06. No.72 , Jakarta Barat', 'Duafa', '2021-06-03'),
(17, 'Ida Rahayu', 'Perempuan', '1950-02-19', '71', 'Jalan Kedoya Raya, Gang Bidan Erna Rt 04 Rw 06 No79 , Jakarta Barat', 'Duafa', '2021-06-03'),
(18, 'Vern Chandra', 'Perempuan', '2015-03-21', '6', 'Jalan Kedoya Raya, Gang Haji Billy, Rt 07 Rw 09, No.81 , Jakarta Barat', 'Anak didik', '2021-06-03'),
(20, 'Annisa Rahmawati', 'Perempuan', '2015-12-24', '6', 'Jalan Kedoya Raya, Gang Bidan Erna Rt 03 Rw 006,No.37 , Jakarta Barat', 'Anak didik', '2021-06-03'),
(21, 'Fahmi Ramadhan', 'Laki-Laki', '2015-01-23', '6', 'Jalan Kedoya Raya, Gang AsemRt 001 Rw 06,No.52 , Jakarta Barat', 'Anak didik', '2021-06-03'),
(22, 'muh indras', 'Laki-Laki', '1999-01-31', '23', 'Jalan Raya', 'Yatim', '2022-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `gambar`) VALUES
(5, 'development_life_cycle.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penggalangan` int(11) NOT NULL,
  `gambar` varchar(80) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `doa` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `id_user`, `id_penggalangan`, `gambar`, `nominal`, `doa`, `status`, `created_date`) VALUES
(12, 7, 3, 'bola.jpg', '500000', 'Bismillah berkah', 'Diterima', '2021-05-30'),
(14, 7, 4, 'uno.jpg', '100000', 'semoga menjadi anak masa depan yang sukses.', 'Diterima', '2021-06-01'),
(15, 5, 5, 'download_(1).jpg', '1000000', 'semoga adik-adik makin nyaman untuk belajar di ruang kelas. ', 'Diterima', '2021-06-01'),
(16, 5, 6, 'download_(1).jpg', '500000', 'hanya bisa sedikit memberi, semoga bermanfaat untuk ibu... ', 'Diterima', '2021-06-01'),
(17, 7, 5, 'bola.jpg', '200000', 'semoga berkah', 'Diterima', '2021-06-01'),
(18, 9, 5, 'tf.jpeg', '100000', 'semoga adik adik betah belajar di kelas ', 'Diterima', '2021-06-03'),
(19, 7, 4, 'pengertian-fungsi-jenis-topologi-swicth-jaringan-komputer.jpg', '200000', 'semoga bermanfaat ', 'Diterima', '2021-06-04'),
(20, 7, 4, 'bola.jpg', '50000', 'bismillah berkah', 'Diterima', '2021-06-05'),
(22, 10, 3, 'tf_joki_2.jpeg', '100000', 'semoga kegiatan maulid nabi nantinya berjalan dengan lancar, amin\r\n', 'Diterima', '2021-06-17'),
(23, 7, 6, 'tf_joki_1.jpeg', '50000', 'semoga membantu', 'Diterima', '2021-06-18'),
(24, 11, 5, 'contoh_bukti_tf.jpeg', '100000', 'somoga bermanfaat\r\n', 'Diterima', '2021-06-18'),
(25, 9, 9, 'tf_joki_1.jpeg', '1500000', 'semoga berkah bagi anak anak dan duafa di yayasan.', 'Ditolak', '2022-04-21'),
(26, 7, 3, 'tf_joki_1.jpeg', '100000', 'SEMOGA BERKAH DAN BERMANFAAT KEGIATANNYA', 'Diterima', '2022-05-26'),
(27, 12, 3, 'tf_joki_1.jpeg', '50000', 'bismillah semoga kegiatan maulid nabi di yayasan berjalan dengan lancar, amin\r\n', 'Diterima', '2022-06-06'),
(28, 10, 3, 'tf_joki_1.jpeg', '100000', 'Bismillah semoga acaranya dilancarkan', 'Menunggu Verifikasi', '2022-06-11'),
(29, 11, 3, 'tf_joki_1.jpeg', '50000', 'apapun kegiatannya kita harus dukung ', 'Ditolak', '2022-06-11'),
(30, 5, 4, 'tf_joki_1.jpeg', '70000', 'tetap semangat ya adik adik... ', 'Diterima', '2022-06-11'),
(31, 12, 5, 'tf_joki_1.jpeg', '200000', 'semangat untuk anak anak supaya giat belajar', 'Ditolak', '2022-06-11'),
(32, 5, 4, 'tf_joki_1.jpeg', '50000', 'sehat selalu adik adik..', 'Ditolak', '2022-06-11'),
(33, 9, 3, 'tf_joki_1.jpeg', '30000', 'testing', 'Diterima', '2022-06-14'),
(34, 9, 3, 'tf_joki_1.jpeg', '50000', '', 'Diterima', '2022-06-17'),
(35, 3, 3, 'tf_joki_1.jpeg', '30000', 'semoga bermanfaat', 'Menunggu Verifikasi', '2022-07-01'),
(36, 11, 3, 'tf_joki_1.jpeg', '70000', 'sehat terus ya adik adik', 'Menunggu Verifikasi', '2022-07-01'),
(37, 9, 3, 'DWH_SEACRH.png', '100000', 'terima kasih', 'Diterima', '2022-08-06'),
(38, 9, 12, 'icha.jpg', '50000', 'testing', 'Diterima', '2022-08-06'),
(39, 9, 3, 'otomatis', '50000', 'aamiin', 'Diterima', '2022-08-13'),
(40, 9, 3, 'otomatis', '25000', 'bismillah', 'Diterima', '2022-08-13'),
(41, 9, 3, 'otomatis', '25000', '', 'Diterima', '2022-08-14'),
(42, 3, 15, 'download_(2).png', '5000000', 'aaa', 'Diterima', '2022-11-12'),
(43, 3, 14, '1_1-nataliemoore.jpg', '2000000', 'aaa', 'Diterima', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_penggalangan`
--

CREATE TABLE `tbl_kategori_penggalangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori_penggalangan`
--

INSERT INTO `tbl_kategori_penggalangan` (`id`, `nama`) VALUES
(1, 'Yatim'),
(2, 'Sekolah'),
(3, 'Duafa'),
(5, 'Pembangunan Pesantren');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `id_penggalangan` int(11) NOT NULL,
  `desc_kegiatan` text NOT NULL,
  `kategori_kegiatan` varchar(255) NOT NULL,
  `gambar_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id`, `nama_kegiatan`, `id_penggalangan`, `desc_kegiatan`, `kategori_kegiatan`, `gambar_kegiatan`) VALUES
(8, 'Pembukaan Acara', 3, 'penyambutan', 'kegiatan sedang berlangsung', '4.jpg'),
(9, 'Kegiatan', 14, 'Kegiatan', 'Kegiatan', 'echarts.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konten`
--

CREATE TABLE `tbl_konten` (
  `id_konten` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `isi_konten` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_konten`
--

INSERT INTO `tbl_konten` (`id_konten`, `judul`, `isi_konten`, `created_date`) VALUES
(1, 'Detail Yayasan', 'Detail Yayasan', '2021-05-21'),
(4, 'Kegiatan Bersedekah untuk Kaum Duafa', 'Kegiatan Bersedekah untuk Kaum Duafa', '2022-05-10'),
(5, 'Alamat Yayasan', 'Alamat Yayasan', '2022-06-02'),
(6, 'Hubungi Kami ', 'Hubungi Kami', '2022-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penggalangan`
--

CREATE TABLE `tbl_penggalangan` (
  `id_penggalangan` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `total_harapan` varchar(50) NOT NULL,
  `total_proses` varchar(50) NOT NULL,
  `bar` varchar(10) NOT NULL,
  `waktu_penggalangan` date NOT NULL,
  `jml_donatur` varchar(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penggalangan`
--

INSERT INTO `tbl_penggalangan` (`id_penggalangan`, `judul`, `gambar`, `kategori`, `total_harapan`, `total_proses`, `bar`, `waktu_penggalangan`, `jml_donatur`, `created_date`) VALUES
(14, 'Contoh - 1', 'Contoh-Sistem-Informasi-1.jpg', '1', 'Rp. 20.000.000', '2000000', '0%', '2022-11-30', '1', '2022-11-12'),
(15, 'Contoh - 2', 'Contoh-Sistem-Informasi-1.jpg', '2', 'Rp. 20.000.000', '5000000', '0%', '2022-11-24', '1', '2022-11-12'),
(16, 'Contoh - 3', 'Contoh-Sistem-Informasi-1.jpg', '3', 'Rp. 20.000.000', '0', '0%', '2022-11-23', '', '2022-11-12'),
(17, 'Contoh - 4', 'Contoh-Sistem-Informasi-1.jpg', '5', 'Rp. 20.000.000', '0', '0%', '2022-12-19', '', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyaluran`
--

CREATE TABLE `tbl_penyaluran` (
  `id_penyaluran` int(11) NOT NULL,
  `id_penggalangan` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tgl_penyaluran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyaluran`
--

INSERT INTO `tbl_penyaluran` (`id_penyaluran`, `id_penggalangan`, `keterangan`, `jumlah`, `tgl_penyaluran`) VALUES
(5, 1, 'triplek doang nich', 'Rp. 30.000', '2021-05-31'),
(6, 1, 'beli Batako', 'Rp. 70.000', '2021-05-31'),
(7, 3, 'Banner ', 'Rp. 100.000', '2021-06-04'),
(8, 4, 'membeli beras 1 karung', 'Rp. 200.000', '2021-06-05'),
(9, 5, 'Papan Tulis', 'Rp. 590.000', '2021-06-17'),
(11, 4, 'berbagi', 'Rp. 150.000', '2021-06-18'),
(12, 3, 'Pembelian', 'Rp. 70.000', '2022-05-26'),
(13, 3, 'Konsumsi ', 'Rp. 200.000', '2022-06-12'),
(14, 14, 'Santunan', 'Rp. 1.000.000', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `tgl_lahir`, `jk`, `no_telpon`, `password`, `role`, `created_date`) VALUES
(1, 'Admin', 'admin@gmail.com', '1990-01-20', 'Laki-Laki', '021559823', '123456', '1', '2021-05-21'),
(2, 'Operator', 'operator@gmail.com', '1997-05-03', 'Laki-Laki', '0215593245', '123456', '2', '2021-05-26'),
(3, 'Bayu Hardiansyah', 'bayu@gmail.com', '1997-01-11', 'Laki-Laki', '08123456453', '123456', '3', '2021-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tbl_kategori_penggalangan`
--
ALTER TABLE `tbl_kategori_penggalangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `tbl_penggalangan`
--
ALTER TABLE `tbl_penggalangan`
  ADD PRIMARY KEY (`id_penggalangan`);

--
-- Indexes for table `tbl_penyaluran`
--
ALTER TABLE `tbl_penyaluran`
  ADD PRIMARY KEY (`id_penyaluran`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_kategori_penggalangan`
--
ALTER TABLE `tbl_kategori_penggalangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_konten`
--
ALTER TABLE `tbl_konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_penggalangan`
--
ALTER TABLE `tbl_penggalangan`
  MODIFY `id_penggalangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_penyaluran`
--
ALTER TABLE `tbl_penyaluran`
  MODIFY `id_penyaluran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
