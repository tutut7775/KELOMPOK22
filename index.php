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


			<!-- row 2 -->
			<div class="row">
				<div class="col-md-12">
					<div class="flexslider">
						<ul class="slides">
							<li><img src="images/gambar1.jpg" /> </li>
							<li><img src="images/gambar2.jpg" /> </li>
							<li><img src="images/gambar3.jpg" /> </li>
						</ul>
					</div>
				</div>	
			</div>	
		</div> 
		<!-- close container -->
	<hr>

		

		<!-- jquery (necessary for bootstrap's javascript plugins) -->
	<script src="plugins/jquery.js"></script>

	<!-- include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

	<script src="plugins/jquery.flexslider.js"></script>

	<script type="text/javascript" charset="utf-6">
		$(window).load(function() {

			$('.flexslider').flexslider({
				animation: "fade",
				easing: "swing",
				controlNav: false,
				controlsContainer: ".flex-container",
				start: function(slider) {
					$('.total-sliders').text(slider.count);
				},
				after: function(slider){
					$('.current-slide').text(slider.currentSlide);
				}
			});
		});
	</script><!-- jQuery -->
	</header>

	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Rekomendasi</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<div id="wrapper">
			<div class="container">
				<div class="row">
					
	                	<?php
                    	$sql = mysql_query( "SELECT * FROM barang where rekomendasi='Y' ORDER BY kode_barang DESC limit 12");
                   		while($data = mysql_fetch_array($sql)){
                    	?>
        				<div class="col-md-3">
          					<div class="icons-box">
                        		<div class="title"><h3><?php echo $data['nama_barang']; ?></h3></div>
                       			<img src="admin/upload/<?php echo $data['gambar_barang']; ?>" height="100" width="113" />
								<div><h3>Rp.<?php echo number_format($data['harga_barang'],2,",",".");?></h3></div>
								<div class="clear"><a href="detailproduk.php?kd=<?php echo $data['kode_barang'];?>" class="btn btn-lg btn-danger">Detail</a></div> 
							</div>
        				</div>
                		  <?php 
                		  
                		  }

                		  ?>
              			

              		
      			</div>

				<!-- end: Row -->
			</div>
		</div>
		<hr>
		
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
<<<<<<< HEAD
		<p align="center">CopyRight &copy; 2016 KELOMPOK22 BRINOCY.CO. ALL Right Reserved</p>
=======
	</footer>
</body>
</html>
