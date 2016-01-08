<?php
try {
  $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  
  $desArt = $_POST['desArtIntro'];
  $preComArt = $_POST['preComArtIntro'];
  $preVenArt = $_POST['preVenArtIntro'];
  $stoArt = $_POST['stoArtIntro'];

  $consulta = $conexion->query('SELECT desArt FROM articulos WHERE desArt="' . $desArt . '"');
  $numFilas = $consulta->rowCount();

  if ($numFilas > 0) {
    echo "<script language='javascript'>
            alert('Ya existe el artículo &laquo;" . $desArt . "&raquo;');
            window.location.href = 'http://localhost:8000/ejers.php?carp=ejer04_05&ejer=ejer';
          </script>";
  } else {
      $insercion = "INSERT INTO articulos (desArt, preComArt, preVenArt, stoArt) "
        . "VALUES ('$desArt',$preComArt,$preVenArt,$stoArt);";
      $conexion->exec($insercion);
      echo "<script language='javascript'>
              alert('Artículo dado de alta correctamente');
              window.location.href = 'http://localhost:8000/ejers.php?carp=ejer04_05&ejer=ejer';
            </script>";
  }
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}