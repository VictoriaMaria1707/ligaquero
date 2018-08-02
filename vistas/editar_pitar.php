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
              <li><a href="../vistas/frm_canchas.php">Canchas</a></li>   
              <li><a href="../vistas/frm_calendario.php">Calendario</a></li>
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
   include_once("../clases/cls_pitar.php");
    $pit= new pitar();
    $row=$pit->consultar_dato($_GET['valor']);
    
    ?>
<form id="form1" action="../acciones/actualizar_pitar.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="hidden" id="txt_idcalearbi" name="txt_idcalearbi" value="<?php echo $row["idcalearbi"];?>" maxlength="20" /></th>
                </tr>

               <tr>
            <th><label for="txt_arbitro">Arbitro</label></th>      
            <th> <select id="txt_arbitro" name="txt_arbitro" required>
                <option value="<?php echo $row["idarbitro"];?>"><?php echo $row["nombre"];?></option>
            <?php
                $result=$pit->comboartri();
            while($row=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row['idarbitro'];?>"><?php echo $row['nombre'];?></option>

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