<?php 
//or die(mysqli_error($link));
//error_reporting(0);
 ?>
<html>					
	<head>
		<link rel="stylesheet" href="css.css">
		<title>ERLETE</title>
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
						<img src="perfil.png" style="width:10vh;height: 10vh;float:left;">
						<p class="textstyle">User: <?php echo $imprimir['nombre'];?></p>
						<p class="textstyle">DNI: <?php echo $dni;?></p>
					</div>
					<?php
					}
					?>
			
		<p class="titletext">ERLETE</p></div>
		
		<div class="topbar">
			
			    <?php
					if (isset($_SESSION['erablitzailea_a_g'])) 
					{
				?>			
				<form action="singout.php">
					<input class="buttonT" type="submit" value="Log Out"/>
				</form>

				<form action="account.php">
					<input class="buttonT" type="submit" value="Your Account"/>
				</form>

				<form action="booking.php">
					<input class="buttonT" type="submit" value="Booking"/>
				</form>

				<?php
					}else{
					?>
					<form action="login.php">
						<input class="buttonT" type="submit" value="Log In"/>
					</form>
					<?php
					}
				?>
			<form action="about.php">
						<input class="buttonT" type="submit" value="About Us"/>
					</form>
			
		</div>

	</body>
</html>