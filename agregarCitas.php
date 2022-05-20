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
              $mail=$_POST['Email'];
              $fecha=$_POST['fecha'];
              $hora= $_POST['hora'];
              $medico=$_POST['medico'];
              //asignar llamada de funcion o procedure
              $sql = 'call u157913818_PMDS.CreateCita(?,?,?,?,?,?)';
              $stmt=$pdo->prepare($sql);
              //pase de datos
              $stmt->bindParam(1,$name,PDO::PARAM_STR,20);
              $stmt->bindParam(2,$lname,PDO::PARAM_STR,20);
              $stmt->bindParam(3,$mail,PDO::PARAM_STR,20);
              $stmt->bindParam(4,$fecha,PDO::PARAM_STR);
              $stmt->bindParam(5,$hora,PDO::PARAM_STR,10);
              $stmt->bindParam(6,$medico,PDO::PARAM_INT);
              //ejecutar procedure
              $stmt->execute();
              $stmt->closeCursor();
                break;
        }
    }
    $miCita=array();
    $sql = 'call u157913818_PMDS.getDoctores();';
    $stmt=$pdo->prepare($sql);
    /* $stmt->bindParam(1,$idUser,PDO::PARAM_INT); */
    $stmt->execute();
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
        <title>Agregar Citas</title>
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
                <a href="logout.php" class="btn">cerrar sesion</a>
              </ul>
              </div>
          </nav>
        </header>
        <main>
          <section class="container">
          
              <h4 class = "center-align">CREAR CITAS</h4>
              <br>
              <br>
                <!-- Agregar cita -->
                  <div id="Agregar">
                    <div class="row">
                      <form class="col s12" method="POST">
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate" name="name">
                            <label for="first_name">Primer Nombre</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="lastName">
                            <label for="last_name">Apellido</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s4">
                            <select name="medico">
                              <?php
                                echo '<option value="" disabled selected>Choose your option</option>';
                                while ($row = $stmt->fetch()): ?>
                                  <option value="<?php echo htmlspecialchars($row['idMedico']);?>"><?php echo 'Dr. '.htmlspecialchars($row['Nombre']); ?></option>
                                  <?php endwhile;
                                    $stmt->closeCursor();
                                  ?>
                            </select>
                            <label>Doctor</label>
                          </div>
                          <div class="input-field col s4">
                            <input id="disabled" type="email" class="validate" name="Email">
                            <label for="disabled">Correo Electronico</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="password" type="date" class="validate" name="fecha">
                            <label for="password">Fecha</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="hora" type="time" class="validate" name="hora">
                            <label for="hora">hora</label>
                          </div>
                        </div>
                        <button type="submit" class="btn" name="Button" value="agregar">Agregar</button>
                      </form>
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
        <script type="text/javascript">
          document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
          });
        </script>
        
    </body>
</html>
<?php
  } else {
    header("Location: login.php");
  }
 ?>