<?php 

include "../../koneksi.php";

if (isset($_POST['simpan'])) {

$id = $_POST['id'];
$tgl = $_POST['tanggal'];
$id_brg = $_POST['id_barang'];
$nm = $_POST['nama'];
$msk = $_POST['keluar'];

$id_customer = $_POST['id_customer'];
$nama_customer = $_POST['nama_customer'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO tb_transaksi_jual(id_jual, tanggal, id_barang, nama_barang, brg_keluar) VALUES('$id','$tgl','$id_brg','$nm','$msk')";
$sql = mysqli_query($koneksi, $query);

$sup = mysqli_query($koneksi, "INSERT INTO tb_customer(id_customer, nama_customer, no_telp, alamat) VALUES('$id_customer','$nama_customer','$no_telp','$alamat')");

$cus_rol = mysqli_query($koneksi, "INSERT INTO tb_rols_customer(id_customer,id_jual, id_barang, tgl) VALUES('$id_customer','$id','$id_brg','$tgl')");

if ($sql && $sup && $cus_rol) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:../../index2.php?page=penjualan");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}

}
?>