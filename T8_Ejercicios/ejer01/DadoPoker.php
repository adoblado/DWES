<?php
/**
 * Descripción de DadoPoker
 */

class DadoPoker {
  //todas las caras del dado es static
  private static $caras = ['As', 'K', 'Q', 'J', '7', '8'];
  private static $tiradasTotales = 0;
  
  //cada una de las tiradas es única
  private $tirada;
  
  //obtiene una cara y la guarda para cada dado
  public function tira() {
    $caraSacada = self::$caras[rand(0,5)];
    $this->tirada = $caraSacada;
    self::$tiradasTotales++;
  }
  
  //devuelve el valor de la tirada de cada dado
  public function nombreFigura() {
    return $this->tirada;
  }
  
  public static function getTiradasTotales() {
    return self::$tiradasTotales;
  }
  public static function setTiradasTotales($t) {
    self::$tiradasTotales = $t;
  }
}
