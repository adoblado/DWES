<?php
/**
 * Descripción de Mamifero
 * @author Adolfina Rueda
 */
include_once 'Animal.php';

abstract class Mamifero extends Animal {
  //constructor automático en Animal.php
  //getter en Animal.php
  
  public function come($comida) {
    if ($comida == "carne") {
      parent::come($comida);
    } else {
      echo "A mí no me gusta este tipo de comida. Quiero carne";
    }
  }
  
  public function mama($madre) {
    if (get_class($this) == get_class($madre)) {
      echo "Ven mamá " . $madre->getNombre() . ". Chup chup chup";
    } else {
      echo "Pero si es de otra raza distinta al a míaaa!!!!!";
    }
  }
  
  public function seBana() {
    echo "El agua está fresquita. ";
  }
}
