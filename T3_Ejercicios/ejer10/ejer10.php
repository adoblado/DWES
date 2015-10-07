<!DOCTYPE html>
<!--
Ejercicio 10. 
Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 10</title>
  </head>
  <body>
    <h2>Dime tu fecha de nacimiento y te diré tu horóscopo</h2>
    <?php
      $mes = $_REQUEST['mes'];
      $dia = $_REQUEST['dia'];
      
      switch ($mes) {
        case "Enero": 
          if ($dia < 21) {
            echo "Tu horóscopo es Capricornio.";
          } else {
            echo "Tu horóscopo es Acuario."; 
          } 
          break; 
        case "Febrero": 
          if ($dia < 19) {
            echo "Tu horóscopo es Acuario.";
          } else if ($dia <= 29) {
            echo "Tu horóscopo es Piscis."; 
          } else {
            echo "Ese día no existe.";
          }
          break; 
        case "Marzo": 
          if ($dia < 21) {
            echo "Tu horóscopo es Piscis.";
          } else {
            echo "Tu horóscopo es Aries."; 
          } 
          break; 
        case "Abril": 
          if ($dia < 21) {
            echo "Tu horóscopo es Aries.";
          } else if ($dia <= 30) {
            echo "Tu horóscopo es Tauro."; 
          } else {
            echo "Ese día no existe.";
          }
          break; 
        case "Mayo": 
          if ($dia < 21) {
            echo "Tu horóscopo es Tauro.";
          } else {
            echo "Tu horóscopo es Géminis."; 
          } 
          break; 
        case "Junio": 
          if ($dia < 21) {
            echo "Tu horóscopo es Géminis.";
          } else if ($dia <= 30) {
            echo "Tu horóscopo es Cáncer."; 
          } else {
            echo "Ese día no existe.";
          }
          break; 
        case "Julio": 
          if ($dia < 22) {
            echo "Tu horóscopo es Cáncer.";
          } else {
            echo "Tu horóscopo es Leo."; 
          } 
          break; 
        case "Agosto": 
          if ($dia < 23) {
            echo "Tu horóscopo es Leo.";
          } else {
            echo "Tu horóscopo es Virgo."; 
          } 
          break; 
        case "Septiembre": 
          if ($dia < 23) {
            echo "Tu horóscopo es Virgo.";
          } else if ($dia <= 30) {
            echo "Tu horóscopo es Libra."; 
          } else {
            echo "Ese día no existe.";
          }
          break; 
        case "Octubre": 
          if ($dia < 23) {
            echo "Tu horóscopo es Libra.";
          } else {
            echo "Tu horóscopo es Escorpio."; 
          } 
          break; 
        case "Noviembre": 
          if ($dia < 22) {
            echo "Tu horóscopo es Escorpio.";
          } else if ($dia <= 30) {
            echo "Tu horóscopo es Sagitario."; 
          } else {
            echo "Ese día no existe.";
          }
          break; 
        case "Diciembre": 
          if ($dia < 21) {
            echo "Tu horóscopo es Sagitario.";
          } else {
            echo "Tu horóscopo es Capricornio."; 
          } 
          break; 
      }
    ?>
  </body>
</html>
