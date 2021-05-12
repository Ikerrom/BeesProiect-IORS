<?php
	include("test_connect_db.php");
	$user = $_POST["Usuario"];
	$password = $_POST["Password"];
	$link =  ConnectDataBase();
	$stmt = $link->prepare('SELECT dni,contraseña FROM Personas WHERE dni = ? and contraseña = ?');
	$stmt->bind_param('ss', $user,$password);
	$stmt->execute();
	$result = $stmt->get_result();

	if (mysqli_num_rows($result) == 0)
	{
		header("Location:login.php?incorrecto=si");
	}else{
		session_start();
		$_SESSION['erablitzailea_a_g'] = $user;
		header("Location:index.php");
	}
?>
