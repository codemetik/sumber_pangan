<?php 
include "../../koneksi.php";

$sql = mysqli_query($koneksi, "DELETE FROM tb_customer WHERE id_customer = '".$_GET['id']."'");

if ($sql) {
	echo "<script>
	alert('Data Berhasil disimpan');
	document.location.href = '../../index2.php?page=customer';
	</script>";
}else{
	echo "<script>
	alert('Data Gagal disimpan');
	document.location.href = '../../index2.php?page=customer';
	</script>";
}
?>