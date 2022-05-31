<?php 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/registro.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$res[]=array($result);
print_r($ch);
$existe=0;
include("connect.php");
	    $Usuario = $post['Usuario'];
	    $Contraseña = $post['Contraseña'];
	    $NRC = $post['NRC'];
        $query = $conn->query("SELECT * FROM users");
        echo "Primera fase";
        if (!empty($query->num_rows) && $query->num_rows > 0){
            $prueba1 = mysqli_query($conn,"SELECT Usuario FROM users WHERE Usuario='$Usuario'");
            $tempU=$Usuario;
            echo "Segunda fase";
            while($tempU = mysqli_fetch_array($prueba1)){
                $existe++;
            }
            if ($existe == 0){
                echo "Casi coronas";
                $ingreso = "INSERT INTO users(Usuario, Contraseña, NRC) VALUES ('$Usuario','$Contraseña','$NRC')";
                $resultado = mysqli_query($conn,$ingreso);
            if ($resultado) {
                ?> 
                <h3 class="ok">¡Ok, Te has inscrito correctamente!</h3>
            <?php
            echo "Coronaste";
            } else {
                    ?> 
                    <h3 class="bad">¡NOk, ha ocurrido un error!</h3>
                <?php
                echo "F mi rey";
            }
            }else{
                 ?> 
                <h3 class="bad">¡NOk, el usuario que quieres registrar ya existe!</h3>
                <?php
                echo "Revisa la base de datos cachon";
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
             echo "No habia na y se creo";
             if (!empty($resultado)) {
                 ?> 
                 <h3 class="ok">¡Ok, Te has inscrito correctamente!</h3>
               <?php
               echo "inscrito";
             } else {
                     ?> 
                     <h3 class="bad">¡NOk, ha ocurrido un error!</h3>
                  <?php
                  echo "entra aqui error";
             } 
        }

?>
