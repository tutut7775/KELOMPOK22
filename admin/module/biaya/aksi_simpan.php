<?php 

session_start ();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$kota = $_POST['kota'];
	$biaya = $_POST['biaya'];
	$querySimpan = mysql_query ("INSERT INTO tbl_biaya_kirim (kota,biaya) VALUES ('$kota','.$biaya.')");
	
	if ($querySimpan) {
		echo "<script> alert('Data biaya kirim Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
	} else {
		echo "<script> alert('Data biaya kirim Gagal Dimasukan ');window.location = '$admin_url'+'adminweb.php?module=tambah_biaya'; </script>";
		}
	}
	?>