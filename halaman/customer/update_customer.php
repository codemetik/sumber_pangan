<?php 
include "koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer = '".$_GET['id']."'");
$dt = mysqli_fetch_array($sql);
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Kontak / Data Customer</b> / Edit Data Customer</a>
	</div>
	<div class="card-body">
		<form action="" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>ID Customer</label>
						<input type="text" name="id_customer" class="form-control" value="<?= $dt['id_customer']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama Customer</label>
						<input type="text" name="nama_customer" class="form-control" value="<?= $dt['nama_customer']; ?>">
					</div>
					<div class="form-group">
						<label>No Telp</label>
						<input type="text" name="no_telp" class="form-control"value="<?= $dt['no_telp']; ?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?= $dt['alamat']; ?>">
					</div>
					<div class="form-group">
						<button type="submit" name="simpan_perubahan" class="btn bg-blue"><i class="fa fa-save"></i> Simpan</button>
						<a href="index2.php?page=customer" class="btn bg-blue">Cencel</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="table-responsive">
						<table class="table table-hove table-borderef">
							<thead class="bg-blue">
								<tr>
									<td>ID Barang</td>
									<td>Nama Barang</td>
								</tr>
							</thead>
							<tbody>
							<?php 
							$c = mysqli_query($koneksi, "SELECT * FROM tb_rols_customer X INNER JOIN barang Y ON y.id_barang = x.id_barang WHERE id_customer = '".$dt['id_customer']."' GROUP BY x.id_barang");
							while ($dc= mysqli_fetch_array($c)) { ?>
								<tr>
									<td><?= $dc['id_barang']; ?></td>
									<td><?= $dc['nama']; ?></td>
								</tr>
							<?php }
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php 
if (isset($_POST['simpan_perubahan'])) {
	$id_customer = $_POST['id_customer'];
	$nama_customer = $_POST['nama_customer'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];

	$sql = mysqli_query($koneksi, "UPDATE tb_customer SET nama_customer = '$nama_customer', no_telp = '$no_telp', alamat = '$alamat' WHERE id_customer = '$id_customer'");

	if ($sql) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = 'index2.php?page=customer';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = 'index2.php?page=customer';
		</script>";
	}
}
?>