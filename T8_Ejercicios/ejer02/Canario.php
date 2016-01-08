<?php
/**
 * Descripción de Canario
 * @author Adolfina Rueda
 */
/* 
  hay veces que también se pone: 
  include_once 'Animal.php';
  para indicar que Canario depende de Animal
  aunque ya vendría cargada de la clase Ave
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
