
		<html>					
			<head>  <!-- todos los scripts y los links para el cabezado de la pagina -->
				<meta charset="utf-8">
 				<meta name="viewport" content="width=device-width, initial-scale=1">
  				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="css.css">
				<title>ERLETE</title>		<!-- Titulo de la Pagina(Encabezado) -->
				<link rel="shortcut icon" href="resources/images/web_imges/bee.ico" type="image/x-icon">
				<link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">



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
					a traves de las distintas paginas que tenemos, Your Account,
					Booking,About us, Log out -->
					    <?php
							if (isset($_SESSION['erablitzailea_a_g'])) 
							{
						?>
						<form action="account.php">
							<input class="buttonT" type="submit" value="YOUR ACCOUNT"/>
						</form>

						<form action="booking.php">
							<input class="buttonT" type="submit" value="BOOKING"/>
						</form>

						<form action="about.php">
								<input class="buttonT" type="submit" value="ABOUT US"/>
							</form>

						<form action="singout.php">
							<input class="buttonT" type="submit" value="LOG OUT"/>
						</form>

						

						<?php
						 /**
						 Si no esta logeado en la pagina que solo puedas acceder 
						 al index, al about us o a la pagina de iniciar sesion 
 							*/
							}else{
							?>
							<form action="about.php">
								<input class="buttonT" type="submit" value="ABOUT US"/>
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

						<!-- HTML -->

			<div class="texttotal">

				<div class="textstyle">	
										<!-- DIV para la parte izquierda de la pagina principal -->
										<!-- Parte de la informacion del index -->

					<p>We are the Erlete association, our goal is to help beekeepers with the extraction of honey, through our extractor which is located in our premises, you can find us in Axpe and ask us any kind of doubts you have about this.
					The association was created by a group of young entrepreneurs with the desire of  not to let the bees die.
					With other eight men and women, the founding beekeepers of the Erlete association are Aitor Unzueta, Urdaspal Alberdi , Félix Zabarte,Iñigo Mendibil, Hegoi Escudero, Inazio Uruburu and Roberto Ardanza.
					</p>	
					
							

											<!-- Div para darle el tamaño a la imagen y que cuando minimizes 
											el tamaño de la pagina la imagen se vaya minimizando tambien -->
		
							<div class="carousel-inner">
						      <div class="item active">
						       <img src="resources/images/web_imges/erlete1.jpg" >
						      </div>
						  </div>

						        
				 	
		

				
					<p class="header">
												<!-- Parte de Entrevista a los creadores de Erlete -->
												<!-- De donde viene la idea y porque decidieron crear Erlete -->


						Here's where our idea comes from:
					</p>	
					<p>
						<i><u>Felix:</u></i> 
						<br>I've been a partner of a Usurbil eztiola for two years. The experience has been good and taking the model there, we go down that road. There are fifteen of us in the association.
							<br>
							<br>

						<i><u>Iñigo:</u></i> 
						<br>We saw that in Gipuzkoa there are two small coughs underway, in Usurbil and Bidasoa, and now they have also just opened in Zaldibia. Local beekeepers can extract honey into honey in an appropriate and orderly manner. Without buying all the necessary gadgets, all in common. We convened an assembly through the magazine of the association of beekeepers of Bizkaia, in Elorrio, and we appeared fifteen. Coincidentally, all of Durango, even if there are more beekeepers in other areas than here.
							<br>
							<br>
						<i><u>Hegoi:</u></i>
						<br>Given the atmosphere and interest that was created, we registered the association to be for the region, extended forward to the beekeepers of the Duranguesado.

						<br><br>

											<!-- Mapa Google -->
											<!-- El mapa que sale en la parte inferior izquierda de la pagina index,
											con su altura y su ancho, esta se podra agrandar si clickas dentro de el,
											mismo funcionamiento con la parte de minimizar -->



					<div id="googleMap" style="width:100%;height:400px;"></div>

					<script>
						function myMap() {
						var mapProp= {
						  center:new google.maps.LatLng(43.1159933,-2.6002891),
						  zoom:17,
						};
						var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
						}
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCom7rhTlNke8sWXuKjpc-sLbyUiuh03mY&callback=myMap"></script>

						<br><br><br>

				</div>

				<div class="textstyle">			<!-- DIV para la parte derecha de la pagina principal -->

															<!-- Informacion -->

					<p>
						
					Bees are said to pollinate 80% of plants. Therefore, they do a very important job. The bee demands care; there are diseases that, if not treated, kill the bee. In recent years, the vespa velutine wasp, coming or brought from Asia, has also appeared and hurts.
					<br><br>

					
					<!-- HTML -->
					<!-- Toda la parte del carousel del index(parte derecha de la pagina)
					el tamaño de las imagenes, que se deslizen al darle a los botones,  y tambien que 
					se vayan minimizando con la pagina -->

						  <div id="myCarousel" class="carousel slide" data-ride="carousel">
						    <!-- Indicators -->
						    <ol class="carousel-indicators">
						      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						      <li data-target="#myCarousel" data-slide-to="1"></li>
						      <li data-target="#myCarousel" data-slide-to="2"></li>
						    </ol>

						    <!-- Tamaño de las imagenes  -->
						    <div class="carousel-inner">
						      <div class="item active">
						        <img src="resources/images/web_imges/erlete3.jpg" >
						      </div>

						      <div class="item">
						        <img src="resources/images/web_imges/erlete5.jpg" >
						      </div>
						    
						      <div class="item">
						        <img src="resources/images/web_imges/erlete4.jpg" >
						      </div>
						    </div>

						    <!-- Controles para ir a la imagen de la derecha o izquierda -->
						    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						      <span class="glyphicon glyphicon-chevron-left"></span>
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" data-slide="next">
						      <span class="glyphicon glyphicon-chevron-right"></span>
						      <span class="sr-only">Next</span>
						    </a>
						  </div>

					<br><br><br>
										<!-- Informacion -->

					In addition, globalization has only been harm to the bee: insecticides, pesticides, mud disease, vespa velutin... When I was young there was no professional beekeeping, but the bees were in the forest because they had a much more suitable environment. Today, the only way to resist is to unite the little beekeepers. In addition, the Administration is interested in having ten beekeepers, each with lots of bees, to keep revenue under control.

					<br><br><br>
					
											<!-- Video de Youtube -->
											<!--  la altura y el ancho del video 
											ademas tiene el mismo funcionamiento que las imagenes, 
											al minizar la pagina se va minimizando tambien -->


					<iframe style="width:43vw ;height:45vh; ;" src="https://www.youtube.com/embed/9lqKwL2hKRM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					<div id="googleMap" style="width:100%;height:400px;"></div>
				</div>
			</div>



			</body>
		</html>
