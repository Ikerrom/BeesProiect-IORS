<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="css.css">
	<body style="margin:auto;">
		
		<div class="logindiv">
			<h2>Hasi Sesioa</h2>

		<form action="testlogin.php" method="POST">
			<label for="fname">First name:</label><br>
			<input type="text" name="Usuario"><br>
			<label for="lname">Password:</label><br>
			<input type="password" name="Password"><br><br>
			<input type="submit" value="Submit">
		</form> 
				<br>
					<?php
					session_start();
						
						if (isset($_SESSION['erablitzailea_a_g'])) 
						{
							$user = $_SESSION['erablitzailea_a_g'];
							echo "Ongi Etorri: $user"
						}
					?>
		</div>

	</body>

</html>
