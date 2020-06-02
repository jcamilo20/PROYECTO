<?php

require 'database.php';


// SENTENCIA DE CONSULTA

$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql    = "SELECT PK_admin, nombre, apellido, email, Created, Updated FROM TBL_administradores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "PK_admin: " . $row["PK_admin"] . " - nombre: " . $row["nombre"] . " - apellido: " . $row["apellido"] . " - email: " . $row["email"] . " - Created: " . $row["Created"] . " - Updated: " . $row["Updated"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();




/*
// SENTENCIA DE INSERCIÓN

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO TBL_administradores (nombre, apellido, email, password, Created, Updated)
  VALUES ('John', 'Doe', 'john@example.com', 'hello123', '2020-05-26 04:09:11', '2020-05-27 04:09:11')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
}
catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

*/



/*
// SENTENCIA DE ELIMINACIÓN 

// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM TBL_administradores WHERE PK_admin=4";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

*/


/*
// SENTENCIA DE ACTUALIZACIÓN

// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE TBL_administradores SET apellido='Cambiado', Updated='2020-06-01 04:09:11' WHERE PK_admin=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
*/

/*

// PROCEDIMIENTO

$procedimiento = "CALL `SP_Audita1B`()";

try {
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($conn->query($procedimiento) as $row) {
                  echo "apellido: " . $row["apellido"] . " - email: " . $row["email"] . " - Updated: " . $row["Updated"] . " - Created: " . $row["Created"] . " - nombre: " . $row["nombre"] . " - PK_admin: " . $row["PK_admin"] . "<br>";
            }
        }
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

*/



// FALTA AGREGAR LA FUNCIÓN

?>
