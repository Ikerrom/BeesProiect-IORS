<!DOCTYPE html>
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
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500display=swap" rel="stylesheet">



			</head>
	  <body>



					<div class="title">
						<p class="titletext">ERLETE</p>
					</div>
						<div class="topbar">

								<form action="index.php">
									<input class="buttonT" type="submit" value="HOME"/>
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
							
						</div>

	   			<div class="bgdiv">
	   						<div class="photodiv">
								<?php
								session_start();
				    			if (isset($_SESSION['erablitzailea_a_g'])) {
					    			include("test_connect_db.php");
					    			$dni = $_SESSION['erablitzailea_a_g'];
									$link =  ConnectDataBase();
									$result3=mysqli_query($link, "select Foto from Personas where dni = '$dni'");
									$imprimir=mysqli_fetch_array($result3);
									?>

								<img  class="photoacc" src="<?php echo $imprimir['Foto']; ?>">
								<form action="upload.php" method="POST" enctype="multipart/form-data">
									<input type='file' name="imagen">
									<input type="submit">
								</form>

	  	 			<?php	
					$result=mysqli_query($link, "select nombre,apellido,gmail,dinero_pagar,dinero_cuenta from Personas where dni = '$dni'"); 
					$imprimir = mysqli_fetch_array($result);
					?>

					</div>

						<div class="bgacc">

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
					

	   			</div>
					
					<div class="tableaccdiv">
						<p class="texttitle">Member List</p>
						<table class="tableacc">
							<thead>
									<tr>
										<th>DNI</th>
										<th>NAME</th>
										<th>SURNAME</th>
										<th>GMAIL</th>
									</tr>
							</thead>
					<?php
						$result2 =mysqli_query($link, "select dni,nombre,apellido,gmail,dinero_pagar,dinero_cuenta from Personas"); 
						while($imprimir2 = mysqli_fetch_array($result2)){
							if ($result2->num_rows > 0) {
							  	?>
										<tbody>
											<tr>
												<td>
													<?php  
														echo $imprimir2['dni'];
													?>	
												</td>
												<td>
													<?php  
														echo $imprimir2['nombre'];
													?>	
												</td>
												<td>
													<?php  
														echo $imprimir2['apellido'];
													?>
												</td>
												<td>
													<?php  
														echo $imprimir2['gmail'];
													?>
														
												</td>
											</tr>
										</tbody>
								<?php 
							} else {
							  echo "0 results";
							}
						} 
						?>
					</div>
				<?php 
					} else{
						echo "You are not logged in";
					}
		?>
		</table>
	  </body>
</html>


