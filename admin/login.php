<?php

include "../lib/koneksi.php";


$username = $_POST['username'];
$pass = $_POST['password'];

	if (!ctype_alnum($username) OR !ctype_alnum($pass)){
	echo "<center>LOGIN GAGAL! <br>
		username atau Password Anda Tidak benar . <br>
		Atau account anda sedang diblokir.<br>";
	echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
} else{
    $login = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass'");
    $ketemu = mysql_num_rows($login);
    $r = mysql_fetch_array($login);

    if ($ketemu > 0) {
        session_start();

        $_SESSION[namauser] = $r[username];
        $_SESSION[passuser] = $r[password];

		
        header('location:adminweb.php?module=home');
    } else {
        echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar !<br>
        Atau account Anda sedang diblokir.<br>";
        echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    }
}
?>
