<?php
require_once 'connection.php';

## SENTENCIA FUNCTION ##
function getFUNCTION(){
  global $conn;
  echo "<b><h3>Sentencia FUNCTION</h3></b><br>";
  $sql = "SELECT [dbo].[FN_DiffDates] ('2020-02-01', '2020-12-01')";
  $rest = sqlsrv_query($conn, $sql);
  if($rest == false){
    echo "Algo ha salido mal con la sentencia FUNCTION :'C. <br>Mensaje: ";
    print_r(sqlsrv_errors());
  } else{
    while ($row = sqlsrv_fetch_array($rest)) {
        echo "Tiempo: " . $row[0] . "<br>";
    }
  }
  echo "<b><h5>Sentencia FUNCTION ejecutada con exito</h5></b><br>";
}
?>
