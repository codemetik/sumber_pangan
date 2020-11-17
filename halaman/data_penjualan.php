<?php 
include "rupiah.php";
?>
<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang</b></a> / Data Penjualan
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4 mb-2">
				<a href="?page=inputDataBaruPenjualan" class="btn bg-primary">Tambah Penjualan</a>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-12">
						<thead class="thead-dark">
						<tr>
							<th>No</th>
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
						$query = mysqli_query($koneksi, "SELECT id_jual, x.id_barang, tanggal, nama_barang, brg_keluar, harga * brg_keluar AS total FROM tb_transaksi_jual X INNER JOIN barang Y ON y.id_barang = x.id_barang")or die(mysqli_error());
						$no=1;
						while($data = mysqli_fetch_array($query)){
						?>
						<tr class="table-primary">
							<td><?= $no++; ?></td>
							<td><?php echo $data['id_jual']; ?></td>
							<td><?php echo $data['tanggal']; ?></td>
							<td><?php echo $data['id_barang']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['brg_keluar']; ?></td>
							<td><?php echo rupiah($data['total']); ?></td>
							<td class="pilih">
							<a href="?page=editPenjualan&id=<?= $data['id_jual']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a>
							<a href="halaman/barang_keluar/delete_keluar.php?id_jual=<?= $data['id_jual']; ?>">
								<button type='submit' name='hapus' class="btn bg-red"><i class="fa fa-trash-alt"></i></button></a>
							</td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>