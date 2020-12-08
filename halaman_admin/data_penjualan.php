<?php 
include "koneksi.php";
include "rupiah.php";
?>
<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang</b></a> / Data Penjualan
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 mb-2">
				<a href="?page=inputDataBaruPenjualan" class="btn bg-primary">Tambah Penjualan</a>
				<form action="" method="POST">
				  <div class="input-group input-group-sm float-right" style="width: 250px;">
				    <input type="text" name="search" class="form-control float-right" placeholder="Search Barang">

				    <div class="input-group-append">
				      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-bordered table-head-fixed text-nowrap table-hover font-12">
						<thead>
						<tr>
							<th>No</th>
							<th>ID Jual</th>
							<th>Tanggal</th>
							<th>ID barang</th>
							<th>Nama Barang</th>
							<th>Nama Customer</th>
							<th>Barang Keluar</th>
							<th>Total Harga</th>
							<th>Opsi</th>
						</tr>	
						</thead>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$query = mysqli_query($koneksi, "SELECT y.id_jual, x.id_barang, tanggal, nama_barang, nama_customer, brg_keluar, harga * brg_keluar AS total FROM barang X INNER JOIN tb_transaksi_jual Y ON y.id_barang = x.id_barang INNER JOIN tb_rols_customer z ON z.id_jual = y.id_jual INNER JOIN tb_customer a ON a.id_customer = z.id_customer WHERE nama_barang LIKE '%".$search."%'")or die(mysqli_error());
						}else{
							$query = mysqli_query($koneksi, "SELECT y.id_jual, x.id_barang, tanggal, nama_barang, nama_customer, brg_keluar, harga * brg_keluar AS total FROM barang X INNER JOIN tb_transaksi_jual Y ON y.id_barang = x.id_barang INNER JOIN tb_rols_customer z ON z.id_jual = y.id_jual INNER JOIN tb_customer a ON a.id_customer = z.id_customer")or die(mysqli_error());	
						}
						
						$no=1;
						while($data = mysqli_fetch_array($query)){
						?>
						<tr class="table-primary">
							<td><?= $no++; ?></td>
							<td><?php echo $data['id_jual']; ?></td>
							<td><?php echo $data['tanggal']; ?></td>
							<td><?php echo $data['id_barang']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['nama_customer']; ?></td>
							<td><?php echo $data['brg_keluar']; ?></td>
							<td><?php echo rupiah($data['total']); ?></td>
							<td class="pilih">
							<a href="?page=editPenjualan&id=<?= $data['id_jual']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a>
							<a href="halaman_admin/barang_keluar/delete_keluar.php?id=<?= $data['id_jual']; ?>">
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