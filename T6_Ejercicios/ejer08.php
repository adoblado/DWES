<!DOCTYPE html>
<!--
Ejercicio 8. 
Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa
pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son
correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se
deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la
aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 8</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      #formIntro { float: right; }
      td {
        padding: 5px;
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
          <span class="numeroEjer">Ejercicio 8</span>
          <?php 
            if (isset($_COOKIE['diccionario'])) {
              $diccionario = unserialize($_COOKIE['diccionario']);
            } else {
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
              setcookie("diccionario", serialize($diccionario), time() + 3*24*3600);
            } 
        ?>
            <form id='formIntro' action='ejer08_introduce.php' method='post'>
              <input type='submit' value='Agrega palabras al diccionario'>
            </form>
        <?php
        
            if (!$_REQUEST['resp0']) {
              //array con las 5 opciones que el usuario tiene que responder
              $espanol = array_rand($diccionario, 5);
              setcookie("espanol", serialize($espanol), time() + 3*24*3600);
          ?>
              <form action='ejer08.php' method='post'>
                <table>
          <?php
                  for ($i = 0; $i < count($espanol); $i++) {
          ?>
                    <tr>
                      <td><?=$espanol[$i]?></td>
                      <td><input type='text' name='resp<?=$i?>' size='10'></td>
                    </tr>
          <?php
              }
          ?>
                    <tr>
                      <td><input type='submit' value='Aceptar'</td>
                      <td><input type='reset' value='Resetear'></td>
                    </tr>
                </table>
              </form>
          <?php
            } else {
              $espanol = unserialize($_COOKIE['espanol']);
              
              $correctas = 0;
              $erroneas = 0;
              
              echo "<div>";
              for ($i = 0; $i < count($espanol); $i++) {
                $respuesta = $_REQUEST['resp'.$i];
                if ($respuesta == $diccionario[$espanol[$i]]) {
                  $correctas++;
                } else {
                  $erroneas++;
                  echo "La traducción de $espanol[$i] no es $respuesta, sino ". $diccionario[$espanol[$i]] . ".<br>";
                }
              }
              echo "Has acertado $correctas palabras y has fallado $erroneas.";
              echo "</div>";
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer07.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer09.php">Siguiente</a></div>
    </footer>
  </body>
</html>