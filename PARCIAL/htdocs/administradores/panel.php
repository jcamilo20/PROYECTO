<?php
  session_start();
   require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT PK_admin, email, nombre, password FROM TBL_administradores WHERE PK_admin = :PK_admin');
    $records->bindParam(':PK_admin', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<?php
  require 'database.php';
  $message = '';
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['departamento']) && !empty($_POST['ciudad']) && !empty($_POST['direccion']) && !empty($_POST['celular']) && !empty($_POST['especialidad'])) {
    $sql = "INSERT INTO TBL_tiendas (FK_admin, email, password, nombre, departamento, ciudad, direccion, celular, especialidad) VALUES ({$_SESSION['user_id']},:email, :password, :nombre, :departamento, :ciudad, :direccion, :celular, :especialidad)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':departamento', $_POST['departamento']);
    $stmt->bindParam(':ciudad', $_POST['ciudad']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':celular', $_POST['celular']);
    $stmt->bindParam(':especialidad', $_POST['especialidad']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {

      $message = "<script>alert('USUARIO CREADO EXITOSAMENTE')</script>";

    } else {
      $message = 'ha ocurrido un error';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="assets/css/registro.css">

  <title>PANEL</title>
  </style>
</head>
<body>
<?php if(!empty($user)): ?>
      <a href="../administradores/logout.php">
        Cerrar Sesi&oacute;n
      </a>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="../imagenes/iconpanel.png" alt=""/>
                        <h3>Panel de Plataforma</h3>
                        <p>Desde aqui puedes ver, analizar y realizar cambios que consideres para mejorar el rendimiento de la plataforma.</p>
                    </div>
                    <div class="col-md-9 register-right">
                       <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estadisticas</a>
                            </li>
                        </ul>

                        <form id="register-form" action="panel.php" method="POST" oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "La contraseña no coincide." : "")'>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">AGREGAR NUEVA TIENDA</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre *" required />
                                        </div>


                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Correo *" required />
                                        </div>

                                         <div class="form-group">
                                            <input type="text"  name="departamento" class="form-control" placeholder="Departamento *" required />
                                        </div>

                                         <div class="form-group">
                                            <input type="text"  name="ciudad" class="form-control" placeholder="Ciudad *" required />
                                        </div>

                                         <div class="form-group">
                                            <input type="text"  name="direccion" class="form-control" placeholder="Direccion *" required />
                                        </div>


                                         </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <input type="number" name="celular" maxlength="10" minlength="10" class="form-control" placeholder="Celular *" required />
                                        </div>

                                        <div class="form-group">
                                            <select name="especialidad" class="form-control" required>
                                                <option class="hidden" selected disabled>Especialidad</option>
                                                <option>PANADERIA/PASTELERIA</option>
                                                <option>BEBIDAS/LICORES/SNACKS</option>
                                                <option>DECORACIÓN</option>
                                                <option>EQUIPOS MUSICALES</option>
                                                <option>MUEBLES</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Contrase&ntilde;a *" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar Contrase&ntilde;a *" required />
                                        </div>
                    
                                        <input type="submit" class="btnRegister"  value="Agregar"/>
                                    </div>
                                </div>
                            </div>
                            </form>
                                    



                   <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Proximamente</h3>
                                
                        </div>
                    </div>
                </div>



            </div>

        <!-- Enlace archivos de Boostrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


      <!-- Validacion de formulario -->
<script src="js/registro.js"></script>


<!-- Enlace archivos de sweet alert -->
<script src='//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js'></script><script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script><script src='https://cdn.jsdelivr.net/npm/promise-polyfill'></script>

<?php 

else: ?>
      <h1>Para ver el contenido de esta pagina por favor Inicie Sesi&oacute;n</h1>

      <a href="../administradores/login.php">Iniciar Sesi&oacute;n</a>
    <?php endif; ?>

</body>
</html>