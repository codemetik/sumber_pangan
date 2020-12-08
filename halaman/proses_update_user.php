<?php 
include "../koneksi.php";

if (isset($_POST['simpan_user'])) {
	$id_admin = $_POST['id_admin'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	// $password = md5($_POST['password']);
	$id_akses = $_POST['id_akses'];

	$add = mysqli_query($koneksi, "UPDATE admin SET nama = '$nama', username = '$username' WHERE id_admin = '$id_admin'");

	$addakses = mysqli_query($koneksi, "UPDATE tb_rols_akses SET id_akses = '$id_akses' WHERE id_admin = '$id_admin'");

	if ($add && $addakses) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../index2.php?page=data_user';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = '../index2.php?page=data_user';
		</script>";
	}
}
?>