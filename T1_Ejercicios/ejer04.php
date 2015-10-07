<!DOCTYPE html>
<!--
Ejercicio 4. 
Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP
para familiarizarte con éste último.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th>LUNES</th>
        <th>MARTES</th>
        <th>MIÉRCOLES</th>
        <th>JUEVES</th>
        <th>VIERNES</th>
      </tr>
      <?php
        echo "\t\t<tr>\n";
          echo "\t\t\t<td>DEWS</td><td>DEWC</td><td>DEWS</td><td>DEWC</td><td>DIW</td>";
        echo "\t\t</tr>";
      ?>
      <tr>
        <td>DEWS</td><td>DEWC</td><td>DEWS</td><td>DEWC</td><td>DIW</td>
      </tr>
      <tr>
        <td>DEWS</td><td>DEWC</td><td>DEWS</td><td>DEWC</td><td>DIW</td>
      </tr>
      <?php
        echo "\t\t<tr>";
          echo "\t\t\t<td>R</td><td>E</td><td>CR</td><td>E</td><td>O</td>";
        echo "\t\t</tr>";
        echo "\t\t<tr>";
          echo "\t\t\t<td>EMIEM</td><td>DAW</td><td>HLC</td><td>EMIEM</td><td>DIW</td>";
        echo "\t\t</tr>";
      ?>
      <tr>
        <td>DIW</td><td>DAW</td><td>HLC</td><td>EMIEM</td><td>DEWS</td>
      </tr>
      <tr>
        <td>DIW</td><td>DAW</td><td>HLC</td><td>EMIEM</td><td>DEWS</td>
      </tr>
    </table>
  </body>
</html>
