<?php 
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['name'];
$jns = $_POST['jenis'];
$stk = $_POST['stok'];
$hrg = $_POST['harga'];

	if (move_uploaded_file($tmp)) {
		$query = "SELECT * FROM barang WHERE id_barang='".$id."'";
		$sql = mysqli_query($koneksi, $query);

		$data = mysqli_fetch_array($sql);

		$query = "UPDATE barang set nama='".$nama."', jenis='".$jns."', stok='".$stk."', harga='".$hrg."', WHERE id_barang='".$id."'";

		$sql = mysqli_query($koneksi, $query);

		if ($sql) {
			header("location:dasboard_admin.php?page=dataBarang");
		}else{
			echo " maaf terjadi kesalahan saat menyimpan ke database";
			echo "<br><a href='dasboard_admin.php?page=dataBarang'>kembali ke from</a></br>";
		}

	}else{
		echo "maaf, gambar gagal untuk di upload";
		echo "<br><a href='dasboard_admin.php?page=dataBarang'>kembali ke from</a></br>";
	}
	//jika user tidak menceklish checkbox.
	$query = "UPDATE barang set nama='".$nama."', jenis='".$jns."', stok='".$stk."', harga='".$hrg."' WHERE id_barang='".$id."'";
	$sql = mysqli_query($koneksi, $query);
	if ($sql) {
		header("location:dasboard_admin.php?page=dataBarang");
	}else{
		echo "maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database";
		echo "<><a href='dasboard_admin.php?page=dataBarang'>kembali ke from</a>";
	}
?>