<!DOCTYPE html>
<!--
Ejercicio 5.
Escribe un programa que utilice las variables $x y $y . Asignales los valores 144 y 999 respectiva-
mente. A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división
y la multiplicación.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
  </head>
  <body>
    <?php
      $x = 144;
      $y = 999;
      echo "La suma es ", $x + $y;
      echo "<br>La resta es ", $x - $y, " o ", $y - $x;
      echo "<br>La multiplicación es ", $x * $y;
      echo "<br>La división es ", $x / $y, " o ", $y / $x;
    ?>
  </body>
</html>
