<!DOCTYPE html>
<html>
	  <head>
	  	<link rel="stylesheet" href="css.css">
	  	<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	  	<title>Account</title>
		  	<style>
		  			
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

					<div class="title">
						<p class="titletext">ERLETE</p>
					</div>
						<div class="topbar">
							    <?php
									if (isset($_SESSION['erablitzailea_a_g'])) 
									{
								?>
								<form action="index.php">
									<input class="buttonT" type="submit" value="INDEX"/>
								</form>

								<form action="account.php">
									<input class="buttonT" type="submit" value="ACCOUNT"/>
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

	   			<div class="bgdiv">
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
						$result2 =mysqli_query($link, "select nombre,apellido,gmail,dinero_pagar,dinero_cuenta from Personas"); 
						while($imprimir2 = mysqli_fetch_array($result2)){
							if ($result2->num_rows > 0) {
							  	?>
										<tbody>
											<tr>
												<td>
													<?php  
														echo $dni;
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


