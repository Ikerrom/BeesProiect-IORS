<?php
/*Funcion para conectar con la base de datos bees_project*/
		function ConnectDataBase()
		{
			if (!($lotura=mysqli_connect("localhost","root","")))
			{
			echo "There is an error connecting the server.";
			exit();
			}
			if (!mysqli_select_db($lotura,"bees_project"))
			{
			/*Si no se conecta printea el siguiente mensaje */
			echo "There is an error selecting the DB."; 
			exit();
            }
            
			return $lotura;
		}
?>