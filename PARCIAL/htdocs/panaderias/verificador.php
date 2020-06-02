<?php

include 'conexion.php';
include 'cabecera.php';
include 'carrito.php'
?>

<?php 
//print_r($_GET);

	$ClientID="ATKZU-qmQHoExKnwpfBC-M5nQidc5biv0aiBtv0EeJ_gXJeZ7r7NPmdNhygkpWB4PEguDlOdN9OcpJVY";
	$Secret="ENk_Mcb7m79kGaZRCOqYXFC_K2KX84_Sd1ToneQJyCLSMQ9rDfTiYDOVezFynhNqSuu3pnLZSevuASNq";


	$Login= curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");
	curl_setopt($Login, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($Login, CURLOPT_USERPWD, $ClientID.":".$Secret);

	curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");


	$Respuesta=curl_exec($Login);

	$objRespuesta=json_decode($Respuesta);
	$AccessToken=$objRespuesta->access_token;


	$venta= curl_init("https://api.sandbox.paypal.com/v2/checkout/orders/".$_GET['orderID']);
	curl_setopt($venta, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer ".$AccessToken));

	curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);

	$RespuestaVenta=curl_exec($venta);
	
	//print_r($RespuestaVenta);

	$objDatosTransaccion=json_decode($RespuestaVenta); //Datos transaccion trae todo el array de los datos que da paypal

	//print_r($objDatosTransaccion); //imprimo los datos que esta mandando paypal

	$status=$objDatosTransaccion->status; //aqui esta la variable para mirar el estado del pago /completed, declinado etc...
	$email=$objDatosTransaccion->payer->email_address;



	$total=$objDatosTransaccion->purchase_units[0]->amount->value;
	$currency=$objDatosTransaccion->purchase_units[0]->amount->currency_code;
	$custom_id=$objDatosTransaccion->purchase_units[0]->custom_id;

	//print_r($custom_id); //imprime los 2 codigos para la transaccion a la izquierda y derecha separados por un #
	$clave=explode("#", $custom_id);
	$SID=$clave[0];
	$claveVenta=openssl_decrypt($clave[1], COD, KEY);

	curl_close($venta);
	curl_close($Login);


	if ($status=="COMPLETED") {
		
		$mensajePaypal="<h3>Tu pago fue aprobado</h3";

		$sql=$pdo->prepare("UPDATE `ventas` SET `paypal_datos` = :paypal_datos, `status` = 'COMPLETADO' WHERE `ventas`.`id_venta` = :id_venta;");   // los datos entre :puntos no llvan comillas ''

		$sql->bindParam(":id_venta",$claveVenta);
		$sql->bindParam(":paypal_datos",$RespuestaVenta);
		$sql->execute();

	}else{

		$mensajePaypal="<h3>Upsss hubo un error al pagar, intenta de nuevo!</h3";
	}

 ?>

	 <div class="jumbotron">
 	
	 	<h1 class="display-4">¡Listo!</h1>
	 	<hr class="my-4"> 
	 	<p class="lead"><?php echo $mensajePaypal; ?></p>

	 	<p>Tu fiesta va en camino...</p>

 	</div>
