<?php

?>
<header class='dentroEjer flow-text center-align'>
  <h4>Ejercicio 1 - mysqli</h4>
  <p>Crea una aplicación web que permita hacer listado, alta, baja y 
      modificación sobre la tabla cliente de la base de datos banco.</p>
</header>
<article class='dentroEjer'>

  <?php
  //establezco conexión con localhost
  $conexion = new mysqli("localhost", "root", "root");

  //hay error
  if ($conexion->connect_errno > 0) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $conexion->connect_error);
  } else {
    //hay éxito en la conexión
    ?>
    <div class="chip">
      Se ha establecido una conexión con el servidor de bases de datos
      <i class="material-icons">close</i>
    </div>

    <?php
    //elijo la BBDD con la que quiero conectar y la codificación
    $conexion->select_db("banco");
    $conexion->set_charset("utf8");

    //realizo la consulta de todos los clientes
    $consulta = $conexion->query('SELECT * FROM cliente');
    ?>

    <!-- voy extrayendo cada uno de los clientes de la consulta realizada -->
    <table class='highlight responsive-table centered'>
      <!-- primero la cabecera de la tabla -->
      <thead>
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <td></td>
        </tr>
      </thead>
      <!-- despues el formulario de insercion de cliente -->
      <tbody>
        <tr>
        <form action='ejers.php?carp=ejer01_mysqli&ejer=insertCliente' method='post'>
          <td class='input-field'>
            <i class='material-icons prefix'>credit_card</i>
            <input type='number' name='dniIntro' required>
          </td>
          <td class='input-field'>
            <i class='material-icons prefix'>account_circle</i>
            <input type='text' name='nombreIntro' required>
          </td>
          <td class='input-field'>
            <i class='material-icons prefix'>directions</i>
            <input type='text' name='direcIntro' required>
          </td>
          <td class='input-field'>
            <i class='material-icons prefix'>phone</i>
            <input type='text' name='telfIntro' required>
          </td>
          <td>
            <button class='btn-floating waves-effect waves-light green'
              type='submit' name='insert'>
              <i class='material-icons'>add</i>
            </button>
          </td>
        </form>
        </tr>

    <?php
    //ahora recorro la consulta realizada sacando cada cliente
      while ($registro = $consulta->fetch_object()){
        //muestro los campos con su oculto dentro del formulario de edición
        ?>
        <tr>
         <td><?=$registro->dni?></td>
         <td><?=$registro->nombre?></td>
         <td><?=$registro->direccion?></td>
         <td><?=$registro->telefono?></td>
         <!-- se podrá editar o eliminar el cliente pulsando el correspondiente botón -->
         <td>
           <form class='botonInline' action='ejers.php?carp=ejer01_mysqli&ejer=updateCliente' method="post">
             <button class='btn-floating waves-effect waves-light blue'
               name='update' type='submit'>
               <i class='material-icons'>mode_edit</i>
             </button>
             <input type='hidden' name='dni' value='<?=$registro->dni?>'>
           </form>
           <form class='botonInline' action='ejers.php?carp=ejer01_mysqli&ejer=deleteCliente' method='post'>
             <button class='btn-floating waves-effect waves-light red'
               name='delete' type='submit'>
               <i class='material-icons'>close</i>
               <input type='hidden' name='dni' value='<?=$registro->dni?>'>
             </button>
           </form>
         </td>
       </tr>
    <?php
      } 
    ?>
      </tbody>
    </table>
  <?php 
  }

echo  "</article>";

$conexion->close();