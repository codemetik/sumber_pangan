-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2020 pada 01.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dodolan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
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
(11, '', 'windi', '4e3ccde7dc705b1abcce17019905279b'),
(12, '', 'admin2020', '4441e5d70b3657900fa57e66db407e0b'),
(16, '', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46'),
(17, '', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46'),
(18, '', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46'),
(19, '', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `stok` int(225) NOT NULL,
  `harga` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jenis`, `stok`, `harga`, `harga_jual`) VALUES
('K0001', 'Beras Raja Lele', 'Premium', 32, 55000, 60000),
('K0002', 'Beras Pandan Wangi', 'Premium', 31, 60000, 65000),
('K0003', 'Beras Idola', 'Super', 21, 75000, 80000),
('K0004', 'Beras Si Pulen', 'Premium', 18, 65000, 70000),
('K0005', 'Beras Maknyus', 'Super', 20, 70000, 75000),
('K0006', 'Beras Sania', 'Premium', 20, 50000, 55000),
('K0007', 'Beras BMW', 'Under Premium', 14, 40000, 45000),
('K0008', 'Beras Cap Bunga', 'Under Premium', 20, 30000, 35000),
('K0009', 'Beras Sumo', 'Premium', 20, 65000, 70000),
('K0010', 'Beras Organik Nusa', 'Under Premium', 5, 35000, 40000),
('K0011', 'Beras Idola', 'Super', 20, 75000, 80000),
('K0012', 'Beras Ngawiti Mas', 'Premium', 20, 65000, 70000),
('K0013', 'Beras Ramos', 'Super', 20, 70000, 75000),
('K0014', 'Beras Topi Koki', 'Super', 28, 85000, 90000),
('K0015', 'Beras Hotel', 'Super', 20, 80000, 85000),
('K0016', 'Beras Panen', 'Super', 20, 60000, 65000),
('K0017', 'Beras andalan', 'Rombeng', 40, 50000, 55000),
('K0018', 'Kebuli', 'Buli', 30, 45000, 50000),
('K0019', 'buli', 'kebul', 20, 100000, 105000),
('K0020', 'Buli keb', 'kebul-kebul', 22, 32000, 34000),
('K0021', 'Balibul', 'Bali', 30, 15000, 20000);

--
-- Trigger `barang`
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
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` char(15) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama_customer`, `no_telp`, `alamat`) VALUES
('CS001', 'Dandi Boy', '08977777777', 'tangerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rols_customer`
--

CREATE TABLE `tb_rols_customer` (
  `no` int(15) NOT NULL,
  `id_customer` char(15) NOT NULL,
  `id_jual` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `tgl` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rols_customer`
--

INSERT INTO `tb_rols_customer` (`no`, `id_customer`, `id_jual`, `id_barang`, `tgl`) VALUES
(1, 'CS002', 'P010', 'K0020', '2020-11-16'),
(2, 'CS003', 'P009', 'K0020', '2020-11-16'),
(3, 'CS004', 'P010', 'K0020', '2020-11-16'),
(4, 'CS005', 'P001', 'K0020', '2020-11-17'),
(5, 'CS001', 'P001', 'K0021', '2020-11-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rols_supplier`
--

CREATE TABLE `tb_rols_supplier` (
  `no` int(15) NOT NULL,
  `id_supplier` char(15) NOT NULL,
  `id_transaksi` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `tgl` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rols_supplier`
--

INSERT INTO `tb_rols_supplier` (`no`, `id_supplier`, `id_transaksi`, `id_barang`, `tgl`) VALUES
(3, 'SUP0001', 'T001', 'K0001', '2020-11-17'),
(4, 'SUP0002', 'T002', 'K0002', '2020-11-17'),
(5, 'SUP0001', 'T003', 'K0003', '2020-11-17'),
(6, 'SUP0002', 'T004', 'K0004', '2020-11-17'),
(7, 'SUP0002', 'T005', 'K0020', '2020-11-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` char(15) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
('SUP0001', 'Dedek', '08977777777', 'Pamulang'),
('SUP0002', 'Andy', '089565656878', 'Tangerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` char(20) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `brg_masuk` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `id_barang`, `nama_barang`, `brg_masuk`) VALUES
('T001', '2020-11-17', 'K0001', 'Beras Raja Lele', 2),
('T002', '2020-11-17', 'K0002', 'Beras Pandan Wangi', 3),
('T003', '2020-11-17', 'K0003', 'Beras Idola', 4),
('T004', '2020-11-17', 'K0004', 'Beras Si Pulen', 3),
('T005', '2020-11-17', 'K0020', 'Buli keb', 2);

--
-- Trigger `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `batal_trx` AFTER DELETE ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - old.brg_masuk WHERE id_barang=old.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_rols_supplier` AFTER DELETE ON `tb_transaksi` FOR EACH ROW BEGIN
	delete from tb_rols_supplier where id_transaksi = old.id_transaksi;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_beli_trx` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + new.brg_masuk WHERE id_barang=new.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_trx_pembelian` AFTER UPDATE ON `tb_transaksi` FOR EACH ROW BEGIN
	update barang set stok = stok - old.brg_masuk + new.brg_masuk where id_barang = new.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_jual`
--

CREATE TABLE `tb_transaksi_jual` (
  `id_jual` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` char(20) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `brg_keluar` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi_jual`
--

INSERT INTO `tb_transaksi_jual` (`id_jual`, `tanggal`, `id_barang`, `nama_barang`, `brg_keluar`) VALUES
('P001', '2020-11-17', 'K0021', 'Balibul', 2);

--
-- Trigger `tb_transaksi_jual`
--
DELIMITER $$
CREATE TRIGGER `batal_jual_trx` AFTER DELETE ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + old.brg_keluar WHERE id_barang = old.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_rols_customer` AFTER DELETE ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	delete from tb_transaksi_jual where id_jual = old.id_jual;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurang_jual_trx` AFTER INSERT ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	update barang set stok = stok - new.brg_keluar where id_barang = new.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_trx_penjualan` AFTER UPDATE ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	update barang set stok = stok - old.brg_keluar + new.brg_keluar where id_barang = new.id_barang;
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tb_rols_customer`
--
ALTER TABLE `tb_rols_customer`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_jual` (`id_jual`,`id_barang`);

--
-- Indeks untuk tabel `tb_rols_supplier`
--
ALTER TABLE `tb_rols_supplier`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_barang`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`);

--
-- Indeks untuk tabel `tb_transaksi_jual`
--
ALTER TABLE `tb_transaksi_jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_rols_customer`
--
ALTER TABLE `tb_rols_customer`
  MODIFY `no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_rols_supplier`
--
ALTER TABLE `tb_rols_supplier`
  MODIFY `no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi_jual`
--
ALTER TABLE `tb_transaksi_jual`
  ADD CONSTRAINT `relasi_jual` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
