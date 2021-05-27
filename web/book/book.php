
<?php
/*Comprueba si la sesion esta iniciada */
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

                                                    /*        Recibe un dia que quieres resvar y lo inserta, siempre y cuando sea 
                                                            la reserva mas antigua, de lo contrario haria un rollback   */

                                                    /* Envia informacion sobre errores(lata ya reservada, dia ya reservado, etc...)*/
    
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
                $stmt = $conn->prepare("INSERT INTO reservas (dni, dia_reservado, lata_id,"
                        . " dia_dereserva) VALUES (?, ?, NULL, ?)");
                $stmt->bind_param("sss", $dni, $arr->date, $sdt);
            } else {
                $stmt = $conn->prepare("INSERT INTO reservas (dni, dia_reservado, lata_id,"
                        . " dia_dereserva) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssis", $dni, $arr->date, $arr->lataid, $sdt);
            }

            $stmt->execute();
            $stmt->close();
            if ($arr->lataid === null) {
                $ret->eginda = true;
            } else {
                $stmt2 = $conn->prepare("SELECT dni, dia_dereserva FROM reservas "
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
                                                        /*  Por ultimo manda de la base da datos las latas que hay en general  */
$ret->lataid = array();
$ret->capacidad = array();
$stmt3 = $conn->prepare("SELECT lata_id, capacidad FROM latas");
$stmt3->execute();
$stmt3->bind_result($lataid, $litros);
while ($stmt3->fetch()) {
    $ret->lataid[] = $lataid;
    $ret->capacidad[] = $litros;
}
$stmt3->close();
$conn->autocommit(true);
$conn->commit();
$conn->close();
$ret->lataid = array_values($ret->lataid);

echo json_encode($ret);
