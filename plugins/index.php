<?php require_once("lib/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TOKO ONLINE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="#" type="images/x-icon">

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
							<li><a class="brand" href="index.php"><img src="images/logoGetShopBiru.png" alt="Logo"></a></li>
						</ul>	
					</div>
				</div>

				<div class="col-md-10">
					<div class="nav-container2">
						<ul class="nav nav-justified">
							<li><a href="index.php">HOME</a></li>
							<li><a href="#">menu 2</a></li>
							<li><a href="#">menu 3</a></li>
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

	<div id="wrapper">
			<div class="container">
				<div class="row">
					
	                	<?php
                    	$sql = mysql_query( "SELECT * FROM barang ORDER BY br_id DESC limit 12");
                   		while($data = mysql_fetch_array($sql)){
                    	?>
        				<div class="col-md-3">
          					<div class="icons-box">
                        		<div class="title"><h3><?php echo $data['br_nm']; ?></h3></div>
                       			<img src="admin/upload/<?php echo $data['br_gbr']; ?>" />
								<div><h3>Rp.<?php echo number_format($data['br_hrg'],2,",",".");?></h3></div>
								<div class="clear"><a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>
							</div>
        				</div>
                		  <?php 
                		  
                		  }

                		  ?>
              			

              		
      			</div>

				<!-- end: Row -->
			</div>
		</div>


	<footer>
		CopyRight &copy; 2016 <a href="#">ADMIN</a>. ALL Right Reserved
	</footer>
</body>
</html>