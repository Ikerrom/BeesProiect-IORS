<?php
		function ConnectDataBase()
		{
			if (!($lotura=mysqli_connect("localhost","root","")))
			{
			echo "There is an error connecting the server.";
			exit();
			}
			if (!mysqli_select_db($lotura,"db"))
			{
			echo "There is an error selecting the DB.";
			exit();
            }
            
			return $lotura;
		}
?>