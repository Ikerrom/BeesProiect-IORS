<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="style.xsl"?>
<root>
<?php
header('Content-type: text/xml');
if (isset($_GET['incorrect'])) {
    echo '<incorrect/>';
}
include_once 'get_booked.php';
$dni = '12345678G';
//session_start();
//if (isset($_SESSION['erablitzailea_a_g'])) {
//    $dni = $_SESSION['erablitzailea_a_g'];
//} else {
//    header('Location: ../index.php');
//    exit();
//}
echo "<dni>$dni</dni>";
include('../test_connect_db.php');

function process_row($row, $link) {
    $result2 = $link->query('SELECT lata_id, '
            . 'DATE_FORMAT(dia_reservado, "%Y%m%d") AS dia'
            . ' FROM Reservas WHERE lata_id=' . $row['lata_id']);

    while ($result2 && ($row2 = mysqli_fetch_array($result2))) {
        echo '<booked>';
        $booked = get_booked($row2);
        foreach ($booked as $tag => $content) {
            echo "<$tag>$content</$tag>";
        }
        echo '</booked>';
    }
}

$link = ConnectDataBase();
echo '<no-capacidad><no-lata>';
process_row(['lata_id' => null], $link);
echo '</no-lata></no-capacidad>';


$result3 = $link->query('SELECT DISTINCT capacidad FROM Latas');
while ($result3 && ($row3 = mysqli_fetch_array($result3))) {
    echo '<capacidad><cantidad>' . $row3['capacidad'] . '</cantidad>';
    $result = $link->query('SELECT lata_id FROM Latas WHERE capacidad=' . 
            $row3['capacidad']);
    while ($result && ($row = mysqli_fetch_array($result))) {
        echo '<lata>';
        echo '<id>' . $row['lata_id'] . '</id>';
        process_row($row, $link);
        echo '</lata>';
    }
    echo '</capacidad>';
}
?>
</root>