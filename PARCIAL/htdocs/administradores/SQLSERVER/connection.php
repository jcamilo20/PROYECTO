<?php
  $serverName = 'DANIEL';
  $database = 'BDS_Final';
  $connectionInfo = array('Database' => $database);
  $conn = sqlsrv_connect($serverName, $connectionInfo);
  if($conn){
    echo "Conexion exitosa<br>";
  } else {
    echo "Error de conexion<br>";
    die(print_r(sqlsrv_errors(), true));
  }
?>
