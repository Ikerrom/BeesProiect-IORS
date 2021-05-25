<?php
		/* Para que al darle al submit en your account
		 la imagen se guarde y se cambie, guarda
		 la direccion de la imagen en la base de datos */
	$dir = "resources/images/perfiles";
	$imagen =$_FILES['imagen']['name'];
	$archivo = $_FILES['imagen']['tmp_name'];
	$dir = $dir."/".$imagen;
	$imageFileType = strtolower(pathinfo($dir,PATHINFO_EXTENSION));



	session_start();
	if (isset($_SESSION['erablitzailea_a_g'])) { 
		if ($dir == "resources/images/perfiles/") {
			header("Location:account.php");
		}else{
			if ($_FILES['imagen']["size"] > 5000000) {
				header("Location:account.php");
			}else{
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
					header("Location:account.php");
				}else{
					
						include("test_connect_db.php");
						$dni = $_SESSION['erablitzailea_a_g'];
						$link =  ConnectDataBase();
						move_uploaded_file($archivo, $dir);
						$result=mysqli_query($link, "UPDATE personas SET Foto = '$dir' WHERE dni = '$dni'");   /* Update para guardar en la base de datos 
																													  la nueva imagen de perfil*/
						header("Location:account.php");
					}
				}
			}
		}
?>