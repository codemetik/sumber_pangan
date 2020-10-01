
<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang</b></a> / Data Stok
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4 mb-2">
				<a href="?page=inputDataBaru" class="btn bg-primary">Tambah Data Baru</a>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive">
				<table class="table table-bordered table-hover font-12">
					<thead class="thead-dark">
						<tr>
							<th>ID Barang</th>
							<th>Nama Barang</th>
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
								<a href="?page=update&id=<?php echo $data['id_barang'] ?>">
									<button class="btn bg-primary"><i class="fa fa-edit"></i></button></a> <!--| <?php /*echo "<a href='proses_delete.php?id=".$data['id_barang']."'>
									<input type='submit' name='hapus' value='Hapus'></a>"*/?>-->
									<a href="proses_delete.php?id=<?= $data['id_barang']; ?>"><button class="btn bg-red"><i class="fa fa-trash-alt"></i></button></a>
								</td>
							</tr>
						<?php } ?>
						<tr class="table-primary">
							<td colspan="5"><center>Total :</center></td>
							<td colspan="2">
								<?php 	
				$qu = mysqli_query($koneksi,"SELECT CONCAT('Rp ',FORMAT(SUM(harga*stok),0)) AS Total FROM barang");
				while ($dat = mysqli_fetch_array($qu)) {
				?>
				<input type="text" name="total" class="form-control bg-red" value="<?php echo $dat['Total']; ?>" readonly>

				<?php } ?>
							</td>
						</tr>	
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>