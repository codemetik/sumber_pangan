<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dasboard</title>
	<link rel="stylesheet" type="text/css" href="css/style-nav.css">
	<link rel="stylesheet" type="text/css" href="css/styleTable.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
	<!-- <style type="text/css">
		
		h1{
			text-align: center;
			font-size:63px;
			margin: 2px;
		}
		.total_atas{
			width: 250px;
  			background-color: #808080;
  			color: white;
  			border: none;
  			border-radius: 4px;
  			float: right;
		}
	</style> -->
</head>
<body>
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
<br>
<div class="container-fluid mt-3">

<div class="row">
	<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="dasboard_admin.php?page=home">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dasboard_admin.php?page=dataBarang">
                  <span data-feather="file"></span>
                  Data Barang
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dasboard_admin.php?page=pembelian">
                  <span data-feather="shopping-cart"></span>
                  Data Pembelian
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dasboard_admin.php?page=penjualan">
                  <span data-feather="users"></span>
                  Data Penjualan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dasboard_admin.php?page=laporanPem">
                  <span data-feather="bar-chart-2"></span>
                  Lap Barang Masuk
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dasboard_admin.php?page=laporanPen">
                  <span data-feather="layers"></span>
                  Lap Barang Keluar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">
                  <span data-feather="layers"></span>
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<!-- <div class="judul">
		<center><h1>Selamat Datang di Toko Sumber Pangan</h1></center>
		<justify><h3>Toko Sumber pangan adalah toko beras terlengkap dan termurah yang menyediakan berbagai jenis beras</h3></justify>
	</div> -->

<?php 
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	switch ($page) {
		case 'home':
			include "halaman/data_barang.php";
			break;
		case 'dataBarang':
			include "halaman/data_barang.php";
			break;
		case 'update':
			include "edit.php";
			break;
		case 'delete':
			include "proses_delete.php";
			break;
		case 'pembelian':
			include "halaman/data_pembelian.php";
			break;
		case 'penjualan':
			include "halaman/data_penjualan.php";
			break;
		case 'laporanPem':
			include "halaman/laporanA.php";
			break;
		case 'laporanPen':
			include "halaman/laporanB.php";
			break;
		default:
			echo "<center><h1>Halaman tidak ada</h1</center>";
			break;
	}

}else{
		include "halaman/data_barang.php";
}
?>
</main>
</div> <!--//row-->
</div><!--//container-fluid-->
<script>
function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("container").style.marginLeft = "250px";
}
 
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("container").style.marginLeft = "0";
}
</script>

<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/jquery/popper.min.js"></script>
<script src="assets/jquery/jquery-3.5.1.min.js"></script>
</body>
</html>