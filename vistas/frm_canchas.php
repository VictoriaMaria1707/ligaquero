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
            <li><a href="../vistas/frm_equipo.php">Equipo</a></li> 
              <li><a href="../vistas/frm_arbitro.php">Arbitro</a></li>
        <li><a href="../vistas/frm_canchas.php">Canchas</a></li>
              <li><a href="../vistas/frm_calendario.php">Calendario</a></li>
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
      <h1>Canchas</h1>
        
        <div id="lista">
        
    <?php 
        include_once("../acciones/l_cancha.php");
        ?>
</div>
        
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nueva Cancha</button>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Cancha</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_cancha.php" method="post">    
        <table>
            <tbody>
                <tr>
                    <th><label for="txt_ubicacion">Ubicacion</label> </th>
                    <th><input type="text" id="txt_ubicacion" name="txt_ubicacion" required  maxlength="20" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nomcach">Nombre de la cancha</label> </th>     
                    <th><input type="text" id="txt_nomcach" name="txt_nomcach" required  maxlength="20" /> </th> 
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
