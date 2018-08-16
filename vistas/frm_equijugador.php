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
<?php
        if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        ?>          



        
 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevojugador">Nuevo Jugador</button>    
        
<!-- Modal -->
<div class="modal fade" id="nuevojugador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          
        <h4 class="modal-title" id="myModalLabel">Nuevo Jugadores</h4>
      </div>
      <div class="modal-body">
        <form id="form1" action="../acciones/guarda_jugador.php" method="post">  
           
<table>
    <input type="hidden" id="txt_idequipo" name="txt_idequipo" value="<?php echo $_GET["valor"];?>"/>
        <input type="hidden" id="txt_catego" name="txt_catego" value="<?php echo $_GET["categoria"];?>"/>

    <tbody>
        <tr>

          <th><label for="txt_cedula">Cedula</label> </th>
             <th><input type="text" id="txt_cedula" name="txt_cedula" required onblur="verificarcedula(this.value);validarDocumento(this.value);" max="10" /></th>            
        </tr>

        <tr>
            <th><label for="txt_nombre1">Primer Nombre</label> </th>     
            <th><input type="text" id="txt_nombre1" name="txt_nombre1" required maxlength="30"/> </th> 
        </tr>

         <tr>
            <th><label for="txt_nombre2">Segundo Nombre</label> </th>
            <th><input type="text" id="txt_nombre2" name="txt_nombre2" required maxlength="30"/></th>
        </tr>

        <tr>
            <th><label for="txt_apellido1">Primer Apellido</label> </th>
            <th><input type="text" id="txt_apellido1" name="txt_apellido1" required maxlength="30"/></th>
        </tr>

        <tr>
            <th><label for="txt_apellido2">Segundo Apellido</label> </th>
            <th><input type="text" id="txt_apellido2" name="txt_apellido2" required maxlength="30"/></th>
        </tr>

        <tr>
            <th><label for="txt_direccion">Direccion</label> </th>
            <th><input type="text" id="txt_direccion" name="txt_direccion" required maxlength="30"/></th>
        </tr>
         <tr>
            <th><label for="txt_edad">Edad</label> </th>
            <th><input type="number" id="txt_edad" name="txt_edad" required maxlength="2"/></th>
        </tr>
        <tr>
            <th><label for="txt_telefono">Telefono</label> </th>
            <th><input type="text" id="txt_telefono" name="txt_telefono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="validaNumericos(this.value);" required maxlength="9"/></th>
        </tr>

        <tr>
            <th><label for="txt_celular">Celular</label> </th>
            <th><input type="text" id="txt_celular" name="txt_celular" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="validaNumericos(this.value);" required maxlength="10"/></th>
        </tr>

        <tr>
            <th><label for="txt_correo">Correo</label> </th>
            <th><input type="text" id="txt_correo" name="txt_correo" required maxlength="30" /></th>
            
        </tr>
        
        <tr>
            <th><label for="txt_genero">Genero</label></th> 
            <th> <select id="txt_genero" name="txt_genero" required>
                <option>--Seleccione--</option>
            <?php
                include_once "../clases/cls_jugador.php";
                $juga = new jugador();
                $result=$juga->combogenero();
            while($row=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['idgenero'];?>"><?php echo $row['Detalle_genero'];?></option>

                    <?php
                            }
                        ?>      
                </select></th>
        </tr>

        <tr>
            <th><label for="txt_lugarnaci">lugar de nacimiento</label> </th>
            <th> <select id="txt_lugarnaci" name="txt_lugarnaci" onchange="lugarnaci(this.value);" required>
            <option>--Seleccione--</option>
            <option>Quero</option>
            <option>Ambato</option>
            <option>Guaranda</option>
            <option>Cevallos</option>
            <option>Quito</option>
            </select></th>
        </tr>
        
       <tr>
          <th><label for='txt_parentest' id='txt_parentest' style="visibility:hidden" >Parentesto</label> </th>
           <th> <select id="txt_parentesto" style="visibility:hidden" name="txt_parentesto" onchange="parent(this.value);" >
            <option>--Seleccione--</option>
            <option>Esposo</option>
            <option>Esposa</option>
            <option>Madre</option>
            <option>Padre</option>
            <option>Abuelo</option>
            <option>Abuela</option>
            </select></th>
      </tr>

        <tr>
            <th><label for='txt_lugarnacipar' id='txt_lugarnacipar' style="visibility:hidden">lugar de nacimiento del pariente</label> </th>
            <th> <select id="txt_lugarnacipari" name="txt_lugarnacipari" style="visibility:hidden" onchange="lugarnacipar(this.value);" >
            <option>--Seleccione--</option>
            <option>Quero</option>
            <option>Ambato</option>
            <option>Guaranda</option>
            <option>Cevallos</option>
            <option>Quito</option>
            </select></th>
        </tr>

    </tbody>
</table>
      
          <div class="modal-footer">
              <button id="btn_insertarjuga" type="submit" style="visibility:visible">Insertar</button>
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