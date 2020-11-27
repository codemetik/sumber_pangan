<?php 
session_start();
include "../koneksi.php";
if (!isset($_SESSION['username'])) {
  header('location:index.php');
}

$periode = mysqli_query($koneksi, "SELECT YEAR(NOW()) AS tahun");
$per = mysqli_fetch_array($periode);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PT. Purnamajaya Bhakti Utama.</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
	<section class="invoice">
		<!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header text-light">
          <small>PT. Purnamajaya Bhakti Utama.</small>
          <small class="float-right">Date: <?= date("Y/m/d"); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>

   	<!-- info row -->
    <div class="row invoice-info">
    	<div class="col-sm-12">
        <center><h5>PT. Purnamajaya Bhakti Utama.</h5></center>
        <center><h5>Laporan Stok Barang</h5></center>
        <center><h5>Periode : <?= $per['tahun']; ?></h5></center>
        <hr>
      </div>
      <div class="col-sm-4 invoice-col">
        <address>
          Oleh : <?= $_SESSION['username']; ?><br>
        </address>
      </div>
      <!-- /.col -->
      <!-- <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      
      <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="table-responsive">
      <table class="table">
          <tr>
            <th>NO</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th colspan="4"><center>Stok</center></th>
          </tr>
          <tr>
              <td colspan="3"></td>
              <td>Awal</td>
              <td>In</td>
              <td>Out</td>
              <td>Akhir</td>
          </tr>
          <?php 
          $sql = mysqli_query($koneksi, "SELECT * FROM barang");
          $no=1;
          while ($data = mysqli_fetch_array($sql)) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['id_barang']; ?></td>
              <td><?= $data['nama']; ?></td>
              <td>
                <?php 
                $sq1 = mysqli_query($koneksi, "SELECT x.id_barang, SUM(brg_masuk) AS masuk, SUM(brg_keluar) AS keluar FROM tb_transaksi X INNER JOIN tb_transaksi_jual Y ON y.id_barang = x.id_barang WHERE x.id_barang = '".$data['id_barang']."' GROUP BY x.id_barang");
                $dsq1 = mysqli_fetch_array($sq1);
                $cek1 = mysqli_num_rows($sq1);
                if ($cek1 > 0) {
                  echo ($data['stok'] - $dsq1['masuk']) + $dsq1['keluar'];
                }else{
                  echo $data['stok'];
                }
                ?>
              </td>
              <td>
                <?php 
                $sq2 = mysqli_query($koneksi, "SELECT id_barang, SUM(brg_masuk) AS masuk FROM tb_transaksi WHERE id_barang = '".$data['id_barang']."' GROUP BY id_barang");
                $dsq2 = mysqli_fetch_array($sq2);
                $cek2 = mysqli_num_rows($sq1);
                if ($cek2 > 0) {
                  echo $dsq2['masuk'];
                }else{
                  echo "0";
                }
                ?>
              </td>
              <td>
                <?php 
                $sq3 = mysqli_query($koneksi, "SELECT id_barang, SUM(brg_keluar) AS keluar FROM tb_transaksi_jual WHERE id_barang = '".$data['id_barang']."' GROUP BY id_barang");
                $dsq3 = mysqli_fetch_array($sq3);
                $cek3 = mysqli_num_rows($sq3);
                if ($cek3 > 0) {
                  echo $dsq3['keluar'];
                }else{
                  echo "0";
                }
                ?>
              </td>
              <td>
                <?php 
                $sq1 = mysqli_query($koneksi, "SELECT x.id_barang, SUM(brg_masuk) AS masuk, SUM(brg_keluar) AS keluar FROM tb_transaksi X INNER JOIN tb_transaksi_jual Y ON y.id_barang = x.id_barang WHERE x.id_barang = '".$data['id_barang']."' GROUP BY x.id_barang");
                $dsq1 = mysqli_fetch_array($sq1);
                $cek1 = mysqli_num_rows($sq1);
                if ($cek1 > 0) {
                  echo $data['stok'];
                }else{
                  echo "0";
                }
                ?>
              </td>
            </tr>      
          <?php }
          ?>
      </table>
    </div>	
    
   
	</section>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>
<script src="../plugins/select2/js/select2.min.js"></script>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>