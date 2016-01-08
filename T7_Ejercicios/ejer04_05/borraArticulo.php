<?php
try {
  $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  
  $codArt = $_POST['codArtBorrado'];
  
  $consulta = $conexion->query('SELECT codArt FROM articulos WHERE codArt="' . $codArt . '"');
  $numFilas = $consulta->rowCount();

  if ($numFilas < 0) {
    echo "<script language='javascript'>
            alert('No existe el artículo seleccionado');
            window.location.href = 'http://localhost:8000/ejers.php?carp=ejer04_05&ejer=ejer';
          </script>";
  } else {
    $conexion->exec("DELETE FROM articulos 
                     WHERE codArt=" . $codArt);
    echo "<script language='javascript'>
            alert('Artículo eliminado correctamente');
            window.location.href = 'http://localhost:8000/ejers.php?carp=ejer04_05&ejer=ejer';
          </script>";
    //header('refresh: 0; url=http://localhost:8000/ejers.php?carp=ejer02&ejer=ejer02');
  }
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}
