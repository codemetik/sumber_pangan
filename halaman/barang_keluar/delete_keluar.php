<?php 

include "../../koneksi.php";

// $id = $_GET['id'];
$query2 = "DELETE FROM tb_transaksi_jual WHERE id_jual = '".$_GET['id']."'";
$sql2 = mysqli_query($koneksi, $query2);
if ($sql2) {
	header("location:../../index2.php?page=penjualan");
}else{
	echo "Data gagal di Hapus <a href='../../index2.php?page=penjualan'>Kembali</a>";
}
?>