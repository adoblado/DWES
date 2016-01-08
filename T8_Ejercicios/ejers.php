<!DOCTYPE html>
<?php session_start(); ?>
<!--
EJERCICIOS DEL TEMA 8. PHP ORIENTADO A OBJETOS
-->
<html>
  <head>
    <meta charset="UTF-8">
    
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/misEstilos.css"  media="screen,projection"/>
    
    <title>TEMA 8. PHP ORIENTADO A OBJETOS</title>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <header class="blue-grey darken-3 section">
      <section class="container white-text center-align">
        <h1>EJERCICIOS TEMA 8</h1>
        <h3>PHP Orientado a Objetos</h3>
      </section>
    </header>
    <nav class="blue-grey lighten-2">
      <ul class="container">
        <li><a href="ejers.php?carp=ejer01&ejer=ejer01">Ejercicio 1</a></li>
        <li><a href="ejers.php?carp=ejer02&ejer=ejer02">Ejercicio 2</a></li>
        <li><a href="ejers.php?carp=ejer03&ejer=ejer03">Ejercicio 3</a></li>
        <li><a href="ejers.php?carp=ejer04&ejer=ejer04">Ejercicio 4</a></li>
      </ul>
    </nav>
    <main>
      <section class="ejercicio section container">
        <?php
        
        include $_REQUEST['carp'] . '/' . $_REQUEST['ejer'] . '.php';
        
        ?>
        <footer class="section">
          <a class="waves-effect waves-light btn-large blue-grey darken-3" 
             href="index.html">
            <i class="material-icons right">reply</i>
            Inicio
          </a>
        </footer>
      </section>
    </main>
    <footer class="blue-grey darken-3 page-footer section">
      <div class="container white-text center-align">
        <h6>Página realizada por Adolfina Rueda Sánchez</h6>
        <h6>Asignatura Desarrollo Web en Entorno Servidor</h6>
        <h6>IES Campanillas</h6>
      </div>
    </footer>
    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/misScripts.js"></script>
  </body>
</html>
