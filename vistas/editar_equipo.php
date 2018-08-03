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
   include_once("../clases/cls_equipo.php");
    $equi= new equipo();
    $row=$equi->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_equipo.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="text" id="txt_idequipo" name="txt_idequipo" value="<?php echo $row["idequipo"];?>" /></th>
                </tr>
                <tr>
                    <th><label for="txt_nomequipo">Nombre Equipo </label> </th>
                    <th><input type="text" id="txt_nomequipo" name="txt_nomequipo" required value="<?php echo $row["nombreequipo"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_numjuga">Numero de jugadores</label> </th>     
                    <th><input type="text" id="txt_numjuga" name="txt_numjuga" required value="<?php echo $row["Numjugadores"];?>" /> </th> 
                </tr>
                
                 <tr>
                    <th><label for="txt_nomdue">Nombre del dueño</label> </th>
                    <th><input type="text" id="txt_nomdue" name="txt_nomdue" required value="<?php echo $row["nombredueno"];?>" /></th>
                </tr>

                <tr>
                    <th><label for="txt_nomentre">Nombre de entrenador</label> </th>
                    <th><input type="text" id="txt_nomentre" name="txt_nomentre" required value="<?php echo $row["nombreentrenador"];?>"/></th>
                </tr>
  <?php 
        include_once "../clases/clase_categorias.php";
        $cate= new categoria();
        $resu=$cate->combo(); 
    ?>
                <tr><th> <label for="txt_serie">Serie</label> </th>    
        <th><select id="txt_serie" name="txt_serie" required onchange="cargar_categoria(this.value);">
            <option value="<?php echo $row['idserie'];?>"><?php echo $row['nombreserie'];?></option>
        <?php
                while($row1=mysqli_fetch_assoc($resu))
            {
                  
            ?>
        <option value="<?php echo $row1['idserie'];?>"><?php echo $row1['nombreserie'];?></option>
        
        <?php
                }
            ?>
        </select> </th></tr>

   <tr><th> <label for="txt_categoria">Nombre de categoria</label></th>
       <th><select id="txt_categoria" name="txt_categoria" required onchange="idcategorias(this.value);">
            <option value="<?php echo $row['idcategoria'];?>"><?php echo $row['nombre_cate'];?></option>
      
        </select></th> </tr>
            <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>        
      
        </tbody>
    </table>
 </form>
</html>
