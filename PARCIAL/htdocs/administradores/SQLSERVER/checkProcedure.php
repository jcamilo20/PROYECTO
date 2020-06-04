<?php
require_once 'connection.php';

## SENTENCIA PROCEDURE ##
function getPROCEDURE(){
  global $conn;
  echo "<b><h3>Sentencia PROCEDURE</h3></b><br>";
  $sql = "DECLARE	@return_value int
          EXEC	@return_value = [dbo].[SP_Audita1B]
          SELECT	'Return Value' = @return_value";
  $rest = sqlsrv_query($conn, $sql);
  if($rest == false){
    echo "Algo ha salido mal con la sentencia PROCEDURE :'C. <br>Mensaje: ";
    print_r(sqlsrv_errors());
  } else{
    while ($row = sqlsrv_fetch_array($rest)) {
        echo "apellido: " . $row["apellido"] . " - email: " . $row["email"] . " - Updated: " . $row["Updated"]->format('Y-m-d H:i:s') . " - Created: " . $row["Created"]->format('Y-m-d H:i:s') . " - nombre: " . $row["nombre"] . " - PK_admin: " . $row["PK_admin"] . "<br>";
    }
  }
  echo "<b><h5>Sentencia PROCEDURE ejecutada con exito</h5></b><br>";
}
?>
