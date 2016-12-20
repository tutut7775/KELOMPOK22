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

				<h2><i class="ico-stats ico-white"></i>Detail Produk</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
    	<form id="formku" action="selesai.php" method="post">              
<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            <!--<div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>-->
                    <table class="table table-hover table-condensed">
                    <tr>
                    <th><center>No</center></th>
					<th><center>Item</center></th>
					<th><center>Quantity</center></th>
					<th><center>Sub Total</center></th>
				</tr>
                    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysql_query("SELECT kode_barang, nama_barang, harga_barang FROM barang WHERE kode_barang = '$key'");
            $data = mysql_fetch_array($query);

            $jumlah_harga = $data['harga_barang'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                <tr>
                <td><center><?php echo $no ++; ?></center></td>
                <td><center><?php echo $data['nama_barang']; ?></center></td>
                <td><center><?php echo number_format($val); ?> Pcs</center></td>
                <td><center>Rp. <?php echo number_format($jumlah_harga); ?></center></td>
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>
                        <?php
				if($total == 0){ ?>
					<td colspan="4" align="center"><?php echo "Keranjang Kosong!"; ?></td>
				<?php } else { ?>
					
                        <td colspan="4" style="font-size: 18px;"><b><div class="pull-right">Total Belanja Anda : Rp. <?php echo number_format($total); ?>,- </div> </b></td>
					
			<?php	}
				?>
                </table> 
                <p><div align="right">
						<a href="detail.php" class="btn btn-success">&raquo Details Keranjang &laquo</a>
						</div></p>
            </div>
      		<!-- start: Row -->
            
      		<div class="row">
            <div class="col-sm-6">
                    <?php                  
			$query = mysql_query( "SELECT * FROM barang WHERE kode_barang='$_GET[kd]'");
			$data  = mysql_fetch_array($query);
			?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
                    <div class="hero-unit" style="margin-left: 20px;">
                    <table>
                    <tr>
                        <td rowspan="7"><img src="admin/upload/<?php echo $data['gambar_barang']; ?>" height="346" width="447"/></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><h3><?php echo $data['nama_barang']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td size="200"><h3>Harga</h3></td>
                        <td><h3>:</h3></td>
						<td><div><h3>Rp.<?php echo number_format($data['harga_barang'],2,",",".");?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Stock</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php if ($data['stok_barang'] >= 1){
	                           echo '<strong style="color: blue;">In Stock</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Out Of Stock</strong>';	
                                }; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Berat barang</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php echo $data['berat_barang']; ?> Gram</h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Keterangan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php echo $data['keterangan_barang']; ?></h3></div></td>
                        </tr>
					<!--	<p>
						
						</p> -->
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
						<td><div class="clear"> <a href="cart.php?act=add&amp;barang_id=<?php echo $data['kode_barang']; ?>&amp;ref=detailproduk.php?kd=<?php echo $data['kode_barang'];?>" class="btn btn-lg btn-danger">Beli &raquo;</a></div></td>
                        </tr>
     
                    </table>
                    </div>
                    <!--</div> -->
        		<!--</div> -->
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
				</div>
				
                </div>
			</div>
			<!--end: Row-->
	</form>
		</div>
		<!--end: Container-->
		
			<hr>
		
		</div>
		<!--end: Container-->	

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
