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
    <body class="container" >
               
      <h1>Calendario</h1>
        
        <div id="lista">
        
    <?php 
        include_once("../acciones/l_calendario.php");
        include_once "../clases/cls_calendario.php";
        $cale = new calendario();
        ?>
</div>
    <?php
        if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        ?>      
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nuevo partido</button>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Partido</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_calendario.php" method="post">    
        <table>
            <tbody class="container">
                <tr>
                    <th><label for="txt_fecha">Fecha</label> </th>
                    <th><input type="date" id="txt_fecha" name="txt_fecha" required min="<?php $hoy=date("Y-m-d"); echo $hoy;?>"/></th>
                </tr>
                
                 <tr>
                    <th><label for="txt_hora">Hora</label> </th>
                    <th><input type="time" id="txt_hora" name="txt_hora" required /></th>
                </tr>
    <?php 
    include_once "../clases/cls_calendario.php";
        $cale= new calendario();
        $resu=$cale->comboetapas(); 
        
    ?>
   
    <tr>
    <th><label for="txt_etapas">Serie</label></th>      
    <th> <select id="txt_etapas" name="txt_etapas" required>
    <option>--Seleccione--</option>
    <?php
    $result=$cale->comboetapas();
    while($row=mysqli_fetch_assoc($result)){ ?>
    <option value="<?php echo $row['idetapa'];?>"><?php echo $row['nombreetapa'];?></option>
    <?php  } ?>      
    </select></th>
    </tr>
    <?php $result=$cale->comboequipo(); ?>
     <tr>
    <th><label for="txt_equipo1">Equipo 1</label></th>      
    <th> <select id="txt_equipo1" name="txt_equipo1" required onchange="cargar_equipo(this.value);">
    <option value="">--Seleccione--</option>
    <?php
    
    while($row1=mysqli_fetch_assoc($result)){ 
        ?>
    <option value="<?php echo $row1['idequipo'];?>"><?php echo $row1['nombreequipo'];?></option>
    <?php  } ?>      
    </select></th>
    </tr>
                
     <tr>
    <th><label for="txt_equipo2">Equipo 2</label></th>      
    <th> <select id="txt_equipo2" name="txt_equipo2" required >
    <option value="">--Seleccione--</option>
     
    </select></th>
    </tr>
      
                <tr>
    <th><label for="txt_temporada">Temporada</label></th>      
    <th> <select id="txt_temporada" name="txt_temporada" required>
        <option>--Seleccione--</option>
    <?php
        $result=$cale->combotemporada();
    while($row=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row['idtemporada'];?>"><?php echo $row['nombre_temporada'];?></option>
            <?php  } ?>      
        </select></th>
</tr>
<tr>
    <th><label for="txt_canchas">Canchas</label></th>      
    <th> <select id="txt_canchas" name="txt_canchas" required>
        <option>--Seleccione--</option>
    <?php
        $result=$cale->combocanchas();
    while($row=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row['idcachas'];?>"><?php echo $row['nombre_cancha'];?></option>

            <?php
          }
                ?>      
        </select></th>
</tr>
                <tr>
    <th><label for="txt_arbi">Arbitro</label></th>      
    <th> <select id="txt_arbi" name="txt_arbi" required>
        <option>--Seleccione--</option>
    <?php
        $result=$cale->comboartri();
    while($row=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row['idarbitro'];?>"><?php echo $row['nombre'];?></option>

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
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevomar">ver marcadores</button>

<!-- Modal -->
<div class="modal fade" id="nuevomar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Marcadores</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_temporada.php" method="post">    
<table>
    <?php include_once("../acciones/l_marcador.php");?>
</table>
      
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>       
          </div>
       
          </form>
           </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevorepo"> Reporte Temporada </button>

<!-- Modal -->
<div class="modal fade" id="nuevorepo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Temporadas</h4>
      </div>
      <div class="modal-body">
         
<table>
    <tbody>
    <tr>
    <th><label for="txt_temporada">Temporada</label></th>      
    <th> <select id="txt_temporada" name="txt_temporada" required>
        <option>--Seleccione--</option>
    <?php
        $result=$cale->combotemporada();
    while($row=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row['idtemporada'];?>"><?php echo $row['nombre_temporada'];?></option>
            <?php  } ?>      
        </select></th>
</tr>
    </tbody>
</table>
      
          <div class="modal-footer">
              <a href='../vistas/reporte_calendariosemana.php?valor="<?php echo $row['idtemporada'];?>"' id="btn_insertar" type="submit">Reporte</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>  
            
          </div>
       
           </div>
    </div>
  </div>
</div>
<?php
        }else{ 
    } }
else
{
     header('Location: ../vistas/login.php');
} 
        ?>
    </body>


</html>
