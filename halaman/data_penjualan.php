<div class="col-sm-12 mt-2">
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
	  <li class="breadcrumb-item active">Data Penjualan</li>
	</ol>
</div><!-- /.col -->
<div class="data_barang">
	<a href="halaman/barang_keluar/input_barang_jual.php"><input type="submit" value="Tambah Penjualan" class="btn bg-primary"></a>
<br>
<br>
	<div class="table-responsive">
<table class="table table-bordered table-hover font-12">
	<thead class="thead-dark">
	<tr>
		<th>ID Jual</th>
		<th>Tanggal</th>
		<th>ID barang</th>
		<th>Nama Barang</th>
		<th>Barang Keluar</th>
		<th>Total Harga</th>
		<th>Opsi</th>
	</tr>	
	</thead>
	<?php 
	include "koneksi.php";
	$query = mysqli_query($koneksi, "SELECT Z.id_jual, tanggal, Y.id_barang, nama_barang, brg_keluar,(harga + harga_jual) * brg_keluar AS Total
FROM barang Y
JOIN tb_harga X ON Y.id_barang = X.id_barang
JOIN tb_transaksi_jual Z ON Y.id_barang = Z.id_barang")or die(mysqli_error());
	while($data = mysqli_fetch_array($query)){
	?>
	<tr class="table-primary">
		<td><?php echo $data['id_jual']; ?></td>
		<td><?php echo $data['tanggal']; ?></td>
		<td><?php echo $data['id_barang']; ?></td>
		<td><?php echo $data['nama_barang']; ?></td>
		<td><?php echo $data['brg_keluar']; ?></td>
		<td><?php echo $data['Total']; ?></td>
		<td class="pilih">
		<a href="halaman/barang_keluar/delete_keluar.php?id_jual=<?= $data['id_jual']; ?>">
			<button type='submit' name='hapus' class="btn bg-primary"><i class="fa fa-trash-alt"></i> Delete</button></a>
		</td>
	</tr>
<?php } ?>
</table>
	</div>
</div>