<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
        .boton_personalizado{
        text: center;
        display: flex;
        flex-wrap: wrap;
        margin: 5px;
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
    <center> 
        <form method="post">
            <a class="boton_personalizado" href="/registro.php">Registro</a>
            <a class="boton_personalizado" href="/login.php">Iniciar sesion</a>
            <input type="submit" class="boton_personalizado" name="Eliminar" value="Eliminar">
        </form>
    </center>
</body>
</html>
<?php
include("connect.php");
    if (isset($_POST['Eliminar'])) {
        $sql1= "DELETE FROM users";
        $resultado1 = mysqli_query($conn,$sql1);
        $sql2= "SELECT id FROM users";
        $resultado2 =mysqli_query($conn,$sql2);
        if($resultado1){
            ?> 
            <h3 class="ok">¡Ok, Se elimino la base de datos correctamente!</h3>
        <?php
        }else{
            if($resultado2){
                ?> 
                <h3 class="bad">¡NOk, No se puede eliminar porque la base de datos no existe!</h3>
            <?php
            }
        }
    }   
?>