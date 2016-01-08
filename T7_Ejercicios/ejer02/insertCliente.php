<?php
try {
  $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
  
  $dni = $_POST['dniIntro'];
  $nombre = $_POST['nombreIntro'];
  $direccion = $_POST['direcIntro'];
  $telefono = $_POST['telfIntro'];

  $consulta = $conexion->query('SELECT dni FROM cliente WHERE dni=' . $dni);
  $numFilas = $consulta->rowCount();

  if ($numFilas > 0) {
    echo "<script language='javascript'>
            alert('Ya existe un cliente con DNI " . $dni . "');
            window.location.href = 'http://localhost:8000/ejers.php?carp=ejer02&ejer=ejer02';
          </script>";
  } else {
      $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) "
        . "VALUES ('$dni','$nombre','$direccion','$telefono');";
      $conexion->exec($insercion);
      echo "<script language='javascript'>
              alert('Cliente dado de alta correctamente');
              window.location.href = 'http://localhost:8000/ejers.php?carp=ejer02&ejer=ejer02';
            </script>";
  }
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die ("Error: " . $e->getMessage());
}