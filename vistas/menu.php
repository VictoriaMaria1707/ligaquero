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
             <li ><a  href="../vistas/frm_usuario.php">Usuarios</a>  </li>
             <li><a href="../vistas/frm_jugador.php">Jugadores</a></li>
            <li><a href="../vistas/frm_equipo.php">Equipo</a></li> 
        <li><a href="../vistas/frm_arbitro.php">Arbitro</a></li>  
        <li><a href="../vistas/frm_canchas.php">Canchas</a></li>  
              <li><a href="../vistas/frm_temporadas.php">Temporadas</a></li>  
    <li><a href="../vistas/frm_calendario.php">Calendario</a></li> 
          <li><a href="../vistas/login.php">Cerrar Sesion</a></li>

          </ul>
    <?php }else{ ?>
    <h3>Bienvenida <?PHP echo $_SESSION['usuario'].' - '.$_SESSION['ROL'] ?> </h3>
          <ul class="nav nav-tabs">
             <li><a href="../vistas/frm_jugador.php">Jugadores</a></li>
            <li><a href="../vistas/frm_equipo.php">Equipo</a></li> 
        <li><a href="../vistas/frm_arbitro.php">Arbitro</a></li>
     <li><a href="../vistas/frm_canchas.php">Canchas</a></li>  
    <li><a href="../vistas/frm_calendario.php">Calendario</a></li> 
              <li><a href="../vistas/login.php">Cerrar Sesion</a></li>
            
          </ul>
         
         

    <?php }
 }
else
{
     header('Location: ../vistas/login.php');
}
    ?>
</html>
