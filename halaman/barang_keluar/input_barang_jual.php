<!DOCTYPE html>
<html>
<head>
	<title>Input Barang Jual</title>
	<link rel="stylesheet" type="text/css" href="css/styleTable.css">
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.min.css">
	<style type="text/css">
	
body{
	background-color: #DCDCDC;
}
.input{
	width: 650px;
	background: #808080;
	/*meletakan form ke tengah*/
	margin: 60px auto;
	padding: 30px 20px;
}
input[type=text], select {
  width: 150px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #D3D3D3;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  max-width: 100%;
  background-color: #696969;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: center;
}

input[type=submit]:hover {
  background-color: #696969;
}
	</style>
	<script type="text/javascript">
		var loadFile = function(event){
			var output = document.getElementById('output');
			output.src=URL.createObjectURL(event.target.files[0]);
		}
	</script>
</head>
<body>
<?php
include "../../koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_jual)as kode from tb_transaksi_jual");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 1,3);
$tambah=$kode+1;
if ($tambah<10) {
		$id="P00".$tambah;
	}else{
		$id="P0".$tambah;
	}
?>
<nav class="navbar navbar-expand-lg fixed-top bg-dark">
  <a class="navbar-brand" href="#">
    <img src="../../img/sp_logo.jpg" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav list-group list-group-horizontal">
      <li class="nav-item active">
        <a class="nav-link" href="../../dasboard_admin.php?page=home">Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../dasboard_admin.php?page=dataBarang">Data Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../dasboard_admin.php?page=pembelian">Data Pembelian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../dasboard_admin.php?page=penjualan">Data Penjualan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../dasboard_admin.php?page=laporanPem">Lap Barang Masuk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../dasboard_admin.php?page=laporanPen">Lap Barang Keluar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-info">
			<center><h2><u>Masukan Transaksi Penjualan Anda</u></h2></center>
	<br>
		</div>
		<div class="card-body bg-dark">
		<form action="proses_jual.php" method="post" enctype="multipart/form-data" style="color:#FFFFFF">
			<div class="table-responsive">
				<table class="table-hover font-12">
		<tr>
			<th>ID Transaksi</th>
			<td>
				<input type="text" name="id" value="<?php echo $id; ?>" readonly>
			</td>
		</tr>
		<tr>
			<th>Tanggal</th>
			<td>
				<input type="text" name="tanggal" value="<?php echo "". date("Y-m-d"); ?>">
			</td>
		</tr>
		<tr>
			<th>ID Barang</th>
			<td>
				<select name="id_barang" onchange='changeValue(this.value)' required>
					<option value="">===Pilih===</option>
 <?php 
 $query=mysqli_query($koneksi, "SELECT  * FROM barang order by id_barang asc"); 
 $result = mysqli_query($koneksi, "SELECT * FROM barang");  
 $jsArray = "var prdName = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="id_barang"  value="' . $row['id_barang'] . '">' . $row['id_barang'] . '</option>';  
 $jsArray .= "prdName['" . $row['id_barang'] . "'] = {nama:'" . addslashes($row['nama'])."', stok:'" . addslashes($row['stok'])."', harga:'" . addslashes($row['harga'])."'};\n";
  }
  ?>
				</select>
			</td>
		</tr>
		<tr><th>Nama Barang</th>
			<td><input type="text" name="nama" id="nama" readonly></td>
			<td><input type="text" name="stok" id="stok" readonly></td>
			<td><input type="text" name="harga" id="harga" readonly></td>
		</tr>
		<tr>
			<th>Barang Keluar</th>
			<td><input type="text" name="keluar" id="keluar" onchange="total()"></td>
			<td><input type="text" name="hasil" id="hasil" readonly></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" name="simpan" class="btn bg-primary"><i class="fa fa-save"></i> SIMPAN</button></td></tr>
	</table>
			</div>
		</form>	
		</div>
	</div>
</div>

<script src="../../assets/bootstrap/js/bootstrap.js"></script>
<script src="../../assets/jquery/popper.min.js"></script>
<script src="../../assets/jquery/jquery-3.5.1.min.js"></script>

</body>
</html>
<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('nama').value = prdName[id].nama;
    document.getElementById('stok').value = prdName[id].stok;
    document.getElementById('harga').value = prdName[id].harga;
};

function total() {
	var harga_barang = parseInt(document.getElementById('keluar').value) * parseInt(document.getElementById('harga').value);
	var total_harga = harga_barang;
	document.getElementById('hasil').value = total_harga;
}
</script>