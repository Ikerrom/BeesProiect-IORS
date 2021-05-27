<?php

/* Codigo para comprobar toda la parte del login */
	include("test_connect_db.php");
	include("test_input.php");
	$user = $_POST["Usuario"]; /* manda el usuario metido a traves del metodo POST */
	$password = $_POST["Password"];	/* mandala contraseña metida a traves del metodo POST */
	$safe_user = test_input($user);
	$safe_password = test_input($password);
	$link =  ConnectDataBase(); 
	/* conecta con la base de datos */
	$stmt = $link->prepare('SELECT dni,contraseña FROM personas WHERE dni = ? and contraseña = ?');
	/* Comprueba si el dni y contraseña 
	es la misma que la de la base de datos */
	$stmt->bind_param('ss', $safe_user,$safe_password);
	$stmt->execute();
	$result = $stmt->get_result();

	if (mysqli_num_rows($result) == 0)
	{
		header("Location:login.php?incorrecto=si"); /*	Si no coinciden salta un error  */
	}else{
		session_start();
		$_SESSION['erablitzailea_a_g'] = $safe_user;	/* Si coinciden le manda al index */
		header("Location:index.php");
	}
?>
