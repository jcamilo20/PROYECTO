<?php

require 'databaseMYSQL.php';


// SENTENCIA DE SELECCION

try {
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $seleccionar    = "SELECT PK_admin, nombre, apellido, email, Created, Updated FROM TBL_administradores";

            foreach ($conn->query($seleccionar) as $row) {
                  echo "PK_admin: " . $row["PK_admin"] . " - nombre: " . $row["nombre"] . " - apellido: " . $row["apellido"] . " - email: " . $row["email"] . " - Created: " . $row["Created"] . " - Updated: " . $row["Updated"] . "<br>";
            }
        }
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


/*
// SENTENCIA DE INSERCIÓN


try {
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $insertar = "INSERT INTO TBL_administradores (nombre, apellido, email, password, Created, Updated)
            VALUES ('John', 'Doe', 'john@example.com', 'hello123', '2020-05-26 04:09:11', '2020-05-27 04:09:11')";

    // use exec() because no results are returned
    $conn->exec($insertar);
    echo "New record created successfully";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
*/


/*
// SENTENCIA DE ELIMINACIÓN 

try {
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $eliminar = "DELETE FROM TBL_administradores WHERE PK_admin=7";

    // use exec() because no results are returned
    $conn->exec($eliminar);
    echo "Record deleted successfully";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
*/


/*
// SENTENCIA DE ACTUALIZACIÓN


try {
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $actualizar = "UPDATE TBL_administradores SET apellido='Cambio', Updated='2020-06-01 04:09:11' WHERE PK_admin=2";

    // use exec() because no results are returned
    $conn->exec($actualizar);
    echo "Record updated successfully";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

*/


/*

// PROCEDIMIENTO


try {
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $procedimiento = "CALL `SP_Audita1B`()";

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
