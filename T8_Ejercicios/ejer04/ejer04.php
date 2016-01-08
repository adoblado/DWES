<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 4</h4>
  <p>Clases Vehículo, Coche y Bicicleta.</p>
</header>
<article class='dentroEjer'>
<?php
  include_once 'Vehiculo.php';
  include_once 'Bicicleta.php';
  include_once 'Coche.php';
  
  if (isset($_SESSION['bici'])) {
    $bici = unserialize($_SESSION['bici']);
  }
  if (isset($_SESSION['coche'])) {
    $coche = unserialize($_SESSION['coche']);
  }
  Vehiculo::setKmTotales($_SESSION['kmTotales']);
  
?>
  <section class="section">
    <form action='ejers.php?carp=ejer04&ejer=ejer04' method="post" class="vehiculo section">
      <label>Selecciona la acción deseada</label>
      <select name='accion' class="browser-default">
        <option value='' selected disabled> -- Selecciona aqui -- </option>
        <option value='op1'>Anda con la bicicleta</option>
        <option value='op2'>Haz el caballito con la bicicleta</option>
        <option value='op3'>Anda con el coche</option>
        <option value='op4'>Quema rueda con el coche</option>
        <option value='op5'>Ver kilometraje de la bicicleta</option>
        <option value='op6'>Ver kilometraje del coche</option>
        <option value='op7'>Ver kilometraje total</option>
      </select>
      <button class="waves-effect waves-light btn blue-grey darken-3" 
        type="submit">Aceptar</button>
    </form>
  </section>
  
  <div class="divider"></div>
  
  <section class="section">
    <form action="ejers.php?carp=ejer04&ejer=ejer04" method="post" class="botonInline">
      <button class="waves-effect waves-light btn blue-grey darken-3" 
        type="submit" name="crearBici" 
<?php
        if (!isset($_REQUEST['crearBici'])) {
          if ($bici) {
            echo " disabled>BICI CREADA</button>";
          } else {
            echo ">CREAR BICI</button>";
          }
        } else {
          $bici = new Bicicleta();
          echo " disabled>BICI CREADA</button>";
        }
?>
    </form>
    <form action="ejers.php?carp=ejer04&ejer=ejer04" method="post" class="botonInline">
      <button class="waves-effect waves-light btn blue-grey darken-3" 
        type="submit" name="crearCoche" 
<?php
        if (!isset($_REQUEST['crearCoche'])) {
          if ($coche) {
            echo " disabled>COCHE CREADO</button>";
          } else {
            echo ">CREAR COCHE</button>";
          }
        } else {
          $coche = new Coche();
          echo " disabled>COCHE CREADO</button>";
        }
?>
    </form>
  </section>
  
  <section class="section">
<?php
    $accion = $_REQUEST['accion'];
    if (isset($accion)) {
      switch ($accion) {
        case 'op1': 
          if ($bici) {
            if (!$_REQUEST['kmBici']) {
?>
            <form action="ejers.php?carp=ejer04&ejer=ejer04" method="post" class="vehiculo">
              <input type="number" min="0" name="kmBici">
              <input type="hidden" name="accion" value="op1">
              <button class="waves-effect waves-light btn-floating blue-grey darken-3">OK</button>
            </form>
<?php
            } else {
              $kmBici = $_REQUEST['kmBici'];
              $bici->anda($kmBici);
            }
          } else {
            echo "Aún no existe ninguna bicicleta.";
          }
          break; 
        case 'op2': 
          if ($bici) {
            $bici->haceCaballito();
          } else {
            echo "Aún no existe ninguna bicicleta.";
          }
          break; 
        case 'op3': 
          if ($coche) {
            if (!$_REQUEST['kmCoche']) {
?>
            <form action="ejers.php?carp=ejer04&ejer=ejer04" method="post" class="vehiculo">
              <input type="number" min="0" name="kmCoche">
              <input type="hidden" name="accion" value="op3">
              <button class="waves-effect waves-light btn-floating blue-grey darken-3">OK</button>
            </form>
<?php
            } else {
              $kmCoche = $_REQUEST['kmCoche'];
              $coche->anda($kmCoche);
            }
          } else {
            echo "Aún no existe ningún coche.";
          }
          break; 
        case 'op4': 
          if ($coche) {
             $coche->quemaRueda();
          } else {
            echo "Aún no existe ningún coche.";
          }
          break; 
        case 'op5': 
          if ($bici) {
            echo "La bici ha recorrido " . $bici->getKmRecorridos() . " km";
          } else {
            echo "Aún no existe ninguna bicicleta.";
          }
          break; 
        case 'op6': 
          if ($coche) {
            echo "El coche ha recorrido " . $coche->getKmRecorridos() . " km";
          } else {
            echo "Aún no existe ningún coche.";
          }
          break; 
        case 'op7': 
          echo "Entre todos los vehículos han recorrido " . Vehiculo::getKmTotales() . " km";
          break;
        default: 
      }
    }
    //serializo los dos elementos para que se queden guardados correctamente. 
    //en caso de que no estén creados, no pasa nada: serializa elementos vacíos sin problema
    $_SESSION['bici'] = serialize($bici);
    $_SESSION['coche'] = serialize($coche);
    $_SESSION['kmTotales'] = Vehiculo::getKmTotales();
?>
  </section>
</article>