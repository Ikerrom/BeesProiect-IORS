		<html>					
			<head>  		<!-- todos los scripts y los links para el cabezado de la pagina -->
				<meta charset="utf-8">
 				<meta name="viewport" content="width=device-width, initial-scale=1">
  				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="css.css"/>
				<title>About</title>					<!-- Titulo de la Pagina(Encabezado) -->
				<link rel="shortcut icon" href="resources/images/web_imges/bee.ico" type="image/x-icon">
				<link rel="preconnect" href="https://fonts.gstatic.com"/>
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"/>



			</head>
			<body>
				<div class="title">		
					<!-- PHP -->
					<!-- Para el inicio de sesion que compruebe a traves de 
					la base de datos si todos los datos son correctos -->
					    <?php
					    session_start();
					    if (isset($_SESSION['erablitzailea_a_g'])) {
					    include("test_connect_db.php");
						$dni = $_SESSION['erablitzailea_a_g'];
						$link =  ConnectDataBase();
						$result=mysqli_query($link, "select nombre,Foto from personas where dni = '$dni'"); 
						$imprimir = mysqli_fetch_array($result);
							?>
							<!-- En la parte del encabezado codigo para 
							que salga la foto del perfil, el dni y el nombre -->
								<div class="perfil">
									<img class="perfilimage" src="<?php echo $imprimir['Foto'];?>">
									<div class="perfiltext">
											<p>User: <?php echo $imprimir['nombre'];?></p>
											<p>DNI: <?php echo $dni;?></p>
									</div>
								</div>

							<?php
							}
							?>
						<p class="titletext">ERLETE</p>
				</div>
				
				<div class="topbar">
										<!-- PHP -->
					<!-- Si esta con la sesion iniciada que pueda navegar 
					a traves de las distintas paginas que tenemos, HOME,Your Account,
					Booking y  Log out -->
					    <?php
							if (isset($_SESSION['erablitzailea_a_g'])) 
							{
						?>
						<form action="index.php">
							<input class="buttonT" type="submit" value="HOME"/>
						</form>

						<form action="account.php">
							<input class="buttonT" type="submit" value="YOUR ACCOUNT"/>
						</form>

						<form action="booking.php">
							<input class="buttonT" type="submit" value="BOOKING"/>
						</form>
						<form action="singout.php">
								<input class="buttonT" type="submit" value="LOG OUT"/>
							</form>
						<?php
							}else{
							?>

							<form action="index.php">
									<input class="buttonT" type="submit" value="HOME"/>
							</form>

							<form action="login.php">
								<input class="buttonT" type="submit" value="LOG IN"/>
							</form>			
							<?php

							}

						?>

					
	
				</div>
				
				<div class="arrowdiv">
					<img src="resources/images/web_imges/arrow.gif" class="arrowimg">
				</div>

			<div class="texttotal">
													<!-- HTML -->
				<div class="textstyle">		<!-- DIV parte izquierda de la pagina del About Us -->
					<p class="header">Why did we start working in beekeeping? Where do we sell honey?</p>
							<br>
							<br>
							<p><i><u>Aitor: </u></i></p> The first to start in this world was my father, I started because since I was a child I have had to take care of the bees. I share honey among friends and acquaintances.
							<br><br>
							<p><i><u>Urdaspal: </u></i></p> It's been over 5 years since I had my first hives. The little honey extracted has been for home or for some detail.
							<br><br>
							<p><i><u>Ignacio: </u></i></p> Roberto and I have been friends since childhood, and it's been 35 years since we started. We sell in the area of Durango, in the square there, and among friends.
							<br><br>
							<p><i><u>Hegoi: </u></i></p> This is my third year and, So far I've eaten more honey than I produce.
							<br><br>
							<p><i><u>Iñigo: </u></i></p> I've been here six to seven years. At work [he's a firefighter] we picked up a lot of bees and since people didn't know what to do, I started taking them home. The honey I take out is for home or for friends. I also take propolis, because it's very good for your health.
							<br><br>
							<p><i><u>Felix: </u></i></p> A beekeeper left several hives in Elorrio. I called and started working with him in 2014. Last year I started selling honey at the local market and I've done well. I also sell honey, propolis and  pollen. It's a nice experience and I'm comfortable.
							<br><br>

				</div>

				<div class="textstyle">			<!-- DIV parte derecha de la pagina del About Us -->

						<br>




						<br><br>
						<p>						
						We are currently 14 members of the association, and our sole purpose is to help each other to extract honey, improve the environment for bees, and help them not become extinct.
						<br><br>	
						Don't hesitate to contact us in case of any questions.
						</p>

						<br><br>

							<!-- Div para darle el tamaño a la imagen y que cuando minimizes 
							el tamaño de la pagina la imagen se vaya minimizando tambien -->

					<div id="myCarousel" class="carousel slide" data-ride="carousel">

								
							<div class="carousel-inner">
						      <div class="item active">
						       <img src="resources/images/web_imges/asociacion.jpg" width="500" height="300">
						      </div>
						  </div>
						 </div>


					
				</div>
			</div>
			<br><br><br>	
			<div class="texttotal"> 	<!-- Div para darle el tamaño a las imagenes de la parte inferior 
											 y la funcion de minimizar,
											 ademas de poner tambien la informacion necesaria por si algun cliente 
											 necesita ponerse en contacto con nosotros -->
						<img src="resources/images/web_imges/telefono.png" style=" width:9%; height:1%;"> <p><font color ="white">Call us at <br>  94 751 34 12</font></p>
						<br>
						<br>
						<img src="resources/images/web_imges/correo.png" style="width:9%; height:1%;"> <p><font color ="white">Contact with us at <br>   ErleteAxpe@gmail.com </font></p>
						<br>
						<br>
						<img src="resources/images/web_imges/ubicacion.png" style="width:9%; height:1%;"><p><font color ="white"> We are in axpe <br>  San Juan Plaza, 1, 48291 Axpe, Bizkaia </font> </p>
			</div>




	</body>

</html>
