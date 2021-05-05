<?php
$servername = "localhost";
$username = "root";
$password = "dam1";
$dbname = "bees_project";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Latas,Personas";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
           <form>
        <label for="cars">Choose a car:</label>
        <select name="test">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
        </select>
      </form>
  }

} else {
  echo "0 results";
}
$conn->close();
?>
