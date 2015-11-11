<!DOCTYPE html>
<!--
Ejercicio 6. 
Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada
uno de los productos del catálogo deberá tener un botón *Detalle que, al ser accionado, debe llevar
al usuario a la vista de detalle que contendrá una descripción exhaustiva del producto en cuestión.
Se podrán añadir productos al carrito tanto desde la vista de listado como desde la vista de detalle.
-->
<?php session_start(); ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      div#contenedor article {
        overflow: hidden;
      }
      div#contenedor article h2 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 15px;
      }
      /* LA ZONA DE PRODUCTOS */
      div#contenedor article article#productos {
        float: left;
        width: 55%;
        overflow: hidden;
        border: 0;
        padding: 0;
      }
      /* LA ZONA DEL CARRITO */
      div#contenedor article article#carrito {
        float: right;
        width: 35%;
        overflow: hidden;
        padding: 0;
        border: 0;
      }
        /* LOS TÍTULOS DE CADA ZONA */
        div#contenedor article article#productos h3, div#contenedor article article#carrito h3 {
          padding: 0 0 10px 5px;
          border-bottom: 4px solid dimgrey;
          font-size: 1.5rem;
        }
        /* EL CONTENEDOR DE CADA UNO DE LOS PRODUCTOS */
        div#contenedor article article#productos section.cadaProducto {
          height: 200px;
          overflow: hidden;
          border-bottom: 2px solid grey;
          margin: 15px 0 0 5px;
        }
          /* LA IMAGEN DE CADA PRODUCTO */
          div#contenedor article article#productos section.cadaProducto img {
            height: 170px;
            float: left;
            margin: 0 40px 0 30px;
          }
          /* EL CONTENEDOR DE LA INFORMACIÓN DE CADA PRODUCTO */
          div#contenedor article article#productos section.cadaProducto div {
            overflow: hidden;
          }
          div#contenedor article article#productos section.cadaProducto form.float {
            float: right;
          }
        /* EL CONTENEDOR DE CADA UNO DEL CARRITO */
        div#contenedor article article#carrito section.cadaProducto {
          height: 150px;
          overflow: hidden;
          border-bottom: 1.5px solid grey;
          margin: 15px 5px 0 0;
        }
          /* LA IMAGEN DE CADA UNO DEL CARRITO */
          div#contenedor article article#carrito section.cadaProducto img {
            height: 100px;
            float: left;
            margin-left: 15px;
          }
          /* EL CONTENEDOR DE INFO DE CADA UNO DEL CARRITO */
          div#contenedor article article#carrito section.cadaProducto div {
            margin-left: 70px;
          }
        div#contenedor article article#carrito p {
          text-align: right;
          margin: 15px 35px 0 0; 
        }
        div#contenedor article article#carrito p span {
          font-weight: bold;
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
          <span class="numeroEjer">Ejercicio 6</span>
          <?php
            $carrito =& $_SESSION['carrito'];
            $productos =& $_SESSION['productos'];
            
            if (!$productos) { 
              $productos = [
                ["codigo" => "beefeater",
                  "imagen" => "beefeater.png",
                  "nombre" => "Beefeater Original", 
                  "descripcionLarga" => "47% alcohol<br>Desde 1876<br>UK<br>", 
                  "descripcionCorta" => "47% alcohol (UK)<br>", 
                  "detalle" => "Bebida originaria de UK. Comenzó a elaborarse en 1876<br>"
                  . "Los productores y exportadores actuales son personas diferentes<br>"
                  . "Tiene un 47% de alcohol<br>",
                  "precio" => 12],
                ["codigo" => "bombay",
                  "imagen" => "bombay.png",
                  "nombre" => "Bombay Sapphire", 
                  "descripcionLarga" => "47% alcohol<br>Desde 1987<br>UK<br>", 
                  "descripcionCorta" => "47% alcohol (UK)<br>", 
                  "detalle" => "Bebida originaria de UK. Comenzó a elaborarse en 1987<br>"
                  . "Los productores y exportadores actuales son personas diferentes<br>"
                  . "Tiene un 47% de alcohol<br>",
                  "precio" => 24],
                ["codigo" => "larios",
                  "imagen" => "larios.png",
                  "nombre" => "Larios Mediterráneo", 
                  "descripcionLarga" => "40% alcohol<br>Desde 1866<br>España<br>", 
                  "detalle" => "Bebida originaria de España. Comenzó a elaborarse en 1866<br>"
                  . "Los productores y exportadores actuales son personas diferentes<br>"
                  . "Tiene un 40% de alcohol<br>",
                  "descripcionCorta" => "40% alcohol (España)<br>", 
                  "precio" => 9],
              ];
            } 
          ?> 
            <h2>La Ginebroteca</h2>
            
            <article id="productos">
              <h3>Productos</h3>
          <?php
                foreach ($productos as $cadaProducto) {
                  echo "<section class='cadaProducto'>";
                  echo "<img src='images/" . $cadaProducto["imagen"] . "'>";
                  echo "<div>";
                    echo "<h5>" . $cadaProducto["nombre"] . "</h5>";
                    echo $cadaProducto["descripcionLarga"];
                    echo "Precio: " . $cadaProducto["precio"] . "€";
                  echo "</div>";
          ?>
                  <form class="float" action="ejer06.php" method="post">
                    <input type="submit" name="peticion" value="Comprar">
                    <input type="hidden" name="codigo" value="<?=$cadaProducto["codigo"]?>">
                  </form>
                  <form class="float" action="ejer06_detalle.php" method="post">
                    <input type="submit" name="peticion" value="Detalle">
                    <input type="hidden" name="codigo" value="<?=$cadaProducto["codigo"]?>">
                  </form>  
          <?php
                  echo "</section>";
                }
          ?>
            </article>
            <article id="carrito">
              <h3>Carrito</h3>
          <?php
                //AQUÍ VA EL EJERCICIO EN SÍ
                $peticion = strtolower($_REQUEST['peticion']); 
                $codigo = $_REQUEST['codigo'];
                
                if ($peticion == "comprar") {
                  if (!isset($carrito)) {
                    $carrito = array("beefeater" => 0, "bombay" => 0, "larios" => 0);
                  }
                  $carrito[$codigo]++;
                } else if ($peticion == "eliminar") {
                  if ($carrito[$codigo] > 1) {
                    $carrito[$codigo]--;
                  } else {
                    $carrito[$codigo] = 0;
                  }
                }
                
                //MUESTRO POR PANTALLA
                $total = 0;
                foreach ($productos as $productoSolo) {
                  $codigo = $productoSolo["codigo"]; 
                  if ($carrito[$codigo] > 0) {
                    $total += $carrito[$codigo] * $productoSolo["precio"];
                    echo "<section class='cadaProducto'>";
                    echo "<img src='images/" . $productoSolo["imagen"] . "'>";
                    echo "<div>";
                      echo "<h5>" . $productoSolo["nombre"] . "</h5>";
                      echo $productoSolo["descripcionCorta"];
                      echo "Cantidad: " . $carrito[$codigo] . "<br>";
                      echo "Precio: " . ($productoSolo["precio"] * $carrito[$codigo]) . "€";
            ?>
                      <form action="ejer06.php" method="post">
                        <input type="submit" name="peticion" value="Eliminar">
                        <input type="hidden" name="codigo" value="<?=$codigo?>">
                      </form>
            <?php
                    echo "</div></section>";
                  }
                }
                //esto sirve para comprobar si el carrito está vacío y mostrar el mensaje de que lo está
                $lleno = false;
                foreach ($carrito as $codigo => $cantidad) {
                  if ($cantidad > 0) {
                    $lleno = true;
                  }
                }
                if (!$lleno) {
                  echo "El carrito está vacío";
                }
                echo "<p><span>Total:</span> " . $total . "€</p><br><br>";
          ?>
            </article>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer05.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer07.php">Siguiente</a></div>
    </footer>
  </body>
</html>