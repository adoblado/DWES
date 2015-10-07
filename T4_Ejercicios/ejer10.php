<!DOCTYPE html>
<!--
Ejercicio 10.
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 10</title>
  </head>
  <body>
    <header>
      <h1>Introduce números</h1>
      <h6>Si quieres parar, introduce un número negativo</h6>
    </header>
    <article>
      <?php
        $numIntro = isset($_REQUEST['intro']) ? $_REQUEST['intro'] : 0;
        $contador = isset($_REQUEST['contador']) ? $_REQUEST['contador'] : 0;
        $suma = isset($_REQUEST['suma']) ? $_REQUEST['suma'] : 0;
        
        if ($numIntro >= 0) {
          $suma += $numIntro; 
          $contador += 1;
          echo "<form action='ejer10.php' method='get'>";
          echo "<input type='number' name='intro' size='1'>";
          echo "<input type='hidden' name='contador' value='", $contador,"'>";
          echo "<input type='hidden' name='suma' value='", $suma, "'>";
          echo "<input type='submit' value='Enviar'>";
          echo "</form>";
        } else {
          echo "Has introducido ", ($contador - 1), " números.<br>";
          echo "La suma de todos tus números es ", $suma, ".<br>";
          echo "Y la media es ", ($suma/($contador - 1)), ".";
        }
      ?>
    </article>
  </body>
</html>
