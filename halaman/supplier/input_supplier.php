<?php 
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_supplier)as kode from tb_supplier");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 3,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="SUP000".$tambah;
	}else{
		$id="SUP00".$tambah;
	}
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Kontak / Data Supplier</b> / Input Supplier</a>
	</div>
	<div class="card-body">
	<form action="" method="POST">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>ID Supplier</label>
					<input type="text" name="id_supplier" class="form-control" value="<?= $id; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Supplier</label>
					<input type="text" name="nama_supplier" class="form-control">
				</div>
				<div class="form-group">
					<label>No Telp</label>
					<input type="text" name="no_telp" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" name="simpan" class="btn bg-blue"><i class="fa fa-save"></i> Simpan</button>
					<a href="index2.php?page=supplier" class="btn bg-blue">Cencel</a>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>

<?php

if (isset($_POST['simpan'])) {
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_supplier(id_supplier, nama_supplier, no_telp, alamat) VALUES('$id_supplier','$nama_supplier','$no_telp','$alamat')");

	if ($sql) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = 'index2.php?page=supplier';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = 'index2.php?page=inputSupplier';
		</script>";
	}
}
?>