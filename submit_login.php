<?php 
session_start();
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);

if (!empty($user) && !empty($pass)) {
$query = "SELECT * FROM tb_rols_akses X INNER JOIN admin Y ON y.id_admin = x.id_admin INNER JOIN tb_akses z ON z.id_akses = x.id_akses WHERE username='$user' AND password='$pass'";
$sql = mysqli_query($koneksi, $query);
$us = mysqli_fetch_array($sql);
$result = mysqli_num_rows($sql);
if ($result > 0) {

	if ($us['id_akses'] == '1') {
		$_SESSION['nama_akses'] = $us['nama_akses'];
		$_SESSION['id_admin'] = $us['id_admin'];
		$_SESSION['id_akses'] = $us['id_akses'];
		$usr = $us['username'];
		$_SESSION['username']=$usr;
		$_SESSION['status']="login";
		// header("location:dasboard_admin.php");
		echo "<script>
		alert('Anda Berhasil Login Sebagai ".$us['nama_akses']."');
		document.location.href = 'index2.php';
		</script>";//mengarah ke halaman owner (hak akses penuh)

	}else if($us['id_akses'] == '2'){
		$_SESSION['nama_akses'] = $us['nama_akses'];
		$_SESSION['id_admin'] = $us['id_admin'];
		$_SESSION['id_akses'] = $us['id_akses'];
		$usr = $us['username'];
		$_SESSION['username']=$usr;
		$_SESSION['status']="login";
		// header("location:dasboard_admin.php");
		echo "<script>
		alert('Anda Berhasil Login Sebagai ".$us['nama_akses']."');
		document.location.href = 'halaman_admin.php';
		</script>";//mengarah ke halaman owner (hak akses admin)

	}else if($us['id_akses'] == '3'){
		$_SESSION['nama_akses'] = $us['nama_akses'];
		$_SESSION['id_admin'] = $us['id_admin'];
		$_SESSION['id_akses'] = $us['id_akses'];
		$usr = $us['username'];
		$_SESSION['username']=$usr;
		$_SESSION['status']="login";
		// header("location:dasboard_admin.php");
		echo "<script>
		alert('Anda Berhasil Login Sebagai ".$us['nama_akses']."');
		document.location.href = 'index2.php';
		</script>";//mengarah ke halaman owner (hak akses SPV PPIC)

	}
	
}else{
	header("location:index.php?pesan=gagal");
}
}else{
	echo "<p style='color:red;'>Email Dan password Tidak Boleh Kosong, <a href='index.php' style='color:blue;'>Klik Untuk Kembali</a></p>";
}
?>