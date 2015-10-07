<!DOCTYPE html>
<!--
Ejercicio 9. 
Escribe un programa que calcule el volumen de un cono mediante la fórmula V = 13 πr 2 h.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
  </head>
  <body>
    <?php
      $volumen = round(((pi() * pow($_GET['radio'], 2) * $_GET['altura']) / 3), 2);
      /* el número pi se obtiene con pi()
       * la potencia de un número se obtiene con pow(base, potencia)
       */
      echo "El volumen de tu cono es ", $volumen;
    ?>
  </body>
</html>
