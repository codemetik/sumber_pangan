<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sumber Pangan</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary bg-white elevation-4">
    <!-- Brand Logo -->
    <a href="?page=home" class="brand-link">
      <img src="img/sp_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light text-white">Sumber Pangan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/sp_logo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Sumber Pangan</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="?page=home" class="nav-link bg-blue">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-blue">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item bg-dark">
                <a href="?page=stok_barang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Stok</p>
                </a>
              </li>
              <li class="nav-item bg-dark">
                <a href="?page=pembelian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pembelian</p>
                </a>
              </li>
              <li class="nav-item bg-dark">
                <a href="?page=penjualan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penjualan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-blue">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item bg-dark">
                <a href="?page=laporanPem" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item bg-dark">
                <a href="?page=laporanPen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-blue">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sign-Out
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item bg-dark">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sign-Out Now</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php 
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    case 'home':
      include "halaman/home.php";
      break;
    case 'stok_barang':
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
    case 'inputDataBaru':
      include "input.php";
      break;
    case 'inputDataBaruPembelian':
      include "halaman/barang_masuk/input_barang.php";
      break;
    case 'inputDataBaruPenjualan':
      include "halaman/barang_keluar/input_barang_jual.php";
      break;
    default:
      echo "<center><h1>Halaman tidak ada</h1</center>";
      break;
  }

}else{
    include "halaman/home.php";
}
?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <!--  -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
