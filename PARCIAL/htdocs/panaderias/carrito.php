<?php
define("KEY", "ACDBESJKFF82232291SD9SAD");
define("COD", "AES-128-ECB");
?>

<?php

session_start();





$mensaje="";



if (isset($_POST['btnAction'])) {
	switch ($_POST['btnAction']) {
		
		case 'Agregar':
			
			if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
				
				$ID=openssl_decrypt($_POST['id'], COD, KEY);
			}else{
				$mensaje.="Upss hay un problema al planear tu party!";
			}

			if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
				$NOMBRE=openssl_decrypt($_POST['nombre'], COD, KEY);
			}else{
				$mensaje.="Upss hay un problema al planear tu party!"; break;
			}

			if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
				$CANTIDAD=openssl_decrypt($_POST['cantidad'], COD, KEY);
				$CAMBIO=$_POST['cambio'];
				$CANTIDAD=$CAMBIO;

			}else{
				$mensaje.="Upss hay un problema al planear tu party!"; break;
			}

			if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
				$PRECIO=openssl_decrypt($_POST['precio'], COD, KEY);

			}else{
				$mensaje.="Upss hay un problema al planear tu party!"; break;
			}


			if (!isset($_SESSION['CARRITO'])) {
				
				$producto=array(
					'ID'=>$ID,
					'NOMBRE'=>$NOMBRE,
					'CANTIDAD'=>$CANTIDAD,
					'PRECIO'=>$PRECIO
				);
				$_SESSION['CARRITO'][0]=$producto;
				$mensaje= "Producto agregado al carrito";
			}else{

				$id_Productos=array_column($_SESSION['CARRITO'], "ID");

				if(in_array($ID, $id_Productos)){

					echo"<script>alert('El producto ya ha sido seleccionado');</script>";
					$mensaje="";
				}else{

				$Numero_Productos=count($_SESSION['CARRITO']);

				$producto=array(
					'ID'=>$ID,
					'NOMBRE'=>$NOMBRE,
					'CANTIDAD'=>$CANTIDAD,
					'PRECIO'=>$PRECIO
				);
				$_SESSION['CARRITO'][$Numero_Productos]=$producto;
				$mensaje= "Producto agregado al carrito";
			} 
		}

			//$mensaje=print_r($_SESSION, true);



			break;

			case "Eliminar":
				if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
					$ID=openssl_decrypt($_POST['id'], COD, KEY);

					foreach ($_SESSION['CARRITO'] as $indice => $producto) {
						if ($producto['ID']==$ID) {
							unset($_SESSION['CARRITO'][$indice]);
							echo "<script>alert('Elemento borrado...');</script>";
						}
					}
				}else{
					$mensaje.="Upss hay un problema al planear tu party!"; break;
				}
				break;
	}
}

?>