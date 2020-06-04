<?php
require_once 'connection.php';

## SENTENCIA DELETE ##
function getDELETE(){
  global $conn;
  echo "<b><h3>Sentencia DELETE</h3></b><br>";
  $sql = "DELETE TOP (1) FROM TBL_administradores";
  $rest = sqlsrv_query($conn, $sql);
  if($rest == false){
    echo "Algo ha salido mal con la sentencia DELETE :'C. <br>Mensaje: ";
    print_r(sqlsrv_errors());
  } else{
    echo "<b><h5>Sentencia DELETE ejecutada con exito :)</h5></b><br>";
  }
}
?>
