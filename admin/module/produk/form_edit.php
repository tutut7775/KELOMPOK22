<?php   
 //session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen
            <small>Produk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Produk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Produk</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idProduk=$_GET['id_produk'];
              $queryEdit=mysql_query("SELECT * FROM barang WHERE kode_barang='$idProduk'");

              $hasilQuery=mysql_fetch_array($queryEdit);
              $idProduk=$hasilQuery['kode_barang'];
              $namaBarang=$hasilQuery['nama_barang'];
              $hargaBarang=$hasilQuery['harga_barang'];
              $beratBarang=$hasilQuery['berat_barang'];
              $deskripsiBarang=$hasilQuery['keterangan_barang'];
              $stokBarang=$hasilQuery['stok_barang'];
              $rekomendasi=$hasilQuery['rekomendasi'];
              
              ?>

			        <form class="form-horizontal" action="../admin/module/produk/aksi_edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_produk" value="<?php echo $idProduk; ?>">

                  <div class="box-body">

                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
            
                      <select class="form-control" name="idKategori">
                                <?php
                
                include "../lib/koneksi.php";
				
                $kueriKategori= mysql_query("select * from kategori ORDER BY nama_kategori");
                while($kat=mysql_fetch_array($kueriKategori)){
                	if ($hasilQuery['id_kategori']==$kat['id_kategori']){
                	echo "<option value=$kat[id_kategori] selected>$kat[nama_kategori]</option>";   
                }else{
                  	echo "<option value=$kat[id_kategori]>$kat[nama_kategori]</option>";   

                }
                        } ?>  

                      </select>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kode Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="idProduk" name="idProduk" placeholder="kode Barang" value="<?php echo $idProduk; ?>">
                      </div>
                    </div>             
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Nama Barang" value="<?php echo $namaBarang; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="hargaBarang" name="hargaBarang" placeholder="Harga Produk" value="<?php echo $hargaBarang; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Berat Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="beratBarang" name="beratBarang" placeholder="Berat Produk" value="<?php echo $beratBarang; ?>">
                      </div>
                    </div>
                          <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Gambar Barang</label>
                      <div class="col-sm-10">
                      <?php echo "<input type='file' id='gambar' src='../../upload/$hasilQuery[gambar_barang]' name='gambar'>";?>
                      </div>
                    </div>
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsiBarang" name="deskripsiBarang" placeholder="Keterangan Barang" value="<?php echo $deskripsiBarang; ?>">
                      </div>
                    </div>
                    
                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Stok Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stokBarang" name="stokBarang" placeholder="Stok Barang" value="<?php echo $stokBarang; ?>">
                      </div>
                    </div>  
                            <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">Produk Rekomendasi</label>
                       <div class="col-sm-10">
					   <?php if($rekomendasi=='Y'){?>
                      <div class="radio">
                        <label>
                          <input type="radio" name="rekomendasi" id="rekomendasi" value="Y" checked>
                         Ya
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="rekomendasi" id="rekomendasi" value="N">
                          Tidak
                        </label>
                      </div>
					  <?php } else {?>
					      <div class="radio">
                        <label>
                          <input type="radio" name="rekomendasi" id="rekomendasi" value="Y" >
                         Ya
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="rekomendasi" id="rekomendasi" value="N" checked>
                          Tidak
                        </label>
                      </div>
					  <?php } ?>
                   </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                   
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
			</div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  
      <?php } ?>