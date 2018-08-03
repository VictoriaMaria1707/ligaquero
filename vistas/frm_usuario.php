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
      <h1>Usuarios</h1>
        
        <div id="lista">
        
    <?php 
        include_once("../acciones/l_usuarios.php");
        ?>
</div>
        
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nuevo Usuario</button>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_usuario.php" method="post">    
        <table>
            <tbody>
                <tr>
                    <th><label for="txt_usuario">Uusario</label> </th>
                    <th><input type="text" id="txt_usuario" name="txt_usuario" required maxlength="30"/></th>
                </tr>
                
        <tr><th><label for="txt_clave">Clave</label> </th>       
        <th><input type="password" id="txt_clave" name="txt_clave" required maxlength="30"/> </th>       </tr>
                
            <tr><th><label for="txt_rol">Rol</label></th>      
        <th> <select id="txt_rol" name="txt_rol" required>
            <option>--Seleccione--</option>
            <option>usuario</option>
            <option>secretaria</option>
            </select></th>       </tr>
    
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
