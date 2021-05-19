<?php 
session_start();
include_once '../test_connect_db.php';
$dni = $_SESSION['erablitzailea_a_g'];
$conn = ConnectDataBase();
$ret = new stdClass();

if (isset($_GET['x'])) {
	$datedel = $_GET['x'];
} else{
	$datedel = "2018-01-01";
}



include("../calendar.php");
$stmt6 = $conn->prepare("DELETE FROM Reservas WHERE dni = ? AND dia_reservado = ?");
$stmt6->bind_param('ss',$dni, $datedel);
$stmt6->execute();
$stmt6->close();
$conn->close();