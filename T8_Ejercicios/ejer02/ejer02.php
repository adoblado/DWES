<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 2</h4>
  <p>Granja de animales</p>
</header>
<article class='dentroEjer'>
<?php
  include_once 'Gato.php';
  include_once 'Perro.php';
  include_once 'Canario.php';
  include_once 'Pinguino.php';
  include_once 'Lagarto.php';
  
  $perri = new Perro('perri', 'hembra');
  $cati = new Gato('cati', 'hembra');
  $garfield = new Gato('garfield');
  $cantaor = new Canario('cantaor');
  $bailaor = new Pinguino('bailaor');
  $alSolano = new Lagarto('alSolano');
  
  echo "<h5>Vamos a probar métodos de Animal sin implementación</h5>";
  echo "Todos a dormir";
  echo "<br>" . $perri->getNombre() . ": ";
  $perri->duerme();
  echo "<br>" . $cati->getNombre() . ": ";
  $cati->duerme();
  echo "<br>" . $cantaor->getNombre() . ": ";
  $cantaor->duerme();
  echo "<br>" . $bailaor->getNombre() . ": ";
  $bailaor->duerme();
  echo "<br>" . $alSolano->getNombre() . ": ";
  $alSolano->duerme();
  
  echo "<br><br>Cati aparéate con Perri<br>";
  $cati->apareateCon($perri);
  echo "<br>¿Y con alSolano?<br>";
  $cati->apareateCon($alSolano);
  echo "<br>Pues, Garfield, ve a por ella!<br>";
  $garfield->apareateCon($cati);
  
  echo "<br><br><h5>Vamos a probar métodos de Mamífero</h5>";
  echo "A bañarse";
  echo "<br>" . $perri->getNombre() . ": ";
  $perri->seBana();
  echo "<br>" . $cati->getNombre() . ": ";
  $cati->seBana();
  echo "<br>Perri mama de Cati:<br>";
  $perri->mama($cati);
  echo "<br>Cati mama de Garfield:<br>";
  $cati->mama($garfield);

  echo "<br><br><h5>Métodos de Perro (Perri)</h5>";
  echo "Toma carne:<br>";
  $perri->come("carne");
  echo "<br>Toma pescado:<br>";
  $perri->come("pescado"); 
  echo "<br>Ladra:<br>";
  $perri->ladra(); 
  echo "<br>A pasear:<br>";
  $perri->pasea(); 

  echo "<br><br><h5>Métodos de Gato (Cati)</h5>";
  echo "Toma carne:<br>";
  $cati->come("carne");
  echo "<br>Toma pescado:<br>";
  $cati->come("pescado"); 
  echo "<br>Toma hierba:<br>";
  $cati->come("hierba"); 
  echo "<br>Maulla:<br>";
  $cati->maulla(); 
  echo "<br>Ronronea:<br>";
  $cati->ronronea(); 
  echo "<br>A pasear:<br>";
  $cati->pasea(); 

  echo "<br><br><h5>Vamos a probar métodos de Ave sin implementación</h5>";
  echo "Poned huevos";
  echo "<br>" . $cantaor->getNombre() . ": ";
  $cantaor->poneHuevo();
  echo "<br>" . $bailaor->getNombre() . ": ";
  $bailaor->poneHuevo();
  echo "<br>Limpiaos el ala";
  echo "<br>" . $cantaor->getNombre() . ": ";
  $cantaor->seLimpiaElAla();
  echo "<br>" . $bailaor->getNombre() . ": ";
  $bailaor->seLimpiaElAla();

  echo "<br><br><h5>Métodos de Canario (Cantaor)</h5>";
  echo "Canta:<br>";
  $cantaor->canta();
  echo "<br>Vuela:<br>";
  $cantaor->vuela();
  echo "<br>Pasea:<br>";
  $cantaor->pasea(); 
  echo "<br>Toma una semilla:<br>";
  $cantaor->come("semilla"); 
  echo "<br>Toma un insecto:<br>";
  $cantaor->come("insecto"); 
  echo "<br>Toma hierba:<br>";
  $cantaor->come("hierba"); 

  echo "<br><br><h5>Métodos de Pingüino (Bailaor)</h5>";
  echo "Baila:<br>";
  $bailaor->baila();
  echo "<br>Vuela:<br>";
  $bailaor->vuela();
  echo "<br>Pasea:<br>";
  $bailaor->pasea(); 
  echo "<br>Toma pescado:<br>";
  $bailaor->come("pescado"); 
  echo "<br>Toma carne:<br>";
  $bailaor->come("carne"); 
  echo "<br>Venga a buscar más comida:<br>";
  $bailaor->buscaComida(); 

  echo "<br><br><h5>Y por último los Métodos de Lagarto (AlSolano)</h5>";
  echo "A tomar el sol:<br>";
  $alSolano->tomaSol();
  echo "<br>Pasea:<br>";
  $alSolano->pasea(); 
  echo "<br>Toma carne:<br>";
  $alSolano->come("carne"); 
  echo "<br>Toma un insecto:<br>";
  $alSolano->come("insecto"); 
  echo "<br>Toma hierba:<br>";
  $alSolano->come("hierba"); 
?>
</article>