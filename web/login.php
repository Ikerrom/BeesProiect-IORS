<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css.css">
	<title>Login</title>
	<link rel="shortcut icon" href="resources/images/web_imges/bee.ico" type="image/x-icon">
			<script>
				var even=1;
			function show(){
				if (document.getElementById('password').type == "text") {
					document.getElementById('password').type = "password";
				}else{
					document.getElementById('password').type = "text";
				}
				
			}


		</script>
</head>
	
	<body style="margin:auto;">
		
		<div class="logindiv"> 		<!-- Div para poder meter el dni y la contraseña de cada usuario  -->
			<p class="logintop">LOG IN</p>
		<form action="testlogin.php" method="POST">	

			<div class="formdiv">								<!-- parte del dni -->
				<input class="inputlogin" type="text" name="Usuario" placeholder="DNI">
			<!-- parte de la contraseña  -->
				<input class="inputlogin" type="password" name="Password" placeholder="Password" id="password">
				<img onclick="show()" src="resources/images/web_imges/eye.svg" style="width: 2vh; height: 2vh;">
				
				<input class="buttonSub" type="submit" value="Log In">			<!-- boton para enviar  -->
			</div>

			<div class="forgotdiv">
				<a href="recoverpassword.php" class="linkuboi">Forgot your password?</a>
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
