<!DOCTYPE html>
<!--
Ejercicio 12.
Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
obtenida. Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan
de conocimientos en las diferentes asignaturas del curso.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 12</title>
  </head>
  <body>
    <h2>MINICUESTIONARIO OBLIGATORIO</h2>
    <?php
      $uno = $_GET['uno'];
      $dos = $_GET['dos'];
      $tres = $_GET['tres'];
      $total = 0;
      
      echo "<h4>1. ¿Qué significa DWES? ";
      if ($uno == 1) {
        echo "CORRECTO</h4>";
        $total++;
      } else {
        echo "INCORRECTO</h4>";
      }
      echo "Desarrollo Web Entorno Servidor <img src=images/bien.png width=16px></img><br>";
      echo "Despropósito Web En Solitario <img src=images/mal.png width=16px></img><br>";
      echo "Diagnóstico Web Entrado Salud <img src=images/mal.png width=16px></img><br><br>";
      
      echo "<h4>2. ¿Cuánto se aprende en inglés? ";
      if ($dos == 3) {
        echo "CORRECTO</h4>";
        $total++;
      } else {
        echo "INCORRECTO</h4>";
      }
      echo "Mucho <img src=images/mal.png width=16px></img><br>";
      echo "Algo <img src=images/mal.png width=16px></img><br>";
      echo "Nada <img src=images/bien.png width=16px></img><br><br>";
      
      echo "<h4>3. ¿Sirve empresa para algo? ";
      if ($tres == 2) {
        echo "CORRECTO</h4>";
        $total++;
      } else {
        echo "INCORRECTO</h4>";
      }
      echo "Sí <img src=images/mal.png width=16px></img><br>";
      echo "No <img src=images/bien.png width=16px></img><br>"; 
      echo "Quizá <img src=images/mal.png width=16px></img><br><br>";
      
      if ($total == 3) {
        echo "<h1>¡¡ENHORABUENA!! ¡Has acertado todas!</h1>";
      } else if ($total == 2) {
        echo "<h1>Has aprobado por los pelillos.</h1>";
      } else {
        echo "<h1>¡¡Ooooohhhhhh!! Has suspendidoooooo...</h1>";
      }
    ?>
  </body>
</html>
