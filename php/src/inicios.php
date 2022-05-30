<?php 
$existeU=0;
$existeC=0;
include("connect.php");
if (isset($_POST['Iniciar'])) {
    if (strlen($_POST['Usuario']) >= 1 && strlen($_POST['Contraseña']) >= 1) {
	    $Usuario = trim($_POST['Usuario']);
	    $Contraseña = trim($_POST['Contraseña']);
        $query = $conn->query("SELECT * FROM users");
        $rownum = $query->num_rows;
        if (!empty($query->num_rows) && $query->num_rows > 0){
            $prueba1 = mysqli_query($conn,"SELECT Usuario FROM users WHERE Usuario='$Usuario'");
            $prueba2 = mysqli_query($conn,"SELECT Contraseña FROM users WHERE Contraseña='$Contraseña'");
            $tempU=$Usuario;
            $tempC=$Contraseña;
            while($tempU = mysqli_fetch_array($prueba1)){
                $existeU++;
            }
            while($tempC = mysqli_fetch_array($prueba2)){
                $existeC++;
            }
            if (($existeU != 0) && ($existeC != 0)){
                $busqueda = mysqli_query($conn,"SELECT id, NRC FROM users where Usuario='$Usuario'");
                if ($busqueda) {
                    $tabla = array();
                    while ($row = mysqli_fetch_array($busqueda)) {
                        $tabla[] = $row['id'];
                        $tabla[] = $row['NRC'];
                    }
                    ?> 
                    <h3 class="ok">¡Ok, Se inicio sesion correctamente!</h3>
                  <?php
                  echo "ID Estudiante: $tabla[0] con su NCR: $tabla[1]";
                  
                } else {
                        ?> 
                        <h3 class="bad">¡NOk, ha ocurrido un error!</h3>
                     <?php
                }
            }else{
                ?> 
                <h3 class="bad">¡NOk, El usuario ingresado no existe!</h3>
                <?php
            }  

        }else{
            ?> 
	        	<h3 class="bad">¡NOk, No existen registros en la base de datos!</h3>
              <?php
        }
    } else {
	        ?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
            <?php
            }
}
?>