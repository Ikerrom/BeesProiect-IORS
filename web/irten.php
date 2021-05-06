<?php
	session_start();
	unset($_SESSION['dni']);
	session_write_close();
	header("Location:login.php")
?>