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
            $diccionario = unserialize($_COOKIE['diccionario']);
          ?>
          <form id='formIntro' action='ejer08_introduce.php' method='post'>
            <input type='submit' value='Agrega palabras al diccionario'>
          </form>

          <h3>Introduce una palabra nueva</h3>
          <div>
          <?php
            if (isset($_REQUEST['espanol'])) {
              $espanol = $_REQUEST['espanol'];
              $ingles = $_REQUEST['ingles'];
              if (array_key_exists($espanol, $diccionario)) {
                echo "La palabra ya existía en el diccionario, su valor era " . $diccionario[$espanol];
                echo "<br>Se ha sobreescrito por " . $ingles;
              } else {
                echo "La palabra se ha introducido satisfactoriamente";
              }
              $diccionario[$espanol] = $ingles;
              setcookie("diccionario", serialize($diccionario), time() + 3*24*3600);
            }
          ?>
            <form action='ejer08_introduce.php' method='post'>
              <table>
                <tr><th>Español</th><th>Inglés</th></tr>
                <tr>
                  <td><input type='text' name='espanol' size='10'></td>
                  <td><input type='text' name='ingles' size='10'></td>
                </tr>
                <tr>
                  <td><input type='submit' value='Aceptar'</td>
                  <td><input type='reset' value='Resetear'></td>
                </tr>
              </table>
            </form>
          </div>
          <form action='ejer08.php' method='post'>
            <input type='submit' value='Volver'>
          </form>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer07.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer09.php">Siguiente</a></div>
    </footer>
  </body>
</html>