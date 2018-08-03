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
    include_once("../clases/cls_pitar.php");
    $pit= new pitar();
    $row=$pit->consultar_dato($_GET['valor']);
    
    ?>
    <body>
         <h1>Arbitros</h1>
<form id="form1" action="../acciones/actualizar_pitar.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="hidden" id="txt_idcalearbi" name="txt_idcalearbi" value="<?php echo $row["idcalearbi"];?>" maxlength="20" /></th>
                </tr>

              
            <tr>
                <th><label for="txt_arbitro">Arbitro</label></th>      
                <th> <select id="txt_arbitro" name="txt_arbitro" required>
                <option value="<?php echo $row["idarbitro"];?>"><?php echo $row["nombre"];?></option>
                <?php $result=$pit->comboartri();
                while($row=mysqli_fetch_assoc($result)){ ?>
                <option value="<?php echo $row['idarbitro'];?>"><?php echo $row['nombre'];?></option>
                <?php  }  ?>  </select></th>
            </tr>   
        
            <tr>
                <th><input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>
        </tbody>
    </table>
 
 </form>
            
        </body>
</html>