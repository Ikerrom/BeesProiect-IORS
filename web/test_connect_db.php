<?php
/*Funcion para conectar con la base de datos bees_project*/
		function ConnectDataBase()
		{
			error_reporting(0);
			if (($lotura=mysqli_connect("localhost","erlete","erlete")))
			{
				if (!mysqli_select_db($lotura,"bees_project"))
				{
				/*Si no se conecta printea el siguiente mensaje */
				echo "There is an error selecting the DB."; 
				exit();
	            }
	            error_reporting(-1);
	            return $lotura;
			}

			if (!($lotura2=mysqli_connect("localhost","root","")))
			{
				echo "There is an error connecting the server.";
				exit();
			}

			if (!mysqli_select_db($lotura2,"bees_project"))
			{
				/*Si no se conecta printea el siguiente mensaje */
				echo "There is an error selecting the DB."; 
				exit();
            }
            error_reporting(-1);
			return $lotura2;
		}
?>