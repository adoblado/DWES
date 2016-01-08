<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 3</h4>
  <p>ExpoCoches Campanillas</p>
</header>
<article class='dentroEjer zonas'>
<?php
  include_once 'Zona.php';
  
  $zonaPrinc =& unserialize($_SESSION['zonaPrinc']);
  $zonaComVen =& unserialize($_SESSION['zonaComVen']);
  $zonaVIP =& unserialize($_SESSION['zonaVIP']);
  
  $zonaElegida = $_REQUEST['zonaElegida'];
  $cantEntradas = $_REQUEST['cantEntradas'];
  
  if ($zonaElegida == ($zonaPrinc->getNombre())) {
    $zonaPrinc->vender($cantEntradas);
  } else if ($zonaElegida == ($zonaComVen->getNombre())) {
    $zonaComVen->vender($cantEntradas);
  } else {
    $zonaVIP->vender($cantEntradas);
  }
?>
  <a href="ejers.php?carp=ejer03&ejer=ejer03" 
    class="btn-floating waves-effect waves-light blue-grey darken-3">
      <i class="material-icons">reply</i>
  </a>
<?php
  $_SESSION['zonaPrinc'] = serialize($zonaPrinc);
  $_SESSION['zonaComVen'] = serialize($zonaComVen);
  $_SESSION['zonaVIP'] = serialize($zonaVIP);
?>
</article>