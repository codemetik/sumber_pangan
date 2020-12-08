<?php 
session_start();
include "../koneksi.php";
if (!isset($_SESSION['username'])) {
  header('location:index.php');
}

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

    <?php 
    if (isset($_GET['tgla']) && isset($_GET['tglb'])) { 
    	$tgla = $_GET['tgla'];
    	$tglb = $_GET['tglb'];
    	$periode = mysqli_query($koneksi, "SELECT YEAR('".$tglb."') AS tahun");
    	$per = mysqli_fetch_array($periode);
    	?>
   	<!-- info row -->
    <div class="row invoice-info">
    	<div class="col-sm-12">
        <center><h5>PT. Purnamajaya Bhakti Utama.</h5></center>
        <center><h5>Laporan Barang Masuk</h5></center>
        <center><h5>Periode : <?= $per['tahun'] ?></h5></center>
        <hr>
      </div>
      <div class="col-sm-4 invoice-col">
        <address>
          Dari Tanggal: <?= $tgla; ?><br>
          Sampai Tanggal: <?= $tglb;  ?><br>
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

    <?php 
    //menghitung data supplier
    $sqp = mysqli_query($koneksi, "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama_barang, nama_supplier, harga, brg_masuk,harga * brg_masuk AS Total FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier WHERE tanggal BETWEEN '".$tgla."' AND '".$tglb."'");
    while ($dp = mysqli_fetch_array($sqp)) {
    	$array[] = array(
    		"id_transaksi" => $dp['id_transaksi'],
    		"tanggal" => $dp['tanggal'],
    		"id_barang" => $dp['id_barang'],
    		"nama_barang" => $dp['nama_barang'],
    		"nama_supplier" => $dp['nama_supplier'],
    		"harga" => $dp['harga'],
    		"brg_masuk" => $dp['brg_masuk'],
    		"total" => $dp['Total']
    	);
    }

    // echo count($array);
    
$sqp = mysqli_query($koneksi, "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama_barang, b.id_supplier, nama_supplier, harga, brg_masuk,harga * brg_masuk AS Total FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier WHERE tanggal BETWEEN '".$tgla."' AND '".$tglb."' GROUP BY b.id_supplier ASC");
    while ($dp = mysqli_fetch_array($sqp)) { ?>
    <br>
    <h5>Customer : <?= $dp['nama_supplier']; ?></h5>
    <div class="table-responsive p-0">
    	<table class="table table-hover table-bordered table-head-fixed text-nowrap font-12">
    		<thead>
    			<tr>
    				<th>No</th>
    				<th>ID Barang</th>
    				<th>Nama Barang</th>
    				<th>Tanggal</th>
    				<th>Masuk</th>
    			</tr>
    		</thead>
    		<tbody>
			<?php 
			$sqlt = mysqli_query($koneksi, "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama_barang, b.id_supplier, nama_supplier, harga, brg_masuk,harga * brg_masuk AS Total FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier WHERE tanggal BETWEEN '".$tgla."' AND '".$tglb."'");
			$no=1;
			while ($dt = mysqli_fetch_array($sqlt)) { 
				if ($dp['id_supplier'] == $dt['id_supplier']) { 
					echo "<tr>";
					echo "<td>".$no++."</td>";
					echo "<td>".$dt['id_barang']."</td>";
					echo "<td>".$dt['nama_barang']."</td>";
					echo "<td>".$dt['tanggal']."</td>";
					echo "<td>".$dt['brg_masuk']."</td>";
					echo "</tr>";
				}
			}
			?>
    		</tbody>
    	</table>
    </div> 		
    <?php }  
    ?>
    
    <?php } //tutup _get
    ?>
   
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