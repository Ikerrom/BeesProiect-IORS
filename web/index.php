<html>
	<head>
		<link rel="stylesheet" href="css.css">
		<title>ERLETE</title>

	</head>
	<body>

		<div class="title">
			<div class="perfil">
				<img>
				<p></p>
			</div>
			    <?php
			    include(testlogin.php);
			    session_start();
					if (isset($_SESSION['erablitzailea_a_g'])) 
					{

					}
				?>		
		<p class="titletext">ERLETE</p></div>
		
		<div class="topbar">
			
			    <?php
			    include(testlogin.php);
			    session_start();
					if (isset($_SESSION['erablitzailea_a_g'])) 
					{
				?>			
				<form action="singout.php">
					<input class="buttonR" type="submit" value="Log Out"/>
				</form>

				<form action="account.php">
					<input class="buttonL" type="submit" value="Your Account"/>
				</form>

				<form action="booking.php">
					<input class="buttonL" type="submit" value="Booking"/>
				</form>

				<form action="about.php">
					<input class="buttonL" type="submit" value="About Us"/>
				</form>

				<?php
					}else{
					?>
					<form action="login.php">
						<input class="buttonR" type="submit" value="Log In"/>
					</form>

					<form action="about.php">
						<input class="buttonL" type="submit" value="About Us"/>
					</form>
					<?php
					}
				?>
			
			
		</div>

	</body>
</html>
