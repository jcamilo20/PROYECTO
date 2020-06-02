<?php
  session_start();
   require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_tienda, email, nombre, password FROM tiendas WHERE id_tienda = :id_tienda');
    $records->bindParam(':id_tienda', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<?php

session_start();
include "conexion.php";

?>
<!DOCTYPE html>
<html>
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
      <a href="../socios/logout.php">
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

	<form action="agregar_producto.php" method="post" enctype="multipart/form-data">
		 <div class="form-group">
    <label for="exampleInputEmail1">Nombre de Producto</label>
    <input type="text" class="form-control"  required name="Nombre" id="Nombre">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" required name="Precio" id="Precio" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Ingrese el valor con puntuaci&oacute;n ejemplo: 42.500</small>
  </div> 
 
  <div class="form-group">
    <label for="exampleTextarea">Descripci&oacute;n</label>
    <textarea class="form-control" required name="Descripcion" id="Descripcion" rows="3"></textarea>
  </div>

   <div class="form-group">
    <label for="exampleInputFile">Imagen</label>
    <input type="file" class="form-control-file" required name="Imagen" id="Imagen" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Todo producto debe llevar su imagen, adjuntar solo 1 imagen</small>
  </div>


  <button type="submit" class="btn btn-outline-primary" name="Agregar" id="Agregar">Agregar</button>

   <a href="Catalogo.php"><button type="button"class="btn btn-outline-success" name="Catalogo" id="Catalogo">Catalogo</button></a>

	</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php 

else: ?>
      <h1>Para ver el contenido de esta pagina por favor Inicie Sesi&oacute;n</h1>

      <a href="../socios/login.php">Iniciar Sesi&oacute;n</a>
    <?php endif; ?>

</body>
</html>