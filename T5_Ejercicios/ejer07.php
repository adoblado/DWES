<!DOCTYPE html>
<!--
Ejercicio 7. 
Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
si es necesario. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article {
        overflow: hidden;
      }
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      table {
        width: 30%;
        margin: 0 auto;
        text-align: center;
      }
      table#izq {
          float: left;
      }
      table#der {
          float: right;
      }
      table, th, td {
        border: 1px solid black;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <a href="indexTema5.html"><header>
      <h1>Ejercicios Tema 5</h1>
    </header></a>
    <nav>
      <a href="ejer01.php"><span>Ejer 01</span></a>
      <a href="ejer02.php"><span>Ejer 02</span></a>
      <a href="ejer03.php"><span>Ejer 03</span></a>
      <a href="ejer04.php"><span>Ejer 04</span></a>
      <a href="ejer05.php"><span>Ejer 05</span></a>
      <a href="ejer06.php"><span>Ejer 06</span></a>
      <a href="ejer07.php"><span>Ejer 07</span></a>
      <a href="ejer08.php"><span>Ejer 08</span></a>
      <a href="ejer09.php"><span>Ejer 09</span></a>
      <a href="ejer10.php"><span>Ejer 10</span></a>
      <a href="ejer11.php"><span>Ejer 11</span></a>
      <a href="ejer12.php"><span>Ejer 12</span></a>
      <a href="ejer13.php"><span>Ejer 13</span></a>
      <a href="ejer14.php"><span>Ejer 14</span></a>
      <a href="ejer15.php"><span>Ejer 15</span></a>
    </nav>
    <section>
      <div id="contenedor">
        <article>
          <span class="numeroEjer">Ejercicio 7</span>
          <?php
            $numsOriginal; 
            $numsSecundario;
            //creo los números
            for ($i = 0; $i < 20; $i++) {
              $numsOriginal[$i] = rand(0, 100);
            }
            //introduzco los pares en el secundario
            foreach ($numsOriginal as $num) {
              if (($num % 2) == 0) {
                $numsSecundario[] = $num;
              }
            }
            //ahora añado el resto
            foreach ($numsOriginal as $num) {
              if (($num % 2) != 0) {
                $numsSecundario[] = $num;
              }
            }
            /*for ($i = 0; $i < count($numsOriginal); $i++) {
              if (($numsOriginal[$i] % 2) == 0) {
                array_push($numsOriginal, $numsOriginal[$i]);
                array_splice($numsOriginal, $i, 1);
              }
            }
            for ($i = 0; $i < count($numsOriginal); $i++) {
              if (($numsOriginal[$i] % 2) != 0) {
                array_push($numsOriginal, $numsOriginal[$i]);
                array_splice($numsOriginal, $i, 1);
              }
            }
           */ 
            echo "<div>";
            echo "<table id='izq'><tr><th>Array Original</th></tr>";
            foreach ($numsOriginal as $num) {
              echo "<tr><td>$num</td></tr>";
            }
            echo "</table>";
            echo "<table id='der'><tr><th>Array Modificado</th></tr>";
            foreach ($numsSecundario as $num) {
              echo "<tr><td>$num</td></tr>";
            }
            echo "</table>";
            echo "</div>";
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer06.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer08.php">Siguiente</a></div>
    </footer>
  </body>
</html>