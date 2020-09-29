<!DOCTYPE html>
<html>
<head>
	<title>Input Barang</title>
	<link rel="stylesheet" type="text/css" href="css/styleTable.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">

<!-- 	<style type="text/css">
	
body{
	background-color: #DCDCDC;
}
.input{
	width: 650px;
	background: #DCDCDC; /*warna background tabel*/
	/*meletakan form ke tengah*/
	margin: 20px auto;
	padding: 30px 20px;
}
input[type=text], select {
  width: 150px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #DCDCDC; /*warna border tabel input*/
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  max-width: 100%;
  background-color: #808080; /*warna tombol submit*/
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: center;
}

input[type=submit]:hover {
  background-color: #696969; /*warna tombol submit jika ditekan*/
}
	</style> -->
	<script type="text/javascript">
		var loadFile = function(event){
			var output = document.getElementById('output');
			output.src=URL.createObjectURL(event.target.files[0]);
		}
	</script>
</head>
<body>
<?php
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_barang)as kode from barang");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 1,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="K000".$tambah;
	}else{
		$id="K00".$tambah;
	}
?>
<nav class="navbar navbar-expand-lg fixed-top bg-dark">
  <a class="navbar-brand" href="#">
    <img src="img/sp_logo.jpg" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav list-group list-group-horizontal">
      <li class="nav-item active">
        <a class="nav-link" href="dasboard_admin.php?page=home">Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dasboard_admin.php?page=dataBarang">Data Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dasboard_admin.php?page=pembelian">Data Pembelian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dasboard_admin.php?page=penjualan">Data Penjualan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dasboard_admin.php?page=laporanPem">Lap Barang Masuk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dasboard_admin.php?page=laporanPen">Lap Barang Keluar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div class="container">
	<div class="card mt-5">
	<div class="card-header bg-info">
		<center>
	<h1 style="color:#000000"><u>Masukan Data Beras</u></h1>
	</center>
	</div>
	<div class="card-body">
		<form action="proses.php" method="post" enctype="multipart/form-data" style="color:ffffff">
			<div class="table-responsive">
				<table class="table table-bordered table-hover font-12">
		<tr>
			<th>Id</th>
			<td>
				<input type="text" name="id" value="<?php echo $id; ?>" readonly>
			</td>
		</tr>
		<tr>
			<th>Nama</th>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<th>Jenis</th>
			<td>
				<input type="text" name="jenis">
			</td>
		</tr>
		<tr>
			<th>Stok</th>
			<td>
				<input type="text" name="stok">
			</td>
		</tr>
		<tr>
			<th>Harga</th>
			<td>
				<input type="text" name="harga">
			</td>
		</tr>
	</table>			
			</div>
	<br>
	<center>
		<button type="submit" name="simpan" class="btn bg-primary"><i class="fa fa-save"></i> SIMPAN</button>
		<br>
		<a href="dasboard_admin.php" class="link">Klik disini untuk Kembali</a>
	</center>
</form>
	</div>
</div>
</div>

<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/jquery/popper.min.js"></script>
<script src="assets/jquery/jquery-3.5.1.min.js"></script>
</body>
</html>