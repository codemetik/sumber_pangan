<?php 
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);
if (!empty($user)&&!empty($pass)) {
	# code...
	$sql = mysqli_query($koneksi, "INSERT INTO admin (id_admin, nama, username, password) VALUES('','','$user','$pass')");
	print("Registrasi Success");
	header("index.php");
}else{
	echo "Maaf tidak Boleh ada field yg kosong !";
}
mysqli_close($koneksi);
?>