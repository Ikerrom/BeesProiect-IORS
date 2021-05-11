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

		<div class="texttotal">

		<div class="textstyle">
			<p>We are the Erlete association, our goal is to help beekeepers with the extraction of honey, through our extractor which is located in our place, you can find us in Axpe and ask us any kind of doubts you have about this.
			The association was created by a group of young entrepreneurs with the desire of  not to let the bees die.
			With other eight men and women, the founding beekeepers of the Erlete association are Aitor Unzueta, Urdaspal Alberdi , Félix Zabarte,Iñigo Mendibil, Hegoi Escudero, Inazio Uruburu and Roberto Ardanza.
			</p>	
			
			<img src="images/erlete1.jpg" width=70% height6=60%>

		

		
			<p>
				<h2>Here's where our idea comes from:</h2>
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

			<iframe src="https://maps.google.com/maps?q=San Juan Plaza 1+48291+axpe+Bizkaia,es&amp;&amp;ie=UTF8&amp;t=m&amp;z=13&amp;iwloc=B&amp;hl=en&amp;output=embed" width="100%" height="500" frameborder="0" marginwidth="0" marginheight="0" scrolling="no">
			</iframe>
		</div>

		<div class="textstyle2">

			
			<p>
				
			Bees are said to pollinate 80% of plants. Therefore, they do a very important job. The bee demands care; there are diseases that, if not treated, kill the bee. In recent years, the vespa velutine wasp, coming or brought from Asia, has also appeared and hurts.
			<br><br>
			<img src="images/erlete2.jpg" width=100% height=15% >
			<br><br><br>
			In addition, globalization has only been harm to the bee: insecticides, pesticides, mud disease, vespa velutin... When I was young there was no professional beekeeping, but the bees were in the forest because they had a much more suitable environment. Today, the only way to resist is to unite the little beekeepers. In addition, the Administration is interested in having ten beekeepers, each with lots of bees, to keep revenue under control.
			<br><br><br>
			<img src="images/erlete3.jpg" width=100% height=20% >
			<br><br><br>

			<iframe width="700" height="350" src="https://www.youtube.com/embed/9lqKwL2hKRM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

		</div>
	</div>




	</body>
</html>
