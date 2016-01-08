<?php
/**
 * Descripción de Canario
 * @author Adolfina Rueda
 */
include_once 'Ave.php';

class Canario extends Ave {
  public function canta() {
    echo "Talá talá taláaaaaa";
  }
  
  public function come($comida) {
    if (($comida == "insecto") || ($comida == "semilla")) {
      parent::come($comida);
    } else {
      echo "A mí no me gusta este tipo de comida.";
    }
  }
}
