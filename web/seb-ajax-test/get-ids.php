    <?php

    header('Content-type:application/json;charset=utf-8');

    $servername = "localhost";
    $username = "root";
    $password = "dam1";
    $dbname = "bees_project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT dni AS id FROM Personas;--Test";
    $sql2 = "SELECT lata_id AS id FROM Latas;";

    function select($conn, $sql) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

    $outp = ['Personas' => select($conn, $sql), 'Latas' => select($conn, $sql2)];

    echo json_encode($outp);
    