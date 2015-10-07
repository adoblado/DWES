<!DOCTYPE html>
<!--
Ejercicio 8. 
Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas.
Se pagarán 12 euros por hora.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 8</title>
  </head>
  <body>
    <?php
      echo "El trabajador debe cobrar ", $_POST['horas'] * 12, " euros en total.";
    ?>
  </body>
</html>
