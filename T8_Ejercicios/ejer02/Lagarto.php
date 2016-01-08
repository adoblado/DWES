<?php
/**
 * Descripción de Lagarto
 * @author Adolfina Rueda
 */
include_once 'Animal.php';

class Lagarto extends Animal {
  public function tomaSol() {
    parent::pasea();
  }
  
  public function come($comida) {
    if (($comida == "carne") || ($comida == "insecto")) {
      parent::come($comida);
    } else {
      echo "A mí no me gusta ese tipo de comida";
    }
  }
}
