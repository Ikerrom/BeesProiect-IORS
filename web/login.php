<!DOCTYPE html>
<html>
<body style="margin:auto;">
<div  style="margin-top: 15%; text-align: center;">
	
	<h2>Hasi Sesioa</h2>

<form action="kons.php" method="POST">
	<label for="fname">First name:</label><br>
	<input type="text" name="dni"><br>
	<label for="lname">Password:</label><br>
	<input type="password" name="password"><br><br>
	<input type="submit" value="Submit">
</form> 
		<br>
			<?php
			session_start();
				
				if (isset($_SESSION['dni'])) 
				{
					$user = $_SESSION['dni'];
					echo "Ongi Etorri: $user"
		?>
				<form action="irten.php">
					<input type="submit" value="Sesioa itxi"/>
				</form>
		<?php	
				}
		?>
</div>

</body>

</html>

