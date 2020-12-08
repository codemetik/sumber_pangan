<?php 
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);
$id_akses = $_POST['id_akses'];
if (!empty($user)&&!empty($pass)) {
	# code...
	$sql = mysqli_query($koneksi, "INSERT INTO admin (id_admin, nama, username, password) VALUES('','','$user','$pass')");

	$show = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '".$user."' AND password = '".$pass."'");
	$dshow = mysqli_fetch_array($show);

	$sql1 = mysqli_query($koneksi, "INSERT INTO tb_rols_akses(id_admin, id_akses) VALUES('".$dshow['id_admin']."','".$id_akses."')");
	print("Registrasi Success <a href='index.php' style='color:blue;'>Ke Halaman Login.</a>");
	header("index.php");
}else{
	echo "<p style='color:red;'>Maaf tidak Boleh ada field yg kosong ! <a href='register.php' style='color:blue;'>Klik Untuk Kembali</a></p>";
}
mysqli_close($koneksi);
?>