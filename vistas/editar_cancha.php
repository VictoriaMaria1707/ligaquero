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
              <li><a href="../vistas/frm_arbitro.php">Arbitro</a></li>
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
   include_once("../clases/cls_canchas.php");
    $can= new cancha();
    $row=$can->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_cancha.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="hidden" id="txt_idcachas" name="txt_idcachas" value="<?php echo $row["idcachas"];?>" maxlength="20" /></th>
                </tr>
                            <tr>
                    <th></th><th><input type="hidden" id="txt_idubicacion" name="txt_idubicacion" value="<?php echo $row["idubicacion"];?>" maxlength="20" /></th>
                </tr>
               <tr>
                    <th><label for="txt_ubicacion">Ubicacion</label> </th>
                    <th><input type="text" id="txt_ubicacion" name="txt_ubicacion" required  maxlength="20" value="<?php echo $row["Ubicacion"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nomcach">Nombre de la cancha</label> </th>     
                    <th><input type="text" id="txt_nomcach" name="txt_nomcach" required  maxlength="20" value="<?php echo $row["nombre_cancha"];?>"/> </th> 
                </tr>
            <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>        
      
        </tbody>
    </table>
 </form>
</html>