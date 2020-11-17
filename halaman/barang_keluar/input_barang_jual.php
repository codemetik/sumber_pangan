
<?php
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_jual)as kode from tb_transaksi_jual");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 1,3);
$tambah=$kode+1;
if ($tambah<10) {
		$id="P00".$tambah;
	}else{
		$id="P0".$tambah;
	}

$cari_id=mysqli_query($koneksi, "SELECT max(id_customer)as kode from tb_customer");
$id_cari=mysqli_fetch_array($cari_id);
$cus=substr($id_cari['kode'], 2,3);
$custom=$cus+1;
if ($custom<10) {
		$idcus="CS00".$custom;
	}else{
		$idcus="CS0".$custom;
	}
?>

	<div class="card">
		<div class="card-header bg-primary">
			<a href=""><b>Data Barang / Data Penjualan</b></a> / Tambah Penjualan
		</div>
		<div class="card-body">
		<form action="halaman/barang_keluar/proses_jual.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label>ID Transaksi</label>
					<input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Tanggal</label>
					<input type="text" name="tanggal" class="form-control" value="<?php echo "". date("Y-m-d"); ?>">
				</div>
				<div class="form-group">
					<label>ID Barang</label>
					<select name="id_barang" class="form-control-sm select2" style="width: 100%;" onchange='changeValue(this.value)' required>
					<option value="">===Pilih===</option>
					 <?php 
					 $query=mysqli_query($koneksi, "SELECT  * FROM barang order by id_barang asc"); 
					 $result = mysqli_query($koneksi, "SELECT * FROM barang");  
					 $jsArray = "var prdName = new Array();\n";
					 while ($row = mysqli_fetch_array($result)) {  
					 echo '<option name="id_barang"  value="' . $row['id_barang'] . '">' . $row['id_barang'] . ' '.$row['nama'].'</option>';  
					 $jsArray .= "prdName['" . $row['id_barang'] . "'] = {nama:'" . addslashes($row['nama'])."', stok:'" . addslashes($row['stok'])."', harga:'" . addslashes($row['harga'])."'};\n";
					  }
					  ?>
				</select>
				</div>
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" name="nama" class="form-control" id="nama" readonly>
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input type="text" name="stok" class="form-control" id="stok" readonly>
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input type="text" name="harga" class="form-control" id="harga" readonly>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>Jumlah Barang Keluar</label>
					<input type="text" name="keluar" class="form-control" id="keluar" onkeyup="total()" required>
				</div>
				<div class="form-group">
					<label>Total :</label>
					<input type="text" name="hasil" class="form-control" id="hasil" readonly>
				</div>
				
			</div>
			<div class="card col-sm-4 bg-primary p-3">
				<center><h5>Data Customer</h5></center>
				<div class="form-group">
					<label>ID Customer</label>
					<input type="text" name="id_customer" class="form-control" value="<?= $idcus; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Customer</label>
					<input type="text" name="nama_customer" class="form-control" required>
				</div>
				<div class="form-group">
					<label>No Telp</label>
					<input type="text" name="no_telp" class="form-control">
				</div>
				<div class="form-group">
					<label>alamat</label>
					<input type="textarea" name="alamat" class="form-control">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<button type="submit" name="simpan" class="btn bg-primary col-sm-12"><i class="fa fa-save"></i> SIMPAN</button>
				</div>
				<div class="form-group">
					<a href="?page=penjualan" class="btn bg-primary col-sm-12">Klik disini untuk Kembali</a>
				</div>	
			</div>
		</div>
		</form>
		</div>
	</div>

<script type="text/javascript">
		var loadFile = function(event){
			var output = document.getElementById('output');
			output.src=URL.createObjectURL(event.target.files[0]);
		}
	</script>

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