  <!DOCTYPE html>
  <html>
  <head>
  			<link rel="stylesheet" href="css.css">
  	<title>Account</title>
  </head>
  <body>
    <?php
			    session_start();
			    if (isset($_SESSION['erablitzailea_a_g'])) {
			    include("test_connect_db.php");
				$dni = $_SESSION['erablitzailea_a_g'];
				$link =  ConnectDataBase();
				$result=mysqli_query($link, "select nombre,apellido,gmail,dinero_pagar,dinero_cuenta from Personas where dni = '$dni'"); 
				$imprimir = mysqli_fetch_array($result);

				?>
					<div class="perfil">
							<p class="textstyle">DNI:</p>
						<?php  
							echo $dni;
						?>	
					</div>
					<div class="perfil">
							<p class="textstyle">Name:</p>
						<?php  
							echo $imprimir['nombre'];
						?>	
					</div>
					<div class="perfil">
							<p class="textstyle">Surname:</p>
						<?php  
							echo $imprimir['apellido'];
						?>	
					</div>
					<div class="perfil">
							<p class="textstyle">Gmail:</p>
						<?php  
							echo $imprimir['gmail'];
						?>	
					</div>
					<div class="perfil">
							<p class="textstyle">To pay:</p>
						<?php  
							echo  $imprimir['dinero_pagar'];
						?>	
					</div>
					<div class="perfil">
							<p class="textstyle">Money in account:</p>
						<?php  
							echo $imprimir['dinero_cuenta'];
						?>	
					</div>
				<?php

				} else{
					echo "You are not logged in";
				}
	?>
  </body>
  </html>


