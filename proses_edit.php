<?php 
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['name'];

$stk = $_POST['stok'];
$hrg = $_POST['harga'];
$harga_jual = $_POST['harga_jual'];

	if (move_uploaded_file($tmp)) {
		$query = "SELECT * FROM barang WHERE id_barang='".$id."'";
		$sql = mysqli_query($koneksi, $query);

		$data = mysqli_fetch_array($sql);

		$query = "UPDATE barang set nama='".$nama."', stok='".$stk."', harga='".$hrg."', harga_jual = '".$harga_jual."' WHERE id_barang='".$id."'";

		$sql = mysqli_query($koneksi, $query);

		if ($sql) {
			// echo "<script>
			// alert('Data Berhasil diupdate');
			// document.location.href = 'index2.php?page=stok_barang';
			// </script>";
			header("location:dasboard_admin.php?page=dataBarang");
		}else{
			echo " maaf terjadi kesalahan saat menyimpan ke database";
			echo "<br><a href='index2.php?page=stok_barang'>kembali ke from</a></br>";
		}

	}else{
		echo "maaf, gambar gagal untuk di upload";
		echo "<br><a href='index2.php?page=stok_barang'>kembali ke from</a></br>";
	}
	//jika user tidak menceklish checkbox.
	$query = "UPDATE barang set nama='".$nama."', stok='".$stk."', harga='".$hrg."', harga_jual = '".$harga_jual."' WHERE id_barang='".$id."'";
	$sql = mysqli_query($koneksi, $query);
	if ($sql) {
		// echo "<script>
		// 	alert('Data Berhasil diupdate');
		// 	document.location.href = 'index2.php?page=stok_barang';
		// 	</script>";
		header("location:index2.php?page=stok_barang");
	}else{
		echo "maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database";
		echo "<><a href='index2.php?page=stok_barang'>kembali ke from</a>";
	}
?>