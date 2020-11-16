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
	<div class="login-logo">
		<center><img src="img/logo pbu1.jpeg" width="130" height="50" alt=""></center>
	    <a href="index2.php"><b><h4>USER REGISTRATION</h4></b></a>
	</div>
	<div class="card">
		<div class="card-body login-card-body">
			<form action="submit_register.php" method="post">
				<div class="form-group">
					<label>Username</label>
					<div class="input-group mb-3">
						<input class="form-control" type="text" name="username">
							<div class="input-group-append">
					            <div class="input-group-text">
					              <span class="fas fa-envelope"></span>
					            </div>
					         </div>
						</div>
				</div>
				<div class="form-group">
					<label>Password</label>
					<div class="input-group mb-3">
					<input class="form-control" type="password" name="password">
						<div class="input-group-append">
			            <div class="input-group-text">
			              <span class="fas fa-lock"></span>
			            </div>
			        </div>
					</div>
				</div>
				<center>
				<input class="btn bg-primary" type="submit" value="register"> <br><br>
				<a href="index.php" class="link"><u>Klik disini untuk Kembali</u></a>
				</center>
			</form>
		</div>
	</div>
	</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>