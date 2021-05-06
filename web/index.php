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
				<input type="submit" value="Sesioa itxi"/>
				</form>
				<?php
					} else{
					?>
					<form action="login.php">
					<input class="buttonP" type="submit" value="Log In"/>
					</form>
					<?php
					}
				?>
			
			<button class="buttonP">About Us</button>
		</div>

	</body>
</html>
