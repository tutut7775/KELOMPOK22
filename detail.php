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

				<h2><i class="ico-stats ico-white"></i>Keranjang Belanja</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container"> 
			<!-- start: Table -->
            <div class="title"><h3>Detail Keranjang Belanja</h3></div>

<table class="table table-hover table-condensed">
<tr>
					<th><center>No Pembelian</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Opsi</center></th>
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
                <td><center><?php echo $data['nama_barang']; ?></center></td>
                <td><center><?php echo number_format($val); ?></center></td>
                <td><center><?php echo number_format($data['harga_barang']); ?></center></td>
                <td><center><?php echo number_format($jumlah_harga); ?></center></td>
                <td><center><a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-success">Tambah</a> <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-warning">Kurang</a> <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-danger">Hapus</a></center></td>
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>  
                         <?php
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="index.php" class="btn btn-info btn-lg">&laquo; Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="index.php" class="btn btn-info">&laquo; CONTINUE SHOPPING</a>
						<a href="checkout.php?total='.$total.'" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
						</div></p>
					';
				}
				?>

</table>
			
				
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
		<p align="center">CopyRight &copy; 2016 <a href="">KELOMPOK 22</a>. ALL Right Reserved</p>
	</footer>
</body>
</html>
