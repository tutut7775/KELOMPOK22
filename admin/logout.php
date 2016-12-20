<?php
  session_start();
  session_destroy();
  echo "<script>alert('Kamu telah keluar dari halaman administrator'); window.location = '../admin/index.php'</script>";

?>
