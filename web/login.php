<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="css.css">
	<body style="margin:auto;">
		
		<div class="logindiv"> 		<!-- Div para poder meter el dni y la contraseña de cada usuario  -->
			<h2>Hasi Sesioa</h2>
		<form action="testlogin.php" method="POST">			<!-- Metodo POST  -->
			<label for="fname">First name:</label><br> 		<!-- parte del dni -->
			<input type="text" name="Usuario"><br>
			<label for="lname">Password:</label><br>		<!-- parte de la contraseña  -->
			<input type="password" name="Password"><br><br>
			<input type="submit" value="Submit">			<!-- boton para enviar  -->
		</form> 
				<br>
					<?php
					session_start(); /* para el inicio de sesion */
						
						if (isset($_SESSION['erablitzailea_a_g'])) 
						{
							$user = $_SESSION['erablitzailea_a_g'];
							echo "Ongi Etorri: $user";
						}
					?>
		</div>
	</body>
</html>
