<!DOCTYPE html>
<html>
<body style="margin:auto;">
<div  style="margin-top: 15%; text-align: center;">
	
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
		?>
				<form action="singout.php">
					<input type="submit" value="Sesioa itxi"/>
				</form>
		<?php	
				}
		?>
</div>

</body>

</html>
