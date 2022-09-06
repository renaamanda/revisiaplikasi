-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 02:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekspedisi_pengiriman`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tanggal_jam_masuk` datetime NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `telp_penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` float NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `petugas_input_bm` varchar(50) NOT NULL,
  `tanggal_jam_input_bm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `no_transaksi`, `id_pegawai`, `id_customer`, `id_cabang`, `nama_barang`, `tanggal_jam_masuk`, `total_biaya`, `nama_penerima`, `telp_penerima`, `alamat_penerima`, `jumlah`, `berat`, `satuan`, `petugas_input_bm`, `tanggal_jam_input_bm`) VALUES
(1, 'TR091', 1, 1, 3, 'Miniatur Helikopter', '2022-05-30 20:18:00', 20000, 'Syamsul', '0813804103', 'jl 1234', 2, 0.33, 'Unit', 'Administrator', '2022-06-01 04:41:07'),
(2, 'TR094', 1, 1, 3, 'Kipas Angin ', '2022-05-31 14:35:00', 20000, 'Udin', '0819349134', 'jl pangeran', 2, 2.41, 'Unit', 'Administrator', '2022-06-01 04:41:07'),
(5, 'TR942', 1, 2, 3, 'Cangkir 1 Lusin', '2022-06-25 15:12:00', 500000, 'Udin', '0813804103', 'jl kayu tangi no.123', 2, 2, 'Dus', 'Administrator', '2022-06-25 07:13:17'),
(6, 'TR081', 3, 2, 3, 'Kosmetik', '2022-06-27 10:05:00', 155000, 'Beautywomanshop', '081247890241', 'Jl. Transmisi Kalimantan desa karang intan N0.12', 6, 20, 'Dus', 'Administrator', '2022-06-27 03:07:30'),
(7, 'TR082', 3, 3, 3, 'Elektronik', '2022-06-28 12:01:00', 67000, 'Syahwan', '081257901779', 'Jl Trisakti kota lama no.89 ', 1, 1.5, 'Unit', 'Administrator', '2022-06-28 05:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `petugas_input` varchar(50) NOT NULL,
  `tanggal_jam_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`, `kota`, `alamat`, `no_telp`, `petugas_input`, `tanggal_jam_input`) VALUES
(1, ' TUBAN CABANG', 'Jawa Timur', 'Jl. Soekarno Hatta, Mulung, Bogorejo, Kec. Merakurak, Kab. Tuban - Jawa Timur, MERAKURAK. TUBAN', '085730815026', 'Administrator', '2022-06-01 04:34:27'),
(2, 'WELAHAN AGEN', 'Jawa Tengah', 'Jl. Raya Welahan Gotri KM 3, Karang Malang, Kel. Kalipucang Kulon, Kec. Welahan, Jepara - Jateng, WELAHAN. JEPARA', '081211561192', 'Administrator', '2022-06-01 04:34:27'),
(3, 'BANJARMASIN CABANG', 'Banjarmasin', 'JL.Veteran No. 2, Kelurahan : Sungai Bilu', '05113277547', 'Administrator', '2022-06-01 04:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `kode_customer` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `petugas_input` varchar(50) NOT NULL,
  `tanggal_jam_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `kode_customer`, `nama`, `alamat`, `no_hp`, `petugas_input`, `tanggal_jam_input`, `password`) VALUES
(1, 'C001', 'Siti Fatimah', 'jl garis 1 blok E.24', '081231231578', 'Administrator', '2022-06-01 04:37:25', '$2y$10$3Pc0CTm/yJC8bNshbfbU5.pYTKIfH36f//e.jB4o1gARty8rWNOAe'),
(2, 'C002', 'Bayus', 'jl. pangeran gg.rahman no.43', '081331413215', 'Administrator', '2022-06-25 07:11:53', '$2y$10$LH9AsWxE0TM1Uj26i/sk7ueY2dpaTmEW5/IJuHp60xxxraLtqgEPm'),
(3, 'C003', 'Regina Mawaddah', 'KM 11 perumahan keruwing indah  blok C.23', '082248891340', 'Administrator', '2022-06-28 04:54:01', '$2y$10$muRzqT17wRCExARQQtq0euRUcUqowSJUZK9J5192Hq4GkULk0eP/6');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Khonghucu') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tmt_kurir` date NOT NULL,
  `petugas_input` varchar(50) NOT NULL,
  `tanggal_jam_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL,
  `foto_kurir` text NOT NULL,
  `count_kurir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`, `tmt_kurir`, `petugas_input`, `tanggal_jam_input`, `password`, `foto_kurir`, `count_kurir`) VALUES
(1, '1964556697820312090', 'Ahmad Effendi', 'Kandangan', '1998-05-30', 'Laki-Laki', 'Islam', 'jl semangat raya blok F.21', '082357893613', '2022-05-30', 'Administrator', '2022-06-01 04:18:08', '$2y$10$MM6rxgoAxAvXPh21JyR5nOqWHKlQ6cUXBSladO2QSwlbEeTyqMvsi', '9144faaa2db9d3ea0c734e9e252ceca4.jpg', 1),
(2, '1964556697820312092', 'Dodo', 'Kandangan', '1990-06-25', 'Laki-Laki', 'Islam', 'jl rambutan No.17', '081231431265', '2022-06-25', 'Administrator', '2022-06-25 05:11:43', '$2y$10$E5nVLdjCAleRTYW.uQ1cM.cMgpW5bM9muqCkj5r/eAyZUlblCOTQ2', '628ee344c69c959509cb9ee729670d26.png', 1),
(4, '1689025689135852490', 'Ramadhani Eko', 'Banjarbaru', '1986-01-14', 'Laki-Laki', 'Islam', 'Jl. Kemerdekaan raya No.9 ', '087814763481', '2021-06-08', 'Administrator', '2022-06-27 02:40:02', '$2y$10$JQmqiijSHziWHyJIyuTfNO5RQS.NOECe6isLp6cw8PFb/K.8FFhnS', 'bf9a590d18a653915f21b5fcb474010f.jpg', 1),
(5, '65287346211', 'Kiki', 'Banjarbaru', '2022-06-02', 'Perempuan', 'Islam', 'gfjgjsse', '081273931264', '2022-06-01', 'Administrator', '2022-06-30 09:10:41', '$2y$10$Qe.i2Wmbxll7fAUd6KuNNOsdod18TlS/jxoTNJwcZp9IAgfapmJs2', '4c3fd75baf0ae29e3d99465f19353bbb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Khonghucu') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tmt_pegawai` date NOT NULL,
  `foto_pegawai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`, `tmt_pegawai`, `foto_pegawai`) VALUES
(1, '1964556697820312091', 'Muhammad Dodo', 'Banjarmasin', '1990-05-30', 'Laki-Laki', 'Islam', 'jl semangat2 blok D No.12\r\n', '081231233904', '2022-05-30', 'b8e2bff47bd8e6d406f33896d1d0ff13.jpg'),
(2, '1872873529174097158', 'Nanang Hanafi', 'Banjarmasin', '1987-02-03', 'Laki-Laki', 'Islam', 'Jl Mentaos 2 komplek perumahan 9 No.50', '081273931264', '2021-08-11', '8fbcfc992a778303c8cc0b31e7d1cecd.png'),
(3, '162775027492640364', 'Aulia Khadijah', 'Kandangan', '1997-06-17', 'Perempuan', 'Islam', 'Jl. A yani KM 17 komplek budi intan no.9', '087815891345', '2021-03-04', '1e6830863fe5e160e37e56967a58ed7a.jpg'),
(4, '1884589023459671247', 'Ahmad Raufiq Maulana', 'Banjarbaru', '1989-01-01', 'Laki-Laki', 'Islam', 'Jl. Handil Bakti komplek griya utama 1 no.19', '085734996713', '2021-08-09', 'acad8275bb6769127e65bfff0ff98392.jpg'),
(5, '1637983650014589845', 'Desi Aprilia ', 'Banjarmasin', '1978-09-18', 'Perempuan', 'Islam', 'Jl Borneo Indah komplek perumahan citra permai no.97', '087816831409', '2020-12-09', '1753cccd5ca0b0a9d9d736216ca5a858.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `nama_pengeluaran` varchar(100) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `biaya_pengeluaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `petugas_input_p2` varchar(50) NOT NULL,
  `tanggal_jam_input_p2` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_cabang`, `nama_pengeluaran`, `tanggal_pengeluaran`, `biaya_pengeluaran`, `keterangan`, `petugas_input_p2`, `tanggal_jam_input_p2`) VALUES
(1, 3, 'gaji karyawan', '2022-05-31', 12500000, '', 'Administrator', '2022-06-01 04:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `level` varchar(20) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `no_hp`, `level`, `date_create`, `email`) VALUES
(1, 'Admin', '$2y$10$cf7LwPCMmk1HU2DyISIehurelPrrQiFDA.QiBoF8HtxwtHBjIZN0K', 'Administrator', '082269001421', 'Administrator', '2021-11-19 00:11:27', 'administrator@gmail.com'),
(3, 'Pimpinan', '$2y$10$nskxjKtYtkwwfpYFeOOuGek.KaSXkWtJ4wRMFmhpMOoq/hth5YrE.', 'Pimpinan', '081273931275', 'Pimpinan', '2022-05-30 08:48:52', 'sandy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `no_pengiriman` varchar(50) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_truk` int(11) NOT NULL,
  `tanggal_jam_pengiriman` datetime NOT NULL,
  `status_pengiriman` varchar(50) NOT NULL,
  `file_bukti_kirim` text NOT NULL,
  `petugas_input_p1` varchar(50) NOT NULL,
  `tanggal_jam_input_p1` timestamp NOT NULL DEFAULT current_timestamp(),
  `penilaian` varchar(50) NOT NULL,
  `catatan_customer` text NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_barang_masuk`, `no_pengiriman`, `id_kurir`, `id_truk`, `tanggal_jam_pengiriman`, `status_pengiriman`, `file_bukti_kirim`, `petugas_input_p1`, `tanggal_jam_input_p1`, `penilaian`, `catatan_customer`, `nama_wilayah`) VALUES
(1, 1, 'NP001', 1, 1, '2022-06-15 12:10:00', 'SELESAI', 'a38728c9b0516f11d217463834b11ed3.png', 'Administrator', '2022-06-01 04:53:26', '5', 'oke mantap', 'Banjarmasin'),
(3, 2, 'NP002', 2, 1, '2022-06-18 13:17:00', 'SELESAI', '92fe502d4508df4b6ee2c648004fb658.jpeg', 'Administrator', '2022-06-25 05:18:04', '1', 'pengiriman lambat', 'Banjarbaru'),
(5, 2, 'NP003', 4, 1, '2022-06-21 10:45:00', 'DALAM PERJALANAN', '8857405ce34f9a4de3001a879912b838.jpg', 'Administrator', '2022-06-27 03:46:06', '', '', 'Banjarbaru'),
(6, 7, 'NP004', 4, 5, '2022-06-28 12:10:00', 'DIKIRIM', '404579c4b2e2a55863e45c4ca5905009.jpg', 'Administrator', '2022-06-28 05:22:35', '', '', 'Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat_jalan` int(11) NOT NULL,
  `nomor_surat_jalan` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_barang_masuk` varchar(100) NOT NULL,
  `tujuan_pengiriman` varchar(70) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `petugas_input_sj` varchar(50) NOT NULL,
  `tanggal_jam_input_sj` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id_surat_jalan`, `nomor_surat_jalan`, `id_pegawai`, `id_kurir`, `id_barang_masuk`, `tujuan_pengiriman`, `tanggal_surat`, `petugas_input_sj`, `tanggal_jam_input_sj`) VALUES
(5, 'SJ001', 3, 1, '6', 'Jl A yani KM 21 komplek griya asri blok A.50 RT 08 RW 02', '2022-06-27', 'Administrator', '2022-06-27 03:08:58'),
(6, 'SJ002', 3, 4, '7', 'Jl Trisakti kota lama no.89', '2022-06-28', 'Administrator', '2022-06-28 05:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `tanda_terima`
--

CREATE TABLE `tanda_terima` (
  `id_tanda_terima` int(11) NOT NULL,
  `nomor_surat_tanda_terima` varchar(50) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `petugas_input_tt` varchar(50) NOT NULL,
  `tanggal_jam_input_tt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanda_terima`
--

INSERT INTO `tanda_terima` (`id_tanda_terima`, `nomor_surat_tanda_terima`, `id_barang_masuk`, `tanggal_surat`, `petugas_input_tt`, `tanggal_jam_input_tt`) VALUES
(3, 'STT01', 6, '2022-06-27', 'Administrator', '2022-06-27 03:08:11'),
(4, 'STT02', 7, '2022-06-28', 'Administrator', '2022-06-28 05:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `tanggal_jam_tracking` datetime NOT NULL,
  `status_kirim` varchar(40) NOT NULL,
  `catatan_tracking` text NOT NULL,
  `petugas_input_tr` varchar(50) NOT NULL,
  `tanggal_jam_input_tr` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_barang_masuk`, `id_kurir`, `tanggal_jam_tracking`, `status_kirim`, `catatan_tracking`, `petugas_input_tr`, `tanggal_jam_input_tr`) VALUES
(3, 6, 1, '2022-06-27 10:09:00', 'dikirim', '', 'Administrator', '2022-06-27 03:09:35'),
(4, 1, 4, '2022-06-27 10:44:00', 'dalam perjalanan', '', 'Administrator', '2022-06-27 03:45:07'),
(5, 7, 4, '2022-06-28 12:09:00', 'dikirim', '', 'Administrator', '2022-06-28 05:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `truk`
--

CREATE TABLE `truk` (
  `id_truk` int(11) NOT NULL,
  `nama_truk` varchar(100) NOT NULL,
  `plat` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `petugas_input` varchar(50) NOT NULL,
  `tanggal_jam_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truk`
--

INSERT INTO `truk` (`id_truk`, `nama_truk`, `plat`, `kapasitas`, `petugas_input`, `tanggal_jam_input`) VALUES
(1, 'Pickup', 'DA 1488 VN', 800, 'Administrator', '2022-06-28 04:56:18'),
(5, 'Truck Box', 'DA 1778 PM', 1000, 'Administrator', '2022-06-28 04:55:21'),
(6, 'Truck Box', 'DA 1594 PM', 1000, 'Administrator', '2022-08-06 05:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'Banjarmasin'),
(2, 'Banjarbaru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_customer`,`id_cabang`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_barang_masuk` (`id_barang_masuk`,`id_kurir`,`id_truk`),
  ADD KEY `id_kurir` (`id_kurir`),
  ADD KEY `id_truk` (`id_truk`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_surat_jalan`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_kurir`,`id_barang_masuk`),
  ADD KEY `id_kurir` (`id_kurir`);

--
-- Indexes for table `tanda_terima`
--
ALTER TABLE `tanda_terima`
  ADD PRIMARY KEY (`id_tanda_terima`),
  ADD KEY `id_barang_masuk` (`id_barang_masuk`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`),
  ADD KEY `id_barang_masuk` (`id_barang_masuk`,`id_kurir`),
  ADD KEY `id_kurir` (`id_kurir`);

--
-- Indexes for table `truk`
--
ALTER TABLE `truk`
  ADD PRIMARY KEY (`id_truk`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id_surat_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tanda_terima`
--
ALTER TABLE `tanda_terima`
  MODIFY `id_tanda_terima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `truk`
--
ALTER TABLE `truk`
  MODIFY `id_truk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`),
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_truk`) REFERENCES `truk` (`id_truk`),
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`id_barang_masuk`) REFERENCES `barang_masuk` (`id_barang_masuk`);

--
-- Constraints for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD CONSTRAINT `surat_jalan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `surat_jalan_ibfk_2` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`);

--
-- Constraints for table `tanda_terima`
--
ALTER TABLE `tanda_terima`
  ADD CONSTRAINT `tanda_terima_ibfk_1` FOREIGN KEY (`id_barang_masuk`) REFERENCES `barang_masuk` (`id_barang_masuk`);

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`id_barang_masuk`) REFERENCES `barang_masuk` (`id_barang_masuk`),
  ADD CONSTRAINT `tracking_ibfk_2` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
