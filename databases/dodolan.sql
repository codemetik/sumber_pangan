-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2020 pada 04.53
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
  `stok` int(225) NOT NULL,
  `harga` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `stok`, `harga`, `harga_jual`) VALUES
('K0001', 'Guarantee Card ', 2000, 185, 265),
('K0002', 'Stiker Gajah B (Miyako)', 1000, 150, 193),
('K0003', 'Stiker Yamaha', 5000, 75, 427),
('K0004', 'Stiker Installation Advice Solenoid Interlock', 50, 6615, 8000),
('K0005', 'Emblem \"S\"', 9000, 1100, 1400),
('K0006', 'Label Denso', 52000, 65, 95);

--
-- Trigger `barang`
--
DELIMITER $$
CREATE TRIGGER `delete_rols_customer` AFTER DELETE ON `barang` FOR EACH ROW BEGIN
	delete from tb_rols_customer where id_barang = old.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_rols_supplier` AFTER DELETE ON `barang` FOR EACH ROW BEGIN
	delete from tb_rols_supplier where id_barang = old.id_barang;
    END
$$
DELIMITER ;
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
('CS001', 'PT. Rinnai Indonesia', '', ''),
('CS002', 'PT.  Yamaha Indonesia', '', ''),
('CS003', 'PT. Siemens Indonesia', '', ''),
('CS004', 'PT. Indonesia Nippon Seiki', '', ''),
('CS005', 'PT. Koyorad Jaya Indonesia ', '', '');

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
('SUP0001', 'PT. Wahana Ajitama', '', ''),
('SUP0002', 'PT. Mitra Grafika', '', ''),
('SUP0003', 'Griya Sarana Label', '', ''),
('SUP0004', '3 Jaya Digital Print', '', ''),
('SUP0005', 'PT. Tato', '', '');

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
-- Trigger `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `batal_trx` AFTER DELETE ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - old.brg_masuk WHERE id_barang=old.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_rl_supplier_dari_trx` AFTER DELETE ON `tb_transaksi` FOR EACH ROW BEGIN
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
-- Trigger `tb_transaksi_jual`
--
DELIMITER $$
CREATE TRIGGER `batal_jual_trx` AFTER DELETE ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + old.brg_keluar WHERE id_barang = old.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_rl_customer_dari_trx_jual` AFTER DELETE ON `tb_transaksi_jual` FOR EACH ROW BEGIN
	delete from tb_rols_customer where id_jual = old.id_jual;
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
  ADD KEY `id_jual` (`id_jual`,`id_barang`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `tb_rols_supplier`
--
ALTER TABLE `tb_rols_supplier`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

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
  MODIFY `no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_rols_supplier`
--
ALTER TABLE `tb_rols_supplier`
  MODIFY `no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rols_customer`
--
ALTER TABLE `tb_rols_customer`
  ADD CONSTRAINT `tb_rols_customer_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rols_supplier`
--
ALTER TABLE `tb_rols_supplier`
  ADD CONSTRAINT `tb_rols_supplier_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi_jual`
--
ALTER TABLE `tb_transaksi_jual`
  ADD CONSTRAINT `tb_transaksi_jual_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
