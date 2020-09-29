<!DOCTYPE html>
<html>
<head>
	<title>Penjualan Beras</title>
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/fontawesome.min.css"> -->
</head>
<body>
<h1><u>Selamat Datang di Toko Sumber Pangan</u></h1>
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
<div class="login">
	<p align="center" class="log" style="color:#FFFFFF">Silahkan Login</p>

<form action="submit_login.php" method="post" style="color:#FFFFFF">
	<div class="input-group">
		<!-- <label>Username</label> -->
		<span class="input-group-addon">
			<i class="fa fa-user fa-2x"></i>
		</span>

        <input class="form-control" type="text" name="username">	
	</div>
	<div class="input-group">
		<!-- <label>Password</label> -->
		<span class="input-group-addon">
            <i class="fa fa-lock fa-2x"></i>
        </span>

		<input class="form-control" type="password" name="password">	
	</div>
	
	<br>
	<input class="btn bg-primary" type="submit" value="login">
	<center class="cent">
		<a href="register.php" class="link"><u>Klik disini untuk Register</u></a>
	</center>
</form>
</div>

<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/jquery/popper.min.js"></script>
<script src="assets/jquery/jquery-3.5.1.min.js"></script>
</body>
</html>