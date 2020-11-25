<?php
include "koneksi.php"; 
include "rupiah.php";
?>
<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data Barang</b></a> / Data Stok
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 mb-2">
				<a href="?page=inputDataBaru" class="btn bg-primary">Tambah Data Baru</a>
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
							<th>ID Barang</th>
							<th>Nama Barang</th>
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
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$query = mysqli_query($koneksi, "SELECT id_barang, nama , stok, harga, harga_jual, harga*stok AS sub_harga, (harga+harga_jual)*stok AS sub_hargajual FROM barang WHERE id_barang LIKE '%".$search."%' OR nama LIKE '%".$search."%' OR jenis LIKE '%".$search."%'") or die(mysqli_error());
						}else{
							$query = mysqli_query($koneksi, "SELECT id_barang, nama , stok, harga, harga_jual, harga*stok AS sub_harga, (harga+harga_jual)*stok AS sub_hargajual FROM barang") or die(mysqli_error());
						}
						
						$no=1;
						while($data = mysqli_fetch_array($query)){
								?>
							<tr class="table-primary">
								<td><?= $no++; ?></td>
								<td><?php echo $data['id_barang']; ?></td>
								<td><?php echo $data['nama']; ?></td>
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
							<td colspan="4"><center>Total :</center></td>
							<?php 
							if (isset($_POST['tampil'])) {
									$search = $_POST['search'];
									$qu = mysqli_query($koneksi,"SELECT SUM(harga) AS harga, SUM(harga_jual) AS harga_jual, SUM(harga*stok) AS sub_harga, SUM((harga+harga_jual)*stok) AS sub_hargajual FROM barang WHERE id_barang LIKE '%".$search."%' OR nama LIKE '%".$search."%' OR jenis LIKE '%".$search."%'");

								}else{
									$qu = mysqli_query($koneksi,"SELECT SUM(harga) AS harga, SUM(harga_jual) AS harga_jual, SUM(harga*stok) AS sub_harga, SUM((harga+harga_jual)*stok) AS sub_hargajual FROM barang");
								}	
							
							while ($dat = mysqli_fetch_array($qu)) { ?>
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
							<?php }
							 ?>
							<td></td>
						</tr>	
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>