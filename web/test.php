<!DOCTYPE html>
<html>
    <body>
        <form>
                <label>Choose a car:</label>
                <select>
                  
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "dam1";
                $dbname = "bees_project";


                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT dni FROM Persona";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    ?>
                       <option value="<?php echo $row["dni"];?>"><?php echo $row["dni"];?></option>
                   <?php
                  }

                } else {
                  echo "0 results";
                }
                $conn->close();
                ?>

                </select>
         </form>
    </body>
</html>
