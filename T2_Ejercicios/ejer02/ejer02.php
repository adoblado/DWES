<!DOCTYPE html>
<!--
Ejercicio 2.
Realiza un conversor de euros a pesetas. Ahora la cantidad en euros que se quiere convertir se
deberá introducir por teclado.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <h2>Conversor de €uros a Pesetas</h2>
    <?php
      $euros = $_GET['euros'];
      $pesetas = round(($euros * 166.386), 2);
      echo $euros, " euros son ", $pesetas;
    ?>
  </body>
</html>
