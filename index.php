<?php
    require 'dbconfig.php';
    $error='';
    $pdo = getDB();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try {         
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
        header("Location: index.php");
    } catch (PDOException $e) {
        die("Error occurred:" . $e->getMessage());
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
    <link rel="stylesheet" href="css/main.css">
    <title>Punto medico de salud</title>
</head>
<body>
    <div class="miContenedor">
        <!-- Barra de navegacion -->
    <header>
        <nav>
            <div class="nav-wrapper">
              <a href="#" class="brand-logo">Punto medico de salud</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Inicio</a></li>
                <li><a href="badges.html">Sobre nosotros</a></li>
                <li><a href="collapsible.html">Consultorio</a></li>
                <li><a href="collapsible.html">Contacto</a></li>
                <li><a href="collapsible.html">Consultorio</a></li>
                <!-- <li><a href="collapsible.html">Iniciar Sesion</a></li> -->
                <li><a class="waves-effect waves-light btn" id="buttonIni" href="login.php">Iniciar Sesion</a></li>
              </ul>
            </div>
        </nav>
    </header>     
    <!--  Inicio o bienvenida -->
    <main>
    <article class="row Inicio">
            <div class="col s12 center-align"><img  src="img/icons/icontrue.png" alt=""></div>
            <div class="center-align container">
                <h1 class="">SEGURIDAD Y FIABLIDAD</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum assumenda excepturi minus officia aspernatur. Enim, assumenda corporis autem dolores id unde repudiandae fugiat ratione modi asperiores earum excepturi, sunt voluptas!</p>
            </div>
            <!-- <div class="col s6 center-align">
                <form class="col s12 center-align" method="post">
                    <div class="row center-align">
                          <div class="row form">
                              <div class="input-field col s12">
                                  <input id="icon_prefix" type="text" class="validate" name="name">
                                  <label for="icon_prefix">Nombre</label>
                              </div>
                          </div>
                          <div class="row form">
                              <div class="input-field col s12">
                                  <input id="icon_prefix" type="text" class="validate" name="lastName">
                                  <label for="icon_prefix">Apellido</label>
                              </div>
                          </div>
                          <div class="row form">
                              <div class="input-field col s12">
                                <input id="icon_email" type="email" class="validate" name="Email">
                                <label for="icon_email">Correo</label>
                              </div>
                          </div>
                          <div class="row form">
                              <div class="input-field col s12">
                                  <input id="MedicoEspe" type="number" class="validate" name="medico">
                                  <label for="MedicEspe">Medico Especialista</label>
                                </div>
                          </div>
                      <button type="submit" class="btn">Agendar</button>
                </form> -->
            <!-- <form class="col s12" method="post">
                  <div class="row">
                        <div class="row form">
                            <div class="input-field col s12">
                                <input id="icon_prefix" type="text" class="validate" name="name">
                                <label for="icon_prefix">Nombre</label>
                            </div>
                        </div>
                        <div class="row form">
                            <div class="input-field col s12">
                                <input id="icon_prefix" type="text" class="validate" name="lastName">
                                <label for="icon_prefix">Apellido</label>
                            </div>
                        </div>
                        <div class="row form">
                            <div class="input-field col s12">
                              <input id="icon_email" type="email" class="validate" name="Email">
                              <label for="icon_email">Correo</label>
                            </div>
                        </div>
                        <div class="row form">
                            <div class="input-field col s12">
                                <input id="MedicoEspe" type="number" class="validate" name="medico">
                                <label for="MedicEspe">Medico Especialista</label>
                              </div>
                        </div>
                    <button type="submit" class="btn">Agendar</button>
                </form> -->
            </div>
    </article>
    <h3 class="center-align">AGENDAR CITA</h3>
    <form class="col s12 container" method="post">
        <div class="row">
            <div class="row form">
                <div class="input-field col s12">
                    <input id="icon_prefix" type="text" class="validate" name="name">
                    <label for="icon_prefix">Nombre</label>
                </div>
            </div>
            <div class="row form">
                <div class="input-field col s12">
                    <input id="icon_prefix" type="text" class="validate" name="lastName">
                    <label for="icon_prefix">Apellido</label>
                </div>
            </div>
            <div class="row form">
                <div class="input-field col s12">
                  <input id="icon_email" type="email" class="validate" name="Email">
                  <label for="icon_email">Correo</label>
                </div>
            </div>
            <div class="row form">
                <div class="input-field col s12">
                    <input id="MedicoEspe" type="number" class="validate" name="medico">
                    <label for="MedicEspe">Medico Especialista</label>
                </div>
            </div>
            <div class="row form">
                <div class="input-field col s12">
                    <input id="hora" type="time" class="validate" name="hora">
                    <label for="hora">hora</label>
                </div>
            </div>
            <div class="row form">
                <div class="input-field col s12">
                    <input id="password" type="date" class="validate" name="fecha">
                    <label for="password">Fecha</label>
                </div>
            </div>
            <div class="center-align">
                <button type="submit" class="btn">Agendar</button>
            </div>
        </div>
    </form>
    <!-- Abaut de la pagina -->
    <section >
        <article class="container center-align" id="sobreNoso">
            <h2>SOBRE NOSOTROS</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro unde sint labore animi deleniti? Cum dolore doloremque cumque recusandae, quos rerum architecto repellendus in iste iusto explicabo quis? Dolores, laboriosam.</p>
        </article>
        <div class="divider"></div>
        <div class="row container" id="espe">
            <article class="col s3 center-align">
                <img src="img/icons/cirujamo2.png" alt="">
                <h3>CIRUGIA GENERAL</h3>
                <p>Realizamos cirugías, manejo de enfermedades por reflujo, hernias, patología urológica, celulitis, colecistitis</p>
            </article>
            <article class="col s3 center-align">
                <img src="img/icons/bisturi2.png" alt="">
                <h3>CIRUGIA DE CORTA ESTANCIA</h3>
                <p>Vasectomía sin bisturí, biopsia de piel, de mama, axilares, exéresis de lesiones de piel, quistes, entre otros</p>
            </article>
            <article class="col s3 center-align">
                <img src="img/icons/sangre2.png" alt="">
                <h3>MEDICINA GENERAL</h3>
                <p>Manejo de pacientes con enfermedades crónico-degenerativas, planificación familiar y más procedimientos.</p>
            </article>
            <article class="col s3 center-align">
                <img src="img/icons/medicina2.png" alt="">
                <h3>ANALISIS CLINICOS</h3>
                <p>Pruebas de sangre, orina, biométrica, hepática, glucosa, triglicéridos, covid, entre otros..</p>
            </article>
        </div>
        <div class="divider"></div>
    </section>
    <!-- Agendar una cita -->
    <!-- <section class="container">
        <h2 class="center-align">AGENDAR UNA CITA</h2>
        <div class="row">
            </div>
    </section> -->

    <!-- Contacto -->
    <section class="section">
        <h2 class="center-align">CONTACTO</h2>
        <div class="row container">
                <form class="col s6" action="">
                    <div class="input-field">
                        <input type="text"  id="Name" class="validate">
                        <label for="icon_prefix">NOMBRE</label>
                    </div>
                    <div class="input-field">
                        <input type="email"  id="email" class="validate">
                        <label for="icon_prefix">CORREO ELECTRONICO</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="" id="message" class="validate">
                        <label for="icon_prefix">MENSAJE</label>
                    </div >
                    <div class="center-align">
                        <a class="waves-effect waves-light btn" id="buttonAge" >ENVIAR</a>
                    </div>
                </form>
            <div class="col s6 center-align margin">
                <div class="contactText">
                    <p>Cualquiera duda contactanos</p>
                    <p><a href=""><img class="Icon" src="img/icons/whatsapp.png" alt=""></a>Tel. 55 5555 5555</p>
                    <p><strong>Dr. Sebastian Ortegon</strong></p>
                    <p><a href=""><img class="Icon" src="img/icons/whatsapp.png" alt=""></a>Tel. 55 5555 5555</p>
                    <p><strong>Dr. Nestor Rodriguez Salgado</strong></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
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
   <!--Scrips-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>