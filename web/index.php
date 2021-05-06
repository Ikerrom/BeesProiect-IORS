<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css.css">
		<title>ERLETE</title>

	</head>
	<body>

		<div class="title">ERLETE</div>
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

				<?php
					}else{
					?>
					<form action="login.php">
					<input class="buttonR" type="submit" value="Log In"/>
					</form>
					<?php
					}
				?>
			
			<button class="buttonR">About Us</button>
		</div>

	</body>
</html>
