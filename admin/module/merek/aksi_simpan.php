<?php 
session_start ();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$namaMerek = $_POST['namaMerek'];
	$querySimpan = mysql_query ("INSERT INTO tbl_merek (nama_merek) VALUES ('$namaMerek')");
	
	if ($querySimpan) {
		echo "<script> alert('Data Merek Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
	} else {
		echo "<script> alert('Data Merek Gagal Dimasukan ');window.location = '$admin_url'+'adminweb.php?module=tambah_merek'; </script>";
		}
	}
?> 
