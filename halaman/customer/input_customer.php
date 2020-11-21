<?php 
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_customer)as kode from tb_customer");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 2,3);
$tambah=$kode+1;
if ($tambah<10) {
		$id="CS00".$tambah;
	}else{
		$id="CSP0".$tambah;
	}
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Kontak / Data Customer</b> / Input Customer</a>
	</div>
	<div class="card-body">
	<form action="" method="POST">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>ID Customer</label>
					<input type="text" name="id_customer" class="form-control" value="<?= $id; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Customer</label>
					<input type="text" name="nama_customer" class="form-control" placeholder="nama customer">
				</div>
				<div class="form-group">
					<label>No Telp</label>
					<input type="text" name="no_telp" class="form-control" placeholder="no telp">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="alamat">
				</div>
				<div class="form-group">
					<button type="submit" name="simpan" class="btn bg-blue"><i class="fa fa-save"></i> Simpan</button>
					<a href="index2.php?page=customer" class="btn bg-blue">Cencel</a>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>

<?php 

if (isset($_POST['simpan'])) {
	$id_customer = $_POST['id_customer'];
	$nama_customer = $_POST['nama_customer'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_customer(id_customer, nama_customer, no_telp, alamat) VALUES('$id_customer','$nama_customer','$no_telp','$alamat')");
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