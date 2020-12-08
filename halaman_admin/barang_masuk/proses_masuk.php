<?php 

include "../../koneksi.php";

if (isset($_POST['simpan'])) {

$id = $_POST['id'];
$tgl = $_POST['tanggal'];
$id_brg = $_POST['id_barang'];
$nm = $_POST['nama'];
$msk = $_POST['masuk'];

$id_supplier = $_POST['id_supplier'];

$query = "INSERT INTO tb_transaksi(id_transaksi, tanggal, id_barang, nama_barang, brg_masuk) VALUES('$id','$tgl','$id_brg','$nm','$msk')";
$sql = mysqli_query($koneksi, $query);

$sup = mysqli_query($koneksi, "INSERT INTO tb_rols_supplier(id_supplier, id_transaksi, id_barang, tgl) VALUES('$id_supplier','$id','$id_brg','$tgl')");

if ($sql && $sup) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:../../halaman_admin.php?page=pembelian");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}

}
?>