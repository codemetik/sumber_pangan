<div class="table-responsive">
    <table class="table table-bordered table-hover font-12">
<thead class="thead-dark">
   <tr>
    <th>ID transaksi</th>
    <th>Tanggal</th>
    <th>ID Barang</th>
    <th>Nama Barang</th>
    <th>Barang Masuk</th>
    <th>Total Harga</th>
   </tr>
</thead>
<?php  
 include 'koneksi.php';
 if (isset($_POST['submit'])) {
 $tgl1 = $_POST['search1'];
 $tgl2 = $_POST['search2'];
 $query = "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama, brg_masuk, harga * brg_masuk AS Total FROM barang Y
JOIN tb_harga X ON Y.id_barang = X.id_barang JOIN tb_transaksi Z ON Y.id_barang = Z.id_barang WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'";
}else{
  $query = "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama, brg_masuk, harga * brg_masuk AS Total FROM barang Y
JOIN tb_harga X ON Y.id_barang = X.id_barang JOIN tb_transaksi Z ON Y.id_barang = Z.id_barang";
}
 $result = mysqli_query($koneksi, $query);
 while($data = mysqli_fetch_array($result)) {
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
</div>
<br>
<br>
<br>
<style type="text/css">
  input[type=text]{
    float: left;
    width: 150px;
    margin: 10px;
  }
</style>
<link rel="stylesheet" type="text/css" href="../css/styleTable.css">
<label style="color: #0000ff">Masukkan Tanggal >>>>>>>>>>> </label><label>(yyyy-mm-dd)</label>
<form method="post">
 <input type="text" name="search1" placeholder="Tanggal Awal">
 <input type="text" name="search2" placeholder="Tanggal Akhir">
 <input type="submit" name="submit" value="search">

 <?php 
include "koneksi.php";
if (isset($_POST['submit'])) {
$tgl1 = $_POST['search1'];
 $tgl2 = $_POST['search2'];
$qu = mysqli_query($koneksi, "SELECT SUM(brg_masuk), SUM(harga * brg_masuk) AS Total
FROM barang Y
JOIN tb_harga X ON Y.id_barang = X.id_barang
JOIN tb_transaksi Z ON Y.id_barang = Z.id_barang
WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
}else{
  $qu = mysqli_query($koneksi, "SELECT SUM(brg_masuk), SUM(harga * brg_masuk) AS Total
FROM barang Y
JOIN tb_harga X ON Y.id_barang = X.id_barang
JOIN tb_transaksi Z ON Y.id_barang = Z.id_barang");
}
while ($dat = mysqli_fetch_array($qu)) {
?>
<input type="submit" name="total" value="Total : <?php echo $dat['Total']; ?>" readonly>

 </form>
<?php }
?>
