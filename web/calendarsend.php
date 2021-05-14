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
$conn->autocommit(false);

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
	$ret = new stdClass();
	$ret-> diainicio = $dia1[0];
	if ($arr-> month === (int)date("m")-1 && $arr -> year === date("Y")) {
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

	if (isset($arr->date) && property_exists($arr, 'lataid')) {
	    $dt = (new DateTime())->format('Y-m-d H:i:s');
	    try {
	        if ($arr->lataid === null) {
	            $stmt = $conn->prepare("INSERT INTO Reservas (dni, dia_reservado, lata_id,"
	                    . " dia_dereserva) VALUES (?, ?, NULL, ?)");
	            $stmt->bind_param("sss", $dni, $arr->date, $dt);
	        } else {
	            $stmt = $conn->prepare("INSERT INTO Reservas (dni, dia_reservado, lata_id,"
	                    . " dia_dereserva) VALUES (?, ?, ?, ?)");
	            $stmt->bind_param("ssis", $dni, $arr->date, $arr->lataid, $dt);
	        }

	        $stmt->execute();
	        $stmt->close();
	        if ($arr->lataid === null) {
	            $ret->eginda = true;
	        } else {
	            $stmt2 = $conn->prepare("SELECT dni, dia_dereserva FROM Reservas "
	                    . "WHERE lata_id = ? AND dia_reservado BETWEEN ? AND ? "
	                    . "ORDER BY dia_dereserva ASC, dni");
	            $booking = get_booked($arr);
	            $stmt2->bind_param('iss', $arr->lataid, $booking['from'], $booking['until']);
	            $stmt2->execute();
	            $stmt2->bind_result($firstdni, $firsttime);
	            if ($stmt2->fetch() && $firstdni === $dni && $firsttime === $dt) {
	                $ret->eginda = true;
	                $stmt2->close();
	            } else {
	                $stmt2->close();
	                $conn->rollback();
	                $ret->ezlata = true;
	            }
	        }
	    } catch (mysqli_sql_exception $e) {
	        $stmt->close();
	        $conn->rollback();
	        $ret->ezinda = true;
	    }
	}


$ret->lataid = array();
$stmt3 = $conn->prepare("SELECT lata_id FROM Latas");
$stmt3->execute();
$stmt3->bind_result($lataid);
while ($stmt3->fetch()) {
    $ret->lataid[] = $lataid;
}
$stmt3->close();

echo json_encode($ret);

?>