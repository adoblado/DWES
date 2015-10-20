<!DOCTYPE html>
<!--
Ejercicio 13. 
Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos comprendi-
dos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
cumplan los siguientes requisitos:
• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde.
• El mínimo debe aparecer en color azul.
• El resto de números debe aparecer en color negro.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 13</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article {
        overflow: hidden;
      }
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      span.numeros { float: left; padding: 5px; }
      span#azul { color: blue; font-weight: bold; }
      span.verde { color: green; font-weight: bold; }
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
          <span class="numeroEjer">Ejercicio 13</span>
          <?php
          // -------- FUNCIÓN PARA COMPROBAR QUE ESTÁ DENTRO DEL ARRAY BIDIMENSIONAL --------
            function estaEnArray($array, $elemento) {
              foreach ($array as $fila) { 
                if (in_array($elemento, $fila)) { 
                  return true;
                }
              }
              return false;
            }
          // --------------------------------------------------------------------------------
          
            $totalNumeros = array(array());;
            for ($fila = 0; $fila < 6; $fila++) {
              for ($columna = 0; $columna < 9; $columna++) {
                do {
                  $comprueba = rand(100, 999);
                } while (estaEnArray($totalNumeros, $comprueba));
                $totalNumeros[$fila][$columna] = $comprueba;
              }
            }
            
            //obtengo el mínimo y sus coordenadas
            $minimo = 1000;
            for ($fila = 0; $fila < 6; $fila++) {
              for ($columna = 0; $columna < 9; $columna++) {
                if ($totalNumeros[$fila][$columna] < $minimo) {
                  $minimo = $totalNumeros[$fila][$columna];
                  $filaMinimo = $fila;
                  $columnaMinimo = $columna;
                }
              }
            }
            
            // --------- INTRODUZCO LAS DIAGONALES EN UN ARRAY AUXILIAR
            //diagonal NO
            $fila = $filaMinimo - 1;
            $columna = $columnaMinimo - 1;
            while (($fila >= 0) && ($columna >= 0)) {
              $numerosVerdes[] = $totalNumeros[$fila][$columna];
              $fila--;
              $columna--;
            }
            
            //diagonal NE
            $fila = $filaMinimo - 1;
            $columna = $columnaMinimo + 1;
            while (($fila >= 0) && ($columna < 9)) {
              $numerosVerdes[] = $totalNumeros[$fila][$columna];
              $fila--;
              $columna++;
            }
            
            //diagonal SO
            $fila = $filaMinimo + 1;
            $columna = $columnaMinimo - 1;
            while (($fila < 6) && ($columna >= 0)) {
              $numerosVerdes[] = $totalNumeros[$fila][$columna];
              $fila++;
              $columna--;
            }
            
            //diagonal SE
            $fila = $filaMinimo + 1;
            $columna = $columnaMinimo + 1;
            while (($fila < 6) && ($columna < 9)) {
              $numerosVerdes[] = $totalNumeros[$fila][$columna];
              $fila++;
              $columna++;
            }
            
            //muestro el array con el mínimo y las diagonales modificadas
            echo "<table>";
            for ($fila = 0; $fila < 6; $fila++) {
              echo "<tr>";
              for ($columna = 0; $columna < 9; $columna++) {
                echo "<td>";
                if ($totalNumeros[$fila][$columna] == $minimo) {
                  echo "<span id='azul' class='numeros'>" . $totalNumeros[$fila][$columna] . "</span>";
                } else if (in_array($totalNumeros[$fila][$columna], $numerosVerdes)) {
                  echo "<span class='verde numeros'>" . $totalNumeros[$fila][$columna] . "</span>";
                } else {
                  echo "<span class='numeros'>" . $totalNumeros[$fila][$columna] . "</span>";
                }
                echo "</td>";
              }
              echo "</tr>";
            }
            echo "</table>";
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer12.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer14.php">Siguiente</a></div>
    </footer>
  </body>
</html>