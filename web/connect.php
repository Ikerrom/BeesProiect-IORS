<?php
$servername = "localhost";
$username = "root";
$password = "dam1";
$dbname = "bees_project";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id FROM test";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
