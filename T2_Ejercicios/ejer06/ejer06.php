<!DOCTYPE html>
<!--
Ejercicio 6. 
Escribe un programa que calcule el área de un triángulo.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>
  </head>
  <body>
    <h2>Calcula el área de un triángulo</h2>
    <?php
      echo "El área de tu triángulo es ", ($_REQUEST['base'] * $_REQUEST['altura']) / 2;
    ?>
  </body>
</html>
