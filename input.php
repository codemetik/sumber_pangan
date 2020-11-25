	<?php
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_barang)as kode from barang");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 1,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="K000".$tambah;
	}else{
		$id="K00".$tambah;
	}
?>


<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang / Data Stok</b></a> / Tambah Data Baru
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<form action="proses.php" method="post" enctype="multipart/form-data" style="color:ffffff">
			<div class="table-responsive">
				<table class="table table-bordered table-hover font-12">
					<tr>
						<th class="bg-primary">ID Barang</th>
						<td>
							<input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
						</td>
					</tr>
					<tr>
						<th class="bg-primary">Nama Barang</th>
						<td>
							<input type="text" class="form-control" name="name" placeholder="Nama barang . . .">
						</td>
					</tr>
					<tr>
						<th class="bg-primary">Stok</th>
						<td>
							<input type="text" class="form-control" name="stok" placeholder="Stok . . .">
						</td>
					</tr>
					<tr>
						<th class="bg-primary">Harga</th>
						<td>
							<input type="text" class="form-control" name="harga" placeholder="Harga . . .">
						</td>
					</tr>
					<tr>
						<th class="bg-primary">Harga Jual</th>
						<td><input type="text" name="harga_jual" class="form-control" placeholder="harga jual . . ."></td>
					</tr>
				</table>			
			</div>
		<center>
			<button type="submit" name="simpan" class="btn bg-primary"><i class="fa fa-save"></i> SIMPAN</button>
			<br>
			<a href="?page=stok_barang" class="link">Klik disini untuk Kembali</a>
		</center>
	</form>
			</div>
		</div>
	</div>
</div>