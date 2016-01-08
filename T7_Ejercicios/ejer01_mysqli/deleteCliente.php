<?php

$conexion = new mysqli("localhost", "root", "root");

//elijo la BBDD con la que quiero conectar y la codificación
$conexion->select_db("banco");
$conexion->set_charset("utf8");

if ($conexion->connect_errno > 0) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die("Error: " . $conexion->connect_error);
} else {
  $dni = $_POST['dni'];

  $consulta = $conexion->query("DELETE FROM cliente 
                                WHERE dni='" . $dni . "'");
  echo "<script language='javascript'>
          alert('Cliente eliminado correctamente');
          window.location.href = 'http://localhost:8000/ejers.php?carp=ejer01_mysqli&ejer=ejer01_mysqli';
        </script>";
}

$conexion->close();