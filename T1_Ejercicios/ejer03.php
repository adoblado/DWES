<!DOCTYPE html>
<!--
Ejercicio 3. 
Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente
traducción al castellano. Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta
<table> de HTML.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th, td {
          padding: 8px;
          text-align: center;
        }
    </style>
  </head>
  <body>
    <?php
      echo "\t<table>\n";
        echo "\t\t<tr>\n";
          echo "\t\t\t<th>Español</th><th>Inglés</th>\n";
        echo "\t\t</tr>\n";
        echo "\t\t<tr>\n";
          echo "\t\t\t<td>coche</td><td>car</td>\n";
        echo "\t\t</tr>\n";
        echo "\t\t<tr>\n";
          echo "\t\t\t<td>coche</td><td>car</td>\n";
        echo "\t\t</tr>\n";
        echo "\t\t<tr>\n";
          echo "\t\t\t<td>coche</td><td>car</td>\n";
        echo "\t\t</tr>\n";
        echo "\t\t<tr>\n";
          echo "\t\t\t<td>coche</td><td>car</td>\n";
        echo "\t\t</tr>\n";
        echo "\t\t<tr>\n";
          echo "\t\t\t<td>coche</td><td>car</td>\n";
        echo "\t\t</tr>\n";
      echo "\t</table>";
    ?>
  </body>
</html>
