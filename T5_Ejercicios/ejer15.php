<!DOCTYPE html>
<!--
Ejercicio 15. 
Realiza un programa que sea capaz de rotar todos los elementos de una matriz cuadrada una posición
en el sentido de las agujas del reloj. La matriz debe tener 12 filas por 12 columnas y debe contener
números generados al azar entre 0 y 100. Se debe mostrar tanto la matriz original como la matriz
resultado, ambas con los números convenientemente alineados.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 15</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article {
        overflow: hidden;
      }
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      table, td { border: 0.5px solid dimgray; }
      td { 
        width: 35px; 
        height: 35px; 
        text-align: center;
      }
      caption { font-weight: bold; }
      table#izq { float: left; }
      table#der { float: right; }
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
          <span class="numeroEjer">Ejercicio 15</span>
          <?php
            //defino las dos matrices del programa
            $matrizOriginal = array(array());
            $matrizRotada = array(array());
            
            echo "<div>";
            
            //relleno y muestro la matriz original
            echo "<table id='izq'>";
            echo "<caption>Matriz Original</caption>";
            for ($fila = 0; $fila < 12; $fila++) {
              echo "<tr>";
              for ($columna = 0; $columna < 12; $columna++) {
                $matrizOriginal[$fila][$columna] = rand(0, 100);
                echo "<td>" . $matrizOriginal[$fila][$columna] . "</td>";
              }
              echo "</tr>";
            }
            echo "</table>";
            
            //roto la matriz original y la guardo en la rotada
            $columnaR = 11;
            for ($fila = 0; $fila < 12; $fila++) { 
              $filaR = 0;
              for ($columna = 0; $columna < 12; $columna++) { 
                $matrizRotada[$filaR][$columnaR] = $matrizOriginal[$fila][$columna]; 
                $filaR++; 
              } 
              $columnaR--; 
            }
            
            //muestro la matriz final rotada
            echo "<table id='der'>";
            echo "<caption>Matriz Rotada</caption>";
            for ($fila = 0; $fila < 12; $fila++) { 
              echo "<tr>";
              for ($columna = 0; $columna < 12; $columna++) { 
                echo "<td>" . $matrizRotada[$fila][$columna] . "</td>";
              } 
              echo "</tr>";
            }
            echo "</table>";
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer13.php">Anterior</a></div>
      <div id="siguiente"><a href="indexTema5.html">Volver a Inicio</a></div>
    </footer>
  </body>
</html>