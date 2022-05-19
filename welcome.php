<?php
  include('dbconfig.php');
  if ($_SESSION['Rol'] == 5 or $_SESSION['Rol'] == 4 or $_SESSION['Rol'] == 3 or $_SESSION['Rol'] == 2 or $_SESSION['Rol'] == 1 ) {
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="css\stylesWelcome.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido</title>
    </head>
    <body class="color5">
        <header>
            <nav class="color1">
              <div class="nav-wrapper color1 container">
              <a href="#" class="brand-logo"><img src="18191719951636437598.svg" alt=""></a>
              <ul id="nav-mobile" class="left hide-on-large-onl">
                  <li><a href="#" class="white-text"><strong>Sesion iniciada para Especialista</strong></a></li>
              </ul>
              <ul id="nav-mobile" class="right hide-on-large-onl">
                <a href="logout.php" class="btn">cerrar sesion</a>
            </ul>
              </div>
          </nav>
        </header>
        <main>
            <h4 class = "center-align" id="Bienvenida">Bienvenido Dr. <?php echo $_SESSION['myname'];?></h4>
            <div class="flexContainer">
                <div class="card center-align">
                    <h5>VER CITAS</h5>
                    <p>Ingresar para ver las citas en espera.</p>
                    <a class="waves-effect color1 btn" href="verCitas.php">Ver Citas</a>
                </div>
                <?php 
                  if ($_SESSION['Rol'] == 5) {

        
                ?>
                <div class="card center-align">
                    <h5>REGISTRAR DOCTOR</h5>
                    <p>Ingresar informacion necesaria para dar de alta un Doctor.</p>
                    <a class="waves-effect color1 btn" href="agregarDoctor.php">AGREGAR</a>
                </div>
                <?php 
                } ?>
                <div class="card center-align">
                    <h5>AGENDAR CITAS</h5>
                    <p>Eleccion de para modificar, agendar, eliminar y cambiar citas.</p>
                    <a class="waves-effect color1 btn" href="agregarCitas.php">Modificar</a>
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
 <?php
  } else {
    header("Location: login.php");
  }
 ?>