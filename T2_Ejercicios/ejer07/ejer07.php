<!DOCTYPE html>
<!--
Ejercicio 7. 
Escribe un programa que calcule el total de una factura a partir de la base imponible.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
  </head>
  <body>
    <h2>Calcula el total de tu factura</h2>
    <?php
      echo "El total de tu factura es ", $_REQUEST['baseImponible'] * ($_REQUEST['iva'] / 100);
    ?>
  </body>
</html>
