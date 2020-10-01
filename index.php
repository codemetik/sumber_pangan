<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sumber Pangan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page pb-5">
<div class="login-box">
	<!-- <h1><u>Selamat Datang di Toko Sumber Pangan</u></h1> -->
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<p style='color:red;'>Login gagal! username dan password salah!</p>";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<div class="login-logo">
	    <a href="index2.php"><b>Selamat Datang di Toko </b>SUMBER PANGAN</a>
	 </div>
	<div class="card">
	<div class="card-body login-card-body">
		<p class="login-box-msg">Silahkan Login Untuk memulai Session</p>
		<form action="submit_login.php" method="post" style="color:#FFFFFF">
			<div class="input-group mb-3">
				<input class="form-control" type="text" name="username">
				<div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-envelope"></span>
		            </div>
		         </div>
			</div>
			<div class="input-group">
				<input class="form-control" type="password" name="password">	
				<div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-lock"></span>
		            </div>
		        </div>
			</div>

			<br>
		<center>
			<!-- <input class="btn bg-primary" type="submit" value="login"> -->
			<button class="btn bg-primary" type="submit"><i class="nav-icon fas fa-sign-in-alt"></i> Login</button>
		</center>
			<center class="cent">
				<a href="register.php" class="link"><u>Klik disini untuk Register</u></a>
			</center>
		</form>
	</div>
</div>
</div>
<!-- <div class="login">
	<p align="center" class="log" style="color:#FFFFFF">Silahkan Login</p>


</div> -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>