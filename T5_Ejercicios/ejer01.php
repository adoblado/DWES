<!DOCTYPE html>
<!--
Ejercicio 1. 
Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas.
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
          <span class="numeroEjer">Ejercicio 1</span>
          <?php
            $numero;
            $cuadrado;
            $cubo;

            for ($i = 0; $i < 20; $i++) {
              $numero[$i] = rand(0, 101);
              $cuadrado[$i] = pow($numero[$i], 2);
              $cubo[$i] = pow($numero[$i], 3);
            }
          ?>
          <table>
            <tr>
              <th>Número</th><th>Cuadrado</th><th>Cubo</th>
            </tr>
            <?php
              for ($i = 0; $i < 20; $i++) {
                echo "<tr>". 
                    "<td>$numero[$i]</td>".
                    "<td>$cuadrado[$i]</td>".
                    "<td>$cubo[$i]</td>".
                  "</tr>";
              }
            ?>
          </table>
        </article>
      </div>
    </section>
    <footer>
      <div id="siguiente"><a href="ejer02.php">Siguiente</a></div>
    </footer>
  </body>
</html>