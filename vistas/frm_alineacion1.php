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
    include_once("../vistas/menu.php");
 ?> 
    <body>
      <h1>Alineacion</h1>
        
        <div id="lista">
        
    <?php 
        include_once("../acciones/l_alineacion1.php");
        include_once "../clases/cls_alimentacion.php";
        $ali = new alimentacion();
        ?>
</div>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nuevo alineacion</button>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo alineacion</h4>
      </div>
      <div class="modal-body">        
<form id="form1" action="../acciones/guardar_alineacion.php" method="post">    
<table>
    <tbody>
        <tr>
         <th><label for="txt_juga">Jugadores</label></th> 
            <th> <select id="txt_juga" name="txt_juga" required>
                <option>--Seleccione--</option>
            <?php
            $result=$ali->combojugador1($_GET['equipo1']);
            while($row=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row['idjugador'];?>"><?php echo $row['nombre1'];?></option>
            <?php }?>                           
                </select></th>
        </tr>
        <tr><th>calendario</th>
            <th><input type="text" id="txt_cale" name="txt_cale" required  maxlength="20" /></th>
        </tr>

        <tr>
            <th><label for="txt_numcami">Numero de camiseta</label> </th>     
            <th><input type="text" id="txt_numcami" name="txt_numcami" required  maxlength="20" /> </th> 
        </tr>

    </tbody>
</table><div class="modal-footer">
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