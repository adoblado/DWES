<!DOCTYPE html>
<!--
Ejercicio 28. 
Escribe un programa que calcule el factorial de un número entero leído por teclado.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 28</title>
  </head>
  <body>
    <header>
      <h1>Introduzca un número entero y le diré cuál es su factorial</h1>
    </header>
    <article>
      <h3>Recuerde que el factorial de un número es él mismo multiplicado por todos sus inferiores hasta 1</h3>
      <section>
        <?php
          $numIntro = isset($_REQUEST['intro']) ? $_REQUEST['intro'] : -1;
          $factorial = 1;
          
          if ($numIntro >= 0) {
            if ($numIntro > 0) {
              for ($i = 1; $i <= $numIntro; $i++) {
                $factorial *= $i;
              }
            }
            echo "El factorial de ", $numIntro, " es ", $factorial, ".";
          } else {
        ?>
        <form action="ejer28.php" method="get">
          <input type="number" name="intro" min="0" step="1" autofocus="autofocus" required="required">
          <input type="submit" value="Enviar">
        </form>
        <?php 
          } 
        ?>
      </section>
    </article>
  </body>
</html>
