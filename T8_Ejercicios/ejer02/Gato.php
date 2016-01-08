<?php
/**
 * Description of Gato
 *
 * @author adolfi
 */
include_once 'Mamifero.php';

class Gato extends Mamifero {
  public function maulla() {
    echo "Miau, miau";
  }
  
  public function ronronea() {
    echo "mmmmrrrrrrrrrrrrrr";
  }
  
  public function pasea() {
    echo "No me gusta pasear, quiero quedarme en casa";
  }
  
  public function seBana() {
    echo "¡¡¡Noooooo!!! ¡¡Odio el aguaaa!!";
  }
  
  public function come($comida) {
    if ($comida == "pescado") {
      parent::come();
    } else {
      echo "A mí no me gusta este tipo de comida.";
    }
  }
}
