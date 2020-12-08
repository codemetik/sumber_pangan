<?php include "koneksi.php"; ?>

<?php 
if (isset($_GET['add'])) { ?>

<div class="card">
	<div class="card-header bg-primary">
		<a href="index2.php?page=data_user"><b>Data User</b></a> / User / Tambah User
	</div>
	<div class="card-body">
		<form action="halaman/proses_tambah_user.php" method="POST">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama User</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama" autofocus>
					</div>
					<div class="form-group">
						<label>Hak Akses</label>
						<select class="form-control" name="id_akses" required>
							<option>-- Pilih --</option>
							<?php 
							$select = mysqli_query($koneksi, "SELECT * FROM tb_akses");
							while ($dsel = mysqli_fetch_array($select)) {
								echo "<option value='".$dsel['id_akses']."'>".$dsel['nama_akses']."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="col-md-12">
					<button class="btn bg-primary" type="submit" name="simpan_user">Simpan</button>
					<a href="index2.php?page=data_user" class="btn bg-primary">Cencel</a>
				</div>
			</div>
		</form>
	</div>
</div>

<?php }else if(isset($_GET['update'])){ 

$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '".$_GET['update']."'");
$data = mysqli_fetch_array($sql);

$sql1 = mysqli_query($koneksi, "SELECT * FROM tb_rols_akses WHERE id_admin = '".$_GET['update']."'");
$data1 = mysqli_fetch_array($sql1);
	?>

<div class="card">
	<div class="card-header bg-primary">
		<a href="index2.php?page=data_user"><b>Data User</b></a> / User / Update User
	</div>
	<div class="card-body">
		<form action="halaman/proses_update_user.php" method="POST">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>ID User</label>
						<input type="text" name="id_admin" class="form-control" value="<?= $data['id_admin']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama User</label>
						<input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" autofocus>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" value="<?= $data['username']; ?>">
					</div>
					<div class="form-group">
						<label>Hak Akses</label>
						<select class="form-control" name="id_akses" required>
							<option>-- Pilih --</option>
							<?php 
							$sel = mysqli_query($koneksi, "SELECT * FROM tb_akses");
							while ($dsel = mysqli_fetch_array($sel)) {
								if ($data1['id_akses'] == $dsel['id_akses']) {
									$select = "selected";
								}else{
									$select = "";
								}
								echo "<option value='".$dsel['id_akses']."' ".$select.">".$dsel['nama_akses']."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<button class="btn bg-primary" type="submit" name="simpan_user">Simpan</button>
					<a href="index2.php?page=data_user" class="btn bg-primary">Cencel</a>
				</div>
			</div>
		</form>
	</div>
</div>

<?php }else{ ?>

<div class="card">
	<div class="card-header bg-primary">
		<a href=""><b>Data User</b></a> / User
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12 mb-2">
				<a href="index2.php?page=data_user&add" class="btn bg-primary">Tambah User</a>
			</div>
			<div class="col-md-12">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-hover table-head-fixed text-nowrap font-12">
						<thead>
							<tr>
								<th>ID User</th>
								<th>Nama User</th>
								<th>Hak Akses</th>
								<th>Username</th>
								<th>Password</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_rols_akses X INNER JOIN admin Y ON y.id_admin = x.id_admin INNER JOIN tb_akses z ON z.id_akses = x.id_akses");
							while ($data = mysqli_fetch_array($sql)) { 
								echo "<tr>";
								echo "<td>".$data['id_admin']."</td>
								<td>".$data['nama']."</td>
								<td>".$data['nama_akses']."</td>
								<td>".$data['username']."</td>
								<td>".$data['password']."</td>"; ?>
								<td>
									<a href="index2.php?page=data_user&update=<?= $data['id_admin']; ?>" class="btn bg-primary"><i class="fa fa-edit"></i></a>
								</td>
								<?php echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }
?>