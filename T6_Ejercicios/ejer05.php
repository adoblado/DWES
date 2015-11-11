<!DOCTYPE html>
<!--
Ejercicio 5. 
Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un
catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos
la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado
de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito.
Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá
incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito,
habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del
carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.
-->
<!-- inicio sesión antes de nada -->
<?php session_start(); ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
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
            margin-left: 30px;
          }
          /* EL CONTENEDOR DE LA INFORMACIÓN DE CADA PRODUCTO */
          div#contenedor article article#productos section.cadaProducto div {
            margin-left: 120px;
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
          <span class="numeroEjer">Ejercicio 5</span>
          <?php
            $carrito =& $_SESSION['carrito'];
            
            $productos = [
              ["codigo" => "beefeater",
                "imagen" => "<img src='images/beefeater.png'>",
                "nombre" => "Beefeater Original", 
                "descripcionLarga" => "47% alcohol<br>Desde 1876<br>UK<br>", 
                "descripcionCorta" => "47% alcohol (UK)<br>", 
                "precio" => 12],
              ["codigo" => "bombay",
                "imagen" => "<img src='images/bombay.png'>",
                "nombre" => "Bombay Sapphire", 
                "descripcionLarga" => "47% alcohol<br>Desde 1987<br>UK<br>", 
                "descripcionCorta" => "47% alcohol (UK)<br>", 
                "precio" => 24],
              ["codigo" => "larios",
                "imagen" => "<img src='images/larios.png'>",
                "nombre" => "Larios Mediterráneo", 
                "descripcionLarga" => "40% alcohol<br>Desde 1866<br>España<br>", 
                "descripcionCorta" => "40% alcohol (España)<br>", 
                "precio" => 9],
            ];
          ?> 
            <h2>La Ginebroteca</h2>
            
            <article id="productos">
              <h3>Productos</h3>
          <?php
                foreach ($productos as $cadaProducto) {
                  echo "<section class='cadaProducto'>";
                  echo $cadaProducto["imagen"];
                  echo "<div>";
                    echo "<h5>" . $cadaProducto["nombre"] . "</h5>";
                    echo $cadaProducto["descripcionLarga"];
                    echo "Precio: " . $cadaProducto["precio"] . "€";
          ?>
                    <form action="ejer05.php" method="post">
                      <input type="submit" name="peticion" value="Comprar">
                      <input type="hidden" name="codigo" value="<?=$cadaProducto["codigo"]?>">
                    </form>
          <?php
                  echo "</div></section>";
                }
          ?>
            </article>
            <article id="carrito">
              <h3>Carrito</h3>
          <?php
                //AQUÍ VA EL EJERCICIO EN SÍ
                if (!isset($carrito)) {
                  echo "El carrito está vacío";
                  $carrito = array("beefeater" => 0, "bombay" => 0, "larios" => 0);
                }
                
                $peticion = strtolower($_REQUEST['peticion']); 
                $codigo = $_REQUEST['codigo'];
                
                if ($peticion == "comprar") {
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
                    echo $productoSolo["imagen"];
                    echo "<div>";
                      echo "<h5>" . $productoSolo["nombre"] . "</h5>";
                      echo $productoSolo["descripcionCorta"];
                      echo "Cantidad: " . $carrito[$codigo] . "<br>";
                      echo "Precio: " . ($productoSolo["precio"] * $carrito[$codigo]) . "€";
            ?>
                      <form action="ejer05.php" method="post">
                        <input type="submit" name="peticion" value="Eliminar">
                        <input type="hidden" name="codigo" value="<?=$codigo?>">
                      </form>
            <?php
                    echo "</div></section>";
                  }
                }
                echo "<p><span>Total:</span> " . $total . "€</p><br><br>";
          ?>
            </article>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer04.php">Anterior</a></div>
      <div id="siguiente"><a href="ejer06/ejer06.php">Siguiente</a></div>
    </footer>
  </body>
</html>