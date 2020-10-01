<div class="card">
  <div class="card-header bg-primary">
    <a href=""><b>Laporan</b></a> / Laporan Barang Keluar
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12 mb-2">
        <label>Masukkan Tanggal : </label><i>"yyyy-mm-dd"</i>
        <form method="post">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <input type="date" class="form-control" name="search1" placeholder="Tanggal Awal">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                 <input type="date" class="form-control" name="search2" placeholder="Tanggal Akhir">
              </div>
            </div>
            <div class="col-lg-6">
              <input type="submit" name="submit" class="btn bg-primary" value="search">
            </div>
          </div>
         </form>
      </div>
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover font-12">
         <thead class="thead-dark">
           <tr>
          <th>ID transaksi</th>
          <th>Tanggal</th>
          <th>ID Barang</th>
          <th>Nama Barang</th>
          <th>Barang Keluar</th>
          <th>Total Harga</th>
         </tr>
         </thead>
         <tbody>
        <?php  
         include 'koneksi.php';
         if (isset($_POST['submit'])) {
         $tgl1 = $_POST['search1'];
         $tgl2 = $_POST['search2'];
         $query = "SELECT Z.id_jual, tanggal, Y.id_barang, nama_barang, brg_keluar, (harga + harga_jual) * brg_keluar AS Total FROM barang Y
        JOIN tb_harga X ON Y.id_barang = X.id_barang JOIN tb_transaksi_jual Z ON Y.id_barang = Z.id_barang WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'";
        }else{
          $query = "SELECT Z.id_jual, tanggal, Y.id_barang, nama_barang, brg_keluar, (harga + harga_jual) * brg_keluar AS Total FROM barang Y
        JOIN tb_harga X ON Y.id_barang = X.id_barang JOIN tb_transaksi_jual Z ON Y.id_barang = Z.id_barang";
        }
         $result = mysqli_query($koneksi, $query);
         while($data = mysqli_fetch_array($result)) {
          echo "<tr class='table-primary'>
             <td>".$data['id_jual']."</td>
             <td>".$data['tanggal']."</td>
             <td>".$data['id_barang']."</td>
             <td>".$data['nama_barang']."</td>
             <td>".$data['brg_keluar']."</td>
             <td>".$data['Total']."</td>
          <tr>";
         }
        ?>
        <tr class="table-primary">
          <td colspan="5"><center>Total </center></td>
          <td>
            <?php 
              include "koneksi.php";
              if (isset($_POST['submit'])) {
              $tgl1 = $_POST['search1'];
               $tgl2 = $_POST['search2'];
              $qu = mysqli_query($koneksi, "SELECT SUM(brg_keluar), SUM((harga + harga_jual)* brg_keluar) AS Total
              FROM barang Y
              JOIN tb_harga X ON Y.id_barang = X.id_barang
              JOIN tb_transaksi_jual Z ON Y.id_barang = Z.id_barang
              WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
              }else{
                $qu = mysqli_query($koneksi, "SELECT SUM(brg_keluar), SUM((harga + harga_jual) * brg_keluar) AS Total
              FROM barang Y
              JOIN tb_harga X ON Y.id_barang = X.id_barang
              JOIN tb_transaksi_jual Z ON Y.id_barang = Z.id_barang");
              }
              while ($dat = mysqli_fetch_array($qu)) { ?>
              <input type="submit" name="total" class="form-control bg-red" value="<?php echo $dat['Total']; ?>" readonly>
              <?php } ?>
          </td>
        </tr>
        </tbody>
        </table>  
        </div>
      </div>
    </div>
      </div>
</div>
