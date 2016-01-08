<?php
/**
 * Descripción de Pinguino
 * @author Adolfina Rueda
 */
include_once 'Ave.php';

class Pinguino extends Ave {
  public function baila() {
    echo "Yuuuuuujuuuuuuuu, qué divertidoooo";
  }
  
  public function pasea() {
    echo "Yo no paseo, yo bailo<br>";
    self::baila();
  }
  public function vuela() {
    echo "Yo no vuelo, yo bailo<br>";
    self::baila();
  }
  
  public function buscaComida() {
    echo "Tengo que encontrar algo de sustento para mi familia, me voy a nadar<br>
        ~~~~~~~~~~~~~~~~~~~~~<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;******<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;****";
  }
  
  public function come($comida) {
    if ($comida == "pescado") {
      parent::come($comida);
    } else {
      echo "A mí no me gusta este tipo de comida.";
    }
  }
}
