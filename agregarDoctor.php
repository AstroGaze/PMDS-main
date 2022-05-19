<?php
    require 'dbconfig.php';
    if ($_SESSION['Rol'] == 5 or $_SESSION['Rol'] == 4 or $_SESSION['Rol'] == 3 or $_SESSION['Rol'] == 2 or $_SESSION['Rol'] == 1 ) {
    if($_SESSION!=null){
      $error='';
      $pdo = getDB();
      $idUser=$_SESSION['myid'];
    if($_SERVER["REQUEST_METHOD"] == "POST" and $idUser!=null){
        $Button=$_POST['Button'];
        switch ($Button) {
            case 'agregar':
              $name=$_POST['name'];
              $lname=$_POST['lastName'];
              $usuario=$_POST['usuario'];
              $contrasena=$_POST['contrasena'];
              $especialidad= $_POST['especialidad'];
              //asignar llamada de funcion o procedure
              $sql = 'call u157913818_PMDS.CreateMedico(?,?,?,?,?)';
              $contrasena = sha1($contrasena,false);
              $stmt=$pdo->prepare($sql);
              //pase de datos
              $stmt->bindParam(1,$name,PDO::PARAM_STR,20);
              $stmt->bindParam(2,$lname,PDO::PARAM_STR,20);
              $stmt->bindParam(3,$usuario,PDO::PARAM_STR,20);
              $stmt->bindParam(4,$contrasena,PDO::PARAM_STR,128);
              $stmt->bindParam(5,$especialidad,PDO::PARAM_INT);
              //ejecutar procedure
              $stmt->execute();
              $stmt->closeCursor();
                break;
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="css\modiCitas.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body class="color5">
        <header>
          <nav class="color1">
              <div class="nav-wrapper color1 container">
              <a href="#" class="brand-logo"><img src="18191719951636437598.svg" alt=""></a>
              <ul id="nav-mobile" class="left hide-on-large-onl">
                <li><a href="welcome.php" class="white-text"><strong>Punto Medico de Salud</strong></a></li>
              </ul>
              <ul id="nav-mobile" class="right hide-on-large-onl">
                <a class="btn" href="verCitas.php">Ver Citas</a>
                <a class="btn" href="verDoctores.php">Ver Doctores</a>
                <a href="logout.php" class="btn">cerrar sesion</a>
              </ul>
              </div>
          </nav>
        </header>
        <main>
          <section class="container">
          
              <h4 class = "center-align">AGREGAR DOCTOR</h4>
              <br>
              <br>
                </div>
                <!-- Agregar cita -->
                  <div id="Agregar">
                    <div class="row">
                      <form class="col s12" method="POST">
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="name">
                            <label for="first_name">Nombre</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="lastName">
                            <label for="last_name">Apellido</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s4">
                            <input id="disabled" type="text" name="usuario">
                            <label for="disabled">Usuario</label>
                          </div>
                          <div class="input-field col s7">
                            <input id="disabled" type="password" class="validate" name="contrasena">
                            <label for="disabled">Contraseña</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="password" type="number" class="validate" name="especialidad">
                            <label for="password">Especialidad</label>
                          </div>
                        </div>
                        <button type="submit" class="btn" name="Button" value="agregar">Agregar</button>
                      </form>
                    </div>
                  </div>
                </div>
          </section>
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
        <script>
          document.addEventListener("DOMContentLoaded", function(){
            const myTabs = document.querySelector('.tabs');
            M.Tabs.init(myTabs, {});
          })
        </script>
    </body>
</html>
<?php
  } else {
    header("Location: login.php");
  }
 ?>
