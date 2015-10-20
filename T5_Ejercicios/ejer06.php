<!DOCTYPE html>
<!--
Ejercicio 6. 
Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
pares de un color y los impares de otro.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      span.par {
        color: #CC0099;
      }
      span.impar {
        color: #006600;
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
          <span class="numeroEjer">Ejercicio 6</span>
          <?php
            $cantidad = isset($_REQUEST['cantidad']) ? $_REQUEST['cantidad'] : 0;
            $numsString = $_REQUEST['numeros'];
            $numIntro = $_REQUEST['intro'];
            
            if ($cantidad < 8) {
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
              $arrayNums = explode(" ", $numsString);
              
              echo "<br><h4>Los pares aparecen en morado y los impares en verde</h4>";
              foreach ($arrayNums as $numero) {
                if (($numero % 2) == 0) {
                  echo "<span class='par'>$numero </span>";
                } else {
                  echo "<span class='impar'>$numero </span>";
                }
              }
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer05.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer07.php">Siguiente</a></div>
    </footer>
  </body>
</html>