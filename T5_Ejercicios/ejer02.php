<!DOCTYPE html>
<!--
Ejercicio 2. 
Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos
junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente. 
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
      table {
        text-align: center;
        width: 60%;
        margin: 0 auto;
      }
      table, th, td {
        border: 1px solid black;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Ejercicios Tema 5</h1>
    </header>
    <nav>
      <a href="ejer01.php"><span>Ejer 01</span></a>
      <a href="ejer02.php"><span>Ejer 02</span></a>
      <a href="ejer03.php"><span>Ejer 03</span></a>
      <a href="ejer04.php"><span>Ejer 04</span></a>
      <a href="ejer05.php"><span>Ejer 05</span></a>
    </nav>
    <section>
      <div id="contenedor">
        <article>
          <span class="numeroEjer">Ejercicio 2</span>
          <?php
            $cantNums = isset($_REQUEST['cantidadNums']) ? $_REQUEST['cantidadNums'] : 0;
            $numsString = $_REQUEST['numeros'];
            $numIntro = $_REQUEST['intro'];
            
            if ($cantNums < 10) {
              $cantNums++;
          ?>
              <form action="#" method="get">
                Inserte número <input type="number" name="intro" autofocus="autofocus"><br>
                <input type="hidden" name="cantidadNums" value="<?=$cantNums?>">
                <input type="hidden" name="numeros" value="<?=$numsString.' '.$numIntro?>">
                <input type="submit" name="aceptar" value="Aceptar">
              </form>
          <?php
            } else {
              $numsString = $numsString . " " . $numIntro;
              $numsString = trim($numsString);
              //almaceno los números en un array
              $arrayNums = explode(" ", $numsString);
              
              //localizo el máximo y el mínimo
              $maximo = -99999;
              $minimo = PHP_INT_MAX;
              foreach ($arrayNums as $cadaNumero) {
                if ($cadaNumero < $minimo) {
                  $minimo = $cadaNumero;
                } else if ($cadaNumero > $maximo) {
                  $maximo = $cadaNumero;
                  
                }
              }
              
              //muestro todo
              echo "<table>";
              foreach ($arrayNums as $cadaNumero) {
                echo "<tr><td>$cadaNumero</td>";
                if ($cadaNumero == $minimo) {
                  echo "<td>Mínimo</td></tr>";
                } else if ($cadaNumero == $maximo) {
                  echo "<td>Máximo</td></tr>";
                } else {
                  echo "<td></td></tr>";
                }
              }
              echo "</table>";
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