<!DOCTYPE html>
<!--
Ejercicio 5. 
Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
del diagrama se pueden dibujar a base de la concatenación de una imagen. 
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      table, th, td {
        padding: 10px;
      }
      table tr td:first-child {
        font-weight: bold;
      }
      span.frio {
        color: #32CCCC;
      }
      span.normal {
        color: #FFFF66;
      }
      span.calor {
        color: #FF3300;
      }
    </style>
  </head>
  <body>
    <a href="indexTema5.html"><header>
      <h1>Ejercicios Tema 5</h1>
    </header></a>
    <nav>
      <a href="ejer01.php"><span>Ejer 01</span></a>
      <a href="ejer02.php"><span>Ejer 02</span></a>
      <a href="ejer03.php"><span>Ejer 03</span></a>
      <a href="ejer04.php"><span>Ejer 04</span></a>
      <a href="ejer05.php"><span>Ejer 05</span></a>
      <a href="ejer06.php"><span>Ejer 06</span></a>
      <a href="ejer07.php"><span>Ejer 07</span></a>
      <a href="ejer08.php"><span>Ejer 08</span></a>
      <a href="ejer09.php"><span>Ejer 09</span></a>
      <a href="ejer10.php"><span>Ejer 10</span></a>
      <a href="ejer11.php"><span>Ejer 11</span></a>
      <a href="ejer12.php"><span>Ejer 12</span></a>
      <a href="ejer13.php"><span>Ejer 13</span></a>
      <a href="ejer14.php"><span>Ejer 14</span></a>
      <a href="ejer15.php"><span>Ejer 15</span></a>
    </nav>
    <section>
      <div id="contenedor">
        <article>
          <span class="numeroEjer">Ejercicio 5</span>
          <?php
            $nombreMes = ["Enero", 
              "Febrero", 
              "Marzo", 
              "Abril", 
              "Mayo", 
              "Junio", 
              "Julio", 
              "Agosto",
              "Septiembre", 
              "Octubre", 
              "Noviembre",
              "Diciembre",
            ];
            
            $cantTemps = isset($_REQUEST['cantidad']) ? $_REQUEST['cantidad'] : 0;
            $tempString = $_REQUEST['temperaturas'];
            $numIntro = $_REQUEST['intro'];
            
            if ($cantTemps < 12) {
          ?>
            <form action="#" method="get">
              Temperatura del mes de <?= $nombreMes[$cantTemps]; ?>
              <input type="number" name="intro" autofocus="autofocus"><br>
              <input type="hidden" name="cantidad" value="<?=++$cantTemps?>">
              <input type="hidden" name="temperaturas" value="<?=$tempString.' '.$numIntro?>">
              <input type="submit" name="aceptar" value="Aceptar">
            </form>
          <?php
            } else {
              $tempString = $tempString . " " . $numIntro;
              $tempString = trim($tempString);
              //almaceno los números en un array
              $arrayTemps = explode(" ", $tempString);
              $longitud = count($arrayTemps);
              
              echo "<br><table>";
              for ($i = 0; $i < $longitud; $i++) {
                echo "<tr><td>" . $nombreMes[$i] . "</th><td>";
                for ($j = 0; $j < $arrayTemps[$i]; $j++) {
                  if ($arrayTemps[$i] < 15) {
                    echo "<span class='frio'>█</span>";
                  } else if ($arrayTemps[$i] < 30) {
                    echo "<span class='normal'>█</span>";
                  } else {
                    echo "<span class='calor'>█</span>";
                  }
                }
                echo  "&nbsp;&nbsp;" . $arrayTemps[$i] . "ºC</td></tr>";
              }
              echo "</table>";
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer04.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer06.php">Siguiente</a></div>
    </footer>
  </body>
</html>