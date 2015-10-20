<!DOCTYPE html>
<!--
Ejercicio 12. 
Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio
anterior. El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras
y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas
y cuántas erróneas. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 12</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article {
        overflow: hidden;
      }
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      td {
        padding: 5px;
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
          <span class="numeroEjer">Ejercicio 12</span>
          <?php
            // ------ INICIALIZACIÓN DE ARRAYS PARA EL PROGRAMA -------
            $diccionario = [
              "coche" => "car", "ejercicio" => "exercise", 
              "ordenador" => "computer", "botella" => "bottle", 
              "galleta" => "cookie", "camiseta" => "t-shirt", 
              "raton" => "mouse", "libro" => "book", 
              "mesa" => "table", "sol" => "sun", 
              "luna" => "moon", "aceite" => "oil", 
              "vaso" => "glass", "pantalon" => "jeans", 
              "casa" => "house", "trabajo" => "job", 
              "cerveza" => "beer", "sal" => "salt", 
              "ventana" => "window", "puerta" => "door", 
            ];
            $espanol = ["coche", "ejercicio", "ordenador", "botella", 
              "galleta", "camiseta", "raton", "libro", "mesa", "sol", 
              "luna", "aceite", "vaso", "pantalon", "casa", "trabajo", 
              "cerveza", "sal", "ventana", "puerta"];
            
            
            if (isset($_REQUEST['espanol0'])) { 
              $palabras = [
                $_REQUEST['espanol0'] => $_REQUEST['ingles0'],
                $_REQUEST['espanol1'] => $_REQUEST['ingles1'],
                $_REQUEST['espanol2'] => $_REQUEST['ingles2'],
                $_REQUEST['espanol3'] => $_REQUEST['ingles3'],
                $_REQUEST['espanol4'] => $_REQUEST['ingles4'],
              ];
            } else {
              for ($i = 0; $i < 5; $i++) {
                do {
                  $comprueba = $espanol[rand(0, 19)];
                } while (in_array($comprueba, $palabras));
                $palabras[$i] = $comprueba;
              }
            }
            //saca 1 palabra del índice de forma aleatoria
            //array_rand($diccionario, 1);
            
            
            //muestra el formulario al inicio
            if (!isset($_REQUEST['espanol1'])) {
            ?>
              <table>
                <form action="#" method="get">
            <?php
                  for ($i = 0; $i < 5; $i++) {
            ?>
                    <tr>
                      <input type="hidden" name="<?="espanol$i"?>" value="<?=$palabras[$i]?>">
                      <td><?=$palabras[$i]?></td>
                      <td><input type="text" name="<?="ingles$i"?>" size="10" autofocus="autofocus"></td>
                    </tr>
            <?php
                  }
            ?>
                  <tr>
                    <td><input type="submit" name="aceptar" value="Aceptar"></td>
                  </tr>
                </form>
              </table>
            <?php
            } else {
              echo "<div>";
              $aciertos = 0;
              $fallos = 0;
              foreach ($palabras as $espanol => $ingles) {
                foreach ($diccionario as $clave => $valor) {
                  if (($espanol == $clave) && ($ingles == $valor)) {
                    $aciertos++;
                  } else if (($espanol == $clave) && ($ingles != $valor)) {
                    $fallos++;
                    echo "$espanol no es $ingles, sino $valor <br>";
                  }
                }
              }
              echo "<br>Has tenido un total de $aciertos aciertos y $fallos fallos.<br>";
              if ($aciertos >= 3) {
                echo "¡Enhorabuena, has aprobado!";
              } else {
                echo "Oohh, has perdido...";
              }
              echo "</div>";
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer11.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer13.php">Siguiente</a></div>
    </footer>
  </body>
</html>