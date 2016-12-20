<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, ANda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$idMerek = $_POST['id_merek'];
	$queryHapus = mysql_query("DELETE FROM tbl_merek WHERE id_merek='$idMerek'");
	
	if ($queryHapus) {
		echo "<script> alert ('Data Merek berhasil dihapus'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
	} else {
		echo "<script> alert('Data Merek gagal dihapus '); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
		}
	}
	?>