<!DOCTYPE html>
<!--
Ejercicio 1. 
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
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
          <span class="numeroEjer">Ejercicio 1</span>
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
            
            //recojo los datos del formulario
            $numIntro = isset($_REQUEST['intro']) ? $_REQUEST['intro'] : 0;
            
            if ($numIntro >= 0) {
              $suma += $numIntro;
          ?> 
              <form action="#" method="post">
                Número <?= $contador ?>: <input type='number' name='intro' size='1' autofocus>
                <button>Enviar</button>
              </form>
          <?php
            } else { 
              echo "<br>Has introducido ", ($contador - 1), " números.<br>";
              echo "La suma de todos tus números es ", $suma, ".<br>";
              echo "Y la media es ", ($suma/($contador - 1)), ".";
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="siguiente"><a href="ejer02.php">Siguiente</a></div>
    </footer>
  </body>
</html>