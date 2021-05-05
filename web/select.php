<?php
$servername = "localhost";
$username = "root";
$password = "dam1";
$dbname = "bees_project";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "
SELECT dni, dia_reservado, lata_id, dia_dereserva 
FROM Reservas 
INNER JOIN (Personas ON Reservas.dni = Personas.dni) 
INNER JOIN Latas ON Reservas.lata_id = Latas.lata_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     echo "DNI: " . "<b>" . $row["dni"] . "</b>". "Dia reservado: " . $row["dia_reservado"] . "Id lata: " . $row["lata_id"] . "Dia de reserva: " . $row["dia_dereserva"] . "<br>";
  }

} else {
  echo "0 results";
}
$conn->close();
?>
