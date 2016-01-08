<?php
/**
 * Descripción de la Clase Vehiculo
 *
 */

abstract class Vehiculo {
  //atributo de instancia
  private $kmRecorridos; 
  
  //atributos de clase
  private static $vehiculosCreados = 0; 
  private static $kmTotales = 0; 
  
  
  public function __construct() {
    $this->kmRecorridos = 0;
    self::$vehiculosCreados++;
  }
  
  //métodos de clase
  public static function getVehiculosCreados() {
    return self::$vehiculosCreados;
  }
  public static function getKmTotales() {
    return self::$kmTotales;
  }
  
  public static function setKmTotales($kT) {
    self::$kmTotales = $kT;
  }
  
  //método de instancia
  public function getKmRecorridos() {
    return $this->kmRecorridos;
  }
  
  public function anda($k) {
    echo "Voy a recorrer " . $k . " km. <br>"
      . "buuuuummmmmm<br>";
    self::incrementaKm($k);
    echo "Ya he recorrido " . $this->kmRecorridos . " kilómetros";
  }
  
  public function incrementaKm($k) {
    $this->kmRecorridos += $k;
    self::$kmTotales += $k;
  }
}
