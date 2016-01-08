<!DOCTYPE html>
<?php session_start(); ?>
<!--
EJERCICIOS DEL TEMA 7. ACCESO A BASE DE DATOS
-->
<html>
  <head>
    <meta charset="UTF-8">
    
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/misEstilos.css"  media="screen,projection"/>
    
    <title>TEMA 7. ACCESO A BASE DE DATOS</title>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <header class="deep-orange darken-3 section">
      <section class="container white-text center-align">
        <h1 >EJERCICIOS TEMA 7</h1>
        <h3>Acceso a Bases de Datos</h3>
      </section>
    </header>
    <nav class="deep-orange lighten-2">
      <ul class="container">
        <li><a href="ejers.php?carp=ejer01_mysql&ejer=ejer01_mysql">Ejercicio 1 - mysql</a></li>
        <li><a href="ejers.php?carp=ejer01_mysqli&ejer=ejer01_mysqli">Ejercicio 1 - mysqli</a></li>
        <li><a href="ejers.php?carp=ejer01_pdo&ejer=ejer01_pdo">Ejercicio 1 - PDO</a></li>
        <li><a href="ejers.php?carp=ejer02&ejer=ejer02">Ejercicio 2</a></li>
        <li><a href="ejers.php?carp=ejer03&ejer=ejer03">Ejercicio 3</a></li>
        <li><a href="ejers.php?carp=ejer04_05&ejer=ejer">Ejercicio 4/5</a></li>
      </ul>
    </nav>
    <main>
      <section class="ejercicio section container">
        <?php
        
        include $_REQUEST['carp'] . '/' . $_REQUEST['ejer'] . '.php';
        
        ?>
        <footer class="section">
          <a class="waves-effect waves-light btn-large deep-orange darken-3" 
             href="index.html">
            <i class="material-icons right">reply</i>
            Inicio
          </a>
        </footer>
      </section>
    </main>
    <footer class="deep-orange darken-3 page-footer section">
      <div class="container white-text center-align">
        <h6>Página realizada por Adolfina Rueda Sánchez</h6>
        <h6>Asignatura Desarrollo Web en Entorno Servidor</h6>
        <h6>IES Campanillas</h6>
      </div>
    </footer>
    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
  <?php 
    $conexion->close();
  ?>
</html>
