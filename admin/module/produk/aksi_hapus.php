<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, ANda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$idProduk = $_GET['id_produk'];

	$queryHapus= mysql_query("DELETE FROM barang WHERE kode_barang='$idProduk'");

	
	if ($queryHapus) {
		echo "<script> alert ('Data Barang berhasil dihapus'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
	} else {
		echo "<script> alert('Data Barang gagal dihapus '); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
		}
	}
	?>