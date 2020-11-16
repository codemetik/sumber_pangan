<?php 
include "../../koneksi.php";
$sql = mysqli_query($koneksi, "DELETE FROM tb_supplier WHERE id_supplier = '".$_GET['id']."'");

if (isset($sql)) {
	echo "<script>
	alert('Data Berhasil disimpan');
	document.location.href = '../../index2.php?page=supplier';
	</script>";
}else{
	echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../../index2.php?page=supplier';
		</script>";
}
?>