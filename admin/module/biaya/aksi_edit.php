<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, ANda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$idBiaya = $_POST['id_biaya_kirim'];
	$biaya = $_POST['biaya'];
	$kota = $_POST['kota'];
	$queryEdit = mysql_query("UPDATE tbl_biaya_kirim SET kota='$kota',biaya='.$biaya.' WHERE id_biaya_kirim='$idBiaya'");
	
	if ($queryEdit) {
		echo "<script> alert ('Data Biaya Behasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
	} else {
		echo "<script> alert('Data Biaya Gagal Diubah '); window.location = '$admin_url'+'adminweb.php?module=edit_biaya&id_biaya_kirim='+'$idBiaya';>/script>";
		}
	}
	?>
	