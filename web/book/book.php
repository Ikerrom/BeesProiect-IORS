<?php

header('Content-Type: application/json');
include_once '../test_input.php';
include_once 'connect_db_2.php';
include_once 'get_booked.php';
session_start();
//$dni = '12345678G';
if (!isset($_SESSION['erablitzailea_a_g'])) {
    echo json_encode(['ezinduzu' => true]);
    exit();
}
$dni = $_SESSION['erablitzailea_a_g'];

$ret = new stdClass();
$conn = ConnectDataBase();
$conn->autocommit(false);
$conn->begin_transaction();
if (!isset($_GET['x'])) {
    $arr = new stdClass();
} else {
    $arr = json_decode($_GET['x']);
}
if (isset($arr->date) && property_exists($arr, 'lataid')) {
    $cdt = new DateTime();
    $rdt = DateTime::createFromFormat('Y-m-d', $arr->date);
    if ($rdt > $cdt) {
        $sdt = ($cdt)->format('Y-m-d H:i:s');
        try {
            if ($arr->lataid === null) {
                $stmt = $conn->prepare("INSERT INTO Reservas (dni, dia_reservado, lata_id,"
                        . " dia_dereserva) VALUES (?, ?, NULL, ?)");
                $stmt->bind_param("sss", $dni, $arr->date, $sdt);
            } else {
                $stmt = $conn->prepare("INSERT INTO Reservas (dni, dia_reservado, lata_id,"
                        . " dia_dereserva) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssis", $dni, $arr->date, $arr->lataid, $sdt);
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
                if ($stmt2->fetch() && $firstdni === $dni && $firsttime === $sdt) {
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
    } else {
        $ret->berandu = true;
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
$conn->autocommit(true);
$conn->commit();
$conn->close();
$ret->lataid = array_values($ret->lataid);

echo json_encode($ret);
