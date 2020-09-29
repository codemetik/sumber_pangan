-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 08:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filosofi_kopi`
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
(5, '', 'kode', '70375478134bc7187a0d5a0ffd59c283');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `stok` int(225) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jenis`, `stok`, `harga`, `gambar`) VALUES
('K0001', 'Kopi lampung', 'Arabika', 3, 410000, '08052019160952kopi-robusta.jpg'),
('K0002', 'Kopi Arang', 'Arabika', 1, 150000, 'arang.jpg'),
('K0003', 'Kopi Excelsa', 'Robusta', 0, 120000, 'excelsa.jpg'),
('K0004', 'Kopi Flores', 'Robusta', 20, 100000, 'flores.jpg'),
('K0005', 'Kopi Liberika', 'Liberia', 0, 130000, 'liberika.jpg'),
('K0006', 'Kopi Arabika', 'Arabika', 0, 32000, 'arabika.jpg'),
('K0007', 'Kopi Gayo', 'Arabika', 0, 50000, 'gayo.jpg'),
('K0008', 'Kopi Kona', 'Robusta', 0, 64000, 'kona.jpg'),
('K0009', 'Kopi Kolombia', 'Robusta', 0, 78000, 'kolombia.jpg'),
('K0010', 'Kopi Luwak', 'Arabika', 0, 21000, 'luwak.jpg'),
('K0011', 'Kopi Kintamani', 'Robusta', 0, 13500, 'kintamani.jpg'),
('K0012', 'Robusta', 'Robusta', 0, 45000, 'robusta.jpg'),
('K0013', 'Kopi Toraja', 'Robusta', 0, 12000, 'toraja.jpg'),
('K0014', 'kopi sambal lado punya', 'robusta', 13, 450000, '15052019180120keyboard.jpg');

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
('H001', 1000, 2000, 'K0001'),
('H002', 1000, 2000, 'K0002'),
('H003', 1000, 2000, 'K0003'),
('H004', 1000, 2000, 'K0004'),
('H005', 1000, 2000, 'K0005'),
('H006', 1000, 2000, 'K0006'),
('H007', 1000, 2000, 'K0007'),
('H008', 1000, 2000, 'K0008'),
('H009', 1000, 2000, 'K0009'),
('H010', 1000, 2000, 'K0010'),
('H011', 1000, 2000, 'K0011'),
('H012', 1000, 2000, 'K0012'),
('H013', 1000, 2000, 'K0013'),
('H014', 1000, 2000, 'K0014');

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
('T001', '2019-05-14', 'K0001', 'Kopi lampung', 1),
('T002', '2019-05-14', 'K0002', 'Kopi Arang', 1),
('T004', '2019-05-14', 'K0004', 'Kopi Flores', 20),
('T005', '2019-05-15', 'K0001', 'Kopi lampung', 5),
('T006', '2019-05-15', 'K0014', 'kopi sambal', 15);

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
('P001', '2019-05-15', 'K0001', 'Kopi lampung', 2),
('P002', '2019-05-15', 'K0001', 'Kopi lampung', 1),
('P003', '2019-05-15', 'K0014', 'kopi sambal', 2);

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
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 0),
(5, 'mama', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', '', '', 0);

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
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
