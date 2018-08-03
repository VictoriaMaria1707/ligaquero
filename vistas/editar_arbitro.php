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
   include_once("../clases/cls_arbitro.php");
    $usu= new arbitro();
    $row=$usu->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_arbito.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="text" id="txt_idarbitro" name="txt_idarbitro" value="<?php echo $row["idarbitro"];?>" /></th>
                </tr>
                <tr>
                    <th><label for="txt_cedula">Cedula</label> </th>
                    <th><input type="text" id="txt_cedula" name="txt_cedula" required value="<?php echo $row["cedula"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nombre"> Nombre</label> </th>     
                    <th><input type="text" id="txt_nombre" name="txt_nombre" required value="<?php echo $row["nombre"];?>"/> </th> 
                </tr>
                
                 <tr>
                    <th><label for="txt_apellido">Apellido</label> </th>
                    <th><input type="text" id="txt_apellido" name="txt_apellido" required value="<?php echo $row["apellido"];?>"/></th>
                </tr>

                <tr>
                    <th><label for="txt_direccion">Direccion</label> </th>
                    <th><input type="text" id="txt_direccion" name="txt_direccion" required value="<?php echo $row["direccion"];?>"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_telefono">Telefono</label> </th>
                    <th><input type="text" id="txt_telefono" name="txt_telefono" required value="<?php echo $row["telefono"];?>"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_celular">Celular</label> </th>
                    <th><input type="text" id="txt_celular" name="txt_celular" required value="<?php echo $row["celular"];?>"/></th>
                </tr>
                
                <tr>
                    <th><label for="txt_correo">Correo</label> </th>
                    <th><input type="text" id="txt_correo" name="txt_correo" required value="<?php echo $row["correo"];?>"/></th>
                </tr>
                
            <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>        
      
        </tbody>
    </table>
 </form>
</html>
