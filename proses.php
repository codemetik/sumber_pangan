<?php 

include "koneksi.php";

if (isset($_POST['simpan'])) {

$id = $_POST['id'];
$nm = $_POST['name'];
$jns = $_POST['jenis'];
$stk = $_POST['stok'];
$hrg = $_POST['harga'];

$query = "INSERT INTO barang(id_barang, nama, jenis, stok, harga) VALUES('$id','$nm','$jns', $stk,'$hrg')";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:dasboard_admin.php?page=home");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}

}
?>