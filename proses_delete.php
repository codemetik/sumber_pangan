<?php 

include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM barang WHERE id_barang='".$id."'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

$query2 = "DELETE FROM barang WHERE id_barang='".$id."'";
$sql2 = mysqli_query($koneksi,$query2);
if ($sql2) {
	echo "<script>
	alert('Data Berhasil dihapus');
	document.location.href = 'index2.php?page=stok_barang';
	</script>";
	// header("location:index2.php?page=stok_barang");
}else{
	echo "<script>
	alert('Data Gagal dihapus');
	document.location.href = 'index2.php?page=stok_barang';
	</script>";
	// echo "Data gagal di Hapus <a href='dasboard_admin.php?page=dataBarang'>Kembali</a>";
}
?>