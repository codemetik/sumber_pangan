<?php 
include "../koneksi.php";

if (isset($_POST['simpan_user'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$id_akses = $_POST['id_akses'];

	$add = mysqli_query($koneksi, "INSERT INTO admin(nama, username, password) VALUES('$nama','$username','$password')");

	if ($add) {
		$show = mysqli_query($koneksi, "SELECT * FROM admin WHERE nama = '".$nama."' AND username = '".$username."' AND password = '".$password."'");
		$dshow = mysqli_fetch_array($show);

		$addakses = mysqli_query($koneksi, "INSERT INTO tb_rols_akses(id_admin, id_akses) VALUES('".$dshow['id_admin']."', '".$id_akses."')");

		if ($addakses) {
			echo "<script>
			alert('Data Berhasil disimpan');
			document.location.href = '../index2.php?page=data_user';
			</script>";	
		}
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = '../index2.php?page=data_user';
		</script>";
	}
}
?>