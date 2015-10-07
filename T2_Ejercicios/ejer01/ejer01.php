<!DOCTYPE html>
<!--
Ejercicio 1. 
Realiza un programa que pida dos números y luego muestre el resultado de su multiplicación.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
  </head>
  <body>
    <?php
      $x = $_GET['numero1'];
      $y = $_GET['numero2'];
      echo "La multiplicación de tus dos números es ", $x * $y;
      echo "<br>La multiplicación de tus dos números es ", $_GET['numero1'] * $_GET['numero2'];
    ?>
  </body>
</html>
