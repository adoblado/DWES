<!DOCTYPE html>
<!--
Ejercicio 11. 
Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
en español y dará la correspondiente traducción en inglés. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 11</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article {
        overflow: hidden;
      }
      section article span.numeroEjer {
        font-size: 1.2rem;
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
          <span class="numeroEjer">Ejercicio 11</span>
          <?php
          // ------------------ ESPACIO PARA FUNCIONES ----------------------------
            function muestraForm() {
          ?>
            <form action="#" method="get">
              Traduce una palabra: <input type="text" name="palabra" autofocus="autofocus">
              <input type="submit" name="aceptar" value="Aceptar">
            </form>
          <?php
          }
          // -----------------------------------------------------------------------
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
            $palabra = $_REQUEST['palabra'];
            
            if (!isset($palabra)) {
              muestraForm();
            } else {
              if (array_key_exists($palabra, $diccionario)) {
                echo "<br>La traducción de <strong>$palabra</strong> es <strong>$diccionario[$palabra]</strong>";
              } else {
                echo "<h4>'" . $palabra . "' no se encuentra en este diccionario, prueba de nuevo</h4>";
                muestraForm();
              }
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer10.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer12.php">Siguiente</a></div>
    </footer>
  </body>
</html>