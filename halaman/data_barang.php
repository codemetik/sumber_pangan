<?php 
include "rupiah.php";
?>
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
				<div class="table-responsive p-0" style="height: 450px;">
				<table class="table table-bordered table-head-fixed text-nowrap table-hover font-12">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Barang</th>
							<th>Nama Barang</th>
							<th>Jenis</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Harga Jual</th>
							<th>Sub Harga</th>
							<th>SUb Harga Jual</th>
							<th colspan="2">Pilih</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include "koneksi.php";
						$query = mysqli_query($koneksi, "SELECT id_barang, nama , jenis, stok, harga, harga_jual, harga*stok AS sub_harga, (harga+harga_jual)*stok AS sub_hargajual FROM barang") or die(mysqli_error());
						$no=1;
						while($data = mysqli_fetch_array($query)){
								?>
							<tr class="table-primary">
								<td><?= $no++; ?></td>
								<td><?php echo $data['id_barang']; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['jenis']; ?></td>
								<td><?php echo $data['stok']; ?></td>
								<td><?php echo rupiah($data['harga']); ?></td>
								<td><?php echo rupiah($data['harga_jual']); ?></td>
								<td><?php echo rupiah($data['sub_harga']); ?></td>
								<td><?php echo rupiah($data['sub_hargajual']); ?></td>
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
							<?php 	
							$qu = mysqli_query($koneksi,"SELECT SUM(harga) AS harga, SUM(harga_jual) AS harga_jual, SUM(harga*stok) AS sub_harga, SUM((harga+harga_jual)*stok) AS sub_hargajual FROM barang");
							$dat = mysqli_fetch_array($qu);
							 ?>
							<td>
								<input type="text" name="total" class="form-control bg-red" value="<?php echo rupiah($dat['harga']); ?>" readonly>
							</td>
							<td>
								<input type="text" name="total" class="form-control bg-red" value="<?php echo rupiah($dat['harga_jual']); ?>" readonly>
							</td>
							<td>
								<input type="text" name="total" class="form-control bg-red" value="<?php echo rupiah($dat['sub_harga']); ?>" readonly>
							</td>
							<td>
								<input type="text" name="total" class="form-control bg-red" value="<?php echo rupiah($dat['sub_hargajual']); ?>" readonly>
							</td>
							<td></td>
						</tr>	
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>