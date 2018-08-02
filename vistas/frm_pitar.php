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
      <h1>Arbitros</h1>
        
        <div id="lista">
        
    <?php 
        include_once "../clases/cls_pitar.php";
        $pita = new pitar();
        ?>
</div>
  <form id="form1" action="../acciones/guardar_pitar.php" method="post">    
<table>
    <tbody>
        <tr>
            <th><input type="hidden" id="txt_idcalen" name="txt_idcalen" required value="<?php echo $_GET["valor"] ?> "/></th>
        </tr>


        <tr>
            <th><label for="txt_arbitro">Arbitro</label></th>      
            <th> <select id="txt_arbitro" name="txt_arbitro" required>
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
 
    </tbody>
</table>
      
 <button id="btn_insertar" type="submit">Insertar</button>
  
          </form>
<div id="lista">
        
    <?php 
           include_once("../acciones/l_pitar.php");
        ?>
</div>

    </body>


</html>
