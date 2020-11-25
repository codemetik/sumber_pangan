<?php   
include "koneksi.php";
include "rupiah.php";

$sup = mysqli_query($koneksi, "SELECT COUNT(*) AS tot FROM tb_supplier");
$dsup = mysqli_fetch_array($sup);

$cus = mysqli_query($koneksi, "SELECT COUNT(*) AS tot FROM tb_customer");
$dcus = mysqli_fetch_array($cus);

$brg = mysqli_query($koneksi, "SELECT COUNT(*) AS tot FROM barang");
$dbrg = mysqli_fetch_array($brg);

$tran = mysqli_query($koneksi, "SELECT COUNT(*) AS tot FROM tb_transaksi");
$dtran = mysqli_fetch_array($tran);

$jul = mysqli_query($koneksi, "SELECT COUNT(*) AS tot FROM tb_transaksi_jual");
$djul = mysqli_fetch_array($jul);

$qu = mysqli_query($koneksi,"SELECT SUM(harga) AS harga, SUM(harga_jual) AS harga_jual, SUM(harga*stok) AS sub_harga, SUM((harga+harga_jual)*stok) AS sub_hargajual FROM barang");
$dqu = mysqli_fetch_array($qu);
?>
<div class="row mb-2">
  <div class="col-sm-12">
    <h1 class="m-0 text-dark text-center">Selamat Datang di PT. Purnamajaya Bhakti Utama</h1>
  </div><!-- /.col -->
  <div class="col-sm-12">
    <h5 class="m-0 text-dark text-center">PT. Purnamajaya Bhakti Utama adalah perusahaan yang bergerak dibidang percetakan</h5>
    <!-- <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Dashboard v2</li>
    </ol> -->
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="card-footer p-0">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a id="vert-tabs-supplier-tab" data-toggle="pill" href="#vert-tabs-supplier" role="tab" aria-controls="vert-tabs-supplier" aria-selected="true" class="nav-link">
                  Supplier <span class="float-right badge bg-primary"><?= $dsup['tot']; ?></span>
                </a>
              </li>
              <li class="nav-item">
                <a id="vert-tabs-customer-tab" data-toggle="pill" href="#vert-tabs-customer" role="tab" aria-controls="vert-tabs-customer" aria-selected="false" class="nav-link">
                  Customer <span class="float-right badge bg-primary"><?= $dcus['tot']; ?></span>
                </a>
              </li>
              <li class="nav-item">
                <a id="vert-tabs-barang-tab" data-toggle="pill" href="#vert-tabs-barang" role="tab" aria-controls="vert-tabs-barang" aria-selected="false" class="nav-link">
                  Data Barang <span class="float-right badge bg-primary"><?= $dbrg['tot']; ?></span>
                </a>
              </li>
              <li class="nav-item">
                <a id="vert-tabs-pembelian-tab" data-toggle="pill" href="#vert-tabs-pembelian" role="tab" aria-controls="vert-tabs-pembelian" aria-selected="false" class="nav-link">
                  Pembelian <span class="float-right badge bg-primary"><?= $dtran['tot']; ?></span>
                </a>
              </li>
              <li class="nav-item">
                <a id="vert-tabs-penjualan-tab" data-toggle="pill" href="#vert-tabs-penjualan" role="tab" aria-controls="vert-tabs-penjualan" aria-selected="false" class="nav-link">
                  Penjualan <span class="float-right badge bg-primary"><?= $djul['tot']; ?></span>
                </a>
              </li>
            </ul>
          </div>          
      </div>
    </div>    
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-supplier" role="tabpanel" aria-labelledby="vert-tabs-supplier-tab">
                     Total Data Supplier : <?= $dsup['tot']; ?> Supplier <br><br>
                     <div class="table-responsive">
                       <table class="table table-hover">
                         <thead>
                          <?php 
                          $sup = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
                          while ($dsup = mysqli_fetch_array($sup)) { ?>
                              <tr>
                                <td><?= $dsup['nama_supplier']; ?></td>
                                <td><?= $dsup['no_telp']; ?></td>
                              </tr> 
                          <?php }
                          ?>
                           
                         </thead>
                       </table>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-customer" role="tabpanel" aria-labelledby="vert-tabs-customer-tab">
                     Total Data Customer : <?= $dcus['tot']; ?> Customer <br><br>
                     <div class="table-responsive">
                       <table class="table table-hover">
                         <thead>
                          <?php 
                          $cus = mysqli_query($koneksi, "SELECT * FROM tb_customer");
                          while ($dcus = mysqli_fetch_array($cus)) { ?>
                              <tr>
                                <td><?= $dcus['nama_customer']; ?></td>
                                <td><?= $dcus['no_telp']; ?></td>
                              </tr> 
                          <?php }
                          ?>
                           
                         </thead>
                       </table>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-barang" role="tabpanel" aria-labelledby="vert-tabs-barang-tab">
                    <div class="row">
                      <div class="col-sm-12">
                        <table class="table table-responsive table-hover">
                           <tr> 
                              <th>Total Barang</th>
                              <td>: <?= $dbrg['tot']; ?></td>
                           </tr>
                           <tr>
                             <th>Total Harga</th>
                             <td>: <?= rupiah($dqu['harga']); ?></td>
                           </tr>
                           <tr>
                             <th>Total Harga Jual</th>
                             <td>: <?= rupiah($dqu['harga_jual']); ?></td>
                           </tr>
                           <tr>
                             <th>Sub Harga</th>
                             <td>: <?= rupiah($dqu['sub_harga']); ?></td>
                           </tr>
                           <tr>
                             <th>Sub Harga Jual</th>
                             <td>: <?= rupiah($dqu['sub_hargajual']); ?></td>
                           </tr>
                           <tr>
                             <th>Income</th>
                             <td>: <?= rupiah($dqu['sub_hargajual'] - $dqu['sub_harga']); ?></td>
                           </tr>
                         </table>      
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-pembelian" role="tabpanel" aria-labelledby="vert-tabs-pembelian-tab">
                     Pembelian : <?= $dtran['tot']; ?> id transaksi
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-penjualan" role="tabpanel" aria-labelledby="vert-tabs-penjualan-tab">
                     Pembelian : <?= $djul['tot']; ?> id transaksi
                  </div>
                </div>
              </div>
      </div>
    </div>    
  </div>
</div>