<?php
    require 'dbconfig.php';
    $error='';
    $pdo = getDB();
    $idUser=$_SESSION['myid'];
    if($_SESSION!=null){
        if($_SERVER["REQUEST_METHOD"] == "POST" and $idUser!=null){
            //$del=$_POST['eliminarCita'];

            //$sql = 'call u157913818_PMDS.DelCita(?)';
            //$stmt=$pdo->prepare($sql);
            //$stmt->bindParam(1,$del,PDO::PARAM_INT);
            //$stmt->execute();
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css\modiCitas.css">
    <title>Eliminar</title>
</head>
<body class="center">
    <header>
      <nav class="color1">
          <div class="nav-wrapper color1 container">
          <a href="#" class="brand-logo"><img src="18191719951636437598.svg" alt=""></a>
          <ul id="nav-mobile" class="left hide-on-large-onl">
            <li><a href="welcome.php" class="white-text"><strong>Punto Medico de Salud</strong></a></li>
          </ul>
          <ul id="nav-mobile" class="right hide-on-large-onl">
            <a class="btn" href="verCitas.php">Ver Citas</a>
            <a href="logout.php" class="btn">cerrar sesion</a>
          </ul>
          </div>
      </nav>
    </header>

    <main class="">
        <div id="Eliminar">
            <div class="center-align">
                <h2 class="h2">Editar Doctores</h2>
            </div>
            <div class="row">
              <form class="col s12" method="POST">
                <div class="row">
                  <div class="input-field col s12 offset-m4 m4">
                    <?php 
                    if(isset($_GET['idMedico'])){
                      echo '
                      <input id="disabled" value="'.$_GET['idMedico'].'" type="number" name="eliminarCita">
                      <label for="disabled">Numero de Doctor</label>
                      ';
                    }
                    else{
                      echo '<h2 class="peligro">Ocurrio un error, por favor, cierre sesion</h2>';
                    }
                    ?>
                  </div>
                  <div class="input-field col s12 m6">
                        <?php 
                            if(isset($_GET['nombre'])){
                              echo '
                                <input id="disabled" value="'.$_GET['nombre'].'" type="text" name="name">
                                <label for="disabled">Nombre</label>
                              ';
                            }
                            else{
                              echo '<h2 class="peligro">Ocurrio un error, por favor, cierre sesion</h2>';
                        }
                        ?>
                        
                  </div>
                  <div class="input-field col s12 m6">
                        <?php 
                            if(isset($_GET['apellido'])){
                              echo '
                                <input id="disabled" value="'.$_GET['apellido'].'" type="text" name="lastName">
                                <label for="disabled">Apellido</label>
                              ';
                            }
                            else{
                              echo '<h2 class="peligro">Ocurrio un error, por favor, cierre sesion</h2>';
                        }
                        ?>
                  </div>
                  <div class="input-field col s12 m6">
                        <?php 
                            if(isset($_GET['usuario'])){
                              echo '
                                <input id="disabled" value="'.$_GET['usuario'].'" type="text" name="usuario">
                                <label for="disabled">Usuario</label>
                              ';
                            }
                            else{
                              echo '<h2 class="peligro">Ocurrio un error, por favor, cierre sesion</h2>';
                        }
                        ?>
                  </div>
                  <div class="input-field col s12 m6">
                        <?php 
                            if(isset($_GET['especialidades'])){
                              echo '
                                <input id="disabled" value="'.$_GET['especialidades'].'" type="number" name="especialidad">
                                <label for="disabled">Especialidad</label>
                              ';
                            }
                            else{
                              echo '<h2 class="peligro">Ocurrio un error, por favor, cierre sesion</h2>';
                        }
                        ?>
                  </div>
                </div>
                <button type="submit" class="btn"  name="Button">Editar</button>
                <a class="btn" href="verDoctores.php">Cancelar</a>
              </form>
            </div>
        </div>
    </main>

    <footer class="page-footer color1">
          <div class="center-align">
            <div class="col l6 s12">
              <h5 class="white-text">Punto Medico de Salud</h5>
              <p class="grey-text text-lighten-4">Dr. Sebastian Ortegon</p>
              <p class="grey-text text-lighten-4">Dr. Nestor Rodriguez Salgado</p>
          </div>
          <div class="col l4 offset-l2 s12">
          <div class="footer-copyright color1">
            <div class="container">
              @ 2022 Copyright
            </div>
          </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>