<?php
include "../lib/config.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
   <!-- jvectormap -->
        <link rel="stylesheet" href="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="adminweb.php?module=home"> <i class="fa fa-bars"></i> <span>HOME</span></a>
                </li>
                <li>
                    <a href="adminweb.php?module=kategori"> <i class="fa fa-bars"></i> <span>Kategori</span></a>
                </li>
                <li>
                    <a href="adminweb.php?module=produk"><i class="fa fa-th"></i> <span>Produk</span></a>
                </li>
                <li>
                    <a href="adminweb.php?module=produk"><i class="fa fa-money"></i> <span>Pesanan</span></a>
                </li>
                <li>
                    <a href="../index.php"><i class="fa fa-th"></i> <span>website online shop</span></a>
                </li>
                <li>
                    <a href="logout.php"><i class="fa fa-power-off"></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">

                        <?php
            if ($_GET['module'] == 'home') {
                include "module/home/home.php";
            } elseif ($_GET['module'] == 'kategori') {
                include "module/kategori/list_kategori.php";
            } elseif ($_GET['module'] == 'tambah_kategori') {
                include "module/kategori/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_kategori') {
                include "module/kategori/form_edit.php";
            }elseif ($_GET['module'] == 'biaya') {
                include "module/biaya/list_biaya.php";
            } elseif ($_GET['module'] == 'tambah_biaya') {
                include "module/biaya/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_biaya') {
                include "module/biaya/form_edit.php";
            }elseif ($_GET['module'] == 'produk') {
                include "module/produk/list_produk.php";
            } elseif ($_GET['module'] == 'tambah_produk') {
                include "module/produk/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_produk') {
                include "module/produk/form_edit.php";
            }
            else {
                 include "module/home/home.php";
            }
            ?>  

                        <hr>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">TAB MENU</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

          

</body>

</html>
<?php } ?>