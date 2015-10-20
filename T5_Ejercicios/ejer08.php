<!DOCTYPE html>
<!--
Ejercicio 8. 
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
el array resultante. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 8</title>
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
          <span class="numeroEjer">Ejercicio 8</span>
          <?php
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
              $numsString = $numsString . " " . $numIntro;
              $numsString = trim($numsString);
              $numsOriginal = explode(" ", $numsString);
              
              echo "<div class='ejemplo'>";
              //muestra el array original
              echo "<table><caption>Array Original</caption><tr>";
              for ($i = 0; $i < count($numsOriginal); $i++) {
                echo "<th>$i</th>";
              }
              echo "</tr><tr>";
              foreach ($numsOriginal as $num) {
                echo "<td>$num</td>";
              }
              echo "</tr></table>";
              
              
              //introduzco los primos en el secundario
              foreach ($numsOriginal as $num) {
                $primo = true;
                if (($num == 0) || ($num == 1)) {
                  $primo = false;
                }
                for ($i = 2; $i < $num; $i++) {
                  if (($num % $i) == 0) {
                    $primo = false;
                    $i = $num;
                  }
                }
                if ($primo) {
                  $numsSecundario[] = $num;
                }
              }
              //ahora añado el resto
              foreach ($numsOriginal as $num) {
                $primo = true;
                if (($num == 0) || ($num == 1)) {
                  $primo = false;
                }
                for ($i = 2; $i < $num; $i++) {
                  if (($num % $i) == 0) {
                    $primo = false;
                    $i = $num;
                  }
                }
                if (!$primo) {
                  $numsSecundario[] = $num;
                }
              }
              
              //muestra el array final
              echo "<table><caption>Array Final</caption><tr>";
              for ($i = 0; $i < count($numsSecundario); $i++) {
                echo "<th>$i</th>";
              }
              echo "</tr><tr>";
              foreach ($numsSecundario as $num) {
                echo "<td>$num</td>";
              }
              echo "</tr></table>";
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