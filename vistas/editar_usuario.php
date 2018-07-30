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
   include_once("../clases/cls_usuario.php");
    $usu= new usuario();
    $row=$usu->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_usuario.php" method="post">
    <table>
        <tbody>
            <tr>
                <th></th><th><input type="text" id="txt_idusuario" name="txt_idusuario" value="<?php echo $row["idusuario"];?>" /></th>
            </tr>
            <tr>
                <th><label for="txt_usuario">Uusario</label> </th>
                <th><input type="text" id="txt_usuario" name="txt_usuario" required value="<?php echo $row["usuario"];?>"/></th>
            </tr>
            <tr>
                <th><label for="txt_clave">Clave</label> </th>       
                <th><input type="password" id="txt_clave" name="txt_clave" required value="<?php echo $row["clave"];?>" /> </th>       
            </tr>
            <tr>
                <th><label for="txt_rol">Rol</label> </th>       
                <th> <select id="txt_rol" name="txt_rol"  required>
            <option ><?php echo $row["rol"];?></option>
                    <?php if ($row["rol"] == 'secretaria'){ ?>
            <option >usuario</option>
<?php }else{?>
            <option>secretaria</option>
        <?php    }    ?>
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
