<?php
include 'carrito.php';
include 'cabecera.php';
?>

<br>

<h3>Lista del carrito</h3>
<?php if (!empty($_SESSION['CARRITO'])) { ?>

<table class="table table-active table-bordered">
	<tbody>
	<tr>
		<th width="40%">Descripción</th>
		<th width="15%" class="text-center">Cantidad</th>
		<th width="20%" class="text-center">Precio</th>
		<th width="20%" class="text-center">Total</th>
		<th width="5%">--</th>
	</tr>
	<?php $total=0; ?>
	<?php foreach ($_SESSION['CARRITO'] as $indice=>$producto) {  ?>
	<tr>
		<td width="40%"><?php echo $producto['NOMBRE']; ?></td>
		<td width="15%" class="text-center"><?php echo $producto['CANTIDAD']; ?></td>
		<td width="20%" class="text-center"><?php echo $producto['PRECIO']; ?></td>
		<td width="20%" class="text-center"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'],2); ?></td>
		<td width="5%">

		<form action="" method="post">

			<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY);?>">
			<button class="btn btn-danger" type="submit" name="btnAction" value="Eliminar">Eliminar</button>
		</form>
		</td>
			

	</tr>
	<?php $total=$total+($producto['PRECIO'] * $producto['CANTIDAD']); ?>
	<?php } ?>
	<tr>
		<td colspan="3" align="right"><h3>Total</h3></td>
		<td align="right"><h3>$<?php echo number_format($total,2);  ?></h3></td>
		<td></td>
	</tr>

	<tr>
		<td colspan="5">

		<form method="post"  action="pagar.php">

				<div class="form-group">
				<label for="formGroupExampleInput">Cedula</label>
   				<input type="number" class="form-control" id="cedula" name="cedula" placeholder="" required>	
   				</div>

   				<div class="form-group">
				<label for="formGroupExampleInput">Nombre</label>
   				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>	
   				</div>

   				<div class="form-group">
   				<label for="formGroupExampleInput">Apellido</label>
   				<input type="text" class="form-control" id="apellido" name="apellido" placeholder="" required>	
   				</div>


				<div class="form-group">
   				<label for="formGroupExampleInput">Dirección de envio</label>
   				<input type="text" class="form-control" id="direcccion" name="direccion" placeholder="" required>	
   				</div>


   				<div class="form-group">
   				<label for="formGroupExampleInput">Departamento</label>
   				<input type="text" class="form-control" id="departamento" name="departamento" value="META" readonly required>
   				</div>
	
   				<div class="form-group">
   				<label for="formGroupExampleInput">Ciudad</label>
   				<input type="text" class="form-control" id="ciudad" name="ciudad" value="VILLAVICENCIO" readonly required>	
   				</div>

   				<div class="form-group">
				<label for="my-input">Correo electronico</label>
				<input type="email" id="email" name="email" class="form-control" placeholder="" required>
				</div>

				<div class="form-group">
				<label for="my-input">Celular</label>
				 <input type="text" name="celular" id="celular" maxlength="10" minlength="10" class="form-control" placeholder="celular" required />	
				</div>

			<button class="btn btn-outline-info btn-lg btn-block" type="submit" name="btnAction" value="proceder">
				Procede a pagar
			</button>


		</form>

		</td>
	</tr>

	</tbody>
</table>
<?php  } else { ?>
<div class="alert alert-success">
	No hay productos para iniciar la fiesta!
</div>
<?php } ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
   include 'footer.php';
?>