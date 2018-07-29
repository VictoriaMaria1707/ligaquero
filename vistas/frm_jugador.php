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
        <h3>Bienvenida <?PHP echo $_SESSION['usuario'].' - '.$_SESSION['ROL'] ?> </h3>
          <ul class="nav nav-tabs">
            <li ><a href="../vistas/frm_usuario.php">Usuarios</a></li>
            <li><a href="../vistas/frm_jugador.php">Jugadores</a></li>
          <li><a href="../vistas/login.php">Cerrar Sesion</a></li>
          </ul>
    <?php }else{ ?>
    <h3>Bienvenida <?PHP echo $_SESSION['usuario'].' - '.$_SESSION['ROL'] ?> </h3>
        <ul class="nav nav-tabs">
          <li><a href="../vistas/login.php">Cerrar Sesion</a></li>
        </ul>
    <?php }
 }
else
{
     header('Location: ../vistas/login.php');
}
    ?>
    <body>
      <h1>Jugadores</h1>
        
        <div id="lista">
        
    <?php 
        include_once("../acciones/l_jugadores.php");
        ?>
</div>
        
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nuevo Jugadores</button>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Jugadores</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_jugadores.php" method="post">    
        <table>
            <tbody>
                <tr>
                    <th><label for="txt_cedula">Cedula</label> </th>
                    <th><input type="text" id="txt_cedula" name="txt_cedula" required /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nombre1">Primer Nombre</label> </th>     
                    <th><input type="text" id="txt_nombre1" name="txt_nombre1" required /> </th> 
                </tr>
                
                 <tr>
                    <th><label for="txt_nombre2">Segundo Nombre</label> </th>
                    <th><input type="text" id="txt_nombre2" name="txt_nombre2" required /></th>
                </tr>

                <tr>
                    <th><label for="txt_apellido1">Primer Apellido</label> </th>
                    <th><input type="text" id="txt_apellido1" name="txt_apellido1" required /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_apellido2">Segundo Apellido</label> </th>
                    <th><input type="text" id="txt_apellido2" name="txt_apellido2" required /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_direccion">Direccion</label> </th>
                    <th><input type="text" id="txt_direccion" name="txt_direccion" required /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_telefono">Telefono</label> </th>
                    <th><input type="text" id="txt_telefono" name="txt_telefono" required /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_celular">Celular</label> </th>
                    <th><input type="text" id="txt_celular" name="txt_celular" required /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_correo">Correo</label> </th>
                    <th><input type="text" id="txt_correo" name="txt_correo" required /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_lugarnaci">lugar de nacimiento</label> </th>
                    <th><input type="text" id="txt_lugarnaci" name="txt_lugarnaci" required onchange="parentescos(this.value);" /></th>
                </tr>
               <tr>
                  <th><label for='txt_parentesto'>Parentesto</label> </th>
                  <th><input type='text' id='txt_parentesto' name='txt_parentesto'  /></th>
              </tr>

                <tr>
                    <th><label for='txt_lugarnacipari'>lugar de nacimiento del pariente</label> </th>
                    <th><input type='text' id='txt_lugarnacipari' name='txt_lugarnacipari'  /></th>
                </tr> 
                <tr>
                    <th><label for="txt_genero">Genero</label></th>      
                    <th> <select id="txt_genero" name="txt_genero" required>
                        <option>--Seleccione--</option>
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
            </tbody>
            </table>
      
          <div class="modal-footer">
              <button id="btn_insertar" type="submit">Insertar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>       
          </div>
       
          </form>
           </div>
    </div>
  </div>
</div>

    </body>


</html>
