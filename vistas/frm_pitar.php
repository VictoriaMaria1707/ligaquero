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
    <body class="container">
     
        
        <div id="lista">
        
    <?php 
        include_once "../clases/cls_pitar.php";
        $pita = new pitar();
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
  <form id="form1" action="../acciones/guardar_pitar.php" method="post">    
<div class="container table-responsive-xl">
          <section1 class="container"> <h1>Arbitros</h1> </section1>
          
<table class="table">
    <tbody>
        <tr>
        <th></th>
            <th> <input type="hidden" id="txt_idcalen" name="txt_idcalen" required value="<?php echo $_GET["valor"] ?> "/></th>
        </tr>
        <tr>
            <th scope="col"><label for="txt_arbitro">Arbitro</label></th>      
            <th scope="col"> <select id="txt_arbitro" name="txt_arbitro" required>
                <option>--Seleccione--</option>
            <?php
                $result=$pita->comboartri();
            while($row=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row['idarbitro'];?>"><?php echo $row['nombre'];?></option>

                    <?php
                            }
                        ?>      
                </select></th>
        </tr>
 <tr>
        <th scope="col">
     <button id="btn_insertar" class="btn btn-primary btn-lg" type="submit">Insertar</button>
     </th>
     <th scope="col">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo">Nuevo Arbitro</button>
     </th>
        </tr>
    </tbody>
</table>
      
 </div>
   </form>

<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Arbitro</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guardar_arbitro.php" method="post">    
        <table>
            <tbody>
                <tr>
                    <th><label for="txt_cedula">Cedula</label> </th>
                    <th><input type="text" id="txt_cedula" name="txt_cedula" required onkeypress='return event.charCode >= 48 && event.charCode <= 57;' onblur="validaNumericos(this.value);" maxlength="10" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nombre"> Nombre</label> </th>     
                    <th><input type="text" id="txt_nombre" name="txt_nombre" required maxlength="30"/> </th> 
                </tr>
                
                 <tr>
                    <th><label for="txt_apellido">Apellido</label> </th>
                    <th><input type="text" id="txt_apellido" name="txt_apellido" required maxlength="30"/></th>
                </tr>

                <tr>
                    <th><label for="txt_direccion">Direccion</label> </th>
                    <th><input type="text" id="txt_direccion" name="txt_direccion" required maxlength="30"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_telefono">Telefono</label> </th>
                    <th><input type="text" id="txt_telefono" name="txt_telefono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="validaNumericos(this.value);" required maxlength="9" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_celular">Celular</label> </th>
                    <th><input type="text" id="txt_celular" name="txt_celular" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="validaNumericos(this.value);" required maxlength="10" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_correo">Correo</label> </th>
                    <th><input type="text" id="txt_correo" name="txt_correo" required maxlength="30"/></th>
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
