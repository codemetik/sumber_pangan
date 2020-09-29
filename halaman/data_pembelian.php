<div class="data_barang">
	<a href="halaman/barang_masuk/input_barang.php"><input type="submit" value="Tambah Pembelian" class="btn bg-primary"></a>
<br>
<br>
	<div class="table-responsive">
<table class="table table-bordered table-hover font-12">
	<tr class="thead-dark">
		<th>ID transaksi</th>
		<th>Tanggal</th>
		<th>ID barang</th>
		<th>Nama Barang</th>
		<th>Barang Masuk</th>
		<th>Total Harga</th>
		<th>Opsi</th>
	</tr>
	<?php 
	include "koneksi.php";
	$query = mysqli_query($koneksi, "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama_barang, brg_masuk, harga * brg_masuk AS Total
FROM barang Y
JOIN tb_harga X ON Y.id_barang = X.id_barang
JOIN tb_transaksi Z ON Y.id_barang = Z.id_barang")or die(mysqli_error());
	while($data = mysqli_fetch_array($query)){
	?>
	<tr class="table-primary">
		<td><?php echo $data['id_transaksi']; ?></td>
		<td><?php echo $data['tanggal']; ?></td>
		<td><?php echo $data['id_barang']; ?></td>
		<td><?php echo $data['nama_barang']; ?></td>
		<td><?php echo $data['brg_masuk']; ?></td>
		<td><?php echo $data['Total']; ?></td>
		<td class="pilih">
		<a href="halaman/barang_masuk/delete_masuk.php?id_transaksi=<?= $data['id_transaksi']; ?>">
			<button class="btn bg-primary"><i class="fa fa-trash-alt"></i> Delete</button></a>
		</td>
	</tr>
<?php } ?>
</table>
	</div>
</div>