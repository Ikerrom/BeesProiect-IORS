<?php
		/* Para que al darle al submit en your account
		 la imagen se guarde y se cambie, guarda
		 la direccion de la imagen en la base de datos */
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
		$result=mysqli_query($link, "UPDATE personas SET Foto = '$dir' WHERE dni = '$dni'");   /* Update para guardar en la base de datos 
																								  la nueva imagen de perfil*/
		header("Location:account.php");
		}
?>