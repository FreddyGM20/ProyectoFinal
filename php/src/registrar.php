<?php 
$existe=0;
include("connect.php");
if (isset($_POST['Enviar'])) {
    if (strlen($_POST['Usuario']) >= 1 && strlen($_POST['Contraseña']) >= 1 && strlen($_POST['NRC']) >= 1) {
	    $Usuario = trim($_POST['Usuario']);
	    $Contraseña = trim($_POST['Contraseña']);
	    $NRC = trim($_POST['NRC']);
        $query = $conn->query("SELECT * FROM users");
        if (!empty($query->num_rows) && $query->num_rows > 0){
            $prueba1 = mysqli_query($conn,"SELECT Usuario FROM users WHERE Usuario='$Usuario'");
            $tempU=$Usuario;
            while($tempU = mysqli_fetch_array($prueba1)){
                $existe++;
            }
            if ($existe == 0){
                $ingreso = "INSERT INTO users(Usuario, Contraseña, NRC) VALUES ('$Usuario','$Contraseña','$NRC')";
                $resultado = mysqli_query($conn,$ingreso);
            if ($resultado) {
                ?> 
                <h3 class="ok">¡Ok, Te has inscrito correctamente!</h3>
            <?php
            } else {
                    ?> 
                    <h3 class="bad">¡NOk, ha ocurrido un error!</h3>
                <?php
            }
            }else{
                 ?> 
                <h3 class="bad">¡NOk, el usuario que quieres registrar ya existe!</h3>
                <?php
             }
            
        }else{
            $sql = "CREATE TABLE users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Usuario VARCHAR(50) NOT NULL,
                Contraseña VARCHAR(50) NOT NULL,
                NRC VARCHAR(50) NOT NULL)";
             $crear = mysqli_query($conn,$sql);
             $ingreso = "INSERT INTO users(Usuario, Contraseña, NRC) VALUES ('$Usuario','$Contraseña','$NRC')";
             $resultado = mysqli_query($conn,$ingreso);
             if (!empty($resultado)) {
                 ?> 
                 <h3 class="ok">¡Ok, Te has inscrito correctamente!</h3>
               <?php
             } else {
                     ?> 
                     <h3 class="bad">¡NOk, ha ocurrido un error!</h3>
                  <?php
                  echo "entra aqui";
             } 
        }
    } else {
	        ?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
            <?php
            }
}
?>