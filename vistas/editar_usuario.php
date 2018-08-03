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
   include_once("../clases/cls_usuario.php");
    $usu= new usuario();
    $row=$usu->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_usuario.php" method="post">
    <table>
        <tbody>
            <tr>
                <th></th><th><input type="text" id="txt_idusuario" name="txt_idusuario" value="<?php echo $row["idusuario"];?>" /></th>
            </tr>
            <tr>
                <th><label for="txt_usuario">Usuario</label> </th>
                <th><input type="text" id="txt_usuario" name="txt_usuario" required value="<?php echo $row["usuario"];?>"/></th>
            </tr>
            <tr>
                <th><label for="txt_clave">Clave</label> </th>       
                <th><input type="password" id="txt_clave" name="txt_clave" required value="<?php echo $row["clave"];?>" /> </th>       
            </tr>
            <tr>
                <th><label for="txt_rol">Rol</label> </th>       
                <th> <select id="txt_rol" name="txt_rol"  required>
            <option ><?php echo $row["rol"];?></option>
                    <?php if ($row["rol"] == 'secretaria'){ ?>
            <option >usuario</option>
<?php }else{?>
            <option>secretaria</option>
        <?php    }    ?>
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
