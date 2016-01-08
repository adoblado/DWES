<?php
/**
 * Descripción de la Clase Coche
 *
 */

include_once 'Vehiculo.php';


class Coche extends Vehiculo {
  
  public function __construct() {
    parent::__construct();
  }
  
  public function quemaRueda() {
    echo "Vamos allá.<br>"
    . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___\n<br>"
    . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ | \<br>"
    . "____0-----0 =3333333___<br>";
  }
}
