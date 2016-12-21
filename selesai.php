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

			<!-- start: Table -->
                 <div class="table-responsive">
                 <div class="title"><h3>Checkout Selesai</h3></div>
                 <div class="hero-unit">Selamat Anda telah berhasil checkout, silahkan catat info di bawah ini..</div>
                 <div class="hero-unit">
    <?php
	include "lib/config.php";
	include "lib/koneksi.php";
	
		
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$kodepos = $_POST['kodepos'];
		$notelfon = $_POST['notelfon'];
		$norekening = $_POST['norekening'];
		$namarekening = $_POST['namarekening'];
		$bank = $_POST['bank'];
		
		$querySimpan = mysql_query ("insert into orderdetails ( nama, email, alamat, kota, kodepos, notelfon, norekening, namarekening, bank) 
				VALUES (  '$nama', '$email', '$alamat', '$kota' , '$kodepos', '$notelfon', '$norekening', '$namarekening', '$bank')");
				
				if ($querySimpan) {
					echo "<script> alert ('DATA PRODUK BERHASIL MASUK'); window.location = '$admin_url + 'checkout.php' ;</script>";
				} else {
					echo "<script> alert ('DATA PRODUK GAGAL MASUK'); window.location = 'detail.php';</script>";
				}
			if($_POST['finish']){
				session_destroy();
				echo 'Terima kasih Anda sudah berbelanja di Toko Online kami dan berikut ini adalah data yang perlu Anda catat.';
				echo '<p>Total biaya untuk pembelian Produk adalah Rp. '.$_POST['total'].',- dan biaya bisa di kirimkan melalui Rekening Bank Mandiri cabang Cikarang dengan nomor rekening 123-234-56347-8 atas nama Mochamad Syawalu Rifai.</p>';
				echo '<p>Dan barang akan kami kirim ke alamat di bawah ini:</p>';
				echo '<p>Nama Lengkap : '.$_POST['nama'].'<br>';
                echo 'Alamat : '.$_POST['alamat'].'<br>';
                echo 'Kode Pos : '.$_POST['kodepos'].'<br>';
                echo 'Kota : '.$_POST['kota'].'<br>';
                echo 'No Telepon : '.$_POST['notelfon'].'<br>';
                echo 'Total Belanja : Rp. '.$_POST['total'].',-</p>';
			}else{
				header("Location: index.php");
			}
			?>
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
		<p align="center">CopyRight &copy; 2016 KELOMPOK22 BRINOCY.CO. ALL Right Reserved</p>
	</footer>
</body>
</html>
