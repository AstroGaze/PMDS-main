<?php
  require_once 'dbconfig.php';
  $pdo = getDB();
  $error='';
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //tomar los datos de html
    $myUser=$_POST['user'];
    $myPass=$_POST['contra'];
    //se busca el usuario con la funcion ValidadorUsuario
    $sql = 'call u157913818_PMDS.ValidadorUsuario(?,?)';

    $myPass=sha1($myPass,false);

    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(1,$myUser,PDO::PARAM_STR,10);
    $stmt->bindParam(2,$myPass,PDO::PARAM_STR,128);
    $stmt->execute();
    $row = $stmt->fetch();

    if($row!=null){
      if($myUser==$row['Usuario'] and $myPass==$row['Contrasena']){
        #TODO: Esto es para el crecimiento posterior a la entrega del proyecto
        #Esto es para diferenciar las sessiones que hay entre la page
        $_SESSION['Rol'] = $row['Especialidades'];
        $_SESSION['sessionname']='Doctor';
        $_SESSION['myusername']=$myUser;
        $_SESSION['myname']=$row['Nombre'];
        $_SESSION['myid']=$row['idMedico'];
        header("Location: welcome.php");
      }
      else{
        $error = "Your Login Name or Password is invalid";
      }
    }
    else{
      $error = "Your Login Name or Password is invalid";
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="css\styles.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login PMDS</title>
    </head>
    <body class="color5">
        <header>
            <nav class="color1">
              <div class="nav-wrapper color1 container">
              <a href="#" class="brand-logo"><img src="18191719951636437598.svg" alt=""></a>
              <ul id="nav-mobile" class="left hide-on-large-onl">
                  <li><a href="index.php" class="white-text"><strong>Inicio de sesion para Especialistas</strong></a></li>
              </ul>
              </div>
          </nav>
        </header>
        <main>
          <section>
                <br>
                <br>
                <div class="flexcontainer">
                  <div class="colorOpa center-align" id="iniciarSesion">
                    <div>
                        <div class="center-align">
                          <img src="img\icons\cirujamo2.png" alt="" class="img-icon">
                        </div>
                        <h4 class = "center-align">Iniciar Sesion</h4>
                    </div>
                    <br>
                    <br>
                    <div class="container">
                        <form action="" method="post">
                          <div class="input-field col s12">
                            <input id="usuario" type="text" class="validate" name="user">
                            <label for="usuario">Usuario</label>
                          </div>
                          <div class="input-field col s12">
                            <input id="contra" type="password" class="validate" name="contra">
                            <label for="contra">Contraseña</label>
                          </div>
                          <div class="error"><?php echo $error; ?></div>
                          <br>
                          <button class="btn color1" type="submit" name="ingresar">Ingresar</button>
                        </form>
                        <button class="btn color1 btnm" type="submit" name="ingresar" onclick="Btnpress()">Administrador</button>
                    </div>
                  </div>
                  <div class="colorOpa center-align" id="iniciarSesionAdmin">
                    <div>
                        <div class="center-align">
                          <img src="img\icons\cirujamo2.png" alt="" class="img-icon">
                        </div>
                        <h4 class = "center-align">Iniciar Sesion como Administrador</h4>
                    </div>
                    <br>
                    <br>
                    <div class="container">
                        <form action="" method="post">
                          <div class="input-field col s12">
                            <input id="usuarioAdmin" type="text" class="validate" name="user">
                            <label for="usuario">Usuario</label>
                          </div>
                          <div class="input-field col s12">
                            <input id="contraAdmin" type="password" class="validate" name="contra">
                            <label for="contra">Contraseña</label>
                          </div>
                          <div class="error"><?php echo $error; ?></div>
                          <br>
                          <button class="btn color1" type="submit" name="ingresar">Ingresar</button>
                        </form>
                        <button class="btn color1 btnm" type="submit" name="ingresarAdmin" onclick="Btnpress()">Regresar</button>
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
        <script>
          pressed = true;
          let minus = 6;
          function Btnpress() {
            if (pressed === true) {
              console.log("Hi")
              document.getElementById('iniciarSesion').style.display = "none";
              document.getElementById('iniciarSesionAdmin').style.display = "block";
              pressed = false;
            
            } else {
              console.log("you did it!");
              document.getElementById('iniciarSesion').style.display = "block";
              document.getElementById('iniciarSesionAdmin').style.display = "none";
              pressed = true;
            }
          
          }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>

<!-- tipo de consultas
    Medico
    L Mi agenda  r Agendar 
-->