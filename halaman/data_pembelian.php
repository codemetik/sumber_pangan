<?php 
include "rupiah.php";
?>
<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang</b></a> / Data Pembelian
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4 mb-2">
				<a href="?page=inputDataBaruPembelian" class="btn bg-primary">Tambah Pembelian</a>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover font-12">
						<tr class="thead-dark">
							<th>No</th>
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
						$query = mysqli_query($koneksi, "SELECT id_transaksi, x.id_barang, tanggal, nama_barang, brg_masuk, harga * brg_masuk AS total FROM tb_transaksi X INNER JOIN barang Y ON y.id_barang = x.id_barang")or die(mysqli_error());
						$no = 1;
						while($data = mysqli_fetch_array($query)){
						?>
						<tr class="table-primary">
							<td><?= $no++; ?></td>
							<td><?php echo $data['id_transaksi']; ?></td>
							<td><?php echo $data['tanggal']; ?></td>
							<td><?php echo $data['id_barang']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['brg_masuk']; ?></td>
							<td><?php echo rupiah($data['total']); ?></td>
							<td class="pilih">
							<a href="?page=editPembelian&id=<?= $data['id_transaksi']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a>
							<a href="halaman/barang_masuk/delete_masuk.php?id_transaksi=<?= $data['id_transaksi']; ?>" onclick="return confirm('Apakah anda yakin ingin data ini?')">
								<button class="btn bg-red"><i class="fa fa-trash-alt"></i></button></a>
							</td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>