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
            <small>Merek</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Merek</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Merek</h3>
              </div>
			        <form class="form-horizontal" action="../admin/module/merek/aksi_simpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
    <!--  //tambahkan disini -->
						<div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">ID Merek</label>
					  <div class="col-sm-10">
					  <select class="from-control" name="idMerek">
							<?php
				include "../lib/koneksi.php";
				$kueriMerek= mysql_query("select * from tbl_merek");
				while ($mer=mysql_fetch_array($kueriMerek)){
				?>
						<option value="<?php echo $mer['id_merek']; ?>"><?php echo $mer['id_merek']; ?></option>
				  <?php } ?>
						</select>
					  </div>
					  </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Merek</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaMerek" name="namaMerek" placeholder="Nama Merek">
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