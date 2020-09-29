-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 12:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, '', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, '', 'kebunkode', '626850df9ef9897ba2e253c3c427b435'),
(4, '', 'bang_juli', '895dcd9a280363a6c3f493ea90513ff5'),
(5, '', 'kode', '70375478134bc7187a0d5a0ffd59c283'),
(7, '', 'windi', '96e79218965eb72c92a549dd5a330112'),
(8, '', 'dani', '96e79218965eb72c92a549dd5a330112'),
(9, '', 'jayanti', 'e10adc3949ba59abbe56e057f20f883e'),
(10, '', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(11, '', 'windi', '4e3ccde7dc705b1abcce17019905279b');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `stok` int(225) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jenis`, `stok`, `harga`) VALUES
('K0001', 'Beras Raja Lele', 'Premium', 10, 55000),
('K0002', 'Beras Pandan Wangi', 'Premium', 20, 60000),
('K0003', 'Beras Idola', 'Super', 20, 75000),
('K0004', 'Beras Si Pulen', 'Premium', 20, 65000),
('K0005', 'Beras Maknyus', 'Super', 20, 70000),
('K0006', 'Beras Sania', 'Premium', 25, 50000),
('K0007', 'Beras BMW', 'Under Premium', 25, 40000),
('K0008', 'Beras Cap Bunga', 'Under Premium', 20, 30000),
('K0009', 'Beras Sumo', 'Premium', 20, 65000),
('K0010', 'Beras Organik Nusa', 'Under Premium', 20, 35000),
('K0011', 'Beras Idola', 'Super', 10, 75000),
('K0012', 'Beras Ngawiti Mas', 'Premium', 20, 65000),
('K0013', 'Beras Ramos', 'Super', 20, 70000),
('K0014', 'Beras Topi Koki', 'Super', 20, 85000),
('K0015', 'Beras Hotel', 'Super', 20, 80000),
('K0016', 'Beras Panen', 'Super', 20, 60000);

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `hapus_barang` AFTER DELETE ON `barang` FOR EACH ROW BEGIN
	DELETE FROM tb_transaksi WHERE id_barang = old.id_barang;
	DELETE FROM tb_transaksi_jual WHERE id_barang = old.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_harga` char(20) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `id_barang` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_harga`
--

INSERT INTO `tb_harga` (`id_harga`, `harga_beli`, `harga_jual`, `id_barang`) VALUES
('H001', 40000, 55000, 'K0001'),
('H002', 45000, 60000, 'K0002'),
('H003', 60000, 75000, 'K0003'),
('H004', 50000, 65000, 'K0004'),
('H005', 55000, 70000, 'K0005'),
('H006', 35000, 50000, 'K0006'),
('H007', 25000, 40000, 'K0007'),
('H008', 15000, 30000, 'K0008'),
('H009', 50000, 65000, 'K0009'),
('H010', 20000, 35000, 'K0010'),
('H011', 60000, 75000, 'K0011'),
('H012', 50000, 65000, 'K0012'),
('H013', 55000, 70000, 'K0013'),
('H014', 65000, 80000, 'K0014');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` char(20) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `brg_masuk` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `id_barang`, `nama_barang`, `brg_masuk`) VALUES
('T001', '2019-06-03', 'K0002', 'Beras Pandan Wangi', 2),
('T002', '2019-06-06', 'K0003', 'Beras Idola', 3),
('T003', '2019-06-14', 'K0004', 'Beras Si Pulen', 5),
('T004', '2019-06-16', 'K0007', 'Beras BMW', 6),
('T005', '2019-06-19', 'K0010', 'Beras Organik Nusa', 15),
('T006', '2019-06-30', 'K0006', 'Beras Sania', 5),
('T007', '2019-06-27', 'K0007', 'Beras BMW', 5);

--
-- Triggers `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `batal_trx` AFTER DELETE ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - old.brg_masuk WHERE id_barang=old.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_beli_trx` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + new.brg_masuk WHERE id_barang=new.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_jual`
--

CREATE TABLE `tb_transaksi_jual` (
  `id_jual` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` char(20) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `brg_keluar` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_jual`
--

INSERT INTO `tb_transaksi_jual` (`id_jual`, `tanggal`, `id_barang`, `nama_barang`, `brg_keluar`) VALUES
('P001', '2019-06-03', 'K0002', 'Beras Pandan Wangi', 10),
('P002', '2019-06-17', 'K0001', 'Beras OrganikNusa', 20),
('P003', '2019-06-18', 'K0014', 'Beras BMW', 8),
('P004', '2019-06-29', 'K0011', 'Beras Idola', 10);

--
-- Triggers `tb_transaksi_jual`
--
DELIMITER $$
CREATE TRIGGER `batal_jual_trx` AFTER DELETE ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + old.brg_keluar WHERE id_barang = old.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurang_jual_trx` AFTER INSERT ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	update barang set stok = stok - new.brg_keluar where id_barang = new.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `inbox` text NOT NULL,
  `saldo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `inbox`, `saldo`) VALUES
(1, 'admin', 'windijayanti', '', '', 0),
(2, 'windi', '111111', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `harga_barang` (`id_barang`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`);

--
-- Indexes for table `tb_transaksi_jual`
--
ALTER TABLE `tb_transaksi_jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD CONSTRAINT `harga_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `tb_transaksi_jual`
--
ALTER TABLE `tb_transaksi_jual`
  ADD CONSTRAINT `relasi_jual` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
