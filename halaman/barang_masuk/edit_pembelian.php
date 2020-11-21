<?php 
include "koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM barang X INNER JOIN tb_transaksi Y ON y.id_barang = x.id_barang INNER JOIN tb_rols_supplier z ON z.id_transaksi = y.id_transaksi INNER JOIN tb_supplier a ON a.id_supplier = z.id_supplier WHERE y.id_transaksi = '".$_GET['id']."' ");
$dt = mysqli_fetch_array($sql);
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Data Barang / Data Pembelian</b> / Edit Data Pembelian</a>
	</div>
	<div class="card-body">
	<form action="" method="POST">
		<div class="row">
			<div class="col-sm-4">
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
			<div class="col-sm-4">
				<div class="form-group">
					<label>Jumlah Barang Masuk</label>
					<input type="text" name="masuk" id="masuk" class="form-control" value="<?= $dt['brg_masuk']; ?>" onkeyup="total()">
				</div>
				<div class="form-group">
					<label>Total : </label>
					<input type="text" name="hasil" id="hasil" class="form-control" readonly>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>Supplier</label>
					<select class="form-control-sm select2" name="id_supplier" style="width: 100%;">
						<option>==Pilih==</option>
						<?php 
						$sqld = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
						while ($ds = mysqli_fetch_array($sqld)) {
							if ($dt['id_supplier'] == $ds['id_supplier']) {
								$select = "selected";
							}else{
								$select = "";
							}
							echo "<option value='".$ds['id_supplier']."' ".$select.">".$ds['id_supplier']." - ".$ds['nama_supplier']."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<button type="submit" name="simpan" class="btn bg-orange col-sm-12"><i class="fa fa-save"></i> SIMPAN PERUBAHAN</button>
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
	$id_supplier = $_POST['id_supplier'];

	$update = mysqli_query($koneksi, "UPDATE tb_transaksi SET brg_masuk = '".$brg_masuk."' WHERE id_transaksi = '".$id_transaksi."'");
	$upd = mysqli_query($koneksi, "UPDATE tb_rols_supplier SET id_supplier = '".$id_supplier."' WHERE id_transaksi = '".$id_transaksi."'");

	if ($update && $upd) {
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