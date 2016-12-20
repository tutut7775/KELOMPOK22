<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, ANda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$idMerek = $_GET['id_merek'];
	$queryHapus = mysql_query("DELETE FROM tbl_merek WHERE id_merek='$idMerek'");
	
	if ($queryHapus) {
		echo "<script> alert ('Data merek Behasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
	} else {
		echo "<script> alert('Data Merek Gagal Dihapus '); window.location = '$admin_url'+'adminweb.php?module=edit_merek&id_merek='+'$idMerek';>/script>";
		}
	}


	?>
	
