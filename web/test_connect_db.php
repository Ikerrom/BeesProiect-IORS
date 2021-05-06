<?php
		function connectDataBase()
		{
			if (!($lotura=mysqli_connect("localhost","root","dam1")))
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