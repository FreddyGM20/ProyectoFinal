<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="post">
    	<h1>Inicia sesion</h1>
    	<input type="text" name="Usuario" placeholder="Usuario">
    	<input type="password" name="Contraseña" placeholder="Contraseña">
    	<input type="submit" name="Iniciar" value="Iniciar sesion">
        <a href="/index.php">Regresar</a>
    </form>
        <?php 
        include("inicios.php");
        ?>
</body>
</html>
