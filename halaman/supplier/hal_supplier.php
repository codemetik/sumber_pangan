<?php 
include "koneksi.php";
?>
<div class="card">
	<div class="card-header bg-blue">
		<a href=""><b>Kontak</b> / Data Supplier</a>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 mb-2">
				<a href="?page=inputSupplier" class="btn bg-primary">Tambah Supplier</a>
				<form action="" method="POST">
				  <div class="input-group input-group-sm float-right" style="width: 250px;">
				    <input type="text" name="search" class="form-control float-right" placeholder="Search Supplier">

				    <div class="input-group-append">
				      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="col-sm-12">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-head-fixed text-nowrap font-10">
						<thead>
							<tr>
								<th>ID Supplier</th>
								<th>Nama Supplier</th>
								<th>No Telp</th>
								<th>Alamat</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier LIKE '%".$search."%' OR nama_supplier LIKE '%".$search."%'");
						}else{
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
						}
						
						while ($data = mysqli_fetch_array($sql)) { ?>
							<tr class="table-primary">
								<td><?= $data['id_supplier']; ?></td>
								<td><?= $data['nama_supplier']; ?></td>
								<td><?= $data['no_telp']; ?></td>
								<td><?= $data['alamat']; ?></td>
								<td>
									<a href="?page=updateSupplier&id=<?= $data['id_supplier']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a> || <a href="halaman/supplier/delete_supplier.php?id=<?= $data['id_supplier']; ?>" class="btn bg-danger"><i class="fa fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php }
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>