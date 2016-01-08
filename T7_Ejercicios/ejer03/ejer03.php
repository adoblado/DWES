<?php
  
?>
<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 3</h4>
  <p>Modifica la tienda virtual realizada anteriormente de tal forma que todos 
    los datos de los artículos se guarden en una base de datos.</p>
</header>
<article class='dentroEjer ejer3'>
  
<?php

//establezco conexión con localhost
try {
  $conexion = new PDO("mysql:host=localhost;dbname=ginebroteca;charset=utf8", "root", "root");
  ?>
  <div class="chip">
    Se ha establecido una conexión con el servidor de bases de datos
    <i class="material-icons">close</i>
  </div>
  
  <?php
    $carrito =& $_SESSION['carrito'];


    $consultaMostrar = $conexion->query("SELECT codPro, nomPro, imgPro, descPro, prePro FROM productos");

  ?>

  <h2>La Ginebroteca</h2>

  <article id="productos">
    <h3>Productos</h3>
    <?php
    if ($_REQUEST['peticion'] == "detalle") {
      $codigo = $_REQUEST['codPro'];
      while ($cadaProducto = $consultaMostrar->fetchObject()) {
        if ($cadaProducto->codPro == $codigo) {
          echo "<section class='cadaProducto detalle'>";
          echo "<img src='../img/" . $cadaProducto->imgPro . "'>";
          echo "<div>";
            echo "<h5>" . $cadaProducto->nomPro . "</h5>";
            echo $cadaProducto->descPro;
            echo "<br>Precio: " . $cadaProducto->prePro . "€";
          echo "</div>";

          ?>
          <form class='botonInline right bottom' action='ejers.php?carp=ejer03&ejer=ejer03' method="post">
            <button class='btn-floating waves-effect waves-light green' name='peticion' value='comprar' type='submit'>
              <i class="material-icons">add_shopping_cart</i>
            </button>
            <input type='hidden' name='codPro' value='<?= $cadaProducto->codPro ?>'>
          </form>
          <form class="botonInline right" action="ejers.php?carp=ejer03&ejer=ejer03" method="post">
            <button class='btn-floating waves-effect waves-light deep-orange darken-3' type='submit'>
              <i class="material-icons">reply</i>
            </button>
          </form> 
          <?php
          echo "</section>";
        }
      }
    } else {
      while ($producto = $consultaMostrar->fetchObject()) {
        echo "<section class='cadaProducto'>";
        echo "<img src='" . $producto->imgPro . "'>";
        echo "<div>";
          echo "<h5>" . $producto->nomPro . "</h5>";
          echo $producto->descPro;
          echo "<br>Precio: " . $producto->prePro . "€";
          echo "</div>";
      ?>
        <form class='botonInline right' action='ejers.php?carp=ejer03&ejer=ejer03' method="post">
          <button class='btn-floating waves-effect waves-light green' name='peticion' value='comprar' type='submit'>
            <i class="material-icons">add_shopping_cart</i>
          </button>
          <input type='hidden' name='codPro' value='<?= $producto->codPro ?>'>
        </form>
        <form class='botonInline right' action='ejers.php?carp=ejer03&ejer=ejer03' method="post">
          <button class='btn-floating waves-effect waves-light blue' name='peticion' value='detalle' type='submit'>
            <i class="material-icons">add_circle</i>
          </button>
          <input type='hidden' name='codPro' value='<?= $producto->codPro ?>'>
        </form>
      <?php
        echo "</section>";
      }
    }
    ?>
    
    
  </article>
  <article id="carrito">
    <h3>
      <form class='botonInline right' action='ejers.php?carp=ejer03&ejer=ejer03' method="post">
        <button class='btn-floating waves-effect waves-light red accent-4' name='peticion' value='limpiarTodo' type='submit'>
          <i class="material-icons">clear</i>
        </button>
      </form>
      Carrito
    </h3>
    
    <?php
    //AQUÍ VA EL EJERCICIO EN SÍ
    $peticion = $_REQUEST['peticion']; 
    $codigo = $_REQUEST['codPro'];

    if ($peticion == "comprar") {
      if (!isset($carrito)) {
        $carrito = ["beefeater" => 0, "bombay" => 0, "larios" => 0];
      }
      $carrito[$codigo]++;
    } else if ($peticion == "eliminar") {
      if ($carrito[$codigo] > 1) {
        $carrito[$codigo]--;
      } else {
        $carrito[$codigo] = 0;
      }
    } else if ($peticion == "limpiarTodo") {
      foreach ($carrito as $codigoCarrito => $cantidad) {
        $carrito[$codigoCarrito] = 0;
      }
    }
    
    $consultaCarrito = $conexion->query("SELECT codPro, nomPro, imgPro, descPro, prePro FROM productos");
    //MUESTRO POR PANTALLA
    $total = 0;
    while ($productoSolo = $consultaCarrito->fetchObject()) {
      $codigo = ($productoSolo->codPro);
      if ($carrito[$codigo] > 0) {
        $total += $carrito[$codigo] * $productoSolo->prePro;
        echo "<section class='cadaProducto'>";
        echo "<img src='" . $productoSolo->imgPro . "'>";
        echo "<div>";
          echo "<h5>" . $productoSolo->nomPro . "</h5>";
          echo $productoSolo->descPro;
          echo "<br>Cantidad: " . $carrito[$codigo] . "<br>";
          echo "Precio: " . ($productoSolo->prePro * $carrito[$codigo]) . "€";
    ?>
          <form class='botonInline right' action='ejers.php?carp=ejer03&ejer=ejer03' method="post">
            <button class='btn-floating waves-effect waves-light red' name='peticion' value='eliminar' type='submit'>
              <i class="material-icons">delete</i>
            </button>
            <input type='hidden' name='codPro' value='<?= $productoSolo->codPro ?>'>
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
  
<?php
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}
