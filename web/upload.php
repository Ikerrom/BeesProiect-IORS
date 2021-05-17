<?php

	$dir = "resources/images/perfiles";
	$imagen =$_FILES['imagen']['name'];
	$archivo = $_FILES['imagen']['tmp_name'];
	$dir = $dir."/".$imagen;
	move_uploaded_file($archivo, $dir);

	session_start();
	if (isset($_SESSION['erablitzailea_a_g'])) {
		include("test_connect_db.php");
		$dni = $_SESSION['erablitzailea_a_g'];
		$link =  ConnectDataBase();
		$result=mysqli_query($link, "UPDATE Personas SET Foto = '$dir' WHERE dni = '$dni'"); 
		header("Location:account.php");
		}
?>