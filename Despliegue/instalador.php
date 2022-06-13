
<?php

$BBDD = $_POST['bbddname'];
try {
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/script.sh $BBDD");
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/permisos.sh");
    header("Location: ../Despliegue/aplicacion_instalada.php");
} catch (\Throwable $th) {
    throw $th;
}




?>