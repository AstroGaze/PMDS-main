<?php
require 'dbconfig.php';
if ($_SESSION['Rol'] == 5 or $_SESSION['Rol'] == 4 or $_SESSION['Rol'] == 3 or $_SESSION['Rol'] == 2 or $_SESSION['Rol'] == 1 ) {
$pdo = getDB();
$idUser=$_SESSION['myid'];
if($idUser!=null){
  // execute the stored procedure
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
        <link rel="stylesheet" href="css\stylesCitas.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver Doctores</title>
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
                <a class="btn" href="agregarCitas.php">Modificar Citas</a>
                <a href="logout.php" class="btn">cerrar sesion</a>
              </ul>
              </div>
          </nav>
        </header>
        <main>
          <section>
              <h4 class = "center-align">Lista de Doctores</h4>
              <br>
              <br>
              <div class="container">
                  <table class="centered highlight">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Especialidades</th>
                            <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if($_SESSION!=null):
                         while ($row = $stmt->fetch()): ?>
                          <tr>
                              <td><?php echo htmlspecialchars($row['idMedico']) ?></td>
                              <td><?php echo htmlspecialchars($row['Nombre']); ?></td>
                              <td><?php echo htmlspecialchars($row['Apellido']); ?></td>
						                  <td><?php echo htmlspecialchars($row['Usuario']); ?></td>
						                  <td><?php echo htmlspecialchars($row['Especialidades']); ?></td>
                              <td>
                                <?php echo '<a href="editarDoctores.php?idMedico='.$row['idMedico'].'&nombre='.$row['Nombre'].'&apellido='.$row['Apellido'].'&usuario='.$row['Usuario'].'&especialidades='.$row['Especialidades'].'">Editar</a>'?><br>
                                <?php echo '<a class="peligro" href="eliminarDoctores.php?idMedico='.$row['idMedico'].'">Eliminar</a>'?>
                              </td>
                          </tr>
                      <?php endwhile;
                          $stmt->closeCursor();
                          endif;
                      ?>
                      </tbody>
                  </table>
                <br>
                <br>
                <a class="btn color1" href="agregarDoctor.php">Agregar</a>
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
    </body>
</html>
<?php
  } else {
    header("Location: login.php");
  }
 ?>