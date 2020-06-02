<?php

include 'conexion.php';
include 'cabecera.php';
include 'carrito.php'
?>


<?php 

	if ($_POST) {
		$total=0;
		$SID=session_id();
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$cedula=$_POST['cedula'];
		$direccion=$_POST['direccion'];
		$departamento=$_POST['departamento'];
		$ciudad=$_POST['ciudad'];
		$celular=$_POST['celular'];
		$email=$_POST['email'];

		foreach ($_SESSION['CARRITO'] as $indice => $producto){
			$total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

		}

		$sql=$pdo->prepare("INSERT INTO `ventas` (`id_venta`, `clave_transaccion`, `paypal_datos`, `fecha`, `total`, `status`) VALUES (NULL, :clave_transaccion, '',  NOW(), :total, 'RECHAZADO');");
		$sql->bindParam(":clave_transaccion",$SID);
		$sql->bindParam(":total",$total);
		$sql->execute();
		$id_Venta=$pdo->lastInsertId();





		foreach ($_SESSION['CARRITO'] as $indice => $producto){
		$sql=$pdo->prepare("INSERT INTO `detalle_venta` (`id_detalle_venta`, `id_venta_01`, `id_producto_01`, `precio_unitario`, `cantidad`) VALUES (NULL, :id_venta_01, :id_producto_01, :precio_unitario, :cantidad);");

		//ESTO PROVIENE DE LA VARIABLE DE ARRIBA QUE SE CREO PARA GUARDAR EL ID DE LA VENTA 

		$sql->bindParam(":id_venta_01",$id_Venta);

		//TODO ESTO PROVIENE DEL ARCHIVO DE CARRITO DE COMPRAS
		$sql->bindParam(":id_producto_01",$producto['ID']);
		$sql->bindParam(":precio_unitario",$producto['PRECIO']);
		$sql->bindParam(":cantidad",$producto['CANTIDAD']);
		$sql->execute();

		}

		//INSERCIÓN A ENVIOS

		$sql=$pdo->prepare("INSERT INTO `envios` (`id_envio`, `id_venta_02`, `nombre`, `apellido`, `cedula`, `direccion`, `departamento`, `ciudad`, `correo`, `celular`) VALUES (NULL, :id_venta_02, :nombre, :apellido, :cedula, :direccion, :departamento, :ciudad, :email, :celular);");

		$sql->bindParam(":id_venta_02",$id_Venta);
		$sql->bindParam(":email",$email);
		$sql->bindParam(":nombre",$nombre);
		$sql->bindParam(":apellido",$apellido);
		$sql->bindParam(":cedula",$cedula);
		$sql->bindParam(":direccion",$direccion);
		$sql->bindParam(":departamento",$departamento);
		$sql->bindParam(":ciudad",$ciudad);
		$sql->bindParam(":celular",$celular);
		$sql->bindParam(":email",$email);
		$sql->execute();



		//echo "<h3>".$total."</h3>";


	}

 ?>

 <div class="jumbotron text-center">
 	<h1 class="display-4">¡Ultimo paso para realizar tu fiesta!</h1>
 	<hr class="my-4">
 	<p class="lead">Estas a punto de pagar con Paypal la cantidad de: <h4>$<?php echo number_format($total,0); ?> Pesos colombianos</h4>
 		<div id="paypal-button-container"></div>
 	 </p>
 	<p>Los productos seran enviados a la dirección que nos diste, recuerda que para las transacciones con Paypal el valor a pagar sera convertido a dolares segun la tarifa representativa del dia.</p>
 	
 </div>
<?php 

$conversion_dolar=($total/3396.50);

 ?>
<script src="https://www.paypal.com/sdk/js?client-id=ATKZU-qmQHoExKnwpfBC-M5nQidc5biv0aiBtv0EeJ_gXJeZ7r7NPmdNhygkpWB4PEguDlOdN9OcpJVY&currency=USD"></script>

 <?php  echo $id_Venta; ?>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: { value: '<?php echo number_format ($conversion_dolar, 2); ?>', currency:'USD'},
          description: "Compra de productos a Planea tu Party por: $<?php echo number_format($total, 0); echo(" pesos colombianos (COP) convertidos a dolar (USD)");?>",
          custom_id:"<?php echo $SID;?>#<?php  echo openssl_encrypt($id_Venta, COD, KEY); ?>",

        }]
      });
    },
    onApprove: function(data, actions) {
      // Capture the funds from the transaction
      return actions.order.capture().then(function(details) {
        // Show a success message to your buyer
        //alert('Transaction completed by ' + details.payer.name.given_name);
        console.log(data);
       window.location="verificador.php?orderID="+data.orderID
      });
    }
  }).render('#paypal-button-container');
</script>


<?php
   include 'footer.php';
?>