<html>
<form id="form1" action="../acciones/guardar_usuario.php" method="post">
    <br><br><br>
    &ensp;&ensp;&ensp; <label for="txt_nombre">Nombre</label>
    <input type="text" id="txt_nombre" name="txt_nombre" required/>
    <br><br>
    &ensp;&ensp;&ensp;<label for="txt_usuario">Usuarios</label>
    <input type="text" id="txt_usuario" name="txt_usuario" required/>
    <br><br>
    &ensp;&ensp;&ensp;<label for="txt_clave">Clave</label>
    <input type="text" id="txt_clave" name="txt_clave" required/>
<br><br>
     &ensp;&ensp;&ensp;<button id="btn_insertar" type="submit">Insertar</button>
</form>
    <br><br><br>
    <div id="lista">
        
    <?php 
        include_once("../acciones/l_usuarios.php");
        ?>
    </div>
</html>
