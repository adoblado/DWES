<?php
/**
 * Descripción de Perro
 * @author Adolfina Rueda
 */
include_once 'Mamifero.php';

class Perro extends Mamifero {
  public function ladra() {
    echo "Guau, guau";
  }
  
  public function pasea() {
    parent::pasea();
    echo "<br>Y mientras paseo, hago pipi y caca :3";
  }
  
  public function seBana() {
    parent::seBana();
    echo "Aunque en realidad no me gusta mucho eh, pero me estaré quieto.";
  }
}
