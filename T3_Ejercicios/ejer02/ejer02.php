<!DOCTYPE html>
<!--
Ejercicio 2. 
Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas
tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
  </head>
  <body>
    <?php
      $horaIntro = $_REQUEST['hora'];
      
      if (($horaIntro >= 6) && ($horaIntro <= 12)) {
        echo "Son las ", $horaIntro, ". Buenos días.";
      } else if (($horaIntro >= 13) && ($horaIntro <= 20)) {
        echo "Son las ", $horaIntro, ". Buenas tardes.";
      } else {
        echo "Son las ", $horaIntro, " horas. Buenas noches.";
      }
    ?>
  </body>
</html>
