<?php
  session_start();
   require 'database_tiendas.php';
  if (isset($_SESSION['user_id'])) {
    $records = $con_tiendas->prepare('SELECT PK_tienda, email, nombre, password FROM TBL_tiendas WHERE PK_tienda = :PK_tienda');
    $records->bindParam(':PK_tienda', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (($results) > 0) {
      $user = $results;
    }
  }
?>

<?php

include "conexion.php";

if(isset($_POST['Agregar'])){ //check if form was submitted
   //RECIBIR LOS DATOS Y ALMACENARLOS EN VARIABLES

  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $descripcion = $_POST["descripcion"];
  $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

  //CONSULTAR PARA INSERTAR

    $insertar = "INSERT INTO TBL_productos(FK_tienda, nombre, precio, descripcion, imagen) VALUES ({$_SESSION['user_id']}, '$nombre', '$precio', '$descripcion', '$imagen')";

  //EJECUTAR CONSULTA


  if ($conn->query($insertar) === TRUE){
    echo "<script>alert('Producto agregado!')</script>"; 
  } else{
    echo "<script>alert('Error al agregar')</script>"; 
  }

  //CERRAR LA CONEXION

  $conn->close();
}    
?>

<!DOCTYPE html>
<html>

<!--
 _______  _____          _       ____  _____  ________       _        _________  _____  _____   _______     _       _______   _________  ____  ____  
|_   __ \|_   _|        / \     |_   \|_   _||_   __  |     / \      |  _   _  ||_   _||_   _| |_   __ \   / \     |_   __ \ |  _   _  ||_  _||_  _| 
  | |__) | | |         / _ \      |   \ | |    | |_ \_|    / _ \     |_/ | | \_|  | |    | |     | |__) | / _ \      | |__) ||_/ | | \_|  \ \  / /   
  |  ___/  | |   _    / ___ \     | |\ \| |    |  _| _    / ___ \        | |      | '    ' |     |  ___/ / ___ \     |  __ /     | |       \ \/ /    
 _| |_    _| |__/ | _/ /   \ \_  _| |_\   |_  _| |__/ | _/ /   \ \_     _| |_      \ \__/ /     _| |_  _/ /   \ \_  _| |  \ \_  _| |_      _|  |_    
|_____|  |________||____| |____||_____|\____||________||____| |____|   |_____|      `.__.'     |_____||____| |____||____| |___||_____|    |______|   
          
-->                                                                                                                                           

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>PANEL</title>
	<style type="text/css">
   .body{
    font-family: sans-serif;
   }
		.alert{
			background: #F4454B;
                        color: white;
		}
	</style>
</head>
<body>

   <?php if(!empty($user)): ?>
      <a href="../tiendas/logout.php">
        Cerrar Sesi&oacute;n
      </a>
	<div class="container">

		<div class="alert alert-success alert-dismissible fade show" role="alert">
  <h4 class="alert-heading">Hola <?= $user['nombre']; ?></h4>
  <p>Te damos la Bienvenida al Panel de Control donde podras gestionar tu catalogo de productos y muchas cosas mas, en caso de necesitar ayuda puedes comunicarte con nuestro Centro de Soporte Online.</p>
  <hr>
  <p class="mb-0">- El equipo de Planea tu Party</p>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

	<form method="post" enctype="multipart/form-data">
		 <div class="form-group">
    <label for="exampleInputEmail1">Nombre de Producto</label>
    <input type="text" class="form-control"  required name="nombre" id="Nombre">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="number" min="100" max="100000000" step="100" class="form-control" required name="precio" id="Precio" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Ingrese el valor sin puntos ni comas una forma correcta seria: 42500</small>
  </div> 
 
  <div class="form-group">
    <label for="exampleTextarea">Descripci&oacute;n</label>
    <textarea class="form-control" required name="descripcion" id="Descripcion" rows="3"></textarea>
  </div>
<!--
  <div class="form-group">
    <label for="exampleInputEmail1">Cantidad disponible</label>
    <input type="number" min="1" max="100000000" step="1" class="form-control" required name="cantidad" id="cantidad">
  </div> 

-->

   <div class="form-group">
    <label for="exampleInputFile">Imagen</label>
    <input type="file" class="form-control-file" required name="imagen" id="Imagen" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Todo producto debe llevar su imagen, adjuntar solo 1 imagen</small>
  </div>


  <button type="submit" class="btn btn-outline-primary" name="Agregar" id="Agregar">Agregar</button>

   <a href="Catalogo.php"><button type="button"class="btn btn-outline-success" name="Catalogo" id="Catalogo">Catalogo</button></a>
	</form>
</div>
<br>
<br>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php 

else: ?>
      <h1>Para ver el contenido de esta pagina por favor Inicie Sesi&oacute;n</h1>

      <a href="../tiendas/login.php">Iniciar Sesi&oacute;n</a>
    <?php endif; ?>

</body>
</html>