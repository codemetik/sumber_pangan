<?php 

include "../../koneksi.php";

if (isset($_POST['simpan'])) {

$id = $_POST['id'];
$tgl = $_POST['tanggal'];
$id_brg = $_POST['id_barang'];
$nm = $_POST['nama'];
$msk = $_POST['keluar'];

$query = "INSERT INTO tb_transaksi_jual(id_jual, tanggal, id_barang, nama_barang, brg_keluar) VALUES('$id','$tgl','$id_brg','$nm','$msk')";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:../../index2.php?page=penjualan");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}

}
?>