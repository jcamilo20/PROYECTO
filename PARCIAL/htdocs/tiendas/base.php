<?php
include 'conexion.php';


   //RECIBIR LOS DATOS Y ALMACENARLOS EN VARIABLES

	$Nombre = $_POST["Nombre"];
	$Precio = $_POST["Precio"];
	$Descripcion = $_POST["Descripcion"];
	$Imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"]));

	//CONSULTAR PARA INSERTAR

  	$insertar = "INSERT INTO productos_nueva_armonia(Nombre, Precio, Descripcion, Imagen) VALUES ('$Nombre', '$Precio', '$Descripcion', '$Imagen')";

  //EJECUTAR CONSULTA


	if ($conn->query($insertar) === TRUE){
		echo "Producto agregado!"; 
	} else{
		echo "Error al agregar el Producto"; 
	}

	//CERRAR LA CONEXION

	$conn->close();

?>