<?php
try {
  $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  ?> 

  <header class='dentroEjer flow-text center-align'>
    <h4>Ejercicio 4/5</h4>
  </header>

  <article class='dentroEjer section'>
  <?php
    $codArt = $_POST['codArt'];

    $consultaComprueba = $conexion->query('SELECT codArt FROM articulos WHERE codArt=' . $codArt);
    $numFilas = $consultaComprueba->rowCount();

    if ($numFilas < 0) {
      echo "<script language='javascript'>
              alert('No existe el artículo seleccionado');
              window.location.href = 'http://localhost:8000/ejers.php?carp=ejer04_05&ejer=ejer';
            </script>";
    } else {
      if (!$_POST['desArtModif']) {
        $consulta = $conexion->query('SELECT * FROM articulos WHERE codArt=' . $codArt);

        ?>
        <table class='highlight responsive-table centered'>
          <!-- primero la cabecera de la tabla -->
          <caption>MODIFICACIÓN DE ARTÍCULO</caption>
          <thead>
            <tr>
              <th>Código</th>
              <th>Descripción</th>
              <th>Precio de Compra</th>
              <th>Precio de Venta</th>
              <th>Stock</th>
              <td></td>
              <td></td>
            </tr>
          </thead>
          <!-- despues el formulario de modificación de artículo -->
          <tbody>
            <?php
            while ($articulo = $consulta->fetchObject()){
              ?>
              <tr>
                <form action='ejers.php?carp=ejer04_05&ejer=modifArticulo' method='post'>
                  <td class='input-field codigo'>
                    <input type='number' name='codArtModif' required disabled value="<?= $articulo->codArt ?>">
                    <input type='hidden' name='codArt' value='<?=$codArt?>'>
                  </td>
                  <td class='input-field description'>
                    <i class='material-icons prefix'>description</i>
                    <input type='text' name='desArtModif' required value="<?= $articulo->desArt ?>">
                  </td>
                  <td class='input-field number'>
                    <i class='material-icons prefix'>attach_money</i>
                    <input type='number' min='0' step='0.01' name='preComArtModif' required value="<?= $articulo->preComArt ?>">
                  </td>
                  <td class='input-field number'>
                    <i class='material-icons prefix'>attach_money</i>
                    <input type='number' min='0' step='0.01' name='preVenArtModif' required value="<?= $articulo->preVenArt ?>">
                  </td>
                  <td class='input-field number'>
                    <i class='material-icons prefix'>markunread_mailbox</i>
                    <input type='number' min='0' step='1' name='stoArtModif' required value="<?= $articulo->stoArt ?>">
                  </td>
                  <td>
                    <button class='waves-effect waves-light btn-large blue'
                      name='modificar'>
                      <i class='material-icons'>mode_edit</i>
                      EDITAR
                    </button>
                  </td>
                </form>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      <?php
      } else {
        $codArt = $_POST['codArt'];
        $desArtModif = $_POST['desArtModif'];
        $preComArtModif = $_POST['preComArtModif'];
        $preVenArtModif = $_POST['preVenArtModif'];
        $stoArtModif = $_POST['stoArtModif'];

        $conexion->exec("UPDATE articulos 
                         SET desArt='" . $desArtModif . "',
                             preComArt='" . $preComArtModif . "',
                             preVenArt='" . $preVenArtModif . "',
                             stoArt='" . $stoArtModif . "'
                         WHERE codArt='" . $codArt . "'");
        echo "<script language='javascript'>
                alert('Artículo modificado correctamente');
                window.location.href = 'http://localhost:8000/ejers.php?carp=ejer04_05&ejer=ejer';
              </script>";
      }
    }
    ?>
  </article>
  <?php
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}
