<?php

include("test_password.php");
$dni = $_POST["dni"];
$password = $_POST["password"];
if (!testPassword($dni, $password)) {
    header("Location:login.php?incorrecto=si");
} else {
    session_start();
    $_SESSION['dni'] = $dni;
    header("Location:login.php");
}
?>