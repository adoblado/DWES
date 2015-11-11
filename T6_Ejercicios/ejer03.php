<!DOCTYPE html>
<!--
Ejercicio 3. 
Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. Utiliza sesiones.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
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
          <span class="numeroEjer">Ejercicio 3</span>
          <?php
            session_start();
            
            $contador =& $_SESSION['contador'];
            $suma =& $_SESSION['suma'];
            
            if(isset($contador)) {
              $contador++;
            } else {
              $contador = 0;
              $suma = 0;
            }
            
            $numIntro = $_REQUEST['intro'];
            $suma += $numIntro;
            if ($suma <= 10000) {
          ?> 
              <form action="ejer03.php" method="post">
                Número <?= ($contador + 1) ?>: <input type="number" name="intro" size="1" autofocus>
                <input type="submit" value="Enviar">
              </form>
          <?php
            } else { 
              echo "<br>Has introducido ", $contador, " números.<br>";
              echo "La suma total de todos los números es ", $suma, ".<br>";
              echo "Y la media es ", ($suma/$contador), ".";
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer02.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer04.php">Siguiente</a></div>
    </footer>
  </body>
</html>