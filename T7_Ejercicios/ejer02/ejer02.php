<?php

?>
<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 2</h4>
  <p>Modifica el programa anterior.</p>
</header>
<article class='dentroEjer'>

<?php
//establezco conexión con localhost

try {
  $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
  ?>
  <div class="chip">
    Se ha establecido una conexión con el servidor de bases de datos
    <i class="material-icons">close</i>
  </div>
  
  <?php
  //defino la $filaInicio
  if ($_POST['filaSiguiente']) {
    $filaInicio = $_POST['filaSiguiente'];
    $pagActual = $_POST['pagActual'];
    $pagActual++;
  } else if ($_POST['filaAnterior']) {
    $filaInicio = $_POST['filaAnterior'];
    $pagActual = $_POST['pagActual'];
    $pagActual--;
  } else {
    $filaInicio = 0;
    $pagActual = 1;
  }
  
  $filasPorPagina = 3;
  $todo = $conexion->query("SELECT * FROM cliente");
  $totalFilas = $todo->rowCount();
  //ceil() redondea hacia arriba
  //floor() redondea hacia abajo
  $totalPaginas = ceil($totalFilas / $filasPorPagina);
  
  $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente LIMIT " . $filasPorPagina . " OFFSET " . $filaInicio);

  ?>

  <!-- voy extrayendo cada uno de los clientes de la consulta realizada -->
  <table class='highlight responsive-table centered'>
    <!-- primero la cabecera de la tabla -->
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
      <tr>
        <form action='ejers.php?carp=ejer02&ejer=insertCliente' method='post'>
          <td class='input-field'>
            <i class='material-icons prefix'>credit_card</i>
            <input type='number' name='dniIntro' required>
          </td>
          <td class='input-field'>
            <i class='material-icons prefix'>account_circle</i>
            <input type='text' name='nombreIntro' required>
          </td>
          <td class='input-field'>
            <i class='material-icons prefix'>directions</i>
            <input type='text' name='direcIntro' required>
          </td>
          <td class='input-field'>
            <i class='material-icons prefix'>phone</i>
            <input type='text' name='telfIntro' required>
          </td>
          <td>
            <button class='btn-floating waves-effect waves-light green'
              type='submit' name='insert'>
              <i class='material-icons'>add</i>
            </button>
          </td>
        </form>
      </tr>
        
    <?php
    //ahora recorro la consulta realizada sacando cada cliente
      while ($registro = $consulta->fetchObject()){
        //muestro los campos con su oculto dentro del formulario de edición
        ?>
        <tr>
          <td><?= $registro->dni ?></td>
          <td><?= $registro->nombre ?></td>
          <td><?= $registro->direccion ?></td>
          <td><?= $registro->telefono ?></td>
          <!-- se podrá editar o eliminar el cliente pulsando el correspondiente botón -->
          <td>
            <form class='botonInline' action='ejers.php?carp=ejer02&ejer=updateCliente' method="post">
              <button class='btn-floating waves-effect waves-light blue'
                name='update' type='submit'>
                <i class='material-icons'>mode_edit</i>
              </button>
              <input type='hidden' name='dni' value='<?= $registro->dni ?>'>
            </form>
            <form class='botonInline' action='ejers.php?carp=ejer02&ejer=ejer02' method='post'>
              <button class='btn-floating waves-effect waves-light red'
                type='submit' id="confirmaDelete">
                <i class='material-icons'>close</i>
              </button>
              <input type="hidden" name="confirmaDelete" value="OK">
              <input type='hidden' name='dni' value='<?= $registro->dni ?>'>
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
      $dniBorrado = $_POST['dni'];
      ?>
      <div id="confirmacionBorrado" class="hoverable">
        <p>¿Estas seguro de que quieres borrar el cliente con DNI <?= $dniBorrado ?>?</p>
        <form class='botonInline' action="ejers.php?carp=ejer02&ejer=ejer02" method="post">
          <button id="cancelar" class="waves-effect waves-light btn-large deep-orange lighten-2">
            <i class="material-icons">close</i>&nbsp;&nbsp;Cancelar
          </button>
        </form>
        <form class='botonInline' action="ejers.php?carp=ejer02&ejer=deleteCliente" method="post">
          <button id="aceptar" class="waves-effect waves-light btn-large deep-orange darken-3">
            Aceptar&nbsp;&nbsp;<i class="material-icons">send</i>
          </button>
          <input type="hidden" name="dniBorrado" value="<?= $dniBorrado ?>">  
        </form>
      </div>
      
      <?php
    }
    
    ?>
    <ul class="pagination">
      <?php
        $filaAnterior = ($pagActual * $filasPorPagina) - ($filasPorPagina * 2);
        $filaSiguiente = ($pagActual * $filasPorPagina);
        if ($pagActual > 1) {
          ?>
          <li class="waves-effect">
            <form action="ejers.php?carp=ejer02&ejer=ejer02" method="post">
              <button class="waves-effect btn-floating deep-orange darken-3"><i class="material-icons">chevron_left</i></button>
              <input type="hidden" name="filaAnterior" value="<?= $filaAnterior ?>">
              <input type="hidden" name="pagActual" value="<?= $pagActual ?>">
            </form>
          </li>
        <?php
        } 
        ?>
          <li class="active deep-orange lighten-2"><?= $pagActual ?></li>
        <?php
        if ($pagActual < $totalPaginas) {
        ?>
          <li class="waves-effect">
            <form action="ejers.php?carp=ejer02&ejer=ejer02" method="post">
              <button class="waves-effect btn-floating deep-orange darken-3"><i class="material-icons">chevron_right</i></button>
              <input type="hidden" name="filaSiguiente" value="<?= $filaSiguiente ?>">
              <input type="hidden" name="pagActual" value="<?= $pagActual ?>">
            </form>
          </li>
          <?php
        } 
      ?>
    </ul>
            
  <?php
  echo  "</article>";
  
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}
