<?php
echo "0";
include("test_password.php");
echo "1";
$dni = $_POST["dni"];
echo "2";
$password = $_POST["password"];
echo $dni;
if (testPassword($dni, $password)) {
	echo "Success!";
    session_start();
    $_SESSION['dni'] = $dni;
    header("Location:login.php");
}
echo "The End.";
header("Location:login.php?incorrecto=si");