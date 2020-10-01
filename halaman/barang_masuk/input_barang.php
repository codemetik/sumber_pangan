	<?php
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_transaksi)as kode from tb_transaksi");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 1,3);
$tambah=$kode+1;
if ($tambah<10) {
		$id="T00".$tambah;
	}else{
		$id="T0".$tambah;
	}
?>

	<div class="card">
		<div class="card-header bg-primary">
			<a href=""><b>Data Barang / Data Pembelian</b></a> / Tambah Pembelian
		</div>
		<div class="card-body">
			<form action="halaman/barang_masuk/proses_masuk.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-6">
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
						<select name="id_barang" class="form-control" onchange='changeValue(this.value)' required>
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
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama" id="nama" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="text" name="stok" id="stok" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" id="harga" class="form-control" readonly>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Jumlah Barang Masuk</label>
						<input type="text" name="masuk" id="masuk" class="form-control" onchange="total()">
					</div>
					<div class="form-group">
						<label>Total : </label>
						<input type="text" name="hasil" id="hasil" class="form-control" readonly>
					</div>
					<div class="form-group">
						<button type="submit" name="simpan" class="btn bg-primary col-sm-12"><i class="fa fa-save"></i> SIMPAN</button>
					</div>
					<div class="form-group">
						<a href="?page=pembelian" class="btn bg-primary col-sm-12">Klik disini untuk Kembali</a>
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
	var harga_barang = parseInt(document.getElementById('masuk').value) * parseInt(document.getElementById('harga').value);
	var total_harga = harga_barang;
	document.getElementById('hasil').value = total_harga;
}
</script>