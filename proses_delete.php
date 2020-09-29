<?php 

include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM barang WHERE id_barang='".$id."'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

$query2 = "DELETE FROM barang WHERE id_barang='".$id."'";
$sql2 = mysqli_query($koneksi,$query2);
if ($sql2) {
	header("location:dasboard_admin.php?page=dataBarang");
}else{
	echo "Data gagal di Hapus <a href='dasboard_admin.php?page=dataBarang'>Kembali</a>";
}
?>