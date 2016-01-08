<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 3</h4>
  <p>ExpoCoches Campanillas</p>
</header>
<article class='dentroEjer zonas'>
<?php
  include_once 'Zona.php';
  
  if (isset($_SESSION['zonaPrinc'])) {
    $zonaPrinc =& unserialize($_SESSION['zonaPrinc']);
    $zonaComVen =& unserialize($_SESSION['zonaComVen']);
    $zonaVIP =& unserialize($_SESSION['zonaVIP']);
  } else {
    $zonaPrinc = new Zona("zonaPrinc", 1000);
    $zonaComVen = new Zona("zonaComVen", 200);
    $zonaVIP = new Zona("zonaVIP", 25);
  }
?>
  <h5 class="center-align">Aquí puede comprar sus entradas de manera anticipada</h5>
  
  <div class="divider"></div>
  
  <div class="row">
    <section class="col s8 row">
      <article class="col s4 center-align" id="zonaPrinc">
        <h6>ZONA PRINCIPAL</h6>
        <p>Quedan <span id="entr"><?= $zonaPrinc->getEntradas() ?></span> entradas libres</p>
        <div class="porcentaje">
          <span class="green"></span>
          <span class="red right"></span>
        </div>
      </article>
      <article class="col s4 center-align" id="zonaComVen">
        <h6>ZONA DE COMPRA-VENTA</h6>
        <p>Quedan <span id="entr"><?= $zonaComVen->getEntradas() ?></span> entradas libres</p>
        <div class="porcentaje">
          <span class="green"></span>
          <span class="red right"></span>
        </div>
      </article>
      <article class="col s4 center-align" id="zonaVIP">
        <h6>ZONA VIP</h6>
        <p>Quedan <span id="entr"><?= $zonaVIP->getEntradas() ?></span> entradas libres</p>
        <div class="porcentaje">
          <span class="green"></span>
          <span class="red right"></span>
        </div>
      </article>
    </section>
    <section class="col s3 right">
      <h6 class="center-align">COMPRE SUS ENTRADAS</h6>
      <form action="ejers.php?carp=ejer03&ejer=ventaEntradas" method="post">
        <label>Elija la zona</label>
        <select name="zonaElegida" class="browser-default">
          <option value="zonaPrinc">Zona Principal</option>
          <option value="zonaComVen">Zona de Compra-Venta</option>
          <option value="zonaVIP">Zona VIP</option>
        </select>
        <br>
        <label>¿Cuántas entradas?</label>
        <input type="number" min="0" step="1" name="cantEntradas">
        <button type="submit" class="waves-effect waves-light btn blue-grey darken-3 right">
          COMPRAR
        </button>
      </form>
    </section>
  </div>
<?php
  $_SESSION['zonaPrinc'] = serialize($zonaPrinc);
  $_SESSION['zonaComVen'] = serialize($zonaComVen);
  $_SESSION['zonaVIP'] = serialize($zonaVIP);
?>
</article>