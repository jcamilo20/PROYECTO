<?php
  session_start();
   require 'database_tiendas.php';
  if (isset($_SESSION['user_id'])) {
    $records = $con_tiendas->prepare('SELECT id_tienda, email, nombre, password FROM tiendas WHERE id_tienda = :id_tienda');
    $records->bindParam(':id_tienda', $_SESSION['user_id']);
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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="../css/estilosadmin.css">
	   


	<title>Mi Catalogo</title>

	<style type="text/css">
		
		img{
        width: 300px;
	height: 200px;
}
th{
	text-align: center;
	</style>
</head>
<body>
  <?php if(!empty($user)): ?>
      <a href="../tiendas/logout.php">
        Cerrar Sesi&oacute;n
      </a>
	
	
		<div class="container-fluid">


	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Imagen</th>
			</tr>
		
			</thead>
			<tbody>
				<?php

				include "conexion.php";

				$query = "SELECT * FROM productos WHERE id_tienda_01 = {$_SESSION['user_id']}";
				$resultado = $conn -> query($query);
				while ($row = $resultado ->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $row["nombre"]; ?></td>
					<td><?php echo $row["precio"]; ?></td>
					<center><td><?php echo $row["descripcion"]; ?></td></center>
					<td><img src="data:image/jpg;base64, <?php echo base64_encode($row["imagen"]); ?>"/></td>
					<th><a href="#">Modificar</a></th>
					<th><a href="#">Eliminar</a></th>
				</tr>

			<?php 
		}

			 ?>
			
			</tbody>



	</table>
</div>

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