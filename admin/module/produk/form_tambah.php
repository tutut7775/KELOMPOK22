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
            <small>Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Barang</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Barang</h3>
              </div>
			  
			        <form class="form-horizontal" action="../admin/module/produk/aksi_simpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
    <!--  //tambahkan disini -->
						
<div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
      <div class="col-sm-10">
        <select class="form-control" name="idKategori"><?php
        include "../lib/koneksi.php";
        $kueriKategori=mysql_query("select * from kategori");
        while($kat=mysql_fetch_array($kueriKategori)){
          ?>
          <option value="<?php echo $kat['id_kategori'];?>"><?php echo $kat['nama_kategori'];?></option>
          <?php } ?>
          </select>
      </div>
    </div>
				     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kode Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kodeBarang" name="kodeBarang" placeholder="Kode Barang">
                      </div>
                    </div>
              <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Nama Barang">
                      </div>
                    </div>
                    </div>
              <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="hargaBarang" name="hargaBarang" placeholder="Harga Barang">
                      </div>
                    </div>
              <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Berat Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="beratBarang" name="beratBarang" placeholder="Berat Barang">
                      </div>
                    </div>
              <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Gambar barang</label>
                      <div class="col-sm-10">
                      <input type="file" id="gambar" name="gambar">
                      </div>
                      </div>
             <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Keterangan Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsiBarang" name="deskripsiBarang" placeholder="Keterangan Barang">
                      </div>
                    </div>
              <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Stok Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stokBarang" name="stokBarang" placeholder="Stok Barang">
                      </div>
                    </div>
              <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">Produk Rekomendasi</label>
                       <div class="col-sm-10">
                      <div class="radio">
                        <label>
                          <input type="radio" name="rekomendasi" id="rekomendasi" value="Y">
                         Ya
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="rekomendasi" id="rekomendasi" value="N">
                          Tidak
                        </label>
                      </div>
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