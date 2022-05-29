
<?php

try {
    shell_exec("chown -R www-data:www-data /var/www/html/ProyectoFinalDAW/");
    shell_exec("chmod -R 775 /var/www/html/ProyectoFinalDAW");
    shell_exec("/var/www/html/ProyectoFinalDAW/Despliegue/Scripts/script.sh");
    header("Location: ../Despliegue/aplicacion_instalada.php");
} catch (\Throwable $th) {
    throw $th;
}




?>