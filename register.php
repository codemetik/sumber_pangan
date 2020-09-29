<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
</head>
<body>
<h1>Register Baru</h1>
<div class="login">
	<p align="center" class="log" style="color: #FFFFFF">Silahkan Masukkan Data Anda</p>

<form action="submit_register.php" method="post" style="color: #FFFFFF">
	<label>Username</label>
	<input class="log" type="text" name="username">
	<label>Password</label>
	<input class="log" type="password" name="password">

	<center>
	<input class="tombol" type="submit" value="register"> <br><br>
	<a href="index.php" class="link"><u>Klik disini untuk Kembali</u></a>
	</center>
</form>
</div>
</body>
</html>