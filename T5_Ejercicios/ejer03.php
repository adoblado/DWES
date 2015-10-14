<!DOCTYPE html>
<!--
Ejercicio 3. 
Escribe un programa que lea 15 números por teclado y que los almacene en un array. Rota los
elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a
la 2, etc. El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente,
muestra el contenido del array.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
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
    <header>
      <h1>Ejercicios Tema 5</h1>
    </header>
    <nav>
      <a href="ejer01.php"><span>Ejer 01</span></a>
      <a href="ejer02.php"><span>Ejer 02</span></a>
      <a href="ejer03.php"><span>Ejer 03</span></a>
      <a href="ejer04.php"><span>Ejer 04</span></a>
      <a href="ejer05.php"><span>Ejer 05</span></a>
    </nav>
    <section>
      <div id="contenedor">
        <article>
          <span class="numeroEjer">Ejercicio 3</span>
          <?php
            $cantNums = isset($_REQUEST['cantidadNums']) ? $_REQUEST['cantidadNums'] : 0;
            $numsString = $_REQUEST['numeros'];
            $numIntro = $_REQUEST['intro'];
            
            if ($cantNums < 15) {
              $cantNums++;
          ?>
              <form action="#" method="get">
                Inserte número <input type="number" name="intro" autofocus="autofocus"><br>
                <input type="hidden" name="cantidadNums" value="<?=$cantNums?>">
                <input type="hidden" name="numeros" value="<?=$numsString.' '.$numIntro?>">
                <input type="submit" name="aceptar" value="Aceptar">
              </form>
          <?php
            } else {
              // ------------- ESPACIO PARA FUNCIONES -------------------
              //le paso $cantNums para ahorrarme hacer un count, que ralentiza un poco
              function rotarDerecha($array1, $cantNums) {
                $array2;
                for ($i = 0; $i < $cantNums; $i++) { 
                  if (($i + 1) == $cantNums) { 
                    $array2[0] = $array1[$i]; 
                  } else if (($i + 1) > $cantNums) { 
                    $array2[($i + 1) - $cantNums] = $array1[$i]; 
                  } else { 
                    $array2[$i + 1] = $array1[$i]; 
                  } 
                } 
                return $array2;
              }
              //ALTERNATIVA DE JESÚS
              /*function rotarDerecha($array1) {
                for ($veces = 0; $veces < 1; $veces++){
                  $ultimaPosicion = $array1[count($array1) - 1];
                  for ($i = count($array1) - 1; $i > 0; $i--){
                    $array1[$i] = $array1[$i - 1];
                  }
                  $array1[0] = $ultimaPosicion;
                }
              }*/
              // ---------------------------------------------------------
              
              $numsString = $numsString . " " . $numIntro;
              $numsString = trim($numsString);
              //almaceno los números en un array
              $arrayNums = explode(" ", $numsString);
              
              //muestro el array original
              echo "<div>";
              echo "<table id='izq'><tr><th colspan='2'>Array Original</th></tr>";
              for ($i = 0; $i < count($arrayNums); $i++) {
                echo "<tr><td>$i</td><td>$arrayNums[$i]</td></tr>";
              }
              /*foreach ($arrayNums as $cadaNumero) {
                echo "<tr><td>$cadaNumero</td></tr>";
              }*/
              echo "</table>";
              
              
              $arrayNumsRotado = rotarDerecha($arrayNums, $cantNums);
              //muestro el array rotado
              echo "</table>";
              echo "<table id='der'><tr><th colspan='2'>Array Rotado</th></tr>";
              for ($i = 0; $i < count($arrayNumsRotado); $i++) {
                echo "<tr><td>$i</td><td>$arrayNumsRotado[$i]</td></tr>";
              }
              /*echo "<table id='der'><tr><th>Array Rotado</th></tr>";
              foreach ($arrayNumsRotado as $cadaNumeroRotado) {
                echo "<tr><td>$cadaNumeroRotado</td></tr>";
              }*/
              echo "</table>";
              echo "</div>";
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer02.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer04.php">Siguiente</a></div>
    </footer>
  </body>
</html>