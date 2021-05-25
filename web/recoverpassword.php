<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css.css">
</head>
	
	<body style="margin:auto;">
		
		<div class="logindiv"> 		<!-- Div para poder meter el dni y la contraseña de cada usuario  -->
			<p class="logintop">Forgot Password</p>
		<form action="send_password_recovery.php" method="POST">	
			<div class="formdiv">								<!-- parte del dni -->
				<input class="inputlogin" type="text" name="dni" placeholder="DNI">
			<!-- parte de la contraseña  -->
				<input class="inputlogin" type="text" name="email" placeholder="Gmail">
				
				<input class="buttonSub" type="submit" value="Send Email">			<!-- boton para enviar  -->
			</div>
		</form>
				<br>
					<?php
					session_start(); /* para el inicio de sesion */
							if (isset($_GET['incorrecto'])) {
								$incorrecto = $_GET['incorrecto'];
							}else{
								$incorrecto="no";
							}

							if ($incorrecto == "si") {
								?>
								<p style="color:red; font-size: 2vh;">Wrong values.</p>
								<?php
							}	

							if (isset($_SESSION['erablitzailea_a_g'])) 
							{
								$user = $_SESSION['erablitzailea_a_g'];
								echo "You are already logged";
							}
					?>
		</div>

	</body>
</html>
