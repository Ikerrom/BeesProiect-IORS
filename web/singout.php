<?php /* Cierra sesion al presionar Sing Out */
	session_start();
	unset($_SESSION['erablitzailea_a_g']);
	session_write_close();
	header("Location:index.php")
?>
