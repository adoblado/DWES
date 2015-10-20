<!DOCTYPE html>
<!--
Ejercicio 4. 
Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
Los números que se han cambiado deben aparecer resaltados de un color diferente.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      span.valor1 {
          color: blue;
      }
      span.valor2 {
          color: red;
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
          <span class="numeroEjer">Ejercicio 4</span>
          <?php
            $valor1 = $_REQUEST['valor1'];
            $valor2 = $_REQUEST['valor2'];
            $numerosString = $_REQUEST['numeros'];
            
            if (!isset($valor1)) {
              $numerosString = "";
              for ($i = 0; $i < 100; $i++) {
                $numerosString = $numerosString . (rand(0, 20)) . " ";
              }
              echo "<br>" . $numerosString;
          ?>
          <br><br><h4>Elija 2 valores mostrados por pantalla y se cambiarán entre sí</h4>
            <form action="#" method="get">
              Valor 1: <input type="number" name="valor1" min="0" max="20" step="1"><br>
              Valor 2: <input type="number" name="valor2" min="0" max="20" step="1"><br>
              <input type="hidden" name="numeros" value="<?=$numerosString?>">
              <input type="submit" name="aceptar" value="Aceptar">
            </form>
          <?php
            } else {
              $numerosString = trim($numerosString);
              $arrayNums = explode(" ", $numerosString);
              
              echo "<h4>Aquí están todos los números con los valores cambiados</h4>";
              echo "<h5>Los valores 1 aparecen en azul y los valores 2 aparecen en rojo</h5>";
              foreach ($arrayNums as $cadaNumero) {
                if ($cadaNumero == $valor1) {
                  echo "<span class='valor2'>$valor2 </span>";
                } else if ($cadaNumero == $valor2) {
                  echo "<span class='valor1'>$valor1 </span>";
                } else {
                  echo "<span>$cadaNumero </span>";
                }
              }
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer03.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer05.php">Siguiente</a></div>
    </footer>
  </body>
</html>