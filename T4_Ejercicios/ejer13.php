<!DOCTYPE html>
<!--
Ejercicio 13. 
Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos
son negativos. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 13</title>
  </head>
  <body>
    <h1>Introduce 10 números y te diré cuántos son negativos y cuántos positivos</h1>
    <?php
      $entrar = $_REQUEST['enviar'];
      
      if ($entrar) {
        $numIntro = $_REQUEST['intro'];
        $contadorPositivos = $_REQUEST['positivos'];
        $contadorNegativos = $_REQUEST['negativos'];
        $contador = $_REQUEST['contador'];
        
        $contador++;
        
        if ($numIntro >= 0) {
          $contadorPositivos++;
        } else {
          $contadorNegativos++;
        }
        
        if ($contador < 10) {
          echo "<form action='ejer13.php' method='get'>";
            echo "<input type='number' name='intro' autofocus='autofocus'>";
            echo "<input type='submit' name='enviar' value='Enviar'>";
            echo "<input type='hidden' name='positivos' value='", $contadorPositivos, "'>";
            echo "<input type='hidden' name='negativos' value='", $contadorNegativos, "'>";
            echo "<input type='hidden' name='contador' value='", $contador, "'>";
          echo "</form>";
        } else if ($contador == 10) {
          echo "Has introducido ", $contador, " números.<br>";
          echo "Son ", $contadorPositivos, " números positivos y ", $contadorNegativos, " números negativos.";
        }
      } else {
        echo "<form action='ejer13.php' method='get'>";
          echo "<input type='number' name='intro' autofocus='autofocus'>";
          echo "<input type='submit' name='enviar' value='Enviar'>";
          echo "<input type='hidden' name='positivos' value='0'>";
          echo "<input type='hidden' name='negativos' value='0'>";
          echo "<input type='hidden' name='contador' value='0'>";
        echo "</form>";
      }
    ?>
  </body>
</html>
