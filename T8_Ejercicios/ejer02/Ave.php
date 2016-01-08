<?php
/**
 * Descripción de Ave
 * @author Adolfina Rueda 
 */
include_once 'Animal.php';

abstract class Ave extends Animal {
  //constructor automático en Animal.php
  //getter en Animal.php
  
  public function poneHuevo() {
    echo "¡Aaayyyy! ¡Plof!<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O";
  }
  
  public function pasea() {
    echo "Yo no vuelo, yo paseo<br>"; 
    self::vuela();
  }
  
  public function vuela() {
    echo "&nbsp;\/<br>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\/<br>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;\/";
  }
  
  public function seLimpiaElAla() {
    echo "¡Qué limpio estoy quedando!";
  }
}
