<?php
/**
 * Descripción de Animal
 * @author Adolfina Rueda
 */

abstract class Animal {
  private $nombre;
  private $sexo; 
  
  public function __construct($n, $s = 'macho') {
    $this->nombre = $n;
    $this->sexo = $s;
  }
  
  public function getNombre() {
    return $this->nombre;
  }
  public function getSexo() {
    return $this->sexo;
  }
  
  public function duerme() {
    echo "zzzzZZZZZZZZZ";
  }
  public function come($comida) {
    echo "Mmmmmm qué ric@ está " . $comida;
  }
  public function pasea() {
    echo "Me voy a tomar el sol: <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\&nbsp;|&nbsp;/<br>
      &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;O&nbsp;--<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;|&nbsp;\<br>
      ___________~~~~____";
  }
  public function apareateCon($compi) {
    //si no son clases iguales, no podrán aparearse
    if (get_class($this) != get_class($compi)) {
      echo "Dos especies diferentes no se pueden aparear.";
    } 
    
    if ($this->sexo == $compi->sexo) {
      echo "¿Pero qué dices? ¿Cómo me voy a aparear con eso?";
    } else {
      echo "Ven que te coja.";
    }
  }
}
