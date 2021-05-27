<?php

include_once 'test_input.php';
include_once 'test_connect_db.php';
// Python: import random as r;print(','.join(r.sample(list(map(str,range(256))),256)).join(['array(',',',');'])) 
$dni = test_input($_POST['dni']);
$given_email = test_input($_POST['email']);
$link = ConnectDataBase();
$stmt1 = $link->prepare("SELECT gmail, contraseña FROM personas WHERE dni=?");
$stmt1->bind_param('s', $dni);
$stmt1->execute();
$stmt1->bind_result($email, $password);
if (!($stmt1->fetch() && $email == $given_email)) {
    header("Location:recoverpassword.php?incorrecto=si");
    exit();
}

$to = $email;
$subject = "Password reset";
$txt = 'You seem to have asked for a new password. If it was you, use this:'
        . "\r\n$password\r\n"
        . "If it was not you, someone is trying to obtain your password.";
$headers = "From: romero.iker@uni.eus";

mail($to, $subject, $txt, $headers);
header("Location:login.php");
