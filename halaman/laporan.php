<style type="text/css">
	ul{
	list-style:none;
}
li a{
	text-decoration: none;
}
.ul_atas li{
	display: inline;
	background-color:#808080;
	padding: 5px;
}
.ul_kir li{
	margin: 5px 5px;
	background-color:#808080;
	padding: 15px;
}
</style>
<div class="das_atas">
		<ul class="ul_atas">
			<li class="li_atas"><a href="dasboard_admin.php?page=/laporan.php?page=laporan">Detail Barang</a></li>
			<li><a href="#">Pembelian</a></li>
			<li><a href="#">Penjualan</a></li>
		</ul>
		</div>
<div class="das_bawah">
<?php 
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	switch ($page) {
		case 'home':
			include "laporan/cetak.php";
			break;
		case 'laporan':
			include "laporan/cetak.php";
			break;
		default:
			echo "<center><h1>Halaman tidak ada</h1</center>";
			break;
	}

}else{
		include "laporan/cetak.php";
}
?>
</div>