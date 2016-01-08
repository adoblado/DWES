<?php

$conexion = mysql_connect("localhost", "root", "root");

$dni = $_POST['dniIntro'];
$nombre = $_POST['nombreIntro'];
$direccion = $_POST['direcIntro'];
$telefono = $_POST['telfIntro'];

//elijo la BBDD con la que quiero conectar y la codificación
mysql_select_db("banco", $conexion);
mysql_set_charset('utf8');

$consulta = mysql_query("SELECT dni FROM cliente WHERE dni=" . $dni . "", $conexion);
$numFilas = mysql_num_rows($consulta);

if ($numFilas > 0) {
  echo "<script language='javascript'>
          alert('Ya existe un cliente con DNI " . $dni . "');
          window.location.href = 'http://localhost:8000/ejers.php?carp=ejer01_mysql&ejer=ejer01_mysql';
        </script>";
} else {
    $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) "
      . "VALUES ('$dni','$nombre','$direccion','$telefono');";
    //echo $insercion;
    $resultado = mysql_query($insercion, $conexion);
    echo "<script language='javascript'>
          alert('Cliente dado de alta correctamente');
          window.location.href = 'http://localhost:8000/ejers.php?carp=ejer01_mysql&ejer=ejer01_mysql';
        </script>";
}
mysql_close();