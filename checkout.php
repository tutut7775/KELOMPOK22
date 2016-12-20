<?php require_once("lib/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>BRINOCY.CO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/icon.png" type="images/x-icon">

	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->


	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/style.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="plugins/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">

	
</head>
<body>
	<header>
		<!-- start container -->
        <div class="container">
            <!-- row 1 -->
            <div class="row">
                <div class="col-md-2">
                    <div class="nav-container1">
                        <ul class="nav nav-justified">
                            <li><a class="brand" href="index.php"><img src="images/logobrinocy.png" alt="Logo"></a></li>
                        </ul>   
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="nav-container2">
                        <ul class="nav nav-justified">
                            <li><a href="index.php">HOME</a></li>
                            <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">SHOP <b class="caret"></b></a>
                                        <ul class="dropdown-menu">                              
                                            <li><a href="shop/tshirts.php">T-Shirts</a></li>
                                            <li><a href="shop/sweaters.php">Sweaters</a></li>
                                        </ul>
                            </li>
                            <li><a href="index.php">FAQ</a></li>
                            <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">MY ACCOUNT <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="admin/index.php">LOGIN</a></li>
                                            <li><a href="#">REGISTER MEMBER</a></li>
                                        </ul>
                            </li>
                        </ul>   
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="nav-container2">
                        <ul class="nav nav-justified">
                            <li><a href="detail.php">CART</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="nav-container2">
                        <ul class="nav nav-justified">
                            <li><a href="#">PENCARIAN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
	<!-- jquery (necessary for bootstrap's javascript plugins) -->
    <script src="plugins/jquery.js"></script>

    <!-- include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</header>

	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Produk Kami</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			
    <form id="formku" action="selesai.php" method="post">
    <div class="title"><h3>Form Checkout</h3></div>

<table class="table table-hover table-condensed">
<tr>
                    <th><center>No Pembelian</center></th>
                    <th><center>Nama Barang</center></th>
                    <th><center>Jumlah</center></th>
                    <th><center>Harga Satuan</center></th>
                    <th><center>Sub Total</center></th>
                </tr>
                <?php
                //MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysql_query("select * from barang where kode_barang = '$key'");
            $data = mysql_fetch_array($query);

            $jumlah_harga = $data['harga_barang'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td ><p name="nama_barang" id="nama_barang" align="center"><?php echo $data['nama_barang']; ?></p></td>
                <td ><p name="jumlah" id="jumah" align="center"><?php echo number_format($val); ?></p></td>
                <td ><p name="harga_barang" id="harga_barang" align="center"><?php echo number_format($data['harga_barang']); ?></p></td>
                <td ><p name="subtotal" id="subtotal" align="center"><?php echo number_format($jumlah_harga); ?></p></td>
                </tr>
                
                    <?php
                    //mysql_free_result($query);            
                        }
                            //$total += $sub;
                        }?>                         
</table>
<!-- start: Table -->
                 <div class="table-responsive">
                 
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
                <div class="hero-unit">Total Belanja Anda Rp. <?php echo abs((int)$_GET['total']); ?>,-</div> 
    <input type="hidden" name="total" value="<?php echo abs($_GET['total']); ?>">
    <div class="row">
    	<!-- 1 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="nama">Nama</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="nama" type="text" class="required" minlength="6" id="nama" />
    		</div> 
    	</div>
    </div>

    

     <div class="row">
    	<!-- 4 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="email">Email</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="email" type="text" class="email required" id="email" />
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 5 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="alamat">Alamat</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="alamat" type="text" class="required" id="alamat" />
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 6 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="kota">Kota</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="kota" type="text" class="required number" minlength="4" maxlength="10" id="kota" />
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 7 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="kodepos">Kode pos</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="kodepos" type="text" class="required" minlength="6" id="kodepos" />
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 8 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="notelfon">No telepon</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="notelfon" type="text" class="required number" minlength="12" id="notelfon" />
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 9 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="norekening">No Rekening</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="norekening" type="text" class="required number" minlength="12" id="norekening" />
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 10 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="namarekening">Nama Rekening</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<input name="namarekening" type="text" class="required" minlength="6" id="namarekening" />
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 11 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<label for="bank">Bank</label>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<select name="bank" class="required" >
        <option></option>
        <option value="Mandiri">Mandiri</option>
        <option value="BNI">BNI</option>
        <option value="CIMB">CIMB</option>
        <option value="BCA">BCA</option>
        <option value="Bank Jabar">Bank Jabar</option>
        <option value="Danamon">Danamon</option>
        <option value="BRI">BRI</option>
        <option value="Permata">Permata</option>
        </select>
    		</div> 
    	</div>
    </div>

    <div class="row">
    	<!-- 10 -->
    	<div class="col-md-2">
    		<div class="bagan">
    			<input type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/></a>
    		</div> 
    	</div>

    	<div class="col-md-4">
    		<div class="bagan">
    			<a href="index.php" class="btn btn-sm btn-primary">Kembali</a>
    		</div> 
    	</div>
    </div>

     <hr>
     
    </form>
                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->


	<footer>
    <div class="row">
            <div class="keterangan">
                <div class="col-md-1">  
                </div>
                <div class="col-md-3">
                    <p><center><h3>Tentang kami</h3></center></p>
                    <hr>
                    <p><center><h4>Brinocy.co</h4></center></p>
                </div>
                <div class="col-md-3">
                    <p><center><h3>Alamat</h3></center></p>
                    <hr>
                    <p><center><h4>Brinocy.co</h4></center></p>
                </div>
                <div class="col-md-4">
                    <p><center><h3>Sosial Media</h3></center></p>
                    <hr>
                    <p><center><h4>Brinocy.co</h4></center></p>
                </div>
                <div class="col-md-2">  
                </div>
            </div>
        </div>
        <hr>
        <p align="center">CopyRight &copy; 2016 <a href="http://twitter.com/waloonnn">Mochamad Syawalu Rifa'i</a>. ALL Right Reserved</p>
    </footer>
</body>
</html>