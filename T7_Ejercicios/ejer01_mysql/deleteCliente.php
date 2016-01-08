<?php

$conexion = mysql_connect("localhost", "root", "root");

//elijo la BBDD con la que quiero conectar y la codificación
mysql_select_db("banco", $conexion);
mysql_set_charset('utf8');

$dni = $_POST['dni'];

$consulta = mysql_query("DELETE FROM cliente 
                         WHERE dni='" . $dni . "'", $conexion);
echo "<script language='javascript'>
        alert('Cliente eliminado correctamente');
        window.location.href = 'http://localhost:8000/ejers.php?carp=ejer01_mysql&ejer=ejer01_mysql';
      </script>";

mysql_close();