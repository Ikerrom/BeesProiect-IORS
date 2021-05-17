		<html>					
			<head>  
				<meta charset="utf-8">
 				<meta name="viewport" content="width=device-width, initial-scale=1">
  				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="css.css"/>
				<title>ERLETE</title>
				<link rel="preconnect" href="https://fonts.gstatic.com"/>
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"/>



			</head>
			<body>
				<div class="title">
					
					    <?php
					    session_start();
					    if (isset($_SESSION['erablitzailea_a_g'])) {
					    include("test_connect_db.php");
						$dni = $_SESSION['erablitzailea_a_g'];
						$link =  ConnectDataBase();
						$result=mysqli_query($link, "select nombre,Foto from Personas where dni = '$dni'"); 
						$imprimir = mysqli_fetch_array($result);
							?>
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

						<?php
							}else{
							?>
							<form action="login.php">
								<input class="buttonT" type="submit" value="LOG IN"/>
							</form>
							<?php
							}
						?>

					
						<form action="singout.php">
							<input class="buttonT" type="submit" value="LOG OUT"/>
						</form>
				</div>


			<div class="texttotal">

				<div class="textstyle">
					<p><h2>Why did we start working in beekeeping? Where do we sell honey?</h2></p>
							<br>
							<br>
							<p><i><u>Aitor: </u></i></p> My father was already home and I started taking care of the bees. I've been on my way since I was a kid. I share honey among friends and acquaintances.
							<br><br>
							<p><i><u>Urdaspal: </u></i></p> Since I had hives about five years ago. The little honey extracted has been for home or for some detail.
							<br><br>
							<p><i><u>Ignacio: </u></i></p> Roberto and I have been friends since childhood, and about 35 years ago we started. We sell in the area of Durango, in the square there, and among friends.
							<br><br>
							<p><i><u>Hegoi: </u></i></p> This is my third year and, for now, I'm like more honey than I get.
							<br><br>
							<p><i><u>Iñigo: </u></i></p> I've been here six to seven years. At work [he's a firefighter] we picked up a lot of bees and since people didn't know what to do, I started taking them home. The honey I take out is for home or for friends. I also take propolis, because it's very good for your health.
							<br><br>
							<p><i><u>Felix: </u></i></p> A beekeeper left several hives in Elorrio. I called and started working with him in 2014. Last year I started selling honey at the local market and I've done well. I also sell honey, propolis, pollen and young. It's a nice experience and I'm comfortable.
							<br><br>

				</div>

				<div class="textstyle">

						<br>




						<br><br>
						<p>						
						We are currently 14 members of the association, and our sole purpose is to help each other to extract honey, improve the environment for bees, and help them not become extinct.
						<br><br>	
						Don't hesitate to contact us in case of any questions.
						</p>

						<br><br>

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
			<div class="texttotal">
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
