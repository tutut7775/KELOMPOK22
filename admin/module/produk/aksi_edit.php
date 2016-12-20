<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login<br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$idProduk = $_POST['id_produk'];
	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	
	$idKategori= $_POST['idKategori'];
	$namaBarang= $_POST['namaBarang'];
	$hargaBarang= $_POST['hargaBarang'];
	$beratBarang = $_POST['beratBarang'];
	$deskripsiBarang= $_POST['deskripsiBarang'];
	$stokBarang = $_POST['stokBarang'];
	$rekomendasi= $_POST['rekomendasi'];

	$path="../../upload/".$nama_file;

	if(empty($tmp_file)){
	$querySimpan = mysql_query("UPDATE  barang SET id_kategori='$idKategori',
		nama_barang='$namaBarang', 
		harga_barang='$hargaBarang', 
		berat_barang='$beratBarang', 
		keterangan_barang='$deskripsiBarang', 
		stok_barang='$stokBarang', 
		rekomendasi='$rekomendasi'
		WHERE kode_barang='$idProduk'");

	if($querySimpan){
		echo "<script> alert('Data Produk Berhasil Dirubah');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
	}else{
		echo "<script> alert('Data Produk Gagal Dirubah'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}

	}else{
	if ($tipe_file=="image/jpeg"||$tipe_file=="image/png") {
		if ($ukuran_file<=1000000) {
			if (move_uploaded_file($tmp_file, $path)) {

	$querySimpan = mysql_query("UPDATE  barang SET id_kategori='$idKategori', 
		nama_barang='$namaBarang', 
		harga_barang='$hargaBarang', 
		berat_barang='$beratBarang', 
		gambar_barang='$nama_file', 
		keterangan_barang='$deskripsiBarang', 
		stok_barang='$stokBarang', 
		rekomendasi='$rekomendasi'
		WHERE kode_barang='$idProduk'");
	if($querySimpan){
		echo "<script> alert('Data Produk Berhasil Dirubah');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
	}else{
		echo "<script> alert('Data Produk Gagal Dirubah'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}else{
		echo "<script> alert('Data Gambar Gagal Dirubah'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}else{
			echo "<script> alert('Data Gambar Gagal Dirubah Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}else{
			echo "<script> alert('Data Gambar Gagal Dirubah Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";

}
	
}
}
?>