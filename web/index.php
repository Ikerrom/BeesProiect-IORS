<?php 
//or die(mysqli_error($link));
//error_reporting(0);
 ?>
<html>					
	<head>

		<link rel="stylesheet" href="css.css">
		<title>ERLETE</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			
			    <?php
			    session_start();
			    if (isset($_SESSION['erablitzailea_a_g'])) {
			    include("test_connect_db.php");
				$dni = $_SESSION['erablitzailea_a_g'];
				$link =  ConnectDataBase();

				$result=mysqli_query($link, "select nombre from Personas where dni = '$dni'"); 

				$imprimir = mysqli_fetch_array($result);
					?>

						<div class="perfil">
						<img class="perfilimage" src="resources/Images/perfil.png">
						<p>User: <?php echo $imprimir['nombre'];?></p>
						<p>DNI: <?php echo $dni;?></p>

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
				<form action="singout.php">
					<input class="buttonT" type="submit" value="LOG OUT"/>
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
			<form action="about.php">
						<input class="buttonT" type="submit" value="ABOUT US"/>
					</form>
			
		</div>

		<div class="textstyle">
			<p>We are the Erlete association, our goal is to help beekeepers with the extraction of honey, through our extractor which is located in our place, you can find us in Axpe and ask us any kind of doubts you have about this.
			The association was created by a group of young entrepreneurs with the desire of  not to let the bees die.
			With other eight men and women, the founding beekeepers of the Erlete association are Aitor Unzueta, Urdaspal Alberdi , Félix Zabarte,Iñigo Mendibil, Hegoi Escudero, Inazio Uruburu and Roberto Ardanza.
			</p>	
			
		</div>

	</body>
</html>