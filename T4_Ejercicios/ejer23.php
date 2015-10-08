<!DOCTYPE html>
<!--
Ejercicio 23. 
Escribe un programa que permita ir introduciendo una serie indeterminada de números hasta que la
suma de ellos supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 23</title>
  </head>
  <body>
    <header>
      <h1>Introduce números</h1>
      <h6>El programa parará cuando la suma de todos supere a 10.000</h6>
    </header>
    <article>
      <?php
        $numIntro = $_REQUEST['intro'];
        $contador = $_REQUEST['contador'];
        $suma = isset($_REQUEST['suma']) ? $_REQUEST['suma'] : 0;
        
        $suma += $numIntro;
        
        if ($suma <= 10000) {
          $contador += 1;
          echo "<form action='ejer23.php' method='get'>";
            echo "<input type='number' name='intro' size='1' autofocus='autofocus'>";
            echo "<input type='hidden' name='contador' value='", $contador,"'>";
            echo "<input type='hidden' name='suma' value='", $suma, "'>";
            echo "<input type='submit' value='Enviar'>";
          echo "</form>";
        } else {
          echo "Has introducido ", $contador, " números.<br>";
          echo "La suma de todos tus números es ", $suma, ".<br>";
          echo "Y la media es ", ($suma/$contador), ".";
        }
      ?>
    </article>
  </body>
</html>
