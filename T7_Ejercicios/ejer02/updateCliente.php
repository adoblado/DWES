<?php
try {
  $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");

  ?> 

  <header class='dentroEjer flow-text center-align'>
    <h4>Ejercicio 2</h4>
    <p>Modifica el programa anterior.</p>
  </header>
  <article class='dentroEjer section'>
  <?php
    if (!$_POST['dniModif']) {
      $dni = $_POST['dni'];
      $consulta = $conexion->query('SELECT * FROM cliente WHERE dni=' . $dni);

      ?>
      <table class='highlight responsive-table centered tablaUpdate'>
        <!-- primero la cabecera de la tabla -->
        <caption>MODIFICACIÓN DE CLIENTE</caption>
        <thead>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <td></td>
          </tr>
        </thead>
        <!-- despues el formulario de insercion de cliente -->
        <tbody>
          <?php
          while ($registro = $consulta->fetchObject()){
            ?>
            <tr>
              <form action='ejers.php?carp=ejer02&ejer=updateCliente' method='post'>
                <td class='input-field'>
                  <i class='material-icons prefix'>credit_card</i>
                  <input type='number' name='dniModif' required value="<?= $registro->dni ?>">
                  <input type='hidden' name='dni' value='<?=$dni?>'>
                </td>
                <td class='input-field'>
                  <i class='material-icons prefix'>account_circle</i>
                  <input type='text' name='nombreModif' required value="<?= $registro->nombre ?>">
                </td>
                <td class='input-field'>
                  <i class='material-icons prefix'>directions</i>
                  <input type='text' name='direcModif' required value="<?= $registro->direccion ?>">
                </td>
                <td class='input-field'>
                  <i class='material-icons prefix'>phone</i>
                  <input type='text' name='telfModif' required value="<?= $registro->telefono ?>">
                </td>
                <td>
                  <button class='waves-effect waves-light btn-large blue'
                    name='update'>
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
      $dni = $_POST['dni'];
      $dniModif = $_POST['dniModif'];
      $nombreModif = $_POST['nombreModif'];
      $direcModif = $_POST['direcModif'];
      $telfModif = $_POST['telfModif'];
      
      $conexion->exec("UPDATE cliente 
                       SET dni='" . $dniModif . "',
                           nombre='" . $nombreModif . "',
                           direccion='" . $direcModif . "',
                           telefono='" . $telfModif . "'
                       WHERE dni='" . $dni . "'");
      echo "<script language='javascript'>
              alert('Cliente modificado correctamente');
              window.location.href = 'http://localhost:8000/ejers.php?carp=ejer02&ejer=ejer02';
            </script>";
    }
    ?>
  </article>
  <?php
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}
