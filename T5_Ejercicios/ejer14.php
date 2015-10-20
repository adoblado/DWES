<!DOCTYPE html>
<!--
Ejercicio 14. 
Escribe un programa que, dada una posición en un tablero de ajedrez, nos diga a qué casillas podría
saltar un alfil que se encuentra en esa posición. Indícalo de forma gráfica sobre el tablero con un
color diferente para estas casillas donde puede saltar la figura. El alfil se mueve siempre en diagonal.
El tablero cuenta con 64 casillas. Las columnas se indican con las letras de la “a” a la “h” y las filas
se indican del 1 al 8.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 14</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article {
        overflow: hidden;
      }
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      section article div {
          width: 30%;
          margin: 0 auto;
      }
      table { margin: 0 auto; }
      th { padding: 0 20px; }
      .casilla { 
        width: 40px; 
        height: 40px; 
      }
      .negra { background-color: black; }
      .blanca { background-color: white; }
      .alfil { 
        background-image: url("images/alfilblanco.png"); 
        background-repeat: no-repeat; 
        background-size: 50px 50px;
      }
      .movimiento span { 
        color: #F29100; 
        font-family: arial;
        font-weight: bold;
        font-size: 1.2rem;
        text-align: center;
        padding-left: 18px;
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
          <span class="numeroEjer">Ejercicio 14</span>
          <?php
            $coordIntro = $_REQUEST['coordenadas'];
            $repetir = $_REQUEST['repetir'];
            
            if ((!$coordIntro) || ($repetir)) {
              echo "<table>";
              echo "<tr><td/><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th></tr>";
              for ($fila = 0; $fila < 8; $fila++) {
                echo "<tr>";
                for ($columna = 0; $columna < 10; $columna++) {
                  if (($columna == 0) || ($columna == 9)) {
                    echo "<th>" . ($fila + 1) . "</th>";
                  } else {
                    if ((($fila % 2 == 0) && ($columna % 2 == 0)) || 
                      (($fila % 2 != 0) && ($columna % 2 != 0))) {
                      echo "<td class='negra casilla'></td>";
                    } else {
                      echo "<td class='blanca casilla'></td>";
                    }
                  }
                }
                echo "</tr>";
              }
              echo "<tr><td/><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th></tr>";
              echo "</table>";
          ?>
              <div>
                <h5>Introduce unas coordenadas del estilo de g6, b5 o h1</h5>
                <form action="#" method="get">
                  Coordenadas: <input type="text" name="coordenadas" size="3" maxlength="2"><br>
                  <input type="submit" name="aceptar" value="Aceptar">
                </form>
              </div>
          <?php
            } else {
              $columnas = [
                "a" => 1, "b" => 2, "c" => 3, "d" => 4, 
                "e" => 5, "f" => 6, "g" => 7, "h" => 8, 
              ];
              $filaAlfil = ($coordIntro{1} - 1);
              $columnaAlfil = $columnas[$coordIntro{0}];
              $tablero[$filaAlfil][$columnaAlfil] = 1;
              
              //movimiento NO
              $fila = $filaAlfil - 1;
              $columna = $columnaAlfil - 1;
              while (($fila >= 0) && ($columna >= 0)) {
                $tablero[$fila][$columna] = 2;
                $fila--;
                $columna--;
              }

              //movimiento NE
              $fila = $filaAlfil - 1;
              $columna = $columnaAlfil + 1;
              while (($fila >= 0) && ($columna < 9)) {
                $tablero[$fila][$columna] = 2;
                $fila--;
                $columna++;
              }

              //movimiento SO
              $fila = $filaAlfil + 1;
              $columna = $columnaAlfil - 1;
              while (($fila < 8) && ($columna >= 0)) {
                $tablero[$fila][$columna] = 2;
                $fila++;
                $columna--;
              }

              //movimiento SE
              $fila = $filaAlfil + 1;
              $columna = $columnaAlfil + 1;
              while (($fila < 8) && ($columna < 9)) {
                $tablero[$fila][$columna] = 2;
                $fila++;
                $columna++;
              }
              
              //dibujo final
              echo "<table>";
              echo "<tr><td/><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th></tr>";
              for ($fila = 0; $fila < 8; $fila++) {
                echo "<tr>";
                for ($columna = 0; $columna < 10; $columna++) {
                  if (($columna == 0) || ($columna == 9)) {
                    echo "<th>" . ($fila + 1) . "</th>";
                  } else {
                    //elegir fondo negro o blanco
                    if ((($fila % 2 == 0) && ($columna % 2 == 0)) || 
                      (($fila % 2 != 0) && ($columna % 2 != 0))) {
                      echo "<td class='negra casilla ";
                    } else {
                      echo "<td class='blanca casilla ";
                    }
                    //pinta el alfil y sus movimientos
                    if ($tablero[$fila][$columna] == 1) {
                      echo "alfil'></td>";
                    } else if ($tablero[$fila][$columna] == 2) {
                      echo "movimiento'><span> X </span></td>";
                    } else {
                      echo "'></td>";
                    }
                  }
                }
                echo "</tr>";
              }
              echo "<tr><td/><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th></tr>";
              echo "</table>";
          ?>
          <br><div>
              <form action="#" method="get">
                <input type="submit" name="repetir" value="Repetir">
              </form>
            </div>
          <?php
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer13.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer15.php">Siguiente</a></div>
    </footer>
  </body>
</html>