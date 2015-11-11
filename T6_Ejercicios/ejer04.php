<!DOCTYPE html>
<!--
Ejercicio 4. 
Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
con un nombre de usuario y contraseña correctos. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      article div {
        text-align: center;
        width: 50%;
        margin: 0 auto;
      }
      article div form {
        text-align: left;
        width: 50%;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <a href="indexTema6.html"><header>
      <h1>Ejercicios Tema 6</h1>
    </header></a>
    <nav>
      <a href="ejer01.php"><span>Ejercicio 01</span></a>
      <a href="ejer02.php"><span>Ejercicio 02</span></a>
      <a href="ejer03.php"><span>Ejercicio 03</span></a>
      <a href="ejer04.php"><span>Ejercicio 04</span></a>
      <a href="ejer05.php"><span>Ejercicio 05</span></a>
      <a href="ejer06.php"><span>Ejercicio 06</span></a>
      <a href="ejer07.php"><span>Ejercicio 07</span></a>
      <a href="ejer08.php"><span>Ejercicio 08</span></a>
      <a href="ejer09.php"><span>Ejercicio 09</span></a>
    </nav>
    <section>
      <div id="contenedor">
        <article>
          <span class="numeroEjer">Ejercicio 4</span>
          <div>
          <?php
            session_start();
            
            //recojo los intentos de SESSION
            $intentos =& $_SESSION['intentos'];
            
            //tengo el array asociativo de usuarios permitidos
            $permitidos = [
              "usuario" => "usuario",
              "alumno" => "alumno", 
              "adolfi" => "adolfi",
            ];
            
            //si existe intentos, lo decremento. Si no, es 5
            if(!isset($intentos)) {
              $intentos = 5;
            }
            
            //función para mostrar el formulario
            function muestraForm() {
          ?> 
              <form action="ejer04.php" method="post">
                Usuario: <input type="text" name="nickIntro" autofocus size="7"><br>
                Contraseña: <input type="password" name="passIntro" size="7"><br>
                <input type="submit" name="enviar" value="Enviar">
                <input type="reset" value="Limpiar campos">
              </form>
          <?php
            }
            
            //recojo la información del formulario
            $enviar = $_REQUEST['enviar'];
            
            if ($enviar) {
              $nick = $_REQUEST['nickIntro'];
              $pass = $_REQUEST['passIntro'];
              
              //si el nick introducido es permitido, compruebo la contraseña
              if ($permitidos[$nick]) {
                //si la contraseña es OK, envío a la página de google
                if ($permitidos[$nick] == $pass) {
                  echo "<h4>Usuario y contraseña correctos</h4>";
                  header("refresh:1; url='../../Tema5/EjerciciosT5/ejer14.php'");
                } else {
                  //si no, compruebo los intentos
                  echo "<h4>Usuario correcto, pero contraseña incorrecta</h4>";
                  $intentos--;
                  if ($intentos > 0) {
                    //si quedan intentos, muestro el formulario
                    echo "<h4>Te quedan $intentos intentos</h4>";
                    muestraForm();
                  } else {
                    //si no, no muestro nada
                    echo "<h4>Se han acabado los intentos</h4>"; 
                  }
                }
              } else {
                //si el usuario es incorrecto, compruebo los intentos
                echo "<h4>Usuario incorrecto</h4>";
                $intentos--;
                if ($intentos > 0) {
                  //si quedan intentos, muestro el formulario
                  echo "<h4>Te quedan $intentos intentos</h4>";
                  muestraForm();
                } else {
                  //si no, no muestro nada
                  echo "<h4>Se han acabado los intentos</h4>"; 
                }
              }
            } else {
              echo "<h4>Introduce tu usuario y tu contraseña</h4>";
              echo "<h4>Tienes $intentos intentos</h4>";
              muestraForm();
            }
          ?>
          </div>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer03.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer05.php">Siguiente</a></div>
    </footer>
  </body>
</html>