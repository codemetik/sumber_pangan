<?php 
include "koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier = '".$_GET['id']."'");
$dt = mysqli_fetch_array($sql);
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Kontak / Data Supplier</b> / Edit Data Supplier</a>
	</div>
	<div class="card-body">
		<form action="" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>ID Supplier</label>
						<input type="text" name="id_supplier" class="form-control" value="<?= $dt['id_supplier']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama Supplier</label>
						<input type="text" name="nama_supplier" class="form-control" value="<?= $dt['nama_supplier']; ?>">
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
						<a href="index2.php?page=supplier" class="btn bg-blue">Cencel</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php 
if (isset($_POST['simpan_perubahan'])) {
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];

	$sqlin = mysqli_query($koneksi, "UPDATE tb_supplier SET nama_supplier = '".$nama_supplier."', no_telp = '".$no_telp."', alamat = '".$alamat."' WHERE id_supplier = '".$id_supplier."'");

	if ($sqlin) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = 'index2.php?page=supplier';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = 'index2.php?page=updateSupplier&id=".$id_supplier."';
		</script>";
	}
}
?>