-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 09:59 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sitapus`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `status`) VALUES
('K0001', '1', 'Y'),
('K0002', '2', 'Y'),
('K0003', '3', 'Y'),
('K0004', '4', 'Y'),
('K0005', '5', 'Y'),
('K0006', '6', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` varchar(50) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `saldo` double NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `orang_tua` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` enum('Y','T') NOT NULL,
  `level` varchar(10) NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `no_rekening`, `username`, `password`, `nama`, `id_kelas`, `saldo`, `alamat`, `orang_tua`, `tempat_lahir`, `tanggal_lahir`, `status`, `level`, `id_session`) VALUES
('N0001', '2021000001', '2021000001', 'c4d64f5fc80ddbec8c8af09b44989610', 'Achamd Rafli stiawan', 'K0001', 10000, ' dusun kalibening RT: 32 RW: 12 desa Pronojiwo     ', 'Dwi S', 'Lumajang', '2014-04-27', 'Y', 'user', ''),
('N0002', '2021000002', '2021000002', '4e1e05dbf89a358739f30b058a248ff7', 'Adinda Naisya Nur Alfinda', 'K0001', 30000, ' dusu Kalibening RT: 04 RW: 02 desa Pronojiwo  ', 'Fer alfian', 'Lumajang', '2014-09-27', 'Y', 'user', ''),
('N0003', '2021000003', '2021000003', '2c7e8971cd237a7813fb2713d0f0b2c5', 'Ahmat Dirli Ardiansah', 'K0001', 10000, ' dusun Sriti RT: 01 RW: 01 desa Sumberurip  ', 'Witono', 'Lumajang', '2014-09-06', 'Y', 'user', ''),
('N0004', '2021000004', '2021000004', '90bb08fb9b8c801fd88b40271237b7f8', 'Aisyah Khumairoh', 'K0001', 30000, ' dusu Tulungagungan RT: 10 RW: 04 desa Pronojiwo   ', 'Sukarma', 'Lumajang', '2015-03-23', 'Y', 'user', ''),
('N0005', '2021000005', '2021000005', '37065e13c6afc6a4a697e6ac39ee3d0f', 'Alifa Naufalyn Fikria Rabbani', 'K0001', 40000, ' dusu Darungan RT: 26 RW: 09 desa Pronojiwo  ', 'Thorik H', 'Lumajang', '2014-04-23', 'Y', 'user', ''),
('N0006', '2021000006', '2021000006', '791697a38446f0ebf9773decc948079d', 'Alyah Hasna Syofia', 'K0001', 15000, ' dusun Tulungagungan RT: 09 RW: 09 desa Pronojiwo  ', 'Muhammad', 'Lumajang', '2015-05-03', 'Y', 'user', ''),
('N0007', '2021000007', '2021000007', 'a4bf8ac27d412bd23a90404226041e92', 'Cindy Firlia Arsadila', 'K0001', 20000, ' dusu Kalibening RT: 33 RW: 12 desa Pronojiwo    ', 'Adi Santoso', 'Lumajang', '2015-05-17', 'Y', 'user', ''),
('N0008', '2021000008', '2021000008', '4f752486b86eaf60f4663a4e92f786c9', 'Fadil Naufal Wahab', 'K0001', 100000, ' dusu Kalibening RT: 03 RW: 02 desa Pronojiwo   ', 'Wawan', 'Lumajang', '2014-08-07', 'Y', 'user', ''),
('N0009', '2021000009', '2021000009', '216d03606ad778ccb8e37b34e78a50d3', 'Khauratul Mahfudzah Ridhwan', 'K0001', 60000, ' dusun Kalibening RT: 01 RW: 01 desa Pronojiwo   ', 'Rohmatulloh', 'Lumajang', '2014-08-18', 'Y', 'user', ''),
('N0010', '2021000010', '2021000010', 'e4d61a261c066b549687328dee07fa55', 'M Kenzie Rayhan Fillah', 'K0001', 0, ' dusun Sriti RT: 06 RW: 03 desa Sumberurip   ', 'M Hasan', 'Lumajang', '2014-10-07', 'Y', 'user', ''),
('N0011', '2021000011', '2021000011', 'ddf90c4ec1922f554cfa4bd08d8a5f99', 'M Rezky Maulidan Widayanto', 'K0001', 30000, ' dusu Darungan RT: 21 RW: 08 desa Pronojiwo  ', 'Agus S', 'Lumajang', '2015-01-07', 'Y', 'user', ''),
('N0012', '2021000012', '2021000012', '2acc90cee24df2edba931aca9562eaf8', 'Marsha Mutiara Fatimah', 'K0001', 30000, ' dusun Purwoseto RT: 05 RW: 01 desa Sumberurip  ', 'Muhammad', 'Lumajang', '2014-05-08', 'Y', 'user', ''),
('N0013', '2021000013', '2021000013', '158961fd0b6a41f4c740cc1bcf047b20', 'Muhammad Azka Khansa K.F', 'K0001', 30000, ' dusun Kalibening RT: 01 RW: 01 desa Pronojiwo  ', 'Suwanto', 'Lumajang', '2014-05-11', 'Y', 'user', ''),
('N0014', '2021000014', '2021000014', '22434088d94c124d4331262814c91607', 'Muhammad Rifki Rivaldo', 'K0001', 15000, ' dusun Mulyoarjo RT: 19 RW: 07 desa Pronojiwo   ', 'Yateno', 'Lumajang', '2013-12-27', 'Y', 'user', ''),
('N0015', '2021000015', '2021000015', 'c4eeaf75423222f2df5a4ef6ab714227', 'Mustofa Kamal', 'K0001', 0, ' dusun Manggisan RT: 10 RW: 04 desa Tamanayu   ', 'Abdul R', 'Makkah', '2014-05-16', 'Y', 'user', ''),
('N0016', '2021000016', '2021000016', '362a3b2fded810252c1c80a6526c4097', 'Naumi Malika Ayunda Putri', 'K0001', 40000, ' dusun Oro-orong RT: 01 RW: 10 desa Pronojiwo  ', 'Moh N', 'Lumajang', '2014-04-30', 'Y', 'user', ''),
('N0017', '2021000017', '2021000017', '4421d1ebdead7a8aad74103e631ad422', 'Rassya Albian Saputra', 'K0001', 45000, ' dusun Pronojiwo RT: 39 RW: 14 desa Pronojiwo   ', 'Andik W', 'Lumajang', '2014-05-25', 'Y', 'user', ''),
('N0018', '2021000018', '2021000018', 'bf433dc8b67c8a234ce5fbd451cb64af', 'Miqaila Az Zahra', 'K0001', 31000, ' dusun Rowobaung RT: 39 RW: 14 desa Pronojiwo  ', 'Aan', 'Lumajang', '2014-03-13', 'Y', 'user', ''),
('N0019', '2021000019', '2021000019', 'c59678d66231d52d3456e8c3d4b862d0', 'Reyga Ardinata', 'K0001', 40000, ' dusun Kalibening RT: 03 RW: 02 desa Pronojiwo  ', 'Rusnadi', 'Lumajang', '2015-03-18', 'Y', 'user', ''),
('N0020', '2021000020', '2021000020', 'a3a3c8cac9dfafd08090ddbe775b5529', 'Sabrina Maulidiya', 'K0001', 285000, ' dusun Kalibening RT: 01 RW: 01 desa Pronojiwo   ', 'Windu C', 'Lumajang', '2015-01-12', 'Y', 'user', ''),
('N0021', '2021000021', '2021000021', 'f71a1095d2fe04d167466f5b6d1f0baf', 'Vrea Anindhyta  Afza Kirana', 'K0001', 80000, ' dusun Pronojiwo RT: 35 RW: 13 desa Pronojiwo  ', 'Susianto', 'Lumajang', '2015-01-13', 'Y', 'user', ''),
('N0022', '2021000022', '2021000022', 'be025fffe463b7ca62c10b6091b0afd5', 'Zulfa Afkarina', 'K0001', 30000, ' dusun sumber RT: 01 RW: 13 desa Oro-oro Ombo  ', 'Suherman', 'Lumajang', '2014-09-14', 'Y', 'user', ''),
('N0023', '2021000023', '2021000023', '0f0f2b9a4a5ffd1a48adb26ad243fe45', 'Muhammad Hilmi Al Farisi', 'K0001', 10000, ' dusun Sumber RT: 03 RW: 11 desa Oro-oro Ombo  ', 'Imam A', 'Lumajang', '2015-01-03', 'Y', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `no_pegawai` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `no_pegawai`, `nama`, `alamat`, `no_telp`, `username`, `password`, `level`, `status`, `id_session`) VALUES
('P0002', '2021001', 'qodriatul laila', ' pronojiwo  ', '0811111111', 'laila', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Y', '61ijjjnre9k1nta71e4vf2uo37');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(20) NOT NULL,
  `nama_sekolah` varchar(200) NOT NULL,
  `kepala` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `situs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `kepala`, `alamat`, `telephone`, `situs`) VALUES
(1, 'MI Nurul Islam Pronojiwo', 'Hasani S.Pdi', 'Jl. Sastrodikoro no. 9 dusun Kalibening desa pronojiwo kec. Pronojiwo kab. Lumajang, Jawa Timur kode pos 67374      ', '081334245683', 'https://minipro.sch.id');

-- --------------------------------------------------------

--
-- Table structure for table `transaksitabungan`
--

CREATE TABLE `transaksitabungan` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `debit` int(10) NOT NULL,
  `kredit` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksitabungan`
--

INSERT INTO `transaksitabungan` (`id_transaksi`, `id_nasabah`, `tanggal`, `debit`, `kredit`, `keterangan`) VALUES
('T0001', 'N0002', '2021-09-01', 30000, 0, ''),
('T0002', 'N0003', '2021-09-01', 10000, 0, ''),
('T0003', 'N0004', '2021-09-01', 30000, 0, ''),
('T0004', 'N0006', '2021-09-01', 15000, 0, ''),
('T0005', 'N0005', '2021-09-01', 40000, 0, ''),
('T0006', 'N0007', '2021-09-01', 20000, 0, ''),
('T0007', 'N0008', '2021-09-01', 100000, 0, ''),
('T0008', 'N0009', '2021-09-01', 60000, 0, ''),
('T0009', 'N0011', '2021-09-01', 30000, 0, ''),
('T0010', 'N0012', '2021-09-01', 30000, 0, ''),
('T0011', 'N0013', '2021-09-01', 30000, 0, ''),
('T0012', 'N0014', '2021-09-01', 15000, 0, ''),
('T0013', 'N0016', '2021-09-01', 40000, 0, ''),
('T0014', 'N0017', '2021-09-01', 45000, 0, ''),
('T0015', 'N0018', '2021-09-01', 31000, 0, ''),
('T0016', 'N0019', '2021-09-01', 40000, 0, ''),
('T0017', 'N0020', '2021-09-01', 285000, 0, ''),
('T0018', 'N0021', '2021-09-01', 80000, 0, ''),
('T0019', 'N0022', '2021-09-01', 30000, 0, ''),
('T0020', 'N0023', '2021-09-01', 10000, 0, ''),
('T0021', 'N0001', '2021-09-20', 10000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_infaq`
--

CREATE TABLE `transaksi_infaq` (
  `id_infaq` varchar(50) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `debit` int(100) NOT NULL,
  `kredit` int(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `total_infaq` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_infaq`
--

INSERT INTO `transaksi_infaq` (`id_infaq`, `id_pegawai`, `id_nasabah`, `tanggal`, `debit`, `kredit`, `keterangan`, `total_infaq`) VALUES
('I0001', '', 'N0001', '2021-09-01', 10000, 0, '', 117000),
('I0002', '', 'N0002', '2021-09-01', 5000, 0, '', 117000),
('I0005', '', 'N0001', '2021-09-19', 1000, 0, '', 117000),
('I0009', '', 'N0001', '2021-09-19', 1000, 0, '', 117000),
('I0011', '', 'N0001', '2021-09-19', 2000, 0, '', 117000),
('I0012', 'P0002', '', '2021-09-20', 0, 1000, '', 117000),
('I0013', '', 'N0001', '2021-09-20', 1000, 0, '', 117000),
('I0014', 'P0002', '', '2021-09-27', 0, 2000, 'beli pensil', 117000),
('I0015', '', 'N0001', '2021-09-28', 100000, 0, '', 117000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `transaksitabungan`
--
ALTER TABLE `transaksitabungan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_infaq`
--
ALTER TABLE `transaksi_infaq`
  ADD PRIMARY KEY (`id_infaq`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
