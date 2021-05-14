				<!-- PHP -->
<?php

											//Conexion a la base de datos//
		function ConnectDataBase()
		{
			if (!($lotura=mysqli_connect("localhost","root","")))
			{
			echo "There is an error connecting the server.";
			exit();
			}
			if (!mysqli_select_db($lotura,"bees_project"))
			{
			echo "There is an error selecting the DB.";
			exit();
            }
            
			return $lotura;
		}
?>