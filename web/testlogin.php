<?php
	include("test_connect_db.php");
	$user = $_POST["Usuario"];
	$password = $_POST["Password"];
	$link =  ConnectDataBase();

	$result=mysqli_query($link, "select dni,contraseña from Personas where dni = '$user' and contraseña = '$password'");

	if (mysqli_num_rows($result) == 0)
	{

		header("Location:login.php?incorrecto=si");

	}else{
		session_start();
		$_SESSION['erablitzailea_a_g'] = $user;
		header("Location:index.php");
	}
?>
