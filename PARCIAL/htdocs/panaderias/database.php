<?php

$servername = "127.0.0.1";
$database = "BDS_Final";
$username = "root";
$password = "";


// CREAR LA CONEXION

$conn = mysqli_connect($servername, $username, $password, $database);

//COMPROBAR LA CONEXION

if(!$conn){
	die("Conexion Fallida: " . mysqli_connect_error());
}
//CERRAR LA CONEXION

  $conn->close();

?>