<!DOCTYPE html>
<!--
Ejercicio 9. 
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9). Seguidamente el programa
pedirá dos posiciones a las que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
menor que final y que ambos números están entre 0 y 9. El programa deberá colocar el número de
la posición inicial en la posición final, rotando el resto de números para que no se pierda ninguno.
Al final se debe mostrar el array resultante.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
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
          <span class="numeroEjer">Ejercicio 9</span>
          <?php
          // ------------------ ESPACIO PARA FUNCIONES ----------------------------
            //FUNCIÓN PARA MOSTRAR FORMULARIO DE ÍNDICES
            function muestraForm($cantidad, $numsString) {
          ?>
              <h4>Introduce 2 índices de tu array y se cambiarán los valores, de forma que todo el array rotará</h4>
              <h6>Recuerda que el índice 1 debe ser menor que el índice 2</h6>
              <form action="#" method="get">
                Índice 1: <input type="number" name="indice1" min="0" max="9" step="1" required="required" autofocus="autofocus"><br>
                Índice 2: <input type="number" name="indice2" min="0" max="9" step="1" required="required"><br>
                <input type="hidden" name="cantidad" value="<?= $cantidad ?>">
                <input type="hidden" name="numeros" value="<?= $numsString ?>">
                <input type="submit" name="aceptar" value="Aceptar">
              </form>
          <?php
            }
            
            //FUNCIÓN PARA MOSTRAR ARRAY 
            function muestraArray($numsOriginal) {
              echo "<table><caption>Array</caption><tr>";
              for ($i = 0; $i < count($numsOriginal); $i++) {
                echo "<th>$i</th>";
              }
              echo "</tr><tr>";
              foreach ($numsOriginal as $num) {
                echo "<td>$num</td>";
              }
              echo "</tr></table>";
            }
            
            //FUNCIÓN PARA ROTAR A LA DERECHA
            function llamaRotarDerecha ($arrayOriginal, $numPosiciones) {
              for ($i = 0; $i <= $numPosiciones; $i++) {
                $arrayOriginal = rotarDerecha($arrayOriginal);
              }
              return $arrayOriginal;
            }
            function rotarDerecha($array1) {
              $array2;
              for ($i = 0; $i < count($array1); $i++) { 
                if (($i + 1) == count($array1)) { 
                  $array2[0] = $array1[$i]; 
                } else if (($i + 1) > count($array1)) { 
                  $array2[($i + 1) - count($array1)] = $array1[$i]; 
                } else { 
                  $array2[$i + 1] = $array1[$i]; 
                } 
              } 
              return $array2;
            }
          // -----------------------------------------------------------------------
          
            $cantidad = isset($_REQUEST['cantidad']) ? $_REQUEST['cantidad'] : 0;
            $numsString = $_REQUEST['numeros'];
            $numIntro = $_REQUEST['intro'];
            
            if ($cantidad < 10) {
              $cantidad++;
          ?>
            <form action="#" method="get">
              Número <?= $cantidad ?> &nbsp;
              <input type="number" name="intro" autofocus="autofocus"><br>
              <input type="hidden" name="cantidad" value="<?= $cantidad ?>">
              <input type="hidden" name="numeros" value="<?= $numsString . ' ' . $numIntro ?>">
              <input type="submit" name="aceptar" value="Aceptar">
            </form>
          <?php
            } else {
              $indice1 = $_REQUEST['indice1'];
              $indice2 = $_REQUEST['indice2'];
              
              if ((!$indice1) || ($indice1 >= $indice2)) {
                $numsString = $numsString . " " . $numIntro;
                $numsString = trim($numsString);
                $numsOriginal = explode(" ", $numsString);
              
                echo "<div class='ejemplo'>"; 
                muestraArray($numsOriginal); 
                echo "</div>";
                muestraForm($cantidad, $numsString);
              } else {
                $numsString = trim($numsString);
                $numsOriginal = explode(" ", $numsString);

                $numPosiciones = $indice2 - $indice1;
                $numsRotado = llamaRotarDerecha($numsOriginal, $numPosiciones);

                echo "<div class='ejemplo'>"; 
                muestraArray($numsOriginal); 
                muestraArray($numsRotado);
                echo "</div>";
              }
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer08.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer10.php">Siguiente</a></div>
    </footer>
  </body>
</html>