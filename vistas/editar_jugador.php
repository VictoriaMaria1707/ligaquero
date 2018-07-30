<html>
    <head>
        <title>
            Menus
        </title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script src="../jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
	   <title>Menu </title>
    </head>
    <?php
session_start();
if (isset($_SESSION['ROL']))
 {
     if ($_SESSION['ROL'] == 'secretaria'){?>
        <h3>Bienvenida <?PHP echo $_SESSION['usuario'].' - '.$_SESSION['ROL']  ?> </h3>
          <ul class="nav nav-tabs">
             <li ><a  href="../vistas/frm_usuario.php">Usuarios</a>  </li>
<li><a href="../vistas/frm_jugador.php">Jugadores</a></li>
            <li><a href="../vistas/frm_equipo.php">Equipo</a></li>
          <li><a href="../vistas/login.php">Cerrar Sesion</a></li>

          </ul>
    <?php }else{ ?>
    <h3>Bienvenida <?PHP echo $_SESSION['usuario'].' - '.$_SESSION['ROL']  ?> </h3>
          <ul class="nav nav-tabs">
              <li><a href="../vistas/login.php">Cerrar Sesion</a></li>
  
          </ul>
         

    <?php }
 }
else
{
     header('Location: ../vistas/login.php');
}
   include_once("../clases/cls_jugador.php");
    $usu= new jugador();
    $row=$usu->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_jugador.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="text" id="txt_idjugador" name="txt_idjugador" value="<?php echo $row["idjugador"];?>" /></th>
                </tr>
                <tr>
                    <th><label for="txt_cedula">Cedula</label> </th>
                    <th><input type="text" id="txt_cedula" name="txt_cedula" required value="<?php echo $row["cedula"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nombre1">Primer Nombre</label> </th>     
                    <th><input type="text" id="txt_nombre1" name="txt_nombre1" required value="<?php echo $row["nombre1"];?>" /> </th> 
                </tr>
                
                 <tr>
                    <th><label for="txt_nombre2">Segundo Nombre</label> </th>
                    <th><input type="text" id="txt_nombre2" name="txt_nombre2" required value="<?php echo $row["nombre2"];?>" /></th>
                </tr>

                <tr>
                    <th><label for="txt_apellido1">Primer Apellido</label> </th>
                    <th><input type="text" id="txt_apellido1" name="txt_apellido1" required value="<?php echo $row["apellido1"];?>"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_apellido2">Segundo Apellido</label> </th>
                    <th><input type="text" id="txt_apellido2" name="txt_apellido2" required value="<?php echo $row["apellido2"];?>"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_direccion">Direccion</label> </th>
                    <th><input type="text" id="txt_direccion" name="txt_direccion" required value="<?php echo $row["direccion"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_telefono">Telefono</label> </th>
                    <th><input type="text" id="txt_telefono" name="txt_telefono" required value="<?php echo $row["telefono"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_celular">Celular</label> </th>
                    <th><input type="text" id="txt_celular" name="txt_celular" required value="<?php echo $row["celular"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_correo">Correo</label> </th>
                    <th><input type="text" id="txt_correo" name="txt_correo" required value="<?php echo $row["correo"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_lugarnaci">lugar de nacimiento</label> </th>
                    <th><input type="text" id="txt_lugarnaci" name="txt_lugarnaci" required value="<?php echo $row["lugarnacimi"];?>"/></th>
                </tr>
               <tr>
                  <th><label for='txt_parentesto'>Parentesto</label> </th>
                  <th><input type='text' id='txt_parentesto' name='txt_parentesto' value="<?php echo $row["parentesto"];?>" /></th>
              </tr>

                <tr>
                    <th><label for='txt_lugarnacipari'>lugar de nacimiento del pariente</label> </th>
                    <th><input type='text' id='txt_lugarnacipari' name='txt_lugarnacipari' value="<?php echo $row["lugarnaciparen"];?>" /></th>
                </tr> 
                <tr>
                    <th><label for="txt_genero">Genero</label></th>      
                    <th> <select id="txt_genero" name="txt_genero" required>
                        <option value="<?php echo $row['idgenero'];?>"><?php echo $row["Detalle_genero"];?></option>
                    <?php
                        include_once "../clases/cls_jugador.php";
                        $juga = new jugador();
                        $result=$juga->combogenero();
                    while($row=mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $row['idgenero'];?>"><?php echo $row['Detalle_genero'];?></option>

                            <?php
                                    }
                                ?>      
                        </select></th>
                </tr>
            <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>        
      
        </tbody>
    </table>
 </form>
</html>
