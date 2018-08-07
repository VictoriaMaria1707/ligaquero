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
    include_once("../clases/cls_jugador.php");
    $usu= new jugador();
    $row=$usu->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_jugador.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="hidden" id="txt_idjugador" name="txt_idjugador" value="<?php echo $row["idjugador"];?>" /></th>
                </tr>
                <tr>
                    <th><label for="txt_cedula">Cedula</label> </th>
                    <th><input type="text" id="txt_cedula" name="txt_cedula" required value="<?php echo $row["cedula"];?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57;' onblur="validaNumericos(this.value);" maxlength="10" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nombre1">Primer Nombre</label> </th>     
                    <th><input type="text" id="txt_nombre1" name="txt_nombre1" required value="<?php echo $row["nombre1"];?>" maxlength="30" /> </th> 
                </tr>
                
                 <tr>
                    <th><label for="txt_nombre2">Segundo Nombre</label> </th>
                    <th><input type="text" id="txt_nombre2" name="txt_nombre2" required value="<?php echo $row["nombre2"];?>" maxlength="30" /></th>
                </tr>

                <tr>
                    <th><label for="txt_apellido1">Primer Apellido</label> </th>
                    <th><input type="text" id="txt_apellido1" name="txt_apellido1" required value="<?php echo $row["apellido1"];?>" maxlength="30"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_apellido2">Segundo Apellido</label> </th>
                    <th><input type="text" id="txt_apellido2" name="txt_apellido2" required value="<?php echo $row["apellido2"];?>" maxlength="30"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_direccion">Direccion</label> </th>
                    <th><input type="text" id="txt_direccion" name="txt_direccion" required value="<?php echo $row["direccion"];?>" maxlength="30"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_telefono">Telefono</label> </th>
                    <th><input type="text" id="txt_telefono" name="txt_telefono" required value="<?php echo $row["telefono"];?>"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="validaNumericos(this.value);" required maxlength="9"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_celular">Celular</label> </th>
                    <th><input type="text" id="txt_celular" name="txt_celular" required value="<?php echo $row["celular"];?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="validaNumericos(this.value);" required maxlength="10"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_correo">Correo</label> </th>
                    <th><input type="text" id="txt_correo" name="txt_correo" required value="<?php echo $row["correo"];?>" maxlength="30"/></th>
                </tr>
      <tr>
                    <th><label for="txt_genero">Genero</label></th>      
                    <th> <select id="txt_genero" name="txt_genero" required>
                        <option value="<?php echo $row['idgenero'];?>"><?php echo $row["Detalle_genero"];?></option>
                    <?php
                        include_once "../clases/cls_jugador.php";
                        $juga = new jugador();
                        $result=$juga->combogenero();
                    while($row1=mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $row1['idgenero'];?>"><?php echo $row1['Detalle_genero'];?></option>

                            <?php
                                    }
                                ?>      
                        </select></th>
                </tr>
                     
                <tr>
            <th><label for="txt_lugarnaci">lugar de nacimiento</label> </th>
            <th> <select id="txt_lugarnaci" name="txt_lugarnaci" onchange="lugarnaci(this.value);" required>
            <option value="<?php echo $row["lugarnacimi"];?>"><?php echo $row["lugarnacimi"];?></option>
            <option>Quero</option>
            <option>Ambato</option>
            <option>Guaranda</option>
            <option>Cevallos</option>
            <option>Quito</option>
            </select></th>
        </tr>
        
       <tr>
          <th><label for='txt_parentest' id='txt_parentest' style="visibility:visible" >Parentesto</label> </th>
           <th> <select id="txt_parentesto" style="visibility:visible" name="txt_parentesto" onchange="parent(this.value);" >
            <option value="<?php echo $row["parentesto"];?>"><?php echo $row["parentesto"];?></option>
            <option>Esposo</option>
            <option>Esposa</option>
            <option>Madre</option>
            <option>Padre</option>
            <option>Abuelo</option>
            <option>Abuela</option>
            </select></th>
      </tr>

        <tr>
            <th><label for='txt_lugarnacipar' id='txt_lugarnacipar' style="visibility:visible">lugar de nacimiento del pariente</label> </th>
            <th> <select id="txt_lugarnacipari" name="txt_lugarnacipari1" style="visibility:visible" onchange="lugarnacipar(this.value);" >
            <option value="<?php echo $row["lugarnaciparen"];?>"><?php echo $row["lugarnaciparen"];?></option>
            <option>Quero</option>
            <option>Ambato</option>
            <option>Guaranda</option>
            <option>Cevallos</option>
            <option>Quito</option>
                </select></th> </tr>

            
            <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>        
      
        </tbody>
    </table>
 </form>
</html>
