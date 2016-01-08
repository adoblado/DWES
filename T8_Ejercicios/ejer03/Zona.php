<?php
/**
 * Descripción de Zona
 */

class Zona {
  private $entradas;
  private $nombre;
  
  public function __construct($n, $e) {
    $this->nombre= $n;
    $this->entradas = $e;
  }
  
  public function getEntradas() {
    return $this->entradas;
  }
  public function getNombre() {
    return $this->nombre;
  }
  
  public function vender($e) {
    if ($this->entradas < 0) {
      echo "Lo sentimos, las entradas para esta zona están agotadas.";
    } else if ($this->entradas < $e) {
      echo "Sólo quedan " . $this->entradas . " para esta zona.";
    } else {
      echo "Aquí tiene sus " . $e . " entradas, gracias.";
      $this->entradas -= $e;
    }
  }
}