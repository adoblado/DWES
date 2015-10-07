<!DOCTYPE html>
<!--
Ejercicio 9.
Realiza un programa que resuelva una ecuación de segundo grado (del tipo ax 2 + bx + c = 0).
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
  </head>
  <body>
    <h2>Resuelve una ecuación de 2º grado</h2>
    <h3>ax<sup>2</sup> + bx + c = 0</h3>
    <?php
      $a = $_REQUEST['a'];
      $b = $_REQUEST['b'];
      $c = $_REQUEST['c'];
      
      if (($a == 0) && ($b == 0) && ($c == 0)) { 
        echo "La ecuación tiene infinitas soluciones.";
      } else if ($a == 0) {
        if ($b == 0) {
          echo "La ecuación no tiene solución";
        } else {
          echo "Esto es una ecuación de 1<sup>er</sup> grado.<br>";
          echo "Valor x = ", -$c / $b;
        }
      } else {
        $discriminante = pow($b, 2) - (4 * $a * $c);
        if ($discriminante == 0) {
          echo "La ecuación solo tiene una solución: ";
          echo $solucion = -$b / (2 * $a);
        } else {
          $solucion1 = (-$b + sqrt(pow($b, 2) - (4 * $a * $c))) / (2 * $a);
          $solucion2 = (-$b - sqrt(pow($b, 2) - (4 * $a * $c))) / (2 * $a);
          if ((is_nan($solucion1)) && (is_nan($solucion2))) {
            echo "La ecuación no tiene solución.";
          } else if ((is_nan($solucion1)) && (!is_nan($solucion2))) {
            echo "La ecuación solo tiene una solución: ", $solucion2;
          } else if ((!is_nan($solucion1)) && (is_nan($solucion2))) {
            echo "La ecuación solo tiene una solución: ", $solucion1;
          } else {
            echo "La ecuación tiene 2 soluciones: <br>";
            echo "Valor x<sub>1</sub>: ", $solucion1;
            echo "<br>Valor x<sub>2</sub>: ", $solucion2;
          }
        }
      }
    ?>
  </body>
</html>
