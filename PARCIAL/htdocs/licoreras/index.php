<?php

include '../panaderias//conexion.php';
include '../panaderias/carrito.php';
include '../panaderias/cabecera.php';
?>


   <br>
   <?php  if($mensaje!="") { ?>
   <div class="alert alert-success">
      <?php echo $mensaje; ?>
      <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
   </div>
   <?php } ?>

   <div class="row">
      <?php
      $sql=$pdo->prepare("SELECT * FROM productos WHERE id_tienda_01='2'");  // TRAE TODO SEGUN EL ID DE LA TIENDA 
      $sql->execute();
      $lista_Productos=$sql->fetchAll(PDO::FETCH_ASSOC);
      //print_r($lista_Productos);
      ?>
      <?php foreach($lista_Productos as $producto){ ?>

          <div class="col-3">
         <div class="card mb-3">
            <img class="card-img-top" height="317px" src="data:image/jpg;base64, <?php echo base64_encode($producto['imagen']); ?>" >
            <div class="card-body">
               <span><?php echo $producto['nombre'];?></span>
               <h5 class="card-title"><?php echo number_format($producto['precio'],0);?></h5>
               <p class="card-text"><?php echo $producto['descripcion'];?></p>

               <form action="" method="post">

                   <div class="form-group">
    <label for="exampleInputEmail1">Cantidad</label>
    <input type="number" min="1" max="100" step="1" class="form-control" required name="cambio" id="cambio">
  </div> 

                  <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_producto'], COD, KEY);?>">
                  <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY);?>">
                  <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY);?>">
                  <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                  
               


               <button class="btn btn-outline-info" name="btnAction" value="Agregar"type="submit">Agregar al carrito</button>
            </form>
            </div>
         </div>
      </div>

      <?php } ?>

   </div>

     
      <!-- ./Footer -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
   include '../panaderias/footer.php';
?>