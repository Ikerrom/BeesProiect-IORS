<?php
/* Metodo alternativo para conectarse a la bse de datos y poder utilizar una rollback */
	function ConnectDataBase() {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if (!($lotura = mysqli_connect("localhost", "root", ""))) {
        echo "There is an error connecting the server.";
        exit();
    }
    $lotura->set_charset('utf8mb4');
    if (!mysqli_select_db($lotura, "bees_project")) {
        echo "There is an error selecting the DB.";
        exit();
    }

    return $lotura;
}
?>