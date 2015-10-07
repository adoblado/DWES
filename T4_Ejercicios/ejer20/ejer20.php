<!DOCTYPE html>
<!--
Ejercicio 20. 
Realiza un programa que pinte una pirámide hueca por pantalla. La altura se debe pedir por teclado
mediante un formulario. La pirámide estará hecha de bolitas, ladrillos o cualquier otra imagen
de las 5 que se deben dar a elegir mediante un formulario. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 20</title>
    <style>
      body {
          font-family: monospace;
          font-size: 2rem;
      }
      td {
          padding: 8px;
          padding-left: 30px;
      }
      img {
          width: 19px;
      }
    </style>
  </head>
  <body>
    <h1>Dibuja una pirámide hueca a tu manera</h1>
    <?php
      $enviar = $_REQUEST['enviar'];
      $altura = $_REQUEST['altura'];
      
      if ($altura) {
        $imagen = isset($_REQUEST['imagen']) ? $_REQUEST['imagen'] : "";
        $caracter = isset($_REQUEST['caracter']) ? $_REQUEST['caracter'] : "";
        $fila = 1;
        $espaciosFuera = $altura - 1;
        $espaciosDentro = 1;
        
        echo "<div id='piramide'>";
        
        while ($fila <= $altura) {
          //inserta espacios exteriores
          for ($i = 1; $i <= $espaciosFuera; $i++) {
            echo "&nbsp;";
          }
          
          //pinta primer elemento
          if (isset($_REQUEST['caracter'])) {
            echo $caracter;
          } else if (isset($_REQUEST['imagen'])) {
            echo "<img src='images/", $imagen, "' >";
          }
          
          //inserta espacios dentro
          if (($fila != 1) && ($fila != $altura)) {
            for ($j = 1; $j <= $espaciosDentro; $j++) {
              echo "&nbsp;";
            }
          }
          
          //pinta último elemento
          if ($fila == $altura) {
            for ($j = 1; $j <= ($espaciosDentro + 1); $j++) {
              if (isset($_REQUEST['imagen'])) {
                echo "<img src='images/", $imagen, "' >";
              } else if (isset($_REQUEST['caracter'])) {
                echo $caracter;
              }
            }
          } else if ($fila != 1) {
            if (isset($_REQUEST['imagen'])) {
              echo "<img src='images/", $imagen, "' >";
            } else if (isset($_REQUEST['caracter'])) {
              echo $caracter;
            }
          }
          
          echo "<br>";
          
          echo "</div>";
          
          if ($fila != 1) {
            $espaciosDentro += 2;
          }
          $fila += 1;
          $espaciosFuera -= 1; 
        }
      } else {
        echo "<table>";
        echo "<form action='ejer20.php' method='get'>";
          echo "<tr><th>Elige la forma en la que quieres que se dibuje (imagen/caracter)</th></tr>";
          echo "<tr><td>Imagen:". 
            "<select name='imagen'>".
              "<option value='bolita.png'>Bolita</option>".
              "<option value='ladrillo.png'>Ladrillo</option>".
              "<option value='pina.png'>Piña</option>".
              "<option value='pinguino.png'>Pingüino</option>".
              "<option value='sol.png'>Sol</option>".
            "</select>".
            "</td></tr>";
          echo "<tr><td>Texto: <input type='text' name='caracter' size='5'></td></tr>";
          echo "<tr><td>Altura: <input type='number' name='altura' min='3' step='1' required='required'></t
