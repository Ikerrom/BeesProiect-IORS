<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css.css">
		<title>ERLETE</title>

	</head>
	<body>

		<div class="title">ERLETE</div>
		<div class="topbar">
			<form action="login.php">
			    <input class="buttonP" type="submit" value="Sing In"/>
			    <?php
			    include(testlogin.php);
			    session_start();
					if (isset($_SESSION['erablitzailea_a_g'])) 
								{
				?>
									 <input class="buttonP" type="submit" value="Logged POG"/>
				<?php
								}
				?>
			</form>
			<button class="buttonP">About Us</button>
		</div>

	</body>
</html>
