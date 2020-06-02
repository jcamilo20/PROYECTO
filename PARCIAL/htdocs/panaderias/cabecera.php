<!DOCTYPE html>
<html>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" type="text/css" href="../css/footer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <meta charset="utf-8">
   <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:400,700'>
   <link rel="stylesheet" type="text/css" href="../css/prueba.css">
   <title>Planea Tu Party</title>
   <style type="text/css">
      
      .card{
         margin-top: 15%;
      }
   </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #56B2D4;">
         <a class="navbar-brand" href="#">
         <img src="../imagenes/logo4.png">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="../Home.html" style="color:#FFFFFF";>Inicio <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" style="color:#FFFFFF" href="../panaderias/mostrarCarrito.php">Carrito(<?php 
                     echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                     
                     ?>)<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FFFFFF";>
                  Servicios
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href="#">Servicio #1</a>
                     <a class="dropdown-item" href="#">Servicio #2</a>
                     <a class="dropdown-item" href="#">Servicio #3</a>
                  </div>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#" style="color:#FFFFFF";>Soporte</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#" style="color:#FFFFFF";>Sobre Nosotros</a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container">