<?php

$conexion = new mysqli("localhost", "root", "root");

if ($conexion->connect_errno > 0) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die("Error: " . $conexion->connect_error);
} else {
  $dni = $_POST['dniIntro'];
  $nombre = $_POST['nombreIntro'];
  $direccion = $_POST['direcIntro'];
  $telefono = $_POST['telfIntro'];

  //elijo la BBDD con la que quiero conectar y la codificación
  $conexion->select_db("banco");
  $conexion->set_charset("utf8");

  $consulta = $conexion->query('SELECT dni FROM cliente WHERE dni=' . $dni);
  $numFilas = $consulta->num_rows;

  if ($numFilas > 0) {
    echo "<script language='javascript'>
            alert('Ya existe un cliente con DNI " . $dni . "');
            window.location.href = 'http://localhost:8000/ejers.php?carp=ejer01_mysqli&ejer=ejer01_mysqli';
          </script>";
  } else {
      $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) "
        . "VALUES ('$dni','$nombre','$direccion','$telefono');";
      $resultado = $conexion->query($insercion);
      echo "<script language='javascript'>
              alert('Cliente dado de alta correctamente');
              window.location.href = 'http://localhost:8000/ejers.php?carp=ejer01_mysqli&ejer=ejer01_mysqli';
            </script>";
  }
}

$conexion->close();