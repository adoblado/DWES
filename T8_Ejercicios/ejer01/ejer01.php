<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 1</h4>
  <p>Dado Poker</p>
</header>
<article class='dentroEjer'>
<?php
  include_once 'DadoPoker.php';
  
  DadoPoker::setTiradasTotales($_SESSION['tiradasTotales']);
?>
  <form action="ejers.php?carp=ejer01&ejer=ejer01" method="post">
    <button class="waves-effect waves-light btn blue-grey darken-3 right" name="tirarDados">
      Tirar Dados
    </button>
  </form>
  <div class="row center-align">
    <span class="col s2"><strong>Dado 1</strong></span>
    <span class="col s2"><strong>Dado 2</strong></span>
    <span class="col s2"><strong>Dado 3</strong></span>
    <span class="col s2"><strong>Dado 4</strong></span>
    <span class="col s2"><strong>Dado 5</strong></span>
  </div>
  <div class="row center-align">
<?php
    if (isset($_REQUEST['tirarDados'])) {
      $contador = 0;
      while ($contador < 5) {
        $dado = new DadoPoker();
        $dado->tira();
?>
        <span class="col s2">
<?php
          echo $dado->nombreFigura();
?>
        </span>
<?php
        $contador++;
      }
    }
?>
  </div>
  <span>Tiradas totales (1 por cada dado): <?= DadoPoker::getTiradasTotales() ?></span>
<?php
  $_SESSION['tiradasTotales'] = DadoPoker::getTiradasTotales();