<!DOCTYPE html>
<!--
Ejercicio 2. 
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
en el cómputo. Utiliza sesiones.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
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
          <span class="numeroEjer">Ejercicio 2</span>
          <?php
            session_start();
            
            $contador =& $_SESSION['contador'];
            $mayorPares =& $_SESSION['mayorPares'];
            $contadorImpares =& $_SESSION['contadorImpares'];
            $sumaImpares =& $_SESSION['sumaImpares'];
            
            if(isset($contador)) {
              $contador++;
            } else {
              $contador = 0;
              $mayorPares = 0;
              $sumaImpares = 0;
              $contadorImpares = 0;
            }
            
            //recojo los datos del formulario
            $numIntro = $_REQUEST['intro'];
            
            if ($numIntro >= 0) {
              if (($numIntro % 2) == 0) {
                if ($numIntro > $mayorPares) {
                  $mayorPares = $numIntro;
                }
              } else {
                $sumaImpares += $numIntro;
                $contadorImpares++;
              }
          ?> 
              <form action="ejer02.php" method="post">
                Número <?= ($contador + 1) ?>: <input type="number" name="intro" size="1" autofocus>
                <input type="submit" value="Enviar">
              </form>
          <?php
            } else { 
              echo "<br>Has introducido ", ($contador - 1), " números.<br>";
              echo "El mayor de tus números pares es ", $mayorPares, ".<br>";
              echo "Y la media de los impares es ", ($sumaImpares/$contadorImpares), ".";
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer01.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer03.php">Siguiente</a></div>
    </footer>
  </body>
</html>