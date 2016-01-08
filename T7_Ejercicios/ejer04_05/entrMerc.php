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
    
    if (!$_REQUEST['cantEntrada']) {
      $consulta = $conexion->query('SELECT * FROM articulos WHERE codArt="' . $codArt . '"');
      ?>

      <table class='highlight responsive-table centered'>
      <caption>ENTRADA DE MERCANCÍA</caption>
      <thead>
        <tr>
          <th>Código</th>
          <th>Descripción</th>
          <th>Stock</th>
          <th>Mercancía de Entrada</th>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($articulo = $consulta->fetchObject()){
          ?>
          <tr>
            <td><?= $articulo->codArt ?></td>
            <td><?= $articulo->desArt ?></td>
            <td><?= $articulo->stoArt ?></td>
            <form action='ejers.php?carp=ejer04_05&ejer=entrMerc' method='post'>
              <td>
                <input type='number' min='0' step='1' name='cantEntrada' required>
              </td>
              <td>
                <button class='btn-large waves-effect waves-light deep-orange darken-3'
                  name='entrada' type='submit'>ACEPTAR
                </button>
                <input type='hidden' name='codArt' value='<?= $codArt ?>'>
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
    $cantEntrada = $_REQUEST['cantEntrada'];
    $consulta = $conexion->query('SELECT stoArt FROM articulos WHERE codArt=' . $codArt);
    
    while ($articulo = $consulta->fetchObject()){
      $stock = $articulo->stoArt;
    }
    $totalStock = $cantEntrada + $stock;
    
    $conexion->exec("UPDATE articulos 
                     SET stoArt=" . $totalStock . "
                     WHERE codArt=" . $codArt);
    echo "<script language='javascript'>
            alert('Artículo modificado correctamente');
            window.location.href = 'http://localhost:8000/ejers.php?carp=ejer04_05&ejer=ejer';
          </script>";
  }
  ?>
  </article>
  
  <?php
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}
