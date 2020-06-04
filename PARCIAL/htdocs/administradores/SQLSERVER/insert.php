<?php
require_once 'connection.php';

## SENTENCIA INSERT ##
function getINSERT(){
  global $conn;
  echo "<b><h3>Sentencia INSERT</h3></b><br>";
  $sql = "INSERT INTO TBL_administradores (nombre, apellido, email, password, Created, Updated)
              VALUES ('Daniel', 'Doe', 'john@example.com', 'hello123', '2020-05-26 04:09:11', '2020-05-27 04:09:11')";
  $rest = sqlsrv_query($conn, $sql);
  if($rest == false){
    echo "Algo ha salido mal con la sentencia INSERT :'C. <br>Mensaje: ";
    print_r(sqlsrv_errors());
  } else{
    echo "<b><h5>Sentencia INSERT ejecutada con exito :)</h5></b><br>";
  }
}
?>
