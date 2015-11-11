<!DOCTYPE html>
<!--
Ejercicio 7. 
Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color ) de
una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
    </style>
  </head>
  <body>
    <a href="indexTema6.html"><header>
      <h1>Ejercicios Tema 6</h1>
    </header></a>
    <nav>
      <a href="ejer01.php"><span>Ejercicio 01</span></a>
      <a href="ejer02.php"><span>Ejercicio 02</span></a>
      <a href="ejer03.php"><span>Ejercicio 03</span></a>
      <a href="ejer04.php"><span>Ejercicio 04</span></a>
      <a href="ejer05.php"><span>Ejercicio 05</span></a>
      <a href="ejer06.php"><span>Ejercicio 06</span></a>
      <a href="ejer07.php"><span>Ejercicio 07</span></a>
      <a href="ejer08.php"><span>Ejercicio 08</span></a>
      <a href="ejer09.php"><span>Ejercicio 09</span></a>
    </nav>
    <section>
      <div id="contenedor">
        <article>
          <span class="numeroEjer">Ejercicio 7</span>
          <?php 
            if (isset($_REQUEST['color'])) {
              $color =  $_REQUEST['color'];
              setcookie("color", $color, time() + 3*24*3600);
            } else if (isset($_COOKIE['color'])) {
              $color = $_COOKIE['color'];
            } 
          ?>
          <div id="prueba" style="background-color:<?=$color?>;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Proin diam justo, scelerisque non felis porta, 
            placerat vestibulum nisi. Vestibulum ac elementum massa. 
            In rutrum quis risus quis sollicitudin. Pellentesque non eros ante. 
            Vestibulum sed tristique massa. Quisque et feugiat risus, 
            eu tristique felis. Pellentesque habitant morbi tristique senectus 
            et netus et malesuada fames ac turpis egestas. Nulla facilisi. 
            Pellentesque varius ipsum in urna semper volutpat. 
            Etiam ac magna scelerisque, sodales enim at, interdum nibh. 
            Nulla nec blandit orci. Ut suscipit sollicitudin varius. 
            Etiam ut bibendum purus, sit amet tristique lectus.
          </div><br>
          <form action="ejer07.php" method="post">
            <b>Elige un color para el fondo: </b>
            <input type="color" name="color" value="<?=$color?>">
            <input type="submit" name="aceptar" value="Aceptar">
          </form>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer06.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer08.php">Siguiente</a></div>
    </footer>
  </body>
</html>