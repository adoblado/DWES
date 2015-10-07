<!DOCTYPE html>
<!--
Ejercicio 3. 
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
introducir por teclado.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
  </head>
  <body>
    <?php
      $pesetas = $_GET['pesetas'];
      $euros = round(($pesetas / 166.386), 2);
      echo $pesetas, " pesetas son ", $euros;
    ?>
  </body>
</html>
