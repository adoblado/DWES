<!DOCTYPE html>
<!--
Ejercicio 9. 
Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar se almacenen
en cookies. La aplicación debe ofrecer, por tanto, las opciones de alta, baja y modificación de
productos.
-->
<?php session_start(); ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      section article span.numeroEjer {
        font-size: 1.2rem;
      }
      div#contenedor article {
        overflow: hidden;
      }
      div#contenedor article h2 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 15px;
      }
      #formIntro { float: right; }
      form#acciones {
        width: 650px;
        margin: 0 auto; 
      }
      form#acciones input {
        margin: 0 20px;
      }
      td { min-width: 170px;}
    </style>
  </head>
  <body>
    <a href="indexTema6.html"><header>
      <h1>Ejercicios Tema 6</h1>
    </header></a>
    <nav>
      <a href="ejer01.php"><span>Ejercicio 01</span></a>
      <a href="ejer02.php"><span>Ejercicio 02</span></a>
      <a href="ejer03.php"><span>Ejercicio 03</span></a>
      <a href="ejer04.php"><span>Ejercicio 04</span></a>
      <a href="ejer05.php"><span>Ejercicio 05</span></a>
      <a href="ejer06.php"><span>Ejercicio 06</span></a>
      <a href="ejer07.php"><span>Ejercicio 07</span></a>
      <a href="ejer08.php"><span>Ejercicio 08</span></a>
      <a href="ejer09.php"><span>Ejercicio 09</span></a>
    </nav>
    <section>
      <div id="contenedor">
        <article>
          <span class="numeroEjer">Ejercicio 6</span>
          <?php
            $productos = unserialize(stripslashes($_COOKIE['productos']));
          ?> 
            <form id='formIntro' action='ejer09.php' method='post'>
              <input type='submit' value='Volver'>
            </form>
            
            <h2>La Ginebroteca</h2>
            <form id="acciones" action="ejer09_ABM.php" method="post">
              <input type="submit" name="alta" value="NUEVO PRODUCTO">
              <input type="submit" name="baja" value="BORRAR PRODUCTO">
              <input type="submit" name="modificacion" value="MODIFICAR PRODUCTO">
            </form>
            
          <?php
            /* ******************************************************** 
             * ************ ALTA DE NUEVO PRODUCTO ********************
             * ********************************************************/
            if (isset($_REQUEST['alta'])) {
              if (isset($_REQUEST['codigo'])) {
                $prodAnadir = [
                  "imagen" => $_REQUEST['imagen'],
                  "nombre" => $_REQUEST['nombre'], 
                  "descripcionLarga" => $_REQUEST['descLarga'], 
                  "descripcionCorta" => $_REQUEST['descCorta'], 
                  "detalle" => $_REQUEST['detalle'],
                  "precio" => $_REQUEST['precio'],
                ];
                $productos[$_REQUEST['codigo']] = $prodAnadir;
                setcookie("productos", (serialize($productos)), time() + 3*24*3600);
                echo "Producto añadido satisfactoriamente";
              } else {
          ?>
                <form action="ejer09_ABM.php" method="post">
                  NUEVO PRODUCTO
                  <table>
                    <tr>
                      <td>Código</td><td><input type="text" name="codigo" size="10" maxlength="10" required></td>
                    </tr>
                    <tr>
                      <td>Nombre</td><td><input type="text" name="nombre" size="20" maxlength="20" required></td>
                    </tr>
                    <tr>
                      <td>Imagen</td><td><input type="file" name="imagen" accept="image/*" required></td>
                    </tr>
                    <tr>
                      <td>Descripción Larga</td><td><input type="text" name="descLarga" size="100" required></td>
                    </tr>
                    <tr>
                      <td>Descripción Corta</td><td><input type="text" name="descCorta"size="50" required></td>
                    </tr>
                    <tr>
                      <td>Más detalles</td><td><input type="text" name="detalle" size="200" required></td>
                    </tr>
                    <tr>
                      <td>Precio</td><td><input type="number" name="precio" min="0" step="0.01" required></td>
                    </tr>
                  </table>
                  <input type="submit" name="alta" value="Aceptar">
                </form>
          <?php
              }
              
              
              /* ******************************************************** 
              * ****************** BAJA DE PRODUCTO *********************
              * ********************************************************/
            } else if (isset($_REQUEST['baja'])) {
              if (isset($_REQUEST['codigoBorrar'])) {
                unset($productos[$_REQUEST['codigoBorrar']]); 
                setcookie("productos", (serialize($productos)), time() + 3*24*3600);
                echo "Producto borrado satisfactoriamente";
                var_dump($productos);
              } else {
          ?>
                <form action="ejer09_ABM.php" method="post">
                  BORRAR PRODUCTO
                  <select name="codigoBorrar">
          <?php
                    foreach ($productos as $codigo => $productoSolo) {
                      echo "<option value='" . $codigo . "'>" . $productoSolo['nombre'] . "</option>";
                    }
          ?>
                  </select>
                  <input type="submit" name="baja" value="Borrar">
                </form>
          <?php
              }
              
              
              /* ******************************************************** 
              * ********** MODIFICACIÓN DE PRODUCTO *********************
              * ********************************************************/
            } else if (isset($_REQUEST['modificacion'])) {
              //SI HE ELEGIDO PRODUCTO PARA MODIFICAR
              if (isset($_REQUEST['codigoModificar1'])) {
                //si ya he introducido los datos modificados 
                if (isset($_REQUEST['codigoModificar2'])) {
                  foreach ($productos as $codigo => $productoSolo) {
                    if ($_REQUEST['codigoModificar2'] == $codigo) {
                      $prodAnadir = [
                        "imagen" => $_REQUEST['imagen'],
                        "nombre" => $_REQUEST['nombre'], 
                        "descripcionLarga" => $_REQUEST['descLarga'], 
                        "descripcionCorta" => $_REQUEST['descCorta'], 
                        "detalle" => $_REQUEST['detalle'],
                        "precio" => $_REQUEST['precio'],
                      ];
                      $productos[$_REQUEST['codigoModificar2']] = $prodAnadir;
                      setcookie("productos", (serialize($productos)), time() + 3*24*3600);
                      echo "Producto modificado satisfactoriamente";
                    }
                  }
                } else {
                  //si no lo he introducido aun
                  foreach ($productos as $codigo => $productoSolo) {
                    if ($_REQUEST['codigoModificar1'] == $codigo) {
           ?>
                      <form action="ejer09_ABM.php" method="post">
                        MODIFICAR PRODUCTO
                        <table>
                          <tr>
                            <td>Código</td><td><input type="text" name="codigoModificar2" size="10" maxlength="10" required value="<?=$codigo?>"></td>
                          </tr>
                          <tr>
                            <td>Nombre</td><td><input type="text" name="nombre" size="20" maxlength="20" required value="<?=$productoSolo['nombre']?>"></td>
                          </tr>
                          <tr>
                            <td>Imagen</td><td><input type="file" name="imagen" accept="image/*" required value="<?=$productoSolo['imagen']?>"></td>
                          </tr>
                          <tr>
                            <td>Descripción Larga</td><td><input type="text" name="descLarga" size="100" required value="<?=$productoSolo['descripcionLarga']?>"></td>
                          </tr>
                          <tr>
                            <td>Descripción Corta</td><td><input type="text" name="descCorta"size="50" required  value="<?=$productoSolo['descripcionCorta']?>"></td>
                          </tr>
                          <tr>
                            <td>Más detalles</td><td><input type="text" name="detalle" size="200" required value="<?=$productoSolo['detalle']?>"></td>
                          </tr>
                          <tr>
                            <td>Precio</td><td><input type="number" name="precio" min="0" step="0.01" required value="<?=$productoSolo['precio']?>"></td>
                          </tr>
                        </table>
                        <input type="submit" name="modificacion" value="Modificar">
                        <input type="hidden" name="codigoModificar1">
                      </form>
          <?php
                    }
                  }
                }
              } else {
                //SI NO HE ELEGIDO PRODUCTO AUN
          ?>
                <form action="ejer09_ABM.php" method="post">
                  MODIFICAR PRODUCTO
                  <select name="codigoModificar1">
          <?php
                    foreach ($productos as $codigo => $productoSolo) {
                      echo "<option value='" . $codigo . "'>" . $productoSolo['nombre'] . "</option>";
                    }
          ?>
                  </select>
                  <input type="submit" name="modificacion" value="Modificar">
                </form>
          <?php
              }
            }
          ?>
        </article>
      </div>
    </section>
    <footer>
      <div id="anterior"><a href="ejer08.php">Anterior</a></div>
    </footer>
  </body>
</html>