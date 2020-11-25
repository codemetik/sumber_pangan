<?php 
		include "koneksi.php";
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$_GET[id]'");
		$data = mysqli_fetch_array($query);
	?>
<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang / Stok Barang</b></a> / Update Barang
	</div>
	<div class="card-body">
		<form action="proses_edit.php" method="post" enctype="multipart/form-data">
	<div class="row">
	<div class="col-sm-6">
		<div class="table-responsive">
		<table class="table table-hover font-12">
				<tr>
					<th>Id</th>
					<td>
						<input type="text" name="id" class="form-control" value="<?php echo $data['id_barang'] ?>" readonly>
					</td>
				</tr>
				<tr>
					<th>Nama</th>
					<td>
						<input type="text" name="name" class="form-control" value="<?php echo $data['nama'] ?>">
					</td>
				</tr>
				<tr>
					<th>Stok</th>
					<td><input type="text" name="stok" class="form-control" value="<?php echo $data['stok'] ?>"></td>
				</tr>
				<tr>
					<th>Harga</th>
					<td>
						<input type="text" name="harga" class="form-control" value="<?php echo $data['harga'] ?>">
					</td>
				</tr>
				<tr>
					<th>Harga Jual</th>
					<td>
						<input type="text" name="harga_jual" class="form-control" value="<?= $data['harga_jual']; ?>">
					</td>
				</tr>
			</table>
	</div>	
	</div>
	<div class="col-sm-6">
		
	</div>
	<div class="col-sm-3">
		<div class="">
			<button type="submit" name="update" class="btn bg-primary"><i class="fa fa-save"></i> Save</button>
			<a href="index2.php?page=stok_barang" class="btn bg-blue">Cencel</a>
		</div>
	</div>
	</div>	
		</form>	
	</div>
</div>