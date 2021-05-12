<?php
	include("test_connect_db.php");
	include("test_input.php");
	$user = $_POST["Usuario"];
	$password = $_POST["Password"];
	$safe_user = test_input($user);
	$safe_password = test_input($password);
	$link =  ConnectDataBase();
	$stmt = $link->prepare('SELECT dni,contraseña FROM Personas WHERE dni = ? and contraseña = ?');
	$stmt->bind_param('ss', $safe_user,$safe_password);
	$stmt->execute();
	$result = $stmt->get_result();

	if (mysqli_num_rows($result) == 0)
	{
		header("Location:login.php?incorrecto=si");
	}else{
		session_start();
		$_SESSION['erablitzailea_a_g'] = $safe_user;
		header("Location:index.php");
	}
?>
