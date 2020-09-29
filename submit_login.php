<?php 
session_start();
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);

if (!empty($user) && !empty($pass)) {
$query = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
$sql = mysqli_query($koneksi, $query);
$result = mysqli_num_rows($sql);
if ($result>0) {
	$_SESSION['username']=$user;
	$_SESSION['status']="login";
	header("location:dasboard_admin.php");
}else{
	header("location:index.php?pesan=gagal");
}
}else{
	echo "Email Dan password Tidak Boleh Kosong, Silahkan Di isi";
}
?>