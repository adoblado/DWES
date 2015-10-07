<!DOCTYPE html>
<!--
Ejercicio 7. 
Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
“Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.
-->
<html>
  <head>
    <title>Ejercicio 7</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
        width: 900px;
        margin: auto;
        text-align: center;
        background-color: lightblue;
      }
      img {
        height: 400px;
        width: auto;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Intenta abrir la caja fuerte</h1>
    </header>
    <article>
      <?php
        $combinacion = 8945;

        $intentos = isset($_REQUEST['intentos']) ? $_REQUEST['intentos'] : 4;
        $prueba = isset($_REQUEST['prueba']) ? $_REQUEST['prueba'] : -1;

        if (($intentos > 0) && ($prueba != $combinacion)) {
          echo "<img src='images/cajaCerrada.png' alt='Caja Cerrada'><br><br>";
          echo "<form action='ejer07.php' method='post'>
                  <input type='number' name='prueba' value='0' step='1' max='9999' min='0000'>
                  <input type='hidden' name='intentos' value='". ($intentos - 1) ."'>
                  <input type='submit' name='probar' value='Probar'>
                </form>";
          if ($intentos != 4) {
            echo "<h3>Número incorrecto</h3>";
            echo "<h4>Le quedan ", $intentos , " intentos<h4>";
          }
        } else if (($intentos == 0) && ($prueba != $combinacion)) {
          echo "<img src='images/cajaCerrada.png' alt='Caja Cerrada'><br><br>";
          echo "<h3>Número incorrecto</h3>";
          echo "<h4>Lo siento, has acabado todos tus intentos.</h4>";
          echo "<h6>El número correcto era ". $combinacion . "</h6>";
        } else if ($prueba == $combinacion) {
          echo "<img src='images/cajaAbierta.png' alt='Caja Abierta'><br><br>";
          echo "<h3>Número correcto</h3>".
            "<h4>La caja fuerte está abierta<h4>";
        }
      ?>
    </article>
  </body>
</html>
