<?php
/**
 * Descripción de la Clase Bicicleta
 *
 */

include_once 'Vehiculo.php';


class Bicicleta extends Vehiculo {
  
  public function __construct() {
    parent::__construct();
  }
  
  public function anda($k) {
    echo "Voy a recorrer " . $k . " km. <br>Ti-ti-ri-ti-ti-ti-ri<br>";
    parent::incrementaKm($k);
    echo "Ya he recorrido " . $this->getKmRecorridos() . " kilómetros";
  }
  
  public function haceCaballito() {
    echo "Ahí voy!!! Yuuuujuuuuuuuuu";
  }
}
