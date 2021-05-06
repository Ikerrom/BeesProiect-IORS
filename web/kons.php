<?php

include("test_password.php");
$dni = $_POST["dni"];
$password = $_POST["password"];
echo $dni;
if (testPassword($dni, $password)) {
	echo "Success!";
    session_start();
    $_SESSION['dni'] = $dni;
    header("Location:login.php");
}
echo "The End."
header("Location:login.php?incorrecto=si");