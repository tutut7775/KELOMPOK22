<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login<br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$brId=$_POST['id_kategori'];
	$brNm= $_POST['nama_kategori'];
	$queryEdit = mysql_query("UPDATE kategori SET nama_kategori='$brNm' WHERE id_kategori='$brId'");
	if($queryEdit){
		echo "<script> alert('Data Kategori Berhasil Dirubah');window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
	}else{
		echo "<script> alert('Data Kategori Gagal Dirubah'); window.location = 'admin_url'+'adminweb.php?module=edit_kategori='+$brId';</script>";
	}
}

?>