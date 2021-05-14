<html>					
			<head>  
				<meta charset="utf-8">
 				<meta name="viewport" content="width=device-width, initial-scale=1">
  				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

						<form action="index.php">
								<input class="buttonT" type="submit" value="HOME"/>
						</form>

						<form action="account.php">
							<input class="buttonT" type="submit" value="YOUR ACCOUNT"/>
						</form>

						<form action="about.php">
							<input class="buttonT" type="submit" value="ABOUT US"/>
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