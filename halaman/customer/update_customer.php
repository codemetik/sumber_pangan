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
						<label>ID Supplier</label>
						<input type="text" name="id_customer" class="form-control" value="<?= $dt['id_customer']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama Supplier</label>
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