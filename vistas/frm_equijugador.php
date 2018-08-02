<html>
    <head>
        <title>
            Menus
        </title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script src="../jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <script src="../clases/todasfunciones.js"></script>
	   <title>Menu </title>
    </head>
    <?php   
    include_once("../vistas/menu.php");
 ?>
    <body>
      <?php 
        include_once "../clases/cls_equipo.php";
        $equi= new equipo();
        $ider=$equi->consultar_dato($_GET['valor']);
        $resu=$equi->transacciones();
    ?>
      <h1>Equipo <?php echo $ider['nombreequipo'];?></h1>
        
        <div id="lista">
        
    <?php 
        include_once("../acciones/l_equijugador.php");
        ?>
</div>
         <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nuevo Jugador</button>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Jugador</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_equijugador.php" method="post">    
<table>
    <tbody>
<h1>
    <input type="hidden" id="txt_equipi" name="txt_equipi" value="<?php echo $ider['idequipo'];?>"/></h1>
        
    <tr><th> <label for="txt_jugador">Jugadores</label> </th>    
        <th><select id="txt_jugador" name="txt_jugador" required>
            <option value="">--Seleccione--</option>
        <?php
            
                while($row=mysqli_fetch_assoc($resu))
            {
                  
            ?>
        <option value="<?php echo $row['idjugador'];?>"><?php echo $row['nombre1']." ".$row['apellido1'];?></option>
        
        <?php
                }
            ?>
            
        </select> </th></tr>

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