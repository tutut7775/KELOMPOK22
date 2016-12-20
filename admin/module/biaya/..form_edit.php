<?php   
 session_start();
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
            <small>Biaya</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Data Biaya Kirim </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Biaya Kirim</h3>
              </div>
<!-- tambahkan disini -->
			        <form class="form-horizontal" action="../admin/module/biaya/aksi_edit.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">

                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kota</label>
                      <div class="col-sm-10">
            
                      <select class="form-control" name="kota">
                                <?php
                
                include "../lib/koneksi.php";
                $kueriBiaya= mysql_query("select * from tbl_biaya_kirim");
                while($bia=mysql_fetch_array($kueriBiaya)){
                ?>
                        <option value="<?php echo $bia['id_biaya_kirim']; ?>"><?php echo $bia['id_biaya_kirim']; ?></option>
                  <?php } ?>   
                      </select>
                    </div>
                    </div>
                                 
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Biaya</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
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