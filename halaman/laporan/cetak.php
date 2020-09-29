<link rel="stylesheet" type="text/css" href="../../css/styleTable.css">
<center><h1>Halaman Laporan Cetak</h1></center>

<table id="customers">
 <tr>
  <th>ID transaksi</th>
  <th>Tanggal</th>
  <th>ID Barang</th>
  <th>Nama Barang</th>
  <th>Barang Masuk</th>
  <th>Total</th>
 </tr>
<?php  
include '../../koneksi.php';
$id = $_GET['tanggal'];
$sear1 = $_GET['tanggal'];
$sear2 = $_GET['tanggal'];
 $query = "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama, brg_masuk, harga * brg_masuk AS Total FROM barang Y
JOIN tb_harga X ON Y.id_barang = X.id_barang JOIN tb_transaksi Z ON Y.id_barang = Z.id_barang WHERE id_transaksi=$_GET[tanggal] BETWEEN '$_GET[tanggal]' AND '$_GET[tanggal]'";
 $result = mysql_query($query);
 while($data = mysql_fetch_array($result)) {
  echo "<tr>
     <td>".$data['id_transaksi']."</td>
     <td>".$data['tanggal']."</td>
     <td>".$data['id_barang']."</td>
     <td>".$data['nama']."</td>
     <td>".$data['brg_masuk']."</td>
     <td>".$data['Total']."</td>
  <tr>";
 }
?>
</table>