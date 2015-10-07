<!DOCTYPE html>
<!--
Ejercicio 16. 
Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
primo es aquel que sólo es divisible entre él mismo y la unidad.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 16</title>
  </head>
  <body>
    <h1>Comprueba si un número es primo o no</h1>
    <?php
      $enviar = $_REQUEST['enviar'];
      
      if ($enviar) {
        $numIntro = isset($_REQUEST['intro']) ? $_REQUEST['intro'] : 0;
        $esPrimo = true;
        
        for ($i = 2; $i < $numIntro; $i++) {
          if ($numIntro % $i == 0) {
            $esPrimo = false;
          }
        }
        
        if ($esPrimo) {
          echo "El número ", $numIntro, " es primo.";
        } else {
          echo "El número ", $numIntro, " no es primo.";
        }
      } else {
        echo "<form action='ejer16.php' method='get'>";
          echo "<input type='number' name='intro' min='1' step='1'>";
          echo "<input type='submit' name='enviar' value='Enviar'>";
        echo "</form>";
      }
    ?>
  </body>
</html>
