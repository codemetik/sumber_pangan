<div class="card">
	<div class="card-header bg-info">
		<h5>Update</h5>
	</div>
	<div class="card-body">
		<form action="proses_edit.php" method="post" enctype="multipart/form-data">
	<?php 
		include "koneksi.php";
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$_GET[id]'");
		$data = mysqli_fetch_array($query);
	?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover font-12">
				<tr>
					<th>Id</th>
					<td>
						<input type="text" name="id" value="<?php echo $data['id_barang'] ?>" readonly>
					</td>
				</tr>
				<tr>
					<th>Nama</th>
					<td>
						<input type="text" name="name" value="<?php echo $data['nama'] ?>">
					</td>
				</tr>
				<tr>
					<th>Jenis</th>
					<td>
						<input type="text" name="jenis" value="<?php echo $data['jenis'] ?>">
					</td>
				</tr>
				<tr>
					<th>Stok</th>
					<td><input type="text" name="stok" value="<?php echo $data['stok'] ?>"></td>
				</tr>
				<tr>
					<th>Harga</th>
					<td>
						<input type="text" name="harga" value="<?php echo $data['harga'] ?>">
					</td>
				</tr>
					
			</table>
	</div>
			<br>
			<br>
			<center>
				<div class="input-group">
					<button type="submit" name="update" class="btn bg-primary"><i class="fa fa-save fa-2x"></i> Save</button>
				</div>
			<!-- <input type="submit" name="update" value="Update" class="fa fa-save"> -->
			</center>
			<br>
			<br>
		</form>	
	</div>
</div>