<?php 
include "koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM barang X INNER JOIN tb_transaksi_jual Y ON y.id_barang = x.id_barang INNER JOIN tb_rols_customer z ON z.id_jual = y.id_jual INNER JOIN tb_customer a ON a.id_customer = z.id_customer WHERE y.id_jual = '".$_GET['id']."' ");
$dt = mysqli_fetch_array($sql);
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Data Barang / Data Penjualan</b> / Edit Data Penjualan</a>
	</div>
	<div class="card-body">
		<form action="" method="POST">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label>ID Jual</label>
						<input type="text" name="id_jual" class="form-control" value="<?= $dt['id_jual']; ?>" readonly>
					</div>
					<div class="form-group">
					<label>Tanggal</label>
					<input type="text" name="tanggal" class="form-control" value="<?= $dt['tanggal']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" name="nama" id="nama" class="form-control" value="<?= $dt['nama_barang']; ?>" readonly>
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
						<label>Jumlah Barang Keluar</label>
						<input type="text" name="keluar" class="form-control" id="keluar" value="<?= $dt['brg_keluar']; ?>" onkeyup="total()">
					</div>
					<div class="form-group">
						<label>Total :</label>
						<input type="text" name="hasil" class="form-control" id="hasil" readonly>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
					<label>Customer</label>
					<select class="form-control-sm select2" name="id_customer" style="width: 100%;">
						<option>==Pilih==</option>
						<?php 
						$sqld = mysqli_query($koneksi, "SELECT * FROM tb_customer");
						while ($ds = mysqli_fetch_array($sqld)) {
							if ($dt['id_customer'] == $ds['id_customer']) {
								$select = "selected";
							}else{
								$select = "";
							}
							echo "<option value='".$ds['id_customer']."' ".$select.">".$ds['id_customer']." - ".$ds['nama_customer']."</option>";
						}
						?>
					</select>
				</div>
				</div>
				<div class="col-sm-4">
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

<?php 
if (isset($_POST['simpan'])) {
	$id_jual = $_POST['id_jual'];
	$brg_keluar = $_POST['keluar'];
	$id_customer = $_POST['id_customer'];

	$update = mysqli_query($koneksi, "UPDATE tb_transaksi_jual SET brg_keluar = '".$brg_keluar."' WHERE id_jual = '".$id_jual."'");

	$upd = mysqli_query($koneksi, "UPDATE tb_rols_customer SET id_customer = '".$id_customer."' WHERE id_jual = '".$id_jual."'");

	if ($update && $upd) {
		echo "<script>
		alert('Data Berhasil diupdate');
		document.location.href = 'halaman_admin.php?page=penjualan';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal diupdate');
		document.location.href = 'halaman_admin.php?page=penjualan';
		</script>";
	}
}
?>

<script type="text/javascript"> 
function total() {
	var harga_barang = parseInt(document.getElementById('keluar').value) * parseInt(document.getElementById('harga').value);
	var total_harga = harga_barang;
	document.getElementById('hasil').value = total_harga;
}
</script>