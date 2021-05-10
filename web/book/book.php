<?php

include_once '../test_input.php';
include_once '../test_connect_db.php';
session_start();
//if (!isset($_SESSION['erablitzailea_a_g'])) {
//    header('Location: ../index.php');
//    exit();
//}
$arr = array('dni', 'diar', 'latai');
$values = array();
foreach ($arr as $x) {
    if (!(isset($_GET[$arr[$x]]))) {
        header('Location: book/index.php?incorrect');
    }
    $values[$arr[$x]] = test_input($_POST[$arr[$x]]);
    $conn = ConnectDataBase();
    $stmt = $conn->prepare("INSERT INTO Reservas (dni, dia_reservado, lata_id,"
            . " dia_dereserva) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("ssd", $values['dni'], $values['diar'], $values['latai']);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}



header('Location: index.php?incorrect');
