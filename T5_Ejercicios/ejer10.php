<!DOCTYPE html>
<!--
Ejercicio 10. 
Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
cogido de una baraja de verdad.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 10</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article {
        overflow: hidden;
      }
      section article span.numeroEjer {
        font-size: 1.2rem;
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
          <span class="numeroEjer">Ejercicio 10</span>
          <?php
            //defino los 2 arrays que me hacen falta para crear la carta
            $numerosCartas = array("as", "dos", "tres", "cuatro", 
              "cinco", "seis", "siete", "sota", "caballo", "rey");
            $palosCartas = array("oros", "copas", "espadas", "bastos");
            //y el array que une cada carta con su valor
            $valoresCartas = [
              "as" => 11, 
              "dos" => 0, 
              "tres" => 10, 
              "cuatro" => 0, 
              "cinco" => 0, 
              "seis" => 0, 
              "siete" => 0, 
              "sota" => 2, 
              "caballo" => 3, 
              "rey" => 4,
            ];
            
            $cartasAleatorias;
            $totalPuntos = 0;
            
            echo "<div>";
            //creo una carta aleatoria mientras ya se encuentre dentro del array
            while (count($cartasAleatorias) <= 10) {
              $numero = $numerosCartas[rand(0, 9)];
              $palo = $palosCartas[rand(0, 3)];
              if (!in_array($numero . " de " . $palo, $cartasAleatorias)) {
                $cartasAleatorias[] = $numero . " de " . $palo;
                echo "Carta: " . $numero . " de " . $palo . " -> " . $valoresCartas[$numero] . "<br>";
                $totalPuntos += $valoresCartas[$numero];
              }
            }
            echo "<strong>Total de puntos:</strong> " . $totalPuntos;
            echo "</div>";
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer09.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer11.php">Siguiente</a></div>
    </footer>
  </body>
</html>