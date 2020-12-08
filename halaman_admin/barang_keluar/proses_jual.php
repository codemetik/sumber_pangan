<?php 

include "../../koneksi.php";

if (isset($_POST['simpan'])) {

$id = $_POST['id'];
$tgl = $_POST['tanggal'];
$id_brg = $_POST['id_barang'];
$nm = $_POST['nama'];
$msk = $_POST['keluar'];

$id_customer = $_POST['id_customer'];

$cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '".$id_brg."'");
$cekstok = mysqli_fetch_array($cek);
if ($cekstok['stok'] > $msk) {
	
	$query = "INSERT INTO tb_transaksi_jual(id_jual, tanggal, id_barang, nama_barang, brg_keluar) VALUES('$id','$tgl','$id_brg','$nm','$msk')";
	$sql = mysqli_query($koneksi, $query);



	$cus_rol = mysqli_query($koneksi, "INSERT INTO tb_rols_customer(id_customer,id_jual, id_barang, tgl) VALUES('$id_customer','$id','$id_brg','$tgl')");

	if ($sql && $cus_rol) {
		echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
		header("location:../../halaman_admin.php?page=penjualan");
	}else{
		echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
	}

}else if($cekstok['stok'] < $msk){
	echo "<script>
	alert('Maaf Stok Barang tidak mencukupi');
	document.location.href='../../halaman_admin.php?page=penjualan';
	</script>";
}



}
?>