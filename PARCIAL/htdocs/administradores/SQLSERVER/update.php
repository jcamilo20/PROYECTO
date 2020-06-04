<?php
require_once 'connection.php';

## SENTENCIA UPDATE ##
function getUPDATE(){
  global $conn;
  echo "<b><h3>Sentencia UPDATE</h3></b><br>";
  $sql = "UPDATE TOP(1) TBL_administradores SET apellido='Cambio', Updated='2020-06-01 04:09:11'";
  $rest = sqlsrv_query($conn, $sql);
  if($rest == false){
    echo "Algo ha salido mal con la sentencia UPDATE :'C. <br>Mensaje: ";
    print_r(sqlsrv_errors());
  } else{
    echo "<b><h5>Sentencia UPDATE ejecutada con exito :)</h5></b><br>";
  }
}
?>
