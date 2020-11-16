<?php 
session_start();
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);

if (!empty($user) && !empty($pass)) {
$query = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
$sql = mysqli_query($koneksi, $query);
$us = mysqli_fetch_array($sql);
$result = mysqli_num_rows($sql);
if ($result>0) {
	$usr = $us['username'];

	$_SESSION['username']=$usr;
	$_SESSION['status']="login";
	// header("location:dasboard_admin.php");
	echo "<script>
	alert('Berhasil Login');
	document.location.href = 'index2.php';
	</script>";
}else{
	header("location:index.php?pesan=gagal");
}
}else{
	echo "<p style='color:red;'>Email Dan password Tidak Boleh Kosong, <a href='index.php' style='color:blue;'>Klik Untuk Kembali</a></p>";
}
?>