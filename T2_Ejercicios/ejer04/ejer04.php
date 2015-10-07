<!DOCTYPE html>
<!--
Ejercicio 4.
Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
  </head>
  <body>
    <?php
      $num1 = $_POST['numero1'];
      $num2 = $_POST['numero2'];
      echo "La suma de tus números es ", ($_POST['numero1'] + $_POST['numero2']);
      echo "<br>La resta es ", ($num1 - $num2);
      echo "<br>La multiplicación es ", $num1 * $num2;
      echo "<br>La división es ", round(($num1 / $num2), 2);
    ?>
  </body>
</html>
