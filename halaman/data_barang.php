<div class="judul">
		<center><h1>Selamat Datang di Toko Sumber Pangan</h1></center>
		<justify><h3>Toko Sumber pangan adalah toko beras terlengkap dan termurah yang menyediakan berbagai jenis beras</h3></justify>
	</div>
<div class="data_barang">
<br>
<a href="input.php"><input type="submit" value="Tambah Barang Baru" class="btn bg-primary"></a>

<br>
<br>
<div class="table-responsive">
<table class="table table-bordered table-hover font-12">
	<thead class="thead-dark">
		<tr>
			<th>Id Barang</th>
			<th>Nama </th>
			<th>Jenis</th>
			<th>Stok</th>
			<th>Total</th>
			<th>Harga</th>
			<th colspan="2">Pilih</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include "koneksi.php";
		$query = mysqli_query($koneksi, "SELECT id_barang, nama , jenis, stok, CONCAT('Rp ',FORMAT(harga*stok,0)) AS Total, CONCAT('Rp ', FORMAT(harga,0))AS harga FROM barang") or die(mysqli_error());
		while($data = mysqli_fetch_array($query)){
				?>
			<tr class="table-primary">
				<td><?php echo $data['id_barang']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['jenis']; ?></td>
				<td><?php echo $data['stok']; ?></td>
				<td><?php echo $data['Total']; ?></td>
				<td><?php echo $data['harga']; ?></td>
				<td>
				<a href="dasboard_admin.php?page=update&id=<?php echo $data['id_barang'] ?>">
					<button class="btn bg-primary"><i class="fa fa-edit"></i> Update</button></a> <!--| <?php /*echo "<a href='proses_delete.php?id=".$data['id_barang']."'>
					<input type='submit' name='hapus' value='Hapus'></a>"*/?>-->
				</td>
			</tr>
		<?php } ?>		
	</tbody>
</table>
</div>
<br>
<br>
<?php 
include "koneksi.php";
$qu = mysqli_query($koneksi,"SELECT CONCAT('Rp ',FORMAT(SUM(harga*stok),0)) AS Total FROM barang");
while ($dat = mysqli_fetch_array($qu)) {
?>
<div class="total_atas">Total : <input type="text" name="total" value="<?php echo $dat['Total']; ?>" readonly></div>
<br>
<br>
<br>
<?php } ?>

</div>