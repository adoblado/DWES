<!DOCTYPE html>
<!--
Ejercicio 13. 
Escribe un programa que ordene tres números enteros introducidos por teclado.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 13</title>
  </head>
  <body>
    <h2>Introduce 3 números enteros y los ordenaré</h2>
    <form action="ejer13.php" method="get">
      Primer número <input type="number" name="uno"><br>
      Segundo número <input type="number" name="dos"><br>
      Tercer número <input type="number" name="tres"><br>
      <input type="submit" name="enviar" value="Enviar">
    </form>
    
    <?php
      $enviar = $_GET['enviar'];
      if ($enviar) {
        $uno = $_GET['uno'];
        $dos = $_GET['dos'];
        $tres = $_GET['tres'];
        
        echo "<br><hr><h2>Aquí tienes los números ordenados</h2>";
        /*
         * $x = (($uno <= $dos) && ($dos <= $tres)) ? 
         *  $uno. " ". $dos. " ". $tres : 
         *  $uno. " ". $dos. " ". $tres;
         * 
         */
        
        if (($uno <= $dos) && ($dos <= $tres)) {
          echo $uno, " ", $dos, " ", $tres;
        } else if (($uno <= $tres) && ($tres <= $dos)) {
          echo $uno, " ", $tres, " ", $dos;
        } else
          if (($dos < $uno) && ($uno <= $tres)) {
          echo $dos, " ", $uno, " ", $tres;
        } else if (($dos <= $tres) && ($tres < $uno)) {
          echo $dos, " ", $tres, " ", $uno;
        } else if (($tres < $uno) && ($uno <= $dos)) {
          echo $tres, " ", $uno, " ", $dos;
        } else if (($tres < $dos) && ($dos < $uno)) {
          echo $tres, " ", $dos, " ", $uno;
        }
      }
    ?>
  </body>
</html>
