<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
    .boton_personalizado{
        text-decoration: none;
        padding: 10px;
        font-weight: 600;
        font-size: 20px;
        color: #fff;
        background-color: #7A36D4;
        border-radius: 6px;
        border: 2px solid #7A36D4;
        
  }
  .boton_personalizado:hover{
    color: #000000;
    background-color: #ffffff;
  }
</style>
</head>
<body>
    <form method="post">
    	<h1>Registrate</h1>
    	<input type="text" name="Usuario" placeholder="Usuario">
    	<input type="password" name="Contraseña" placeholder="Contraseña">
        <input type="text" name="NRC" placeholder="NRC">
    	<input type="submit" name="Enviar">
		<a href="/index.php">Regresar</a>
    </form>
        <?php 
        include("registrar.php");
        ?>
</body>
</html>