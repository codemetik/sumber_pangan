<?php 
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);
if (!empty($user)&&!empty($pass)) {
	# code...
	$sql = mysqli_query($koneksi, "INSERT INTO admin (id_admin, nama, username, password) VALUES('','','$user','$pass')");
	print("Registrasi Success <a href='index.php' style='color:blue;'>Ke Halaman Login.</a>");
	header("index.php");
}else{
	echo "<p style='color:red;'>Maaf tidak Boleh ada field yg kosong ! <a href='register.php' style='color:blue;'>Klik Untuk Kembali</a></p>";
}
mysqli_close($koneksi);
?>