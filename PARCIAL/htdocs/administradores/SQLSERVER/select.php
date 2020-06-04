<?php
require_once 'connection.php';

## SENTENCIA SELECT ##
function getSELECT(){
  global $conn;
  echo "<b><h3>Sentencia SELECT</h3></b><br>";
  $sql = "SELECT PK_admin, nombre, apellido, email, Created, Updated FROM TBL_administradores";
  $rest = sqlsrv_query($conn, $sql);
  if($rest == false){
    echo "Algo ha salido mal con la sentencia SELECT :'C. <br>Mensaje: ";
    print_r(sqlsrv_errors());
  } else{
    while ($row = sqlsrv_fetch_array($rest)) {
      echo "PK_admin: " . $row["PK_admin"] . " - nombre: " . $row["nombre"] . " - apellido: " . $row["apellido"] . " - email: " . $row["email"] . " - Created: " . $row["Created"]->format('Y-m-d H:i:s') . " - Updated: " . $row["Updated"]->format('Y-m-d H:i:s') . "<br>";
    }
  }
  echo "<b><h5>Sentencia SELECT ejecutada con exito</h5></b><br>";
}
?>
