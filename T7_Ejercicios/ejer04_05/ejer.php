<?php
  
?>
<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 4/5</h4>
  <p><sub>Crea el programa GESTISIMAL (GESTIón SIMplifcada de Almacén) para llevar el control de los
artículos de un almacén. De cada artículo se debe saber el código, la descripción, el precio de
compra, el precio de venta y el stock (número de unidades). La entrada y salida de mercancía
supone respectivamente el incremento y decremento de stock de un determinado artículo. Hay que
controlar que no se pueda sacar más mercancía de la que hay en el almacén. El programa debe tener,
al menos, las siguientes funcionalidades: listado, alta, baja, modificación, entrada de mercancía y
salida de mercancía.</sub></p>
  <p><sub>Comprueba la existencia del código en el alta, la baja y la modificación de artículos para
evitar errores. Cambia la opción “Salida de stock” por “Venta”. Esta nueva opción permitirá hacer una venta
de varios artículos y emitir la factura correspondiente. Se debe preguntar por los códigos y
las cantidades de cada artículo que se quiere comprar. Aplica un 21% de IVA. </sub></p>
</header>
<article class='dentroEjer ejer3'>
  
<?php

//establezco conexión con localhost
try {
  $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  ?>
  <div class="chip">
    Se ha establecido una conexión con el servidor de bases de datos
    <i class="material-icons">close</i>
  </div>
  
  <?php
    $consultaMostrar = $conexion->query("SELECT * FROM articulos");
  ?>
  
  <h2>Tu ferretería más bonita</h2>
  <table class='highlight responsive-table centered'>
    <!-- primero la cabecera de la tabla -->
    <thead>
      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Precio de Compra</th>
        <th>Precio de Venta</th>
        <th>Stock</th>
        <td></td>
        <td>
          <form class='botonInline right' action='ejers.php?carp=ejer04_05&ejer=venta' method='post'>
            <button class='btn-large waves-effect waves-light deep-orange darken-3 icon-truckB'
              name='venta' type='submit'>
              Venta
            </button>
          </form>
        </td>
      </tr>
    </thead>
    <!-- despues el formulario de insercion de artículo -->
    <tbody>
      <tr>
        <td class='codigo'></td>
        <form action='ejers.php?carp=ejer04_05&ejer=altaArticulo' method='post'>
          <td class='input-field description'>
            <i class='material-icons prefix'>description</i>
            <input type='text' name='desArtIntro' required>
          </td>
          <td class='input-field number'>
            <i class='material-icons prefix'>attach_money</i>
            <input type='number' min='0' step='0.01' name='preComArtIntro' required>
          </td>
          <td class='input-field number'>
            <i class='material-icons prefix'>attach_money</i>
            <input type='number' min='0' step='0.01' name='preVenArtIntro' required>
          </td>
          <td class='input-field number'>
            <i class='material-icons prefix'>markunread_mailbox</i>
            <input type='number' min='0' step='1' name='stoArtIntro' required>
          </td>
          <td class='floating'>
            <button class='btn-floating waves-effect waves-light green'
              type='submit' name='alta'>
              <i class='material-icons'>add</i>
            </button>
          </td>
          <td></td>
        </form>
      </tr>
        
    <?php
    //ahora recorro la consulta realizada sacando cada artículo
      while ($articulo = $consultaMostrar->fetchObject()){
        //muestro los campos con su oculto dentro del formulario de edición
        ?>
        <tr>
          <td><?= $articulo->codArt ?></td>
          <td><?= $articulo->desArt ?></td>
          <td><?= $articulo->preComArt ?></td>
          <td><?= $articulo->preVenArt ?></td>
          <td><?= $articulo->stoArt ?></td>
          <!-- se podrá editar o eliminar el cliente pulsando el correspondiente botón -->
          <td>
            <form class='botonInline' action='ejers.php?carp=ejer04_05&ejer=modifArticulo' method="post">
              <button class='btn-floating waves-effect waves-light blue'
                name='modificar' type='submit'>
                <i class='material-icons'>mode_edit</i>
              </button>
              <input type='hidden' name='codArt' value='<?= $articulo->codArt ?>'>
            </form>
            <form class='botonInline' action='ejers.php?carp=ejer04_05&ejer=ejer' method='post'>
              <button class='btn-floating waves-effect waves-light red'
                type='submit' id="confirmaDelete">
                <i class='material-icons'>close</i>
              </button>
              <input type="hidden" name="confirmaDelete" value="OK">
              <input type='hidden' name='codArt' value='<?= $articulo->codArt ?>'>
            </form>
          </td>
          <td>
            <form class='botonInline' action='ejers.php?carp=ejer04_05&ejer=entrMerc' method="post">
              <!-- BOTÓN CON CAMIONCITO -->
              <!--<button class="btn btn-7 btn-7a icon-truck" name="entrada" type="submit">ENTRADA</button>-->
              <button class='btn-large waves-effect waves-light deep-orange lighten-2 icon-truckA'
                name='entrada' type='submit'>
                Entrada
              </button>
              <input type='hidden' name='codArt' value='<?= $articulo->codArt ?>'>
            </form>
          </td>
        </tr>
    <?php
      }
    ?>
    </tbody>
  </table>
  <?php
    
    if ($_POST['confirmaDelete']) {
      $codArtBorrado = $_POST['codArt'];
      ?>
      <div id="confirmacionBorrado" class="hoverable">
        <p>¿Estas seguro de que quieres borrar el ártículo con código <?= $codArtBorrado ?>?</p>
        <form class='botonInline' action="ejers.php?carp=ejer04_05&ejer=ejer" method="post">
          <button id="cancelar" class="waves-effect waves-light btn-large deep-orange lighten-2">
            <i class="material-icons">close</i>&nbsp;&nbsp;Cancelar
          </button>
        </form>
        <form class='botonInline' action="ejers.php?carp=ejer04_05&ejer=borraArticulo" method="post">
          <button id="aceptar" class="waves-effect waves-light btn-large deep-orange darken-3">
            Aceptar&nbsp;&nbsp;<i class="material-icons">send</i>
          </button>
          <input type="hidden" name="codArtBorrado" value="<?= $codArtBorrado ?>">  
        </form>
      </div>
      
      <?php
    }
    ?>
</article>
  
<?php
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}