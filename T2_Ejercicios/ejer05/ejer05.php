<!DOCTYPE html>
<!--
Ejercicio 5.
Escribe un programa que calcule el área de un rectángulo.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
  </head>
  <body>
    <h2>Calcula el área de un rectángulo</h2>
    <?php
      echo "El área de tu rectángulo es ", $_REQUEST['base'] * $_REQUEST['altura'];
    ?>
  </body>
</html>
