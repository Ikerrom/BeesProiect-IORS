<?php
	session_start();
	unset($_SESSION['erablitzailea_a_g']);
	session_write_close();
	header("Location:login.php")
?>
