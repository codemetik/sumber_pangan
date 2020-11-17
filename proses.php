<?php 

include "koneksi.php";

if (isset($_POST['simpan'])) {

$id = $_POST['id'];
$nm = $_POST['name'];
$jns = $_POST['jenis'];
$stk = $_POST['stok'];
$hrg = $_POST['harga'];
$harga_jual = $_POST['harga_jual'];

$query = "INSERT INTO barang(id_barang, nama, jenis, stok, harga, harga_jual) VALUES('$id','$nm','$jns', $stk,'$hrg','$harga_jual')";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:index2.php?page=stok_barang");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}

}
?>