<?php 
include 'koneksi.php';
include "rupiah.php";
?>
<div class="card">
  <div class="card-header bg-primary">
    <a href=""><b>Laporan</b></a> / Laporan Barang Masuk
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12 mb-2">
        <label>Masukkan Tanggal : </label><i>"yyyy-mm-dd"</i>
        <form action="" method="post">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group"><input type="date" name="search1" class="form-control" placeholder="Tanggal Awal"></div>
            </div>
            <div class="col-lg-3">
              <div class="form-group"><input type="date" name="search2" class="form-control" placeholder="Tanggal Akhir"></div>
            </div>
            <div class="col-lg-6">
              <div class="form-group"><button type="submit" name="submit" class="btn bg-blue"><i class="fa fa-search"></i></button></div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12">
        <div class="table-responsive p-0" style="height: 450px;">
          <table class="table table-bordered table-head-fixed text-nowrap table-hover font-12">
          <thead>
             <tr>
              <th>No</th>
              <th>ID transaksi</th>
              <th>Tanggal</th>
              <th>ID Barang</th>
              <th>Nama Barang</th>
              <th>Nama Supplier</th>
              <th>Harga</th>
              <th>Barang Masuk</th>
              <th>Total Harga</th>
             </tr>
          </thead>
          <tbody>
          <?php  
           if (isset($_POST['submit'])) {
           $tgl1 = $_POST['search1'];
           $tgl2 = $_POST['search2'];
           $query = "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama_barang,nama_supplier, harga, brg_masuk,harga * brg_masuk AS Total FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'";
          }else{
            $query = "SELECT Z.id_transaksi, tanggal, Y.id_barang, nama_barang,nama_supplier, harga, brg_masuk,harga * brg_masuk AS Total FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier";
          }
           $result = mysqli_query($koneksi, $query);
           $no=1;
           while($data = mysqli_fetch_array($result)) {
            echo "<tr class='table-primary'>
              <td>".$no++."</td>
               <td>".$data['id_transaksi']."</td>
               <td>".$data['tanggal']."</td>
               <td>".$data['id_barang']."</td>
               <td>".$data['nama_barang']."</td>
               <td>".$data['nama_supplier']."</td>
               <td>".rupiah($data['harga'])."</td>
               <td>".$data['brg_masuk']."</td>
               <td>".rupiah($data['Total'])."</td>
            <tr>";
           }
          ?>
          <tr class="table-primary">
            <td colspan="8"><center>Total</center></td>
            <td>
              <?php 
              if (isset($_POST['submit'])) {
              $tgl1 = $_POST['search1'];
               $tgl2 = $_POST['search2'];
              $qu = mysqli_query($koneksi, "SELECT SUM(brg_masuk), SUM(harga * brg_masuk) AS Total FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier
              WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
              }else{
                $qu = mysqli_query($koneksi, "SELECT SUM(brg_masuk), SUM(harga * brg_masuk) AS Total FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier");
              }
              while ($dat = mysqli_fetch_array($qu)) {
              ?>
              <input type="submit" name="total" value="<?php echo rupiah($dat['Total']); ?>" class="form-control bg-red" readonly>

              <?php }
              ?>
            </td>
          </tr>
          </tbody>
          </table>
          </div>
      </div>
      <div class="col-lg-12">
        <div class="float-right">
          <?php 
          if (isset($_POST['submit'])) {
            $search1 = $_POST['search1'];
            $search2 = $_POST['search2']; ?>
            <a href="halaman_admin/print_laporanA.php?&tgla=<?= $search1; ?>&tglb=<?= $search2; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <?php }else{

          }
          ?>
          
        </div>
      </div>
    </div>
  </div>
</div>