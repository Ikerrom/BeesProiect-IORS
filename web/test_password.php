<?php

function testPassword($dni, $password) {
    if (!($lotura = mysqli_connect("localhost", "root", "dam1"))) {
        echo "There is an error connecting the server.";
        return false;
    }
    if (!mysqli_select_db($lotura, "bees_project")) {
        echo "There is an error selecting the DB.";
        return false;
    }

    $sql = "SELECT * FROM Personas WHERE dni=? AND contraseña=?";
    $stmt = $lotura->prepare($sql);
    $stmt->bind_param('ss', $dni, $password);
    $stmt->execute();
	echo $stmt->num_rows();
    return (($stmt->num_rows()) > 0);
}
