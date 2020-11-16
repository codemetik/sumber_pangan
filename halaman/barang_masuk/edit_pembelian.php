<?php 
include "koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM barang x INNER JOIN tb_transaksi Y ON y.id_barang = x.id_barang WHERE id_transaksi = '".$_GET['id']."' ");
$dt = mysqli_fetch_array($sql);
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Data Barang / Data Pembelian</b> / Edit Data Pembelian</a>
	</div>
	<div class="card-body">
	<form action="" method="POST">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>ID Transakssi</label>
					<input type="text" name="id_transaksi" class="form-control" value="<?= $dt['id_transaksi']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Tanggal</label>
					<input type="text" name="tanggal" class="form-control" value="<?= $dt['tanggal']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" name="nama" id="nama" class="form-control" value="<?= $dt['nama']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input type="text" name="stok" id="stok" class="form-control" value="<?= $dt['stok']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input type="text" name="harga" id="harga" class="form-control" value="<?= $dt['harga']; ?>" readonly>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
						<label>Jumlah Barang Masuk</label>
						<input type="text" name="masuk" id="masuk" class="form-control" value="<?= $dt['brg_masuk']; ?>" onkeyup="total()">
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

<?php 
if (isset($_POST['simpan'])) {
	$id_transaksi = $_POST['id_transaksi'];
	$brg_masuk = $_POST['masuk'];

	$update = mysqli_query($koneksi, "UPDATE tb_transaksi SET brg_masuk = '".$brg_masuk."' WHERE id_transaksi = '".$id_transaksi."'");

	if ($update) {
		echo "<script>
		alert('Data Berhasil diupdate');
		document.location.href = 'index2.php?page=pembelian';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal diupdate');
		document.location.href = 'index2.php?page=pembelian';
		</script>";
	}
}
?>


<script type="text/javascript"> 
function total() {
	var harga_barang = parseInt(document.getElementById('masuk').value) * parseInt(document.getElementById('harga').value);
	var total_harga = harga_barang;
	document.getElementById('hasil').value = total_harga;
}
</script>