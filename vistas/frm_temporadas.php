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
    <body class="container">
      <h1>Temporada</h1>
        
        <div id="lista">
        
    <?php 
        include_once("../acciones/l_temporada.php");
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
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nuevo Temporada</button>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Temporada</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_temporada.php" method="post">    
<table>
    <tbody>
        <tr>
            <th><label for="txt_temporada">Temporada</label> </th>
            <th><input type="text" id="txt_temporada" name="txt_temporada" required maxlength="30"/></th>
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
