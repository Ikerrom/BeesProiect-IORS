<?php

header('Content-Type: application/json');
include_once '../test_input.php';
include_once '../test_connect_db.php';
include_once 'get_booked.php';
session_start();
$dni = '12345678G';
//if (!isset($_SESSION['erablitzailea_a_g'])) {
//    echo json_encode(['ezinduzu' => true]);
//    exit();
//}
//$dni = $_SESSION['erablitzailea_a_g'];

$ret = new stdClass();
$conn = ConnectDataBase();
$conn->autocommit(false);
$conn->begin_transaction();
$rb = false;
if (!isset($_GET['x'])) {
    $arr = new stdClass();
} else {
    $arr = json_decode($_GET['x']);
}
if (isset($arr->date) && property_exists($arr, 'lataid')) {
    if ($arr->lataid === null) {
        $stmt = $conn->prepare("INSERT INTO Reservas (dni, dia_reservado, lata_id,"
                . " dia_dereserva) VALUES (?, ?, NULL, NOW())");
        $stmt->bind_param("ss", $dni, $arr->date);
    } else {
        $stmt = $conn->prepare("INSERT INTO Reservas (dni, dia_reservado, lata_id,"
                . " dia_dereserva) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("ssi", $dni, $arr->date, $arr->lataid);
    }
    if (!$stmt->execute()) {
        $stmt->close();
        $ret->date = "INSERT INTO Reservas (dni, dia_reservado, lata_id,"
                . " dia_dereserva) VALUES ('$dni', '$arr->date', $arr->lataid, NOW())";

        $conn->rollback();
        $ret->ezinda = true;
    } else {
        $stmt->close();
        $stmt2 = $conn->prepare("SELECT * FROM Reservas "
                . "WHERE lata_id = ? AND dia_reservado BETWEEN ? AND ? "
                . "ORDER BY dia_dereserva ASC, dni");
        $booking = get_booked($arr);
        $stmt2->bind_param('iss', $arr->lataid, $booking['from'], $booking['until']);
        $stmt2->execute();
        if ($stmt2->num_rows > 0) {
            $rb = true;
            $ret->ezlata = true;
        } else {
            $ret->eginda = true;
        }
        $stmt2->close();
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
if ($rb) {
    $conn->rollback();
}
$conn->autocommit(true);
$conn->commit();
$conn->close();
$ret->lataid = array_values($ret->lataid);

echo json_encode($ret);
