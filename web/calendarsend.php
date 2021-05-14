<?php 
session_start();
if (!isset($_SESSION['erablitzailea_a_g'])) {
    echo json_encode(['ezinduzu' => true]);
    exit();
}

include_once 'test_input.php';
include_once 'test_connect_db.php';
include_once 'book/get_booked.php';
$dni = $_SESSION['erablitzailea_a_g'];
$conn = ConnectDataBase();
$ret = new stdClass();

if (isset($_GET['x'])) {
	$arr = json_decode($_GET['x']);
} else{
	$arr = new stdClass();
	$arr-> month = (int)date("m")-1;
	$arr-> year = date("Y");
}


	include("calendar.php");
	$no_bisiesto = array(31,28,31,30,31,30,31,31,30,31,30,31);
	$bisiesto = array(31,29,31,30,31,30,31,31,30,31,30,31);
	$fecha_inicio = 2018;
	header('Content-Type: application/json');
	$dia1 = firstdaymonth($arr -> year, $arr -> month);
	$ret-> diainicio = $dia1[0];
	if (($arr-> month == (int)date("m")-1) && ($arr -> year == date("Y"))) {
		$ret-> day = (int)date("d");
	}

	$ret-> month = $arr-> month + 1;
	$ret-> year = $arr-> year;

	if ($dia1[1]) {
		$ret -> dias = $bisiesto[$arr -> month];
	}else{
		$ret -> dias = $no_bisiesto[$arr -> month];
	}

	$conn->begin_transaction();



$ret->booked = array();
$stmt4 = $conn->prepare("SELECT dia_reservado FROM Reservas WHERE dia_reservado BETWEEN ? and ?");
$from = $ret->year . "-" . $ret->month . "-1";
$until = $ret->year . "-" . $ret->month . "-" . $ret->dias;
$stmt4->bind_param('ss', $from, $until);
$stmt4->execute();
$stmt4->bind_result($book_day);
while ($stmt4->fetch()) {
    $ret->booked[] = $book_day;
}
$stmt4->close();
$conn->close();
$ret->booked = array_values($ret->booked);

echo json_encode($ret);

?>