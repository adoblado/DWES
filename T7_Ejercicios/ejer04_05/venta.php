<?php
try {
  $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  ?> 

  <header class='dentroEjer flow-text center-align'>
    <h4>Ejercicio 4/5</h4>
  </header>

  <article class='dentroEjer section'>
  <?php
    $carrito =& $_SESSION['carrito'];
    
    if (!$_REQUEST['realizaVenta']) {
      $consulta = $conexion->query('SELECT * FROM articulos');
      ?>
      <form action='ejers.php?carp=ejer04_05&ejer=venta' method='post'>
        <table class='responsive-table ventaSI'>
          <caption>VENTA DE MERCANCÍA</caption>
            <?php
            $artFila = 0;
            $contador = 0;

            while ($articulo = $consulta->fetchObject()){
              ($artFila == 3) ? $artFila = 1 : $artFila++;
              
              if ($artFila == 1) {
                echo "<tr>";
              }
              $contador++;
              ?>
              <td>
                <input type='checkbox' class='filled-in' id='art<?= $contador ?>' name='art<?= $contador ?>' value='<?= $articulo->codArt ?>'>
                <label for='art<?= $contador ?>'><?= $articulo->desArt ?></label>
              </td>
              <?php
              if ($artFila == 3) {
                echo "</tr>";
              }
            }
          ?>
          <tr><td></td><td></td><td class='center-align'>
            <button class='btn-large waves-effect waves-light deep-orange darken-3' name='realizaVenta' value='OK' type='submit'>
              VENDER
            </button>
          </td></tr>
        </table>
        <input type='hidden' name='contador' value='<?= $contador ?>'>
      </form>
    <?php
    } else if (!$_REQUEST['ventaRealizada']) {
      $contador = $_REQUEST['contador'];
      $carrito = [];
      
      for ($i = 1; $i <= $contador; $i++) {
        if ($_REQUEST['art' . $i]) {
          $carrito[+$_REQUEST['art' . $i]] = 0;
        }
      }
      ?>
      <form action='ejers.php?carp=ejer04_05&ejer=venta' method='post'>
        <table class='responsive-table ventaSI'>
          <caption>VENTA DE MERCANCÍA</caption>
          <thead>
            <tr>
              <th>Descripción</th>
              <th>Stock en Almacén</th>
              <th>Cantidad de Mercancía para Vender</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($carrito as $codigo => $cantidad) {
              $consulta = $conexion->query('SELECT * FROM articulos WHERE codArt=' . $codigo);
              while ($articulo = $consulta->fetchObject()){
                ?>
                <tr>
                  <td><?= $articulo->desArt ?></td>
                  <td><?= $articulo->stoArt ?></td>
                  <td>
                    <input type='number' min='0' max='<?=$articulo->stoArt?>' step='1' name='cantMerc<?=$articulo->codArt?>' autofocus required>
                  </td>
                </tr>
                <?php
              }
            }
          ?>
            <tr><td></td><td></td><td class='center-align'>
              <button class='btn-large waves-effect waves-light deep-orange darken-3' name='ventaRealizada' value='OK' type='submit'>
                VENDER
              </button>
              <input type='hidden' name='realizaVenta' value='OK'>
            </td></tr>
          </tbody>
        </table>
      </form>
    <?php
    } else {
      ?>
      <table class='striped responsive-table centered venta'>
        <caption><b>FACTURA PARA CLIENTE</b></caption>
        <thead>
          <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio/unidad</th>
            <th>Cantidad</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $baseImp = 0;
          foreach ($carrito as $codigo => $cantidad) {
            $carrito[$codigo] = +$_REQUEST['cantMerc' . $codigo];
            $consulta = $conexion->query('SELECT * FROM articulos WHERE codArt=' . $codigo);
            
            while ($articulo = $consulta->fetchObject()){
              $precioMerc = ($articulo->preVenArt * $carrito[$codigo]);
              $baseImp += $precioMerc;
              ?>
              <tr>
                <td class='codigo'><?= $articulo->codArt ?></td>
                <td class='description'><?= $articulo->desArt ?></td>
                <td class='number'><?= $articulo->preVenArt ?></td>
                <td class='number'><?= $carrito[$codigo] ?></td>
                <td class='number'><?= $precioMerc ?></td>
              </tr>
              <?php
              $stock = $articulo->stoArt;
              $stock -= $carrito[$codigo];
              $update = 'UPDATE articulos
                         SET stoArt=' . $stock . '
                         WHERE codArt=' . $articulo->codArt;
              $conexion->exec($update);
            }
          }
          ?>
        </tbody>
      </table>
      <table class='striped finFactura'>
        <tr>
          <th>Base Imponible</th>
          <td><?= $baseImp ?></td>
        </tr>
          <?php $iva = round(($baseImp * 0.21), 2); ?>
        <tr>
          <th>IVA</th>
          <td><?= $iva ?></td>
        </tr>
        <tr>
          <th>Precio Total</th>
          <td><b><?= ($baseImp + $iva) ?></b></td>
        </tr>
        <tr>
          <td></td>
          <td>
          <!--<form action='ejers.php?carp=ejer04_05&ejer=imprimirFactura' method='post'>-->
            <button class='btn waves-effect waves-light deep-orange darken-3' name='imprimir' value='OK' type='submit'>
              IMPRIMIR PDF
            </button>
            <!--<input type='hidden' name='factura' value='<?=$factura?>'>
          </form>-->
        </td></tr>
      </table>
    <?php
    }
  ?>
  </article>
  
  <?php
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}
