<html>
<head>
 <title>Login</title>
</head>
<body>
	<h1>Login de Usuarios</h1>

<form action="../acciones/secionrol.php" method="post" >

	<label for="txt_usuario">Usuarios</label>
    <input type="text" id="txt_usuario" name="txt_usuario" required/>
    <br><br>
    <label for="txt_clave">Clave</label>
    <input type="text" id="txt_clave" name="txt_clave" required/>
	<br><br>
	<input type="submit" name="Submit" value="LOGIN">
</form>
<hr />
</body>
</html>