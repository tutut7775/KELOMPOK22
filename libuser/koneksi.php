<?php
$server = "localhost";
$username = "root";
$passuser = "";
$database = "brinocy";

mysql_connect($server,$username,$passuser) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
