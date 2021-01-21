<?php 
include "koneksi.php";
include "rupiah.php";
?>
<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang</b></a> / Data Pembelian
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 mb-2">
				<?php 
				$sqlcel = mysqli_query($koneksi, "SELECT * FROM admin X INNER JOIN tb_rols_akses Y ON y.id_admin = x.id_admin INNER JOIN tb_akses z ON z.id_akses = y.id_akses WHERE x.id_admin = '".$_SESSION['id_admin']."'");
				$cekuser = mysqli_fetch_array($sqlcel);
				if ($cekuser['id_akses'] == '3') { ?>
					
				<?php }else{ ?>
					<a href="?page=inputDataBaruPembelian" class="btn bg-primary">Tambah Pembelian</a>
				<?php }
				?>
				<form action="" method="POST">
				  <div class="input-group input-group-sm float-right" style="width: 350px;">
				    <input type="text" name="search" class="form-control float-right" placeholder="Search Barang / Supplier">

				    <div class="input-group-append">
				      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-bordered table-hover table-head-fixed text-nowrap font-12">
						<tr class="thead-dark">
							<th>No</th>
							<th>ID transaksi</th>
							<th>Tanggal</th>
							<th>ID barang</th>
							<th>Nama Barang</th>
							<th>Nama Supplier</th>
							<th>Barang Masuk</th>
							<th>Total Harga</th>
							<th>Opsi</th>
						</tr>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$query = mysqli_query($koneksi, "SELECT y.id_transaksi, x.id_barang, tanggal, nama_barang, nama_supplier, brg_masuk, harga * brg_masuk AS total FROM barang X INNER JOIN tb_transaksi Y ON y.id_barang = x.id_barang INNER JOIN tb_rols_supplier z ON z.id_transaksi = y.id_transaksi INNER JOIN tb_supplier a ON a.id_supplier = z.id_supplier WHERE nama_barang LIKE '%".$search."%' OR nama_supplier LIKE '%".$search."%'")or die(mysqli_error());
						}else{
							$query = mysqli_query($koneksi, "SELECT y.id_transaksi, x.id_barang, tanggal, nama_barang, nama_supplier, brg_masuk, harga * brg_masuk AS total FROM barang X INNER JOIN tb_transaksi Y ON y.id_barang = x.id_barang INNER JOIN tb_rols_supplier z ON z.id_transaksi = y.id_transaksi INNER JOIN tb_supplier a ON a.id_supplier = z.id_supplier")or die(mysqli_error());	
						}
						
						$no = 1;
						while($data = mysqli_fetch_array($query)){
						?>
						<tr class="table-primary">
							<td><?= $no++; ?></td>
							<td><?php echo $data['id_transaksi']; ?></td>
							<td><?php echo $data['tanggal']; ?></td>
							<td><?php echo $data['id_barang']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?= $data['nama_supplier']; ?></td>
							<td><?php echo $data['brg_masuk']; ?></td>
							<td><?php echo rupiah($data['total']); ?></td>
							<td class="pilih">
							<a href="?page=editPembelian&id=<?= $data['id_transaksi']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a>
							<a href="halaman/barang_masuk/delete_masuk.php?id_transaksi=<?= $data['id_transaksi']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">
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