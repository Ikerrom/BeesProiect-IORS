  <!DOCTYPE html>
  <html>
  <head>
  <link rel="stylesheet" href="css.css">
  	<title>Account</title>

  	<style type="text/css">
  			.campoacc{
				width: 20vw;
				height: 15vh;
				color: #595959;
				font-weight: bold;
				text-align: center;
				float: right;

			}

			.textstyleacc{
				font-size: 150%;

			}
			.bgacc{
				display:flex;
				flex-direction:row;
				justify-content: flex-end;
				background-color: #FAD002;
				width: 55%;
				margin:auto;

			}

  	</style>
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
				<div class="bgacc">
					<div class="photoacc">
						<img src="resources/Images/perfil.png">
					</div>
					<div class="campoacc">
							<p class="textstyleacc">DNI:</p>
						<?php  
							echo $dni;
						?>	
					</div>
					<div class="campoacc">
							<p class="textstyleacc">Name:</p>
						<?php  
							echo $imprimir['nombre'];
						?>	
					</div>

				</div>
				<div class="bgacc">
					<div class="campoacc">
							<p class="textstyleacc">Surname:</p>
						<?php  
							echo $imprimir['apellido'];
						?>	
					</div>
					<div class="campoacc">
							<p class="textstyleacc">Gmail:</p>
						<?php  
							echo $imprimir['gmail'];
						?>	
					</div>
				</div>
				<div class="bgacc">
					<div class="campoacc">
							<p class="textstyleacc">To pay:</p>
						<?php  
							echo  $imprimir['dinero_pagar'] . "$";
						?>	
					</div>
					<div class="campoacc">
							<p class="textstyleacc">Acc Money:</p>
						<?php  
							echo $imprimir['dinero_cuenta']. "$";
						?>	
					</div>
				</div>
					
				<?php

				} else{
					echo "You are not logged in";
				}
	?>
  </body>
  </html>


